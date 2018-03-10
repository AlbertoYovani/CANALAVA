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
  `usuario_id` int(11) DEFAULT NULL,
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
  `usuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`camara_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sig_camara.c_cama_comercio: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `c_cama_comercio` DISABLE KEYS */;
INSERT INTO `c_cama_comercio` (`camara_id`, `camara_nombre`, `camara_estado`, `camara_direccion`, `camara_telefono`, `usuario_id`) VALUES
	(9, 'Camara 1', 'Durango', 'Av. Centro', '1234567890', 6),
	(10, 'camara 2', 'Aguascalientes', 'Av. JY', '242352354234', 7),
	(11, 'camara 2', 'Chihuahua', '23534534', '23534534534', 8),
	(12, 'fwerwer', 'Campeche', 'sdfgsdfs', 'werwerwer23423', 9),
	(13, 'sdfsdfs', 'Chihuahua', 'sdfsdf', 'wdfqwewf', 1),
	(14, 'sdfsdfs', 'Chihuahua', 'sdfsdf', 'wdfqwewf', 1),
	(15, 'dfsfs', 'Chiapas', '325235', 'f23423423', 1),
	(16, 'dfsfs', 'Chiapas', '325235', 'f23423423', 1),
	(17, 'Camara 4', 'Estado de México', '2234354', '12345567678', 1),
	(18, 'sdfsdf', 'Campeche', '43565346', '7654323546', 1),
	(19, 'camara2', 'Estado de México', 'wrowekr', '23235234', 16);
/*!40000 ALTER TABLE `c_cama_comercio` ENABLE KEYS */;

-- Volcando estructura para tabla sig_camara.c_menu
CREATE TABLE IF NOT EXISTS `c_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_nombre` varchar(100) NOT NULL,
  `menu_url` text NOT NULL,
  `menu_icono` varchar(100) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sig_camara.c_menu: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `c_menu` DISABLE KEYS */;
INSERT INTO `c_menu` (`menu_id`, `menu_nombre`, `menu_url`, `menu_icono`, `usuario_id`) VALUES
	(1, 'Camara de comercio', 'Inicio/CamaraComercio', 'fa fa-sort-amount-asc', 1),
	(5, 'Afiliados', 'Inicio/Afiliados', 'fa fa-sort-alpha-asc', 1),
	(6, 'Afiliados', 'Inicio/Afiliados', 'fa fa-sort-alpha-asc', 16);
/*!40000 ALTER TABLE `c_menu` ENABLE KEYS */;

-- Volcando estructura para tabla sig_camara.c_usuarios
CREATE TABLE IF NOT EXISTS `c_usuarios` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_password` varchar(50) DEFAULT NULL,
  `usuario_nombre` varchar(100) DEFAULT NULL,
  `usuario_perfil` text,
  `usuario_correo` varchar(100) DEFAULT NULL,
  `usuario_tipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sig_camara.c_usuarios: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `c_usuarios` DISABLE KEYS */;
INSERT INTO `c_usuarios` (`usuario_id`, `usuario_password`, `usuario_nombre`, `usuario_perfil`, `usuario_correo`, `usuario_tipo`) VALUES
	(1, 'admin', 'alberto', 'ninguno', NULL, 'admin'),
	(6, '123', 'camara1', 'camara@hotmail.com', NULL, 'camara'),
	(7, '12345', 'camara2', '0', 'ahah@hotmail.com', 'camara'),
	(8, 'sdfsdf', 'sdfs', '0', 'sdfsdf@dkgjkd', 'camara'),
	(9, 'werwer', 'werwer', '0', 'rwer@ryty', 'camara'),
	(10, 'sdfsdf', 'dsfsdf', '0', 'sdff@eretert', 'camara'),
	(11, 'sdfsdf', 'dsfsdf', '0', 'sdff@eretert', 'camara'),
	(12, 'sdfsdf', 'sdfsdf', '0', 'dfsd@fghtr', 'camara'),
	(13, 'sdfsdf', 'sdfsdf', '0', 'dfsd@fghtr', 'camara'),
	(14, '12345', 'camara', '0', 'ma@kgkd', 'camara'),
	(15, 'sdfsdf', 'sdfsdf', '0', 'sdfsdf@dfgdfg', 'camara'),
	(16, '12', 'camara', '0', 'mam@gotma', 'camara');
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
