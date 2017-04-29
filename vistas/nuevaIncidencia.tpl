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
			{if $success eq "si"}
				<div class = "alert alert-success fadeIn" id = "successNuevaIncidencia" style = "margin-bottom: 50px;">
					<strong>¡ÉXITO!&nbsp;</strong>La nueva incidencia ha sido creada de manera correcta. Código: 1
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
				<label class = "lblCheckbox"><input type="checkbox" value="" checked name = "ubicacionCorrecta">&nbsp;&nbsp;¿La volqueta se encuentra en el lugar indicado en el plano?</label>
				<p class = "pasoIncidencia" style = "margin-top: 75px;">2. Datos de la volqueta seleccionada</p>
				<div id = "severidadIncidencia">
					<label>Severidad:</label>
					<br>
					<select class = "form-control" id = "selectSeveridad" name = "severidad">
						<option value = "Baja">Baja</option>
						<option value = "Media">Media</option>
						<option value = "Alta">Alta</option>
						<option value = "Urgente">Urgente</option>
					</select>
				</div>
				<div id = "categoriaIncidencia">
					<label>Categoría:</label>
					<br>
					<select class = "form-control" id = "selectCategoria" name = "categoria">
						<option value = "La volqueta está llena">Volqueta llena</option>
						<option value = "La volqueta huele mal">La volqueta huele mal</option>
						<option value = "La volqueta se está incendiando">La volqueta se está incendiando</option>
						<option value = "La volqueta se ha dañado">La volqueta se ha dañado</option>
						<option value = "Otra">Otra</option>
					</select>
				</div>
				<label for = "resumen" class = "lblResumenDescripcion">Resúmen:</label>
				<input type = text name = "resumen" id = "resumen" class = "form-control" name = "resumen"/>
				<label for = "descripcion" class = "lblResumenDescripcion">Descripción:</label>
				<textarea id = "descripcion" class = "form-control" name = "descripcion"></textarea>
				<p class = "pasoIncidencia" style = "margin-top: 75px;">3. Adjuntar fotos y/o imágenes (opcional)</p>
				
				<label class="btn btn-default btn-file" id ="lblBuscar">
				    <span class = "fa fa-folder"></span>&nbsp;&nbsp;<b>Buscar</b><input type="file" multiple="true" name = "imagenes" id = "fileImagen" onchange = "readURL(this);" accept="image/jpg,image/png,image/jpg,image/gif,image/jpg,image/jpeg,image/bmp"/>
				</label>
				<label class="btn btn-default btn-file" id ="lblQuitar" onclick = "quitarFiles();"><span class = "fa fa-times"></span>&nbsp;&nbsp;<b>Quitar adjuntos</b></label>
				<ul class = "galeria">
				</ul>

				<div class = "alert alert-danger fadeIn" id = "dangerNuevaIncidencia" style = "margin-top: 50px; margin-bottom: 50px;">
					<strong>ADVERTENCIA:&nbsp;</strong>No se han completado campos obligatorios
				</div>
				<button type = "submit" id = "submitIncidencia" class = "btn btn-success"><span class = "fa fa-check-circle-o"></span>&nbsp;&nbsp;Aceptar</button>
			</form>
		</div>
	</div>
	<script src = "js/markers.js"></script>
	<script src = "js/leafletNuevaIncidencia.js"></script>
	<link rel = "stylesheet" href = "css/select.css"/>
	{include file = "footer.tpl"}
	<div class = "fondoNegro">
		<span class = "fa fa-times-circle-o" id = "btnCerrar" onclick = "cerrarModal();"></span>
		<img src = "img/img1.jpg" id = "imgModal"/>
	</div>
</body>
</html>