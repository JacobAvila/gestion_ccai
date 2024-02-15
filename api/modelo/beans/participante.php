<?php

/**
 * Description of participante
 *
 * @author jacob
 */
class Participante {
    private $id_proyecto;
    private $titulo;
    private $programa;
    private $estudiante;
    
    public function __construct($id_proyecto, $titulo, $programa, $estudiante) {
        $this->id_proyecto = $id_proyecto;
        $this->titulo = $titulo;
        $this->programa = $programa;
        $this->estudiante = $estudiante;
    }
    public function getId_proyecto() {
        return $this->id_proyecto;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getPrograma() {
        return $this->programa;
    }

    public function getEstudiante() {
        return $this->estudiante;
    }

    public function setId_proyecto($id_proyecto): void {
        $this->id_proyecto = $id_proyecto;
    }

    public function setTitulo($titulo): void {
        $this->titulo = $titulo;
    }

    public function setPrograma($programa): void {
        $this->programa = $programa;
    }

    public function setEstudiante($estudiante): void {
        $this->estudiante = $estudiante;
    }

    public function toJSON(){
        return json_encode(get_object_vars($this));
    }

}
