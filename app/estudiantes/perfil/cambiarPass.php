<?php
$home = "../../../";
include($home."api/lib.php");

$password = $_REQUEST['password'];

$dao = new DAOUsuario();
$dao->cambioPassword($user->correo, $password);

header("Location: .", TRUE);