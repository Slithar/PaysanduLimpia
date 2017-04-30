<?php 	
	require "clases/db.php";
	require "vendor/autoload.php";
	require "controladores/ctrl_index.php";
	require_once('clases/template.php');
	require_once("clases/severidad.php");
	require_once("clases/categoria.php");
	require_once("clases/estadoIncidencia.php");
	require_once("clases/estadoVolqueta.php");
	error_reporting(E_ERROR);
	ini_set("display_errors", 1);
	$severidad = new Severidad();
	$severidades = $severidad->getSeveridades();
	$categoria = new Categoria();
	$categorias = $categoria->getCategorias();
	$estadoIncidencia = new EstadoIncidencia();
	$estadosIncidencia = $estadoIncidencia->getEstadosIncidencia();
	$estadoVolqueta = new EstadoVolqueta();
	$estadosVolqueta = $estadoVolqueta->getEstadosVolqueta();
	//echo count($severidades);
	/*$categorias = new Categoria()->getCategorias();
	$estadosIncidencia = new EstadoIncidencia()->getEstadosIncidencia();
	$estadosVolqueta = new EstadoVolqueta()->getEstadosVolqueta();*/
	$controlIndex = new ControladorIndex();

	$tpl = Template::getInstance();

	//$usuario = Auth::getUsuarioLogueado();
	
	$tpl->asignar('logueado', 'si');
	$tpl->asignar('severidades', $severidades);
	$tpl->asignar('categorias', $categorias);
	$tpl->asignar('estadosIncidencia', $estadosIncidencia);
	$tpl->asignar('estadosVolqueta', $estadosVolqueta);

	if(isset($_GET["url"])){

		$request = explode('/', $_GET["url"]);

		$controlador = (!empty($request[0])) ? $request[0] : "usuario";

		$method = (!empty($request[1])) ? $request[1] : "login";

		 $params = array();

		 for($i=2; $i< count($request) ; $i++){
		 	$params[] = $request[$i];
		 }
	}
	else{
		$controlador = "usuario";

		$method = "landing";

		$params = array();
	}

	$objetoControlador = $controlIndex->cargarControlador($controlador);

	$controlIndex->ejecutarAccion($objetoControlador, $method, $params);
?>	