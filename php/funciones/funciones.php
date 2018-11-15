<?php  
function ingresart($cnx,$cingresar,$descripcion,$numero,$tipo,$peso)
{
	mysqli_query($cnx,$cingresar)or die('Error al guardar el animal');
}


//Mostrar la tabla con resultados
function mostrar($cnx,$cmostrar,$tipo)
{
	$sql=mysqli_query($cnx,$cmostrar)or die('Error al mostrar el animal');
	$fila=mysqli_num_rows($sql);
	for ($i=0;$res=mysqli_fetch_array($sql);$i++) 
	{
		$descripcion=$res["descripcion"];
		$numero=$res["numero"];
		$idtipo=$res["id_tipo"];
		$peso=$res["peso"];
		
		echo "<tr>";
		echo '<td><p class="text-center">'.$fila.'</p></td>';
		echo "<td><p>$descripcion</p></td>";
		echo '<td><p class="text-center">'.$numero.'</p></td>';
		echo '<td><p class="text-center">'.$peso.'</p></td>';
		echo "<tr>";
		$fila=$fila-1;
	}

}

//Mostrar la tabla con resultados
function modyeli($cnx,$cmodyeli,$tipo)
{
	$sql=mysqli_query($cnx,$cmodyeli)or die('Error al mostrar el animal');
	$fila=mysqli_num_rows($sql);
	for ($i=0;$res=mysqli_fetch_array($sql);$i++) 
	{
		$id_dregistro=$res["id_dregistro"];
		$descripcion=$res["descripcion"];
		$numero=$res["numero"];
		$peso=$res["peso"];
		?>
		<tr>
			<td><p> &nbsp;&nbsp;&nbsp;<?php echo $fila; ?></p></td>
			<td><p><?php echo $descripcion; ?></p></td>
			<td><p ><?php echo $numero; ?> </p></td>
			<td><p ><?php echo $peso; ?><b>Kg</b> </p></td>
			
			<td><p data-placement="top" data-toggle="tooltip" title="Editar"><button class="btn btn-primary btn-xs" onclick="modificar('<?php echo $id_dregistro; ?>');" data-title="Editar" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
			
			<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Eliminar" data-toggle="modal" data-target="#delete" onclick="eli('<?php echo $id_dregistro; ?>');" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
		</tr>

	<?php  	
		$fila=$fila-1;
		
	}
}


?>