<?php

require_once("clases/clase_base.php");
require_once("clases/db.php");

class Categoria extends ClaseBase{
	private $codigo;
	private $descripcion;

	public function __construct($obj=NULL){
		if(isset($obj)){
			foreach ($obj as $key => $value) {
				$this->$key = $value;
			}
		}
		$tabla = "categorias";
		parent::__construct($tabla);
	}

	public function getCodigo(){
		return $this->codigo;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function getCategorias(){

		$sql = "SELECT * FROM categorias";

		$stmt = DB::conexion()->prepare($sql);

		$stmt->execute();

		$result = $stmt->get_result();

		while($fila = $result->fetch_object()){
			$categoria = array("codigo" => $fila->codigo,
								"descripcion" => utf8_encode($fila->descripcion),);
			$categorias[] = $categoria;
		}

		return $categorias;
	}
	public function getCategoriasObject(){

		$sql = "SELECT * FROM categorias";

		$stmt = DB::conexion()->prepare($sql);

		$stmt->execute();

		$result = $stmt->get_result();

		while($fila = $result->fetch_object()){
			$categoria = new Categoria(array("codigo" => $fila->codigo,
											"descripcion" => utf8_encode($fila->descripcion),));
			$categorias[] = $categoria;
		}

		return $categorias;
	}
	public function convertToArray(){
		return array("codigo" => $this->codigo,
					"descripcion" => $this->descripcion);
	}		
}

?>