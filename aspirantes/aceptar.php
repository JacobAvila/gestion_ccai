<?php
$home = "../";
include($home."api/lib.php");

$correo = $_REQUEST['correo'];
$id = $_REQUEST['id'];

$dao = new DAOAspirante();

echo $dao->actualizarEstatus($id, $correo, 'Aceptado');

$aspirante = $dao->registro($id);

$daoU = new DAOUsuario();
$daoE = new DAOEstudiante();

$user = $daoU->registro($correo);
if(count($user) == 0){
    $res = $daoU->insertar($correo, "12345678", "Estudiante", "");
}

$apellidos = explode(" ", $aspirante->apellido);
$apellido_1 = (count($apellidos) > 0)?$apellidos[0]:"";
$apellido_2 = (count($apellidos) > 1)?$apellidos[1]:"";

$division = "";
if(stristr($aspirante->division, "sistemas") || stristr($aspirante->division, "Sistemas") || stristr($aspirante->division, "SISTEMAS")){
    $division = "Sistemas Computacionales";
}else if(stristr($aspirante->division, "informatica") || stristr($aspirante->division, "informática") || stristr($aspirante->division, "Informatica") || stristr($aspirante->division, "Informática") || stristr($aspirante->division, "INFORMATICA") || stristr($aspirante->division, "INFORMÁTICA")){
    $division = "Informática";
}
else if(stristr($aspirante->division, "mecatronica") || stristr($aspirante->division, "mecatrónica") || stristr($aspirante->division, "Mecatronica") || stristr($aspirante->division, "Mecatrónica") || stristr($aspirante->division, "MECATRONICA") || stristr($aspirante->division, "MECATRÓNICA")){
    $division = "Mecánica, Mecatrónica, Industrial";
}
else if(stristr($aspirante->division, "mecanica") || stristr($aspirante->division, "mecánica") || stristr($aspirante->division, "Mecanica") || stristr($aspirante->division, "Mecánica") || stristr($aspirante->division, "MECANICA") || stristr($aspirante->division, "MECÁNICA")){
    $division = "Mecánica, Mecatrónica, Industrial";
}
else if(stristr($aspirante->division, "INDUSTRIAL") || stristr($aspirante->division, "industrial") || stristr($aspirante->division, "Industrial")){
    $division = "Mecánica, Mecatrónica, Industrial";
}else if(stristr($aspirante->division, "electronica") || stristr($aspirante->division, "electrónica") || stristr($aspirante->division, "Electronica") || stristr($aspirante->division, "Electrónica") || stristr($aspirante->division, "ELECTRONICA") || stristr($aspirante->division, "ELECTRÓNICA")){
    $division = "Electrónica";
}else if(stristr($aspirante->division, "quimica") || stristr($aspirante->division, "química") || stristr($aspirante->division, "Quimica") || stristr($aspirante->division, "Química") || stristr($aspirante->division, "QUIMICA") || stristr($aspirante->division, "QUÍMICA")){
    $division = "Química, Bioquímica";
}else if(stristr($aspirante->division, "bioquimica") || stristr($aspirante->division, "bioquímica") || stristr($aspirante->division, "Bioquimica") || stristr($aspirante->division, "Bioquímica") || stristr($aspirante->division, "BIOQUIMICA") || stristr($aspirante->division, "BIOQUÍMICA")){
    $division = "Química, Bioquímica";
}else if(stristr($aspirante->division, "gestion") || stristr($aspirante->division, "gestión") || stristr($aspirante->division, "Gestion") || stristr($aspirante->division, "Gestión") || stristr($aspirante->division, "GESTION") || stristr($aspirante->division, "GESTIÓN")){
    $division = "Gestión Empresarial";
}else if(stristr($aspirante->division, "contaduria") || stristr($aspirante->division, "Contaduria") || stristr($aspirante->division, "contador") || stristr($aspirante->division, "Contador")){
    $division = "Contaduria";
}

$est = $daoE->registroCorreo($correo);
$id_estudiante = 0;
if(count($est) == 0){
    $id_estudiante = $daoE->nuevo('', $aspirante->nombre, $apellido_1, $apellido_2, $correo, $aspirante->correo_electronico, '', $division, 'No Asignado');
}else{
    $id_estudiante = $est[0]->id_estudiante;
}

$tipo = $aspirante->interes_liberacion;

$daoS = new DAOSemestre();
$sem = $daoS->registro("2024-1");

$daoP = new DAOPrograma();
$prog = $daoP->registro($id_estudiante, $correo, $sem->nombre);
if(count($prog) == 0){
    $daoP->nuevo($id_estudiante, $correo, $tipo, "Activo", $sem->nombre, $sem->fecha_inicio, $sem->fecha_fin);
}

echo "OK";