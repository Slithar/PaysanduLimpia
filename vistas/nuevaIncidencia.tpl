<!DOCTYPE html>
<html>
<head>
	<base href = "/Volquetas/">
	{include file = "bs_js.tpl"}
	<title>{$location} - Paysandú Limpia</title>
</head>
<body>
	{include file = "header.tpl"}
	<div class = "main" style = "position: fixed; width: 100%; height: 85.3%; overflow-y: auto">
		<div class = "contenedor">
			<p class = "pasoIncidencia">1. Indicar la volqueta que presenta el inconveniente</p>
			<div id = "mapNuevaIncidencia"></div>
		</div>
	</div>
	<script src = "js/markers.js"></script>
	<script src = "js/leafletNuevaIncidencia.js"></script>
	{include file = "footer.tpl"}
</body>
</html>