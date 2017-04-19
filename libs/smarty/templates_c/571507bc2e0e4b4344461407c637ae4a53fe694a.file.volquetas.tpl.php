<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-05 21:47:51
         compiled from "vistas\volquetas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1213558e565ea76bcd6-61268306%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '571507bc2e0e4b4344461407c637ae4a53fe694a' => 
    array (
      0 => 'vistas\\volquetas.tpl',
      1 => 1491428870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1213558e565ea76bcd6-61268306',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58e565ea83ffd3_84811087',
  'variables' => 
  array (
    'url_base' => 0,
    'proyecto' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58e565ea83ffd3_84811087')) {function content_58e565ea83ffd3_84811087($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<base href = "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
">
	<meta charset = "utf-8">
	<title><?php echo $_smarty_tpl->tpl_vars['proyecto']->value;?>
</title>
	<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.0/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.3.3/underscore-min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/funciones.js"><?php echo '</script'; ?>
>
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("cabezal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<h1>Buuuu! te asusto</h1>
	<?php echo $_smarty_tpl->getSubTemplate ("favoritos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html><?php }} ?>
