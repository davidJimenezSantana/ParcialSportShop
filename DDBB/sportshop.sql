-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2021 a las 08:52:32
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sportshop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`) VALUES
(1, 'Calzado'),
(2, 'Ropa'),
(3, 'Accesorios'),
(4, 'Deporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `precio` varchar(45) NOT NULL,
  `talla_idtalla` int(11) DEFAULT NULL,
  `categoria_idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `nombre`, `precio`, `talla_idtalla`, `categoria_idcategoria`) VALUES
(3, 'MORAL POWER', '188900', NULL, 3),
(5, 'BALÓN PRO GOLD GOLTY', '112000', NULL, 4),
(6, 'CINTURÓN DE LEVANTAMIENTO DE PESAS SARED', '589000', NULL, 3),
(7, 'ESCALERA RÁPIDA DE AGILIDAD SPORTIVAR', '27900', NULL, 4),
(8, 'MANCUERNA ENCAUCHETADA 4LB. DE SPORTFITNESS', '24900', NULL, 4),
(9, 'SACO DE BOXEO POWERCORE EVERLAST', '244900', NULL, 4),
(10, 'ZAPATILLAS MICROFÚTBOL AS COLOMBIA BLANCAS', '99900', NULL, 1),
(11, 'ZAPATILLAS MICROFÚTBOL AS COLOMBIA AZULES', '99900', NULL, 1),
(12, 'PATINES SEMIPROFESIONALES COUGAR MZS301', '188900', NULL, 1),
(13, 'CAMISETA OFICIAL SELECCIÓN COLOMBIA (HOMBRE)', '90900', 7, 2),
(88, 'MOCHILA AIR', '60000', 1, 3),
(89, 'MOCHILA AIR', '60000', 1, 3),
(90, 'MEDIAS PATINAJE', '10000', 3, 2),
(91, 'BARRA MULTIFUNCIONAL PARA DOMINADA', '79000', 1, 4),
(92, 'TENIS SKATE', '120000', 1, 1),
(93, 'TABLA SKATE', '190000', 1, 3),
(94, 'GUANTES PESAS', '25000', 5, 3),
(95, 'CAMISETA INTERIOR DE ESQUÍ ', '40000', 3, 2),
(96, 'MANCUERNAS 20KL', '25555', 1, 4),
(97, 'GUAYOS ADIDAS PERFORMANCE', '200000', NULL, 1),
(98, 'CAMISETA UNDER', '60000', 5, 2),
(99, 'ZAPATILLA CICLISMO', '180000', NULL, 1),
(100, 'LUZ TRASERA GW T05', '36000', NULL, 3),
(101, 'CUELLO BIKER', '30000', 7, 3),
(102, 'CHAQUETA COLUMBIA', '200000', 3, 2),
(103, 'CHAQUETA ADIDAS', '140000', 7, 2),
(104, 'CHAQUETA BELIFE', '90000', 6, 2),
(105, 'PANTALONETA UNDER', '60000', 5, 2),
(106, 'TENNIS REEBOK CLASSICS', '220000', NULL, 1),
(107, 'PANTALON NIKE', '160000', 4, 2),
(108, 'SHORT UNDER ARMOUR', '75000', 4, 2),
(109, 'GORRA NIKE', '57000', NULL, 3),
(110, 'CAMISETA NIKE', '80000', NULL, 2),
(111, 'GUANTES DE FUTBOL NIKE', '65000', 6, 3),
(112, 'GUAYOS NIKE PHANTOM', '230000', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla`
--

CREATE TABLE `talla` (
  `idtalla` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `talla`
--

INSERT INTO `talla` (`idtalla`, `nombre`) VALUES
(1, 'XXXS'),
(2, 'XXS'),
(3, 'XS'),
(4, 'S'),
(5, 'M'),
(6, 'L'),
(7, 'XL'),
(8, 'XXL'),
(9, 'XXXL');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `fk_producto_talla_idx` (`talla_idtalla`),
  ADD KEY `fk_producto_categoria1_idx` (`categoria_idcategoria`);

--
-- Indices de la tabla `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`idtalla`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `talla`
--
ALTER TABLE `talla`
  MODIFY `idtalla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria1` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_talla` FOREIGN KEY (`talla_idtalla`) REFERENCES `talla` (`idtalla`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
