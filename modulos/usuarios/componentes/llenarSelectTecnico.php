<?php
	include("../../tecnicos/Tecnico.class.php");
	$Otecnico = new Tecnico;
	include("../../asignacionvehicular/Asignacionvehicular.class.php");
	$Oasignacion = new Asignacionvehicular;


	$resultado=$Otecnico->consultaGeneral(" WHERE estatus <> 'eliminado' ORDER BY nombre ASC");

	if (isset($_POST['seleccionado'])) {
		$idselect=$_POST['seleccionado'];
	}else{
		$idselect=1;
	}
	while ($filas=mysqli_fetch_array($resultado)) {

	  $idtecnico= $filas['idtecnico'];
	  //revisar si el empleado tiene un vehiculo asignado
	  $resultado2=$Oasignacion->consultaGeneral(" WHERE idchofer = '$idtecnico'");
	  if($filas2=mysqli_fetch_array($resultado2)) {
	    //ya se encuentra asignado
	  }
	  else{
		  //no tien asignacion agregarlo al combo
			?>
			<option value="<?php echo $filas['idtecnico']; ?>"
			<?php
				if($filas['idtecnico']==$idselect){
					echo 'selected="selected"';
				}
			?>
			><?php echo $filas['nombre']; ?></option>
		<?php
	  }//fin else no tiene asignacion
    }
?>
