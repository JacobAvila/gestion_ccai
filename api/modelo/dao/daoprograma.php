<?php
/**
 * Description of daoprograma
 *
 * @author jacob
 */
class DAOPrograma {
    public function nuevo($id_estudiante, $correo, $tipo, $estatus, $semestre, $fechaI, $fechaF){
        $q = "INSERT INTO programa (id_estudiante, estudiante_correo, tipo, estatus, semestre, fecha_inicio, fecha_fin) "
                . "VALUES($id_estudiante, '$correo', '$tipo', '$estatus', '$semestre', '$fechaI', '$fechaF')";
        $db = new Database();
        return $db->insertar($q);
    }
    public function actualizar($id_estudiante, $correo, $tipo, $estatus, $semestre, $fechaI, $fechaF){
        $q = "UPDATE programa SET estudiante_correo = '$correo', tipo='$tipo', fecha_inicio='$fechaI', fecha_fin='$fechaF', estatus='$estatus' "
                . "WHERE id_estudiante=$id_estudiante";
        $db = new Database();
        return $db->actualizar($q);
    }
    public function actualizarEstatus($id, $estatus){
        $q = "UPDATE programa SET estatus='$estatus' "
                . "WHERE id_estudiante=$id";
        $db = new Database();
        return $db->actualizar($q);
    }
    public function actualizarFechaFin($id, $fechaF, $estatus){
        $q = "UPDATE programa SET fecha_fin='$fechaF' "
                . "WHERE id_estudiante=$id and estatus='$estatus'";
        $db = new Database();
        return $db->actualizar($q);
    }
    public function actualizarFechas($id, $fechaI, $fechaF, $semestre, $estatus){
        $q = "UPDATE programa SET fecha_inicio='$fechaI', fecha_fin='$fechaF' "
                . "WHERE id_estudiante=$id and semestre='$semestre' and estatus='$estatus'";
        $db = new Database();
        return $db->actualizar($q);
    }
    public function registro($id_estudiante, $correo, $semestre){
        $q = "SELECT * FROM programa WHERE id_estudiante=$id_estudiante and estudiante_correo='$correo' and semestre='$semestre'";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function registroEstatus($id_estudiante, $estatus){
        $q = "SELECT * FROM programa WHERE id_estudiante=$id_estudiante and estatus='$estatus'";
        $db = new Database();
        return $db->seleccionar($q);
    }
}
