<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Xentra web<?php if(isset($page_title)){ echo " - ".$page_title; }?> </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css');?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Datetimepicker -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css');?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css');?>">
    </head>
    <?php
        $session_data = $this->session->userdata('logged_in');
    ?>
    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">xentra_web</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">xentra_web</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['thumb']);?>" class="user-image" alt="Imagen usuario">
                                    <span class="hidden-xs"><?php echo $session_data['nombre_usu']?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <?php if($session_data['imagen_usu']!= ""){ ?>
                                        <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['imagen_usu']);?>" class="img-circle" alt="Imagen usuario">
                                        <?php }else{ ?>
                                        <img src="<?php echo site_url('resources/images/usuarios/default.jpg');?>" class="img-circle" alt="Imagen usuario">
                                        <?php } ?>
                                    <p>
                                        <?php echo $session_data['nombre_usu']?> - <?php echo $session_data['tipo_usuario']?>
                                        <!--<small><?php //echo "Gestión ".$session_data['gestion_nombre']?></small>-->
                                    </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <!--<div class="pull-left">
                                            <a href="<?php //echo site_url() ?>admin/dashb/cuenta" class="btn btn-default btn-flat">Mi Cuenta</a>
                                        </div>-->
                                        <div class="pull-right">
                                            <a href="<?php echo site_url() ?>login/logout" class="btn btn-default btn-flat">Salir</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['thumb']);?>" class="img-circle" alt="Imagen usuario">
                        </div>
                        <div class="pull-left info">
                            <div  style=" white-space: normal; word-wrap: break-word;"><?php echo $session_data['nombre_usu']?></div>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MENU PRINCIPAL</li>
                        <li>
                            <a href="<?php echo site_url('dashboard');?>">
                                <i class="fa fa-dashboard"></i> <span>Panel de Control</span>
                            </a>
                        </li>
						<li>
                            <a href="<?php echo site_url('aporte/index');?>">
                                <i class="fa fa-credit-card-alt"></i> <span>Aporte</span>
                            </a>
                        </li>
						<li>
                            <a href="<?php echo site_url('asociado/index');?>">
                                <i class="fa fa-address-card-o"></i> <span>Asociado</span>
                            </a>
                        </li>
						<!--<li>
                            <a href="#">
                                <i class="fa fa-address-book-o"></i> <span>Asociado Aux</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('asociado_aux/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('asociado_aux/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-desktop"></i> <span>Bitacora</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('bitacora/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('bitacora/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-bars"></i> <span>Bolsarol</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('bolsarol/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('bolsarol/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>-->
						<li>
                            <a href="<?php echo site_url('categoria_egreso/index');?>">
                                <i class="fa fa-list-ol"></i> <span>Categoria Egreso</span>
                            </a>
                        </li>
						<li>
                            <a href="<?php echo site_url('categoria_ingreso/index');?>">
                                <i class="fa fa-server"></i> <span>Categoria Ingreso</span>
                            </a>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-cubes"></i> <span>Categoria</span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active">
                                    <a href="<?php echo site_url('categoria');?>"><i class="fa fa-group"></i> Asociado</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('diametrored');?>"><i class="fa fa-support"></i> Diametro de Red</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('direccion');?>"><i class="fa fa-address-book"></i> Dirección</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('documento');?>"><i class="fa fa-book"></i> Documento</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('estado');?>"><i class="fa fa-toggle-on"></i> Estado</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('expedido');?>"><i class="fa fa-reorder"></i> Expedido C.I.</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('servicio');?>"><i class="fa fa-tasks"></i> Servicio</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('sistema_red');?>"><i class="fa fa-sitemap"></i> Sistema Red</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('tipo_asociado');?>"><i class="fa fa-list-ul"></i> Tipo Asociado</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('tipo_inmueble');?>"><i class="fa fa-building-o"></i> Tipo Inmueble</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('zona');?>"><i class="fa fa-map-marker"></i> Zona</a>
                                </li>
                            </ul>
                        </li>
						<!--<li>
                            <a href="#">
                                <i class="fa fa-cogs"></i> <span>Configuracion</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('configuracion/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('configuracion/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-list-ol"></i> <span>Detalle Factura</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('detalle_factura/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('detalle_factura/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>-->
						<li>
                            <a href="<?php echo site_url('direccion_orden/index');?>">
                                <i class="fa fa-map"></i> <span>Direccion Orden</span>
                            </a>
                        </li>
                        
						<!--<li>
                            <a href="#">
                                <i class="fa fa-stack-overflow"></i> <span>Dosificacion</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('dosificacion/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('dosificacion/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>-->
                        <li>
                            <a href="<?php echo site_url('egreso/index');?>">
                                <i class="fa fa-arrow-up"></i> <span>Egreso</span>
                            </a>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-bank"></i> <span>Empresa</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('empresa/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('empresa/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<!--<li>
                            <a href="#">
                                <i class="fa fa-adjust"></i> <span>Estado Factura</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('estado_factura/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('estado_factura/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>-->
						<li>
                            <a href="<?php echo site_url('factura/cobranza');?>">
                                <i class="fa fa-list-alt"></i> <span>Factura</span>
                            </a>
                        </li>
						<!--<li>
                            <a href="#">
                                <i class="fa fa-calendar"></i> <span>Gestion</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('gestion/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('gestion/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-file-photo-o"></i> <span>Imagen Asociado</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('imagen_asociado/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('imagen_asociado/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>-->
						<li>
                            <a href="<?php echo site_url('ingreso/index');?>">
                                <i class="fa fa-arrow-down"></i> <span>Ingreso</span>
                            </a>
                        </li>
						<!--<li>
                            <a href="#">
                                <i class="fa fa-desktop"></i> <span>Ingreso Egresox</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('ingreso_egresox/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('ingreso_egresox/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>-->
						<li>
                            <a href="<?php echo site_url('lectura/lecturas');?>">
                                <i class="fa fa-book"></i> <span>Lectura</span>
                            </a>
                        </li>
						<li>
                            <a href="<?php echo site_url('medidor/index');?>">
                                <i class="fa fa-clock-o"></i> <span>Medidor</span>
                            </a>
                        </li>
						<li>
                            <a href="<?php echo site_url('medidor_servicio/index');?>">
                                <i class="fa fa-battery-3"></i> <span>Medidor Servicio</span>
                            </a>
                        </li>
						<li>
                            <a href="<?php echo site_url('me/index');?>">
                                <i class="fa fa-database"></i> <span>Mes</span>
                            </a>
                        </li>
						<li>
                            <a href="<?php echo site_url('multum/index');?>">
                                <i class="fa fa-money"></i> <span>Multas</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-sliders"></i> <span>Parametro</span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active">
                                    <a href="<?php echo site_url('parametro/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('parametro/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-clipboard"></i> <span>Reportes</span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active">
                                    <a href="<?php echo site_url('reportes');?>"><i class="fa fa-indent"></i> Cobros por Servicios (lec)</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('reportes/ingresof');?>"><i class="fa fa-list-alt"></i> Cobros por Servicios</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('reportes/movimiento');?>"><i class="fa fa-exchange"></i> Movimiento Diario</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('reportes/mensual');?>"><i class="fa fa-calendar"></i> Mensual</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('reportes/ingreso');?>"><i class="glyphicon glyphicon-save"></i> Reporte Ingresos</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('reportes/egreso');?>"><i class="glyphicon glyphicon-open"></i> Reporte Egresos</a>
                                </li>
                            </ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-align-justify"></i> <span>Rol</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('rol/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('rol/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-braille"></i> <span>Rol Usuario</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('rol_usuario/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('rol_usuario/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="<?php echo site_url('tarifa/index');?>">
                                <i class="fa fa-stack-overflow"></i> <span>Tarifa</span>
                            </a>
                        </li>
						<li>
                            <a href="<?php echo site_url('tarifa_parametrizable/index');?>">
                                <i class="fa fa-gg"></i> <span>Tarifa Parametrizable</span>
                            </a>
                        </li>
						<li>
                            <a href="<?php echo site_url('tipo_aporte/index');?>">
                                <i class="fa fa-american-sign-language-interpreting"></i> <span>Tipo Aporte</span>
                            </a>
                        </li>
						<li>
                            <a href="<?php echo site_url('tipo_asociado/index');?>">
                                <i class="fa fa-group"></i> <span>Tipo Asociado</span>
                            </a>
                        </li>
						<li>
                            <a href="<?php echo site_url('tipo_multa/index');?>">
                                <i class="fa fa-cc-mastercard"></i> <span>Tipo Multa</span>
                            </a>
                        </li>
						<li>
                            <a href="<?php echo site_url('tipo_usuario/index');?>">
                                <i class="fa fa-address-book"></i> <span>Tipo Usuario</span>
                            </a>
                        </li>
						<li>
                            <a href="<?php echo site_url('usuario/index');?>">
                                <i class="fa fa-user-circle-o"></i> <span>Usuario</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper"  style="background-image: url('<?php echo base_url("resources/images/system/")."fondo.jpg"; ?>')">
            <!--<div class="content-wrapper" >-->
                <!-- Main content -->
                <section class="content">
                    <?php                    
                    if(isset($_view) && $_view)
                        $this->load->view($_view);
                    ?>                    
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer no-print">
                <strong>Copyright(R) <a href="http://www.passwordbolivia.com/">PASSWORD Ingenieria Hardwrae & Software</a> </strong>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    
                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo site_url('resources/js/bootstrap.min.js');?>"></script>
        <!-- FastClick -->
        <script src="<?php echo site_url('resources/js/fastclick.js');?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo site_url('resources/js/app.min.js');?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo site_url('resources/js/demo.js');?>"></script>
        <!-- DatePicker -->
        <script src="<?php echo site_url('resources/js/moment.js');?>"></script>
        <script src="<?php echo site_url('resources/js/bootstrap-datetimepicker.min.js');?>"></script>
        <script src="<?php echo site_url('resources/js/global.js');?>"></script>
    </body>
</html>
