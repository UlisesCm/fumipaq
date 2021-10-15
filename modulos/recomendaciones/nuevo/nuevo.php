<?php
include ("../../seguridad/comprobar_login.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include ("../../../componentes/cabecera.php")?><link href="../../../librerias/js/Spry/SpryValidationTextField.css" rel="stylesheet" type="text/css" /><link href="../../../librerias/js/Spry/SpryValidationTextarea.css" rel="stylesheet" type="text/css" /><link rel="stylesheet" type="text/css" media="screen" href="../../../dist/css/autocompletar/jqueryui.css" />
<script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../../../plugins/fastclick/fastclick.min.js"></script>
<script src="../../../dist/js/app.min.js" type="text/javascript"></script>
<link href="../../../plugins/alerfy/alertify.min.css" rel="stylesheet"/>
<script src="../../../plugins/alerfy/alertify.min.js"></script>

<script src="js.js"></script><script src="../../../librerias/js/jquery-ui.js"></script><script src="../../../librerias/js/cookies.js"></script><script src="../../../librerias/js/validaciones.js"></script><script src="../../../librerias/js/Spry/SpryValidationTextField.js" type="text/javascript"></script><script src="../../../librerias/js/Spry/SpryValidationTextarea.js" type="text/javascript"></script>
</head>
  <body class="sidebar-mini <?php include("../../../componentes/skin.php");?>">
    <!-- Wrapper es el contenedor principal -->
    <div class="wrapper">

      <?php include("../../../componentes/menuSuperior.php");?>
      <?php include("../../../componentes/menuLateral.php");?>

      <!-- Contenido-->
      <div class="content-wrapper">
        <!-- Contenido de la cabecera -->
        <section class="content-header">
          <h1>Recomendacion<small>Nuevo registro</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="../../inicio/inicio/inicio.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Nuevo recomendacion</a></li>
          </ol>
        </section>

		<!-- Contenido principal -->
        <section class="content">

		<?php
    /////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['recomendaciones']['guardar']) or  !isset($_SESSION['permisos']['recomendaciones']['acceso'])){
			echo $_SESSION['msgsinacceso'];
			echo "
		</section><!-- /.content -->
       </div><!-- /.content-wrapper -->";
       include("../../../componentes/pie.php");
	   echo "
	</div><!-- ./wrapper -->
</body>
</html>";
			include ("../../../componentes/avisos.php");
			exit;
		}
	/////FIN  DE PERMISOS////////
    		?>

			<?php $herramientas="nuevo"; include("../componentes/herramientas.php"); ?>
			<?php include("../../../componentes/avisos.php");?>

          	<!-- Horizontal Form -->
            <div class="box box-info" style="border-color:#1eff00">
              <div class="box-header with-border">
                <h3 class="box-title">Formulario de registro</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
			  <form class="form-horizontal" name="formulario" id="formulario" method="post" enctype="multipart/form-data">
                <div class="box-body">

                  <div class="form-group ">
                              <label for="cidcliente" class="col-sm-2 control-label">Cliente:</label>

                              <div class="col-sm-5">
                                <input value="" name="idcliente" type="hidden" class="normal" id="cidcliente" style="width:50px;"/>
                                <input value="" name="consultaidcliente" type="hidden" class="normal" id="consultaidcliente" style="width:100px;"/>
                              	<span id="Vidcliente">
                                  <input value="" name="autoidcliente" type="text" class="form-control" id="autoidcliente" />
          					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
          						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
          					</span>
                              </div>  <span data-placement="bottom" data-toggle="tooltip" data-html="true" title="" data-original-title="
                            <b>Nombre del cliente en donde se debe ejecutar la recomendación.</b>"><i class="fa fa-question-circle text-blue ayuda"></i></span>

                          </div>

                          <div class="form-group ">
                                      <label for="ciddomicilio" class="col-sm-2 control-label">Domicilio:</label>
                                      <div class="col-sm-5">
                                      	<span id="Viddomicilio">
                                         <select id="iddomicilio_ajax" name="iddomicilio" class="form-control"></select>

                  					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
                  						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
                  					</span>
                                      </div>  <span data-placement="bottom" data-toggle="tooltip" data-html="true" title="" data-original-title="
                                    <b>Domicilio del cliente en donde se debe ejecutar la recomendación.</b>"><i class="fa fa-question-circle text-blue ayuda"></i></span>
                                  </div>


				<div class="form-group ">
                    <label for="carea" class="col-sm-2 control-label">Area:</label>
                    <div class="col-sm-5">
                    	<span id="Varea">
                        <input value="" name="area" type="text" class="form-control" id="carea" />

					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                    <span data-placement="bottom" data-toggle="tooltip" data-html="true" title="" data-original-title="
                <b>Area del domicilio en donde se debe ejecutar la recomendación.</b>"><i class="fa fa-question-circle text-blue ayuda"></i></span>
                </div>

				<div class="form-group ">
                  	<label for="cplaga" class="col-sm-2 control-label">Plaga:</label>
                    <div class="col-sm-5">
                                    <select id="cplaga" name="plaga" class="form-control">
                                      </select>
                    </div>
                    <span data-placement="bottom" data-toggle="tooltip" data-html="true" title="" data-original-title="
                <b>Plaga a tratar.</b>"><i class="fa fa-question-circle text-blue ayuda"></i></span>
                </div>


				<div class="form-group ">
                    <label for="crecomendacion" class="col-sm-2 control-label">Recomendacion:</label>
                    <div class="col-sm-5">
                    	<span id="Vrecomendacion">
                        <textarea name="recomendacion" id="crecomendacion" class="form-control"></textarea>

					<span class="textareaMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textareaRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>   <span data-placement="bottom" data-toggle="tooltip" data-html="true" title="" data-original-title="
            			<b>Breve descripción de la recomendación a realizar.</b>"><i class="fa fa-question-circle text-blue ayuda"></i></span>

                </div>

				<div class="form-group ">
                	<label for="x" class="col-sm-2 control-label">Evidencia:</label>
                    <div class="col-sm-5">
                    	<div class="input-group">
                            <input type="file" name="fotorecomendacion" style="display:none;" id="cfotorecomendacion" accept=".jpg" onChange="fileinput('fotorecomendacion')"/>
                            <input type="text" name="nfotorecomendacion" id="nfotorecomendacion" class="form-control" placeholder="Seleccionar Imagen" disabled="disabled">
                            <span class="input-group-btn">
                                <a class="btn btn-success" onclick="$('#cfotorecomendacion').click();">&nbsp;&nbsp;&nbsp;Seleccionar Imagen</a>
                            </span>
                    	</div>
                    </div>
                    <span data-placement="bottom" data-toggle="tooltip" data-html="true" title="" data-original-title="
          			<b>Imagen de evidencia donde se debe implementar la recomendación</b>"><i class="fa fa-question-circle text-blue ayuda"></i></span>
                </div>


				<div class="form-group ">
                    <label for="cfechadeejecucionestablecida" class="col-sm-2 control-label">Fecha:</label>
                    <div class="col-sm-2">

                        <input value="<?php echo date('Y-m-d'); ?>" name="fechadeejecucionestablecida" type="date" required class="form-control" id="cfechadeejecucionestablecida" />

                    </div>
                    <span data-placement="bottom" data-toggle="tooltip" data-html="true" title="" data-original-title="
                <b>Fecha limite a ejecutar la recomendación</b>"><i class="fa fa-question-circle text-blue ayuda"></i></span>
                </div>

				<div class="form-group ">
                    <label for="x" class="col-sm-2 control-label">Responsable:</label>
                    <div class="col-lg-10">
										 <label class="radio inline control-label">
										 	<input id="cresponsable-0" type="radio" name="responsable" value="Técnico" checked>
 										 	Tecnico
                        				 </label>
										 <label class="radio inline control-label">
										 	<input id="cresponsable-1" type="radio" name="responsable" value="Externo">
 										 	Externo
                        				 </label>&nbsp;&nbsp;&nbsp;
                                 <span data-placement="bottom" data-toggle="tooltip" data-html="true" title="" data-original-title="
                             <b>Encargado de ejecutar la recomendación.</b>"><i class="fa fa-question-circle text-blue ayuda"></i></span>
					</div>

				</div>

				<div class="form-group ">
                    <label for="cidtecnico" class="col-sm-2 control-label">Técnico:</label>
                    <div class="col-sm-5">
					<!-- <input value="" name="idtecnico" type="text" class="form-control" id="autoidtecnico" />
          <input value="" name="idtecnico" type="" class="normal" id="cidtecnico" style="width:50px;"/>
          <input value="" name="consultaidtecnico" type="" class="normal" id="consultaidtecnico" style="width:100px;"/> -->
          <input value="" name="idtecnico" type="hidden" class="normal" id="cidtecnico" style="width:50px;"/>
          <input value="" name="consultaidtecnico" type="hidden" class="normal" id="consultaidtecnico" style="width:100px;"/>
          <span id="Vidtecnico">

            <input value="" name="autoidtecnico" type="text" class="form-control" id="autoidtecnico" />
                    </div>  <span data-placement="bottom" data-toggle="tooltip" data-html="true" title="" data-original-title="
            			<b>Nombre del técnico que realizo la recomendación.</b>"><i class="fa fa-question-circle text-blue ayuda"></i></span>
                </div>


				<div class="form-group hide">
                    <label for="cidcaptura" class="col-sm-2 control-label">Idcaptura:</label>
                    <div class="col-sm-5">
                        <input value="<?php if (isset($_POST['idcaptura'])){ echo $_POST['idcaptura'];}else{if (isset($_GET['idcaptura'])){echo $_GET['idcaptura'];}else{ echo "0";}}?>" name="idcaptura" type="text" class="form-control" id="cidcaptura" />


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

				<div class="form-group hide">
                    <label for="cfechaalta" class="col-sm-2 control-label">Fechaalta:</label>
                    <div class="col-sm-2">

                        <input value="<?php echo date('Y-m-d'); ?>" name="fechaalta" type="date" required class="form-control" id="cfechaalta" />


                    </div>
                </div>


				<div class="form-group hide">
                    <label for="cevidencia" class="col-sm-2 control-label">Evidencia:</label>
                    <div class="col-sm-5">
                        <textarea name="evidencia" id="cevidencia" class="form-control"></textarea>
                    </div>

                </div>

				<div class="form-group hide">
                	<label for="x" class="col-sm-2 control-label">Fotoevidencia:</label>
                    <div class="col-sm-5">
                    	<div class="input-group">
                            <input type="file" name="fotoevidencia" style="display:none;" id="cfotoevidencia" accept=".jpg" onChange="fileinput('fotoevidencia')"/>
                            <input type="text" name="nfotoevidencia" id="nfotoevidencia" class="form-control" placeholder="Seleccionar Imagen" disabled="disabled">
                            <span class="input-group-btn">
                                <a class="btn btn-success" onclick="$('#cfotoevidencia').click();">&nbsp;&nbsp;&nbsp;Seleccionar Imagen</a>
                            </span>
                    	</div>
                    </div>
                </div>


				<div class="form-group hide">
                    <label for="cfechaejecucion" class="col-sm-2 control-label">Fechaejecucion:</label>
                    <div class="col-sm-2" >

                        <input value="1994-01-01" name="fechaejecucion" type="date" required class="form-control" id="cfechaejecucion" />


                    </div>
                </div>


				<div class="form-group hide">
                    <label for="cestatus" class="col-sm-2 control-label">Estatus:</label>
                    <div class="col-sm-5">

                        <input value="activo" name="estatus" type="hidden" class="form-control" id="cestatus" />


                    </div>
                </div>

			</div><!-- /.box-body -->

                <div class="box-footer">
                  <button type="button" class="btn btn-default" id="botonCancelar" onclick="vaciarCampos();">Limpiar</button>
                  <button type="button" class="btn btn-primary pull-right" id="botonGuardar"><i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                </div><!-- /.box-footer -->
              </form>
              <div id="loading" class="overlay" style="display:none">
  					<i class="fa fa-cog fa-spin" style="color:#1eff00"></i>
			  </div>

            </div><!-- /.box -->

            <div id="salida"></div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

	  <?php include("../../../componentes/pie.php");?>
    </div><!-- ./wrapper -->
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("Vidcliente", "none", {validateOn:["blur"],  minChars:1});
				var sprytextfield2 = new Spry.Widget.ValidationTextField("Viddomicilio", "none", {validateOn:["blur"],  minChars:1});
				var sprytextfield3 = new Spry.Widget.ValidationTextField("Varea", "none", {validateOn:["blur"],  minChars:1});
				var sprytextarea4 = new Spry.Widget.ValidationTextarea("Vrecomendacion",  { minChars:1});

</script>

</body>
</html>
