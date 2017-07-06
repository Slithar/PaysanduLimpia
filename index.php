<?php 	
	ini_set("display_errors", 1);
	error_reporting(E_ALL & ~E_NOTICE);
	require "clases/db.php";
	require "vendor/autoload.php";
	require "controladores/ctrl_index.php";
	require "controladores/ctrl_usuario.php";
	require_once('clases/template.php');
	require_once("clases/severidad.php");
	require_once("clases/categoria.php");
	require_once("clases/estadoIncidencia.php");
	require_once("clases/estadoVolqueta.php");
	require_once("clases/session.php");
	require_once("clases/usuario.php");
	
	$severidad = new Severidad();
	$severidades = $severidad->getSeveridades();
	$categoria = new Categoria();
	$categorias = $categoria->getCategorias();
	$estadoIncidencia = new EstadoIncidencia();
	$estadosIncidencia = $estadoIncidencia->getEstadosIncidencia();
	$estadoVolqueta = new EstadoVolqueta();
	$estadosVolqueta = $estadoVolqueta->getEstadosVolqueta();
	$controladorNotificaciones = "usuario";
	$controlIndexNotificaciones = new ControladorUsuario();

	$objetoControladorNotificaciones = $controlIndexNotificaciones->cargarControlador($controladorNotificaciones);
	$method = "notificacionesDelUsuario";
	$params = array();	
	$controlIndexNotificaciones->ejecutarAccion($objetoControladorNotificaciones, $method, $params);

	$controlIndex = new ControladorIndex();
	/*if(isset($_COOKIE['ciUsuario']))
		echo "si";
	else
		echo "no";*/
    $tpl = Template::getInstance();
	Session::init();
	if(Session::exists('tipo')){
		if(Session::get('tipo') == 'paysandulimpia'){
			$tpl->asignar('ci', Session::get('ci'));			
			$tpl->asignar('funcionario', Session::get('funcionario'));
		}
		else{
			$tpl->asignar('funcionario', 'false');
		}
		$tpl->asignar('nombre', Session::get('nombre'));
		$tpl->asignar('fotoPerfil', Session::get('fotoPerfil'));		
		$tpl->asignar('logueado', 'si');		
		$tpl->asignar('classLogueado', 'logueado');
		$tpl->asignar('tipo', Session::get('tipo'));
	}
	else{		
		$tpl->asignar('logueado', 'no');
		$tpl->asignar('classLogueado', 'noLogueado');
		$tpl->asignar('nombre', '');
		$tpl->asignar('fotoPerfil', '');
		$tpl->asignar('funcionario', 'false');		
		$tpl->asignar('tipo', '');
		if(isset($_COOKIE['ciUsuario'])){
			//echo "aca";
			$tpl->asignar('logueado', 'si');		
			$tpl->asignar('classLogueado', 'logueado');
			if(isset($_COOKIE['ciUsuario'])){
			Session::set('ci', $_COOKIE['ciUsuario']);
			//if(isset($_COOKIE['ciUsuario'])){
				$u = new Usuario(array("ci" => $_COOKIE['ciUsuario']));
				$user = $u->seleccionarUsuario();			
				$funcionario = $user->getFuncionario() ? "true" : "false";
				Session::set('funcionario', $funcionario);
				//echo "Nombre: ".$user->getNombre();
				Session::set('nombre', $user->getNombre());
				Session::set('fotoPerfil', $user->getFotoperfil());
				$tpl->asignar('ci', Session::get('ci'));
				$tpl->asignar('nombre', $user->getNombre());
				$tpl->asignar('fotoPerfil', $user->getFotoperfil());
				$tpl->asignar('funcionario', $funcionario);	
			}
				
		}
	}
	$tpl->asignar('severidades', $severidades);
	$tpl->asignar('categorias', $categorias);
	$tpl->asignar('estadosIncidencia', $estadosIncidencia);
	$tpl->asignar('estadosVolqueta', $estadosVolqueta);

	if(isset($_GET["url"])){

		$request = explode('/', $_GET["url"]);

		$controlador = (!empty($request[0])) ? $request[0] : "usuario";

		$method = (!empty($request[1])) ? $request[1] : "landing";

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