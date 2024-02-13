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
    ('miguel@gmail.com', 'miguel'),
    ('ana@gmail.com', 'ana'),
    ('luis@gmail.com', 'luis'),
    ('maria@gmail.com', 'maria'),
    ('juan@gmail.com', 'juan');


-- Insertar reservas futuras para cada cliente
INSERT INTO RESERVA (FECHA, HORA, MESA, DESCRIPCION, CORREO_CLIENTE)
VALUES 
    -- Reservas futuras para Miguel
    ('2024-06-01', '12:00:00', 1, 'Cumpleaños', 'miguel@gmail.com'),
    ('2024-06-02', '14:00:00', 2, 'Aniversario', 'miguel@gmail.com'),
    ('2024-06-03', '18:00:00', 3, 'Almuerzo de negocios', 'miguel@gmail.com'),
    ('2024-06-04', '12:00:00', 4, 'Cena romántica', 'miguel@gmail.com'),
    ('2024-06-05', '14:00:00', 5, 'Reunión familiar', 'miguel@gmail.com'),
    -- Reservas futuras para Ana
    ('2024-06-06', '12:00:00', 1, 'Despedida de soltera', 'ana@gmail.com'),
    ('2024-06-07', '14:00:00', 2, 'Almuerzo de cumpleaños', 'ana@gmail.com'),
    ('2024-06-08', '18:00:00', 3, 'Cena de negocios', 'ana@gmail.com'),
    ('2024-06-09', '12:00:00', 4, NULL, 'ana@gmail.com'),
    ('2024-06-10', '14:00:00', 5, NULL, 'ana@gmail.com'),
    -- Reservas futuras para Luis
    ('2024-06-11', '12:00:00', 1, NULL, 'luis@gmail.com'),
    ('2024-06-12', '14:00:00', 2, NULL, 'luis@gmail.com'),
    ('2024-06-13', '18:00:00', 3, NULL, 'luis@gmail.com'),
    ('2024-06-14', '12:00:00', 4, NULL, 'luis@gmail.com'),
    ('2024-06-15', '14:00:00', 5, NULL, 'luis@gmail.com'),
    -- Reservas futuras para Maria
    ('2024-06-16', '12:00:00', 1, NULL, 'maria@gmail.com'),
    ('2024-06-17', '14:00:00', 2, NULL, 'maria@gmail.com'),
    ('2024-06-18', '18:00:00', 3, NULL, 'maria@gmail.com'),
    ('2024-06-19', '12:00:00', 4, NULL, 'maria@gmail.com'),
    ('2024-06-20', '14:00:00', 5, NULL, 'maria@gmail.com'),
    -- Reservas futuras para Juan
    ('2024-06-21', '12:00:00', 1, NULL, 'juan@gmail.com'),
    ('2024-06-22', '14:00:00', 2, NULL, 'juan@gmail.com'),
    ('2024-06-23', '18:00:00', 3, NULL, 'juan@gmail.com'),
    ('2024-06-24', '12:00:00', 4, NULL, 'juan@gmail.com'),
    ('2024-06-25', '14:00:00', 5, NULL, 'juan@gmail.com');

-- Insertar reservas pasadas para cada cliente (del año anterior)
INSERT INTO RESERVA (FECHA, HORA, MESA, DESCRIPCION, CORREO_CLIENTE)
VALUES 
    -- Reservas pasadas para Miguel
    ('2023-01-01', '12:00:00', 1, 'Aniversario', 'miguel@gmail.com'),
    ('2023-02-01', '14:00:00', 2, 'Cumpleaños', 'miguel@gmail.com'),
    ('2023-03-01', '18:00:00', 3, 'Alérgico al gluten', 'miguel@gmail.com'),
    ('2023-04-01', '12:00:00', 4, NULL, 'miguel@gmail.com'),
    ('2023-05-01', '14:00:00', 5, NULL, 'miguel@gmail.com'),
    -- Reservas pasadas para Ana
    ('2023-01-02', '12:00:00', 1, NULL, 'ana@gmail.com'),
    ('2023-02-02', '14:00:00', 2, NULL, 'ana@gmail.com'),
    ('2023-03-02', '18:00:00', 3, NULL, 'ana@gmail.com'),
    ('2023-04-02', '12:00:00', 4, NULL, 'ana@gmail.com'),
    ('2023-05-02', '14:00:00', 5, NULL, 'ana@gmail.com'),
    -- Reservas pasadas para Luis
    ('2023-01-03', '12:00:00', 1, NULL, 'luis@gmail.com'),
    ('2023-02-03', '14:00:00', 2, NULL, 'luis@gmail.com'),
    ('2023-03-03', '18:00:00', 3, NULL, 'luis@gmail.com'),
    ('2023-04-03', '12:00:00', 4, NULL, 'luis@gmail.com'),
    ('2023-05-03', '14:00:00', 5, NULL, 'luis@gmail.com'),
    -- Reservas pasadas para Maria
    ('2023-01-04', '12:00:00', 1, NULL, 'maria@gmail.com'),
    ('2023-02-04', '14:00:00', 2, NULL, 'maria@gmail.com'),
    ('2023-03-04', '18:00:00', 3, NULL, 'maria@gmail.com'),
    ('2023-04-04', '12:00:00', 4, NULL, 'maria@gmail.com'),
    ('2023-05-04', '14:00:00', 5, NULL, 'maria@gmail.com'),
    -- Reservas pasadas para Juan
    ('2023-01-05', '12:00:00', 1, NULL, 'juan@gmail.com'),
    ('2023-02-05', '14:00:00', 2, NULL, 'juan@gmail.com'),
    ('2023-03-05', '18:00:00', 3, NULL, 'juan@gmail.com'),
    ('2023-04-05', '12:00:00', 4, NULL, 'juan@gmail.com'),
    ('2023-05-05', '14:00:00', 5, NULL, 'juan@gmail.com');

