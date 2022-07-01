<?php 
    $servidor= "localhost";
    $usuario= "root";
    $password= "";
    $bd= "auditoria";
    $conexion= mysqli_connect($servidor,$usuario,$password,$bd);
    return $conexion;
    
    if ($conexion->connect_error) {
        die("Error al conectarse con la BD: " . $conexion->connect_error);
    }



?>