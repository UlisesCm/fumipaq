<?php 
include ("../../seguridad/comprobar_login.php");
include ("../../../librerias/php/validaciones.php");

/*CARGA DE ARCHIVOS*/
include_once('../../../librerias/php/thumb.php');
require('../Garantias.class.php');
$Ogarantias=new Garantias;
$mensaje="";
$validacion=true;

if (isset($_POST['idempresa'])){
	$idempresa=htmlentities(trim($_POST['idempresa']));
	//$idempresa=mysql_real_escape_string($idempresa);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo idempresa no es correcto</p>";
}

if (isset($_POST['idsucursal'])){
	$idsucursal=htmlentities(trim($_POST['idsucursal']));
	//$idsucursal=mysql_real_escape_string($idsucursal);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo idsucursal no es correcto</p>";
}

if (isset($_POST['fecha'])){
	$fecha=htmlentities(trim($_POST['fecha']));
	//$fecha=mysql_real_escape_string($fecha);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo fecha no es correcto</p>";
}

if (isset($_POST['area'])){
	$area=htmlentities(trim($_POST['area']));
	//$area=mysql_real_escape_string($area);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo area no es correcto</p>";
}
/*CARGAR ARCHIVO*/
if (isset($_FILES['factura']['name'])){
	$facturatemporal=$_FILES['factura']['tmp_name'];
	$facturanombre=$_FILES['factura']['name'];
	$extencionfactura=pathinfo($_FILES['factura']['name'], PATHINFO_EXTENSION);
	$factura=basename($_FILES['factura']['name'],".".$extencionfactura)."_".generarClave(5);
	$facturaExtencion= $factura.".".$extencionfactura;
	
	if($facturatemporal==""){
		$factura="";
	}
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo factura no es correcto</p>";
}

if (isset($_POST['descripcion'])){
	$descripcion=htmlentities(trim($_POST['descripcion']));
	//$descripcion=mysql_real_escape_string($descripcion);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo descripcion no es correcto</p>";
}

if (isset($_POST['estatus'])){
	$estatus=htmlentities(trim($_POST['estatus']));
	//$estatus=mysql_real_escape_string($estatus);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo estatus no es correcto</p>";
}

if (isset($_POST['idproveedor'])){
	$provedor=htmlentities(trim($_POST['idproveedor']));
	//$provedor=mysql_real_escape_string($provedor);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo provedor no es correcto</p>";
}
if (isset($_POST['fingarantia'])){
	$fingarantia=htmlentities(trim($_POST['fingarantia']));
	//$fecha=mysql_real_escape_string($fingarantia);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo fin de la Garantia no es correcto</p>";
}
if($validacion){
	$resultado=$Ogarantias->guardar($idempresa,$idsucursal,$fecha,$area,$factura,$descripcion,$estatus,$provedor,$fingarantia);
	if($resultado=="exito"){
		/*CARGAR ARCHIVOS*/
		$mensajeArchivo="";
		
		if($facturatemporal!=""){
			
			$estadoArchivo=cargarArchivo($factura,$extencionfactura, $facturatemporal, $facturaExtencion,"pdf","garantias",0,0,"archivo","center");
			if ($estadoArchivo=="exito"){
				$mensajeArchivo="";
			}else if ($estadoArchivo=="extencionInvalida"){
				$mensajeArchivo=$mensajeArchivo."| La extenci&oacute;n: ".$extencionfactura. " del archivo, no es v&aacute;lida. ";
			}else{
				$mensajeArchivo=$mensajeArchivo."| No se pudo guardar el archivo (".$extencionfoto."). ";
			}
		}
		$mensaje="exito@Operaci&oacute;n exitosa@El registro ha sido guardado";
		$mensaje=$mensaje.$mensajeArchivo;
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