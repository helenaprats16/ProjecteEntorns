<?php
class OpcioResposta {
    private $textResposta;
    private $esCorrecta;


    //constructor
    public function __construct($textResposta, $esCorrecta) {
        $this->textResposta = $textResposta;
        $this->esCorrecta = $esCorrecta;
    }

    //getters i setters
    public function getTextResposta() { 
        return $this->textResposta; 
    }
    public function setTextResposta($textResposta) {
        $this->textResposta = $textResposta;  
    }

    public function getEsCorrecta() { 
        return $this->esCorrecta; 
    }
    public function setEsCorrecta($esCorrecta) {
        $this->esCorrecta = $esCorrecta;   
}
}
