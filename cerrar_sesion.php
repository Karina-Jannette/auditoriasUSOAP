<?php
/* Se realiza la conexion a la base de datos, se inicia la sesion, se restringuen las interfaces, y se declaran las variables de sistema que se van a usar en este .php */
    session_start();
    session_destroy();
    header("location:index.html");
?>