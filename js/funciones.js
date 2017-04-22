jQuery(document).ready(function($) {


	/*
		Función para el submit del formulario de Log In.
	*/
	$("#formLogin").on('submit', function(event) {
		event.preventDefault();
		/* Act on the event */
		$.ajax({
			url: '/Volquetas/usuario/validate/',
			type: 'POST',
			dataType: 'html',
			data: $("#formLogin").serialize(),
		})
		.done(function(response) {
			alert(response);
		});
		
	});

	$("#opcionIngresar").on('click', function(){
		$('.ulMenu').fadeOut(function(){
			$('.loginForm').fadeIn();
			$('#ci').focus();
		});
	});

	$('#spanAtras').on('click', function(){
		$('.loginForm').fadeOut(function(){
			$('.ulMenu').fadeIn();
		});
	})

});