<!DOCTYPE html>
<html>
<head>
	
	<base href="/Volquetas/">
	{include file="bs_js.tpl"}
	<link rel = "stylesheet" href = "css/signup_login.css"/>
	<!--<script src="https://apis.google.com/js/platform.js" async defer></script>-->
	<!--<script src="/Volquetas/js/google.js"></script>-->
	<!-- <meta name="google-signin-client_id" content="534305849473-1d345eeam5j3fguteipt6tv95ufh8nm6.apps.googleusercontent.com"> -->

<!-- La variable $location tendrá el valor de la página a la que vamos. Paysandú Limpia es constante en todas las páginas. -->
	<title>{$location} - Paysandú Limpia</title>
</head>
<body>	
	<div class="wrapper">
	<!-- Incluir la vista del header al principio -->

		{include file="header.tpl"} 

	<!-- Comienzo del HTML de esta página -->
	
		<div id = "main" class = "{$classMain} {$classLogueado}"  style = "height: 88.7%;">
			<img src = "img/Logo Paysandú Limpia.png" class = "logoPaysanduLimpia"/>
			<div class = "container-fluid login">				
				<div class="row">
					<form id="formLogin" method="POST" accept-charset="utf-8" class="col-sm-12">
						<br>
						<button type = "button" class = "btn btn-primary" style = "width: 47%;" id = "btnFacebook"><span class = "fa fa-facebook"></span>&nbsp;&nbsp;Conectarse a Facebook</button>

						<div id="g-login" data-onsuccess="onSignIn" type = "button" class = "btn btn-danger" style = "float: right; width: 47%;"><span class = "fa fa-google"></span>&nbsp;&nbsp;Conectarse a Google</div >
						<!--
						<div onclick="LogOutGoogle();">
							Desconectar Google
						</div>
						-->

						<br><br><br><br>
						<div class="row">
							<div class="form-group col-sm-12 has-feedback {if $success eq 'no'}has-error{/if}">
								<label class="control-label" for="cedulaUsuario">Cédula de Identidad</label>
								<input type="text" id="cedulaUsuario" class="form-control" name="cedulaUsuario" value = "{$ci}"/>
								<span class="glyphicon glyphicon-user form-control-feedback"></span>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-12 has-feedback {if $success eq 'no'}has-error{/if}">
								<label class="control-label" for="passwordUsuario">Contraseña</label>
								<input type="password" id="passwordUsuario" class="form-control" name="passwordUsuario" value = ""/>
								<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							</div>
						</div>
						<div class = "checkbox">
				            <label id = "lblRecordarme" style = "color: black;"><input type = "checkbox" name = "recordarme" id = "recordarme"/>&nbsp;<b>Recordarme</b></label>
				        </div>  
						<br>
						<div class="row">
							<div class="form-group col-sm-12" style="text-align: center;">
								<button type="submit" id="enviarFormLogin" class="btn btn-success"><b>Iniciar sesión</b></button>
							</div>
						</div>
					</form>
				</div>
				<br>
				{if $success eq "si"}
					<div class="alert alert-success row" id = "alertLogin" style="display: {$alert}; text-align:center;">
				{else}
					<div class="alert alert-danger row" id = "alertLogin" style="display: {$alert}; text-align:center;">
				{/if}
					<div class="col-sm-12">
						{if $success eq "si"}
							<center><strong>¡ÉXITO!</strong><center>
							<center><p>El nuevo usuario ha sido agreado de manera correcta</p></center>
						{/if}
						{if $error eq "empty"}
							<center><strong>ERROR</strong><center>
							<center><p>No se han completado campos obligatorios</p></center>
						{/if}
						{if $error eq "error"}
							<center><strong>ERROR</strong><center>
							<center><p>Cédula de identidad y/o contraseña errónea/s</p></center>
						{/if}
					</div>	
				</div>	
			</div>
			
		</div>

		<!-- Finl del HTML de esta página -->
		
		{include file="footer.tpl"}
	</div>

	{if $classLogueado eq "noLogueado"}
		<script src = "js/facebook.js"></script>
	{/if}
	<!-- Incluir la vista del footer último. Más abajo no debe haber más código -->

	  <script>startApp();</script>
</body>
</html>