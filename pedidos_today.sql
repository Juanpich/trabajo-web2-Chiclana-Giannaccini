-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1

-- Tiempo de generación: 07-10-2024 a las 03:32:43
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12


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
<<<<<<< HEAD
(1, 1, 2, 4000, '2024-09-11'),
(3, 2, 1, 3000, '2024-09-19'),
(6, 5, 3, 1500, '2024-09-12'),
(7, 1, 1, 2000, '2024-09-30');
=======
(12, 6, 2, 200, '2024-10-03'),
(13, 2, 2, 6000, '2024-10-12'),
(15, 5, 6, 3000, '2024-10-08'),
(17, 7, 2, 1000, '2024-10-09'),
(18, 2, 3, 9000, '2024-10-03');
>>>>>>> 0b65344a9e1fe5efb07ed5146e11e06546437b86

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
(1, 'Hamburguesa doble con chedar', 3000, 'Hamburguesa doble carne, con chedar, huevo, tomate, lechuga.', 'https://www.carniceriademadrid.es/wp-content/uploads/2022/09/smash-burger-que-es.jpg'),
(2, 'Pizza mozzarella', 3000, 'Pizza con salsa de tomate y mucha mozzarella', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTI2hdQeNVlyu20ReOpJcNwdgW0ER5hwxnauQ&amp;s'),
(5, 'Papas', 500, 'Papas artesanalmente recolectadas, cortadas y fritas', NULL),
(6, 'Picada', 6000, 'Salamin, quesos y aceitunas', NULL),
(7, 'Limonada', 1000, 'Jugo fresco de limones exprimidos, genjibre y azucar', 'https://cdn0.celebritax.com/sites/default/files/styles/amp/public/recetas/limonada.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
<<<<<<< HEAD
  `user_name` varchar(100) NOT NULL,
  `password` varchar(120) NOT NULL
=======
  `user_name` varchar(250) NOT NULL,
  `password` char(60) NOT NULL
>>>>>>> 0b65344a9e1fe5efb07ed5146e11e06546437b86
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`) VALUES
<<<<<<< HEAD
(1, 'webadmin', '$2y$10$r8HJhVApm4gkltB2xy0tyu./QIdz3cSprUj/yk6K6MUsNn8TT7w/O');
=======
(1, 'juanpich', '$2y$10$WgfdVcd3ntADRG93D0Byduz5gRpdw7/QzPkdKG.GAbJqVqTXlMgUO');
>>>>>>> 0b65344a9e1fe5efb07ed5146e11e06546437b86

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
-- Indices de la tabla `user`
--
ALTER TABLE `user`
<<<<<<< HEAD
  ADD PRIMARY KEY (`id`);
=======
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`user_name`);
>>>>>>> 0b65344a9e1fe5efb07ed5146e11e06546437b86

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
>>>>>>> 0b65344a9e1fe5efb07ed5146e11e06546437b86

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
