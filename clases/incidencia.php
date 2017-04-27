<?php
require_once("clases/clase_base.php");
require_once("clases/db.php");

class Incidencia extends ClaseBase{
	private $codigo;
	private $ciUsuario;
	private $numeroVolqueta;
	private $ubicacionCorrecta;
	private $categoria;
	private $severidad;
	private $estado;
	private $resumen;
	private $descripcion;
	private $fechaHoraReporte;
	private $fechaHoraSolucion;

	public function __construct($obj=NULL){
		if(isset($obj)){
			foreach ($obj as $key => $value) {
				$this->$key = $value;
			}
		}
		$tabla = "volquetas";
		parent::__construct($tabla);
	}

	public function getCodigo(){
		return $this->codigo;
	}

	public function getCiUsuario(){
		return $this->ciUsuario;
	}

	public function getNumeroVolqueta(){
		return $this->numeroVolqueta;
	}

	public function getUbicacionCorrecta(){
		return $this->ubicacionCorrecta;
	}

	public function getCategoria(){
		return $this->categoria;
	}

	public function getSeveridad(){
		return $this->severidad;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function getResumen(){
		return $this->resumen;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function getFechaHoraReporte(){
		return $this->fechaHoraReporte;
	}

	public function getFechaHoraSolucion(){
		return $this->fechaHoraSolucion;
	}
}

?>