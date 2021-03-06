<?php 
include ("../../seguridad/comprobar_login.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include ("../../../componentes/cabecera.php")?><link href="../../../librerias/js/Spry/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../../../plugins/fastclick/fastclick.min.js"></script>
<script src="../../../dist/js/app.min.js" type="text/javascript"></script>
<script src="js.js"></script><script src="../../../librerias/js/cookies.js"></script><script src="../../../librerias/js/validaciones.js"></script><script src="../../../librerias/js/Spry/SpryValidationTextField.js" type="text/javascript"></script>
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
          <h1>Actividad<small>Nuevo registro</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="../../inicio/inicio/inicio.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Nuevo actividad</a></li>
          </ol>
        </section>
		
		<!-- Contenido principal -->
        <section class="content">
		
		<?php
    /////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['actividades']['guardar']) or  !isset($_SESSION['permisos']['actividades']['acceso'])){
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
                    <label for="cnombre" class="col-sm-2 control-label">Actividad:</label>
                    <div class="col-sm-3">
                    	<span id="Vnombre">
                        <input value="" name="nombre" type="text" class="form-control" id="cnombre" />
            			<span class="textfieldMaxCharsMsg">Se ha superado el n??mero m??ximo de caracteres.</span>
					<span class="textfieldMinCharsMsg">No se cumple el m??nimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				<div class="form-group hide">
                  	<label for="selectidmodeloimpuestos_ajax" class="col-sm-2 control-label">Impuestos:</label>
                    <div class="col-sm-5">
                      <select id="idmodeloimpuestos_ajax" name="idmodeloimpuestos" type="hidden" class="form-control">
                      </select>
                    </div> 
                </div>
				
				<div class="form-group ">
                  	<label for="ctipoformato" class="col-sm-2 control-label">Formato de captura:</label>
                    <div class="col-sm-5">
                    	<select id="ctipoformato" name="tipoformato" class="form-control">
							<option value="FUMIGACION">FUMIGACI??N</option>
							<option value="ROEDORES">ROEDORES</option>
							<option value="INSECTOS VOLADORES">INSECTOS VOLADORES</option>
							<option value="NIDOS Y AVES">NIDOS Y AVES</option>
							<option value="AUDITORIA">AUDITORIA</option>
                            <option value="ORDINARIO">ORDINARIO</option>
						</select>
                    </div> 
                </div>
				<div class="form-group ">
                  	<label for="selectidunidad_ajax" class="col-sm-2 control-label">Unidad SAT:</label>
                    <div class="col-sm-5">
                      <select id="idunidad_ajax" name="idunidad" class="form-control">
                      </select>
                    </div> 
                </div>
				
				<div class="form-group ">
                  	<label for="selectidcategoria_ajax" class="col-sm-2 control-label">Categoria SAT:</label>
                    <div class="col-sm-5">
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
  					<i class="fa fa-cog fa-spin" style="color:#1b15f7"></i>
			  </div>
              
            </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

	  <?php include("../../../componentes/pie.php");?>
    </div><!-- ./wrapper -->
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("Vnombre", "none", {validateOn:["blur"],  maxChars:50,  minChars:1});
				
</script>

</body>
</html>