-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-08-2020 a las 07:01:38
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_articulos`
--

CREATE TABLE `tbl_articulos` (
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

--
-- Volcado de datos para la tabla `tbl_articulos`
--

INSERT INTO `tbl_articulos` (`id_articulo`, `nombre`, `descripcion`, `codigo`, `referencia`, `codigo_barra`, `categoria`, `almacen`, `status`, `creado_por`, `fecha_creacion`, `cantidad_actual`, `cantidad_disponible`, `fecha_modificacion`) VALUES
(1, 'gorra888888', 'Agregando categoria', '', '', '', 'Electricos.', '01-Santiago', '', '', '2020-06-17 01:38:46', 0, 0, ''),
(3, 'gorra', 'gorra azul de lakers', '00-0001', '', '', 'Deportivos', '', '', '', '2020-06-04 16:29:19', 0, 0, ''),
(4, 'gorra', 'gorra azul de lakers', '00-0001', '', '', 'Deportivos', '', '', '', '2020-06-04 16:36:18', 0, 0, ''),
(5, 'Pelota', 'Esto es una pelota azul', '001-002', '', '', 'Electricos.', '01-Santiago', '', '', '2020-06-04 16:43:45', 0, 0, ''),
(7, 'Ejemplo', 'Esto es una pelota azul', '100054', '', '', 'Electricos.', '01-Santiago', '', '', '2020-06-04 17:05:45', 0, 0, ''),
(8, '', '', '', '', '', 'Electricos.', '01-Santiago', '', '', '2020-06-05 03:20:17', 0, 0, ''),
(17, 'Greisy', 'Esto es una pelota azul', '100054', 'ewdas', 'sdfsdf', 'Electricos.', '01-Santiago', '', '', '2020-06-30 15:26:17', 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cod_impuestos`
--

CREATE TABLE `tbl_cod_impuestos` (
  `id_cod_impuesto` int(11) NOT NULL,
  `nom_codigo` varchar(100) NOT NULL,
  `porciento` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_compras`
--

CREATE TABLE `tbl_compras` (
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

--
-- Volcado de datos para la tabla `tbl_compras`
--

INSERT INTO `tbl_compras` (`id_compra`, `suplidor`, `comprobante`, `cod_impuesto`, `forma_pago`, `moneda`, `entregar_a`, `nota`, `fecha_orden`, `condicion_pago`, `valor_impuestos`, `sin_impuestos`, `valor_total`) VALUES
(54, 'Carlos Supply', 'B02000000000006', '16%', 'Efectivo', 'Peso Dominicano', '', '', '', 'Al contado', 0, 0, 0),
(55, 'Carlos Supply', 'b008478416', '16%', 'Efectivo', 'Peso Dominicano', '', '', '', 'Al contado', 0, 0, 0),
(56, 'Carlos Supply', 'b020005', '16%', 'Efectivo', 'Peso Dominicano', '', '', '', 'Al contado', 0, 0, 0),
(57, 'Carlos Supply', 'B0265655658', '16%', 'Efectivo', 'Peso Dominicano', '', '', '', 'Al contado', 0, 0, 0),
(58, 'Carlos Supply', 'dslkfslkf', '16%', 'Efectivo', 'Peso Dominicano', '', '', '', 'Al contado', 0, 0, 0),
(59, 'Carlos Supply', 'erqwe', '16%', 'Efectivo', 'Peso Dominicano', '', '', '', 'Al contado', 0, 0, 0),
(60, 'Carlos Supply', 'dsdfsd', '16%', 'Efectivo', 'Peso Dominicano', '', '', '', 'Al contado', 0, 0, 0),
(61, 'Carlos Supply', 'sfsf', '', 'Efectivo', 'Peso Dominicano', '', '', '', 'Al contado', 0, 0, 0),
(62, 'Carlos Supply', 'xzx', '', 'Efectivo', 'Peso Dominicano', '', '', '', 'Al contado', 0, 0, 0),
(63, 'Carlos Supply', 'kml', '', 'Efectivo', 'Peso Dominicano', '', '', '', 'Al contado', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_det_compras`
--

CREATE TABLE `tbl_det_compras` (
  `id_det_compra` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `cod_articulo` varchar(50) NOT NULL,
  `nom_articulo` varchar(100) NOT NULL,
  `cantidad` float NOT NULL,
  `itbis` float NOT NULL,
  `valor` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_det_compras`
--

INSERT INTO `tbl_det_compras` (`id_det_compra`, `id_compra`, `cod_articulo`, `nom_articulo`, `cantidad`, `itbis`, `valor`, `total`) VALUES
(69, 58, '100054 ', ' Ejemplo', 2, 20, 1000, 2020),
(70, 58, '100054 ', ' Greisy', 2, 60, 3000, 6060),
(71, 59, '100054 ', ' Ejemplo', 1, 10, 99.99, 109.99),
(72, 59, '', ' gorra888888', 1, 0, 1000.01, 1000.01),
(73, 60, '100054 ', ' Ejemplo', 1, 10, 100.99, 110.99),
(74, 60, '001-002 ', ' Pelota', 1, 0, 1000, 1000),
(75, 61, '100054 ', ' Ejemplo', 1, 10, 200, 210),
(76, 62, '100054 ', ' Ejemplo', 1, 10, 1000, 1010),
(77, 63, '100054 ', ' Ejemplo', 1, 10, 1000, 1010),
(78, 63, '100054 ', ' Greisy', 1, 10, 15000, 15010);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tmp_compras`
--

CREATE TABLE `tbl_tmp_compras` (
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

CREATE TABLE `tbl_usuario` (
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
