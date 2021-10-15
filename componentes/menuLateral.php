<?php
function checarLink($nivel,$base){
	if (isset($_GET[$nivel])){
		if ($base==$_GET[$nivel]){
			return 'active';
		}
	}else{
		return "";
	}
}
?>
    <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../../../empresas/<?php echo $_SESSION["empresa"];?>/archivosSubidos/usuarios/<?php echo $_SESSION["foto"];?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info-box-text info">
              <p><?php echo $_SESSION["nombreusuario"];?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">


            <li class="header">
            	<i class="fa fa-map-marker" style="color:#E80946"></i> &nbsp; <?php echo $_SESSION["nombresucursal"]; ?>
				<?php
                /////PERMISOS////////////////
                    if (isset($_SESSION['permisos']['sucursales']['cambiar'])){
                    ?>
                <small class="label pull-right bg-green">
                <a href="../../sucursales/cambiarsucursal/vista.php" style="color:#FFF"><i class="fa fa-pencil"></i></a>
                </small>
                <?php } ?>
            </li>

          	

             <li class="header">MENU PRINCIPAL</li>

              

                  


                    <!-- Inicio de Bloque catálogos -->
					<?php
                    /////PERMISOS////////////////
                    if (isset($_SESSION['permisos']['clientes']['acceso']) or isset($_SESSION['permisos']['domicilios']['acceso']) or isset($_SESSION['permisos']['datosfiscales']['acceso'])){
                    ?>
                     <li class="treeview <?php echo checarLink("n1","catalogos"); ?>">
                      <a href="#">
                        <i class="fa fa-book"></i> <span>Catálogos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">

                    <li class="treeview <?php echo checarLink("n2","clientes"); ?>">
                      <a href="#">
                        <i class="fa fa-users"></i> <span>Clientes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">


                        //CLIENTES CATALOGO

                       

                        

                          
                         </ul><!-- fin de ul clientes -->
                           </li><!-- fin de li clientes -->

                      







                     


                  

                

                        <!-- Inicio de Bloque de Archivos -->
                            <?php
                            /////PERMISOS////////////////
                            if (isset($_SESSION['permisos']['archivos']['acceso'])){
                            ?>
                            <li class="treeview <?php echo checarLink("n2","archivos"); ?>">
                              <a href="#">
                                <i class="fa fa-folder-open" style="color:#f3d66d"></i> <span>Archivos</span>
                                <i class="fa fa-angle-left pull-right"></i>
                              </a>
                              <ul class="treeview-menu">
                                <?php
                                /////PERMISOS////////////////
                                if (isset($_SESSION['permisos']['archivos']['guardar'])){
                                ?>
                                <li class="<?php echo checarLink("n3","nuevoarchivos"); ?>">
                                <a href="../../../modulos/archivos/nuevo/nuevo.php?n1=catalogos&n2=archivos&n3=nuevoarchivos"><i class="fa fa-circle-o text-green"></i> Nuevo archivo</a></li>
                                <?php }?>

                                <?php
                                /////PERMISOS////////////////
                                if (isset($_SESSION['permisos']['archivos']['consultar'])){
                                ?>
                                <li class="<?php echo checarLink("n3","consultararchivos"); ?>">
                                  <a href="../../../modulos/archivos/consultar/vista.php?n1=catalogos&n2=archivos&n3=consultararchivos"><i class="fa fa-circle-o text-red"></i> Consultar archivos</i></a>
                                </li>
                                 <?php }?>
                              </ul>
                            </li>
                            <?php }?>
                            <!-- Fin de Bloque de Archivos -->


  


 

                       </ul><!-- fin de ul catálogos -->
                    </li> <!-- fin de li catálogos -->
                    <?php }?>
