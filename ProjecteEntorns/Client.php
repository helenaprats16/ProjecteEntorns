<?php
require_once 'Usuari.php';

class Client extends Usuari {
    private $adreca;

    public function __construct($id, $nom, $email, $adreca) {
        parent::__construct($id, $nom, $email);
        $this->adreca = $adreca;
    }

    public function getAdreca() {
        return $this->adreca;
    }
    public function setAdreca($adreca) {
        $this->adreca = $adreca;
    }
}
