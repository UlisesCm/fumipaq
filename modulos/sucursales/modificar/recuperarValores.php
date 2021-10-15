<?php
require("../Sucursales.class.php");
$idsucursal=1;
if (isset($_POST['id'])){
	$id=htmlentities(trim($_POST['id']));
	$Osucursales= new Sucursales;
	$resultado=$Osucursales->mostrarIndividual($id);
	$extractor = mysqli_fetch_array($resultado);
	$nombre=$extractor["nombre"];
	$idempresa=$extractor["idempresa"];
}else{
	header("Location: ../nuevo/nuevo.php");
}
?>