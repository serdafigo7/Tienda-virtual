-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: facturacion
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `nit` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'pedro','benitez','11'),(2,'frank','perez','12'),(3,'nicolle','burgos','13'),(4,'gina','hoyos','14'),(5,'wilson','arrieta','0');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_venta`
--

DROP TABLE IF EXISTS `detalle_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_venta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_factura` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad` int NOT NULL,
  `precio_venta` int NOT NULL,
  `estado` varchar(50) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_venta`
--

LOCK TABLES `detalle_venta` WRITE;
/*!40000 ALTER TABLE `detalle_venta` DISABLE KEYS */;
INSERT INTO `detalle_venta` VALUES (5,1,4,10,90000,'Facturado'),(9,2,4,2,90000,'Facturado'),(10,2,1,1,200000,'Facturado'),(11,3,4,1,90000,'Facturado'),(13,4,6,2,92000,'Facturado'),(14,4,7,2,2500000,'Facturado'),(16,3,6,2,92000,'Facturado'),(17,5,4,2,90000,'Facturado'),(18,5,8,1,40000,'Facturado'),(19,6,8,2,40000,'Facturado'),(41,7,9,1,3500000,'En_proceso_de_facturacion'),(42,8,4,4,90000,'Facturado'),(44,9,8,3,40000,'Facturado'),(45,10,6,3,92000,'Facturado'),(47,11,1,3,200000,'Facturado'),(48,12,11,1,4500000,'Facturado'),(49,12,8,1,40000,'Facturado'),(52,13,1,2,200000,'Facturado');
/*!40000 ALTER TABLE `detalle_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nit` varchar(12) COLLATE utf8mb3_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'790852653-8','TECNOAPP S.A.S','CRA27 CALLE 14 B/PASATIEMPO','gerencia@tecnoapp.com','3126212046');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura_venta`
--

DROP TABLE IF EXISTS `factura_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `factura_venta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `id_vendedor` int NOT NULL,
  `id_forma_pago` int NOT NULL,
  `id_empresa` int NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `total_venta` double NOT NULL,
  `estado` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura_venta`
--

LOCK TABLES `factura_venta` WRITE;
/*!40000 ALTER TABLE `factura_venta` DISABLE KEYS */;
INSERT INTO `factura_venta` VALUES (1,1,3,1,1,'2023-08-02','19:13:33',900000,'Facturado'),(2,5,3,1,1,'2023-08-31','18:39:17',380000,'Facturado'),(3,3,3,1,1,'2023-09-07','14:05:46',274000,'Facturado'),(4,2,6,1,1,'2023-09-07','15:44:05',5184000,'Facturado'),(5,3,7,1,1,'2023-09-07','16:29:53',220000,'Facturado'),(6,4,3,1,1,'2023-09-07','16:33:06',290000,'Facturado'),(8,1,3,1,1,'2023-09-10','16:41:04',360000,'Facturado'),(9,5,3,1,1,'2023-09-10','16:42:29',120000,'Facturado'),(10,2,3,1,1,'2023-09-10','16:44:55',276000,'Facturado'),(11,1,3,1,1,'2023-09-10','16:47:41',600000,'Facturado'),(12,1,3,1,1,'2023-09-10','16:52:19',4540000,'Facturado'),(13,2,3,1,1,'2023-09-10','16:56:41',400000,'Facturado'),(14,0,3,0,1,'2023-12-06','13:48:55',0,'En_proceso_de_facturacion');
/*!40000 ALTER TABLE `factura_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forma_de_pago`
--

DROP TABLE IF EXISTS `forma_de_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forma_de_pago` (
  `id` int NOT NULL AUTO_INCREMENT,
  `formaPago` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forma_de_pago`
--

LOCK TABLES `forma_de_pago` WRITE;
/*!40000 ALTER TABLE `forma_de_pago` DISABLE KEYS */;
INSERT INTO `forma_de_pago` VALUES (1,'Contado'),(2,'Credito'),(3,'Datafono'),(4,'Plan Separe');
/*!40000 ALTER TABLE `forma_de_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(15) COLLATE utf8mb3_spanish_ci NOT NULL,
  `nombre` varchar(70) COLLATE utf8mb3_spanish_ci NOT NULL,
  `precio` int NOT NULL,
  `cantidad` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'15483','PORTATIL LENOVO',200000,100),(3,'M4518','PC GAMER',400000,140),(4,'T45782','MOUSE INALAMBRICO',90000,100),(5,'D120465','COMPUTADOR DE MESA',1500000,100),(6,'1234','mouse acer ',92000,100),(7,'1122','pc gamer2.0',2500000,100),(8,'d9nn7','mouse gamer',40000,60),(9,'ddcc9','HP2023',3500000,300),(10,'ddccc10','ACER2023',4000000,60),(11,'ddccc111','LENOVO2023',4500000,40);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  `rol` varchar(30) COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'admin','1234','sergio','figo','administrador'),(3,'ventas','1234','Sergio','Figueroa','ventas'),(6,'ventas','123','pedro','perez','ventas'),(41,' mara','rtrt',' trtr','134','administrador'),(42,' mara','rtrt',' trtr','134','administrador'),(45,' juan','1234',' juan','1234','contabilidad'),(56,'sergio','figue','admin','1234','administrador');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-14 23:43:41
