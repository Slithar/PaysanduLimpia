<?php 
require_once("clases/template.php");
require_once("clases/auth.php");
require_once("clases/usuario.php");
require_once("clases/respuesta.php");

class ControladorUsuario extends ControladorIndex{

	function landing($param=array()){
		$tpl = Template::getInstance();
		$tpl->asignar('location', 'Inicio');
		//$tpl->asignar('logueado', 'no');
		$tpl->asignar('landing', 'si');
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
		$tpl->asignar('landing', 'no');
		$tpl->mostrar("login");
	}	

	function validate($params=array()){

		$params = array(
					"ci"=>$_POST["cedulaUsuario"],
					"contrasenia" =>$_POST["passwordUsuario"],
				);
		$usuario = new Usuario($params);

		if($usuario->login() == 0){
			$code = "error";
			$message = "Los datos ingresados son incorrectos";
		}
		else{
			$code = "ok";
			$message = "";
		}

		$result = new Respuesta(array("code" => $code,
									"message" => $message,
									"content" => "",));

		echo $result->getResult();
	}

}

?>