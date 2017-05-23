<!DOCTYPE html>
<html>
<head>
	<base href = "/Volquetas/">
	{include file = "bs_js.tpl"}
	<title>{$location} - Paysandú Limpia</title>
	{include file = "leaflet_plugins.tpl"}
	<link rel = "stylesheet" href = "css/incidencia_volquetas.css"/>
</head>
<body>

	<div class = "wrapper">
		{include file = "header.tpl"}
		<div id = "main" class = "{$classMain} {$classLogueado}">
			<div class = "contenedor">
				<div class = "contenedorIncidencia" style = "height:400px; margin-top: 15px; padding: 25px 45px; box-sizing: border-box;">
					<p style = "font-size: 24px; color: #0F3EA1; font-weight: bold; text-align: center;">Información básica</p>
					<br>
					<img class = "imagenVerIncidencia" src = "img/Volquetas/{$numeroVolqueta}.png"/>
					<table style = "float:left; width: 68%">
						<tr>
							<td colspan="3" style = "font-size: 18px; font-weight: bold;">Código de incidencia: {$codigo}</td>
						</tr>
						<br>
						<tr>
							<td class = "col1"><br><br><b>Número de volqueta:</b><br>{$numeroVolqueta}</td>
							<td class = "col2"><br><br><b>Dirección:</b><br>{$direccion}</td>
							<td class = "col3"><br><br><b>¿Corrida?</b><br>{if $ubicacionCorrecta eq "1"}Sí{else}No{/if}</td>
						</tr>
						<tr>
							<td class = "col1"><br><b>Fecha y hora de reporte:</b><br>{$fecha}</td>
							<td class = "col2"><br><b>Severidad:</b><br>{$severidad}</td>
							<td class = "col3"><br><b>Categoría:</b><br>{$categoria}</td>
						</tr>
						<tr>
							<td class = "col1"><br><b>Estado:</b><br><span class = "incidencia{$estado}">{$estado}</span></td>
							<td class = "col2" colspan = "2"><br><b>Asignada a:</b><br>{$asignada}</td>
						</tr>
					</table>
				</div>		
				<div class = "contenedorIncidencia" style = "height:auto; margin-top: 40px; padding: 25px 45px; box-sizing: border-box;">
					<p style = "font-size: 24px; color: #0F3EA1; font-weight: bold; text-align: center;">Datos adicionales</p>
					<br><br>
					<label>Descripción:</label>
					<div style = "width: 100%; height: auto; max-height: 250px; overflow-y: auto; text-align: justify;">
						{$descripcion}
					</div>
					<br><br><br><br>
					<label>Fotos y/o imágenes:</label>
					
					{if $cantidadImagenes eq 0}
						<br>
						Sin imágenes
					{else}
						<ul class = "galeria" style = "margin-bottom: 0; margin-top: 0">
							{foreach from = $imagenes item = imagen}
								<li class = "galeria_item"><img src = "{$imagen.rutaImagen}" class = "galeria_img"/></li>
							{/foreach}
						</ul>
					{/if}
				</div>			
			</div>
		</div>
		<script src = "js/markers.js"></script>
		<script src = "js/leafletNuevaIncidencia.js"></script>
		<link rel = "stylesheet" href = "css/select.css"/>
		{include file = "footer.tpl"}
	</div>
	
	<div class = "fondoNegro" id = "fondoNegro">
		<span class = "fa fa-times-circle-o" id = "btnCerrar"></span>
		<img src = "img/img1.jpg" id = "imgModal"/>
	</div>
</body>
</html>