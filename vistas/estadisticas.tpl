<!DOCTYPE html>
<html>
<head>
	<base href="/Volquetas/">
	{include file="bs_js.tpl"}		
	<script src="js/estadisticas.js"></script>
	<link rel = "stylesheet" href = "css/estadisticas.css"/>	
	<title>{$location} - Paysandú Limpia</title>

</head>

<body>
	<div class="wrapper">
		{include file="header.tpl"} 

	
		<div id = "main" class = "{$classMain} {$classLogueado}">
			<div class = "contenedor">
				<div id="estadoVolquetaDiv"  class = "contenedorEstadistica estadisticaCorrida">
					<p style = "font-size: 18px; color: #0F3EA1; font-weight: bold; text-align: center;">Cantidad de volquetas por estado</p>
					<br>
					<canvas id="myChart">
					
					</canvas>
				</div>

				<div id="timeDiv" class = "contenedorEstadistica derecho contenedor2">
					<p style = "font-size: 18px; color: #0F3EA1; font-weight: bold; text-align: center;">Cantidad de incidencias en un período de tiempo</p>
					<br>
					<div id = "desdeHastaCantidadInicidencias">
						<b>Desde:</b>&nbsp;&nbsp;<input type="text" id="dpickerFrom" class = "form-control txtFecha" readonly/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<b>Hasta:</b>&nbsp;&nbsp;<input type="text" id="dpickerTill" class = "form-control txtFecha" readonly/>
						
					</div>
					<br>
					<canvas id="Timeframe">
						
					</canvas>
				</div>

				<div id="vMasRepDiv" class = "contenedorEstadistica">
					<p style = "font-size: 18px; color: #0F3EA1; font-weight: bold; text-align: center;">Ranking de volquetas con más incidencias</p>
					<br>
					<canvas id="masReportadas">
						
					</canvas>
				</div>

				<div id="inMasRepDiv" class = "contenedorEstadistica derecho">
					<p style = "font-size: 18px; color: #0F3EA1; font-weight: bold; text-align: center;">Cantidad de reportes por tipo de incidencia</p>
					<br>
					<canvas id="catMasReportadas">
						
					</canvas>
				</div>

				<div id="tiempoPromedioPorCategoriaReporte" class = "contenedorEstadistica contenedor6">
					<p style = "font-size: 18px; color: #0F3EA1; font-weight: bold; text-align: center;">Horas promedio en reportar cada tipo de incidencia</p>
					<br>
					<div id = "desdeHorasPromedioPorIncidenciaReporte">
						<b>Desde:</b>&nbsp;&nbsp;<input type="text" id="dpickerDesdeHorasPromedioReportes" class = "form-control txtFecha" readonly/>						
					</div>
					<canvas id="TimeframePorCategoriaReporte">
						
					</canvas>
				</div>

				<div id="tiempoPromedioPorCategoria" class = "contenedorEstadistica derecho">
					<p style = "font-size: 18px; color: #0F3EA1; font-weight: bold; text-align: center;">Horas promedio en resolver cada tipo de incidencia</p>
					<br>
					<canvas id="TimeframePorCategoria">
						
					</canvas>
				</div>

				<div class = "contenedorReferencias">
					<b>Tipos de incidencias:</b><br><br><b>1 - </b>La volqueta está llena. <b>2 -</b> La volqueta huele mal. <b>3 -</b> La volqueta se está incendiando. <b>4 - </b>La volqueta se ha dañado. <b>5 - </b>Se han llevado la volqueta. <b>6 -</b> Otra.
				</div>

				<div id="tpromDiv" class = "contenedorEstadistica">
					<p style = "font-size: 18px; color: #0F3EA1; font-weight: bold; text-align: center;">Tiempo promedio de reporte</p>
					<br><br>
					<p style = "font-size: 17px; text-align: center">El tiempo promedio en reportar una nueva incidencia es:</p> 
					<br><br>
					<p style = "font-size: 28px; font-weight: bold; text-align: center;"><span id="tiempoPromedioReporte"></span></p>
					<p style = "font-size: 17px; text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;Horas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Minutos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Segundos&nbsp;</p>
					<!--<br><br><br>-->
					<div id = "desdePromedioReporte">
						<b>Desde:</b>&nbsp;&nbsp;<input type="text" id="dpickerDesdeTiempoPromedio" class = "form-control txtFecha" readonly/>		
					</div>
				</div>

				<div id="tpromDiv" class = "contenedorEstadistica derecho contenedor8">
					<p style = "font-size: 18px; color: #0F3EA1; font-weight: bold; text-align: center;">Tiempo promedio de solución</p>
					<br><br>
					<p style = "font-size: 17px; text-align: center">El tiempo promedio para solucionar incidencias es:</p> 
					<br><br>
					<p style = "font-size: 28px; font-weight: bold; text-align: center;"><span id="tiempoPromedio"></span></p>
					<p style = "font-size: 17px; text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;Horas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Minutos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Segundos&nbsp;</p>
				</div>
				
				<button class = "btn btn-danger" id = "btnExportar"><span class = "fa fa-file-pdf-o"></span>&nbsp;&nbsp;&nbsp;Exportar a PDF</button>
			</div>
			
		</div>

		{include file="footer.tpl"}
	</div>
</body>
</html>