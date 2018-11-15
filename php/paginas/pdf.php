<?php 
session_start();

require 'conex.php'; 


if ( (empty($_SESSION["user"]) && !isset($_SESSION["user"]))  or (empty($_SESSION["pass"]) && !isset($_SESSION["pass"])) )
{
    header('location:../../');
}

if (isset($_GET["tipo"])) 
{
	$_SESSION["tipo"]=$_GET["tipo"];
}

switch ($_SESSION["tipo"]) //Sswitc para seleccionar animal
    {
    case 1:
        $_SESSION["animal"]="Toros";
        $tipo=1;
        break;

    case 2:
        $_SESSION["animal"]="Vacas Paridas";
        $tipo=2;
        break;
    
    case 3:
        $_SESSION["animal"]="Vacas Escoteras";
        $tipo=3;
        break;
    
    case 4:
        $_SESSION["animal"]="Novillas";
        $tipo=4;
        break;
    
    case 5:
        $_SESSION["animal"]="Novillos";
        $tipo=5;
        break;
    
    case 6:
        $_SESSION["animal"]="Mautes";
        $tipo=6;
        break;
    
    case 7:
        $_SESSION["animal"]="Mautas";
        $tipo=7;
        break;
    
    case 8:
        $_SESSION["animal"]="Becerros";
        $tipo=8;
        break;
    
    case 9:
        $_SESSION["animal"]="Becerras";
        $tipo=9;
        break;    
    
    default:
    $_SESSION["animal"]="Animales";
    break;
    }


if (!isset($tipo) or empty($tipo)) {
    $cimprimir="SELECT * FROM dregistro";
}else{
     $cimprimir="SELECT * FROM dregistro WHERE id_tipo='$tipo' ";
}
   
require 'plantilla.php'; 
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
    
    if (!isset($tipo) or empty($tipo)) 
    {        
        $pdf->Cell(20,8,utf8_decode('Nº'),1,0,'C',1);
        $pdf->Cell(80,8,utf8_decode('Descripción'),1,0,'C',1);
        $pdf->Cell(35,8,utf8_decode('Nº de Animal'),1,0,'C',1);
        $pdf->Cell(25,8,'Tipo',1,0,'C',1);
        $pdf->Cell(30,8,'Peso (Kg)',1,1,'C',1);
        
	}else {
        $pdf->Cell(20,8,utf8_decode('Nº'),1,0,'C',1);
        $pdf->Cell(90,8,utf8_decode('Descripción'),1,0,'C',1);
        $pdf->Cell(45,8,utf8_decode('Nº de Animal'),1,0,'C',1);
        $pdf->Cell(35,8,'Peso (Kg)',1,1,'C',1);
    }
	
	$sql=mysqli_query($cnx,$cimprimir)or die('Error al Consultar la Pagina Vuelva a Intentar');

	for ($i=0;$res=mysqli_fetch_array($sql);$i++) 
	{
		$descripcion=$res["descripcion"];
		$numero=$res["numero"];
		$idtipo=$res["id_tipo"];
		$peso=$res["peso"];

    if (!isset($tipo) or empty($tipo)) 
    {

    switch ($idtipo) //Sswitc para seleccionar animal
    {
    case 1:
        $animal="Toro";
        break;

    case 2:
        $animal="Vaca P.";     
        break;
    
    case 3:
        $animal="Vaca E.";  
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
    }
        
        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(20,7,($i+1),1,0,'C',0);
        $pdf->Cell(80,7,utf8_decode($descripcion),1,0,'C',0);
        $pdf->Cell(35,7,$numero,1,0,'C',0);
        $pdf->Cell(25,7, $animal,1,0,'C',0);
        $pdf->Cell(30,7,$peso,1,1,'C',0);
    }else{

        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(20,7,($i+1),1,0,'C',0);
        $pdf->Cell(90,7,utf8_decode($descripcion),1,0,'C',0);
        $pdf->Cell(45,7,$numero,1,0,'C',0);
        $pdf->Cell(35,7,$peso,1,1,'C',0);
    }//fin if

	}

$pdf->Output();

?>

