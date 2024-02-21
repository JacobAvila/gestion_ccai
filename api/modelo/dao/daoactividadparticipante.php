<?php

class DAOActividadParticipante{

    function insertar($id_proyecto, $id_estudiante, $correo_estudiante, $tipo, $id_actividad, $semestre, $fecha_inicio, $fecha_fin, $actividad, $observaciones){
        $q = "INSERT INTO actividad_participante VALUES($id_proyecto, $id_estudiante, '$correo_estudiante', '$tipo', $id_actividad, '$semestre', '$fecha_inicio', '$fecha_fin', '$actividad', '$observaciones')";

        $db = new Database();
        return $db->insertar($q);
    }
    function actualizar($id_proyecto, $id_estudiante, $correo_estudiante, $tipo, $id_actividad, $semestre, $fecha_inicio, $fecha_fin, $actividad, $observaciones){
        $q = "UPDATE actividad_participante SET actividad='$actividad', fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin', tipo='$tipo', correo_estudiante='$correo_estudiante',  observaciones='$observaciones' "
                ."WHERE id_estudiante=$id_estudiante and id_actividad=$id_actividad and id_proyecto=$id_proyecto and semestre = '$semestre' ";
        
        $db = new Database();
        return $db->actualziar($q);
    }
    function eliminar($id_proyecto, $id_estudiante, $id_actividad, $semestre){
        $q = "DELETE FROM actividad_participante "
                ."WHERE id_estudiante=$id_estudiante and id_actividad=$id_actividad and id_proyecto=$id_proyecto and semestre = '$semestre' ";
        
        $db = new Database();
        return $db->actualziar($q);
    }

    function listado($id_proyecto, $id_estudiante, $semestre){
        $q = "SELECT * FROM actividad_participante WHERE id_proyecto=$id_proyecto and id_estudiante= $id_estudiante and semestre = '$semestre' ";

        $db = new Database();
        return $db->seleccionar($q);
    }
    function listadoPorActividad($id_proyecto, $id_actividad){
        $q = "SELECT * FROM actividad_participante WHERE id_proyecto=$id_proyecto and id_actividad= $id_actividad";

        $db = new Database();
        return $db->seleccionar($q);
    }
    function registro($id_proyecto, $id_estudiante, $id_actividad, $semestre){
        $q = "SELECT * FROM actividad_participante WHERE id_proyecto=$id_proyecto and id_estudiante= $id_estudiante and id_actividad=$id_actividad and semestre = '$semestre' ";

        $db = new Database();
        return $db->seleccionar($q);
    }


}
