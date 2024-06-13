-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2024 a las 17:42:12
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbsistemaboletos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleto`
--

CREATE TABLE `boleto` (
  `idboleto` int(11) NOT NULL,
  `tipoboleto` varchar(30) NOT NULL,
  `descripcionboleto` longtext DEFAULT NULL,
  `precioboleto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `boleto`
--

INSERT INTO `boleto` (`idboleto`, `tipoboleto`, `descripcionboleto`, `precioboleto`) VALUES
(1, 'General 2D', '', 23.5),
(2, 'Mayores 2D', 'Para mayores de 60 años', 20.5),
(3, 'Niños 2D', 'Para niños de 2 a 11 años', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `apellido` varchar(70) NOT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `dni`, `pwd`, `nombre`, `apellido`, `telefono`, `correo`) VALUES
(1, '70401544', '70401544', 'Carlos Abel', 'Catari Mamani', '918624518', 'catari12@gmail.com'),
(2, '80401558', '80401558', 'Juan', 'Pérez Rodríguez', '954654321', 'juan.perez@gmail.com'),
(3, '29401559', 'anamaria123', 'Ana Maria', 'González Sánchez', '954789123', 'ana.gonzalez@gmail.com'),
(4, '75401560', 'luis45', 'Luis Fernando', 'Ramírez Martínez', '954987654', 'luis.ramirez@gmail.com'),
(5, '65401561', 'carmentorres65', 'Carmen', 'Torres Fernández', '954321789', 'carmen.torres@gmail.com'),
(6, '28401562', '28401562', 'Miguel Angel', 'Díaz Gómez', '954456789', 'miguel.diaz@gmail.com'),
(7, '29401563', 'laura123', 'Laura', 'Morales Ruiz', '954123789', 'laura.morales@gmail.com'),
(8, '84401564', 'pesauji', 'Pedro Saul', 'Sánchez Jiménez', '954987123', 'pedro.sanchez@gmail.com'),
(9, '81401565', 'matines45', 'Elena', 'Martín López', '954654987', 'elena.martin@gmail.com'),
(10, '71601566', 'castrojorgue2', 'Jorge Ernesto', 'Herrera Castro', '954321456', 'jorge.herrera@gmail.com'),
(11, '70401546', '70401546', 'Manuel Abraham', 'Tapia Fuentes', '987456325', 'mnutapiafuntes55@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dulceria`
--

CREATE TABLE `dulceria` (
  `iddulceria` int(11) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `producto` varchar(35) NOT NULL,
  `descripcion` longtext NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dulceria`
--

INSERT INTO `dulceria` (`iddulceria`, `tipo`, `producto`, `descripcion`, `precio`) VALUES
(1, 'Combo', 'Combo 2 Dulce', '1 Canchita Gigante (Dulce) + 2 Bebidas (32oz). Canchita sin refill', 40),
(2, 'Combo', 'Combo 2 Salado', 'Canchita Gigante Salada + 2 Bebidas (32oz). Canchita sin refill', 38),
(3, 'Combo', 'Combo 2 Mix', '1 Canchita Gigante (Mix) + 2 Bebidas (32oz). Canchita sin refill', 43),
(4, 'Combo', 'Com.2 Mix Dob.Gig.', '¡Exclusivo! 2 Canchita Gigante + 2 Bebidas Grandes (32oz). Canchita sin refill', 52),
(5, 'Canchita', 'Canchita Gigante', 'La mejor opción para compartir en pareja. *Canchita sin refill', 25),
(6, 'Canchita', 'Canchita Mediana', 'Para calmar tu antojo de Canchita (salada)', 15),
(7, 'Bebidas', 'Bebida Grande', 'Refréscate con 32 oz de tu bebida favorita *Sabor gaseosa.', 15),
(8, 'Bebidas', 'Agua San Luis', 'Sin gas. Botella 750ml', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idhorario` int(11) NOT NULL,
  `turno` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idhorario`, `turno`) VALUES
(1, '03:30:00'),
(2, '06:30:00'),
(3, '09:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `idpelicula` int(11) NOT NULL,
  `nombrepelicula` varchar(40) NOT NULL,
  `sinopsis` longtext DEFAULT NULL,
  `director` varchar(40) DEFAULT NULL,
  `genero` varchar(20) NOT NULL,
  `idioma` varchar(30) NOT NULL,
  `fechaestreno` date NOT NULL,
  `duracion` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`idpelicula`, `nombrepelicula`, `sinopsis`, `director`, `genero`, `idioma`, `fechaestreno`, `duracion`) VALUES
(1, 'Planeta de los Simios', 'Muchos años después del reinado de César, un joven simio emprende un viaje que lo llevará a cuestionar todo lo que le han enseñado sobre el pasado y a tomar decisiones que definirán el futuro tanto para los simios como para los humanos.', '-', 'Acción', 'Español', '2024-05-09', '01:30:00'),
(2, 'Amigos imaginarios', 'Sigue a una niña que pasa por una experiencia difícil y entonces empieza a ver a los amigos imaginarios de todo el mundo que se han quedado atrás cuando sus amigos de la vida real han crecido.', '-', 'Familiar', 'Español', '2024-05-16', '01:50:00'),
(3, 'Inmaculada', 'Cecilia (Sydney Sweeney), una monja fervientemente devota, se aventura hacia un remoto convento en la campiña italiana en busca de la consagración espiritual. Sin embargo, lo que inicialmente prometía ser un encuentro espiritual se transforma en una oscura y aterradora pesadilla.', '-', 'Terror', 'Español', '2024-05-16', '01:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `idsala` int(11) NOT NULL,
  `tiposala` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`idsala`, `tiposala`) VALUES
(1, 'REGULAR'),
(2, '2D'),
(3, '3D');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD PRIMARY KEY (`idboleto`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `dulceria`
--
ALTER TABLE `dulceria`
  ADD PRIMARY KEY (`iddulceria`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idhorario`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`idpelicula`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`idsala`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boleto`
--
ALTER TABLE `boleto`
  MODIFY `idboleto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `dulceria`
--
ALTER TABLE `dulceria`
  MODIFY `iddulceria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idhorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `idpelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `idsala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
