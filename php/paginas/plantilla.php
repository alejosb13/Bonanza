<?php  
require '../../fpdf/fpdf.php';

	class PDF extends FPDF
	{
		function Header()
		{
			
			$this->Image('../../img/Bonanza-logo-menu.png', 10, 10, 40 );
			$this->SetFont('Arial','B',12);
			$this->Cell(155);
			$this->Cell(25,10,'Fecha: '.date("m/d/Y"),0,1,'C');
			$this->SetFont('Arial','B',15);
			$this->Ln(5);
			$this->Cell(40);
			$this->Cell(110,10, "Reporte de ".$_SESSION["animal"],0,0,'C');
			$this->Ln(15);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>