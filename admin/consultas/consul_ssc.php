<?php
    include("../conexion.php");
    session_start();
    $query = "SELECT * FROM ssc ORDER BY id_ssc";
    $resultado = mysqli_query($conexion, $query);

    if(!$resultado){
        die("error");
    }else{
        while($data = mysqli_fetch_assoc($resultado)){

            $arreglo["data"][] = $data; 
        }
        if(isset($arreglo)&&!empty($arreglo)){

            echo json_encode($arreglo);
        }else{

            echo $arreglo='0';
        }
    }
        mysqli_free_result($resultado);
        mysqli_close($conexion);
?>