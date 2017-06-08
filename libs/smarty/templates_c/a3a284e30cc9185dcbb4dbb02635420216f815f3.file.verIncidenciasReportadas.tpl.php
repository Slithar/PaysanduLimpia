<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-07 22:40:08
         compiled from "vistas\verIncidenciasReportadas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:235455937411a42b1a2-35119636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3a284e30cc9185dcbb4dbb02635420216f815f3' => 
    array (
      0 => 'vistas\\verIncidenciasReportadas.tpl',
      1 => 1496875206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '235455937411a42b1a2-35119636',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5937411a5003b8_04047852',
  'variables' => 
  array (
    'location' => 0,
    'classMain' => 0,
    'classLogueado' => 0,
    'incidencias' => 0,
    'incidencia' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5937411a5003b8_04047852')) {function content_5937411a5003b8_04047852($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<base href = "/Volquetas/">
	<?php echo $_smarty_tpl->getSubTemplate ("bs_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<title><?php echo $_smarty_tpl->tpl_vars['location']->value;?>
 - Paysandú Limpia</title>
	<?php echo $_smarty_tpl->getSubTemplate ("leaflet_plugins.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<link rel = "stylesheet" href = "css/incidencia_volquetas.css"/>
</head>
<body>

	<div class = "wrapper">
		<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<div id = "main" class = "<?php echo $_smarty_tpl->tpl_vars['classMain']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['classLogueado']->value;?>
">
			<div class = "contenedor" style = "padding-top: 15px">
				<!--
				<?php  $_smarty_tpl->tpl_vars['incidencia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['incidencia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['incidencias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['incidencia']->key => $_smarty_tpl->tpl_vars['incidencia']->value) {
$_smarty_tpl->tpl_vars['incidencia']->_loop = true;
?>
					<div class = "contenedorIncidencia">
						<img src = "img/Volquetas/<?php echo $_smarty_tpl->tpl_vars['incidencia']->value['numeroVolqueta'];?>
.png" style = "width: 27%; height: 100%; border-radius: 15px 0 0 15px">
						<div class = "datosIncidencia">
							<p style = "font-size: 18px; color: #0F3EA1; font-weight: bold;">Volqueta Nº <?php echo $_smarty_tpl->tpl_vars['incidencia']->value['numeroVolqueta'];?>
: <?php echo $_smarty_tpl->tpl_vars['incidencia']->value['direccion'];?>
</p>
							<br>
							<p style = "font-size: 15px;"><b>Código:</b> <?php echo $_smarty_tpl->tpl_vars['incidencia']->value['codigo'];?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Categoría:</b> <?php echo $_smarty_tpl->tpl_vars['incidencia']->value['categoria'];?>
</p>
							<p style = "font-size: 15px;"><b>Fecha y hora de reporte:</b> <?php echo $_smarty_tpl->tpl_vars['incidencia']->value['fecha'];?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Estado:</b> <span class = "incidencia<?php echo $_smarty_tpl->tpl_vars['incidencia']->value['estado'];?>
"><?php echo $_smarty_tpl->tpl_vars['incidencia']->value['estado'];?>
</span></p>
							
							<br>
							<p><a class = "btn btn-primary" href = "/Volquetas/incidencia/verIncidencia/<?php echo $_smarty_tpl->tpl_vars['incidencia']->value['codigo'];?>
"><span class = "fa fa-eye"></span>&nbsp;&nbsp;Ver incidencia</a></p>
						</div>
					</div>
				<?php } ?>-->
				<?php  $_smarty_tpl->tpl_vars['incidencia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['incidencia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['incidencias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['incidencia']->key => $_smarty_tpl->tpl_vars['incidencia']->value) {
$_smarty_tpl->tpl_vars['incidencia']->_loop = true;
?>
					<div class = "contenedorIncidencia">
						<img src = "img/Volquetas/<?php echo $_smarty_tpl->tpl_vars['incidencia']->value['numeroVolqueta'];?>
.png" style = "width: 27%; height: 100%; border-radius: 15px 0 0 15px">
						<div class = "datosIncidencia">
							<p style = "font-size: 18px; color: #0F3EA1; font-weight: bold;">Volqueta Nº <?php echo $_smarty_tpl->tpl_vars['incidencia']->value['numeroVolqueta'];?>
: <?php echo $_smarty_tpl->tpl_vars['incidencia']->value['direccion'];?>
</p>
							<br>
							<p style = "font-size: 15px;"><b>Código:</b> <?php echo $_smarty_tpl->tpl_vars['incidencia']->value['codigo'];?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Categoría:</b> <?php echo $_smarty_tpl->tpl_vars['incidencia']->value['categoria'];?>
</p>
							<p style = "font-size: 15px;"><b>Fecha y hora de reporte:</b> <?php echo $_smarty_tpl->tpl_vars['incidencia']->value['fecha'];?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Estado:</b> <span class = "incidencia<?php echo $_smarty_tpl->tpl_vars['incidencia']->value['estado'];?>
"><?php echo $_smarty_tpl->tpl_vars['incidencia']->value['estado'];?>
</span></p>
							
							<br>
							<p><a class = "btn btn-primary" href = "/Volquetas/incidencia/verIncidenciaDatos/<?php echo $_smarty_tpl->tpl_vars['incidencia']->value['codigo'];?>
"><span class = "fa fa-eye"></span>&nbsp;&nbsp;Ver incidencia</a></p>
						</div>
					</div>
				<?php } ?>

			</div>
		</div>
		<?php echo '<script'; ?>
 src = "js/markers.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src = "js/leafletNuevaIncidencia.js"><?php echo '</script'; ?>
>
		<link rel = "stylesheet" href = "css/select.css"/>
		<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
	
	<div class = "fondoNegro" id = "fondoNegro">
		<span class = "fa fa-times-circle-o" id = "btnCerrar" onclick = "cerrarModal();"></span>
		<img src = "img/img1.jpg" id = "imgModal"/>
	</div>
</body>
</html><?php }} ?>
