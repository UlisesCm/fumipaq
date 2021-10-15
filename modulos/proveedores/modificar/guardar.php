<?php 
include ("../../seguridad/comprobar_login.php");
include ("../../../librerias/php/validaciones.php");
require('../Proveedores.class.php');
$Oproveedores=new Proveedores;
$mensaje="";
$validacion=true;

if (isset($_POST['idproveedor'])){
	$idproveedor=htmlentities(trim($_POST['idproveedor']));
	//$idproveedor=mysql_real_escape_string($idproveedor);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo idproveedor no es correcto</p>";
}

if (isset($_POST['nombre'])){
	$nombre=htmlentities(trim($_POST['nombre']));
	//$nombre=mysql_real_escape_string($nombre);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo nombre no es correcto</p>";
}

if (isset($_POST['telefono'])){
	$telefono=htmlentities(trim($_POST['telefono']));
	//$telefono=mysql_real_escape_string($telefono);
		if(!validarEntero($telefono)){
			$validacion=false;
			$mensaje=$mensaje."<p>Verifique que el campo telefono contenga n&uacute;meros enteros</p>";
		}
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo telefono no es correcto</p>";
}

if (isset($_POST['direccion'])){
	$direccion=htmlentities(trim($_POST['direccion']));
	//$direccion=mysql_real_escape_string($direccion);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo direccion no es correcto</p>";
}
if($validacion){
	$resultado=$Oproveedores->actualizar($nombre,$telefono,$direccion, $idproveedor);
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