<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-09 20:05:06
         compiled from "vistas\verTodasLasIncidencias.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10825935f82015f786-36142992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3915375f14f3e646f08181e321223c17a6f8856e' => 
    array (
      0 => 'vistas\\verTodasLasIncidencias.tpl',
      1 => 1497038693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10825935f82015f786-36142992',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5935f82033aef4_30907212',
  'variables' => 
  array (
    'location' => 0,
    'classMain' => 0,
    'classLogueado' => 0,
    'estadosIncidencia' => 0,
    'e' => 0,
    'estado' => 0,
    'orden' => 0,
    'busqueda' => 0,
    'incidenciasActuales' => 0,
    'incidencia' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5935f82033aef4_30907212')) {function content_5935f82033aef4_30907212($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<base href = "/Volquetas/">
	<?php echo $_smarty_tpl->getSubTemplate ("bs_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<title><?php echo $_smarty_tpl->tpl_vars['location']->value;?>
 - Paysandú Limpia</title>
	<?php echo $_smarty_tpl->getSubTemplate ("leaflet_plugins.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<link rel = "stylesheet" href = "css/incidencia_volquetas.css"/>
	<?php echo '<script'; ?>
 src = "js/incidencias.js"><?php echo '</script'; ?>
>
</head>
<body>

	<div class = "wrapper">
		<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<div id = "main" class = "<?php echo $_smarty_tpl->tpl_vars['classMain']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['classLogueado']->value;?>
">
			<div class = "contenedor">
				<div class = "divBusqueda">
					<label for = "comboEstadoTodasIncidencias">Estado:&nbsp;&nbsp;</label>
					<select id = "comboEstadoTodasIncidencias" class = "form-control" style = "margin-right: 2%;">
						<option value = "0">Todas</option>
						<?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['e']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['estadosIncidencia']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value) {
$_smarty_tpl->tpl_vars['e']->_loop = true;
?>							
							<option value = "<?php echo $_smarty_tpl->tpl_vars['e']->value['codigo'];?>
" <?php if ($_smarty_tpl->tpl_vars['e']->value['codigo']==$_smarty_tpl->tpl_vars['estado']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['e']->value['descripcion'];?>
</option>					
						<?php } ?>
					</select>
					<label for = "comboOrden">Ordenar por:&nbsp;&nbsp;</label>
					<select id = "comboOrden" class = "form-control">
						<option value = "asc" <?php if ($_smarty_tpl->tpl_vars['orden']->value=="asc") {?>selected<?php }?>>Fecha reporte (ascendente)</option>
						<option value = "desc" <?php if ($_smarty_tpl->tpl_vars['orden']->value=="desc") {?>selected<?php }?>>Fecha reporte (descendente)</option>
					</select>
					<div class="input-group busquedaIncidencia" style = "width: 41.5%;">
				      <input type="text" class="form-control" value = "<?php echo $_smarty_tpl->tpl_vars['busqueda']->value;?>
" placeholder="Código, dirección o categoría de incidencia" id = "txtBusquedaTodasIncidencias">
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="button" id = "btnBuscarTodasIncidencias"><span class = "fa fa-search"></span></button>
				      </span>
				    </div>
				</div>
				<table class = "table table-striped" id = "tblVerTodasLasIncidencias" style = "margin-top: 50px;">
					<thead>
						<tr>
							<th style = "width: 25%;">Volqueta</th>
							<th style = "width: 20%;">Categoría</th>
							<th style = "width: 12.5%;">Primer reporte</th>
							<th style = "width: 12.5%;">Finalización</th>
							<th style = "width: 15%;">Estado</th>
							<th style = "width: 5%;">Cantidad</th>
							<th style = "width: 5%; text-align: center;">Ver</th>
							<th style = "width: 5%; text-align: center;">Confirmar</th>
						</tr>
					</thead>
					<tbody>
						<?php  $_smarty_tpl->tpl_vars['incidencia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['incidencia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['incidenciasActuales']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['incidencia']->key => $_smarty_tpl->tpl_vars['incidencia']->value) {
$_smarty_tpl->tpl_vars['incidencia']->_loop = true;
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['incidencia']->value['numeroVolqueta'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['incidencia']->value['categoria'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['incidencia']->value['fechaHoraReporte'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['incidencia']->value['fechaHoraSolucion'];?>
</td>
								<td>
									<select class = "form-control cmbEstadoIncidencia" id = "select<?php echo $_smarty_tpl->tpl_vars['incidencia']->value['numeroOrden'];?>
" style = "margin-top: -7px; <?php if ($_smarty_tpl->tpl_vars['incidencia']->value['estado']=="1") {?>color: #E71D1D<?php }
if ($_smarty_tpl->tpl_vars['incidencia']->value['estado']=="2") {?>color: #E7B81D<?php }
if ($_smarty_tpl->tpl_vars['incidencia']->value['estado']=="3") {?>color: #269C1B<?php }?>">
										<?php  $_smarty_tpl->tpl_vars['estado'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['estado']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['estadosIncidencia']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['estado']->key => $_smarty_tpl->tpl_vars['estado']->value) {
$_smarty_tpl->tpl_vars['estado']->_loop = true;
?>							
											<option value = "<?php echo $_smarty_tpl->tpl_vars['estado']->value['codigo'];?>
" <?php if ($_smarty_tpl->tpl_vars['estado']->value['codigo']==$_smarty_tpl->tpl_vars['incidencia']->value['estado']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['estado']->value['descripcion'];?>
</option>	
										<?php } ?>
									</select>
								</td>
								<td style = "text-align: right;"><?php echo $_smarty_tpl->tpl_vars['incidencia']->value['cantidad'];?>
</td>
								<td style = "text-align: center;"><a href = "/Volquetas/incidencia/verIncidenciasReportadas/<?php echo preg_replace('!\s+!u', '',substr($_smarty_tpl->tpl_vars['incidencia']->value['numeroVolqueta'],0,3));?>
/<?php echo $_smarty_tpl->tpl_vars['incidencia']->value['codigoCategoria'];?>
/<?php echo $_smarty_tpl->tpl_vars['incidencia']->value['estado'];?>
/<?php echo $_smarty_tpl->tpl_vars['incidencia']->value['fechaHoraSolucion'];?>
" class = "iconoVerTodasLasIncidencias iconoVerGrupoIncidencias"><span class = "fa fa-eye"></span></a></td>
								<td style = "text-align: center;"><a onclick = "confirmarEstado(<?php echo preg_replace('!\s+!u', '',substr($_smarty_tpl->tpl_vars['incidencia']->value['numeroVolqueta'],0,3));?>
,<?php echo $_smarty_tpl->tpl_vars['incidencia']->value['codigoCategoria'];?>
, <?php echo $_smarty_tpl->tpl_vars['incidencia']->value['estado'];?>
, <?php echo $_smarty_tpl->tpl_vars['incidencia']->value['numeroOrden'];?>
, '<?php echo $_smarty_tpl->tpl_vars['incidencia']->value['fechaHoraSolucion'];?>
');" class = "iconoVerTodasLasIncidencias iconoConfirmarIncidencia"><span class = "fa fa-pencil"></span></a></td>
							</tr>
						<?php } ?>
						
					</tbody>
				</table>
				
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