<!-- Inicio de Bloque de Garantias -->
<?php 
			/////PERMISOS////////////////
			if (isset($_SESSION['permisos']['garantias']['acceso'])){
			?>
            <li class="treeview <?php echo checarLink("n1","garantias"); ?>">
              <a href="#">
                <i class="fa fa-paste" style="color:#000000"></i> <span>Garantias</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<?php 
				/////PERMISOS////////////////
				if (isset($_SESSION['permisos']['garantias']['guardar'])){
				?>
                <li class="<?php echo checarLink("n2","nuevogarantias"); ?>">
                <a href="../../../modulos/garantias/nuevo/nuevo.php?n1=garantias&n2=nuevogarantias"><i class="fa fa-circle-o text-green"></i> Nueva garantia</a></li>
                <?php }?>
                
                <?php 
			  	/////PERMISOS////////////////
			  	if (isset($_SESSION['permisos']['garantias']['consultar'])){
			  	?>
                <li class="<?php echo checarLink("n2","consultargarantias"); ?>">
                  <a href="../../../modulos/garantias/consultar/vista.php?n1=garantias&n2=consultargarantias"><i class="fa fa-circle-o text-red"></i> Consultar garantias</i></a>
                </li>
                 <?php }?>
                  <?php 
			  	/////PERMISOS////////////////
			  	if (isset($_SESSION['permisos']['garantias']['papelera'])){
			  	?>
                <li class="<?php echo checarLink("n2","papeleragarantias"); ?>">
                  <a href="../../../modulos/garantias/consultar/vista.php?n1=garantias&n2=papeleragarantias&papelera"><i class="fa fa-circle-o text-yellow"></i> Papelera de garantias</i></a>
                </li>
                 <?php }?>
              </ul>
            </li>
            <?php }?>
			<!-- Fin de Bloque de Garantias -->   


