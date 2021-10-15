<?php 
include_once("../../conexion/Conexion.class.php");

class Empresasgarantias{
 //constructor	
 	var $con;
 	function __construct(){
 		$this->con=new Conexion;
	}
	function armarConsulta($condicion,$papelera){
		if ($condicion!=""){
			$consulta="WHERE ((empresasgarantias.nombrecomercial LIKE '%".$condicion."%') OR (empresasgarantias.razonsocial LIKE '%".$condicion."%') OR (empresasgarantias.rfc LIKE '%".$condicion."%') OR (empresasgarantias.idempresa LIKE '%".$condicion."%'))AND empresasgarantias.idempresa <>'0'";
		}else{
			$consulta="WHERE empresasgarantias.idempresa <>'0'";
		}
		return $consulta;
	}function comprobarCampo($campo, $valor, $tipoGuardado){
		if($this->con->conectar()==true){
			//print_r($listaCampos);
			$resultado=mysqli_query($this->con->conect,"SELECT COUNT( * ) AS contador from empresasgarantias WHERE $campo = '$valor'");
			if ($resultado){
				$extractor = mysqli_fetch_array($resultado);
				$numero_filas=$extractor["contador"];
				if ($tipoGuardado=='nuevo'){
					if ($numero_filas=="0"){
						return false;
					}else{
						return true;
					}
				}
				if ($tipoGuardado=='modificar'){
					if ($numero_filas=="1" or $numero_filas=="0"){
						return false;
					}else{
						return true;
					}
				}
			}else{
				return false;
			}
		}
	}

