<?php
/* Se realiza la conexion a la base de datos, se cierra la sesión y redirigue al index*/
    session_start();
    session_destroy();
    header("location:index.html");
?>