<?php

require_once("clases/template.php");
require_once("clases/auth.php");
require_once("clases/volqueta.php");
require_once("clases/respuesta.php");
require_once("clases/estadoVolqueta.php");
require_once("clases/categoria.php");
require_once("clases/PDF.php");
require_once("clases/incidencia.php");

class ControladorVolqueta extends ControladorIndex{
	function verVolquetas($params = array()){
		$tpl = Template::getInstance();
		$tpl->asignar('location', 'Ver volquetas');
		$tpl->asignar('landing', 'no');
		$tpl->asignar('classMain', 'mainNoLanding');
		$tpl->mostrar('verVolquetas');
	}

	function getVolquetas(){

		$volquetas = new Volqueta();		
		$v = $volquetas->getAllVolquetas();
		$arrayVolquetas = array();
		foreach ($v as $volqueta) {
			$arrayVolquetas[] = $volqueta->convertToArray();
		}
		$result = new Respuesta(array("code" => "ok",
									"message" => "",
									"content" => $arrayVolquetas,));
		/*$result = "";
		foreach ($v as $volqueta) {

			$result .= $volqueta->getNumero().";".$volqueta->getLatitud().";".$volqueta->getLongitud().";".$volqueta->getUbicacion().";".$volqueta->getCalleX().";".$volqueta->getCalleY().";".$volqueta->getCalleZ().";".$volqueta->getEstado().":";
		}	
		echo $result;*/
		echo $result->getResult();
	}

	public static function changeState($numero, $estado){
		$volqueta = new Volqueta(array("numero" => $numero,
										"estado" => $estado,));
		return $volqueta->updateEstado();
	}

	/*public function getEstados(){
		$estado = new EstadoVolqueta();
		$estados = $estado->getEstadosVolqueta();
		foreach ($estados as $e) {
			$result[] = $e->convertToArray();
		}

		return $result;
	}*/

	public function estadisticas($params){

		$tpl = Template::getInstance();
		Auth::loggedIn();

		$tpl->asignar('location', 'Estadísticas');
		$tpl->asignar('landing', 'no');		
		$tpl->asignar('classMain', 'mainNoLanding');

		$tpl->mostrar('estadisticas');
		//echo $_SERVER['SERVER_PORT'];
	}

	/*public function getEstados(){
		$estado = new EstadoVolqueta();
		$estados = $estado->getEstadosVolqueta();
		foreach ($estados as $e) {
			$result[] = $e->convertToArray();
		}

		return $result;
	}*/


	public function getVolquetasChart(){
		$volqueta = new Volqueta();

		$allVolquetas = $volqueta->getAllVolquetas();

		$si = 0;
		$tsi = 0;
		$cip = 0;

		foreach ($allVolquetas as $key) {
			# code...
			if($key->getEstado()==1)
				$si++;
			else if($key->getEstado()==2)
				$tsi++;
			else
				$cip++;
		}

		$json = array(
					"labels" => array("Sin incidencias", "Trabajando", "Incidencias pendientes"),

					'datasets' =>array( 
									array(
										"label" => "Volquetas",
										"data" => array(
													$si,
													$tsi,
													$cip
													),
										"backgroundColor" => array(
															'rgba(75, 192, 192, 0.2)', // Verde
											                'rgba(255, 255, 18, 0.2)',
											                'rgba(255, 99, 132, 0.2)' // Rojo
															),
										"borderColor" => array(
															'rgba(75, 192, 192, 1)',
											                'rgba(255, 255, 18, 1)',	
											                'rgba(255,99,132,1)'
														),
										"borderWidth" => 2
									)
								)
				);

		$respuesta = new Respuesta(array("code" => "ok",
										"message" => $json,
										"content" => ""));
		echo $respuesta->getResult();


	}


