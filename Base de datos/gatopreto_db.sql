-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2024 a las 23:42:40
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gatopreto_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `img`) VALUES
(1, 'Pastas', 'pastas.png'),
(2, 'Bocadillos', 'bocadillos.png'),
(3, 'Pasteles', 'pasteles.png'),
(4, 'Refrescos', 'refrescos.png'),
(5, 'Chocolate', 'chocolates.png'),
(6, 'Cafes', 'cafes.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `rol` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `correo`, `contraseña`, `rol`) VALUES
(8, 'Admin', 'admin', 'admin@gmail.com', '123', 1),
(10, 'Prueba', 'prueba', 'prueba@gmail.com', '123', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `caduzidad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `precio_total` double NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_cliente`, `precio_total`, `fecha`) VALUES
(51, 8, 10.51, '2023-12-19 17:13:04'),
(52, 8, 7.81, '2024-01-06 14:27:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_producto`
--

CREATE TABLE `pedido_producto` (
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `precio_producto` double NOT NULL,
  `tiempo_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido_producto`
--

INSERT INTO `pedido_producto` (`id_pedido`, `id_producto`, `cantidad_producto`, `precio_producto`, `tiempo_total`) VALUES
(51, 4, 1, 4.31, 5),
(51, 1, 1, 1.13, 1),
(51, 14, 2, 1.46, 2),
(52, 1, 1, 1.13, 1),
(52, 35, 1, 5.1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` char(255) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `tiempo_preparacion` int(11) NOT NULL,
  `precio` double NOT NULL,
  `descuento` int(11) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `pajita` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `id_categoria`, `tiempo_preparacion`, `precio`, `descuento`, `img`, `pajita`) VALUES
(1, 'Donut', 1, 1, 1.5, 25, 'donut.png', NULL),
(3, 'Cortado', 6, 1, 1.2, 5, 'cortado.png', NULL),
(4, 'Bocadillo Bacon Queso', 2, 5, 5.75, 25, 'bocadilloBaconQueso.png', NULL),
(6, 'Pastel de Chocolate', 3, 1, 3.7, 50, 'pastelChocolate.png', NULL),
(11, 'Chocolate Caliente', 5, 3, 3, NULL, 'chocolateCaliente.png', 1),
(12, 'Croissant Chocolate', 1, 1, 1, 0, 'croissant.png', NULL),
(14, 'Cocacola', 4, 1, 1.5, 3, 'cocacola.png', 1),
(15, 'Cinnamon Roll', 1, 1, 1.8, 0, 'cinamoRoll.png', NULL),
(16, 'Caña Chocolate', 1, 1, 1.6, 5, 'cañaChocolate.png', NULL),
(17, 'Magdalena', 1, 1, 1, 0, 'magdalena.png', NULL),
(18, 'Magdalena Chocolate', 1, 1, 1.5, 0, 'magdalenaChocolate.png', NULL),
(19, 'Fanta Naranja', 4, 1, 1.5, NULL, 'fantaNaranja.png', 1),
(25, 'Cacaolat', 5, 1, 2.3, 10, 'cacaolat.png', 1),
(26, 'Chocolate con Leche', 5, 1, 2.3, 5, 'chocolateConLeche.png', NULL),
(27, 'Chocolate Negro', 5, 1, 2.5, 5, 'chocolateNegro.png', NULL),
(28, 'Chocolate Negro 70%', 5, 1, 2.7, 5, 'ChocolateNegro70.png', NULL),
(29, 'Chocolate Blanco', 5, 1, 2.7, 5, 'ChocolateBlanco.png', NULL),
(30, 'Pastel de Queso', 3, 1, 3.7, 0, 'pastelQueso.png', NULL),
(31, 'Pastel de Calabaza', 3, 1, 3.7, 0, 'pastelCalabaza.png', NULL),
(32, 'Pastel Red Velvet', 3, 1, 5, 25, 'redVelvet.png', NULL),
(33, 'Tarta de Manzana', 3, 1, 2.5, 0, 'tartaManzana.png', NULL),
(34, 'Pastel de Limon', 3, 1, 3, 0, 'pastelLimon.png', NULL),
(35, 'Vegetal de Atun', 2, 5, 6, 15, 'vegetalAtun.png', NULL),
(36, 'Vegetal de Pollo', 2, 5, 6, 15, 'vegetalPollo.png', NULL),
(37, 'Bocadillo Jamon Queso', 2, 5, 5, 0, 'bocadilloJamon.png', NULL),
(38, 'Bocadillo de Tortilla', 2, 5, 4.7, 5, 'bocadilloTortilla.png', NULL),
(40, 'Capuchino', 6, 3, 2, 0, 'capuchino.png', NULL),
(41, 'Matcha Late', 6, 3, 3.5, 0, 'matchaLate.png', NULL),
(43, 'Cafe con Caramelo', 6, 3, 3, 0, 'cafeCaramelo.png', NULL),
(44, 'Monster Energy Ultra', 4, 1, 1.75, 0, 'monsterUltra.png', NULL),
(45, 'Monster Mango Loco', 4, 1, 2, 0, 'monsterMangoLoco.png', NULL),
(46, 'Monster Energy', 4, 1, 2, 0, 'monster.png', NULL),
(47, 'Aquarius', 4, 1, 1.25, 0, 'aquarius.png', NULL),
(48, 'Té de Limón', 6, 3, 2, 0, 'teLimon.png', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_ingrediente`
--

CREATE TABLE `producto_ingrediente` (
  `id_producto` int(11) NOT NULL,
  `id_ingrediente` int(11) NOT NULL,
  `nombre_ingrediente` char(255) NOT NULL,
  `cantidad_por_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`id_categoria`);

--
-- Indices de la tabla `producto_ingrediente`
--
ALTER TABLE `producto_ingrediente`
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_ingrediente` (`id_ingrediente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD CONSTRAINT `pedido_producto_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `pedido_producto_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `producto_ingrediente`
--
ALTER TABLE `producto_ingrediente`
  ADD CONSTRAINT `producto_ingrediente_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `producto_ingrediente_ibfk_2` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingredientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
