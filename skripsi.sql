-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 04:54 PM
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
(1, 'admin', 'admin', 'Admin', 'admin', '2020-12-07 20:20:01'),
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
(1, 'SAMSUNG', 'S10 Lite', '6.7', '32', '48+12+5', '6', '128', 'Octa-core 2.84', 'Snapdragon 855', '10', '4500', '7499000', 'SAMSUNG_S10_Lite.jpg'),
(2, 'SAMSUNG', 'Note 10', '6.3', '10', '12+12+16', '8', '256', 'Octa-core 2.84', 'Exynos 9825', '9', '3500', '13499000', 'SAMSUNG_Note_10.jpg'),
(42, 'SAMSUNG', 'S10', '6.1', '10', '12+12+16', '8', '128', 'Octa-core 2.8', 'Exynos 9820', '9', '3400', '8500000', 'SAMSUNG_S10.jpg'),
(43, 'SAMSUNG', 'Note 10+', '6.8', '10', '12+12+16', '12', '256', 'Octa-core 2.84', 'Exynos 9825', '9', '4300', '11250000', 'SAMSUNG_Note_10+.jpg'),
(44, 'SAMSUNG', 'S10+', '6.4', '10+8', '12+12+16', '12', '1024', 'Octa-core 2.8', 'Exynos 9820', '9', '4100', '14300000', 'SAMSUNG_S10+.jpeg'),
(45, 'SAMSUNG', 'S10e', '5.8', '10', '12+16', '6', '128', 'Octa-core 2.8', 'Exynos 9820', '9', '3100', '8000000', 'SAMSUNG_S10e.jpg'),
(46, 'SAMSUNG', 'A91', '6.7', '32', '48+12+5', '8', '128', 'Octa-core 2.84', 'Snapdragon 855', '10', '4500', '6000000', 'SAMSUNG_A91.png'),
(47, 'SAMSUNG', 'A51', '6.5', '32', '48+12+5', '4', '64', 'Octa-core 2.3', 'Exynos 9611', '10', '4000', '4400000', 'SAMSUNG_A51.jpg'),
(48, 'SAMSUNG', 'A71', '6.7', '32', '64+12+5+5', '6', '128', 'Octa-core 2.2', 'Snapdragon 730', '10', '4500', '5700000', 'SAMSUNG_A71.jpg'),
(49, 'SAMSUNG', 'A50s', '6.4', '32', '48+8+5', '4', '64', 'Octa-core 2.3', 'Exynos 9611', '9', '4000', '4900000', 'SAMSUNG_A50s.jpg'),
(50, 'SAMSUNG', 'M30s', '6.4', '16', '48+8+5', '4', '64', 'Octa-core 2.3', 'Exynos 9611', '9', '6000', '3150000', 'SAMSUNG_M30s.jpg'),
(51, 'SAMSUNG', 'A80', '6.3', '-', '48+8', '8', '128', 'Octa-core 2.0', 'Snapdragon 986', '9', '3700', '12065000', 'SAMSUNG_A80.jpg'),
(52, 'SAMSUNG', 'A10s', '6.2', '8', '13+2', '2', '32', 'Octa-core 2.0', 'Helio P22', '9', '4000', '2600000', 'SAMSUNG_A10s.jpg'),
(53, 'SAMSUNG', 'A20s', '6.5', '8', '13+8+5', '3', '64', 'Octa-core 1.8', 'Snapdragon 458', '9', '4000', '2600000', 'SAMSUNG_A20s.jpg'),
(54, 'SAMSUNG', 'A30s', '6.4', '16', '25+5+8', '4', '64', 'Octa-core 1.8', 'Exynos 7904', '9', '4000', '3300000', 'SAMSUNG_A30s.jpg'),
(55, 'SAMSUNG', 'S10 Lite', '6.7', '32', '48+12+5', '8', '128', 'Octa-core 2.84', 'Snapdragon 855', '10', '4500', '7699000', 'SAMSUNG_S10_Lite.jpg'),
(56, 'SAMSUNG', 'A20s', '6.5', '8', '13+8+5', '4', '64', 'Octa-core 1.8', 'Snapdragon 458', '9', '4000', '2700000', 'SAMSUNG_A20s.jpg'),
(57, 'SAMSUNG', 'Note 10+', '6.8', '10', '12+12+16', '12', '512', 'Octa-core 2.84', 'Exynos 9825', '9', '4300', '11350000', 'SAMSUNG_Note_10+.jpg'),
(58, 'SAMSUNG', 'A71', '6.7', '32', '64+12+5+5', '8', '128', 'Octa-core 2.2', 'Snapdragon 730', '10', '4500', '5900000', 'SAMSUNG_A71.jpg'),
(59, 'SAMSUNG', 'A50s', '6.4', '32', '48+8+5', '6', '128', 'Octa-core 2.3', 'Exynos 9611', '9', '4000', '5300000', 'SAMSUNG_A50s.jpg'),
(60, 'SAMSUNG', 'A51', '6.5', '32', '48+12+5', '6', '128', 'Octa-core 2.3', 'Exynos 9611', '10', '4000', '4800000', 'SAMSUNG_A51.jpg'),
(61, 'SAMSUNG', 'M30s', '6.4', '16', '48+8+5', '6', '128', 'Octa-core 2.3', 'Exynos 9611', '9', '6000', '3550000', 'SAMSUNG_M30s.jpg'),
(62, 'SAMSUNG', 'S10+', '6.4', '10+8', '12+12+16', '8', '128', 'Octa-core 2.8', 'Exynos 9820', '9', '4100', '12300000', 'SAMSUNG_S10+.jpeg'),
(63, 'SAMSUNG', 'S10+', '6.4', '10+8', '12+12+16', '8', '512', 'Octa-core 2.8', 'Exynos 9820', '9', '4100', '12500000', 'SAMSUNG_S10+.jpeg'),
(64, 'REALME', '7', '6.5', '16', '64+8+2+2', '6', '64', 'Octa-core 2.0', 'Snapdragon 720G', '10', '5000', '3600000', 'REALME_7.jpg'),
(65, 'REALME', '7', '6.5', '16', '64+8+2+2', '8', '128', 'Octa-core 2.0', 'Snapdragon 720G', '10', '5000', '3800000', 'REALME_7.jpg'),
(66, 'REALME', '7 Pro', '6.4', '32', '64+8+2+2', '8', '128', 'Octa-core 2.4', 'Snapdragon 720G', '10', '4500', '3500000', 'REALME_7_Pro.jpg'),
(67, 'REALME', '7i', '6.5', '16', '64+8+2+2', '8', '128', 'Octa-core 2.0', 'Snapdragon 662', '10', '5000', '2500000', 'REALME_7i.jpg'),
(68, 'REALME', 'C17', '6.5', '8', '13+8+2+2', '6', '256', 'Octa-core 1.8', 'Snapdragon 460', '10', '5000', '2000000', 'REALME_C17.jpg'),
(69, 'REALME', 'C15', '6.5', '5', '13+8', '4', '64', 'Octa-core 2.3', 'Helio G35', '10', '6000', '1700000', 'REALME_C15.jpg'),
(70, 'REALME', 'C11', '6.5', '5', '13+2', '3', '32', 'Octa-core 2.3', 'Helio G35', '10', '5000', '1500000', 'REALME_C11.jpg'),
(71, 'OPPO', 'Reno4', '6.4', '32+2', '48+8', '8', '128', 'Octa-core 2.4', 'Snapdragon 765G', '10', '4000', '5000000', 'OPPO_Reno_4.jpg'),
(72, 'OPPO', 'Reno4 F', '6.4', '16+2', '48+8+22', '8', '128', 'Octa-core 2.2', 'Helio P95', '10', '4000', '4300000', 'OPPO_Reno4_F.jpg'),
(73, 'OPPO', 'Reno4 Pro', '6.5', '32', '48+8+2+2', '8', '256', 'Octa-core 2.3', 'Snapdragon 720G', '10', '4000', '8000000', 'OPPO_Reno4_Pro.jpg'),
(74, 'OPPO', 'A53', '6.5', '16', '13+2+2', '4', '64', 'Octa-core 1.8', 'Snapdragon 460', '10', '5000', '2500000', 'OPPO_A53.jpg'),
(75, 'OPPO', 'A33', '6.5', '8', '13+2+2', '3', '32', 'Octa-core 1.8', 'Snapdragon 460', '10', '5000', '2300000', 'OPPO_A33.jpg'),
(76, 'OPPO', 'A12', '6.2', '5', '13+2', '3', '32', 'Octa-core 2.35', 'Helio P35', '9', '4230', '1900000', 'OPPO_A12.jpg'),
(77, 'REALME', 'C15', '6.5', '5', '13+8', '4', '128', 'Octa-core 2.3', 'Helio G35', '10', '6000', '2000000', 'REALME_C15.jpg'),
(78, 'REALME', 'C11', '6.5', '5', '13+2', '2', '32', 'Octa-core 2.3', 'Helio G35', '10', '5000', '1350000', 'REALME_C11.jpg'),
(79, 'OPPO', 'A53', '6.5', '16', '13+2+2', '6', '128', 'Octa-core 1.8', 'Snapdragon 460', '10', '5000', '3100000', 'OPPO_A53.jpg'),
(80, 'OPPO', 'A12', '6.2', '5', '13+2', '6', '54', 'Octa-core 2.35', 'Helio P35', '9', '4230', '2200000', 'OPPO_A12.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