	public function getVolquetasTimeframeChart($params){

		$volquetas = new Volqueta();

		$params[] = "reporte";

		$reportes = $volquetas->getVolquetasTimeframeChart($params);

		$params[2] = "resueltas";

		$resueltas = $volquetas->getVolquetasTimeframeChart($params);

		$json = array(
					"labels" => array("Reportadas", "Resueltas"),

					'datasets' =>array( 
									array(
										"label" => "Incidencias",
										"data" => array(
													$reportes, $resueltas
													),
										"backgroundColor" => array(
															'rgba(255, 99, 132, 0.2)',
															'rgba(75, 192, 192, 0.2)' // Verde											                
															),
										"borderColor" => array(
															'rgba(255,99,132,1)',
															'rgba(75, 192, 192, 1)'
														),
										"borderWidth" => 2
									)
								)
				);
		
		$respuesta = new Respuesta(array("code" => "ok",
										"message" => $json,
										"content" => ""));
		echo $respuesta->getResult();

	}


	public function getVolquetasAverageTime($params=array()){
		$volquetas = new Volqueta();

		$result = $volquetas->getVolquetasAverageTime();

		if($result["Incidencias"] > 0){
			$averageTime = $result["Tiempo"] / $result["Incidencias"];

			$hours = floor($averageTime / 3600);
			$mins = floor($averageTime / 60 % 60);
			$secs = floor($averageTime % 60);
			$timeFormat = sprintf('%02d:%02d:%02d', $hours, $mins, $secs); 
		}
		else{
			$timeFormat = "00:00:00";
		}
		

		$respuesta = new Respuesta(array("code" => "ok",
										"message" => $timeFormat,
										"content" => ""));
		echo $respuesta->getResult();
	}

	public function getIncidenciasAvegareTimeGeneral($params = array()){
		$fechaDesde = (isset($params[0]) && $params[0] != "") ? $params[0] : "1990-01-01 00:00:00";
		$incidencia = new Incidencia(array("fechaHoraReporte" => $fechaDesde));
		$incidencias = $incidencia->getAllIncidenciasPorFechaDesde();
		$volqueta = new Volqueta();
		if(count($incidencias) > 0){
			$tiempoTotal = 0;
			for($i = 0; $i < count($incidencias); $i++){
				if($i == 0)
					$tiempoTotal += $volqueta->getDiferenciaReporte($fechaDesde, $incidencias[$i]->getCodigo());
				else{
					$j = $i - 1;
					$tiempoTotal += $volqueta->getDiferenciaReporte($fechaDesde, $incidencias[$i]->getCodigo(), $incidencias[$j]->getCodigo());
				}
			}

			$promedioSegundos = $tiempoTotal / count($incidencias);

			$hours = floor($promedioSegundos / 3600);
			$mins = floor($promedioSegundos / 60 % 60);
			$secs = floor($promedioSegundos % 60);
			$tiempoPromedio = sprintf('%02d:%02d:%02d', $hours, $mins, $secs); 
		}
		else{
			$tiempoPromedio = "00:00:00";
		}

		$respuesta = new Respuesta(array("code" => "ok",
										"message" => $tiempoPromedio,
										"content" => ""));
		echo $respuesta->getResult();
	}

	public function getIncidenciasAvegareTimePorHorasCategorias($params = array()){
		$fechaDesde = (isset($params[0]) && $params[0] != "") ? $params[0] : "1990-01-01 00:00:00";
		$categoria = new Categoria();

		$categorias = $categoria->getCategoriasObject();
		foreach ($categorias as $c) {
			$labels[] = $c->getCodigo();
			$incidencia = new Incidencia(array("fechaHoraReporte" => $fechaDesde,
											"categoria" => $c->getCodigo()));
			$incidencias = $incidencia->getAllIncidenciasPorFechaDesdeCategoria();

			$volqueta = new Volqueta();
			if(count($incidencias) > 0){
				$tiempoHoras = 0;
				for($i = 0; $i < count($incidencias); $i++){
					if($i == 0)
						$tiempoHoras += $volqueta->getDiferenciaHorasReporte($fechaDesde, $incidencias[$i]->getCodigo());
					else{
						$j = $i - 1;
						$tiempoHoras += $volqueta->getDiferenciaHorasReporte($fechaDesde, $incidencias[$i]->getCodigo(), $incidencias[$j]->getCodigo());
					}
				}
				$datos[] = intval($tiempoHoras / count($incidencias));
			}
			else{
				$datos[] = 0;
			}
		}

		$json = array(
				"labels" => $labels,

				'datasets' =>array( 
								array(
									"label" => "Horas aproximadas",
									"data" => $datos,
									"backgroundColor" => array(
															'rgba(63, 135, 251, 0.2)',
											                'rgba(63, 135, 251, 0.2)',
											                'rgba(63, 135, 251, 0.2)',
											                'rgba(63, 135, 251, 0.2)',
											                'rgba(63, 135, 251, 0.2)',
											                'rgba(63, 135, 251, 0.2)'
															),
									"borderColor" => array(
														'rgba(63, 135, 251, 1)',
											            'rgba(63, 135, 251, 1)',	
											            'rgba(63, 135, 251, 1)',
											            'rgba(63, 135, 251, 1)',
											            'rgba(63, 135, 251, 1)',
											            'rgba(63, 135, 251, 1)'
													),									
									"borderWidth" => 2
								)
							)
			);

		$respuesta = new Respuesta(array("code" => "ok",
										"message" => $json,
										"content" => "",));
		echo $respuesta->getResult();
	}

