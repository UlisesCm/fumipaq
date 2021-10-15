<?php 
include ("../../seguridad/comprobar_login.php");
include ("../../../librerias/php/variasfunciones.php");
include ("../../empresa/Empresa.class.php");

$Oempresa=new Empresa;

if (isset($_POST['idclienteP']) && trim($_POST['idclienteP']) !=""){
	$idcliente=trim($_POST['idclienteP']);
}else{
	$idcliente="";
}

if (isset($_POST['idprogramacionP']) && trim($_POST['idprogramacionP']) !=""){
	$idprogramacion=trim($_POST['idprogramacionP']);
}else{
	$idprogramacion="";
}

$resultado=$Oempresa->consultaLibre("SELECT nombre, nic, correocontacto FROM clientes WHERE idcliente='$idcliente'");
$nombrecliente="Cliente";
$nic="NIC";
$correocliente="";
while ($filas=mysqli_fetch_array($resultado)) {
	$nombrecliente=html_entity_decode($filas["nombre"]);
	$nic=html_entity_decode($filas["nic"]);
	$correocliente=trim(html_entity_decode($filas["correocontacto"]));
}


$resultado2=$Oempresa->consultaLibre("SELECT
					programacion.idprogramacion,
					programacion.idtecnico,
					programacion.idstecnicosauxiliares,
					programacion.fecha,
					programacion.horainicio,
					programacion.horafin,
					programacion.duracion,
					programacion.notificacion,
					programacion.estado,
					tecnicos.nombre AS nombretecnicos,
					tecnicos.email AS correotecnico,
					tecnicos.telefonocontacto AS celulartecnico
					FROM programacion 
					INNER JOIN tecnicos ON programacion.idtecnico=tecnicos.idtecnico
					WHERE programacion.idprogramacion='$idprogramacion'");
$idtecnico="";
$fecha="";
$horainicio="";
$horafin="";
$nombretecnico="";
$emailtecnico="";
$celulartecnico="";
while ($filas2=mysqli_fetch_array($resultado2)) {
	$nombretecnico=html_entity_decode($filas2["nombretecnicos"]);
	$emailtecnico=html_entity_decode($filas2["correotecnico"]);
	$horainicio=html_entity_decode($filas2["horainicio"]);
	$horafin=html_entity_decode($filas2["horafin"]);
	$fechaNfecha=date_create($filas2['fecha']);
	$fecha= date_format($fechaNfecha, 'd/m/Y');
	$celulartecnico= html_entity_decode($filas2["celulartecnico"]);
}
$emailTecnico="";
if ($emailtecnico!=""){
	if($correocliente!=""){
		$emailTecnico="[\"$emailtecnico\",\"$correocliente\"]";
	}else{
		$emailTecnico="[\"$emailtecnico\"]";
	}
}else{
	if($correocliente!=""){
		$emailTecnico='["$correocliente"]';
	}
}
$mensaje="
		<h2>Programación de servicio</h2>
		<p>Este correo es para informarle que tiene un servicio programado</p>
		</br>
		<b>Fecha:</b> $fecha
		</br>
		<b>Hora:</b> $horainicio - $horafin
		</br>
		<b>Técnico asignado:</b> $nombretecnico
		";
$mensajeCelular="(Recordatorio) Tiene una servicio programado para el dia: $fecha, hora: $horainicio-$horafin";

function llenarContactos($idcliente,$nombre,$nic){
	$Ocliente=new Empresa;
	$resultado=$Ocliente->consultaLibre(" SELECT
					*
					FROM contactos
					WHERE idcliente='$idcliente'");
	
	?>
    	<table class="table table-hover table-bordered">
        	<tr>
                <th class="columnaDecorada" style="background:#2ea737;"></th>
                <th class="checksEliminar" width="10"></th>
				<th class="Cnombrecontacto">Nombre del contacto</th>
				<th class="Ctelefono">Teléfono</th>
				<th class="Cemail">Email</th>
				<th class="Cdepartamento">Departamento</th>
				<th class="Ccomentarios">Comentarios</th>
      		</tr>
    <?php
	while ($filas=mysqli_fetch_array($resultado)) { ?>
      		<tr id="iregistro<?php echo $filas['idcontacto'] ?>">
            	
                <td class="columnaDecorada" style="background:#2ea737;"></td>
                <td class="checksEliminar" width="30" valign="middle">
					<input type="checkbox" name="registroEliminar[]"  value="<?php echo $filas['email'] ?>" celular="<?php echo $filas['telefono'] ?>" class="checkEliminar" onClick="recorrerLista();">
            	</td>
				<td class="Cnombrecontacto"><?php echo $filas['nombrecontacto']; ?></td>
				<td class="Ctelefono"><?php echo $filas['telefono']; ?></td>
				<td class="Cemail"><?php echo $filas['email']; ?></td>
				<td class="Cdepartamento"><?php echo $filas['departamento']; ?></td>
				<td class="Ccomentarios"><i><small><?php echo $filas['comentarios']; ?></small></i></td>
                
      		</tr>
    <?php
	}//Fin de while si es tabla ?>
		</table>
    <?php   
}

?>
<!DOCTYPE html>
<html>
  <head>
    <?php include ("../../../componentes/cabecera.php")?>
    <link href="../../../librerias/js/Spry/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
    <link type="text/css" rel="stylesheet" href="../../../librerias/js/editor/jquery-te-1.4.0.css">
    <link rel='stylesheet' href='../../../librerias/js/multiple-email/multiple-emails.css'>
    <script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="../../../plugins/fastclick/fastclick.min.js"></script>
    <script src="../../../dist/js/app.min.js" type="text/javascript"></script>
    <script src="js.js"></script>
    <script src="../../../librerias/js/cookies.js"></script>
    <script src="../../../librerias/js/validaciones.js"></script>
    <script src="../../../librerias/js/Spry/SpryValidationTextField.js" type="text/javascript"></script>
    <script type="text/javascript" src="../../../librerias/js/editor/jquery-te-1.4.0.min.js" charset="utf-8"></script>
    <script src='../../../librerias/js/multiple-email/multiple-emails.js'></script>
    


<script>
	$(function() {
		$('#current_emails').text($('#example_email').val());
		$('#cemail').val($('#example_email').val());
		$('#example_email').multiple_emails();
		$('#example_email').change( function(){
			$('#current_emails').text($(this).val());
			$('#cemail').val($(this).val());
		});
		
		
	});
</script>

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
          <h1>Email<small>Enviar correo electrónico</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="../../inicio/inicio/inicio.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Nueva notificación</a></li>
          </ol>
        </section>
		
		<!-- Contenido principal -->
        <section class="content">
		
		<?php
    /////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['email']['guardar']) or  !isset($_SESSION['permisos']['email']['acceso'])){
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
            <div class="box box-info" style="border-color:#909">
              <div class="box-header with-border">
                <h3 class="box-title">Formulario de envío a <?php echo strtoupper($nombrecliente)?></h3>
              </div><!-- /.box-header -->
              <!-- form start -->
			  <form class="form-horizontal" name="formulario" id="formulario" method="post">
                <div class="box-body">
                	
                    <div class="form-group">
                    	<label for="cnombre" class="col-sm-2 control-label">Cuenta saliente:</label>
                    	<div class="col-sm-8">
                        	<select id="cuentacorreo_ajax" name="correosaliente" class="form-control">
                          </select>
                        </div>
                    </div>
                
                	<div class="form-group">
                    	<label for="cnombre" class="col-sm-2 control-label">Lista de destinatarios:</label>
                    	<div class="col-sm-8">
                        	<?php llenarContactos($idcliente,$nombrecliente,$nic);?>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="cnombre" class="col-sm-2 control-label">Lista de destinatarios:</label>
                        <div class="col-sm-8">
                            <input type='text' id='example_email' name='example_email' class='form-control' value='<?php echo $emailTecnico; ?>'>
                                <pre id='current_emails' style="display:none;"></pre>
                            <input id="cemail" name="email" type="hidden"> 
                        </div>
                    </div>
                    
                    <div class="form-group ">
                        <label for="plantilla_ajax" class="col-sm-2 control-label">Plantilla de correo:</label>
                        <div class="col-sm-8">
                          <select id="plantilla_ajax" name="asunto" class="form-control">
                          </select>
                        </div> 
                    </div>
                    
                    <div class="form-group ">
                        <label for="casunto" class="col-sm-2 control-label">Asunto:</label>
                        <div class="col-sm-8">
                            <input value="NOTIFICACION DE SERVICIO" name="asunto" type="text" class="form-control" id="casunto" />
                            
                        </div>
                    </div>
                    
                    <div class="form-group ">
                        <label for="carchivo" class="col-sm-2 control-label">Mensaje:</label>
                        <div class="col-sm-8">
                            <input value="<?php echo $mensaje?>" name="mensaje" type="text" class="jqte-test" id="cmensaje" />
                            
                        </div>
                    </div>
                    
                    <div class="form-group ">
                        <label for="x" class="col-sm-2 control-label">&nbsp;</label>
                        <div class="col-sm-10">
                            <label>
                                <input id="cenviarsms" type="checkbox" name="enviarsms" value="si">
                                Enviar notificación por SMS <span data-placement="bottom" data-toggle="tooltip" data-html="true" title="" data-original-title="
						<b>Seleccionar esta casilla puede generar costos</b>"><i class="fa fa-question-circle text-blue ayuda"></i>
                        </span>
                            </label>
                        </div>
                        
                	</div>
                    
				</div><!-- /.box-body -->
                
                <div class="box-footer">
                  <input id="cemailcliente" name="emailcliente" value="<?php echo $correocliente?>" type="hidden"/>
                  <input id="cemailtecnico" name="emailtecnico" value="<?php echo $emailtecnico?>" type="hidden"/>
                  <input id="cnumerotecnico" name="numerotecnico" value="<?php echo $celulartecnico?>" type="hidden"/>
                  <input id="cnumeros" name="numeros" value="<?php echo $celulartecnico?>" type="hidden"/>
                  <input id="cidprogramacion" name="idprogramacion" value="<?php echo $idprogramacion?>" type="hidden"/>
                  <input id="cmensajecelular" name="mensajecelular" value="<?php echo $mensajeCelular?>" type="hidden"/>
                  <button type="button" class="btn btn-default" id="botonCancelar" onclick="vaciarCampos();">Limpiar</button>
                  <button type="button" class="btn btn-primary pull-right" id="botonGuardar"><i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;Enviar</button>
                </div><!-- /.box-footer -->
              </form>
              <div id="loading" class="overlay" style="display:none">
  					<i class="fa fa-cog fa-spin" style="color:#ec3e4a"></i>
			  </div>
              
            </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

	  <?php include("../../../componentes/pie.php");?>
    </div><!-- ./wrapper -->

<script>
$('.jqte-test').jqte();
var jqteStatus = true;
$(".status").click(function(){
	jqteStatus = jqteStatus ? false : true;
	$('.jqte-test').jqte({"status" : jqteStatus})
});
</script>

</body>
</html>