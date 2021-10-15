<?php 
include ("../../seguridad/comprobar_login.php");
include ("../../../librerias/php/validaciones.php");
require('../Actividad.class.php');
$Oactividad=new Actividad;
$mensaje="";
$validacion=true;

if (isset($_POST['nombre'])){
	$nombre=htmlentities(trim($_POST['nombre']));
	//$nombre=mysql_real_escape_string($nombre);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo nombre no es correcto</p>";
}

if (isset($_POST['idmodeloimpuestos'])){
	$idmodeloimpuestos=htmlentities(trim($_POST['idmodeloimpuestos']));
	//$idmodeloimpuestos=mysql_real_escape_string($idmodeloimpuestos);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo idmodeloimpuestos no es correcto</p>";
}

if (isset($_POST['tipoformato'])){
	$tipoformato=htmlentities(trim($_POST['tipoformato']));
	//$tipoformato=mysql_real_escape_string($tipoformato);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo tipoformato no es correcto</p>";
}

if (isset($_POST['idunidad'])){
	$idunidad=htmlentities(trim($_POST['idunidad']));
	//$idunidad=mysql_real_escape_string($idunidad);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo idunidad no es correcto</p>";
}

if (isset($_POST['idcategoria'])){
	$idcategoria=htmlentities(trim($_POST['idcategoria']));
	//$idcategoria=mysql_real_escape_string($idcategoria);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo idcategoria no es correcto</p>";
}

if (isset($_POST['servicios'])){
	$servicios=$_POST['servicios'];
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>Debe seleccionar al menos un servicio relacionado</p>";
}

if (isset($_POST['estatus'])){
	$estatus=htmlentities(trim($_POST['estatus']));
	//$estatus=mysql_real_escape_string($estatus);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo estatus no es correcto</p>";
}
if($validacion){
	$resultado=$Oactividad->guardar($nombre,$idmodeloimpuestos,$tipoformato,$idunidad,$idcategoria,$servicios,$estatus);
	if($resultado=="exito"){
		
		$mensaje="exito@Operaci&oacute;n exitosa@El registro ha sido guardado";
	}
	if($resultado=="nombreExiste"){
		$mensaje="fracaso@Operaci&oacute;n fallida@El campo nombre ya existe en la base de datos";
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