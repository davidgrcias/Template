-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 04:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
  `color_id` int(11) NOT NULL,
  `approval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`card_id`, `email`, `imageName`, `image`, `color_id`, `approval`) VALUES
(3, 'david@gmail.com', 'Ngabuburit ala anak-anak', 'Ngabuburit ala anak-anak - 2022.03.24 - 05.17.07am.jpg', 1, 1),
(4, 'jannsen@gmail.com', 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `color`) VALUES
(1, 'Putih'),
(2, 'Pink');

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
(8, 'y', 'noprofil.jpg', 'admin3@gmail.com', 'admin3', '$2y$10$B1iIAuFxpPM3gcWx4Sr4zu6o.tz7ZEk39o9eb.hji2DyoorbS9inG', '03 February 2022', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `tanggal` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id`, `nama`, `email`, `tanggal`) VALUES
(259, 'John Doe', 'johndoe@gmail.com', '25 January 2022'),
(260, 'Tom Cruise', 'tomcruise@gmail.com', '27 January 2022'),
(261, 'Mel Gibson', 'gibson@gmail.com', '30 January 2022'),
(262, 'Johnson', 'johnson@gmail.com', '01 February 2022'),
(263, 'Luca', 'luca@gmail.com', '03 February 2022');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `jenis`, `harga`) VALUES
(5, 'Besi', '15000'),
(9, 'Plastik', '10000'),
(10, 'Kertas', '3000'),
(11, 'Plastik', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `sampah`
--

CREATE TABLE `sampah` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `jenis` int(11) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `totalharga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sampah`
--

INSERT INTO `sampah` (`id`, `iduser`, `tanggal`, `area`, `jenis`, `jumlah`, `totalharga`) VALUES
(18, 261, '03 February 2022', 'Bogor', 9, '666', '210000'),
(19, 261, '02 February 2022', 'Medan', 5, '12', '180000'),
(20, 263, '03 February 2022', 'Jakarta Pusat', 5, '30', '450000'),
(23, 261, '03 February 2022', 'Denpasar', 11, '21', '105000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `iduser` (`iduser`,`jenis`),
  ADD KEY `sampah_ibfk_2` (`jenis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sampah`
--
ALTER TABLE `sampah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sampah`
--
ALTER TABLE `sampah`
  ADD CONSTRAINT `sampah_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `data_user` (`id`),
  ADD CONSTRAINT `sampah_ibfk_2` FOREIGN KEY (`jenis`) REFERENCES `jenis` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
