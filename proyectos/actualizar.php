<?php
$home = "../";
include($home."api/lib.php");
$dao = new DAOProyecto();
$daoI = new DAOInvestigador();

$id_proy = $_REQUEST['id_proyecto'];
$titulo = $_REQUEST['titulo'];
$objetivo = $_REQUEST['objetivo'];
$descripcion = $_REQUEST['descripcion'];
$coordinador = $_REQUEST['coordinador'];
$fecha_inicio = $_REQUEST['fecha_inicio'];
$estatus = $_REQUEST['estatus'];

$investigador = $daoI->registro($coordinador);


$id_proyecto = $dao->actualizar($id_proy, $titulo, $objetivo, $descripcion, $coordinador, $investigador->correo, $fecha_inicio, $estatus, "");

header("Location: detalles.php?id=$id_proy");

?>