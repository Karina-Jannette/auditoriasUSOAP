<?php
    session_start();
    require_once "../conexion.php";
    $resultado = $conexion->query("SELECT * from anexos")or die ($conexion->error);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Anexos</title>
    <link rel="shortcut icon" href="../images/afac_logo.png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./layouts/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./layouts/css/adminlte.min.css">
    <!--Tabla-->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="./layouts/css/to_do.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet" />
    <!-- bootstrap 5.x or 4.x is supported. You can also use the bootstrap css 3.3.x versions -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        crossorigin="anonymous">
    <!-- default icons used in the plugin are from Bootstrap 5.x icon library (which can be enabled by loading CSS below) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
        crossorigin="anonymous">
    <!-- the fileinput plugin styling CSS file -->
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        <?php include "./layouts/header.php";?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-2">Alta Anexos</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <section class="content">
                <div>
                    <!-- general form elements -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Añadir anexo</h3>
                        </div>
                        <!-- /.card-header -->
                        <form role="form">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label for="...">...</label>
                                            <input type="..." class="form-control" id="..." placeholder="...">
                                        </div>
                                        <div class="form-group">
                                            <label for="...">...</label>
                                            <input type="..." class="form-control" id="..." placeholder="...">
                                        </div>
                                        <div>
                                            <label for="">Áreas AFAC</label>
                                            <select class="js-example-basic-multiple" name="area_afac[]" id="area_afac"
                                                multiple="multiple" style="width: 100%" required>
                                                <!--Se le pone plugin para selección multiple-->
                                                <?php
                                                    $res= $conexion->query("select * from  areas_afac");
                                                    while($fila=mysqli_fetch_array($res)){
                                                        echo '<option value="'.$fila['area'].'">'.$fila['area'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label for="...">...</label>
                                            <input type="..." class="form-control" id="..." placeholder="...">
                                        </div>
                                        <div class="form-group">
                                            <label for="...">...</label>
                                            <input type="..." class="form-control" id="..." placeholder="...">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label for="...">...</label>
                                            <input type="..." class="form-control" id="..." placeholder="...">
                                        </div>
                                        <div class="form-group">
                                            <label for="...">...</label>
                                            <input type="..." class="form-control" id="..." placeholder="...">
                                        </div>
                                    </div>
                                    <!--Button alta-->
                                    <div class="footer">
                                        <button type="submit" class="btn btn-success">Dar de alta</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                    <!--Subir archivos-->
                    <div class="card text-center card-info">
                        <div class="card-header">
                            <h3 class="card-title">Agregar anexos mediante archivos</h3>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="InputFile">Subir archivo(s) para dar de alta anexos</label>
                                    <div class="file-loading">
                                        <input id="archivos" name="archivos[]" type="file" multiple=true class="file"
                                            data-allowed-file-extensions='["csv", "txt", "xlsx"]'>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- jQuery -->
    <script src="./layouts/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="./layouts/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 4 -->
    <script src="./layouts/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <!--Scripts para ingresar datos y listado To do-->
    <script src="../js/anexos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
    multiselect();
    </script>
    <!--Subir archivos-->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/buffer.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/filetype.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/sortable.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/piexif.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
    <!--Script para  el lenguaje-->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/ES.js"></script>
    <script>
        $("#archivos").fileinput({
            uploadUrl: "upload.php",
            auloadsAsync: false,
            minFileCount: 1,
            MaxFileCount: 20,
            showUpload: false,
            showRemove: false,
            initialPreview: [

            ],
            initialPreviewConfig: []
        }).on("filebatchselected", function(event,files){
            $("archivos").fileinput("upload");
        });
    </script>
</body>

</html>