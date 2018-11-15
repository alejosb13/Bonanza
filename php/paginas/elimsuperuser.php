<?php
 require 'conex.php';
$id=$_GET['elim'];
	
	@$consul="DELETE FROM papelera WHERE id_papelera = '$id'";
	$sqle=mysqli_query($cnx,$consul)or die("Error en consulta");

	header("location:/php/paginas/movieliminados.php");

 ?>