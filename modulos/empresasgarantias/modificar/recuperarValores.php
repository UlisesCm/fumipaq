<?php
require("../Empresasgarantias.class.php");
$idempresa=1;
if (isset($_POST['id'])){
	$id=htmlentities(trim($_POST['id']));
	$Oempresasgarantias= new Empresasgarantias;
	$resultado=$Oempresasgarantias->mostrarIndividual($id);
	$extractor = mysqli_fetch_array($resultado);
	$nombrecomercial=$extractor["nombrecomercial"];
	$razonsocial=$extractor["razonsocial"];
	$rfc=$extractor["rfc"];
	$domiciliofiscal=$extractor["domiciliofiscal"];
	$regimen=$extractor["regimen"];
	$telefono=$extractor["telefono"];
	$email=$extractor["email"];
	$licencia=$extractor["licencia"];
}else{
	header("Location: ../nuevo/nuevo.php");
}
?>