<?php

require_once("clases/template.php");
require_once("clases/auth.php");
require_once("clases/usuario.php");
require_once("clases/respuesta.php");

class ControladorIncidencia extends ControladorIndex{
	public function nuevaIncidencia($params = array()){
		$tpl = Template::getInstance();
		$tpl->asignar('location', 'Nueva incidencia');
		$tpl->asignar('landing', 'no');
		$tpl->mostrar('nuevaIncidencia');
	}
}

?>