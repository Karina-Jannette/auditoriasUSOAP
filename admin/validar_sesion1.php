<?php
        error_reporting(0);
        $actual = $_SESSION['usuario'];
        if($actual == null || $actual=''  ){
            echo'<script type="text/javascript">
            alert("Para hacer uso de esta interfaz, es necesario iniciar sesion");
            window.location.href="../login.html";
            </script>';
            die();
        }
?>

