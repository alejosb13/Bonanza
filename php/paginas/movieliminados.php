<?php 
session_start();
require 'conex.php';
if ( (empty($_SESSION["user"]) && !isset($_SESSION["user"]))  or (empty($_SESSION["pass"]) && !isset($_SESSION["pass"])) ) {
	header('location:cerrar.php');
}

$consul="SELECT * FROM `papelera` ORDER BY fecha DESC";
$sql=mysqli_query($cnx,$consul)or die("Error en consulta");

	$fila=mysqli_num_rows($sql);


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<title>Lista de Eliminados</title>
	<link rel="stylesheet" href="../../css/login.css">
</head>
<body>
	<?php require 'menu.php'; ?>
	<div class="titlep">
		<h1 class="text-center text-success">Lista de Eliminados</h1>
	</div>

	<div class="container">
		<div class="row">
			<div class="clearfix"></div>
	        <div class="imp">
	        	<a href="/php/paginas/leliminados.php" target="blank"><button type="button" class="btn btn-success btn-lg" >Imprimir <span class="glyphicon glyphicon-print" aria-hidden="true"></span></button></a>
	        </div>
	        <div class="clearfix"></div>
	        <div class="col-md-12">

			<?php if(!empty($error)): ?>
				<div class="error">
	        		<h4 class="text-danger"><?php echo "$error"; ?></h4>
	        	</div>
	        <?php endif; ?>
		        <div class="table-responsive ">
		            <table id="mytable" class="table table-hover table-striped">
		            	<thead>
							<th >Posición</th>
							<th >Descripcion</th>
							<th >Tipo</th>
							<th >Numero</th>
							<th >Estado</th>
							<th >Usuario</th>
							<th >Fecha</th>
		                    <th>Delete</th>
		                   </thead>
		    			<tbody>
							<tr>
							<?php 
								for ($i=0;$res=mysqli_fetch_array($sql);$i++) 
								{
									$id=$res["id_papelera"];
									$descripcion=$res["descripcion"];
									$numero=$res["numero"];
									$tipo=$res["tipo"];
									$user=$res["user"];
									$fecha=$res["fecha"];
									$status=$res["status"];

									switch ($tipo) //Sswitc para seleccionar animal
									    {
									    case 1:
									        $animal="Toros";
									        break;

									    case 2:
									        $animal="Vacas Parida";
									        break;
									    
									    case 3:
									        $animal="Vacas Escotera";
									        break;
									    
									    case 4:
									        $animal="Novilla";
									        break;
									    
									    case 5:
									        $animal="Novillo";
									        break;
									    
									    case 6:
									        $animal="Maute";
									        break;
									    
									    case 7:
									        $animal="Mauta";
									        break;
									    
									    case 8:
									        $animal="Becerro";
									        break;
									    
									    case 9:
									       $animal="Becerra";
									        break;    
									    
									    default:
									    $animal="Animale";
									    break;
									    }
							?>
								<td><p> &nbsp;&nbsp;&nbsp;<?php echo $fila; ?></p></td>
								<td><p><?php echo $descripcion; ?></p></td>
								<td><p ><?php echo $animal; ?></p></td>
								<td><p ><?php echo $numero; ?> </p></td>
								<td><p ><?php echo $status; ?></p></td>
								<td><p ><?php echo $user; ?></p></td>
								<td><p ><?php echo $fecha; ?></p></td>
								
								<td><a href="/php/paginas/elimsuperuser.php?elim=<?php echo $id; ?>"><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Eliminar" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></a></td>


							</tr>

							<?php 
									$fila=$fila-1;
								}
 							?>	
							
							

						</tbody>
					</table>


				<div class="clearfix"></div>
				
				</div>
			</div>
		</div>
	</div>



	<?php require 'footer.php'; ?>
</body>
</html>