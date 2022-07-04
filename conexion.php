<?php 
     $servidor= "localhost";
     $usuario= "root";
     $password= "";
     $bd= "auditoria";

    /*$servidor= "localhost";
    $usuario= "u683645102_root_usoap";
    $password= "Agencia.SCT.2021";
    $bd= "u683645102_usoap";*/
    $conexion= mysqli_connect($servidor,$usuario,$password,$bd);
    return $conexion;
    
    if ($conexion->connect_error) {
        die("Error al conectarse con la BD: " . $conexion->connect_error);
    }



?>