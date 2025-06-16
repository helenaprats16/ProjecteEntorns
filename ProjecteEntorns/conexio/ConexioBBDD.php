<?php
class ConexioBBDD {
    private $host = 'localhost';
    private $dbname = 'formulario';
    private $user = 'root';
    private $pass = 'helena';
    private $conn;

    public function connect() {
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            die('Error de connexió: ' . $e->getMessage());
        }
    }

}