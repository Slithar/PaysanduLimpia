function verNotificacion(codigo, codigoIncidencia){
	//alert("aca");
	$.ajax({
		url : '/Volquetas/usuario/notificacionAVista',
		type : 'POST',
		dataType : 'json',
		data : {'codigo' : codigo,
				'codigoIncidencia' : codigoIncidencia}
	})
	.done(function(response){
		//alert(response);
		if(response['code'] == "ok"){
			window.location.href = "/Volquetas/incidencia/verIncidencia/" + codigoIncidencia;
		}
	});
}