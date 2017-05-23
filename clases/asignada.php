<?php

require_once("clases/clase_base.php");
require_once("clases/db.php");

class Asignada extends ClaseBase{	
	private $codigoIncidencia;
	private $ciUsuario;

	public function __construct($obj=NULL){
		if(isset($obj)){
			foreach ($obj as $key => $value) {
				$this->$key = $value;
			}
		}
		$tabla = "asignadas";
		parent::__construct($tabla);
	}

	public function getCodigoIncidencia(){
		return $this->codigoIncidencia;
	}

	public function getCiUsuario(){
		return $this->ciUsuario;
	}

	public function getAsignadasAIncidencia(){
		$sql = "select * from asignadas where codigoIncidencia = ?";
		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('i', $this->codigoIncidencia);
		$stmt->execute();
		$result = $stmt->get_result();
		while($fila = $result->fetch_object()){
			$asginada = new Asignada(array("codigoIncidencia" => $this->codigoIncidencia,
											"ciUsuario" => $fila->ciUsuario));
			$asignadas[] = $asignada;
		}

		return $asignadas;
	}	
}

?>