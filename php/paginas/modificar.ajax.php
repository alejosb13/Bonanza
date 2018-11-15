<?php
session_start();
require 'conex.php';

if (!isset($_SESSION["tipo"])) 
{
	// volver a recargar
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
        $tabla="Lista de los Mautes";
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

if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
	$id_dregistro=$_POST["id_registro"];
	$cajax="SELECT * FROM dregistro WHERE id_dregistro ='$id_dregistro'";
	$sql=mysqli_query($cnx,$cajax)or die('Error al mostrar el animal');
	
	for ($i=0;$res=mysqli_fetch_array($sql);$i++) 
	{
		$descripcion=$res["descripcion"];
		$numero=$res["numero"];
		$idtipo=$res["id_tipo"];
		$peso=$res["peso"];
		$pesoa=$res["pesoa"];
	}

?>
	<input type="hidden" name="idregistro" value="<?php echo $id_dregistro; ?>">
	<div class="form-group">
		<label for="">Descripcion</label>
	    <textarea name="descripcion" class="form-control"  placeholder="Descripcion Nueva" id="" cols="" rows="2"><?php echo $descripcion; ?></textarea>
	</div>
<div class="row">
		<div class="col-md-6 input1">
	    <div class="form-group ">
		    <label for="">Numero</label>
			<input name="numero" class="form-control"  type="text" placeholder="Numero Nuevo"  value="<?php echo $numero; ?>" autocomplete="off">
		</div>
	</div>

	<div class="col-md-3 minput input2">
		<div class="form-group ">
		    <label for="">Peso</label>
			<input type="number" name="peso" value="<?php echo $peso; ?>" placeholder="Peso Nuevo" autocomplete="off" class="form-control vpeso">        
		</div>
	</div>
	<div class="col-md-3 minput input2">
		<div class="form-group ">
		    <label for="">Diferencia</label>
		    <input type="hidden" name="pesoa" class="pesoa" value="<?php echo $peso; ?>">
		    <span class="icondif glyphicon "></span>
			<span class=" resdif text-center" id="resdif"><?php echo $peso." Kg"; ?></span>		   
		</div>
	</div>
</div>
	<div class="form-group">
	    <label for="">Tipo</label>
		<select name="tipo"  class="form-control">
			<option value="<?php echo $tipo; ?>" selected><?php echo $animal; ?></option>
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
<script type="text/javascript">

	    $('.vpeso').keyup(function() 
    {
    	var pesoa=$('.pesoa').val();
    	var peso=$(this).val();
    	
    	var diferencia=peso - pesoa;

    	if (diferencia < 0) 
    	{
    		$(".resdif").removeClass("text-success");
    		$(".resdif").addClass("text-danger");
    		$(".icondif").removeClass("glyphicon-arrow-up");
    		$(".icondif").addClass("glyphicon-arrow-down");
    		$(".icondif.glyphicon.glyphicon-arrow-down").css("color","#a94442");

    	}else if(diferencia > 0){
    		$(".resdif").removeClass("text-danger");
    		$(".resdif").addClass("text-success");
    		$(".icondif").removeClass("glyphicon-arrow-down");
    		$(".icondif").addClass("glyphicon-arrow-up");
    		$(".icondif.glyphicon.glyphicon-arrow-up").css("color","green");
    	}
    	// $('.diferencia').attr("value",diferencia); 
        $('#resdif').html(diferencia+" Kg"); 
        
    });
</script>
<?php 	}  ?>