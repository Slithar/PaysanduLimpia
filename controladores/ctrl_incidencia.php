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
require_once('clases/comentario.php');

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
		$incidencia = new Incidencia(array("numeroVolqueta" => $_POST['numero'],
											"categoria" => $_POST['categoria']));
		$incidenciasPendientes = $incidencia->getEstadoVolquetaPendiente();
		$incidenciasEnCurso = $incidencia->getEstadoVolquetaEnCurso();

		$estado = 1;		

		if($incidenciasPendientes > 0){
			$estado = 1;
		}
		else{
			if($incidenciasEnCurso > 0)
				$estado = 2;			
			else
				$estado = 1;
			
		}
		$incidencia = new Incidencia(array("ciUsuario" => $ci,
											"numeroVolqueta" => $_POST['numero'],
											"aplicacion" => $aplicacion,
											"idAplicacion" => $idAplicacion,
											"nombreUsuario" => $nombreUsuario,
											"ubicacionCorrecta" => $ubicacionCorrecta,
											"categoria" => $_POST['categoria'],
											"severidad" => $_POST['severidad'],
											"estado" => $estado,
											"descripcion" => $_POST['descripcion'],));
		
		$incidencia->insert();
		$codigoGenerado = $incidencia->getCodigoGenerado();
		$imagenes = $_POST['cantidadImagenes'] != "0" ? $_FILES['imagenes'] : array();
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
		if($estado == 1){
			if(ControladorVolqueta::changeState($_POST['numero'], 3)){
				$this->redirect('incidencia', 'nuevaIncidencia/success/'.$codigoGenerado);
			}
		}
		else{
			$this->redirect('incidencia', 'nuevaIncidencia/success/'.$codigoGenerado);
		}
		
		
	}

	public function getEstadoNuevaIncidencia(){
		$incidencia = new Incidencia(array("numeroVolqueta" => $_POST['numeroVolqueta'],
											"categoria" => $_POST['categoria']));
		$incidenciasPendientes = $incidencia->getEstadoVolquetaPendiente();
		$incidenciasEnCurso = $incidencia->getEstadoVolquetaEnCurso();

		if($incidenciasPendientes > 0){
			$respuesta = new Respuesta(array("code" => "ok",
											"message" => "<span class = 'incidenciaPendiente'>Pendiente</span>",
											"content" => ""));
		}
		else{
			if($incidenciasEnCurso > 0){
				$respuesta = new Respuesta(array("code" => "ok",
											"message" => "<span class = 'incidenciaEn'>En curso</span>",
											"content" => ""));
			}
			else{
				$respuesta = new Respuesta(array("code" => "ok",
											"message" => "<span class = 'incidenciaPendiente'>Pendiente</span>",
											"content" => ""));
			}
		}

		echo $respuesta->getResult(); 
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

			if(isset($params[1]) && $params[1] == "success"){
				$success = "si";
			}
			else{
				$success = "no";
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
			$comentario = new Comentario(array("codigoIncidencia" => $params[0],));
			//echo count($comentarios)." ".$params[0];
			$comentarios = $comentario->getComentarios();
			if(count($comentarios) > 0){
				foreach ($comentarios as $c) {
					$ciUsuario = $c->getCiUsuario();
					$usuario = new Usuario(array("ci" => $ciUsuario));
					$u = $usuario->seleccionarUsuario();
					$nombreUsuario = $u->getNombre()." ".$u->getApellido();
					$fotoPerfil = $u->getFotoperfil();
					$datosComentario = array("comentario" => $c->getComentario(),
											"fechaHora" => $c->getFechaHora(),
											"nombreUsuario" => $nombreUsuario,
											"fotoPerfil" => $fotoPerfil);
					$todosLosComentarios[] = $datosComentario;
				}
			}
			else{
				$todosLosComentarios = array();
			}			
		}
		else{
			$success = "no";
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
		//$tpl->asignar('asignada', $a);
		//echo(count($imagenes));
		$tpl->asignar('imagenes', $imgs);
		$tpl->asignar('cantidadImagenes', count($imagenes));
		$tpl->asignar('success', $success);
		$tpl->asignar('todosLosComentarios', $todosLosComentarios);
		$tpl->asignar('cantidadComentarios', count($todosLosComentarios));
		//var_dump($todosLasComentarios);
		//$tpl->asignar('codigo', $params[0]);
		$tpl->mostrar('verIncidencia');
	}

	public function agregarFotos($params = array()){
		$codigoGenerado = $_POST['codigo'];
		$img = new ImagenDeIncidencia(array("codigoIncidencia" => $codigoGenerado));
		$cantidad = $img->getCantidadImagenes() + 1;
		$imagenes = $_FILES['imagenes'];
		$extensionesAceptadas = array(".JPG", ".JPEG", ".PNG", ".GIF", ".BMP");
		for($i = 0; $i < count($imagenes); $i++){
			$extension = substr($imagenes['name'][$i], strrpos($imagenes['name'][$i], "."));
			if(in_array(strtoupper($extension), $extensionesAceptadas)){
				$cant = $i + $cantidad;
				copy($imagenes['tmp_name'][$i], "img/Incidencias/".$codigoGenerado."-".$cant.$extension);
				$imagen = new ImagenDeIncidencia(array("codigoIncidencia" => $codigoGenerado,
														"rutaImagen" => "img/Incidencias/".$codigoGenerado."-".$cant.$extension,));
				$imagen->insert();
			}
		}
		$this->redirect('incidencia', 'verIncidencia/'.$codigoGenerado.'/success');
	}

	public function editarDescripcionIncidencia(){
		$codigoGenerado = $_POST['codigo'];
		$incidencia = new Incidencia(array("codigo" => $codigoGenerado,
											"descripcion" => $_POST['descripcion']));
		$incidencia->editarDescripcion();
		//$this->redirect('incidencia', 'verIncidencia/'.$codigoGenerado.'/success');
	}

	public function eliminarIncidencia($params = array()){
		if(isset($params[0]) && $params[0] != ""){
			
			$imagenIncidencia = new ImagenDeIncidencia(array("codigoIncidencia" => $params[0]));
			$imagenIncidencia->deleteImagenesIncidencia();

			$incidencia = new Incidencia(array("codigo" => $params[0]));

			$result = $incidencia->getIncidenciaPorCodigo();

			$i = new Incidencia(array("numeroVolqueta" => $result->getNumeroVolqueta(),
									"categoria" => $result->getCategoria()));

			$incidencia->deleteIncidencia();


			$incidenciasPendientes = $i->getEstadoPendienteTodasIncidencias();
			$incidenciasEnCurso = $i->getEstadoEnCursoTodasIncidencias();
			//echo $incidenciasPendientes." - ".$incidenciasEnCurso;
			if($incidenciasPendientes == 0 && $incidenciasEnCurso == 0){
				ControladorVolqueta::changeState($i->getNumeroVolqueta(), 1);
			}
			else{
				if($incidenciasPendientes > 0)
					ControladorVolqueta::changeState($i->getNumeroVolqueta(), 3);
				else if($incidenciasPendientes == 0 && $incidenciasEnCurso > 0)					
					ControladorVolqueta::changeState($i->getNumeroVolqueta(), 2);
			}

			/*$estado = 1;		

			if($incidenciasPendientes > 0){
				$estado = 1;
			}
			else{
				if($incidenciasEnCurso > 0)
					$estado = 2;			
				else
					$estado = 1;
				
			}*/

			$this->redirect('incidencia', 'misIncidencias/0');
		}
	}

	public function verTodasLasIncidencias($params = array()){
		Auth::loggedIn();
		$tpl = Template::getInstance();		
		$tpl->asignar('location', 'Ver todas las incidencias');
		$tpl->asignar('landing', 'no');		
		$tpl->asignar('classMain', 'mainNoLanding');
		$estado = "0";
		if(isset($params[0]) && $params[0] != ""){
			$tpl->asignar('estado', $params[0]);
			$estado = $params[0];
		}
		else{
			$tpl->asignar('estado', '1');
			$estado = "1";
		}

		if(isset($params[1]) && $params[1] != ""){
			$tpl->asignar('orden', $params[1]);
			$orden = $params[1];
		}
		else{
			$tpl->asignar('orden', 'asc');
			$orden = "asc";
		}
		$busqueda = false;
		if(isset($params[2]) && $params[2] != ""){
			$tpl->asignar('busqueda', $params[2]);
			$busqueda = true;
		}
		else{
			$tpl->asignar('busqueda', '');
		}
		$incidencia = new Incidencia(array());
		if($estado == "0")
			$incidencias = $incidencia->getAllIncidenciasAgrupadas($orden);
		else
			$incidencias = $incidencia->getIncidenciasAgrupadasPorEstado($estado, $orden);
		if(count($incidencias) > 0){
			/*foreach ($incidencias as $i) {
				if($busqueda){
					if(mb_stristr($i->getNumeroVolqueta(), $params[2]) != false || strpos($i->getCategoria(), $params[1]) != false){
						$incidenciasActuales[] = array("numeroVolqueta" => $i->getNumeroVolqueta(),
													"categoria" => $i->getCategoria(),
													"fechaHoraReporte" => $i->getFechaHoraReporte(),
													"fechaHoraSolucion" => $i->getFechaHoraSolucion(),
													"estado" => $i->getEstado(),
													"cantidad" => $i->getCantidad(),
													"codigoCategoria" => $i->getCodigo());
					}
				}
				else{

					$incidenciasActuales[] = array("numeroVolqueta" => $i->getNumeroVolqueta(),
													"categoria" => $i->getCategoria(),
													"fechaHoraReporte" => $i->getFechaHoraReporte(),
													"fechaHoraSolucion" => $i->getFechaHoraSolucion(),
													"estado" => $i->getEstado(),
													"cantidad" => $i->getCantidad(),
													"codigoCategoria" => $i->getCodigo());
					}
			}*/
			for($i = 0; $i < count($incidencias); $i++){
				if($busqueda){
					if(mb_stristr($incidencias[$i]->getNumeroVolqueta(), $params[2]) != false || strpos($incidencias[$i]->getCategoria(), $params[1]) != false){
						$incidenciasActuales[] = array("numeroVolqueta" => $incidencias[$i]->getNumeroVolqueta(),
													"categoria" => $incidencias[$i]->getCategoria(),
													"fechaHoraReporte" => $incidencias[$i]->getFechaHoraReporte(),
													"fechaHoraSolucion" => $incidencias[$i]->getFechaHoraSolucion(),
													"estado" => $incidencias[$i]->getEstado(),
													"cantidad" => $incidencias[$i]->getCantidad(),
													"codigoCategoria" => $incidencias[$i]->getCodigo(),
													"numeroOrden" => $i);
					}
				}
				else{

					$incidenciasActuales[] = array("numeroVolqueta" => $incidencias[$i]->getNumeroVolqueta(),
													"categoria" => $incidencias[$i]->getCategoria(),
													"fechaHoraReporte" => $incidencias[$i]->getFechaHoraReporte(),
													"fechaHoraSolucion" => $incidencias[$i]->getFechaHoraSolucion(),
													"estado" => $incidencias[$i]->getEstado(),
													"cantidad" => $incidencias[$i]->getCantidad(),
													"codigoCategoria" => $incidencias[$i]->getCodigo(),
													"numeroOrden" => $i + 1);
				}
			}
		}

		$tpl->asignar('incidenciasActuales', $incidenciasActuales);
		$tpl->mostrar('verTodasLasIncidencias');
	}

	public function verIncidenciasReportadas($params = array()){
		$tpl = Template::getInstance();
		$tpl->asignar('location', 'Ver incidencias');
		$tpl->asignar('landing', 'no');		
		$tpl->asignar('classMain', 'mainNoLanding');
		if(isset($params[3]) && $params[3] != "")
			$fecha = $params[3]."/".$params[4]."/".$params[5];
		else
			$fecha = NULL;
		$incidencia = new Incidencia(array("numeroVolqueta" => $params[0],
											"categoria" => $params[1],
											"estado" => $params[2],
											"fechaHoraSolucion" => $fecha));
		$result = $incidencia->getVolquetasAgrupadas();

		foreach($result as $r){
			$volqueta = new Volqueta(array("numero" => $r->getNumeroVolqueta()));
			$v = $volqueta->getVolquetaPorNumero()[0];
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
			
			$i[] = $datosIncidencia;
			
		}
		$tpl->asignar('incidencias', $i);
		$tpl->mostrar('verIncidenciasReportadas');
	}

	public function verIncidenciaDatos($params = array()){
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

			if(isset($params[1]) && $params[1] == "success"){
				$success = "si";
			}
			else{
				$success = "no";
			}

			$datosIncidencia = array("codigo" => $result->getCodigo(),
										"ciUsuario" => $result->getCiUsuario(),
										"numeroVolqueta" => $result->getNumeroVolqueta(),
										"aplicacion" => $result->getAplicacion(),
										"nombreUsuario" => $result->getNombreUsuario(),
										"ubicacionCorrecta" => $result->getUbicacionCorrecta(),
										"categoria" => $result->getCategoria(),
										"severidad" => $result->getSeveridad(),
										"estado" => $result->getEstado(),
										"descripcion" => $result->getDescripcion(),
										"fecha" => $result->getFechaHoraReporte(),
										"fechaSolucion" => $result->getFechaHoraSolucion(),
										"direccion" => $direccion);
			$usuario = new Usuario(array("ci" => $datosIncidencia['ciUsuario']));
			$u = $usuario->seleccionarUsuario();
			$imagenPerfil = $u->getFotoperfil();
			$nombre = $u->getNombre()." ".$u->getApellido();
			if($datosIncidencia['ciUsuario'] == "1" || $datosIncidencia['ciUsuario'] == "2"){				
				$nombre .= " (".$datosIncidencia['nombreUsuario'].")";
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
			$comentario = new Comentario(array("codigoIncidencia" => $datosIncidencia['codigo'],));
			$comentarios = $comentario->getComentarios();
			if(count($comentarios) > 0){
				foreach ($comentarios as $c) {
					$ciUsuario = $c->getCiUsuario();
					$usuario = new Usuario(array("ci" => $ciUsuario));
					$u = $usuario->seleccionarUsuario();
					$nombreUsuario = $u->getNombre()." ".$u->getApellido();
					$fotoPerfil = $u->getFotoperfil();
					$datosComentario = array("comentario" => $c->getComentario(),
											"fechaHora" => $c->getFechaHora(),
											"nombreUsuario" => $nombreUsuario,
											"fotoPerfil" => $fotoPerfil);
					$todosLosComentarios[] = $datosComentario;
				}
			}
			else{
				$todosLosComentarios = array();
			}			
		}
		else{
			$success = "no";
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

		if(isset($datosIncidencia['fechaSolucion'])){
			$fechaSolucion = $datosIncidencia['fechaSolucion'];
		}
		else{
			$fechaSolucion = "Incidencia no resuelta";
		}
		$tpl->asignar('fechaSolucion', $fechaSolucion);
		$tpl->asignar('direccion', $datosIncidencia['direccion']);
		//$tpl->asignar('asignada', $a);
		//echo(count($imagenes));
		$tpl->asignar('imagenes', $imgs);
		$tpl->asignar('cantidadImagenes', count($imagenes));
		$tpl->asignar('imagenPerfil', $imagenPerfil);
		$tpl->asignar('nombreIncidencia', $nombre);
		$tpl->asignar('todosLosComentarios', $todosLosComentarios);
		$tpl->asignar('cantidadComentarios', count($todosLosComentarios));
		$tpl->asignar('success', $success);
		//echo $datosIncidencia['estado'];
		$tpl->mostrar('verIncidenciaDatos');
	}

	public function	agregarComentario($params = array()){
		$comentario = new Comentario(array("codigoIncidencia" => $_POST['codigo'],
											"comentario" =>$_POST['comentario'],
											"ciUsuario" =>Session::get('ci')));
		$comentario->insertarComentario();

		//una vez que está pronto el agregar, vamos a traer todos los datos de los comentarios
		$comentarios = $comentario->getComentarios();
		if($comentarios > 0){
			foreach ($comentarios as $c) {
				$ciUsuario = $c->getCiUsuario();
				$usuario = new Usuario(array("ci" => $ciUsuario));
				$u = $usuario->seleccionarUsuario();
				$nombreUsuario = $u->getNombre()." ".$u->getApellido();
				$fotoPerfil = $u->getFotoperfil();
				$datosComentario = array("comentario" => $c->getComentario(),
										"fechaHora" => $c->getFechaHora(),
										"nombreUsuario" => $nombreUsuario,
										"fotoPerfil" => $fotoPerfil);
				$todosLosComentarios[] = $datosComentario;
			}
		}
		else{
			$todosLosComentarios = array();
		}
		$respuesta = new Respuesta(array("code" => "ok",
										"message" => $todosLosComentarios,
										"content" => ""));
		echo $respuesta->getResult();
	}

	public function confirmarEstado($params = array()){
		if(isset($_POST['fechaHoraSolucion']) && $_POST['fechaHoraSolucion'] != ""){
			$fechaHoraSolucion = $_POST['fechaHoraSolucion'];
		}
		else{
			$fechaHoraSolucion = NULL;
		}
		if($_POST['estado'] != $_POST['estadoUpdate']){
			$incidencia = new Incidencia(array("numeroVolqueta" => $_POST['numeroVolqueta'],
											"categoria" => $_POST['categoria'],
											"estado" => $_POST['estado'],
											"estadoUpdate" => $_POST['estadoUpdate'],
											"fechaHoraSolucion" => $fechaHoraSolucion));

		
			/*$estado = $incidencia->getEstadoGrupo();
			$incidencia->setEstado($estado);*/
			$incidencia->updateEstado();
			$incidenciasPendientes = $incidencia->getEstadoPendienteTodasIncidencias();
			$incidenciasEnCurso = $incidencia->getEstadoEnCursoTodasIncidencias();
			if($incidenciasPendientes == 0 && $incidenciasEnCurso == 0){
				ControladorVolqueta::changeState($incidencia->getNumeroVolqueta(), 1);
			}
			else{
				if($incidenciasPendientes > 0)
					ControladorVolqueta::changeState($incidencia->getNumeroVolqueta(), 3);
				else if($incidenciasPendientes == 0 && $incidenciasEnCurso > 0)					
					ControladorVolqueta::changeState($incidencia->getNumeroVolqueta(), 2);
			}
			$respuesta = new Respuesta(array("code" => "ok",
											"message" => "",
											"content" => ""));
		}
		else{
			$respuesta = new Respuesta(array("code" => "error",
											"message" => "",
											"content" => ""));
		}
		
		echo $respuesta->getResult();
		//$this->redirect('incidencia', 'verTodasLasIncidencias');

	}
}

?>