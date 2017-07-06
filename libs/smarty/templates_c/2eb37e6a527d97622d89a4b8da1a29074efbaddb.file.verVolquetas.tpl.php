<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-01 05:57:16
         compiled from "vistas\verVolquetas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:530958fff7b674be24-08114819%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2eb37e6a527d97622d89a4b8da1a29074efbaddb' => 
    array (
      0 => 'vistas\\verVolquetas.tpl',
      1 => 1498888632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '530958fff7b674be24-08114819',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58fff7b67ebe12_29818773',
  'variables' => 
  array (
    'location' => 0,
    'classMain' => 0,
    'classLogueado' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fff7b67ebe12_29818773')) {function content_58fff7b67ebe12_29818773($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	
	<base href="/Volquetas/">
	<?php echo $_smarty_tpl->getSubTemplate ("bs_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
<!-- La variable $location tendrá el valor de la página a la que vamos. Paysandú Limpia es constante en todas las páginas. -->
	<title><?php echo $_smarty_tpl->tpl_vars['location']->value;?>
 - Paysandú Limpia</title>
	<link rel = "stylesheet" href = "css/incidencia_volquetas.css"/>
	<?php echo $_smarty_tpl->getSubTemplate ("leaflet_plugins.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


</head>
<body>
	<!-- Incluir la vista del header al principio -->
	<div class = "wrapper">
		<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


		<div id = "main" class = "<?php echo $_smarty_tpl->tpl_vars['classMain']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['classLogueado']->value;?>
">
			<div id = "map">
			</div>

		</div>
		<div class = "referencias">
			<div class = "divGreenMarker">
				<img src = "img/greenMarker.png" class = "greenMarker"/>
				<label class = "lblGreenMarker">Sin incidencias</label>
				<label id = "lblCantidadGreen"></label>
			</div>
			<div class = "divOrangeMarker">
				<img src = "img/orangeMarker.png" class = "orangeMarker"/>
				<label class = "lblOrangeMarker">Trabajando sobre incidencias</label>
				<label id = "lblCantidadOrange"></label>
			</div>
			<div class = "divRedMarker">
				<img src = "img/redMarker.png" class = "redMarker"/>
				<label class = "lblRedMarker">Con incidencias pendientes</label>
				<label id = "lblCantidadRed"></label>
			</div>
		</div>
		<button type = "button" class = "btn btn-primary" id = "btnReferencias"  data-toggle="modal" data-target="#modalReferencias" style = "position: fixed; bottom: 50px; right: 50px; font-size: 14px; padding: 7px; width: 205px;">
			<b><span class = "fa fa-hand-o-right"></span>&nbsp;&nbsp;Referencias</b>
		</button>
		<?php echo '<script'; ?>
 src = "js/markers.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src = "js/leafletVerVolquetas.js"><?php echo '</script'; ?>
>
		<!-- Incluir la vista del footer último. Más abajo no debe haber más código -->	
		<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
	<div id="modalReferencias" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Referencias</h4>
	      </div>
	      <div class="modal-body" style = "padding: 4% 7%; box-sizing: border-box;">
	        <table class = "table table-striped">
	        	<thead>
	        		<tr>
	        			<th>Marcador</th>
	        			<th>Estado</th>
	        			<th>Cantidad</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        		<tr>
		        		<td style = "padding: 10px 0"><img src = "img/greenMarker.png" class = "markerTable"/></td>
		        		<td style = "padding: 10px 0"><br><label>Trabajando sobre incidencias</label></td>
		        		<td style = "padding: 10px 0"><br><label id = "lblCantidadGreenTable"></label></td>
		        	</tr>
		        	<tr>
		        		<td style = "padding: 10px 0"><img src = "img/orangeMarker.png" class = "markerTable"/></td>
						<td style = "padding: 10px 0"><br><label>Trabajando sobre incidencias</label></td>
						<td style = "padding: 10px 0"><br><label id = "lblCantidadOrangeTable"></label></td>
		        	</tr>
		        	<tr>
						<td style = "padding: 10px 0"><img src = "img/redMarker.png" class = "markerTable"/></td>
						<td style = "padding: 10px 0"><br><label>Con incidencias pendientes</label></td>
						<td style = "padding: 10px 0"><br><label id = "lblCantidadRedTable"></label></td>
					</tr>
	        	</tbody>	        	
	        </table>
	      </div>
	      <div class="modal-footer">
	         <button type="button" class="btn btn-danger" data-dismiss = "modal"><b>Cancelar</b></button>
	         </div>
	      </div>        
	  </div>
	  
	</div>
</body>
</html><?php }} ?>
