<?php
$home = "../";
include($home."api/lib.php");

$correo = $_REQUEST['correo'];
$id = $_REQUEST['id'];

$dao = new DAOAspirante();

echo $dao->actualizarEstatus($id, $correo, 'Rechazado');

