-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 14, 2019 at 06:14 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ar_home`
--

-- --------------------------------------------------------

--
-- Table structure for table `dt_kontrakan`
--

CREATE TABLE `dt_kontrakan` (
  `id_kontrakan` int(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `foto_2` varchar(30) DEFAULT NULL,
  `foto_3` varchar(30) DEFAULT NULL,
  `waktu_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_pemilik` int(20) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `altitude` double NOT NULL,
  `harga` int(20) NOT NULL,
  `rating` int(20) NOT NULL,
  `status` enum('tersedia','tidak tersedia','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dt_kontrakan`
--

INSERT INTO `dt_kontrakan` (`id_kontrakan`, `nama`, `deskripsi`, `foto`, `foto_2`, `foto_3`, `waktu_post`, `id_pemilik`, `latitude`, `longitude`, `altitude`, `harga`, `rating`, `status`) VALUES
(1, 'Kontrakan Merpati', 'Kontrakan Merpati', 'splash-screen.jpg', 'admin.jpg', NULL, '2019-03-13 01:54:37', 2, 0.464921, 101.368403, 0, 343434, 0, 'tersedia'),
(2, 'Kontrakan Galau', 'Kontrakan Galau di Pekanbaru', 'splash-screen.jpg', NULL, NULL, '2019-03-10 13:37:48', 2, 0.465097, 101.362997, 0, 300000, 0, 'tersedia'),
(5, 'kontrakan bosan2', 'kontrakan bosan', 'splash-screen.jpg', 'splash-screen.jpg', 'splash-screen.jpg', '2019-03-10 13:37:54', 2, 0.464496, 101.35613, 0, 200000, 0, 'tersedia'),
(6, 'kontrakan ifvo', 'kontrakan punya ifvo', 'kontrakan_20190305_133232.jpg', 'kontrakan.jpg', 'kontrakan.jpg', '2019-03-10 13:37:59', 2, 0.44624197837857, 101.36747941375, 0, 700000, 0, 'tersedia'),
(7, 'kontrakan setia', 'kontrakan setia sekali', 'kontrakan_20190305_134653.jpg', 'dol.jpg', 'dol.jpg', '2019-03-10 13:38:03', 2, 0.44683137590936, 101.36757966131, 0, 100000, 0, 'tersedia'),
(8, 'kontrakan belibis', 'belibis', 'kontrakan_20190305_135256.jpg', 'foto.jpg', 'foto.jpg', '2019-03-10 13:38:08', 2, 0.44660942985952, 101.36759508401, 0, 1400000, 0, 'tersedia'),
(9, 'kontrakan semangat', 'kontrakan semangat', 'kontrakan_20190305_135703.jpg', 'foto.jpg', 'foto.jpg', '2019-03-10 13:38:11', 2, 0.44706002727093, 101.36679444462, 0, 737373, 0, 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `dt_kos`
--

CREATE TABLE `dt_kos` (
  `id_kos` int(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `foto_2` varchar(30) DEFAULT NULL,
  `foto_3` varchar(30) DEFAULT NULL,
  `waktu_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_pemilik` int(20) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `altitude` double NOT NULL,
  `harga` int(20) NOT NULL,
  `rating` int(20) NOT NULL,
  `status` enum('tersedia','tidak tersedia','tidak aktif') NOT NULL,
  `stok_kamar` int(20) NOT NULL,
  `jenis_kos` enum('laki laki','perempuan','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dt_kos`
--

INSERT INTO `dt_kos` (`id_kos`, `nama`, `deskripsi`, `foto`, `foto_2`, `foto_3`, `waktu_post`, `id_pemilik`, `latitude`, `longitude`, `altitude`, `harga`, `rating`, `status`, `stok_kamar`, `jenis_kos`) VALUES
(1, 'Kos bolong', 'Kos Marapalam Sakti Hebat sdsds', 'splash-screen.jpg', NULL, NULL, '2019-03-14 03:13:39', 2, 23233434, 23232334, 2323234, 323234, 0, 'tersedia', 1, 'laki laki'),
(3, 'Kos harimau', 'Kos Harimau', 'splash-screen.jpg', NULL, NULL, '2019-03-14 05:04:30', 2, 0.23233434, 0.23232334, 2323234, 11110, 0, 'tersedia', 10, 'laki laki'),
(4, 'Kos tes', 'Kos tes di Pekanbaru', 'foto.jpg', NULL, NULL, '2019-03-10 13:38:41', 2, 0.32323, 0.2323, 0, 400000, 0, 'tersedia', 9, 'laki laki'),
(5, 'Kos tes', 'Kos tes di Pekanbaru', 'foto.jpg', 'foto_2.jpg', 'foto_3.jpg', '2019-03-10 13:38:50', 2, 0.32323, 0.2323, 0, 400000, 0, 'tersedia', 9, 'laki laki'),
(6, 'Kos fs', 'kos fs', 'kos.jpg', 'kos.jpg', 'kos.jpg', '2019-03-10 13:39:16', 2, 0.47162525471303, 101.36506509036, 0, 101, 0, 'tersedia', 6, 'laki laki'),
(7, 'Kos pas', 'kos pas', 'kos_20190305_092846.jpg', 'jsjsjs.jpg', 'jshss.jpg', '2019-03-10 13:39:26', 2, 0.50639178697197, 101.4487124607, 0, 101, 0, 'tersedia', 6, 'laki laki'),
(8, 'Kos dos', 'kos dos', 'kos_20190305_093324.jpg', 'kos.jpg', 'kos.jpg', '2019-03-10 13:39:32', 2, 0.50646688589072, 101.44891630858, 0, 101, 0, 'tersedia', 7, 'laki laki'),
(9, 'Kos dimana', 'kos', 'kos_20190305_141147.jpg', 'foti.jpg', 'foto.jpg', '2019-03-10 13:39:41', 2, 0.50922442371008, 101.44891630858, 0, 101, 0, 'tersedia', 3, 'laki laki');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `authKey` varchar(50) NOT NULL,
  `accesToken` varchar(50) NOT NULL,
  `role` enum('SuperAdmin','Admin','','') NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `authKey`, `accesToken`, `role`, `foto`) VALUES
(1, 'admin', 'admin', 'admin-123456', '4dm1n', 'Admin', 'admin.jpg'),
(2, 'superAdmin', '123', 'asuper-admin-123456', 'super-4dm1n', 'SuperAdmin', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan_kontrakan`
--

CREATE TABLE `tb_pemesanan_kontrakan` (
  `id_pemesanan_kontrakan` int(20) NOT NULL,
  `id_pengguna` int(20) NOT NULL,
  `id_kontrakan` int(20) NOT NULL,
  `status` enum('booking','dalam pemesanan','selesai','') NOT NULL,
  `review` varchar(200) NOT NULL,
  `rating` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan_kos`
--

CREATE TABLE `tb_pemesanan_kos` (
  `id_pemesanan_kos` int(20) NOT NULL,
  `id_kos` int(20) NOT NULL,
  `id_pengguna` int(20) NOT NULL,
  `status` enum('booking','dalam pemesanan','selesai','') NOT NULL,
  `review` varchar(200) NOT NULL,
  `rating` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemesanan_kos`
--

INSERT INTO `tb_pemesanan_kos` (`id_pemesanan_kos`, `id_kos`, `id_pengguna`, `status`, `review`, `rating`) VALUES
(1, 1, 1, 'selesai', '', 0),
(2, 1, 1, 'selesai', '', 0),
(3, 3, 1, 'selesai', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemilik`
--

CREATE TABLE `tb_pemilik` (
  `id_pemilik` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `no_handphone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemilik`
--

INSERT INTO `tb_pemilik` (`id_pemilik`, `username`, `password`, `nama_lengkap`, `alamat`, `foto`, `no_handphone`) VALUES
(2, 'pemilik', '123', 'Pemilik', 'jalan buluh cina', 'foto.jpg', '232323'),
(3, 'pemilik-1', '123', 'pemilik-1', 'Jalan karya', 'hai.jpg', '0822222');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `no_handphone` varchar(20) NOT NULL,
  `status_memesan` enum('1','0','','') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `username`, `password`, `nama_lengkap`, `alamat`, `foto`, `no_handphone`, `status_memesan`) VALUES
(1, 'pengguna', '123', 'Pengguna', 'jalan buluh cina', 'foto.jpg', '232323', '0'),
(2, 'pemilik2', '123', 'pemilik2', 'jalan karya', 'harta.jpg', '54366546', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dt_kontrakan`
--
ALTER TABLE `dt_kontrakan`
  ADD PRIMARY KEY (`id_kontrakan`),
  ADD KEY `FK_kontrakanPemilik` (`id_pemilik`);

--
-- Indexes for table `dt_kos`
--
ALTER TABLE `dt_kos`
  ADD PRIMARY KEY (`id_kos`),
  ADD KEY `FK_kosPemilik` (`id_pemilik`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_pemesanan_kontrakan`
--
ALTER TABLE `tb_pemesanan_kontrakan`
  ADD PRIMARY KEY (`id_pemesanan_kontrakan`),
  ADD KEY `FK_pemesananKontrakan` (`id_pengguna`),
  ADD KEY `FK_pemesananKontrakan2` (`id_kontrakan`);

--
-- Indexes for table `tb_pemesanan_kos`
--
ALTER TABLE `tb_pemesanan_kos`
  ADD PRIMARY KEY (`id_pemesanan_kos`),
  ADD KEY `FK_pemesananKos` (`id_kos`),
  ADD KEY `FK_pemesananPengguna` (`id_pengguna`);

--
-- Indexes for table `tb_pemilik`
--
ALTER TABLE `tb_pemilik`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dt_kontrakan`
--
ALTER TABLE `dt_kontrakan`
  MODIFY `id_kontrakan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dt_kos`
--
ALTER TABLE `dt_kos`
  MODIFY `id_kos` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pemesanan_kontrakan`
--
ALTER TABLE `tb_pemesanan_kontrakan`
  MODIFY `id_pemesanan_kontrakan` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pemesanan_kos`
--
ALTER TABLE `tb_pemesanan_kos`
  MODIFY `id_pemesanan_kos` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pemilik`
--
ALTER TABLE `tb_pemilik`
  MODIFY `id_pemilik` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dt_kontrakan`
--
ALTER TABLE `dt_kontrakan`
  ADD CONSTRAINT `FK_kontrakanPemilik` FOREIGN KEY (`id_pemilik`) REFERENCES `tb_pemilik` (`id_pemilik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dt_kos`
--
ALTER TABLE `dt_kos`
  ADD CONSTRAINT `FK_kosPemilik` FOREIGN KEY (`id_pemilik`) REFERENCES `tb_pemilik` (`id_pemilik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pemesanan_kontrakan`
--
ALTER TABLE `tb_pemesanan_kontrakan`
  ADD CONSTRAINT `FK_pemesananKontrakan` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pemesananKontrakan2` FOREIGN KEY (`id_kontrakan`) REFERENCES `dt_kontrakan` (`id_kontrakan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pemesanan_kos`
--
ALTER TABLE `tb_pemesanan_kos`
  ADD CONSTRAINT `FK_pemesananKos` FOREIGN KEY (`id_kos`) REFERENCES `dt_kos` (`id_kos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pemesananPengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
