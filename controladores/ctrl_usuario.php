<?php 
require_once("clases/template.php");
require_once("clases/auth.php");


class ControladorUsuario extends ControladorIndex{

	function signup($params=array()){
		//auth::loggedIn();
		$tpl = Template::getInstance();
		$tpl->asignar('location','Sign Up');
		$tpl->mostrar("signup");
	}	

}

?>