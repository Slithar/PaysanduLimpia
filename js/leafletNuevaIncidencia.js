var map = L.map('mapNuevaIncidencia').setView([-32.31659985305736, -58.085778951644905], 17);
L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
	maxZoom: 18}).addTo(map);
L.control.scale().addTo(map);

$.ajax({
	url : '/Volquetas/volqueta/getVolquetas',
	type : 'POST',
	dataType : 'json'
})
.done(function(response){
	//alert(response);
	
	if(response["code"] == "ok"){
		var volquetas = response["content"];
		console.log(JSON.stringify(volquetas));
		for(var i = 0; i < volquetas.length; i++){
			var conector = volquetas[i]["calleY"].substr(0, 1) == "I" ? "e" : "y";
			var direccion = volquetas[i]["ubicacion"] == "Esquina" ? volquetas[i]["calleX"] + " " + conector + " " + volquetas[i]["calleY"] : volquetas[i]["calleX"] + " entre " + volquetas[i]["calleY"] + " y " + volquetas[i]["calleZ"]; 
			var marker = L.marker([volquetas[i]["latitud"], volquetas[i]["longitud"]], {draggable: false});
			marker.bindPopup("<dl><dt>Volqueta Nº: " + volquetas[i]["numero"] + "</dt><dt>" + direccion + "</dt></dl>");
			marker.on('mouseover', function (e) {
		        this.openPopup();
		    });
		    marker.on('mouseout', function (e) {
		        this.closePopup();
		    });
		    marker.setIcon(blueMarker);
			marker.addTo(map);
		}
	}
	
})
.fail(function(error, err, e){
	alert(e);
});
