<?php
/**
 * Description of daosemestre
 *
 * @author jacob
 */
class DAOSemestre {
    public function nuevo($nombre, $fechaI, $fechaF){
        $q = "INSERT INTO semestre (nombre, fecha_inicio, fecha_fin) "
                . "VALUES('$nombre', '$fechaI', '$fechaF')";
        $db = new Database();
        return $db->insertar($q);
    }
    public function actualizar($nombre, $fechaI, $fechaF){
        $q = "UPDATE semestre SET fecha_inicio='$fechaI', fecha_fin='$fechaF' "
                . "WHERE nombre='$nombre'";
        $db = new Database();
        return $db->actualizar($q);
    }
    public function listado(){
        $q = "SELECT * FROM semestre";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function registro($nombre){
        $q = "SELECT * FROM semestre WHERE nombre='$nombre'";
        $db = new Database();
        $res = $db->seleccionar($q);
        return $res[0];
    }
    
}
