-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-10-2024 a las 06:21:15
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
-- Base de datos: `pedidos_today`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `cant_products` int(11) DEFAULT NULL,
  `total` int(100) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `id_product`, `cant_products`, `total`, `date`) VALUES
(1, 1, 2, 4000, '2024-09-11'),
(3, 2, 1, 3000, '2024-09-19'),
(6, 5, 3, 1500, '2024-09-12'),
(7, 1, 1, 2000, '2024-09-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `image_product` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `image_product`) VALUES
(1, 'Hamburguesa doble con chedar', 2000, 'Habmurguesa doble carne, con chedar, huevo, tomate, lechuga.', NULL),
(2, 'Pizza mozzarella', 3000, 'Pizza con salsa de tomate y mucha mozzarella', ''),
(5, 'Papas', 500, 'Papas artesanalmente recolectadas, cortadas y fritas', NULL),
(6, 'Picada', 6000, 'Salamin, quesos y aceitunas', NULL),
(13, 'Mascarpone', 5500, 'Postre de mascarpone', NULL),
(34, 'Limonada', 1000, 'Jugo de limon exprimido con gengibre rallado', ''),
(52, 'Pizza peperoni', 5000, 'Pizza de muzzarella y peperoni en fetas', './img/pizza-peperonni.jpg'),
(53, 'Cafe', 1500, 'Expresso, cortado', './img/cafe.jpeg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id_product`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
