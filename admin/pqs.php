<?php
session_start();
require_once "../conexion.php";

/*$resultado = $conexion->query("select pqs.*, pqs.num_pq as pregunta
from altas inner join pqs on altas.num_pq = pqs.num_pq")or die ($conexion->error);*/
$resultado = $conexion->query("SELECT * from pqs")or die ($conexion->error);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manager</title>
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
    <!--Tabla-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <!--<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>-->
    <link rel="stylesheet" href="../dist/css/select2.css">
    

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
                            <h1 class="m-2">Altas PQ</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6 text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                <i class="fa fa-plus mr-2"></i>Alta nueva PQ</button>
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
                        Se ha dado de alta correctamente
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php  } ?>


                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Listado PQ's</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>PQ</td>
                                        <td>Área de auditoría</td>
                                        <td>Área AFAC</td>
                                        <td>Elemento critico</td>
                                        <td>Pregunta de protocolo (PQ)</td>
                                        <td>Orientación para el examen de pruebas</td>
                                        <td>Incisos</td>
                                        <td>Documentos de referencia</td>
                                        <td>Editar</td>
                                        <td>Eliminar</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                            while($fila= mysqli_fetch_array($resultado)){
                          ?>
                                    <tr>
                                        <td><?php echo $fila['num_pq'];?></td>
                                        <td><?php echo $fila['area'];?></td>
                                        <td><?php echo $fila['area_afac'];?></td>
                                        <td><?php echo $fila['elemento'];?></td>
                                        <td><?php echo $fila['pregunta'];?></td>
                                        <td><?php echo $fila['orientacion'];?></td>
                                        <td><?php echo $fila['inciso'];?></td>
                                        <td><?php echo $fila['documentos'];?></td>

                                        <td><button class="btn btn-success btnEditar" data-toggle="modal"
                                            data-target="#modalEditar" onclick="infoEdit(<?php echo $fila['id_pq'];?>)">
                                            <i class="fa fa-edit"></i>
                                        </button></td>

                                        <td><button class="btn btn-danger btnEliminar"
                                            data-id="<?php echo $fila['id_pq'];?>" data-toggle="modal"
                                            data-target="#modalEliminar"><i class="fa fa-trash"></i>
                                        </button></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <!-- Modal Agregar-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form id="form_pqs" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Dar de alta PQ</h5>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Número de PQ</label>
                                    <input type="text" name="num_pq" placeholder="Número de PQ" id="num_pq"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="area">Área asignada</label>
                                    <select class="js-example-basic-multiple" name="area[]" id="area"
                                        multiple="multiple" style="width: 100%" required data-placeholder="Seleccione área">
                                        <!--Se le pone plugin para selección multiple-->
                                        <?php
                                            $res= $conexion->query("select * from  areas");
                                            while($fila=mysqli_fetch_array($res)){
                                            echo '<option value="'.$fila['areas'].'">'.$fila['areas'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group" id="choices-multiple-remove-button">
                                    <label for="area_afac">Área AFAC</label>
                                    <select class="js-example-basic-multiple" name="area_afac[]" id="area_afac "
                                        multiple="multiple" style="width: 100%" required data-placeholder="Seleccione área AFAC">
                                        <!--Se le pone plugin para selección multiple-->
                                        <?php
                                            $res= $conexion->query("select * from  areas_afac");
                                            while($fila=mysqli_fetch_array($res)){
                                            echo '<option value="'.$fila['area'].'">'.$fila['area'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="elemento">Elemento critico</label>
                                    <select name="elemento" id="elemento" class="form-control" required>
                                        <option>Elemento critico</option>
                                        <?php
                                            $res= $conexion->query("select * from  elemento");
                                            while($fila=mysqli_fetch_array($res)){
                                            echo '<option value="'.$fila['elemento'].'">'.$fila['elemento'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pregunta">Pregunta de protócolo (PQ)</label>
                                    <textarea class="form-control" id="pregunta" name="pregunta"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="orientacion">Orientación para el examen de pruebas</label>
                                    <textarea class="form-control" id="orientacion"
                                        name="orientacion"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inciso">Inciso</label>
                                    <textarea class="form-control" id="inciso" name="inciso"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="documentos">Documentos de referencia</label>
                                    <textarea class="form-control" id="documentos"
                                        name="documentos"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="button" onclick="guardarpq()" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Eliminar -->
        <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminarLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEliminarLabel">Eliminar PQ</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Desea eliminar esta PQ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger eliminar" data-dismiss="modal">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Editar -->
        <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form method="POST" enctype="multipart/form-data">
                        <!--  action="./editarpq.php"-->
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditarLabel">Actualizar PQ</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="idEdit" name="id" class="form-control">
                            <div class="form-group">
                                <label for="num_pq">Número de PQ</label>
                                <input type="text" name="num_pq" placeholder="Número de PQ" id="num_pq1"
                                    class="form-control" required disabled>
                                <!--readonly-->
                            </div>
                            <div class="form-group">
                                <label for="area">Área</label>
                                <select class="js-example-basic-multiple" name="area1[]" id="area1" multiple="multiple"
                                    style="width: 100%" required>
                                    <!--Se le pone plugin para selección multiple-->
                                    <?php
                                            $res= $conexion->query("select * from  areas");
                                            while($fila=mysqli_fetch_array($res)){
                                            echo '<option value="'.$fila['areas'].'">'.$fila['areas'].'</option>';
                                            }
                                        ?>
                                </select>
                            </div>
                            <div class="form-group">
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
                            <div class="form-group">
                                <label for="elemento">Elemento critico</label>
                                <select name="elemento" id="elemento1" class="form-control" required>
                                    <?php
                                        $res= $conexion->query("select * from  elemento");
                                        while($fila=mysqli_fetch_array($res)){
                                        echo '<option value="'.$fila['elemento'].'">'.$fila['elemento'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pregunta">Pregunta de protócolo (PQ)</label>
                                <textarea class="form-control" id="pregunta1" rows="3" name="pregunta"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="orientacion">Orientación para el examen de pruebas</label>
                                <textarea class="form-control" id="orientacion1" rows="3" name="orientacion"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inciso">Inciso</label>
                                <textarea class="form-control" id="inciso1" rows="3" name="inciso"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="documentos">Documentos de referencia</label>
                                <textarea class="form-control" id="documentos1" rows="3" name="documentos"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" onclick="editar_pq()" class="btn btn-primary editar">Actualizar
                                </buttton>
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
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <!-- Agregar, Editar y Eliminar -->
    <script src="../js/pqseditar.js"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>-->
    <script src="../dist/js/select2.js"></script>
    <script>
    $(document).ready(function() {
        $('#example1').DataTable({
            "scrollX": true
        });
    });
    </script>
    <script>
    multiselect(); //se manda a llamar la función 
    </script>
</body>

</html>