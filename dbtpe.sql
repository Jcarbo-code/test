-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 07:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtpe`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `categoria` varchar(32) NOT NULL,
  `local` varchar(32) NOT NULL,
  `fecha_menu` date NOT NULL,
  `descripcion` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `categoria`, `local`, `fecha_menu`, `descripcion`) VALUES
(1, 'Spiedo a las brasas', 'Tres arroyos', '2016-06-22', 'Los mejores alimentos para comer a la parrilla'),
(2, 'Pastas', 'Tres arroyos y claromeco', '2013-03-29', 'Pastas caseras, con todo tipo de rellenos'),
(3, 'Platos calientes', 'Tres arroyos', '2016-06-22', 'Las mejores comidas de invierno'),
(4, 'Platos frios', 'Tres arroyos', '2016-06-22', 'Las mejores comidas para las fiestas de fin de anio'),
(5, 'Minutas', 'Tres arroyos y claromeco', '2012-06-02', 'Las comidas mas rapidas por si tenes poco tiempo'),
(6, 'Sandwiches', 'Tres arroyos y claromeco', '2012-11-22', 'Las mejores comidas de invierno'),
(7, 'Tartas', 'Tres arroyos y claromeco', '2019-11-22', 'Todo tipo de tartas, ahora tenemos veganas'),
(8, 'Pizzas', 'Tres arroyos y claromeco', '2012-02-14', 'Todo tipo de pizzas, ahora tenemos veganas'),
(9, 'bebidas', 'Tres arroyos', '2012-06-22', 'Todo tipo de gaseosas y los mejores vinos'),
(53, 'tragos', 'Tres arroyos', '2021-12-03', '                    se añadio la barra de tragos');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `comentario` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `puntuacion` int(1) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `comentario`, `puntuacion`, `id_product`, `id_usuario`, `fecha_creacion`) VALUES
(3, 'Test', 4, 3, 1, '2021-11-22 10:28:32'),
(14, 'test', 3, 3, 7, '2021-11-23 20:40:03'),
(20, 'que rico', 4, 10, 8, '2021-11-25 13:02:16'),
(21, 'solo para gente que le guste picante', 2, 53, 8, '2021-11-25 14:02:14'),
(22, 'ESTABA MUY BUENO', 4, 32, 8, '2021-11-25 15:24:17'),
(23, 'ideal para veganos =)', 5, 32, 8, '2021-11-25 15:24:43'),
(24, 'usualmente no lo como, pero lo recomiendo', 3, 32, 8, '2021-11-25 15:25:15'),
(25, 'abundante', 4, 48, 8, '2021-11-25 15:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `descripcion` varchar(128) DEFAULT NULL,
  `precio` float NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `id_category` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `nombre`, `descripcion`, `precio`, `image`, `id_category`) VALUES
(1, '1/2 Pollo', NULL, 500, '', 1),
(2, 'Vacio', NULL, 2000, '', 1),
(3, 'Colita de cuadril', NULL, 2000, '', 1),
(4, 'Bondiola de cerdo', 'una bondiola de los cerdos criados en el campo la granja', 1800, NULL, 1),
(5, 'Chorizo', NULL, 200, '', 1),
(6, 'Morcilla', NULL, 200, '', 1),
(7, 'Filet de Brotola', NULL, 350, '', 1),
(8, 'Ravioli', NULL, 300, '', 2),
(10, 'Tortellini', NULL, 300, '', 2),
(11, 'Tortelloni', NULL, 300, '', 2),
(12, 'Lasagna', NULL, 600, '', 2),
(13, 'Cappelletti', NULL, 380, '', 2),
(14, 'Cannelloni', NULL, 450, '', 2),
(15, 'Milanesa de carne', NULL, 400, '', 3),
(16, 'Suprema de pollo', NULL, 400, '', 3),
(18, 'Milanesa Napolitana', 'Carne o pollo con jamon, queso y salsa de tomate - para compartir', 600, '', 3),
(19, 'Arroz con pollo', 'Cebolla, morrón, azafrán con pollo desmenusado y desgrasado - Aporx. 600gr', 450, '', 3),
(20, 'Guiso de lentejas', 'Cebolla, zanahoria, verduritas, panceta, chorizo colorado - Aprox. 600gr', 450, '', 3),
(21, 'Guiso de mondongo', 'Cebolla, zanahoria, verduritas, panceta, chorizo colorado, cebolla, papas, garbanzo - Aprox.600gr', 450, '', 3),
(22, 'Lechón', NULL, 2000, '', 4),
(23, 'Lechón', NULL, 2000, '', 4),
(24, 'Lengua a la vinagreta', NULL, 1700, '', 4),
(25, 'Matambre de carne', NULL, 2000, '', 4),
(26, 'Matambre de pollo', NULL, 1700, '', 4),
(27, 'Papas Fritas Chicas', 'Para 3 personas', 250, '', 5),
(28, 'Papas Fritas Chicas', 'Para 3 personas', 250, '', 5),
(29, 'Papas Fritas Grandes', 'Para 4 o 5 personas', 300, '', 5),
(30, 'Papas al horno Chicas', 'Para 3 personas', 250, '', 5),
(31, 'Papas al horno Grandes', 'Para 4 o 5 personas', 350, '', 5),
(32, 'Verduras grilladas Chicas', 'Tomate, cbebolla, calabaza, zapallito y berejena', 250, '', 5),
(33, 'Verduras grilladas Grandes', 'Tomate, cbebolla, calabaza, zapallito y berejena', 350, '', 5),
(34, 'Tortilla Chica', 'Papas, Acelga o Zapallito', 400, '', 5),
(35, 'Tortilla Grande', 'Papas, Acelga o Zapallito', 500, '', 5),
(36, 'Ensalada Rusa chica', 'papas, arbejas y mayonesa (aprox 700gr)', 350, '', 5),
(39, 'Puré', 'papa, calabaza o mixto. Aprox 500 gr', 400, '', 5),
(41, 'Empanadas', 'Cada una. De carne cortada a cuchillo, Pollo y Jamon Queso', 70, '', 5),
(43, 'Supremo completo', 'Tomate, lechuga y mayonesa', 300, '', 6),
(44, 'Supremo Super', 'Tomate, lechuga, jamon, queso y mayonesa', 360, '', 6),
(45, 'Milanesa Carne Completa', 'Tomate, lechuga y mayonesa', 300, '', 6),
(46, 'Milanesa Carne Super', 'Tomate, lechuga, jamon, queso y mayonesa', 360, '', 6),
(47, 'Lomito', 'Tomate, lechuga y mayonesa', 380, '', 6),
(48, 'Pollo a las brasas', 'Tomate, lechuga y mayonesa', 300, '', 6),
(50, 'Alucar', 'asdweq', 540, '', 52),
(51, 'blackwhite', 'rinde 2 personas', 540, '', 52),
(53, 'mastorr', 'asnijwmok fsoas ', 235346, NULL, 12),
(54, 'mastorr', 'rinde 3 personas', 235346, NULL, 12);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `mail`, `clave`, `rol`) VALUES
(1, 'admin', 'admin@hotmail.com', '$2a$12$PwKMSpX281sqINDPztJ0I.Jpp8awR3v2UKp/jn85PpC6TSfpMW82C', 'admin'),
(4, 'joelcarbo', 'jcarbo@hotmail.com', '$2y$10$SqTngyuqGvRB7z8KGk2vOO1vzRBnW54rLE0rdQZ6I0t8qZVeSgYve', 'admin'),
(8, 'carbonetti', 'joel_carbo@hotmail.com', '$2y$10$mKia4PC771Q4W5lfHBjGour9cOaMalFST4h6o439G/K91Mzw9jG4m', 'admin'),
(9, 'usuario', 'Usuario@gmail.com', '$2y$10$HdZloqn30.8A6NsuxYTYtuA3.Z8g42nx5coPGSZMz/ub7KqjsJ.ya', 'no-admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `fk_product_category` (`id_category`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
