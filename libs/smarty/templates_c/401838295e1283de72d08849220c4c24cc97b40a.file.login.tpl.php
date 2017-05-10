<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-10 18:54:04
         compiled from "vistas\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1922358f92460e8c0a9-93187157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '401838295e1283de72d08849220c4c24cc97b40a' => 
    array (
      0 => 'vistas\\login.tpl',
      1 => 1494442380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1922358f92460e8c0a9-93187157',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58f92460f23213_29986778',
  'variables' => 
  array (
    'location' => 0,
    'classMain' => 0,
    'classLogueado' => 0,
    'success' => 0,
    'ci' => 0,
    'alert' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f92460f23213_29986778')) {function content_58f92460f23213_29986778($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	
	<base href="/Volquetas/">
	<?php echo $_smarty_tpl->getSubTemplate ("bs_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<link rel = "stylesheet" href = "css/signup_login.css"/>
	<!--<?php echo '<script'; ?>
 src="https://apis.google.com/js/platform.js" async defer><?php echo '</script'; ?>
>-->
	<!--<?php echo '<script'; ?>
 src="/Volquetas/js/google.js"><?php echo '</script'; ?>
>-->
	<!-- <meta name="google-signin-client_id" content="534305849473-1d345eeam5j3fguteipt6tv95ufh8nm6.apps.googleusercontent.com"> -->

<!-- La variable $location tendrá el valor de la página a la que vamos. Paysandú Limpia es constante en todas las páginas. -->
	<title><?php echo $_smarty_tpl->tpl_vars['location']->value;?>
 - Paysandú Limpia</title>
</head>
<body>	
	<div class="wrapper">
	<!-- Incluir la vista del header al principio -->

		<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 

	<!-- Comienzo del HTML de esta página -->
	
		<div id = "main" class = "<?php echo $_smarty_tpl->tpl_vars['classMain']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['classLogueado']->value;?>
"  style = "height: 88.7%;">
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
							<div class="form-group col-sm-12 has-feedback <?php if ($_smarty_tpl->tpl_vars['success']->value=='no') {?>has-error<?php }?>">
								<label class="control-label" for="cedulaUsuario">Cédula de Identidad</label>
								<input type="text" id="cedulaUsuario" class="form-control" name="cedulaUsuario" value = "<?php echo $_smarty_tpl->tpl_vars['ci']->value;?>
"/>
								<span class="glyphicon glyphicon-user form-control-feedback"></span>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-12 has-feedback <?php if ($_smarty_tpl->tpl_vars['success']->value=='no') {?>has-error<?php }?>">
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
				<?php if ($_smarty_tpl->tpl_vars['success']->value=="si") {?>
					<div class="alert alert-success row" id = "alertLogin" style="display: <?php echo $_smarty_tpl->tpl_vars['alert']->value;?>
; text-align:center;">
				<?php } else { ?>
					<div class="alert alert-danger row" id = "alertLogin" style="display: <?php echo $_smarty_tpl->tpl_vars['alert']->value;?>
; text-align:center;">
				<?php }?>
					<div class="col-sm-12">
						<?php if ($_smarty_tpl->tpl_vars['success']->value=="si") {?>
							<center><strong>¡ÉXITO!</strong><center>
							<center><p>El nuevo usuario ha sido agreado de manera correcta</p></center>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['error']->value=="empty") {?>
							<center><strong>ERROR</strong><center>
							<center><p>No se han completado campos obligatorios</p></center>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['error']->value=="error") {?>
							<center><strong>ERROR</strong><center>
							<center><p>Cédula de identidad y/o contraseña errónea/s</p></center>
						<?php }?>
					</div>	
				</div>	
			</div>
			
		</div>

		<!-- Finl del HTML de esta página -->
		
		<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>

	<?php if ($_smarty_tpl->tpl_vars['classLogueado']->value=="noLogueado") {?>
		<?php echo '<script'; ?>
 src = "js/facebook.js"><?php echo '</script'; ?>
>
	<?php }?>
	<!-- Incluir la vista del footer último. Más abajo no debe haber más código -->

	  <?php echo '<script'; ?>
>startApp();<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
