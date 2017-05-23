<?php

require_once("clases/template.php");
require_once("clases/auth.php");
require_once("clases/usuario.php");
require_once("clases/respuesta.php");
require_once("clases/incidencia.php");
require_once("clases/volqueta.php");
require_once("clases/imagenDeIncidencia.php");
require_once("controladores/ctrl_volqueta.php");
require_once("clases/severidad.php");
require_once("clases/categoria.php");
require_once("clases/estadoIncidencia.php");
require_once("clases/session.php");
require_once("clases/asignada.php");

class ControladorIncidencia extends ControladorIndex{
	public function nuevaIncidencia($params = array()){
		Auth::loggedIn();
		$tpl = Template::getInstance();		
		$tpl->asignar('location', 'Nueva incidencia');
		$tpl->asignar('landing', 'no');		
		$tpl->asignar('classMain', 'mainNoLanding');
		if(isset($params[0]) && $params[0] == "success"){
			$tpl->asignar('success', 'si');
			$tpl->asignar('codigo', $params[1]);
		}
		else{		
			$tpl->asignar('success', 'no');
			$tpl->asignar('codigo', '');
		}
		$tpl->mostrar('nuevaIncidencia');
	}

	public function agregar(){
		Session::init();
		$aplicacion = Session::get('tipo');
		/*$ci = Session::get('ci');
		$idAplicacion = "null";
		$nombreUsuario = "null";*/
		if($aplicacion == "paysandulimpia"){
			$ci = Session::get('ci');
			$idAplicacion = 0;
			$nombreUsuario = 'null';
		}
		if($aplicacion == "facebook"){
			$ci = 1;
			$idAplicacion = Session::get('id');
			$nombreUsuario = Session::get('nombre');
		}
		if($aplicacion == "google"){
			$ci = 2;			
			$idAplicacion = Session::get('id');
			$nombreUsuario = Session::get('nombre');
		}
		$ubicacionCorrecta = 1;
		if(!$_POST['ubicacionCorrecta'])
			$ubicacionCorrecta = 0;
		$incidencia = new Incidencia(array("ciUsuario" => $ci,
											"numeroVolqueta" => $_POST['numero'],
											"aplicacion" => $aplicacion,
											"idAplicacion" => $idAplicacion,
											"nombreUsuario" => $nombreUsuario,
											"ubicacionCorrecta" => $ubicacionCorrecta,
											"categoria" => $_POST['categoria'],
											"severidad" => $_POST['severidad'],
											"estado" => 1,
											"descripcion" => $_POST['descripcion'],));
		
		$incidencia->insert();
		$codigoGenerado = $incidencia->getCodigoGenerado();
		$imagenes = $_FILES['imagenes'];
		$extensionesAceptadas = array(".JPG", ".JPEG", ".PNG", ".GIF", ".BMP");
		for($i = 0; $i < count($imagenes); $i++){
			$extension = substr($imagenes['name'][$i], strrpos($imagenes['name'][$i], "."));
			if(in_array(strtoupper($extension), $extensionesAceptadas)){
				$cant = $i + 1;
				copy($imagenes['tmp_name'][$i], "img/Incidencias/".$codigoGenerado."-".$cant.$extension);
				$imagen = new ImagenDeIncidencia(array("codigoIncidencia" => $codigoGenerado,
														"rutaImagen" => "img/Incidencias/".$codigoGenerado."-".$cant.$extension,));
				$imagen->insert();
			}
		}
		if(ControladorVolqueta::changeState($_POST['numero'], 3)){
			$this->redirect('incidencia', 'nuevaIncidencia/success/'.$codigoGenerado);
		}
		
	}

	public function getIncidencias(){
		$incidencia = new Incidencia();
		echo $incidencia->getIncidencias();
	}

