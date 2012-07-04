-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-07-2009 a las 23:01:57
-- Versión del servidor: 5.1.33
-- Versión de PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE IF NOT EXISTS `autores` (
  `cod_autor` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `nom_autor` text COLLATE utf8_spanish_ci NOT NULL,
  `ap_autor` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cod_autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=35 ;

--
-- Volcar la base de datos para la tabla `autores`
--

INSERT INTO `autores` (`cod_autor`, `nom_autor`, `ap_autor`) VALUES
(1, 'Miguel Angel', 'Ferrer'),
(2, 'Daniel', 'Cordoba Mendiola'),
(3, 'Josh', 'Charlene Bernoff'),
(4, 'Ramon', 'Tamames'),
(5, 'Wallace', 'Wang'),
(6, 'Vander Veer', 'Gover'),
(7, 'Chris', 'Jackson'),
(8, 'Pedro', 'Gomez Sanchez'),
(9, 'Christina', 'Brown'),
(10, 'Michele', 'Busquet Vanderheyden'),
(11, 'Erskine', 'Holmes'),
(12, 'Jorge Ramon', 'Gomariz'),
(13, 'Juancal', 'Rilla'),
(14, 'Javier', 'Ronda'),
(15, 'Jesus', 'Marto Perez'),
(16, 'Patricio', 'Gomez Cano'),
(17, 'Michel', 'Montignac'),
(18, 'Jamie', 'Hilfield'),
(19, 'monic', 'Krona Peld'),
(20, 'Shunaki', 'Kimoko'),
(21, 'Maria', 'Urbano Rivas'),
(22, 'Daniel', 'Sada Silva'),
(23, 'Maria Elena', 'Gaya Nuño'),
(24, 'Francisco', 'Aguilar Ruiz'),
(25, 'Walter', 'Riso'),
(26, 'Luis', 'Rojas Marcos'),
(27, 'Tony', 'Buzan'),
(28, 'Eric', 'Weiner'),
(29, 'Sofie', 'Laguna'),
(30, 'Ignacio', 'Del Valle '),
(31, 'Andres', 'Trapiello'),
(32, 'Patrick', 'Rothfuss'),
(33, 'Juana', 'Samper'),
(34, 'Maria', 'Dueñas Vinuesa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE IF NOT EXISTS `libros` (
  `isbn` int(13) unsigned NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `cod_autor` int(100) unsigned NOT NULL,
  `genero` text COLLATE utf8_spanish_ci NOT NULL,
  `editorial` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(100) unsigned NOT NULL,
  `stock` int(100) unsigned NOT NULL,
  PRIMARY KEY (`isbn`),
  KEY `cod_autor` (`cod_autor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `libros`
--

INSERT INTO `libros` (`isbn`, `titulo`, `cod_autor`, `genero`, `editorial`, `precio`, `stock`) VALUES
(1234566567, 'COMO CONFECCIONAR NOMINAS Y SEGUROS SOCIALES 2009', 1, 'Economia y finanzas', 'Brunio', 34, 5),
(1234567810, 'CHISTES SOBRE ZAPATERO', 13, 'Humor', 'Styria', 18, 20),
(1234567811, 'TRICORNIO DE GUARDIA', 14, 'Humor', 'Fortiori', 13, 20),
(1234567812, '1001 GAZAPOS PARA MORIRTE DE RISA', 15, 'Humor', 'Fortiori', 21, 8),
(1234567813, 'OCUPADO 2: LECTURAS BREVES PARA EL WC', 16, 'Humor', 'Fortiori', 12, 10),
(1234567814, '100 RECETAS Y MENUS', 17, 'Gastronimia', 'Michelin', 45, 5),
(1234567815, 'POSTRES QUE NO ENGORDAN 2008', 18, 'Gastronimia', 'Michelin', 38, 5),
(1234567816, 'ENSALADAS Y ENTRANTES QUE NO ENGORDAN', 19, 'Gastronimia', 'Michelin', 23, 10),
(1234567817, 'COCINA JAPONESA', 20, 'Gastronimia', 'Barber', 45, 2),
(1234567818, 'GRANADA', 21, 'Viajes', 'Anaya', 15, 5),
(1234567819, 'GUIA DE VIAJE POR LOS BALNEARIOS DE ESPAÑA 2009', 22, 'Viaje', 'Anaya', 21, 10),
(1234567820, 'GUIA DE HOTELES ENCANTADORES POR MENOS DE 85 EUROS 2009', 23, 'Viajes', 'Anaya', 15, 10),
(1234567821, 'CERDEÑA 2009', 24, 'Viajes', 'Anaya', 21, 5),
(1234567822, 'EL CAMINO DE LOS SABIOS ', 25, 'Autoayuda', 'Anaya', 21, 10),
(1234567823, 'CONVIVIR', 26, 'Autoayuda', 'Brunio', 18, 5),
(1234567824, 'TU CEREBRO MÁS JOVEN', 27, 'Autoayuda', 'Planeta', 14, 10),
(1234567825, 'LA GEOGRAFÍA DE LA FELICIDAD', 28, 'Autoayuda', 'Planeta', 18, 2),
(1234567826, 'LLUEVEN RANAS EN LA MANCHA\r\n', 33, 'Novela', 'Espasa', 21, 10),
(1234567827, 'EL NOMBRE DEL VIENTO', 32, 'Novela', 'Plaza', 18, 3),
(1234567828, 'UN PASO EN FALSO ', 29, 'Novela', 'Espasa', 24, 5),
(1234567829, 'LOS DEMONIOS DE BERLÍN\r\n', 30, 'Novela', 'Calpe', 25, 2),
(1234567830, 'LOS CONFINES\r\n', 31, 'Novela', 'Alfados', 25, 5),
(1234567831, 'EL TIEMPO ENTRE COSTURAS', 34, 'Novela', 'Brunio', 21, 3),
(1234567891, 'PARA SALIR DE LA CRISIS GLOBAL: ANALISIS Y SOLUCIONES. PROPUESTAS PARA ESPAÑA Y LATINOAMERICA', 4, 'Economia y finanzas', 'Espasa', 34, 2),
(1234567892, 'EL LIBRO DEL MAC', 5, 'Informatica', 'Planeta', 23, 8),
(1234567893, 'FLASH CS4 PROFESSIONAL', 6, 'Informatica', 'Planeta', 23, 5),
(1234567894, 'ANIMACION Y EFECTOS FLASH Y AFTEREFFECTS', 7, 'Informatica', 'Brunio', 21, 10),
(1234567895, 'APRENDER PHOTOSHOP CS4 CON 100 EJERCICIOS PRACTICOS', 8, 'Informatica', 'Planeta', 20, 10),
(1234567896, 'YOGA: RUTINAS DE YOGA DE 5 MINUTOS PARA CUALQUIER', 9, 'Salud y ocio', 'Blume', 12, 10),
(1234567897, 'EL BEBE EN TUS MANOS', 10, 'Salud y ocio', 'Blume', 20, 10),
(1234567898, 'RADIOLOGIA DE URGENCIAS DE LA A A LA Z (6ª ED.)', 11, 'Salud y ocio', 'Blume', 30, 8),
(1234567899, 'ESTIRAMIENTOS DE CADENAS MUSCULARES: LIBERA TU CUERPO DE TENSIONE S PARA MEJORAR TU SALUD', 12, 'Salud y ocio', 'Blume', 33, 13),
(2345326523, 'COOLHUNTING: COMO DESCUBRIR Y CAZAR TEND..., ', 2, 'Economia y finanzas', 'Anaya', 34, 12),
(3433444545, 'EL MUNDO GROUNDSWELL', 3, 'Economia y finanzas', 'Planeta', 32, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `dni_usu` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `empresa` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `fech_nac` date NOT NULL,
  `calle` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` text COLLATE utf8_spanish_ci NOT NULL,
  `provincia` text COLLATE utf8_spanish_ci NOT NULL,
  `pais` text COLLATE utf8_spanish_ci NOT NULL,
  `cod_post` int(5) NOT NULL,
  `telefono` int(9) NOT NULL,
  `email` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`dni_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni_usu`, `empresa`, `nombre`, `apellido`, `clave`, `fech_nac`, `calle`, `ciudad`, `provincia`, `pais`, `cod_post`, `telefono`, `email`) VALUES
('00000000', 'bebooks', 'admin', 'admin', 'admin', '2009-07-31', '', 'malaga', 'malaga', 'espana', 0, 0, 'bebooks@yahoo.es'),
('21365256', 'Proyecto Gutemberg', 'Juan Carlos', 'Sotera Butragueño', '123123UY', '1945-07-02', '', 'Marbella', 'Malaga', 'España', 29003, 952365214, 'internacional@master'),
('23456312', 'Bauhome', 'Mario', 'Esquivel Pérez', '234512BN', '1974-03-22', '', 'Jaen', 'Jaen', 'España', 48015, 956234523, 'info@bauhome.es'),
('23456781', 'Solimar', 'Daniela', 'Gonzalez Gallego', '245712IP', '1966-07-08', '', 'Madrid', 'Madrid\r\n', 'España', 23452, 952801329, 'info@solimar.es'),
('23880407', 'Master-plan', 'Juan', 'Cruz', '125436LA', '1984-07-02', '', 'Fuengirola', 'Malaga', 'España', 34212, 677164027, 'juancruz@hotmail.com'),
('24563218', 'Rivacosta', 'Luis', 'Leiva Sanchez', '562387SD', '1978-10-24', '', 'Marbella', 'Malaga', 'España', 87291, 952456371, 'info@rivacosta.net'),
('24675354', 'Maya S.L.', 'Josefa', 'Flores', '123', '1985-07-09', 'por ahi piso de arriba puerta de madera', 'Benalmadena', 'Malaga', 'España', 34543, 645342788, 'josefa@yahoo.com'),
('25660787', 'Vertice editorial', 'Eugenio', 'Muñoz Pino', '123', '1970-07-22', '', 'Oviedo', 'Asturias', 'España', 29001, 987182928, 'vega@hotmail.com'),
('27364092', 'Maravillas S.A.', 'Magdalena', 'Muñoz Perez', '125634FS', '1985-02-06', '', 'Oropesa del mar', 'Castellón', 'Valencia', 213652, 958256325, 'info@maravillas.net'),
('34543987', 'Busca Libros S.A.', 'Rodolfo', 'Fernandez', '233431UI', '1984-07-08', '', 'Madrid', 'Madrid', 'España', 23675, 907457432, 'buscalibro@gmail.com'),
('43987167', 'Gibraltar S.A.', 'Valentino', 'Moratinos Rueda', '234345DF', '1984-07-08', '', 'Madrid', 'Madrid', 'España', 23675, 907457432, 'buscalibro@gmail.com'),
('89098345', 'Feral S.A.', 'Fernando', 'Suarez Gil', '123423TG', '1957-09-10', '', 'Torre del mar', 'Malaga', 'España', 23453, 954818092, 'alta@telefonica.net'),
('91920332', 'Xpress-form', 'Silvia', 'Rumasa Conde', '231453OL', '1963-11-03', '', 'Valencia', 'Valencia', 'España', 46253, 968525214, 'xpress@gmail.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `cod_venta` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_vent` date NOT NULL,
  `dni_usu` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `isbn` int(13) unsigned NOT NULL,
  PRIMARY KEY (`cod_venta`),
  KEY `dni_usu` (`dni_usu`,`isbn`),
  KEY `isbn` (`isbn`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`cod_venta`, `fecha_vent`, `dni_usu`, `isbn`) VALUES
(7, '2009-07-20', '23880407', 2345326523),
(8, '2009-07-30', '24675354', 3433444545);

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`cod_autor`) REFERENCES `autores` (`cod_autor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`dni_usu`) REFERENCES `usuarios` (`dni_usu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`isbn`) REFERENCES `libros` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE;
