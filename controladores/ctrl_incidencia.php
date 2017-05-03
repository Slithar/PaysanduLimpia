<?php

require_once("clases/template.php");
require_once("clases/auth.php");
require_once("clases/usuario.php");
require_once("clases/respuesta.php");
require_once("clases/incidencia.php");
require_once("clases/imagenDeIncidencia.php");
require_once("controladores/ctrl_volqueta.php");
require_once("clases/severidad.php");
require_once("clases/categoria.php");
require_once("clases/estadoIncidencia.php");

class ControladorIncidencia extends ControladorIndex{
	public function nuevaIncidencia($params = array()){
		$tpl = Template::getInstance();
		$tpl->asignar('location', 'Nueva incidencia');
		$tpl->asignar('landing', 'no');
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
		$ubicacionCorrecta = 1;
		if(!$_POST['ubicacionCorrecta'])
			$ubicacionCorrecta = 0;
		$incidencia = new Incidencia(array("ciUsuario" => 48704743,
											"numeroVolqueta" => $_POST['numero'],
											"ubicacionCorrecta" => $ubicacionCorrecta,
											"categoria" => $_POST['categoria'],
											"severidad" => $_POST['severidad'],
											"estado" => 1,
											"resumen" => $_POST['resumen'],
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
}

?>