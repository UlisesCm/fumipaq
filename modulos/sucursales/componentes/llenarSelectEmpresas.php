<?php 
	include("../../empresas/Empresas.class.php");
	$Oempresas = new Empresas;
	$resultado=$Oempresas->consultaGeneral("");
	
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