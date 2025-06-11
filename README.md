# ProjecteEntorns


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
