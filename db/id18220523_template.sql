-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2022 at 07:14 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18220523_template`
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
(1, 'vinsensutanto@gmail.com', 'SCK temp lebaran', 'SCK temp lebaran - 2022.04.22 - 06.58.24am.jpg', 1),
(2, 'vinsensutanto@gmail.com', 'SCK temp lebaran 3', 'SCK temp lebaran 3 - 2022.04.22 - 06.57.45am.jpg', 1),
(3, 'a@gmail.com', 'DAAI 1', 'DAAI 1 - 2022.04.22 - 06.27.47am.jpg', 1),
(13, 'vinsensutanto@gmail.com', 'Dark Green Theme ', 'Dark Green Theme  - 2022.04.17 - 05.39.37pm.png', 0),
(23, 'vinsensutanto@gmail.com', 'Hilly Palace ', 'Hilly Palace  - 2022.04.21 - 09.43.21am.png', 1),
(25, 'vinsensutanto@gmail.com', 'Rindu Rumah', 'Rindu Rumah - 2022.04.21 - 09.52.53am.png', 1),
(26, 'vinsensutanto@gmail.com', 'Leach Card', 'Leach Card - 2022.04.21 - 09.58.41am.png', 1),
(27, 'vinsensutanto@gmail.com', 'Ramadan Night', 'Ramadan Night - 2022.04.21 - 10.03.23am.png', 1),
(28, 'vinsensutanto@gmail.com', 'Green Mosque', 'Green Mosque - 2022.04.21 - 10.09.25am.png', 1),
(30, 'vinsensutanto@gmail.com', 'Warm Wishes', 'Warm Wishes - 2022.04.21 - 11.05.02am.png', 1),
(33, 'vinsensutanto@gmail.com', 'Eid Mubarak in Night with Golden Peace', 'Eid Mubarak in Night with Golden Peace - 2022.04.21 - 02.19.23pm.jpeg', 1),
(34, 'vinsensutanto@Gmail.com', 'The Circle of Ramadhan', 'The Circle of Ramadhan - 2022.04.21 - 02.24.41pm.png', 1),
(35, 'vinsensutanto@gmail.com', 'The Golden Ramadhan', 'The Golden Ramadhan - 2022.04.21 - 02.35.15pm.png', 1);

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
  `unique_name` varchar(10) NOT NULL,
  `card_color` varchar(25) NOT NULL,
  `text_color` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card_end`
--

INSERT INTO `card_end` (`id_end`, `card_id`, `kepada`, `isi`, `dari`, `unique_name`, `card_color`, `text_color`) VALUES
(1, 35, 'Ibu dan Bapak', 'Bulan suci Ramadan telah berlalu, fajar hari kemenangan tampak mewarnai langit, membawa sinar kedamaian dan kesucian. Mohon maaf lahir dan batin. Semoga kebaikan Ramadan terus terasa sepanjang tahun', 'Vincent Sutanto', 'eh1K1', '#F1E6B2', 'black');

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
(4, 'y', '619b9d9175715.png', 'admin@gmail.com', 'admin', '$2y$10$CJ11hYTo4.SluItHjNhhkOdP2zAmJL68gg/iVnP9t52RItaFp6C.S', '06 November 2021', 'May', '2023');

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
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `card_end`
--
ALTER TABLE `card_end`
  MODIFY `id_end` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
