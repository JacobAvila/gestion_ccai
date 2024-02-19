<?php

$home = "../../../";
include($home."api/lib.php");

$id_proyecto = $_REQUEST['id_proyecto'];
$fecha_inicio = $_REQUEST['fecha_inicio'];
$fecha_fin = $_REQUEST['fecha_fin'];
$actividad = $_REQUEST['actividad'];
$asignado = $_REQUEST['asignado'];


$dao = new DAOPlanTrabajo();
echo $dao->insertar($id_proyecto, $semestre, $actividad, $fecha_inicio, $fecha_fin, $asignado);

$daoAP = new DAOActividadParticipante();

