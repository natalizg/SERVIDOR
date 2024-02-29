CREATE DATABASE IF NOT EXISTS RESTAURANTE;

CREATE USER IF NOT EXISTS 'RESTAURANTE'@'localhost' IDENTIFIED BY 'userUSER2';
GRANT ALL PRIVILEGES ON RESTAURANTE.* TO 'RESTAURANTE'@'localhost';

USE RESTAURANTE;

CREATE TABLE CLIENTE(
    CORREO_CLIENTE VARCHAR(50) PRIMARY KEY,
    CONTRASENA VARCHAR(30) NOT NULL
);

CREATE TABLE RESERVA(
    FECHA DATE,
    HORA TIME,
    MESA INT,
    DESCRIPCION VARCHAR(250),
    CORREO_CLIENTE VARCHAR(50),
    PRIMARY KEY (FECHA, HORA, MESA),
    FOREIGN KEY (CORREO_CLIENTE) REFERENCES CLIENTE(CORREO_CLIENTE)
);

CREATE TABLE EMPLEADO(
    USUARIO_EMPLEADO VARCHAR(50) PRIMARY KEY,
    CONTRASENA VARCHAR(30) NOT NULL
);

-- Insertar empleado root
INSERT INTO EMPLEADO (USUARIO_EMPLEADO, CONTRASENA)
VALUES ('root', 'root');


INSERT INTO CLIENTE (CORREO_CLIENTE, CONTRASENA)
VALUES 
    ('cliente1@gmail.com', 'cliente1'),
    ('cliente2@gmail.com', 'cliente2'),
    ('cliente3@gmail.com', 'cliente3'),
    ('cliente4@gmail.com', 'cliente4'),
    ('cliente5@gmail.com', 'cliente5');

-- Insertar reservas futuras para cada cliente
INSERT INTO RESERVA (FECHA, HORA, MESA, DESCRIPCION, CORREO_CLIENTE)
VALUES 
    ('2024-06-01', '20:30', 1, '', 'cliente1@gmail.com'),
    ('2024-06-02', '21:00', 2, 'aniversario', 'cliente1@gmail.com'),
    ('2024-06-03', '21:30', 3, '', 'cliente1@gmail.com'),

    ('2024-06-01', '22:00', 4, 'reunión', 'cliente2@gmail.com'),
    ('2024-06-02', '22:30', 5, 'aniversario', 'cliente2@gmail.com'),
    ('2024-06-03', '23:00', 1, '', 'cliente2@gmail.com'),

    ('2024-06-01', '20:30', 2, '', 'cliente3@gmail.com'),
    ('2024-06-02', '21:00', 3, 'aniversario', 'cliente3@gmail.com'),
    ('2024-06-03', '21:30', 4, 'celebración', 'cliente3@gmail.com'),

    ('2024-06-01', '22:00', 5, 'reunión', 'cliente4@gmail.com'),
    ('2024-06-02', '22:30', 1, 'aniversario', 'cliente4@gmail.com'),
    ('2024-06-03', '23:00', 2, '', 'cliente4@gmail.com'),

    ('2024-06-01', '20:30', 3, 'reunión', 'cliente5@gmail.com'),
    ('2024-06-02', '21:00', 4, '', 'cliente5@gmail.com'),
    ('2024-06-03', '21:30', 5, 'celebración', 'cliente5@gmail.com');


-- Insertar reservas pasadas para cada cliente (del año anterior)
INSERT INTO RESERVA (FECHA, HORA, MESA, DESCRIPCION, CORREO_CLIENTE)
VALUES 
    ('2023-06-01', '20:30', 1, 'evento', 'cliente1@gmail.com'),
    ('2023-06-02', '21:00', 2, 'fiesta', 'cliente1@gmail.com'),
    ('2023-06-03', '21:30', 3, 'cena', 'cliente1@gmail.com'),

    ('2023-06-01', '22:00', 4, 'evento', 'cliente2@gmail.com'),
    ('2023-06-02', '22:30', 5, '', 'cliente2@gmail.com'),
    ('2023-06-03', '23:00', 1, 'cena', 'cliente2@gmail.com'),

    ('2023-06-01', '20:30', 2, 'evento', 'cliente3@gmail.com'),
    ('2023-06-02', '21:00', 3, '', 'cliente3@gmail.com'),
    ('2023-06-03', '21:30', 4, 'cena', 'cliente3@gmail.com'),

    ('2023-06-01', '22:00', 5, 'evento', 'cliente4@gmail.com'),
    ('2023-06-02', '22:30', 1, 'fiesta', 'cliente4@gmail.com'),
    ('2023-06-03', '23:00', 2, '', 'cliente4@gmail.com'),

    ('2023-06-01', '20:30', 3, 'evento', 'cliente5@gmail.com'),
    ('2023-06-02', '21:00', 4, 'fiesta', 'cliente5@gmail.com'),
    ('2023-06-03', '21:30', 5, '', 'cliente5@gmail.com');