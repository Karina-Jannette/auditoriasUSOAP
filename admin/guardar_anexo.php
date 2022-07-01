<?php
    include("../conexion.php");
    session_start();
    $id_persona=$_SESSION['usuario'];

    $opcion = $_POST["opcion"];
    $informacion = [];

    //CONDICIONES---------------------------------------------------
    //Condición para guardar los anexos
    if($opcion === 'altaAnexo'){

        $num_anexo = $_POST['num_anexo'];
        $detalles = $_POST['detalles'];
        $area = $_POST['area'];
        $area_afac = $_POST['area_afac'];
        $incisos = $_POST['incisos'];
        $notas = $_POST['notas'];
        $num_fraccion = $_POST['num_fraccion'];
        $detalles_fra = $_POST['detallesd'];
        $aread = $_POST['aread'];
        $area_afacd = $_POST['area_afacd'];
        $incisos_fra = $_POST['incisosd'];
        $notas_fra = $_POST['notasd'];

            if (altaAnexo($num_anexo,$detalles,$area,$area_afac,$incisos,$notas,$num_fraccion,$detalles_fra,$aread,$area_afacd,$incisos_fra,$notas_fra,$conexion)){
                echo "0";
            }else{
                echo "1";
            }
    
    //Opción eliminar
    }else if ($opcion === 'eliminarAnexo'){
        $id_anexo = $_POST['id_anexo'];
        if (eliminarAnexo ($id_anexo,$conexion)){
            echo "0";
        }else{
            echo "1";
        }

    //Opción editar
    }else if ($opcion === 'editAnexo'){
        $num_anexo = $_POST['num_anexo'];
        $detalles = $_POST['detalles'];
        $area = $_POST['area'];
        $area_afac = $_POST['area_afac'];
        $incisos = $_POST['incisos'];
        $notas = $_POST['notas'];

        if (editAnexo($num_anexo,$detalles,$area,$area_afac,$incisos,$notas,$conexion)){
            echo "0";
        }else{
            echo "1";
        }
    }


    //FUNCIONES--------------------------------------------------------
    function altaAnexo($num_anexo,$detalles,$area,$area_afac,$incisos,$notas,$num_fraccion,$detalles_fra,$aread,$area_afacd,$incisos_fra,$notas_fra,$conexion){
        $query1 = "INSERT INTO anexos VALUES(0,'$num_anexo','$detalles','$area','$area_afac','$incisos','$notas')";
        $query2 = "INSERT INTO fracciones VALUES (0,'$num_fraccion','$detalles_fra','$aread','$area_afacd','$incisos_fra','$notas_fra','$num_anexo')";

        $res1 = mysqli_query($conexion,$query1);
        $res2 = mysqli_query($conexion,$query2);

        if($res1 && $res2){
            return true;
        }else{
            return false;
        }
    }

    function eliminarAnexo ($id_anexo,$conexion){
        $query = "DELETE from anexos WHERE id_anexo=$id_anexo";
        $res = mysqli_query($conexion,$query);
        if($res){
            return true;
        }else{
            return false;
        }
    }

    function editAnexo($num_anexo,$detalles,$area,$area_afac,$incisos,$notas,$conexion){
        $query = "UPDATE anexos SET detalles='$detalles', area='$area', area_afac='$area_afac', incisos='$incisos', notas='$notas' where num_anexo='$num_anexo'";
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