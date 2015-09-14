-- CREATE DATABASE  IF NOT EXISTS `madexa` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `madexa_madexa`;
-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: madexa
-- ------------------------------------------------------
-- Server version	5.5.44-0+deb7u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_numero` int(11) NOT NULL,
  `cliente_nombre` varchar(255) NOT NULL,
  `cliente_cuit` int(11) NOT NULL,
  `persona_id_persona` int(11) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `fk_cliente_persona1_idx` (`persona_id_persona`),
  CONSTRAINT `fk_cliente_persona1` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,1,'Empresa Palazzo',2147483647,2);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disenio`
--

DROP TABLE IF EXISTS `disenio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disenio` (
  `id_disenio` int(11) NOT NULL AUTO_INCREMENT,
  `disenio_fecha` date DEFAULT NULL,
  `disenio_nombre` varchar(255) NOT NULL,
  `disenio_version` varchar(255) NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  PRIMARY KEY (`id_disenio`),
  KEY `fk_disenio_solicituddematriz1_idx` (`id_solicitud`),
  CONSTRAINT `id_solicitud` FOREIGN KEY (`id_solicitud`) REFERENCES `solicituddematriz` (`id_solicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disenio`
--

LOCK TABLES `disenio` WRITE;
/*!40000 ALTER TABLE `disenio` DISABLE KEYS */;
INSERT INTO `disenio` VALUES (1,'2015-08-25','AR24','1',1);
/*!40000 ALTER TABLE `disenio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matriz`
--

DROP TABLE IF EXISTS `matriz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matriz` (
  `id_matriz` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) NOT NULL,
  `id_disenio` int(11) NOT NULL,
  `tipo_matriz_tipo_matriz_id` int(11) NOT NULL,
  PRIMARY KEY (`id_matriz`),
  KEY `fk_matriz_disenio1_idx` (`id_disenio`),
  KEY `fk_matriz_tipo_matriz1_idx` (`tipo_matriz_tipo_matriz_id`),
  CONSTRAINT `fk_matriz_tipo_matriz1` FOREIGN KEY (`tipo_matriz_tipo_matriz_id`) REFERENCES `tipo_matriz` (`tipo_matriz_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matriz_disenio1` FOREIGN KEY (`id_disenio`) REFERENCES `disenio` (`id_disenio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matriz`
--

LOCK TABLES `matriz` WRITE;
/*!40000 ALTER TABLE `matriz` DISABLE KEYS */;
INSERT INTO `matriz` VALUES (1,'12',1,1);
/*!40000 ALTER TABLE `matriz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matriz_parte`
--

DROP TABLE IF EXISTS `matriz_parte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matriz_parte` (
  `parte_id_parte` int(11) NOT NULL,
  `matriz_id_matriz` int(11) NOT NULL,
  `parte_parte_id` int(11) NOT NULL,
  PRIMARY KEY (`parte_id_parte`,`matriz_id_matriz`,`parte_parte_id`),
  KEY `fk_parte_has_matriz_matriz1_idx` (`matriz_id_matriz`),
  KEY `fk_matriz_parte_parte1_idx` (`parte_parte_id`),
  CONSTRAINT `fk_matriz_parte_parte1` FOREIGN KEY (`parte_parte_id`) REFERENCES `parte` (`parte_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_parte_has_matriz_matriz1` FOREIGN KEY (`matriz_id_matriz`) REFERENCES `matriz` (`id_matriz`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matriz_parte`
--

LOCK TABLES `matriz_parte` WRITE;
/*!40000 ALTER TABLE `matriz_parte` DISABLE KEYS */;
/*!40000 ALTER TABLE `matriz_parte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parte`
--

DROP TABLE IF EXISTS `parte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parte` (
  `parte_id` int(11) NOT NULL AUTO_INCREMENT,
  `parte_nombre` varchar(255) DEFAULT NULL,
  `parte_calidad` varchar(255) DEFAULT NULL,
  `parte_forma` varchar(255) DEFAULT NULL,
  `parte_medida` decimal(10,2) NOT NULL,
  `tipo_parte_tipo_parte_id` int(11) NOT NULL,
  PRIMARY KEY (`parte_id`),
  KEY `fk_parte_tipo_parte1_idx` (`tipo_parte_tipo_parte_id`),
  CONSTRAINT `fk_parte_tipo_parte1` FOREIGN KEY (`tipo_parte_tipo_parte_id`) REFERENCES `tipo_parte` (`tipo_parte_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parte`
--

LOCK TABLES `parte` WRITE;
/*!40000 ALTER TABLE `parte` DISABLE KEYS */;
INSERT INTO `parte` VALUES (1,'Parte de prueba','Buena','Redonda',456.00,1);
/*!40000 ALTER TABLE `parte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permiso`
--

DROP TABLE IF EXISTS `permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permiso` (
  `id_permiso` int(10) NOT NULL AUTO_INCREMENT,
  `permiso_tipo` varchar(255) NOT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_permiso`),
  KEY `id_rol_idx` (`id_rol`),
  CONSTRAINT `id_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permiso`
--

LOCK TABLES `permiso` WRITE;
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `dni` int(11) NOT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'Martin','Arbol',22123456,'info@arbolsistemas.com.ar',1151583703),(2,'Augusto','Palazzo',31456789,'augusto@gmail.com',221456789);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plano`
--

DROP TABLE IF EXISTS `plano`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plano` (
  `id_plano` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `plano_fecha` date NOT NULL,
  `plano_numero` int(11) NOT NULL,
  `plano_version` int(11) NOT NULL,
  `disenio_id_disenio` int(11) NOT NULL,
  `plano_archivo` varchar(255) NOT NULL,
  `plano_nombre_archivo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_plano`),
  KEY `fk_plano_disenio1_idx` (`disenio_id_disenio`),
  CONSTRAINT `fk_plano_disenio1` FOREIGN KEY (`disenio_id_disenio`) REFERENCES `disenio` (`id_disenio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plano`
--

LOCK TABLES `plano` WRITE;
/*!40000 ALTER TABLE `plano` DISABLE KEYS */;
INSERT INTO `plano` VALUES (3,'2015-09-05',1,1,1,'58918694.pdf','Un archivo 4');
/*!40000 ALTER TABLE `plano` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(255) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'admin'),(2,'disenador'),(3,'comercial'),(4,'operario');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicituddematriz`
--

DROP TABLE IF EXISTS `solicituddematriz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicituddematriz` (
  `fecha` date NOT NULL,
  `comentario` text,
  `id_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_solicitud`),
  KEY `id_cliente_idx` (`id_cliente`),
  CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicituddematriz`
--

LOCK TABLES `solicituddematriz` WRITE;
/*!40000 ALTER TABLE `solicituddematriz` DISABLE KEYS */;
INSERT INTO `solicituddematriz` VALUES ('2015-08-02','El cliente solicita una matriz con las siguientes consideraciones',1,1);
/*!40000 ALTER TABLE `solicituddematriz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_matriz`
--

DROP TABLE IF EXISTS `tipo_matriz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_matriz` (
  `tipo_matriz_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_matriz_nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`tipo_matriz_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_matriz`
--

LOCK TABLES `tipo_matriz` WRITE;
/*!40000 ALTER TABLE `tipo_matriz` DISABLE KEYS */;
INSERT INTO `tipo_matriz` VALUES (1,'Tipo 1 de Matriz 2');
/*!40000 ALTER TABLE `tipo_matriz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_parte`
--

DROP TABLE IF EXISTS `tipo_parte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_parte` (
  `tipo_parte_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_parte_nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`tipo_parte_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_parte`
--

LOCK TABLES `tipo_parte` WRITE;
/*!40000 ALTER TABLE `tipo_parte` DISABLE KEYS */;
INSERT INTO `tipo_parte` VALUES (1,'Parte 1');
/*!40000 ALTER TABLE `tipo_parte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_de_usuario` varchar(255) CHARACTER SET latin1 NOT NULL,
  `contrasenia` varchar(255) DEFAULT 'null',
  `id_persona` int(11) NOT NULL,
  `rol_id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuario_persona1_idx` (`id_persona`),
  KEY `fk_usuario_rol1_idx` (`rol_id_rol`),
  CONSTRAINT `fk_usuario_persona1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_rol1` FOREIGN KEY (`rol_id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','e10adc3949ba59abbe56e057f20f883e',1,1),(4,'martin','e10adc3949ba59abbe56e057f20f883e',1,4);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-05 20:48:55
