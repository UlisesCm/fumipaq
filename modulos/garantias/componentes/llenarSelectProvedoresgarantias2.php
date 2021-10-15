<?php 
	include("../../proveedores/Proveedores.class.php");
	$Ogarantias = new Proveedores;
	$resultado=$Ogarantias->consultaGeneral("");
	
	if (isset($_POST['seleccionado'])) {
		$idselect=$_POST['seleccionado'];
	}else{
		$idselect=1;
	}
	while ($filas=mysqli_fetch_array($resultado)) { ?>
		<option value="<?php echo $filas['nombre']; ?>"
        <?php
        	if($filas['nombre']==$idselect){
				echo 'selected="selected"';
			}
		?>
        ><?php echo $filas['nombre']; ?></option>
	<?php
    }
?>
