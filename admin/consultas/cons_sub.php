<?php
    include("../../conexion.php");
    session_start();
    $query = "SELECT * FROM sub_fracciones ORDER BY id_sub";
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