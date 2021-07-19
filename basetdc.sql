-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2021 a las 06:20:31
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `basetdc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bandeja`
--

CREATE TABLE `bandeja` (
  `id_bandeja` int(11) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `asunto` varchar(250) NOT NULL,
  `mensaje` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bandeja`
--

INSERT INTO `bandeja` (`id_bandeja`, `estado`, `fecha`, `asunto`, `mensaje`) VALUES
(3, 'Visto', '2021-07-18', 'prueba', 'Nombre del cliente : Rodrigo Humberto Alvarez Abello <br> Celular : 88052133 <br> Mail: alex.pinom@utem.cl <br> Mensaje: prueba 1'),
(4, 'Visto', '2021-07-18', 'prueba2', '<b>Nombre del cliente :</b> Sofia Vargas <br> <b>Celular : 123546</b> <br> <b>Mail:</b> asdlk@hotmail.com <br> <b>Mensaje:</b> slkjaldjasd'),
(5, 'Visto', '2021-07-18', 'prueba 3', '<b>--Nombre del cliente :</b> Cecilia Mayor <br> <b>--Celular :</b> 987456321 <br> <b>--Mail:</b> RODRIGO.ALVAREZA@UTEM.CL <br> <b>--Mensaje:</b> prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(100) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(100) COLLATE utf8_bin NOT NULL,
  `imagen_categoria` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`, `imagen_categoria`) VALUES
(1, 'Plantas', 'plan.png'),
(2, 'Muebles', 'SiS-deco.png'),
(3, 'Ropa', 'ropa.png'),
(4, 'Accesorio', 'acc.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre_cliente`) VALUES
(1, 'Jeniffer Quiroz'),
(2, 'Alex Pino'),
(3, 'Rodrigo Alvarez'),
(4, 'Camila abello vargas'),
(5, 'Javier Perez Munoz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `id_categoria1` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `talla` varchar(10) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `detalles` varchar(250) DEFAULT NULL,
  `nombre_imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `id_categoria1`, `nombre_producto`, `talla`, `stock`, `precio`, `detalles`, `nombre_imagen`) VALUES
(1, 4, 'Sombrero Playero', 'estandar', 10, 1990, 'Lindo sombrero ', 'sobreroplayero.PNG'),
(2, 1, 'Cactus', 'mediano', 19, 3000, 'lindo cactus mediando', 'cactus.png'),
(3, 3, 'pantalon', 'XL', 14, 7990, 'Pantalon Azul XL', 'pantalon.png'),
(4, 3, 'Polera', 'L', 16, 2990, 'poleras xd', 'polera.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroventa`
--

CREATE TABLE `registroventa` (
  `id_registro` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `total_venta` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registroventa`
--

INSERT INTO `registroventa` (`id_registro`, `id_venta`, `total_venta`, `fecha`) VALUES
(1, 1, 4990, '2021-07-14'),
(2, 2, 2990, '2021-07-14'),
(3, 3, 31960, '2021-07-14'),
(4, 4, 9980, '2021-07-14'),
(5, 5, 5990, '2021-07-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene`
--

CREATE TABLE `tiene` (
  `id_venta_` int(11) NOT NULL,
  `id_producto_` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `id_producto1` int(11) NOT NULL,
  `id_cliente1` int(11) NOT NULL,
  `id_rventa` int(11) NOT NULL,
  `cantidad_p` int(11) NOT NULL,
  `valor_venta` int(11) NOT NULL,
  `fecha_venta` date DEFAULT NULL,
  `detalle_venta` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `id_producto1`, `id_cliente1`, `id_rventa`, `cantidad_p`, `valor_venta`, `fecha_venta`, `detalle_venta`) VALUES
(1, 1, 1, 1, 1, 1990, '2021-07-14', 'dsfsdgf'),
(2, 2, 1, 1, 1, 3000, '2021-07-14', 'dsfsdgf'),
(3, 4, 1, 2, 1, 2990, '2021-07-14', ''),
(4, 3, 1, 3, 4, 31960, '2021-07-14', ''),
(5, 1, 4, 4, 1, 1990, '2021-07-14', 'sadsadsa'),
(6, 3, 4, 4, 1, 7990, '2021-07-14', 'sadsadsa'),
(7, 2, 5, 5, 1, 3000, '2021-07-14', 'pago com 10 mil'),
(8, 4, 5, 5, 1, 2990, '2021-07-14', 'pago com 10 mil');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bandeja`
--
ALTER TABLE `bandeja`
  ADD PRIMARY KEY (`id_bandeja`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria1` (`id_categoria1`);

--
-- Indices de la tabla `registroventa`
--
ALTER TABLE `registroventa`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indices de la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD PRIMARY KEY (`id_venta_`),
  ADD KEY `id_producto_` (`id_producto_`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_producto1` (`id_producto1`),
  ADD KEY `id_cliente1` (`id_cliente1`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bandeja`
--
ALTER TABLE `bandeja`
  MODIFY `id_bandeja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `registroventa`
--
ALTER TABLE `registroventa`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria1`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD CONSTRAINT `tiene_ibfk_1` FOREIGN KEY (`id_venta_`) REFERENCES `venta` (`id_venta`),
  ADD CONSTRAINT `tiene_ibfk_2` FOREIGN KEY (`id_producto_`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_producto1`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_cliente1`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
