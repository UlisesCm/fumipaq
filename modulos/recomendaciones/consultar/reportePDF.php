<?php







include("../../../librerias/php/mpdf/vendor/autoload.php");

require('../Recomendacion.class.php');

// require_once __DIR__ . '/indexgenerador.php';

include("../../../librerias/php/mpdf/indexgeneradorHorizontalRecomendaciones.php");



function Reporte($idcliente,$iddomicilio,$pendiente,$ejecutado,$filtrarfecha,$fechainicio,$fechafin){



  // $id='1452014215278';

  //consulta en la base de datos y obtiene los registros encontrados

    $funcion=new Recomendacion;



    $contenidotabla=consultasydisenopdftabla($idcliente,$iddomicilio,$pendiente,$ejecutado,$filtrarfecha,$fechainicio,$fechafin);

    $titulostabla=$contenidotabla[1];

    $contenidototales=$contenidotabla[2];

    $disenosucursalencabezado=$contenidotabla[3];

    $contenidotabla=$contenidotabla[0];





$campoextra=$disenosucursalencabezado;

$espaciosentreheaderytabla='';

    $DatosConsultaEncabezado = $funcion->ObtenerDatosTablaSQL($idcliente,$iddomicilio,$pendiente,$ejecutado,$filtrarfecha,$fechainicio,$fechafin);

//obtiene la plantilla ya con datos

$tituloreporte='Reporte de recomendaciones';



// $obtenerplantillacompleta = new clasegeneradorpdf;

//$DatosconsultaTabla,$DatosConsultaEncabezado,$titulostabla,$tituloreporte,$fechafin,$firmas,$titulofirmauno,$titulofirmados

// $plantillacompleta=$obtenerplantillacompleta->GeneradorPdf($contenidotabla,$DatosConsultaEncabezado,$titulostabla,$tituloreporte,$filtrarfecha,$fechainicio,$fechafin,'FALSE','ELABORÓ','AUTORIZA',$contenidototales,$campoextra,$espaciosentreheaderytabla);

//$mandarcolumna=GeneradorPdf();

// return $plantillacompleta;

}









function consultasydisenopdftabla($idcliente,$iddomicilio,$pendiente,$ejecutado,$filtrarfecha,$fechainicio,$fechafin)

{

  $titulostablath = ['ÁREA','TIPO','RECOMENDÓ','RECOMENDACIÓN','FECHA','FOTO DE EVIDENCIA (ANTES) ','FECHA DE EJECUCIÓN','FOTO DE EVIDENCIA (DESPUÉS)','EVIDENCIA','ESTADO'];



$columnaservicios='';

  $funcion=new Recomendacion;



   $resultado=$funcion->ObtenerDatosTablaSQL($idcliente,$iddomicilio,$pendiente,$ejecutado,$filtrarfecha,$fechainicio,$fechafin);



  $numero_campos=3;





  while ($filas=mysqli_fetch_array($resultado)) {

$fechaejecutada='';

if ($filas['FECHA_EJECUTADA']!='1994-01-01') {

  $fechaejecutada=$filas['FECHA_EJECUTADA'];

}else {

  $fechaejecutada='N/E';

}



    $columnaservicios=$columnaservicios.'<tr>

                <td class="desc">'.$filas['AREA'].'</td>

                  <td class="desc">'.$filas['PLAGA'].'</td>

                    <td class="desc">'.$filas['TECNICOS'].'</td>

                    <td class="desc">'.$filas['RECOMENDACION'].'</td>

                      <td class="desc">'.$filas['FECHAREGISTRO'].'</td>

                      <td class="desc"><img src="../../../empresas/modulalite/archivosSubidos/recomendaciones/'.$filas['FOTORECOMENDACION'].'" id="fotorecomendacion"></td>

                      <td class="desc">'.$fechaejecutada.'</td>

<td class="desc"><img src="../../../empresas/modulalite/archivosSubidos/recomendaciones/'.$filas['FOTOEVIDENCIA'].'" id="fotorecomendacion"></td>

                      <td class="desc">'.$filas['EVIDENCIA'].'</td>

                        <td class="desc">'.$filas['ESTADO'].'</td>



                      ';

  }











  $resultados=$funcion->ObtenerDatosEncabezadosSucursal($_SESSION["nombresucursal"]);





  while ($filas=mysqli_fetch_array($resultados)) {

    $disenosucursalencabezado='<header class="clearfix">

      <div id="logo">

        <img src="../../../librerias/php/mpdf/Logo_Fumylim.jpg">

      </div>

        <div id="corporativo">

        <div>CORPORATIVO FUMYLIM</div>

    <div>Valle de los Crotos No. 1651</div>

    <div>Col. Jardines del Valle. CP. 45138</div>

    <div>Zapopan, Jalisco. Tel. 33 1561 6893 fumylim@fumylim.com.mx</div>

        </div>

      <div id="empresa">

      <h2 class="name">'.$filas['NOMBRESUCURSAL'].'</h2>

      <div>'.$filas['CALLESUCURSAL'].' #'.$filas['NUMEROSUCURSAL'].' </div>

      <div>'.$filas['COLONIASUCURSAL'].' '.$filas['CODIGOPOSTALSUCURSAL'].'</div>

      <div>'.$filas['CIUDADSUCURSLA'].' '.$filas['ESTADOSUCURSAL'].'  '.$filas['TELEFONOSUCURSAL'].'</div>

      <div>'.$filas['CORREOSUCURSAL'].'</div>

      </div>

      </div>

    </header>';

  }









$disenotabla=$columnaservicios;



$disenototales='';





return array($disenotabla,$titulostablath,$disenototales,$disenosucursalencabezado);

}









