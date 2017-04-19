<?php 	
	require "clases/db.php";
	require "vendor/autload.php";
	require "controladores/ctrl_index.php";
	require_once('clases/template.php');

	$controlIndex = new ControladorIndex();

	$tpl = Template::getInstance();



	if(isset($_GET["url"])){
		$request = explode('/', $_GET["url"]);

		$controlador = (!empty($request[0])) ? $request[0] : "volquetas";

		$method = (!empty($request[1])) ? $request[1] : "listado";

		 $params = array();

		 for($i=2; $i< count($request) ; $i++){
		 	$params[] = $request[$i];
		 }
	}
	else{
		$controlador = "volquetas";

		$method = "listado";

		$params = array();
	}

	$objetoControlador = $controlIndex->cargarControlador($controlador);

	$controlIndex->ejecutarAccion($objetoControlador, $method, $params);
?>	