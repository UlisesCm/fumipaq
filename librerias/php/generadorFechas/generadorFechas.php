<?php 
//$fechainicial=date("d-m-Y");

$tipogenerador=$_POST["tipogenerador"];
$cantidadservicios=$_POST["cantidadservicios"];
$fechainicio=$_POST["fechainicio"];
$tipomeses=$_POST["tipomeses"];
$diames=$_POST["diames"];
$cantidadmeses=$_POST["cantidadmeses"];
$funcion1=$_POST["funcion1"];
$funcion2=$_POST["funcion2"];
$cantidadmeses2=$_POST["cantidadmeses2"];
		
		
$funcion=$funcion1;
$opcion=$funcion2;
//$fechainicial="07-03-2019";
$fechainicial2=date("d-m-Y",strtotime($fechainicio));
$numeroservicios=$cantidadservicios;
$diaseleccionados=$diames;


$ciclos=$cantidadmeses;

$numeroservicios=$numeroservicios*$ciclos;
$fechasArray = array();


if ($tipomeses=="1"){
	//Funcion para meses
	$con=0;
	while($con<$numeroservicios){
		$fechainicial2=date("d-m-Y",strtotime($fechainicial2)); 
		$fechainicial=strtotime($fechainicial2);
		$diasdelmes = date( "t", $fechainicial );
		$dia = date( "d", $fechainicial );
		$mes = date( "m", $fechainicial );
		if ($diasdelmes<$diaseleccionados){
			//echo "No entro en".date("d-m-Y",$fechainicial)."</br>";
			//echo date("$diasdelmes-m-Y", $fechainicial)."</br>";
			array_push($fechasArray,  date("$diasdelmes-m-Y", $fechainicial));
		}else{
			//echo date("$diaseleccionados-m-Y", $fechainicial)."</br>";
			array_push($fechasArray, date("$diaseleccionados-m-Y", $fechainicial));
		}
		if ($mes==01){
			//$sumadias=$ciclos*20;
			$fechainicial2=date("d-m-Y",strtotime($fechainicial2."+ 28 day")); 
		}else{
			$fechainicial2=date("d-m-Y",strtotime($fechainicial2."+ 1 month")); 
		}
		//echo $diasdelmes." $mes</br>";
		$con++;
	}
	intercalarMeses($fechasArray,$ciclos);
}
if ($tipomeses=="2") {
	$ciclos=$cantidadmeses2;
	$numeroservicios=$numeroservicios;
	if (($funcion=="primero" || $funcion=="segundo" || $funcion=="tercero"  |$funcion=="cuarto" || $funcion=="ultimo") and $opcion!="pordia"){
	
		$fechainicial2=date("d-m-Y",strtotime($fechainicial2)); 
		$fechainicial=strtotime($fechainicial2);
		$diasdelmes = date( "t", $fechainicial );
		$dia = date( "d", $fechainicial );
		$mes = date( "m", $fechainicial );
		$ano= date( "Y", $fechainicial );
		$messiguiente=cambiarMesSiguiente($mes);
		
		$fechainicial="01-".$mes."-".$ano;
		/*echo $fechainicial;
		if($messiguiente=="01"){//cambiar de año
			$ano=$ano+1;
		}*/
		$fechainicial2=date("d-m-Y",strtotime($fechainicial));
	
		$con=0;
		while ($con< ($numeroservicios*5)){
			
			$fechainicial2=date("d-m-Y",strtotime($fechainicial2)); 
			$fechainicial=strtotime($fechainicial2);
			//echo "Inicia en: ".$fechainicial2.'<br>';
			$diasdelmes = date( "t", $fechainicial );
			$dia = date( "d", $fechainicial );
			$mes = date( "m", $fechainicial );
			//echo date("d-m-Y", strtotime('monday', $fechainicial)).'<br>';
			array_push($fechasArray, date("d-m-Y", strtotime($opcion, $fechainicial)));
			$fechainicial2=date("d-m-Y",strtotime($fechainicial2."+ 1 week"));
			$con++;
		}
		if ($funcion=="primero"){
			extraerDias($fechasArray,$ciclos,1);
		}
		if ($funcion=="segundo"){
			extraerDias($fechasArray,$ciclos,2);
		}
		if ($funcion=="tercero"){
			extraerDias($fechasArray,$ciclos,3);
		}
		if ($funcion=="cuarto"){
			extraerDias($fechasArray,$ciclos,4);
		}
		if ($funcion=="ultimo"){
			extraerUltimo($fechasArray,$ciclos);
		}
	}
	
	if ($opcion=="pordia"){
		if ($funcion=="primero"){
			$dia="01";
		}
		if ($funcion=="segundo"){
			$dia="02";
		}
		if ($funcion=="tercero"){
			$dia="03";
		}
		if ($funcion=="cuarto"){
			$dia="04";
		}
		if ($funcion=="ultimo"){
			//Funcion para meses
			$con=0;
			while($con<$numeroservicios){
				$fechainicial2=date("d-m-Y",strtotime($fechainicial2)); 
				$fechainicial=strtotime($fechainicial2);
				$diasdelmes = date( "t", $fechainicial );
				$dia = date( "d", $fechainicial );
				$mes = date( "m", $fechainicial );
				$diaseleccionados=31;
				if ($diasdelmes<$diaseleccionados){
					//echo "No entro en".date("d-m-Y",$fechainicial)."</br>";
					//echo date("$diasdelmes-m-Y", $fechainicial)."</br>";
					array_push($fechasArray,  date("$diasdelmes-m-Y", $fechainicial));
				}else{
					//echo date("$diaseleccionados-m-Y", $fechainicial)."</br>";
					array_push($fechasArray, date("$diaseleccionados-m-Y", $fechainicial));
				}
				if ($mes==01){
					//$sumadias=$ciclos*20;
					$fechainicial2=date("d-m-Y",strtotime($fechainicial2."+ 28 day")); 
				}else{
					$fechainicial2=date("d-m-Y",strtotime($fechainicial2."+ 1 month")); 
				}
				//echo $diasdelmes." $mes</br>";
				$con++;
			}
			intercalarMeses($fechasArray,$ciclos);
		}else{
		
			$fechainicial2=date("d-m-Y",strtotime($fechainicial2)); 
			$fechainicial=strtotime($fechainicial2);
			$diasdelmes = date( "t", $fechainicial );
			$mes = date( "m", $fechainicial );
			$ano= date( "Y", $fechainicial );
			$fechainicial=$dia."-".$mes."-".$ano;
			$fechainicial2=date("d-m-Y",strtotime($fechainicial));
		
			$con=0;
			while ($con< ($numeroservicios*5)){
				$fechainicial2=date("d-m-Y",strtotime($fechainicial2)); 
				$fechainicial=strtotime($fechainicial2);
				$diasdelmes = date( "t", $fechainicial );
				$mes = date( "m", $fechainicial );
				array_push($fechasArray, date("d-m-Y", strtotime($fechainicial2)));
				if ($mes==12){
					$fechainicial2=date("d-m-Y",strtotime($fechainicial2."+ 1 month")); 
				}else{
					$fechainicial2=date("d-m-Y",strtotime($fechainicial2."+ 1 month")); 
				}
				$con++;
			}
			
			if ($funcion=="primero"){
				extraerDias($fechasArray,$ciclos,1);
			}
			if ($funcion=="segundo"){
				extraerDias($fechasArray,$ciclos,2);
			}
			if ($funcion=="tercero"){
				extraerDias($fechasArray,$ciclos,3);
			}
			if ($funcion=="cuarto"){
				extraerDias($fechasArray,$ciclos,4);
			}
			if ($funcion=="ultimo"){
				extraerUltimo($fechasArray,$ciclos);
			}
		}
	}
	
	//Por dia de la semana
	
	if ($opcion=="diadelasemana"){
		if ($funcion=="primero"){
			$dia="01";
		}
		if ($funcion=="segundo"){
			$dia="02";
		}
		if ($funcion=="tercero"){
			$dia="03";
		}
		if ($funcion=="cuarto"){
			$dia="04";
		}
		if ($funcion=="ultimo"){
			//Funcion para meses
			$con=0;
			while($con<$numeroservicios){
				$fechainicial2=date("d-m-Y",strtotime($fechainicial2)); 
				$fechainicial=strtotime($fechainicial2);
				$diasdelmes = date( "t", $fechainicial );
				$dia = date( "d", $fechainicial );
				$dsemana = date( "w", $fechainicial );
				$mes = date( "m", $fechainicial );
				$diaseleccionados=31;
				if ($diasdelmes<$diaseleccionados){
					//echo "No entro en".date("d-m-Y",$fechainicial)."</br>";
					//echo date("$diasdelmes-m-Y", $fechainicial)."</br>";
					array_push($fechasArray,  date("$diasdelmes-m-Y", $fechainicial));
				}else{
					//echo date("$diaseleccionados-m-Y", $fechainicial)."</br>";
					array_push($fechasArray, date("$diaseleccionados-m-Y", $fechainicial));
				}
				if ($mes==01){
					//$sumadias=$ciclos*20;
					$fechainicial2=date("d-m-Y",strtotime($fechainicial2."+ 28 day")); 
				}else{
					$fechainicial2=date("d-m-Y",strtotime($fechainicial2."+ 1 month")); 
				}
				//echo $diasdelmes." $mes</br>";
				$con++;
			}
			intercalarMeses($fechasArray,$ciclos);
		}else{
		
			$fechainicial2=date("d-m-Y",strtotime($fechainicial2)); 
			$fechainicial=strtotime($fechainicial2);
			$diasdelmes = date( "t", $fechainicial );
			$mes = date( "m", $fechainicial );
			$ano= date( "Y", $fechainicial );
			$diasemana = date("w", $fechainicial );
			$fechainicial=$dia."-".$mes."-".$ano;
			$fechainicial2=date("d-m-Y",strtotime($fechainicial));
		
			$con=0;
			while ($con< ($numeroservicios*5)){
				$fechainicial2=date("d-m-Y",strtotime($fechainicial2)); 
				$fechainicial=strtotime($fechainicial2);
				$diasemana = date( "w", $fechainicial );
				$diasdelmes = date( "t", $fechainicial );
				$mes = date( "m", $fechainicial );
				echo $fechainicial2."-----</br>";
				if($diasemana!=0 and $diasemana!=1){
					array_push($fechasArray, date("d-m-Y", strtotime($fechainicial2)));
				}
				if ($mes==12){
					$fechainicial2=date("d-m-Y",strtotime($fechainicial2."+ 1 month")); 
				}else{
					$fechainicial2=date("d-m-Y",strtotime($fechainicial2."+ 1 month")); 
				}
				$con++;
			}
			
			if ($funcion=="primero"){
				extraerDias($fechasArray,$ciclos,1);
			}
			if ($funcion=="segundo"){
				extraerDias($fechasArray,$ciclos,2);
			}
			if ($funcion=="tercero"){
				extraerDias($fechasArray,$ciclos,3);
			}
			if ($funcion=="cuarto"){
				extraerDias($fechasArray,$ciclos,4);
			}
			if ($funcion=="ultimo"){
				extraerUltimo($fechasArray,$ciclos);
			}
		}
	}
	
}

