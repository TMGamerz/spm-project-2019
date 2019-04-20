-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2019 at 05:41 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spm`
--
CREATE DATABASE IF NOT EXISTS `spm` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `spm`;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `KodItem` varchar(11) NOT NULL,
  `NamaItem` varchar(256) NOT NULL,
  `KodPembekal` varchar(11) DEFAULT NULL,
  `HargaPerItem` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`KodItem`, `NamaItem`, `KodPembekal`, `HargaPerItem`) VALUES
('I00005', 'Seragam Sekolah', 'P0002', '30.00'),
('I00035', 'Fail A4', 'P0001', '2.00'),
('I00065', 'Pen Biru', 'P0001', '1.20'),
('I00075', 'Kertas A4', 'P0001', '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `jualan`
--

DROP TABLE IF EXISTS `jualan`;
CREATE TABLE `jualan` (
  `KodJualan` int(11) NOT NULL,
  `TarikhJualan` date NOT NULL,
  `KodItem` varchar(11) DEFAULT NULL,
  `KuantitiItemDijual` int(255) NOT NULL,
  `HargaJualan` decimal(8,2) NOT NULL,
  `IDPengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jualan`
--

INSERT INTO `jualan` (`KodJualan`, `TarikhJualan`, `KodItem`, `KuantitiItemDijual`, `HargaJualan`, `IDPengguna`) VALUES
(1, '2018-09-01', 'I00035', 5, '15.00', 1),
(2, '2018-09-01', 'I00065', 20, '40.00', 2),
(3, '2018-09-07', 'I00005', 15, '600.00', 1),
(4, '2018-09-11', 'I00075', 3, '19.50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembekal`
--

DROP TABLE IF EXISTS `pembekal`;
CREATE TABLE `pembekal` (
  `KodPembekal` varchar(11) NOT NULL,
  `NamaPembekal` varchar(256) NOT NULL,
  `TelefonPembekal` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembekal`
--

INSERT INTO `pembekal` (`KodPembekal`, `NamaPembekal`, `TelefonPembekal`) VALUES
('P0001', 'Cahaya Alat Tulis Co.', '04-6795678'),
('P0002', 'Gemilang Sdn. Bhd.', '04-6557410');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna` (
  `IDPengguna` int(11) NOT NULL,
  `NamaPengguna` varchar(256) NOT NULL,
  `KataLaluan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`IDPengguna`, `NamaPengguna`, `KataLaluan`) VALUES
(1, 'Wong Wei Li', '$2y$10$ewuOB9aPIGGBE5doPgU5jeZcbuwo9wj.eULPAcrpIKxBT7k66kHLC'),
(2, 'Ong Xia Jun', '$2y$10$/SDJw/v7JMasCFcpWvBBi.oe4nsMSNV18wv.eSO9rzzbvwQ9v27bW'),
(3, '1', '$2y$10$0O8XHFgCGTALuIAUMln7XeGsTj4Z5xc4l0qpn93vv9qMwOuExYSOm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`KodItem`),
  ADD KEY `KodPembekal` (`KodPembekal`);

--
-- Indexes for table `jualan`
--
ALTER TABLE `jualan`
  ADD PRIMARY KEY (`KodJualan`),
  ADD KEY `KodItem` (`KodItem`),
  ADD KEY `IDPengguna` (`IDPengguna`);

--
-- Indexes for table `pembekal`
--
ALTER TABLE `pembekal`
  ADD PRIMARY KEY (`KodPembekal`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`IDPengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jualan`
--
ALTER TABLE `jualan`
  MODIFY `KodJualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `IDPengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`KodPembekal`) REFERENCES `pembekal` (`KodPembekal`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `jualan`
--
ALTER TABLE `jualan`
  ADD CONSTRAINT `jualan_ibfk_1` FOREIGN KEY (`KodItem`) REFERENCES `item` (`KodItem`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `jualan_ibfk_2` FOREIGN KEY (`IDPengguna`) REFERENCES `pengguna` (`IDPengguna`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
