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
DROP DATABASE IF EXISTS `sig_camara`;
CREATE DATABASE IF NOT EXISTS `sig_camara` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sig_camara`;

-- Volcando estructura para tabla sig_camara.c_afiliados
DROP TABLE IF EXISTS `c_afiliados`;
CREATE TABLE IF NOT EXISTS `c_afiliados` (
  `afiliado_id` int(11) NOT NULL AUTO_INCREMENT,
  `afiliado_nombre` varchar(50) DEFAULT NULL,
  `afiliado_estado` varchar(50) DEFAULT NULL,
  `afiliado_direccion` text,
  `afiliado_telefono` varchar(15) DEFAULT NULL,
  `afiliado_clave` varchar(50) DEFAULT NULL,
  `dependencia_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `afiliado_status` varchar(50) DEFAULT NULL,
  `afiliado_tipo` varchar(50) DEFAULT NULL,
  `camara_id` int(11) DEFAULT NULL,
  `pagos` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`afiliado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sig_camara.c_afiliados: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `c_afiliados` DISABLE KEYS */;
INSERT INTO `c_afiliados` (`afiliado_id`, `afiliado_nombre`, `afiliado_estado`, `afiliado_direccion`, `afiliado_telefono`, `afiliado_clave`, `dependencia_id`, `usuario_id`, `afiliado_status`, `afiliado_tipo`, `camara_id`, `pagos`) VALUES
	(5, 'Afliado 1', 'Chihuahua', 'Av. 1', '1234567890', '123', 1, 13, 'prospecto', 'camara de comercio', 1, 'si');
/*!40000 ALTER TABLE `c_afiliados` ENABLE KEYS */;

-- Volcando estructura para tabla sig_camara.c_cama_comercio
DROP TABLE IF EXISTS `c_cama_comercio`;
CREATE TABLE IF NOT EXISTS `c_cama_comercio` (
  `camara_id` int(11) NOT NULL AUTO_INCREMENT,
  `camara_nombre` varchar(100) DEFAULT NULL,
  `camara_estado` varchar(50) DEFAULT NULL,
  `camara_direccion` text,
  `camara_telefono` varchar(15) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `costo_afiliacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`camara_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sig_camara.c_cama_comercio: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `c_cama_comercio` DISABLE KEYS */;
INSERT INTO `c_cama_comercio` (`camara_id`, `camara_nombre`, `camara_estado`, `camara_direccion`, `camara_telefono`, `usuario_id`, `costo_afiliacion`) VALUES
	(1, 'Camara 1', 'Baja California', 'Av. Centro', '1234567890', 2, 1500),
	(2, 'Camara prueba', 'Estado de México', 'Av. Prueba', '1234567890', 12, 1000),
	(5, 'Camara 3', 'Guerrero', 'Av. Camara 3', '1234567890', 16, 2000);
/*!40000 ALTER TABLE `c_cama_comercio` ENABLE KEYS */;

-- Volcando estructura para tabla sig_camara.c_menu
DROP TABLE IF EXISTS `c_menu`;
CREATE TABLE IF NOT EXISTS `c_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_nombre` varchar(100) NOT NULL,
  `menu_url` text NOT NULL,
  `menu_icono` varchar(100) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sig_camara.c_menu: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `c_menu` DISABLE KEYS */;
INSERT INTO `c_menu` (`menu_id`, `menu_nombre`, `menu_url`, `menu_icono`, `usuario_id`) VALUES
	(1, 'Camara de comercio', 'Inicio/CamaraComercio', 'fa fa-sort-amount-asc', 1),
	(2, 'Afiliados', 'Inicio/Afiliados', 'fa fa-sort-alpha-asc', 2),
	(3, 'Menu de afiliados', 'Inicio/InfexAf', 'fa fa-sort-alpha-desc', 3),
	(4, 'Promotores', 'Inicio/Promotores', 'fa fa-users', 2),
	(5, 'Afiliados', 'Inicio/Afiliados', 'fa fa-sort-alpha-asc', 4),
	(6, 'Menu de afiliados', 'Inicio/InfexAf', 'fa fa-sort-alpha-desc', 8),
	(7, 'Menu de afiliados', 'Inicio/InfexAf', 'fa fa-sort-alpha-desc', 9),
	(8, 'Afiliados', 'Inicio/Afiliados', 'fa fa-sort-alpha-asc', 10),
	(9, 'Menu de afiliados', 'Inicio/InfexAf', 'fa fa-sort-alpha-desc', 11),
	(10, 'Afiliados', 'Inicio/Afiliados', 'fa fa-sort-alpha-asc', 12),
	(11, 'Promotores', 'Inicio/Promotores', 'fa fa-users', 12),
	(12, 'Menu de afiliados', 'Inicio/InfexAf', 'fa fa-sort-alpha-desc', 13),
	(13, 'Afiliados', 'Inicio/Afiliados', 'fa fa-sort-alpha-asc', 14),
	(14, 'Promotores', 'Inicio/Promotores', 'fa fa-users', 14),
	(15, 'Afiliados', 'Inicio/Afiliados', 'fa fa-sort-alpha-asc', 15),
	(16, 'Promotores', 'Inicio/Promotores', 'fa fa-users', 15),
	(17, 'Afiliados', 'Inicio/Afiliados', 'fa fa-sort-alpha-asc', 16),
	(18, 'Promotores', 'Inicio/Promotores', 'fa fa-users', 16);
/*!40000 ALTER TABLE `c_menu` ENABLE KEYS */;

-- Volcando estructura para tabla sig_camara.c_promotores
DROP TABLE IF EXISTS `c_promotores`;
CREATE TABLE IF NOT EXISTS `c_promotores` (
  `promotor_id` int(11) NOT NULL AUTO_INCREMENT,
  `promotor_nombre` varchar(100) DEFAULT NULL,
  `promotor_telefono` varchar(15) DEFAULT NULL,
  `promotor_clave` varchar(100) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `camara_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`promotor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sig_camara.c_promotores: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `c_promotores` DISABLE KEYS */;
INSERT INTO `c_promotores` (`promotor_id`, `promotor_nombre`, `promotor_telefono`, `promotor_clave`, `usuario_id`, `camara_id`) VALUES
	(1, 'Promotor 1', '2147483647', '1234', 4, 1),
	(2, 'Promotor 2', '1234567890', '34', 10, 1);
/*!40000 ALTER TABLE `c_promotores` ENABLE KEYS */;

-- Volcando estructura para tabla sig_camara.c_usuarios
DROP TABLE IF EXISTS `c_usuarios`;
CREATE TABLE IF NOT EXISTS `c_usuarios` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_password` varchar(50) DEFAULT NULL,
  `usuario_nombre` varchar(100) DEFAULT NULL,
  `usuario_perfil` text,
  `usuario_correo` varchar(100) DEFAULT NULL,
  `usuario_tipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sig_camara.c_usuarios: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `c_usuarios` DISABLE KEYS */;
INSERT INTO `c_usuarios` (`usuario_id`, `usuario_password`, `usuario_nombre`, `usuario_perfil`, `usuario_correo`, `usuario_tipo`) VALUES
	(1, '12345', 'admin', 'Captur1a.7ff0dc.png', 'admin@hotmail.comm', 'administrador'),
	(2, '123', 'camara1', 'TRYCatch.12cbc8.png', 'camara1@hotmail.com', 'camara de comercio'),
	(4, '123', 'promotor1', 'c-concanaco.3b1139.png', 'promotor1@hotmail.com', 'promotor'),
	(10, '123', 'promotor2', 'c-concanaco.3b1139.png', 'promotor2@hotmail.com', 'promotor'),
	(12, '123', 'prueba', 'c-concanaco.3b1139.png', 'prueba@hotmail.com', 'camara de comercio'),
	(13, '123', 'afiliado1', 'c-concanaco.3b1139.png', 'afiliado1@hotmail.com', 'afiliado'),
	(16, '123', 'camara3', 'c-concanaco.3b1139.png', 'camara3@hotmail.com', 'camara de comercio');
/*!40000 ALTER TABLE `c_usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla sig_camara.log_cambios
DROP TABLE IF EXISTS `log_cambios`;
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

-- Volcando estructura para tabla sig_camara.pagos_afiliado
DROP TABLE IF EXISTS `pagos_afiliado`;
CREATE TABLE IF NOT EXISTS `pagos_afiliado` (
  `pago_id` int(11) NOT NULL AUTO_INCREMENT,
  `pago_cantidad` int(11) DEFAULT NULL,
  `pago_fecha` varchar(10) DEFAULT NULL,
  `pago_hora` varchar(10) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pago_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sig_camara.pagos_afiliado: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `pagos_afiliado` DISABLE KEYS */;
INSERT INTO `pagos_afiliado` (`pago_id`, `pago_cantidad`, `pago_fecha`, `pago_hora`, `usuario_id`) VALUES
	(2, 100, '03/09/2017', '05:10', 5),
	(3, 200, '03/09/2017', '05:15', 5),
	(4, 100, '03/09/2017', '22:18', 5),
	(5, 200, '03/09/2017', '22:30', 5);
/*!40000 ALTER TABLE `pagos_afiliado` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
