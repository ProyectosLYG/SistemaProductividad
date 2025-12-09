/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-12.1.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: desemp
-- ------------------------------------------------------
-- Server version	12.1.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `articulos`
--

DROP TABLE IF EXISTS `articulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `articulos` (
  `idArticulo` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(50) NOT NULL,
  `tituloArticulo` varchar(150) DEFAULT NULL,
  `nombreRevista` varchar(150) DEFAULT NULL,
  `autoresArticulo` varchar(150) DEFAULT NULL,
  `propositoAutor` varchar(50) DEFAULT NULL,
  `resumen` varchar(850) DEFAULT NULL,
  `estadoArticulo` varchar(50) DEFAULT NULL,
  `fechaArticulo` date DEFAULT NULL,
  `casaEditorial` varchar(50) DEFAULT NULL,
  `sectorArticulo` varchar(50) DEFAULT NULL,
  `areaConocimiento` varchar(50) DEFAULT NULL,
  `tipoArticulo` varchar(50) DEFAULT NULL,
  `rangoPaginas` varchar(10) DEFAULT NULL,
  `indiceRegistro` varchar(30) DEFAULT NULL,
  `issn` varchar(25) DEFAULT NULL,
  `pdf` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idArticulo`),
  KEY `userId` (`userId`),
  CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulos`
--

LOCK TABLES `articulos` WRITE;
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `chap_book`
--

DROP TABLE IF EXISTS `chap_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `chap_book` (
  `idLibro` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(50) NOT NULL,
  `tituloCapitulo` varchar(150) NOT NULL,
  `resumen` varchar(850) NOT NULL,
  `autores` varchar(150) NOT NULL,
  `posicionAuto` int(11) DEFAULT NULL,
  `paginas` varchar(9) NOT NULL,
  `sectorEstrategico` varchar(50) NOT NULL,
  `areaConocimiento` varchar(50) NOT NULL,
  `tituloLibro` varchar(150) NOT NULL,
  `edicion` varchar(5) NOT NULL,
  `casaEditorial` varchar(60) NOT NULL,
  `fechaPublicacion` date NOT NULL,
  `isbn` varchar(26) NOT NULL,
  `editorial` varchar(60) NOT NULL,
  `fechaAdicion` datetime DEFAULT current_timestamp(),
  `evidencia` varchar(255) NOT NULL,
  `evidencia2` varchar(255) DEFAULT NULL,
  `evidencia3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idLibro`),
  KEY `userId` (`userId`),
  CONSTRAINT `chap_book_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chap_book`
--

LOCK TABLES `chap_book` WRITE;
/*!40000 ALTER TABLE `chap_book` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `chap_book` VALUES
(1,'2','Climate','resumen de climate','G . o. Galicia Flores',2,'120-140','Inteligencia artificial','Ciancias naturales','Climate','2','casa','2025-08-18','15236547','editorial','2025-12-09 01:41:19','d80b567296bb35a517feb379e30a61f6.jpg','','');
/*!40000 ALTER TABLE `chap_book` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `congreso`
--

DROP TABLE IF EXISTS `congreso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `congreso` (
  `userId` varchar(50) NOT NULL,
  `idCongreso` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCongreso` varchar(100) DEFAULT NULL,
  `acronimo` varchar(100) DEFAULT NULL,
  `intisucion` varchar(100) DEFAULT NULL,
  `pais` varchar(75) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `modo` varchar(50) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `nivel` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `rol` varchar(50) DEFAULT NULL,
  `tituloProyecto` varchar(100) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `evidencia` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idCongreso`),
  KEY `userId` (`userId`),
  CONSTRAINT `congreso_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `congreso`
--

LOCK TABLES `congreso` WRITE;
/*!40000 ALTER TABLE `congreso` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `congreso` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `tesis`
--

DROP TABLE IF EXISTS `tesis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tesis` (
  `idTesis` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(50) NOT NULL,
  `tituloTesis` varchar(100) DEFAULT NULL,
  `grado` varchar(50) DEFAULT NULL,
  `proposito` varchar(50) DEFAULT NULL,
  `autores` varchar(100) DEFAULT NULL,
  `estado` varchar(35) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` varchar(350) DEFAULT NULL,
  `sector` varchar(35) DEFAULT NULL,
  `area` varchar(40) DEFAULT NULL,
  `evidencia1` varchar(200) DEFAULT NULL,
  `evidencia2` varchar(200) DEFAULT NULL,
  `evidencia3` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idTesis`),
  KEY `userId` (`userId`),
  CONSTRAINT `tesis_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tesis`
--

LOCK TABLES `tesis` WRITE;
/*!40000 ALTER TABLE `tesis` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `tesis` VALUES
(1,'2','tesis','Especialidad','Desarrollo tecnológico','gera o galicia','Publicada','2025-09-23','descripcion de tesis','Gestión de residuos','Ciancias naturales','fba2c6e33e9e3bbb7c5961eeab43538e.jpg','','');
/*!40000 ALTER TABLE `tesis` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_profile` (
  `userId` varchar(50) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `avatarUrl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profile`
--

LOCK TABLES `user_profile` WRITE;
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `user_profile` VALUES
('1','AdminName','AdminLN','admin','Admin doees not have bio','#'),
('2','resName','resLN','ISC','Researcher info','#');
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_roles` (
  `UserId` varchar(50) NOT NULL,
  `role` enum('admin','researcher','student','leadership') DEFAULT 'student',
  PRIMARY KEY (`UserId`),
  CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `user_roles` VALUES
('1','admin'),
('2','researcher');
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `user_verification`
--

DROP TABLE IF EXISTS `user_verification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_verification` (
  `userId` varchar(50) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  CONSTRAINT `user_verification_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_verification`
--

LOCK TABLES `user_verification` WRITE;
/*!40000 ALTER TABLE `user_verification` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `user_verification` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `emailVer` tinyint(1) DEFAULT NULL,
  `pwd` varchar(255) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `users` VALUES
('1','admin','admin@correo.com',1,'1234','2025-12-09 00:06:31','2025-12-09 00:06:31'),
('2','res','res@correo.com',1,'1234','2025-12-09 01:36:11','2025-12-09 01:36:11');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Dumping routines for database 'desemp'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2025-12-09  2:56:59
