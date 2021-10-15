<?php
$tabla=htmlentities($_POST['tabla']);
$campobuscar=htmlentities($_POST['campobuscar']);
$directorio=htmlentities($_POST['directorio']);



	include("../../$directorio/$tabla.class.php");
	$buscar=htmlentities($_POST['idregistrorelacionado']);
	$Oconsulta = new $tabla; // clase es el mismo nombre que la tabla
	$resultado=$Oconsulta->consultaGeneral("WHERE $campobuscar ='$buscar' AND estatus <> 'eliminado'");
	$descripcion = "";
	if(mysqli_num_rows($resultado) > 0){
		$filas=mysqli_fetch_array($resultado);
		$descripcion=$filas['nombre'];
	}
	echo $descripcion;
?>
