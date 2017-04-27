<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-27 15:33:50
         compiled from "vistas\nuevaIncidencia.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2534759020b0516a345-85315128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81c2dedc5a49c24045e0b0a27575146e6d754ca2' => 
    array (
      0 => 'vistas\\nuevaIncidencia.tpl',
      1 => 1493307168,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2534759020b0516a345-85315128',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59020b051d1e11_05611004',
  'variables' => 
  array (
    'location' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59020b051d1e11_05611004')) {function content_59020b051d1e11_05611004($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<base href = "/Volquetas/">
	<?php echo $_smarty_tpl->getSubTemplate ("bs_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<title><?php echo $_smarty_tpl->tpl_vars['location']->value;?>
 - Paysandú Limpia</title>
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<div class = "main" style = "position: fixed; width: 100%; height: 85.3%; overflow-y: auto">
		<div class = "contenedor">
			<p class = "pasoIncidencia">1. Indicar la volqueta que presenta el inconveniente</p>
			<div id = "mapNuevaIncidencia"></div>
		</div>
	</div>
	<?php echo '<script'; ?>
 src = "js/markers.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src = "js/leafletNuevaIncidencia.js"><?php echo '</script'; ?>
>
	<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html><?php }} ?>
