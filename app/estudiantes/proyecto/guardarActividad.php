<?php
$home = "../../../";
include($home."api/lib.php");

$id_actividad = $_REQUEST['id_actividad'];
$id_proyecto = $_REQUEST['id_proyecto'];
$id_estudiante = $_REQUEST['id_estudiante'];
$correo = $_REQUEST['correo'];
$programa = $_REQUEST['programa'];
$semestre = $_REQUEST['semestre'];
$actividad = $_REQUEST['actividad'];
$fecha_inicio = $_REQUEST['fecha_inicio'];
$fecha_fin = $_REQUEST['fecha_fin'];
$avance = $_REQUEST['avance'];

$daoAP = new DAOActividadParticipante();
$res1 = $daoAP->insertar($id_proyecto, $id_estudiante, $correo, $programa, $id_actividad, $semestre, $fecha_inicio, $fecha_fin, $actividad, "");
$res2 = "";
if($res1 > 0){
    $daoPT = new DAOPlanTrabajo();
    $res2 = $daoPT->actualizarAvance($id_actividad, $id_proyecto, $semestre, $avance);
}
echo $res1."\n".$res2;
