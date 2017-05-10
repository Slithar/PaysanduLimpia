<?php
require_once("clases/clase_base.php");
require_once("clases/db.php");

class Incidencia extends ClaseBase{
	private $codigo;
	private $ciUsuario;
	private $numeroVolqueta;
	private $aplicacion;
	private $idAplicacion;
	private $nombreUsuario;
	private $ubicacionCorrecta;
	private $categoria;
	private $severidad;
	private $estado;
	private $descripcion;
	private $fechaHoraReporte;
	private $fechaHoraSolucion;

	public function __construct($obj=NULL){
		if(isset($obj)){
			foreach ($obj as $key => $value) {
				$this->$key = $value;
			}
		}
		$tabla = "incidencias";
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

	public function getAplicacion(){
		return $this->aplicacion;
	}

	public function getIdAplicacion(){
		return $this->idAplicacion;
	}

	public function getNombreUsuario(){
		return $this->nombreUsuario;
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

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function getFechaHoraReporte(){
		return $this->fechaHoraReporte;
	}

	public function getFechaHoraSolucion(){
		return $this->fechaHoraSolucion;
	}

	public function insert(){
		echo $this->idAplicacion;
		$sql = "insert into incidencias (ciUsuario, numeroVolqueta, aplicacion, idAplicacion, nombreUsuario, ubicacionCorrecta, categoria, severidad, estado, descripcion, fechaHoraReporte) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now())";
		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('iisssiiiis', $this->ciUsuario, $this->numeroVolqueta, $this->aplicacion, $this->idAplicacion, $this->nombreUsuario, $this->ubicacionCorrecta, $this->categoria, $this->severidad, $this->estado, $this->descripcion);
		return $stmt->execute();
	}

	public function getCodigoGenerado(){
		$sql = "select max(codigo) codigo from incidencias";
		$stmt = DB::conexion()->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		$numero = 0;
		while($fila = $result->fetch_object()){
			$numero = $fila->codigo;
		}
		return $numero;
	}

	function getIncidencias(){
		$sql = "select * from incidencias";
		$stmt = DB::conexion()->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		$res = "";
		while($fila = $result->fetch_object()){
			$res .= htmlentities($fila->categoria, ENT_QUOTES).";";
		}
		return $res;
	}
}

?>