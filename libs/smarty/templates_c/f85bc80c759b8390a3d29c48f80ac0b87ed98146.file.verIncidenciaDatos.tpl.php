<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-13 23:28:07
         compiled from "vistas\verIncidenciaDatos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31907593880ca85f889-10177373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f85bc80c759b8390a3d29c48f80ac0b87ed98146' => 
    array (
      0 => 'vistas\\verIncidenciaDatos.tpl',
      1 => 1497396482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31907593880ca85f889-10177373',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_593880ca9250c3_61126804',
  'variables' => 
  array (
    'location' => 0,
    'classMain' => 0,
    'classLogueado' => 0,
    'codigo' => 0,
    'imagenPerfil' => 0,
    'nombreIncidencia' => 0,
    'numeroVolqueta' => 0,
    'direccion' => 0,
    'ubicacionCorrecta' => 0,
    'fecha' => 0,
    'severidad' => 0,
    'categoria' => 0,
    'fechaSolucion' => 0,
    'estado' => 0,
    'descripcion' => 0,
    'cantidadImagenes' => 0,
    'imagenes' => 0,
    'imagen' => 0,
    'cantidadComentarios' => 0,
    'todosLosComentarios' => 0,
    'c' => 0,
    'fotoPerfil' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593880ca9250c3_61126804')) {function content_593880ca9250c3_61126804($_smarty_tpl) {?><!DOCTYPE html>
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
			<div class = "contenedor">
				<form id = "frmVerIncidencia" method = "POST" action = "/Volquetas/incidencia/agregarFotos"  enctype="multipart/form-data">
					<input type = "hidden" name = "codigo" value = "<?php echo $_smarty_tpl->tpl_vars['codigo']->value;?>
" id = "codigo">
					<div class = "contenedorIncidencia" style = "height: 75px; margin-top: 15px; padding: 25px 45px; box-sizing: border-box;">
						<div id = "imagenReportador">
							<img src = "<?php echo $_smarty_tpl->tpl_vars['imagenPerfil']->value;?>
" style = "width:59px; height: 59px; border-radius: 50%; float: left; margin-top: -17px;"/>
						</div> 
						<div style = "width: calc(100% - 75px); float: right; font-size: 16px; margin-top: 5px">							
							Incidencia reportada por <b><?php echo $_smarty_tpl->tpl_vars['nombreIncidencia']->value;?>
</b>
						</div>
					</div>		
					<div class = "contenedorIncidencia" style = "height:400px; margin-top: 50px; padding: 25px 45px; box-sizing: border-box;">
						<p style = "font-size: 24px; color: #0F3EA1; font-weight: bold; text-align: center;">Información básica</p>
						<br>
						<img class = "imagenVerIncidencia" src = "img/Volquetas/<?php echo $_smarty_tpl->tpl_vars['numeroVolqueta']->value;?>
.png"/>
						<table style = "float:left; width: 68%; margin-top: 0px">
							<tr>
								<td colspan = "3" style = "font-size: 18px; font-weight: bold;">Código de incidencia: <?php echo $_smarty_tpl->tpl_vars['codigo']->value;?>
</td>
								
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
								<td class = "col1"><br><b>Fecha y hora de reporte:</b><br><?php echo $_smarty_tpl->tpl_vars['fecha']->value;?>
</td>
								<td class = "col2"><br><b>Severidad:</b><br><?php echo $_smarty_tpl->tpl_vars['severidad']->value;?>
</td>
								<td class = "col3"><br><b>Categoría:</b><br><?php echo $_smarty_tpl->tpl_vars['categoria']->value;?>
</td>
							</tr>
							<tr>
								<td class = "col1"><br><b>Fecha y hora de solución:</b><br><?php echo $_smarty_tpl->tpl_vars['fechaSolucion']->value;?>
</td>
								<td colspan = "2" style = "font-size: 18px; font-weight: bold;">Estado: <span class = "incidencia<?php echo $_smarty_tpl->tpl_vars['estado']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['estado']->value;?>
</span></td>
							</tr>
						</table>
					</div>		
					<div class = "contenedorIncidencia" style = "height:auto; margin-top: 40px; padding: 25px 45px; box-sizing: border-box;">
						<p style = "font-size: 24px; color: #0F3EA1; font-weight: bold; text-align: center;">Datos adicionales</p>
						<br><br>
						<div class = "form-group" id = "divDescripcion">
							<label>Descripción:</label>
							<div style = "width: 100%; height: auto; max-height: 250px; overflow-y: auto; text-align: justify;">
								<?php echo $_smarty_tpl->tpl_vars['descripcion']->value;?>

							</div>
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
					</div>
					<div class = "contenedorIncidencia" style = "height:auto; margin-top: 40px; padding: 25px 45px; box-sizing: border-box;">
						<p style = "font-size: 24px; color: #0F3EA1; font-weight: bold; text-align: center;">Comentarios</p>
						<br><br>
						<div id = "divComentarios">
							<?php if ($_smarty_tpl->tpl_vars['cantidadComentarios']->value==0) {?>
								<div style = "border-bottom: 2px solid #D8D8D8; height: 75px; text-align: center; padding-top: 25px; box-sizing: border-box;">
									<p style = "font-size: 14px;">No hay comentarios para esta incidencia</p>								
								</div>
							<?php } else { ?>
								<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['todosLosComentarios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
									<div style = "border-bottom: 2px solid #D8D8D8; padding-top: 25px; box-sizing: border-box; height: auto;">
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
						<div style = "height: 210px;">
							<div>
								<img src = "<?php echo $_smarty_tpl->tpl_vars['fotoPerfil']->value;?>
" style = "width:80px; height: 80px; border-radius: 50%; float: left; margin-top: 25px"/>
							</div> 
							<form>
								<div class = "form-group">
									<textarea style = "width: calc(100% - 125px); float: right; margin-top: 25px; min-height: 80px; max-height: 125px;" class = "form-control" placeholder="Escribe tu comentario" id = "txtComentario"></textarea>		
								</div>
												
								<button class = "btn btn-success" style = "width: 15%; float: right; margin-top: 25px;" id = "btnComentar"><span class = "fa fa-comment"></span>&nbsp;&nbsp;Comentar</button>
								<div id = "divSpinner" style = "margin-top: 101px; margin-left: 42%; width: 32px; font-size: 24px; display: block; display: none; position: absolute;">
									<span class = "fa fa-spinner fa-spin" style = "margin-top: 31.5px"></span>	
								</div>
							</form>
						</div>
						<div id = "contenedorAlert">							
							<div class = "alert alert-danger" id = "alertComentario" style = "display:none;">
								<strong>ERROR: </strong>No se ha ingresado comentario
							</div>
						</div>
					</div>
				</form>
					
			</div>
		</div>
		<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
	
	<div class = "fondoNegro" id = "fondoNegro">
		<span class = "fa fa-times-circle-o" id = "btnCerrar"></span>
		<img src = "img/img1.jpg" id = "imgModal"/>
	</div>
</body>
</html><?php }} ?>
