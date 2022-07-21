<?php
    session_start();
    require_once "../conexion.php";

    $resul = $conexion->query("SELECT * from areas_afac")or die ($conexion->error);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Áreas AFAC</title>
    <link rel="shortcut icon" href="../images/afac_logo.png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./layouts/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./layouts/css/adminlte.min.css">



</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include "./layouts/header.php";?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-2">Áreas de auditoría AFAC</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?php
                        if(isset($_GET['error'])){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_GET['error']; ?>
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php  } ?>

                    <?php
                        if(isset($_GET['success'])){
                    ?>
                    <div class="alert alert-success" role="alert">
                        Se ha insertado correctamente
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php  } ?>


                        <!--Áreas AFAC-->
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Áreas AFAC
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <!-- Muestra la tabla, con sus apartados y datos -->
                                    <div class="card-body">
                                        <div class="card-body text-right">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal2">
                                                <i class="fa fa-plus mr-2"></i>Registrar Área AFAC
                                            </button>
                                        </div><!-- /.col -->
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Id Area</th>
                                                    <th>Área de auditoría:</th>
                                                    <th>Editar</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    while($fila= mysqli_fetch_array($resul)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $fila['id_areaafac'];?></td>
                                                    <td><?php echo $fila['area'];?></td>

                                                    <td><button class="btn btn-success btnEditar"
                                                            data-id="<?php echo $fila['id_areaafac'];?>"
                                                            data-area="<?php echo $fila['area'];?>" data-toggle="modal"
                                                            data-target="#modalEditar2">
                                                            <i class="fa fa-edit"></i></button></td>

                                                    <td><button class="btn btn-danger btnEliminar"
                                                            data-id="<?php echo $fila['id_areaafac'];?>"
                                                            data-toggle="modal" data-target="#modalEliminar2">
                                                            <i class="fa fa-trash"></i></button></td>

                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <!-- Modal registro área AFAC-->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="./consultas/insertararea_afac.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registrar Área AFAC</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="area">Área AFAC</label>
                                <input type="text" name="area" placeholder="area" id="area" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Eliminar-->
        <div class="modal fade" id="modalEliminar2" tabindex="-1" aria-labelledby="modalEliminarLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEliminarLabel">Eliminar Área de auditoría</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Desea eliminar a esta Área de auditoría?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger eliminar" data-dismiss="modal">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal Editar-->
        <div class="modal fade" id="modalEditar2" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="./consultas/editar_areaAfac.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditarLabel">Actualizar datos área</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="idEdit2" name="idEdit2" class="form-control"> <!--Se tuvo que cambiar el id en EDIT para poder seguir-->
                            <div class="form-group">
                                <label for="area">Área de auditoría</label>
                                <input type="text" name="area" placeholder="area" id="area1" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary editar">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include "./layouts/footer.php";?>
    </div>

    <!-- jQuery -->
    <script src="./layouts/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="./layouts/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 4 -->
    <script src="./layouts/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!--JS para hacer los llamados alta, editar y eliminar-->
    <script src="../js/area_afac.js"></script>

</body>

</html>