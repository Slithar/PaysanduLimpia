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
				{if $success eq "si"}
					<div class = "alert alert-success fadeIn" id = "successNuevaIncidencia" style = "margin-bottom: 50px;">
						<strong>¡ÉXITO!&nbsp;</strong>La nueva incidencia ha sido creada de manera correcta. Código: {$codigo}
					</div>
				{/if}
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
					<label class = "lblCheckbox"><input type="checkbox" checked name = "ubicacionCorrecta"/>&nbsp;&nbsp;¿La volqueta se encuentra en el lugar indicado en el plano?</label>
					<p class = "pasoIncidencia" style = "margin-top: 75px;">2. Datos de la volqueta seleccionada</p>
					
					<div id = "severidadIncidencia">
						<label>Severidad:</label>
						<br>
						<select class = "form-control" id = "selectSeveridad" name = "severidad">						
							{foreach from = $severidades item = severidad}
								
									<option value = "{$severidad.codigo}">{$severidad.descripcion}</option>					
							{/foreach}
						</select>
					</div>
					<div id = "categoriaIncidencia">
						<label>Categoría:</label>
						<br>
						<select class = "form-control" id = "selectCategoria" name = "categoria">
							{foreach from = $categorias item = categoria}							
								<option value = "{$categoria.codigo}">{$categoria.descripcion}</option>					
							{/foreach}
						</select>
					</div>
					<div class = "form-group" id = "divDescripcion">
						<label for = "descripcion" class = "lblResumenDescripcion control-label">Descripción:</label>
						<textarea id = "descripcion" class = "form-control" name = "descripcion"></textarea>
					</div>
					
					
					<p class = "pasoIncidencia" style = "margin-top: 75px;">3. Adjuntar fotos y/o imágenes (opcional)</p>
					
					<label class="btn btn-default btn-file" id ="lblBuscar">
					    <span class = "fa fa-folder"></span>&nbsp;&nbsp;<b>Buscar</b><input type="file" multiple="true" name = "imagenes[]" id = "fileImagen" onchange = "readURL(this);" accept="image/jpg,image/png,image/jpg,image/gif,image/jpg,image/jpeg,image/bmp"/>
					</label>
					<label class="btn btn-default btn-file" id ="lblQuitar" onclick = "quitarFiles();"><span class = "fa fa-times"></span>&nbsp;&nbsp;<b>Quitar adjuntos</b></label>
					<ul class = "galeria">
					</ul>

					
					<button type = "submit" id = "submitIncidencia" class = "btn btn-success"><span class = "fa fa-check-circle-o"></span>&nbsp;&nbsp;Aceptar</button>
					<div class = "alert alert-danger fadeIn" id = "dangerNuevaIncidencia" style = "margin-top: 50px;">
						<strong>ADVERTENCIA:&nbsp;</strong>No se han completado campos obligatorios
					</div>
				</form>
			</div>
		</div>
		<script src = "js/markers.js"></script>
		<script src = "js/leafletNuevaIncidencia.js"></script>
		<link rel = "stylesheet" href = "css/select.css"/>
		{include file = "footer.tpl"}
	</div>
	
	<div class = "fondoNegro" id = "fondoNegro">
		<span class = "fa fa-times-circle-o" id = "btnCerrar" onclick = "cerrarModal();"></span>
		<img src = "img/img1.jpg" id = "imgModal"/>
	</div>
</body>
</html>