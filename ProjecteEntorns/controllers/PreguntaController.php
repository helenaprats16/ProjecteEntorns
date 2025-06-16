<?php
require_once __DIR__ . '/../dao/PreguntaDAO.php';
require_once __DIR__ . '/../servidor/Pregunta.php';

class PreguntaController {
    private $dao;

    public function __construct() {
        $this->dao = new PreguntaDAO();
    }

    // Retorna totes les preguntes (per AJAX)
    public function obtenirTotesJSON() {
        $preguntes = $this->dao->obtenirTotes();
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'ok',
            'preguntes' => $preguntes
        ]);
        exit;
    }

    public function inserirPregunta($pregunta) {
        return $this->dao->inserirPregunta($pregunta);
    }
}

//retorna totes les preguntes en format JSON
if (isset($_GET['action']) && $_GET['action'] === 'llistar') {
    $controller = new PreguntaController();
    $controller->obtenirTotesJSON();
}

// crear una pregunta via POST
if (isset($_GET['action']) && $_GET['action'] === 'crear' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recollim les dades del formulari segons la teua BBDD
    $nom = $_POST['nom'] ?? '';
    $text = $_POST['text'] ?? '';
    $ponderacio = $_POST['ponderacioNota'] ?? '';
    $penalitzacio = $_POST['penalitzacio'] ?? '';
    $feedback = $_POST['feedback'] ?? '';
    $format = $_POST['format'] ?? '';
    $id_tipo = $_POST['id_tipo'] ?? '';

    // id_tipo és el valor de select 'tipo', que hauria de ser un int
    // Crear objecte Pregunta
    $pregunta = new Pregunta($nom, $text, $ponderacio, $penalitzacio, $feedback, $format, $id_tipo);

    $controller = new PreguntaController();
    $id = $controller->inserirPregunta($pregunta);

    if ($id) {
        echo '<div style="color:green;text-align:center;">Pregunta creada correctament!</div>';
        echo '<meta http-equiv="refresh" content="2;url=../index.html">';//per a que despres de 2 segons retorna al index
    } else {
        echo '<div style="color:red;text-align:center;">Error al crear la pregunta.</div>';
        echo '<meta http-equiv="refresh" content="2;url=../index.html">';
    }
    exit;
}
