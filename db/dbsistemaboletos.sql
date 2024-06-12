-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: dbsistemaboletos
-- ------------------------------------------------------
-- Server version	8.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `boleto`
--

DROP TABLE IF EXISTS `boleto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `boleto` (
  `idboleto` int NOT NULL AUTO_INCREMENT,
  `tipoboleto` varchar(30) NOT NULL,
  `descripcionboleto` longtext,
  `precioboleto` float NOT NULL,
  PRIMARY KEY (`idboleto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boleto`
--

LOCK TABLES `boleto` WRITE;
/*!40000 ALTER TABLE `boleto` DISABLE KEYS */;
INSERT INTO `boleto` VALUES (1,'General 2D','',23.5),(2,'Mayores 2D','Para mayores de 60 años',20.5),(3,'Niños 2D','Para niños de 2 a 11 años',20);
/*!40000 ALTER TABLE `boleto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `idcliente` int NOT NULL AUTO_INCREMENT,
  `dni` varchar(8) COLLATE utf8mb4_general_ci NOT NULL,
  `pwd` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'70401544','70401544','Carlos Abel','Catari Mamani','918624518','catari12@gmail.com'),(2,'80401558','80401558','Juan','Pérez Rodríguez','954654321','juan.perez@gmail.com'),(3,'29401559','anamaria123','Ana Maria','González Sánchez','954789123','ana.gonzalez@gmail.com'),(4,'75401560','luis45','Luis Fernando','Ramírez Martínez','954987654','luis.ramirez@gmail.com'),(5,'65401561','carmentorres65','Carmen','Torres Fernández','954321789','carmen.torres@gmail.com'),(6,'28401562','28401562','Miguel Angel','Díaz Gómez','954456789','miguel.diaz@gmail.com'),(7,'29401563','laura123','Laura','Morales Ruiz','954123789','laura.morales@gmail.com'),(8,'84401564','pesauji','Pedro Saul','Sánchez Jiménez','954987123','pedro.sanchez@gmail.com'),(9,'81401565','matines45','Elena','Martín López','954654987','elena.martin@gmail.com'),(10,'71601566','castrojorgue2','Jorge Ernesto','Herrera Castro','954321456','jorge.herrera@gmail.com'),(11,'70401546','70401546','Manuel Abraham','Tapia Fuentes','987456325','mnutapiafuntes55@gmail.com');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dulceria`
--

DROP TABLE IF EXISTS `dulceria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dulceria` (
  `iddulceria` int NOT NULL AUTO_INCREMENT,
  `tipo` varchar(25) NOT NULL,
  `producto` varchar(35) NOT NULL,
  `descripcion` longtext NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`iddulceria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dulceria`
--

LOCK TABLES `dulceria` WRITE;
/*!40000 ALTER TABLE `dulceria` DISABLE KEYS */;
INSERT INTO `dulceria` VALUES (1,'Combo','Combo 2 Dulce','1 Canchita Gigante (Dulce) + 2 Bebidas (32oz). Canchita sin refill',40),(2,'Combo','Combo 2 Salado','Canchita Gigante Salada + 2 Bebidas (32oz). Canchita sin refill',38),(3,'Combo','Combo 2 Mix','1 Canchita Gigante (Mix) + 2 Bebidas (32oz). Canchita sin refill',43),(4,'Combo','Com.2 Mix Dob.Gig.','¡Exclusivo! 2 Canchita Gigante + 2 Bebidas Grandes (32oz). Canchita sin refill',52),(5,'Canchita','Canchita Gigante','La mejor opción para compartir en pareja. *Canchita sin refill',25),(6,'Canchita','Canchita Mediana','Para calmar tu antojo de Canchita (salada)',15),(7,'Bebidas','Bebida Grande','Refréscate con 32 oz de tu bebida favorita *Sabor gaseosa.',15),(8,'Bebidas','Agua San Luis','Sin gas. Botella 750ml',5);
/*!40000 ALTER TABLE `dulceria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario`
--

DROP TABLE IF EXISTS `horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horario` (
  `idhorario` int NOT NULL AUTO_INCREMENT,
  `turno` time DEFAULT NULL,
  PRIMARY KEY (`idhorario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario`
--

LOCK TABLES `horario` WRITE;
/*!40000 ALTER TABLE `horario` DISABLE KEYS */;
INSERT INTO `horario` VALUES (1,'03:30:00'),(2,'06:30:00'),(3,'09:30:00');
/*!40000 ALTER TABLE `horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelicula`
--

DROP TABLE IF EXISTS `pelicula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pelicula` (
  `idpelicula` int NOT NULL AUTO_INCREMENT,
  `nombrepelicula` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `sinopsis` longtext COLLATE utf8mb4_general_ci,
  `director` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `genero` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `idioma` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `fechaestreno` date NOT NULL,
  `duracion` time NOT NULL,
  PRIMARY KEY (`idpelicula`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelicula`
--

LOCK TABLES `pelicula` WRITE;
/*!40000 ALTER TABLE `pelicula` DISABLE KEYS */;
INSERT INTO `pelicula` VALUES (1,'Planeta de los Simios','Muchos años después del reinado de César, un joven simio emprende un viaje que lo llevará a cuestionar todo lo que le han enseñado sobre el pasado y a tomar decisiones que definirán el futuro tanto para los simios como para los humanos.','-','Acción','Español','2024-05-09','01:30:00'),(2,'Amigos imaginarios','Sigue a una niña que pasa por una experiencia difícil y entonces empieza a ver a los amigos imaginarios de todo el mundo que se han quedado atrás cuando sus amigos de la vida real han crecido.','-','Familiar','Español','2024-05-16','01:50:00'),(3,'Inmaculada','Cecilia (Sydney Sweeney), una monja fervientemente devota, se aventura hacia un remoto convento en la campiña italiana en busca de la consagración espiritual. Sin embargo, lo que inicialmente prometía ser un encuentro espiritual se transforma en una oscura y aterradora pesadilla.','-','Terror','Español','2024-05-16','01:30:00');
/*!40000 ALTER TABLE `pelicula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sala`
--

DROP TABLE IF EXISTS `sala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sala` (
  `idsala` int NOT NULL AUTO_INCREMENT,
  `tiposala` varchar(40) NOT NULL,
  PRIMARY KEY (`idsala`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sala`
--

LOCK TABLES `sala` WRITE;
/*!40000 ALTER TABLE `sala` DISABLE KEYS */;
INSERT INTO `sala` VALUES (1,'REGULAR'),(2,'2D'),(3,'3D');
/*!40000 ALTER TABLE `sala` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-12 16:46:18
