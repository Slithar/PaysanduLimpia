<!DOCTYPE html>
<html>
<head>
	
	<base href="/Volquetas/">
	{include file="bs_js.tpl"}
	
<!-- La variable $location tendrá el valor de la página a la que vamos. Paysandú Limpia es constante en todas las páginas. -->
	<title>{$location} - Paysandú Limpia</title>
	<link rel = "stylesheet" href = "css/incidencia_volquetas.css"/>
	{include file = "leaflet_plugins.tpl"}

</head>
<body>
	<!-- Incluir la vista del header al principio -->
	<div class = "wrapper">
		{include file="header.tpl"}

		<div id = "main" class = "{$classMain} {$classLogueado}">
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
		<script src = "js/markers.js"></script>
		<script src = "js/leafletVerVolquetas.js"></script>
		<!-- Incluir la vista del footer último. Más abajo no debe haber más código -->	
		{include file = "footer.tpl"}
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
</html>