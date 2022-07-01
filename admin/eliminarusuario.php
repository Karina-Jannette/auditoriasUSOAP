<?php
    require_once "../conexion.php";

    $conexion->query("delete from usuarios where id_usuario=".$_POST['id']);
    echo 'Se elimino correctamente';
?>