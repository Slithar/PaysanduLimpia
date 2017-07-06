jQuery(document).ready(function($) {

	//Para sacar leyenda de arriba
	Chart.defaults.global.legend.display = false;
	
	$("#dpickerFrom").datepicker({ dateFormat: "dd/mm/yy"});
	$("#dpickerTill").datepicker({ dateFormat: "dd/mm/yy"});
	$('#dpickerDesdeTiempoPromedio').datepicker({ dateFormat: "dd/mm/yy"});
	$('#dpickerDesdeHorasPromedioReportes').datepicker({ dateFormat: "dd/mm/yy"});



	//Fecha de doy para gráfico por período de tiempo
	var f = new Date();
	var dd = f.getDate() < 10 ? "0" + f.getDate() : f.getDate();
	var mm = (f.getMonth() + 1) < 10 ? "0" + (f.getMonth() + 1) : (f.getMonth() + 1);
	$('#dpickerFrom').val(dd + "/" + mm + "/" + f.getFullYear());
	$('#dpickerTill').val(dd + "/" + mm + "/" + f.getFullYear());
	$('#dpickerDesdeTiempoPromedio').val("01/" + mm + "/" + f.getFullYear());
	$('#dpickerDesdeHorasPromedioReportes').val("01/" + mm + "/" + f.getFullYear());

	//Inicializamos gráficas
	graficarEstadosVolquetas();
	graficarPeriodoDeTiempo();
	tiempoPromedioGeneral();
	graficarRankingVolquetas();
	graficarResolucionesDeCategoriasPromedio();
	graficarReportesDeCategorias();
	tiempoPromedioGeneralIncidencias();
	graficarReportesDeCategoriasPromedio();

	//Eventos al cambiar la fecha
	$('#dpickerFrom').on('change', function(){
		graficarPeriodoDeTiempo();
	});

	$('#dpickerTill').on('change', function(){
		graficarPeriodoDeTiempo();
	});

	$('#dpickerDesdeTiempoPromedio').on('change', function(){
		tiempoPromedioGeneralIncidencias();
	});

	$('#dpickerDesdeHorasPromedioReportes').on('change', function(){
		graficarReportesDeCategoriasPromedio();
	});

	//Exportar a PDF
	$('#btnExportar').on('click', function(){
		var desde = $("#dpickerFrom").val();
		var hasta = $("#dpickerTill").val();
		var desdeReportes = $('#dpickerDesdeHorasPromedioReportes').val();
		var desdeReporteGeneral = $('#dpickerDesdeTiempoPromedio').val();
		var desdeSplit = desde.split("/");
		var hastaSplit = hasta.split("/");
		var desdeReportesSplit = desdeReportes.split("/");
		var desdeReportesGeneralSplit = desdeReporteGeneral.split("/");
		var from = desdeSplit[2] + "-" + desdeSplit[1] + "-" + desdeSplit[0];
		var till = hastaSplit[2] + "-" + hastaSplit[1] + "-" + hastaSplit[0];
		var fromReportes = desdeReportesSplit[2] + "-" + desdeReportesSplit[1] + "-" + desdeReportesSplit[0];
		var fromReportesGeneral = desdeReportesGeneralSplit[2] + "-" + desdeReportesGeneralSplit[1] + "-" + desdeReportesGeneralSplit[0];
		var a = document.createElement('a');
		a.target = "_blank";
		a.href = "/Volquetas/volqueta/exportarPDF/" + from + "/" + till + "/" + fromReportes + "/" + fromReportesGeneral + "/Paysandú Limpia - Estadísticas de servicios";
		a.click(); 
	});

});


function graficarEstadosVolquetas(){
	var ctx = document.getElementById("myChart").getContext('2d');
	var data;
	$.ajax({
		url: '/Volquetas/volqueta/getVolquetasChart',
		type: 'POST',
		dataType: 'json',
		async: false
	})
	.done(function(json) {
		//console.log(JSON.stringify(json));
		if(json["code"] == "ok")
			data = json["message"];
	});


	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: data,
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
	});
}

function graficarPeriodoDeTiempo(){
	$('#Timeframe').remove();
	$('#timeDiv').append("<canvas id = 'Timeframe'></canvas>");
	/*var contenedor = document.getElementById("timeDiv");
	contenedor.innerHTML = contenedor.innerHTML + "<canvas id = 'Timeframe'></canvas>";*/
	var ctx = document.getElementById("Timeframe").getContext('2d');
	var desde = $("#dpickerFrom").val();
	var hasta = $("#dpickerTill").val();
	var desdeSplit = desde.split("/");
	var hastaSplit = hasta.split("/");
	var from = desdeSplit[2] + "-" + desdeSplit[1] + "-" + desdeSplit[0];
	var till = hastaSplit[2] + "-" + hastaSplit[1] + "-" + hastaSplit[0];

	var url = '/Volquetas/volqueta/getVolquetasTimeframeChart/' +from+ ' 00:00:00/'+till+' 23:59:59'; 
	//console.log(url);
	var data ="";
	$.ajax({
		url: url,
		type: 'POST',
		dataType: 'json',
		async: false
	})
	.done(function(json) {
		if(json["code"] == "ok")
			data = json["message"];
	});
	

	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: data,
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
	});
}

