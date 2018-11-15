<?php 
	session_start();
	require 'conex.php';

	if (!($_SESSION["user"]=="admin") && !($_SESSION["pass"]=="alejad16")) {
		header('location:cerrar.php');
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<title>Privado</title>
		<link rel="stylesheet" href="../../css/login.css">
</head>
<body>
	<?php require 'menu.php'; ?>
	<div class="titlep">
		<h1 class="text-center text-success">Bienvenido Alejandro</h1>
	</div>
	
<div class="cuadro">
	<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<div class="medida">
		<h4 class="text-center anadirh">Movimientos</h4>
		<span class="sutl">Seleccione un Tipo de Movimiento:</span>
		<ul class="col1">
			<li><a href="/php/paginas/movieliminados.php?tipo=9">Eliminado</a></li>
		</ul>
		<ul class="col2">
		</ul>
		</div>
	</div>

	</div>
</div>

	<?php require 'footer.php'; ?>
	
</body>
</html>