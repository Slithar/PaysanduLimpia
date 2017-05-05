jQuery(document).ready(function($) {
	var visibleIncidencias = false;
	var visibleUsuarios = false;
	/*
		Función para el submit del formulario de Log In.
	*/
	$('#selectDireccion').select2();

	setTimeout(function(){
		$('#successNuevaIncidencia').fadeOut();
	}, 5000);

	$("#formLogin").on('submit', function(event) {
		event.preventDefault();
		/* Act on the event */
		var error = false;

		$("#formLogin :input").map(function(){
			if(!$(this).val()){
				error = true;
				$(this).parent().addClass('has-error');
			}
		});

		if(!error){
			$.ajax({
				url: '/Volquetas/usuario/validate/',
				type: 'POST',
				dataType: 'html',
				data: $("#formLogin").serialize(),
			})
			.done(function(response) {
				response = response.replace(/\s+/g , "");
				if(response == "false"){
					window.location.href = "/Volquetas/usuario/login/error";
				}
				else{
					window.location.href = "/Volquetas/usuario/landing"
				}

			});
		}	
		
	});

	$("#imgInp").change(function(){
    	readURL(this);
	});

	$("#subBoton").on('click', function(event) {
		event.preventDefault();
		/* Act on the event */

		var error = false;

		$("#formSignup").find('input[type="text"],input[type="password"], input[type="email"]').each(function(index, el) {
			if($(this).val() == ""){
				error = true;
				$("#alerta").css('visibility', 'visible');
				$("#alerta").html("<strong>Error!</strong> Los campos marcados en ROJO son obligatorios.")
				$(this).parent().addClass("has-error");
			}	
		});

		if($("input[name=contraseniaUsuario]").val().length <= 6 || $("input[name=contraseniaUsuario]").val() != $("input[name=contraseniaUsuario2]").val()){
		 	$("input[name=contraseniaUsuario]").parent().addClass('has-error');
		 	$("input[name=contraseniaUsuario2]").parent().addClass('has-error');
		 	error = true;
		}
		alert($('#formSignup #ci').val());
		if($('#formSignup #ci').val().length < 8){
			$('#formSignup #ci').parent().addClass('has-error');
			error = true;
		}

		if(!error){
			$("#formSignup").submit();
		}
	});

	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            $('#imagenPreview').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}

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
			//$('.lblResumenDescripcion').addClass('has-class');
			$('#divDescripcion').addClass('has-error');
			$('#descripcion').focus();
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
				$('#alertContacto').addClass(response['message']['alert']);
				//$('#alertContacto').removeClass('alert-danger');
				$('#alertContacto').html(response['message']['content']);
				$('.footerLanding').css('height', '631px');
				//});
				setTimeout(function(){				
					$("#spinnerEnviar").css('display', 'none');
					$("#alertContacto").css('display', 'none');
					$('#btnEnviarCorreo').css('display', 'block');
					$('#correo').val("");
					$('#asunto').val("");
					$('#mensaje').val("");
					$('.footerLanding').css('height', '571px');
					$('#alertContacto').removeClass(response['message']['alert']);
					$('#captcha').remove();
					//grecaptcha.reset();
				}, 5000);
			}
			else{
				$('#btnEnviarCorreo').css('display', 'none');
				$('#spinnerEnviar').css('display', 'none');
				$('#alertContacto').css('display', 'block');
				$('#alertContacto').addClass(response['message']['alert']);
				//$('#alertContacto').removeClass('alert-danger');
				$('#alertContacto').html(response['message']['content']);
				$('.footerLanding').css('height', '631px');
				//});
				setTimeout(function(){				
					$("#spinnerEnviar").css('display', 'none');
					$("#alertContacto").css('display', 'none');
					$('#btnEnviarCorreo').css('display', 'block');
					$('.footerLanding').css('height', '571px');
					$('#alertContacto').removeClass(response['message']['alert']);
				}, 5000);
			}
		})
		.fail(function(error, err, e){
			alert(e);
		});
		//<strong><center>¡ÉXITO!</center></strong><center></center>
	});

});