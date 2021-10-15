<?php 
	include("../../Empresasgarantias/Empresasgarantias.class.php");
	$Oempresasgarantias = new Empresasgarantias;
	$resultado=$Oempresasgarantias->consultaGeneral("");
	
	if (isset($_POST['seleccionado'])) {
		$idselect=$_POST['seleccionado'];
	}else{
		$idselect=1;
	}
    ?> <option value="1">Todas las Empresas</option> <?php
	while ($filas=mysqli_fetch_array($resultado)) { ?>
		<option value="<?php echo $filas['idempresa']; ?>"
        <?php
        	if($filas['idempresa']==$idselect){
				echo 'selected="selected"';
			}
		?>
        ><?php echo $filas['nombrecomercial']; ?></option>
	<?php
    }
?>