<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-04 23:30:09
         compiled from "vistas\ayuda.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96355913cd8718d297-49635294%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7436053c7076f048587acecc920c891103fb2368' => 
    array (
      0 => 'vistas\\ayuda.tpl',
      1 => 1499152203,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96355913cd8718d297-49635294',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5913cd871f0745_64480445',
  'variables' => 
  array (
    'location' => 0,
    'classMain' => 0,
    'classLogueado' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5913cd871f0745_64480445')) {function content_5913cd871f0745_64480445($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	
	<base href="/Volquetas/">
	<?php echo $_smarty_tpl->getSubTemplate ("bs_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<title><?php echo $_smarty_tpl->tpl_vars['location']->value;?>
 - Paysandú Limpia</title>
	<link rel = "stylesheet" href = "css/ayuda.css"/>
</head>
<body>
	<!-- Incluir la vista del header al principio -->
	
	<div class="wrapper">
		<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<div id = "main" class="container-fluid <?php echo $_smarty_tpl->tpl_vars['classMain']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['classLogueado']->value;?>
">
			<div id = "contenedorAyuda">
				<p class = "titulo">¿Qué es Paysandú Limpia?</p>
				<img src = "img/Logo Paysandú Limpia.png" class = "logoPaysanduLimpia"/>
				<p style = "margin-top: 50px">Paysandú Limpia es una aplicación web que tiene como objetivo ayudar al mantenimiento de la higiene en la ciudad de Paysandú mendiante el reporte de incidencias sobre las volquetas contenedoras de residuos que dicha ciudad tiene. Buscando que dicho problema sea resuelto lo antes posible, haciendo que sea más agradable el ambiente.</p>
				<br><br>
				<p class = "titulo">¿Cómo utilizarla?</p>
				<p>Para colaborar indicando la volqueta que necesita asistencia, primero se debe ingresar al sistema, presentado tres variantes:</p><br>
				<ul style = "list-style: none; text-align: justify">
					<li><span class = "fa fa-user-plus"></span>&nbsp;&nbsp;<b>Registro de usuario:</b><br>Crear una cuenta de usuario en el sistema con los datos personales y luego ingresar.</li><br>
					<li><span class = "fa fa-facebook"></span>&nbsp;&nbsp;<b>Conectarse a Facebook:</b><br>Hacer uso de la aplicación con una cuenta de usuario de Facebook.</li><br>
					<li><span class = "fa fa-google"></span>&nbsp;&nbsp;<b>Conectarse a Google:</b><br>Inicio de sesión a través de una cuenta de Google.</li>
				</ul>
				<br><br>
				<p class = "titulo">Funcionalidades</p>
				<p>Se cuenta con funciones a las cuales se puede acceder sin necesidad de estar logueado al sistema, como por ejemplo:</p><br>
				<ul style = "list-style: none; text-align: justify">
					<li><span class = "fa fa-map-marker"></span>&nbsp;&nbsp;<b>Ver volquetas:</b><br>Se obtiene una "mirada general" del estado de las volquetas indicadas en el plano.</li><br>
					<li><span class = "fa fa-envelope-o"></span>&nbsp;&nbsp;<b>Contacto:</b><br>Para enviar cualquier consulta y/o reclamo por parte de un usuario de la aplicación.</li>
				</ul><br><br>
				<p>Mientras que aquellas acciones a las que se necesita tener un registro y posteriormente iniciar sesión para utilizarlas son:</p><br>
				<ul style = "list-style: none; text-align: justify">
					<li><span class = "fa fa-bug"></span>&nbsp;&nbsp;<b>Incidencias:</b><br>Tanto para registrar un inconveniente en alguna volqueta, hacer una seguimiento, comentar, entre otras.<br><br>
					<b>IMPORTANTE: Los usuarios que inicien sesión aplicaciones externas no podrán comentar incidencias, solamente consultarlas</b></li><br>
					<li><span class = "fa fa-search"></span>&nbsp;&nbsp;<b>Consulta de incidencias:</b><br>De esta manera se podrán filtrar los inconvenientes reportados por cada usuario.</li><br>
					<li><span class = "fa fa-bar-chart"></span>&nbsp;&nbsp;<b>Estadísticas:</b><br>Para conocer datos de relevancia sobre el servicio que se da a las volquetas, por ejemplo, tiempo que se demora en resolver un problema, tiempo estimado en que una volqueta se llene, problemas más frecuentes sobre las mismas, volquetas con más incidencias.</li><br>
					<li><span class = "fa fa-user"></span>&nbsp;&nbsp;<b>Ver perfil:</b><br>Para obtener datos personales ingresados, modificarlos, cambiar contraseña y eliminar la cuenta.</li><br>
					<li><span class = "fa fa-sign-out"></span>&nbsp;&nbsp;<b>Cerrar sesión:</b><br>Salir de la cuenta logueada.</li>
				</ul>
			</div>	
		</div>

		<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<!-- Incluir la vista del footer último. Más abajo no debe haber más código -->
	</div>
</body>
</html><?php }} ?>
