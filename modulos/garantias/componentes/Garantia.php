<?php
	include("../../garantias/Garantias.class.php");
	$buscar=htmlentities($_POST['termino']);
	$Ogarantia = new Garantias;
	$resultado=$Ocliente->consultaGeneral("WHERE idempresa ='$buscar' AND estatus <> 'eliminado'");
	$descripcion = new stdClass();
	if(mysqli_num_rows($resultado) > 0){
		$filas=mysqli_fetch_array($resultado);
		$descripcion->id= $filas['idcliente'];
	}
	echo json_encode($descripcion);
?>
