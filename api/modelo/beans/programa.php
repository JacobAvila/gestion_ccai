<?php

/**
 * Description of programa
 *
 * @author jacob
 */
class Programa {
    private $id_programa;
    private $tipo;
    private $fecha_inicio;
    private $fecha_fin;
    private $estudiante;
    private $estatus;
    
    public function __construct($id_programa, $tipo, $fecha_inicio, $fecha_fin, $estudiante, $estatus) {
        $this->id_programa = $id_programa;
        $this->tipo = $tipo;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->estudiante = $estudiante;
        $this->estatus = $estatus;
    }
    public function getId_programa() {
        return $this->id_programa;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getFecha_inicio() {
        return $this->fecha_inicio;
    }

    public function getFecha_fin() {
        return $this->fecha_fin;
    }

    public function getEstudiante() {
        return $this->estudiante;
    }

    public function setId_programa($id_programa): void {
        $this->id_programa = $id_programa;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    public function setFecha_inicio($fecha_inicio): void {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function setFecha_fin($fecha_fin): void {
        $this->fecha_fin = $fecha_fin;
    }

    public function setEstudiante($estudiante): void {
        $this->estudiante = $estudiante;
    }

    public function getEstatus() {
        return $this->estatus;
    }

    public function setEstatus($estatus): void {
        $this->estatus = $estatus;
    }



}
