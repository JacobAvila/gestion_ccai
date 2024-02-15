<?php
$home = "../";
include($home."api/api.php");
$dao = new DAOProyecto();
$daoI = new DAOInvestigador();

$id_inv = $_REQUEST['id_investigador'];
$titulo = $_REQUEST['titulo'];
$nombres = $_REQUEST['nombres'];
$apellido_1 = $_REQUEST['apellido_1'];
$apellido_2 = $_REQUEST['apellido_2'];
$correo = $_REQUEST['correo'];
$telefono = $_REQUEST['telefono'];
$estatus = $_REQUEST['estatus'];


$id_proyecto = $daoI->actualizar($id_inv, $titulo, $nombres, $apellido_1, $apellido_2, $correo, $telefono, $estatus);

header("Location: detalles.php?id=$id_inv");

?>