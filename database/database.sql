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
VALUES ('Club Deportivo Fútbol', 'Madrid', 'Fútbol', '1920-05-15');

INSERT INTO equipo (nombre, ciudad, deporte, fecha_fundacion)
VALUES ('Los Gigantes', 'Los Ángeles', 'Baloncesto', '1948-10-01');