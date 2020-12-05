-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2020 at 04:11 PM
-- Server version: 5.7.32-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hak_akses` varchar(15) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `nama`, `hak_akses`, `last_login`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin', '2020-11-29 16:08:35'),
(2, 'sadmin', 'sadmin', 'Super Admin', 'sadmin', '2020-11-24 09:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_conf`
--

CREATE TABLE `tbl_conf` (
  `id_conf` int(11) NOT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `alamat_instansi` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `nama_aplikasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_conf`
--

INSERT INTO `tbl_conf` (`id_conf`, `nama_instansi`, `alamat_instansi`, `deskripsi`, `nama_aplikasi`) VALUES
(0, 'DNT Cell', 'Jogjatronik', 'Aplikasi Rekomendasi Pemilihan Smartphone', 'Sistem Rekomendasi Pemilihan Smartphone');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_smartphone`
--

CREATE TABLE `tbl_smartphone` (
  `id` int(11) NOT NULL,
  `merk` varchar(15) NOT NULL,
  `seri` varchar(15) NOT NULL,
  `display` varchar(5) NOT NULL,
  `kamera_depan` varchar(15) NOT NULL,
  `kamera_belakang` varchar(15) NOT NULL,
  `ram` varchar(15) NOT NULL,
  `rom` varchar(15) NOT NULL,
  `cpu` varchar(25) NOT NULL,
  `chipset` varchar(15) NOT NULL,
  `os` varchar(15) NOT NULL,
  `baterai` varchar(15) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_smartphone`
--

INSERT INTO `tbl_smartphone` (`id`, `merk`, `seri`, `display`, `kamera_depan`, `kamera_belakang`, `ram`, `rom`, `cpu`, `chipset`, `os`, `baterai`, `harga`, `foto`) VALUES
(1, 'SAMSUNG', 'S10 Lite', '6.7', '32', '48+12+5', '6/8', '128', 'Octa-core 2.84', 'Snapdragon 855', '10.0', 'Li-po, 4500', '7499000', 'SAMSUNG_S10_Lite.jpg'),
(2, 'SAMSUNG', 'Note 10', '6.3', '10', '12+12+16', '8', '256', 'Octa-core 2.84', 'Exynos 9825', '9.0', 'Li-po, 3500', '13499000', 'SAMSUNG_Note_10.jpg'),
(42, 'SAMSUNG', 'S10', '6.1', '10', '12+12+16', '8', '128', 'Octa-core 2.8', 'Exynos 9820', '9.0', 'Li-ion, 3400', '8500000', 'SAMSUNG_S10.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_conf`
--
ALTER TABLE `tbl_conf`
  ADD PRIMARY KEY (`id_conf`);

--
-- Indexes for table `tbl_smartphone`
--
ALTER TABLE `tbl_smartphone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_smartphone`
--
ALTER TABLE `tbl_smartphone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