function tiempoPromedioGeneral(){

	$.ajax({
		url: '/Volquetas/volqueta/getVolquetasAverageTime',
		type: 'POST',
		dataType: 'json',
	})
	.done(function(json) {
		if(json["code"] == "ok"){
			var datos = json["message"].split(":");	
			if(datos[2] == null){
				datos[2] == 00;
				datos[1] == 00;
				datos[0] == 00;
			}
			else if(datos[1] == null){
				datos[0] == 00;
				datos[1] == 00;
			}	
			else if(datos[0] == null){
				datos[0] == 00;
			}

			/*for(var i = 0; i < 3; i++){
				if(datos[i] < 10 && datos[i] > 0){
					datos[i] = "0" + datos[i];
				}
			}*/
			
			var hora = datos[0] + "&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;" + datos[1] + "&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;" + datos[2];
			$("#tiempoPromedio").html(hora);
		}
		
	});

}

function tiempoPromedioGeneralIncidencias(){
	var desde = $("#dpickerDesdeTiempoPromedio").val();
	var desdeSplit = desde.split("/");
	var from = desdeSplit[2] + "-" + desdeSplit[1] + "-" + desdeSplit[0];
	$.ajax({
		url: '/Volquetas/volqueta/getIncidenciasAvegareTimeGeneral/' + from + ' 00:00:00',
		type: 'POST',
		dataType: 'json',
	})
	.done(function(json) {
		if(json["code"] == "ok"){
			var datos = json["message"].split(":");	
			if(datos[2] == null){
				datos[2] == 00;
				datos[1] == 00;
				datos[0] == 00;
			}
			else if(datos[1] == null){
				datos[0] == 00;
				datos[1] == 00;
			}	
			else if(datos[0] == null){
				datos[0] == 00;
			}
			//alert(json["content"]);
			/*for(var i = 0; i < 3; i++){
				if(datos[i] < 10 && datos[i] > 0){
					datos[i] = "0" + datos[i];
				}
			}*/
			
			var hora = datos[0] + "&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;" + datos[1] + "&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;" + datos[2];
			$("#tiempoPromedioReporte").html(hora);
		}
		
	})

	.fail(function(error, err, e){
		alert(e);
	});;

}

function graficarRankingVolquetas(){
	var masRep = document.getElementById("masReportadas").getContext('2d');
	var dataMR ="";

	$.ajax({
		url: '/Volquetas/volqueta/getMostReportedVolquetas',
		type: 'POST',
		dataType: 'json',
		async: false
	})
	.done(function(json) {
		if(json["code"] == "ok")
			dataMR = json["message"];
	});

	var myChart = new Chart(masRep, {
	    type: 'bar',
	    data: dataMR,
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
	});
}

function graficarResolucionesDeCategoriasPromedio(){
	var tfPorCategoria = document.getElementById("TimeframePorCategoria").getContext('2d');
	var dataTFPorCategoria ="";
	$.ajax({
		url: '/Volquetas/volqueta/getVolquetasAverageTimePorCategoria',
		type: 'POST',
		dataType: 'json',
		async: false
	})
	.done(function(json) {
		if(json["code"] == "ok")
			dataTFPorCategoria = json["message"];
	});


	var myChart = new Chart(tfPorCategoria, {
	    type: 'bar',
	    data: dataTFPorCategoria,
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
	});
}

function graficarReportesDeCategoriasPromedio(){
	$('#TimeframePorCategoriaReporte').remove();
	$('#tiempoPromedioPorCategoriaReporte').append("<canvas id = 'TimeframePorCategoriaReporte'></canvas>");

	var desde = $("#dpickerDesdeHorasPromedioReportes").val();
	var desdeSplit = desde.split("/");
	var from = desdeSplit[2] + "-" + desdeSplit[1] + "-" + desdeSplit[0];

	var tfPorCategoria = document.getElementById("TimeframePorCategoriaReporte").getContext('2d');
	var dataTFPorCategoria ="";
	$.ajax({
		url: '/Volquetas/volqueta/getIncidenciasAvegareTimePorHorasCategorias/' + from + ' 00:00:00',
		type: 'POST',
		dataType: 'json',
		async: false
	})
	.done(function(json) {
		if(json["code"] == "ok")
			dataTFPorCategoria = json["message"];
	});


	var myChart = new Chart(tfPorCategoria, {
	    type: 'bar',
	    data: dataTFPorCategoria,
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
	});
}

function graficarReportesDeCategorias(){
	var catMasRep = document.getElementById("catMasReportadas").getContext('2d');
	var dataMRT = "";
	$.ajax({
		url: '/Volquetas/volqueta/getMostReportedType',	
		type: 'POST',
		dataType: 'json',
		async : false
	})
	.done(function(json) {
		if(json["code"] == "ok")
			dataMRT = json["message"];
		// var i = 0;
		// while(i < json.length){
		// 	console.log(json[i]["cantidad"] + " " +json[i]["nroVol"] );
		// 	i++;
		// }
	});
	var myChart = new Chart(catMasRep, {
	    type: 'bar',
	    data: dataMRT,
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
	});
}


