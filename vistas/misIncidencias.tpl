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
			<div class = "contenedor contenedorMisIncidencias">
				<div class = "divBusqueda">
					<label id = "lblEstadoFiltro">
						{if $cantidad eq "0"}
							Sin incidencias
						{else if $cantidad eq "1"}
							1 incidencia
						{else}
							{$cantidad} incidencias
						{/if}	
					</label>
					<label for = "comboEstado">Estado:&nbsp;&nbsp;</label>
					<select id = "comboEstado" class = "form-control">
						<option value = "0">Todas</option>
						{foreach from = $estadosIncidencia item = estado}							
							<option value = "{$estado.codigo}" {if $estado.codigo eq $selected}selected{/if}>{$estado.descripcion}</option>					
						{/foreach}
					</select>
					<div class="input-group busquedaIncidencia">
				      <input type="text" class="form-control" value = "{$busqueda}" placeholder="Código, dirección o descripción de incidencia" id = "txtBusqueda">
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="button" id = "btnBuscar"><span class = "fa fa-search"></span></button>
				      </span>
				    </div>
				</div>
				{foreach from = $incidencias item = incidencia}
					<div class = "contenedorIncidencia">
						<img src = "img/Volquetas/{$incidencia.numeroVolqueta}.png" class = "imagenVolquetaIncidencia">
						<div class = "datosIncidencia">
							<p style = "font-size: 18px; color: #0F3EA1; font-weight: bold;">Volqueta Nº {$incidencia.numeroVolqueta}: {$incidencia.direccion}</p>
							<br>
							<p style = "font-size: 15px;"><b>Código:</b> {$incidencia.codigo}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Categoría:</b> {$incidencia.categoria}</p>
							<p style = "font-size: 15px;"><b>Fecha y hora de reporte:</b> {$incidencia.fecha}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Estado:</b> <span class = "incidencia{$incidencia.estado}">{$incidencia.estado}</span></p>
							
							<br>
							<p><a class = "btn btn-primary" href = "/Volquetas/incidencia/verIncidencia/{$incidencia.codigo}"><span class = "fa fa-eye"></span>&nbsp;&nbsp;Ver incidencia</a></p>
						</div>
						<div class = "datosIncidencia2">
							<p style = "font-size: 18px; color: #0F3EA1; font-weight: bold;">Volqueta Nº {$incidencia.numeroVolqueta}: {$incidencia.direccion}</p>
							<br>
							<p style = "font-size: 15px;"><b>Código:</b> {$incidencia.codigo}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Categoría:</b> {$incidencia.categoria}</p>
							<p><b>Estado:</b> <span class = "incidencia{$incidencia.estado}">{$incidencia.estado}</span></p>							
							<br>
							<p><a class = "btn btn-primary" href = "/Volquetas/incidencia/verIncidencia/{$incidencia.codigo}"><span class = "fa fa-eye"></span>&nbsp;&nbsp;Ver incidencia</a></p>
						</div>
						<div class = "datosIncidencia3">
							<p style = "font-size: 18px; color: #0F3EA1; font-weight: bold;">Volqueta Nº {$incidencia.numeroVolqueta}: {$incidencia.direccion}</p>
							<br>
							<p style = "font-size: 15px;"><b>Código:</b> {$incidencia.codigo}</p>
							<p><b>Categoría:</b> {$incidencia.categoria}</p>
							<p><b>Estado:</b> <span class = "incidencia{$incidencia.estado}">{$incidencia.estado}</span></p>							
							<br>
							<p><a class = "btn btn-primary" href = "/Volquetas/incidencia/verIncidencia/{$incidencia.codigo}"><span class = "fa fa-eye"></span>&nbsp;&nbsp;Ver incidencia</a></p>
						</div>
					</div>
				{/foreach}
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