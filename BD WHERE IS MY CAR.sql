-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2018 a las 03:05:35
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cars`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cars`
--

CREATE TABLE `cars` (
  `matricula` varchar(7) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cars`
--

INSERT INTO `cars` (`matricula`, `marca`, `modelo`, `color`) VALUES
('8037FPX', 'Seat', 'Ibiza', 'Gris'),
('8042FCB', 'Reanult', 'Laguna', 'Azul'),
('8042FPX', 'Seat', 'Ibiza', 'Negro'),
('8069JCL', 'Fiat', '500', 'Rosa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidents`
--

CREATE TABLE `incidents` (
  `id` int(11) NOT NULL,
  `matricula` varchar(7) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `deposito` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(7) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `incidents`
--

INSERT INTO `incidents` (`id`, `matricula`, `descripcion`, `fecha`, `deposito`, `estado`) VALUES
(128, '8037FPX', 'Robo con fuerza', '2018-03-01', 'Sabadell', 'Abierto'),
(129, '8037FPX', 'Intervenido por Mossos', '2018-03-02', 'Sabadell', 'Abierto'),
(130, '8042FCB', 'Ruedas pinchadas', '2018-02-27', 'Manresa', 'Cerrado'),
(131, '8069JCL', 'Siniestro total', '2018-03-13', 'Sitges', 'Abierto'),
(132, '8042FCB', 'ABCDEFG', '2018-03-18', 'Vic', 'Abierto'),
(133, '8042FCB', 'ABC', '2018-02-01', 'ABC', 'Abierto');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`matricula`);

--
-- Indices de la tabla `incidents`
--
ALTER TABLE `incidents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidents`
--
ALTER TABLE `incidents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
