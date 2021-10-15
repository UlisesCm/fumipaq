<?php 
	include("../../sucursalgarantias/Sucursalgarantias.class.php");

	if (isset($_POST['condicion'])) {
		$idselect=$_POST['condicion'];
	}else{
		$idselect=1;
	}

	$Osucursalgarantias = new Sucursalgarantias;
	$resultado=$Osucursalgarantias->consultaGeneral("WHERE idempresa = '$idselect' ");
	// $resultado=$Osucursalgarantias->consultaGeneral("");
	
	?> <option value="1">Todas las Sucursales</option> <?php
	while ($filas=mysqli_fetch_array($resultado)) { ?>
		<option value="<?php echo $filas['idsucursal']; ?>"
        <?php
        	if($filas['idsucursal']==$idselect){
				echo 'selected="selected"';
			}
		?>
        ><?php echo $filas['nombre']; ?></option>
	<?php
    }
?>