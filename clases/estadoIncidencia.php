<?php

require_once("clases/clase_base.php");
require_once("clases/db.php");

class EstadoIncidencia extends ClaseBase{
	private $codigo;
	private $descripcion;

	public function __construct($obj=NULL){
		if(isset($obj)){
			foreach ($obj as $key => $value) {
				$this->$key = $value;
			}
		}
		$tabla = "estadosIncidencia";
		parent::__construct($tabla);
	}

	public function getCodigo(){
		return $this->codigo;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function getEstadosIncidencia(){

		$sql = "SELECT * FROM estadosIncidencia";

		$stmt = DB::conexion()->prepare($sql);

		$stmt->execute();

		$result = $stmt->get_result();

		while($fila = $result->fetch_object()){
			$estado = array("codigo" => $fila->codigo,
											"descripcion" => utf8_encode($fila->descripcion),);
			$estados[] = $estado;
		}

		return $estados;
	}

	public function convertToArray(){
		return array("codigo" => $this->codigo,
					"descripcion" => $this->descripcion);
	}		
}

?>