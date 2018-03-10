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


-- Volcando estructura de base de datos para canalava
DROP DATABASE IF EXISTS `canalava`;
CREATE DATABASE IF NOT EXISTS `canalava` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `canalava`;

-- Volcando estructura para tabla canalava.menus
DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_nombre` varchar(50) DEFAULT NULL,
  `menu_url` text,
  `menu_icono` varchar(30) DEFAULT NULL,
  `menu_status` varchar(15) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla canalava.menus: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` (`menu_id`, `menu_nombre`, `menu_url`, `menu_icono`, `menu_status`, `usuario_id`) VALUES
	(1, 'Configuración', '#', 'fa fa-cogs', '1', 1),
	(2, 'ROL', '#', 'fa fa-user', '0', 2),
	(3, 'ROL', '#', 'fa fa-user', '0', 3),
	(4, 'ROL', '#', 'fa fa-user', '0', 4),
	(5, 'ROL', '#', 'fa fa-user', '0', 5),
	(6, 'ROL', '#', 'fa fa-user', '0', 6);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;

-- Volcando estructura para tabla canalava.menus_2
DROP TABLE IF EXISTS `menus_2`;
CREATE TABLE IF NOT EXISTS `menus_2` (
  `menu2_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu2_nombre` varchar(50) DEFAULT NULL,
  `menu2_url` varchar(50) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`menu2_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla canalava.menus_2: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `menus_2` DISABLE KEYS */;
INSERT INTO `menus_2` (`menu2_id`, `menu2_nombre`, `menu2_url`, `menu_id`) VALUES
	(1, 'Usuarios', 'Sections/Usuarios', 1);
/*!40000 ALTER TABLE `menus_2` ENABLE KEYS */;

-- Volcando estructura para tabla canalava.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla canalava.roles: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`rol_id`, `rol_nombre`) VALUES
	(1, 'ADMINISTRADOR'),
	(2, 'USUARIO A'),
	(3, 'USUARIO B');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla canalava.sub_roles
DROP TABLE IF EXISTS `sub_roles`;
CREATE TABLE IF NOT EXISTS `sub_roles` (
  `sub_rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_rol_nombre` varchar(50) NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sub_rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla canalava.sub_roles: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `sub_roles` DISABLE KEYS */;
INSERT INTO `sub_roles` (`sub_rol_id`, `sub_rol_nombre`, `rol_id`) VALUES
	(1, 'SUB ROL A', 1),
	(2, 'SUB ROL B', 1),
	(3, 'SUB ROL C', 1),
	(4, 'SUB ROL B2', 3),
	(5, 'SUB ROL A2', 2);
/*!40000 ALTER TABLE `sub_roles` ENABLE KEYS */;

-- Volcando estructura para tabla canalava.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nombre` varchar(50) DEFAULT NULL,
  `usuario_ap` varchar(30) DEFAULT NULL,
  `usuario_am` varchar(30) DEFAULT NULL,
  `usuario_mail` varchar(50) DEFAULT NULL,
  `usuario_tel_lada` varchar(15) DEFAULT NULL,
  `usuario_tel` varchar(15) DEFAULT NULL,
  `usuario_nac` varchar(15) DEFAULT NULL,
  `usuario_sexo` varchar(10) DEFAULT NULL,
  `usuario_dir` text,
  `usuario` varchar(50) DEFAULT NULL,
  `usuario_password` varchar(50) DEFAULT NULL,
  `usuario_perfil` text,
  `rol_id` int(11) DEFAULT NULL,
  `sub_rol_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla canalava.usuarios: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`usuario_id`, `usuario_nombre`, `usuario_ap`, `usuario_am`, `usuario_mail`, `usuario_tel_lada`, `usuario_tel`, `usuario_nac`, `usuario_sexo`, `usuario_dir`, `usuario`, `usuario_password`, `usuario_perfil`, `rol_id`, `sub_rol_id`) VALUES
	(1, 'Alberto Yovani', 'Pérez', 'Pérez', 'albertoyovanip@gmail.com', '052', '5555040497', '06/12/1996', 'HOMBRE', 'Av. Central ', 'admin', 'admin', 'bfd18c8298f351445d2058773fe65b11.1fe99f.jpg', 1, 1),
	(2, 'Beto', 'Perez', 'Perez', 'beto@hotmail.com', '052', '666666666', '02/19/2018', 'HOMBRE', 'Av. Central ', 'beto', '123', '561px-Seal_of_the_Government_of_Mexico.svg.5d2ad1.png', 2, 5),
	(3, 'Juan', 'Hernandez ', 'Lopez', 'juan@hotmail.conm', '052', '1234567890', '02/12/2018', 'HOMBRE', 'DIRECCIÓN DEL USUARIO', 'juan', '1234', '561px-Seal_of_the_Government_of_Mexico.svg.5d2ad1.png', 2, 5),
	(4, 'xczx', 'czxczx', 'zxc', 'zxczx@dfsf', '052', '234234234', '02/27/2018', 'MUJER', 'awerwe', 'werwerw', '123', '561px-Seal_of_the_Government_of_Mexico.svg.5d2ad1.png', 3, 4),
	(5, 'Yovani', 'Perez', 'Perez', 'asdasd@hotmal.cm', '052', '9191222708', '03/15/2018', 'HOMBRE', 'Av. Yovani', 'yovani', '123456', '561px-Seal_of_the_Government_of_Mexico.svg.5d2ad1.png', 2, 5),
	(6, 'NOMBRE ', 'NOMBRE ', 'NOMBRE ', 'NOMBRE@hotma', '123', '2367283947', '03/27/2018', 'HOMBRE', 'NOMBRE ', 'NOMBRE ', 'NOMBRE ', 'Imagen1.b1c706.png', 2, 5);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
