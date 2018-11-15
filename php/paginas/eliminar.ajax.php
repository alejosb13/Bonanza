<?php  
$id_dregistro=$_POST["id"]; 

?>

<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
		        <h4 class="modal-title custom_align" id="Heading">Presione OK para Eliminar </h4>
	      	</div>
	    <form action="eliminado.ajax.php" method="post" name="eliminado">
		    <div class="modal-body" >
					<div class="alert alert-danger">
		    		<input type="hidden" name="id_dregistro">
		    		<span class="glyphicon glyphicon-warning-sign"></span> 
		    		Indique las razones por la que desea eliminar el animal.
		    	</div>
		    <select id="causa" class="form-control" name="status">
				<option value="" >Seleccione una causa</option>
				<option value="Venta" >Venta</option>
				<option value="Muerte" >Muerte</option>
				<option value="Perdida" >Perdida</option>
				<option value="Otra causa" >Otra causa</option>
			</select>
		    </div>

			<input type="hidden" value="<?php echo $id_dregistro; ?>" name="id">
		    <div class="modal-footer ">
		        <button type="button" class="btn btn-success" id="envio"  disabled onclick="eliminado.submit();" ><span class="glyphicon glyphicon-ok-sign"></span> Ok</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
		    </div>
		</form>
<script type="text/javascript">
$('#causa').change(function(){
 	var cambio = $(this).val();
	if (cambio == '') 
	{
		$('#envio').attr("disabled",'');

	}else{
		$('#envio').removeAttr("disabled");
	}

});

 </script>