<?php
    require_once "../conexion.php";

    $conexion->query("delete from pqs where id_pq=".$_POST['id']);
    echo 'Se elimino correctamente';
?>