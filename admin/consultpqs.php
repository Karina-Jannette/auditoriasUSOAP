<?php
    include("../conexion.php");
    session_start();
    $query = "SELECT * FROM pregunta q,areas a, elemento e, orientacion1 o, inciso1 i, tdocumento d WHERE q.id_area=a.id_area AND q.id_elemento=e.id_elemento AND q.id_pregunta =d.id_pregunta AND q.id_pregunta =o.id_pregunta AND q.id_pregunta =i.id_pregunta";
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