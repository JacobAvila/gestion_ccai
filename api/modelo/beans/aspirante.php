<?php

/**
 * Description of Aspirante
 *
 * @author jacob
 */
class Aspirante {
    private $id;
    private $hora_envio;
    private $nombre;
    private $apellido;
    private $correo;
    private $comunidad;
    private $institucion;
    private $correo_institucional;
    private $division;
    private $interes;
    private $area;
    private $porque;
    private $estatus;
    
    public function __construct($id, $hora_envio, $nombre, $apellido, $correo, $comunidad, $institucion, $correo_institucional, $division, $interes, $area, $porque, $estatus) {
        $this->id = $id;
        $this->hora_envio = $hora_envio;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->comunidad = $comunidad;
        $this->institucion = $institucion;
        $this->correo_institucional = $correo_institucional;
        $this->division = $division;
        $this->interes = $interes;
        $this->area = $area;
        $this->porque = $porque;
        $this->estatus = $estatus;
    }
    
    public function getId() {
        return $this->id;
    }
    public function getHora_envio() {
        return $this->hora_envio;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getCorreo() {
        return $this->correo;
    }
    public function getComunidad() {
        return $this->comunidad;
    }
    public function getInstitucion() {
        return $this->institucion;
    }
    public function getCorreo_institucional() {
        return $this->correo_institucional;
    }

    public function getDivision() {
        return $this->division;
    }

    public function getArea() {
        return $this->area;
    }
    public function getPorque() {
        return $this->porque;
    }

    public function getEstatus() {
        return $this->estatus;
    }
    

    public function setId($id): void {
        $this->id = $id;
    }
    public function setHora_envio($hora_envio): void {
        $this->hora_envio = $hora_envio;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido): void {
        $this->apellido = $apellido;
    }

    public function setCorreo_institucional($correo_institucional): void {
        $this->correo_institucional = $correo_institucional;
    }

    public function setCorreo($correo): void {
        $this->correo = $correo;
    }
    public function setEstatus($estatus): void {
        $this->estatus = $estatus;
    }
    public function toJSON(){
        return json_encode(get_object_vars($this));
    }
    public function toArray(){
        return [
            "id" => $this->id,
            "hora_envio" => $this->hora_envio,
            "nombre" => $this->nombre,
            "apellido" => $this->apellido,
            "correo" => $this->correo,
            "comunidad" => $this->comunidad,
            "institucion" => $this->institucion,
            "correo_institucional" => $this->correo_institucional,
            "division" => $this->division,
            "interes" => $this->interes,
            "area" => $this->area,
            "porque" => $this->porque,
            "estatus" => $this->estatus,
        ];
    }
}
