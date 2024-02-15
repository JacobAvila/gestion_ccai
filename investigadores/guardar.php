<?php
$home = "../";
include($home."api/api.php");
$daoI = new DAOInvestigador();
$daoU = new DAOUsuario();

$titulo = $_REQUEST['titulo'];
$nombres = $_REQUEST['nombres'];
$apellido_1 = $_REQUEST['apellido_1'];
$apellido_2 = $_REQUEST['apellido_2'];
$correo = $_REQUEST['correo'];
$telefono = $_REQUEST['telefono'];
$estatus = $_REQUEST['estatus'];
$password = $_REQUEST['password'];

$user = $daoU->registro($correo);
if(count($user) == 0){
    $daoU->insertar($correo, $password, 'Investigador', '');
}
$inv = $daoI->registroCorreo($correo);
$id_investigador = 0;
if(count($inv) == 0){
    $id_investigador = $daoI->nuevo($titulo, $nombres, $apellido_1, $apellido_2, $correo, $telefono, $estatus);
}else{
    $id_investigador = $inv->id_investigador;
}


header("Location: detalles.php?id=$id_investigador");

?>