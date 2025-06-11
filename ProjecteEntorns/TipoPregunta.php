<?php
class TipoPregunta {
    private $id_tipo;
    private $descripcio;

    //constructor
    public function __construct($id_tipo, $descripcio) {
        $this->id_tipo = $id_tipo;
        $this->descripcio = $descripcio;
    }

    //getters i setters
    public function getIdTipo() {
        return $this->id_tipo;
 }
    public function setIdTipo($id_tipo) {
        $this->id_tipo = $id_tipo;
    }

    public function getDescripcio() {
        return $this->descripcio; 
    }
    public function setDescripcio($descripcio) {
        $this->descripcio = $descripcio; 
    }
}
