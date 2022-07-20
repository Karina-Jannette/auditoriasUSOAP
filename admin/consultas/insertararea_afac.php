<?php
require_once "../conexion.php";

if(isset($_POST['area']) ){


    $conexion->query("insert into areas_afac (area)
           values (
                  
                  '".$_POST['area']."'
                  
              )
            ")or die($conexion->error);

            header("Location: areauditoria.php?success");


}else{
    header("Location: areauditoria.php?error=Favor de llenar todos los campos");
}

?>