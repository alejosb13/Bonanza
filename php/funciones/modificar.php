<?php  
//llamadas de otras paginas
require '../paginas/conex.php';
require 'funciones.php';

//validacion de la variable tipo
if (!isset($_GET["tipo"])) 
{
	header('location:/php/paginas/home.php');
}else{
	$_SESSION["tipo"]=$_GET["tipo"];	
}

if (isset($_GET['error'])  ) {

	switch ($_GET['error']) 
	{
    	case 1:
       		$error="* Complete Todos los Campos.";
       		break;
  		}
}

switch ($_SESSION["tipo"]) //Sswitc para seleccionar animal
    {
    case 1:
        $animal="Toros";
        $tipo=1;
        break;

    case 2:
        $animal="Vacas Paridas";
        $tipo=2;
        break;
    
    case 3:
        $animal="Vacas Escoteras";
        $tipo=3;
        break;
    
    case 4:
        $animal="Novillas";
        $tipo=4;
        break;
    
    case 5:
        $animal="Novillos";
        $tipo=5;
        break;
    
    case 6:
        $animal="Mautes";
        $tipo=6;
        break;
    
    case 7:
        $animal="Mautas";
        $tipo=7;
        break;
    
    case 8:
        $animal="Becerros";
        $tipo=8;
        break;
    
    case 9:
        $animal="Becerras";
        $tipo=9;
        break;    
    }

	$cmodyeli="SELECT * FROM dregistro WHERE id_tipo='$tipo' ORDER BY id_dregistro DESC";//Consulta para mostrar lista en pagina principal
	$sql=mysqli_query($cnx,$cmodyeli)or die('Error al mostrar el animal');

if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
		$id_dregistro=$_POST["idregistro"];
		$descripcion=$_POST["descripcion"];
		$numero=$_POST["numero"];
		$id_tipo=$_POST["tipo"];
		$peso=$_POST["peso"];
        $pesoa=$_POST["pesoa"];

if (!empty($descripcion) && !empty($numero) && ($id_tipo >0 or $id_tipo <=9  ) && !empty($peso) && !empty($id_dregistro)) 
	{
			$cmodif="UPDATE dregistro SET descripcion = '$descripcion', numero = '$numero' , peso = '$peso', id_tipo='$id_tipo', pesoa = '$pesoa'  WHERE id_dregistro = '$id_dregistro' ";
			$modificacion=mysqli_query($cnx,$cmodif)or die('Error al Modificar los datos');
	}else{
			$error=1;
			header('location:/php/paginas/lista.php?tipo='.$_SESSION["tipo"].'&error='.$error);
	}



}
?>