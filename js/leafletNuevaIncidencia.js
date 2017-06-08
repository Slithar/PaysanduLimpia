var map = L.map('mapNuevaIncidencia').setView([-32.31659985305736, -58.085778951644905], 17);
L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
	maxZoom: 18}).addTo(map);
L.control.scale().addTo(map);

var volquetas = new Array();
var volquetaMarcada;
$.ajax({
	url : '/Volquetas/volqueta/getVolquetas',
	type : 'POST',
	dataType : 'json',
	async : false
})
.done(function(response){
	//alert(response);	
	if(response["code"] == "ok"){
		volquetas = response["content"];
		//todasLasVolquetas = volquetas;
		//console.log(JSON.stringify(volquetas));
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
			marker.on('click', onMarkerClick);
			volquetas[i]["marcador"] = marker;


		}
	}	
});



function volquetasPorUbicacion(ubicacion){
	var result = new Array();
	//alert("hola");
	for(var i = 0; i < volquetas.length; i++){
		if(volquetas[i]["ubicacion"] == ubicacion)
			result.push(volquetas[i]); 
	}

	return result;
}

function numeroDeVolqueta(direccion){
	var result = new Array();
	//alert("hola");
	for(var i = 0; i < volquetas.length; i++){
		if(getDireccion(volquetas[i]) == direccion)
			result.push(volquetas[i]); 
	}

	return result;
}

function getDireccion(volqueta){
	var conector = volqueta["calleY"].substr(0, 1) == "I" ? "e" : "y";
	var direccion = volqueta["ubicacion"] == "Esquina" ? volqueta["calleX"] + " " + conector + " " + volqueta["calleY"] : volqueta["calleX"] + " entre " + volqueta["calleY"] + " y " + volqueta["calleZ"]; 
	return direccion;
}

function getNumero(volqueta){
	return volqueta["numero"];
}

function getVolquetaPorNumero(numero){
	var i = 0;
	while(i < volquetas.length){
		if(volquetas[i]["numero"] == numero)
			return volquetas[i];
		i++;
	}
}

function getVolquetaPorLatitudLongitiud(latitud, longitud){
	var i = 0;
	while(i < volquetas.length){
		if(volquetas[i]["latitud"] == latitud && volquetas[i]["longitud"] == longitud)
			return volquetas[i];
		i++;
	}
}

function refreshSelectDirecciones(ubicacion){
	var volquetasEnEsquina = volquetasPorUbicacion(ubicacion);
	//alert(volquetasEnEsquina.length + " " + ubicacion);
	var direcciones = new Array();
	for(var i = 0; i < volquetasEnEsquina.length; i++){
		//console.log(volquetasEnEsquina[i]);
		var direccion = getDireccion(volquetasEnEsquina[i]);
		if(direccion != direcciones[direcciones.length - 1]){
			direcciones.push(direccion);
		}
	}
	var volquetasTemplate = _.template('<% _.each(direcciones, function(direccion, index, direcciones) { %>' +
											'<option value = "<%= direccion %>"><%= direccion %></option>' +
										'<% }); %>');

	var content = volquetasTemplate({
		direcciones: direcciones
	});

	$('#selectDireccion').html(content);
	var $select = $('#selectDireccion').select2();
	$select.val($('#selectDireccion').find(':selected').val()).trigger("change");
	//$('#selectDireccion option')[0].selected = true;
	//refreshSelectNumeros($('#selectDireccion').val());
	//alert("listo!");
}

function refreshSelectNumeros(direccion){
	var volquetas = numeroDeVolqueta(direccion);
	var numeros = new Array();
	for(var i = 0; i < volquetas.length; i++){
		numeros.push(getNumero(volquetas[i]));
	}
	var numerosTemplate = _.template('<% _.each(numeros, function(numero, index, numeros) { %>' +
											'<option value = "<%= numero %>"><%= numero %></option>' +
										'<% }); %>');
	var content = numerosTemplate({
		numeros : numeros
	});

	$('#selectNumero').html(content);
	refreshEstado();
}

function cargarDirecciones(){
	//alert("aca");
	refreshSelectDirecciones($('#selectUbicacion').val());
	refreshSelectNumeros($('#selectDireccion').val());
	marcarVolqueta();
}

function cargarNumeros(){
	refreshSelectNumeros($('#selectDireccion').val());
	marcarVolqueta();
}

function deseleccionarVolquetas(){
	for(var i = 0; i < volquetas.length; i++){
		volquetas[i]["marcador"].setIcon(blueMarker);
	}
}

function marcarVolqueta(){
	deseleccionarVolquetas();
	getVolquetaPorNumero($('#selectNumero').val())["marcador"].setIcon(redMarker);
}

function onMarkerClick(e){
	deseleccionarVolquetas();
	this.setIcon(redMarker);
	var volqueta = getVolquetaPorLatitudLongitiud(e.latlng.lat.toString(), e.latlng.lng.toString());
	$('#selectUbicacion').val(volqueta["ubicacion"]);
	refreshSelectDirecciones($('#selectUbicacion').val());
	//$('#selectDireccion').val(getDireccion(volqueta));
	var $select = $('#selectDireccion').select2();
	$select.val(getDireccion(volqueta)).trigger("change");
	//$('#selectDireccion').select2("val", getDireccion(volqueta));
	//console.log(getDireccion(volqueta));	
	refreshSelectNumeros($('#selectDireccion').val());
	$('#selectNumero').val(volqueta["numero"]);	

}

function readURL(input) {
	//var input = $('#fileImagen');
	if (input.files && input.files[0]) {
		$('.galeria_item').remove();
		for(var i = 0; i < input.files.length; i++){
			var reader = new FileReader();
		    reader.onload = function (e) {
		     	$('.galeria').append('<li class = "galeria_item"><img src = "' + e.target.result + '" class = "galeria_img"/></li>');
		    }
		    reader.readAsDataURL(input.files[i]);
		    $('#cantidadImagenes').val(i + 1);
		}		
	}
}
function quitarFiles(){
	$('.galeria_item').remove();
	$('#cantidadImagenes').val("0");
}

function refreshEstado(){
	$.ajax({
		url : '/Volquetas/incidencia/getEstadoNuevaIncidencia',
		type : 'POST',
		dataType : 'json',
		data : {'numeroVolqueta' : $('#selectNumero').val(),
				'categoria' : $('#selectCategoria').val()}
	})
	.done(function(response){
		//alert(response);
		if(response['code'] == "ok"){
			$('#lblEstado').html(response['message']);
		}
	});
}

refreshSelectDirecciones($('#selectUbicacion').val());
refreshSelectNumeros($('#selectDireccion').val());
marcarVolqueta();


