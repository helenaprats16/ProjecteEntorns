<?php
require_once 'Usuari.php';

class Administrador extends Usuari {
    private $permisos;


    //constructor de administrador que hereda de usuari
    public function __construct($id, $nom, $email, $permisos) {
        parent::__construct($id, $nom, $email);
        $this->permisos = $permisos;
    }

    //getters i setters
    public function getPermisos() { 
        return $this->permisos;
    }
    public function setPermisos($permisos) {
        $this->permisos = $permisos; 
    }
}