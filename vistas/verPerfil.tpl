<!DOCTYPE html>
<html>
<head>
	
	<base href="/Volquetas/">
	{include file="bs_js.tpl"}
	
<!-- La variable $location tendrá el valor de la página a la que vamos. Paysandú Limpia es constante en todas las páginas. -->
	<title>{$location} - Paysandú Limpia</title>
	<link rel = "stylesheet" href = "css/signup_login.css"/>
</head> 
<body>
	<!-- Incluir la vista del header al principio -->
	<div class = "wrapper">
		
		{include file="header.tpl"}
		<div id = "main" class="container-fluid {$classMain} {$classLogueado}">
			<form id="formModificar" action="/Volquetas/usuario/modificar" method="POST" enctype="multipart/form-data" accept-charset="utf-8" class="midPage modificar">
				<div class="row">
					<div class="form-group col-sm-12">
						<label for="ci" class="control-label">Cédula de identidad</label>
						<input type="text" id="ci" name="cedulaUsuario" class="form-control" >
					</div>
				</div>	
				<div class="row">
					<div class="form-group col-sm-6">
						<label for="nombre" class="control-label">Nombre</label>
						<input type="text" id="nombreUsuario" name="nombreUsuario" class="form-control" >
					</div>
				
					<div class="form-group col-sm-6">
						<label for="apellido" class="control-label">Apellido</label>
						<input type="text" name="apellidoUsuario" class="form-control" >	
					</div>	
				</div>				
				<div class="row">
					<div class="form-group col-sm-12">
						<label for="email" class="control-label">Correo electrónico</label>
						<input type="email" name="emailUsuario" class="form-control" >
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
					<center>
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalCambiarContrasenia" style = "width: 35%; margin-left: 0"><span class = "fa fa-lock"></span>&nbsp;&nbsp;<b>Cambiar contraseña</b></button>
						&nbsp;&nbsp;&nbsp;&nbsp;
				 		<button type="submit" class="btn btn-success" id = "btnModificarb" style = "width: 17%;"><span class = "fa fa-pencil"></span>&nbsp;&nbsp;<b>Modificar</b></button>
				 		&nbsp;&nbsp;&nbsp;&nbsp;	
				 		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalCambiarContrasenia" style = "width: 17%;"><span class = "fa fa-times"></span>&nbsp;&nbsp;<b>Eliminar</b></button>
			 		</center>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-12 alert alert-danger" id="alerta" style="text-align: center; display: none;">
						
					</div>
				</div>
			</form>
		</div>

		{include file="footer.tpl"}
	</div>
	{include file = "cambiarContrasenia.tpl"}
</body>

</html>