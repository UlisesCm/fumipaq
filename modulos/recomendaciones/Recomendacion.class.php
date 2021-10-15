<?php
include_once("../../conexion/Conexion.class.php");

class Recomendacion{
 //constructor
 	var $con;
 	function __construct(){
 		$this->con=new Conexion;
	}
	function armarConsulta($condicion,$papelera){
		if ($condicion!=""){
			if($papelera){
				$consulta="WHERE ((recomendaciones.idrecomendacion LIKE '%".$condicion."%') OR (recomendaciones.idcliente LIKE '%".$condicion."%') OR (recomendaciones.iddomicilio LIKE '%".$condicion."%') OR (recomendaciones.plaga LIKE '%".$condicion."%') OR (recomendaciones.fechadeejecucionestablecida LIKE '%".$condicion."%') OR (recomendaciones.responsable LIKE '%".$condicion."%') OR (recomendaciones.idtecnico LIKE '%".$condicion."%') OR (recomendaciones.idcaptura LIKE '%".$condicion."%') OR (recomendaciones.estado LIKE '%".$condicion."%') OR (recomendaciones.fechaalta LIKE '%".$condicion."%') OR (recomendaciones.fechaejecucion LIKE '%".$condicion."%'))AND recomendaciones.estatus ='eliminado'";
			}else{
				$consulta="WHERE ((recomendaciones.idrecomendacion LIKE '%".$condicion."%') OR (recomendaciones.idcliente LIKE '%".$condicion."%') OR (recomendaciones.iddomicilio LIKE '%".$condicion."%') OR (recomendaciones.plaga LIKE '%".$condicion."%') OR (recomendaciones.fechadeejecucionestablecida LIKE '%".$condicion."%') OR (recomendaciones.responsable LIKE '%".$condicion."%') OR (recomendaciones.idtecnico LIKE '%".$condicion."%') OR (recomendaciones.idcaptura LIKE '%".$condicion."%') OR (recomendaciones.estado LIKE '%".$condicion."%') OR (recomendaciones.fechaalta LIKE '%".$condicion."%') OR (recomendaciones.fechaejecucion LIKE '%".$condicion."%'))AND recomendaciones.estatus <>'eliminado'";
			}
		}else{
			if($papelera){
				$consulta="WHERE recomendaciones.estatus ='eliminado'";
			}else{
				$consulta="WHERE recomendaciones.estatus <>'eliminado'";
			}
		}
		return $consulta;
	}
	function comprobarCampo($campo, $valor, $tipoGuardado){
		if($this->con->conectar()==true){
			//print_r($listaCampos);
			$resultado=mysqli_query($this->con->conect,"SELECT COUNT( * ) AS contador from recomendaciones WHERE $campo = '$valor'");
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

	function guardar($idcliente,$iddomicilio,$area,$plaga,$recomendacion,$fotorecomendacion,$fechadeejecucionestablecida,$responsable,$idtecnico,$idcaptura,$estado,$fechaalta,$evidencia,$fotoevidencia,$fechaejecucion,$estatus){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['recomendaciones']['guardar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////

		$idrecomendacion=$this->con->generarClave(2); /*Sincronizacion 1 */

		if($this->con->conectar()==true){

                $varConsulta = "INSERT INTO recomendaciones (idrecomendacion, idcliente, iddomicilio, area, plaga, recomendacion, fotorecomendacion, fechadeejecucionestablecida, responsable, idtecnico, idcaptura, estado, fechaalta, evidencia, fotoevidencia, fechaejecucion, estatus) VALUES ('$idrecomendacion','$idcliente','$iddomicilio','$area','$plaga','$recomendacion','$fotorecomendacion','$fechadeejecucionestablecida','$responsable','$idtecnico','$idcaptura','$estado','$fechaalta','$evidencia','$fotoevidencia','$fechaejecucion','$estatus')";
				//echo $varConsulta;
				if(mysqli_query($this->con->conect,$varConsulta)){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="agreg&oacute; un nuevo registro en la tabla recomendaciones ";
						$this->registrarBitacora("guardar",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}

		}
	}

	function actualizar($idcliente,$iddomicilio,$area,$plaga,$recomendacion,$fotorecomendacion,$fechadeejecucionestablecida,$responsable,$idtecnico,$idcaptura,$estado,$fechaalta,$evidencia,$fotoevidencia,$fechaejecucion,$estatus,$idrecomendacion){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['recomendaciones']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////

		if($this->con->conectar()==true){

				if(mysqli_query($this->con->conect,"UPDATE recomendaciones SET idcliente='$idcliente', iddomicilio='$iddomicilio', area='$area', plaga='$plaga', recomendacion='$recomendacion', fotorecomendacion='$fotorecomendacion', fechadeejecucionestablecida='$fechadeejecucionestablecida', responsable='$responsable', idtecnico='$idtecnico', idcaptura='$idcaptura', estado='$estado', fechaalta='$fechaalta', evidencia='$evidencia', fotoevidencia='$fotoevidencia', fechaejecucion='$fechaejecucion', estatus='$estatus' WHERE idrecomendacion='$idrecomendacion'")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="modific&oacute; el registro ID: $idrecomendacion, de la tabla recomendaciones ";
						$this->registrarBitacora("modificar",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}

		}
	}

	function bloquear($idrecomendacion){

		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['recomendaciones']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////

		if($this->con->conectar()==true){
			//REQUIERE CAMPO 'estatus' EN LA TABLA
			return mysqli_query($this->con->conect,"UPDATE recomendaciones SET estatus ='bloqueado' WHERE idrecomendacion = '$idrecomendacion'");
		}
	}

	function mostrarIndividual($idrecomendacion){
		if($this->con->conectar()==true){
			return mysqli_query($this->con->conect,"SELECT * FROM recomendaciones WHERE idrecomendacion='$idrecomendacion'");
		}
	}

	function contar($condicion, $papelera){
		$condicion= trim($condicion);
		$where=$this->armarConsulta($condicion,$papelera);

		if($this->con->conectar()==true){
			$resultado=mysqli_query($this->con->conect,"SELECT
					recomendaciones.idrecomendacion,
					recomendaciones.idcliente,
					recomendaciones.iddomicilio,
					recomendaciones.area,
					recomendaciones.plaga,
					recomendaciones.recomendacion,
					recomendaciones.fotorecomendacion,
					recomendaciones.fechadeejecucionestablecida,
					recomendaciones.responsable,
					recomendaciones.idtecnico,
					recomendaciones.idcaptura,
					recomendaciones.estado,
					recomendaciones.fechaalta,
					recomendaciones.evidencia,
					recomendaciones.fotoevidencia,
					recomendaciones.fechaejecucion,
					recomendaciones.estatus,
					domicilios.iddomicilio AS iddomiciliodomicilios,
					clientes.idcliente AS idclienteclientes,
					tecnicos.idtecnico AS idtecnicotecnicos
					FROM recomendaciones
					INNER JOIN domicilios ON recomendaciones.iddomicilio=domicilios.iddomicilio
					INNER JOIN clientes ON recomendaciones.idcliente=clientes.idcliente
					INNER JOIN tecnicos ON recomendaciones.idtecnico=tecnicos.idtecnico
					$where");

			//$extractor = mysqli_fetch_array($resultado);
			$numero_filas=mysqli_num_rows($resultado);
			return $numero_filas;
		}
	}

	function mostrar($campoOrden, $orden, $inicial, $cantidadamostrar, $condicion, $papelera){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['recomendaciones']['consultar'])){
			return "denegado";
			exit;
		}

		$condicion= trim($condicion);
		$where=$this->armarConsulta($condicion,$papelera);

		$consulta = "SELECT
					recomendaciones.idrecomendacion,
					recomendaciones.idcliente,
					recomendaciones.iddomicilio,
					recomendaciones.area,
					recomendaciones.plaga,
					recomendaciones.recomendacion,
					recomendaciones.fotorecomendacion,
					recomendaciones.fechadeejecucionestablecida,
					recomendaciones.responsable,
					recomendaciones.idtecnico,
					recomendaciones.idcaptura,
					recomendaciones.estado,
					recomendaciones.fechaalta,
					recomendaciones.evidencia,
					recomendaciones.fotoevidencia,
					recomendaciones.fechaejecucion,
					recomendaciones.estatus,
					domicilios.iddomicilio AS iddomiciliodomicilios,
					clientes.idcliente AS idclienteclientes,
					tecnicos.idtecnico AS idtecnicotecnicos
					FROM recomendaciones
					INNER JOIN domicilios ON recomendaciones.iddomicilio=domicilios.iddomicilio
					INNER JOIN clientes ON recomendaciones.idcliente=clientes.idcliente
					INNER JOIN tecnicos ON recomendaciones.idtecnico=tecnicos.idtecnico
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
			return mysqli_query($this->con->conect,"SELECT * FROM recomendaciones $condicion");
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


//inicio PDF
function ObtenerDatosEncabezadosSucursal($nombresucursal){
   /////PERMISOS////////////////

    //REALIZAR CONSULTA SEGUN LO SELECCIONADO EN LOS FILTROS
    //REALIZAR CONSULTA SEGUN LO SELECCIONADO EN LOS FILTROS

    $consulta = "SELECT
                    SQL_CALC_FOUND_ROWS
                    sucursales.nombre AS NOMBRESUCURSAL,
                    sucursales.calle AS CALLESUCURSAL,
                    sucursales.colonia AS COLONIASUCURSAL,
                    sucursales.cp AS CODIGOPOSTALSUCURSAL,
                    sucursales.ciudad AS CIUDADSUCURSLA,
                    sucursales.estado AS ESTADOSUCURSAL,
                    sucursales.telefonocontacto AS TELEFONOSUCURSAL,
                    cuentascorreo.usuario AS CORREOSUCURSAL,
                    sucursales.numero AS NUMEROSUCURSAL
                    FROM sucursales
                      INNER JOIN cuentascorreo ON sucursales.idcuentacorreo=cuentascorreo.idcuentacorreo
                    where nombre='$nombresucursal'
                ";
      //  echo $consulta;// REVISAR CONSULTA
  if($this->con->conectar()==true){
    $resultado1 = mysqli_query($this->con->conect,$consulta);
    $resultado2 =  mysqli_query($this->con->conect,"SELECT FOUND_ROWS() AS contador");
    $extractor = mysqli_fetch_assoc($resultado2);
    return $resultado1;
  }
}


function ObtenerDatosTablaSQL($idcliente,$iddomicilio,$pendiente,$ejecutado,$filtrarfecha,$fechainicio,$fechafin){
   /////PERMISOS////////////////

    //REALIZAR CONSULTA SEGUN LO SELECCIONADO EN LOS FILTROS
    //REALIZAR CONSULTA SEGUN LO SELECCIONADO EN LOS FILTROS
        $consultaCliente = "";
        $consultaDomicilio = "";
        $consultaEstado = "";
        $consultaFecha = "";
        $consultaProgramacion = "";
        $consultaProgramacionSel = "";
        $consultaEstatus = "";


        if ($idcliente!=""){
          $consultaCliente=" AND recomendaciones.idcliente='$idcliente' ";
        }

        if ($iddomicilio!=""){
          $consultaDomicilio=" AND recomendaciones.iddomicilio='$iddomicilio' ";
        }



        if ($filtrarfecha=="SI"){
          $consultaFecha=" AND recomendaciones.fechadeejecucionestablecida >= '$fechainicio' AND recomendaciones.fechadeejecucionestablecida <= '$fechafin' ";
        }else{
          $consultaFecha="";
        }


        if ($pendiente=="SI" or $ejecutado=="SI"){

          $consultaProgramacion=" AND (";


          if ($pendiente=="SI"){
            $consultaProgramacionSel.="OR recomendaciones.estado='PENDIENTE' ";
          }

          if ($ejecutado=="SI"){
            $consultaProgramacionSel.="OR recomendaciones.estado='EJECUTADO' ";
          }

          $consultaProgramacionSel = substr($consultaProgramacionSel,3);
          $consultaProgramacion.= $consultaProgramacionSel.")";
        }


            $consultaEstatus="AND recomendaciones.estatus <>'eliminado' ";   // solo va a consultar los que esten activos osea no eiminados con esta linea


        $where="";
        $where="WHERE recomendaciones.idrecomendacion<>0
        $consultaCliente
        $consultaDomicilio
        $consultaEstado
        $consultaFecha
        $consultaProgramacion
        $consultaEstatus";


    $consulta = "SELECT
                SQL_CALC_FOUND_ROWS
                recomendaciones.area AS AREA,
                recomendaciones.plaga AS PLAGA,
                recomendaciones.recomendacion AS RECOMENDACION,
                tecnicos.nombre AS TECNICOS,
                recomendaciones.responsable AS RESPONSABLE,
                recomendaciones.estado AS ESTADO,
                recomendaciones.fotorecomendacion AS FOTORECOMENDACION,
                recomendaciones.fotoevidencia AS FOTOEVIDENCIA,
                recomendaciones.fechadeejecucionestablecida AS FECHAREGISTRO,
                clientes.nombre AS NOMBRECLIENTE,
                clientes.nic AS NICCLIENTE,
                clientes.telefonocontacto AS TELEFONOCLIENTE,
                clientes.correocontacto AS CORREOCLIENTE,
                clientes.nombrecontacto AS NOMBRECONTACTOCLIENTE,
                recomendaciones.evidencia AS EVIDENCIA,
                recomendaciones.fechaejecucion AS FECHA_EJECUTADA
                FROM recomendaciones
                INNER JOIN domicilios ON recomendaciones.iddomicilio=domicilios.iddomicilio
                INNER JOIN clientes ON recomendaciones.idcliente=clientes.idcliente
                INNER JOIN tecnicos ON recomendaciones.idtecnico=tecnicos.idtecnico
                /*INNER JOIN capturas ON recomendaciones.idcaptura=capturas.idcaptura*/
          $where
          ORDER BY recomendaciones.fechaalta
          ";

      //  echo $consulta;// REVISAR CONSULTA
  if($this->con->conectar()==true){

    $resultado1 = mysqli_query($this->con->conect,$consulta);
    $resultado2 =  mysqli_query($this->con->conect,"SELECT FOUND_ROWS() AS contador");
    $extractor = mysqli_fetch_assoc($resultado2);
    return $resultado1;
  }
}
//fin pdff




      function mostrarA($campoOrden, $orden, $inicial, $cantidadamostrar, $busqueda, $papelera, $idcliente,$iddomicilio,$estado,$filtrarfecha,$fechainicio,$fechafin,$pendiente,$ejecutado,$excel=""){
        /////PERMISOS////////////////
        if (!isset($_SESSION['permisos']['recomendaciones']['consultar'])){
          return "denegado";
          exit;
        }
        $condicion= trim($busqueda);
        $limites = "";
        //REALIZAR CONSULTA SEGUN LO SELECCIONADO EN LOS FILTROS
            $consultaCliente = "";
            $consultaDomicilio = "";
            $consultaEstado = "";
            $consultaFecha = "";
            $consultaProgramacion = "";
            $consultaProgramacionSel = "";
            $consultaEstatus = "";

            if ($idcliente!=""){
              $consultaCliente=" AND recomendaciones.idcliente='$idcliente' ";
            }

            if ($iddomicilio!=""){
              $consultaDomicilio=" AND recomendaciones.iddomicilio='$iddomicilio' ";
            }



            // if ($estado!=""){
            //   $consultaEstado=" AND recomendaciones.estado='$estado' ";
            // }

			
            if ($filtrarfecha=="SI"){
              $consultaFecha=" AND recomendaciones.fechadeejecucionestablecida >= '$fechainicio' AND recomendaciones.fechadeejecucionestablecida <= '$fechafin' ";
            }else{
              $consultaFecha="";
            }


            if ($pendiente=="SI" or $ejecutado=="SI"){

              $consultaProgramacion=" AND (";


              if ($pendiente=="SI"){
                $consultaProgramacionSel.="OR recomendaciones.estado='PENDIENTE' ";
              }

              if ($ejecutado=="SI"){
                $consultaProgramacionSel.="OR recomendaciones.estado='EJECUTADO' ";
              }

              $consultaProgramacionSel = substr($consultaProgramacionSel,3);
              $consultaProgramacion.= $consultaProgramacionSel.")";
            }


            if($papelera){
                $consultaEstatus="AND recomendaciones.estatus ='eliminado' ";
            }else{
                $consultaEstatus="AND recomendaciones.estatus <>'eliminado' ";
            }


            $where="";
            $where="WHERE recomendaciones.idrecomendacion<>0 
            $consultaCliente
            $consultaDomicilio
            $consultaEstado
            $consultaFecha
            $consultaProgramacion
            $consultaEstatus";


        if($excel!="SI"){
          $limites="LIMIT $inicial, $cantidadamostrar";
        }


        $consulta = "SELECT
                    SQL_CALC_FOUND_ROWS
                    recomendaciones.idrecomendacion,
          					recomendaciones.idcliente,
          					recomendaciones.iddomicilio,
          					recomendaciones.area,
          					recomendaciones.plaga,
          					recomendaciones.recomendacion,
          					recomendaciones.fotorecomendacion,
          					recomendaciones.fechadeejecucionestablecida,
          					recomendaciones.responsable,
          					recomendaciones.idtecnico,
          					recomendaciones.idcaptura,
          					recomendaciones.estado,
          					recomendaciones.fechaalta,
          					recomendaciones.evidencia,
          					recomendaciones.fotoevidencia,
          					recomendaciones.fechaejecucion,
          					recomendaciones.estatus,
          					domicilios.calle AS calledomicilio,
          					clientes.nombre AS nombrecliente,
          					tecnicos.nombre AS nombretecnico
          					FROM recomendaciones
          					INNER JOIN domicilios ON recomendaciones.iddomicilio=domicilios.iddomicilio
          					INNER JOIN clientes ON recomendaciones.idcliente=clientes.idcliente
          					INNER JOIN tecnicos ON recomendaciones.idtecnico=tecnicos.idtecnico


          					/*INNER JOIN capturas ON recomendaciones.idcaptura=capturas.idcaptura*/
              $where
              ORDER BY recomendaciones.fechaalta
              $limites
              ";
            //  echo $consulta;// REVISAR CONSULTA
        if($this->con->conectar()==true){

          $resultado1 = mysqli_query($this->con->conect,$consulta);
          $resultado2 =  mysqli_query($this->con->conect,"SELECT FOUND_ROWS() AS contador");
          $extractor = mysqli_fetch_assoc($resultado2);
          return array ($resultado1,$extractor["contador"]);
        }
      }



	function registrarBitacora($accion,$descripcion,$idcontrol="",$tablacontrol="",$clasificacion="",$extra=""){
		$idusuario=$_SESSION['idusuario'];
		$usuario=$_SESSION['usuario'];
		$descripcion="El usuario $usuario ".$descripcion;
		$hora=date('H:i');
		$fecha=date('Y-m-d');
		$modulo="recomendaciones";
		mysqli_query($this->con->conect,"INSERT INTO bitacora (hora,fecha,idusuario,modulo,accion,descripcion,idcontrol,tablacontrol,clasificacion,extra) VALUES ('$hora','$fecha','$idusuario','$modulo','$accion','$descripcion')");
	}





    function actualizarEstado($estado,$evidencia,$fotoevidencia,$fechaejecucion,$idrecomendacion){
  		/////PERMISOS////////////////
  		if (!isset($_SESSION['permisos']['recomendaciones']['modificar'])){
  			return "denegado";
  			exit;
  		}
  		/////FIN  DE PERMISOS////////

  		if($this->con->conectar()==true){
  			if($this->comprobarCampo("idrecomendacion",$idrecomendacion, "modificar")){
  				return "idrecomendacionExiste";
  			}else{
  				if(mysqli_query($this->con->conect,"UPDATE recomendaciones SET estado='$estado', evidencia='$evidencia', fotoevidencia='$fotoevidencia', fechaejecucion='$fechaejecucion' WHERE idrecomendacion='$idrecomendacion'")){
  					//BITACORA
  					if ($_SESSION['bitacora']=="si"){
  						$descripcionB="modific&oacute; el registro ID: $idrecomendacion, de la tabla recomendaciones ";
  						$this->registrarBitacora("modificar",$descripcionB);
  					}
  					return "exito";
  				}else{
  					return "fracaso";
  				}
  			}
  		}
  	}



    	function cambiarEstatus($idrecomendacion,$estatus){
    		/////PERMISOS////////////////
    		if (!isset($_SESSION['permisos']['recomendaciones']['modificar'])){
    			return "denegado";
    			exit;
    		}
    		/////FIN  DE PERMISOS////////

    		if($this->con->conectar()==true){
    			//REQUIERE CAMPO 'estatus' EN LA TABLA
    			if(mysqli_query($this->con->conect,"UPDATE recomendaciones SET estatus ='$estatus' WHERE idrecomendacion = '$idrecomendacion'")){
    				//BITACORA
    				if ($_SESSION['bitacora']=="si"){
    					$descripcionB="alter&oacute; el estatus del registro a: $estatus, de la tabla recomendaciones ";
    					$this->registrarBitacora("modificar",$descripcionB);
    				}
    				return "exito";
    			}else{
    				return "fracaso";
    			}
    		}
    	}





	function eliminar($ids, $tipoEliminacion){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['recomendaciones']['eliminar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////

		if($this->con->conectar()==true){
			if ($tipoEliminacion=='falsa'){
				//REQUIERE CAMPO 'estatus' EN LA TABLA
				if (mysqli_query($this->con->conect,"UPDATE recomendaciones SET estatus ='eliminado' WHERE idrecomendacion IN ($ids)")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="elimin&oacute; falsamente los registros: $ids, de la tabla recomendaciones ";
						$this->registrarBitacora("eliminarFalsa",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
			if ($tipoEliminacion=='real'){
				if(mysqli_query($this->con->conect,"DELETE FROM recomendaciones WHERE idrecomendacion IN ($ids)")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="elimin&oacute; los registros: $ids, de la tabla recomendaciones ";
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
