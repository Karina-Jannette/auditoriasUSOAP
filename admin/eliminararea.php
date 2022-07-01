<?php
    require_once "../conexion.php";

    $conexion->query("delete from areas where id_area=".$_POST['id']);
    echo 'Se elimino correctamente';
?>
