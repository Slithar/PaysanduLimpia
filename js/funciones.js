jQuery(document).ready(function($) {
	var visibleIncidencias = false;
	var visibleUsuarios = false;
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
		if(visibleIncidencias == false){			
			$('.submenuIncidencias').fadeIn();
			$('#iconoDesplegarIncidencias').removeClass('fa-chevron-down');
			$('#iconoDesplegarIncidencias').addClass('fa-chevron-up');
			visibleIncidencias = true;
		}
		else{
			$('.submenuIncidencias').fadeOut();			
			$('#iconoDesplegarIncidencias').removeClass('fa-chevron-up');
			$('#iconoDesplegarIncidencias').addClass('fa-chevron-down');
			visibleIncidencias = false;
		}
	});

	$('#opcionUsuarios').on('click', function(){
		if(visibleUsuarios == false){			
			$('.submenuUsuarios').fadeIn();
			$('#iconoDesplegarUsuarios').removeClass('fa-chevron-down');
			$('#iconoDesplegarUsuarios').addClass('fa-chevron-up');
			visibleUsuarios = true;
		}
		else{
			$('.submenuUsuarios').fadeOut();			
			$('#iconoDesplegarUsuarios').removeClass('fa-chevron-up');
			$('#iconoDesplegarUsuarios').addClass('fa-chevron-down');
			visibleUsuarios = false;
		}
	});

	$('.imgLogo').on('click', function(){
		location.href = "/Volquetas";
	});

	$('#formNuevaIncidencia').on('submit', function(e){
		//alert("aca");
		var success = true;
		e.preventDefault();

		if($('#descripcion').val() == ""){
			$('#descripcion').css('border', '2px solid #b83636');
			$('#descripcion').focus();
			success = false;
		}

		if($('#resumen').val() == ""){
			$('#resumen').css('border', '2px solid #b83636');
			$('#resumen').focus();
			success = false;
		}

		if(!success){
			$('#dangerNuevaIncidencia').fadeIn();
			/*$('html,body').animate({
			    scrollTop: $("#dangerNuevaIncidencia").offset().top
			}, 2000);*/
			$('body').scrollTo($('#dangerNuevaIncidencia').heigth());
		}
		else{
			$.ajax({
				url : '/Volquetas/incidencia/agregar',
				method : 'POST',
				data : $('#formNuevaIncidencia').serialize()
			})
			.done(function(response){
				alert(response);
			})
			.fail(function(error, err, e){
				alert(e);
			});
			//document.getElementById('formNuevaIncidencia').submit();
		}
	});

});