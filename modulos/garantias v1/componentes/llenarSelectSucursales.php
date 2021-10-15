<?php 
	include("../../sucursales/Sucursales.class.php");
	$Osucursales = new Sucursales;
	$resultado=$Osucursales->consultaGeneral("");
	
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
        ><?php echo $filas['sucursal']; ?></option>
	<?php
    }
?>