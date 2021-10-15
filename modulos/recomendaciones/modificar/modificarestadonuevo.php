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




if (isset($_POST['estado'])){
	$estado=htmlentities(trim($_POST['estado']));
	//$estado=mysql_real_escape_string($estado);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo estado no es correcto</p>";
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


if($validacion){
	$resultado=$Orecomendacion->actualizarEstado($estado,$evidencia,$fotoevidencia,$fechaejecucion,$idrecomendacion);
	if($resultado=="exito"){
		/*CARGAR ARCHIVOS*/
		$mensajeArchivo="";

		if($fotoevidenciatemporal!=""){
			//Elimina la imagen antigua para actualizarla y que no ocupe espacio
			unlink("../archivosSubidos/recomendaciones/".$fotoevidenciaEliminacion);
			$estadoArchivo=cargarArchivo($fotoevidencianombre,$extencionfotoevidencia, $fotoevidenciatemporal, $fotoevidencia,"jpg","recomendaciones",550,0,"resize","center");
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
	if($resultado=="idrecomendacionExiste"){
		$mensaje="fracaso@Operaci&oacute;n fallida@El campo idrecomendacion ya existe en la base de datos";
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
