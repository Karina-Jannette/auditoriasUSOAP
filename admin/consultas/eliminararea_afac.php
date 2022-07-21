<?php
    require_once "../../conexion.php";

    $conexion->query("delete from areas_afac where id_areaafac=".$_POST['id']);
    echo 'Se elimino correctamente';
?>