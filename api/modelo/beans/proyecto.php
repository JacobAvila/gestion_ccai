<?php

/**
 * Description of proyecto
 *
 * @author jacob
 */
class Proyecto {
    private $id_proyecto;
    private $titulo;
    private $fechaRegistro;
    private $objetivo;
    private $descripcion;
    private $fechaInicio;
    private $fechaFin;
    private $estatus;
    private $responsables;
    private $participantes;
    
    public function __construct($id_proyecto, $titulo, $fechaRegistro, $objetivo, $descripcion, $fechaInicio, $fechaFin, $estatus) {
        $this->id_proyecto = $id_proyecto;
        $this->titulo = $titulo;
        $this->fechaRegistro = $fechaRegistro;
        $this->objetivo = $objetivo;
        $this->descripcion = $descripcion;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
        $this->estatus = $estatus;
    }
    public function getId_proyecto() {
        return $this->id_proyecto;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    public function getObjetivo() {
        return $this->objetivo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getFechaInicio() {
        return $this->fechaInicio;
    }

    public function getFechaFin() {
        return $this->fechaFin;
    }

    public function getEstatus() {
        return $this->estatus;
    }

    public function setId_proyecto($id_proyecto): void {
        $this->id_proyecto = $id_proyecto;
    }

    public function setTitulo($titulo): void {
        $this->titulo = $titulo;
    }

    public function setFechaRegistro($fechaRegistro): void {
        $this->fechaRegistro = $fechaRegistro;
    }

    public function setObjetivo($objetivo): void {
        $this->objetivo = $objetivo;
    }

    public function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function setFechaInicio($fechaInicio): void {
        $this->fechaInicio = $fechaInicio;
    }

    public function setFechaFin($fechaFin): void {
        $this->fechaFin = $fechaFin;
    }

    public function setEstatus($estatus): void {
        $this->estatus = $estatus;
    }

    public function getResponsables() {
        return $this->responsables;
    }

    public function getParticipantes() {
        return $this->participantes;
    }

    public function setResponsables($responsables): void {
        $this->responsables = $responsables;
    }

    public function setParticipantes($participantes): void {
        $this->participantes = $participantes;
    }

    public function toJSON(){
        return json_encode(get_object_vars($this));
    }

}
