<?php 
include ("../../seguridad/comprobar_login.php");
require('../Sucursales.class.php');
$Osucursales=new Sucursales;
$mensaje="";
$validacion=true;

if (isset($_POST['nombre'])){
	$nombre=htmlentities(trim($_POST['nombre']));
	//$nombre=mysql_real_escape_string($nombre);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo nombre no es correcto</p>";
}

if (isset($_POST['idempresa'])){
	$idempresa=htmlentities(trim($_POST['idempresa']));
	//$idempresa=mysql_real_escape_string($idempresa);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo idempresa no es correcto</p>";
}
if($validacion){
	$resultado=$Osucursales->guardar($nombre,$idempresa);
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