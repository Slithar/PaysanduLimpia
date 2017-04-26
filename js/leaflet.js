var map = L.map('map').setView([-32.3167, -58.08357954025450], 17);
L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
	maxZoom: 18}).addTo(map);
L.control.scale().addTo(map);

L.AwesomeMarkers.Icon.prototype.options.prefix = 'ion';

var redMarker = L.AwesomeMarkers.icon({
    icon: 'ion-alert-circled',
    markerColor: 'red'
});

var orangeMarker = L.AwesomeMarkers.icon({
    icon: 'ion-man',
    markerColor: 'orange'
});

var greenMarker = L.AwesomeMarkers.icon({
    icon: 'ion-checkmark-circled',
    markerColor: 'green'
});


/*var marker = L.marker([-32.31733057826686, -58.0839228630066],{icon : redMarker}, {draggable: false});
marker.addTo(map);*/
var green = 0;
var orange = 0;
var red = 0;

$.ajax({
	url : '/Volquetas/volqueta/getVolquetas',
	type : 'POST',
	dataType : 'json'
})
.done(function(response){
	//alert(hola);
	//console.log(response);
	//response = response.replace("Array", "");
	if(response["code"] == "ok"){
		//var responseSplit = response.split(':');
		var volquetas = response["content"];
		for(var i = 0; i < volquetas.length; i++){

			//var datos = responseSplit[i].split(';');
			var marker = L.marker([volquetas[i]["latitud"], volquetas[i]["longitud"]], {draggable: false});
			marker.bindPopup("Volqueta Nº: " + volquetas[i]["numero"]);
			marker.on('mouseover', function (e) {
		        this.openPopup();
		    });
		    marker.on('mouseout', function (e) {
		        this.closePopup();
		    });
		    if(volquetas[i]["estado"] == "Sin incidencias"){
		    	marker.setIcon(greenMarker);
		    	green++;
		    }
			else if(volquetas[i]["estado"] == "Con incidencias pendientes"){
				marker.setIcon(redMarker);
				red++;
			}
			else{
				marker.setIcon(orangeMarker);
				orange++;
			}
			marker.addTo(map);

			$('#lblCantidadGreen').html("Cantidad de volquetas: " + green);
			$('#lblCantidadOrange').html("Cantidad de volquetas: " + orange);
			$('#lblCantidadRed').html("Cantidad de volquetas: " + red);
		}
	}
	
});

