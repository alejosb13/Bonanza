<?php
session_start();
 require('php/paginas/index.controler.php'); ?>		
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Inicio de Sesión</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div class="principal">
		<div class="logo">
			<img class="img" src="img/bonanza-logo-1.jpg" alt="Logo" title="Bonanza Logo">
		</div>
		<div class="container-fluid acces">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-group">
				<div class="row">
					<div class=" col-xs-offset-3 col-xs-6 col-xs-offset-3  col-sm-offset-3 col-sm-6 col-sm-offset-3  col-md-offset-4 col-md-4 col-md-offset-4   col-lg-offset-4 col-lg-4 col-lg-offset-4 group ">
						<label for="usuario">Usuario</label>					
						<input type="text" title="Usuario" name="user" class="form-control" placeholder="Ingrese su Usuario">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-offset-3 col-xs-6 col-xs-offset-3  col-sm-offset-3 col-sm-6 col-sm-offset-3  col-md-offset-4 col-md-4 col-md-offset-4   col-lg-offset-4 col-lg-4 col-lg-offset-4">
						<label for="pass">Contraseña</label>
						<input type="password" title="Contraseña" name="pass" class="form-control" placeholder="Ingrese su Contraseña">
					</div>
				</div>	
				<div class="row">
					<div class="col-xs-offset-3 col-xs-6 col-xs-offset-3  col-sm-offset-3 col-sm-6 col-sm-offset-3  col-md-offset-4 col-md-4 col-md-offset-4   col-lg-offset-4 col-lg-4 col-lg-offset-4">
						<p class="text-danger"><?php echo @$a; ?></p>
						<input type="submit" value="Ingresar" class="btn btn-success btn-block">
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- <div class="register">
		<div class="nuevo">
			<a href="nuevo" class="textc">¡Recuperar Contraseña!</a>
		</div>
	</div> -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>