<?php
session_start();
include($home."api/modelo/model.php");

$user = $_SESSION['usuario'];

if($user === NULL){
    header("Location: ".$home);
}