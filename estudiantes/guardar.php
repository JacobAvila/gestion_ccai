<?php
$home = "../";
include($home."api/api.php");
$daoE = new DAOEstudiante();
$daoU = new DAOUsuario();

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
$password = $_REQUEST['password'];

$user = $daoU->registro($correo);
if(count($user) == 0){
    $daoU->insertar($correo, $password, 'Estudiante', '');
}
$est = $daoE->registroCorreo($correo);
$id_estudiante = 0;
if(count($est) == 0){
    $id_estudiante = $daoE->nuevo($matricula, $nombres, $apellido_1, $apellido_2, $correo, $correo_a, $telefono, $division, "No Asignado");
}else{
    $id_estudiante = $est->id_estudiante;
}

$daoS = new DAOSemestre();
$sem = $daoS->registro($semestre);

$daoP = new DAOPrograma();
$prog = $daoP->registro($id_estudiante, $correo, $sem->nombre);
if(count($prog) == 0){
    $daoP->nuevo($id_estudiante, $correo, $programa, "Activo", $sem->nombre, $sem->fecha_inicio, $sem->fecha_fin);
}

header("Location: detalles.php?id=$id_estudiante");

?>