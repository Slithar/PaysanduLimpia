<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-05 00:03:53
         compiled from "vistas\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1922358f92460e8c0a9-93187157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '401838295e1283de72d08849220c4c24cc97b40a' => 
    array (
      0 => 'vistas\\login.tpl',
      1 => 1493942327,
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
    'alert' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f92460f23213_29986778')) {function content_58f92460f23213_29986778($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	
	<base href="/Volquetas/">
	<?php echo $_smarty_tpl->getSubTemplate ("bs_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- La variable $location tendrá el valor de la página a la que vamos. Paysandú Limpia es constante en todas las páginas. -->
	<title><?php echo $_smarty_tpl->tpl_vars['location']->value;?>
 - Paysandú Limpia</title>
</head>
<body>	
	<div  class="wrapper">
	<!-- Incluir la vista del header al principio -->

		<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 

	<!-- Comienzo del HTML de esta página -->
	
		<div class="container-fluid midPage login">
			<div class="row">
				<form id="formLogin" method="POST" accept-charset="utf-8" class="col-sm-12">
					<div class="row">
						<div class="form-group col-sm-12 has-feedback">
							<label class="control-label" for="cedulaUsuario">Cédula de Identidad</label>
							<input type="text" id="cedulaUsuario" class="form-control" name="cedulaUsuario">
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-12 has-feedback">
							<label class="control-label" for="passwordUsuario">Contraseña</label>
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
			<div class="alert alert-danger row" style="visibility:<?php echo $_smarty_tpl->tpl_vars['alert']->value;?>
; text-align:center;">
				<div class="col-sm-12">
					Los datos ingresados son incorrectos. Por favor intente de nuevo.<br>
					<span><a href="#">¿Ha olvidado su contraseña?</a></span>
				</div>	
			</div>	
		</div>
	</div>

	<!-- Finl del HTML de esta página -->
	
	<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
	<!-- Incluir la vista del footer último. Más abajo no debe haber más código -->
</body>
</html><?php }} ?>
