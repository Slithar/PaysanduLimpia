<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-29 17:13:21
         compiled from "vistas\nuevaIncidencia.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2534759020b0516a345-85315128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81c2dedc5a49c24045e0b0a27575146e6d754ca2' => 
    array (
      0 => 'vistas\\nuevaIncidencia.tpl',
      1 => 1493485535,
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
    'success' => 0,
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
			<?php if ($_smarty_tpl->tpl_vars['success']->value=="si") {?>
				<div class = "alert alert-success fadeIn" id = "successNuevaIncidencia" style = "margin-bottom: 50px;">
					<strong>¡ÉXITO!&nbsp;</strong>La nueva incidencia ha sido creada de manera correcta. Código: 1
				</div>
			<?php }?>
			<form action = "/Volquetas/incidencia/agregar" method = "POST" enctype="multipart/form-data" id = "formNuevaIncidencia">
				<p class = "pasoIncidencia">1. Indicar la volqueta que presenta el inconveniente</p>
				<div id = "mapNuevaIncidencia"></div>
				<div id = "ubiacionIncidencia">
					<label>Ubicación:</label>
					<br>
					<select class = "form-control" id = "selectUbicacion" onchange="cargarDirecciones();">
						<option value = "Esquina">Esquina</option>
						<option value = "Entre calles">Entre calles</option>
					</select>
				</div>
				<div id = "direccionIncidencia">
					<label>Dirección:</label>
					<br>
					<select class = "form-control" id = "selectDireccion" onchange="cargarNumeros();">
					</select>
				</div>
				<div id = "numeroIncidencia">
					<label>Número:</label>
					<br>
					<select class = "form-control" id = "selectNumero" name = "numero" onchange="marcarVolqueta();">
					</select>
				</div>
				<label class = "lblCheckbox"><input type="checkbox" value="" checked name = "ubicacionCorrecta">&nbsp;&nbsp;¿La volqueta se encuentra en el lugar indicado en el plano?</label>
				<p class = "pasoIncidencia" style = "margin-top: 75px;">2. Datos de la volqueta seleccionada</p>
				<div id = "severidadIncidencia">
					<label>Severidad:</label>
					<br>
					<select class = "form-control" id = "selectSeveridad" name = "severidad">
						<option value = "Baja">Baja</option>
						<option value = "Media">Media</option>
						<option value = "Alta">Alta</option>
						<option value = "Urgente">Urgente</option>
					</select>
				</div>
				<div id = "categoriaIncidencia">
					<label>Categoría:</label>
					<br>
					<select class = "form-control" id = "selectCategoria" name = "categoria">
						<option value = "La volqueta está llena">Volqueta llena</option>
						<option value = "La volqueta huele mal">La volqueta huele mal</option>
						<option value = "La volqueta se está incendiando">La volqueta se está incendiando</option>
						<option value = "La volqueta se ha dañado">La volqueta se ha dañado</option>
						<option value = "Otra">Otra</option>
					</select>
				</div>
				<label for = "resumen" class = "lblResumenDescripcion">Resúmen:</label>
				<input type = text name = "resumen" id = "resumen" class = "form-control" name = "resumen"/>
				<label for = "descripcion" class = "lblResumenDescripcion">Descripción:</label>
				<textarea id = "descripcion" class = "form-control" name = "descripcion"></textarea>
				<p class = "pasoIncidencia" style = "margin-top: 75px;">3. Adjuntar fotos y/o imágenes (opcional)</p>
				
				<label class="btn btn-default btn-file" id ="lblBuscar">
				    <span class = "fa fa-folder"></span>&nbsp;&nbsp;<b>Buscar</b><input type="file" multiple="true" name = "imagenes" id = "fileImagen" onchange = "readURL(this);" accept="image/jpg,image/png,image/jpg,image/gif,image/jpg,image/jpeg,image/bmp"/>
				</label>
				<label class="btn btn-default btn-file" id ="lblQuitar" onclick = "quitarFiles();"><span class = "fa fa-times"></span>&nbsp;&nbsp;<b>Quitar adjuntos</b></label>
				<ul class = "galeria">
				</ul>

				<div class = "alert alert-danger fadeIn" id = "dangerNuevaIncidencia" style = "margin-top: 50px; margin-bottom: 50px;">
					<strong>ADVERTENCIA:&nbsp;</strong>No se han completado campos obligatorios
				</div>
				<button type = "submit" id = "submitIncidencia" class = "btn btn-success"><span class = "fa fa-check-circle-o"></span>&nbsp;&nbsp;Aceptar</button>
			</form>
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

	<div class = "fondoNegro">
		<span class = "fa fa-times-circle-o" id = "btnCerrar" onclick = "cerrarModal();"></span>
		<img src = "img/img1.jpg" id = "imgModal"/>
	</div>
</body>
</html><?php }} ?>