	public function misIncidencias($params = array()){
		$tpl = Template::getInstance();
		Session::init();
		$aplicacion = Session::get('tipo');
		if($aplicacion == "paysandulimpia"){
			$ciUsuario = Session::get('ci');
			$idAplicacion = 0;
		}
		else{
			$ciUsuario = ($aplicacion == "facebook") ? 1 : 2;
			$idAplicacion = Session::get('id');
		}

		$incidencias = new Incidencia(array("ciUsuario" => $ciUsuario,
									"aplicacion" => $aplicacion,
									"idAplicacion" => $idAplicacion));

		if(!isset($params[0]))
			$result = $incidencias->getAllIncidencias();
		else{
			if($params[0] == "0")
				$result = $incidencias->getAllIncidencias();
			else
				$result = $incidencias->getIncidenciasPorEstado($params[0]);
		}
		if(isset($params[1]) && $params[1] != ""){
			$busqueda = true;
		}
		else{
			$busqueda = false;
		}
		if(count($result) > 0){
			foreach($result as $r){
				//Tengo una incidencia
				//$array = $r->convertToArray();
				//echo $r->getNumeroVolqueta();
				$volqueta = new Volqueta(array("numero" => $r->getNumeroVolqueta()));
				//Tengo la volqueta de la incidencia
				$v = $volqueta->getVolquetaPorNumero()[0];
				//var_dump($v);	
				if($v->getUbicacion() == "Esquina"){
					if($v->getCalleY() != "Independencia"){
						$direccion = $v->getCalleX()." y ".$v->getCalleY();
					}
					else{
						$direccion = $v->getCalleX()." e ".$v->getCalleY();
					}
				}
				else{
					$direccion = $v->getCalleX()." entre ".$v->getCalleY()." y ".$v->getCalleZ();
				}

				$datosIncidencia = array("codigo" => $r->getCodigo(),
										"numeroVolqueta" => $r->getNumeroVolqueta(),
										"ubicacionCorrecta" => $r->getUbicacionCorrecta(),
										"categoria" => $r->getCategoria(),
										"severidad" => $r->getSeveridad(),
										"estado" => $r->getEstado(),
										"descripcion" => $r->getDescripcion(),
										"fecha" => $r->getFechaHoraReporte(),
										"direccion" => $direccion);
				if($busqueda){
					//echo "busqueda";
					if($datosIncidencia["codigo"] == $params[1] || mb_stristr($datosIncidencia["direccion"], $params[1]) != false || strpos($datosIncidencia["descripcion"], $params[1]) != false)
						$i[] = $datosIncidencia;
				}
				else{
					//echo "no busqueda";
					$i[] = $datosIncidencia;
				}
				
			}
		}
		else{
			$i = array();
		}
		

		$tpl->asignar('location', 'Mis incidencias');
		$tpl->asignar('landing', 'no');		
		$tpl->asignar('classMain', 'mainNoLanding');
		$tpl->asignar('cantidad', count($i));
		$tpl->asignar('incidencias', $i);
		if(isset($params[0]))
			$tpl->asignar('selected', $params[0]);
		else
			$tpl->asignar('selected', "0");
		if($busqueda)
			$tpl->asignar('busqueda', $params[1]);
		else
			$tpl->asignar('busqueda', '');
		$tpl->mostrar('misIncidencias');
	}

	public function verIncidencia($params = array()){
		if(isset($params[0]) && $params[0] != ""){
			$incidencia = new Incidencia(array("codigo" => $params[0]));
			$result = $incidencia->getIncidenciaPorCodigo();

			$volqueta = new Volqueta(array("numero" => $result->getNumeroVolqueta()));
			//Tengo la volqueta de la incidencia
			$v = $volqueta->getVolquetaPorNumero()[0];
			//var_dump($v);	
			if($v->getUbicacion() == "Esquina"){
				if($v->getCalleY() != "Independencia"){
					$direccion = $v->getCalleX()." y ".$v->getCalleY();
				}
				else{
					$direccion = $v->getCalleX()." e ".$v->getCalleY();
				}
			}
			else{
				$direccion = $v->getCalleX()." entre ".$v->getCalleY()." y ".$v->getCalleZ();
			}

			$datosIncidencia = array("codigo" => $result->getCodigo(),
										"numeroVolqueta" => $result->getNumeroVolqueta(),
										"ubicacionCorrecta" => $result->getUbicacionCorrecta(),
										"categoria" => $result->getCategoria(),
										"severidad" => $result->getSeveridad(),
										"estado" => $result->getEstado(),
										"descripcion" => $result->getDescripcion(),
										"fecha" => $result->getFechaHoraReporte(),
										"direccion" => $direccion);
			$asignada = new Asignada(array("codigoIncidencia" => $result->getCodigo()));
			if(count($asginada) == 0){
				$a = "Sin asignar";
			}
			else{
				foreach ($asignada as $asig) {
					$user = new Usuario(array("ci" => $asig->getCiUsuario()));
					$u = $user->seleccionarUsuario()->getNombre()." ".$user->seleccionarUsuario()->getApellido();
					$a .= ", ".$u;
				}
			}

			$imagen = new ImagenDeIncidencia(array("codigoIncidencia" => $result->getCodigo()));
			$imagenes = $imagen->getImagenesIncidencia();
			if(count($imagenes) > 0){
				foreach ($imagenes as $img) {
					$imgs[] = array("codigoIncidencia" => $result->getCodigo(),
									"rutaImagen" => $img->getRutaImagen());
				}
			}
			else{
				$imgs = array();
			}
			
		}
		$tpl = Template::getInstance();
		$tpl->asignar('location', 'Ver incidencia');
		$tpl->asignar('landing', 'no');		
		$tpl->asignar('classMain', 'mainNoLanding');
		$tpl->asignar('codigo', $datosIncidencia['codigo']);
		$tpl->asignar('numeroVolqueta', $datosIncidencia['numeroVolqueta']);
		$tpl->asignar('ubicacionCorrecta', $datosIncidencia['ubicacionCorrecta']);
		$tpl->asignar('categoria', $datosIncidencia['categoria']);
		$tpl->asignar('severidad', $datosIncidencia['severidad']);
		$tpl->asignar('estado', $datosIncidencia['estado']);
		$tpl->asignar('descripcion', $datosIncidencia['descripcion']);
		$tpl->asignar('fecha', $datosIncidencia['fecha']);
		$tpl->asignar('direccion', $datosIncidencia['direccion']);
		$tpl->asignar('asignada', $a);
		//echo(count($imagenes));
		$tpl->asignar('imagenes', $imgs);
		$tpl->asignar('cantidadImagenes', count($imagenes));
		//$tpl->asignar('codigo', $params[0]);
		$tpl->mostrar('verIncidencia');
	}
}

?>