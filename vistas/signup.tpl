<!DOCTYPE html>
<html>
<head>
	
	<base href="/Volquetas/">
	{include file="bs_js.tpl"}
<!-- La variable $location tendrá el valor de la página a la que vamos. Paysandú Limpia es constante en todas las páginas. -->
	<title>{$location} - Paysandú Limpia</title>
</head>
<body>
	<!-- Incluir la vista del header al principio -->
	<div class="wrapper">
		{include file="header.tpl"}
		<div class="container-fluid">
			<form id="formSignup" method="POST" accept-charset="utf-8" class="midPage signup">

				<div class="row">
					<div class="form-group col-sm-12">
						<label for="ci" class="control-label">Cédula de identidad</label>
						<input type="text" id="ci" class="form-control" placeholder="12345678">
					</div>
				</div>	

				<div class="row">
					<div class="form-group col-sm-6">
						<label for="nombre" class="control-label">Nombre</label>
						<input type="text" name="nombre" class="form-control" placeholder="José">
					</div>

					<div class="form-group col-sm-6">
						<label for="apellido" class="control-label">Apellido</label>
						<input type="text" name="apellido" class="form-control" placeholder="Pérez">	
					</div>	
				</div>

				<div class="row">
					<div class="form-group col-sm-6">
						<label for="psw1">Contraseña</label>
						<input type="password" name="psw1" class="form-control" placeholder="Más de 6 caracteres">
					</div>

					<div class="form-group col-sm-6">
						<label for="psw2">Repetir contraseña</label>
						<input type="password" name="psw2" class="form-control" placeholder="Más de 6 caracteres">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-sm-12">
						<label for="email" class="control-label">Email</label>
						<input type="email" name="email" class="form-control" placeholder="jperez@correo.com">
					</div>	
				</div>

				<div class="row">
					<div class="checkbox col-sm-12">
						<label><input name="informacion	" type="checkbox" checked>Quiero recibir información por correo electrónico</label>	
					</div>	
				</div>
				<div class="row">
					<div class="form-group col-sm-12" style="text-align: center;">
						<input type="submit" name="subBoton" value="Registrarme" class="btn btn-info">	
					</div>	
				</div>
			</form>
		</div>

	</div>
	{include file="footer.tpl"}
	<!-- Incluir la vista del footer último. Más abajo no debe haber más código -->
</body>
</html>