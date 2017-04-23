<?php 
require_once("clases/template.php");
require_once("clases/auth.php");
require_once("clases/usuario.php");

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

		$params = array(
					"ci"=>$_POST["cedulaUsuario"],
					"contrasenia" =>$_POST["passwordUsuario"],
				);

		$usuario = new Usuario($params);

		$res = rtrim($usuario->login());
		
		echo $res;
	}

}
?>