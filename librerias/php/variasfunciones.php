<?php 
//Funcion que genera una clave aleatoria
	function generarClave($numero,$prefijo="",$sufijo=""){
		if ($sufijo==""){
			$sufijo=date("jwynGis");
		}
		$rand="";
		$caracter= "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
		srand((double)microtime()*1000000);
		for($i=0; $i<$numero; $i++) {
			$rand.= $caracter[rand()%strlen($caracter)];
		}
		return $prefijo.$rand.$sufijo;
	}
	
	function numeroMes($mes){
		if($mes==1){
			$MES="ENERO";
		}
		if($mes==2){
			$MES="FEBRERO";
		}
		if($mes==3){
			$MES="MARZO";
		}
		if($mes==4){
			$MES="ABRIL";
		}
		if($mes==5){
			$MES="MAYO";
		}
		if($mes==6){
			$MES="JUNIO";
		}
		if($mes==7){
			$MES="JULIO";
		}
		if($mes==8){
			$MES="AGOSTO";
		}
		if($mes==9){
			$MES="SEPTIEMBRE";
		}
		if($mes==10){
			$MES="OCTUBRE";
		}
		if($mes==11){
			$MES="NOVIEMBRE";
		}
		if($mes==12){
			$MES="DICIEMBRE";
		}
		return $MES;
}

//Funcion para calcular días trancurridos entre dos fechas
function dias_transcurridos($fechaInicial,$fechaFinal){
	$dias=(strtotime($fechaInicial)-strtotime($fechaFinal))/86400;
	$dias=abs($dias); 
	$dias=floor($dias);
	return $dias;
}
//Funcion de paginación
function paginar($pg, $cantidadamostrar, $filasTotales, $campoOrden, $orden, $busqueda, $tipoVista){
	$separaciones = ceil($filasTotales/$cantidadamostrar);
	if ($filasTotales>$cantidadamostrar) { ?>
	<div class="box-footer clearfix">
		<ul class="pagination pagination-sm no-margin pull-right">
			<?php 
					$paginasVisibles=2;
					$paginasTemp=0;
					$paginaInicio=$pg-$paginasVisibles;
					
					if ($paginaInicio<0){
						$paginaInicio=0;
						$paginasTemp=$paginasVisibles - $pg;
						
					}else{
						$paginasTemp=0;
					}
					
					$paginaFin=$pg+$paginasVisibles;
					if(($pg+$paginasTemp)<=$paginasVisibles){
						$paginaFin=$paginaFin+$paginasTemp;
					}
					if($paginaFin>=$separaciones){
						$paginaFin=$separaciones;
					}
					if(($pg)==($separaciones-1)){
						if($pg>$paginasVisibles){
							$paginaInicio=$paginaInicio-$paginasTemp-1;
						}
					}
			
	
			
		   // Página anterior.
			if ($paginaInicio > 0) { ?>
					<li <?php if ($paginaInicio == $pg) { ?> class="lista_numero_marcado" <?php } ?> >
					<a onclick="load_tablas('<?php echo $campoOrden; ?>','<?php echo $orden; ?>',<?php echo $cantidadamostrar; ?>,<?php echo $pg-1; ?>,'<?php echo $busqueda; ?>','<?php echo $tipoVista; ?>')"><</a>
					</li>
			<?php } ?>
					
			<?php while($paginaInicio<$paginaFin) { ?>  
				
					<li <?php if ($paginaInicio == $pg) { ?> class="lista_numero_marcado" <?php } ?> >
					<a onclick="load_tablas('<?php echo $campoOrden; ?>','<?php echo $orden; ?>',<?php echo $cantidadamostrar; ?>,<?php echo $paginaInicio; ?>,'<?php echo $busqueda; ?>','<?php echo $tipoVista; ?>')">
					<?php echo $paginaInicio+1; ?>
					</a></li>
			<?php 
					$paginaInicio++;
				} // cierra el for 
			
			
			// Siguiente página
			if ($paginaInicio < $separaciones) {?>
					<li <?php if ($paginaInicio == $pg) { ?> class="lista_numero_marcado" <?php } ?> >
						<a onclick="load_tablas('<?php echo $campoOrden; ?>','<?php echo $orden; ?>',<?php echo $cantidadamostrar; ?>,<?php echo $pg+1; ?>,'<?php echo $busqueda; ?>','<?php echo $tipoVista; ?>')">></a>
					</li>
			<?php } ?>
			
		</ul>
        <span class="h6">&nbsp;&nbsp;P&aacute;gina <?php echo $pg+1; ?> de <?php echo $separaciones; ?></span>
	   </div>
	<?php } // cierra el if inicial 
}// Fin de la funcion paginar


?>



                  
                    