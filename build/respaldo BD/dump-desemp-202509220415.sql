/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.8.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: desemp
-- ------------------------------------------------------
-- Server version	11.8.2-MariaDB

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
  `id_res` int(11) NOT NULL,
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
  PRIMARY KEY (`idArticulo`),
  KEY `id_res` (`id_res`),
  CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`id_res`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulos`
--

LOCK TABLES `articulos` WRITE;
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `articulos` VALUES
(1,2,'Titulo del articulo','Nombre de la revista','Galicia Flores Gerardo Oswaldo','Informar','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.','Aceptado','2025-08-21','Casa editorial','Eficiencia energética','Redes y conmutaciónes','investigación','1-120','JCR','58292247');
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
  `id_res` int(11) DEFAULT NULL,
  `tituloCapitulo` varchar(150) NOT NULL,
  `resumen` varchar(850) NOT NULL,
  `autores` varchar(150) NOT NULL,
  `posicionAutor` int(11) DEFAULT NULL,
  `paginas` varchar(9) NOT NULL,
  `sectorEstrategico` varchar(50) NOT NULL,
  `areaConocimiento` varchar(50) NOT NULL,
  `tituloLibro` varchar(150) NOT NULL,
  `edicion` varchar(20) NOT NULL,
  `casaEditorial` varchar(60) NOT NULL,
  `fechaPublicacion` date NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `editorial` varchar(60) NOT NULL,
  `fechaAdicion` date DEFAULT current_timestamp(),
  `evidencia1` varchar(255) NOT NULL,
  `evidencia2` varchar(255) DEFAULT NULL,
  `evidencia3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idLibro`),
  KEY `id_res` (`id_res`),
  CONSTRAINT `chap_book_ibfk_1` FOREIGN KEY (`id_res`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chap_book`
--

LOCK TABLES `chap_book` WRITE;
/*!40000 ALTER TABLE `chap_book` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `chap_book` VALUES
(7,2,'Poems about life',' The only constant in life is change. Climate is a journey in embracing change both internally and externally. It guides you through all the weather you face. From heartbreak to the storms you create inside your brain, Climate reminds you to embrace the sun, storm, and rain. Most importantly, it emphasizes the beauty, value, and consistency of change. ','Whitney Hanson',1,'1-345','Inteligencia artificial','Ingeniería y tecnología','Climate','1','Penguin life','2022-11-07',' 979-8218082512 ','Book a book','2025-09-20','0a23b703cb53bc09fa0a894674d4b11d.jpg','',''),
(8,2,'Poemas ','resumen breve sobre el libro','Whitney Hanson',2,'1-220','Inteligencia artificial','Ciancias naturales','Home','edicion','casa','2025-08-12','47528753','editorial','2025-09-20','feafa9c7346e80753a43b0dbbe149fb9.jpg','',''),
(10,2,'Titulo de capitulo','Resumen del capitulo ','autores',1,'1-120','Inteligencia artificial','Redes y conmutaciónes','Titulo del libro','Edicion','casa edit','2025-08-07','7884512','editorial','2025-09-20','0bde07a5c2987121ff55a55363df5291.jpg','','');
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
  `id_res` int(11) NOT NULL,
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
  PRIMARY KEY (`idCongreso`),
  KEY `id_res` (`id_res`),
  CONSTRAINT `congreso_ibfk_1` FOREIGN KEY (`id_res`) REFERENCES `users` (`id`)
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
  `id_res` int(11) NOT NULL,
  `idTesis` int(11) NOT NULL AUTO_INCREMENT,
  `tituloTesis` varchar(100) DEFAULT NULL,
  `grado` varchar(50) DEFAULT NULL,
  `proposito` varchar(50) DEFAULT NULL,
  `autores` varchar(100) DEFAULT NULL,
  `estado` varchar(35) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` varchar(850) DEFAULT NULL,
  `sector` varchar(35) DEFAULT NULL,
  `area` varchar(40) DEFAULT NULL,
  `evidencia1` varchar(200) DEFAULT NULL,
  `evidencia2` varchar(200) DEFAULT NULL,
  `evidencia3` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idTesis`),
  KEY `id_res` (`id_res`),
  CONSTRAINT `tesis_ibfk_1` FOREIGN KEY (`id_res`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tesis`
--

LOCK TABLES `tesis` WRITE;
/*!40000 ALTER TABLE `tesis` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `tesis` VALUES
(2,3,'Tesis de ejemplo','Especialidad','Desarrollo tecnológico','Mtro. Camacho Campero','Terminada','2025-07-31',NULL,'Ciberseguridad','Ciancias naturales','e423867c802568f5036f1c0c6695e1f5.png','','');
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
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `avatar_url` varchar(255) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profile`
--

LOCK TABLES `user_profile` WRITE;
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `user_profile` VALUES
(1,'administrador','admin','bio null','url null','admin'),
(2,'Nombre(s) nombres','Apellidos apellidos','Biografia de la persona','url de la persona','ISC');
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
  `user_id` int(11) NOT NULL,
  `role` enum('admin','researcher','student','leaership') DEFAULT 'student',
  PRIMARY KEY (`user_id`),
  CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `user_roles` VALUES
(1,'admin'),
(2,'researcher'),
(3,'student');
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `user_sessions`
--

DROP TABLE IF EXISTS `user_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `session_token` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `session_token` (`session_token`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_sessions`
--

LOCK TABLES `user_sessions` WRITE;
/*!40000 ALTER TABLE `user_sessions` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `user_sessions` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `user_verification`
--

DROP TABLE IF EXISTS `user_verification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_verification` (
  `id_user` int(11) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  KEY `id_user` (`id_user`),
  CONSTRAINT `user_verification_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_ver` tinyint(1) DEFAULT NULL,
  `pwd` varchar(255) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `users` VALUES
(1,'admin','admin@prueba.com',1,'1234','2025-07-15 14:10:52','2025-07-15 14:10:52'),
(2,'res','res@prueba.com',1,'1234','2025-07-17 15:25:46','2025-07-17 15:25:46'),
(3,'student','student@prueba.com',1,'1234','2025-07-17 15:26:43','2025-07-17 15:28:59');
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

-- Dump completed on 2025-09-22  4:15:42
