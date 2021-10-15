<?php
include("../../seguridad/comprobar_login.php");
?>
<!DOCTYPE html>
<html>

<head>
	<?php include("../../../componentes/cabecera.php") ?>
	<script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="../../../plugins/fastclick/fastclick.min.js"></script>
	<script src="../../../dist/js/app.min.js" type="text/javascript"></script>
	<script src="js.js"></script>
	<script src="../../../librerias/js/cookies.js"></script>
	<?php
	if (isset($_GET['busqueda'])) {
		echo "<script>
		var busqueda='" . $_GET['busqueda'] . "';
		</script>";
	} else {
		echo '<script>var busqueda="";</script>';
	}
	if (isset($_GET['papelera'])) {
		echo '<script>var papelera="si";</script>';
	} else {
		echo '<script>var papelera="no";</script>';
	}
	?>
</head>

<body class="sidebar-mini <?php include("../../../componentes/skin.php"); ?>">
	<!-- Wrapper es el contenedor principal -->
	<div class="wrapper s">

		<?php include("../../../componentes/menuSuperior.php"); ?>
		<?php include("../../../componentes/menuLateral.php"); ?>
		<!-- Contenido-->
		<div class="content-wrapper">
			<!-- Contenido de la cabecera -->
			<section class="content-header">
				<h1>Sucursales<small> Consulta</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="../../inicio/inicio/inicio.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
					<li><a href="#">Consultar sucursalgarantias</a></li>
				</ol>
			</section>

			<!-- Contenido principal -->
			<section class="content">
				<?php
				/////PERMISOS////////////////
				if (!isset($_SESSION['permisos']['sucursalgarantias']['consultar']) or  !isset($_SESSION['permisos']['sucursalgarantias']['acceso'])) {
					echo $_SESSION['msgsinacceso'];
					echo "
		</section><!-- /.content -->
       </div><!-- /.content-wrapper -->";
					include("../../../componentes/pie.php");
					echo "
	</div><!-- ./wrapper -->
</body>
</html>";
					include("../../../componentes/avisos.php");
					exit;
				}
				/////FIN  DE PERMISOS////////

				?>

				<?php $herramientas = "consultar";
				include("../componentes/herramientas.php"); ?>
				<?php include("../../../componentes/avisos.php"); ?>
				<!-- box -->
				
				<!-- ///// FILTRO //////////////	 -->
				<div class="box box-info" style="border-color:#13A44D">
					<div class="box-header with-border">
						<h3 class="box-title col-sm-10">
							<i class="fa fa-filter text-green"></i>
							Filtrar Resultados
						</h3>
						<div class="col-sm-2">
							<button class="botonMostrarFiltro none btn btn-default pull-right" id="botonMenuFiltro">
								<div id="mostrarFiltro">
									Mostrar Filtro
									<i class="fa fa-angle-down" id="flechaAbajo"></i>
								</div>
							</button>
							<button class="botonOcultarFiltro btn btn-default pull-right" id="botonMenuFiltro">
								<div id="mostrarFiltro">
									Ocultar Filtro
									<i class="fa fa-angle-up" id="flechaArriba"></i>
								</div>
							</button>
						</div>
						<form class="form-horizontal" name="formularioFiltro" id="formularioFiltro" method="POST">
							<div class="box-body">
								<div class="row">
									<div class="form-group ">
										<label for="selectidempresa_ajax" class="col-sm-1 control-label">Empresa:</label>
										<div class="col-sm-3">
											<select id="idempresa_ajax" name="idempresa" class="form-control">
											</select>
										</div>
									</div>
								</div>
								<div class='col-sm-2 pull-right'>
									<div class="form-group">
										<label for="cempresa">&nbsp;</label>
										<button type="button" class="btn btn-success pull-right form-control" id="botonFiltrar"><i class="fa fa-filter"></i>&nbsp;&nbsp;&nbsp;Filtrar</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="box box-info" style="border-color:#000000">
					<div class="box-header with-border">
						<h3 class="box-title">Consulta de registros</h3>
					</div><!-- /.box-header -->
					<div id="muestra_contenido_ajax" style="min-height:100px;">
					</div><!-- /din contenido ajax -->
					<div id="loading" class="overlay">
						<i class="fa fa-cog fa-spin" style="color:#000000"></i>
					</div>

				</div><!-- Fin box>-->

			</section><!-- /.content -->
		</div><!-- /.content-wrapper -->

		<?php include("../../../componentes/pie.php"); ?>
	</div><!-- ./wrapper -->

</body>

</html>