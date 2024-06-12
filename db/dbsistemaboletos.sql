-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2024 a las 17:42:07
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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
