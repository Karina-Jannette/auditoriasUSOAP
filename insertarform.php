<?php
require_once "conexion.php";

if( isset($_POST['num_pq']) && isset($_POST['area']) && isset($_POST['elemento']) && isset($_POST['pregunta'])
    && isset($_POST['orientacion']) && isset($_POST['inciso']) && isset($_POST['documentos'])){


    $conexion->query("insert into pqs(num_pq,area,elemento,pregunta,orientacion,inciso,documentos)
        values (
            '".$_POST['num_pq']."',
            '".$_POST['area']."',
            '".$_POST['elemento']."',
            '".$_POST['pregunta']."',
            '".$_POST['orientacion']."',
            '".$_POST['inciso']."',
            '".$_POST['documentos']."'
            )
            ")or die($conexion->error);

            header("Location: pqs.php?success");


}else{
    header("Location: pqs.php?error=Favor de llenar todos los campos");
}

?>