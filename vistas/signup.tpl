<!DOCTYPE html>
<html>
<head>
	
	<base href="/Volquetas/">
	{include file="bs_js.tpl"}
	<meta charset="utf-8">

	<!-- <link rel="shortcut icon" type="image/ico" href="img/iconoPaysanduLimpia.ico" />

	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/funciones.js"></script>
	<link rel="stylesheet" type="text/css" href="css/signup.css"> -->
<!-- La variable $location tendrá el valor de la página a la que vamos. Paysandú Limpia es constante en todas las páginas. -->
	<title>{$location} - Paysandú Limpia</title>
</head>
<body>
	<!-- Incluir la vista del header al principio -->
	{include file="header.tpl"}
	<div class="wrapper" style = "position: fixed; width: 100%; height: 80%; border: 2px solid black">
		
		<div class="container-fluid">
			<form id="formSignup" action="/Volquetas/usuario/registrar" method="POST" enctype="multipart/form-data" accept-charset="utf-8" class="midPage signup">

				<div class="row">
					<div class="form-group col-sm-12">
						<label for="ci" class="control-label">Cédula de identidad</label>
						<input type="text" id="ci" name="cedulaUsuario" class="form-control" placeholder="12345678">
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
						<label for="email" class="control-label">Email</label>
						<input type="email" name="emailUsuario" class="form-control" placeholder="jperez@correo.com">
					</div>	
				</div>

				<div class="row">
					<div class="col-sm-12">
						<label for="fotoP">Foto de perfil</label>
						<span><label class="btn btn-primary btn-file">
						    Buscar <input id="imgInp" name="fotoPerfil" type="file" style="display: none;">
						</label></span>
						
					    <img id="imagenPreview" src="img/sinFoto.png" alt="Imagen" title="Imagen" style="width: 115px; height: 115px; border-radius: 50%; padding: 8px;">
					</div>
				</div>

				<div class="row">
					<div class="checkbox col-sm-12">
						<label><input name="enviarEmail" type="checkbox" checked>Quiero recibir información por correo electrónico</label>	
					</div>	
				</div>
				
				<div class="row">
					<div class="form-group col-sm-12" style="text-align: center;">
						<input type="submit" name="subBoton" id="subBoton" value="Registrarme" class="btn btn-info">	
					</div>	
				</div>

				<div class="row">
					<div class="col-sm-12 alert alert-danger" id="alerta" style="visibility: hidden; text-align: center;">
						
					</div>
				</div>
			</form>
		</div>

	</div>
	{include file="footer.tpl"}
	<!-- Incluir la vista del footer último. Más abajo no debe haber más código -->
</body>
</html>