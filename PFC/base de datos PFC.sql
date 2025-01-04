-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.7.0.6850
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para pfc
CREATE DATABASE IF NOT EXISTS `pfc` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `pfc`;

-- Volcando estructura para tabla pfc.taller
CREATE TABLE IF NOT EXISTS `taller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido1` varchar(50) DEFAULT NULL,
  `apellido2` varchar(50) DEFAULT NULL,
  `origen` varchar(50) DEFAULT NULL,
  `fnacimiento` varchar(50) DEFAULT NULL,
  `taller` varchar(50) DEFAULT NULL,
  `participacion` varchar(50) DEFAULT NULL,
  `id_trabajador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_trabajador` (`id_trabajador`),
  CONSTRAINT `taller_ibfk_1` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajadores` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla pfc.trabajadores
CREATE TABLE IF NOT EXISTS `trabajadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido1` varchar(45) DEFAULT NULL,
  `apellido2` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `municipio` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `correo_electronico` varchar(45) DEFAULT NULL,
  `contraseña` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla pfc.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ts` varchar(45) DEFAULT NULL,
  `fechaDerivacion` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido1` varchar(45) DEFAULT NULL,
  `apellido2` varchar(45) DEFAULT NULL,
  `ingresos` varchar(45) DEFAULT NULL,
  `fnacimiento` varchar(45) DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `procedencia` varchar(45) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `intervencion` varchar(45) DEFAULT NULL,
  `finalizacion` varchar(45) DEFAULT NULL,
  `seguimiento` varchar(500) DEFAULT NULL,
  `persona_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `persona_id` (`persona_id`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `trabajadores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- La exportación de datos fue deseleccionada.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