/*if((strcmp(date('D',$fecha1),'Sun')!=0) || (strcmp(date('D',$fecha1),'Sat')!=0)){
  echo date('Y-m-d D',$fecha1) . '<br />'; 
}*/


function cambiarMesSiguiente($mes){
	if($mes==12){
		$messiguiente="01";
	}else{
		$messiguiente=$mes+1;
	}
	return $messiguiente;
}

function intercalarMeses($array, $ciclos){
	//setlocale(LC_TIME, 'es_ES.UTF-8');
	$cantidadservicios=$_POST["cantidadservicios"]*$ciclos;
	for($i=0;$i<count($array);$i=$i+$ciclos){
		if($i<$cantidadservicios){
		//$fecha=	date("%A, %d %B %Y", strtotime($array[$i])); 
		echo $array[$i]."</br>";
		//echo $fecha."</br>";
		}
	}
}



function extraerUltimo($array, $ciclos){
	$mesactivo="";
	$array=array_reverse($array);
	$nuevoArray=array();
	for($i=0;$i<count($array);$i++){
		$fecha=strtotime($array[$i]);
		$mes = date( "m",$fecha);
		if ($mesactivo!=$mes){
			//echo $mes.'<br>';
			$mesactivo=$mes;
			array_push($nuevoArray, date("d-m-Y", $fecha));
		}
	}
	$nuevoArray=array_reverse($nuevoArray);
	intercalarMeses($nuevoArray,$ciclos);
}

function extraerDias($array, $ciclos,$dias=1){
	$mesactivo="";
	$nuevoArray=array();
	$vueltas=1;
	
	for($i=0;$i<count($array);$i++){
		
		$fecha=strtotime($array[$i]);
		$mes = date( "m",$fecha);
		if ($mesactivo!=$mes){
			if($vueltas==$dias){
				$mesactivo=$mes;
				array_push($nuevoArray, date("d-m-Y", $fecha));
			}else{
				$vueltas=$vueltas+1;
			}
			
			//echo $mes.'<br>';
			
		}else{
			$vueltas=1;
		}
	}
	intercalarMeses($nuevoArray,$ciclos);
}
?>