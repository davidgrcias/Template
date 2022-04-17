-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2022 at 05:41 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `template`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `card_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `imageName` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `approval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`card_id`, `email`, `imageName`, `image`, `approval`) VALUES
(9, 'vinsensutanto@gmail.com', 'Eid Mubarak - mosque and moon in night time', 'Eid Mubarak - mosque and moon in night time - 2022.04.14 - 03.00.25am.png', 1),
(10, 'vinsensutanto@gmail.com', 'Green Hill', 'Green Hill - 2022.04.17 - 05.34.51pm.png', 1),
(11, 'vinsensutanto@gmail.com', 'Home', 'Home - 2022.04.17 - 05.35.21pm.png', 1),
(12, 'vinsensutanto@gmail.com', 'leach photo', 'leach photo - 2022.04.17 - 05.36.14pm.png', 1),
(13, 'vinsensutanto@gmail.com', 'Dark Green Theme ', 'Dark Green Theme  - 2022.04.17 - 05.39.37pm.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `card_end`
--

CREATE TABLE `card_end` (
  `id_end` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `kepada` varchar(255) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `dari` varchar(255) NOT NULL,
  `unique_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card_end`
--

INSERT INTO `card_end` (`id_end`, `card_id`, `kepada`, `isi`, `dari`, `unique_name`) VALUES
(1, 8, 'Kepada', 'Bulan Ramadan beranjak pergi, semoga kita semua kembali fitri. Di hari yang suci ini, semoga kita senantiasa diberikan ampunan dan diberkahi kegembiraan.', 'Dari', 'MfGkH'),
(2, 9, 'Kepada', 'Isi', 'Dari', 'aZ219'),
(3, 4, 'Kepada', 'Isi', 'Dari', 'w3ojO'),
(4, 9, 'Kepada', 'Isi', 'Dari', 'BbOZ7'),
(5, 9, 'Kepada', 'Isi', 'Dari', 'mLvVc'),
(6, 9, 'Kepada', 'Isi', 'Dari', 'VLsCF'),
(7, 9, 'Kepada', 'Isi', 'Dari', 'W6sS7'),
(8, 9, 'Kepada', 'Isi', 'Dari', 'wIlcu');

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE `data_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `notif` char(1) NOT NULL,
  `gallery` varchar(70) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(18) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tanggal` varchar(25) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_admin`
--

INSERT INTO `data_admin` (`id`, `notif`, `gallery`, `email`, `username`, `password`, `tanggal`, `bulan`, `tahun`) VALUES
(1, 'y', '6187405d5a6e0.jpg', 'admin2@gmail.com', 'admin2', '$2y$10$jw.Vuu7p.fMVwX1aNNaVhOo6NbpblaqKUvr1ouqd5DxzHZQXw21ai', '04 October 2021', 'semua', 'semua'),
(4, 'y', '619b9d9175715.png', 'admin@gmail.com', 'admin', '$2y$10$CJ11hYTo4.SluItHjNhhkOdP2zAmJL68gg/iVnP9t52RItaFp6C.S', '06 November 2021', 'May', '2023'),
(8, 'y', 'noprofil.jpg', 'admin3@gmail.com', 'admin3', '$2y$10$B1iIAuFxpPM3gcWx4Sr4zu6o.tz7ZEk39o9eb.hji2DyoorbS9inG', '03 February 2022', '', ''),
(9, 'y', 'noprofil.jpg', 'tes@gmail.com', 'tes', '$2y$10$tL8SWl/Ej4W7qC.N0c6F3Or7eOlbRn/MmzhqKHwh4z0BUuvLmT9NS', '12 April 2022', '', ''),
(10, 'y', 'noprofil.jpg', 'halo@gmail.com', 'halo', '$2y$10$FD/QTYv/c8JTeQPFMPFCbutkyFkE70y5uWgw.bvc1MM1PDwE3SztW', '12 April 2022', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `card_end`
--
ALTER TABLE `card_end`
  ADD PRIMARY KEY (`id_end`);

--
-- Indexes for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `card_end`
--
ALTER TABLE `card_end`
  MODIFY `id_end` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