	public function getVolquetasAverageTimePorCategoria($params=array()){
		$categoria = new Categoria();

		$categorias = $categoria->getCategoriasObject();
		foreach ($categorias as $c) {
			$labels[] = $c->getCodigo();
			$volqueta = new Volqueta();
			$datos = $volqueta->getVolquetasAverageTimePorCategoria($c->getCodigo());
			if($datos['Incidencias'] > 0)
				$data[] = intval($datos['Tiempo'] / $datos['Incidencias']);
			else
				$data[] = 0;
		}

		$json = array(
				"labels" => $labels,

				'datasets' =>array( 
								array(
									"label" => "Horas aproximadas",
									"data" => $data,
									"backgroundColor" => array(
															'rgba(63, 135, 251, 0.2)',
											                'rgba(63, 135, 251, 0.2)',
											                'rgba(63, 135, 251, 0.2)',
											                'rgba(63, 135, 251, 0.2)',
											                'rgba(63, 135, 251, 0.2)',
											                'rgba(63, 135, 251, 0.2)'
															),
									"borderColor" => array(
														'rgba(63, 135, 251, 1)',
											            'rgba(63, 135, 251, 1)',	
											            'rgba(63, 135, 251, 1)',
											            'rgba(63, 135, 251, 1)',
											            'rgba(63, 135, 251, 1)',
											            'rgba(63, 135, 251, 1)'
													),									
									"borderWidth" => 2
								)
							)
			);
		$respuesta = new Respuesta(array("code" => "ok",
										"message" => $json,
										"content" => ""));
		echo $respuesta->getResult();
	}

	public function getMostReportedType($params=array()){
		/*$volquetas = new Volqueta();

		$result = $volquetas->getMostReportedType();

		echo json_encode($result);*/

		$categoria = new Categoria();

		$categorias = $categoria->getCategoriasObject();
		foreach ($categorias as $c) {
			$labels[] = $c->getCodigo();
			$volqueta = new Volqueta();
			$data[] = $volqueta->getCantidadIncidenciasPorCategoria($c->getCodigo());
		}

		$json = array(
				"labels" => $labels,

				'datasets' =>array( 
								array(
									"label" => "Incidencias",
									"data" => $data,
									"backgroundColor" => array(
															'rgba(63, 135, 251, 0.2)',
											                'rgba(63, 135, 251, 0.2)',
											                'rgba(63, 135, 251, 0.2)',
											                'rgba(63, 135, 251, 0.2)',
											                'rgba(63, 135, 251, 0.2)',
											                'rgba(63, 135, 251, 0.2)'
															),
									"borderColor" => array(
														'rgba(63, 135, 251, 1)',
											            'rgba(63, 135, 251, 1)',	
											            'rgba(63, 135, 251, 1)',
											            'rgba(63, 135, 251, 1)',
											            'rgba(63, 135, 251, 1)',
											            'rgba(63, 135, 251, 1)'
													),									
									"borderWidth" => 2
								)
							)
			);
		$respuesta = new Respuesta(array("code" => "ok",
										"message" => $json,
										"content" => ""));
		echo $respuesta->getResult();

	}

