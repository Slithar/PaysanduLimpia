<!DOCTYPE html>
<html>
<head>
	
	<base href="/Volquetas/">
	{include file="bs_js.tpl"}
	
<!-- La variable $location tendrá el valor de la página a la que vamos. Paysandú Limpia es constante en todas las páginas. -->
	<title>{$location} - Paysandú Limpia</title>
</head>
<body>
	<!-- Incluir la vista del header al principio -->
	
	{include file="header.tpl"}

	<div id = "main" style = "position: fixed; width: 100%; height: 100%;">
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

	<script src = "js/leaflet.js"></script>
	<!-- Incluir la vista del footer último. Más abajo no debe haber más código -->	
	{include file = "footer.tpl"}
</body>
</html>