<!-- Inicio de Bloque de Empresasgarantias -->
<?php 
			/////PERMISOS////////////////
			if (isset($_SESSION['permisos']['empresasgarantias']['acceso'])){
			?>
            <li class="treeview <?php echo checarLink("n1","empresasgarantias"); ?>">
              <a href="#">
                <i class="fa fa-building" style="color:#000000"></i> <span>Empresasgarantias</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<?php 
				/////PERMISOS////////////////
				if (isset($_SESSION['permisos']['empresasgarantias']['guardar'])){
				?>
                <li class="<?php echo checarLink("n2","nuevoempresasgarantias"); ?>">
                <a href="../../../modulos/empresasgarantias/nuevo/nuevo.php?n1=empresasgarantias&n2=nuevoempresasgarantias"><i class="fa fa-circle-o text-green"></i> Nueva empresasgarantias</a></li>
                <?php }?>
                
                <?php 
			  	/////PERMISOS////////////////
			  	if (isset($_SESSION['permisos']['empresasgarantias']['consultar'])){
			  	?>
                <li class="<?php echo checarLink("n2","consultarempresasgarantias"); ?>">
                  <a href="../../../modulos/empresasgarantias/consultar/vista.php?n1=empresasgarantias&n2=consultarempresasgarantias"><i class="fa fa-circle-o text-red"></i> Consultar empresasgarantias</i></a>
                </li>
                 <?php }?>
              </ul>
            </li>
            <?php }?>
			<!-- Fin de Bloque de Empresasgarantias -->


      <!-- Inicio de Bloque de Sucursalgarantias -->
      <?php 
			/////PERMISOS////////////////
			if (isset($_SESSION['permisos']['sucursalgarantias']['acceso'])){
			?>
            <li class="treeview <?php echo checarLink("n1","sucursalgarantias"); ?>">
              <a href="#">
                <i class="fa fa-list-alt" style="color:#000000"></i> <span>Sucursalgarantias</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<?php 
				/////PERMISOS////////////////
				if (isset($_SESSION['permisos']['sucursalgarantias']['guardar'])){
				?>
                <li class="<?php echo checarLink("n2","nuevosucursalgarantias"); ?>">
                <a href="../../../modulos/sucursalgarantias/nuevo/nuevo.php?n1=sucursalgarantias&n2=nuevosucursalgarantias"><i class="fa fa-circle-o text-green"></i> Nueva sucursalgarantias</a></li>
                <?php }?>
                
                <?php 
			  	/////PERMISOS////////////////
			  	if (isset($_SESSION['permisos']['sucursalgarantias']['consultar'])){
			  	?>
                <li class="<?php echo checarLink("n2","consultarsucursalgarantias"); ?>">
                  <a href="../../../modulos/sucursalgarantias/consultar/vista.php?n1=sucursalgarantias&n2=consultarsucursalgarantias"><i class="fa fa-circle-o text-red"></i> Consultar sucursalgarantias</i></a>
                </li>
                 <?php }?>
              </ul>
            </li>
            <?php }?>
			<!-- Fin de Bloque de Sucursalgarantias -->
      <!-- Inicio de Bloque de Proveedores -->
      <?php 
			/////PERMISOS////////////////
			if (isset($_SESSION['permisos']['proveedores']['acceso'])){
			?>
            <li class="treeview <?php echo checarLink("n1","proveedores"); ?>">
              <a href="#">
                <i class="fa fa-magic" style="color:#789fe8"></i> <span>Proveedores</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<?php 
				/////PERMISOS////////////////
				if (isset($_SESSION['permisos']['proveedores']['guardar'])){
				?>
                <li class="<?php echo checarLink("n2","nuevoproveedores"); ?>">
                <a href="../../../modulos/proveedores/nuevo/nuevo.php?n1=proveedores&n2=nuevoproveedores"><i class="fa fa-circle-o text-green"></i> Nueva proveedores</a></li>
                <?php }?>
                
                <?php 
			  	/////PERMISOS////////////////
			  	if (isset($_SESSION['permisos']['proveedores']['consultar'])){
			  	?>
                <li class="<?php echo checarLink("n2","consultarproveedores"); ?>">
                  <a href="../../../modulos/proveedores/consultar/vista.php?n1=proveedores&n2=consultarproveedores"><i class="fa fa-circle-o text-red"></i> Consultar proveedores</i></a>
                </li>
                 <?php }?>
              </ul>
            </li>
            <?php }?>
			<!-- Fin de Bloque de Proveedores -->
                       


                    <li class="treeview <?php echo checarLink("n1","configuracion"); ?>">
                      <a href="#">
                        <i class="fa fa-cog"></i> <span>Configuración</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">

                          

                            <!-- Inicio de Bloque cuentas de usuarios-->
						<?php
                        /////PERMISOS////////////////
                        if (isset($_SESSION['permisos']['usuarios']['acceso']) or isset($_SESSION['permisos']['perfiles']['acceso'])){
                        ?>
                        <li class="treeview <?php echo checarLink("n2","usuarios"); ?>">
                          <a href="#">
                            <i class="fa fa-users"></i> <span>Cuentas de usuarios</span>
                            <i class="fa fa-angle-left pull-right"></i>
                          </a>

                          <ul class="treeview-menu">
                            <?php
                            /////PERMISOS////////////////
                            if (isset($_SESSION['permisos']['usuarios']['acceso'])){
                            ?>
                            <li class="<?php echo checarLink("n3","usuarios"); ?>">
                              <a href="#"><i class="fa fa-child"></i> Usuarios <i class="fa fa-angle-left pull-right"></i></a>
                              <ul class="treeview-menu">
                                <?php
                                /////PERMISOS////////////////
                                if (isset($_SESSION['permisos']['usuarios']['guardar'])){
                                ?>
                                <li class="<?php echo checarLink("n4","nuevousuario"); ?>"><a href="../../../modulos/usuarios/nuevo/nuevo.php?n1=configuracion&n2=usuarios&n3=usuarios&n4=nuevousuario"><i class="fa fa-circle-o text-green"></i> Nuevo usuario</a></li>
                                <?php }?>
                                <?php
                                /////PERMISOS////////////////
                                if (isset($_SESSION['permisos']['usuarios']['consultar'])){
                                ?>
                                <li class="<?php echo checarLink("n4","consultarusuarios"); ?>"><a href="../../../modulos/usuarios/consultar/vista.php?n1=configuracion&n2=usuarios&n3=usuarios&n4=consultarusuarios"><i class="fa fa-circle-o text-red"></i> Consultar usuarios</a></li>
                                <?php }?>
                              </ul>
                            </li>
                            <?php }?>
                            <?php
                            /////PERMISOS////////////////
                            if (isset($_SESSION['permisos']['perfiles']['acceso'])){
                            ?>
                            <li class="<?php echo checarLink("n3","perfiles"); ?>">
                              <a href="#"><i class="fa fa-key"></i> Perfiles <i class="fa fa-angle-left pull-right"></i></a>
                              <ul class="treeview-menu">
                                <?php
                                /////PERMISOS////////////////
                                if (isset($_SESSION['permisos']['perfiles']['guardar'])){
                                ?>
                                <li class="<?php echo checarLink("n4","nuevoperfil"); ?>"><a href="../../../modulos/perfiles/nuevo/nuevo.php?n1=configuracion&n2=usuarios&n3=perfiles&n4=nuevoperfil"><i class="fa fa-circle-o text-green"></i> Nuevo perfil</a></li>
                                <?php }?>
                                <?php
                                /////PERMISOS////////////////
                                if (isset($_SESSION['permisos']['perfiles']['consultar'])){
                                ?>
                                <li class="<?php echo checarLink("n4","consultarperfiles"); ?>"><a href="../../../modulos/perfiles/consultar/vista.php?n1=configuracion&n2=usuarios&n3=perfiles&n4=consultarperfiles"><i class="fa fa-circle-o text-red"></i> Consultar perfiles</a></li>
                                <?php }?>
                              </ul>
                            </li>
                            <?php }?>
                          </ul>
                        </li>
                        <?php }?>
                      <!-- fin de cuentas de usuario -->

                             


                               


                    <!-- Inicio de Bloque -->
                    <?php
                    /////PERMISOS////////////////
                    if (isset($_SESSION['permisos']['reportes']['acceso'])){
                    ?>
                    <li class="treeview <?php echo checarLink("n1","reportes"); ?>">
                      <a href="#">
                        <i class="fa fa-files-o" style="color:#5095AB"></i> <span>Reportes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">

                        <?php
                        /////PERMISOS////////////////
                        if (isset($_SESSION['permisos']['bitacoracontrol']['acceso'])){
                        ?>
                        <li class="<?php echo checarLink("n2","bitacoras"); ?>">
                        <a href="../../../modulos/reportes/bitacoras/vista.php?n1=reportes&n2=bitacoras"><i class="fa fa-history text-red"></i> Bitácora</a></li>
                        </i>
                        <?php }?>
                      </ul>
                    </li>
                    <?php }?>



                    <!-- Inicio de Bloque -->
                    <?php
                    /////PERMISOS////////////////
                    if (isset($_SESSION['permisos']['configuracion']['acceso'])){
                    ?>
                    <li class="treeview <?php echo checarLink("n1","configuracion"); ?>">
                      <a href="#">
                        <i class="fa fa-gear"></i> <span>Ajustes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">
                        <?php
                        /////PERMISOS////////////////
                        if (isset($_SESSION['permisos']['configuracion']['modificar'])){
                        ?>
                        <li class="<?php echo checarLink("n2","configuracion"); ?>">
                            <a href="../../../modulos/configuracion/modificar/actualizar.php?n1=configuracion&n2=configuracion"><i class="fa fa-wrench text-yellow"></i> <span>Configuración</span></a>
                        </i>
                        <?php
                        }?>

                        <?php
                        /////PERMISOS////////////////
                        if (isset($_SESSION['permisos']['configuracion']['respaldar'])){
                        ?>
                        <li class="<?php echo checarLink("n2","copiaseguridad"); ?>">
                            <a href="../../../modulos/configuracion/copiaseguridad/sincronizar.php?n1=configuracion&n2=copiaseguridad"><i class="fa fa-refresh text-green"></i> <span>Respaldar</span></a>
                        </i>
                        <?php
                        }?>

                      </ul>
                    </li>
                    <?php }?>

                      </ul><!-- fin de ul Configuración -->
                    </li> <!-- fin de li Configuración-->


                      <!-- Inicio de Bloque Ayuda -->
					<?php
                    /////PERMISOS////////////////
                    if (isset($_SESSION['permisos']['clientes']['acceso']) or isset($_SESSION['permisos']['domicilios']['acceso']) or isset($_SESSION['permisos']['datosfiscales']['acceso'])){
                    ?>
                     <li class="treeview <?php echo checarLink("n1","ayuda"); ?>">
                      <a href="#">
                        <i class="fa fa-life-ring"></i> <span>Ayuda</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">


                     </ul><!-- fin de ul ayuda -->
                    </li> <!-- fin de li ayua -->
                    <?php }?>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->
