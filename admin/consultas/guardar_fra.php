<?php
    include("../../conexion.php");
    session_start();
    $id_persona=$_SESSION['usuario'];

    $opcion = $_POST["opcion"];
    $informacion = [];

    //CONDICIONES------------------------------------------------------------------
    if($opcion === 'editFra'){
        $num_fraccion = $_POST['num_fraccion'];
        $detalles = $_POST['detalles'];
        $area = $_POST['area'];
        $area_afac = $_POST['area_afac'];
        $incisos = $_POST['incisos'];
        $notas = $_POST['notas'];

        if(editFra($num_fraccion,$detalles,$area,$area_afac,$incisos,$notas,$conexion)){
            echo "0";
        }else{
            echo "1";
        }
    }else if($opcion === 'eliminarFra'){
        $id_fraccion = $_POST['id_fraccion'];
        if (eliminarFra ($id_fraccion,$conexion)){
            echo "0";
        }else{
            echo "1";
        }
    }



    //FUNCIONES---------------------------------------------------------------------

    function editFra($num_fraccion,$detalles,$area,$area_afac,$incisos,$notas,$conexion){
        $query = "UPDATE fracciones SET detalles_fra='$detalles', aread='$area', area_afacd='$area_afac', incisos_fra='$incisos', notas_fra='$notas' where num_fraccion='$num_fraccion'";
        $resultado = mysqli_query($conexion,$query);
        if($resultado){
            return true;
        }else{
            return false;
        }
    }

    function eliminarFra($id_fraccion,$conexion){
        $query = "DELETE from fracciones WHERE id_fraccion = $id_fraccion";
        $res = mysqli_query($conexion,$query);
        if($res){
            return true;
        }else{
            return false;
        }
    }
?>