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

}

?>