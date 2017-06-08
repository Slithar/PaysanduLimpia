<!DOCTYPE html>
<html>
<head>
	
	<base href="/Volquetas/">
	{include file="bs_js.tpl"}

	<!-- <link rel="shortcut icon" type="image/ico" href="img/iconoPaysanduLimpia.ico" />

	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/funciones.js"></script>
	<link rel="stylesheet" type="text/css" href="css/signup.css"> -->
<!-- La variable $location tendrá el valor de la página a la que vamos. Paysandú Limpia es constante en todas las páginas. -->
	<title>{$location} - Paysandú Limpia</title>
	<link rel = "stylesheet" href = "css/signup_login.css"/>	
	<script src = "js/signup_functions.js"></script>
</head>
<body>
	<!-- Incluir la vista del header al principio -->
	
	<div class="wrapper">
		{include file="header.tpl"}
		<div id = "main" class="container-fluid {$classMain} {$classLogueado}">		
			<form id="formSignup" action="/Volquetas/usuario/registrar" method="POST" enctype="multipart/form-data" accept-charset="utf-8" class="midPage signup">
				{if $success eq 'si'}
					<div class = "alert alert-success">
						<strong>¡ÉXITO!</strong> Se ha agregado el nuevo usuario de manera correcta
					</div>
				{/if}
				<div class="row">
					<div class="form-group col-sm-12">
						<label for="ci" class="control-label">Cédula de identidad</label>
						<input type="text" id="ci" name="cedulaUsuario" class="form-control" maxlength="8" placeholder="12345678">
					</div>
				</div>	
				<div class="row">
					<div class="form-group col-sm-6">
						<label for="nombre" class="control-label">Nombre</label>
						<input type="text" id="nombreUsuario" name="nombreUsuario" class="form-control" placeholder="José">
					</div>
				
					<div class="form-group col-sm-6">
						<label for="apellido" class="control-label">Apellido</label>
						<input type="text" name="apellidoUsuario" class="form-control" placeholder="Pérez">	
					</div>	
				</div>
				<div class="row">
					<div class="form-group col-sm-6">
						<label for="contraseniaUsuario" class="control-label">Contraseña</label>
						<input type="password" name="contraseniaUsuario" class="form-control" placeholder="Más de 6 caracteres">
					</div>
				<!-- </div> -->
				<!-- <div class="row"> -->
					<div class="form-group col-sm-6">
						<label for="contraseniaUsuario2" class="control-label">Confirmación</label>
						<input type="password" name="contraseniaUsuario2" class="form-control" placeholder="Más de 6 caracteres">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-12">
						<label for="email" class="control-label">Correo electrónico</label>
						<input type="email" name="emailUsuario" class="form-control" placeholder="jperez@correo.com">
					</div>	
				</div>				
				<br>
				<div class="row">
					<center>
						<div class="col-sm-12">						
						    <img id="imagenPreview" src="img/sinFoto.png" alt="Imagen" title="Imagen" style="width: 175px; height: 175px; border-radius: 50%; padding: 8px;">
						</div>
					</center>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-12">
						<center><label class="btn btn-primary btn-file">
						    <span class = "fa fa-folder"></span>&nbsp;&nbsp;Buscar foto de perfil<input id="fotoPerfil" name="fotoPerfil" type="file" style="display: none;" onchange="readURL(this);" accept="image/jpg,image/png,image/jpg,image/gif,image/jpg,image/jpeg,image/bmp"/>
						</label></center>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="checkbox col-sm-12">
						<label><input name="enviarEmail" type="checkbox" checked>Quiero recibir información por correo electrónico</label>	
					</div>	
				</div>
				<br><br>
				<div class="row">
					<div class="form-group col-sm-12" style="text-align: center;">
						<button type="submit" name="subBoton" id="subBoton" class="btn btn-success"><b>Registrarme</b></button>
					</div>	
				</div>
				<br>
				<div class="row">
					<div class="col-sm-12 alert alert-danger" id="alerta" style="text-align: center; display: none;">
						
					</div>
				</div>
			</form>
		</div>

		{include file="footer.tpl"}
		<!-- Incluir la vista del footer último. Más abajo no debe haber más código -->
	</div>
</body>
</html>