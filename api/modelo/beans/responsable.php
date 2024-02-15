<?php


/**
 * Description of responsable
 *
 * @author jacob
 */
class Responsable {
    private $proyecto;
    private $investigador;
    private $tipo;
    
    public function __construct($proyecto, $investigador, $tipo) {
        $this->proyecto = $proyecto;
        $this->investigador = $investigador;
        $this->tipo = $tipo;
    }
    public function getProyecto() {
        return $this->proyecto;
    }

    public function getInvestigador() {
        return $this->investigador;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setProyecto($proyecto): void {
        $this->proyecto = $proyecto;
    }

    public function setInvestigador($investigador): void {
        $this->investigador = $investigador;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

}