	function guardar($nombrecomercial,$razonsocial,$rfc,$domiciliofiscal,$regimen,$telefono,$email,$licencia){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['empresasgarantias']['guardar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		$idempresa=$this->con->generarClave(2); /*Sincronizacion 1 */
		
		if($this->con->conectar()==true){
			
				if(mysqli_query($this->con->conect,"INSERT INTO empresasgarantias (idempresa, nombrecomercial, razonsocial, rfc, domiciliofiscal, regimen, telefono, email, licencia) VALUES ('$idempresa','$nombrecomercial','$razonsocial','$rfc','$domiciliofiscal','$regimen','$telefono','$email','$licencia')")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="agreg&oacute; un nuevo registro en la tabla empresasgarantias ";
						$this->registrarBitacora("guardar",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			
		}
	}
	
	function actualizar($nombrecomercial,$razonsocial,$rfc,$domiciliofiscal,$regimen,$telefono,$email,$licencia,$idempresa){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['empresasgarantias']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			
				if(mysqli_query($this->con->conect,"UPDATE empresasgarantias SET nombrecomercial='$nombrecomercial', razonsocial='$razonsocial', rfc='$rfc', domiciliofiscal='$domiciliofiscal', regimen='$regimen', telefono='$telefono', email='$email', licencia='$licencia' WHERE idempresa='$idempresa'")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="modific&oacute; el registro ID: $idempresa, de la tabla empresasgarantias ";
						$this->registrarBitacora("modificar",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			
		}
	}
	
	function bloquear($idempresa){
		
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['empresasgarantias']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			//REQUIERE CAMPO 'estatus' EN LA TABLA
			return mysqli_query($this->con->conect,"UPDATE empresasgarantias SET estatus ='bloqueado' WHERE idempresa = '$idempresa'");
		}
	}
	
	function cambiarEstatus($idempresa,$estatus){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['empresasgarantias']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			//REQUIERE CAMPO 'estatus' EN LA TABLA
			if(mysqli_query($this->con->conect,"UPDATE empresasgarantias SET estatus ='$estatus' WHERE idempresa = '$idempresa'")){
				//BITACORA
				if ($_SESSION['bitacora']=="si"){
					$descripcionB="alter&oacute; el estatus del registro a: $estatus, de la tabla empresasgarantias ";
					$this->registrarBitacora("modificar",$descripcionB);
				}
				return "exito";
			}else{
				return "fracaso";
			}
		}
	}
	
	function mostrarIndividual($idempresa){
		if($this->con->conectar()==true){
			return mysqli_query($this->con->conect,"SELECT * FROM empresasgarantias WHERE idempresa='$idempresa'");
		}
	}
	
	function contar($condicion, $papelera){
		$condicion= trim($condicion);
		$where=$this->armarConsulta($condicion,$papelera);
		
		if($this->con->conectar()==true){
			$resultado=mysqli_query($this->con->conect,"SELECT 
					empresasgarantias.idempresa,
					empresasgarantias.nombrecomercial,
					empresasgarantias.razonsocial,
					empresasgarantias.rfc,
					empresasgarantias.domiciliofiscal,
					empresasgarantias.regimen,
					empresasgarantias.telefono,
					empresasgarantias.email,
					empresasgarantias.licencia
					FROM empresasgarantias 
					$where");
					
			//$extractor = mysqli_fetch_array($resultado);
			$numero_filas=mysqli_num_rows($resultado);
			return $numero_filas;
		}
	}
	
	function mostrar($campoOrden, $orden, $inicial, $cantidadamostrar, $condicion, $papelera){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['empresasgarantias']['consultar'])){
			return "denegado";
			exit;
		}
		
		$condicion= trim($condicion);
		$where=$this->armarConsulta($condicion,$papelera);
		
		$consulta = "SELECT 
					empresasgarantias.idempresa,
					empresasgarantias.nombrecomercial,
					empresasgarantias.razonsocial,
					empresasgarantias.rfc,
					empresasgarantias.domiciliofiscal,
					empresasgarantias.regimen,
					empresasgarantias.telefono,
					empresasgarantias.email,
					empresasgarantias.licencia
					FROM empresasgarantias 
					$where
					ORDER BY $campoOrden $orden
					LIMIT $inicial, $cantidadamostrar
					";
		if($this->con->conectar()==true){
			return $resultado=mysqli_query($this->con->conect,$consulta);
		}
	}
	function consultaGeneral($condicion){
		if($this->con->conectar()==true){
			return mysqli_query($this->con->conect,"SELECT * FROM empresasgarantias $condicion");
		}
	}
	
	function consultaLibre($condicion){
		if($this->con->conectar()==true){
			return mysqli_query($this->con->conect,$condicion);
		}
	}
	
	function obtenerConfiguracion($campo){
		if($this->con->conectar()==true){
			$resultado=mysqli_query($this->con->conect,"SELECT $campo FROM configuracion WHERE concepto='$campo' ");
			if ($resultado){
				$extractor = mysqli_fetch_array($resultado);
				$valorCampo=$extractor["valor"];
				return $valorCampo;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	function registrarBitacora($accion,$descripcion,$idcontrol="",$tablacontrol="",$clasificacion="",$extra=""){
		$idusuario=$_SESSION['idusuario'];
		$usuario=$_SESSION['usuario'];
		$descripcion="El usuario $usuario ".$descripcion;
		$hora=date('H:i');
		$fecha=date('Y-m-d');
		$modulo="empresasgarantias";
		mysqli_query($this->con->conect,"INSERT INTO bitacora (hora,fecha,idusuario,modulo,accion,descripcion,idcontrol,tablacontrol,clasificacion,extra) VALUES ('$hora','$fecha','$idusuario','$modulo','$accion','$descripcion')");
	}
	
	function eliminar($ids, $tipoEliminacion){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['empresasgarantias']['eliminar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			if ($tipoEliminacion=='falsa'){
				//REQUIERE CAMPO 'estatus' EN LA TABLA
				if (mysqli_query($this->con->conect,"UPDATE empresasgarantias SET estatus ='eliminado' WHERE idempresa IN ($ids)")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="elimin&oacute; falsamente los registros: $ids, de la tabla empresasgarantias ";
						$this->registrarBitacora("eliminarFalsa",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
			if ($tipoEliminacion=='real'){
				if(mysqli_query($this->con->conect,"DELETE FROM empresasgarantias WHERE idempresa IN ($ids)")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="elimin&oacute; los registros: $ids, de la tabla empresasgarantias ";
						$this->registrarBitacora("eliminar",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
		}
	}
}
?>