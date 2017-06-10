<!DOCTYPE html>
<html>
<head>
	<base href = "/Volquetas/">
	{include file = "bs_js.tpl"}
	<title>{$location} - Paysandú Limpia</title>
	{include file = "leaflet_plugins.tpl"}
	<link rel = "stylesheet" href = "css/incidencia_volquetas.css"/>
	<script src = "js/incidencias.js"></script>
</head>
<body>

	<div class = "wrapper">
		{include file = "header.tpl"}
		<div id = "main" class = "{$classMain} {$classLogueado}">
			<div class = "contenedor">
				<div class = "divBusqueda">
					<label for = "comboEstadoTodasIncidencias">Estado:&nbsp;&nbsp;</label>
					<select id = "comboEstadoTodasIncidencias" class = "form-control" style = "margin-right: 2%;">
						<option value = "0">Todas</option>
						{foreach from = $estadosIncidencia item = e}							
							<option value = "{$e.codigo}" {if $e.codigo eq $estado}selected{/if}>{$e.descripcion}</option>					
						{/foreach}
					</select>
					<label for = "comboOrden">Ordenar por:&nbsp;&nbsp;</label>
					<select id = "comboOrden" class = "form-control">
						<option value = "asc" {if $orden eq "asc"}selected{/if}>Fecha reporte (ascendente)</option>
						<option value = "desc" {if $orden eq "desc"}selected{/if}>Fecha reporte (descendente)</option>
					</select>
					<div class="input-group busquedaIncidencia" style = "width: 41.5%;">
				      <input type="text" class="form-control" value = "{$busqueda}" placeholder="Código, dirección o categoría de incidencia" id = "txtBusquedaTodasIncidencias">
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="button" id = "btnBuscarTodasIncidencias"><span class = "fa fa-search"></span></button>
				      </span>
				    </div>
				</div>
				<table class = "table table-striped" id = "tblVerTodasLasIncidencias" style = "margin-top: 50px;">
					<thead>
						<tr>
							<th style = "width: 25%;">Volqueta</th>
							<th style = "width: 20%;">Categoría</th>
							<th style = "width: 12.5%;">Primer reporte</th>
							<th style = "width: 12.5%;">Finalización</th>
							<th style = "width: 15%;">Estado</th>
							<th style = "width: 5%;">Cantidad</th>
							<th style = "width: 5%; text-align: center;">Ver</th>
							<th style = "width: 5%; text-align: center;">Confirmar</th>
						</tr>
					</thead>
					<tbody>
						{foreach from = $incidenciasActuales item = incidencia}
							<tr>
								<td>{$incidencia.numeroVolqueta}</td>
								<td>{$incidencia.categoria}</td>
								<td>{$incidencia.fechaHoraReporte}</td>
								<td>{$incidencia.fechaHoraSolucion}</td>
								<td>
									<select class = "form-control cmbEstadoIncidencia" id = "select{$incidencia.numeroOrden}" style = "margin-top: -7px; {if $incidencia.estado eq "1"}color: #E71D1D{/if}{if $incidencia.estado eq "2"}color: #E7B81D{/if}{if $incidencia.estado eq "3"}color: #269C1B{/if}">
										{foreach from = $estadosIncidencia item = estado}							
											<option value = "{$estado.codigo}" {if $estado.codigo eq $incidencia.estado}selected{/if}>{$estado.descripcion}</option>	
										{/foreach}
									</select>
								</td>
								<td style = "text-align: right;">{$incidencia.cantidad}</td>
								<td style = "text-align: center;"><a href = "/Volquetas/incidencia/verIncidenciasReportadas/{$incidencia.numeroVolqueta|substr:0:3|strip:''}/{$incidencia.codigoCategoria}/{$incidencia.estado}/{$incidencia.fechaHoraSolucion}" class = "iconoVerTodasLasIncidencias iconoVerGrupoIncidencias"><span class = "fa fa-eye"></span></a></td>
								<td style = "text-align: center;"><a onclick = "confirmarEstado({$incidencia.numeroVolqueta|substr:0:3|strip:''},{$incidencia.codigoCategoria}, {$incidencia.estado}, {$incidencia.numeroOrden}, '{$incidencia.fechaHoraSolucion}');" class = "iconoVerTodasLasIncidencias iconoConfirmarIncidencia"><span class = "fa fa-pencil"></span></a></td>
							</tr>
						{/foreach}
						
					</tbody>
				</table>
				
				<!--
				<div class = "contenedorIncidencia">
					<img src = "img/Volquetas/27.png" style = "width: 27%; height: 100%; border-radius: 15px 0 0 15px">
				</div>
				<div class = "contenedorIncidencia">
					<img src = "img/Volquetas/27.png" style = "width: 27%; height: 100%; border-radius: 15px 0 0 15px">
				</div>
				<div class = "contenedorIncidencia">
					<img src = "img/Volquetas/27.png" style = "width: 27%; height: 100%; border-radius: 15px 0 0 15px">
				</div>
				-->

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