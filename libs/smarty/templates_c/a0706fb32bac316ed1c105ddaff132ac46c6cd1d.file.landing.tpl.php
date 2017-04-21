<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-21 17:41:49
         compiled from "vistas\landing.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2976558f930fb5c2c05-92729639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0706fb32bac316ed1c105ddaff132ac46c6cd1d' => 
    array (
      0 => 'vistas\\landing.tpl',
      1 => 1492796508,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2976558f930fb5c2c05-92729639',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58f930fb5c54e3_35021362',
  'variables' => 
  array (
    'location' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f930fb5c54e3_35021362')) {function content_58f930fb5c54e3_35021362($_smarty_tpl) {?><!DOCTYPE html>
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
 
	<br>
	Landing Page.
	<br>
	<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<!-- Incluir la vista del footer último. Más abajo no debe haber más código -->
</body>
</html><?php }} ?>
