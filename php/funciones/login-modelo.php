<?php 

function user($user,$pass,$cnx)
{
	$consul="SELECT * FROM login WHERE user='$user' AND  pass='$pass' ";
	$query=mysqli_query($cnx,$consul) or die("error");

	while($row = mysqli_fetch_array($query)) 
	{             
   		$use = $row['user'];
   		$pas = $row['pass'];
	}   

	if (empty($use) and empty($pas)) 
	{
		$res= "Usuario o contraseña incorrectos";
		return $res;
	}else{
		$_SESSION["user"]=$use;
		$_SESSION["pass"]=$pas;		
		header('location:php/paginas/home.php');
	}
	
}

?>
<!-- bactron 10cc cada12h
ginotram cada 12horas
anvendasol 5cc cada 8horas 4pm, 12pm y 8am
leolactil 5pm y 5am 2cc -->