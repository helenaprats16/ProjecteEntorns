# ProjecteEntorns

Aquest projecte és una aplicació PHP per a la gestió de preguntes, respostes i usuaris, amb accés a base de dades i organització orientada a objectes.

Estructura del projecte
Administrador.php, Client.php, Usuari.php: Classes d'usuaris.
Pregunta.php, OpcioResposta.php, TipoPregunta.php: Classes de domini per a preguntes i respostes.
PreguntaDAO.php: Accés a dades per a preguntes.
ConexioBBDD.php: Connexió a la base de dades.
index.html, style.css: Interfície d'usuari.
## Estructura de la base de datos


```sql
CREATE DATABASE formulario;
USE `formulario`;


CREATE TABLE TipoPregunta(
    id_tipo INT PRIMARY KEY,
    descripcio VARCHAR(250) NOT NULL
);


CREATE TABLE Pregunta (
    id_pregunta INT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    text TEXT NOT NULL,
    ponderacioNota DECIMAL(5,2) NOT NULL,
    penalitzacio DECIMAL (5,2),
    feedback VARCHAR(50) NOT NULL,
    id_tipo INT,
    FOREIGN KEY (id_tipo) REFERENCES TipoPregunta(id_tipo)
);


CREATE TABLE OpcioResposta(
    id_opcio INT PRIMARY KEY,
    textResposta TEXT NOT NULL,
    esCorrecta BOOLEAN,
    id_pregunta INT,
    FOREIGN KEY (id_pregunta) REFERENCES Pregunta(id_pregunta)
);
