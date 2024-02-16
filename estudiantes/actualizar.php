<?php
$home = "../";
include($home."api/lib.php");
$daoP = new DAOPrograma();
$daoE = new DAOEstudiante();

$id_estudiante = $_REQUEST['id_estudiante'];
$matricula = $_REQUEST['matricula'];
$nombres = $_REQUEST['nombres'];
$apellido_1 = $_REQUEST['apellido_1'];
$apellido_2 = $_REQUEST['apellido_2'];
$correo = $_REQUEST['correo'];
$correo_a = $_REQUEST['correo_adicional'];
$telefono = $_REQUEST['telefono'];
$division = $_REQUEST['division'];
$programa = $_REQUEST['tipo'];
$semestre = $_REQUEST['semestre'];
$estatus = $_REQUEST['estatus'];

$daoS = new DAOSemestre();
$sem = $daoS->registro($semestre);

$daoE->actualizar($id_estudiante, $matricula, $nombres, $apellido_1, $apellido_2, $correo, $correo_a, $telefono, $division);
$daoP->actualizar($id_estudiante, $correo, $programa, $estatus, $semestre, $sem->fecha_inicio, $sem->fecha_fin);

header("Location: detalles.php?id=$id_estudiante");

?>