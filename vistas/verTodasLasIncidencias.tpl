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
			<div class = "contenedor contenedorVerTodasLasIncidencias">
				<div class = "divBusqueda">
					<div class = "divBusquedaLG">
						<label for = "comboEstadoTodasIncidencias">Estado:&nbsp;&nbsp;</label>
						<select id = "comboEstadoTodasIncidencias" class = "form-control">
							<option value = "0">Todas</option>
							{foreach from = $estadosIncidencia item = e}							
								<option value = "{$e.codigo}" {if $e.codigo eq $estado}selected{/if}>{$e.descripcion}</option>					
							{/foreach}
						</select>
						<label for = "comboOrden">Ordenar por:&nbsp;&nbsp;</label>
						<select id = "comboOrden" class = "form-control">
							<option value = "asc" {if $orden eq "asc"}selected{/if}>Reporte (ascendente)</option>
							<option value = "desc" {if $orden eq "desc"}selected{/if}>Reporte (descendente)</option>
						</select>
						<div class="input-group busquedaIncidencia">
					      <input type="text" class="form-control" value = "{$busqueda}" placeholder="Número de volqueta, dirección o categoría de incidencia" id = "txtBusquedaTodasIncidencias">
					      <span class="input-group-btn">
					        <button class="btn btn-default" type="button" id = "btnBuscarTodasIncidencias"><span class = "fa fa-search"></span></button>
					      </span>
					    </div>
				    </div>
				    <div class = "divBusquedaSM">
				    	<table style = "width: 100%">
				    		<tr>
					    		<td style = "width: 17%"><label for = "comboEstadoTodasIncidenciasSM">Estado:&nbsp;&nbsp;</label></td>
					    		<td style = "width: 28%"><label for = "comboOrdenSM">Ordenar por:&nbsp;&nbsp;</label></td>
					    		<td style = "width: 55%"><label for = "txtBusquedaTodasIncidenciasSM">Buscar:&nbsp;&nbsp;</label></td>				    			
				    		</tr>
				    		<tr>
					    		<td  style = "width: 17%">
					    			<select id = "comboEstadoTodasIncidenciasSM" class = "form-control" style = "width: 90%">
										<option value = "0">Todas</option>
										{foreach from = $estadosIncidencia item = e}							
											<option value = "{$e.codigo}" {if $e.codigo eq $estado}selected{/if}>{$e.descripcion}</option>					
										{/foreach}
									</select>
					    		</td>
					    		<td style = "width: 28%">
					    			<select id = "comboOrdenSM" class = "form-control" style = "width: 95%">
										<option value = "asc" {if $orden eq "asc"}selected{/if}>Reporte (ascendente)</option>
										<option value = "desc" {if $orden eq "desc"}selected{/if}>Reporte (descendente)</option>
									</select>
					    		</td>
					    		<td style = "width: 55%">
					    			<div class="input-group busquedaIncidenciaSM">
								      <input type="text" class="form-control" value = "{$busqueda}" placeholder="Número de volqueta, dirección o categoría de incidencia" id = "txtBusquedaTodasIncidenciasSM">
								      <span class="input-group-btn">
								        <button class="btn btn-default" type="button" id = "btnBuscarTodasIncidenciasSM"><span class = "fa fa-search"></span></button>
								      </span>
								    </div>
					    		</td>				    			
				    		</tr>
				    	</table>
				    </div>
				    <div class = "divBusquedaXS">
				    	<table style = "width: 100%">
				    		<tr>
					    		<td style = "width: 205px;">
					    			<label for = "comboEstadoTodasIncidenciasXS" style = "display: inline-block;">Estado:&nbsp;&nbsp;</label>
					    			<select id = "comboEstadoTodasIncidenciasXS" class = "form-control" style = "display: inline-block; width: 141px;">
										<option value = "0">Todas</option>
										{foreach from = $estadosIncidencia item = e}							
											<option value = "{$e.codigo}" {if $e.codigo eq $estado}selected{/if}>{$e.descripcion}</option>					
										{/foreach}
									</select>
					    		</td>
					    		<td class = "tdOrdenarPor">
					    			<label for = "comboOrdenXS" style = "display: inline-block;">Ordenar por:&nbsp;&nbsp;</label>
					    			<select id = "comboOrdenXS" style = "display: inline-block; width: 211px;" class = "form-control">
										<option value = "asc" {if $orden eq "asc"}selected{/if}>Reporte (ascendente)</option>
										<option value = "desc" {if $orden eq "desc"}selected{/if}>Reporte (descendente)</option>
									</select>
					    		</td>				    			
				    		</tr>
				    		<tr>
				    			<td colspan="2"><br><label for = "txtBusquedaTodasIncidenciasXS">Buscar:&nbsp;&nbsp;</label></td>
				    		</tr>
				    		<tr>
				    			<td colspan="2">
					    			<div class="input-group busquedaIncidenciaXS" style = "width: 100%">
								      <input type="text" class="form-control" value = "{$busqueda}" placeholder="Número de volqueta, dirección o categoría de incidencia" id = "txtBusquedaTodasIncidenciasXS">
								      <span class="input-group-btn">
								        <button class="btn btn-default" type="button" id = "btnBuscarTodasIncidenciasSM"><span class = "fa fa-search"></span></button>
								      </span>
								    </div>
					    		</td>
				    		</tr>
				    	</table>
				    </div>
				</div>
				<table class = "table table-striped" id = "tblVerTodasLasIncidencias" style = "margin-top: 50px;">
					<thead>
						<tr>
							<th style = "width: 25%;">Volqueta</th>
							<th style = "width: 20%;">Categoría</th>
							<th style = "width: 12.5%;">Reporte</th>
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
								<td style = "text-align: center;"><a onclick = "confirmarEstado({$incidencia.numeroVolqueta|substr:0:3|strip:''},{$incidencia.codigoCategoria}, {$incidencia.estado}, {$incidencia.numeroOrden}, '{$incidencia.fechaHoraSolucion}', 'lg');" class = "iconoVerTodasLasIncidencias iconoConfirmarIncidencia" id = "link{$incidencia.numeroOrden}"><span class = "fa fa-pencil"></span></a>
									<div  id = "spinner{$incidencia.numeroOrden}" style = "font-size: 18px; position: relative; top: -2px; display: none;">
										<span class = "fa fa-spinner fa-spin"></span>
									</div>
								</td>
							</tr>
						{/foreach}
						
					</tbody>
				</table>
				<div id = "panelsVerTodasLasIncidencias">
					{foreach from = $incidenciasActuales item = incidencia}
						<div class="panel panel-default" style = "margin-top: 55px;">
						  <div class="panel-heading"><b><span class = "fa fa-trash"></span>&nbsp;&nbsp;Volqueta Nº {$incidencia.numeroVolqueta} | {$incidencia.cantidad} {if $incidencia.cantidad eq "1"}incidencia{else}incidencias{/if}</b></div>
						  <div class="panel-body">
						  	<table style = "width: 100%;">
						  		<tr>
						  			<td class = "colredimension"><b>Reporte</b></td>
						  			<td><b>Finalización</b></td>
						  		</tr>
						  		<tr>
						  			<td class = "colredimension">{$incidencia.fechaHoraReporte}</td>
									<td>{$incidencia.fechaHoraSolucion}</td>
						  		</tr>
						  		<tr>
						  			<td class = "colredimension"><br><b>Categoría</b></td>
						  			<td><br><b>Estado</b></td>
						  		</tr>
						  		<tr>
						  			<td class = "colredimension">{$incidencia.categoria}</td>
						  			<td>
						  				<select class = "form-control cmbEstadoIncidencia" id = "selectSM{$incidencia.numeroOrden}" style = "width: 45%; {if $incidencia.estado eq "1"}color: #E71D1D{/if}{if $incidencia.estado eq "2"}color: #E7B81D{/if}{if $incidencia.estado eq "3"}color: #269C1B{/if}">
											{foreach from = $estadosIncidencia item = estado}							
												<option value = "{$estado.codigo}" {if $estado.codigo eq $incidencia.estado}selected{/if}>{$estado.descripcion}</option>	
											{/foreach}
										</select>
						  			</td>
						  		</tr>
						  	</table>
						  	<br>
						  	<div  id = "spinnerSM{$incidencia.numeroOrden}" style = "font-size: 24px; float: left; width:24px; display: none;">
								<span class = "fa fa-spinner fa-spin"></span>
							</div>
						  	<a onclick = "confirmarEstado({$incidencia.numeroVolqueta|substr:0:3|strip:''},{$incidencia.codigoCategoria}, {$incidencia.estado}, {$incidencia.numeroOrden}, '{$incidencia.fechaHoraSolucion}', 'sm');" class = "iconoVerTodasLasIncidencias iconoConfirmarIncidencia" id = "link{$incidencia.numeroOrden}" style = "float: right; margin-left: 15px; font-size: 24px"><span class = "fa fa-pencil"></span></a>

						  	<a href = "/Volquetas/incidencia/verIncidenciasReportadas/{$incidencia.numeroVolqueta|substr:0:3|strip:''}/{$incidencia.codigoCategoria}/{$incidencia.estado}/{$incidencia.fechaHoraSolucion}" class = "iconoVerTodasLasIncidencias iconoVerGrupoIncidencias" style = "float: right; font-size: 24px"><span class = "fa fa-eye"></span></a>
						  </div>
						</div>
					{/foreach}
				</div>
				
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