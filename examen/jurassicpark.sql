-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2020 a las 19:12:08
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jurassicpark`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarIncidente` (IN `u_idLugar` INT(3), IN `u_idIncidente` INT(3))  NO SQL
INSERT INTO incidente_seguridad (idLugar, idIncidente)
VALUES (u_idLugar, u_idIncidente)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarIncidentes` ()  NO SQL
SELECT l.lugar , i.incidente, iseg.fecha
FROM lugar as l, incidente as i, incidente_seguridad as iseg
WHERE l.idLugar = iseg.idLugar AND i.idIncidente = iseg.idIncidente
ORDER BY iseg.fecha DESC$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidente`
--

CREATE TABLE `incidente` (
  `idIncidente` int(3) NOT NULL,
  `incidente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `incidente`
--

INSERT INTO `incidente` (`idIncidente`, `incidente`) VALUES
(1, 'Falla eléctrica'),
(2, 'Fuga de herbívoro'),
(3, 'Fuga de Velociraptors'),
(4, 'Fuga de TRex'),
(5, 'Robo de ADN'),
(6, 'Auto descompuesto'),
(7, 'Visitantes en zona no autorizada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidente_seguridad`
--

CREATE TABLE `incidente_seguridad` (
  `idLugar` int(3) NOT NULL,
  `idIncidente` int(3) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `incidente_seguridad`
--

INSERT INTO `incidente_seguridad` (`idLugar`, `idIncidente`, `fecha`) VALUES
(1, 1, '2020-05-06 15:43:10'),
(2, 4, '2020-05-06 15:43:10'),
(3, 4, '2020-05-06 15:45:47'),
(3, 4, '2020-05-06 16:59:57'),
(10, 7, '2020-05-06 17:00:11'),
(1, 2, '2020-05-06 17:04:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE `lugar` (
  `idLugar` int(3) NOT NULL,
  `lugar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`idLugar`, `lugar`) VALUES
(1, 'Centro turístico'),
(2, 'Laboratorios'),
(3, 'Restaurante'),
(4, 'Centro operativo'),
(5, 'Triceratops'),
(6, 'Dilofosaurios'),
(7, 'Velociraptors'),
(9, 'TRex'),
(10, 'Planicie de los herbívoros');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidente`
--
ALTER TABLE `incidente`
  ADD PRIMARY KEY (`idIncidente`);

--
-- Indices de la tabla `incidente_seguridad`
--
ALTER TABLE `incidente_seguridad`
  ADD KEY `idLugar` (`idLugar`),
  ADD KEY `idIncidente` (`idIncidente`);

--
-- Indices de la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD PRIMARY KEY (`idLugar`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidente`
--
ALTER TABLE `incidente`
  MODIFY `idIncidente` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `lugar`
--
ALTER TABLE `lugar`
  MODIFY `idLugar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidente_seguridad`
--
ALTER TABLE `incidente_seguridad`
  ADD CONSTRAINT `incidente_seguridad_ibfk_1` FOREIGN KEY (`idIncidente`) REFERENCES `incidente` (`idIncidente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `incidente_seguridad_ibfk_2` FOREIGN KEY (`idLugar`) REFERENCES `lugar` (`idLugar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
