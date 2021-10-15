<?php 
include ("../../seguridad/comprobar_login.php");
include ("../../../librerias/php/validaciones.php");
/*CARGA DE ARCHIVOS*/
include_once('../../../librerias/php/thumb.php');
require('../Recomendacion.class.php');
$Orecomendacion=new Recomendacion;
$mensaje="";
$validacion=true;

if (isset($_POST['idrecomendacion'])){
	$idrecomendacion=htmlentities(trim($_POST['idrecomendacion']));
	//$idrecomendacion=mysql_real_escape_string($idrecomendacion);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo idrecomendacion no es correcto</p>";
}

if (isset($_POST['idcliente'])){
	$idcliente=htmlentities(trim($_POST['idcliente']));
	//$idcliente=mysql_real_escape_string($idcliente);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo idcliente no es correcto</p>";
}

if (isset($_POST['iddomicilio'])){
	$iddomicilio=htmlentities(trim($_POST['iddomicilio']));
	//$iddomicilio=mysql_real_escape_string($iddomicilio);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo iddomicilio no es correcto</p>";
}

if (isset($_POST['area'])){
	$area=htmlentities(trim($_POST['area']));
	//$area=mysql_real_escape_string($area);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo area no es correcto</p>";
}

if (isset($_POST['plaga'])){
	$plaga=htmlentities(trim($_POST['plaga']));
	//$plaga=mysql_real_escape_string($plaga);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo plaga no es correcto</p>";
}

if (isset($_POST['recomendacion'])){
	$recomendacion=htmlentities(trim($_POST['recomendacion']));
	//$recomendacion=mysql_real_escape_string($recomendacion);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo recomendacion no es correcto</p>";
}
if (isset($_POST['fotorecomendacion'])){
	$fotorecomendacion=htmlentities(trim($_POST['fotorecomendacion']));
	$fotorecomendacionEliminacion=trim($_POST['fotorecomendacionEliminacion']);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo fotorecomendacion no es correcto</p>";
}	
	/*CARGAR ARCHIVO*/
if (isset($_FILES['fotorecomendacionI']['name'])){
	$fotorecomendaciontemporal=$_FILES['fotorecomendacionI']['tmp_name'];
	$fotorecomendacionnombre=$_FILES['fotorecomendacionI']['name'];
	$extencionfotorecomendacion=pathinfo($_FILES['fotorecomendacionI']['name'], PATHINFO_EXTENSION);
	if($fotorecomendaciontemporal==""){
		$fotorecomendacion=$fotorecomendacion;
	}else{
		$fotorecomendacion=basename($_FILES['fotorecomendacionI']['name'],".".$extencionfotorecomendacion)."_".generarClave(5).".".$extencionfotorecomendacion;
	}
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo fotorecomendacion no es correcto</p>";
}

if (isset($_POST['fechadeejecucionestablecida'])){
	$fechadeejecucionestablecida=htmlentities(trim($_POST['fechadeejecucionestablecida']));
	//$fechadeejecucionestablecida=mysql_real_escape_string($fechadeejecucionestablecida);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo fechadeejecucionestablecida no es correcto</p>";
}

if (isset($_POST['responsable'])){
	$responsable=htmlentities(trim($_POST['responsable']));
	//$responsable=mysql_real_escape_string($responsable);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo responsable no es correcto</p>";
}

if (isset($_POST['idtecnico'])){
	$idtecnico=htmlentities(trim($_POST['idtecnico']));
	//$idtecnico=mysql_real_escape_string($idtecnico);
			if(trim($idtecnico)==""){
				$validacion=false;
				$mensaje=$mensaje."<p>Verifique que el campo idtecnico sea v&aacute;lido y exista en la base de datos</p>";
			}
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo idtecnico no es correcto</p>";
}

if (isset($_POST['idcaptura'])){
	$idcaptura=htmlentities(trim($_POST['idcaptura']));
	//$idcaptura=mysql_real_escape_string($idcaptura);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo idcaptura no es correcto</p>";
}

if (isset($_POST['estado'])){
	$estado=htmlentities(trim($_POST['estado']));
	//$estado=mysql_real_escape_string($estado);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo estado no es correcto</p>";
}

