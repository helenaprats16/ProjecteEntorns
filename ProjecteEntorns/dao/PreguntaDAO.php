<?php
require_once __DIR__ . '/../conexio/ConexioBBDD.php';
require_once __DIR__ . '/../servidor/Pregunta.php';

class PreguntaDAO {
    private $conn;

    public function __construct() {
        $db = new ConexioBBDD();
        $this->conn = $db->connect();
    }

    //INSERT per a guardar una nova pregunta a la base de dades
   
    public function inserirPregunta(Pregunta $pregunta) {
        try {
            $sql = "INSERT INTO pregunta (nom, text, ponderacioNota, penalitzacio, feedback, format, id_tipo) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $pregunta->getNom(),
                $pregunta->getText(),
                $pregunta->getPonderacioNota(),
                $pregunta->getPenalitzacio(),
                $pregunta->getFeedback(),
                $pregunta->getFormat(),
                $pregunta->getIdTipo()
            ]);
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            echo '<div style="color:red;text-align:center;">Error PDO: ' . $e->getMessage() . '</div>';
            error_log('Error inserirPregunta: ' . $e->getMessage());
            return null;
        }
    }

    //retorna totes les preguntes de la base de dades
    public function obtenirTotes() {
        try {
            $sql = "SELECT p.*, t.descripcio AS tipus_nom FROM pregunta p LEFT JOIN tipopregunta t ON p.id_tipo = t.id_tipo";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo '<div style="color:red;text-align:center;">Error PDO: ' . $e->getMessage() . '</div>';
            error_log('Error obtenirTotes: ' . $e->getMessage());
            return null;
        }
    }

    //retorna una pergunta per el id
    public function obtenirPerId($id) {
        try {
            $sql = "SELECT * FROM pregunta WHERE id_pregunta = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo '<div style="color:red;text-align:center;">Error PDO: ' . $e->getMessage() . '</div>';
            error_log('Error obtenirPerId: ' . $e->getMessage());
            return null;
        }
    }

    //eliminar una pregunta per el id
    public function eliminar($id) {
        try {
            $sql = "DELETE FROM pregunta WHERE id_pregunta = ?";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            echo '<div style="color:red;text-align:center;">Error PDO: ' . $e->getMessage() . '</div>';
            error_log('Error eliminar: ' . $e->getMessage());
            return false;
        }
    }
    //actualitza una pregunta per el id
    public function actualitzarPregunta($id, Pregunta $pregunta) {
        try {
            $sql = "UPDATE pregunta SET nom = ?, text = ?, ponderacioNota = ?, penalitzacio = ?, feedback = ?, format = ?, id_tipo = ? WHERE id_pregunta = ?";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([
                $pregunta->getNom(),
                $pregunta->getText(),
                $pregunta->getPonderacioNota(),
                $pregunta->getPenalitzacio(),
                $pregunta->getFeedback(),
                $pregunta->getFormat(),
                $pregunta->getIdTipo(),
                $id
            ]);
        } catch (PDOException $e) {
            echo '<div style="color:red;text-align:center;">Error PDO: ' . $e->getMessage() . '</div>';
            error_log('Error actualitzarPregunta: ' . $e->getMessage());
            return false;
        }
    }

    //buscar la pregunta per el tipo de pregunta

    public function buscarPerTipus($id_tipo) {
        try {
            $sql = "SELECT * FROM pregunta WHERE id_tipo = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id_tipo]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo '<div style="color:red;text-align:center;">Error PDO: ' . $e->getMessage() . '</div>';
            error_log('Error buscarPerTipus: ' . $e->getMessage());
            return null;
        }
    }
}
