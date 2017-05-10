<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-10 18:42:48
         compiled from "vistas\verPerfil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:98985909fdca410ba6-42760465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef553e8fa02bc01f45e4c087fe2a05a914b2010a' => 
    array (
      0 => 'vistas\\verPerfil.tpl',
      1 => 1494441754,
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
    'ci' => 0,
    'nombre' => 0,
    'apellido' => 0,
    'email' => 0,
    'fotoPerfil' => 0,
    'funcionario' => 0,
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
</head>
<body>
	<!-- Incluir la vista del header al principio -->
	<div class = "wrapper">
		<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		Ci:<span class="label label-default"><?php echo $_smarty_tpl->tpl_vars['ci']->value;?>
</span>
		Nombre: <input type = "text" value = "<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
"/>
		Apellido:<input type = "text" value = "<?php echo $_smarty_tpl->tpl_vars['apellido']->value;?>
"/>
		Email:<input type = "text" value = "<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
"/>
		Foto Perfil:<img src="<?php echo $_smarty_tpl->tpl_vars['fotoPerfil']->value;?>
">
		<?php if ($_smarty_tpl->tpl_vars['funcionario']->value=="0") {?>
		Tipo:<span class="label label-default">estandar</span>
		<?php } else { ?>
		Tipo:<span class="label label-default">Funcionario</span>
		<?php }?>
	 	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalCambiarContrasenia">Cambiar contraseña</button>
		 <button type="button" class="btn btn-success">Modificar</button>
		<!-- <?php echo '<script'; ?>
 src = "js/leafletVerVolquetas.js"><?php echo '</script'; ?>
>  -->	
		<!-- Incluir la vista del footer último. Más abajo no debe haber más código -->	
		<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
	<?php echo $_smarty_tpl->getSubTemplate ("cambiarContrasenia.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>

</html><?php }} ?>
