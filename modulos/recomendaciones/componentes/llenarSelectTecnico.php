<?php 
	include("../../tecnicos/Tecnico.class.php");
	$Otecnico = new Tecnico;
	$resultado=$Otecnico->consultaGeneral(" WHERE estatus <> 'eliminado'");
	
	if (isset($_POST['seleccionado'])) {
		$idselect=$_POST['seleccionado'];
	}else{
		$idselect=1;
	}
	while ($filas=mysqli_fetch_array($resultado)) { ?>
		<option value="<?php echo $filas['idtecnico']; ?>"
        <?php
        	if($filas['idtecnico']==$idselect){
				echo 'selected="selected"';
			}
		?>
        ><?php echo $filas['nombre']; ?></option>
	<?php
    }
?>