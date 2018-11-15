<?php  

session_start();
require 'conex.php';
$id_dregistro=$_POST["id"];
$status=$_POST["status"];
$cmostrar="SELECT * FROM dregistro WHERE id_dregistro = '$id_dregistro'";
$sql=mysqli_query($cnx,$cmostrar);

for ($i=0;$res=mysqli_fetch_array($sql);$i++)  
{ 
		$descripcion=$res["descripcion"];
		$numero=$res["numero"];
		$idtipo=$res["id_tipo"];
		$peso=$res["peso"];
}

switch ($_SESSION["tipo"]) //Sswitc para seleccionar animal
    {
    case 1:
        $animal="Toro";
        $tipo=1;
        break;

    case 2:
        $animal="Vaca Parida";
        $tipo=2;
        break;
    
    case 3:
        $animal="Vaca Escotera";
        $tipo=3;
        break;
    
    case 4:
        $animal="Novilla";
        $tipo=4;
        break;
    
    case 5:
        $animal="Novillo";
        $tipo=5;
        break;
    
    case 6:
        $animal="Maute";
        $tipo=6;
        break;
    
    case 7:
        $animal="Mauta";
        $tipo=7;
        break;
    
    case 8:
        $animal="Becerro";
        $tipo=8;
        break;
    
    case 9:
        $animal="Becerra";
        $tipo=9;
        break;    
    }
$user=$_SESSION["user"];
$fecha=date("Y-m-d");
$papelera="INSERT INTO papelera VALUES (NULL,'$descripcion','$numero','$tipo','$status','$user', '$fecha')";
mysqli_query($cnx,$papelera)or die("Error reciclando");
$celiminado="DELETE FROM dregistro WHERE id_dregistro = '$id_dregistro'";
mysqli_query($cnx,$celiminado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body onload="mensaje('<?php echo $descripcion."','".$numero."','".$animal."','".$tipo."','".$status; ?>' );">
	<script type="text/javascript">

        function mensaje(descripcion,numero,animal,tipo,status)
        {
        	var tipo=tipo;
        	alert('El animal de tipo: '+animal+'. \nCon la descripcion: '+descripcion+' \nNumero: '+numero+' \nFue Eliminado por '+status);
        	window.setTimeout(redirect(tipo),5);
        }

		function redirect(tipo)
        {
        	window.location.href = "/php/paginas/lista.php?tipo="+tipo;
        }

</script>

</body>
</html>


<!-- <span id="blink">afasdf</span> -->