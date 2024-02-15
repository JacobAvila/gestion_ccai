<?php

/**
 * Description of Estudiante
 *
 * @author jacob
 */
class Estudiante {
    private $matricula;
    private $nombre;
    private $correoInstitucional;
    private $correoPersonal;
    private $nivel;
    private $carrera;
    private $password;
    private $estatus;
    
    public function __construct($matricula, $nombre, $correoInstitucional, $correoPersonal, $nivel, $carrera, $password, $estatus) {
        $this->matricula = $matricula;
        $this->nombre = $nombre;
        $this->correoInstitucional = $correoInstitucional;
        $this->correoPersonal = $correoPersonal;
        $this->nivel = $nivel;
        $this->carrera = $carrera;
        $this->password = $password;
        $this->estatus = $estatus;
    }
    
    public function getMatricula() {
        return $this->matricula;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCorreoInstitucional() {
        return $this->correoInstitucional;
    }

    public function getCorreoPersonal() {
        return $this->correoPersonal;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function getCarrera() {
        return $this->carrera;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEstatus() {
        return $this->estatus;
    }

    public function setMatricula($matricula): void {
        $this->matricula = $matricula;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setCorreoInstitucional($correoInstitucional): void {
        $this->correoInstitucional = $correoInstitucional;
    }

    public function setCorreoPersonal($correoPersonal): void {
        $this->correoPersonal = $correoPersonal;
    }

    public function setNivel($nivel): void {
        $this->nivel = $nivel;
    }

    public function setCarrera($carrera): void {
        $this->carrera = $carrera;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }

    public function setEstatus($estatus): void {
        $this->estatus = $estatus;
    }
    public function toJSON(){
        return json_encode(get_object_vars($this));
    }
    public function toArray(){
        return [
            "matricula" => $this->matricula,
            "nombre" => $this->nombre,
            "correo_institucional" => $this->correoInstitucional,
            "correo_personal" => $this->correoPersonal,
            "nivel" => $this->nivel,
            "carrera" => $this->carrera,
            "password" => $this->password,
            "estatus" => $this->estatus,
        ];
    }
}
