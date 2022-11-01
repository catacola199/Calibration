-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 04:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kalibrasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat_kalibrasi`
--

CREATE TABLE `alat_kalibrasi` (
  `id_alat` int(11) NOT NULL,
  `nama_alat` varchar(128) NOT NULL,
  `merk_alat` varchar(128) NOT NULL,
  `tipe_alat` varchar(128) NOT NULL,
  `noseri_alat` varchar(128) NOT NULL,
  `lokasi_alat` varchar(128) NOT NULL,
  `tglpengadaan_alat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alat_kalibrasi`
--

INSERT INTO `alat_kalibrasi` (`id_alat`, `nama_alat`, `merk_alat`, `tipe_alat`, `noseri_alat`, `lokasi_alat`, `tglpengadaan_alat`) VALUES
(6, 'asd', 'asd', 'asd', 'asd', 'asd', '01/11/2022');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` char(30) NOT NULL,
  `email_pengguna` varchar(40) NOT NULL,
  `telepon_pengguna` char(12) NOT NULL,
  `instansi_pengguna` varchar(50) DEFAULT NULL,
  `id_role` int(2) NOT NULL,
  `username_pengguna` varchar(20) NOT NULL,
  `password_pengguna` varchar(50) NOT NULL,
  `foto_pengguna` varchar(50) NOT NULL DEFAULT 'default.png',
  `terverifikasi` int(2) NOT NULL DEFAULT 0,
  `last_login` date NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `email_pengguna`, `telepon_pengguna`, `instansi_pengguna`, `id_role`, `username_pengguna`, `password_pengguna`, `foto_pengguna`, `terverifikasi`, `last_login`, `date_created`) VALUES
(1, 'Muhamad Yulianto', 'admin@admin.com', '00888089821', 'Hamma Creative', 1, 'admin', '66a8a3971e7e9e73318f028c15a83ecf54fd3797', 'Muhamad_Yulianto.png', 1, '2022-09-11', '2022-09-11'),
(5, 'rindah', 'rindahdwi@gmail.com', '08123123123', 'Trita', 2, 'rindah', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'default.jpg', 1, '0000-00-00', '2022-09-12'),
(12, 'Mimin', 'mimin@mail.com', '2313121212', 'HammaCreative', 3, 'mimin', '66a8a3971e7e9e73318f028c15a83ecf54fd3797', 'Mimin.png', 1, '0000-00-00', '2022-10-06'),
(13, 'delviroandikafurqon', 'delviro@gmail.com', '08123123123', 'Sri Intan Perkasa', 1, 'delviro', '7b2e9f54cdff413fcde01f330af6896c3cd7e6cd', 'delviro.jpg', 1, '0000-00-00', '2022-10-07'),
(0, 'tirta', 'tirta@gmail.com', '081231231231', 'tirta', 3, 'tirta', '9adcb29710e807607b683f62e555c22dc5659713', 'tirta.png', 0, '0000-00-00', '2022-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `p_kalibrasi`
--

CREATE TABLE `p_kalibrasi` (
  `id_pemeliharaan` int(10) NOT NULL,
  `tgl_pemeliharaan` varchar(122) NOT NULL,
  `id_alat` int(10) NOT NULL,
  `petugas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role_pengguna`
--

CREATE TABLE `role_pengguna` (
  `id_role` int(2) NOT NULL,
  `nama_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_pengguna`
--

INSERT INTO `role_pengguna` (`id_role`, `nama_role`) VALUES
(1, 'Superadmin'),
(2, 'Admin'),
(3, 'Pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `tes_qrcode`
--

CREATE TABLE `tes_qrcode` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tes_qrcode`
--

INSERT INTO `tes_qrcode` (`id`, `text`, `file`) VALUES
(1, 'adfadf', 'adfadf');

-- --------------------------------------------------------

--
-- Table structure for table `token_pengguna`
--

CREATE TABLE `token_pengguna` (
  `id_token` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `token` text NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_kalibrasi`
--

CREATE TABLE `t_kalibrasi` (
  `id_kalibrasi` int(10) NOT NULL,
  `id_alat` int(10) NOT NULL,
  `tgl_kalibrasi` varchar(100) NOT NULL,
  `lampiran` varchar(128) NOT NULL,
  `quality_pass` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_kalibrasi`
--

INSERT INTO `t_kalibrasi` (`id_kalibrasi`, `id_alat`, `tgl_kalibrasi`, `lampiran`, `quality_pass`) VALUES
(9, 6, '16/11/2022', 'default.pdf', 'Layak'),
(10, 6, '23/11/2022', 'default.pdf', 'Tidak Layak'),
(11, 6, '23/11/2022', 'default.pdf', 'Tidak Layak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat_kalibrasi`
--
ALTER TABLE `alat_kalibrasi`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `p_kalibrasi`
--
ALTER TABLE `p_kalibrasi`
  ADD PRIMARY KEY (`id_pemeliharaan`);

--
-- Indexes for table `tes_qrcode`
--
ALTER TABLE `tes_qrcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token_pengguna`
--
ALTER TABLE `token_pengguna`
  ADD PRIMARY KEY (`id_token`);

--
-- Indexes for table `t_kalibrasi`
--
ALTER TABLE `t_kalibrasi`
  ADD PRIMARY KEY (`id_kalibrasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat_kalibrasi`
--
ALTER TABLE `alat_kalibrasi`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `p_kalibrasi`
--
ALTER TABLE `p_kalibrasi`
  MODIFY `id_pemeliharaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tes_qrcode`
--
ALTER TABLE `tes_qrcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `token_pengguna`
--
ALTER TABLE `token_pengguna`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_kalibrasi`
--
ALTER TABLE `t_kalibrasi`
  MODIFY `id_kalibrasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
