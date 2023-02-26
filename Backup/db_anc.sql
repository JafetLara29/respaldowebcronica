-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3702
-- Tiempo de generación: 09-07-2022 a las 02:31:30
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_anc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbad`
--

CREATE TABLE `tbad` (
  `id` int(6) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcategory`
--

CREATE TABLE `tbcategory` (
  `id` int(3) NOT NULL,
  `name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbjournalist`
--

CREATE TABLE `tbjournalist` (
  `id_journalist` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `id_user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbnew`
--

CREATE TABLE `tbnew` (
  `id` int(10) NOT NULL,
  `id_category` int(3) NOT NULL,
  `id_journalist` int(3) NOT NULL,
  `title` varchar(300) NOT NULL,
  `bajadilla` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `file` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `state` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsubscriber`
--

CREATE TABLE `tbsubscriber` (
  `id` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `state` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbuser`
--

CREATE TABLE `tbuser` (
  `id_user` int(3) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbuser`
--

INSERT INTO `tbuser` (`id_user`, `user_name`, `password`, `type_user`) VALUES
(1, 'cronica_master', 'master', 'master');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbad`
--
ALTER TABLE `tbad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbcategory`
--
ALTER TABLE `tbcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbjournalist`
--
ALTER TABLE `tbjournalist`
  ADD PRIMARY KEY (`id_journalist`);

--
-- Indices de la tabla `tbnew`
--
ALTER TABLE `tbnew`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbsubscriber`
--
ALTER TABLE `tbsubscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbad`
--
ALTER TABLE `tbad`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbjournalist`
--
ALTER TABLE `tbjournalist`
  MODIFY `id_journalist` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbnew`
--
ALTER TABLE `tbnew`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbsubscriber`
--
ALTER TABLE `tbsubscriber`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
