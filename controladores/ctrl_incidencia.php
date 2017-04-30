<?php

require_once("clases/template.php");
require_once("clases/auth.php");
require_once("clases/usuario.php");
require_once("clases/respuesta.php");
require_once("clases/incidencia.php");
require_once("clases/imagenDeIncidencia.php");
require_once("controladores/ctrl_volqueta.php");

class ControladorIncidencia extends ControladorIndex{
	public function nuevaIncidencia($params = array()){
		$tpl = Template::getInstance();
		$tpl->asignar('location', 'Nueva incidencia');
		$tpl->asignar('landing', 'no');
		$tpl->asignar('success', 'no');
		$tpl->mostrar('nuevaIncidencia');
	}

	public function agregar(){
		/*$date = getdate();
		$fechaHoraReporte = $date[year]."-".$date[mon]."-".$date[mday]." ".$date[hours].":".$date[minutes].":".$date[seconds];*/
		//La forma de fecha anterior no la uso porque no tiene la hora nuestra
		$ubicacionCorrecta = 1;
		if(!$_POST['ubicacionCorrecta'])
			$ubicacionCorrecta = 0;
		$incidencia = new Incidencia(array("ciUsuario" => 48704743,
											"numeroVolqueta" => $_POST['numero'],
											"ubicacionCorrecta" => $ubicacionCorrecta,
											"categoria" => $_POST['categoria'],
											"severidad" => $_POST['severidad'],
											"estado" => "Pendiente",
											"resumen" => $_POST['resumen'],
											"descripcion" => $_POST['descripcion'],));
		
		$incidencia->insert();
		$codigoGenerado = $incidencia->getCodigoGenerado();
		$imagenes = $_FILES['imagenes'];
		$extensionesAceptadas = array(".JPG", ".JPEG", ".PNG", ".GIF", ".BMP");
		for($i = 0; $i < count($imagenes); $i++){
			//echo $imagenes['name'][$i];
			$extension = substr($imagenes['name'][$i], strrpos($imagenes['name'][$i], "."));
			//echo $extension;
			if(in_array(strtoupper($extension), $extensionesAceptadas)){
				$cant = $i + 1;
				copy($imagenes['tmp_name'][$i], "img/Incidencias/".$codigoGenerado."-".$cant.$extension);
				$imagen = new ImagenDeIncidencia(array("codigoIncidencia" => $codigoGenerado,
														"rutaImagen" => "img/Incidencias/".$codigoGenerado."-".$cant.$extension,));
				$imagen->insert();
			}
		}
		if(ControladorVolqueta::changeState($_POST['numero'], "Con incidencias pendientes")){
			$tpl = Template::getInstance();
			$tpl->asignar('location', 'Nueva incidencia');
			$tpl->asignar('landing', 'no');
			$tpl->asignar('success', 'si');
			$tpl->asignar('codigo', $codigoGenerado);
			$tpl->mostrar('nuevaIncidencia');
			//$this->redirect('incidencia', 'nuevaIncidencia');
		}
	}
}

?>