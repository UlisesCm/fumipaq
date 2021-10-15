<?php
include("../../../componentes/herramientasup.php");
if ($herramientas=="nuevo"){
	include("../../../componentes/herramientasnuevo.php");
}
if ($herramientas=="consultar"){
	include("../../../componentes/herramientasconsultar.php"); ?>
		<?php /////PERMISOS////////////////
        if (isset($_SESSION['permisos']['recomendaciones']['eliminar'])){
		?>
		<li class="btn-default border-right botonEliminar" title="Eliminar varios registros"><a href="#"><i class="fa fa-trash-o"></i><span class="visible-xs-inline">&nbsp;&nbsp;Eliminar</span></a></li>
    	<?php
		}
		?>
		<li class="dropdown btn-defaul border-right" style="background:#F4F4F4;" title="Visualización y ordenamiento">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="fa fa-eye"></i><span class="visible-xs-inline">&nbsp;&nbsp;Visualización y ordenamiento</span></a>
          <ul class="dropdown-menu dropdown-menu-form" style="min-width:250px;;">
            <li><span class="titulo-herramientas">Resultados por hoja:</span></li>
            <li><a>
            	<select id="cantidadamostrar" class="form-control input-sm">
                	<option value="1">1</option>
                	<option value="2">2</option>
                    <option value="5">5</option>
                    <option value="20">20</option>
                	<option value="30">30</option>
                	<option value="50">50</option>
                	<option value="100">100</option>
                    <option value="200">200</option>
                </select>
                </a></li>
            <li role="separator" class="divider"></li>
            <li><span class="titulo-herramientas">Ordenar por:</span></li>
            <li><a>
            	<select id="campoOrden" class="form-control input-sm">
                </select>
                </a>
    		</li>
            <li><a><input id="asc" type="radio" name="orden" value="asc" checked="checked"><label for="asc">&nbsp;&nbsp;Ascendente</label></a></li>
            <li><a><input id="desc" type="radio" name="orden" value="desc"><label for="desc">&nbsp;&nbsp;Descendente</label></a></li>
            <li role="separator" class="divider"></li>
            <li><span class="titulo-herramientas">Mostrar / Ocultar campos</span></li>
				<div style="padding:10px; color:#666; max-height:200px !important; overflow:scroll;">
				<li><a><input id="CheckIdcliente" name="kidcliente" value="si" checked="checked" type="checkbox"/><label for="CheckIdcliente">&nbsp;&nbsp;Idcliente</label></a></li>
			
				<li><a><input id="CheckIddomicilio" name="kiddomicilio" value="si" checked="checked" type="checkbox"/><label for="CheckIddomicilio">&nbsp;&nbsp;Iddomicilio</label></a></li>
			
				<li><a><input id="CheckArea" name="karea" value="si" checked="checked" type="checkbox"/><label for="CheckArea">&nbsp;&nbsp;Area</label></a></li>
			
				<li><a><input id="CheckPlaga" name="kplaga" value="si" checked="checked" type="checkbox"/><label for="CheckPlaga">&nbsp;&nbsp;Plaga</label></a></li>
			
				<li><a><input id="CheckRecomendacion" name="krecomendacion" value="si" checked="checked" type="checkbox"/><label for="CheckRecomendacion">&nbsp;&nbsp;Recomendacion</label></a></li>
			
				<li><a><input id="CheckFotorecomendacion" name="kfotorecomendacion" value="si" checked="checked" type="checkbox"/><label for="CheckFotorecomendacion">&nbsp;&nbsp;Fotorecomendacion</label></a></li>
			
				<li><a><input id="CheckFechadeejecucionestablecida" name="kfechadeejecucionestablecida" value="si" checked="checked" type="checkbox"/><label for="CheckFechadeejecucionestablecida">&nbsp;&nbsp;Fechadeejecucionestablecida</label></a></li>
			
				<li><a><input id="CheckResponsable" name="kresponsable" value="si" checked="checked" type="checkbox"/><label for="CheckResponsable">&nbsp;&nbsp;Responsable</label></a></li>
			
				<li><a><input id="CheckIdtecnico" name="kidtecnico" value="si" checked="checked" type="checkbox"/><label for="CheckIdtecnico">&nbsp;&nbsp;Idtecnico</label></a></li>
			
				<li><a><input id="CheckIdcaptura" name="kidcaptura" value="si" checked="checked" type="checkbox"/><label for="CheckIdcaptura">&nbsp;&nbsp;Idcaptura</label></a></li>
			
				<li><a><input id="CheckEstado" name="kestado" value="si" checked="checked" type="checkbox"/><label for="CheckEstado">&nbsp;&nbsp;Estado</label></a></li>
			
				<li><a><input id="CheckFechaalta" name="kfechaalta" value="si" checked="checked" type="checkbox"/><label for="CheckFechaalta">&nbsp;&nbsp;Fechaalta</label></a></li>
			
				<li><a><input id="CheckEvidencia" name="kevidencia" value="si" checked="checked" type="checkbox"/><label for="CheckEvidencia">&nbsp;&nbsp;Evidencia</label></a></li>
			
				<li><a><input id="CheckFotoevidencia" name="kfotoevidencia" value="si" checked="checked" type="checkbox"/><label for="CheckFotoevidencia">&nbsp;&nbsp;Fotoevidencia</label></a></li>
			
				<li><a><input id="CheckFechaejecucion" name="kfechaejecucion" value="si" checked="checked" type="checkbox"/><label for="CheckFechaejecucion">&nbsp;&nbsp;Fechaejecucion</label></a></li>
			
            	<li><a><input id="CheckComposicion" name="kcomposicion" value="si" type="checkbox" checked="checked"/><label for="CheckComposicion">&nbsp;&nbsp;Datos inferiores</label></a></li>
          	</div>
		  
		  </ul>
        </li>
<?php    
}
include("../../../componentes/herramientasdown.php");
?>