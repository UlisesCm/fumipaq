<?php 
	include("../../servicios/Servicio.class.php");
	$Oservicios = new Servicio;
	$resultado=$Oservicios->consultaGeneral(" WHERE estatus <> 'eliminado'");
	
	if (isset($_POST['seleccionado'])) {
		$idselect=$_POST['seleccionado'];
	}else{
		$idselect=1;
	}
	$con = 0;
	while ($filas=mysqli_fetch_array($resultado)) { ?>
        
	    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
           <label><input id="servicio<?php echo $con?>" type="checkbox" name="servicios[]" value="<?php echo $filas['idservicio']?>" <?php echo $Oservicios->comprobarActividadServicio($idselect,$filas['idservicio'])?>>
               <?php 
			   echo $filas['nombre'];
			   ?>
           </label>
        </div>
	<?php
	 $con++;
    }
?>