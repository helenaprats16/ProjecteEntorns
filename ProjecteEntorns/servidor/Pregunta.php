<?php
class Pregunta {
    private $nom;
    private $text;
    private $ponderacioNota;
    private $penalitzacio;
    private $feedback;
    private $format;
    private $id_tipo;

    // Constructor
    public function __construct($nom, $text, $ponderacioNota, $penalitzacio, $feedback, $format, $id_tipo) {
        $this->nom = $nom;
        $this->text = $text;
        $this->ponderacioNota = $ponderacioNota;
        $this->penalitzacio = $penalitzacio;
        $this->feedback = $feedback;
        $this->format = $format;
        $this->id_tipo = $id_tipo;
    }

    // Getters i setters
    public function getNom() {
        return $this->nom;
    }
    public function setNom($nom) {
        $this->nom = $nom;
    }
    public function getText() {
        return $this->text;
    }
    public function setText($text) {
        $this->text = $text;
    }
    public function getPonderacioNota() {
        return $this->ponderacioNota;
    }
    public function setPonderacioNota($ponderacioNota) {
        $this->ponderacioNota = $ponderacioNota;
    }
    public function getPenalitzacio() {
        return $this->penalitzacio;
    }
    public function setPenalitzacio($penalitzacio) {
        $this->penalitzacio = $penalitzacio;
    }
    public function getFeedback() {
        return $this->feedback;
    }
    public function setFeedback($feedback) {
        $this->feedback = $feedback;
    }
    public function getFormat() {
        return $this->format;
    }
    public function setFormat($format) {
        $this->format = $format;
    }
    public function getIdTipo() {
        return $this->id_tipo;
    }

    public function setIdTipo($id_tipo) {
        $this->id_tipo = $id_tipo;
    }

    


 
}