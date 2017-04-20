<?php 
require "clases/session.php";
class Auth extends ControladorIndex{
	public static function loggedIn(){
		Session::init();
		if(Session::get('usuario') == null){
			Session::destroy();
			self::redirect("usuario", "login");
			exit();
		}
	}
}

?>