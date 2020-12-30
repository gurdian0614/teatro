-- MySQL dump 10.13  Distrib 8.0.19, for macos10.15 (x86_64)
--
-- Host: localhost    Database: teatro
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `obra`
--

DROP TABLE IF EXISTS `obra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `obra` (
  `cod_obra` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(1000) NOT NULL,
  `fecha_obra` datetime NOT NULL,
  `aforo` int NOT NULL,
  `disponibles` int NOT NULL,
  `sala` int NOT NULL,
  PRIMARY KEY (`cod_obra`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obra`
--

LOCK TABLES `obra` WRITE;
/*!40000 ALTER TABLE `obra` DISABLE KEYS */;
INSERT INTO `obra` VALUES (1,'Los diezmos de Olancho','2021-01-03 19:00:00',250,144,1),(2,'La mujer mala','2020-12-30 01:47:00',100,5,5),(3,'Sopita de amor','2021-01-01 18:30:00',3,0,3);
/*!40000 ALTER TABLE `obra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `numero_venta` int NOT NULL AUTO_INCREMENT,
  `cod_obra` int NOT NULL,
  `comprador` varchar(1000) NOT NULL,
  `fecha_compra` datetime NOT NULL,
  PRIMARY KEY (`numero_venta`),
  KEY `fk_cod_obra_idx` (`cod_obra`),
  CONSTRAINT `fk_cod_obra` FOREIGN KEY (`cod_obra`) REFERENCES `obra` (`cod_obra`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (2,3,'Roger Ivan Gurdian','2020-12-30 01:21:46'),(3,3,'Karla Brenes','2020-12-30 01:28:31'),(4,1,'Jesus Aguilar','2020-12-30 02:29:23'),(5,1,'Carlos Castillo','2020-12-30 02:32:18'),(6,1,'Cesar Evora','2020-12-30 02:54:05'),(7,1,'Jesus Guadron','2020-12-30 02:55:49'),(8,1,'Diego Brenes','2020-12-30 02:56:48'),(9,3,'Gerson Cruz','2020-12-30 03:00:32'),(10,1,'Josue Cruz','2020-12-30 03:10:49');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-30  3:47:00
