<?php
    include("../conexion.php");
    session_start();
    $id_persona = $_SESSION['usuario'];

    $opcion = $_POST["opcion"];
    $informacion = [];

    //CONDICIONES ---------------------------------------------------------------------

    if($opcion === 'guardar'){
        $num_empleado = $_POST['num_empleado'];

        if (comprobacion($num_empleado,$conexion)){
            $id_rol = $_POST['id_rol'];
            $id_area = $_POST['id_area'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $pass = $_POST['pass'];

            if(guardar($id_rol,$num_empleado,$id_area,$nombre,$apellido,$pass,$conexion)){
                echo "0";
            }else{
                echo "1";
            }
        }else{
            echo "2";
        }
    }
    
    //Editar usuario
    if($opcion === 'editUsuario'){
        $id_rol = $_POST['id_rol'];
        $num_empleado = $_POST['num_empleado'];
        $id_area = $_POST['id_area'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];

        if (editUsuario ($id_rol,$num_empleado,$id_area,$nombre,$apellido,$conexion)){
            echo 0;
        }else{
            echo 1;
        }
    }

    //FUNCIONES -----------------------------------------------------------------------
    
    //Función para corroborar que no este el usuario registrado
    function comprobacion($num_empleado,$conexion){
        $query = "SELECT * FROM usuarios WHERE num_empleado = '$num_empleado'";
        $resultado = mysqli_query($conexion,$query);
        if($resultado->num_rows==0){
            return true;
        }else{
            return false;
        }
    }
    
    
    function guardar ($id_rol,$num_empleado,$id_area,$nombre,$apellido,$pass,$conexion){
        $query = "INSERT INTO usuarios VALUES (0, '$id_rol','$num_empleado','$id_area','$nombre','$apellido','$pass')";
        $resultado = mysqli_query($conexion,$query);
        if($resultado){
            return true;
        }else{
            return false;
        }
    }

    function editUsuario($id_rol,$num_empleado,$id_area,$nombre,$apellido,$conexion){
        $query = "UPDATE usuarios SET id_rol=$id_rol, id_area=$id_area, nombre='$nombre', apellido='$apellido' where num_empleado='$num_empleado'";
        $resultado = mysqli_query($conexion,$query);
        if($resultado){
            return true;
        }else{
            return false;
        }
    }

    //Función para cerrar la conexión
    function cerrar($conexion){
        mysqli_close($conexion);
    }

?>