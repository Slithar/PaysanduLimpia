<?php

require_once("clases/clase_base.php");
require_once("clases/db.php");

class ImagenDeIncidencia extends ClaseBase{
	private $codigoIncidencia;
	private $rutaImagen;

	public function __construct($obj=NULL){
		if(isset($obj)){
			foreach ($obj as $key => $value) {
				$this->$key = $value;
			}
		}
		$tabla = "imagenesDeIncidencia";
		parent::__construct($tabla);
	}

	public function getCodigoIncidencia(){
		return $this->codigoIncidencia;
	}

	public function getRutaImagen(){
		return $this->rutaImagen;
	}

	public function insert(){
		$sql = "insert imagenesDeIncidencia values (?, ?);";
		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('is', $this->codigoIncidencia, $this->rutaImagen);
		return $stmt->execute();
	}
}

?>