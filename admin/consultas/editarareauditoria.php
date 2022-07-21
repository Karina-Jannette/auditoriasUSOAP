<?php
require_once "../../conexion.php";


if( isset($_POST['idEdit']) && isset($_POST['areas']) ){

    $area = $_POST['areas'];
    $id = $_POST['idEdit'];

    $conexion->query("update areas set
                                  areas='$area'
                                  
                                  where id_area='$id'");
                                  header("Location: ../areauditoria.php?success");                     
}
?>