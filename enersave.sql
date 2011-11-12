-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2011 a las 16:46:59
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `enersave`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `censuses`
--

CREATE TABLE IF NOT EXISTS `censuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `censuses`
--

INSERT INTO `censuses` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Censo 2011/10/31', '2011-11-01 04:13:14', '2011-11-01 04:13:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `census_details`
--

CREATE TABLE IF NOT EXISTS `census_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `census_id` int(11) NOT NULL,
  `equipement_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `power` double NOT NULL,
  `hours_per_day` double NOT NULL,
  `days_per_month` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `census_details`
--

INSERT INTO `census_details` (`id`, `census_id`, `equipement_id`, `quantity`, `power`, `hours_per_day`, `days_per_month`) VALUES
(2, 1, 1, 3, 37.3, 20, 30),
(3, 1, 2, 3, 150, 20, 30),
(4, 1, 3, 1, 8.95, 24, 30),
(5, 1, 4, 1, 2.69, 1.5, 30),
(6, 1, 18, 1, 2.24, 24, 22),
(7, 1, 78, 1, 4.92, 1.5, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipements`
--

CREATE TABLE IF NOT EXISTS `equipements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=79 ;

--
-- Volcado de datos para la tabla `equipements`
--

INSERT INTO `equipements` (`id`, `location_id`, `name`) VALUES
(1, 1, 'Compresores Reciprocantes'),
(2, 1, 'Compresores de Tornillo'),
(3, 1, 'Bomba Agua Enfriamiento Compresores'),
(4, 1, 'Bomba de Descongelamiento Cámaras '),
(5, 1, 'Bomba Tanque Condensado '),
(6, 1, 'Ventilador Tiro Forzado Caldera '),
(7, 1, 'Compresor de Aire'),
(8, 1, 'Ventiladores Túneles'),
(9, 1, 'Ventiladores Cámaras'),
(10, 1, 'Bomba Amoniaco'),
(11, 1, 'Condensador Evaporativo No 1'),
(12, 1, 'Condensador Evaporativo No 2'),
(13, 1, 'Condensador Evaporativo No 3'),
(14, 1, 'Bomba Agua Condensador Evaporativo No 1'),
(15, 1, 'Bomba Agua Condensador Evaporativo No 2'),
(16, 1, 'Bomba Agua Condensador Evaporativo No 3'),
(17, 1, 'Extractores'),
(18, 2, 'Puente Grua'),
(19, 2, 'Volteador de Tinas'),
(20, 2, 'Motor sierra sin fin - corte de atún'),
(21, 2, 'Bomba de recirculacion pequeña - piscina'),
(22, 2, 'Bomba de recirculacion grande - piscina'),
(23, 2, 'Difusores de Nebulizacion'),
(24, 2, 'Extractores sala de cocina'),
(25, 3, 'Tornillo sin fin Scrap'),
(26, 3, 'Banda Transportadora'),
(27, 3, 'Selladoras de Bolsas'),
(28, 3, 'Selladoras de Bolsas'),
(29, 3, 'Máquiina codificadora'),
(30, 4, 'Máquina Llenadoras'),
(31, 4, 'Máquina Cerradora Continental'),
(32, 4, 'Máquina Cerradora Angelus 40P'),
(33, 4, 'Máquina Enlatadora Lata 4 lb'),
(34, 4, 'Banda Transportadora Lata 4 lb'),
(35, 4, 'Bomba Dosificadora'),
(36, 4, 'Lavador de Latas'),
(37, 4, 'Ascensor Magnetico'),
(38, 4, 'Descensor Magnetico'),
(39, 4, 'Bombas Lavadoras'),
(40, 4, 'Bombas Lavadoras Recirculación'),
(41, 5, 'Volteo carga latas'),
(42, 5, 'Tornamesa'),
(43, 5, 'Banda Transportadora'),
(44, 5, 'Ascensor Magnetico'),
(45, 5, 'Banda Transportadora'),
(46, 5, 'Máquina Etiqueteadora'),
(47, 5, 'Banda Transportadora'),
(48, 5, 'Encajetadora Motor 1'),
(49, 5, 'Encajetadora Motor 2'),
(50, 5, 'Engomadora'),
(51, 5, 'Extractores sala de etiqueteo'),
(52, 5, 'Tunel termoencogido - Etiqueteo oferta'),
(53, 6, 'Bomba Suministro Agua Autoclaves'),
(54, 6, 'Bomba Desagüe Autoclaves'),
(55, 6, 'Bomba autoclaves'),
(56, 6, 'Bomba grande autoclaves'),
(57, 7, 'Volteador de scrap'),
(58, 7, 'Tornillo sin fin'),
(59, 7, 'Dosificador'),
(60, 7, 'Agitador tolva'),
(61, 7, 'Cocinador velocidad variable'),
(62, 7, 'Transportadora No 5'),
(63, 7, 'Prensa'),
(64, 7, 'Transportadora No 7'),
(65, 7, 'Molino No 1'),
(66, 7, 'Transportadora No 9'),
(67, 7, 'VTF Horno Rotativo'),
(68, 7, 'Motor Horno Rotativo'),
(69, 7, 'Blower Harina'),
(70, 7, 'Salida Horno Rotativo'),
(71, 7, 'Válvula Rotativa'),
(72, 7, 'Transportadora No 13'),
(73, 7, 'Molino No 2'),
(74, 7, 'Transportadora No 15'),
(75, 7, 'Planta aceite de pescado'),
(76, 7, 'Bomba No 1. Aceite'),
(77, 8, 'Contenedor de Almacenamiento - Lomos'),
(78, 1, 'Bomba de Descongelamiento Túneles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `locations`
--

INSERT INTO `locations` (`id`, `name`) VALUES
(1, 'Sala de Máquinas'),
(2, 'Sala de Cocina'),
(3, 'Sala de Procesos'),
(4, 'Enlatados'),
(5, 'Etiquetados'),
(6, 'Autoclave'),
(7, 'Planta de Harina'),
(8, 'Contenedores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `processes`
--

CREATE TABLE IF NOT EXISTS `processes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `comment` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `processes`
--

