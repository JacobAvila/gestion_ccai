<?php
class DAOPlanTrabajo{
    function insertar($id_proyecto, $semestre, $actividad, $fecha_inicio, $fecha_fin, $asignado, $avance, $estatus){
        $q = "INSERT INTO plan_trabajo (id_proyecto, semestre, actividad, fecha_inicio, fecha_fin, asignado, avance, estatus) "
            ."VALUES($id_proyecto, '$semestre', '$actividad', '$fecha_inicio', '$fecha_fin', '$asignado', $avance, '$estatus')";
        
        $db = new Database();
        $id_actividad = $db->insertar_id($q);

        return $q;
    }
    function actualizar($id_actividad, $id_proyecto, $semestre, $actividad, $fecha_inicio, $fecha_fin, $asignado){
        $q = "UPDATE plan_trabajo SET actividad='$actividad', fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin', asignado='$asignado' "
                ."WHERE id_actividad=$id_actividad and id_proyecto=$id_proyecto and semestre = '$semestre' ";
        
        $db = new Database();
        return $db->actualziar($q);
    }
    function actualizarAvance($id_actividad, $id_proyecto, $semestre, $avance){
        $q = "UPDATE plan_trabajo SET avance=$avance "
                ."WHERE id_actividad=$id_actividad and id_proyecto=$id_proyecto and semestre = '$semestre' ";
        
        $db = new Database();
        $db->actualziar($q);
        return $q;
    }
    function actualizarEstatus($id_actividad, $id_proyecto, $semestre, $estatus){
        $q = "UPDATE plan_trabajo SET estatus='$estatus' "
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
        $q = "SELECT * FROM plan_trabajo WHERE id_proyecto=$id_proyecto and semestre = '$semestre' order by id_actividad asc";

        $db = new Database();
        return $db->seleccionar($q);
    }
    function listadoPorAsignacion($id_proyecto, $semestre, $asignacion){
        $q = "SELECT * FROM plan_trabajo WHERE id_proyecto=$id_proyecto and semestre = '$semestre' and asignado='$asignacion' order by id_actividad asc";

        $db = new Database();
        return $db->seleccionar($q);
    }
    function registro($id_actividad, $id_proyecto, $semestre){
        $q = "SELECT * FROM plan_trabajo WHERE id_actividad=$id_actividad and id_proyecto=$id_proyecto and semestre = '$semestre' ";

        $db = new Database();
        return $db->seleccionar($q);
    }

}