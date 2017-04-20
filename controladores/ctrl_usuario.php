<?php 
require_once("clases/template.php");
require_once("clases/auth.php");
require 'clases/usuario.php';

class ControladorUsuario extends ControladorIndex{

	if(isset($_GET["key"])){
		$key = $_GET["key"];
	}
	else{
		$key = $_POST["key"];
	}


	function landing($param=array()){
		$tpl = Template::getInstance();
		$tpl->asignar('location', 'Inicio');
		$tpl->mostrar('landing');
	}

	function signup($params=array()){
		$tpl = Template::getInstance();
		$tpl->asignar('location','Sign Up');
		$tpl->mostrar("signup");
	}

	function login($params = array()){
		$tpl = Template::getInstance();
		$tpl->asignar('location', 'Log In');
		$tpl->mostrar("login");
	}	

	if($key === "Validate"){
		
	}

}

?>