	public function getMostReportedVolquetas($params=array()){
		$volquetas = new Volqueta();

		$result = $volquetas->getMostReportedVolquetas($params);

		$labels = array();

		$data = array();

		foreach ($result as $key) {
			$labels[] = (string)$key["nroVol"];
			$data[] = $key["cantidad"];
		}

		$json = array(
				"labels" => $labels,

				'datasets' =>array( 
								array(
									"label" => "Incidencias",
									"data" => $data,
									"backgroundColor" => array(
															'rgba(63, 135, 251, 0.2)',
											                'rgba(63, 135, 251, 0.2)',
											                'rgba(63, 135, 251, 0.2)',
											                'rgba(63, 135, 251, 0.2)',
											                'rgba(63, 135, 251, 0.2)',
											                'rgba(63, 135, 251, 0.2)'
															),
									"borderColor" => array(
														'rgba(63, 135, 251, 1)',
											            'rgba(63, 135, 251, 1)',	
											            'rgba(63, 135, 251, 1)',
											            'rgba(63, 135, 251, 1)',
											            'rgba(63, 135, 251, 1)',
											            'rgba(63, 135, 251, 1)'
													),						
									"borderWidth" => 2
								)
							)
			);
		$respuesta = new Respuesta(array("code" => "ok",
										"message" => $json,
										"content" => ""));
		echo $respuesta->getResult();
	}

