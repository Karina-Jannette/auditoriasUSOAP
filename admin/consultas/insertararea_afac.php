<?php
require_once "../../conexion.php";

if(isset($_POST['area']) ){


    $conexion->query("insert into areas_afac (area)
           values (
                  
                  '".$_POST['area']."'
                  
              )
            ")or die($conexion->error);

            header("Location: ../area_afac.php?success");


}else{
    header("Location: ../area_afac.php?error=Favor de llenar todos los campos");
}

?>