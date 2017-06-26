<?php

require_once("clases/clase_base.php");
require_once("clases/db.php");

class Volqueta extends ClaseBase{
	private $numero;
	private $latitud;
	private $longitud;
	private $ubicacion;
	private $calleX;
	private $calleY;
	private $calleZ;
	private $estado;

	public function __construct($obj=NULL){
		if(isset($obj)){
			foreach ($obj as $key => $value) {
				$this->$key = $value;
			}
		}
		$tabla = "volquetas";
		parent::__construct($tabla);
	}

	public function getNumero(){
		return $this->numero;
	}

	public function getLatitud(){
		return $this->latitud;
	}

	public function getLongitud(){
		return $this->longitud;
	}

	public function getUbicacion(){
		return $this->ubicacion;
	}

	public function getCalleX(){
		return $this->calleX;
	}

	public function getCalleY(){
		return $this->calleY;
	}

	public function getCalleZ(){
		return $this->calleZ;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function getAllVolquetas(){
		$sql = "SELECT * FROM volquetas ORDER BY calleX, calleY, numero";

		$stmt = DB::conexion()->prepare($sql);

		$stmt->execute();

		$result = $stmt->get_result();

		while($fila = $result->fetch_object()){
			$volqueta = new Volqueta(array("numero" => $fila->numero,
											"latitud" => $fila->latitud,
											"longitud" => $fila->longitud,
											"ubicacion" => $fila->ubicacion,
											"calleX" => utf8_encode($fila->calleX),
											"calleY" => utf8_encode($fila->calleY),
											"calleZ" => utf8_encode($fila->calleZ),
											"estado" => utf8_encode($fila->estado),));
			$volquetas[] = $volqueta;
		}

		return $volquetas;
	}

	public function getVolquetaPorNumero(){
		$sql = "SELECT * FROM volquetas WHERE numero = ? ORDER BY calleX, calleY, numero";

		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('i', $this->numero);
		$stmt->execute();

		$result = $stmt->get_result();

		while($fila = $result->fetch_object()){
			$volqueta = new Volqueta(array("numero" => $fila->numero,
											"latitud" => $fila->latitud,
											"longitud" => $fila->longitud,
											"ubicacion" => $fila->ubicacion,
											"calleX" => utf8_encode($fila->calleX),
											"calleY" => utf8_encode($fila->calleY),
											"calleZ" => utf8_encode($fila->calleZ),
											"estado" => utf8_encode($fila->estado),));
			$volquetas[] = $volqueta;
		}

		return $volquetas;
	}

	public function convertToArray(){
		return array("numero" => $this->numero,
					"latitud" => $this->latitud,
					"longitud" => $this->longitud,
					"ubicacion" => $this->ubicacion,
					"calleX" => $this->calleX,
					"calleY" => $this->calleY,
					"calleZ" => $this->calleZ,
					"estado" => $this->estado,);
	}

	public function updateEstado(){
		$sql = "update volquetas set estado = ? where numero = ?";
		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('ii', $this->estado, $this->numero);
		return $stmt->execute();
	}

	public function getVolquetasTimeframeChart($params){
		$from = $params[0];
		$till = $params[1];
		$tipo = $params[2];
		if($tipo == "reporte"){
			$tabla = "fechaHoraReporte";
		}
		else{
			$tabla = "fechaHoraSolucion";
		}

		//$sql = "SELECT count(*) FROM incidencias WHERE fechaHoraReporte >= ? AND fechaHoraReporte <= ?";

		$sql = "SELECT count(*) as total FROM incidencias WHERE ".$tabla." IS NOT NULL AND ".$tabla." BETWEEN ? AND ?";

		// aaaa/mm/dd hh:mm:ss

		$stmt = DB::conexion()->prepare($sql);

		$stmt->bind_param('ss', $from, $till);

		$stmt->execute();

		$result = $stmt->get_result();

		$total = $result->fetch_assoc();

		return $total["total"];
	}

	public function getVolquetasAverageTime($params=array()){

		$sql = "SELECT TIME_TO_SEC(TIMEDIFF(fechaHoraSolucion, fechaHoraReporte)) as diff FROM incidencias WHERE fechaHoraSolucion IS NOT NULL";

		$sql2 = "SELECT count(*) as CantidadIncidencias FROM incidencias WHERE fechaHoraSolucion IS NOT NULL";

		$stmt = DB::conexion()->prepare($sql);

		$stmt->execute();

		$result = $stmt->get_result();
		
		$stmt2 = DB::conexion()->prepare($sql2);

		$stmt2->execute();

		$result2 = $stmt2->get_result();

		$row = $result->fetch_assoc();

		$row2 = $result2->fetch_assoc();

		$ret = array(
						"Tiempo" => $row["diff"],
						"Incidencias" => $row2["CantidadIncidencias"]
					);		

		return $ret;

	}

	public function getVolquetasAverageTimePorCategoria($categoria){

		$sql = "SELECT TIMESTAMPDIFF(HOUR, fechaHoraReporte, fechaHoraSolucion) AS diff FROM incidencias WHERE fechaHoraSolucion IS NOT NULL AND categoria = ?";

		$sql2 = "SELECT count(*) as CantidadIncidencias FROM incidencias WHERE fechaHoraSolucion IS NOT NULL AND categoria = ?";

		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('i', $categoria);
		$stmt->execute();

		$result = $stmt->get_result();
		
		$stmt2 = DB::conexion()->prepare($sql2);
		$stmt2->bind_param('i', $categoria);
		$stmt2->execute();

		$result2 = $stmt2->get_result();

		$row = $result->fetch_assoc();

		$row2 = $result2->fetch_assoc();

		$ret = array(
						"Tiempo" => $row["diff"],
						"Incidencias" => $row2["CantidadIncidencias"]
					);		

		return $ret;

	}


	public function getMostReportedType($params=array()){

		$sql = "SELECT COUNT(*) AS cantidad, c.descripcion categoria FROM incidencias i, categorias c WHERE i.categoria = c.codigo GROUP BY categoria ORDER BY COUNT(*) DESC LIMIT 1";

		$stmt = DB::conexion()->prepare($sql);

		$stmt->execute();

		$result = $stmt->get_result();

		$row = $result->fetch_assoc();

		$queryGetCategoria = "SELECT descripcion FROM categorias WHERE codigo = ?";

		$stmtCategoria = DB::conexion()->prepare($queryGetCategoria);

		$stmtCategoria->bind_param('s', $row['categoria']);

		$stmtCategoria->execute();

		$resultCategoria = $stmtCategoria->get_result();

		$rowCategoria = $resultCategoria->fetch_assoc();

		return htmlentities($rowCategoria["descripcion"], ENT_QUOTES);

	}

	public function getCantidadIncidenciasPorCategoria($categoria){
		$sql = "select count(*) cantidad from incidencias where categoria = ?";
		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('i', $categoria);
		$stmt->execute();
		$result = $stmt->get_result();
		while($fila = $result->fetch_object()){
			$cantidad = $fila->cantidad;
		}

		return $cantidad;
	}

	public function getMostReportedVolquetas($params=array()){

		$sql = "SELECT count(*) as cantidad, numeroVolqueta FROM INCIDENCIAS GROUP BY numeroVolqueta ORDER BY count(*) DESC";

		$stmt = DB::conexion()->prepare($sql);

		$stmt->execute();

		$result = $stmt->get_result();

		$ret = array();

		for($a=0; $a<5;$a++){
			if($row = $result->fetch_assoc()){
				$ret[] = array(
					"cantidad" => $row["cantidad"],
					"nroVol" => $row["numeroVolqueta"]
				);	
			}
		}

		return $ret;

	}

}

?>