	public function exportarPDF($params = array()){
		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->setFont('Arial', 'B', 14);
		$pdf->Ln(27);
		$pdf->Cell(10);
		$fecha = getdate();
		$pdf->Cell(53,0,utf8_decode('Emitido el día y hora: '), 0, 'L');
		$pdf->setFont('Arial', '', 14);
		$dia = $fecha[mday] < 10 ? "0".$fecha[mday] : $fecha[mday];
		$mes = $fecha[mon] < 10 ? "0".$fecha[mon] : $fecha[mon];
		$hora = ($fecha[hours] - 3) < 10 ? "0".($fecha[hours] - 3) : ($fecha[hours] - 3);
		$minutos = $fecha[minutes] < 10 ? "0".$fecha[minutes] : $fecha[minutes];
		$segundos = $fecha[seconds] < 10 ? "0".$fecha[seconds] : $fecha[seconds];
		$pdf->Cell(0,0,utf8_decode($dia."/".$mes."/".$fecha[year]." ".$hora.":".$minutos.":".$segundos), 0, 'L');
		/*.date('d/m/Y')." ".$hora[hours].":".$hora[minutes].":".$hora[seconds])*/

		$pdf->setFont('Arial', 'B', 14);
		$pdf->Ln(40);
		$pdf->Cell(10);
		$pdf->Cell(0,0,'CANTIDAD DE VOLQUETAS POR ESTADO', 0, 'L');
		$pdf->Ln(15);
		$pdf->Cell(30);
		$pdf->setFillColor(82, 116, 176);
		$pdf->setTextColor(255, 255, 255);
		$pdf->setDrawColor(82, 116, 176);
		$pdf->setFont('Arial', 'B', 12);
		$pdf->Cell(90,10,'  Estado', 1, 0, 'L', True);
		$pdf->Cell(30,10,'  Cantidad', 1, 0, 'L', True);
		$pdf->Ln(10);	
		$pdf->setTextColor(0, 0, 0);

		$volqueta = new Volqueta();
		$allVolquetas = $volqueta->getAllVolquetas();

		$si = 0;
		$tsi = 0;
		$cip = 0;

		foreach ($allVolquetas as $key) {
			if($key->getEstado()==1)
				$si++;
			else if($key->getEstado()==2)
				$tsi++;
			else
				$cip++;
		}
		$pdf->setFont('Arial', '', 12);
		$pdf->Cell(30);
		$pdf->Cell(90,10,'  Sin incidencias', 1, 0, 'L');
		$pdf->Cell(30,10,'  '.$si, 1, 0, 'L');
		$pdf->Ln(10);
		$pdf->Cell(30);
		$pdf->Cell(90,10,'  Trabajando sobre incidencias', 1, 0, 'L');
		$pdf->Cell(30,10,'  '.$tsi, 1, 0, 'L');
		$pdf->Ln(10);
		$pdf->Cell(30);
		$pdf->Cell(90,10,'  Con incidencias pendientes', 1, 0, 'L');
		$pdf->Cell(30,10,'  '.$cip, 1, 0, 'L');
		$pdf->Ln(40);
		$pdf->Cell(10);
		$pdf->setFont('Arial', 'B', 14);
		$pdf->Cell(0,0,utf8_decode('CANTIDAD DE INCIDENCIAS EN UN PERÍODO DE TIEMPO'), 0, 'L');	
		$pdf->Ln(15);
		$pdf->Cell(10);
		$pdf->setFillColor(82, 116, 176);
		$pdf->setTextColor(255, 255, 255);
		$pdf->setDrawColor(82, 116, 176);
		$pdf->setFont('Arial', 'B', 12);
		$pdf->Cell(30,10,'  Fecha desde', 1, 0, 'L', True);
		$pdf->Cell(30,10,'  Fecha hasta', 1, 0, 'L', True);
		$pdf->Cell(55,10,'  Incidencias reportadas', 1, 0, 'L', True);
		$pdf->Cell(55,10,'  Incidencias resueltas', 1, 0, 'L', True);
		$pdf->Ln(10);
		$pdf->Cell(10);
		//$pdf->AddPage();
		$fechaD = explode("-", $params[0]);
		$fechaDesde = $fechaD[2]."/".$fechaD[1]."/".$fechaD[0];
		$fechaH = explode("-", $params[1]);
		$fechaHasta = $fechaH[2]."/".$fechaH[1]."/".$fechaH[0];
		$paramsEstadistica[0] = $params[0]." 00:00:00";
		$paramsEstadistica[1] = $params[1]." 23:59:59";		
		$paramsEstadistica[2] = "reporte";
		$reportes = $volqueta->getVolquetasTimeframeChart($paramsEstadistica);

		$paramsEstadistica[2] = "resueltas";

		$resueltas = $volqueta->getVolquetasTimeframeChart($paramsEstadistica);
		$pdf->setTextColor(0, 0, 0);
		$pdf->setFont('Arial', '', 12);
		$pdf->Cell(30,10,'  '.$fechaDesde, 1, 0, 'L');
		$pdf->Cell(30,10,'  '.$fechaHasta, 1, 0, 'L');
		$pdf->Cell(55,10,'  '.$reportes, 1, 0, 'L');
		$pdf->Cell(55,10,'  '.$resueltas, 1, 0, 'L');
		$pdf->AddPage();
		$pdf->Ln(27);
		$pdf->Cell(10);
		$pdf->setFont('Arial', 'B', 14);
		$pdf->Cell(55,10,utf8_decode('RANKING DE VOLQUETAS CON MÁS INCIDENCIAS'), 0, 0, 'L');
		$pdf->Ln(15);
		$pdf->Cell(10);
		$pdf->setFillColor(82, 116, 176);
		$pdf->setTextColor(255, 255, 255);
		$pdf->setDrawColor(82, 116, 176);
		$pdf->setFont('Arial', 'B', 12);
		$pdf->Cell(20,10,utf8_decode('  Orden'), 1, 0, 'L', True);
		$pdf->Cell(30,10,utf8_decode('  Nº volqueta'), 1, 0, 'L', True);
		$pdf->Cell(90,10,utf8_decode('  Dirección'), 1, 0, 'L', True);
		$pdf->Cell(30,10,'  Cantidad', 1, 0, 'L', True);
		$pdf->setTextColor(0, 0, 0);
		$pdf->setFont('Arial', '', 12);

		$volquetas = $volqueta->getMostReportedVolquetas(array());
		for($j = 0; $j < count($volquetas); $j++){
			$pdf->Ln(10);
			$pdf->Cell(10);
			$pdf->Cell(20,10,'  '.($j + 1), 1, 0, 'L');
			$pdf->Cell(30,10,'  '.$volquetas[$j]["nroVol"], 1, 0, 'L');
			$v = new Volqueta(array("numero" => $volquetas[$j]["nroVol"]));
			$vol = $v->getVolquetaPorNumero()[0];
			if($vol->getUbicacion() == "Esquina"){
				if($vol->getCalleY() != "Independencia"){
					$direccion = $vol->getCalleX()." y ".$vol->getCalleY();
				}
				else{
					$direccion = $vol->getCalleX()." e ".$vol->getCalleY();
				}
			}
			else{
				$direccion = $vol->getCalleX()." entre ".$vol->getCalleY()." y ".$vol->getCalleZ();
			}
			$pdf->Cell(90,10, utf8_decode('  '.$direccion), 1, 0, 'L');
			$pdf->Cell(30,10, '  '.$volquetas[$j]["cantidad"], 1, 0, 'L');
		}

		$pdf->setFont('Arial', 'B', 14);
		$pdf->Ln(40);
		$pdf->Cell(10);
		$pdf->Cell(55,10,'CANTIDAD DE REPORTES POR TIPO DE INCIDENCIA', 0, 0, 'L');
		$pdf->Ln(15);
		$pdf->Cell(10);
		$pdf->setFillColor(82, 116, 176);
		$pdf->setTextColor(255, 255, 255);
		$pdf->setDrawColor(82, 116, 176);
		$pdf->setFont('Arial', 'B', 12);
		$pdf->Cell(30,10,utf8_decode('  Código'), 1, 0, 'L', True);
		$pdf->Cell(85,10,'  Tipo de incidencia', 1, 0, 'L', True);
		$pdf->Cell(55,10,'  Cantidad', 1, 0, 'L', True);

		$categoria = new Categoria();

		$categorias = $categoria->getCategoriasObject();
		foreach ($categorias as $c) {
			$labels[] = $c->getCodigo();
			$descripcion[] = $c->getDescripcion();
			//$volqueta = new Volqueta();
			$data[] = $volqueta->getCantidadIncidenciasPorCategoria($c->getCodigo());
		}
		$pdf->setTextColor(0, 0, 0);
		$pdf->setFont('Arial', '', 12);
		for($i = 0; $i < count($labels); $i++){
			$pdf->Ln(10);
			$pdf->Cell(10);
			$pdf->Cell(30,10,'  '.$labels[$i], 1, 0, 'L');
			$pdf->Cell(85,10,'  '.utf8_decode($descripcion[$i]), 1, 0, 'L');
			$pdf->Cell(55,10,'  '.$data[$i], 1, 0, 'L');
		}

		/*$pdf->Ln(40);
		$pdf->Cell(10);*/
		$pdf->setFont('Arial', 'B', 14);
		$pdf->AddPage();
		$pdf->Ln(27);
		$pdf->Cell(10);
		$pdf->Cell(0,0,'HORAS PROMEDIO EN REPORTAR CADA TIPO DE INCIDENCIA', 0, 'L');	
		$pdf->Ln(15);
		$pdf->Cell(10);
		$pdf->setFillColor(82, 116, 176);
		$pdf->setTextColor(255, 255, 255);
		$pdf->setDrawColor(82, 116, 176);
		$pdf->setFont('Arial', 'B', 12);
		$pdf->Cell(30,10,utf8_decode('  Código'), 1, 0, 'L', True);
		$pdf->Cell(85,10,'  Tipo de incidencia', 1, 0, 'L', True);
		$pdf->Cell(55,10,'  Horas aproximadas', 1, 0, 'L', True);

		/****** A INCLUIR DESPUÉS *****/
		$fecha = $params[2]." 00:00:00";
		$fechaDReporte = explode("-", $params[2]);
		$fechaDesdeReporte = $fechaDReporte[2]."/".$fechaDReporte[1]."/".$fechaDReporte[0];
		/*****/


		$categorias = $categoria->getCategoriasObject();
		foreach ($categorias as $c) {
			$labelsReporte[] = $c->getCodigo();
			$incidencia = new Incidencia(array("fechaHoraReporte" => $fecha,
											"categoria" => $c->getCodigo()));
			$incidencias = $incidencia->getAllIncidenciasPorFechaDesdeCategoria();

			$volqueta = new Volqueta();
			if(count($incidencias) > 0){
				$tiempoHoras = 0;
				for($i = 0; $i < count($incidencias); $i++){
					if($i == 0)
						$tiempoHoras += $volqueta->getDiferenciaHorasReporte($fecha, $incidencias[$i]->getCodigo());
					else{
						$j = $i - 1;
						$tiempoHoras += $volqueta->getDiferenciaHorasReporte($fecha, $incidencias[$i]->getCodigo(), $incidencias[$j]->getCodigo());
					}
				}
				$datos[] = intval($tiempoHoras / count($incidencias));
			}
			else{
				$datos[] = 0;
			}
		}

		$pdf->setTextColor(0, 0, 0);
		$pdf->setFont('Arial', '', 12);
		for($i = 0; $i < count($labels); $i++){
			$pdf->Ln(10);
			$pdf->Cell(10);
			$pdf->Cell(30,10,'  '.$labelsReporte[$i], 1, 0, 'L');
			$pdf->Cell(85,10,'  '.utf8_decode($descripcion[$i]), 1, 0, 'L');
			$pdf->Cell(55,10,'  '.$datos[$i], 1, 0, 'L');
			//$pdf->Ln(10);
		}
		$pdf->setFont('Arial', 'B', 12);
		$pdf->Ln(27);
		$pdf->Cell(10);
		$pdf->Cell(0,0,utf8_decode('Cálculos realizados a partir de la fecha: '.$fechaDesdeReporte), 0, 'L');
		$pdf->setFont('Arial', 'B', 14);
		$pdf->Ln(25);
		$pdf->Cell(10);
		$pdf->Cell(0,0,'HORAS PROMEDIO EN RESOLVER CADA TIPO DE INCIDENCIA', 0, 'L');	
		$pdf->Ln(15);
		$pdf->Cell(10);
		$pdf->setFillColor(82, 116, 176);
		$pdf->setTextColor(255, 255, 255);
		$pdf->setDrawColor(82, 116, 176);
		$pdf->setFont('Arial', 'B', 12);
		$pdf->Cell(30,10,utf8_decode('  Código'), 1, 0, 'L', True);
		$pdf->Cell(85,10,'  Tipo de incidencia', 1, 0, 'L', True);
		$pdf->Cell(55,10,'  Horas aproximadas', 1, 0, 'L', True);
		
		foreach ($categorias as $c) {
			//$volqueta = new Volqueta();
			$datos = $volqueta->getVolquetasAverageTimePorCategoria($c->getCodigo());
			if($datos['Incidencias'] > 0)
				$horas[] = intval($datos['Tiempo'] / $datos['Incidencias']);
			else
				$horas[] = 0;
		}

		$pdf->setTextColor(0, 0, 0);
		$pdf->setFont('Arial', '', 12);
		for($i = 0; $i < count($labels); $i++){
			$pdf->Ln(10);
			$pdf->Cell(10);
			$pdf->Cell(30,10,'  '.$labels[$i], 1, 0, 'L');
			$pdf->Cell(85,10,'  '.utf8_decode($descripcion[$i]), 1, 0, 'L');
			$pdf->Cell(55,10,'  '.$horas[$i], 1, 0, 'L');
			//$pdf->Ln(10);
		}
		$pdf->AddPage();
		$pdf->Ln(27);
		$pdf->Cell(10);
		$pdf->setFont('Arial', 'B', 14);
		$pdf->Cell(55,10,'TIEMPO PROMEDIO EN REPORTAR UNA INCIDENCIA', 0, 0, 'L');
		$pdf->Ln(15);
		$pdf->Cell(10);
		$pdf->setFillColor(82, 116, 176);
		$pdf->setTextColor(255, 255, 255);
		$pdf->setDrawColor(82, 116, 176);
		$pdf->setFont('Arial', 'B', 12);
		$pdf->Cell(35);
		$pdf->Cell(30,10,'Horas', 1, 0, 'C', True);
		$pdf->Cell(30,10,'Minutos', 1, 0, 'C', True);
		$pdf->Cell(30,10,'Segundos', 1, 0, 'C', True);
		/****** A INCLUIR DESPUÉS *****/
		$fecha = $params[3]." 00:00:00";
		$fechaDReportesGeneral = explode("-", $params[3]);
		$fechaDesdeReportesGeneral = $fechaDReportesGeneral[2]."/".$fechaDReportesGeneral[1]."/".$fechaDReportesGeneral[0];
		/*****/
		$pdf->setTextColor(0, 0, 0);
		$pdf->setFont('Arial', '', 18);
		/*
		$result = $volqueta->getVolquetasAverageTime();

		$averageTime = $result["Tiempo"] / $result["Incidencias"];

		$hours = floor($averageTime / 3600);
		$mins = floor($averageTime / 60 % 60);
		$secs = floor($averageTime % 60);*/
		$incidencia = new Incidencia(array("fechaHoraReporte" => $fecha));
		$incidencias = $incidencia->getAllIncidenciasPorFechaDesde();
		$volqueta = new Volqueta();
		if(count($incidencias) > 0){
			$tiempoTotal = 0;
			for($i = 0; $i < count($incidencias); $i++){
				if($i == 0)
					$tiempoTotal += $volqueta->getDiferenciaReporte($fecha, $incidencias[$i]->getCodigo());
				else{
					$j = $i - 1;
					$tiempoTotal += $volqueta->getDiferenciaReporte($fecha, $incidencias[$i]->getCodigo(), $incidencias[$j]->getCodigo());
				}
			}

			$promedioSegundos = $tiempoTotal / count($incidencias);

			$hours = floor($promedioSegundos / 3600) < 10 ? "0" . floor($promedioSegundos / 3600) : floor($promedioSegundos / 3600);
			$mins = floor($promedioSegundos / 60 % 60) < 10 ? "0" . floor($promedioSegundos / 60 % 60) : floor($promedioSegundos / 60 % 60);
			$secs = floor($promedioSegundos % 60) < 10 ? "0" . floor($promedioSegundos % 60) : floor($promedioSegundos % 60);
			$tiempoPromedio = sprintf('%02d:%02d:%02d', $hours, $mins, $secs); 
		}
		else{
			$hours = "00";
			$mins = "00";
			$secs = "00";
		}
		$pdf->Ln(10);
		$pdf->Cell(45);
		$pdf->Cell(30,15,$hours, 1, 0, 'C');
		$pdf->Cell(30,15,$mins, 1, 0, 'C');
		$pdf->Cell(30,15,$secs, 1, 0, 'C');
		$pdf->setFont('Arial', 'B', 12);
		$pdf->Ln(40);
		$pdf->Cell(10);
		$pdf->Cell(0,0,utf8_decode('Cálculos realizados a partir de la fecha: '.$fechaDesdeReportesGeneral), 0, 'L');
		$pdf->Ln(40);
		$pdf->Cell(10);
		$pdf->setFont('Arial', 'B', 14);
		$pdf->Cell(55,10,'TIEMPO PROMEDIO PARA SOLUCIONAR UNA INCIDENCIA', 0, 0, 'L');
		$pdf->Ln(15);
		$pdf->Cell(10);
		$pdf->setFillColor(82, 116, 176);
		$pdf->setTextColor(255, 255, 255);
		$pdf->setDrawColor(82, 116, 176);
		$pdf->setFont('Arial', 'B', 12);
		$pdf->Cell(35);
		$pdf->Cell(30,10,'Horas', 1, 0, 'C', True);
		$pdf->Cell(30,10,'Minutos', 1, 0, 'C', True);
		$pdf->Cell(30,10,'Segundos', 1, 0, 'C', True);
		$pdf->setTextColor(0, 0, 0);
		$pdf->setFont('Arial', '', 18);
		$result = $volqueta->getVolquetasAverageTime();
		if($result['Incidencias'] > 0){

			$averageTime = $result["Tiempo"] / $result["Incidencias"];

			$hours = floor($averageTime / 3600) < 10 ? "0" . floor($averageTime / 3600) : floor($averageTime / 3600);
			$mins = floor($averageTime / 60 % 60) < 10 ? "0" . floor($averageTime / 60 % 60) : floor($averageTime / 60 % 60);
			$secs = floor($averageTime % 60) < 10 ? "0" . floor($averageTime % 60) : floor($averageTime % 60);
		}
		else{
			$hours = "00";
			$mins = "00";
			$secs = "00";
		}
		$pdf->Ln(10);
		$pdf->Cell(45);
		$pdf->Cell(30,15,$hours, 1, 0, 'C');
		$pdf->Cell(30,15,$mins, 1, 0, 'C');
		$pdf->Cell(30,15,$secs, 1, 0, 'C');
		$pdf->Ln(40);
		$pdf->Cell(10);
		
		$pdf->Output(utf8_decode("Paysandú Limpia - Estadísticas de servicios.pdf") , "I");
	}
}

?>