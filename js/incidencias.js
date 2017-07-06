function confirmarEstado(numeroVolqueta, categoria, estado, numero, fechaHora, pantalla){
	//alert("aca");
	//alert(numeroVolqueta + ", "  + categoria + ", " + estado + ", " + fechaHora);
	/*if(fechaHora == null){
		alert("aca");
	}*/
	/*var selector = "#select" + numero;
	alert($(selector).val());*/

	//alert($('#select' + numero).val());
	if(pantalla == "lg"){
		estadoSeteado = $('#select' + numero).val();
	}
	else{
		estadoSeteado = $('#selectSM' + numero).val();	
	}
	if(estado != estadoSeteado){
		$.ajax({
			url : '/Volquetas/incidencia/confirmarEstado',
			type : 'POST',
			dataType : 'json',
			data : {'numeroVolqueta' : numeroVolqueta,
					'categoria' : categoria,
					'estado' : estado,
					'estadoUpdate' : estadoSeteado,
					'fechaHoraSolucion' : fechaHora},
			beforeSend: function(){
				if(pantalla == "lg"){
					$('#link' + numero).css('display', 'none');
					$('#spinner' + numero).css('display', 'block');
				}
				else{
					$('#spinnerSM' + numero).css('display', 'block');
				}
			}
		})
		.done(function(response){
			if(response['code'] == 'ok')
				window.location.href = "/Volquetas/incidencia/verTodasLasIncidencias";
		});
	}
	
}