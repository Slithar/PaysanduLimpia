var map = L.map('map').setView([-32.3160, -58.08357954025450], 17);
L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
	maxZoom: 18}).addTo(map);
L.control.scale().addTo(map);

var green = 0;
var orange = 0;
var red = 0;

//alert("Buuu te asusto");

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
			marker.bindPopup("<center><b>Volqueta Nº: " + volquetas[i]["numero"] + "</b><center><br><br><img class = 'imgVolqueta' src = 'img/Volquetas/" + volquetas[i]["numero"] + ".png'>");
			marker.on('mouseover', function (e) {
		        this.openPopup();
		    });
		    marker.on('mouseout', function (e) {
		        this.closePopup();
		    });
		    if(volquetas[i]["estado"] == 1){
		    	marker.setIcon(greenMarker);
		    	green++;
		    }
			else if(volquetas[i]["estado"] == 3){
				marker.setIcon(redMarker);
				red++;
			}
			else{
				marker.setIcon(orangeMarker);
				orange++;
			}
			marker.addTo(map);

			$('#lblCantidadGreen').html("Cantidad de volquetas: <b>" + green + "</b>");
			$('#lblCantidadOrange').html("Cantidad de volquetas: <b>" + orange + "</b>");
			$('#lblCantidadRed').html("Cantidad de volquetas: <b>" + red + "</b>");
			$('#lblCantidadGreenTable').html(green);
			$('#lblCantidadOrangeTable').html(orange);
			$('#lblCantidadRedTable').html(red);
		}
	}
	
});

