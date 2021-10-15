<?php
include ("../../seguridad/comprobar_login.php");
include ("../Email.class.php");

$Oemail=new Email;
$resultado=$Oemail->consultaLibre("SELECT * FROM empresa WHERE 1");
$extractor = mysqli_fetch_array($resultado);
$razonsocial=$extractor["razonsocial"];
$validacion=true;
$mensaje="";

if (isset($_POST['correosaliente']) && trim($_POST['correosaliente']) !=""){
	$idcuentacorreo=htmlentities(trim($_POST['correosaliente']));
}else{
	$idcuentacorreo="";
}

$resultado=$Oemail->consultaLibre("SELECT * FROM cuentascorreo WHERE estatus <> 'eliminado' AND idcuentacorreo='$idcuentacorreo'");
$usuario="";
$contrasena="";
$servidorsmtp="";
$servidorpop="";
$puertosmtp="";
$puertopop="";
$autenticacionssl="";
	
while ($filas=mysqli_fetch_array($resultado)) {
	$usuario=html_entity_decode($filas["usuario"]);
	$contrasena=html_entity_decode($filas["contrasena"]);
	$servidorsmtp=html_entity_decode($filas["servidorsmtp"]);
	$servidorpop=html_entity_decode($filas["servidorpop"]);
	$puertosmtp=html_entity_decode($filas["puertosmtp"]);
	$puertopop=html_entity_decode($filas["puertopop"]);
	$autenticacionssl=html_entity_decode($filas["autenticacionssl"]);
	if($autenticacionssl=="si"){
		$autenticacionssl="ssl";
	}else{
		$autenticacionssl="tls";
	}
}


//echo "$usuario</br>$contrasena</br>$servidorsmtp</br>$servidorpop</br>$puertosmtp</br>$puertopop</br>$autenticacionssl";
if (isset($_POST['mensaje']) && trim($_POST['mensaje']) !=""){
	$mensajeemail=htmlentities(trim($_POST['mensaje']));
}else{
	$mensajeemail="";
}


if (isset($_POST['asunto']) && trim($_POST['asunto']) !=""){
	$asunto=htmlentities(trim($_POST['asunto']));
}else{
	$asunto="";
	$validacion=false;
	$mensaje=$mensaje."El asunto no es correcto</br>";
}


if (isset($_POST['idprogramacion']) && trim($_POST['idprogramacion']) !=""){
	$idprogramacion=htmlentities(trim($_POST['idprogramacion']));
}else{
	$idprogramacion="";
	$validacion=false;
	$mensaje=$mensaje."El identificador de la pogramaci&oacute;n no ha sido recibido";
}

if (isset($_POST['email']) && trim($_POST['email']) !=""){
	$email=trim($_POST['email']);
	if ($email=="[]"){
		$validacion=false;
		$mensaje=$mensaje." No se ha especificado un email de destino";
	}else{
		$email=str_replace("[","",$email);
		$email=str_replace("]","",$email);
		$email=str_replace('"','',$email);
	}
}else{
	$validacion=false;
	$mensaje=$mensaje." No se ha especificado un email de destino";
}

$validacionSMS=true;
$validacionEmail=true;

if ($validacion){
	//error_reporting(E_ALL);
	if (isset($_POST['enviarsms'])){
		$enviarsms=htmlentities(trim($_POST['enviarsms']));
		if (isset($_POST['numeros']) && trim($_POST['numeros']) !=""){
			$numeros=trim($_POST['numeros']);
			if (isset($_POST['mensajecelular']) && trim($_POST['mensajecelular']) !=""){
				$mensajecelular=trim($_POST['mensajecelular']);
				$respuestaSMS=$Oemail->enviarSMS($numeros,$mensajecelular);
				if ($respuestaSMS===true){
					$validacionSMS=true;
				}else{
					$validacionSMS=false;
				}
			}
		}else{
			echo "fracaso@Operaci&oacute;n fallida@No hay n&uacute;meros celulares v&aacute;lidos";
			exit;
		}
	}
	
	$respuestaEmail=$Oemail->enviarEmail($email,$mensajeemail,$usuario,$contrasena,$razonsocial,$asunto,$servidorsmtp,$puertosmtp,$autenticacionssl);
	
	if ($respuestaEmail===true){
		$validacionEmail=true;
	}else{
		$validacionEmail=false;
	}
	
	if ($validacionEmail===true or $validacionSMS===true){
		//Actualziar idprogramacion
		$resultadoConsulta=$Oemail->consultaLibre("UPDATE programacion SET notificacion='si' WHERE idprogramacion='$idprogramacion'");
		if($resultadoConsulta){
			$mensaje="Se ha notificado con &eacute;xito a todos los interesados";
			if ($validacionSMS===false){
				$mensaje="Se ha notificado con &eacute;xito a todos los interesados por correo elecctr&oacute;nico, pero ha ocurrido un error al intentar enviar los SMS ($respuestaSMS)";
			}
			if($validacionEmail===false){
				$mensaje="Se ha notificado con &eacute;xito a todos los interesados por SMS pero no se pudo enviar el correo elecctr&oacute;nico ($respuestaEmail)";
			}
			echo "exito@Env&iacute;o realizado con &eacute;xito@$mensaje";
			
			exit;
		}else{
			echo "fracaso@Operaci&oacute;n fallida@Se nofic&oacute; a los interesados pero no se realiz&oacute; el cambio de estado de la programaci&oacute;n";
			exit;
		}
	}else{
		echo "fracaso@Operaci&oacute;n fallida@No se pudo notificar a los interesados por ambos medios ($respuestaEmail). </br>$respuestaSMS";
		exit;
	}
}else{
	echo "fracaso@Operaci&oacute;n fallida@$mensaje";
}
?>