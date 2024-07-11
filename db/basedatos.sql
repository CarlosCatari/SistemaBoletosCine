CREATE TABLE administrador (
    idadmin INT AUTO_INCREMENT PRIMARY KEY,
    dniadmin VARCHAR(8) NOT NULL,
    pwdadmin VARCHAR(30) NOT NULL,
    nombreadmin VARCHAR(70) NOT NULL,
    apellidoadmin VARCHAR(70) NOT NULL,
    telefonoadmin VARCHAR(9),
    correoadmin VARCHAR(50)
);
INSERT INTO administrador (dniadmin, pwdadmin, nombreadmin, apellidoadmin, telefonoadmin, correoadmin) VALUES
('70407040','70407040', 'Miguel Angel', 'Ramírez Ortega', '954147258', 'miguel.ramirez@corp.com'),
('70407041','70407041', 'Diego', 'Fernández Vargas', '954369852', 'diego.fernandez@corp.com'),
('70407042','70407042', 'Sebastian Raul', 'Navarro Vega', '954789654', 'sebas.navarro@corp.com');


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
('70401544','70401544', 'Christian', 'Lopez Huamani', '954987456', 'chirtins@gmail.com'),
('80401558','80401558','Juan', 'Pérez Rodríguez', '954654321', 'juan.perez@gmail.com'),
('29401559','anamaria123', 'Ana Maria', 'González Sánchez', '954789123', 'ana.gonzalez@gmail.com'),
('75401560','luis45', 'Luis Fernando', 'Ramírez Martínez', '954987654', 'luis.ramirez@gmail.com'),
('65401561','carmentorres65', 'Carmen', 'Torres Fernández', '954321789', 'carmen.torres@gmail.com'),
('28401562','28401562', 'Miguel Angel', 'Díaz Gómez', '954456789', 'miguel.diaz@gmail.com'),
('29401563','laura123', 'Laura', 'Morales Ruiz', '954123789', 'laura.morales@gmail.com'),
('84401564','pesauji', 'Pedro Saul', 'Sánchez Jiménez', '954987123', 'pedro.sanchez@gmail.com'),
('81401565','matines45', 'Elena', 'Martín López', '954654987', 'elena.martin@gmail.com'),
('71601566','castrojorgue2', 'Jorge Ernesto', 'Herrera Castro', '954321456', 'jorge.herrera@gmail.com');


CREATE TABLE pelicula (
    idpelicula INT AUTO_INCREMENT PRIMARY KEY,
    nombrepelicula VARCHAR(40) NOT NULL,
    sinopsis LONGTEXT,
    director VARCHAR(40),
    genero VARCHAR(20) NOT NULL,
    idioma VARCHAR(30) NOT NULL,
    fechaestreno DATE NOT NULL,
    duracion TIME NOT NULL,
    imagen VARCHAR(255)
);
INSERT INTO pelicula (nombrepelicula, sinopsis, director, genero, idioma, fechaestreno, duracion, imagen) VALUES


