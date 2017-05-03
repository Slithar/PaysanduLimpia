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
			alert(response["code"]);
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
			$("#dangerNuevaIncidencia").fadeIn();
			//alert($("#dangerNuevaIncidencia").offset().top);
			$(".main").animate({ scrollTop : $("#dangerNuevaIncidencia").offset().top + 100 }, 750 );
			//$('.main').scrollTop();
			setTimeout(function(){				
				$("#dangerNuevaIncidencia").fadeOut();
			}, 5000);
			//$('.contenedor').scroll($('.contenedor').height());
		}
		else{
			document.getElementById('formNuevaIncidencia').submit();
		}
	});

	$('body').on('keyup', function(e){
		if(e.which == 27)
			$('.fondoNegro').fadeOut();
	});

	$('#btnEnviarCorreo').on('click', function(e){
		//alert("aca");
		e.preventDefault();
		$.ajax({
			url : '/Volquetas/usuario/contacto',
			type : 'POST',
			dataType : 'json',
			data : $('#formContacto').serialize(),
			beforeSend : function(){
				/*$('#btnEnviarCorreo').fadeOut(function(){
					$('#spinnerEnviar').fadeIn();
				});*/
				$('#btnEnviarCorreo').css('display', 'none');
				$('#spinnerEnviar').css('display', 'block');

			}
		})
		.done(function(response){
			if(response['code'] == "ok"){
				$('#btnEnviarCorreo').css('display', 'none');
				$('#spinnerEnviar').css('display', 'none');
				$('#alertContacto').css('display', 'block');
				$('#alertContacto').addClass('alert-success');
				$('#alertContacto').html('<strong><center>¡ÉXITO!</center></strong><center>' + response['message'] + '</center>');
				//});
				setTimeout(function(){				
					$("#spinnerEnviar").css('display', 'none');
					$("#alertContacto").css('display', 'none');
					$('#btnEnviarCorreo').css('display', 'block');
					$('#correo').val("");
					$('#asunto').val("");
					$('#mensaje').val("");
				}, 5000);
			}
			else{
				$('#btnEnviarCorreo').css('display', 'none');
				$('#spinnerEnviar').css('display', 'none');
				$('#alertContacto').css('display', 'block');
				$('#alertContacto').addClass('alert-danger');
				$('#alertContacto').html('<strong><center>ERROR</center></strong><center>' + response['message'] + '</center>');
				//});
				setTimeout(function(){				
					$("#spinnerEnviar").css('display', 'none');
					$("#alertContacto").css('display', 'none');
					$('#btnEnviarCorreo').css('display', 'block');
				}, 5000);
			}
		})
		.fail(function(error, err, e){
			alert(e);
		});
		//<strong><center>¡ÉXITO!</center></strong><center></center>
	});

});