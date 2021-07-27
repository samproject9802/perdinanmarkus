-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2021 at 06:16 PM
-- Server version: 10.3.30-MariaDB-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adry2296_bubukkopilintong`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifikasi`
--

CREATE TABLE `tbl_notifikasi` (
  `id_notification` int(11) NOT NULL,
  `title_notification` text NOT NULL,
  `nama_pemesan` varchar(64) NOT NULL,
  `body_text` varchar(64) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_notifikasi`
--

INSERT INTO `tbl_notifikasi` (`id_notification`, `title_notification`, `nama_pemesan`, `body_text`, `status`) VALUES
(1, 'Order Masuk', 'Perdinan Markus Banjarnahor', 'telah melakukan pemesanan', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesan`
--

CREATE TABLE `tbl_pemesan` (
  `Kode_Pemesan` varchar(64) NOT NULL,
  `Nama_Pemesan` varchar(64) NOT NULL,
  `Alamat_Pemesan` varchar(64) NOT NULL,
  `Kode_Bubukkopi` int(11) NOT NULL,
  `Tanggal_Pemesan` datetime NOT NULL,
  `Jumlah_Pesanan` varchar(64) NOT NULL,
  `url_buktipembayaran` varchar(64) DEFAULT NULL,
  `status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pemesan`
--

INSERT INTO `tbl_pemesan` (`Kode_Pemesan`, `Nama_Pemesan`, `Alamat_Pemesan`, `Kode_Bubukkopi`, `Tanggal_Pemesan`, `Jumlah_Pesanan`, `url_buktipembayaran`, `status`) VALUES
('BKL2021713125646', 'Perdinan Markus Banjarnahor', 'Medan', 1, '2021-07-13 12:56:46', '2', '', 'Belum Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bubukkopilintong`
--

CREATE TABLE `tb_bubukkopilintong` (
  `Kode_Bubukkopi` int(11) NOT NULL,
  `Nama_Bubukkopi` varchar(64) NOT NULL,
  `Harga` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bubukkopilintong`
--

INSERT INTO `tb_bubukkopilintong` (`Kode_Bubukkopi`, `Nama_Bubukkopi`, `Harga`) VALUES
(1, 'Bubuk Kopi Lintong', '25000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `Id` varchar(64) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `level_user` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`Id`, `Password`, `level_user`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_notifikasi`
--
ALTER TABLE `tbl_notifikasi`
  ADD PRIMARY KEY (`id_notification`);

--
-- Indexes for table `tbl_pemesan`
--
ALTER TABLE `tbl_pemesan`
  ADD PRIMARY KEY (`Kode_Pemesan`);

--
-- Indexes for table `tb_bubukkopilintong`
--
ALTER TABLE `tb_bubukkopilintong`
  ADD PRIMARY KEY (`Kode_Bubukkopi`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_notifikasi`
--
ALTER TABLE `tbl_notifikasi`
  MODIFY `id_notification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_bubukkopilintong`
--
ALTER TABLE `tb_bubukkopilintong`
  MODIFY `Kode_Bubukkopi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
