-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 01:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `castellarin_florencia`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `dni` int(8) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel_area` int(6) NOT NULL,
  `tel_fijo` int(15) NOT NULL,
  `tel_cel` int(15) NOT NULL,
  `dom_calle` varchar(30) NOT NULL,
  `dom_altura` varchar(5) NOT NULL,
  `dom_piso` varchar(2) NOT NULL,
  `dom_dpto` varchar(2) NOT NULL,
  `ciudad` varchar(15) NOT NULL,
  `provincia` enum('Buenos Aires','Capital Federal','Catamarca','Chaco','Chubut','Córdoba','Corrientes','Entre Ríos','Formosa','Jujuy','La Pampa','La Rioja','Mendoza','Misiones','Neuquén','Río Negro','Salta','San Juan','San Luis','Santa Cruz','Santa Fe','Santiago del Estero','Tierra del Fuego','Tucumán') NOT NULL,
  `cp` varchar(10) NOT NULL,
  `user` varchar(10) NOT NULL,
  `pw` varchar(15) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `dob`, `dni`, `email`, `tel_area`, `tel_fijo`, `tel_cel`, `dom_calle`, `dom_altura`, `dom_piso`, `dom_dpto`, `ciudad`, `provincia`, `cp`, `user`, `pw`, `date_added`) VALUES
(1, 'Elsa', 'Pallo', '1955-02-05', 8965236, 'elsapallito@hotmail.com', 341, 4569872, 0, 'Los Sauces', '1255', '', '', 'Rosario', 'Santa Fe', '2000', 'elsapa', '11223344', '2022-03-16 20:41:59'),
(2, 'Susana', 'Horia', '1979-12-31', 27965236, 'suzy79@hotmail.com', 341, 0, 153659841, 'Goyenechea', '15', '', '', 'Rosario', 'Santa Fe', '2000', 'suzy79', '12345678', '2022-03-31 19:06:34'),
(3, 'Justin', 'Case', '1996-05-30', 39652365, 'eljustin@gmail.com', 3476, 4386525, 153652145, 'Pje Esperanza', '132', '', 'B', 'San Lorenzo', 'Santa Fe', '220', 'justin', '1122334455', '2022-05-12 14:28:17'),
(4, 'Elton', 'Tito', '2000-10-03', 41256896, 'tony_cabj@gmail.com', 2477, 668386, 15361848, 'Rodríguez Peña ', '747', '', '5', 'Pergamino', 'Buenos Aires', 'B2700', 'toniboca', '11223344', '2022-03-16 10:40:28'),
(5, 'Lola', 'Mento', '1966-06-06', 18523654, 'loli.ta@gmail.com', 3525, 492015, 156321456, 'Ruta E53', 's/n', '', '', 'Ascochinga', 'Córdoba', '5117', 'lolam', '11223344', '2022-03-16 10:40:36'),
(6, 'Elvira', 'Manson', '1958-06-12', 8632145, 'pelula@gmail.com', 345, 0, 153698254, 'Los Sauces', 's/n', '', '', 'Rosario', 'Capital Federal', '2000', 'pelula', '44556677', '2022-03-30 16:27:54'),
(7, '', '', '0000-00-00', 0, 'admin@admin.com', 0, 0, 0, '', '', '', '', '', 'Buenos Aires', '', 'admin', 'admin', '2022-05-24 20:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(10) NOT NULL,
  `titulo` varchar(40) DEFAULT NULL,
  `fecha_toma` date DEFAULT NULL,
  `lugar` varchar(40) DEFAULT NULL,
  `pais` varchar(30) DEFAULT NULL,
  `imagen` varchar(40) DEFAULT NULL,
  `categorias1` varchar(20) DEFAULT NULL,
  `categorias2` varchar(20) DEFAULT NULL,
  `formato` varchar(10) DEFAULT NULL,
  `dimensiones` varchar(10) DEFAULT NULL,
  `stock` int(4) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `estado` tinyint(2) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `titulo`, `fecha_toma`, `lugar`, `pais`, `imagen`, `categorias1`, `categorias2`, `formato`, `dimensiones`, `stock`, `precio`, `estado`, `date_added`) VALUES
(1, 'Puerta al Báltico', '2012-08-01', 'Peterhof', 'Rusia', 'peterhof.jpg', 'pcult|pnat', 'mar|par', 'horizontal', '21x30', 5, 1000, 1, '2022-03-12 20:38:06'),
(2, 'Colores planos/planos de colores', '2012-08-01', 'Centre Pompidou', 'Francia', 'pompidou.jpg', 'int', ' ', 'horizontal', '21x30', 5, 1199, 1, '2022-03-12 17:59:01'),
(3, 'Luces de al-Qāhirah', '2012-06-01', 'Mezquita de Muhammad Ali Pasha', 'Egipto', 'mosque_map.jpg', 'int', ' ', 'vertical', '21x30', 5, 1199, 0, '2022-03-13 11:51:17'),
(4, 'Desfasajes temporales', '2012-06-01', 'Desierto de Giza', 'Egipto', 'giza.jpg', 'pcult|pnat', 'des', 'horizontal', '21x30', 10, 1199, 1, '2022-03-13 11:51:12'),
(5, 'Punto de fuga', '2012-08-01', 'Paris Plages', 'Francia', 'rivera_paris.jpg', 'pcult|purb', 'pla', 'horizontal', '21x30', 5, 1199, 1, '2022-03-13 11:51:14'),
(6, 'Una vez en la montaña', '2012-10-01', 'Salecchio Superiore', 'Italia', 'formazza.jpg', 'pcult|pnat|prur', 'mon', 'horizontal', '21x30', 5, 1199, 1, '2022-03-13 11:51:14'),
(9, 'Actividad de invierno', '2017-01-01', 'Earlswood Common', 'Inglaterra', 'duckylake.jpg', 'pnat', ' ', 'horizontal', '35x50', 15, 1199, 0, '2022-03-13 11:51:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
