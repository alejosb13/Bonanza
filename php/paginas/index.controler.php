<?php 

if ( (!empty($_SESSION["user"]) && isset($_SESSION["user"]))  or (!empty($_SESSION["pass"]) && isset($_SESSION["pass"])) ) 
{
header('location:php/paginas/home.php');
}
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$a="";
	require'php/paginas/conex.php';

	require'php/funciones/login-modelo.php';


	if (!empty($user) and !empty($pass)) 
	{
		$a=user($user,$pass,$cnx);
		
	}else{
		$a .= "*Ingrese usuario o contraseña";

	}
}

?>