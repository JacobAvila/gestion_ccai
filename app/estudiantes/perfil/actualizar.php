<?php
$home = "../../../";
include($home."api/lib.php");

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

$user->matricula = $matricula;
$user->nombres = $nombres;
$user->apellido_1 = $apellido_1;
$user->apellido_2 = $apellido_2;
$user->correo = $correo;
$user->correo_adicional = $correo_adicional;
$user->telefono = $telefono;
$user->division = $division;

$_SESSION['usuario'] = $user;

$daoE->actualizar($id_estudiante, $matricula, $nombres, $apellido_1, $apellido_2, $correo, $correo_a, $telefono, $division);


header("Location: .", TRUE);

?>