<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-03 11:06:29
         compiled from "vistas\verIncidencia.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18977591f66066ac479-07021860%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4bf0faa787e6d50cbed97426ae6ab46eb9d71025' => 
    array (
      0 => 'vistas\\verIncidencia.tpl',
      1 => 1499079979,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18977591f66066ac479-07021860',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_591f6606779194_31333487',
  'variables' => 
  array (
    'location' => 0,
    'classMain' => 0,
    'classLogueado' => 0,
    'success' => 0,
    'codigo' => 0,
    'numeroVolqueta' => 0,
    'estado' => 0,
    'direccion' => 0,
    'ubicacionCorrecta' => 0,
    'severidad' => 0,
    'categoria' => 0,
    'fecha' => 0,
    'fechaSolucion' => 0,
    'descripcion' => 0,
    'cantidadImagenes' => 0,
    'imagenes' => 0,
    'imagen' => 0,
    'cantidadComentarios' => 0,
    'todosLosComentarios' => 0,
    'c' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591f6606779194_31333487')) {function content_591f6606779194_31333487($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<base href = "/Volquetas/">
	<?php echo $_smarty_tpl->getSubTemplate ("bs_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<title><?php echo $_smarty_tpl->tpl_vars['location']->value;?>
 - Paysandú Limpia</title>
	<link rel = "stylesheet" href = "css/incidencia_volquetas.css"/>
	<?php echo '<script'; ?>
 src = "js/signup_functions.js"><?php echo '</script'; ?>
>
</head>
<body>

	<div class = "wrapper">
		<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<div id = "main" class = "<?php echo $_smarty_tpl->tpl_vars['classMain']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['classLogueado']->value;?>
">
			<div class = "contenedor contenedorVerIncidencia">
				<div class="alert alert-success" style="display: <?php if ($_smarty_tpl->tpl_vars['success']->value=="si") {?>block;<?php } else { ?>none;<?php }?>">
					<strong>¡ÉXITO!</strong>&nbsp;&nbsp;Los cambios han sido realizado de manera correcta
				</div>
				<form id = "frmVerIncidencia" method = "POST" action = "/Volquetas/incidencia/agregarFotos"  enctype="multipart/form-data">
					<input type = "hidden" name = "codigo" value = "<?php echo $_smarty_tpl->tpl_vars['codigo']->value;?>
" id = "codigo">
					<div class = "contenedorIncidencia contenedorVerIncidenciaDatos" id = "contenedorInformacionIncidencia">
						<p style = "font-size: 24px; color: #0F3EA1; font-weight: bold; text-align: center;">Información básica</p>
						<br>
						<img class = "imagenVerIncidencia" src = "img/Volquetas/<?php echo $_smarty_tpl->tpl_vars['numeroVolqueta']->value;?>
.png"/>
						<table class = "tableDatosIncidencia1" style = "float:left; width: 68%; margin-top: 0">
							<tr>
								<td colspan = "2" style = "font-size: 18px; font-weight: bold;">Código de incidencia: <?php echo $_smarty_tpl->tpl_vars['codigo']->value;?>
</td>
								<td style = "font-size: 18px; font-weight: bold;">Estado: <span class = "incidencia<?php echo $_smarty_tpl->tpl_vars['estado']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['estado']->value;?>
</span></td>
							</tr>
							<br>
							<tr>
								<td class = "col1"><br><br><b>Número de volqueta:</b><br><?php echo $_smarty_tpl->tpl_vars['numeroVolqueta']->value;?>
</td>
								<td class = "col2"><br><br><b>Dirección:</b><br><?php echo $_smarty_tpl->tpl_vars['direccion']->value;?>
</td>
								<td class = "col3"><br><br><b>¿Corrida?</b><br><?php if ($_smarty_tpl->tpl_vars['ubicacionCorrecta']->value=="1") {?>No<?php } else { ?>Sí<?php }?></td>
							</tr>
							<tr>
								<td class = "col1"><br><b>Severidad:</b><br><?php echo $_smarty_tpl->tpl_vars['severidad']->value;?>
</td>
								<td colspan = "2" class = "col2"><br><b>Categoría:</b><br><?php echo $_smarty_tpl->tpl_vars['categoria']->value;?>
</td>
							</tr>
							<tr>								
								<td class = "col1"><br><b>Fecha y hora de reporte:</b><br><?php echo $_smarty_tpl->tpl_vars['fecha']->value;?>
</td>
								<td colspan = "2" class = "col2"><br><b>Fecha y hora de solución:</b><br><?php echo $_smarty_tpl->tpl_vars['fechaSolucion']->value;?>
</td>
							</tr>
						</table>
						<table class = "tableDatosIncidencia2">
							<tr style = "width: 100%">
								<td colspan = "2" style = "font-size: 18px; font-weight: bold;">Código de incidencia: <?php echo $_smarty_tpl->tpl_vars['codigo']->value;?>
</td>
								<td style = "font-size: 18px; font-weight: bold;">Estado: <span class = "incidencia<?php echo $_smarty_tpl->tpl_vars['estado']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['estado']->value;?>
</span></td>
							</tr>
							<tr style = "width: 100%">
								<td><br><br><b>Número de volqueta:</b><br><?php echo $_smarty_tpl->tpl_vars['numeroVolqueta']->value;?>
</td>
								<td><br><br><b>Dirección:</b><br><?php echo $_smarty_tpl->tpl_vars['direccion']->value;?>
</td>
							</tr style = "width: 100%">
							<tr>								
								<td><br><br><b>¿Corrida?</b><br><?php if ($_smarty_tpl->tpl_vars['ubicacionCorrecta']->value=="1") {?>No<?php } else { ?>Sí<?php }?></td>
								<td><br><b>Severidad:</b><br><?php echo $_smarty_tpl->tpl_vars['severidad']->value;?>
</td>
								<td><br><b>Categoría:</b><br><?php echo $_smarty_tpl->tpl_vars['categoria']->value;?>
</td>
							</tr>
							<tr>								
								<td><br><b>Fecha y hora de reporte:</b><br><?php echo $_smarty_tpl->tpl_vars['fecha']->value;?>
</td>
								<td><br><b>Fecha y hora de solución:</b><br><?php echo $_smarty_tpl->tpl_vars['fechaSolucion']->value;?>
</td>
								<td><br><button type = "button" class = "btn btn-primary" id = "btnVolqueta" style = "width: 100%;"><span class = "fa fa-trash"></span>&nbsp;&nbsp;Ver volqueta</button></td>
							</tr>
						</table>
					</div>		
					<div class = "contenedorIncidencia contenedorVerIncidenciaDatos" style = "height:auto; margin-top: 40px; padding: 25px 45px; box-sizing: border-box;">
						<p style = "font-size: 24px; color: #0F3EA1; font-weight: bold; text-align: center;">Datos adicionales</p>
						<br><br>
						<div class = "form-group" id = "divDescripcion">
							<label>Descripción:</label>
							<?php if ($_smarty_tpl->tpl_vars['estado']->value=="Pendiente") {?>
								<textarea id = "descripcion" class = "form-control" name = "descripcion"><?php echo $_smarty_tpl->tpl_vars['descripcion']->value;?>
</textarea>
							<?php } else { ?>
								<div style = "width: 100%; height: auto; max-height: 250px; overflow-y: auto; text-align: justify;">
									<?php echo $_smarty_tpl->tpl_vars['descripcion']->value;?>

								</div>
							<?php }?>
						</div>						
						<br><br><br><br>
						<label>Fotos y/o imágenes:</label>
						
						<?php if ($_smarty_tpl->tpl_vars['cantidadImagenes']->value==0) {?>
							<br>
							Sin imágenes
							<br><br>
						<?php } else { ?>
							<ul class = "galeria" style = "margin-bottom: 0; margin-top: 0">
								<?php  $_smarty_tpl->tpl_vars['imagen'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['imagen']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['imagenes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['imagen']->key => $_smarty_tpl->tpl_vars['imagen']->value) {
$_smarty_tpl->tpl_vars['imagen']->_loop = true;
?>
									<li class = "galeria_item" style = "width: 20.5%"><img src = "<?php echo $_smarty_tpl->tpl_vars['imagen']->value['rutaImagen'];?>
" class = "galeria_img"/></li>
								<?php } ?>
							</ul>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['estado']->value=="Pendiente") {?>
							<label class="btn btn-default btn-file" id ="lblBuscarVerIncidencia">
							    <span class = "fa fa-folder"></span>&nbsp;&nbsp;<b>Buscar</b><input type="file" multiple="true" name = "imagenes[]" id = "fileImagen" onchange = "readURLIncidencia(this);" accept="image/jpg,image/png,image/jpg,image/gif,image/jpg,image/jpeg,image/bmp"/>
							</label>

							<label class="btn btn-default btn-file" id ="lblSubir"><span class = "fa fa-upload"></span>&nbsp;&nbsp;<b>Subir</b></label>
							<br><br>
							<ul class = "galeria" id = "galeriaFotosNuevas" style = "margin-bottom: 0; margin-top: 0">
							</ul>
						<?php }?>
					</div>
					<div class = "contenedorIncidencia contenedorVerIncidenciaDatos" style = "height:auto; margin-top: 40px; padding: 25px 45px; box-sizing: border-box;">
						<p style = "font-size: 24px; color: #0F3EA1; font-weight: bold; text-align: center;">Comentarios</p>
						<br><br>
						<div id = "divComentarios">
							<?php if ($_smarty_tpl->tpl_vars['cantidadComentarios']->value==0) {?>
								<div style = "height: 75px; text-align: center; padding-top: 25px; box-sizing: border-box;">
									<p style = "font-size: 14px;">No hay comentarios para esta incidencia</p>								
								</div>
							<?php } else { ?>
								<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['todosLosComentarios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
									<div style = "padding-top: 25px; box-sizing: border-box; height: auto;" class = "divComentariosVerIncidencia">
										<div class = "contenedorComentario">
											<img src = "<?php echo $_smarty_tpl->tpl_vars['c']->value['fotoPerfil'];?>
" style = "width: 80px; height: 80px; border-radius: 50%;"/>
										</div>
										<div class = "datosComentario">
											<b><?php echo $_smarty_tpl->tpl_vars['c']->value['nombreUsuario'];?>
</b> | <span style = "font-size: 12px"><?php echo $_smarty_tpl->tpl_vars['c']->value['fechaHora'];?>
</span>
											<br><br>
											<?php echo $_smarty_tpl->tpl_vars['c']->value['comentario'];?>

										</div>
									</div>
								<?php } ?>
							<?php }?>
						</div>					
					</div>

				</form>
				<?php if ($_smarty_tpl->tpl_vars['estado']->value=="Pendiente") {?>
					<div style = "width: 100%; margin-top: 75px;">
						<button type = "button" class = "btn btn-danger" id = "btnEliminarIncidencia" onclick = "window.location.href = '/Volquetas/incidencia/eliminarIncidencia/<?php echo $_smarty_tpl->tpl_vars['codigo']->value;?>
'"><span class = "fa fa-times"></span>&nbsp;&nbsp;<b>Eliminar</b></button>
						<button type = "button" class = "btn btn-success" id = "btnModificarIncidencia"><span class = "fa fa-pencil"></span>&nbsp;&nbsp;<b>Modificar</b></button>
						
					</div>
					<div class = "alert alert-danger fadeIn" style = "margin-top: 200px; display: none;" id = "dangerVerIncidencia">
						<strong>ADVERTENCIA:&nbsp;</strong>No se han completado campos obligatorios
					</div>
				<?php }?>
					
			</div>
				}
		</div>
		<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
	
	<div class = "fondoNegro" id = "fondoNegro">
		<span class = "fa fa-times-circle-o" id = "btnCerrar"></span>
		<img src = "img/img1.jpg" id = "imgModal"/>
	</div>

	<div class = "contNegro">
		<span class = "fa fa-times-circle-o" id = "btnCerrarContNegro"></span>
		<img src = "img/Volquetas/<?php echo $_smarty_tpl->tpl_vars['numeroVolqueta']->value;?>
.png" id = "imgVolqueta"/>
	</div>
</body>
</html><?php }} ?>
