-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-11-2023 a las 16:44:00
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `virtualmarket`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idUnico` varchar(50) NOT NULL,
  `dniCliente` varchar(10) DEFAULT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT 1,
  `time_` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `dniCliente` varchar(9) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `email` varchar(75) NOT NULL,
  `pwd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`dniCliente`, `nombre`, `direccion`, `email`, `pwd`) VALUES
('11111111A', 'Gabriel Enguidanos', ' C/*Progreso, nº3, pt21', 'gabriel@gmail.com', '$2y$10$wmvjnpPO91/GBFDXoX1CmO3Asn0PjajRdYlVFjD1l7bySz0rKWld6'),
('21702708T', 'Gabriel Enguidanos', 'calle false', 'gabrielenguidanos21@gmail.com', '$2y$10$zF8NbfcXxTRry9uUIs2csO6GC.oG7KQ02syHcUfFhReOQexxnUVpy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineaspedidos`
--

CREATE TABLE `lineaspedidos` (
  `idPedido` int(4) NOT NULL,
  `nlinea` int(2) NOT NULL,
  `idProducto` int(6) DEFAULT NULL,
  `cantidad` int(3) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `dirEntrega` varchar(50) NOT NULL,
  `nTarjeta` varchar(50) DEFAULT NULL,
  `fechaCaducidad` date DEFAULT NULL,
  `matriculaRepartidor` varchar(8) DEFAULT NULL,
  `dniCliente` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(6) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `origen` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `unidades` int(5) NOT NULL,
  `volumen` int(4) DEFAULT NULL,
  `precio` int(4) DEFAULT NULL,
  `tipo` enum('humbucker','p90','single coil') DEFAULT NULL,
  `descripcion` tinytext NOT NULL DEFAULT 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimtur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombre`, `origen`, `foto`, `unidades`, `volumen`, `precio`, `tipo`, `descripcion`) VALUES
(1, 'GabMann Original PAF', 'UK', '../images/hum2.png', 100, 10, 160, 'humbucker', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimtur'),
(2, 'Gabmann \'59', 'UK', '../images/hum1.png', 100, 10, 145, 'humbucker', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimtur'),
(3, 'Gabmann P-90 Vintage', 'UK', '../images/p901.png', 100, 10, 136, 'p90', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimtur'),
(4, 'GabMann No-hum P-90 N', 'UK', '../images/p902.png', 100, 10, 152, 'p90', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimtur'),
(5, 'Original \'54 Strat N', 'UK', '../images/single.png', 100, 10, 115, 'single coil', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimtur'),
(6, 'Original \'54 B', 'UK', '../images/single.png', 100, 10, 119, 'single coil', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimtur'),
(7, 'GabMann No-hum P-90 B', 'UK', '../images/p903.png', 100, 10, 156, 'p90', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimtur'),
(8, 'Modern Noiseless Strat Set', 'UK', '../images/set.png', 100, 10, 245, 'single coil', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimtur'),
(9, 'Humbucker Sized P-90', 'UK', '../images/hum3.png', 100, 10, 130, 'humbucker', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimtur');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idUnico`,`time_`),
  ADD UNIQUE KEY `time_` (`time_`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`dniCliente`);

--
-- Indices de la tabla `lineaspedidos`
--
ALTER TABLE `lineaspedidos`
  ADD PRIMARY KEY (`idPedido`,`nlinea`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
