<?php 
include ("../../seguridad/comprobar_login.php");
include ("../../../librerias/php/variasfunciones.php");
include ("recuperarValores.php");
?>
<!DOCTYPE html>
<html>
  <head>
	<?php include ("../../../componentes/cabecera.php")?><link href="../../../librerias/js/Spry/SpryValidationTextField.css" rel="stylesheet" type="text/css" /><link href="../../../librerias/js/Spry/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../../../plugins/fastclick/fastclick.min.js"></script>
<script src="../../../dist/js/app.min.js" type="text/javascript"></script>
<script src="js.js"></script><script src="../../../librerias/js/cookies.js"></script>

<script><?php echo "var idmodeloimpuestosSeleccionado='$idmodeloimpuestos';";?></script>

<script><?php echo "var idunidadSeleccionado='$idunidad';";?></script>

<script><?php echo "var idcategoriaSeleccionado='$idcategoria';";?></script>

<script><?php echo "var idactividadSeleccionada='$id';";?></script>

<script src="../../../librerias/js/validaciones.js"></script><script src="../../../librerias/js/Spry/SpryValidationTextField.js" type="text/javascript"></script>
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
          <h1>Actividad<small>Modificar registro</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="../../inicio/inicio/inicio.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Modificar actividad</a></li>
          </ol>
        </section>
		
		<!-- Contenido principal -->
        <section class="content">
		
		<?php
    /////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['actividades']['modificar']) or  !isset($_SESSION['permisos']['actividades']['acceso'])){
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
            <div class="box box-info" style="border-color:#1b15f7">
              <div class="box-header with-border">
                <h3 class="box-title">Formulario de registro</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
			  <form class="form-horizontal" name="formulario" id="formulario" method="post">
                <div class="box-body">
				<div class="form-group ">
                    <label for="cnombre" class="col-sm-2 control-label">Nombre:</label>
                    <div class="col-sm-3">
                    	<span id="Vnombre">
                        <input value="<?php echo $nombre; ?>" name="nombre" type="text" class="form-control" id="cnombre" />
            			<span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span>
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				<div class="form-group hide">
                  	<label for="selectidmodeloimpuestos_ajax" class="col-sm-2 control-label">Impuestos:</label>
                    <div class="col-sm-3">
                      <select id="idmodeloimpuestos_ajax" name="idmodeloimpuestos" type="hidden" class="form-control">
                      </select>
                    </div> 
                </div>
				<div class="form-group ">
                  	<label for="ctipoformato" class="col-sm-2 control-label">Formato de captura:</label>
                    <div class="col-sm-3">
                    	<select id="ctipoformato" name="tipoformato" class="form-control">
										<option value="FUMIGACION" <?php 
											if ($tipoformato=="FUMIGACION"){
												echo 'selected="selected"';
											}
											 ?>>FUMIGACIÓN</option>
										
										<option value="ROEDORES" <?php 
											if ($tipoformato=="ROEDORES"){
												echo 'selected="selected"';
											}
											 ?>>ROEDORES</option>
										
										<option value="INSECTOS VOLADORES" <?php 
											if ($tipoformato=="INSECTOS VOLADORES"){
												echo 'selected="selected"';
											}
											 ?>>INSECTOS VOLADORES</option>
										
										<option value="NIDOS Y AVES" <?php 
											if ($tipoformato=="NIDOS Y AVES"){
												echo 'selected="selected"';
											}
											 ?>>NIDOS Y AVES</option>
										
										<option value="AUDITORIA" <?php 
											if ($tipoformato=="AUDITORIA"){
												echo 'selected="selected"';
											}
											 ?>>AUDITORIA</option>
                                        <option value="ORDINARIO" <?php 
											if ($tipoformato=="ORDINARIO"){
												echo 'selected="selected"';
											}
											 ?>>ORDINARIO</option>
										
						</select>
                    </div> 
                </div>
				<div class="form-group ">
                  	<label for="selectidunidad_ajax" class="col-sm-2 control-label">Unidad SAT:</label>
                    <div class="col-sm-3">
                      <select id="idunidad_ajax" name="idunidad" class="form-control">
                      </select>
                    </div> 
                </div>
				<div class="form-group ">
                  	<label for="selectidcategoria_ajax" class="col-sm-2 control-label">Categoria SAT:</label>
                    <div class="col-sm-3">
                      <select id="idcategoria_ajax" name="idcategoria" class="form-control">
                      </select>
                    </div> 
                </div>
                
                <br/>
				<h4> Servicios relacionados: </h4>
                <hr/>
            
				<div style = "width:100%;">
                    <div class="row" id="servicios_ajax">
                        
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
				  <input name="idactividad" type="hidden" id="cidactividad" value="<?php echo $id;?>"/>
                  <button type="button" class="btn btn-default" id="botonCancelar" onclick="vaciarCampos();">Limpiar</button>
                  <button type="button" class="btn btn-primary pull-right" id="botonGuardar"><i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                </div><!-- /.box-footer -->
              </form>
              <div id="loading" class="overlay" style="display:none">
  					<i class="fa fa-cog fa-spin" style="color:#1b15f7"></i>
			  </div>
              
            </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

	  <?php include("../../../componentes/pie.php");?>
    </div><!-- ./wrapper -->
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("Vnombre", "none", {validateOn:["blur"],  maxChars:50,  minChars:1});
				var sprytextfield1 = new Spry.Widget.ValidationTextField("Vnombre", "none", {validateOn:["blur"],  maxChars:50,  minChars:1});
				
</script>
</body>
</html>