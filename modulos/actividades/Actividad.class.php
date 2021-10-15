<?php 
include_once("../../conexion/Conexion.class.php");

class Actividad{
 //constructor	
 	var $con;
 	function __construct(){
 		$this->con=new Conexion;
	}
	function armarConsulta($condicion,$papelera){
		if ($condicion!=""){
			if($papelera){
				$consulta="WHERE ((actividades.nombre LIKE '%".$condicion."%')) AND actividades.estatus ='eliminado'";
			}else{
				$consulta="WHERE ((actividades.nombre LIKE '%".$condicion."%')) AND actividades.estatus <>'eliminado'";
			}
		}else{
			if($papelera){
				$consulta="WHERE actividades.estatus ='eliminado'";
			}else{
				$consulta="WHERE actividades.estatus <>'eliminado'";
			}
		}
		return $consulta;
	}
	function comprobarCampo($campo, $valor, $tipoGuardado){
		if($this->con->conectar()==true){
			//print_r($listaCampos);
			$resultado=mysqli_query($this->con->conect,"SELECT COUNT( * ) AS contador from actividades WHERE $campo = '$valor'");
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
	
	function comprobarProductoActividad($idproducto,$idactividad){
		if($this->con->conectar()==true){
			//print_r($listaCampos);
			$resultado=mysqli_query($this->con->conect,"SELECT COUNT(*) AS contador FROM productosactividades WHERE idproducto='$idproducto' AND  idactividad='$idactividad'");
			$extractor = mysqli_fetch_array($resultado);
			$numero_filas=$extractor['contador'];
			if ($numero_filas=="0"){
				return "";
			}else{
				return "checked=\"checked\"";
			}
		}
	}
	
	
	function guardarAsignacion($idactividad, $lista){
		if($this->con->conectar()==true){
			$con=0;
			mysqli_query($this->con->conect,"DELETE FROM serviciosactividades WHERE idactividad = '$idactividad'");
			foreach($lista as $idservicio){
				$idservicioactividad=$this->con->generarClave(1).$con; /*Sincronizacion 1 */
				mysqli_query($this->con->conect,"INSERT INTO serviciosactividades(idservicioactividad, idservicio, idactividad) VALUES ('$idservicioactividad','$idservicio','$idactividad')");
				$con++;
			}
			return true;
		}else{
			return false;
		}
	}

	function guardar($nombre,$idmodeloimpuestos,$tipoformato,$idunidad,$idcategoria,$servicios,$estatus){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['actividades']['guardar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		$idactividad=$this->con->generarClave(2); /*Sincronizacion 1 */
		
		if($this->con->conectar()==true){
			if($this->comprobarCampo("nombre",$nombre, "nuevo")){
				return "nombreExiste";
			}else{
				if(mysqli_query($this->con->conect,"INSERT INTO actividades (idactividad, nombre, idmodeloimpuestos, tipoformato, idunidad, idcategoria, estatus) VALUES ('$idactividad','$nombre','$idmodeloimpuestos','$tipoformato','$idunidad','$idcategoria','$estatus')")){
					$this->guardarAsignacion($idactividad,$servicios);
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="agreg&oacute; un nuevo registro en la tabla actividades ";
						$this->registrarBitacora("guardar",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
		}
	}
	
	function actualizar($nombre,$idmodeloimpuestos,$tipoformato,$idunidad,$idcategoria,$servicios,$estatus,$idactividad){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['actividades']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			if($this->comprobarCampo("nombre",$nombre, "modificar")){
				return "nombreExiste";
			}else{
				if(mysqli_query($this->con->conect,"UPDATE actividades SET nombre='$nombre', idmodeloimpuestos='$idmodeloimpuestos', tipoformato='$tipoformato', idunidad='$idunidad', idcategoria='$idcategoria', estatus='$estatus' WHERE idactividad='$idactividad'")){
					$this->guardarAsignacion($idactividad,$servicios);
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="modific&oacute; el registro ID: $idactividad, de la tabla actividades ";
						$this->registrarBitacora("modificar",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
		}
	}
	
	function bloquear($idactividad){
		
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['actividades']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			//REQUIERE CAMPO 'estatus' EN LA TABLA
			return mysqli_query($this->con->conect,"UPDATE actividades SET estatus ='bloqueado' WHERE idactividad = '$idactividad'");
		}
	}
	
	function cambiarEstatus($idactividad,$estatus){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['actividades']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			//REQUIERE CAMPO 'estatus' EN LA TABLA
			if(mysqli_query($this->con->conect,"UPDATE actividades SET estatus ='$estatus' WHERE idactividad = '$idactividad'")){
				//BITACORA
				if ($_SESSION['bitacora']=="si"){
					$descripcionB="alter&oacute; el estatus del registro a: $estatus, de la tabla actividades ";
					$this->registrarBitacora("modificar",$descripcionB);
				}
				return "exito";
			}else{
				return "fracaso";
			}
		}
	}
	
	function mostrarIndividual($idactividad){
		if($this->con->conectar()==true){
			return mysqli_query($this->con->conect,"SELECT * FROM actividades WHERE idactividad='$idactividad'");
		}
	}
	
	function contar($condicion, $papelera){
		$condicion= trim($condicion);
		$where=$this->armarConsulta($condicion,$papelera);
		
		if($this->con->conectar()==true){
			$resultado=mysqli_query($this->con->conect,"SELECT 
					actividades.idactividad,
					actividades.nombre,
					actividades.idmodeloimpuestos,
					actividades.tipoformato,
					actividades.idunidad,
					actividades.idcategoria,
					actividades.estatus,
					modelosimpuestos.nombre AS nombremodelosimpuestos,
					unidades.nombre AS nombreunidades,
					categorias.nombre AS nombrecategorias
					FROM actividades 
					INNER JOIN modelosimpuestos ON actividades.idmodeloimpuestos=modelosimpuestos.idmodeloimpuestos
					INNER JOIN unidades ON actividades.idunidad=unidades.idunidad
					INNER JOIN categorias ON actividades.idcategoria=categorias.idcategoria
					$where");
					
			//$extractor = mysqli_fetch_array($resultado);
			$numero_filas=mysqli_num_rows($resultado);
			return $numero_filas;
		}
	}
	
	function mostrar($campoOrden, $orden, $inicial, $cantidadamostrar, $condicion, $papelera){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['actividades']['consultar'])){
			return "denegado";
			exit;
		}
		
		$condicion= trim($condicion);
		$where=$this->armarConsulta($condicion,$papelera);
		
		$consulta = "SELECT 
					actividades.idactividad,
					actividades.nombre,
					actividades.idmodeloimpuestos,
					actividades.tipoformato,
					actividades.idunidad,
					actividades.idcategoria,
					actividades.estatus,
					modelosimpuestos.nombre AS nombremodelosimpuestos,
					unidades.nombre AS nombreunidades,
					categorias.nombre AS nombrecategorias
					FROM actividades 
					INNER JOIN modelosimpuestos ON actividades.idmodeloimpuestos=modelosimpuestos.idmodeloimpuestos
					INNER JOIN unidades ON actividades.idunidad=unidades.idunidad
					INNER JOIN categorias ON actividades.idcategoria=categorias.idcategoria
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
			return mysqli_query($this->con->conect,"SELECT * FROM actividades $condicion");
		}
	}
	
	function consultaLibre($condicion){
		if($this->con->conectar()==true){
			return mysqli_query($this->con->conect,$condicion);
		}
	}
	
	function obtenerServicios($idactividad){
		if($this->con->conectar()==true){
			$resultado=mysqli_query($this->con->conect,"SELECT servicios.nombre
														FROM serviciosactividades
														INNER JOIN servicios ON servicios.idservicio=serviciosactividades.idservicio
														WHERE serviciosactividades.idactividad='$idactividad' AND servicios.estatus<>'eliminado'");
			$servicios="";
			while ($filas=mysqli_fetch_array($resultado)) {
				$servicios=$servicios.$filas["nombre"].", ";
			}
			return substr($servicios, 0, -2);;
		}else{
			return false;
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
		$modulo="actividades";
		mysqli_query($this->con->conect,"INSERT INTO bitacora (hora,fecha,idusuario,modulo,accion,descripcion,idcontrol,tablacontrol,clasificacion,extra) VALUES ('$hora','$fecha','$idusuario','$modulo','$accion','$descripcion')");
	}
	
	function eliminar($ids, $tipoEliminacion){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['actividades']['eliminar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			if ($tipoEliminacion=='falsa'){
				//REQUIERE CAMPO 'estatus' EN LA TABLA
				if (mysqli_query($this->con->conect,"UPDATE actividades SET estatus ='eliminado' WHERE idactividad IN ($ids)")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="elimin&oacute; falsamente los registros: $ids, de la tabla actividades ";
						$this->registrarBitacora("eliminarFalsa",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
			if ($tipoEliminacion=='real'){
				if(mysqli_query($this->con->conect,"DELETE FROM actividades WHERE idactividad IN ($ids)")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="elimin&oacute; los registros: $ids, de la tabla actividades ";
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