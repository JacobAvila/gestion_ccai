<?php
$home = "../";
include($home."api/lib.php");

$_SESSION['usuario'] = NULL;
session_destroy();

header("Location: ".$home);