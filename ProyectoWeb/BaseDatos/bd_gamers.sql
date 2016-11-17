-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2016 at 05:59 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_gamers`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_administradores`
--

DROP TABLE IF EXISTS `tbl_administradores`;
CREATE TABLE IF NOT EXISTS `tbl_administradores` (
  `codigo_desarollador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo_desarollador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_administradores`
--

INSERT INTO `tbl_administradores` (`codigo_desarollador`, `nombre`, `apellido`, `contrasena`, `usuario`) VALUES
(1, 'Pedro', 'Santana', 'pedro', 'PEDRO');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_capturas`
--

DROP TABLE IF EXISTS `tbl_capturas`;
CREATE TABLE IF NOT EXISTS `tbl_capturas` (
  `codigo_capturas` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_juego` int(11) NOT NULL,
  `url_captura` varchar(500) NOT NULL,
  PRIMARY KEY (`codigo_capturas`),
  KEY `fk_tbl_capturas_tbl_juegos1_idx` (`codigo_juego`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_capturas`
--

INSERT INTO `tbl_capturas` (`codigo_capturas`, `codigo_juego`, `url_captura`) VALUES
(1, 1, 'img/capturas/captura_ds_1.jpg'),
(2, 1, 'img/capturas/captura_ds2_3.jpg'),
(3, 1, 'img/capturas/captura_ds2_4.jpg'),
(4, 1, 'img/capturas/captura_ds_4.jpg'),
(5, 2, 'img/capturas/captura_i_1.jpg'),
(6, 2, 'img/capturas/captura_i_2.jpg'),
(7, 2, 'img/capturas/captura_i_3.jpg'),
(8, 2, 'img/capturas/captura_i_4.jpg'),
(9, 3, 'img/capturas/captura_mkx_1.jpg'),
(10, 3, 'img/capturas/captura_mkx_2.jpg'),
(11, 3, 'img/capturas/captura_mkx_3.jpg'),
(12, 3, 'img/capturas/captura_mkx_4.jpg'),
(13, 4, 'img/capturas/captura_pvz_1.jpg'),
(14, 4, 'img/capturas/captura_pvz_2.jpg'),
(15, 4, 'img/capturas/captura_pvz_3.jpg'),
(16, 4, 'img/capturas/captura_pvz_4.jpg'),
(17, 5, 'img/capturas/captura_re6_1.jpg'),
(18, 5, 'img/capturas/captura_re6_2.jpg'),
(19, 5, 'img/capturas/captura_re6_3.jpg'),
(20, 5, 'img/capturas/captura_re6_4.jpg'),
(21, 6, 'img/capturas/captura_d_1.jpg'),
(22, 6, 'img/capturas/captura_d_2.jpg'),
(23, 6, 'img/capturas/captura_d_3.jpg'),
(24, 6, 'img/capturas/captura_d_4.jpg'),
(25, 7, 'img/capturas/captura_ss3_1.jpg'),
(26, 7, 'img/capturas/captura_ss3_2.jpg'),
(27, 7, 'img/capturas/captura_ss3_3.jpg'),
(28, 7, 'img/capturas/captura_ss3_4.jpg'),
(29, 8, 'img/capturas/captura_b2_1.jpg'),
(30, 8, 'img/capturas/captura_b2_2.jpg'),
(31, 8, 'img/capturas/captura_b2_3.jpg'),
(32, 8, 'img/capturas/captura_b2_4.jpg'),
(33, 9, 'img/capturas/captura_aw_1.jpg'),
(34, 9, 'img/capturas/captura_aw_2.jpg'),
(35, 9, 'img/capturas/captura_aw_3.jpg'),
(36, 9, 'img/capturas/captura_aw_4.jpg'),
(37, 10, 'img/capturas/captura_bp_1.jpg'),
(38, 10, 'img/capturas/captura_bp_2.jpg'),
(39, 10, 'img/capturas/captura_bp_3.jpg'),
(40, 10, 'img/capturas/captura_bp_4.jpg'),
(41, 11, 'img/capturas/captura_op_1.jpg'),
(42, 11, 'img/capturas/captura_op_2.jpg'),
(43, 11, 'img/capturas/captura_op_3.jpg'),
(44, 11, 'img/capturas/captura_op_4.jpg'),
(45, 12, 'img/capturas/captura_p2_1.jpg'),
(46, 12, 'img/capturas/captura_p2_2.jpg'),
(47, 12, 'img/capturas/captura_p2_3.jpg'),
(48, 12, 'img/capturas/captura_p2_4.jpg'),
(49, 13, 'img/capturas/captura_d2_1.jpg'),
(50, 13, 'img/capturas/captura_d2_2.jpg'),
(51, 13, 'img/capturas/captura_d2_3.jpg'),
(52, 13, 'img/capturas/captura_d2_4.jpg'),
(53, 14, 'img/capturas/captura_ds2_1.jpg'),
(54, 14, 'img/capturas/captura_ds2_2.jpg'),
(55, 14, 'img/capturas/captura_ds2_3.jpg'),
(56, 14, 'img/capturas/captura_ds2_4.jpg'),
(57, 15, 'img/capturas/captura_lp2_1.jpg'),
(58, 15, 'img/capturas/captura_lp2_2.jpg'),
(59, 15, 'img/capturas/captura_lp2_3.jpg'),
(60, 15, 'img/capturas/captura_lp2_4.jpg'),
(61, 16, 'img/capturas/captura_ark_1.jpg'),
(62, 16, 'img/capturas/captura_ark_2.jpg'),
(63, 16, 'img/capturas/captura_ark_3.jpg'),
(64, 16, 'img/capturas/captura_ark_4.jpg'),
(65, 17, 'img/capturas/captura_bak_1.jpg'),
(66, 17, 'img/capturas/captura_bak_2.jpg'),
(67, 17, 'img/capturas/captura_bak_3.jpg'),
(68, 17, 'img/capturas/captura_bak_4.jpg'),
(69, 18, 'img/capturas/captura_mw_1.jpg'),
(70, 18, 'img/capturas/captura_mw_2.jpg'),
(71, 18, 'img/capturas/captura_mw_3.jpg'),
(72, 18, 'img/capturas/captura_mw_4.jpg'),
(73, 19, 'img/capturas/captura_pvz2_1.jpg'),
(74, 19, 'img/capturas/captura_pvz2_2.jpg'),
(75, 19, 'img/capturas/captura_pvz2_3.jpg'),
(76, 19, 'img/capturas/captura_pvz2_4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categorias`
--

DROP TABLE IF EXISTS `tbl_categorias`;
CREATE TABLE IF NOT EXISTS `tbl_categorias` (
  `codigo_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_categorias`
--

INSERT INTO `tbl_categorias` (`codigo_categoria`, `nombre_categoria`) VALUES
(1, 'Shooter'),
(2, 'Accion'),
(3, 'Deportes'),
(4, 'Simulador'),
(5, 'RPG'),
(6, 'Estrategia'),
(7, 'Aventura');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comentarios`
--

DROP TABLE IF EXISTS `tbl_comentarios`;
CREATE TABLE IF NOT EXISTS `tbl_comentarios` (
  `codigo_comentarios` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_usuario` int(11) NOT NULL,
  `codigo_juego` int(11) NOT NULL,
  `comentario` varchar(2000) NOT NULL,
  `fecha_comentario` date NOT NULL,
  PRIMARY KEY (`codigo_comentarios`),
  KEY `fk_tbl_comentarios_tbl_usuarios2_idx` (`codigo_usuario`),
  KEY `fk_tbl_comentarios_tbl_juegos1_idx` (`codigo_juego`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_comentarios`
--

INSERT INTO `tbl_comentarios` (`codigo_comentarios`, `codigo_usuario`, `codigo_juego`, `comentario`, `fecha_comentario`) VALUES
(2, 1, 5, 'muy bueno, lo recomiendo', '2016-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_desarrollador`
--

DROP TABLE IF EXISTS `tbl_desarrollador`;
CREATE TABLE IF NOT EXISTS `tbl_desarrollador` (
  `codigo_desarrollador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_desarrollador` varchar(45) NOT NULL,
  `url` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo_desarrollador`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_desarrollador`
--

INSERT INTO `tbl_desarrollador` (`codigo_desarrollador`, `nombre_desarrollador`, `url`) VALUES
(1, 'EA Games', 'https://www.ea.com/es-es'),
(3, 'Ubisoft', 'www.ubisoft.com/'),
(4, 'Rockstar Games', 'www.rockstargames.com/es'),
(5, 'Activision', 'www.activision.com/es/'),
(6, 'Capcom', 'www.capcom.com/'),
(7, 'Bandai Namco Games', 'www.bandainamcoent.com/'),
(8, 'Unity', 'www.unity3d.com/es'),
(9, 'Infinity Ward', 'www.infinityward.com/'),
(10, 'THQ', 'www.thq.com/'),
(11, 'Warner Bros. Interactive Entertainment', 'www.warnerbros.es/videojuegos');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_especificaciones`
--

DROP TABLE IF EXISTS `tbl_especificaciones`;
CREATE TABLE IF NOT EXISTS `tbl_especificaciones` (
  `codigo_especificaciones` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_tipo_especificaciones` int(11) NOT NULL,
  `codigo_juego` int(11) NOT NULL,
  `sistema_operativo` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `targeta_grafica` varchar(100) NOT NULL,
  `cpu` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo_especificaciones`),
  KEY `fk_tbl_especificaciones_tbl_tipo_especificaciones1_idx` (`codigo_tipo_especificaciones`),
  KEY `fk_tbl_especificaciones_tbl_juegos1_idx` (`codigo_juego`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_especificaciones`
--

INSERT INTO `tbl_especificaciones` (`codigo_especificaciones`, `codigo_tipo_especificaciones`, `codigo_juego`, `sistema_operativo`, `ram`, `targeta_grafica`, `cpu`) VALUES
(1, 1, 1, 'XP SP2 Y VISTA (PROBADO EN WIN7)', '1 GB PARA WINDOWS XP (2 GB PARA VISTA)', 'TARJETA VIDEO COMPATIBLE CON DIRECTX 9.0C', '2.8 GHZ O MAS RAPIDO'),
(2, 1, 2, 'Windows Vista / 7 / 8 de 32-bit', '2 GB RAM', ' NVIDIA GeForce™ 8800 GTS o AMD Radeon™ HD 3850', ' Intel Core™ 2 Duo 2.4 GHz o AMD Athlon X2 2.8 GHz'),
(3, 2, 2, 'Windows 7 / Windows 8 / Vista de 64-bit', '4 GB RAM', 'NVIDIA GeForce™ GTX 560 o AMD Radeon™ HD 6950', 'Intel Core i5-750, 2.67 GHz o AMD Phenom II X4 965, 3.4 GHz'),
(4, 1, 3, '64-bit: Vista, Win 7, Win 8', '3 GB RAM', 'NVIDIA GeForce GTX 460 | AMD Radeon HD 5850', 'Intel Core i5-750, 2.67 GHz | AMD Phenom II X4 965, 3.4 GHz'),
(5, 2, 3, '64-bit: Win 7, Win 8', '8 GB RAM', 'NVIDIA GeForce GTX 660 | AMD Radeon HD 7950', ' Intel Core i7-3770, 3.4 GHz | AMD FX-8350, 4.0 GHz'),
(6, 1, 4, 'Windows 7/8 de 64 bits', '4 GB de RAM', 'NVIDIA 8800 GT, AMD/ATI Radeon HD 5750', 'Intel Core 2 Duo a 3,0 GHz'),
(7, 2, 4, 'Windows 7/8 de 64 bits', 'al menos 8 GB de RAM', 'AMD Radeon 7870 de 3 GB o superior NVIDIA Geforce GT660 de 3 GB', 'Intel Quad Core y AMD Six Core'),
(8, 1, 5, 'Windows Vista®/XP, Windows 7, Windows 8', '2 GB RAM', 'NVIDIA® GeForce® 8800GTS o superior', ' Intel® CoreTM2 Duo 2.4 Ghz o superior, AMD AthlonTM X2 2.8 Ghz'),
(9, 1, 6, 'Windows XP SP3 / Windows Vista SP1 / Windows 7', '1 GB (Windows XP) 2 GB (Windows Vista / Windows 7)', 'NVIDIA GeForce 8800 GT o mejor / ATI Radeon X1900', 'Intel Pentium 4 530 a 3.0 GHz o superior, AMD Athlon 64 3800+ a 2.4 GHz'),
(10, 2, 6, 'Windows XP SP3 / Windows Vista SP1 / Windows 7', ' 2 GB (Windows XP) 3 GB (Windows Vista / Windows 7)', 'NVIDIA GeForce GTS 240 o mejor / ATI Radeon HD 3870 o mejor con 256 MB de VRAM', 'Procesador Intel Core 2 Duo E6420 a 2.13 GHz o superior, AMD Athlon 64 X2 5200+ a 2.6 GHz o superior'),
(11, 1, 7, 'Windows XP de 32 bits (con service pack 2 o 3)', '1 GB de RAM', 'Familias nVidia GeForce 7800/7900/8600, familias ATI/AMD Radeon HD2600/3600 o 1800/X1900', 'Dual Core de Intel o AMD a 2.0 GHz'),
(12, 2, 7, ' Windows 7 de 64 bits', '4 GB de RAM', 'nVidia GeForce 480/580 GTX, ATI/AMD Radeon HD 5870/6970', 'Quad Core de Intel (familias i5/i7) o AMD (Phenom II) a 3.0 GHz'),
(13, 1, 8, 'Windows XP SP3', '2 GB de RAM (XP y Vista)', 'nVidia GeForce 8500 / ATI Radeon HD 2600', 'Dual Core a 2.4 GHz'),
(14, 2, 8, 'Windows XP SP3 / Vista / Win 7', '2 GB de RAM', 'nVidia GeForce GTX 560 / ATI Radeon HD 5850 / 512 MB de VRAM', 'Quad Core a 2.3 GHz'),
(15, 1, 9, 'Windows 7 64-Bit / Windows 8 64-Bit / Windows 8.1 64-Bit', '6 GB de RAM', 'NVIDIA GeForce GTS 450 de 1GB / ATI Radeon HD 5870 de 1GB', 'Intel Core i3-530 @ 2,93 GHz / AMD Phenom II X4 810 @ 2,80 GHz'),
(16, 2, 9, 'Windows 7 64-Bit / Windows 8 64-Bit / Windows 8.1 64-Bit', ' 8 GB RAM', 'NVIDIA GeForce GTX 760 con 4GB', ' Intel Core i5-2500K @ 3.30GHz'),
(17, 1, 10, 'Windows XP SP2 / Windows Vista ', '1 GB de RAM XP / 1.5 GB de RAM Vista', 'Compatible con DirectX 9.0c', 'Pentium 4 a 2.8 GHz (XP) / Pentium 4 a 3.2 GHz (Vista) '),
(18, 2, 10, 'Windows XP SP2 / Windows Vista ', '2 GB', 'Compatible con DirectX 9.0c', 'Pentium 4 a 2.8 GHz (XP) / Pentium 4 a 3.2 GHz (Vista) '),
(19, 1, 11, 'Windows 7/8 / 8.1.', '512 MB de RAM.', '512 MB - Nvidia GeForce 8800 / ATI Radeon HD 3870', 'Core 2 Duo de 2,4 GHz.'),
(20, 2, 11, ' Windows 7/8 / 8.1', '1 GB de RAM', '1 GB Nvidia GeForce GTX 550Ti / AMD Radeon HD 6790', 'Core i7 860'),
(21, 1, 12, 'Windows XP/Vista/7', ' 2 GB', 'NVIDIA GeForce 8800 GT series con 512 MB RAM ó ATI Radeon HD 4850 con 512 MB RAM', ' Intel Core 2 Duo 2.6 GHz ó AMD Phenom X3 8750'),
(22, 2, 12, 'Windows 7', '4 GB', 'NVIDIA GeForce GTX 460 (1GB) / ATI Radeon HD 5850 (1GB) o posterior', 'Intel Core 2 Quad 2.7 GHz o posterior, AMD Phenom II X4 3 GHz o posterior'),
(23, 1, 13, 'Windows XP, Windows Vista SP1 o Windows 7', '2 GB', 'Nvidia 9800 GT 512 MB o equivalente AMD', '2.0 Ghz Intel Core 2 Duo o equivalente AMD'),
(24, 2, 13, 'Windows 7', '2 GB', 'Nvidia GeForce GTX 260 512 MB o equivalente AMD', 'Cualquier Quad-Core AMD o su equivalente en Intel'),
(25, 1, 14, 'Windows Vista / Windows 7', '1 GB (Windows XP) / 2 GB (Windows Vista / Windows 7)', 'Tarjeta gráfica NVIDIA GeForce 6800 GT ', 'Procesador Pentium 4 a 2.8 GHz / AMD Athlon 64 3000'),
(26, 1, 15, ' Windows XP, Windows Vista, Windows 7', '1 GB en XP, 2GB en Vista', 'NVidia GeForce 7800 o superior, ATI Radeon HD 2400 Pro o superior. GeForce 8800', 'Intel Core 2 Duo o AMD Athlon X2 o superior'),
(27, 2, 15, 'Windows XP, Windows Vista, Windows 7', '2 GB o más', 'NVidia GeForce 9800 o superior, ATI HD4800 o superior. GeForce GTX260 ', ' Intel Core 2 Duo o AMD Athlon X2 o superior'),
(28, 1, 16, 'Desconocido', 'Desconocido', 'Desconocido', 'Desconocido'),
(29, 2, 16, 'Desconocido', 'Desconocido', 'Desconocido', 'Desconocido'),
(30, 1, 17, 'Windows 7 SP1 o Windows 8.1 (64-bit)', '6 GB RAM', 'NVIDIA GeForce GTX 660 (2 GB VRAM mínimo) | AMD Radeon HD 7950 (3 GB VRAM mínimo)', 'Intel Core i5-750, 2.67 GHz | AMD Phenom II X4 965, 3.4 GHz'),
(31, 2, 17, 'Windows 7 SP1 o Windows 8.1 (64-bit)', '8 GB RAM', 'NVIDIA GeForce GTX 760. En ultra es necesaria una NVIDIA GeForce GTX 980', 'Intel Core i7-3770, 3.4 GHz | AMD FX-8350, 4.0 GHz'),
(32, 1, 18, 'Windows XP / Windows Vista / Windows 7', '2 GB de RAM', ' NVIDIA GeForce™ 8600GT de 256 MB compatible con Shader 3.0 / ATI Radeon™ X1950 o superior', ' Intel Core™ 2 Duo E6600 o AMD Phenom™ X3 8750 (o superior)'),
(33, 2, 18, 'Desconocido', 'Desconocido', 'Desconocido', 'Desconocido'),
(34, 1, 19, 'Windows 7 64-bit / Windows 8.1 64-bit / Windows 10 64-bit.', 'Al menos 4 GB para Windows 7 / Windows 8.1 / Windows 10.', 'NVIDIA GeForce GT 640 / AMD Radeon HD 5750.', ' 3,20 GHz Intel i5 650 / 2,5 GHz AMD Phenom X4 9850.'),
(35, 2, 19, 'Windows 10 64-bit o superior.', 'Al menos 16 GB RAM.', 'NVIDIA GeForce GTX 970 4 GB / AMD Radeon R9 290 4 GB.', 'Intel i5 6600 o equivalente.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_esrb`
--

DROP TABLE IF EXISTS `tbl_esrb`;
CREATE TABLE IF NOT EXISTS `tbl_esrb` (
  `codigo_esrb` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_esrb` varchar(45) NOT NULL,
  `url_esrb` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo_esrb`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_esrb`
--

INSERT INTO `tbl_esrb` (`codigo_esrb`, `tipo_esrb`, `url_esrb`) VALUES
(1, 'Teen', 'img/esrb/teen.png'),
(2, 'Mature 17+', 'img/esrb/mature.png'),
(3, 'Adults only 17+', 'img/esrb/adults.png'),
(4, 'Early childhood', 'img/esrb/childhood.png'),
(5, 'Everyone', 'img/esrb/everyone.png'),
(6, 'Everyone 10+', 'img/esrb/everyone_10.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_juegos`
--

DROP TABLE IF EXISTS `tbl_juegos`;
CREATE TABLE IF NOT EXISTS `tbl_juegos` (
  `codigo_juego` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_desarrollador` int(11) NOT NULL,
  `codigo_esrb` int(11) NOT NULL,
  `nombre_juego` varchar(100) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `url` varchar(1000) NOT NULL,
  `portada` varchar(500) NOT NULL,
  `calificacion` decimal(10,0) NOT NULL,
  `precio` varchar(45) NOT NULL,
  `clave_producto` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo_juego`),
  KEY `fk_tbl_juegos_tbl_desarrollador1_idx` (`codigo_desarrollador`),
  KEY `fk_tbl_juegos_tbl_esrb1_idx` (`codigo_esrb`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_juegos`
--

INSERT INTO `tbl_juegos` (`codigo_juego`, `codigo_desarrollador`, `codigo_esrb`, `nombre_juego`, `descripcion`, `fecha_publicacion`, `url`, `portada`, `calificacion`, `precio`, `clave_producto`) VALUES
(1, 1, 1, 'Dead Space', 'Dead Space. Dead Space supone el debut de EA dentro del genero de los survival horror. Durante el juego asumiremos el control de Isaac Clarke, un ingeniero de estructuras espaciales envuelto en una angustiosa aventura, cuando su companera recibe una misteriosa llamada de socorro de una nave espacial perdida.', '2008-10-20', 'iso/dead_space.iso', 'img/portadas/dead_space.jpg', '4', '2.50', '1234 :v'),
(2, 10, 2, 'Injustice: Gods Among Us', 'En un universo alternativo el Joker destruye a Metrópolis con una bomba atómica asesinando a miles de personas, incluyendo a la esposa de Superman Lois Lane y su hijo no nato, pero el Hombre de Acero, habiendo sido engañado por aquel para asesinar a Lois y por un profundo dolor, lo asesina, esto conlleva a una serie de acontecimientos que lo convierten en un malvado dictador y líder de una organización llamada Régimen, todos los héroes y algunos villanos como Sinestro se unen a él, excepto Batman y Green Arrow, este último es asesinado por Superman por haberlo desafiado.\r\n\r\nEn el universo original varios héroes intentan detener a Lex Luthor y una serie de villanos, cuando son derrotados, Lex le revela a Batman que le dio al Joker una bomba atómica y junto a sus compañeros van a detenerlo sin embargo, Linterna Verde, Green Arrow, Wonder Woman, Aquaman y accidentalmente Batman y el mismo Joker son enviados a la dimensión alterna, donde descubren lo sucedido.\r\n', '2013-04-16', 'iso/injustice_gods_among_us.iso', 'img/portadas/injustice_gods_among_us.jpg', '3', '15.99', 'FGTVB-XXSXA-ZZBFG-WDRTY-MNBJG'),
(3, 10, 3, 'Mortal Kombat X', 'El juego tiene nuevos controles, con dos botones de golpe y dos de patada También cuenta con ataques "X-Ray", como Mortal Kombat 9. Estos movimientos tienen la peculiaridad de restar una gran cantidad de salud al oponente, mostrando los huesos y órganos internos de la "víctima" al momento de ser realizados (de ahí su nombre); para poder ejecutarlos, se debe llenar una segunda barra de energía.\r\n\r\nCada personaje tiene como mínimo 2 movimientos finales, que puede ejecutar en el momento que termine la pelea; entre estos se encuentran los famosos "Fatalities. También están disponibles otros tipos de "Finishers". En esta entrega no se incluyeron los "Babalities". Los "Brutalities" también están, pero a diferencia de Mortal Kombat 3, no son combos si no un ataque especial que derrota al personaje. También se reveló un nuevo tipo de "finisher" llamado Quitality El Quitality se aplica cuando se está jugando de manera on-line y el contrincante decide abandonar la pelea de manera abrupta (Rage quit). El jugador que permaneció en la pelea, ganará de manera automática, mientras que al personaje del peleador que abandonó la pelea, le explotará la cabeza.', '2015-04-14', 'iso/mortal_kombat_x.iso', 'img/portadas/mortal_kombat_x.jpg', '5', '7.68', 'HGJFY-KFJGH-ALQIP-38GHJ-0D9RF'),
(4, 1, 4, 'PVZ Garden Warfare', 'Plants vs. Zombies: Garden Warfare es un videojuego cooperativo y shooter de disparos en tercera persona perteneciente a la franquicia de Plants vs. Zombies desarrollado por PopCap Games y distribuido por Electronic Arts', '2014-02-25', 'iso/pvz_g_w.iso', 'img/portadas/pvz-gw-icono.jpg', '5', '10.78', 'HFGRY-12KJ4-MVN83-8RYT6-5S6DG'),
(5, 6, 5, 'Resident Evil 6', 'Nueva entrega de la popular saga Resident Evil que cuenta con Leon S. Kennedy y Chris Redfield como protagonistas. El título se ambienta 10 años después de los sucesos acaecidos en Raccoon City en Resident Evil 2, y visitará varias localizaciones en el mundo.', '2012-10-02', 'iso/re6.iso', 'img/portadas/re6-icono.jpg', '5', '15.08', 'LKG8-7SFDR-6AHDT-89F03-DFER4'),
(6, 10, 6, 'Darksiders', '\r\nIdeado por el artista del cómic Joe Madureira, Darksiders nos sitúa en un mundo post-apocalíptico en el que los demonios y las fuerzas del mal han adelantado prematuramente el fin de los tiempos. En este contexto asumiremos el papel de “Guerra”, uno de los Cuatro Jinetes del Apocalipsis en su afán de venganza contra las fuerzas que lo traicionaron.', '2010-09-24', 'iso/darksiders.iso', 'img/portadas/darksiders1-icono.jpg', '4', '5.00', 'LKP01-GGFA6-JJTI8-SSL5J-LPF03'),
(7, 8, 1, 'Serious Sam 3: BFE', 'Tercera entrega de este juego shooter de acción rápida y directa, donde volvemos a encarnar de nuevo a Sam el Serio.\r\n', '2011-11-22', 'iso/SS3.iso', 'img/portadas/serioussam3-icono.jpg', '3', '1.95', 'AJDGT-4657T-FHG73-JGUHA-11111'),
(8, 9, 2, 'Borderlands 2', 'Segunda entrega del innovador shooter de Gearbox que cuenta con nuevos personajes principales, habilidades, entornos, enemigos, y por supuesto armas y equipo que se juntan esta vez en una nueva historia más ambiciosa.', '2012-09-21', 'iso/borderlands2.iso', 'img/portadas/borderlands2-icono.jpg', '4', '10.00', 'VVSSR-SHE34-HFG47-8576T-LLK78'),
(9, 5, 3, 'Call Of Duty: Advance Warfare', 'Videojuego de la saga Call of Duty cuyo desarrollo principal corre a cargo de Sleedgehammer Games. El título se ambienta en un futuro cercano y nos plantea una trama con organizaciones militares privadas equipadas con alta tecnología, tensiones políticas y sobre todo, grandes dosis de acción bélica.', '2014-11-04', 'iso/cod_a_w.iso', 'img/portadas/cod_advance_warfare.jpg', '1', '15.99', 'QUET5-096LJ-8D6A4-H18C9-C8S6F'),
(10, 1, 4, 'Burnout Paradise The Ultimate Box', 'Nueva entrega de la popular serie de conducción Burnout que, tras su paso por PS3 y Xbox 360 llega a PC con una severa revisión y ciertas mejoras y añadidos jugables.', '2009-02-26', 'iso/burnout.iso', 'img/portadas/burnout-icono.jpg', '5', '12.00', 'JJJ34-77W6S-8C8F9-MAS90-LIN32'),
(11, 6, 5, 'One Piece Pirate Warrior 3', 'Nueva colaboración de Tecmo Koei y Bandai Namco en One Piece: Pirate Warriors 3. El popular manganime de Eiichirö Oda llega a PS4, PS3, PSVita y PC con toda su acción y gráficos mejorados. uffy y el resto de miembros de la tripulación de la banda del sombrero de paja, vuelven a la acción.', '2015-08-28', 'iso/op.iso', 'img/portadas/onepiece-icono.jpg', '4', '25.78', 'AMXNF-485UR-FHRY5-KGJHU-576YT'),
(12, 5, 6, 'Prototype 2', 'Nueva entrega de la serie creada por Radical Games. Acción futurista con un protagonista capaz de adoptar las habilidades y formas de los enemigos que elimine.', '2012-07-27', 'iso/p2.iso', 'img/portadas/prototype2-icono.jpg', '3', '8.76', 'MZNXH-YE645-73456-GHFJ6-KHJYU'),
(13, 9, 1, 'Darksiders 2', 'Segunda entrega del Hack and Slash de Vigil Games, DarkSiders, que esta vez está protagonizado por un nuevo Jinete del Apocalipsis: Muerte. Un título de acción y aventuras que mezcla nuevamente en su fórmula rol, combates, acción y un estilo artístico muy personal.\r\n', '2012-08-21', 'iso/d2.iso', 'img/portadas/darksiders2-icono.jpg', '4', '5.68', 'GFHDT-1039G-E6D7F-4H5JH-364HF'),
(14, 7, 2, 'Dead Space 2', 'Secuela del magnifico título de acción y ciencia ficción espacial Dead Space. Visceral Games vuelve a firmar esta continuación que trasladara su argumento hasta una gigantesca base especial asolada nuevamente por los temibles Necromorfos.', '2011-01-27', 'iso/ds2.iso', 'img/portadas/ds2-icono.jpg', '5', '2.50', 'QOWEI-8D7F4-H4H6-KFHGY-H5J6L'),
(15, 10, 3, 'Lost Planet 2', 'Segunda entrega de Lost Planet que en esta ocasión amplía su gélida ambientación en beneficio de junglas y otros parajes, introduciendo además un importante modo cooperativo para cuatro jugadores.\r\n', '2010-10-15', 'iso/lp2.iso', 'img/portadas/lp2-icono.jpg', '2', '6.70', 'QOEUT-VNBHG-364YT-1029G-576MC'),
(16, 11, 4, 'ARK Survival Evolved', 'Tras despertar en una misteriosa isla que da nombre al videojuego, el jugador deberá cazar, recolectar alimentos y recursos, investigar nuevas tecnologías o construir su propio refugio en una nueva aventura de supervivencia. ¿Su punto diferenciador? La caza y domesticación de dinosaurios leviatán y otras criaturas primitivas. Una isla de supervivencia y muchos, muchos dinosaurios.', '2016-10-02', 'iso/ark.iso', 'img/portadas/ark-icono.jpg', '3', '25.68', 'MKO34-WSX45-5RFVR-798UJ-QAZ5D'),
(17, 10, 5, 'Batman Arkham Knight', 'Última entrega de la serie Arkham bajo la batuta de Rocksteady que está ambientada, una vez más, en la ciudad de Gotham. Como los episodios anteriores y que, siguiendo la tradición de la serie, va abriendo progresivamente su foco. Desde el sanatorio de Arkham de la primera parte, hasta los distintos barrios de la segunda, Arkham City, y la ciudad ya completa en el caso de este tercer episodio. Hasta tal punto es así que en esta ocasión se hace necesario el uso del Batmóvil como vehículo pilotable que nos permite movernos a toda velocidad por la ciudad ideada por Bob Kane, el creador de este superhéroe alado. ', '2015-10-28', 'iso/bak.iso', 'img/portadas/batman-ak-icono.jpg', '1', '14.08', 'QAZS3-PL,K0-RFVG7-UHBJ9-YHNJ7'),
(18, 1, 6, 'Call of Dutty Modern Warfare 3', 'Tercera entrega de Call of Duty: Modern Warfare, un nuevo episodio de la popular saga de acción bélica de Activision.', '2011-11-08', 'iso/codmw3.iso', 'img/portadas/cod-mw-icono.jpg', '1', '1.98', 'VFR56-756TY-BGHT7-1QAZX-PLMNB'),
(19, 1, 1, 'Plants vs Zombies Garden Warfare 2', 'Garden Warfare 2 es la segunda entrega Plantas vs. Zombies: Garden Warfare, un simpático juego de acción multijugador que enfrenta a plantas y zombis (con mucho humor) en diferentes campos de batalla que son jardines. El videojuego incluye novedades en forma de modos multijugador, arenas, personajes, armas o la posibilidad de jugar contra bots, además de nuevas cotas de locura e incluso modo campaña.', '2016-02-25', 'iso/pvzgw2.iso', 'img/portadas/pvz-gw2-icono.jpg', '3', '45.99', '3EDCV-5TGBN-7UJMN-3EDCV-1QAZ2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_juegos_x_tbl_categorias`
--

DROP TABLE IF EXISTS `tbl_juegos_x_tbl_categorias`;
CREATE TABLE IF NOT EXISTS `tbl_juegos_x_tbl_categorias` (
  `codigo_juego` int(11) NOT NULL,
  `codigo_categoria` int(11) NOT NULL,
  PRIMARY KEY (`codigo_juego`,`codigo_categoria`),
  KEY `fk_tbl_juegos_has_tbl_categorias_tbl_categorias1_idx` (`codigo_categoria`),
  KEY `fk_tbl_juegos_has_tbl_categorias_tbl_juegos1_idx` (`codigo_juego`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_juegos_x_tbl_categorias`
--

INSERT INTO `tbl_juegos_x_tbl_categorias` (`codigo_juego`, `codigo_categoria`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tarjeta_credito`
--

DROP TABLE IF EXISTS `tbl_tarjeta_credito`;
CREATE TABLE IF NOT EXISTS `tbl_tarjeta_credito` (
  `codigo_tarjeta_credito` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_usuario` int(11) NOT NULL,
  `numero_tarjeta` varchar(45) NOT NULL,
  `seguridad_tarjeta` varchar(45) NOT NULL,
  `fecha_vencimiento` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo_tarjeta_credito`),
  KEY `codigo_usuario` (`codigo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_tarjeta_credito`
--

INSERT INTO `tbl_tarjeta_credito` (`codigo_tarjeta_credito`, `codigo_usuario`, `numero_tarjeta`, `seguridad_tarjeta`, `fecha_vencimiento`) VALUES
(3, 1, '1111222233334444', '193', '8/20'),
(4, 1, '1111222233334444', '193', '8/20'),
(5, 2, '0000999988887777', '564', '4/18'),
(6, 1, '6666777788889999', '852', '7/02'),
(7, 1, '00000000000000000', '000', '0/00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tipo_especificaciones`
--

DROP TABLE IF EXISTS `tbl_tipo_especificaciones`;
CREATE TABLE IF NOT EXISTS `tbl_tipo_especificaciones` (
  `codigo_tipo_especificaciones` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo_tipo_especificaciones`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_tipo_especificaciones`
--

INSERT INTO `tbl_tipo_especificaciones` (`codigo_tipo_especificaciones`, `tipo`) VALUES
(1, 'Minimos'),
(2, 'Recomendados');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trailer`
--

DROP TABLE IF EXISTS `tbl_trailer`;
CREATE TABLE IF NOT EXISTS `tbl_trailer` (
  `codigo_trailer` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_juego` int(11) NOT NULL,
  `url_trailer` varchar(500) NOT NULL,
  PRIMARY KEY (`codigo_trailer`),
  KEY `fk_tbl_trailer_tbl_juegos1_idx` (`codigo_juego`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_trailer`
--

INSERT INTO `tbl_trailer` (`codigo_trailer`, `codigo_juego`, `url_trailer`) VALUES
(1, 1, 'https://www.youtube.com/embed/lRiiWLaub_o'),
(2, 2, 'https://www.youtube.com/embed/hMkTQSbE6Bc'),
(3, 3, 'https://www.youtube.com/embed/Ci6lMQNLKZU'),
(4, 4, 'https://www.youtube.com/embed/0c6Qd4Rck1o'),
(5, 5, 'https://www.youtube.com/embed/sS_bGpe9qE8'),
(6, 6, 'https://www.youtube.com/embed/ArHzEGeiMbg'),
(7, 7, 'https://www.youtube.com/embed/NeqHkvDCQgg'),
(8, 8, 'https://www.youtube.com/embed/kKVf5feSMEg'),
(9, 9, 'https://www.youtube.com/embed/sFu5qXMuaJU'),
(10, 10, 'https://www.youtube.com/embed/R4FLuZMb0KA'),
(11, 11, 'https://www.youtube.com/embed/vEILtfJSoyc'),
(12, 12, 'https://www.youtube.com/embed/-X0DfqkXeU8'),
(13, 13, 'https://www.youtube.com/embed/0Hc1ZAfR5wA'),
(14, 14, 'https://www.youtube.com/embed/z7Qy_4sWs3I'),
(15, 15, 'https://www.youtube.com/embed/HMzPla8iMV0'),
(16, 16, 'https://www.youtube.com/embed/9Hwdh8enX7Q'),
(17, 17, 'https://www.youtube.com/embed/wsf78BS9VE0'),
(18, 18, 'https://www.youtube.com/embed/coiTJbr9m04'),
(19, 19, 'https://www.youtube.com/embed/9_0gZFfqK3w');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `codigo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_tipo_pago` int(11) DEFAULT NULL,
  `codigo_tarjeta_credito` int(11) DEFAULT NULL,
  `nombre_usuario` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  PRIMARY KEY (`codigo_usuario`),
  KEY `fk_tbl_usuarios_tbl_tipo_pago_x_tbl_tarjeta_credito1_idx` (`codigo_tipo_pago`,`codigo_tarjeta_credito`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`codigo_usuario`, `codigo_tipo_pago`, `codigo_tarjeta_credito`, `nombre_usuario`, `nombre`, `apellido`, `correo_electronico`, `contrasena`, `fecha_nacimiento`) VALUES
(1, NULL, NULL, 'ARTURIA', 'Arturia', 'Pendragon', 'arturiap@yahoo.es', 'arturia', '2000-07-13'),
(2, NULL, NULL, 'JUAN', 'Juan', 'Perez', 'juanperez@gmail.com', 'juan', '2016-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_venta_diaria`
--

DROP TABLE IF EXISTS `tbl_venta_diaria`;
CREATE TABLE IF NOT EXISTS `tbl_venta_diaria` (
  `codigo_venta_diaria` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_venta` date NOT NULL,
  `monto` varchar(10) NOT NULL,
  PRIMARY KEY (`codigo_venta_diaria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_venta_diaria`
--

INSERT INTO `tbl_venta_diaria` (`codigo_venta_diaria`, `fecha_venta`, `monto`) VALUES
(6, '2016-11-16', '12.00'),
(7, '2016-11-16', '12.00'),
(8, '2016-11-16', '15.99'),
(9, '2016-11-16', '12.00'),
(10, '2016-11-17', '45.99');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_venta_total`
--

DROP TABLE IF EXISTS `tbl_venta_total`;
CREATE TABLE IF NOT EXISTS `tbl_venta_total` (
  `codigo_venta_total` int(11) NOT NULL AUTO_INCREMENT,
  `venta_total` int(11) NOT NULL,
  `codigo_venta_diaria` int(11) NOT NULL,
  PRIMARY KEY (`codigo_venta_total`),
  KEY `fk_tbl_venta_total_tbl_venta_diaria1_idx` (`codigo_venta_diaria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_capturas`
--
ALTER TABLE `tbl_capturas`
  ADD CONSTRAINT `fk_tbl_capturas_tbl_juegos1` FOREIGN KEY (`codigo_juego`) REFERENCES `tbl_juegos` (`codigo_juego`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_comentarios`
--
ALTER TABLE `tbl_comentarios`
  ADD CONSTRAINT `fk_tbl_comentarios_tbl_juegos1` FOREIGN KEY (`codigo_juego`) REFERENCES `tbl_juegos` (`codigo_juego`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_comentarios_tbl_usuarios2` FOREIGN KEY (`codigo_usuario`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_especificaciones`
--
ALTER TABLE `tbl_especificaciones`
  ADD CONSTRAINT `fk_tbl_especificaciones_tbl_juegos1` FOREIGN KEY (`codigo_juego`) REFERENCES `tbl_juegos` (`codigo_juego`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_especificaciones_tbl_tipo_especificaciones1` FOREIGN KEY (`codigo_tipo_especificaciones`) REFERENCES `tbl_tipo_especificaciones` (`codigo_tipo_especificaciones`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_juegos`
--
ALTER TABLE `tbl_juegos`
  ADD CONSTRAINT `fk_tbl_juegos_tbl_desarrollador1` FOREIGN KEY (`codigo_desarrollador`) REFERENCES `tbl_desarrollador` (`codigo_desarrollador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_juegos_tbl_esrb1` FOREIGN KEY (`codigo_esrb`) REFERENCES `tbl_esrb` (`codigo_esrb`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_juegos_x_tbl_categorias`
--
ALTER TABLE `tbl_juegos_x_tbl_categorias`
  ADD CONSTRAINT `fk_tbl_juegos_has_tbl_categorias_tbl_categorias1` FOREIGN KEY (`codigo_categoria`) REFERENCES `tbl_categorias` (`codigo_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_juegos_has_tbl_categorias_tbl_juegos1` FOREIGN KEY (`codigo_juego`) REFERENCES `tbl_juegos` (`codigo_juego`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_trailer`
--
ALTER TABLE `tbl_trailer`
  ADD CONSTRAINT `fk_tbl_trailer_tbl_juegos1` FOREIGN KEY (`codigo_juego`) REFERENCES `tbl_juegos` (`codigo_juego`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
