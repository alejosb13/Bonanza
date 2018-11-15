<?php 
require'../funciones/agregar.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>home</title>
	<meta name="viewport" contentipo="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charsetipo="UTF-8">
	<link rel="stylesheet" href="../../css/login.css">
</head>
<body>
<?php require 'menu.php'; ?> <!-- llamado del menu por php -->

<h1 class="text-center text-success"><?php echo $titulo; ?> </h1>

<div class="container-fluid">
	<table class="table table-bordered">
		<tr>
			<th>Descripcion</th>
			<th>N# del Animal</th>
			<th>Peso</th>
		</tr>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="">
			<tr>
				
				<td class="txtarea"><textarea name="descripcion" placeholder="Ingrese Descripciòn del Animal" class="form-control"></textarea> </td>
				<td class="numero"><input type="number"  name="numero" class="form-control" placeholder="Numero del animal" ></td>
				<td class="peso input-group">
					<input type="text" placeholder="Peso" name="peso"  class="form-control" aria-describedby="basic-addon2"><span class="input-group-addon" id="basic-addon2">Kg</span>
				</td>
			</tr>
	</table>
	<div class="submit">
		<input type="submit" value="Añadir" class="btn btn-primary">	
		<input type="reset" value="Vaciar" class="btn btn-danger">	
	</div>
</form>
</div>

<?php if(!empty($error)): ?>
	<br>
	<p class="text-center text-danger"><?php echo $error; ?></p>
	<br>
<?php endif; ?>

<div class="container">
	<h3 class="text-success text-center"><?php echo $tabla; ?></h3>
	<div class="resultados">
		<table class="table table-hover resu">
			<tr>
				<th class="peso">Cantidad</th>
				<th >Descripcion</th>
				<th class="peso">Numero</th>
				<th class="peso">Peso</th>
			</tr>
			<?php mostrar($cnx,$cmostrar,$tipo) ?>
		</table >
	</div>
</div>

<?php require 'footer.php'; ?><!-- llamado del pie de pagina por php -->
</body>
</html>