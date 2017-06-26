<?php

require("fpdf/fpdf.php");

class PDF extends FPDF{
	function Header(){
		$this->Image('img/LogoPaysanduLimpia.png', 20, 15, 55);
		$this->setFont('Arial', 'B', 24);
		$this->Cell(114);
		$this->Cell(30, 35, utf8_decode("Estadísticas de servicios"), 0, 0, 'C');
		$this->Ln(20);
	}
	
	function Footer(){
		$this->setY(-15);
		$this->setFont('Arial', '', 10);
		//$this->Cell(0, 10, 'Pie de pagina', 0, 0, 'C');
		$this->Cell(10);
		$this->Cell(100, 10, 'Sistema para control de estado y asistencia de volquetas recolectoras de residuos', 0, 0, 'L');
		$this->Cell(75, 10, utf8_decode('Página '.$this->PageNo().' de {nb}'), 0, 0, 'R');
	}
}

?>