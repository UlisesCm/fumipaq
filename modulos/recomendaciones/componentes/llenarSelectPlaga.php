<?php
	include("../../servicios/Servicio.class.php");
	$Oservicio = new Servicio;
	$resultado=$Oservicio->consultaGeneral(" WHERE estatus <> 'eliminado'");

	if (isset($_POST['seleccionado'])) {
		$idselect=$_POST['seleccionado'];
	}else{
		$idselect=1;
	}
	while ($filas=mysqli_fetch_array($resultado)) { ?>
		<option value="<?php echo $filas['nombre']; ?>"
        <?php
        	if($filas['idservicio']==$idselect){
				echo 'selected="selected"';
			}
		?>
        ><?php echo $filas['nombre']; ?></option>
	<?php
    }
?>
