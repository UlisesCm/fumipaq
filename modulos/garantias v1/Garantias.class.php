<?php 
include_once("../../conexion/Conexion.class.php");

class Garantias{
 //constructor	
 	var $con;
 	function Garantias(){
 		$this->con=new Conexion;
	}
	function armarConsulta($condicion,$papelera){
		if ($condicion!=""){
			if($papelera){
				$consulta="WHERE garantias.estatus ='eliminado'";
			}else{
				$consulta="WHERE garantias.estatus <>'eliminado'";
			}
		}else{
			if($papelera){
				$consulta="WHERE garantias.estatus ='eliminado'";
			}else{
				$consulta="WHERE garantias.estatus <>'eliminado'";
			}
		}
		return $consulta;
	}
	function comprobarCampo($campo, $valor, $tipoGuardado){
		if($this->con->conectar()==true){
			//print_r($listaCampos);
			$resultado=mysqli_query($this->con->conect,"SELECT COUNT( * ) AS contador from garantias WHERE $campo = '$valor'");
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

	function guardar($idempresa,$idsucursal,$fecha,$area,$factura,$descripcion,$estatus,$provedor){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['garantias']['guardar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		$idgarantia=$this->con->generarClave(2); /*Sincronizacion 1 */
		
		if($this->con->conectar()==true){
			
				if(mysqli_query($this->con->conect,"INSERT INTO garantias (idgarantia, idempresa, idsucursal, fecha, area, factura, descripcion, estatus, provedor) VALUES ('$idgarantia','$idempresa','$idsucursal','$fecha','$area','$factura','$descripcion','$estatus','$provedor')")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="agreg&oacute; un nuevo registro en la tabla garantias ";
						$this->registrarBitacora("guardar",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			
		}
	}
	
	function actualizar($idempresa,$idsucursal,$fecha,$area,$factura,$descripcion,$estatus,$provedor,$idgarantia){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['garantias']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			
				if(mysqli_query($this->con->conect,"UPDATE garantias SET idempresa='$idempresa', idsucursal='$idsucursal', fecha='$fecha', area='$area', factura='$factura', descripcion='$descripcion', estatus='$estatus', provedor='$provedor' WHERE idgarantia='$idgarantia'")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="modific&oacute; el registro ID: $idgarantia, de la tabla garantias ";
						$this->registrarBitacora("modificar",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			
		}
	}
	
	function bloquear($idgarantia){
		
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['garantias']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			//REQUIERE CAMPO 'estatus' EN LA TABLA
			return mysqli_query($this->con->conect,"UPDATE garantias SET estatus ='bloqueado' WHERE idgarantia = '$idgarantia'");
		}
	}
	
	function cambiarEstatus($idgarantia,$estatus){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['garantias']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			//REQUIERE CAMPO 'estatus' EN LA TABLA
			if(mysqli_query($this->con->conect,"UPDATE garantias SET estatus ='$estatus' WHERE idgarantia = '$idgarantia'")){
				//BITACORA
				if ($_SESSION['bitacora']=="si"){
					$descripcionB="alter&oacute; el estatus del registro a: $estatus, de la tabla garantias ";
					$this->registrarBitacora("modificar",$descripcionB);
				}
				return "exito";
			}else{
				return "fracaso";
			}
		}
	}
	
	function mostrarIndividual($idgarantia){
		if($this->con->conectar()==true){
			return mysqli_query($this->con->conect,"SELECT * FROM garantias WHERE idgarantia='$idgarantia'");
		}
	}
	
	function contar($condicion, $papelera){
		$condicion= trim($condicion);
		$where=$this->armarConsulta($condicion,$papelera);
		
		if($this->con->conectar()==true){
			$resultado=mysqli_query($this->con->conect,"SELECT 
					garantias.idgarantia,
					garantias.idempresa,
					garantias.idsucursal,
					garantias.fecha,
					garantias.area,
					garantias.factura,
					garantias.descripcion,
					garantias.estatus,
					garantias.provedor,
					sucursalgarantias.nombre AS nombresucursalgarantias,
					empresasgarantias.nombrecomercial AS nombrecomercialempresasgarantias
					FROM garantias 
					INNER JOIN sucursalgarantias ON garantias.idsucursal=sucursalgarantias.idsucursal
					INNER JOIN empresasgarantias ON garantias.idempresa=empresasgarantias.idempresa
					$where");
					
			//$extractor = mysqli_fetch_array($resultado);
			$numero_filas=mysqli_num_rows($resultado);
			return $numero_filas;
		}
	}
	
	function mostrar($campoOrden, $orden, $inicial, $cantidadamostrar, $condicion, $papelera){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['garantias']['consultar'])){
			return "denegado";
			exit;
		}
		
		$condicion= trim($condicion);
		$where=$this->armarConsulta($condicion,$papelera);
		
		$consulta = "SELECT 
					garantias.idgarantia,
					garantias.idempresa,
					garantias.idsucursal,
					garantias.fecha,
					garantias.area,
					garantias.factura,
					garantias.descripcion,
					garantias.estatus,
					garantias.provedor,
					sucursalgarantias.nombre AS nombresucursalgarantias,
					empresasgarantias.nombrecomercial AS nombrecomercialempresasgarantias
					FROM garantias 
					INNER JOIN sucursalgarantias ON garantias.idsucursal=sucursalgarantias.idsucursal
					INNER JOIN empresasgarantias ON garantias.idempresa=empresasgarantias.idempresa
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
			return mysqli_query($this->con->conect,"SELECT * FROM garantias $condicion");
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
		$modulo="garantias";
		mysqli_query($this->con->conect,"INSERT INTO bitacora (hora,fecha,idusuario,modulo,accion,descripcion,idcontrol,tablacontrol,clasificacion,extra) VALUES ('$hora','$fecha','$idusuario','$modulo','$accion','$descripcion')");
	}
	
	function eliminar($ids, $tipoEliminacion){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['garantias']['eliminar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			if ($tipoEliminacion=='falsa'){
				//REQUIERE CAMPO 'estatus' EN LA TABLA
				if (mysqli_query($this->con->conect,"UPDATE garantias SET estatus ='eliminado' WHERE idgarantia IN ($ids)")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="elimin&oacute; falsamente los registros: $ids, de la tabla garantias ";
						$this->registrarBitacora("eliminarFalsa",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
			if ($tipoEliminacion=='real'){
				if(mysqli_query($this->con->conect,"DELETE FROM garantias WHERE idgarantia IN ($ids)")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="elimin&oacute; los registros: $ids, de la tabla garantias ";
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