<?php
include ("../../seguridad/comprobar_login.php");
include ("../../../librerias/php/variasfunciones.php");
include ("recuperarValores.php");
?>
<!DOCTYPE html>
<html>
  <head>
	<?php include ("../../../componentes/cabecera.php")?><link href="../../../librerias/js/Spry/SpryValidationTextField.css" rel="stylesheet" type="text/css" /><link href="../../../librerias/js/Spry/SpryValidationTextarea.css" rel="stylesheet" type="text/css" /><link rel="stylesheet" type="text/css" media="screen" href="../../../dist/css/autocompletar/jqueryui.css" /><link href="../../../librerias/js/Spry/SpryValidationTextField.css" rel="stylesheet" type="text/css" /><link href="../../../librerias/js/Spry/SpryValidationTextarea.css" rel="stylesheet" type="text/css" /><link rel="stylesheet" type="text/css" media="screen" href="../../../dist/css/autocompletar/jqueryui.css" />
<script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../../../plugins/fastclick/fastclick.min.js"></script>
<script src="../../../dist/js/app.min.js" type="text/javascript"></script>
<script src="js.js"></script><script src="../../../librerias/js/jquery-ui.js"></script><script src="../../../librerias/js/cookies.js"></script>

<script><?php echo "var responsableSeleccionado='$responsable';";?></script>

