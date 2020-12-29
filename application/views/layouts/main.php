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
        $rolusuario = $session_data['rol'];
        //var_dump($rolusuario);
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
                                    <?php
                                    if(isset($session_data['el_asociado'])){
                                        $imagen_thumb = "asociados/".$session_data['thumb'];
                                        $imagen_asocus = "asociados/".$session_data['foto_asoc'];
                                        $alt = "Imagen Asociado";
                                        $tipo_uusario = "";
                                    }else{
                                        $imagen_thumb = "usuarios/".$session_data['thumb'];
                                        $imagen_asocus = "usuarios/".$session_data['imagen_usu'];
                                        $alt = "Imagen Usuario";
                                        $tipo_uusario = "- ".$session_data['tipo_usuario'];
                                    } ?>
                                    <img src="<?php echo site_url('resources/images/'.$imagen_thumb);?>" class="user-image" alt="<?php echo $alt; ?>">
                                    <span class="hidden-xs"><?php echo $session_data['login_usu']?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <?php if(isset($session_data['thumb'])){ ?>
                                        <img src="<?php echo site_url('resources/images/'.$imagen_asocus);?>" class="img-circle" alt="<?php echo $alt; ?>">
                                        <?php }else{ ?>
                                        <img src="<?php echo site_url('resources/images/usuarios/default.jpg');?>" class="img-circle" alt="<?php echo $alt; ?>">
                                        <?php } ?>
                                    <p>
                                        <?php echo $session_data['nombre_usu']?> <?php echo $tipo_uusario; ?>
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
                            <img src="<?php echo site_url('resources/images/'.$imagen_thumb);?>" class="img-circle" alt="<?php echo $alt; ?>">
                        </div>
                        <div class="pull-left info">
                            <div  style=" white-space: normal; word-wrap: break-word;"><?php echo $session_data['nombre_usu']?></div>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MENU PRINCIPAL</li>
                        <?php if(isset($session_data['el_asociado'])){ ?>
                            <li>
                                <a href="<?php echo site_url('asociado/dashboard');?>">
                                    <i class="fa fa-tint"></i> <span>Consumo</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('asociado/cambiarinf');?>">
                                    <i class="fa fa-id-card"></i> <span>Asociado</span>
                                </a>
                            </li>
                        <?php }else{ ?>
                        <li>
                            <a href="<?php echo site_url('dashboard');?>">
                                <i class="fa fa-dashboard"></i> <span>Panel de Control</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-connectdevelop"></i> <span>Operaciones</span>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                if($rolusuario[400-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li class="active">
                                    <a href="<?php echo site_url('lectura/lecturas');?>"><i class="fa fa-book"></i> Lecturas</a>
                                </li>
                                <?php }
                                if($rolusuario[404-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('factura/cobranza');?>"><i class="fa fa-list-alt"></i> Factura(Cobranza)</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-dollar"></i> <span>Aportes/Multas</span>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                if($rolusuario[424-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('aporte');?>"><i class="fa fa-credit-card-alt"></i> Aportes</a>
                                </li>
                                <?php }
                                if($rolusuario[427-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('multum');?>"><i class="fa fa-money"></i> Multas</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php
                        if($rolusuario[418-1]['rolusuario_asignado'] == 1){
                        ?>
                        <li>
                            <a href="<?php echo site_url('asociado/index');?>">
                                <i class="fa fa-address-card-o"></i> <span>Asociado</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php
                        if($rolusuario[451-1]['rolusuario_asignado'] == 1){
                        ?>
                        <li>
                            <a href="<?php echo site_url('descuento');?>">
                                <i class="fa fa-sort-amount-asc"></i> <span>Descuento</span>
                            </a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-money"></i> <span>Ingresos/Egresos</span>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                if($rolusuario[416-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li class="active">
                                    <a href="<?php echo site_url('ingreso/index');?>"><i class="fa fa-arrow-down"></i> <span>Ingreso</span></a>
                                </li>
                                <?php }
                                if($rolusuario[417-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('egreso/index');?>"><i class="fa fa-arrow-up"></i> <span>Egreso</span></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-cubes"></i> <span>Categoria</span>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                if($rolusuario[436-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li class="active">
                                    <a href="<?php echo site_url('categoria');?>"><i class="fa fa-group"></i> Asociado</a>
                                </li>
                                <?php }
                                if($rolusuario[437-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('diametrored');?>"><i class="fa fa-support"></i> Diametro de Red</a>
                                </li>
                                <?php }
                                if($rolusuario[439-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('documento');?>"><i class="fa fa-book"></i> Documento</a>
                                </li>
                                <?php }
                                if($rolusuario[441-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('categoria_egreso');?>">
                                        <i class="fa fa-list-ol"></i> <span>Egreso</span>
                                    </a>
                                </li>
                                <?php }
                                if($rolusuario[442-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('expedido');?>"><i class="fa fa-reorder"></i> Expedido C.I.</a>
                                </li>
                                <?php }
                                if($rolusuario[440-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('categoria_ingreso/index');?>">
                                        <i class="fa fa-server"></i> <span>Ingreso</span>
                                    </a>
                                </li>
                                <?php }
                                if($rolusuario[443-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('modelo_medidor');?>"><i class="fa fa-certificate"></i> Modelo Medidor</a>
                                </li>
                                <?php }
                                if($rolusuario[445-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('sistema_red');?>"><i class="fa fa-sitemap"></i> Sistema Red</a>
                                </li>
                                <?php }
                                if($rolusuario[446-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('tipo_aporte');?>"><i class="fa fa-american-sign-language-interpreting"></i> <span>Tipo Aporte</span></a>
                                </li>
                                <?php }
                                if($rolusuario[447-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('tipo_asociado');?>"><i class="fa fa-list-ul"></i> Tipo Asociado</a>
                                </li>
                                <?php }
                                if($rolusuario[448-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('tipo_inmueble');?>"><i class="fa fa-building-o"></i> Tipo Inmueble</a>
                                </li>
                                <?php }
                                if($rolusuario[449-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('tipo_multa');?>"><i class="fa fa-cc-mastercard"></i> <span>Tipo Multa</span></a>
                                </li>
                                <?php }
                                if($rolusuario[450-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('zona');?>"><i class="fa fa-map-marker"></i> Zona</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-sliders"></i> <span>Configuracion</span>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                if($rolusuario[433-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li class="active">
                                    <a href="<?php echo site_url('parametro');?>"><i class="fa fa-check-square"></i> Parametro</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-cogs"></i> <span>Parametros</span>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                if($rolusuario[438-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li class="active">
                                    <a href="<?php echo site_url('direccion_orden');?>"><i class="fa fa-address-book"></i> Dirección</a>
                                </li>
                                <?php }
                                if($rolusuario[121-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('empresa');?>"><i class="fa fa-bank"></i> Empresa</a>
                                </li>
                                <?php }
                                if($rolusuario[122-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('estado');?>"><i class="fa fa-toggle-on"></i> Estado</a>
                                </li>
                                <?php }
                                if($rolusuario[434-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('me');?>"><i class="fa fa-database"></i> <span>Mes</span></a>
                                </li>
                                <?php }
                                if($rolusuario[444-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('servicio');?>"><i class="fa fa-tasks"></i> Servicio</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-clipboard"></i> <span>Reportes</span>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                if($rolusuario[409-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li class="active">
                                    <a href="<?php echo site_url('reportes');?>"><i class="fa fa-indent"></i> Cobros por Servicios (lec)</a>
                                </li>
                                <?php }
                                if($rolusuario[410-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('reportes/ingresof');?>"><i class="fa fa-list-alt"></i> Cobros por Servicios</a>
                                </li>
                                <?php }
                                if($rolusuario[411-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('reportes/deudores');?>"><i class="fa fa-money"></i> Deudores</a>
                                </li>
                                <?php }
                                if($rolusuario[412-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('reportes/encorte');?>"><i class="fa fa-dollar"></i> En Corte</a>
                                </li>
                                <?php }
                                if($rolusuario[413-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('reportes/movimiento');?>"><i class="fa fa-exchange"></i> Movimiento Diario</a>
                                </li>
                                <?php }
                                if($rolusuario[414-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('reportes/mensual');?>"><i class="fa fa-calendar"></i> Mensual</a>
                                </li>
                                <?php }
                                if($rolusuario[415-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('reportes/mensuales');?>"><i class="fa fa-calendar"></i> Mensuales</a>
                                </li>
                                <?php }
                                if($rolusuario[416-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('reportes/ingreso');?>"><i class="glyphicon glyphicon-save"></i> Ingresos</a>
                                </li>
                                <?php }
                                if($rolusuario[417-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('reportes/egreso');?>"><i class="glyphicon glyphicon-open"></i> Egresos</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php
                            if($rolusuario[435-1]['rolusuario_asignado'] == 1){
                        ?>
                        <li>
                            <a href="<?php echo site_url('tarifa/index');?>">
                                <i class="fa fa-stack-overflow"></i> <span>Tarifa</span>
                            </a>
                        </li>
                        <?php }
                            if($rolusuario[149-1]['rolusuario_asignado'] == 1){
                        ?>
                        <li>
                            <a href="<?php echo site_url('dosificacion');?>"><i class="fa fa-list-alt"></i> Dosificación</a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-lock"></i> <span>Seguridad</span>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                    if($rolusuario[145-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li class="active">
                                    <a href="<?php echo site_url('rol');?>"><i class="fa fa-gg"></i> Rol</a>
                                </li>
                                <?php }
                                if($rolusuario[147-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('tipo_usuario');?>"><i class="fa fa-address-book"></i> Tipo Usuario</a>
                                </li>
                                <?php }
                                if($rolusuario[148-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('usuario');?>"><i class="fa fa-users"></i> Usuario</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
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
