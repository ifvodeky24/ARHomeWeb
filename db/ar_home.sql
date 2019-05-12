-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2019 at 11:53 AM
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
  `alamat` varchar(50) NOT NULL,
  `fasilitas` varchar(50) NOT NULL,
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
  `status` enum('Tersedia','Tidak Tersedia','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dt_kontrakan`
--

INSERT INTO `dt_kontrakan` (`id_kontrakan`, `nama`, `deskripsi`, `alamat`, `fasilitas`, `foto`, `foto_2`, `foto_3`, `waktu_post`, `id_pemilik`, `latitude`, `longitude`, `altitude`, `harga`, `rating`, `status`) VALUES
(0, 'Kontrakan Galau Sekali', 'Kontrakan Galau di Pekanbaru', 'Jalan Gajah', 'Lemari, dll', 'kontrakan_update_22.jpg', 'kontrakan_2__update22.jpg', 'kontrakan_3__update22.jpg', '2019-05-09 05:08:47', 2, 0.46817250000000143, 101.35546484375003, 0, 300000, 2, 'Tersedia'),
(1, 'Kontrakan Angsa', 'Kontrakan Angsa Super', 'Jalan Angsa Mengamuk', 'Lemari dan lain lain', 'splash-screen.jpg', 'splash-screen.jpg', 'splash-screen.jpg', '2019-04-11 07:42:46', 2, 0.445999, 101.364684, 0, 800000, 0, 'Tidak Tersedia'),
(7, 'kontrakan setia', 'kontrakan setia sekali', 'Jalan Gajah', 'Lemari, dll', 'kontrakan_20190305_134653.jpg', 'dol.jpg', 'dol.jpg', '2019-03-17 10:19:02', 2, 0.44683137590936, 101.36757966131, 0, 100000, 0, 'Tersedia'),
(8, 'kontrakan belibis', 'belibis', 'Jalan Gajah', 'Lemari, dll', 'kontrakan_20190305_135256.jpg', 'foto.jpg', 'foto.jpg', '2019-03-14 05:24:06', 2, 0.44660942985952, 101.36759508401, 0, 1400000, 0, 'Tersedia'),
(22, 'Kontrakan Semangat', 'Kontrakan Bersemangat', 'Jalan Semangat', 'Semangat', 'kontrakan_8.jpg', 'kontrakan_2_8.jpg', 'kontrakan_3_8.jpg', '2019-05-11 04:29:46', 3, 0.4473325000000088, 101.36491015624998, 0, 1000000, 0, 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `dt_kos`
--

CREATE TABLE `dt_kos` (
  `id_kos` int(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `fasilitas` varchar(50) NOT NULL,
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
  `status` enum('Tersedia','Tidak Tersedia','Tidak Aktif') NOT NULL,
  `stok_kamar` int(20) NOT NULL,
  `jenis_kos` enum('Pria','Wanita','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dt_kos`
--

INSERT INTO `dt_kos` (`id_kos`, `nama`, `deskripsi`, `alamat`, `fasilitas`, `foto`, `foto_2`, `foto_3`, `waktu_post`, `id_pemilik`, `latitude`, `longitude`, `altitude`, `harga`, `rating`, `status`, `stok_kamar`, `jenis_kos`) VALUES
(0, 'Kos Merasa Bahagia', 'Bahagia Sekali', 'Jalan Saja', 'Banyak', 'kos_update59.jpg', 'kos_2_update59.jpg', 'kos_3_update59.jpg', '2019-05-09 09:21:02', 2, 0.46826250000000147, 101.35556640625, 0, 200000, 0, 'Tersedia', 12, 'Pria'),
(1, 'Kos Angsa', 'Kos Angsa Super', 'Jalan Angsa Mengamuk', 'Lemari dan lain lain', 'splash-screen.jpg', 'splash-screen.jpg', 'splash-screen.jpg', '2019-05-01 10:19:32', 2, 0.477965, 101.360195, 2323234, 800000, 3, 'Tersedia', 1, 'Pria'),
(3, 'Kos harimau', 'Kos Harimau', 'Jalan Gajah', 'Lemari, dll', 'splash-screen.jpg', NULL, NULL, '2019-05-02 07:06:53', 3, 0.467307, 101.360797, 2323234, 11110, 3, 'Tersedia', 8, 'Wanita');

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
  `status` enum('Booking','Dalam Pemesanan','Selesai','') NOT NULL,
  `review` varchar(200) NOT NULL,
  `rating` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemesanan_kontrakan`
--

INSERT INTO `tb_pemesanan_kontrakan` (`id_pemesanan_kontrakan`, `id_pengguna`, `id_kontrakan`, `status`, `review`, `rating`) VALUES
(1, 1, 1, 'Selesai', 'bagus', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan_kos`
--

CREATE TABLE `tb_pemesanan_kos` (
  `id_pemesanan_kos` int(20) NOT NULL,
  `id_kos` int(20) NOT NULL,
  `id_pengguna` int(20) NOT NULL,
  `status` enum('Booking','Dalam Pemesanan','Selesai','') NOT NULL,
  `review` varchar(200) NOT NULL,
  `rating` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemesanan_kos`
--

INSERT INTO `tb_pemesanan_kos` (`id_pemesanan_kos`, `id_kos`, `id_pengguna`, `status`, `review`, `rating`) VALUES
(2, 3, 1, 'Selesai', 'good', 3),
(3, 1, 2, 'Selesai', 'nice', 1),
(4, 1, 2, 'Selesai', 'nice', 4),
(5, 1, 2, 'Selesai', 'nice', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemilik`
--

CREATE TABLE `tb_pemilik` (
  `id_pemilik` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `no_kk` int(30) DEFAULT NULL,
  `alamat` varchar(30) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `no_handphone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemilik`
--

INSERT INTO `tb_pemilik` (`id_pemilik`, `username`, `password`, `email`, `nama_lengkap`, `no_kk`, `alamat`, `foto`, `no_handphone`) VALUES
(2, 'pemilik', '123', 'pemilik@gmail.com', 'Pemilik', 2147483647, 'Jalan Tuah', 'admin.jpg', '082383396914'),
(3, 'pemilik-1', '123', 'pemilik-1@gmail.com', 'pemilik-1', NULL, 'Jalan karya', 'hai.jpg', '0822222');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `no_handphone` varchar(20) NOT NULL,
  `status_memesan` enum('1','0','','') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `username`, `password`, `email`, `nama_lengkap`, `alamat`, `foto`, `no_handphone`, `status_memesan`) VALUES
(1, 'pengguna', '1234', 'pengguna@gmail.com', 'Pengguna Saja', 'Jalan Tuah', 'pengguna_20190502_171118.jpg', '082383396914', '0'),
(2, 'bobo2', '123', 'boboooo@gmail.com', 'boboooo', 'jalan raya', 'foto.jpg', '0823675678', '0'),
(3, 'hajshaj', 'jajajsj', 'nansjsj', 'Jsjsjs', 'Jsjsjsj', 'pengguna_20190505_115311.jpg', '94949494', '0'),
(4, 'hai', '123456', 'hai@gmail.com', 'Hshshs', 'Hahaha', 'pengguna_20190505_115723.jpg', '949466464', '0'),
(5, 'jwjwjjsj', 'nansjsjsj', 'jajajsjs', 'Hsjsjsjs', 'Hsjsjsjs', 'pengguna_20190505_143313.jpg', '9494949494', '0');

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
  MODIFY `id_kontrakan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `dt_kos`
--
ALTER TABLE `dt_kos`
  MODIFY `id_kos` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pemesanan_kontrakan`
--
ALTER TABLE `tb_pemesanan_kontrakan`
  MODIFY `id_pemesanan_kontrakan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pemesanan_kos`
--
ALTER TABLE `tb_pemesanan_kos`
  MODIFY `id_pemesanan_kos` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pemilik`
--
ALTER TABLE `tb_pemilik`
  MODIFY `id_pemilik` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
