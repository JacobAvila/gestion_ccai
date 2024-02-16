<?php
/**
 * Description of daoproyecto
 *
 * @author jacob
 */
class DAOProyecto {
    public function nuevo($titulo_esp, $objetivo, $descripcion, $coordinador_id_investigador, $coordinador_correo, $fecha_inicio, $estatus, $imagen){
        $q = "INSERT INTO proyecto (titulo_esp, objetivo, descripcion, coordinador_id_investigador, coordinador_correo, fecha_inicio, estatus, imagen) "
                . "VALUES('$titulo_esp', '$objetivo', '$descripcion', $coordinador_id_investigador, '$coordinador_correo', '$fecha_inicio', '$estatus', '$imagen')";
        $db = new Database();
        return $db->insertar_id($q);
    }
    public function actualizar($id_proyecto, $titulo_esp, $objetivo, $descripcion, $coordinador_id_investigador, $coordinador_correo, $fecha_inicio, $estatus, $imagen){
        $q = "UPDATE proyecto SET titulo_esp='$titulo_esp', "
                . "objetivo = '$objetivo', descripcion='$descripcion', coordinador_id_investigador=$coordinador_id_investigador, "
                . "coordinador_correo='$coordinador_correo', fecha_inicio='$fecha_inicio', "
                . "estatus='$estatus', imagen='$imagen' "
                . "WHERE id_proyecto='$id_proyecto'";
        $db = new Database();
        return $db->actualizar($q);
    }
    public function actualizarEstatus($id_proyecto, $estatus){
        $q = "UPDATE proyecto SET estatus='$estatus' "
                . "WHERE id_proyecto='$id_proyecto'";
        $db = new Database();
        return $db->actualizar($q);
    }
    public function actualizarFechaInicio($id_proyecto, $fechaI){
        $q = "UPDATE proyecto SET fecha_inicio='$fechaI' "
                . "WHERE id_proyecto='$id_proyecto'";
        $db = new Database();
        return $db->actualizar($q);
    }
    public function actualizarFechaFin($id_proyecto, $fechaF){
        $q = "UPDATE proyecto SET fecha_fin='$fechaF' "
                . "WHERE id_proyecto='$id_proyecto'";
        $db = new Database();
        return $db->actualizar($q);
    }
    public function listado(){
        $q = "SELECT * FROM detalles_proyecto order by id_proyecto asc";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function listadoPorEstatus($estatus){
        $q = "SELECT * FROM detalles_proyecto WHERE estatus='$estatus' order by id_proyecto asc";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function listadoPorAnioRegistro($anio){
        $q = "SELECT * FROM detalles_proyecto WHERE YEAR(fecha_registro)='$anio'";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function listadoPorInvestigador($id_investigador){
        $q = "SELECT proyecto.* FROM proyecto, investigador "
                . "WHERE proyecto.coordinador_id_investigador=investigador.id_investigador and proyecto.coordinador_correo = investigador.correo and proyecto.coordinador_id_investigador=$id_investigador";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function listadoComoColaborador($id_investigador){
        $q = "SELECT proyecto.* FROM proyecto, investigador, colaborador "
                . "WHERE proyecto.coordinador_id_investigador=investigador.id_investigador "
                ."and proyecto.coordinador_correo = investigador.correo "
                ."and colaborador.id_investigador=$id_investigador "
                ."and proyecto.id_proyecto=colaborador.id_proyecto";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function listadoPorEstudiante($matricula){
        $q = "SELECT proyecto.*, programa.tipo, programa.estatus as estatus_programa FROM proyecto, Participante, programa, estudiante "
                . "WHERE proyecto.id_proyecto=Participante.proyecto_id_proyecto "
                ."and Participante.id_estudiante=programa.id_estudiante and Participante.correo_estudiante=programa.estudiante_correo "
                ."and Participante.tipo_programa=programa.tipo and programa.id_estudiante=estudiante.id_estudiante and programa.estudiante_correo=estudiante.correo "
                ."and estudiante.matricula='$matricula'";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function listadoPorEstudianteID($id_estudiante){
        $q = "SELECT proyecto.*, programa.tipo, programa.estatus as estatus_programa FROM proyecto, Participante, programa, estudiante "
                . "WHERE proyecto.id_proyecto=Participante.proyecto_id_proyecto "
                ."and Participante.id_estudiante=programa.id_estudiante and Participante.correo_estudiante=programa.estudiante_correo "
                ."and Participante.tipo_programa=programa.tipo and programa.id_estudiante=estudiante.id_estudiante and programa.estudiante_correo=estudiante.correo "
                ."and estudiante.id_estudiante=$id_estudiante";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function registro($id){
        $q = "SELECT * FROM detalles_proyecto WHERE id_proyecto=$id";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function eliminar($id){
        $q = "DELETE FROM proyecto WHERE id_proyecto=$id";
        $db = new Database();
        return $db->actualizar($q);
    }
}
