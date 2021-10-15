<?php
require("../Recomendacion.class.php");
require("../../tecnicos/tecnico.class.php"); //Autocompletar
$idrecomendacion=1;
if (isset($_POST['id'])){
	$id=htmlentities(trim($_POST['id']));
	$Orecomendacion= new Recomendacion;
	$resultado=$Orecomendacion->mostrarIndividual($id);
	$extractor = mysqli_fetch_array($resultado);
	$idcliente=$extractor["idcliente"];
	$iddomicilio=$extractor["iddomicilio"];
	$area=$extractor["area"];
	$plaga=$extractor["plaga"];
	$recomendacion=$extractor["recomendacion"];
	$fotorecomendacion=$extractor["fotorecomendacion"];
	$fechadeejecucionestablecida=$extractor["fechadeejecucionestablecida"];
	$responsable=$extractor["responsable"];
	$idtecnico=$extractor["idtecnico"];
	$idcaptura=$extractor["idcaptura"];
	$estado=$extractor["estado"];
	$fechaalta=$extractor["fechaalta"];
	$evidencia=$extractor["evidencia"];
	$fotoevidencia=$extractor["fotoevidencia"];
	$fechaejecucion=$extractor["fechaejecucion"];
	$estatus=$extractor["estatus"];
	//Autocompletar idtecnico
	$Oidtecnico=new tecnico;
	$ridtecnico=$Oidtecnico->mostrarIndividual($idtecnico);
	$eidtecnico= mysqli_fetch_array($ridtecnico);
	$autoidtecnico=$eidtecnico["nombre"];
}else{
	header("Location: ../nuevo/nuevo.php");
}
?>