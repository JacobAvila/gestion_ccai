<?php
$home = "../";
include($home."api/lib.php");
$dao = new DAOProyecto();
$daoI = new DAOInvestigador();

$titulo = $_REQUEST['titulo'];
$objetivo = $_REQUEST['objetivo'];
$descripcion = $_REQUEST['descripcion'];
$coordinador = $_REQUEST['coordinador'];
$fecha_inicio = $_REQUEST['fecha_inicio'];

$investigador = $daoI->registro($coordinador);


$id_proyecto = $dao->nuevo($titulo, $objetivo, $descripcion, $coordinador, $investigador->correo, $fecha_inicio, "Activo", "");

header("Location: detalles.php?id=$id_proyecto");

?>