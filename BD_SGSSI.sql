-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: DB_SGSSI
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB

--
-- Table structure for table `articulo`
--

DROP DATABASE IF EXISTS `bd_sgssi`;
CREATE DATABASE `bd_sgssi`;
USE `bd_sgssi`;

DROP TABLE IF EXISTS `articulo`;
CREATE TABLE `articulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(20) NOT NULL,
  `contenido` text NOT NULL,
  `f_ult_mod` date DEFAULT NULL,
  `autor` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articulo`
--

LOCK TABLES `articulo` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id_articulo` int(11) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  PRIMARY KEY (`id_articulo`,`categoria`),
  CONSTRAINT `categorias_ibfk_1` FOREIGN KEY (`id_articulo`) REFERENCES `articulo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `referencias`
--

DROP TABLE IF EXISTS `referencias`;
CREATE TABLE `referencias` (
  `id_articulo` int(11) NOT NULL,
  `referencia` varchar(20) NOT NULL,
  PRIMARY KEY (`id_articulo`,`referencia`),
  CONSTRAINT `referencias_ibfk_1` FOREIGN KEY (`id_articulo`) REFERENCES `articulo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referencias`
--

LOCK TABLES `referencias` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(20) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `f_nacimiento` date NOT NULL,
  `email` varchar(20) NOT NULL,
  `contraseña` varchar(300) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
INSERT INTO `usuario` VALUES
('11111111C','user1','user1.1','111111111','1111-11-11','11111','1'),
('22222222J','user2','user2.1','222222222','2222-02-02','22222','2');
UNLOCK TABLES;
