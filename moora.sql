-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 18, 2024 at 04:46 AM
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
-- Table structure for table `detail_hasil`
--

CREATE TABLE `detail_hasil` (
  `id_detail_hasil` int(11) NOT NULL,
  `id_hasil` int(11) NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL,
  `hasil_akhir` double NOT NULL,
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_hasil`
--

INSERT INTO `detail_hasil` (`id_detail_hasil`, `id_hasil`, `nama_alternatif`, `hasil_akhir`, `ranking`) VALUES
(6, 5, 'Xiaomi Note 8', 55.523638381196, 1),
(7, 5, 'Vivo y12s', 49.083142821834, 2),
(8, 5, 'Oppo a15', 44.361213904246, 3),
(9, 5, 'Realme c15', 42.863765359989, 4),
(10, 5, 'Samsung Galaxy A24', 19.751030624804, 5),
(11, 6, 'Xiaomi Note 8', 56.489203467027, 1),
(12, 6, 'Oppo a15', 45.326778990078, 2),
(13, 6, 'Vivo y12s', 43.867482529975, 3),
(14, 6, 'Realme c15', 43.82933044582, 4),
(15, 6, 'Samsung Galaxy A24', 20.233813167719, 5),
(16, 7, 'Xiaomi Note 8', 53.305225141122, 1),
(17, 7, 'Vivo y12s', 50.875567526976, 2),
(18, 7, 'Oppo a15', 44.409924028231, 3),
(19, 7, 'Realme c15', 42.614948612811, 4),
(20, 7, 'Samsung Galaxy A24', 20.421361065636, 5),
(21, 8, 'Oppo a15', 100, 1),
(22, 9, 'Oppo a15', 100, 1),
(23, 10, 'Oppo a15', 100, 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `nama_uji` varchar(255) DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `nama_uji`, `tanggal`) VALUES
(8, 'Array', '2024-03-17 21:23:29'),
(10, 'oppo 2', '2024-03-17 21:28:07');

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
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama`, `username`, `password`, `role`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'Kepala Toko', 'keptok', '4719eb3ba1367894ab3194a678b77a0d', 'kepala toko');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_hasil`
--
ALTER TABLE `detail_hasil`
  ADD PRIMARY KEY (`id_detail_hasil`);

--
-- Indexes for table `handphone`
--
ALTER TABLE `handphone`
  ADD PRIMARY KEY (`id_handphone`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

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
-- AUTO_INCREMENT for table `detail_hasil`
--
ALTER TABLE `detail_hasil`
  MODIFY `id_detail_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `handphone`
--
ALTER TABLE `handphone`
  MODIFY `id_handphone` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
