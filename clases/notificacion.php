<?php

require_once("clases/clase_base.php");
require_once("clases/db.php");

class Notificacion extends ClaseBase{

private $codigo;
private $ciReceptor;
private $aplicacion;
private $idAplicacion;
private $mensaje;
private $codigoIncidencia; 
private $fechaHora;
private $tipo;
private $vista;

public function __construct($obj=NULL){
		if(isset($obj)){
			foreach ($obj as $key => $value) {
				$this->$key = $value;
			}
		}
		$tabla = "notificaciones";
		parent::__construct($tabla);
	}

	public function getCodigo(){
		return $this->codigo;
	}

	public function getCiReceptor(){
		return $this->ciReceptor;
	}

	public function getAplicacion(){
		return $this->aplicacion;
	}

	public function getidAplicacion(){
		return $this->idAplicacion;
	}

	public function getMensaje(){
		return $this->mensaje;
	}


	public function getCodigoIncidencia(){
		return $this->codigoIncidencia;
	}

	public function getfechaHora(){
		return $this->fechaHora;
	}

	public function getTipo(){
		return $this->tipo;
	}

	public function getVista(){
		return $this->vista;
	}

	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}


	public function setCiReceptor($ciReceptor){
		$this->ciReceptor = $ciReceptor;
	}

	public function setAplicacion($aplicacion){
		$this->aplicacion = $aplicacion;
	}

	public function setMensaje($mensaje){
		$this->mensaje = $mensaje;
	}


	public function setCodigoIncidencia($codigoIncidencia){
		$this->codigoIncidencia = $codigoIncidencia;
	}

	public function setFechaHora($fechaHora){
		$this->fechaHora = $fechaHora;
	}

	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function setVista($vista){
		$this->vista = $vista;
	}

	public function TeLaNotifico(){
		$sql = "INSERT INTO notificaciones(ciReceptor, aplicacion, idAplicacion, mensaje, codigoIncidencia, fechaHora, tipo,vista ) values ( ? , ?, ? , ? ,?, now(), ?, false) ";
		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('isssis', $this->ciReceptor,$this->aplicacion,$this->idAplicacion, $this->mensaje,$this->codigoIncidencia,$this->tipo);
		$stmt->execute();
	}

	public function getNotificacionesVistas(){
		$sql = "select codigo, ciReceptor, aplicacion, idAplicacion, mensaje, codigoIncidencia, DATE_FORMAT(fechaHora, '%d/%m/%Y %H:%i') AS fechaHora, tipo from notificaciones where ciReceptor = ? and aplicacion = ? and idAplicacion = ? and vista = true order by fechaHora desc";
		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('iss', $this->ciReceptor, $this->aplicacion, $this->idAplicacion);
		$stmt->execute();
		$result = $stmt->get_result();
		while($fila = $result->fetch_object()){
			$notificacion = new Notificacion(array("codigo" => $fila->codigo,
												"ciReceptor" => $this->ciReceptor,
												"aplicacion" => $this->aplicacion,
												"idAplicacion" => $this->idAplicacion,
												"mensaje" => $fila->mensaje,
												"codigoIncidencia" => $fila->codigoIncidencia,
												"fechaHora" => $fila->fechaHora,
												"tipo" => $fila->tipo,
												"vista" => true));
			$notificaciones[] = $notificacion;
		}
		return $notificaciones;
	}

	public function getNotificacionesNoVistas(){
		$sql = "select codigo, ciReceptor, aplicacion, idAplicacion, mensaje, codigoIncidencia, DATE_FORMAT(fechaHora, '%d/%m/%Y %H:%i') AS fechaHora, tipo from notificaciones where ciReceptor = ? and aplicacion = ? and idAplicacion = ? and vista = false order by fechaHora desc";
		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('iss', $this->ciReceptor, $this->aplicacion, $this->idAplicacion);
		$stmt->execute();
		$result = $stmt->get_result();
		while($fila = $result->fetch_object()){
			$notificacion = new Notificacion(array("codigo" => $fila->codigo,
												"ciReceptor" => $this->ciReceptor,
												"aplicacion" => $this->aplicacion,
												"idAplicacion" => $this->idAplicacion,
												"mensaje" => $fila->mensaje,
												"codigoIncidencia" => $fila->codigoIncidencia,
												"fechaHora" => $fila->fechaHora,
												"tipo" => $fila->tipo,
												"vista" => false));
			$notificaciones[] = $notificacion;
		}
		return $notificaciones;
	}

	public function notificacionAVista(){
		$sql = "update notificaciones set vista = true where codigo = ?";
		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('i', $this->codigo);
		$stmt->execute();
	}


}