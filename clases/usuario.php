<?php 
require_once("clases/clase_base.php");
require_once("clases/db.php");
class Usuario extends ClaseBase{
	private $ci;
	private $contrasenia;
	private $nombre;
	private $apellido;
	private $email;
	private $fotoperfil;
	private $funcionario;
	//private $enviarcorreo;
	/* Constructor */

	public function __construct($obj=NULL){
		if(isset($obj)){
			foreach ($obj as $key => $value) {
				$this->$key=$value;
			}
		}
		$tabla = "usuarios";

		parent::__construct($tabla);
	}

	/* Getters */
	public function getCi(){
		return $this->ci;
	}

	public function getContrasenia(){
		return $this->contrasenia;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function getApellido(){
		return $this->apellido;
	}

	public function getEmail(){
		return $this->email;
	}

	public function getFotoperfil(){
		return $this->fotoperfil;
	}

	public function getFuncionario(){
		return $this->funcionario;
	}

	public function getEnviarcorreo(){
		return $this->enviarcorreo;
	}

	/* Setters */

	public function setCi($ci){
		$this->ci = $ci;
	}

	public function setContrasenia($psw){
		$this->contrasenia = $psw;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function setFotoperfil($fotoperfil){
		$this->fotoperfil = $fotoperfil;
	}

	public function setFuncionario($funcionario){
		$this->funcionario = $funcionario;
	}

	public function login(){

		$sql = "SELECT * FROM usuarios WHERE ci=? AND contrasenia = ?";
		
		$stmt = DB::conexion()->prepare($sql);

		echo $this->ci . $this->contrasenia;
		
		$stmt->bind_param("is", $this->ci, $this->contrasenia);

		$stmt->execute();
		
		$stmt->store_result();
		
		echo $stmt->num_rows();

	}

} 

?>