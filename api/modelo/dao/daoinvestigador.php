<?php

/**
 * Description of daoinvestigador
 *
 * @author jacob
 */
class DAOInvestigador {
    public function nuevo($titulo, $nombres, $apellido_1, $apellido_2, $correo, $telefono, $estatus){
        $q = "INSERT INTO investigador (titulo, nombres, apellido_1, apellido_2, correo, telefono, estatus) "
                . "VALUES('$titulo', '$nombres', '$apellido_1', '$apellido_2', '$correo', '$telefono', '$estatus')";
        $db = new Database();
        return $db->insertar_id($q);
    }
    public function actualizar($id, $titulo, $nombres, $apellido_1, $apellido_2, $correo, $telefono, $estatus){
        $q = "UPDATE investigador SET titulo='$titulo', nombres='$nombres', apellido_1='$apellido_1', apellido_2='$apellido_2', "
                . "correo='$correo', telefono='$telefono', "
                . "estatus='$estatus' "
                . "WHERE id_investigador=$id";
        $db = new Database();
        return $db->actualizar($q);
    }
    public function actualizarPassword($id, $password){
        $q = "UPDATE investigador SET password='$password' "
                . "WHERE id_investigador=$id";
        $db = new Database();
        return $db->actualizar($q);
    }
    public function listado(){
        $q = "SELECT id_investigador, titulo, concat(nombres, ' ', apellido_1, ' ', apellido_2) as nombre, correo, telefono, estatus FROM investigador";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function registro($id){
        $q = "SELECT * FROM investigador WHERE id_investigador=$id";
        $db = new Database();
        return $db->seleccionar($q)[0];
    }
    public function registroCorreo($correo){
        $q = "SELECT * FROM investigador WHERE correo='$correo'";
        $db = new Database();
        return $db->seleccionar($q);
    }
}
