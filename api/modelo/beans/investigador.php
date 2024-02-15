<?php

/**
 * Description of investigador
 *
 * @author jacob
 */
class Investigador {
    private $id_investigador;
    private $nombre;
    private $correoInstitucional;
    private $correoPersonal;
    private $telefono;
    private $password;
    
    public function __construct($id_investigador, $nombre, $correoInstitucional, $correoPersonal, $telefono, $password) {
        $this->id_investigador = $id_investigador;
        $this->nombre = $nombre;
        $this->correoInstitucional = $correoInstitucional;
        $this->correoPersonal = $correoPersonal;
        $this->telefono = $telefono;
        $this->password = $password;
    }

    public function getId_investigador() {
        return $this->id_investigador;
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

    public function getTelefono() {
        return $this->telefono;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setId_investigador($id_investigador): void {
        $this->id_investigador = $id_investigador;
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

    public function setTelefono($telefono): void {
        $this->telefono = $telefono;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }
    public function toJSON(){
        return json_encode(get_object_vars($this), JSON_UNESCAPED_UNICODE);
    }
    public function toArray(){
        return [
            "id_investigador" => $this->id_investigador,
            "nombre" => $this->nombre,
            "correo_institucional" => $this->correoInstitucional,
            "correo_personal" => $this->correoPersonal,
            "telefono" => $this->telefono,
            "password" => $this->password
        ];
    }
}
