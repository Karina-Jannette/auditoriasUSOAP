<?php
    session_start();
    require_once "../conexion.php";
    $resultado = $conexion->query("SELECT * from usuarios")or die ($conexion->error);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alta usuarios</title>
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
    <!--Tabla y multiselect-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                            <h1 class="m-2">Usuarios</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6 text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                <i class="fa fa-plus mr-2"></i>Dar de alta usuario</button>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de usuarios</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>Número de empleado</td>
                                        <td>Rol</td>
                                        <td>Área</td>
                                        <td>Nombre(s)</td>
                                        <td>Apellidos</td>
                                        <td>Editar</td>
                                        <td>Eliminar</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($fila= mysqli_fetch_array($resultado)){
                                    ?>
                                    <tr>
                                        <td><?php echo $fila['num_empleado'];?></td>
                                        <td><?php echo $fila['id_rol'];?></td>
                                        <td><?php echo $fila['id_area'];?></td>
                                        <td><?php echo $fila['nombre'];?></td>
                                        <td><?php echo $fila['apellido'];?></td>

                                        <td><button class="btn btn-success btnEditar" data-toggle="modal"
                                                data-target="#modalEditar"
                                                onclick="datosEdit(<?php echo $fila['id_usuario'];?>)">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </td>
                                        <td><button class="btn btn-danger btnEliminar"
                                                data-id="<?php echo $fila['id_usuario'];?>" data-toggle="modal"
                                                data-target="#modalEliminar">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="form_usuarios" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Dar de alta usuario</h5>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="num_empleado">Número de empleado</label>
                                    <input type="text" name="num_empleado" placeholder="Número de empleado"
                                        id="num_empleado" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_rol">Rol</label>
                                    <select name="id_rol" id="id_rol" class="form-control" required>
                                        <option>Rol</option>
                                        <?php
                                          $res= $conexion->query("select * from rol");
                                          while($fila=mysqli_fetch_array($res)){
                                          echo '<option value="'.$fila['id_rol'].'">'.$fila['nombre'].'</option>';
                                          }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_area">Área asignada</label>
                                    <select name="id_area" id="id_area" class="form-control" required>
                                        <option>Área empleado</option>
                                        <?php
                                          $res= $conexion->query("select * from areas");
                                          while($fila=mysqli_fetch_array($res)){
                                          echo '<option value="'.$fila['id_area'].'">'.$fila['areas'].'</option>';
                                          }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" placeholder="Nombre" id="nombre"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" name="apellido" placeholder="Apellido" id="apellido"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="pass">Contraseña</label>
                                    <input type="text" name="pass" placeholder="Contraseña" id="pass"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="button"  onclick="guardar()" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Eliminar -->
        <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true"
            data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEliminarLabel">Eliminar Usuario</h5>
                    </div>
                    <div class="modal-body">
                        ¿Desea eliminar este Usuario?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger eliminar" data-dismiss="modal">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Editar -->
        <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true"
            data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="editarusuario.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditarLabel">Actualizar datos usuario</h5>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="idEdit" name="idEdit" class="form-control">
                            <div class="form-group">
                                <label for="num_empleado">Número de empleado</label>
                                <input type="text" name="num_empleado" placeholder="Número de empleado"
                                    id="num_empleado1" class="form-control" required disabled>
                            </div>
                            <div class="form-group">
                                    <label for="id_rol1">ID Rol</label>
                                    <select name="id_rol1" id="id_rol1" class="form-control" required>
                                        <option>Rol</option>
                                        <?php
                                          $res= $conexion->query("select * from rol");
                                          while($fila=mysqli_fetch_array($res)){
                                          echo '<option value="'.$fila['id_rol'].'">'.$fila['nombre'].'</option>';
                                          }
                                        ?>
                                    </select>
                                </div>
                            <div class="form-group">
                                <label for="id_area1">Área asignada</label>
                                <select name="id_area1" id="id_area1" class="form-control" required>
                                    <?php
                                      $res= $conexion->query("select * from  areas");
                                      while($fila=mysqli_fetch_array($res)){
                                      echo '<option value="'.$fila['id_area'].'">'.$fila['areas'].'</option>';
                                      }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" placeholder="Nombre" id="nombre1" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido" placeholder="Apellido" id="apellido1"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-success" onclick="editUsuario()">Actualizar</button>
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
    <!--Se llama al script de conexión-->
    <script src="../js/usuario.js"></script>
    <!--Tabla y multiselect-->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    multiselect(); //se manda a llamar la función
    </script>
    <script>
    $(document).ready(function() {
        $('#example1').DataTable({
            "scrollX": true
        });
    });
    </script>
</body>
</html>