if (isset($_REQUEST['ejecutado']) && $_REQUEST['ejecutado'] !="") {

	if($_REQUEST['ejecutado']!="undefined"){

		$ejecutado = htmlentities($_REQUEST['ejecutado']);

	}else{

		$ejecutado="";

	}

}else{

	$ejecutado="";

}





if (isset($_REQUEST['pendiente']) && $_REQUEST['pendiente'] !="") {

	if($_REQUEST['pendiente']!="undefined"){

		$pendiente = htmlentities($_REQUEST['pendiente']);

	}else{

		$pendiente="";

	}

}else{

	$pendiente="";

}





if (isset($_REQUEST['idcliente']) && $_REQUEST['idcliente'] !="") {

	if($_REQUEST['idcliente']!="undefined"){

		$idcliente = htmlentities($_REQUEST['idcliente']);

	}else{

		$idcliente="";

	}

}else{

	$idcliente="";

}







if (isset($_REQUEST['iddomicilio']) && $_REQUEST['iddomicilio'] !="") {

	if($_REQUEST['iddomicilio']!="undefined"){

		$iddomicilio = htmlentities($_REQUEST['iddomicilio']);

	}else{

		$iddomicilio="";

	}

}else{

	$iddomicilio="";

}



if (isset($_REQUEST['filtrarfecha']) && $_REQUEST['filtrarfecha'] !="") {

	if($_REQUEST['filtrarfecha']!="undefined"){

		$filtrarfecha = htmlentities($_REQUEST['filtrarfecha']);

	}else{

		$filtrarfecha="";

	}

}else{

	$filtrarfecha="";

}





if (isset($_REQUEST['fechainicio']) && $_REQUEST['fechainicio'] !="") {

	if($_REQUEST['fechainicio']!="undefined"){

		$fechainicio = htmlentities($_REQUEST['fechainicio']);

	}else{

		$fechainicio="";

	}

}else{

	$fechainicio="";

}





if (isset($_REQUEST['fechafin']) && $_REQUEST['fechafin'] !="") {

	if($_REQUEST['fechafin']!="undefined"){

		$fechafin = htmlentities($_REQUEST['fechafin']);

	}else{

		$fechafin="";

	}

}else{

	$fechafin="";

}









Reporte($idcliente,$iddomicilio,$pendiente,$ejecutado,$filtrarfecha,$fechainicio,$fechafin);



 ?>

