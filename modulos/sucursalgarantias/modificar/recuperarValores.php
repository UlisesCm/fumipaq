<?php
require("../Sucursalgarantias.class.php");
$idsucursal=1;
if (isset($_POST['id'])){
	$id=htmlentities(trim($_POST['id']));
	$Osucursalgarantias= new Sucursalgarantias;
	$resultado=$Osucursalgarantias->mostrarIndividual($id);
	$extractor = mysqli_fetch_array($resultado);
	$nombre=$extractor["nombre"];
	$idempresa=$extractor["idempresa"];
}else{
	header("Location: ../nuevo/nuevo.php");
}
?>