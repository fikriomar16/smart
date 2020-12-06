-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2020 at 05:01 PM
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
(1, 'admin', 'admin', 'Admin', 'admin', '2020-12-06 21:39:40'),
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
(42, 'SAMSUNG', 'S10', '6.1', '10', '12+12+16', '8', '128', 'Octa-core 2.8', 'Exynos 9820', '9.0', 'Li-ion, 3400', '8500000', 'SAMSUNG_S10.jpg'),
(43, 'SAMSUNG', 'Note 10+', '6.8', '10', '12+12+16', '12', '256 / 512', 'Octa-core 2.84', 'Exynos 9825', '9.0', 'Li-po, 4300', '11250000', 'SAMSUNG_Note_10+.jpg'),
(44, 'SAMSUNG', 'S10+', '6.4', '10+8', '12+12+16', '8/12', '128/512/1024', 'Octa-core 2.8', 'Exynos 9820', '9.0', 'Li-po, 4100', '14300000', 'SAMSUNG_S10+.jpeg'),
(45, 'SAMSUNG', 'S10e', '5.8', '10', '12+16', '6', '128', 'Octa-core 2.8', 'Exynos 9820', '9.0', 'Li-po, 3100', '8000000', 'SAMSUNG_S10e.jpg'),
(46, 'SAMSUNG', 'A91', '6.7', '32', '48+12+5', '8', '128', 'Octa-core 2.84', 'Snapdragon 855', '10.0', 'Li-po, 4500', '6000000', 'SAMSUNG_A91.png'),
(47, 'SAMSUNG', 'A51', '6.5', '32', '48+12+5', '4/6', '64/128', 'Octa-core 2.3', 'Exynos 9611', '10.0', 'Li-po, 4000', '4400000', 'SAMSUNG_A51.jpg'),
(48, 'SAMSUNG', 'A71', '6.7', '32', '64+12+5+5', '6/8', '128', 'Octa-core 2.2', 'Snapdragon 730', '10.0', 'Li-po, 4500', '5700000', 'SAMSUNG_A71.jpg'),
(49, 'SAMSUNG', 'A50s', '6.4', '32', '48+8+5', '4/6', '64/128', 'Octa-core 2.3', 'Exynos 9611', '9.0', 'Li-po, 4000', '4900000', 'SAMSUNG_A50s.jpg'),
(50, 'SAMSUNG', 'M30s', '6.4', '16', '48+8+5', '4/6', '64/128', 'Octa-core 2.3', 'Exynos 9611', '9.0', 'Li-po, 6000', '3150000', 'SAMSUNG_M30s.jpg'),
(51, 'SAMSUNG', 'A80', '6.3', '-', '48+8', '8', '128', 'Octa-core 2.0', 'Snapdragon 986', '9.0', 'Li-on, 3700', '12065000', 'SAMSUNG_A80.jpg'),
(52, 'SAMSUNG', 'A10s', '6.2', '8', '13+2', '2', '32', 'Octa-core 2.0', 'MTK Helio p22', '9.0', 'Li-po, 4000', '2600000', 'SAMSUNG_A10s.jpg'),
(53, 'SAMSUNG', 'A20s', '6.5', '8', '13+8+5', '3/4', '64', 'Octa-core 1.8', 'Snapdragon 458', '9.0', 'Li-po, 4000', '2600000', 'SAMSUNG_A20s.jpg'),
(54, 'SAMSUNG', 'A30s', '6.4', '16', '25+5+8', '4', '64', 'Octa-core 1.8', 'Exynos 7904', '9.0', 'Li-po, 4000', '3300000', 'SAMSUNG_A30s.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
