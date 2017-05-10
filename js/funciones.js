jQuery(document).ready(function($) {
	var visibleIncidencias = false;
	var visibleUsuarios = false;
	//alert("hola");
	/*
		Función para el submit del formulario de Log In.
	*/
	$('#selectDireccion').select2();
	setTimeout(function(){
		$('#successNuevaIncidencia').fadeOut();
	}, 5000);

	//alert("aca");
	$("#enviarFormLogin").on('click', function(event) {
		event.preventDefault();
		//alert("aca");
		var error = false;
		//alert("aca");
		$("#cedulaUsuario, #passwordUsuario").map(function(){			
			
			$(this).parent().removeClass('has-error');
			if($(this).val() == ""){
				error = true;
				$(this).parent().addClass('has-error');
				//alert("aca");
				$('#alertLogin').removeClass('alert-success');
				$('#alertLogin').addClass('alert-danger');
				$("#alertLogin").html("<center><strong>ERROR</strong></center><center><p>No se han ingresado campos obligatorios</p></center>");
				$('#alertLogin').css('display', 'block');
			}
		});
		if(!error){
			//alert("aca");
			$.ajax({
				url: '/Volquetas/usuario/validate/',
				type: 'POST',
				dataType : 'json',
				data: $('#formLogin').serialize()
			})
			.done(function(response) {
				//alert(response["code"]);
				if(response["code"] == "error"){
					window.location.href = "/Volquetas/usuario/login/error/" + $('#cedulaUsuario').val().replace('undefined', '');
				}
				else{
					window.location.href = "/Volquetas/usuario/landing";
				}

			})
			.fail(function(error, err, e){
				alert(e);
			});
		}
		
	});

	$('#btnSubmitLogin').on('click', function(e){
		e.preventDefault();
		if($('#ciHorizontal').val() == "" || $('#passwordHorizontal') == ""){
			window.location.href = "/Volquetas/usuario/login/empty/" + $('#ciHorizontal').val().replace('undefined', '');
		}
		else{
			$.ajax({
				url: '/Volquetas/usuario/validate/',
				type: 'POST',
				dataType : 'json',
				data: $('#formLoginHorizontal').serialize()
			})
			.done(function(response) {
				if(response["code"] == "error"){
					window.location.href = "/Volquetas/usuario/login/error/" + $('#ciHorizontal').val().replace('undefined', '');
				}
				else{
					window.location.href = "/Volquetas/usuario/landing"
				}

			})
			.fail(function(error, err, e){
				alert(e);
			});
		}
	});


	/*$("#imgInp").change(function(){
		alert("aca");
    	//readURL(this);
	});*/

	/*$('body').on('change', '#imgInp', function(){
		alert("aca");
    	//readURL(this);
	});*/

	$("#subBoton").on('click', function(event) {
	//alert("hola");
	//$("#formSignup").on('submit', function(event) {
		event.preventDefault();
		//alert("aca");
		var error = false;
		removeError();
		$("#formSignup").find('input[type="text"],input[type="password"], input[type="email"]').each(function(index, el) {
			if($(this).val() == ""){
				error = true;
				$("#alerta").css('display', 'block');
				$("#alerta").html("<strong>ERROR: </strong>No se han completado campos obligatorios");
				$(this).parent().addClass("has-error");
				setTimeout(function(){
					$("#alerta").css('display', 'none');
				}, 5000);
			}	
		});

		if(!error && $("input[name=contraseniaUsuario]").val().length <= 6){
			removeError();
			/*$("input[name=contraseniaUsuario]").parent().addClass('has-error');
			error = true;*/
		 	$("input[name=contraseniaUsuario]").parent().addClass('has-error');
		 	$("input[name=contraseniaUsuario2]").parent().addClass('has-error');
		 	error = true;
		 	$("#alerta").css('display', 'block');
			$("#alerta").html("<strong>ERROR: </strong>La contraseña ingresada presenta un formato incorrecto");
			$("input[name=contraseniaUsuario]").focus();
			//$(this).parent().addClass("has-error");
			setTimeout(function(){
				$("#alerta").css('display', 'none');
			}, 5000);
		}
		if(!error && $("input[name=contraseniaUsuario]").val() != $("input[name=contraseniaUsuario2]").val()){
			removeError();
		 	$("input[name=contraseniaUsuario]").parent().addClass('has-error');
		 	$("input[name=contraseniaUsuario2]").parent().addClass('has-error');
		 	error = true;
		 	$("#alerta").css('display', 'block');
			$("#alerta").html("<strong>ERROR: </strong>La contraseña ingresada no coincide con su confirmación");
			//$(this).parent().addClass("has-error");
			$("input[name=contraseniaUsuario]").focus();
			setTimeout(function(){
				$("#alerta").css('display', 'none');
			}, 5000);
		}
		//alert($('#formSignup #ci').val());
		if(!error && $('#formSignup #ci').val().length != 8){
			$('#formSignup #ci').parent().addClass('has-error');
			error = true;
			$("#alerta").css('display', 'block');
			$("#alerta").html("<strong>ERROR: </strong>La cédula de identidad ingresada presenta un formato incorrecto");
			//$(this).parent().addClass("has-error");
			$("#formSignup #ci").focus();
			setTimeout(function(){
				$("#alerta").css('display', 'none');
			}, 5000);
		}

		if(!error){
			$.ajax({
				url : '/Volquetas/usuario/verify/register',
				type : 'POST',
				dataType : 'json',
				data : $('#formSignup').serialize()
			})
			.done(function(response){
				//alert(response);
				if(response["code"] == "error"){
					switch(response["content"]){
						case "ci":
							$('#formSignup #ci').parent().addClass('has-error');
							error = true;
							$("#alerta").css('display', 'block');
							$("#alerta").html(response["message"]);
							//$(this).parent().addClass("has-error");
							$("#formSignup #ci").focus();
							setTimeout(function(){
								$("#alerta").css('display', 'none');
							}, 5000);
						break;

						case "mail":
							$('input[type="email"]').parent().addClass('has-error');
							error = true;
							$("#alerta").css('display', 'block');
							$("#alerta").html(response["message"]);
							//$(this).parent().addClass("has-error");
							$('input[type="email"]').focus();
							setTimeout(function(){
								$("#alerta").css('display', 'none');
							}, 5000);
						break;
					}
					
				}
				else{
					$('#formSignup').submit();
				}
			});
		}
	});

	/*$("#opcionIngresar").on('click', function(){
		$('.ulMenu').fadeOut(function(){
			$('.loginForm').fadeIn();
			$('#ci').focus();
		});
	});*/

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

	$('#submitIncidencia').on('click', function(e){
		var success = true;
		e.preventDefault();

		if($('#descripcion').val() == ""){
			$('#divDescripcion').addClass('has-error');
			$('#descripcion').focus();
			success = false;
		}

		if(!success){
			$("#dangerNuevaIncidencia").fadeIn();
			$("#main").animate({ scrollTop : $("#dangerNuevaIncidencia").offset().top + 100 }, 750 );
			setTimeout(function(){				
				$("#dangerNuevaIncidencia").fadeOut();
			}, 5000);
		}
		else{
			$('#formNuevaIncidencia').submit();
		}
	});

	$('body').on('keyup', function(e){
		if(e.which == 27)
			$('.fondoNegro').fadeOut();
	});

	$('#btnEnviarCorreo').on('click', function(e){
		e.preventDefault();
		$.ajax({
			url : '/Volquetas/usuario/contacto',
			type : 'POST',
			dataType : 'json',
			data : $('#formContacto').serialize(),
			beforeSend : function(){
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
				$('#alertContacto').html(response['message']['content']);
				$('.footerLanding').css('height', '631px');
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
				$('#alertContacto').html(response['message']['content']);
				$('.footerLanding').css('height', '631px');
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
	});
});

/*function removeError(){
	$("#formSignup").find('input[type="text"],input[type="password"], input[type="email"]').each(function(index, el) {
		$(this).parent().removeClass("has-error");
	}
}*/