<?php
class PlanTrabajo{
    function insertar($id_proyecto, $semestre, $actividad, $fecha_inicio, $fecha_fin, $asignado){
        $q = "INSERT INTO plan_trabajo (id_proyecto, semestre, actividad, fecha_inicio, fecha_fin, asignado) "
            ."VALUES($id_proyecto, '$semestre', '$actividad', '$fecha_inicio', '$fecha_fin', '$asignado')";
        
        $db = new Database();
        $id_actividad = $db->insertar_id($q);

        return $id_actividad;
    }
    function actualizar($id_actividad, $id_proyecto, $semestre, $actividad, $fecha_inicio, $fecha_fin, $asignado){
        $q = "UPDATE plan_trabajo SET actividad='$actividad', fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin', asignado='$asignado' "
                ."WHERE id_actividad=$id_actividad and id_proyecto=$id_proyecto and semestre = '$semestre' ";
        
        $db = new Database();
        return $db->actualziar($q);
    }
    function eliminar($id_actividad, $id_proyecto, $semestre){
        $q = "DELETE FROM plan_trabajo "
                ."WHERE id_actividad=$id_actividad and id_proyecto=$id_proyecto and semestre = '$semestre' ";
        
        $db = new Database();
        return $db->actualziar($q);
    }

    function listado($id_proyecto, $semestre){
        $q = "SELECT * FROM plan_trabajo WHERE id_proyecto=$id_proyecto and semestre = '$semestre' ";

        $db = new Database();
        return $db->seleccionar($q);
    }
    function registro($id_actividad, $id_proyecto, $semestre){
        $q = "SELECT * FROM plan_trabajo WHERE id_actividad=$id_actividad and id_proyecto=$id_proyecto and semestre = '$semestre' ";

        $db = new Database();
        return $db->seleccionar($q);
    }

}