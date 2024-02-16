<?php
$home = "../";
include($home."api/lib.php");
$dao = new DAOParticipante();

$id_proyecto = $_REQUEST['id_proyecto'];
$id_estudiante = $_REQUEST['id_estudiante'];
$correo = $_REQUEST['correo'];

$res = $dao->nuevo( $id_proyecto, $id_estudiante, $correo, "Residencias");

if($res){
    $daoE = new DAOEstudiante();
    $daoE->actualizarEstatus($id_estudiante, $correo, "Asignado");
}

echo $res;

?>