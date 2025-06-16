-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2025 at 08:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `knnwarna`
--

-- --------------------------------------------------------

--
-- Table structure for table `datatraining`
--

CREATE TABLE `datatraining` (
  `IdData` int(11) NOT NULL,
  `Kecerahan` double(5,2) DEFAULT NULL,
  `Kejenuhan` double(5,2) DEFAULT NULL,
  `Kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datatraining0`
--

CREATE TABLE `datatraining0` (
  `IdData` int(11) NOT NULL,
  `Kecerahan` double(5,2) DEFAULT NULL,
  `Kejenuhan` double(5,2) DEFAULT NULL,
  `Kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datatraining0`
--

INSERT INTO `datatraining0` (`IdData`, `Kecerahan`, `Kejenuhan`, `Kelas`) VALUES
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
  `IdData` int(11) NOT NULL,
  `Kecerahan` double(5,2) DEFAULT NULL,
  `Kejenuhan` double(5,2) DEFAULT NULL,
  `Kelas` varchar(15) DEFAULT NULL,
  `K` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datauji`
--

INSERT INTO `datauji` (`IdData`, `Kecerahan`, `Kejenuhan`, `Kelas`, `K`) VALUES
(2, 50.00, 50.00, 'Biru', 5),
(3, 20.00, 35.00, 'Merah', 5),
(4, 40.00, 70.00, 'Biru', 5);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `IdData` int(2) NOT NULL,
  `Jarak` double(5,2) DEFAULT NULL,
  `Kelas` varchar(15) DEFAULT NULL,
  `Jumlah` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `IdKelas` int(11) NOT NULL,
  `Kelas` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`IdKelas`, `Kelas`) VALUES
(1, 'Merah'),
(2, 'Biru'),
(3, 'Kuning'),
(4, 'Ungu'),
(5, 'Hitam'),
(6, 'hijau');

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan`
--

CREATE TABLE `perhitungan` (
  `IdData` int(2) NOT NULL,
  `Kecerahan` double(5,2) DEFAULT NULL,
  `Kejenuhan` double(5,2) DEFAULT NULL,
  `Jarak` double(5,2) DEFAULT NULL,
  `Kelas` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datatraining`
--
ALTER TABLE `datatraining`
  ADD PRIMARY KEY (`IdData`);

--
-- Indexes for table `datatraining0`
--
ALTER TABLE `datatraining0`
  ADD PRIMARY KEY (`IdData`);

--
-- Indexes for table `datauji`
--
ALTER TABLE `datauji`
  ADD PRIMARY KEY (`IdData`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD KEY `IdData` (`IdData`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`IdKelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datatraining`
--
ALTER TABLE `datatraining`
  MODIFY `IdData` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datatraining0`
--
ALTER TABLE `datatraining0`
  MODIFY `IdData` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `datauji`
--
ALTER TABLE `datauji`
  MODIFY `IdData` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `IdKelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