INSERT INTO `processes` (`id`, `name`, `comment`) VALUES
(1, 'Cámaras de Enfriamiento', ''),
(2, 'Preparación y Comida', 'hasta nebulización'),
(3, 'Lonjas', ''),
(4, 'Latas', 'hasta cuarentena'),
(5, 'Etiqueteo', ''),
(6, 'Planta de Harina', ''),
(7, 'Congelamiento en Túneles', 'hasta contenedores'),
(8, 'Atún en Contenedores', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `process_rates`
--

CREATE TABLE IF NOT EXISTS `process_rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `process_id` int(11) NOT NULL,
  `equipement_id` int(11) NOT NULL,
  `rate` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `process_rates`
--

INSERT INTO `process_rates` (`id`, `process_id`, `equipement_id`, `rate`) VALUES
(1, 3, 26, 0.6666),
(2, 4, 26, 0.3333);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `process_id` int(11) NOT NULL,
  `entry_weekday` int(11) NOT NULL,
  `proc_weekday` int(11) NOT NULL,
  `proc_hour_start` int(11) NOT NULL,
  `proc_hour_end` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=71 ;

--
-- Volcado de datos para la tabla `schedules`
--

INSERT INTO `schedules` (`id`, `process_id`, `entry_weekday`, `proc_weekday`, `proc_hour_start`, `proc_hour_end`) VALUES
(1, 1, 7, 7, 4, 23),
(2, 2, 7, 7, 4, 23),
(3, 2, 7, 1, 0, 14),
(4, 2, 1, 1, 4, 23),
(5, 2, 1, 2, 0, 14),
(6, 2, 2, 2, 4, 23),
(7, 2, 2, 3, 0, 14),
(8, 2, 3, 3, 4, 23),
(9, 2, 3, 4, 0, 14),
(10, 2, 4, 4, 4, 23),
(11, 2, 4, 5, 0, 14),
(12, 3, 7, 1, 7, 11),
(13, 3, 7, 1, 13, 17),
(14, 3, 1, 2, 7, 11),
(15, 3, 1, 2, 13, 17),
(16, 3, 2, 3, 7, 11),
(17, 3, 2, 3, 13, 17),
(18, 3, 3, 4, 7, 11),
(19, 3, 3, 4, 13, 17),
(20, 3, 4, 5, 7, 11),
(21, 3, 4, 5, 13, 17),
(22, 4, 7, 1, 7, 11),
(23, 4, 7, 1, 13, 19),
(24, 4, 1, 2, 7, 11),
(25, 4, 1, 2, 13, 19),
(26, 4, 2, 3, 7, 11),
(27, 4, 2, 3, 13, 19),
(28, 4, 3, 4, 7, 11),
(29, 4, 3, 4, 13, 19),
(30, 4, 4, 5, 7, 11),
(31, 4, 4, 5, 13, 19),
(32, 8, 7, 1, 9, 23),
(33, 8, 1, 2, 9, 23),
(34, 8, 2, 3, 9, 23),
(35, 8, 3, 4, 9, 23),
(36, 8, 4, 5, 9, 23),
(37, 5, 7, 1, 16, 22),
(38, 5, 7, 2, 7, 11),
(39, 5, 7, 2, 13, 15),
(40, 5, 1, 2, 16, 22),
(41, 5, 1, 3, 7, 11),
(42, 5, 1, 3, 13, 15),
(43, 5, 2, 3, 16, 22),
(44, 5, 2, 4, 7, 11),
(45, 5, 2, 4, 13, 15),
(46, 5, 3, 4, 16, 22),
(47, 5, 3, 5, 7, 11),
(48, 5, 3, 5, 13, 15),
(49, 5, 4, 5, 16, 22),
(50, 5, 4, 6, 7, 11),
(51, 5, 4, 6, 13, 15),
(52, 6, 7, 1, 9, 12),
(53, 6, 7, 1, 14, 17),
(54, 6, 1, 2, 9, 12),
(55, 6, 1, 2, 14, 17),
(56, 6, 2, 3, 9, 12),
(57, 6, 2, 3, 14, 17),
(58, 6, 3, 4, 9, 12),
(59, 6, 3, 4, 14, 17),
(60, 6, 4, 5, 9, 12),
(61, 6, 4, 5, 14, 17),
(62, 7, 7, 1, 9, 23),
(63, 7, 7, 2, 0, 14),
(64, 7, 1, 2, 9, 23),
(65, 7, 1, 3, 0, 14),
(66, 7, 2, 3, 9, 23),
(67, 7, 2, 4, 0, 14),
(68, 7, 3, 4, 9, 23),
(69, 7, 3, 5, 7, 14),
(70, 7, 4, 5, 9, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `weekdays`
--

CREATE TABLE IF NOT EXISTS `weekdays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `weekdays`
--

INSERT INTO `weekdays` (`id`, `name`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miércoles'),
(4, 'Jueves'),
(5, 'Viernes'),
(6, 'Sábado'),
(7, 'Domingo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
