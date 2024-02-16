<?php
$home = "../../../../";
include($home."api/lib.php");

$id = $user->id_estudiante;
$tipo = ($user->tipo == "Servicio Social")?"ss":$user->tipo;

$nombre = $_POST['nombre'];
$arch = $_FILES['archivo'];

$nameArch = $id."_".$tipo."_".$arch['name'];

$file = new File();
$subido = $file->uploadFile($arch, ".", $nameArch);

if($subido){
    $dao = new DAODocumentosPrograma();
    $doc = $dao->registro($id, $tipo, $user->semestre, $nombre);
    if(count($doc) > 0){
        $dao->actualizar($id, $user->correo, $user->tipo, $doc[0]->id_documento, $user->semestre, date("Y-m-d"), $nombre, "", $nameArch);
    }else{
        $dao->nuevo($id, $user->correo, $user->tipo, $dao->nextId(), $user->semestre, date("Y-m-d"), $nombre, "", $nameArch);
    }
}

echo "OK Maguey: ".$nombre." - ".$nameArch;
