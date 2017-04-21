<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-21 18:10:10
         compiled from "vistas\signup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1844658f80d752b5502-04667526%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '058342efb0b0b26b44821a1f9364a58a116a44d1' => 
    array (
      0 => 'vistas\\signup.tpl',
      1 => 1492798209,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1844658f80d752b5502-04667526',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58f80d7543adf2_12807387',
  'variables' => 
  array (
    'location' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f80d7543adf2_12807387')) {function content_58f80d7543adf2_12807387($_smarty_tpl) {?><!DOCTYPE html>
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
	Sign Up
	<br>
	<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<!-- Incluir la vista del footer último. Más abajo no debe haber más código -->
</body>
</html><?php }} ?>
