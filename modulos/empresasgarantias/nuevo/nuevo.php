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
          <h1>Empresasgarantias<small>Nuevo registro</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="../../inicio/inicio/inicio.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Nuevo empresasgarantias</a></li>
          </ol>
        </section>
		
		<!-- Contenido principal -->
        <section class="content">
		
		<?php
    /////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['empresasgarantias']['guardar']) or  !isset($_SESSION['permisos']['empresasgarantias']['acceso'])){
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
			  <form class="form-horizontal" name="formulario" id="formulario" method="post">
                <div class="box-body">
				
				<div class="form-group ">
                    <label for="cnombrecomercial" class="col-sm-2 control-label">Nombrecomercial:</label>
                    <div class="col-sm-5">
                    	<span id="Vnombrecomercial">
                        <input value="" name="nombrecomercial" type="text" class="form-control" id="cnombrecomercial" />
            			
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				
				<div class="form-group ">
                    <label for="crazonsocial" class="col-sm-2 control-label">Razonsocial:</label>
                    <div class="col-sm-5">
                    	<span id="Vrazonsocial">
                        <input value="" name="razonsocial" type="text" class="form-control" id="crazonsocial" />
            			
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				
				<div class="form-group ">
                    <label for="crfc" class="col-sm-2 control-label">Rfc:</label>
                    <div class="col-sm-5">
                    	<span id="Vrfc">
                        <input value="" name="rfc" type="text" class="form-control" id="crfc" />
            			
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				
				<div class="form-group ">
                    <label for="cdomiciliofiscal" class="col-sm-2 control-label">Domiciliofiscal:</label>
                    <div class="col-sm-5">
                    	<span id="Vdomiciliofiscal">
                        <input value="" name="domiciliofiscal" type="text" class="form-control" id="cdomiciliofiscal" />
            			
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				
				<div class="form-group ">
                    <label for="cregimen" class="col-sm-2 control-label">Regimen:</label>
                    <div class="col-sm-5">
                    	<span id="Vregimen">
                        <input value="" name="regimen" type="text" class="form-control" id="cregimen" />
            			
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				
				<div class="form-group ">
                    <label for="ctelefono" class="col-sm-2 control-label">Telefono:</label>
                    <div class="col-sm-5">
                    	<span id="Vtelefono">
                        <input value="" name="telefono" type="text" class="form-control" id="ctelefono" />
            			
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				
				<div class="form-group ">
                    <label for="cemail" class="col-sm-2 control-label">Email:</label>
                    <div class="col-sm-5">
                    	<span id="Vemail">
                        <input value="" name="email" type="text" class="form-control" id="cemail" />
            			
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
				
				<div class="form-group ">
                    <label for="clicencia" class="col-sm-2 control-label">Licencia:</label>
                    <div class="col-sm-5">
                    	<span id="Vlicencia">
                        <input value="" name="licencia" type="text" class="form-control" id="clicencia" />
            			
					<span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span>
						<span class="textfieldRequiredMsg">Se necesita un valor.</span>
					</span>
                    </div>
                </div>
			
			</div><!-- /.box-body -->
                
                <div class="box-footer">
                  <button type="button" class="btn btn-default" id="botonCancelar" onclick="vaciarCampos();">Limpiar</button>
                  <button type="button" class="btn btn-primary pull-right" id="botonGuardar"><i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
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
var sprytextfield1 = new Spry.Widget.ValidationTextField("Vnombrecomercial", "none", {validateOn:["blur"],  minChars:1});
				var sprytextfield2 = new Spry.Widget.ValidationTextField("Vrazonsocial", "none", {validateOn:["blur"],  minChars:1});
				var sprytextfield3 = new Spry.Widget.ValidationTextField("Vrfc", "none", {validateOn:["blur"],  minChars:1});
				var sprytextfield4 = new Spry.Widget.ValidationTextField("Vdomiciliofiscal", "none", {validateOn:["blur"],  minChars:1});
				var sprytextfield5 = new Spry.Widget.ValidationTextField("Vregimen", "none", {validateOn:["blur"],  minChars:1});
				var sprytextfield6 = new Spry.Widget.ValidationTextField("Vtelefono", "none", {validateOn:["blur"],  minChars:1});
				var sprytextfield7 = new Spry.Widget.ValidationTextField("Vemail", "none", {validateOn:["blur"],  minChars:1});
				var sprytextfield8 = new Spry.Widget.ValidationTextField("Vlicencia", "none", {validateOn:["blur"],  minChars:1});
				
</script>

</body>
</html>