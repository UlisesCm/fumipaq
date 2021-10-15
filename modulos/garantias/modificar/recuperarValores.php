<?php
require("../Garantias.class.php");
$idgarantia=1;
if (isset($_POST['id'])){
	$id=htmlentities(trim($_POST['id']));
	$Ogarantias= new Garantias;
	$resultado=$Ogarantias->mostrarIndividual($id);
	$extractor = mysqli_fetch_array($resultado);
	$idempresa=$extractor["idempresa"];
	$idsucursal=$extractor["idsucursal"];
	$fecha=$extractor["fecha"];
	$area=$extractor["area"];
	$factura=$extractor["factura"];
	$descripcion=$extractor["descripcion"];
	$estatus=$extractor["estatus"];
	$provedor=$extractor["provedor"];
	$fingarantia=$extractor["fingarantia"];
}else{
	header("Location: ../nuevo/nuevo.php");
}
?>