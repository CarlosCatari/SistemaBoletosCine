CREATE TABLE personal (
    idcliente INT AUTO_INCREMENT PRIMARY KEY,
    dni VARCHAR(8) NOT NULL,
    pwd VARCHAR(30) NOT NULL,
    nombre VARCHAR(70) NOT NULL,
    apellido VARCHAR(70) NOT NULL,
    telefono VARCHAR(9),
    correo VARCHAR(50)
);
INSERT INTO personal (dni, pwd, nombre, apellido, telefono, correo) VALUES
('70401567','70401567', 'Lucía', 'Ramírez Ortega', '954147258', 'lucia.ramirez@corp.com'),
('70401568','70401568', 'Diego', 'Fernández Vargas', '954369852', 'diego.fernandez@corp.com'),
('70401569','70401569', 'Sara', 'Navarro Vega', '954789654', 'sara.navarro@corp.com');


CREATE TABLE Clientes (
    idcliente INT AUTO_INCREMENT PRIMARY KEY,
    dni VARCHAR(8) NOT NULL,
    pwd VARCHAR(30) NOT NULL,
    nombre VARCHAR(70) NOT NULL,
    apellido VARCHAR(70) NOT NULL,
    telefono VARCHAR(9),
    correo VARCHAR(50)
);
INSERT INTO clientes (dni, pwd, nombre, apellido, telefono, correo) VALUES
('70401544','70401544', 'Carlos', 'Catari Mamani', '954987456', 'carlos@gmail.com'),
('80401558','80401558','Juan', 'Pérez Rodríguez', '954654321', 'juan.perez@gmail.com'),
('29401559','anamaria123', 'Ana Maria', 'González Sánchez', '954789123', 'ana.gonzalez@gmail.com'),
('75401560','luis45', 'Luis Fernando', 'Ramírez Martínez', '954987654', 'luis.ramirez@gmail.com'),
('65401561','carmentorres65', 'Carmen', 'Torres Fernández', '954321789', 'carmen.torres@gmail.com'),
('28401562','28401562', 'Miguel Angel', 'Díaz Gómez', '954456789', 'miguel.diaz@gmail.com'),
('29401563','laura123', 'Laura', 'Morales Ruiz', '954123789', 'laura.morales@gmail.com'),
('84401564','pesauji', 'Pedro Saul', 'Sánchez Jiménez', '954987123', 'pedro.sanchez@gmail.com'),
('81401565','matines45', 'Elena', 'Martín López', '954654987', 'elena.martin@gmail.com'),
('71601566','castrojorgue2', 'Jorge Ernesto', 'Herrera Castro', '954321456', 'jorge.herrera@gmail.com');

CREATE TABLE sala (
    idsala INT AUTO_INCREMENT PRIMARY KEY,
    tiposala VARCHAR(40) NOT NULL
);
INSERT INTO sala (tiposala) VALUES
('REGULAR'),
('2D'),
('3D');

CREATE TABLE idioma (
    ididioma INT AUTO_INCREMENT PRIMARY KEY,
    tipoidioma VARCHAR(40) NOT NULL
);
INSERT INTO idioma (tipoidioma) VALUES
('SUBTITULADO'),
('DOBLADA');

CREATE TABLE pelicula (
    idpelicula INT AUTO_INCREMENT PRIMARY KEY,
    nombrepelicula VARCHAR(40) NOT NULL,
    sinopsis LONGTEXT,
    director VARCHAR(40),
    genero VARCHAR(20) NOT NULL,
    idioma VARCHAR(30) NOT NULL,
    fechaestreno DATE NOT NULL,
    duracion TIME NOT NULL
);
INSERT INTO pelicula (nombrepelicula, sinopsis, director, genero, idioma, fechaestreno, duracion) VALUES
('Planeta de los Simios', 'Muchos años después del reinado de César, un joven simio emprende un viaje que lo llevará a cuestionar todo lo que le han enseñado sobre el pasado y a tomar decisiones que definirán el futuro tanto para los simios como para los humanos.', '-', 'Acción', 'Español', '2024-05-09', '01:30:00');

INSERT INTO pelicula (nombrepelicula, sinopsis, director, genero, idioma, fechaestreno, duracion) VALUES
('Amigos imaginarios', 'Sigue a una niña que pasa por una experiencia difícil y entonces empieza a ver a los amigos imaginarios de todo el mundo que se han quedado atrás cuando sus amigos de la vida real han crecido.', '-', 'Familiar', 'Español', '2024-05-16', '01:50:00');

