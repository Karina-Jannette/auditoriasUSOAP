<?php
require_once "../conexion.php";

$res = new \stdClass();

if( isset($_POST['id_rol']) && isset($_POST['num_empleado']) && isset($_POST['id_area'])
&& isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['pass'])){
 

    $conexion->query("insert into usuarios(id_rol,num_empleado,id_area,nombre,apellido,pass)
        values (
            '".$_POST['id_rol']."',
            '".$_POST['num_empleado']."',
            '".$_POST['id_area']."',
            '".$_POST['nombre']."',
            '".$_POST['apellido']."',
            '".$_POST['pass']."'
            )
            ")or die($conexion->error);

            $res->msj = "El usuario se guardo correctamente"; 
 
            //header("Location: usuario.php?success"); al salir EL SUCCESS MOSTRABA EL MODAL 

}else{

    $res->msj = "Favor de llenar todos los campos";
    //header("Location: usuario.php?error=Favor de llenar todos los campos");
}

header("Content-Type: application/json"); echo json_encode($res);
//echo $res;
?>