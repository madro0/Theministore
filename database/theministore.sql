-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2018 a las 11:08:30
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `theministore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_bill` char(7) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `date_bill` date NOT NULL,
  `subtotal` float NOT NULL,
  `iva` float NOT NULL,
  `total` float NOT NULL,
  `amount_to_pay` float NOT NULL,
  `residue` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_venta`
--

CREATE TABLE `lista_venta` (
  `cod_lista_venta` int(11) NOT NULL,
  `cod_product` char(6) COLLATE utf8_spanish_ci NOT NULL,
  `cant_pro` int(11) NOT NULL,
  `valor_pro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `cod_product` char(6) COLLATE utf8_spanish_ci NOT NULL,
  `name_product` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `amount_product` int(11) NOT NULL,
  `unit_value` float NOT NULL,
  `cod_provider` char(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`cod_product`, `name_product`, `amount_product`, `unit_value`, `cod_provider`) VALUES
('100', 'Peluca', 100, 40, '2000'),
('1008', 'd', 0, 5, '2000'),
('101', 'Lapicero negro', 20, 500, '13420'),
('109', 'daniel', 4, 6, '13420'),
('123', 'Papa rellena', 15, 1000, '10000'),
('199', 'des', 7, 6, '10000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `cod_provider` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `name_provider` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `business` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`cod_provider`, `name_provider`, `business`, `phone`) VALUES
('10000', 'Luis Benavides', 'Margarita', '142312523'),
('13420', 'Ana LÃ³pez', 'Norma', '542434643'),
('2000', 'Daniel Goyes', 'Nestle', '125321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuarios`
--

CREATE TABLE `tipo_usuarios` (
  `cod_type_user` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `name_type_user` varchar(24) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`cod_type_user`, `name_type_user`) VALUES
('1', 'Administrador'),
('2', 'Cliente'),
('3', 'Cliente (No registrado)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cedula` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `name_lastname` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pass` varchar(15) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'notregistered',
  `type_user` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `name_lastname`, `phone`, `pass`, `type_user`) VALUES
('00000', 'Iván Narváez', '1234567', '00000', '1'),
('021', 'ñeroto', '12345', 'admin', '2'),
('11111', 'daniel', 'admin', 'admin', '2'),
('123', 'go', '12345', '123', '2'),
('12345', 'Daniel Madroñero', '7654321', 'admin', '1'),
('123456789', 'Juan Bautista', '123456789', '123456789', '2'),
('54321', 'Luis López', '0', '12345', '1'),
('dsa', 'fd', '12345', 'admin', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `cod_product` char(6) COLLATE utf8_spanish_ci NOT NULL,
  `id_bill` char(7) COLLATE utf8_spanish_ci NOT NULL,
  `name_product` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `amount_to_buy` int(11) NOT NULL,
  `total_value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_bill`);

--
-- Indices de la tabla `lista_venta`
--
ALTER TABLE `lista_venta`
  ADD PRIMARY KEY (`cod_lista_venta`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`cod_product`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`cod_provider`);

--
-- Indices de la tabla `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  ADD PRIMARY KEY (`cod_type_user`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`cod_product`,`id_bill`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lista_venta`
--
ALTER TABLE `lista_venta`
  MODIFY `cod_lista_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lista_venta`
--
ALTER TABLE `lista_venta`
  ADD CONSTRAINT `fk_lista_venta_productos` FOREIGN KEY (`cod_product`) REFERENCES `productos` (`cod_product`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
