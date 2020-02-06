-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2020 at 09:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_import_excel`
--

-- --------------------------------------------------------

--
-- Table structure for table `userpea`
--

CREATE TABLE `userpea` (
  `id_pea` int(11) NOT NULL,
  `username` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Department` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Position` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `levelpea` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userpea`
--

INSERT INTO `userpea` (`id_pea`, `username`, `name`, `lastname`, `Department`, `Position`, `levelpea`) VALUES
(1, 505972, 'สุภัทรา', 'มณีโชติ', 'ผสบ./กรท./ฝบพ.(ก1)/กฟก.1/รผก.(ภ3)/ผวก.', 'นรค.', 'ระดับ 5'),
(2, 505972, 'สุภัทรา', 'มณีโชติ', 'ผสบ./กรท./ฝบพ.(ก1)/กฟก.1/รผก.(ภ3)/ผวก.', 'นรค.', 'ระดับ 5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userpea`
--
ALTER TABLE `userpea`
  ADD PRIMARY KEY (`id_pea`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userpea`
--
ALTER TABLE `userpea`
  MODIFY `id_pea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
