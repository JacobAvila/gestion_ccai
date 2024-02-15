<?php
$home = "../../../";
include($home."api/lib.php");

$daoP = new DAOPrograma();

$id_estudiante = $_REQUEST['id_estudiante'];
$fecha_inicio = $_REQUEST['fecha_inicio'];
$fecha_fin = $_REQUEST['fecha_fin'];
$estatus = $_REQUEST['estatus'];
$semestre = $_REQUEST['semestre'];


$daoP->actualizarFechas($id_estudiante, $fecha_inicio, $fecha_fin, $semestre, $estatus);


header("Location: .", TRUE);