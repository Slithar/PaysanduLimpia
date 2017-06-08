<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-08 00:41:27
         compiled from "vistas\landing.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2976558f930fb5c2c05-92729639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0706fb32bac316ed1c105ddaff132ac46c6cd1d' => 
    array (
      0 => 'vistas\\landing.tpl',
      1 => 1496882485,
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
    'classMain' => 0,
    'classLogueado' => 0,
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
	<link rel = "stylesheet" href = "css/landing.css"/>
</head>
<body>
	<!-- Incluir la vista del header al principio -->
	<div class = "wrapper">		
		<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
	
		<div id = "main" class = "<?php echo $_smarty_tpl->tpl_vars['classMain']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['classLogueado']->value;?>
" style = "height: 200%">
			<div id = "carousel" class = "carousel slide" data-ride = "carousel">
				<ol class = "carousel-indicators">
					<li data-target = "#carousel" data-slide-to = "0" class = "active"></li>
					<li data-target = "#carousel" data-slide-to = "1"></li>
					<li data-target = "#carousel" data-slide-to = "2"></li>
					<li data-target = "#carousel" data-slide-to = "3"></li>
					<li data-target = "#carousel" data-slide-to = "4"></li>
				</ol>
				<div class = "carousel-inner" role = "listbox">
					<div class = "item active">
						<img src = "img/slide1.2.png">
					</div>
					<div class = "item">
						<img src = "img/slide2.2.png">
					</div>
					<div class = "item">
						<img src = "img/slide3.2.png">
					</div>
					<div class = "item">
						<img src = "img/slide4.2.png">
					</div>
					<div class = "item">
						<img src = "img/slide5.2.png">
					</div>
				</div>
				<a class = "left carousel-control" href = "#carousel" role = "button" data-slide = "prev">
					<span class = "glyphicon glyphicon-chevron-left" aria-hidden = "true"></span>
					<span class = "sr-only">Previous</span>
				</a>
				<a class = "right carousel-control" href = "#carousel" role = "button" data-slide = "next">
					<span class = "glyphicon glyphicon-chevron-right" aria-hidden = "true"></span>
					<span class = "sr-only">Next</span>
				</a>
			</div>
			<div class = "divMain">
				<div class = "mainTexto">
					¡Con Paysandú Limpia podrás reportar sobre el estado de una las volquetas de basura para que sean atendidas a la brevedad!
				</div>
				<div class = "segundoTexto">
					Solo debes seguir los siguientes pasos
				</div>
				<div class = "divPasos">
					<div class = "divP">
						<div class = "imgPaso1">
							<img src = "img/paso1.png"/>
						</div>
						<label class = "titulo">Paso 1:</label> 
						<br>
						<div class = "textoPaso">Identifica la volqueta que necesita servicio de limpieza</div>
					</div>
					<div class = "divOtras">
						<div class = "imgPaso2">
							<img src = "img/paso2.png"/>
						</div>
						<label class = "titulo">Paso 2:</label> 
						<br>
						<div class = "textoPaso">Reportá desde tu computadora este problema indicando el estado del contenedor y su severidad</div>
					</div>
					<div class = "divOtras">
						<div class = "imgPaso3">
							<img src = "img/paso3.png"/>
						</div>
						<label class = "titulo">Paso 3:</label> 
						<br>
						<div class = "textoPaso">Los encargados de llevar a cabo este servicio recibirán esta solicitud</div>
					</div>
					<div class = "divOtras">
						<div class = "imgPaso4">
							<img src = "img/paso4.png"/>
						</div>
						<label class = "titulo">Paso 4:</label> 
						<br>
						<div class = "textoPaso4">El camión recolector será enviado lo antes posible para solucionarlo</div>
					</div>
					<div class = "divOtras">
						<div class = "imgPaso5">
							<img src = "img/paso5.png"/>
						</div>
						<label class = "titulo">Paso 5:</label> 
						<br>
						<div class = "textoPaso">¡Y así esta incidencia habrá sido atendida y resulta de una manera rápida y efectiva!</div>
					</div>
				</div>
			</div>
			<br><br>
			<button class = "btn btn-primary" style = "margin: auto;display: block; width: 22%; font-size: 17px; font-weight: bold; margin-top: 150px;" onclick = "window.location.href = '/Volquetas/incidencia/nuevaIncidencia'"><span class = "fa fa-bug"></span>&nbsp;&nbsp;¡Reporta tu incidencia!</button>
		</div>
		<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
	<!-- Incluir la vista del footer último. Más abajo no debe haber más código -->
</body>
</html><?php }} ?>
