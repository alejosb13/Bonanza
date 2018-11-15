<?php 
session_start();
require 'conex.php'; 

if ( (empty($_SESSION["user"]) && !isset($_SESSION["user"]))  or (empty($_SESSION["pass"]) && !isset($_SESSION["pass"])))
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
header('location:/php/paginas/selecanimal.php?q=rpeso');
    break;
}


     $cimprimir="SELECT * FROM dregistro WHERE id_tipo='$tipo' ";

   
require 'plantilla.php'; 

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',11);

$pdf->Cell(15,10,utf8_decode('Nº'),1,0,'C',1);
$pdf->Cell(60,10,utf8_decode('Descripción'),1,0,'C',1);
$pdf->Cell(30,10,utf8_decode('Nº de Animal'),1,0,'C',1);
$pdf->Cell(25,10,"Peso (Kg)",1,0,'C',1);
$pdf->MultiCell(35,5,'Peso Anterior (Kg)',1,'C',1);
$pdf->SetY(40);
$pdf->SetX(175);
$pdf->Cell(25,10,utf8_decode('Diferencia'),1,1,'C',1);

$pdf->SetFont('Arial','B',10);

$sql=mysqli_query($cnx,$cimprimir)or die('Error al Consultar la Pagina Vuelva a Intentar');

for ($i=0;$res=mysqli_fetch_array($sql);$i++) 
{
        $idtipo=$res["id_tipo"];
        $descripcion=$res["descripcion"];
        $numero=$res["numero"];
        $peso=$res["peso"];
        $pesoa=$res["pesoa"];

        $pdf->Cell(15,8,($i+1),1,0,'C',0);
        $pdf->Cell(60,8,utf8_decode($descripcion),1,0,'C',0);
        $pdf->Cell(30,8,utf8_decode($numero),1,0,'C',0);
        $pdf->Cell(25,8,$peso,1,0,'C',0);
        $pdf->Cell(35,8,$pesoa,1,0,'C',0);
        $diferencia=$peso-$pesoa;
        $pdf->Cell(25,8,$diferencia,1,1,'C',0);

}
    $pdf->Output();
?>