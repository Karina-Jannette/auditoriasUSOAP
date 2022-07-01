<?php
require_once "./conexion.php";
session_start();
$id_persona = $_SESSION['usuario'];

$opcion = $_POST["opcion"];
$informacion = [];

//CONDICIONES ----------------------------------------------------------------

//Condición para guardar el formulario
if($opcion === 'guardarform'){
    $num_pq = $_POST['num_pq'];

    if(comprobacion($num_pq,$conexion)){
        $num_pq =$_POST['num_pq'];
        $area =$_POST['area'];
        $elemento =$_POST['elemento'];

        $pregunta =$_POST['pregunta'];
        $orientacion =$_POST['orientacion'];
        $inciso =$_POST['inciso'];
        $documentos =$_POST['documentos'];

        $fecha_inicio =$_POST['fecha_inicio'];
        $fecha_termino =$_POST['fecha_termino'];
        $porcentaje =$_POST['porcentaje'];
        $introduccion =$_POST['introduccion'];
        $fundamentos =$_POST['fundamentos'];
        $cumplimiento =$_POST['cumplimiento'];
        $intervenciones =$_POST['intervenciones'];
        $conclusion =$_POST['conclusion'];
        $pruebas =$_POST['pruebas'];
        $responsable =$_POST['responsable'];
        $evidencias =$_POST['evidencias'];
        $fecha_inicio_atencion =$_POST['fecha_inicio_atencion'];
        $fecha_termino =$_POST['fecha_termino'];
        $porcentaje_total =$_POST['porcentaje_total'];
        $actividades =$_POST['actividades'];
        $responsable_cap =$_POST['responsable_cap'];
        $inicio_final =$_POST['inicio_final'];
        $producto =$_POST['producto'];
        $porcentaje_cap =$_POST['porcentaje_cap'];

        if (guardarpq($num_pq,$area,$elemento,$pregunta,$orientacion,$inciso,$documentos,$fecha_inicio,$fecha_termino,$porcentaje,$introduccion,
        $fundamentos,$cumplimiento,$intervenciones,$conclusion,$pruebas,$responsable,$evidencias,$fecha_inicio_atencion,$fecha_termino,
        $porcentaje_total,$actividades,$responsable_cap,$inicio_final,$producto,$porcentaje_cap))

    }
}

?>