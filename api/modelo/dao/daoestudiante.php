<?php

/**
 * Description of daoestudiante
 *
 * @author jacob
 */
class DAOEstudiante {
    public function nuevo($matricula, $nombres, $apellido_1, $apellido_2, $correoI, $correoP, $telefono, $division, $estatus){
        $q = "INSERT INTO estudiante (matricula, nombres, apellido_1, apellido_2, correo, correo_adicional, telefono, division, estatus) "
                . "VALUES('$matricula', '$nombres', '$apellido_1', '$apellido_2', '$correoI', '$correoP', '$telefono', '$division', '$estatus')";
        $db = new Database();
        echo $q."<br>";
        return $db->insertar_id($q);
    }
    public function actualizar($id_estudiante, $matricula, $nombres, $apellido_1, $apellido_2, $correo, $correo_a, $telefono, $division){
        $q = "UPDATE estudiante SET nombres='$nombres', apellido_1='$apellido_1', apellido_2='$apellido_2', "
                . "correo='$correo', correo_adicional='$correo_a', "
                . "telefono='$telefono', division='$division', matricula='$matricula' "
                . "WHERE id_estudiante=$id_estudiante";
        $db = new Database();
        return $db->actualizar($q);
    }
    public function actualizarPassword($matricula, $password){
        $q = "UPDATE estudiante SET password='$password' "
                . "WHERE matricula='$matricula'";
        $db = new Database();
        return $db->actualizar($q);
    }
    public function actualizarEstatus($id_estudiante, $correo, $estatus){
        $q = "UPDATE estudiante SET estatus='$estatus' "
                . "WHERE id_estudiante=$id_estudiante and correo='$correo'";
        $db = new Database();
        return $db->actualizar($q);
    }
    public function listado(){
        $q = "SELECT * FROM estudiante_programa";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function listadoPrograma($semestre, $programa, $estatus, $estatus_prog){
        $q = "SELECT * FROM estudiante_programa Where semestre = '$semestre' and estatus='$estatus' and tipo='$programa' and estatus_programa='$estatus_prog'"; 
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function listadoPorEstatus($estatus){
        $q = "SELECT * FROM estudiante WHERE estatus='$estatus'";
        $db = new Database();
        $res = $db->seleccionar($q);
        $estudiantes = array();
        foreach($res as $r){
            $est = new Estudiante($r->matricula, $r->nombre, $r->correo_institucional, $r->correo_personal, $r->telefono, $r->nivel, $r->carrera, $r->password, $r->estatus);
            array_push($estudiantes, $est->toJSON());
        }
        return json_encode($estudiantes);
    }
    public function listadoPorNivel($nivel){
        $q = "SELECT * FROM estudiante WHERE nivel='$nivel'";
        $db = new Database();
        $res = $db->seleccionar($q);
        $estudiantes = array();
        foreach($res as $r){
            $est = new Estudiante($r->matricula, $r->nombre, $r->correo_institucional, $r->correo_personal, $r->telefono, $r->nivel, $r->carrera, $r->password, $r->estatus);
            array_push($estudiantes, $est->toJSON());
        }
        return json_encode($estudiantes);
    }
    public function listadoPorCarrera($carrera){
        $q = "SELECT * FROM estudiante WHERE carrera='$carrera'";
        $db = new Database();
        $res = $db->seleccionar($q);
        $estudiantes = array();
        foreach($res as $r){
            $est = new Estudiante($r->matricula, $r->nombre, $r->correo_institucional, $r->correo_personal, $r->telefono, $r->nivel, $r->carrera, $r->password, $r->estatus);
            array_push($estudiantes, $est->toJSON());
        }
        return json_encode($estudiantes);
    }
    public function registro($id_estudiante){
        $q = "SELECT * FROM estudiante e, programa p WHERE e.id_estudiante='$id_estudiante' and "
                ."e.id_estudiante = p.id_estudiante and e.correo = p.estudiante_correo";
        $db = new Database();
        return $db->seleccionar($q)[0];
    }
    public function registroCorreo($correo){
        $q = "SELECT * FROM estudiante WHERE correo='$correo'";
        $db = new Database();
        return $db->seleccionar($q);
    }

    public function registroPrograma($correo){
        $q = "SELECT * FROM estudiante_programa WHERE correo='$correo' and estatus_programa='Activo'";
        $db = new Database();
        return $db->seleccionar($q);
    }

}
