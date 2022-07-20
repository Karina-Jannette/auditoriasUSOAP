<?php
    session_start();
    require_once "../conexion.php";

    $resultado3 = $conexion->query("SELECT * from sub_fracciones")or die ($conexion->error);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sub fracciones</title>
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


</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        <?php include "./layouts/header.php";?>
        <!--Obliga a iniciar sesión-->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-2">Sub fracciones</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6 text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#ModalAgregar">
                                <i class="fa fa-plus mr-2"></i>Registrar Anexo</button>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!--Menú-->
            <div class="menu">
                <ul class="nav nav-tabs justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link anexos" id="menanexos" href="anexos.php" type="button">Anexos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fracciones" id="menfracciones" href="fracciones.php" type="button">Fracciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link sub_fracciones active" id="mensub_fraccion" href="sub.php" type="button">Sub
                            fracciones</a>
                    </li>
                </ul>
            </div>

            <!--Main content-->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <!--Inicio tabla Sub-->
                        <div class="card-body" id="tabla_sub">
                            <table id="tablaSub" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sub fracción</th>
                                        <th>Descripción</th>
                                        <th>Área</th>
                                        <th>Área AFAC</th>
                                        <th>Incisos</th>
                                        <th>Notas</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($fila= mysqli_fetch_array($resultado3)){
                                    ?>
                                    <tr>
                                        <td><?php echo $fila['num_sub'];?></td>
                                        <td><?php echo $fila['detalles'];?></td>
                                        <td><?php echo $fila['area'];?></td>
                                        <td><?php echo $fila['area_afac'];?></td>
                                        <td><?php echo $fila['incisos'];?></td>
                                        <td><?php echo $fila['notas'];?></td>

                                        <td><button class="btn btn-success editarSub"
                                                data-target="#EditarSub" data-toggle="modal"
                                                onclick="editSub(<?php echo $fila['id_sub'];?>)"><i
                                                    class="fa fa-edit"></i></button></td>

                                        <td><button class="btn btn-danger eliminarSub" data-toggle="modal"
                                        onclick="eliminarsub(<?php echo $fila['id_sub'];?>)">
                                        <i class="fa fa-trash"></i></button></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Modal Agregar-->
            <div class="modal fade" id="ModalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
                <!--Style: permite que al salir del otro modal no se quede estatico y pueda tener el scroll-->
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Alta anexo </h5>
                            </div>

                            <!--Modal ALTA-->
                            <div class="modal-body">
                                <div class="modal-body">
                                    <!--SUB FRACCION-->
                                    <div id="subfracciones" class="form-group">
                                        <div id="addsub" name="addsub"
                                            class="form-group table table-condensed table-striped" style="width:100%">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 form-group">
                                                <label for="sub_fraccion">Sub fracción</label>
                                                <input type="text" class="form-control" id="sub_fraccion"
                                                    name="sub_fraccion" placeholder="Núm. Sub" required>
                                            </div>
                                            <div class="col form-group">
                                                <label for="detallest">Detalles</label>
                                                <textarea name="detallest" id="detallest" class="form-control"
                                                    required></textarea>
                                            </div>
                                        </div>
                                        <label>Seleccione las áreas correspondientes para la sub fracción</label>
                                        <div class="row">
                                            <div class="col form-group">
                                                <label for="area">Área asignada</label>
                                                <select class="js-example-basic-multiple" name="area[]" id="areat"
                                                    multiple="multiple" style="width: 100%" required>
                                                    <!--Se le pone plugin para selección multiple-->
                                                    <?php
                                                        $res= $conexion->query("select * from  areas");
                                                        while($fila=mysqli_fetch_array($res)){
                                                            echo '<option value="'.$fila['areas'].'">'.$fila['areas'].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col form-group">
                                                <label for="area_afac">Área AFAC</label>
                                                <select class="js-example-basic-multiple" name="area_afac[]"
                                                    id="area_afact" multiple="multiple" style="width: 100%" required>
                                                    <!--Se le pone plugin para selección multiple-->
                                                    <?php
                                                        $res= $conexion->query("select * from  areas_afac");
                                                        while($fila=mysqli_fetch_array($res)){
                                                            echo '<option value="'.$fila['area'].'">'.$fila['area'].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="incisos3" class="form-group">
                                            <label for="incisos">Incisos</label>
                                            <textarea id="incisost" name="incisos3" class="form-control"
                                                required></textarea>
                                        </div>
                                        <div id="notas3" class="form-group">
                                            <label for="notas">Notas</label>
                                            <textarea id="notast" name="notas3" class="form-control"
                                                required></textarea>
                                        </div>
                                        <br>
                                        <div class="align-items-right">
                                            <button type="button" class="btn btn-primary btn-sm" id="agregarsub"
                                                onclick="guardarsub()">Agregar sub fracción</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Botones para guardar el Anexo-->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="button" onclick="guardar()" class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--Modal editar Sub fracciones-->
            <div class="modal fade" id="EditarSub" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Editar Sub fracción</h5>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label for="sub_fraccion1">Sub fracción</label>
                                        <input type="text" class="form-control" id="sub_fraccion1" name="sub_fraccion1"
                                            placeholder="Núm. Sub" disabled>
                                    </div>
                                    <div class="col form-group">
                                        <label for="detallest">Detalles</label>
                                        <textarea name="detalles1" id="detalles1" class="form-control"
                                            required></textarea>
                                    </div>
                                </div>
                                <label>Seleccione las áreas correspondientes para la sub fracción</label>
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="area">Área asignada</label>
                                        <label id="asignada" name="asignada" for="area">Área asignada</label>
                                        <select class="js-example-basic-multiple" name="area1[]" id="area1"
                                            multiple="multiple" style="width: 100%" required>
                                            <!--Se le pone plugin para selección multiple-->
                                            <?php
                                                $res= $conexion->query("select * from  areas");
                                                while($fila=mysqli_fetch_array($res)){
                                                    echo '<option value="'.$fila['areas'].'">'.$fila['areas'].'</option>';
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="col form-group">
                                        <label for="area_afac">Área AFAC</label>
                                        <select class="js-example-basic-multiple" name="area_afac1[]" id="area_afac1"
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
                                </div>
                                <div id="incisos3" class="form-group">
                                    <label for="incisos">Incisos</label>
                                    <textarea id="incisos1" name="incisos1" class="form-control" required></textarea>
                                </div>
                                <div id="notas3" class="form-group">
                                    <label for="notas">Notas</label>
                                    <textarea id="notas1" name="notas1" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-success" onclick="editarsub()">Guardar cambios</button>
                            </div>
                        </form>
                    </div>
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
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <!--Scripts para ingresar datos y listado To do-->
    <script src="../js/anexos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <!--SCRIPT de diseño-->
    <script>
    $(document).ready(function() {
        $('#tablaSub').DataTable({
            "scrollX": true,
            "responsive": true,
            "autoWidth": false
        });
    });

    </script>
    <script>
    multiselect();
    </script>
    <script>
    function mostrar() {
        document.getElementById('fraccion').style.display = 'block';
    }

    function ocultar() {
        document.getElementById('fraccion').style.display = 'none';
    }

    function mostrar_sub() {
        document.getElementById('subfracciones').style.display = 'block';
    }
    </script>
</body>

</html>