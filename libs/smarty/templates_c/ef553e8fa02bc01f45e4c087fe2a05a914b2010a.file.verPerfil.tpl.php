<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-10 20:51:25
         compiled from "vistas\verPerfil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:98985909fdca410ba6-42760465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef553e8fa02bc01f45e4c087fe2a05a914b2010a' => 
    array (
      0 => 'vistas\\verPerfil.tpl',
      1 => 1494449482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98985909fdca410ba6-42760465',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5909fdca5f78c8_36831065',
  'variables' => 
  array (
    'location' => 0,
    'classMain' => 0,
    'classLogueado' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5909fdca5f78c8_36831065')) {function content_5909fdca5f78c8_36831065($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	
	<base href="/Volquetas/">
	<?php echo $_smarty_tpl->getSubTemplate ("bs_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
<!-- La variable $location tendrá el valor de la página a la que vamos. Paysandú Limpia es constante en todas las páginas. -->
	<title><?php echo $_smarty_tpl->tpl_vars['location']->value;?>
 - Paysandú Limpia</title>
	<link rel = "stylesheet" href = "css/signup_login.css"/>
</head> 
<body>
	<!-- Incluir la vista del header al principio -->
	<div class = "wrapper">
		
		<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<div id = "main" class="container-fluid <?php echo $_smarty_tpl->tpl_vars['classMain']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['classLogueado']->value;?>
">
			<form id="formModificar" action="/Volquetas/usuario/modificar" method="POST" enctype="multipart/form-data" accept-charset="utf-8" class="midPage modificar">
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

		<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
	<?php echo $_smarty_tpl->getSubTemplate ("cambiarContrasenia.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>

</html><?php }} ?>
