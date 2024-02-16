<?php
session_start();
include($home."api/modelo/model.php");
include ($home."api/files/file.php");

$user = $_SESSION['usuario'];

if($user === NULL){
    header("Location: ".$home);
}
<?php
session_start();
include($home."api/modelo/model.php");

$user = $_SESSION['usuario'];

if($user === NULL){
    header("Location: ".$home);
}