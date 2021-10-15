<?php 
include_once("../../conexion/Conexion.class.php");

class Email{
 //constructor	
 	var $con;
 	function __construct(){
 		$this->con=new Conexion;
	}
	
	
	function consultaLibre($condicion){
		if($this->con->conectar()==true){
			return mysqli_query($this->con->conect,$condicion);
		}
	}
	
	function TildesHtml($cadena) { 
    	return str_replace(array("á","é","í","ó","ú","ñ","Á","É","Í","Ó","Ú","Ñ"),
                       array("&aacute;","&eacute;","&iacute;","&oacute;","&uacute;","&ntilde;","&Aacute;","&Eacute;","&Iacute;","&Oacute;","&Uacute;","&Ntilde;"),
					   $cadena);     
	}
	
	function enviarEmail($emailsdestino,$mensaje, $usuario, $contrasena, $sujeto, $asunto, $servidorsmtp="gmail.mail.com", $puertosmtp=445, $autenticacionssl="ssl"){
		error_reporting(E_STRICT);
		set_time_limit(10);
		date_default_timezone_set('America/Mexico_City');
		require_once('../../../librerias/php/phpmailer/class.phpmailer.php');
		$mail             = new PHPMailer();
		$body             = $this->TildesHtml(html_entity_decode($mensaje));
		$body             = eregi_replace("[\]",'',$body);
		$mail->IsSMTP(); // telling the class to use SMTP
												   // 1 = errors and messages
												   // 2 = messages only
		$mail->SMTPAuth   = true; 
		$mail->Mailer="smtp";
		//$mail->Helo="www.imodula.com";                 // enable SMTP authentication
		if ($autenticacionssl=="ssl"){
			$mail->SMTPSecure = $autenticacionssl;                 // sets the prefix to the servier
		}
		$mail->Host       = $servidorsmtp;      // sets GMAIL as the SMTP server
		$mail->Port       = $puertosmtp;                   // set the SMTP port for the GMAIL server
		$mail->Username   = $usuario;  // GMAIL username
		$mail->Password   = $contrasena;            // GMAIL password
		
		$mail->SetFrom($usuario, $sujeto);
		$mail->Subject    = $asunto;
		$mail->AltBody    = "Para ver el mensaje, por favor use un visor compatible con HTML"; // optional, comment out and test
		$mail->MsgHTML($body);
		
		$destinatarios = explode(",",$emailsdestino);
		foreach($destinatarios as $address){ 
			$mail->AddAddress($address, "");
		} 
		
		if(!$mail->Send()) {
			return false;
		} else {
		   return true;
		}
		return "Problema con el Script de env&iacute;o de correo.";
	}
	
	function obtenerConfiguracion($campo){
		if($this->con->conectar()==true){
			$resultado=mysqli_query($this->con->conect,"SELECT $campo FROM configuracion WHERE 1");
			if ($resultado){
				$extractor = mysqli_fetch_array($resultado);
				$valorCampo=$extractor["$campo"];
				return $valorCampo;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	function enviarSMS($numeros,$mensaje){
		if ($mensaje==""){
			return "Mensaje SMS vac&iacute;o ";
		}
		//$numeros=substr($numeros, 0, -1);
		$numeros=substr($numeros,1);
		//echo "NUMEROS:".$numeros;
		
		$arrayNumeros=explode(",",$numeros);
		$numeros2="";
		foreach ($arrayNumeros as $numero){
				$numero = preg_replace("/[^0-9]/", '', $numero);
				if (strlen($numero) == 11){
					$numero = preg_replace("/^1/", '',$numero);
				}
				
				if (strlen($numero) == 10){
					$numeros2=$numeros2."".$numero.",";
				}
		}
		$numeros2=substr($numeros2, 0, -1);
		//echo "Numeros:".$numeros2;
		$params = array(
		  "message" => $mensaje,
		  "numbers" => $numeros2,
		  "country_code" => 52
		);
		$headers = array(
		  "apikey: b23144774395bed30873b36fdc0ef0b1a1574d5f"
		);
		curl_setopt_array($ch = curl_init(), array(
		  CURLOPT_URL => "https://api.smsmasivos.com.mx/sms/send",
		  CURLOPT_SSL_VERIFYPEER => 0,
		  CURLOPT_HEADER => 0,
		  CURLOPT_HTTPHEADER => $headers,
		  CURLOPT_POST => 1,
		  CURLOPT_POSTFIELDS => http_build_query($params),
		  CURLOPT_RETURNTRANSFER => 1
		));
		$respuesta = curl_exec($ch);
		curl_close($ch);
		
		$res= json_decode($respuesta);
		if ($res!=NULL){
			if (isset($res->success)){
				if($res->success===true){
					return true;
				}else{
					return $res->message;
				}
			}else{
				if($res->succes===true){
					return true;
				}else{
					return $res->message;
				}
			}
		}else{
			return "No se pudo enviar la solicitud SOAP / CURL, puede ser que la API de envio SMS no est&eacute; disponible para la URL: https://api.smsmasivos.com.mx/sms/send. Verifique su c&oacute;digo fuente o consulte a su proveedor de SMSs";
		}

	}
}
?>