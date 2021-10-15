<?php
require("../Actividad.class.php");
$idactividad=1;
if (isset($_POST['id'])){
	$id=htmlentities(trim($_POST['id']));
	$Oactividad= new Actividad;
	$resultado=$Oactividad->mostrarIndividual($id);
	$extractor = mysqli_fetch_array($resultado);
	$nombre=$extractor["nombre"];
	$idmodeloimpuestos=$extractor["idmodeloimpuestos"];
	$tipoformato=$extractor["tipoformato"];
	$idunidad=$extractor["idunidad"];
	$idcategoria=$extractor["idcategoria"];
	$estatus=$extractor["estatus"];
}else{
	header("Location: ../nuevo/nuevo.php");
}
?>