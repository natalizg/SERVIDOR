
CREATE USER 'gestor_empleados'@'localhost' IDENTIFIED BY 'gestorGESTOR2';
GRANT ALL PRIVILEGES ON *.* TO 'gestor_empleados'@'localhost' WITH GRANT OPTION;

CREATE DATABASE IF NOT EXISTS departamentos;

USE departamentos;

CREATE TABLE IF NOT EXISTS empleado (
    dni VARCHAR(10) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    es_candidato BOOLEAN NOT NULL,
    voto VARCHAR(10)
);

INSERT INTO empleado (dni, nombre, apellidos, es_candidato) VALUES
('123456789A', 'Juan', 'Pérez', 1),
('987654321B', 'María', 'Gómez', 0),
('567890123C', 'Carlos', 'Rodríguez', 1),
('321098765D', 'Laura', 'Fernández', 0),
('456789012E', 'José', 'López', 1),
('789012345F', 'Ana', 'Martínez', 0),
('234567890G', 'Miguel', 'Sánchez', 1),
('890123456H', 'Elena', 'Jiménez', 0),
('012345678I', 'Pedro', 'Ruiz', 1),
('543210987J', 'Carmen', 'Díaz', 0);