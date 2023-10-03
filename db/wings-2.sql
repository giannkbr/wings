-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 03, 2023 at 05:16 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wings`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_code` varchar(18) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `price` int(6) NOT NULL,
  `currency` varchar(5) NOT NULL,
  `disc` int(6) NOT NULL,
  `dimension` varchar(50) NOT NULL,
  `unit` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_code`, `product_name`, `price`, `currency`, `disc`, `dimension`, `unit`) VALUES
('GVBR', 'Giv Biru', 11000, 'IDR', 0, '2 cm x 3 cm', 'PCS'),
('SKJND', 'Mie Sedap', 200000, 'IDR', 90, '10 x 20 cm', 'PCS'),
('SKUSKILNL', 'So Klin Liquid', 18000, 'IDR', 50, '13 cm x 10 cm', 'PCS'),
('SKUSKILNP', 'SO klin Pewangi', 13500, 'IDR', 10, '13 cm x 10 cm', 'PCS'),
('TSTPRD', 'Product Test', 90000, 'IDR', 10, '10 x 10 cm', 'PCS');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `document_number` int(10) NOT NULL,
  `document_code` varchar(12) NOT NULL,
  `product_code` varchar(18) NOT NULL,
  `price` int(6) NOT NULL,
  `quantity` int(6) NOT NULL,
  `unit` varchar(5) NOT NULL,
  `sub_total` int(10) NOT NULL,
  `currency` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`document_number`, `document_code`, `product_code`, `price`, `quantity`, `unit`, `sub_total`, `currency`) VALUES
(1, '696268648590', 'GVBR', 11000, 1, 'PCS', 11000, 'IDR'),
(2, '696268648590', 'GVBR', 11000, 1, 'PCS', 11000, 'IDR'),
(3, '696268729743', 'GVBR', 11000, 1, 'PCS', 11000, 'IDR'),
(4, '696268950360', 'SKUSKILNL', 18000, 1, 'PCS', 18000, 'IDR'),
(5, '696268990612', 'SKUSKILNP', 12150, 1, 'PCS', 12150, 'IDR'),
(6, '696269052330', 'GVBR', 11000, 1, 'PCS', 11000, 'IDR'),
(7, '696269061597', 'GVBR', 11000, 1, 'PCS', 11000, 'IDR'),
(8, '696269162100', 'SKUSKILNP', 12150, 1, 'PCS', 12150, 'IDR'),
(9, '696269226283', 'SKUSKILNP', 12150, 1, 'PCS', 12150, 'IDR'),
(10, '696269390219', 'SKJND', 20000, 1, 'PCS', 20000, 'IDR'),
(11, '696269459536', 'GVBR', 11000, 1, 'PCS', 11000, 'IDR'),
(12, '696269459536', 'SKUSKILNL', 18000, 1, 'PCS', 18000, 'IDR'),
(13, '696269459536', 'SKUSKILNP', 12150, 1, 'PCS', 12150, 'IDR'),
(14, '696269459536', 'SKJND', 20000, 1, 'PCS', 20000, 'IDR'),
(15, '696269528205', 'GVBR', 11000, 1, 'PCS', 11000, 'IDR'),
(16, '696269862694', 'GVBR', 11000, 1, 'PCS', 11000, 'IDR'),
(17, '696269952895', 'SKUSKILNP', 12150, 1, 'PCS', 12150, 'IDR'),
(18, '696270161059', 'GVBR', 11000, 1, 'PCS', 11000, 'IDR'),
(19, '696307961546', 'SKJND', 20000, 5, 'PCS', 100000, 'IDR'),
(20, '696308201410', 'TSTPRD', 81000, 1, 'PCS', 81000, 'IDR'),
(21, '696309352370', 'GVBR', 11000, 1, 'PCS', 11000, 'IDR');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_header`
--

CREATE TABLE `transaction_header` (
  `document_code` varchar(12) NOT NULL,
  `user` varchar(50) NOT NULL,
  `total` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_header`
--

INSERT INTO `transaction_header` (`document_code`, `user`, `total`, `date`) VALUES
('696268648590', 'admin', 0, '2023-10-03'),
('696268729743', 'admin', 11000, '2023-10-03'),
('696268950360', 'admin', 18000, '2023-10-03'),
('696268990612', 'admin', 12150, '2023-10-03'),
('696269052330', 'admin', 11000, '2023-10-03'),
('696269061597', 'admin', 11000, '2023-10-03'),
('696269162100', 'admin', 12150, '2023-10-03'),
('696269226283', 'admin', 12150, '2023-10-03'),
('696269390219', 'admin', 20000, '2023-10-03'),
('696269459536', 'admin', 61150, '2023-10-03'),
('696269528205', 'admin', 11000, '2023-10-03'),
('696269862694', 'admin', 0, '2023-10-03'),
('696269952895', 'admin', 12150, '2023-10-03'),
('696270161059', 'admin', 11000, '2023-10-03'),
('696307961546', 'admin', 100000, '2023-10-03'),
('696308201410', 'admin', 81000, '2023-10-03'),
('696309352370', 'test', 11000, '2023-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `no_telp`, `role`, `password`, `created_at`, `foto`, `is_active`) VALUES
(1, 'admin', 'admin', 'admin@mail.com', '', 'admin', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', '2023-10-03 00:08:03', '', 1),
(2, 'test', 'test', 'test@mail.com', '21321', 'user', '$2y$10$W0pd6ozhPwAIvEwFlEyxKOlYAGJ3B7qtypqdXgKelv4.ym66EIr2W', '0000-00-00 00:00:00', 'user.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_code`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`document_number`),
  ADD KEY `product_code` (`product_code`),
  ADD KEY `document_code` (`document_code`);

--
-- Indexes for table `transaction_header`
--
ALTER TABLE `transaction_header`
  ADD PRIMARY KEY (`document_code`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `nama` (`nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `document_number` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `transaction_detail_ibfk_1` FOREIGN KEY (`product_code`) REFERENCES `product` (`product_code`),
  ADD CONSTRAINT `transaction_detail_ibfk_2` FOREIGN KEY (`document_code`) REFERENCES `transaction_header` (`document_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
