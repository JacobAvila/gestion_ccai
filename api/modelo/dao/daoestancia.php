<?php
/**
 * Description of daoEstancia
 *
 * @author jacob
 */
class DAOEstancia {
    public function nuevo( $id_proyecto, $id_estancia, $id_estancia_residente, $correo_residente_estancia){
        $q = "INSERT INTO participante_estancia (id_proyecto, id_estancia, id_estancia_residente, correo_residente_estancia) "
                . "VALUES($id_proyecto, $id_estancia, '$id_estancia_residente', '$correo_residente_estancia')";
        $db = new Database();
        return $db->insertar($q);
    }
    public function listadoPorProyecto($id_proyecto){
        $q = "SELECT * FROM estancia_proyecto WHERE id_proyecto=$id_proyecto";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function registro($programa,  $matricula, $id_proyecto){
        $q = "SELECT * FROM estancia_proyecto WHERE programa=$programa and matricula='$matricula' and id_proyecto=$id_proyecto";
        $db = new Database();
        $r = $db->seleccionar($q);
        return $r[0];
    }
    public function eliminar($id_proyecto, $id_estancia, $correo){
        $q = "DELETE FROM participante_estancia WHERE proyecto_id_proyecto=$id_proyecto and id_estancia=$id_estancia and correo_residente_estancia='$correo'";
        $db = new Database();
        return $db->actualizar($q);
    }
}