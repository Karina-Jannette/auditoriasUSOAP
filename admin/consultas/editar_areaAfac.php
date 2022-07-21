<?php
require_once "../../conexion.php";


if( isset($_POST['idEdit2']) && isset($_POST['area']) ){

    $area = $_POST['area'];
    $id = $_POST['idEdit2'];

    $conexion->query("update areas_afac set
                                  area='$area'
                                  
                                  where id_areaafac='$id'");
                                  header("Location: ../area_afac.php?success");                     
}
?>