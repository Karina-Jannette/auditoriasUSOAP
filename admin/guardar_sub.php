<?php
    include("../conexion.php");
    session_start();
    $id_persona=$_SESSION['usuario'];

    $opcion = $_POST["opcion"];
    $informacion = [];

    //CONDICIONES---------------------------------------------------
    //Condición para guardar los anexos
    if($opcion === 'guardarsub'){
        $sub_fraccion = $_POST['sub_fraccion'];
       
        if (comprobacion ($sub_fraccion,$conexion)){

            $detalles = $_POST['detallest'];
            $area = $_POST['areat'];
            $area_afac = $_POST['area_afact'];
            $incisos = $_POST['incisost'];
            $notas = $_POST['notast'];
            $id_fraccion = $_POST['num_fraccion'];

            if (guardarsub ($sub_fraccion,$detalles,$area,$area_afac,$incisos,$notas,$id_fraccion,$conexion)){
                echo "0";
                $proceso="GUARDA SUB-FRACCIÓN";
                historial ($id_persona,$proceso,$detalles,$conexion);
            }else{
                echo "1";
            }
        }else{
            echo "2";
        }
           
    }else if ($opcion === 'eliminarsub'){
        $id_sub = $_POST['id_sub'];
        if (eliminarsub ($id_sub,$conexion)){
            echo "0";
            $proceso="ELIMINAR SUB-FRACCIÓN";
            historialElim ($id_persona,$proceso,$id_sub,$conexion);
        }else{
            echo "1";
        }
        //Condición para editar Sub fracción
    }else if($opcion === 'editarsub'){
        $num_sub = $_POST['num_sub'];
        $detalles = $_POST['detalles'];
        $area = $_POST['area'];
        $area_afac = $_POST['area_afac'];
        $incisos = $_POST['incisos'];
        $notas = $_POST['notas'];

        if (editarsub ($num_sub,$detalles,$area,$area_afac,$incisos,$notas,$conexion)){
            echo "0";
            $proceso="EDITAR SUB-FRACCIÓN";
            historialEdit ($id_persona,$proceso,$num_sub,$conexion);
        }else{
            echo "1";
        }
    }
    

    //FUNCIONES--------------------------------------------------------

    //funcion de comprobación para ver si la persona ya se encuentra con acceso
    function comprobacion ($sub_fraccion,$conexion){
        $query="SELECT * FROM sub_fracciones WHERE num_sub = '$sub_fraccion'";
        $resultado= mysqli_query($conexion,$query);
        if($resultado->num_rows==0){
            return true;
        }else{
            return false;
        }
    }

    //función para guardar las sub fracciones
    function guardarsub($sub_fraccion,$detalles,$area,$area_afac,$incisos,$notas,$id_fraccion,$conexion){
        $query = "INSERT INTO sub_fracciones VALUES(0,'$sub_fraccion','$detalles','$area','$area_afac','$incisos','$notas','$id_fraccion')";
        $res = mysqli_query($conexion,$query);
        if($res){
            return true;
        }else{
            return false;
        }
    }

    //Función para eliminar sub fracción
    function eliminarsub($id_sub,$conexion){
        $query = "DELETE from sub_fracciones WHERE id_sub=$id_sub";
        $res = mysqli_query($conexion,$query);
        if($res){
            return true;
        }else{
            return false;
        }
    }

    //Funcion de comprobacipn para ver si la Sub se encuentrá en la BD
    function editarsub ($num_sub,$detalles,$area,$area_afac,$incisos,$notas,$conexion){
        $query = "UPDATE sub_fracciones SET detalles='$detalles', area='$area', area_afac='$area_afac', incisos='$incisos', notas='$notas' where num_sub='$num_sub'";
        $resultado = mysqli_query($conexion,$query);
        if($resultado){
            return true;
        }else{
            return false;
        }
    }

    //Función para que se guarde en la tabla historial
    function historial($id_persona,$proceso,$detalles,$conexion){
        date_default_timezone_set('America/Mexico_City');
        $fecha_edicion = date('Y-m-d H:i:s');
        $query = "INSERT INTO historial_cambios VALUES (0,'$id_persona','$proceso','$detalles','$fecha_edicion')";
        $res = mysqli_query($conexion,$query);
        if($res){
            return true;
        }else{
            return false;
        }
    }

    //Función para que se guarde en la tabla historial
    function historialElim($id_persona,$proceso,$id_sub,$conexion){
        date_default_timezone_set('America/Mexico_City');
        $fecha_edicion = date('Y-m-d H:i:s');
        $query = "INSERT INTO historial_cambios VALUES (0,'$id_persona','$proceso','id= ' '$id_sub','$fecha_edicion')";
        $res = mysqli_query($conexion,$query);
        if($res){
            return true;
        }else{
            return false;
        }
    }

    //Función para que se guarde en la tabla historial
    function historialEdit($id_persona,$proceso,$num_sub,$conexion){
        date_default_timezone_set('America/Mexico_City');
        $fecha_edicion = date('Y-m-d H:i:s');
        $query = "INSERT INTO historial_cambios VALUES (0,'$id_persona','$proceso', 'id_sub= ' '$num_sub','$fecha_edicion')";
        $res = mysqli_query($conexion,$query);
        if($res){
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