<?php 
	include("../../empresasgarantias/Empresasgarantias.class.php");
	$Oempresasgarantias = new Empresasgarantias;
	$resultado=$Oempresasgarantias->consultaGeneral("");
	
	if (isset($_POST['seleccionado'])) {
		$idselect=$_POST['seleccionado'];
	}else{
		$idselect=1;
	}
	while ($filas=mysqli_fetch_array($resultado)) { ?>
		<option value="<?php echo $filas['nombrecomercial']; ?>"
        <?php
        	if($filas['nombrecomercial']==$idselect){
				echo 'selected="selected"';
			}
		?>
        ><?php echo $filas['nombrecomercial']; ?></option>
	<?php
    }
?>