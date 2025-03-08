/* Script para generar la BBDD */
CREATE DATABASE equipos_db;
CREATE USER 'aida'@'localhost' IDENTIFIED BY 'abc123.';
GRANT ALL PRIVILEGES ON equipos_db. * TO 'aida'@'localhost';
USE equipos_db;
CREATE TABLE equipo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) ,
    ciudad VARCHAR(100),
    deporte ENUM('Fútbol', 'Baloncesto', 'Béisbol', 'Vóley', 'Otro'),
    fecha_fundacion DATE NOT NULL
);

INSERT INTO equipo (nombre, ciudad, deporte, fecha_fundacion)
VALUES ('Club Deportivo Fútbol', 'Madrid', 'Fútbol', '1920-05-15'),
       ('Los Gigantes', 'Los Ángeles', 'Baloncesto', '1948-10-01');

CREATE TABLE jugador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    numero INT NOT NULL,
    equipo_id INT NOT NULL,
    es_capitan TINYINT(1) DEFAULT 0,
    FOREIGN KEY (equipo_id) REFERENCES equipo(id) ON DELETE CASCADE
);

INSERT INTO jugador (nombre, numero, equipo_id, es_capitan)
VALUES ('Carlos Fernández', 10, 1, 1),
       ('Javier Gómez', 7, 2, 0),
       ('Luis Martínez', 9, 1, 0),
       ('Andrés Pérez', 5, 2, 1),
       ('Fernando Ruiz', 11, 2, 0),
       ('Diego Torres', 4, 2, 0),
       ('Ricardo Sánchez', 8, 1, 0),
       ('Hernán Díaz', 23, 2, 0),
       ('Roberto Herrera', 6, 1, 0),
       ('Martín Castro', 14, 1, 0);