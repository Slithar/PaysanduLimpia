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
	private $cantidad;

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

	public function getCantidad(){
		return $this->cantidad;
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

	public function getAllIncidencias(){
		$sql = "SELECT i.codigo, i.numeroVolqueta, i.ubicacionCorrecta, c.descripcion categoria, s.descripcion severidad, e.descripcion estado, i.descripcion, DATE_FORMAT(i.fechaHoraReporte, '%d/%m/%Y %H:%s') fecha FROM incidencias i, categorias c, severidades s, estadosincidencia e WHERE i.categoria = c.codigo AND i.severidad = s.codigo AND i.estado = e.codigo AND ciUsuario = ? AND aplicacion = ? AND idAplicacion = ? ORDER BY i.fechaHoraReporte DESC";
		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('iss', $this->ciUsuario, $this->aplicacion, $this->idAplicacion);
		$stmt->execute();
		$result = $stmt->get_result();
		while($fila = $result->fetch_object()){
			$incidencia = new Incidencia(array("codigo" => $fila->codigo,
												"numeroVolqueta" => $fila->numeroVolqueta,
												"ubicacionCorrecta" => $fila->ubicacionCorrecta,
												"categoria" => utf8_encode($fila->categoria),
												"severidad" => utf8_encode($fila->severidad),
												"estado" => utf8_encode($fila->estado),
												"descripcion" => utf8_encode($fila->descripcion),
												"fechaHoraReporte" => $fila->fecha));
			$incidencias[] = $incidencia;
		}

		return $incidencias;
	}

	public function getIncidenciasPorEstado($estado){
		$sql = "SELECT i.codigo, i.numeroVolqueta, i.ubicacionCorrecta, c.descripcion categoria, s.descripcion severidad, e.descripcion estado, i.descripcion, DATE_FORMAT(i.fechaHoraReporte, '%d/%m/%Y %H:%s') fecha FROM incidencias i, categorias c, severidades s, estadosincidencia e WHERE i.categoria = c.codigo AND i.severidad = s.codigo AND i.estado = e.codigo AND ciUsuario = ? AND aplicacion = ? AND idAplicacion = ? AND i.estado = ? ORDER BY i.fechaHoraReporte DESC";
		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('issi', $this->ciUsuario, $this->aplicacion, $this->idAplicacion, $estado);
		$stmt->execute();
		$result = $stmt->get_result();
		while($fila = $result->fetch_object()){
			$incidencia = new Incidencia(array("codigo" => $fila->codigo,
												"numeroVolqueta" => $fila->numeroVolqueta,
												"ubicacionCorrecta" => $fila->ubicacionCorrecta,
												"categoria" => utf8_encode($fila->categoria),
												"severidad" => utf8_encode($fila->severidad),
												"estado" => utf8_encode($fila->estado),
												"descripcion" => utf8_encode($fila->descripcion),
												"fechaHoraReporte" => $fila->fecha));
			$incidencias[] = $incidencia;
		}

		return $incidencias;
	}

	public function convertToArray(){
		//private $nombreUsuario;
		return array("codigo" => $this->codigo,
					"ciUsuario" => $this->ciUsuario,
					"numeroVolqueta" => $this->numeroVolqueta,
					"aplicacion" => $this->aplicacion,
					"idAplicacion" => $this->idAplicacion,
					"nombreUsuario" => $this->nombreUsuario,
					"ubicacionCorrecta" => $this->ubicacionCorrecta,
					"categoria" => $this->categoria,
					"severidad" => $this->severidad,
					"estado" => $this->estado,
					"descripcion" => $this->descripcion,
					"fechaHoraReporte" => $this->fechaHoraReporte,
					"fechaHoraSolucion" => $this->fechaHoraSolucion);
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

	public function getIncidenciaPorCodigo(){
		$sql = "SELECT i.codigo, i.ciUsuario, i.numeroVolqueta, i.aplicacion, i.nombreUsuario, i.ubicacionCorrecta, c.descripcion categoria, s.descripcion severidad, e.descripcion estado, i.descripcion, DATE_FORMAT(i.fechaHoraReporte, '%d/%m/%Y %H:%s') fecha, DATE_FORMAT(i.fechaHoraSolucion, '%d/%m/%Y %H:%s') fechaSolucion FROM incidencias i, categorias c, severidades s, estadosincidencia e WHERE i.categoria = c.codigo AND i.severidad = s.codigo AND i.estado = e.codigo AND i.codigo = ?";
		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('i', $this->codigo);
		$stmt->execute();
		$result = $stmt->get_result();
		while($fila = $result->fetch_object()){
			$incidencia = new Incidencia(array("codigo" => $fila->codigo,
												"ciUsuario" => $fila->ciUsuario,
												"numeroVolqueta" => $fila->numeroVolqueta,
												"aplicacion" => $fila->aplicacion,
												"nombreUsuario" => utf8_encode($fila->nombreUsuario),
												"ubicacionCorrecta" => $fila->ubicacionCorrecta,
												"categoria" => utf8_encode($fila->categoria),
												"severidad" => utf8_encode($fila->severidad),
												"estado" => utf8_encode($fila->estado),
												"descripcion" => htmlentities($fila->descripcion, ENT_QUOTES),
												"fechaHoraReporte" => $fila->fecha,
												"fechaHoraSolucion" => $fila->fechaHoraSolucion));
		}

		return $incidencia;
	}

	public function getEstadoVolquetaPendiente(){
		$sql = "select count(*) cantidad from incidencias where numeroVolqueta = ? and categoria = ? and estado = 1";
		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('ii', $this->numeroVolqueta, $this->categoria);
		$stmt->execute();
		$result = $stmt->get_result();
		while($fila = $result->fetch_object()){
			$cantidad = $fila->cantidad;
		}
		return $cantidad;
	}	

	public function getEstadoVolquetaEnCurso(){
		$sql = "select count(*) cantidad from incidencias where numeroVolqueta = ? and categoria = ? and estado = 2";
		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('ii', $this->numeroVolqueta, $this->categoria);
		$stmt->execute();
		$result = $stmt->get_result();
		while($fila = $result->fetch_object()){
			$cantidad = $fila->cantidad;
		}
		return $cantidad;
	}

	public function getEstadoPendienteTodasIncidencias(){
		$sql = "select count(*) cantidad from incidencias where numeroVolqueta = ? and estado = 1";
		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('i', $this->numeroVolqueta);
		$stmt->execute();
		$result = $stmt->get_result();
		while($fila = $result->fetch_object()){
			$cantidad = $fila->cantidad;
		}
		return $cantidad;
	}	

	public function getEstadoEnCursoTodasIncidencias(){
		$sql = "select count(*) cantidad from incidencias where numeroVolqueta = ? and estado = 2";
		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('i', $this->numeroVolqueta);
		$stmt->execute();
		$result = $stmt->get_result();
		while($fila = $result->fetch_object()){
			$cantidad = $fila->cantidad;
		}
		return $cantidad;
	}

	public function editarDescripcion(){
		$sql = "update incidencias set descripcion = ? where codigo = ?";
		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('si', $this->descripcion, $this->codigo);
		$stmt->execute();
	}

	public function deleteIncidencia(){
		$sql = "delete from incidencias where codigo = ?";
		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('i', $this->codigo);
		$stmt->execute();
	}

	public function getAllIncidenciasAgrupadas($orden){
		$sql = "SELECT i.numeroVolqueta, v.ubicacion, v.calleX, v.calleY, v.calleZ, c.descripcion categoria, i.categoria codigoCategoria, DATE_FORMAT(MIN(i.fechaHoraReporte), '%d/%m/%Y %H:%s') fecha, DATE_FORMAT(i.fechaHoraSolucion, '%d/%m/%Y %H:%s') fechaSolucion, i.estado, COUNT(*) cantidad FROM incidencias i, volquetas v, categorias c WHERE i.numeroVolqueta = v.numero AND i.categoria = c.codigo GROUP BY i.numeroVolqueta, i.categoria, i.estado, i.fechaHoraSolucion ORDER BY MIN(i.fechaHoraReporte) ".$orden;

		$stmt = DB::conexion()->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		while($fila = $result->fetch_object()){
			if($fila->ubicacion == "Esquina"){
				if($fila->calleY != "Independencia")
					$direccion = utf8_encode($fila->calleX)." y ".utf8_encode($fila->calleY);
				else
					$direccion = utf8_encode($fila->calleX)." e ".utf8_encode($fila->calleY);
			}
			else{
				$direccion = utf8_encode($fila->calleX)." entre ".utf8_encode($fila->calleY)." y ".utf8_encode($fila->calleZ);
			}

			$incidencia = new Incidencia(array("numeroVolqueta" => $fila->numeroVolqueta." (".$direccion.")",
												"categoria" => utf8_encode($fila->categoria),
												"fechaHoraReporte" => $fila->fecha,
												"fechaHoraSolucion" => $fila->fechaSolucion,
												"estado" => $fila->estado,
												"cantidad" => $fila->cantidad,
												"codigo" => $fila->codigoCategoria,));

			$incidencias[] = $incidencia;
		}
		return $incidencias;
	}

	public function getIncidenciasAgrupadasPorEstado($estado, $orden){
		$sql = "SELECT i.numeroVolqueta, v.ubicacion, v.calleX, v.calleY, v.calleZ, c.descripcion categoria, i.categoria codigoCategoria, DATE_FORMAT(MIN(i.fechaHoraReporte), '%d/%m/%Y %H:%s') fecha, DATE_FORMAT(i.fechaHoraSolucion, '%d/%m/%Y %H:%s') fechaSolucion, i.estado, COUNT(*) cantidad FROM incidencias i, volquetas v, categorias c WHERE i.numeroVolqueta = v.numero AND i.categoria = c.codigo AND i.estado = ? GROUP BY i.numeroVolqueta, i.categoria, i.estado, i.fechaHoraSolucion ORDER BY MIN(i.fechaHoraReporte) ".$orden;
		$stmt = DB::conexion()->prepare($sql);
		$stmt->bind_param('i', $estado);
		$stmt->execute();
		$result = $stmt->get_result();
		while($fila = $result->fetch_object()){
			if($fila->ubicacion == "Esquina"){
				if($fila->calleY != "Independencia")
					$direccion = utf8_encode($fila->calleX)." y ".utf8_encode($fila->calleY);
				else
					$direccion = utf8_encode($fila->calleX)." e ".utf8_encode($fila->calleY);
			}
			else{
				$direccion = utf8_encode($fila->calleX)." entre ".utf8_encode($fila->calleY)." y ".utf8_encode($fila->calleZ);
			}

			$incidencia = new Incidencia(array("numeroVolqueta" => $fila->numeroVolqueta." (".$direccion.")",
												"categoria" => utf8_encode($fila->categoria),
												"fechaHoraReporte" => $fila->fecha,
												"fechaHoraSolucion" => $fila->fechaSolucion,
												"estado" => $fila->estado,
												"cantidad" => $fila->cantidad,
												"codigo" => $fila->codigoCategoria,));

			$incidencias[] = $incidencia;
		}
		return $incidencias;
	}

	public function getVolquetasAgrupadas(){
		$sql = "SELECT i.codigo, i.numeroVolqueta, i.ubicacionCorrecta, c.descripcion categoria, e.descripcion estado, DATE_FORMAT(i.fechaHoraReporte, '%d/%m/%Y %H:%s') fecha FROM incidencias i, volquetas v, categorias c, estadosVolqueta e	WHERE i.numeroVolqueta = v.numero AND i.categoria = c.codigo AND i.estado = e.codigo AND i.numeroVolqueta = ?	AND i.categoria = ?	AND i.estado = ? ";
		if($this->fechaHoraSolucion != NULL)
		 	$sql .= "AND i.fechaHoraSolucion = ?";
		$sql .= "ORDER BY i.fechaHoraReporte ASC;";
		$stmt = DB::conexion()->prepare($sql);
		if($this->fechaHoraSolucion != NULL)
			$stmt->bind_param('iiis', $this->numeroVolqueta, $this->categoria, $this->estado, $this->fechaHoraSolucion);
		else
			$stmt->bind_param('iii', $this->numeroVolqueta, $this->categoria, $this->estado);
		
		$stmt->execute();
		$result = $stmt->get_result();
		while($fila = $result->fetch_object()){
			$incidencia = new Incidencia(array("codigo" => $fila->codigo,
												"numeroVolqueta" => $fila->numeroVolqueta,
												"ubicacionCorrecta" => $fila->ubicacionCorrecta,
												"categoria" => utf8_encode($fila->categoria),
												"estado" => utf8_encode($fila->estado),
												"fechaHoraReporte" => $fila->fecha));
			$incidencias[] = $incidencia;
		}

		return $incidencias;

	}

}

?>