<?php  
session_start();
	if ( (empty($_SESSION["user"]) && !isset($_SESSION["user"]))  or (empty($_SESSION["pass"]) && !isset($_SESSION["pass"])) ) 
{
	header('location:../../');
}
 // validar($cnx,$_SESSION["user"],$_SESSION["clave"]);
if (empty($_GET["q"]) or !isset($_GET["q"])) 
{
	$url="pdf.php";	
	$tipo="Todos los Tipos";
	$target=' target="_blank" ';
}else{
	$url="rpeso.php";
	$tipo="Selecciones un tipo";
	$target="";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Seleccion</title>
	<link rel="stylesheet" href="../../css/login.css">
</head>
<body>
	<?php require 'menu.php'; ?>

<div class="container-fluid">
	<div class="container text-center"><h1 class="text-success">Seleccione el Tipo</h1></div>
	<br><br><br>
	<div class="container-fluid">
		<form action="<?php echo $url; ?>" method="get" <?php echo $target; ?> >
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="form-group">
						<select name="tipo"  class="form-control" class="form-control">
							<option  selected><?php echo $tipo; ?></option>
							<option value="1">Toro</option>
							<option value="2">Vaca Parida</option>
							<option value="3">Vaca Escotera</option>
							<option value="4">Novilla</option>
							<option value="5">Novillo</option>
							<option value="6">Maute</option>
							<option value="7">Mauta</option>
							<option value="8">Becerro</option>
							<option value="9">Becerra</option>		
						</select>	
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
			<input type="submit" value="Generar" class="btn btn-success center-block ">
		</form>
	</div>
</div>

<?php require 'footer.php'; ?>
</body>
</html>