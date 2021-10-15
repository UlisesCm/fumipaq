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
          <h1>Garantias<small>Nuevo registro</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="../../inicio/inicio/inicio.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Nuevo garantias</a></li>
          </ol>
        </section>
		
		<!-- Contenido principal -->
        <section class="content">
		
		<?php
    /////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['garantias']['guardar']) or  !isset($_SESSION['permisos']['garantias']['acceso'])){
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
            <div class="box box-info" style="border-color:#000000">
              <div class="box-header with-border">
                <h3 class="box-title">Formulario de registro</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
			  <form class="form-horizontal" name="formulario" id="formulario" method="post" enctype="multipart/form-data">
                <div class="box-body">
				<div class="form-group ">
                  	<label for="selectidempresa_ajax" class="col-sm-2 control-label">Empresa:</label>
                    <div class="col-sm-5">
                      <select id="idempresa_ajax" name="idempresa" class="form-control">
                      </select>
                    </div> 
                </div>
				
				<div class="form-group ">
                  	<label for="selectidsucursal_ajax" class="col-sm-2 control-label">Sucursal:</label>
                    <div class="col-sm-5">
                      <select id="idsucursal_ajax" name="idsucursal" class="form-control">
                      </select>
                    </div> 
                </div>
				
				
				<div class="form-group ">
                    <label for="cfecha" class="col-sm-2 control-label">Fecha:</label>
                    <div class="col-sm-5">
                    	
                        <input value="" name="fecha" type="date" required="required" class="form-control" id="cfecha" />
            			
						
                    </div>
                </div>

				<div class="form-group ">
                    <label for="cfingarantia" class="col-sm-2 control-label">Fin de Garantia:</label>
                    <div class="col-sm-5">
                    	
                        <input value="" name="fingarantia" type="date" required="required" class="form-control" id="cfingarantia" />
            			
						
                    </div>
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
                </div>
			
				<div class="form-group ">
                	<label for="x" class="col-sm-2 control-label">Factura:</label>
                    <div class="col-sm-5">
                    	<div class="input-group">
                            <input type="file" name="factura" style="display:none;" id="cfactura" accept=".pdf" onChange="fileinput('factura')"/>
                            <input type="text" name="nfactura" id="nfactura" class="form-control" placeholder="Seleccionar Archivo" disabled="disabled">
                            <span class="input-group-btn">
                                <a class="btn btn-warning" onclick="$('#cfactura').click();">&nbsp;&nbsp;&nbsp;Seleccionar Archivo</a>
                            </span>
                    	</div>        
                    </div>
                </div>
			
				
				<div class="form-group ">
                    <label for="cdescripcion" class="col-sm-2 control-label">Descripcion:</label>
                    <div class="col-sm-5">
                    	<span id="Vdescripcion">
                        <input value="" name="descripcion" type="text" class="form-control" id="cdescripcion" />
            			
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				
				<div class="form-group hide">
                    <label for="cestatus" class="col-sm-2 control-label">Estatus:</label>
                    <div class="col-sm-5">
                    	
                        <input value="activo" name="estatus" type="hidden" class="form-control" id="cestatus" />
            			
						
                    </div>
                </div>
                <div class="form-group ">
                  	<label for="selectidproveedor_ajax" class="col-sm-2 control-label">Proveedores:</label>
                    <div class="col-sm-5">
                      <select id="idprovedor_ajax" name="idproveedor" class="form-control">
                      </select>
                    </div> 
                </div>
				
				<!-- <div class="form-group ">
                    <label for="cprovedor" class="col-sm-2 control-label">Proveedor:</label>
                    <div class="col-sm-5">
                    	<span id="Vprovedor">
                        <input value="" name="provedor" type="text" class="form-control" id="cprovedor" />
            			
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div> -->
                

			</div><!-- /.box-body -->
                
                <div class="box-footer">
                  <button type="button" class="btn btn-default" id="botonCancelar" onclick="vaciarCampos();">Limpiar</button>
                  <button type="button" class="btn btn-primary pull-right" id="botonGuardar"><i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                  <!-- <button type="button" class="btn btn-primary pull-right" id="botonGuardarc" onclick="test();"><i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button> -->
                </div><!-- /.box-footer -->
              </form>
              <div id="loading" class="overlay" style="display:none">
  					<i class="fa fa-cog fa-spin" style="color:#000000"></i>
			  </div>
              
            </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

	  <?php include("../../../componentes/pie.php");?>
    </div><!-- ./wrapper -->
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("Varea", "none", {validateOn:["blur"],  minChars:1});
				var sprytextfield2 = new Spry.Widget.ValidationTextField("Vdescripcion", "none", {validateOn:["blur"],  minChars:1});
				var sprytextfield3 = new Spry.Widget.ValidationTextField("Vprovedor", "none", {validateOn:["blur"],  minChars:1});
				
</script>

</body>
</html>