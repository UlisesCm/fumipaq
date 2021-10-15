<?php
require("../Proveedores.class.php");
$idproveedor=1;
if (isset($_POST['id'])){
	$id=htmlentities(trim($_POST['id']));
	$Oproveedores= new Proveedores;
	$resultado=$Oproveedores->mostrarIndividual($id);
	$extractor = mysqli_fetch_array($resultado);
	$nombre=$extractor["nombre"];
	$telefono=$extractor["telefono"];
	$direccion=$extractor["direccion"];
}else{
	header("Location: ../nuevo/nuevo.php");
}
?>