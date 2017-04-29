<?php

require_once("clases/template.php");
require_once("clases/auth.php");
require_once("clases/usuario.php");
require_once("clases/respuesta.php");
require_once("clases/incidencia.php");

class ControladorIncidencia extends ControladorIndex{
	public function nuevaIncidencia($params = array()){
		$tpl = Template::getInstance();
		$tpl->asignar('location', 'Nueva incidencia');
		$tpl->asignar('landing', 'no');
		$tpl->asignar('success', 'no');
		$tpl->mostrar('nuevaIncidencia');
	}

	public function agregar(){
		$date = getdate();
		$fechaHoraReporte = $date[year]."-".$date[mon]."-".$date[mday]." ".$date[hours].":".$date[minutes].":".$date[seconds];
		$incidencia = new Incidencia(array("ciUsuario" => "48704743",
											"numeroVolqueta" => $_POST['numero'],
											"ubicacionCorrecta" => $_POST['ubicacionCorrecta'],
											"categoria" => $_POST['categoria'],
											"severidad" => $_POST['severidad'],
											"estado" => "Pendiente",
											"resumen" => $_POST['resumen'],
											"descripcion" => $_POST['descripcion'],
											"fechaHoraReporte" => $fechaHoraReporte));
		echo $incidencia->insert();
		/*$tpl = Template::getInstance();
		$tpl->asignar('location', 'Nueva incidencia');
		$tpl->asignar('landing', 'no');
		$tpl->asignar('success', 'si');
		$tpl->mostrar('nuevaIncidencia');*/
		//echo $fechaHoraReporte;
	}
}

?>