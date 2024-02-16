<?php
/**
 * Description of daocolaborador
 *
 * @author jacob
 */
class DAOColaborador {
    public function nuevo($id_proyecto, $id_investigador, $correo){
        $q = "INSERT INTO colaborador (id_proyecto, id_investigador, correo_investigador) "
                . "VALUES($id_proyecto, $id_investigador, '$correo')";
        $db = new Database();
        return $db->insertar_id($q);
    }
    public function actualizar($id_colaborador, $id_proyecto, $id_investigador, $correo){
        $q = "UPDATE colaborador SET id_proyecto=$id_proyecto, "
                . "id_investigador = $id_investigador, correo='$correo' "
                . "WHERE id_colaborador=$id_colaborador";
        $db = new Database();
        return $db->actualizar($q);
    }
    public function listado($id_proyecto){
        $q = "SELECT * FROM colaborador_proyecto WHERE id_proyecto = $id_proyecto";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function registro($id_colaborador){
        $q = "SELECT * FROM colaborador_proyecto WHERE id_colaborador=$id_colaborador";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function eliminar($id_proyecto, $id_investigador){
        $q = "DELETE FROM colaborador WHERE id_proyecto=$id_proyecto and id_investigador=$id_investigador";
        $db = new Database();
        return $db->actualizar($q);
    }
}
