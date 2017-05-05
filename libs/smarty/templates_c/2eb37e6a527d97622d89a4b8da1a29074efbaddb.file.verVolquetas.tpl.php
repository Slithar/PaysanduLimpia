<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-05 22:14:52
         compiled from "vistas\verVolquetas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:530958fff7b674be24-08114819%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2eb37e6a527d97622d89a4b8da1a29074efbaddb' => 
    array (
      0 => 'vistas\\verVolquetas.tpl',
      1 => 1494022488,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '530958fff7b674be24-08114819',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58fff7b67ebe12_29818773',
  'variables' => 
  array (
    'location' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fff7b67ebe12_29818773')) {function content_58fff7b67ebe12_29818773($_smarty_tpl) {?><!DOCTYPE html>
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
	
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	<div id = "main" style = "position: fixed; width: 100%; height: 100%;">
		<div id = "map">
		</div>
	</div>
	<div class = "referencias">
		<div class = "divGreenMarker">
			<img src = "img/greenMarker.png" class = "greenMarker"/>
			<label class = "lblGreenMarker">Sin incidencias</label>
			<label id = "lblCantidadGreen"></label>
		</div>
		<div class = "divOrangeMarker">
			<img src = "img/orangeMarker.png" class = "orangeMarker"/>
			<label class = "lblOrangeMarker">Trabajando sobre incidencias</label>
			<label id = "lblCantidadOrange"></label>
		</div>
		<div class = "divRedMarker">
			<img src = "img/redMarker.png" class = "redMarker"/>
			<label class = "lblRedMarker">Con incidencias pendientes</label>
			<label id = "lblCantidadRed"></label>
		</div>
	</div>
	<?php echo '<script'; ?>
 src = "js/markers.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src = "js/leafletVerVolquetas.js"><?php echo '</script'; ?>
>
	<!-- Incluir la vista del footer último. Más abajo no debe haber más código -->	
	<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html><?php }} ?>
