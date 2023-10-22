-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2023 a las 20:45:18
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pt04_benito_martinez`
--
DROP DATABASE IF EXISTS pt04_benito_martinez;
CREATE DATABASE IF NOT EXISTS `pt04_benito_martinez` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pt04_benito_martinez`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` text DEFAULT NULL,
  `usuari_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_ibfk_1` (`usuari_id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `article`, `usuari_id`) VALUES
(2, 'Article2', NULL),
(3, 'Article3', NULL),
(4, 'Article4', NULL),
(5, 'Article5', NULL),
(6, 'Article6', NULL),
(7, 'Article7', NULL),
(8, 'Article8', NULL),
(9, 'Article9', 9),
(10, 'Article10', NULL),
(11, 'Article11', NULL),
(12, 'Article12', NULL),
(13, 'Article13', NULL),
(14, 'Article14', NULL),
(15, 'Article15', NULL),
(16, 'Article16', NULL),
(17, 'Article17', NULL),
(18, 'Article18', NULL),
(19, 'Article19', NULL),
(20, 'Article20', 8),
(51, 'asa', 11),
(52, 'articulo de alex2', 11),
(54, 'default', 11),
(55, 'articulo de alex mentiar', 11),
(56, 'Articulo generado', 11),
(57, 'Articulo generado', 11),
(63, 'modificado', 10),
(65, 'Articulo generado23', 10),
(66, 'Articulo generado23', 10),
(67, 'Articulo generado23', 10),
(68, 'Articulo generado23', 10),
(69, 'Articulo generado23', 10),
(70, 'Articulo generado23', 10),
(71, 'Articulo generado23', 10),
(72, 'Articulo generado23', 10),
(74, 'articulo de alex1', 10),
(75, 'articulo de alex1', 10),
(76, 'articulo de alex1', 10),
(77, 'articulo de alex234', 10),
(79, 'articulo de alex22', 10),
(83, 'a', 12),
(87, 'asd', 13),
(88, 'generat', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

DROP TABLE IF EXISTS `usuaris`;
CREATE TABLE IF NOT EXISTS `usuaris` (
  `usuari` text NOT NULL,
  `email` text NOT NULL,
  `contrasenya` text NOT NULL,
  `usuari_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`usuari_id`),
  UNIQUE KEY `usuari` (`usuari`) USING HASH,
  UNIQUE KEY `email` (`email`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`usuari`, `email`, `contrasenya`, `usuari_id`) VALUES
('Benitomf17', 'b.martinez2@sapalomera.cat', '1234', 8),
('Alberto', 'mondongo@gmail.com', '12', 9),
('Marc', 'marc@gmail.com', '$2y$10$.PI55qx5fTieTCLj8L5t.eCHJAjzXDep81Kan6paNMgMHTqgWs2I.', 10),
('alex', 'alex@gmail.com', '$2y$10$bs8/krtiXOdo.RArpma1gully/rfMyG6QgZnkC5oJAZe3KrXcmraC', 11),
('usuari1', 'usuari@gmail.com', '$2y$10$0rsIY2INg225pTwejQV13OfK7RO19sh6OeuUq4rB1PhkLMabbzZmu', 12),
('mama', 'mama@gmail.com', '$2y$10$SI2wmCIBxvuX7Aa/aw6Lqu3csKJugg6f1bpPv9XRjO8PhRPCBWjW.', 13),
('Marc1', 'marc1@gmail.com', '$2y$10$8rdsL3ojBGuBdphhjfiCbuNrKnHfA6Sl3xA8JU84GWF8Maum8QXGu', 14),
('BENITO', 'benito@gmail.com', '$2y$10$OD6Gql567CnVezOQrKH.d.9b1ZE8hOlcOvPaQxxOyLLOQjUUGPpli', 15);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`usuari_id`) REFERENCES `usuaris` (`usuari_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
