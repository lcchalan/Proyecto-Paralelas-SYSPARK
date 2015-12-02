-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2015 a las 10:03:56
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `syspark`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
`CedulaAdmin` int(11) NOT NULL,
  `NombreAdmin` varchar(50) COLLATE utf8_bin NOT NULL,
  `ApellidoAdmin` varchar(50) COLLATE utf8_bin NOT NULL,
  `TelefonoAdmin` int(11) NOT NULL,
  `CorreoAdmin` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `ClaveAdmin` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1104848168 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`CedulaAdmin`, `NombreAdmin`, `ApellidoAdmin`, `TelefonoAdmin`, `CorreoAdmin`, `ClaveAdmin`) VALUES
(231, 'dadsa', 'sddsa', 322, 'dasa', 'dasdasdas'),
(1234, 'Alcides', 'Toledo', 3131, 'FSFSD@DASFS.COM', '1234'),
(312312, 'eqwqqe', 'eqewqe', 3131, 'FSFSD@DASFS.COM', 'asdsfsd'),
(1104848167, 'Darwin', 'Guajala', 2541522, 'daguajala@utpl.edu.ec', 'daguajala07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parqueadero`
--

CREATE TABLE IF NOT EXISTS `parqueadero` (
`IdParqueadero` int(11) NOT NULL,
  `NombreParqueadero` varchar(50) COLLATE utf8_bin NOT NULL,
  `DireccionParqueadero` varchar(100) COLLATE utf8_bin NOT NULL,
  `NumeroPlazas` int(11) NOT NULL,
  `TelefonoParqueadero` int(11) NOT NULL,
  `LatitudParqueadero` varchar(20) COLLATE utf8_bin NOT NULL,
  `LogitudParqueadero` varchar(20) COLLATE utf8_bin NOT NULL,
  `CosteParqueadero` int(11) NOT NULL,
  `SimpleParqueadero` int(11) NOT NULL,
  `CubiertoParqueadero` int(11) NOT NULL,
  `CedulaAdmin` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `parqueadero`
--

INSERT INTO `parqueadero` (`IdParqueadero`, `NombreParqueadero`, `DireccionParqueadero`, `NumeroPlazas`, `TelefonoParqueadero`, `LatitudParqueadero`, `LogitudParqueadero`, `CosteParqueadero`, `SimpleParqueadero`, `CubiertoParqueadero`, `CedulaAdmin`) VALUES
(1, 'Don Juan', 'ni idea', 34, 242, '-3.997328', '-79.20586', 32, 23, 23, 1104848167);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestosestacionamiento`
--

CREATE TABLE IF NOT EXISTS `puestosestacionamiento` (
`IdUbicacion` int(11) NOT NULL,
  `NombreUbicacion` varchar(45) COLLATE utf8_bin NOT NULL,
  `EstadoUbicacion` varchar(45) COLLATE utf8_bin NOT NULL,
  `IdParqueadero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
 ADD PRIMARY KEY (`CedulaAdmin`);

--
-- Indices de la tabla `parqueadero`
--
ALTER TABLE `parqueadero`
 ADD PRIMARY KEY (`IdParqueadero`), ADD KEY `CedulaAdmin` (`CedulaAdmin`);

--
-- Indices de la tabla `puestosestacionamiento`
--
ALTER TABLE `puestosestacionamiento`
 ADD PRIMARY KEY (`IdUbicacion`), ADD KEY `IdParqueadero` (`IdParqueadero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
MODIFY `CedulaAdmin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1104848168;
--
-- AUTO_INCREMENT de la tabla `parqueadero`
--
ALTER TABLE `parqueadero`
MODIFY `IdParqueadero` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `puestosestacionamiento`
--
ALTER TABLE `puestosestacionamiento`
MODIFY `IdUbicacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `parqueadero`
--
ALTER TABLE `parqueadero`
ADD CONSTRAINT `CedulaAdmin` FOREIGN KEY (`CedulaAdmin`) REFERENCES `administrador` (`CedulaAdmin`);

--
-- Filtros para la tabla `puestosestacionamiento`
--
ALTER TABLE `puestosestacionamiento`
ADD CONSTRAINT `IdParqueadero` FOREIGN KEY (`IdParqueadero`) REFERENCES `parqueadero` (`IdParqueadero`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
