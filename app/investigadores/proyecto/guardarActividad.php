<?php

$home = "../../../";
include($home."api/lib.php");

$id_proyecto = $_REQUEST['id_proyecto'];
$fecha_inicio = $_REQUEST['fecha_inicio'];
$fecha_fin = $_REQUEST['fecha_fin'];
$actividad = $_REQUEST['actividad'];
$asignado = $_REQUEST['asignado'];

$daoSe = new DAOSemestre();
$sem = $daoSe->registroEstatus('Activo');

$dao = new DAOPlanTrabajo();
echo $dao->insertar($id_proyecto, $sem->nombre, $actividad, $fecha_inicio, $fecha_fin, $asignado, 0, "En Proceso");



