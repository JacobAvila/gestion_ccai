<?php
$home = "../";
include($home."api/api.php");

$dao = new DAOUsuario();

$correo = $_REQUEST['correo'];

$user = $dao->registro($correo);

if(count($user) > 0){
    echo $user[0]->password."&".$user[0]->estatus;
}else{
    echo 0;
}