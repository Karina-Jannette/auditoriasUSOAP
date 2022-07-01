<?php 
    include("../conexion.php");
    
    $opcion = $_POST["opcion"];
    $informacion = [];

    //CONDICIONES------------------------------------------------------------------------------
    //Condición donde actualiza la PQ
    if($opcion === 'editpqs'){
        $num_pq = $_POST['num_pq'];
        $area = $_POST['area'];
        $area_afac = $_POST['area_afac'];
        $elemento = $_POST['elemento'];
        $pregunta = $_POST['pregunta'];
        $orientacion = $_POST['orientacion'];
        $inciso = $_POST['inciso'];
        $documentos = $_POST['documentos'];

            if (editarpqs ($num_pq,$area,$area_afac,$elemento,$pregunta,$orientacion,$inciso,$documentos,$conexion)){
                echo "0";
            }else{
                echo "1";
            }

    } else if ($opcion === 'guardarpq'){
        
        $num_pq = $_POST['num_pq'];
        $area = $_POST['area'];
        $area_afac = $_POST['area_afac'];
        $elemento = $_POST['elemento'];
        $pregunta = $_POST['pregunta'];
        $orientacion = $_POST['orientacion'];
        $inciso = $_POST['inciso'];
        $documentos = $_POST['documentos'];

        if (guardarpq($num_pq,$area,$area_afac,$elemento,$pregunta,$orientacion,$inciso,$documentos,$conexion)){
            echo "0";
        }else{
            echo "1";
        }

    }

    //FUNCIONES-----------------------------------------------------------------------------------------------------------------------------------------

    //Función para guardar PQ
    function guardarpq($num_pq,$area,$area_afac,$elemento,$pregunta,$orientacion,$inciso,$documentos,$conexion){
        
        $query = "INSERT INTO pqs VALUES (0, '$num_pq','$area','$area_afac','$elemento','$pregunta','$orientacion','$inciso','$documentos')";
        $res = mysqli_query ($conexion,$query);
        if($res){
            return true;
        }else{
            return false;
        }
    }

    //funcion de comprobación para ver si la PQ ya se encuentra en la base
    function editarpqs ($num_pq,$area,$area_afac,$elemento,$pregunta,$orientacion,$inciso,$documentos,$conexion){
        $query="UPDATE pqs SET area='$area', area_afac='$area_afac', elemento='$elemento', pregunta='$pregunta', orientacion='$orientacion', inciso='$inciso', documentos='$documentos' where num_pq='$num_pq' ";
        $resultado= mysqli_query($conexion,$query);
    
        if($resultado){
            return true;
        }else{
            return false;
        }
    }


    //funcion para cerrar la conexion
    function cerrar($conexion){
        mysqli_close($conexion);
    }

?>