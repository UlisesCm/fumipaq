<?php 
include ("../../seguridad/comprobar_login.php");
include ("../../../librerias/php/validaciones.php");
require('../Empresasgarantias.class.php');
$Oempresasgarantias=new Empresasgarantias;
$mensaje="";
$validacion=true;

if (isset($_POST['idempresa'])){
	$idempresa=htmlentities(trim($_POST['idempresa']));
	//$idempresa=mysql_real_escape_string($idempresa);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo idempresa no es correcto</p>";
}

if (isset($_POST['nombrecomercial'])){
	$nombrecomercial=htmlentities(trim($_POST['nombrecomercial']));
	//$nombrecomercial=mysql_real_escape_string($nombrecomercial);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo nombrecomercial no es correcto</p>";
}

if (isset($_POST['razonsocial'])){
	$razonsocial=htmlentities(trim($_POST['razonsocial']));
	//$razonsocial=mysql_real_escape_string($razonsocial);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo razonsocial no es correcto</p>";
}

if (isset($_POST['rfc'])){
	$rfc=htmlentities(trim($_POST['rfc']));
	//$rfc=mysql_real_escape_string($rfc);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo rfc no es correcto</p>";
}

if (isset($_POST['domiciliofiscal'])){
	$domiciliofiscal=htmlentities(trim($_POST['domiciliofiscal']));
	//$domiciliofiscal=mysql_real_escape_string($domiciliofiscal);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo domiciliofiscal no es correcto</p>";
}

if (isset($_POST['regimen'])){
	$regimen=htmlentities(trim($_POST['regimen']));
	//$regimen=mysql_real_escape_string($regimen);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo regimen no es correcto</p>";
}

if (isset($_POST['telefono'])){
	$telefono=htmlentities(trim($_POST['telefono']));
	//$telefono=mysql_real_escape_string($telefono);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo telefono no es correcto</p>";
}

if (isset($_POST['email'])){
	$email=htmlentities(trim($_POST['email']));
	//$email=mysql_real_escape_string($email);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo email no es correcto</p>";
}

if (isset($_POST['licencia'])){
	$licencia=htmlentities(trim($_POST['licencia']));
	//$licencia=mysql_real_escape_string($licencia);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo licencia no es correcto</p>";
}
if($validacion){
	$resultado=$Oempresasgarantias->actualizar($nombrecomercial,$razonsocial,$rfc,$domiciliofiscal,$regimen,$telefono,$email,$licencia, $idempresa);
	if($resultado=="exito"){
		
		$mensaje="exito@Operaci&oacute;n exitosa@El registro ha sido guardado";
	}
	if($resultado=="fracaso"){
		$mensaje="fracaso@Operaci&oacute;n fallida@Ha ocurrido un problema en la base de datos [001]";
	}
	if($resultado=="denegado"){
		$mensaje="aviso@Acceso denegado@Su cuenta no cuenta con los privilegios para poder realizar esta tarea";
	}
}else{
	$mensaje="fracaso@Operaci&oacute;n fallida@ $mensaje";
}

echo utf8_encode($mensaje);

?>