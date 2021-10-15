<?php
include ("../../seguridad/comprobar_login.php");
/////PERMISOS////////////////
if (!isset($_SESSION['permisos']['recomendaciones']['acceso'])){
	echo $_SESSION['msgsinacceso'];
	exit;
}
/////FIN  DE PERMISOS////////
include ("../../../librerias/php/variasfunciones.php");
require('../Recomendacion.class.php');

if (isset($_REQUEST['tipoVista']) && $_REQUEST['tipoVista'] !="") {
	if($_REQUEST['tipoVista']!="undefined"){
		$tipoVista = htmlentities($_REQUEST['tipoVista']);
	}else{
		$tipoVista="tabla";
	}
}else{
	$tipoVista="tabla";
}

if (isset($_REQUEST['papelera']) && $_REQUEST['papelera'] =="si") {
		$papelera=true;
}else{
	$papelera=false;
}
if (isset($_REQUEST['campoOrden']) && $_REQUEST['campoOrden'] !="") {
	if($_REQUEST['campoOrden']!="undefined"){
		$campoOrden = htmlentities($_REQUEST['campoOrden']);
	}else{
		$campoOrden="idrecomendacion";
	}
}else{
	$campoOrden="idrecomendacion";
}

if (isset($_REQUEST['orden']) && $_REQUEST['orden'] !="") {
	if($_REQUEST['orden']!="undefined"){
		$orden = htmlentities($_REQUEST['orden']);
	}else{
		$orden="DESC";
	}
}else{
	$orden="DESC";
}

if (isset($_REQUEST['cantidadamostrar']) && $_REQUEST['cantidadamostrar'] !="") {
	if($_REQUEST['cantidadamostrar']!="undefined"){
		$cantidadamostrar = htmlentities($_REQUEST['cantidadamostrar']);
	}else{
		$cantidadamostrar="20";
	}
}else{
	$cantidadamostrar="20";
}

if (isset($_REQUEST['paginacion']) && $_REQUEST['paginacion'] !="") {
$pg = htmlentities($_REQUEST['paginacion']);
}

if (isset($_REQUEST['busqueda']) && $_REQUEST['busqueda'] !="") {
$busqueda = htmlentities($_REQUEST['busqueda']);
// $busqueda=mysql_real_escape_string($busqueda);
}else{
	$busqueda ="";
}



//funciones miguel


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




