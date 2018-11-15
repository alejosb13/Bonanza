<?php 
session_start();
if ( (empty($_SESSION["user"]) && !isset($_SESSION["user"]))  or (empty($_SESSION["pass"]) && !isset($_SESSION["pass"])) ) 
{
	header('location:../../');
}

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>home</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../../css/login.css">
</head>
<body>
<?php require 'menu.php'; ?>
<div class="cprincipal">
	<div class="titlep">
		<h1 class="text-center text-success">Bienvenido <?php echo $_SESSION["user"]; ?> al Sistema Agropecuario Bonanza</h1>
	</div>

<div class="cuadro">
	<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<div class="medida">
		<h4 class="text-center anadirh">Añadir</h4>
		<span class="sutl">Seleccione un Tipo de Animal:</span>
		<ul class="col1">
			<li><a href="/php/paginas/insertar.php?tipo=9">Becerra</a></li>
            <li><a href="/php/paginas/insertar.php?tipo=8">Becerro</a></li>
			<li><a href="/php/paginas/insertar.php?tipo=7">Mauta</a></li>
			<li><a href="/php/paginas/insertar.php?tipo=6">Maute</a></li>
			<li><a href="/php/paginas/insertar.php?tipo=4">Novilla</a></li>

		</ul>
		<ul class="col2">
			<li><a href="/php/paginas/insertar.php?tipo=5">Novillo</a></li>
			<li><a href="/php/paginas/insertar.php?tipo=1">Toro</a></li>
			<li><a href="/php/paginas/insertar.php?tipo=3">Vaca E.</a></li>
			<li><a href="/php/paginas/insertar.php?tipo=2">Vaca P.</a></li>
		</ul>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<div class="medida m2">
		<h4 class="text-center anadirh">Modificar o Eliminar</h4>
		<span class="sutl">Seleccione un Tipo de animal</span>
		<ul class="col1">
			<li><a href="/php/paginas/lista.php?tipo=9">Becerra</a></li>
            <li><a href="/php/paginas/lista.php?tipo=8">Becerro</a></li>
			<li><a href="/php/paginas/lista.php?tipo=7">Mauta</a></li>
			<li><a href="/php/paginas/lista.php?tipo=6">Maute</a></li>
			<li><a href="/php/paginas/lista.php?tipo=4">Novilla</a></li>	
		</ul>
		<ul class="col2">
			<li><a href="/php/paginas/lista.php?tipo=5">Novillo</a></li>
			<li><a href="/php/paginas/lista.php?tipo=1">Toro</a></li>
			<li><a href="/php/paginas/lista.php?tipo=3">Vaca E.</a></li>
			<li><a href="/php/paginas/lista.php?tipo=2">Vaca P.</a></li>
		</ul>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<div class="medida m2">
		<h4 class="text-center anadirh">Reporte</h4>
		<span class="sutl">Seleccione el tipo de reporte:</span>
		<ul class="col1">
			<li><a href="/php/paginas/selecanimal.php">Animal</a></li>
			<li><a href="/php/paginas/movieliminados.php?tipo=9">Eliminado</a></li>
		</ul>
		<ul class="col2">
			<li><a href="/php/paginas/selecanimal.php?q=rpeso">Peso</a></li>

		</ul>
		</div>
	</div>

</div>

</div>


</div>
<?php if ((empty($_SESSION["user"]) or !isset($_SESSION["user"])) && (empty($_SESSION["pass"]) or !isset($_SESSION["pass"]))) : ?>
	<div class="priv">
	<div>
		<span class="suuser">
			<a href="/php/paginas/privado.php">Super User</a>
		</span>
	</div>
</div>
<?php endif; ?>

<?php require 'footer.php'; ?>

</body>
</html>