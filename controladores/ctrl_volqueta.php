<?php

require_once("clases/template.php");
require_once("clases/auth.php");
require_once("clases/volqueta.php");

class ControladorVolqueta extends ControladorIndex{
	function verVolquetas($params = array()){
		$tpl = Template::getInstance();
		$tpl->asignar('location', 'Ver volquetas');
		$tpl->asignar('landing', 'no');
		$tpl->mostrar('verVolquetas');
	}

	function getVolquetas(){
		$volquetas = new Volqueta();
		$v = $volquetas->getAllVolquetas();
		$result = "";
		foreach ($v as $volqueta) {

			$v .= $volqueta->getNumero().";".$volqueta->getLatitud().";".$volqueta->getLongitud().";".$volqueta->getUbicacion().";".htmlentities($volqueta->getCalleX(), ENT_QUOTES).";".htmlentities($volqueta->getCalleY(), ENT_QUOTES).";".htmlentities($volqueta->getCalleZ(), ENT_QUOTES).";".htmlentities($volqueta->getEstado(), ENT_QUOTES).":";
		}

		echo $v;
	}
}

?>