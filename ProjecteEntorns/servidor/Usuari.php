<?php
class Usuari {
    protected $id;
    protected $nom;
    protected $email;


    //constructor
    public function __construct($id, $nom, $email) {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
    }

    //getters i setters

    public function getId() { 
        return $this->id; 
    }
    public function setId($id) {
        $this->id = $id; 
    }

    public function getNom() { 
        return $this->nom; 
    }
    public function setNom($nom) { 
        $this->nom = $nom; 
    }

    public function getEmail() { 
        return $this->email; 
    }
    public function setEmail($email) { 
        $this->email = $email; 
    }
}