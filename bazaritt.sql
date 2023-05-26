-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 08:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bazaritt`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnado`
--

CREATE TABLE `alumnado` (
  `NumControl` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
--

CREATE TABLE `alumno` (
  `NumControl` int(11) NOT NULL,
  `NombreAlumno` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `NumTelefono` varchar(50) NOT NULL,
  `Articulos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumno`
--

INSERT INTO `alumno` (`NumControl`, `NombreAlumno`, `Password`, `NumTelefono`, `Articulos`) VALUES
(1234, 'Luis Roberto Perez', '4321', '6641234567', 0),
(19211705, 'Luis Roberto Pérez', '1234', '6648576761', 0);

-- --------------------------------------------------------

--
-- Table structure for table `articulos`
--

CREATE TABLE `articulos` (
  `idArticulo` int(11) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Descripcion` text NOT NULL,
  `Precio` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Imagen` blob NOT NULL,
  `Vendor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articulos`
--

INSERT INTO `articulos` (`idArticulo`, `Titulo`, `Descripcion`, `Precio`, `Status`, `Imagen`, `Vendor`) VALUES
(3, 'Dulces ', 'Muy ricos', 1, 'Disponibles', 0x322e6a7067, 1234),
(4, 'Picafresas', 'Picar Fresas', 1, 'Disponible', 0x322e6a7067, 1234),
(7, 'Laptop', 'Nueva', 3500, 'Apartada', 0x322e6a7067, 1234),
(8, 'Playeras', 'Nuevas', 0, 'Agotadas', 0x322e6a7067, 1234),
(9, 'Botellas de Agua', 'Refrescantes Marca Ciel', 10, 'Disponibles', '', 19211705);

-- --------------------------------------------------------

--
-- Table structure for table `prueba`
--

CREATE TABLE `prueba` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prueba`
--

INSERT INTO `prueba` (`id`, `nombre`) VALUES
(1, 'usuario');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`idArticulo`);

--
-- Indexes for table `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articulos`
--
ALTER TABLE `articulos`
  MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prueba`
--
ALTER TABLE `prueba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
