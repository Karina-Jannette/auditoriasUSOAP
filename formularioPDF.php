<!DOCTYPE html>
<?php
// Mandamos llamar nuestra BD
include 'conexion.php';

$sql = "SELECT * fROM formulario WHERE id_form  = '2'";
$query = mysqli_query($conexion, $sql);
$datos = mysqli_fetch_assoc($query);

?>

<?php
ob_start();

?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <link href="css/formulario.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!--Header-->
    <div class="header">
        <img src="images/header.png" alt="">
    </div>

    <main>
        <!--Se comienza con la tala para el form-->
    <table class="seccion_general">
        <h3 class="encabezado">SECCIÓN GENERAL.- (PARA SER LLENADO POR EL PROCESO PT-08 USOAP)</h3>
        <tr>
            <td class="estatico" width="150" height="30">Número de PQ</td>
            <th class="titulo" colspan="4" rowspan="2">PREGUNTA DE PROTOCOLO USOAP (PQ)</th>
            <td class="estatico"width="50" height="30">Área de auditoría</td>
            <td class="estatico"width="50" height="30">Elemento crítico</td>
        </tr>
        <tr>
            <td class="dinamico" rowspan="1" width="50" height="25"><?php echo $datos['num_pq'] ?></td>
            <td class="dinamico" width="50" height="30"><?php echo $datos['area'] ?></td>
            <td class="dinamico" width="50" height="30"><?php echo $datos['elemento'] ?></td>
        </tr>
        <tr>
            <td class="estatico" rowspan="2" width="30" height="30">Evaluación de Estatus Actual por el SSP:</td>
            <td class="estatica" width="50" height="30">Sin Contestar</td>
            <td class="estatica" width="50" height="30">Satisfactoria</td>
            <td class="estatica" width="50" height="30">No Satisfactoria</td>
            <td class="estatica" width="50" height="30">No Aplica</td>
            <td class="estatico">SCC</td>
            <td class=""></td>
        </tr>
        </tr>
            <td class=""></td>
            <td class="">X</td>    
            <td class=""></td>
            <td class=""></td>
            <td class="estatico">MIR</td>
            <td class=""></td>
        </tr>
    </table>

    <table class="seccion_uno">
        <h3 class="encabezado">SECCIÓN I.- DESCRIPCIÓN DE LA PQ Y LOS REQUISITOS DE SOLVENTACIÓN (PARA SER LLENADO POR 
            EL PROCESO PT-08 USOAP)
        </h3>
        <tr>
            <td class="estatico"width="30" height="30">Pregunta de protocolo:</td>
            <td class=""width="600" height="30"><?php echo $datos['pregunta'] ?></td>
        </tr>
        <tr>
            <td class="estatico"width="30" height="30">Orientación para el examen de pruebas:</td>
            <td class=""width="600" height="30"><?php echo $datos['orientacion'] ?> </td>
        </tr>
        <tr>
            <td class="estatico"width="30" height="30">Documentos de referencia:</td>
            <td class=""width="600" height="30"> <?php echo $datos['documentos'] ?></td>
        </tr>
    </table>

    <table class="seccion_dos">
        <h3 class="encabezado">SECCIÓN II.- AUTOEVALUACIÓN DE LA PQ (AE) (PARA SER LLENADO POR EL ÁREA ASIGNADA PARA 
            ATENDER LA PQ) 
        </h3>
        <tr>
            <td class="estatico" width="50" height="30" colspan="6"> Auto Evaluación (AE)</td>
        </tr>
        <tr>
            <td class="estatico" width="50" height="30">Fecha de inicio de atención a la PQ:</td>
            <td class="estatica" width="50" height="30"><?php echo $datos['fecha_inicio'] ?></td>
            <td class="estatico" width="50" height="30">Fecha de término de la AE:</td>
            <td class="estatica" width="50" height="30"> <?php echo $datos['fecha_termino'] ?></td>
            <td class="estatico" width="50" height="30">Porcentaje total actual de la PQ:</td>
            <td class="estatica" width="50" height="30"> <?php echo $datos['porcentaje'] ?> </td>
        </tr>
    </table>
    <table>
        <h3 class="encabezado">SECCIÓN II.I Análisis Descriptivo</h3>
        <tr>
            <td class="subencabezado" width="" height="30"> Introducción. (área responsable, funciones respectivas, obligaciones) </td>
        </tr>
        <tr>
            <td class="estatica" width="50" height="30"><?php echo $datos['introduccion'] ?></td>
        </tr>
        <tr>
            <td class="subencabezado" width="" height="30"> Descripción de Fundamentos. (resumen de las referencias OACI) </td>
        </tr>
        <tr>
            <td class="estatica" width="" height="30"><?php echo $datos['fundamentos'] ?></td>
        </tr>
        <tr>
            <td class="subencabezado" width="" height="30">Evaluación de cumplimiento actual. (panorama actual referente a la PQ) <br>
                Alinear respuesta con la Orientación para el examen de pruebas.  </td>
        </tr>
        <tr>
            <td class="estatica" width="" height="80"><?php echo $datos['cumplimiento'] ?></td>
        </tr>
        <tr>
            <td class="subencabezado" width="" height="30"> Intervenciones de áreas de la AFAC. (quienes y en que intervienen) </td>
        </tr>
        <tr>
            <td class="estatica" width="" height="100"><?php echo $datos['intervenciones'] ?></td>
        </tr>
        <tr>
            <td class="subencabezado" width="" height="30"> Conclusión de cumplimiento. (total, parcial, nada) </td>
        </tr>
        <tr>
            <td class="estatica" width="" height="30"><?php echo $datos['conclusion'] ?></td>
        </tr>
    </table>

    <table>
        <h3 class="encabezado">SECCIÓN II.II.- Información documental para cumplimiento del examen de pruebas</h3>
        <tr>
            <td class="estatico" width="" height="30">Pruebas específicas del cumplimiento de la PQ</td>
            <td class="estatico" width="" height="30">Área / Persona Responsable </td>
            <td class="estatico" width="" height="30">Evidencias:</td>
        </tr>
        <tr>
            <td class="estatica" width="" height="80"><?php echo $datos['pruebas'] ?></td>
            <td class="estatica" width="" height="80"><?php echo $datos['responsable'] ?></td>
            <td class="estatica" width="" height="80"><?php echo $datos['evidencias'] ?></td>
        </tr>
    </table>

    <table>
        <h3 class="encabezado">SECCIÓN III.- PLAN DE ACCIÓN CORRECTIVO PARA LA SOLVENTACIÓN DE LA PQ (CAP) (PARA SER 
            LLENADO POR EL ÁREA ASIGNADA PARA ATENDER LA PQ)
        </h3>
        <tr>
            <td class="estatico" width="50" height="30" colspan="7"> Plan de Acción Correctivo (CAP)</td>
        </tr>
        <tr>
            <td class="estatico" width="50" height="30">Fecha de inicio de atención a la PQ:</td>
            <td class="estatica" width="200" height="30"><?php echo $datos['fecha_inicio_atencion'] ?></td>
            <td class="estatico" width="50" height="30">Fecha de término del CAP:</td>
            <td class="estatica" width="30" height="30" colspan="2"><?php echo $datos['fecha_termino_cap'] ?></td>
            <td class="estatico" width="50" height="30" >Porcentaje total actual de la PQ:</td>
            <td class="estatica" width="50" height="30"><?php echo $datos['porcentaje_total'] ?></td>
        </tr>
        <tr>
            <td class="estatico" width="200" height="30" colspan="3">Actividades</td>
            <td class="estatico" width="60" height="30">Área/Persona Responsable</td>
            <td class="estatico" width="60" height="30">Fecha Inicial/Final</td>
            <td class="estatico" width="" height="30" colspan="1.5">Producto:</td>
            <td class="estatico" width="20" height="30">%</td>
        </tr>
        <tr>
            <td class="estatica" width="" height="30" colspan="3"><?php echo $datos['actividades'] ?> </td>
            <td class="estatica" width="" height="30"><?php echo $datos['responsable_cap'] ?></td>
            <td class="estatica" width="" height="30"><?php echo $datos['fecha_inico_final'] ?></td>
            <td class="estatica" width="" height="30"><?php echo $datos['producto'] ?></td>
            <td class="estatica" width="" height="30"><?php echo $datos['porcentaje_cap'] ?></td>
        </tr>
        <tr>
            <td class="estatico"width="150" height="30">Comentarios generales de la Subdirección de SSP:</td>
            <td class=""width="" height="30" colspan="6"><?php echo $datos['comentarios'] ?></td>
        </tr>
        <tr>
            <td class="estatico" width="50" height="30">Fecha en que se subió al OLF:</td>
            <td class="estatica" width="200" height="30" colspan="2"><?php echo $datos['fecha_subio_olf'] ?></td>
            <td class="estatico" width="50" height="30">Fecha de revisión de OACI:</td>
            <td class="estatica" width="200" height="30" colspan="3"><?php echo $datos['fecha_revision_oaci'] ?></td>
        </tr>
    </table>

    <table>
        <tr>
            <td class="estatico" width="50" height="30" colspan="3"> Fecha de Elaboración:</td>
        </tr>
        <tr>
            <td class="firmas" width="50" height="30">Nombre</td>
            <td class="firmas" width="50" height="30">Nombre</td>
            <td class="firmas" width="50" height="30">Nombre</td>
        </tr>
        <tr>
            <td class="" width="50" height="30"> </td>
            <td class="" width="50" height="30"> </td>
            <td class="" width="50" height="30"> </td>
        </tr>
        <tr>
            <td class="final" width="50" height="30">Puesto</td>
            <td class="final" width="50" height="30">Puesto</td>
            <td class="final" width="50" height="30">Puesto</td>
        </tr>
        <tr>
            <td class="" width="50" height="30"> </td>
            <td class="" width="50" height="30"> </td>
            <td class="" width="50" height="30"> </td>
        </tr>
        <tr>
            <td class="final" width="50" height="30">Revisó</td>
            <td class="final" width="50" height="30">Elaboró</td>
            <td class="final" width="50" height="30">Aprobó</td>
        </tr>
        <tr>
            <td class="" width="50" height="30"> </td>
            <td class="" width="50" height="30"> </td>
            <td class="" width="50" height="30"> </td>
        </tr>
    </table>

    </main>
    
    

    <!--Footer-->
    <div class="footer">
        <div>
            <img src="images/footer.png" alt="">
        </div>
    </div>
</body>

<?php
            require_once 'dompdf/autoload.inc.php';
            use Dompdf\Dompdf;
            $dompdf = new DOMPDF();
            $dompdf->set_paper('A4', 'portrait');
            $dompdf->load_html(ob_get_clean());
            // $dompdf->set_option('enable_font_subsetting', true);
            $dompdf->render();
            $dompdf->stream("Auditorías USUAP", array("Attachment" => 0));
            $pdf = $dompdf->output();
            //$filename = "";
            //file_put_contents($filename, $pdf);
            //$dompdf->stream($filename);
        ?>

</html>