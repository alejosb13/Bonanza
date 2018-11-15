-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2018 a las 16:03:41
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bonanza`
--
CREATE DATABASE IF NOT EXISTS `bonanza` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `bonanza`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dregistro`
--

CREATE TABLE `dregistro` (
  `id_dregistro` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `numero` int(6) NOT NULL,
  `id_tipo` int(2) NOT NULL,
  `peso` int(4) NOT NULL,
  `pesoa` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dregistro`
--

INSERT INTO `dregistro` (`id_dregistro`, `descripcion`, `numero`, `id_tipo`, `peso`, `pesoa`) VALUES
(5, 'Negro oscuro lucero', 181, 6, 310, 0),
(6, 'negro rabo blanco negro  ', 20, 6, 222, 222),
(7, 'negro bola blanca ', 96, 6, 192, 0),
(8, 'amarillo cola negra', 131, 6, 280, 0),
(9, 'negro amarillo cola negra', 209, 6, 254, 0),
(10, 'rojo cola negra', 173, 6, 344, 0),
(11, 'blanco puro', 228, 6, 304, 0),
(12, 'negro machete pinta blanca', 182, 6, 330, 0),
(13, 'amarillo cola negra', 217, 6, 230, 0),
(14, 'pintao ', 225, 6, 158, 0),
(15, 'negro barriga blanca', 130, 6, 200, 0),
(16, 'pardo cara negra', 6, 5, 354, 354),
(17, 'negro con cacho', 178, 6, 342, 0),
(18, 'rojo cola negra', 212, 5, 380, 0),
(19, 'rojo cuello blanco', 180, 6, 314, 0),
(20, 'negro bola blanca', 210, 6, 244, 0),
(21, 'blanco cola negra', 95, 6, 232, 0),
(22, 'amarillo claro cola negra', 93, 5, 400, 0),
(23, 'blanco ', 221, 6, 124, 0),
(24, 'blanco cola negra', 223, 6, 154, 0),
(25, 'rojo cola negra', 115, 6, 110, 0),
(26, 'amarillo cola egra', 66, 5, 394, 0),
(27, 'rojo blanco pintao', 7771, 1, 360, 0),
(28, 'amarrillo negro lucero', 219, 6, 254, 0),
(29, 'negro barriga blanca -191', 50, 6, 234, 234),
(30, 'rojo ojos negro', 174, 5, 436, 0),
(31, 'amarrillo barriga negra', 215, 6, 234, 0),
(32, 'blanco coreto  ojos negro', 919, 5, 380, 380),
(33, 'blanco cola negra', 214, 6, 150, 0),
(34, 'amarillo cola negra', 208, 6, 194, 0),
(35, 'negro lomo amarillo', 200, 6, 302, 0),
(36, 'pardo corazon', 10, 6, 324, 0),
(37, 'negro voca blanca', 129, 6, 312, 0),
(38, 'chocolate guebo blonco', 106, 6, 214, 0),
(39, 'rojo amarioso', 5, 6, 240, 240),
(40, 'negro horeja blanca ojo vidrio', 216, 6, 160, 0),
(41, 'negro guevo pintao', 224, 6, 152, 0),
(42, 'blaco ojos negro cola negra', 211, 6, 202, 0),
(43, 'negro amorillo cebu', 230, 5, 412, 0),
(44, 'amarillo negro cola negra', 222, 6, 158, 0),
(45, 'pardo papi', 8, 5, 358, 0),
(46, 'blanco cola arilla negra', 97, 6, 198, 0),
(47, 'blanco cola negra con cacho', 68, 6, 210, 0),
(48, 'amarrillo blanco careto', 444, 1, 410, 0),
(49, 'amarillo cola negra', 226, 6, 184, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id_login` int(3) UNSIGNED NOT NULL,
  `user` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_login`, `user`, `pass`) VALUES
(1, 'rafa', 'administrador'),
(2, 'admin', 'alejo'),
(3, 'polanco', 'carmen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `papelera`
--

CREATE TABLE `papelera` (
  `id_papelera` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(22) COLLATE utf8_spanish_ci NOT NULL,
  `numero` int(6) NOT NULL,
  `tipo` int(2) NOT NULL,
  `status` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `user` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(2) NOT NULL,
  `Detalle` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `Detalle`) VALUES
(1, 'Toro'),
(2, 'Vaca Parida'),
(3, 'Vaca Escotera'),
(4, 'Novilla'),
(5, 'Novillo'),
(6, 'Maute'),
(7, 'Mauta'),
(8, 'Becerro'),
(9, 'Becerra');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dregistro`
--
ALTER TABLE `dregistro`
  ADD PRIMARY KEY (`id_dregistro`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indices de la tabla `papelera`
--
ALTER TABLE `papelera`
  ADD PRIMARY KEY (`id_papelera`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dregistro`
--
ALTER TABLE `dregistro`
  MODIFY `id_dregistro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `papelera`
--
ALTER TABLE `papelera`
  MODIFY `id_papelera` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dregistro`
--
ALTER TABLE `dregistro`
  ADD CONSTRAINT `dregistro_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
