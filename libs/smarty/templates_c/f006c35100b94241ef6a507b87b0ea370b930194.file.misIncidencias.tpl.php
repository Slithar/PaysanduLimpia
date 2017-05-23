<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-20 22:18:19
         compiled from "vistas\misIncidencias.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31542591daddf102989-93287296%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f006c35100b94241ef6a507b87b0ea370b930194' => 
    array (
      0 => 'vistas\\misIncidencias.tpl',
      1 => 1495318695,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31542591daddf102989-93287296',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_591daddf2b1001_87233541',
  'variables' => 
  array (
    'location' => 0,
    'classMain' => 0,
    'classLogueado' => 0,
    'cantidad' => 0,
    'estadosIncidencia' => 0,
    'estado' => 0,
    'selected' => 0,
    'busqueda' => 0,
    'incidencias' => 0,
    'incidencia' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591daddf2b1001_87233541')) {function content_591daddf2b1001_87233541($_smarty_tpl) {?><!DOCTYPE html>
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
			<div class = "contenedor">
				<div class = "divBusqueda">
					<label style = "margin-right: 7%;">
						<?php if ($_smarty_tpl->tpl_vars['cantidad']->value=="0") {?>
							No hay incidencias
						<?php } elseif ($_smarty_tpl->tpl_vars['cantidad']->value=="1") {?>
							1 incidencia
						<?php } else { ?>
							<?php echo $_smarty_tpl->tpl_vars['cantidad']->value;?>
 incidencias
						<?php }?>	
					</label>
					<label for = "comboEstado">Estado:&nbsp;&nbsp;</label>
					<select id = "comboEstado" class = "form-control">
						<option value = "0">Todas</option>
						<?php  $_smarty_tpl->tpl_vars['estado'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['estado']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['estadosIncidencia']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['estado']->key => $_smarty_tpl->tpl_vars['estado']->value) {
$_smarty_tpl->tpl_vars['estado']->_loop = true;
?>							
							<option value = "<?php echo $_smarty_tpl->tpl_vars['estado']->value['codigo'];?>
" <?php if ($_smarty_tpl->tpl_vars['estado']->value['codigo']==$_smarty_tpl->tpl_vars['selected']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['estado']->value['descripcion'];?>
</option>					
						<?php } ?>
					</select>
					<div class="input-group busquedaIncidencia">
				      <input type="text" class="form-control" value = "<?php echo $_smarty_tpl->tpl_vars['busqueda']->value;?>
" placeholder="Código, dirección o descripción de incidencia" id = "txtBusqueda">
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="button" id = "btnBuscar"><span class = "fa fa-search"></span></button>
				      </span>
				    </div>
				</div>
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
				<?php } ?>
				<!--
				<div class = "contenedorIncidencia">
					<img src = "img/Volquetas/27.png" style = "width: 27%; height: 100%; border-radius: 15px 0 0 15px">
				</div>
				<div class = "contenedorIncidencia">
					<img src = "img/Volquetas/27.png" style = "width: 27%; height: 100%; border-radius: 15px 0 0 15px">
				</div>
				<div class = "contenedorIncidencia">
					<img src = "img/Volquetas/27.png" style = "width: 27%; height: 100%; border-radius: 15px 0 0 15px">
				</div>
				-->

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
