<?php
require_once "../conexion.php";

if( isset($_POST['id_rol']) && isset($_POST['num_empleado']) && isset($_POST['id_area']) 
&& isset($_POST['nombre']) && isset($_POST['apellido'])){
  
   
    $conexion->query("update usuarios set
                                  id_rol='".$_POST['id_rol']."',
                                  num_empleado='".$_POST['num_empleado']."',
                                  id_area='".$_POST['id_area']."',
                                  nombre='".$_POST['nombre']."',
                                  apellido='".$_POST['apellido']."'
                                  
                                  where id_usuario=".$_POST['id']);
                                  header("Location: usuario.php?success");                     
}
?>
