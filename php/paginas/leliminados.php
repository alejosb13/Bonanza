<?php  

 
session_start();

require 'conex.php'; 

if ((empty($_SESSION["user"]) or !isset($_SESSION["user"])) && (empty($_SESSION["pass"]) or !isset($_SESSION["pass"]))) {
	header('location:cerrar.php');
}

$_SESSION["animal"]="Animales Eliminados";


require 'plantilla.php'; 
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);

	$pdf->Cell(15,8,utf8_decode('Nº'),1,0,'C',1);
    $pdf->Cell(50,8,utf8_decode('Descripción'),1,0,'C',1);
    $pdf->Cell(30,8,utf8_decode('Nº de Animal'),1,0,'C',1);
    $pdf->Cell(35,8,'Estado',1,0,'C',1);
    $pdf->Cell(35,8,'Fecha de S.',1,0,'C',1);
    $pdf->Cell(25,8,'Tipo',1,1,'C',1);
  
    $pdf->SetFont('Arial','B',10);
$cimprimir="SELECT * FROM papelera";


$sql=mysqli_query($cnx,$cimprimir)or die('Error al Consultar la Pagina Vuelva a Intentar');

	for ($i=0;$res=mysqli_fetch_array($sql);$i++) 
	{
		$descripcion=$res["descripcion"];
		$numero=$res["numero"];
		$tipo=$res["tipo"];
		$fecha=$res["fecha"];
		$status=$res["status"];
		$user=$res["user"];

		switch ($tipo) //Sswitc para seleccionar animal
		   {
		   case 1:
	        $animal="Toro";
	     	break;  
	    case 2:
	        $animal="Vaca Parida";
	        break;
	    
	    case 3:
	        $animal="Vaca Escotera";
	        break;
	    
	    case 4:
		       $animal="Novilla";
	        break;
	    
	    case 5:
	        $animal="Novillo";
		        break;
		    
		    case 6:
		        $animal="Maute";
		        break;
		    
		    case 7:
		        $animal="Mauta";
		        break;
		    
		    case 8:
		        $animal="Becerro";
		        break;
		    
		    case 9:
		       $animal="Becerra";
		        break;    
		    
		    default:
		    $animal="Animale";
		    break;
		    }
	
	$pdf->Cell(15,8,($i+1),1,0,'C',0);
    $pdf->Cell(50,8,utf8_decode($descripcion),1,0,'C',0);
    $pdf->Cell(30,8,$numero,1,0,'C',0);
    $pdf->Cell(35,8,utf8_decode($status),1,0,'C',0);
    $pdf->Cell(35,8,$fecha,1,0,'C',0);
    $pdf->Cell(25,8,$animal,1,1,'C',0);
	}
    
    $pdf->Output();
?>