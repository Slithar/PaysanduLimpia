<?php 
require_once("clases/template.php");
require_once("clases/auth.php");

class ControladorUsuario extends ControladorIndex{

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

	function validate($params=array()){
		$CI = $_POST["cedulaUsuario"];
		$PSW = $_POST["passwordUsuario"];

		echo $CI . $PSW;
	}

}

?>