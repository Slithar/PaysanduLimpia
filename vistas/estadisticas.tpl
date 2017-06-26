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

	
		<div id = "main" class = "{$classMain} {$classLogueado}"  style = "height: 85.2%;">
			<div class = "contenedor" style = "max-width: 1100px; height: 100%; margin: auto">
				<!--
				<select id="selectEstadistica" style="margin: auto;">
					<option id="estadoVolquetas">Ver el estado de las volquetas</option>
					<option id="tiempo">Búsqueda en un período de tiempo</option>
					<option id="tPromedio">Tiempo promedio en resolver incidencias</option>
					<option id="timr">Tipo de incidencia más reportado</option>
					<option id="rvmi">Ránking de volquetas con más incidencias</option>
				</select>
				-->

				<div id="estadoVolquetaDiv"  class = "contenedorEstadistica estadisticaCorrida">
					<p style = "font-size: 18px; color: #0F3EA1; font-weight: bold; text-align: center;">Cantidad de volquetas por estado</p>
					<br>
					<canvas id="myChart">
					
					</canvas>
				</div>

				<div id="timeDiv" class = "contenedorEstadistica derecho">
					<p style = "font-size: 18px; color: #0F3EA1; font-weight: bold; text-align: center;">Cantidad de incidencias en un período de tiempo</p>
					<br>
					<div style = "margin: 0 auto; width: 70%">
						<b>Desde</b>&nbsp;&nbsp;<input type="text" id="dpickerFrom" class = "form-control txtFecha" readonly/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<b>Hasta</b>&nbsp;&nbsp;<input type="text" id="dpickerTill" class = "form-control txtFecha" readonly/>
						
					</div>
					<br>
					<canvas id="Timeframe">
						
					</canvas>
				</div>

				<div id="inMasRepDiv" class = "contenedorEstadistica">
					<p style = "font-size: 18px; color: #0F3EA1; font-weight: bold; text-align: center;">Cantidad de reportes por tipo de incidencia</p>
					<br>
					<canvas id="catMasReportadas">
						
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
					<p style = "font-size: 18px; color: #0F3EA1; font-weight: bold; text-align: center;">Tiempo promedio para solucionar una incidencia</p>
					<br><br>
					<p style = "font-size: 17px; text-align: center">El tiempo promedio para solucionar incidencias es:</p> 
					<br><br>
					<p style = "font-size: 28px; font-weight: bold; text-align: center;"><span id="tiempoPromedio"></span></p>
					<p style = "font-size: 17px; text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;Horas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Minutos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Segundos&nbsp;</p>
				</div>

				<div id="vMasRepDiv" class = "contenedorEstadistica derecho">
					<p style = "font-size: 18px; color: #0F3EA1; font-weight: bold; text-align: center;">Ranking de volquetas con más incidencias</p>
					<br>
					<canvas id="masReportadas">
						
					</canvas>
				</div>
				<button type = "button" class = "btn btn-danger" id = "btnExportar"><span class = "fa fa-file-pdf-o"></span>&nbsp;&nbsp;&nbsp;Exportar a PDF</button>
			</div>
			
		</div>

		{include file="footer.tpl"}
	</div>
</body>
</html>