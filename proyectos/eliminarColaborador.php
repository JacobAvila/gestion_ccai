<?php
$home = "../";
include($home."api/lib.php");
$dao = new DAOColaborador();

$id_proyecto = $_REQUEST['id_proyecto'];
$id_investigador = $_REQUEST['id_investigador'];

echo $dao->eliminar($id_proyecto, $id_investigador);


?>