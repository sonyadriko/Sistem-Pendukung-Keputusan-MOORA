-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 07, 2024 at 02:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moora`
--

-- --------------------------------------------------------

--
-- Table structure for table `handphone`
--

CREATE TABLE `handphone` (
  `id_handphone` int(11) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `daya_tahan` varchar(255) NOT NULL,
  `sistem_operasi` varchar(255) NOT NULL,
  `ram` varchar(255) NOT NULL,
  `tahun_launching` varchar(255) NOT NULL,
  `memori_internal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `handphone`
--

INSERT INTO `handphone` (`id_handphone`, `merk`, `harga`, `daya_tahan`, `sistem_operasi`, `ram`, `tahun_launching`, `memori_internal`) VALUES
(1, 'Vivo y12s', '1899000', '5000', 'Android 9.0 (Pie)', '3GB/4GB', '2020/2021', '32GB/64GB'),
(2, 'Realme c15', '1999000', '6000', 'Android 10 (Q)', '3GB/4GB', '2020/2021', '32GB/64GB'),
(3, 'Xiaomi Note 8', '1300000', '4000', 'Android 9.0 (Pie)', '3GB/4GB', '2018/2019', '32GB/64GB'),
(5, 'Oppo a15', '2000000', '4230', 'Android 10 (Q)', '2GB/3GB', '2020/2021', '32GB/64GB'),
(6, 'Samsung Galaxy A24', '3000000', '5000', 'Android 12', '8GB/12GB', '2022/2023', '128GB/256GB');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `bobot_kriteria` int(11) NOT NULL,
  `tipe_kriteria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `tipe_kriteria`) VALUES
(1, 'harga', 30, 'cost'),
(2, 'daya tahan', 15, 'cost'),
(3, 'sistem operasi', 20, 'cost'),
(4, 'ram', 15, 'cost'),
(5, 'tahun launching', 5, 'cost'),
(6, 'memori internal', 15, 'cost');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `handphone`
--
ALTER TABLE `handphone`
  ADD PRIMARY KEY (`id_handphone`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `handphone`
--
ALTER TABLE `handphone`
  MODIFY `id_handphone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