('Maxxxine', '¡Es una estrella! Mia Goth está de vuelta. En los años 80 en Hollywood, la estrella de cine para adultos y aspirante a actriz Maxine Minx finalmente obtiene su gran oportunidad. Pero cuando un misterioso asesino acecha a las estrellas de Hollywood, un rastro de sangre amenaza con revelar su siniestro pasado.', '-', 'Drama', 'Español', '2024-07-27', '01:50:00', 'maxxine.jpg'),
('Islandia', 'Emilia y su hija Irina quedan atrapadas en Santos en su trayecto hacia Islandia, un remoto pueblo en la Amazonía peruana. Emilia toma el rol de maestra y su entrega cambia vidas en la comunidad. Con el tiempo, su influencia se hace más evidente: el pueblo prospera gracias a la educación que ella imparte, dejando un legado duradero que enfatiza el poder transformador del amor y el conocimiento.', '-', 'Familiar', 'Español', '2024-07-27', '01:20:00', 'islandia.jpg'),
('La Otra Cara de la Luna', 'Ambientada en el histórico alunizaje del Apolo 11, en 1969. Llamados para mejorar la imagen pública de la NASA, las chispas vuelan en todas las direcciones cuando la prodigio del marketing Kelly Jones (Johansson) causa estragos en la ya difícil tarea del director del lanzamiento Cole Davis (Tatum). Cuando la Casa Blanca considera que la misión es demasiado importante para fracasar, Jones recibe la orden de simular un alunizaje falso como respaldo, comenzando la verdadera cuenta atrás...', '-', 'Drama', 'Español', '2024-07-27', '02:20:00', 'cara_dela_luna.jpg'),
('Tornados', 'Edgar-Jones interpreta a Kate Cooper, una ex cazadora de tormentas perseguida por un devastador encuentro con un tornado durante sus años universitarios, que ahora estudia los patrones de tormentas en las pantallas de forma segura en la ciudad de Nueva York. Su amigo Javi la atrae de regreso a las llanuras abiertas para probar un nuevo e innovador sistema de seguimiento. Allí, se cruza con Tyler Owens (Powell), la encantadora e imprudente superestrella de las redes sociales que disfruta publicando sus aventuras, persiguiendo tormentas con su estridente equipo, cuanto más peligroso, mejor. A medida que la temporada de tormentas se intensifica, se desatarán fenómenos aterradores nunca antes vistos, y Kate, Tyler y sus equipos competidores se encuentran de lleno en el camino de múltiples sistemas de tormentas que convergen sobre el centro de Oklahoma en la lucha de sus vidas.', '-', 'Acción', 'Español', '2024-07-27', '02:10:00', 'tornado.jpg'),
('Intensamente 2', 'Las pequeñas voces dentro de la cabeza de Riley la conocen intensamente, pero el próximo año todo cambiará cuando INTENSA-MENTE 2 de Disney y Pixar introduzca una nueva emoción: Ansiedad. Según la directora Kelsey Mann, el nuevo personaje promete causar revuelo en el cuartel general.', '-', 'Animación', 'Español', '2024-07-13', '01:40:00', 'intensamente.jpg'),
('Mi Villano Favorito 4', 'Un nuevo capítulo en el que Gru, Lucy y sus hijas dan la bienvenida a un nuevo miembro de la familia, Gru Jr, que se empeña en atormentar a su padre. Gru se enfrenta a nuevos némesis, Maxime Le Mal y su novia Valentina, por lo cual la familia se ve obligada a huir. La película introduce a nuevos personajes a los que ponen voz Joey King , el ganador de un Emmy Stephen Colbert y Chloe Fineman . Pierre Coffin vuelve como la icónica voz de los Minions y el nominado al Oscar® Steve Coogan regresa como Silas Ramsbottom.', '-', 'Animación', 'Español', '2024-07-13', '01:40:00', 'villano_favorito4.jpg'),
('Bad Boys: Hasta la Muerte', 'Este verano, los Bad Boys favoritos del mundo están de regreso con su icónica mezcla de acción al borde de su asiento y comedia escandalosa, pero esta vez con un giro: los mejores de Miami ahora están huyendo.', '-', 'Acción', 'Español', '2024-07-01', '02:00:00', 'bad_boys.jpg'),
('El Último Conjuro', 'Devastado tras la muerte de su esposa, Naoto no encuentra consuelo. Su hijo, tratando de consolarse, trae a casa un dedo de su madre fallecida. Este será solo el comienzo de una serie de eventos terrorificos.', '-', 'Terror', 'Español', '2024-07-01', '01:50:00', 'ultimo_conjuro.jpg'),
('Planeta de los Simios', 'Muchos años después del reinado de César, un joven simio emprende un viaje que lo llevará a cuestionar todo lo que le han enseñado sobre el pasado y a tomar decisiones que definirán el futuro tanto para los simios como para los humanos.', '-', 'Acción', 'Español', '2024-05-09', '01:30:00', 'planeta_de_los_simios.jpg'),
('Amigos imaginarios', 'Sigue a una niña que pasa por una experiencia difícil y entonces empieza a ver a los amigos imaginarios de todo el mundo que se han quedado atrás cuando sus amigos de la vida real han crecido.', '-', 'Familiar', 'Español', '2024-05-16', '01:50:00', 'amigos_imaginarios.jpg'),
('Inmaculada', 'Cecilia (Sydney Sweeney), una monja fervientemente devota, se aventura hacia un remoto convento en la campiña italiana en busca de la consagración espiritual. Sin embargo, lo que inicialmente prometía ser un encuentro espiritual se transforma en una oscura y aterradora pesadilla.', '-', 'Terror', 'Español', '2024-05-16', '01:30:00', 'inmaculada.jpg');





