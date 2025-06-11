<?php
class Pregunta {
    private $nom;
    private $text;
    private $tipo;
    private $respostes;
    private $respostaCorrecta;
    private $ponderacio;
    private $penalitzacio;
    private $feedback;


    //contructor
    public function __construct($nom, $text, $tipo, $respostes, $respostaCorrecta, $ponderacio, $penalitzacio, $feedback) {
        $this->nom = $nom;
        $this->text = $text;
        $this->tipo = $tipo;
        $this->respostes = $respostes;
        $this->respostaCorrecta = $respostaCorrecta;
        $this->ponderacio = $ponderacio;
        $this->penalitzacio = $penalitzacio;
        $this->feedback = $feedback;
    }

    //getteres i setters

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

    public function getTipo() {
        return $this->tipo; 
    }
    public function setTipo($tipo) {
        $this->tipo = $tipo; 
    }

    public function getRespostes() { 
        return $this->respostes; 
    }
    public function setRespostes($respostes) {
        $this->respostes = $respostes; 
    }

    public function getRespostaCorrecta() {
        return $this->respostaCorrecta; 
    }
    public function setRespostaCorrecta($respostaCorrecta) {
        $this->respostaCorrecta = $respostaCorrecta;
    }

    public function getPonderacio() {
        return $this->ponderacio; 
    }
    public function setPonderacio($ponderacio) {
        $this->ponderacio = $ponderacio; 
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
}