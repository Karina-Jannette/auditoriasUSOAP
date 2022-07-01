<?php
// Mandamos llamar nuestra BD
include 'conexion.php';
include_once ("validar_sesion.php");
$resultado = $conexion->query("SELECT * from pqs")or die ($conexion->error);
?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Metas -->
    <title>AUDITORIAS USOAP</title>
    <link rel="shortcut icon" href="images/afac_logo.png">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="apple-touch-icon" href="#" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="css/pogo-slider.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css" />

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd"
                    aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link">Bienvenido: <?=$_SESSION['usuario']?></a></li>
                        <li><a class="nav-link" href="admin/inicio.php">Inicio</a></li>
                        <li><a class="nav-link" href="cerrar_sesion.php">Cerrar Sesion</a></li>
                    </ul>
                </div>
                <!--<div class="search-box">
                    <input type="text" class="search-txt" placeholder="Buscar">
                    <a class="">
                        <span class="fa fa-search" style="font-size: 20px; margin-top: 15px;"
                            styaria-hidden="true"></span>
                    </a>
                </div>-->
            </div>
        </nav>
    </header>
    <!-- End header -->

    <!-- section -->

    <section class="inner_banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="full">
                        <h3>Auditorías USOAP</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end section -->
    <!-- section -->
    <div class="row">
        <div class="full center mt-5">
            <h4>"CMA AUDITORIA USOAP" ATENCIÓN DE PQ'S OACI</h4>
        </div>
    </div>
    <!-- end section -->
    <!-- section -->
    <div class="section layout_padding contact_section" style="background:#f6f6f6;">
        <div class="container">

            <form method="POST" enctype="multipart/form-data"> <!--action="./formulario-insertar.php"-->
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    SECCIÓN GENERAL.- (PARA SER LLENADO POR EL PROCESO PT-08 USOAP)
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col">
                                        <label for="num_pq">Número de PQ </label>
                                        <select name="num_pq" onchange="formllenado()" id="num_pq" class="form-control"
                                            required>
                                            <option>(Seleccione número de PQ)</option>
                                            <?php
                                                $res= $conexion->query("select * from  pqs");
                                                while($fila=mysqli_fetch_array($res)){
                                                    echo '<option value="'.$fila['num_pq'].'">'.$fila['num_pq'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="area">Área de auditoría</label>
                                        <input type="text" name="area" class="form-control" id="area" placeholder=""
                                            required readonly>
                                    </div>
                                    <div class="col">
                                        <label for="elemento">Elemento crítico</label>
                                        <input type="text" name="elemento" class="form-control" id="elemento"
                                            placeholder="" required readonly>
                                        <!--Readonly: es para poner los campos inactivos-->
                                    </div>
                                </div>
                                <br>
                                <div class="row col">
                                    <div class="col">
                                        <label for="">Evaluación de Estatus Actual por el SSP:</label> <br><br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="sin_contestar">Sin contestar</label><br><br>
                                                <input type="text" name="sin_contestar" class="form-control"
                                                    id="sin_contestar" placeholder="" disabled>
                                            </div>
                                            <div class="col">
                                                <label for="satisfactoria">Satisfactoria</label><br><br>
                                                <input type="text" name="satisfactoria" class="form-control"
                                                    id="satisfactoria" placeholder="" disabled>
                                            </div>
                                            <div class="col">
                                                <label for="no_satisfactoria">No satisfactoria</label><br><br>
                                                <input type="text" name="no_satisfactoria" class="form-control"
                                                    id="no_satisfactoria" placeholder="" disabled>
                                            </div>
                                            <div class="col">
                                                <label for="no_aplica">No aplica</label><br><br>
                                                <input type="text" name="no_aplica" class="form-control" id="no_aplica"
                                                    placeholder="" disabled>
                                            </div>
                                            <div class="col">
                                                <div class="col">
                                                    <label for="ssc">SSC</label>
                                                    <input type="text" name="ssc" class="form-control" id="ssc"
                                                        placeholder="" disabled>
                                                </div>
                                                <div class="col">
                                                    <label for="mir">MIR</label>
                                                    <input type="text" name="mir" class="form-control" id="mir"
                                                        placeholder="" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    SECCIÓN I.- DESCRIPCIÓN DE LA PQ Y LOS REQUISITOS DE SOLVENTACIÓN
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="pregunta">Pregunta de protocolo (PQ)</label>
                                    <!-- Default switch -->
                                    <!--<div class="form-check form-switch ">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault" onchange="cambio()"/>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">PQ Inglés</label>
                                    </div>-->
                                    <textarea type="text" name="pregunta" class="form-control" id="pregunta"
                                        rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="orientacion">Orientación para el examen de pruebas</label>
                                    <textarea type="text" name="orientacion" class="form-control" id="orientacion"
                                        rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inciso">Incisos correspondientes</label>
                                    <textarea type="text" name="inciso" class="form-control" id="inciso"
                                        rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="documentos">Documentos de referencia</label>
                                    <textarea type="text" name="documentos" class="form-control" id="documentos"
                                        rows="3"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    SECCIÓN II.- AUTOEVALUACIÓN DE LA PQ (AE)
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <div style='text-align:center'>
                                    Auto Evaluación AE
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="fecha_inicio">Fecha de inicio de atención a la PQ</label>
                                        <input type="date" name="fecha_inicio" class="form-control" id="fecha_inicio"
                                            placeholder="">
                                    </div>
                                    <div class="col">
                                        <label for="fecha_termino">Fecha de término de la AE</label>
                                        <input type="date" name="fecha_termino" class="form-control" id="fecha_termino"
                                            placeholder="">
                                    </div>
                                    <div class="col">
                                        <label for="porcentaje">Porcentaje total actual de la PQ</label>
                                        <input type="text" name="porcentaje" class="form-control" id="porcentaje"
                                            placeholder="">
                                    </div>
                                </div>

                                <br>
                                <p>SECCION II.I Análisis Descriptivo</p>

                                <div class="form-group">
                                    <label for="introduccion">Introducción. (área responsable, funciones
                                        respectivas, obligaciones)</label>
                                    <textarea type="text" name="introduccion" class="form-control" id="introduccion"
                                        rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="fundamentos">Descripción de Fundamentos. (resumen de las referencias
                                        OACI) </label>
                                    <textarea type="text" name="fundamentos" class="form-control" id="fundamentos"
                                        rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cumplimiento">Evaluación de cumplimiento actual. (panorama actual
                                        referente a la PQ) <br>
                                        Alinear respuesta con la Orientación para el examen de pruebas.</label>
                                    <textarea type="text" name="cumplimiento" class="form-control" id="cumplimiento"
                                        rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="intervenciones">Intervenciones de áreas de la AFAC. (quienes y en
                                        que intervienen)</label>
                                    <textarea type="text" name="intervenciones" class="form-control" id="intervenciones"
                                        rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="conclusion">Conclusión de cumplimiento. (total, parcial,
                                        nada)</label>
                                    <textarea type="conclusion" name="conclusion" class="form-control" id="conclusion"
                                        rows="3"></textarea>
                                </div>

                                <br>
                                <p>Sección II.II Información documental para cumplimiento del examen de pruebas</p>

                                <div class="row">
                                    <div class="col">
                                        <label for="pruebas">Pruebas específicas del cumplimiento de la PQ</label>
                                        <input type="text" name="pruebas" class="form-control" id="pruebas"
                                            placeholder="">
                                    </div>
                                    <div class="col">
                                        <label for="responsable">Área / Persona Responsable</label> <br> <br>
                                        <input type="text" name="responsable" class="form-control" id="responsable"
                                            placeholder="">
                                    </div>
                                    <div class="col">
                                        <label for="evidencias">Evidencias:</label> <br><br>
                                        <input type="text" name="evidencias" class="form-control" id="evidencias"
                                            placeholder="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    SECCIÓN III.- PLAN DE ACCIÓN CORRECTIVO PARA LA SOLVENTACIÓN DE LA PQ (CAP)
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <div style='text-align:center'>
                                    Plan de Acción Correctivo (CAP)
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="fecha_inicio_atencion">Fecha de inicio de atención a la
                                            PQ</label>
                                        <input type="text" name="fecha_inicio_atencion" class="form-control"
                                            id="fecha_inicio_atencion" placeholder="">
                                    </div>
                                    <div class="col">
                                        <label for="fecha_termino_cap">Fecha de término del CAP</label>
                                        <input type="text" name="fecha_termino_cap" class="form-control"
                                            id="fecha_termino_cap" placeholder="">
                                    </div>
                                    <div class="col">
                                        <label for="porcentaje_total">Porcentaje total actual de la PQ</label>
                                        <input type="text" name="porcentaje_total" class="form-control"
                                            id="porcentaje_total" placeholder="">
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col">
                                        <label for="actividades">Actividades</label> <br><br>
                                        <input type="text" name="actividades" class="form-control" id="actividades"
                                            placeholder="">
                                    </div>
                                    <div class="col">
                                        <label for="responsable_cap">Área / Persona Responsable</label>
                                        <input type="text" name="responsable_cap" class="form-control"
                                            id="responsable_cap" placeholder="">
                                    </div>
                                    <div class="col">
                                        <label for="inicio_final">Fecha Inicial / Final </label><br><br>
                                        <input type="text" name="inicio_final" class="form-control" id="inicio_final"
                                            placeholder="">
                                    </div>
                                    <div class="col">
                                        <label for="producto">Producto: </label><br><br>
                                        <input type="text" name="producto" class="form-control" id="producto"
                                            placeholder="">
                                    </div>
                                    <div class="col">
                                        <label for="porcentaje_cap">%</label><br><br>
                                        <input type="text" name="porcentaje_cap" class="form-control"
                                            id="porcentaje_cap" placeholder="">
                                    </div>
                                </div>

                                <br>

                                <div class="form-group">
                                    <label for="comentarios">Comentarios generales de la Subdirección de
                                        SSP:</label>
                                    <textarea name="comentarios" class="form-control" id="comentarios"
                                        rows="3"></textarea>
                                </div>


                                <div class="row">
                                    <div class="col">
                                        <label for="fecha_subio_olf">Fecha en que se subió al OLF: </label>
                                        <input type="text" name="fecha_subio_olf" class="form-control"
                                            id="fecha_subio_olf" placeholder="">
                                    </div>
                                    <div class="col">
                                        <label for="fecha_revision_oaci">Fecha de revisión de OACI: </label>
                                        <input type="text" name="fecha_revision_oaci" class="form-control"
                                            id="fecha_revision_oaci" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div>
                        <button type="submit" onclick="guardar_form()" class="btn btn-primary">Guardar</buttton>
                            <!--<a class="btn btn-primary" href="formularioPDF.php" target="_blank">Imprimir</a>-->
                            <!--target abre una nueva página-->
                    </div>

                </div>

            </form>
        </div>
    </div>
    <!-- end section -->

    <!-- End Footer -->

    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="crp">©Auditorías USOAP.</p>
                </div>
            </div>
        </div>
    </div>

    <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>
    <!-- jQuery -->
    <script src="./layouts/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="./layouts/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 4 -->
    <script src="./layouts/bootstrap/js/bootstrap.bundle.min.js"></script>

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
    <script src="js/contact-form-script.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- Extraer y guardar los datos de/en la BD -->
    <script src="js/form-extraer.js"></script>

</body>

</html>

<!--script-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>