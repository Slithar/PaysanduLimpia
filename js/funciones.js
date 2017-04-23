jQuery(document).ready(function($) {


	/*
		Función para el submit del formulario de Log In.
	*/
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
				alert(response);
			});
		}		
	});

	/*
		Función para el submit del formulario de registro
	*/

	$("#formSignup").on('submit', function(event) {
		event.preventDefault();
		/* Act on the event */

		var error = false;

		if($("input[name=psw1]").val().length < 6 || $("input[name=psw1]").val() != $("input[name=psw2]").val()){
			$("input[name=psw1]").parent().addClass('has-error');
			$("input[name=psw2]").parent().addClass('has-error');
			error = true;
		}

		if(!error){
			$.ajax({
				url: '/Volquetas/usuario/signup',
				type: 'POST',
				dataType: 'json',
				data: $("#formSignup").serialize(),
			})
			.done(function(response) {

			});
		}
	});

});
