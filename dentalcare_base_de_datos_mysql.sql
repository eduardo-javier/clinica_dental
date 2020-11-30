-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2020 a las 23:48:20
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dentalcare`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agendaconsulta`
--

CREATE TABLE `agendaconsulta` (
  `idAgenda` int(4) NOT NULL,
  `idConsulta` int(4) NOT NULL,
  `horasDisponibles` int(2) NOT NULL,
  `estado` int(1) NOT NULL,
  `fecha` date NOT NULL,
  `idUsuario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaproductos`
--

CREATE TABLE `categoriaproductos` (
  `idCategoria` int(4) NOT NULL,
  `Descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoriaproductos`
--

INSERT INTO `categoriaproductos` (`idCategoria`, `Descripcion`) VALUES
(1, 'medicamentos'),
(2, 'alimentos'),
(3, 'herramienta dental '),
(4, 'Cotidianos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `idConsulta` int(4) NOT NULL,
  `idUsuario` int(4) NOT NULL,
  `horaFecha` datetime NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `estado` int(1) NOT NULL,
  `horas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`idConsulta`, `idUsuario`, `horaFecha`, `descripcion`, `estado`, `horas`) VALUES
(10, 8, '0000-00-00 00:00:00', 'si', 1, 1),
(13, 48, '0000-00-00 00:00:00', 'si', 1, 1),
(14, 52, '0000-00-00 00:00:00', 'dolor en una muela', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `idDetalle` int(4) NOT NULL,
  `cantidadCompra` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `idPedido` int(4) NOT NULL,
  `idProducto` int(4) NOT NULL,
  `idUsuario` int(4) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`idDetalle`, `cantidadCompra`, `fecha`, `idPedido`, `idProducto`, `idUsuario`, `estado`) VALUES
(28, 1, '2020-08-20', 22, 13, 48, 1),
(29, 2, '2020-08-20', 22, 11, 48, 1),
(30, 1, '2020-08-20', 23, 11, 52, 1),
(31, 1, '2020-08-20', 23, 10, 52, 1),
(32, 1, '2020-08-22', 24, 11, 52, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `idUsuario` int(4) NOT NULL,
  `estado` int(11) NOT NULL,
  `Ciudad` varchar(100) NOT NULL,
  `Direccion` varchar(70) NOT NULL,
  `coste` decimal(20,0) NOT NULL,
  `estado_pedido` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `fecha`, `hora`, `idUsuario`, `estado`, `Ciudad`, `Direccion`, `coste`, `estado_pedido`) VALUES
(22, '2020-08-20', '00:41:09', 48, 1, 'tegus2', 'por ahi -1', '980', 'confirm'),
(23, '2020-08-20', '16:01:17', 52, 1, 'tegucigalpa', 'por ahi', '810', 'sended'),
(24, '2020-08-22', '14:59:07', 52, 1, 'tegucigalpa', 'comayaguela', '410', 'confirm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(4) NOT NULL,
  `idCategoria` int(4) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `stock` int(10) NOT NULL,
  `precioCompra` decimal(6,0) NOT NULL,
  `precioVenta` decimal(6,0) NOT NULL,
  `estado` int(1) NOT NULL,
  `fecha` date NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `idCategoria`, `Nombre`, `stock`, `precioCompra`, `precioVenta`, `estado`, `fecha`, `imagen`) VALUES
(3, 1, 'funciona', 10, '10', '10', 0, '2020-08-13', 'idea2.jpg'),
(4, 1, 'PRODUCTO 3', 12, '121', '12', 0, '2020-08-13', ''),
(5, 2, 'PRODUCTO 3 mejorado', 1, '1', '1', 0, '2020-08-13', 'imple.jpg'),
(6, 1, 'PRODUCTO 3', 12, '121', '12', 0, '2020-08-13', 'idea2.jpg'),
(7, 1, 'producto prueba', 1, '1', '1', 0, '2020-08-13', 'idea2.jpg'),
(8, 2, 'PRODUCTO 2', 10, '12', '21', 0, '2020-08-13', ''),
(9, 3, 'Irrigador dental', 10, '1000', '1200', 1, '2020-08-15', 'uno.jpg'),
(10, 3, 'cepillo dental electrico', 20, '300', '400', 1, '2020-08-15', 'dos.jpg'),
(11, 1, 'enjuague bucal', 34, '300', '410', 1, '2020-08-15', 'tres.jpg'),
(12, 1, 'cepillo de ortodoncia', 18, '150', '220', 0, '2020-08-15', 'cuatro.jpg'),
(13, 2, 'cepillos  interdentales', 10, '130', '160', 1, '2020-08-15', 'cinco.jpg'),
(14, 4, 'PRODUCTO 2', 12, '12', '12', 0, '2020-08-20', 'idea2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `idTipo` int(4) NOT NULL,
  `Descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`idTipo`, `Descripcion`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(4) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(200) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` longtext NOT NULL,
  `Estado` int(1) NOT NULL,
  `Telefono` int(10) NOT NULL,
  `Edad` int(2) NOT NULL,
  `Fecha` date NOT NULL,
  `idTipo` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `Nombre`, `Apellido`, `Email`, `Password`, `Estado`, `Telefono`, `Edad`, `Fecha`, `idTipo`) VALUES
(1, 'bryan', '', 'bryan_rnm@yahoo.com', '12345', 1, 88907137, 22, '2020-07-31', 2),
(8, 'rober', '', 'bryan@gmial.com', 'fe8c8a65e316e40670e4b60efcc36d96', 1, 88907137, 22, '2020-07-31', 1),
(22, 'jafeth', '', 'holamundo@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 88907105, 14, '2020-08-01', 1),
(23, 'jafeth', '', 'holamundo@yahoo.com', 'd41d8cd98f00b204e9800998ecf8427e', 1, 88907105, 14, '2020-08-01', 1),
(24, 'roberto', '', 'roberto@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 50607080, 19, '2020-08-01', 2),
(25, 'bryan', '', 'bryan.com', '1234', 1, 9999999, 90, '2020-08-01', 2),
(26, 'bryan nunez', '', 'holamundo.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, 222222, 22, '2020-08-01', 2),
(27, 'alberto', '', 'alberto@gmail.com', '1234', 1, 8888888, 18, '2020-08-01', 1),
(28, 'jose', '', 'jose@gmail.com', '1234', 1, 222222, 20, '2020-08-01', 2),
(29, 'carlos', '', 'carlos@ujcv.com', '$2y$04$tQJQmXlv35D6liUN.q6AkOWAXum2WeZv5evvl4wUq7OZ3v7oHpOzy', 1, 3333333, 12, '2020-08-06', 1),
(30, 'bryan', '', 'bryan.nunez@ujcv.edu.hn', '$2y$04$PZ9bmjAsOFV/MXZIl8TsWOi7LZnVo5b2lvBsxQKM/uBbDJUe4RQ/C', 1, 123123123, 21, '2020-08-07', 1),
(31, 'hola', '', 'holamundo.com', '$2y$04$4r0hvvYQwwiZ4GRnoUQS3Oh0NcNJPptI/..vp18m2qW5rFTf2Tmyu', 1, 1234, 21, '2020-08-12', 1),
(44, 'juan', '', 'juan@gmail.com', '123', 1, 12, 1, '2020-08-13', 2),
(48, 'usuario', 'correcto', 'usuario@gmail.com', '$2y$04$2xM/7zkSuGerg/cydsH5WeiDsUNbmGFfZvpoq0Tsxu7923c4arLqO', 1, 12, 21, '0000-00-00', 1),
(49, 'usuario', 'segundo', 'usuario1@gmail.com', '$2y$04$WTnvacCj.X5JINVpqFVjSuEJZtvTAWfM7j.iI3fcwGix5Qb9BES/S', 1, 12345, 1, '0000-00-00', 2),
(50, 'nombre', 'apellido', 'si@gmail.com', '123456', 1, 12, 21, '0000-00-00', 1),
(51, 'int', 'ento', 'juan@gmail.com', '$2y$04$uVR/qDSYcwYJUES8lzL1lee7gTiX0N7HBVbHMwFmGe.MIcGhQB2P.', 1, 12, 21, '2020-08-20', 1),
(52, 'eduardo', 'javier', 'javier@gmail.com', '$2y$04$r4oY5eEsqHrD28ojJycx1Oqmm8l7.bsgneh/EJPXi3AnbMyQmF6oG', 1, 12, 21, '2020-08-20', 2),
(53, 'hola', 'mundo', 'hola@gmail.com', '$2y$04$v9JC6dZPYZSlTlUHB9hJTeO/RTAJTC.YJufnPQqeFcxcufalO.vdy', 1, 123456, 12, '2020-11-04', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agendaconsulta`
--
ALTER TABLE `agendaconsulta`
  ADD PRIMARY KEY (`idAgenda`),
  ADD KEY `idConsulta` (`idConsulta`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `categoriaproductos`
--
ALTER TABLE `categoriaproductos`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`idConsulta`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`idDetalle`),
  ADD KEY `idPedido` (`idPedido`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idTipo` (`idTipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agendaconsulta`
--
ALTER TABLE `agendaconsulta`
  MODIFY `idAgenda` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoriaproductos`
--
ALTER TABLE `categoriaproductos`
  MODIFY `idCategoria` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `idConsulta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `idDetalle` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idTipo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agendaconsulta`
--
ALTER TABLE `agendaconsulta`
  ADD CONSTRAINT `idConsulta` FOREIGN KEY (`idConsulta`) REFERENCES `consultas` (`idConsulta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `idPedido` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`idPedido`) ON UPDATE CASCADE,
  ADD CONSTRAINT `idProducto` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `idTipo` FOREIGN KEY (`idTipo`) REFERENCES `tipo` (`idTipo`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
