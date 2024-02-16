<?php

/**
 * Description of daoaspirante
 *
 * @author jacob
 */
class DAOAspirante {
    public function nuevo($hora_envio, $nombre, $apellido, $correo, $comunidad, $institucion, $correo_institucional, $division, $interes, $area, $porque, $estatus){
        $q = "INSERT INTO aspirantes (hora_envio, nombre, apellido, correo, comunidad, institucion, correo_institucional, division, interes_liberacion, area, porque, estatus) "
                . "VALUES('$hora_envio', '$nombre', '$apellido', '$correo', '$comunidad', '$institucion', '$correo_institucional', '$division', '$interes', '$area', '$porque', '$estatus')";
        $db = new Database();
        $id = $db->insertar_id($q);
        $est = new Aspirante($id, $hora_envio, $nombre, $apellido, $correo, $comunidad, $institucion, $correo_institucional, $division, $interes, $area, $porque, $estatus);
        return $est->toJSON();
    }
    public function actualizar($matricula, $nombre, $correoI, $correoP, $telefono, $nivel, $carrera, $estatus){
        $q = "UPDATE aspirantes SET nombre='$nombre', "
                . "correo_institucional='$correoI', correo_personal='$correoP', "
                . "telefono='$telefono', nivel='$nivel', carrera='$carrera', estatus='$estatus' "
                . "WHERE matricula='$matricula'";
        $db = new Database();
        return $db->actualizar($q);
    }

    public function actualizarEstatus($id, $correo, $estatus){
        $q = "UPDATE aspirantes SET estatus='$estatus' "
                . "WHERE id=$id and correo_institucional = '$correo'";
        $db = new Database();
        return $db->actualizar($q);
    }
    public function listado(){
        $q = "SELECT * FROM aspirantes";
        $db = new Database();
        $res = $db->seleccionar($q);
        return $res;
    }
    public function listadoFiltro($division, $programa, $area){
        $q = "SELECT * FROM aspirantes WHERE division like '%$division%' and interes_liberacion like '%$programa%' and area like '%$area%' ";
        $db = new Database();
        $res = $db->seleccionar($q);
        return $res;
    }
    public function listadoPorEstatus($estatus){
        $q = "SELECT * FROM aspirantes WHERE estatus='$estatus'";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function listadoPorInteres($interes){
        $q = "SELECT * FROM aspirantes WHERE interes_liberacion='$interes'";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function listadoPorDivision($division){
        $q = "SELECT * FROM aspirantes WHERE division='$division'";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function registro($id){
        $q = "SELECT * FROM aspirantes WHERE id='$id'";
        $db = new Database();
        $res = $db->seleccionar($q);
        return $res[0];
    }
    public function registroCorreo($correo){
        $q = "SELECT * FROM aspirantes WHERE correo_institucional='$correo'";
        $db = new Database();
        $res = $db->seleccionar($q);
        if(count($res) > 0){
            return $res[0];
        }else{
            return FALSE;
        }
    }
    public function aceptar($correo){

    }
    public function rechazar(){
        
    }
}