if (isset($_POST['fechaalta'])){
	$fechaalta=htmlentities(trim($_POST['fechaalta']));
	//$fechaalta=mysql_real_escape_string($fechaalta);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo fechaalta no es correcto</p>";
}

if (isset($_POST['evidencia'])){
	$evidencia=htmlentities(trim($_POST['evidencia']));
	//$evidencia=mysql_real_escape_string($evidencia);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo evidencia no es correcto</p>";
}
if (isset($_POST['fotoevidencia'])){
	$fotoevidencia=htmlentities(trim($_POST['fotoevidencia']));
	$fotoevidenciaEliminacion=trim($_POST['fotoevidenciaEliminacion']);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo fotoevidencia no es correcto</p>";
}	
	/*CARGAR ARCHIVO*/
if (isset($_FILES['fotoevidenciaI']['name'])){
	$fotoevidenciatemporal=$_FILES['fotoevidenciaI']['tmp_name'];
	$fotoevidencianombre=$_FILES['fotoevidenciaI']['name'];
	$extencionfotoevidencia=pathinfo($_FILES['fotoevidenciaI']['name'], PATHINFO_EXTENSION);
	if($fotoevidenciatemporal==""){
		$fotoevidencia=$fotoevidencia;
	}else{
		$fotoevidencia=basename($_FILES['fotoevidenciaI']['name'],".".$extencionfotoevidencia)."_".generarClave(5).".".$extencionfotoevidencia;
	}
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo fotoevidencia no es correcto</p>";
}

if (isset($_POST['fechaejecucion'])){
	$fechaejecucion=htmlentities(trim($_POST['fechaejecucion']));
	//$fechaejecucion=mysql_real_escape_string($fechaejecucion);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo fechaejecucion no es correcto</p>";
}

if (isset($_POST['estatus'])){
	$estatus=htmlentities(trim($_POST['estatus']));
	//$estatus=mysql_real_escape_string($estatus);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo estatus no es correcto</p>";
}
if($validacion){
	$resultado=$Orecomendacion->actualizar($idcliente,$iddomicilio,$area,$plaga,$recomendacion,$fotorecomendacion,$fechadeejecucionestablecida,$responsable,$idtecnico,$idcaptura,$estado,$fechaalta,$evidencia,$fotoevidencia,$fechaejecucion,$estatus, $idrecomendacion);
	if($resultado=="exito"){
		/*CARGAR ARCHIVOS*/
		$mensajeArchivo="";
		
		if($fotorecomendaciontemporal!=""){
			//Elimina la imagen antigua para actualizarla y que no ocupe espacio
			unlink("../archivosSubidos/recomendaciones/".$fotorecomendacionEliminacion);
			$estadoArchivo=cargarArchivo($fotorecomendacionnombre,$extencionfotorecomendacion, $fotorecomendaciontemporal, $fotorecomendacion,"jpg","recomendaciones",450,0,"resize","center");
			if ($estadoArchivo=="exito"){
				$mensajeArchivo="";
			}else if ($estadoArchivo=="extencionInvalida"){
				$mensajeArchivo=$mensajeArchivo."| La extenci&oacute;n: ".$extencionfotorecomendacion. " del archivo, no es v&aacute;lida. ";
			}else{
				$mensajeArchivo=$mensajeArchivo."| No se pudo guardar el archivo (".$extencionfoto."). ";
			}
		}
		if($fotoevidenciatemporal!=""){
			//Elimina la imagen antigua para actualizarla y que no ocupe espacio
			unlink("../archivosSubidos/recomendaciones/".$fotoevidenciaEliminacion);
			$estadoArchivo=cargarArchivo($fotoevidencianombre,$extencionfotoevidencia, $fotoevidenciatemporal, $fotoevidencia,"jpg","recomendaciones",450,0,"resize","center");
			if ($estadoArchivo=="exito"){
				$mensajeArchivo="";
			}else if ($estadoArchivo=="extencionInvalida"){
				$mensajeArchivo=$mensajeArchivo."| La extenci&oacute;n: ".$extencionfotoevidencia. " del archivo, no es v&aacute;lida. ";
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