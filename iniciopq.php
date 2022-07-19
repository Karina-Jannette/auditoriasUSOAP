<?php
// Mandamos llamar nuestra BD
include 'conexion.php';
include_once ("validar_sesion.php");
?>

<!DOCTYPE html>
<html lang="es">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Metas -->
    <title>AUDITORIA USOAP</title>
	<link rel="shortcut icon" href="images/afac_logo.png">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="apple-touch-icon" href="#" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="css/pogo-slider.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css" />
    <link rel="stylesheet" href="css/card.css">


</head>

<body id="inner_page" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <img src="images/loa2.gif" alt="#" />
        </div>
    </div>
    <!-- end loader -->
    <!-- END LOADER -->

    <!-- Start header -->
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html"><img src="images/afac_logo.png" alt="image"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link" href="cursos1.php">Inicio</a></li>
						<li><a class="nav-link" href="cerrar_sesion.php">Cerrar Sesion</a></li>
                    </ul>
                </div>
                <div class="search-box">
                    <!--<input type="text" class="search-txt" placeholder="Buscar">-->
                    <a class="">
                        <span class="fa fa-search" style="font-size: 20px; margin-top: 15px;" styaria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->

	<!-- section -->
	<div class="section layout_padding padding_bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                            <h2><span>PQ's</span></h2>
                        </div>
					</div>
                </div>
			</div>
        </div>
    </div>

    <div class="container">
		<h1 style="color:#095a83; text-align:center;">Listado de PQ's pendientes</h1>
		<!--<p style="color:#095a83; text-align:center;">Fecha límite para responder: </p>-->
    </div>
	
        
<div style="text-align:center;">
    <table style="margin: 0 auto;" BORDER CELLPADDING=10 CELLSPACING=0>
        <tr bgcolor="#002147" style="color:white" ;>
            <td>PQ</td>
            <td>Fecha de inicio</td>
            <td>Fecha de termino</td>
            <td>Estatus</td>
        </tr>

        <?php
            require_once "conexion.php";
            /* $conexion=conexion(); */

            /* $result = $conexion->query("select cursos.*, profesores.nombre as profesor
            from cursos inner join profesores on cursos.matricula_profesor = profesores.matricula_profesor")or die ($conexion->error); */        

            $sql = "SELECT auditoria.*, pqs.num_pq as num_pq
            from auditoria inner join pqs on pq_pendientes.num_pq = pqs.pq_pendientes";  
            $result= mysqli_query($conexion,$sql);
                while ($mostrar=mysqli_fetch_array($result)){
        ?>
    
        <tr bgcolor="white" onmouseover="this.style.background='#ece8d9';" onmouseout="this.style.background='#095a83'.color='white';">
        <td> <?php echo $mostrar ['num_pq']  ?>  </td>
        <td> <?php echo $mostrar ['inicio_pq'] ?>  </td>
        <td>$ <?php echo $mostrar ['fin_pq'] ?> </td>
        <td> <?php echo $mostrar ['estatus'] ?> </td>

        <?php
            }
        ?>

    </table>

    <progress value="10" max="100">70 %</progress>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4 class="text-center"><strong></strong></h4>
                <hr>
                <div class="profile-card-2"><img src="http://envato.jayasankarkr.in/code/profile/assets/img/profile-2.jpg" class="img img-responsive">
                <div class="profile-name">Contestar PQ</div>
                <div class="profile-username"> </div>
                <div class="profile-icons"><a href="formulario.php"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
            </div>
        </div>
    </div>



    <div class="full center">
        <a class="contact_bt" href="formulario.php">Contestar PQ </a>
    </div>
</div>

        }

    <<div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="crp">© Auditorías USUAP.</p>
                </div>
            </div>
        </div>
    </div>
    <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.pogo-slider.min.js"></script>
    <script src="js/slider-index.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/custom.js"></script>
	
</body>

</html>