<?php 
session_start();
if ( (empty($_SESSION["user"]) && !isset($_SESSION["user"]))  or (empty($_SESSION["pass"]) && !isset($_SESSION["pass"])) )
{
    header('location:../../');
}

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

//validacion para mensaje de error
if (!empty($_GET['error'])) 
{	
	switch ($_GET['error']) 
	{
    	case 1:
        	$error="* El Numero del animal ya existe.";
        	break;

    	case 2:
        	$error="* Complete Todos los Campos.";
        	break;
  	}
}


switch ($_SESSION["tipo"]) //Sswitc para seleccionar animal
    {
    case 1:
        $titulo="Ingrese los Datos del Toro.";
        $animal="Toro";
        $tabla="Lista de Toros";
        $tipo=1;
        break;

    case 2:
        $titulo="Ingrese los Datos de la Vaca Parida.";
        $animal="Vaca Parida";
        $tabla="Lista de Vacas Paridas";
        $tipo=2;
        break;
    
    case 3:
        $titulo="Ingrese los Datos de la Vaca Escotera.";
        $animal="Vaca Escotera";
        $tabla="Lista de Vacas Escoteras";
        $tipo=3;
        break;
    
    case 4:
        $titulo="Ingrese los Datos de la Novilla.";
        $animal="Novilla";
        $tabla="Lista de Novillas";
        $tipo=4;
        break;
    
    case 5:
        $titulo="Ingrese los Datos del Novillo.";
        $animal="Novillo";
        $tabla="Lista de Novillo";
        $tipo=5;
        break;
    
    case 6:
        $titulo="Ingrese los Datos del Maute.";
        $animal="Maute";
        $tabla="Lista de los Mautes";
        $tipo=6;
        break;
    
    case 7:
        $titulo="Ingrese los Datos de la Mauta.";
        $animal="Mauta";
        $tabla="Lista de las Mautas";
        $tipo=7;
        break;
    
    case 8:
        $titulo="Ingrese los Datos del Becerro.";
        $animal="Becerro";
        $tabla="Lista de los Becerros";
        $tipo=8;
        break;
    
    case 9:
        $titulo="Ingrese los Datos de la Becerra.";
        $animal="Becerra";
        $tabla="Lista de las Becerras";
        $tipo=9;
        break;    
    }

	$cmostrar="SELECT * FROM dregistro WHERE id_tipo='$tipo' ORDER BY id_dregistro DESC  ";
	

if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
	$descripcion=$_POST["descripcion"];
	$numero=$_POST["numero"];
	$peso=$_POST["peso"];
	$error="";
	

	if (!empty($descripcion) && !empty($numero) && ($tipo >0 or $tipo <=9  ) && !empty($peso)) 
	{

		$cexistencia="SELECT * FROM dregistro WHERE numero='$numero'";
		$existencia=mysqli_query($cnx,$cexistencia)or die('Error al buscar el animal');
		$r_existencia = mysqli_num_rows($existencia);
		
		if ($r_existencia ==  0) 
		{
			$cingresar="INSERT INTO dregistro VALUES (NULL,'$descripcion','$numero','$tipo','$peso',0)";
			ingresart($cnx,$cingresar,$descripcion,$numero,$tipo,$peso);
			header('location:/php/paginas/insertar.php?tipo='.$_SESSION["tipo"].'');
		}else{
			$error=1;
			header('location:/php/paginas/insertar.php?tipo='.$_SESSION["tipo"].'&error='.$error);
		}

	}else{
		$error =2;
		header('location:/php/paginas/insertar.php?tipo='.$_SESSION["tipo"].'&error='.$error);
	}
	
}
?>