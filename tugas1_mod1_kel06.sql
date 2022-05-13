-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 01:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas1_mod1_kel06`
--

-- --------------------------------------------------------

--
-- Table structure for table `loginfo`
--

CREATE TABLE `loginfo` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginfo`
--

INSERT INTO `loginfo` (`id`, `username`, `password`) VALUES
(1, 'admin', '63a9f0ea7bb98050796b649e85481845');

-- --------------------------------------------------------

--
-- Table structure for table `minuman`
--

CREATE TABLE `minuman` (
  `id_minuman` int(3) NOT NULL,
  `nama_minuman` varchar(100) NOT NULL,
  `harga_minuman` int(15) NOT NULL,
  `is_delete` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `minuman`
--

INSERT INTO `minuman` (`id_minuman`, `nama_minuman`, `harga_minuman`, `is_delete`) VALUES
(0, 'es_sirup', 3000, b'0'),
(1, 'Es_Teh', 2000, b'0'),
(2, 'Es_Jeruk', 3000, b'0'),
(3, 'Es_Kopi', 3000, b'0'),
(4, 'Es_Thai_Tea', 8000, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `paketan`
--

CREATE TABLE `paketan` (
  `id_paketan` varchar(5) NOT NULL,
  `nama_paketan` varchar(100) NOT NULL,
  `harga_paketan` int(15) NOT NULL,
  `id_topping1` int(3) NOT NULL,
  `id_topping2` int(3) NOT NULL,
  `id_topping3` int(3) NOT NULL,
  `is_delete` bit(1) NOT NULL DEFAULT b'0',
  `id_minuman` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paketan`
--

INSERT INTO `paketan` (`id_paketan`, `nama_paketan`, `harga_paketan`, `id_topping1`, `id_topping2`, `id_topping3`, `is_delete`, `id_minuman`) VALUES
('A002', 'KerTelBak', 8000, 1, 2, 3, b'0', 1),
('A003', 'KerTelSos', 8000, 1, 2, 4, b'0', 1),
('B001', 'KerBakSos', 10000, 1, 3, 4, b'0', 2),
('B002', 'KerMakCek', 9000, 1, 9, 5, b'0', 2),
('B003', 'KerSosBal', 10000, 1, 4, 6, b'0', 3),
('C001', 'BakSosCek', 11000, 3, 4, 5, b'0', 3),
('C002', 'BakSosBal', 16000, 3, 4, 6, b'0', 4),
('C003', 'BakSosDum', 16000, 3, 4, 7, b'0', 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `paketanfix`
-- (See below for the actual view)
--
CREATE TABLE `paketanfix` (
`is_delete` bit(1)
,`id_paketan` varchar(5)
,`nama_paketan` varchar(100)
,`harga_paketan` int(15)
,`fld1` varchar(100)
,`fld2` varchar(100)
,`fld3` varchar(100)
,`nama_minuman` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `topping`
--

CREATE TABLE `topping` (
  `id_topping` int(3) NOT NULL,
  `nama_topping` varchar(100) NOT NULL,
  `harga_topping` int(15) NOT NULL,
  `is_delete` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topping`
--

INSERT INTO `topping` (`id_topping`, `nama_topping`, `harga_topping`, `is_delete`) VALUES
(1, 'Kerupuk', 2000, b'0'),
(2, 'Telur', 2000, b'0'),
(3, 'Bakso', 3000, b'0'),
(4, 'Sosis', 3000, b'0'),
(5, 'Ceker', 3000, b'0'),
(6, 'Balungan', 3000, b'0'),
(7, 'Cheese Dumpling', 3000, b'0'),
(8, 'Mie', 2000, b'0'),
(9, 'Makaroni', 2000, b'0');

-- --------------------------------------------------------

--
-- Structure for view `paketanfix`
--
DROP TABLE IF EXISTS `paketanfix`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `paketanfix`  AS  select `a`.`is_delete` AS `is_delete`,`a`.`id_paketan` AS `id_paketan`,`a`.`nama_paketan` AS `nama_paketan`,`a`.`harga_paketan` AS `harga_paketan`,`b`.`nama_topping` AS `fld1`,`c`.`nama_topping` AS `fld2`,`d`.`nama_topping` AS `fld3`,`e`.`nama_minuman` AS `nama_minuman` from ((((`paketan` `a` join `topping` `b` on(`a`.`id_topping1` = `b`.`id_topping` and `b`.`is_delete` = 0)) join `topping` `c` on(`a`.`id_topping2` = `c`.`id_topping` and `c`.`is_delete` = 0)) join `topping` `d` on(`a`.`id_topping3` = `d`.`id_topping` and `d`.`is_delete` = 0)) join `minuman` `e` on(`a`.`id_minuman` = `e`.`id_minuman` and `e`.`is_delete` = 0)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `minuman`
--
ALTER TABLE `minuman`
  ADD PRIMARY KEY (`id_minuman`);

--
-- Indexes for table `paketan`
--
ALTER TABLE `paketan`
  ADD PRIMARY KEY (`id_paketan`);

--
-- Indexes for table `topping`
--
ALTER TABLE `topping`
  ADD PRIMARY KEY (`id_topping`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `topping`
--
ALTER TABLE `topping`
  MODIFY `id_topping` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
