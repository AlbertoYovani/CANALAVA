-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.21-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para sig_camara
CREATE DATABASE IF NOT EXISTS `sig_camara` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sig_camara`;

-- Volcando estructura para tabla sig_camara.c_afiliados
CREATE TABLE IF NOT EXISTS `c_afiliados` (
  `afiliado_id` int(11) NOT NULL AUTO_INCREMENT,
  `afiliado_nombre` varchar(50) DEFAULT NULL,
  `afiliado_estado` varchar(50) DEFAULT NULL,
  `afiliado_direccion` text,
  `afiliado_telefono` varchar(15) DEFAULT NULL,
  `afiliado_clave` varchar(50) DEFAULT NULL,
  `camara_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`afiliado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sig_camara.c_afiliados: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `c_afiliados` DISABLE KEYS */;
/*!40000 ALTER TABLE `c_afiliados` ENABLE KEYS */;

-- Volcando estructura para tabla sig_camara.c_cama_comercio
CREATE TABLE IF NOT EXISTS `c_cama_comercio` (
  `camara_id` int(11) NOT NULL AUTO_INCREMENT,
  `camara_nombre` varchar(100) DEFAULT NULL,
  `camara_estado` varchar(50) DEFAULT NULL,
  `camara_direccion` text,
  `camara_telefono` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`camara_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sig_camara.c_cama_comercio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `c_cama_comercio` DISABLE KEYS */;
/*!40000 ALTER TABLE `c_cama_comercio` ENABLE KEYS */;

-- Volcando estructura para tabla sig_camara.c_tipos
CREATE TABLE IF NOT EXISTS `c_tipos` (
  `tipo_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tipo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sig_camara.c_tipos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `c_tipos` DISABLE KEYS */;
INSERT INTO `c_tipos` (`tipo_id`, `tipo_nombre`) VALUES
	(1, 'Administrador'),
	(2, 'Camara de Comercio'),
	(3, 'Afiliado');
/*!40000 ALTER TABLE `c_tipos` ENABLE KEYS */;

-- Volcando estructura para tabla sig_camara.c_usuarios
CREATE TABLE IF NOT EXISTS `c_usuarios` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_matricula` varchar(50) DEFAULT NULL,
  `usuario_nombre` varchar(100) DEFAULT NULL,
  `usuario_perfil` text,
  `tipo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sig_camara.c_usuarios: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `c_usuarios` DISABLE KEYS */;
INSERT INTO `c_usuarios` (`usuario_id`, `usuario_matricula`, `usuario_nombre`, `usuario_perfil`, `tipo_id`) VALUES
	(1, 'admin', 'Albertop Yovani', 'ninguno', 1);
/*!40000 ALTER TABLE `c_usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla sig_camara.log_cambios
CREATE TABLE IF NOT EXISTS `log_cambios` (
  `cambio_id` int(11) NOT NULL AUTO_INCREMENT,
  `cambio_fecha` varchar(50) DEFAULT NULL,
  `cambio_hora` varchar(50) DEFAULT NULL,
  `cambio_descripcion` text,
  `usuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cambio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sig_camara.log_cambios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `log_cambios` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_cambios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
