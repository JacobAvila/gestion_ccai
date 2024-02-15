<?php
/**
 * Description of daoparticipante
 *
 * @author jacob
 */
class DAOParticipante {
    public function nuevo( $id_proyecto, $id_estudiante, $correo, $tipo){
        $q = "INSERT INTO Participante (proyecto_id_proyecto, id_estudiante, correo_estudiante, tipo_programa) "
                . "VALUES($id_proyecto, $id_estudiante, '$correo', '$tipo')";
        $db = new Database();
        return $db->insertar($q);
    }
    public function listadoPorProyecto($id_proyecto){
        $q = "SELECT * FROM participante_proyecto WHERE id_proyecto=$id_proyecto";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function listadoPorProyectoPrograma($id_proyecto, $programa){
        $q = "SELECT * FROM participante_proyecto WHERE id_proyecto=$id_proyecto and programa='$programa'";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function listadoPorPrograma($programa){
        $q = "SELECT * FROM participante_proyecto WHERE programa='$programa'";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function listadoPorEstudiante($matricula){
        $q = "SELECT * FROM participante_proyecto WHERE matricula='$matricula'";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function registro($programa,  $matricula, $id_proyecto){
        $q = "SELECT * FROM participante_proyecto WHERE programa=$programa and matricula='$matricula' and id_proyecto=$id_proyecto";
        $db = new Database();
        $r = $db->seleccionar($q);
        return $r[0];
    }
    public function registroPorCorreo($correo){
        $q = "SELECT * FROM participante_proyecto WHERE correo='$correo'";
        $db = new Database();
        $r = $db->seleccionar($q);
        return $r[0];
    }
    public function registroPorEstudiante($id_estudiante){
        $q = "SELECT * FROM participante_proyecto pp, proyecto p, investigador i WHERE pp.id_proyecto=p.id_proyecto "
                ." and p.coordinador_id_investigador = i.id_investigador and p.coordinador_correo = i.correo and id_estudiante=$id_estudiante";
        $db = new Database();
        $r = $db->seleccionar($q);
        return $r[0];
    }
    public function eliminar($id_proyecto, $id_estudiante, $correo){
        $q = "DELETE FROM Participante WHERE proyecto_id_proyecto=$id_proyecto and id_estudiante=$id_estudiante and correo_estudiante='$correo'";
        $db = new Database();
        $db->actualizar($q);
        return $q;
    }
}
