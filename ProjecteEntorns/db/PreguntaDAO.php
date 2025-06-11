<?php
require_once 'ConexioBBDD.php';
require_once 'Pregunta.php';

class PreguntaDAO {
    private $conn;

    public function __construct() {
        $db = new ConexioBBDD();
        $this->conn = $db->connect();
    }

    //INSERT per a guardar una nova pregunta a la base de dades
   
    public function inserirPregunta(Pregunta $pregunta) {
        try {
            $sql = "INSERT INTO Pregunta (nom, text, ponderacioNota, penalitzacio, feedback, id_tipo) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $pregunta->getNom(),
                $pregunta->getText(),
                $pregunta->getPonderacio(),
                $pregunta->getPenalitzacio(),
                $pregunta->getFeedback(),
                $pregunta->getTipo()
            ]);
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            error_log('Error inserirPregunta: ' . $e->getMessage());
            return null;
        }
    }

    //retorna totes les preguntes de la base de dades
    public function obtenirTotes() {
        try {
            $sql = "SELECT * FROM Pregunta";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error obtenirTotes: ' . $e->getMessage());
            return null;
        }
    }

    //retorna una pergunta per el id
    public function obtenirPerId($id) {
        try {
            $sql = "SELECT * FROM Pregunta WHERE id_pregunta = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error obtenirPerId: ' . $e->getMessage());
            return null;
        }
    }

    //eliminar una pregunta per el id
    public function eliminar($id) {
        try {
            $sql = "DELETE FROM Pregunta WHERE id_pregunta = ?";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            error_log('Error eliminar: ' . $e->getMessage());
            return false;
        }
    }
    //actualitza una pregunta per el id
    public function actualitzarPregunta($id, Pregunta $pregunta) {
        try {
            $sql = "UPDATE Pregunta SET nom = ?, text = ?, ponderacioNota = ?, penalitzacio = ?, feedback = ?, id_tipo = ? WHERE id_pregunta = ?";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([
                $pregunta->getNom(),
                $pregunta->getText(),
                $pregunta->getPonderacio(),
                $pregunta->getPenalitzacio(),
                $pregunta->getFeedback(),
                $pregunta->getTipo(),
                $id
            ]);
        } catch (PDOException $e) {
            error_log('Error actualitzarPregunta: ' . $e->getMessage());
            return false;
        }
    }

    //buscar la pregunta per el tipo de pregunta

    public function buscarPerTipus($id_tipo) {
        try {
            $sql = "SELECT * FROM Pregunta WHERE id_tipo = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id_tipo]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error buscarPerTipus: ' . $e->getMessage());
            return null;
        }
    }
}
