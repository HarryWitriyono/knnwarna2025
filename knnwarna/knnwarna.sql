-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2025 at 02:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knnwarna`
--

-- --------------------------------------------------------

--
-- Table structure for table `datatraining`
--

CREATE TABLE `datatraining` (
  `IdData` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Kecerahan` double(5,2) DEFAULT NULL,
  `Kejenuhan` double(5,2) DEFAULT NULL,
  `Kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datatraining`
--

INSERT INTO `datatraining` (`IdData`, `Kecerahan`, `Kejenuhan`, `Kelas`) VALUES
(1, 40.00, 20.00, 'Merah'),
(2, 50.00, 50.00, 'Biru'),
(3, 60.00, 90.00, 'Biru'),
(4, 10.00, 25.00, 'Merah'),
(5, 70.00, 70.00, 'Biru'),
(6, 60.00, 10.00, 'Merah'),
(7, 25.00, 80.00, 'Biru');

-- --------------------------------------------------------

--
-- Table structure for table `datauji`
--

CREATE TABLE `datauji` (
  `IdData` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Kecerahan` double(5,2) DEFAULT NULL,
  `Kejenuhan` double(5,2) DEFAULT NULL,
  `Kelas` varchar(15) NOT NULL,
  `K` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datatraining`
--
-- ALTER TABLE `datatraining`
--  ADD PRIMARY KEY (`IdData`);

--
-- Indexes for table `datauji`
--
--ALTER TABLE `datauji`
 -- ADD PRIMARY KEY (`IdData`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datatraining`
--
--ALTER TABLE `datatraining`
--  MODIFY `IdData` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
