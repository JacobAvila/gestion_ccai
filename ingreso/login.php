<?php
$home = "../";
include($home."api/api.php");

$dao = new DAOUsuario();

$correo = $_REQUEST['correo'];
$password = $_REQUEST['password'];

$user = $dao->ingreso($correo, $password);

if(count($user) > 0){
    session_start();
    $tipo = $user[0]->tipo;
    if($tipo === "Estudiante"){
        $daoE = new DAOEstudiante();
        $estudiante = $daoE->registroPrograma($correo);
        $_SESSION['usuario'] = $estudiante[0];
        header("Location: ../app/estudiantes");
    }else if($tipo === "Investigador"){
        $daoI = new DAOInvestigador();
        $investigador = $daoI->registroCorreo($correo);
        $_SESSION['usuario'] = $investigador[0];
        header("Location: ../app/investigadores");
    }

}else{
    header("Location: ../");
}