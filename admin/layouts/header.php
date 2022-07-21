<?php
    // Mandamos llamar nuestra BD
    include_once ("validar_sesion1.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <!--<form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>-->

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-ligth-dark elevation-4">
            <!-- Brand Logo -->
            <a class="brand-link">
                <img src="../images/afac_logo.png" class="brand-image img-circle elevation-2" style="opacity: 1">
                <span class="brand-text font-weight-light">Auditorías USOAP</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="usuario.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a class="d-block"> Usuario:
                            <br> <?=$_SESSION['usuario']?> </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview">
                            <a href="./inicio.php" class="nav-link active">
                                <i class="nav-icon fa fa-home"></i>
                                <p>
                                    Inicio
                                </p>
                            </a>
                            <!--<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>-->
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-check"></i>
                                <p>
                                    PQ's
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./pqs.php" class="nav-link">
                                        <i class='fas fa-edit'></i>
                                        <p>Alta PQ's</p>
                                    </a>
                                </li>
                                <!--<li class="nav-item">
                                    <a href="../listado_pqs.php" class="nav-link">
                                        <i class='fas fa-list'></i>
                                        <p>Listado PQ's</p>
                                    </a>
                                </li>-->
                                <li class="nav-item">
                                    <a href="../formulario.php" class="nav-link">
                                        <i class="fas fa-pen"></i>
                                        <p>
                                            Contestar PQ
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="" class="nav-link active">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    Áreas
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./area_afac.php" class="nav-link">
                                        <i class='fas fa-list'></i>
                                        <!--<i class='fas fa-edit'></i>-->
                                        <p>Areas AFAC</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./areauditoria.php" class="nav-link">
                                        <i class='fas fa-list'></i>
                                        <p>Áreas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="./elementos.php" class="nav-link active">
                                <i class="nav-icon fa fa-table"></i>
                                <p>
                                    Elemento critico
                                    <!--<i class="right fas fa-angle-left"></i>-->
                                </p>
                            </a>
                            <!--<ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./areauditoria.php" class="nav-link">
                                    <i class='fas fa-list'></i>
                                        <p>Áreas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="elemento.php" class="nav-link">
                                        <i class='fas fa-list'></i>
                                        <p>Elemento critico</p>
                                    </a>
                                </li>
                            </ul>-->
                        </li>

                        <li class="nav-header">EXTRAS</li>
                        <li class="nav-item has-treeview">
                            <a href="./anexos.php" class="nav-link active">
                                <i class="nav-icon fa fa-table"></i>
                                <p>
                                    Anexos
                                    <!--<i class="right fas fa-angle-left"></i>-->
                                </p>
                            </a>
                            <!--<ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./alta_anexos.php" class="nav-link">
                                        <i class='fas fa-edit'></i>
                                        <p>Alta - Anexos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./anexos.php" class="nav-link">
                                        <i class='fas fa-list'></i>
                                        <p>Listado Anexos</p>
                                    </a>
                                </li>
                            </ul>-->
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    Personas responsables
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./usuario.php" class="nav-link">
                                        <i class="nav-icon fas fa-user-plus"></i>
                                        <p>Alta - Responsables</p>
                                    </a>
                                </li>
                                <!--<li class="nav-item">
                                    <a href="./usuario.php" class="nav-link">
                                        <i class='fas fa-address-book'></i>
                                        <p>Listado Responsable</p>
                                    </a>
                                </li>-->
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    Especialidades
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fa fa-table"></i>
                                <p>
                                    Preguntas pendientes
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-file-alt"></i>
                                        <p>Planes de acción</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-address-book"></i>
                                        <p>Personal responsable</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="./historial.php" class="nav-link active">
                                <i class="fas fa-history"></i>
                                <p>
                                    Historial
                                </p>
                            </a>
                        </li>
                        

                        <li class="nav-header">SESIÓN</li>
                        <li class="nav-item">
                            <a href="../cerrar_sesion.php" class="nav-link active">
                                <i class="fas fa-window-close"></i>
                                <p>
                                    Cerrar Sesión
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
</body>

</html>