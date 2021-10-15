<?php
include ("../../seguridad/comprobar_login.php");
require('../Recomendacion.class.php');

$Orecomendacion=new Recomendacion;
$mensaje="";
$actualizarestado="";


if (isset($_REQUEST['ids']) && $_REQUEST['ids'] !="") {
	if($_REQUEST['ids']!="undefined"){
		if(is_array($_REQUEST['ids'])){
			$ids = implode(',', ($_REQUEST['ids']));
				$estadoactuals = implode(',', ($_REQUEST['estadoactuals']));
		}else{
			$ids=$_REQUEST['ids'];
			$estadoactuals=$_REQUEST['estadoactuals'];
		}


if ($estadoactuals=="PENDIENTE") {
$actualizarestado='EJECUTADO';
}else {
$actualizarestado='PENDIENTE';
}


		if($resultado=$Orecomendacion->modificarestado($ids,$actualizarestado)){
			if ($resultado=="denegado"){
				$mensaje="aviso@Acceso denegado@Su cuenta no cuenta con los privilegios para poder realizar esta tarea";
			}else{
				$mensaje="exito@Operaci&oacute;n exitosa@Los registos han sido modificados";
			}
		}else{
			$mensaje="fracaso@Operaci&oacute;n fallida@Ha ocurrido un problema en la base de datos [001]";
		}

	}else{
		$mensaje="fracaso@Operaci&oacute;n fallida@Ha ocurrido un problema la transmisión de datos[002]";
	}
}else{
	$mensaje="aviso@Operaci&oacute;n fallida@No se ha seleccionado ning&uacute;n registro";
}

echo utf8_encode($mensaje);
?>
