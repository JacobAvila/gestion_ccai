<?php
/**
 * Description of daoresponsable
 *
 * @author jacob
 */
class DAOResponsable {
    public function nuevo($id_investigador, $id_proyecto, $tipo){
        $q = "INSERT INTO responsable (id_investigador, id_proyecto, tipo) "
                . "VALUES('$id_investigador', '$id_proyecto', '$tipo')";
        $db = new Database();
        return $db->insertar($q);
    }
    public function actualizarTipo($id_investigador, $id_proyecto, $tipo){
        $q = "UPDATE responsable SET tipo='$tipo', "
                . "WHERE id_investigador=$id_investigador and id_proyecto='$id_proyecto'";
        $db = new Database();
        return $db->actualizar($q);
    }
    public function listadoPorProyecto($id_proyecto){
        $q = "SELECT * FROM responsables_proyecto WHERE id_proyecto=$id_proyecto";
        $db = new Database();
        $res = $db->seleccionar($q);
        $responsables = array();
        foreach($res as $r){
            $proy = new Proyecto($r->id_proyecto, $r->titulo, $r->fecha_registro, $r->objetivo, $r->descripcion, $r->fecha_inicio, $r->fecha_fin, $r->estatus);
            $inv = new Investigador($r->id_investigador, $r->nombre, $r->correo_institucional, $r->correo_personal, $r->telefono, $r->password); 
            $resp = new Responsable($proy, $inv, $r->tipo);
            array_push($responsables, $resp->toJSON());
        }
        return json_encode(get_object_vars($responsables));
    }
    public function listadoPorInvestigador($id_investigador){
        $q = "SELECT * FROM responsables_proyecto WHERE id_investigador=$id_investigador";
        $db = new Database();
        $res = $db->seleccionar($q);
        $responsables = array();
        foreach($res as $r){
            $proy = new Proyecto($r->id_proyecto, $r->titulo, $r->fecha_registro, $r->objetivo, $r->descripcion, $r->fecha_inicio, $r->fecha_fin, $r->estatus);
            $inv = new Investigador($r->id_investigador, $r->nombre, $r->correo_institucional, $r->correo_personal, $r->telefono, $r->password); 
            $resp = new Responsable($proy, $inv, $r->tipo);
            array_push($responsables, $resp->toJSON());
        }
        return json_encode(get_object_vars($responsables));
    }
    public function registro($id_proyecto, $id_investigador){
        $q = "SELECT * FROM responsables_proyecto WHERE id_proyecto=$id_proyecto and id_investigador=$id_investigador";
        $db = new Database();
        $r = $db->seleccionar($q);
        $proy = new Proyecto($r->id_proyecto, $r->titulo, $r->fecha_registro, $r->objetivo, $r->descripcion, $r->fecha_inicio, $r->fecha_fin, $r->estatus);
        $inv = new Investigador($r->id_investigador, $r->nombre, $r->correo_institucional, $r->correo_personal, $r->telefono, $r->password); 
        $resp = new Responsable($proy, $inv, $r->tipo);
        return json_encode(get_object_vars($resp));
    }
    public function eliminar($id_proyecto, $id_investigador){
        $q = "DELETE FROM responsable WHERE id_proyecto=$id_proyecto and id_investigador=$id_investigador";
        $db = new Database();
        return $db->actualizar($q);
    }
}