<script src="../../../librerias/js/validaciones.js"></script><script src="../../../librerias/js/Spry/SpryValidationTextField.js" type="text/javascript"></script><script src="../../../librerias/js/Spry/SpryValidationTextarea.js" type="text/javascript"></script>
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
          <h1>Recomendacion<small>Modificar registro</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="../../inicio/inicio/inicio.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Modificar recomendacion</a></li>
          </ol>
        </section>

		<!-- Contenido principal -->
        <section class="content">

		<?php
    /////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['recomendaciones']['modificar']) or  !isset($_SESSION['permisos']['recomendaciones']['acceso'])){
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
			  <form class="form-horizontal" name="formulario" id="formulario" method="post" enctype="multipart/form-data" >
                <div class="box-body">
				<div class="form-group hidden">
                    <label for="cidcliente" class="col-sm-2 control-label">Idcliente:</label>
                    <div class="col-sm-5">
                    	<span id="Vidcliente">
                        <input value="<?php echo $idcliente; ?>" name="idcliente" type="text" class="form-control" id="cidcliente" />

					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>

				<div class="form-group hidden">
                    <label for="ciddomicilio" class="col-sm-2 control-label">Iddomicilio:</label>
                    <div class="col-sm-5">
                    	<span id="Viddomicilio">
                        <input value="<?php echo $iddomicilio; ?>" name="iddomicilio" type="text" class="form-control" id="ciddomicilio" />

					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>

				<div class="form-group ">
                    <label for="carea" class="col-sm-2 control-label">Area:</label>
                    <div class="col-sm-5">
                    	<span id="Varea">
                        <input value="<?php echo $area; ?>" name="area" type="text" class="form-control" id="carea" />

					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>

				<div class="form-group ">
                  	<label for="cplaga" class="col-sm-2 control-label">Plaga:</label>
                    <div class="col-sm-5">
                      <select id="cplaga" name="plaga" class="form-control">
                        </select>
                    </div>
                </div>
				<div class="form-group ">
                    <label for="crecomendacion" class="col-sm-2 control-label">Recomendacion:</label>
                    <div class="col-sm-5">
                    	<span id="Vrecomendacion">
                        <textarea name="recomendacion" id="crecomendacion" class="form-control"><?php echo $recomendacion; ?></textarea>

					<span class="textareaMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textareaRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>

				<div class="form-group ">
                	<label for="x" class="col-sm-2 control-label">Fotorecomendacion:</label>
                    <div class="col-sm-5">
                    	<div class="input-group">
                            <input type="file" name="fotorecomendacionI" style="display:none;" id="cfotorecomendacionI" accept=".jpg" onChange="fileinput('fotorecomendacion')"/>
                            <input value="<?php echo $fotorecomendacion; ?>" type="text" name="fotorecomendacion" id="cfotorecomendacion" class="form-control" placeholder="Seleccionar Imagen" readonly >
                            <input value="<?php echo $fotorecomendacion; ?>" type="hidden" name="fotorecomendacionEliminacion" id="cfotorecomendacionEliminacion" >
							<span class="input-group-btn">
                                <a class="btn btn-success" onclick="$('#cfotorecomendacionI').click();">&nbsp;&nbsp;&nbsp;Seleccionar Imagen</a>
                            </span>
                    	</div>
                    </div>
                </div>

				<div class="form-group ">
                    <label for="cfechadeejecucionestablecida" class="col-sm-2 control-label">Fechadeejecucionestablecida:</label>
                    <div class="col-sm-2">

                        <input value="<?php echo $fechadeejecucionestablecida; ?>" name="fechadeejecucionestablecida" type="date" required="required" class="form-control" id="cfechadeejecucionestablecida" />


                    </div>
                </div>

				<div class="form-group ">
                    <label for="x" class="col-sm-2 control-label">Responsable:</label>
                    <div class="col-lg-10">
										<label class="radio inline control-label">
										 	<input id="cresponsable-0" type="radio" name="responsable" value="Técnico" <?php
											if ($responsable=="Técnico"){
												echo 'checked="checked"';
											} ?> >
											Tecnico
                        				 </label>
										<label class="radio inline control-label">
										 	<input id="cresponsable-1" type="radio" name="responsable" value="Externo" <?php
											if ($responsable=="Externo"){
												echo 'checked="checked"';
											} ?> >
											Externo
                        				 </label>
					</div>
				</div>
				<div class="form-group hidden">
                    <label for="cidtecnico" class="col-sm-2 control-label">Idtecnico:</label>
                    <div class="col-sm-5">


					<input value="<?php echo $idtecnico; ?>" name="idtecnico" type="text" class="form-control" id="autoidtecnico" />


                    </div>
                </div>

				<div class="form-group ">
                    <label for="cidcaptura" class="col-sm-2 control-label">Folio de captura:</label>
                    <div class="col-sm-5">

                        <input value="<?php echo $idcaptura; ?>" name="idcaptura" type="text" class="form-control" id="cidcaptura" />


                    </div>
                </div>

				<div class="form-group ">
                  	<label for="cestado" class="col-sm-2 control-label">Estado:</label>
                    <div class="col-sm-5">
                    	<select id="cestado" name="estado" class="form-control">
										<option value="PENDIENTE" <?php
											if ($estado=="PENDIENTE"){
												echo 'selected="selected"';
											}
											 ?>>PENDIENTE</option>

										<option value="EJECUTADO" <?php
											if ($estado=="EJECUTADO"){
												echo 'selected="selected"';
											}
											 ?>>EJECUTADO</option>

						</select>
                    </div>
                </div>
				<div class="form-group ">
                    <label for="cfechaalta" class="col-sm-2 control-label">Fechaalta:</label>
                    <div class="col-sm-2">

                        <input value="<?php echo $fechaalta; ?>" name="fechaalta" type="date" required="required" class="form-control" id="cfechaalta" />


                    </div>
                </div>

				<div class="form-group ">
                    <label for="cevidencia" class="col-sm-2 control-label">Evidencia:</label>
                    <div class="col-sm-5">

                        <textarea name="evidencia" id="cevidencia" class="form-control"><?php echo $evidencia; ?></textarea>


                    </div>
                </div>

				<div class="form-group ">
                	<label for="x" class="col-sm-2 control-label">Fotoevidencia:</label>
                    <div class="col-sm-5">
                    	<div class="input-group">
                            <input type="file" name="fotoevidenciaI" style="display:none;" id="cfotoevidenciaI" accept=".jpg" onChange="fileinput('fotoevidencia')"/>
                            <input value="<?php echo $fotoevidencia; ?>" type="text" name="fotoevidencia" id="cfotoevidencia" class="form-control" placeholder="Seleccionar Imagen" readonly >
                            <input value="<?php echo $fotoevidencia; ?>" type="hidden" name="fotoevidenciaEliminacion" id="cfotoevidenciaEliminacion" >
							<span class="input-group-btn">
                                <a class="btn btn-success" onclick="$('#cfotoevidenciaI').click();">&nbsp;&nbsp;&nbsp;Seleccionar Imagen</a>
                            </span>
                    	</div>
                    </div>
                </div>

				<div class="form-group ">
                    <label for="cfechaejecucion" class="col-sm-2 control-label">Fechaejecucion:</label>
                    <div class="col-sm-2">

                        <input value="<?php echo $fechaejecucion; ?>" name="fechaejecucion" type="date" required="required" class="form-control" id="cfechaejecucion" />


                    </div>
                </div>

				<div class="form-group hide">
                    <label for="cestatus" class="col-sm-2 control-label">Estatus:</label>
                    <div class="col-sm-5">

                        <input value="<?php echo $estatus; ?>" name="estatus" type="hidden" class="form-control" id="cestatus" />


                    </div>
                </div>

			</div><!-- /.box-body -->

                <div class="box-footer">
				  <input name="idrecomendacion" type="hidden" id="cidrecomendacion" value="<?php echo $id;?>"/>
                  <button type="button" class="btn btn-default" id="botonCancelar" onclick="vaciarCampos();">Limpiar</button>
                  <button type="button" class="btn btn-primary pull-right" id="botonGuardar"><i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                </div><!-- /.box-footer -->
              </form>
              <div id="loading" class="overlay" style="display:none">
  					<i class="fa fa-cog fa-spin" style="color:#1eff00"></i>
			  </div>

            </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

	  <?php include("../../../componentes/pie.php");?>
    </div><!-- ./wrapper -->
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("Vidcliente", "none", {validateOn:["blur"],  minChars:1});
				var sprytextfield2 = new Spry.Widget.ValidationTextField("Viddomicilio", "none", {validateOn:["blur"],  minChars:1});
				var sprytextfield3 = new Spry.Widget.ValidationTextField("Varea", "none", {validateOn:["blur"],  minChars:1});
				var sprytextarea4 = new Spry.Widget.ValidationTextarea("Vrecomendacion",  { minChars:1});
				var sprytextfield1 = new Spry.Widget.ValidationTextField("Vidcliente", "none", {validateOn:["blur"],  minChars:1});
				var sprytextfield2 = new Spry.Widget.ValidationTextField("Viddomicilio", "none", {validateOn:["blur"],  minChars:1});
				var sprytextfield3 = new Spry.Widget.ValidationTextField("Varea", "none", {validateOn:["blur"],  minChars:1});
				var sprytextarea4 = new Spry.Widget.ValidationTextarea("Vrecomendacion",  { minChars:1});

</script>
</body>
</html>
