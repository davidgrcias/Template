-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2022 at 05:54 AM
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
-- Table structure for table `bgcolor`
--

CREATE TABLE `bgcolor` (
  `id_bgc` int(11) NOT NULL,
  `bgcolor_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bgcolor`
--

INSERT INTO `bgcolor` (`id_bgc`, `bgcolor_name`) VALUES
(1, 'bgc1.jpg'),
(2, 'bgc2.jpg'),
(3, 'bgc3.jpg'),
(4, 'bgc4.jpg'),
(5, 'bgc5.jpg'),
(6, 'bgc6.jpg');

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
(3, 'david@gmail.com', 'Ngabuburit ala anak-anak', 'Ngabuburit ala anak-anak - 2022.03.24 - 05.17.07am.jpg', 1),
(4, 'jannsen@gmail.com', 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `card_end`
--

CREATE TABLE `card_end` (
  `id_end` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `imageName` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `bgcolor` varchar(255) NOT NULL,
  `kepada` varchar(255) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `dari` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card_end`
--

INSERT INTO `card_end` (`id_end`, `card_id`, `imageName`, `image`, `bgcolor`, `kepada`, `isi`, `dari`) VALUES
(1, 3, 'Ngabuburit ala anak-anak', 'Ngabuburit ala anak-anak - 2022.03.24 - 05.17.07am.jpg', 'bgc1.jpg', 'Kepada', 'Meditasi 1. Berkat 1.', 'Dari'),
(2, 3, 'Ngabuburit ala anak-anak', 'Ngabuburit ala anak-anak - 2022.03.24 - 05.17.07am.jpg', 'bgc1.jpg', 'Kepada', 'Meditasi 1.', 'Dari'),
(3, 3, 'Ngabuburit ala anak-anak', 'Ngabuburit ala anak-anak - 2022.03.24 - 05.17.07am.jpg', 'bgc2.jpg', 'Kepada', 'Meditasi 5.', 'Dari'),
(4, 3, 'Ngabuburit ala anak-anak', 'Ngabuburit ala anak-anak - 2022.03.24 - 05.17.07am.jpg', 'bgc3.jpg', 'Kepada', 'Isi', 'Dari'),
(5, 3, 'Ngabuburit ala anak-anak', 'Ngabuburit ala anak-anak - 2022.03.24 - 05.17.07am.jpg', 'bgc4.jpg', 'Kepada', 'Meditasi 5. Berkat 4.', 'Dari'),
(6, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc5.jpg', 'Kepada', 'Meditasi 4. Berkat 2.', 'Dari'),
(7, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc6.jpg', 'Kepada', 'Meditasi 2. Berkat 3. Berkat 1.', 'Dari'),
(8, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc6.jpg', 'David', 'Meditasi 2. Berkat 3. Berkat 1.', 'James'),
(9, 3, 'Ngabuburit ala anak-anak', 'Ngabuburit ala anak-anak - 2022.03.24 - 05.17.07am.jpg', 'bgc4.jpg', 'Vincent', 'Meditasi 3. Berkat 5. Berkat 4. Berkat 2. Berkat 3. Berkat 1.', 'James'),
(10, 3, 'Ngabuburit ala anak-anak', 'Ngabuburit ala anak-anak - 2022.03.24 - 05.17.07am.jpg', 'bgc3.jpg', 'Kepada', 'Meditasi 4.', 'Dari'),
(11, 3, 'Ngabuburit ala anak-anak', 'Ngabuburit ala anak-anak - 2022.03.24 - 05.17.07am.jpg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(12, 3, 'Ngabuburit ala anak-anak', 'Ngabuburit ala anak-anak - 2022.03.24 - 05.17.07am.jpg', 'bgc4.jpg', 'Kepada', 'Isi', 'Dari'),
(13, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(14, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(15, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(16, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(17, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(18, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(19, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(20, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(21, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(22, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(23, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(24, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(25, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(26, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(27, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(28, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(29, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(30, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(31, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(32, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(33, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(34, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(35, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(36, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(37, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(38, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(39, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(40, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(41, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(42, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(43, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(44, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(45, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(46, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(47, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(48, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(49, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(50, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(51, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(52, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(53, 4, 'Bunga', 'Bunga - 2022.03.24 - 05.24.10am.jpeg', 'bgc1.jpg', 'Kepada', 'Isi', 'Dari'),
(54, 3, 'Ngabuburit ala anak-anak', 'Ngabuburit ala anak-anak - 2022.03.24 - 05.17.07am.jpg', 'bgc4.jpg', 'Kepada', 'Isi', 'Dari'),
(55, 3, 'Ngabuburit ala anak-anak', 'Ngabuburit ala anak-anak - 2022.03.24 - 05.17.07am.jpg', 'bgc4.jpg', 'Kepada ,nc', 'Meditasi 1. Berkat 2.', 'Dari David');

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE `data_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(18) NOT NULL,
  `password` varchar(200) NOT NULL,
  `notif` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_admin`
--

INSERT INTO `data_admin` (`id`, `email`, `username`, `password`, `notif`) VALUES
(1, 'admin2@gmail.com', 'admin2', '$2y$10$jw.Vuu7p.fMVwX1aNNaVhOo6NbpblaqKUvr1ouqd5DxzHZQXw21ai', 'y'),
(4, 'admin@gmail.com', 'admin', '$2y$10$CJ11hYTo4.SluItHjNhhkOdP2zAmJL68gg/iVnP9t52RItaFp6C.S', 'y'),
(8, 'admin3@gmail.com', 'admin3', '$2y$10$B1iIAuFxpPM3gcWx4Sr4zu6o.tz7ZEk39o9eb.hji2DyoorbS9inG', 'y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bgcolor`
--
ALTER TABLE `bgcolor`
  ADD PRIMARY KEY (`id_bgc`);

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
-- AUTO_INCREMENT for table `bgcolor`
--
ALTER TABLE `bgcolor`
  MODIFY `id_bgc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `card_end`
--
ALTER TABLE `card_end`
  MODIFY `id_end` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
