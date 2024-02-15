<?php
$home = "../";
include($home."api/api.php");
$dao = new DAOColaborador();

$id_proyecto = $_REQUEST['id_proyecto'];
$id_investigador = $_REQUEST['id_investigador'];
$correo = $_REQUEST['correo'];

$id_colaborador = $dao->nuevo($id_proyecto, $id_investigador, $correo);

echo $id_colaborador;

?>