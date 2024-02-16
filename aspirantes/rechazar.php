<?php
$home = "../";
include($home."api/api.php");

$correo = $_REQUEST['correo'];
$id = $_REQUEST['id'];

$dao = new DAOAspirante();

echo $dao->actualizarEstatus($id, $correo, 'Rechazado');