if (isset($_REQUEST['estado']) && $_REQUEST['estado'] !="") {
	if($_REQUEST['estado']!="undefined"){
		$estado = htmlentities($_REQUEST['estado']);
	}else{
		$estado="";
	}
}else{
	$estado="";
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




if (isset($_REQUEST['pendiente']) && $_REQUEST['pendiente'] !="") {
	if($_REQUEST['pendiente']!="undefined"){
		$pendiente = htmlentities($_REQUEST['pendiente']);
	}else{
		$pendiente="";
	}
}else{
	$pendiente="";
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

//fin funciones miguel



//CODIGO DE PAGINACION (REQUIERE: "variasfunciones.php")
$inicial = $pg * $cantidadamostrar;
$Orecomendacion=new Recomendacion;
//funciones miguel filtro
if($busqueda == ""){
	$resultado=$Orecomendacion->mostrarA($campoOrden, $orden, $inicial, $cantidadamostrar, $busqueda, $papelera, $idcliente,$iddomicilio,$estado,$filtrarfecha,$fechainicio,$fechafin,$pendiente,$ejecutado);
	$filasTotales=$resultado[1];
	$resultado=$resultado[0];

}else{
	$resultado=$Orecomendacion->mostrar($campoOrden, $orden, $inicial, $cantidadamostrar, $busqueda, $papelera);
	$filasTotales=$resultado[1];
	$resultado=$resultado[0];
	
}
//fin funciones miguel filtro



if ($tipoVista=="tabla"){ // Si se ha elegido el tipo tabla ?>
	<div class="box-body table-responsive no-padding"> <!-- /.box-body -->
    	<table class="table table-hover table-bordered">
        	<tr>
        		<th class="checksEliminar" width="10"><input id="seleccionarTodo" type="checkbox"  onclick="seleccionarTodo();"></th>
                <th class="columnaDecorada" style="background:#1eff00;"></th>
				<th class="Cidrecomendacion" style="display: none;">ID</th>
				<th class="Cidcliente">Cliente</th>
				<th class="Ciddomicilio">Domicilio</th>
				<th class="Carea">Area</th>
				<th class="Cplaga">Plaga</th>
				<th class="Crecomendacion">Recomendacion</th>
				<th class="Curlfotorecomendacion" style="display: none;">url</th>
				<th class="Cfotorecomendacion">Foto recomendacion</th>
				<th class="Cfechadeejecucionestablecida">Fecha a ejecutar</th>
				<th class="Cresponsable">Responsable</th>
				<th class="Cidtecnico">Técnico</th>
				<th class="Cidcaptura">No. Servicio</th>
				<th class="Cestado">Estado</th>
				<th class="Cbotoncambiarestado"></th>
				<th class="Cfechaalta">Fecha alta</th>
				<th class="Cevidencia">Evidencia</th>
				<th class="Curlevidencia" style="display: none;">url evidencia</th>
				<th class="Cfotoevidencia">Foto evidencia</th>
				<th class="Cfechaejecucion">Fecha ejecutada</th>
				<th class="CMostrardetalles">Detalles</th>
				<th width="40"></th>
                <th width="40"></th>
      		</tr>
	<?php
	while ($filas=mysqli_fetch_array($resultado)) { ?>
      		<tr id="iregistro<?php echo $filas['idrecomendacion'] ?>">
        		<td class="checksEliminar" width="30" valign="middle">
					<?php /////PERMISOS////////////////
                	if (isset($_SESSION['permisos']['recomendaciones']['eliminar'])){ ?>
                		<?php if($filas['idrecomendacion']!=0){ ?>
							<input id="registroEliminar<?php echo $filas['idrecomendacion'] ?>" type="checkbox" name="registroEliminar[]"  value="<?php echo $filas['idrecomendacion'] ?>" class="checkEliminar">
                    	<?php } ?>
					<?php
					}
					?>
            	</td>
                <td class="columnaDecorada" style="background:#1eff00;"></td>
				<td class="Cidrecomendacion" style="display: none;"><?php echo $filas['idrecomendacion']; ?></td>
				<td class="Cidcliente"><?php echo $filas['nombrecliente']; ?></td>
				<td class="Ciddomicilio"><?php echo $filas['calledomicilio']; ?></td>
				<td class="Carea"><?php echo $filas['area']; ?></td>
				<td class="Cplaga"><?php echo $filas['plaga']; ?></td>
				<td class="Crecomendacion"><?php echo $filas['recomendacion']; ?></td>
				<td class="Curlfotorecomendacion" style="display: none;"><?php echo $filas['fotorecomendacion']; ?></td>
				<td class="Cfotorecomendacion">
					<?php if ($filas['fotorecomendacion']=='') { ?>
						<a class="btn btn-success btn-xs disabled" href="" data-toggle="modal" onclick="(MostrarImagenModalFotoRecomendacion())" ><span class="fa fa-eye"></span></a>
					<?php
						}else{
					 ?>	<a class="btn btn-success btn-xs" href="" data-toggle="modal" onclick="(MostrarImagenModalFotoRecomendacion())" ><span class="fa fa-eye"></span></a>
					<?php } ?>
				</td>
					<td class="Coculto" style="display: none;">hol</td>
				<?php
				$fechaNfechadeejecucionestablecida=date_create($filas['fechadeejecucionestablecida']);
				$nuevaFecha= date_format($fechaNfechadeejecucionestablecida, 'd/m/Y');
				?>
				<td class="Cfechadeejecucionestablecida"><?php echo $nuevaFecha; ?></td>
				<td class="Cresponsable"><?php echo $filas['responsable']; ?></td>
				<td class="Cidtecnico"><?php echo $filas['nombretecnico']; ?></td>
				<td class="Cidcaptura"><?php echo $filas['idcaptura']; ?></td>
				<td class="Cestado">
				<?php if ($filas['estado'] =='PENDIENTE') {?>
				<label class= "label pull-right bg-red" style="margin-left:10px;"><?php echo $filas['estado']; ?></label>
			<?php	} else {?>
	<label class= "label pull-right bg-green" style="margin-left:10px;"><?php echo $filas['estado']; ?></label>
<?php } ?>
				</td>

				<td class="Cprueba">
					<?php if ($filas['estado'] =='PENDIENTE') {?>
						<a class="btn btn-success btn-xs" title="Modificar estado" onclick="(ObtenerDatosModificarEstadoModal())"><li class="fa fa-exchange"></li></a>
					<?php	} else {?>
						<!-- <a class="btn btn-success btn-xs" title="Modificar estado" onclick="(ObtenerDatosModificarEstadoModal())"><li class="fa fa-undo"></li></a> -->
					<?php } ?>
				 </td>
				<?php
				$fechaNfechaalta=date_create($filas['fechaalta']);
				$nuevaFecha= date_format($fechaNfechaalta, 'd/m/Y');
				?>
				<td class="Cfechaalta"><?php echo $nuevaFecha; ?></td>
				<td class="Cevidencia"><?php echo $filas['evidencia']; ?></td>
				<td class="Curlevidencia" style="display: none;"><?php echo $filas['fotoevidencia']; ?></td>
				<td class="Cfotoevidencia">	<?php if ($filas['fotoevidencia']=='') { ?>

				<a class="btn btn-success btn-xs disabled" href="" data-toggle="modal" onclick="(MostrarImagenModalFotoEvidencia())" ><span class="fa fa-eye"></span></a>

					<?php
						}else{

					 ?>
					 <a class="btn btn-success btn-xs" href="" data-toggle="modal" onclick="(MostrarImagenModalFotoEvidencia())" ><span class="fa fa-eye"></span></a>


					<?php } ?></td>
				<?php
				$fechaNfechaejecucion=date_create($filas['fechaejecucion']);
				$nuevaFecha= date_format($fechaNfechaejecucion, 'd/m/Y');
				if($nuevaFecha=="01/01/1994"){?>
<td class="Cfechaejecucion">NO/EJECUTADO</td>
					<?php

				}else{?>
<td class="Cfechaejecucion"><?php echo $nuevaFecha; ?></td>
					<?php

				}
				?>

				<td class="CMostrardetalles"><a class="btn btn-success btn-xs" href="" data-toggle="modal" onclick="(MostrarInformacionDetallada())" ><span class="fa fa-clipboard"></span></a></td>
        		<td>
					<?php
					if (!$papelera){
					?>
						<?php /////PERMISOS////////////////
						if (isset($_SESSION['permisos']['recomendaciones']['eliminar'])){
						?>
							<?php if($filas['idrecomendacion']==0){ ?>
								<a class="btn btn-danger btn-xs disabled"><i class="fa fa-trash-o"></i></a>
							<?php }else{ ?>
								<a class="btn btn-danger btn-xs" title="Eliminar" onclick="(eliminarIndividual(<?php echo $filas['idrecomendacion'] ?>))"><li class="fa fa-trash"></li></a>
							<?php }?>
						<?php
						}else{ ?>
							<a class="btn btn-danger btn-xs disabled"><i class="fa fa-trash-o"></i></a>
						<?php
						}
						?>
					<?php
					}else{ ?>
							<a class="btn btn-primary btn-xs" title="Restaurar Registro" onclick="(restaurarIndividual(<?php echo $filas['idrecomendacion'] ?>))"><li class="fa fa-recycle"></li></a>
					<?php
					}
					?>
                </td>
                <td>
                	<?php
                	/////PERMISOS////////////////
                	if (isset($_SESSION['permisos']['recomendaciones']['modificar'])){
					?>
						<form action="../modificar/actualizar.php?n1=utilerias&n2=recomendaciones&n3=consultarrecomendaciones" method="post">
                			<input type="hidden" name="id" value="<?php echo $filas['idrecomendacion'] ?>"/>
                            <button type="submit" class="btn btn-success btn-xs" value="" title="Modificar"><li class="fa fa-pencil"></li></button>
                		</form>
                	<?php
					}else{ ?>
                    	<a class="btn btn-success btn-xs disabled"><i class="fa fa-pencil"></i></a>
					<?php
                    }
					?>
                </td>
      		</tr>
    <?php
	}//Fin de while si es tabla ?>
		</table>
	</div><!-- /.box-body -->




		<!-- /. Inicio modal que muestra la imagen -->
		<div class="modal fade" id="modal_modificar_estado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div id="tamanomodalestado" class="">
						<div class="modal-content">
								<div class="modal-header">

										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h2 class="modal-title"><div id="idtitulomodalmodificarestado"><div></h2>

								</div>
								<div class="modal-body">
								 <div class="modal-body">

	  <form class="form-horizontal" name="formularioestado" id="formularioestado" method="post" enctype="multipart/form-data">
			<div class="form-group row hide">
				<label for="cidrecomendacion" class="col-sm-2 col-form-label">ID </label>
				<div class="col-sm-4" id="imprimiridrecomendacion">

				</div>
			</div>


			<div class="form-group ">
									<label for="cestado" class="col-sm-2 control-label">Estado:</label>
									<div class="col-sm-5">
										<select id="cestado" name="estado" class="form-control">
						<option value="PENDIENTE">PENDIENTE</option>
						<option value="EJECUTADO">EJECUTADO</option>
					</select>
									</div>
							</div>


			<div class="form-group ">
									<label for="cevidencia" class="col-sm-2 control-label">Descripción:</label>
									<div class="col-sm-5">
											<textarea value="" name="evidencia" type="text" class="form-control" id="cevidencia" /></textarea>
									</div>
							</div>


	   <div class="form-group row">
	     <label for="cfechaejecucion" class="col-sm-2 col-form-label">Fecha: </label>
	     <div class="col-sm-4">
				 <input value="<?php echo date('Y-m-d'); ?>" name="fechaejecucion" type="date" required="required" class="form-control" id="cfechaejecucion" />
	     </div>
	   </div>


		 <div class="form-group ">
							 <label for="x" class="col-sm-2 control-label">Foto:</label>
								 <div class="col-sm-8">
									 <div class="input-group">
												 <input type="file" name="fotoevidenciaI" style="display:none;" id="cfotoevidenciaI" accept=".jpg" onChange="fileinput('fotoevidencia')"/>
												 <input value="" type="text" name="fotoevidencia" id="cfotoevidencia" class="form-control" placeholder="Seleccionar Imagen" readonly >
												 <div id="imprimiridfotoold"></div>
					 <span class="input-group-btn">
														 <a class="btn btn-success" onclick="$('#cfotoevidenciaI').click();">&nbsp;&nbsp;&nbsp;Seleccionar Imagen</a>
												 </span>
									 </div>
								 </div>
						 </div>





	 </form>


								 </div>
								</div>
								<div class="modal-footer">

									   <button type="submit" class="btn btn-primary" onclick="guardarestadovariables();">Registrar</button>
										<button id="BTN_CerrarmodalModificar" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
								</div>
							</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- /. Fin modal que muestra la imagen -->
		<!-- box -->




<?php
}
else{ // Si se ha elegido el tipo lista ?>
	<div class="box-body">
    <?php
	while ($filas=mysqli_fetch_array($resultado)) {
?>
	<div class="info-box" style="height:120px;" id="iregistro<?php echo $filas['idrecomendacion'] ?>">
    	<span class="info-box-icon bg-red" style="background-color:#1eff00 !important; height:120px; padding-top:15px;"><i class="fa fa-magic"></i></span>
    	<div class="info-box-content">
    		<span class="info-box-text Cidcliente" style="font-size:18px;">
				<span class="checksEliminar">
					<?php /////PERMISOS////////////////
					if (isset($_SESSION['permisos']['recomendaciones']['eliminar'])){ ?>
						<?php if($filas['idrecomendacion']!=0){ ?>
							<input id="registroEliminar<?php echo $filas['idrecomendacion'] ?>" type="checkbox" name="registroEliminar[]"  value="<?php echo $filas['idrecomendacion'] ?>" class="checkEliminar">
						<?php } ?>
					<?php
					}
					?>
				</span>
			<?php echo $filas['idcliente'] ?>
            </span>
    		<span class="info-box-number Ciddomicilio" style="font-weight:normal; color:#1eff00;"><?php echo $filas['iddomicilio'] ?></span>
            <span class="info-box-number Ccomposicion" style="font-weight:normal; font-size:12px;">
				<?php
				$composicion="";
				if (trim($filas['plaga'])!=""){
					$composicion=$composicion.", ".$filas['plaga'];
				}
				echo $composicion;
				?>
			</span>

            <table border="0">
             	<tr>
             		<td style=" padding-right:2px;">
						<?php
						if (!$papelera){
						?>
							<?php /////PERMISOS////////////////
							if (isset($_SESSION['permisos']['recomendaciones']['eliminar'])){ ?>
								<?php if($filas['idrecomendacion']==0){ ?>
									<a class="btn btn-default disabled"><i class="fa fa-trash-o"></i></a>
								<?php }else{ ?>
									<a class="btn btn-default" onclick="(eliminarIndividual(<?php echo $filas['idrecomendacion'] ?>))" title="Eliminar"><i class="fa fa-trash-o"></i></a>
								<?php } ?>
							<?php
							}else{ ?>
								<a class="btn btn-default disabled"><i class="fa fa-trash-o"></i></a>
							<?php
							}
							?>
						<?php
						}else{?>
								<a class="btn btn-default" onclick="(restaurarIndividual(<?php echo $filas['idrecomendacion'] ?>))" title="Restaurar Resgistro"><i class="fa fa-recycle"></i></a>
						<?php
						}
						?>
					</td>
					<td style=" padding-right:2px;">
						<?php /////PERMISOS////////////////
						if (isset($_SESSION['permisos']['recomendaciones']['modificar'])){ ?>
							<form action="../modificar/actualizar.php?n1=recomendaciones&n2=consultarrecomendaciones" method="post">
								<input type="hidden" name="id" value="<?php echo $filas['idrecomendacion'] ?>"/>
								<button type="submit" class="btn btn-default"><i class="fa fa-pencil"></i></button>
							</form>
						<?php
						}else{ ?>
							<a class="btn btn-default disabled"><i class="fa fa-pencil"></i></a>
                        <?php
                        }
						?>
                	</td>
        	 	</tr>
             </table>

    	</div><!-- /.info-box-content -->
    </div><!-- /.box -->
<?php
		} //Fin de while
}// Fin de sis es lista
?>

</div>
<?php
paginar($pg, $cantidadamostrar, $filasTotales, $campoOrden, $orden, $busqueda, $tipoVista);
//FIN DEL CODIGO DE PAGINACION
if(mysqli_num_rows($resultado)==0){
	include("../../../componentes/mensaje_no_hay_registros.php");
}
?>
