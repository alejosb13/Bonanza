<?php  
session_start();
require'../funciones/modificar.php';

if ( (empty($_SESSION["user"]) && !isset($_SESSION["user"]))  or (empty($_SESSION["pass"]) && !isset($_SESSION["pass"])) ) 
{
	header('location:../../');
}
 // validar($cnx,$_SESSION["user"],$_SESSION["clave"]);
if (!isset($_GET["tipo"])) 
{
	header('location:/php/paginas/home.php');
	
}else{
	$_SESSION["tipo"]=$_GET["tipo"];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Modificar y Eliminar</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../../css/login.css">

</head>
<body>
<?php require 'menu.php'; ?>

<div class="container-fluid">
	<h1 class="text-center title text-success">Lista de <?php echo $animal; ?> </h1>
</div>
<div class="container">
	<div class="row">
		<div class="clearfix"></div>
        <div class="imp">
        	<a href="/php/paginas/pdf.php?tipo=<?php echo $tipo; ?>" target="blank"><button type="button" class="btn btn-success btn-lg" >Imprimir <span class="glyphicon glyphicon-print" aria-hidden="true"></span></button></a>
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
						<th >Numero</th>
						<th >Peso</th>
	                    <th>Editar</th>
	                    <th>Eliminar</th>
	                   </thead>
	    			<tbody>
	    			<?php 
	    				modyeli($cnx,$cmodyeli,$tipo);
	    			 ?>

					</tbody>
				</table>


			<div class="clearfix"></div>
			
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
    	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
	        <h4 class="modal-title custom_align" id="Heading">Modificar Datos</h4>
	    </div>
	    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?tipo=".$_GET["tipo"];?>" method="post" class="">
	        
        <div class="modal-body" id="modalcuerpo">
				
	      	
      	</div>
        <div class="modal-footer ">
        	<input type="submit" class="btn btn-success btn-lg" value="Modificar">
      	</div>
    </div>
    </form>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
</div>
    
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
	    <div class="modal-content" id="eliminar">
	        
		
		</div>
    <!-- /.modal-content --> 
	</div>
      <!-- /.modal-dialog --> 
</div>

<?php require 'footer.php'; ?>

</body>
</html>