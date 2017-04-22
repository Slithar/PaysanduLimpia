<!DOCTYPE html>
<html>
<head>
	
	<base href="/Volquetas/">
	{include file="bs_js.tpl"}
<!-- La variable $location tendrá el valor de la página a la que vamos. Paysandú Limpia es constante en todas las páginas. -->
	<title>{$location} - Paysandú Limpia</title>
</head>
<body>	
	<div  class="wrapper">
	<!-- Incluir la vista del header al principio -->

		{include file="header.tpl"} 

	<!-- Comienzo del HTML de esta página -->
	
		<div class="container-fluid">
			<form id="formLogin" method="POST" accept-charset="utf-8" class="solo-login">
				<div class="row">
					<div class="form-group col-sm-12 has-feedback">
						<label class="control-label" for="cedulaUsuario">Cédula de Identidad</label>
						<input type="text" id="cedulaUsuario" class="form-control" name="cedulaUsuario">
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-12 has-feedback">
						<label for="passwordUsuario">Contraseña</label>
						<span><a href="#">¿Ha olvidado su contraseña?</a></span>
						<input type="password" id="passwordUsuario" class="form-control" name="passwordUsuario">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-12" style="text-align: center;">
						<input type="submit" id="enviarFormLogin" value="Ingresar" class="btn btn-success">
					</div>
				</div>
			</form>
		</div>		
	</div>

	<!-- Finl del HTML de esta página -->
	
	{include file="footer.tpl"}
	
	<!-- Incluir la vista del footer último. Más abajo no debe haber más código -->
</body>
</html>