-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2020 a las 04:29:06
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_carnet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `nombre` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL,
  `correo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `nombre` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL,
  `correo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `programa` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `semestre` int(11) NOT NULL,
  `num_objetos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `nombre_est` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `id_est` int(11) NOT NULL,
  `nombre_obj` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_obj` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objeto`
--

CREATE TABLE `objeto` (
  `nombre` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `objeto`
--
ALTER TABLE `objeto`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `FK_EstudianteObj` (`id_estudiante`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `objeto`
--
ALTER TABLE `objeto`
  ADD CONSTRAINT `FK_EstudianteObj` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
