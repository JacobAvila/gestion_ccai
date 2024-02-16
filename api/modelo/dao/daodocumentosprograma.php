<?php
/**
 * Description of daodocumentosprograma
 *
 * @author jacob
 */
class DAODocumentosPrograma{

    public function nuevo($id_estudiante, $correo, $programa, $id_documento, $semestre, $fecha, $nombre, $documento, $archivo){
        $q = "INSERT INTO documentacion_programa (id_estudiante, correo_estudiante, programa_tipo, id_documento, semestre, fecha, nombre, documento, archivo) "
                . "VALUES($id_estudiante, '$correo', '$programa', $id_documento, '$semestre', '$fecha', '$nombre', '$documento', '$archivo')";
        $db = new Database();
        
        return $db->insertar_id($q);
    }
    public function actualizar($id_estudiante, $correo, $programa, $id_documento, $semestre, $fecha, $nombre, $documento, $archivo){
        $q = "UPDATE documentacion_programa SET documento='$documento', archivo='$archivo', fecha='$fecha' "
                . "WHERE id_esdudiante=$id_estudiante and correo_estudiante='$correo', programa_tipo='$programa', id_documento=$id_documento, semestre='$semestre', "
                ."nombre='$nombre'";
        $db = new Database();
        return $db->actualizar($q);
    }
    public function listado($id_estudiante, $programa, $semestre){
        $q = "SELECT * FROM documentacion_programa WHERE id_estudiante=$id_estudiante and programa_tipo='$programa' and semestre='$semestre'";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function registro($id_estudiante, $programa, $semestre, $nombre){
        $q = "SELECT * FROM documentacion_programa WHERE id_estudiante=$id_estudiante and programa_tipo='$programa' and semestre='$semestre' and nombre='$nombre'";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function eliminar($id_estudiante, $programa, $semestre, $id_documento, $nombre){
        $q = "DELETE FROM documentacion_programa WHERE id_estudiante=$id_estudiante and programa_tipo='$programa' and semestre='$semestre' "
        ."and nombre='$nombre' and id_documento=$id_documento";
        $db = new Database();
        return $db->actualizar($q);
    }
    public function nextId(){
        $q = "SELECT count(id_documento) as cant FROM documentacion_programa";
        $db = new Database();
        $res = $db->seleccionar($q)[0];
        return $res->cant + 1;
    }

}