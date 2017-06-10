<?php

require_once("clases/clase_base.php");
require_once("clases/db.php");

class Comentario extends ClaseBase{

private $codigo;
private $ciUsuario;
private $codigoIncidencia;
private $comentario;
private $fechaHora;


public function __construct($obj=NULL){
		if(isset($obj)){
			foreach ($obj as $key => $value) {
				$this->$key = $value;
			}
		}
		$tabla = "comentarios";
		parent::__construct($tabla);
	}

	public function getCodigo(){
		return $this->codigo;
	}

	public function getCiUsuario(){
		return $this->ciUsuario;
	}

	public function getCodigoIncidencia(){
		return $this->codigoIncidencia;
	}

	public function getComentario(){
		return $this->comentario;
	}
	public function getFechaHora(){
		return $this->fechaHora;
	}

	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}


	public function setCiUsiario($ciUsuario){
		$this->ciUsuario = $ciUsuario;
	}

	public function setCodigoIncidencia($codigoIncidencia){
		$this->codigoIncidencia = $codigoIncidencia;
	}

		public function setComentario($comentario){
		$this->comentario = $comentario;
	}

		public function setFechaHora($fechaHora){
		$this->fechaHora = $fechaHora;
	}

	public function getComentarios(){

		$sql = "SELECT codigo, ciUsuario, codigoIncidencia, comentario, DATE_FORMAT(fechaHora, '%d/%m/%Y %H:%i') fecha FROM comentarios where codigoIncidencia= ?";

		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('i', $this->codigoIncidencia);
		$stmt->execute();

		$result = $stmt->get_result();

		while($fila = $result->fetch_object()){
			$comentario = new Comentario(array("codigo" => $fila->codigo,
											"ciUsuario" => $fila->ciUsuario,
											"codigoIncidencia" =>$fila->codigoIncidencia,
											"comentario" =>htmlentities($fila->comentario, ENT_QUOTES),
											"fechaHora" =>$fila->fecha,));
			$comentarios[] = $comentario;
		}

		return $comentarios;
	}

	public function insertarComentario(){

		$sql = "INSERT INTO comentarios (ciUsuario, codigoIncidencia, comentario, fechaHora) values (?, ?, ?, now()) ";

		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('iis', $this->ciUsuario,$this->codigoIncidencia,$this->comentario);
		$stmt->execute();

	}	


}	


?>