CREATE TABLE horario(
    idhorario int auto_increment primary key not null,
    turno time
);
INSERT INTO horario (turno) values 
    ('03:30'),
    ('06:30'),
    ('09:30');


CREATE TABLE dulceria(
    iddulceria int auto_increment primary key not null,
    tipo varchar(25) not null,
    producto varchar(35) not null,
    descripcion longtext not null,
    precio float not null
);
INSERT INTO dulceria (tipo, producto, descripcion, precio) VALUES
('Combo', 'Combo 2 Dulce', '1 Canchita Gigante (Dulce) + 2 Bebidas (32oz). Canchita sin refill', '40'),
('Combo', 'Combo 2 Salado', 'Canchita Gigante Salada + 2 Bebidas (32oz). Canchita sin refill', '38'),
('Combo', 'Combo 2 Mix', '1 Canchita Gigante (Mix) + 2 Bebidas (32oz). Canchita sin refill', '43'),
('Combo', 'Com.2 Mix Dob.Gig.', '¡Exclusivo! 2 Canchita Gigante + 2 Bebidas Grandes (32oz). Canchita sin refill', '52'),
('Canchita', 'Canchita Gigante', 'La mejor opción para compartir en pareja. *Canchita sin refill', '25'),
('Canchita', 'Canchita Mediana', 'Para calmar tu antojo de Canchita (salada)', '15'),
('Bebidas', 'Bebida Grande', 'Refréscate con 32 oz de tu bebida favorita *Sabor gaseosa.', '15'),
('Bebidas', 'Agua San Luis', 'Sin gas. Botella 750ml', '5');


CREATE TABLE `boleto` (
    `idboleto` int NOT NULL AUTO_INCREMENT,
    `tipoboleto` varchar(30) NOT NULL,
    `descripcionboleto` longtext,
    `precioboleto` float NOT NULL,
    PRIMARY KEY (`idboleto`)
);
INSERT INTO boleto (tipoboleto, descripcionboleto, precioboleto) VALUES 
('General 2D','','23.50'),
('Mayores 2D','Para mayores de 60 años','20.50'),
('Niños 2D','Para niños de 2 a 11 años','20.00');


CREATE TABLE `factura` (
    `idfactura` int NOT NULL AUTO_INCREMENT,
    `codfactura` varchar(30) NOT NULL,
    `idpelicula` int NOT NULL,
    `idcliente` int NOT NULL,
    `fecha` varchar(30) NOT NULL,
    `hora` varchar(30) NOT NULL,
    `butaca` varchar(30) NOT NULL,
    PRIMARY KEY (`idfactura`),
    FOREIGN KEY (`idpelicula`) REFERENCES `pelicula`(`idpelicula`),
    FOREIGN KEY (`idcliente`) REFERENCES `clientes`(`idcliente`)
);
;
INSERT INTO factura (codfactura, idpelicula, idcliente, fecha, hora, butaca) VALUES 
('NBVDIAV00OK','11','1', 'Hoy 11 Jul 2024', '3:30pm', 'A9, A10');

