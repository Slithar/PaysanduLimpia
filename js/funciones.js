jQuery(document).ready(function($) {
	var visible = false;

	/*
		Función para el submit del formulario de Log In.
	*/
	$("#formLogin").on('submit', function(event) {
		event.preventDefault();
		/* Act on the event */
		$.ajax({
			url: '/Volquetas/usuario/validate/',
			type: 'POST',
			dataType: 'json',
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
	});

	$('#opcionIncidencias').on('click', function(){
		

		if(visible == false){			
			$('.submenuIncidencias').fadeIn();
			$('#iconoDesplegar').removeClass('fa-chevron-down');
			$('#iconoDesplegar').addClass('fa-chevron-up');
			visible = true;
		}
		else{
			$('.submenuIncidencias').fadeOut();			
			$('#iconoDesplegar').removeClass('fa-chevron-up');
			$('#iconoDesplegar').addClass('fa-chevron-down');
			visible = false;
		}
	});

	$('.imgLogo').on('click', function(){
		location.href = "/Volquetas";
	})

});