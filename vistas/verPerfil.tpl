<!DOCTYPE html>
<html>
<head>
	
	<base href="/Volquetas/">
	{include file="bs_js.tpl"}
	
<!-- La variable $location tendrá el valor de la página a la que vamos. Paysandú Limpia es constante en todas las páginas. -->
	<title>{$location} - Paysandú Limpia</title>
	<link rel = "stylesheet" href = "css/signup_login.css"/>
	<script src = "js/signup_functions.js"></script>
</head> 
<body>
	<!-- Incluir la vista del header al principio -->
	<div class = "wrapper">
		
		{include file="header.tpl"}
		<div id = "main" class="container-fluid {$classMain} {$classLogueado}">
			{if $tipo eq "paysandulimpia"}
				<form id="formModificar" action="/Volquetas/usuario/modificar" method="POST" enctype="multipart/form-data" accept-charset="utf-8" class="modificar">
					<div class="row">
						<div class="form-group col-sm-12">
							<label for="ci" class="control-label" style = "font-size: 17px">Cédula de identidad: {$ci}</label>
						</div>
					</div>	
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="nombre" class="control-label">Nombre: </label>
							<input type="text" id="nombreUsuario" name="nombre" class="form-control" value="{$nombreModificar}"  />
						</div>
					
						<div class="form-group col-sm-6">
							<label for="apellido" class="control-label">Apellido: </label>
							<input type="text" name="apellido" class="form-control" value="{$apellidoModificar}" />	
						</div>

					</div>				
					<div class="row">
						<div class="form-group col-sm-12">
							<label for="email" class="control-label">Correo electrónico: </label>
							<input type="email" name="email" class="form-control" value="{$email}" name = "email"/>
						</div>	
					</div>				
					<br>
					<div class="row">
						<center>
							<div class="col-sm-12">						
							    <img id="imagenPreview" src="{$fotoPerfil}" alt="Imagen" title="Imagen" " style="width: 175px; height: 175px; border-radius: 50%; padding: 8px;">
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
							<label><input name="enviarEmail" type="checkbox" {if $enviarCorreo eq "1"} checked {/if}>Quiero recibir información por correo electrónico</label>	
						</div>	
					</div>
					<br><br>
					<div class="row">
						<center>
							<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalCambiarContrasenia" style = "width: 35%; margin-left: 0"><span class = "fa fa-lock"></span>&nbsp;&nbsp;<b>Cambiar contraseña</b></button>
							&nbsp;&nbsp;&nbsp;&nbsp;
					 		<button type="submit" class="btn btn-success" id = "btnModificarb" style = "width: 17%;"><span class = "fa fa-pencil"></span>&nbsp;&nbsp;<b>Modificar</b></button>
					 		&nbsp;&nbsp;&nbsp;&nbsp;	
					 		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminarUsuario" style = "width: 25%;"><span class = "fa fa-times"></span>&nbsp;&nbsp;<b>Borrar mi cuenta</b></button>
				 		</center>
					</div>
					<br>
					<div class="row">
						<div class="alert alert-danger" id="alerta" style="text-align: center; display: none; margin-top: 30px;">
							
						</div>
						<div class="alert alert-success" style="margin-top: 30px; text-align: center; display: {if $success eq "si"}block;{else}none;{/if}">
							<strong>¡ÉXITO!</strong>&nbsp;&nbsp;Los cambios han sido realizado de manera correcta
						</div>
					</div>
				</form>
			{else}
				<div class = "contenedor" style = "max-width: 990px; margin: 0 auto;">
					<label style = "font-size: 18px; text-align: center; width: 100%; margin-top: 175px">No has iniciado sesión con una cuenta de Paysandú Limpia, por lo que no tienes un perfil asignado.</label>
					<label style = "font-size: 18px; text-align: center; width: 100%;">En caso de no tener  dicha cuenta, por favor cerrar sesión actual para luego registrar.</label>
					<br><br><br><br>
					<div style = "width: 100%; display: block;" id = "divOpciones">
						<button type = "button" class = "btn btn-danger" style = "margin: 0 auto; font-size: 18px; margin-left: 33%; width: 18%"  {if $tipo eq "google"}onclick = "LogOutGoogle();"{else}onclick = "logout();"{/if} id = "btnRegistrarPerfil"><span class = "fa fa-sign-out"></span>&nbsp;&nbsp;<b>Cerrar sesión</b></button>&nbsp;&nbsp;
						<button type = "button" class = "btn btn-success" style = "margin: 0 auto; font-size: 18px; width: 18%" onclick = "window.location.href = '/Volquetas/usuario/landing'"><span class = "fa fa-check"></span>&nbsp;&nbsp;<b>Aceptar</b></button>
						
					</div>
					
				</div>
			{/if}
		</div>

		{include file="footer.tpl"}
	</div>
	<div id="eliminarUsuario" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Eliminar usuario</h4>
	      </div>
	      <div class="modal-body" style = "box-sizing: border-box;">
	        <p><b>¿Está seguro que desea eliminar el usuario?</b></p>
	        <p>Nota: si elimina el usuario se perderán sus datos y se cerrará su sesión</p>
	      </div>
	      <div class="modal-footer">
	       <button type="submit" class="btn btn-success" id ="eliminarPass" onclick = "window.location.href = '/Volquetas/usuario/banneado'"><b>Aceptar</b></button>
	       <button type="button" class="btn btn-danger" data-dismiss = "modal"><b>Cancelar</b></button>
	      </div>
	    </div>

	  </div>
	</div>
	{include file = "cambiarContrasenia.tpl"}
</body>

</html>