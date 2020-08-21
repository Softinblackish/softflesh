-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-08-2020 a las 07:02:39
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `softflesh`
--
Create database Probando;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tbl_articulos`
--

CREATE TABLE Probando.tbl_articulos (
  `id_articulo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `referencia` varchar(150) NOT NULL,
  `codigo_barra` varchar(200) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `almacen` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `creado_por` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cantidad_actual` int(6) NOT NULL,
  `cantidad_disponible` int(6) NOT NULL,
  `fecha_modificacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cod_impuestos`
--

CREATE TABLE Probando.tbl_cod_impuestos (
  `id_cod_impuesto` int(11) NOT NULL,
  `nom_codigo` varchar(100) NOT NULL,
  `porciento` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_compras`
--

CREATE TABLE Probando.tbl_compras (
  `id_compra` int(11) NOT NULL,
  `suplidor` varchar(200) NOT NULL,
  `comprobante` varchar(50) NOT NULL,
  `cod_impuesto` varchar(50) NOT NULL,
  `forma_pago` varchar(50) NOT NULL,
  `moneda` varchar(50) NOT NULL,
  `entregar_a` varchar(200) NOT NULL,
  `nota` varchar(300) NOT NULL,
  `fecha_orden` varchar(100) NOT NULL,
  `condicion_pago` varchar(100) NOT NULL,
  `valor_impuestos` int(11) NOT NULL,
  `sin_impuestos` int(11) NOT NULL,
  `valor_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_det_compras`
--

CREATE TABLE Probando.tbl_det_compras (
  `id_det_compra` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `cod_articulo` varchar(50) NOT NULL,
  `nom_articulo` varchar(100) NOT NULL,
  `cantidad` float NOT NULL,
  `itbis` float NOT NULL,
  `valor` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tmp_compras`
--

CREATE TABLE Probando.tbl_tmp_compras (
  `id` int(10) NOT NULL,
  `tmp_id_compra` int(100) NOT NULL,
  `cod_articulo` varchar(50) NOT NULL,
  `articulo` varchar(200) NOT NULL,
  `cantidad` int(6) NOT NULL,
  `itbis` float NOT NULL,
  `valor` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE Probando.tbl_usuario (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `contraseña_usuario` varchar(100) NOT NULL,
  `rol_usuario` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_articulos`
--
ALTER TABLE `tbl_articulos`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `tbl_cod_impuestos`
--
ALTER TABLE `tbl_cod_impuestos`
  ADD PRIMARY KEY (`id_cod_impuesto`);

--
-- Indices de la tabla `tbl_compras`
--
ALTER TABLE `tbl_compras`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `tbl_det_compras`
--
ALTER TABLE `tbl_det_compras`
  ADD PRIMARY KEY (`id_det_compra`);

--
-- Indices de la tabla `tbl_tmp_compras`
--
ALTER TABLE `tbl_tmp_compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tmp_id_compra` (`tmp_id_compra`) USING BTREE;

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_articulos`
--
ALTER TABLE `tbl_articulos`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tbl_cod_impuestos`
--
ALTER TABLE `tbl_cod_impuestos`
  MODIFY `id_cod_impuesto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_compras`
--
ALTER TABLE `tbl_compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `tbl_det_compras`
--
ALTER TABLE `tbl_det_compras`
  MODIFY `id_det_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `tbl_tmp_compras`
--
ALTER TABLE `tbl_tmp_compras`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
