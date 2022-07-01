<?php
require 'valores_sesion.php';

require_once "conexion.php";

 $num_empleado = $_POST['num_empleado'];
 $pass = $_POST['pass'];

$sql ="SELECT num_empleado FROM usuarios WHERE num_empleado='$num_empleado' and pass='$pass' ";
$validar_login= mysqli_query($conexion,$sql);


if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['usuario'] = $num_empleado;
      
      //Se realiza INNER JOIN para juntar las tablas de roles y usuarios.
      $sqlrol ="SELECT * FROM usuarios 
      INNER JOIN rol ON usuarios.id_rol = rol.id_rol
      WHERE num_empleado = '$num_empleado'";
      $tabla_rol= mysqli_query($conexion,$sqlrol);

      $rol = mysqli_fetch_array($tabla_rol);

      //echo $rol['rol'];
      
      //Se pone los case para cada rol del usuario
      switch($rol['rol']){
        case 'Rol 1':
            header('location: admin/pqs.php');
        break;

        case 'Rol 2':
            header('location: formulario.php');
        break;

        case 'Rol 3':
          header('location:formulario.php ');  
        break;

        case 'Rol 4 ':
          header('location: formulario.php ');
        break;
      }

    mysqli_close($conexion);

}else{
    echo '
    <script> 
      alert("Número y/o contraseña incorrectos, verifique sus datos");
      window.location = "login.html";
    </script>
    ';
    mysqli_close($conexion);
}

?>