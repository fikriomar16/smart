-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2021 at 07:45 AM
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
(1, 'admin', 'admin', 'Admin', 'admin', '2020-12-15 23:42:15'),
(2, 'fikri', 'omar', 'Fikri Omar', 'sadmin', '2021-01-04 13:11:35'),
(10, 'admin1', 'admin1', 'Admin Satu', 'admin', '2021-01-04 03:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_conf`
--

CREATE TABLE `tbl_conf` (
  `id_conf` int(11) NOT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `alamat_instansi` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `nama_aplikasi` varchar(50) NOT NULL,
  `halaman_bantuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_conf`
--

INSERT INTO `tbl_conf` (`id_conf`, `nama_instansi`, `alamat_instansi`, `deskripsi`, `nama_aplikasi`, `halaman_bantuan`) VALUES
(0, 'DNT Cell', 'Jogjatronik', 'Aplikasi Rekomendasi Smartphone Android', 'Sistem Rekomendasi Smartphone Android', '<p><b>Sistem Rekomendasi Smartphone Android</b>&nbsp;merupakan sistem yang merekomendasikan kepada pengguna dalam menentukan <i>Smartphone Android</i>&nbsp;yang sesuai dengan kriteria pengguna.</p><p>Adapun tahapan-tahapan dalam pengoperasian sistem ini, yaitu:</p><ol><li>Pengguna masuk kedalam tab <b>Cari Rekomendasi</b>&nbsp;untuk bisa memilih beberapa opsi <i>smartphone</i>&nbsp;yang akan dipilihnya</li><li>Pengguna memilih beberapa <i>smartphone</i>&nbsp;untuk nanti dibandingkan (minimal 2)</li><li>Selesai memilih, klik tombol paling bawah yang bertuliskan <b>Menuju Pembobotan</b>&nbsp;untuk menjawab beberapa pertanyaan</li><li>Jawab pertanyaan dengan jawaban yang sesuai dengan kriteria pengguna</li><li>Setelah terisi semua, klik tombol tampilkan hasil</li><li>Sistem akan memberikan hasil rekomendasi berdasarkan pilihan dan kriteria anda</li></ol><p>Sekian dan Terima Kasih</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_perhitungan`
--

CREATE TABLE `tbl_detail_perhitungan` (
  `id_detail` int(11) NOT NULL,
  `id_perhitungan` int(11) NOT NULL,
  `id_smartphone` int(11) NOT NULL,
  `skor_akhir` float NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `kriteria`) VALUES
(1, 'Ukuran Display'),
(2, 'Kapasitas Memori (RAM)'),
(3, 'Kapasitas Penyimpanan (ROM)'),
(4, 'Megapixel Kamera Depan'),
(5, 'Megapixel Kamera Belakang'),
(6, 'Kecepatan Pemrosesan Data (CPU)'),
(7, 'Versi OS'),
(8, 'Kapasitas Baterai'),
(9, 'Harga');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_normalisasi`
--

CREATE TABLE `tbl_normalisasi` (
  `id_normalisasi` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `normalisasi` float NOT NULL,
  `utilities` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perhitungan`
--

CREATE TABLE `tbl_perhitungan` (
  `id_perhitungan` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pertanyaan`
--

CREATE TABLE `tbl_pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pertanyaan`
--

INSERT INTO `tbl_pertanyaan` (`id_pertanyaan`, `id_kriteria`, `pertanyaan`) VALUES
(1, 1, 'Apakah anda nyaman dengan ukuran layar yang lebar ?'),
(2, 2, 'Apakah anda membutuhkan memori yang besar ? (semisal untuk membuka banyak aplikasi bersamaan)'),
(3, 3, 'Apakah anda membutuhkan kapasitas penyimpanan yang besar ?'),
(4, 4, 'Apakah anda membutuhkan hasil selfie yang bagus ?'),
(5, 5, 'Apakah anda membutuhkan hasil foto/video yang bagus ?'),
(6, 6, 'Apakah anda menginginkan smartphone yang dapat memproses data dengan cepat ?'),
(7, 7, 'Apakah anda membutuhkan versi OS Android terbaru ?'),
(8, 8, 'Apakah anda membutuhkan kapasitas baterai yang besar ?'),
(9, 9, 'Apakah anda menginginkan harga yang terjangkau ?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_smartphone`
--

CREATE TABLE `tbl_smartphone` (
  `id` int(11) NOT NULL,
  `merk` varchar(15) NOT NULL,
  `seri` varchar(20) NOT NULL,
  `display` varchar(5) NOT NULL,
  `kamera_depan` varchar(15) NOT NULL,
  `kamera_belakang` varchar(15) NOT NULL,
  `ram` varchar(15) NOT NULL,
  `rom` varchar(15) NOT NULL,
  `cpu` varchar(25) NOT NULL,
  `chipset` varchar(15) NOT NULL,
  `os` varchar(15) NOT NULL,
  `baterai` varchar(15) NOT NULL,
  `harga` int(12) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_smartphone`
--

INSERT INTO `tbl_smartphone` (`id`, `merk`, `seri`, `display`, `kamera_depan`, `kamera_belakang`, `ram`, `rom`, `cpu`, `chipset`, `os`, `baterai`, `harga`, `foto`) VALUES
(1, 'SAMSUNG', 'S10 Lite', '6.7', '32', '48+12+5', '6', '128', 'Octa-core 2.84', 'Snapdragon 855', '10', '4500', 7499000, 'SAMSUNG_S10_Lite.jpg'),
(2, 'SAMSUNG', 'Note 10', '6.3', '10', '12+12+16', '8', '256', 'Octa-core 2.84', 'Exynos 9825', '9', '3500', 13499000, 'SAMSUNG_Note_10.jpg'),
(42, 'SAMSUNG', 'S10', '6.1', '10', '12+12+16', '8', '128', 'Octa-core 2.8', 'Exynos 9820', '9', '3400', 8500000, 'SAMSUNG_S10.jpg'),
(43, 'SAMSUNG', 'Note 10+', '6.8', '10', '12+12+16', '12', '256', 'Octa-core 2.84', 'Exynos 9825', '9', '4300', 11250000, 'SAMSUNG_Note_10+.jpg'),
(44, 'SAMSUNG', 'S10+', '6.4', '10+8', '12+12+16', '12', '1024', 'Octa-core 2.8', 'Exynos 9820', '9', '4100', 14300000, 'SAMSUNG_S10+.jpeg'),
(45, 'SAMSUNG', 'S10e', '5.8', '10', '12+16', '6', '128', 'Octa-core 2.8', 'Exynos 9820', '9', '3100', 8000000, 'SAMSUNG_S10e.jpg'),
(46, 'SAMSUNG', 'A91', '6.7', '32', '48+12+5', '8', '128', 'Octa-core 2.84', 'Snapdragon 855', '10', '4500', 6000000, 'SAMSUNG_A91.png'),
(47, 'SAMSUNG', 'A51', '6.5', '32', '48+12+5', '4', '64', 'Octa-core 2.3', 'Exynos 9611', '10', '4000', 4400000, 'SAMSUNG_A51.jpg'),
(48, 'SAMSUNG', 'A71', '6.7', '32', '64+12+5+5', '6', '128', 'Octa-core 2.2', 'Snapdragon 730', '10', '4500', 5700000, 'SAMSUNG_A71.jpg'),
(49, 'SAMSUNG', 'A50s', '6.4', '32', '48+8+5', '4', '64', 'Octa-core 2.3', 'Exynos 9611', '9', '4000', 4900000, 'SAMSUNG_A50s.jpg'),
(50, 'SAMSUNG', 'M30s', '6.4', '16', '48+8+5', '4', '64', 'Octa-core 2.3', 'Exynos 9611', '9', '6000', 3150000, 'SAMSUNG_M30s.jpg'),
(51, 'SAMSUNG', 'A80', '6.3', '0', '48+8', '8', '128', 'Octa-core 2.0', 'Snapdragon 986', '9', '3700', 12065000, 'SAMSUNG_A80.jpg'),
(52, 'SAMSUNG', 'A10s', '6.2', '8', '13+2', '2', '32', 'Octa-core 2.0', 'Helio P22', '9', '4000', 2600000, 'SAMSUNG_A10s.jpg'),
(53, 'SAMSUNG', 'A20s', '6.5', '8', '13+8+5', '3', '64', 'Octa-core 1.8', 'Snapdragon 458', '9', '4000', 2600000, 'SAMSUNG_A20s.jpg'),
(54, 'SAMSUNG', 'A30s', '6.4', '16', '25+5+8', '4', '64', 'Octa-core 1.8', 'Exynos 7904', '9', '4000', 3300000, 'SAMSUNG_A30s.jpg'),
(55, 'SAMSUNG', 'S10 Lite', '6.7', '32', '48+12+5', '8', '128', 'Octa-core 2.84', 'Snapdragon 855', '10', '4500', 7699000, 'SAMSUNG_S10_Lite.jpg'),
(56, 'SAMSUNG', 'A20s', '6.5', '8', '13+8+5', '4', '64', 'Octa-core 1.8', 'Snapdragon 458', '9', '4000', 2700000, 'SAMSUNG_A20s.jpg'),
(57, 'SAMSUNG', 'Note 10+', '6.8', '10', '12+12+16', '12', '512', 'Octa-core 2.84', 'Exynos 9825', '9', '4300', 11350000, 'SAMSUNG_Note_10+.jpg'),
(58, 'SAMSUNG', 'A71', '6.7', '32', '64+12+5+5', '8', '128', 'Octa-core 2.2', 'Snapdragon 730', '10', '4500', 5900000, 'SAMSUNG_A71.jpg'),
(59, 'SAMSUNG', 'A50s', '6.4', '32', '48+8+5', '6', '128', 'Octa-core 2.3', 'Exynos 9611', '9', '4000', 5300000, 'SAMSUNG_A50s.jpg'),
(60, 'SAMSUNG', 'A51', '6.5', '32', '48+12+5', '6', '128', 'Octa-core 2.3', 'Exynos 9611', '10', '4000', 4800000, 'SAMSUNG_A51.jpg'),
(61, 'SAMSUNG', 'M30s', '6.4', '16', '48+8+5', '6', '128', 'Octa-core 2.3', 'Exynos 9611', '9', '6000', 3550000, 'SAMSUNG_M30s.jpg'),
(62, 'SAMSUNG', 'S10+', '6.4', '10+8', '12+12+16', '8', '128', 'Octa-core 2.8', 'Exynos 9820', '9', '4100', 12300000, 'SAMSUNG_S10+.jpeg'),
(63, 'SAMSUNG', 'S10+', '6.4', '10+8', '12+12+16', '8', '512', 'Octa-core 2.8', 'Exynos 9820', '9', '4100', 12500000, 'SAMSUNG_S10+.jpeg'),
(64, 'REALME', '7', '6.5', '16', '64+8+2+2', '6', '64', 'Octa-core 2.0', 'Snapdragon 720G', '10', '5000', 3600000, 'REALME_7.jpg'),
(65, 'REALME', '7', '6.5', '16', '64+8+2+2', '8', '128', 'Octa-core 2.0', 'Snapdragon 720G', '10', '5000', 3800000, 'REALME_7.jpg'),
(66, 'REALME', '7 Pro', '6.4', '32', '64+8+2+2', '8', '128', 'Octa-core 2.4', 'Snapdragon 720G', '10', '4500', 3500000, 'REALME_7_Pro.jpg'),
(67, 'REALME', '7i', '6.5', '16', '64+8+2+2', '8', '128', 'Octa-core 2.0', 'Snapdragon 662', '10', '5000', 2500000, 'REALME_7i.jpg'),
(68, 'REALME', 'C17', '6.5', '8', '13+8+2+2', '6', '256', 'Octa-core 1.8', 'Snapdragon 460', '10', '5000', 2000000, 'REALME_C17.jpg'),
(69, 'REALME', 'C15', '6.5', '5', '13+8', '4', '64', 'Octa-core 2.3', 'Helio G35', '10', '6000', 1700000, 'REALME_C15.jpg'),
(70, 'REALME', 'C11', '6.5', '5', '13+2', '3', '32', 'Octa-core 2.3', 'Helio G35', '10', '5000', 1500000, 'REALME_C11.jpg'),
(71, 'OPPO', 'Reno4', '6.4', '32+2', '48+8', '8', '128', 'Octa-core 2.4', 'Snapdragon 765G', '10', '4000', 5000000, 'OPPO_Reno_4.jpg'),
(72, 'OPPO', 'Reno4 F', '6.4', '16+2', '48+8+22', '8', '128', 'Octa-core 2.2', 'Helio P95', '10', '4000', 4300000, 'OPPO_Reno4_F.jpg'),
(73, 'OPPO', 'Reno4 Pro', '6.5', '32', '48+8+2+2', '8', '256', 'Octa-core 2.3', 'Snapdragon 720G', '10', '4000', 8000000, 'OPPO_Reno4_Pro.jpg'),
(74, 'OPPO', 'A53', '6.5', '16', '13+2+2', '4', '64', 'Octa-core 1.8', 'Snapdragon 460', '10', '5000', 2500000, 'OPPO_A53.jpg'),
(75, 'OPPO', 'A33', '6.5', '8', '13+2+2', '3', '32', 'Octa-core 1.8', 'Snapdragon 460', '10', '5000', 2300000, 'OPPO_A33.jpg'),
(76, 'OPPO', 'A12', '6.2', '5', '13+2', '3', '32', 'Octa-core 2.35', 'Helio P35', '9', '4230', 1900000, 'OPPO_A12.jpg'),
(77, 'REALME', 'C15', '6.5', '5', '13+8', '4', '128', 'Octa-core 2.3', 'Helio G35', '10', '6000', 2000000, 'REALME_C15.jpg'),
(78, 'REALME', 'C11', '6.5', '5', '13+2', '2', '32', 'Octa-core 2.3', 'Helio G35', '10', '5000', 1350000, 'REALME_C11.jpg'),
(79, 'OPPO', 'A53', '6.5', '16', '13+2+2', '6', '128', 'Octa-core 1.8', 'Snapdragon 460', '10', '5000', 3100000, 'OPPO_A53.jpg'),
(80, 'OPPO', 'A12', '6.2', '5', '13+2', '6', '54', 'Octa-core 2.35', 'Helio P35', '9', '4230', 2200000, 'OPPO_A12.jpg'),
(81, 'VIVO', 'V20', '6.4', '44', '64+8+2', '8', '128', 'Octa-core 2.3', 'Snapdragon 720', '10', '4000', 3000000, 'VIVO_V20.jpg'),
(82, 'VIVO', 'V20 SE', '6.4', '32', '48+8+2', '8', '128', 'Octa-core 2.0', 'Snapdragon 665', '10', '4100', 3250000, 'VIVO_V20_SE.jpg'),
(83, 'VIVO', 'Y50', '6.5', '16', '16+8', '8', '128', 'Octa-core 2.0', 'Snapdragon 665', '10', '5000', 2500000, 'VIVO_Y50.jpg'),
(84, 'VIVO', 'X50', '6.6', '32', '48+13', '8', '128', 'Octa-core 2.4', 'Snapdragon 765G', '10', '4200', 4900000, 'VIVO_X50.png'),
(85, 'VIVO', 'X50 Pro', '6.6', '8', '48+8', '8', '256', 'Octa-core 2.4', 'Snapdragon 765G', '10', '4315', 7000000, 'VIVO_X50_Pro.png'),
(86, 'VIVO', 'Y30', '6.6', '8', '13+8', '4', '128', 'Octa-core 2.3', 'Helio P35', '10', '5000', 2800000, 'VIVO_Y30.jpg'),
(87, 'VIVO', 'Y30', '6.6', '8', '13+8', '6', '128', 'Octa-core 2.3', 'Helio P35', '10', '5000', 3100000, 'VIVO_Y30.jpg'),
(88, 'VIVO', 'Y30i', '6.7', '8', '13+8+2+2', '4', '64', 'Octa-core 2.3', 'Helio P35', '10', '5000', 1790000, 'VIVO_Y30i.jpg'),
(89, 'VIVO', 'Y20', '6.5', '8', '13+2+2', '3', '64', 'Octa-core 1.8', 'Snapdragon 460', '10', '5000', 1600000, 'VIVO_Y20.jpg'),
(90, 'VIVO', 'Y12i', '6.4', '8', '13+8+2', '3', '32', 'Octa-core 2.0', 'Snapdragon 439', '9', '5000', 1256000, 'VIVO_Y12i.jpg'),
(91, 'VIVO', 'Y91C', '6.2', '8', '12', '2', '32', 'Octa-core 2.0', 'Helio P22', '8', '4030', 1200000, 'VIVO_Y91C.jpg'),
(92, 'XIAOMI', 'Redmi 8', '6.2', '8', '12+2', '4', '64', 'Octa-core 2.0', 'Snapdragon 439', '9', '5000', 1850000, 'XIAOMI_Redmi_8.png'),
(93, 'XIAOMI', 'Redmi 8A', '6.2', '8', '12', '2', '32', 'Octa-core 1.95', 'Snapdragon 439', '9', '5000', 1400000, 'XIAOMI_Redmi_8A.jpg'),
(94, 'XIAOMI', 'Redmi 8A Pro', '6.2', '8', '12', '2', '32', 'Octa-core 1.95', 'Snapdragon 439', '9', '5000', 1549000, 'XIAOMI_Redmi_8A_Pro.jpg'),
(95, 'XIAOMI', 'Redmi 8A Pro', '6.2', '8', '12', '3', '32', 'Octa-core 1.95', 'Snapdragon 439', '9', '5000', 1649000, 'XIAOMI_Redmi_8A_Pro.jpg'),
(96, 'XIAOMI', 'Redmi Note 8', '6.3', '13', '48+8', '3', '32', 'Octa-core 2.0', 'Snapdragon 665', '9', '4000', 2049000, 'XIAOMI_Redmi_Note_8.jpg'),
(97, 'XIAOMI', 'Redmi Note 8', '6.3', '13', '48+8', '4', '64', 'Octa-core 2.0', 'Snapdragon 665', '9', '4000', 2249000, 'XIAOMI_Redmi_Note_8.jpg'),
(98, 'XIAOMI', 'Redmi Note 8', '6.3', '13', '48+8', '6', '128', 'Octa-core 2.0', 'Snapdragon 665', '9', '4000', 2849000, 'XIAOMI_Redmi_Note_8.jpg'),
(99, 'XIAOMI', 'Redmi Note 8 Pro', '6.5', '20', '64+8', '6', '64', 'Octa-core 2.05', 'Helio G90T', '9', '4500', 2999000, 'XIAOMI_Redmi_Note_8_Pro.jpg'),
(100, 'XIAOMI', 'Redmi Note 8 Pro', '6.5', '20', '64+8', '6', '128', 'Octa-core 2.05', 'Helio G90T', '9', '4500', 3399000, 'XIAOMI_Redmi_Note_8_Pro.jpg'),
(101, 'XIAOMI', 'Redmi Note 9', '6.5', '13', '48+8', '4', '64', 'Octa-core 2.0', 'Helio G85', '10', '5020', 2499000, 'XIAOMI_Redmi_Note_9.jpg'),
(102, 'XIAOMI', 'Redmi Note 9', '6.5', '13', '48+8', '6', '128', 'Octa-core 2.0', 'Helio G85', '10', '5020', 2899000, 'XIAOMI_Redmi_Note_9.jpg'),
(103, 'XIAOMI', 'Redmi Note 9 Pro', '6.7', '32', '64+8', '6', '64', 'Octa-core 2.3', 'Snapdragon 720G', '10', '5020', 3499000, 'XIAOMI_Redmi_Note_9_Pro.jpg'),
(104, 'XIAOMI', 'Redmi Note 9 Pro', '6.7', '32', '64+8', '8', '128', 'Octa-core 2.3', 'Snapdragon 720G', '10', '5020', 3899000, 'XIAOMI_Redmi_Note_9_Pro.jpg'),
(105, 'XIAOMI', 'Mi 10', '6.6', '20', '108+13', '8', '256', 'Octa-core 2.84', 'Snapdragon 865', '10', '4780', 9999000, 'XIAOMI_Mi_10.png'),
(106, 'XIAOMI', 'Mi Note 10', '6.4', '32', '108+12', '6', '128', 'Octa-core 2.2', 'Snapdragon 730G', '9', '5260', 6199000, 'XIAOMI_Mi_Note_10.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama`, `last_login`) VALUES
(1, 'omar', 'fikri', 'Om Fikri', '2021-01-03 23:28:00'),
(2, 'ekacahyani', 'ecka1412', 'Eka Cahyani', '2021-01-03 16:14:00');

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
-- Indexes for table `tbl_detail_perhitungan`
--
ALTER TABLE `tbl_detail_perhitungan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_perhitungan` (`id_perhitungan`),
  ADD KEY `id_smartphone` (`id_smartphone`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_normalisasi`
--
ALTER TABLE `tbl_normalisasi`
  ADD PRIMARY KEY (`id_normalisasi`),
  ADD KEY `id_detail` (`id_detail`);

--
-- Indexes for table `tbl_perhitungan`
--
ALTER TABLE `tbl_perhitungan`
  ADD PRIMARY KEY (`id_perhitungan`);

--
-- Indexes for table `tbl_pertanyaan`
--
ALTER TABLE `tbl_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `tbl_smartphone`
--
ALTER TABLE `tbl_smartphone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_detail_perhitungan`
--
ALTER TABLE `tbl_detail_perhitungan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_normalisasi`
--
ALTER TABLE `tbl_normalisasi`
  MODIFY `id_normalisasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_perhitungan`
--
ALTER TABLE `tbl_perhitungan`
  MODIFY `id_perhitungan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pertanyaan`
--
ALTER TABLE `tbl_pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_smartphone`
--
ALTER TABLE `tbl_smartphone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detail_perhitungan`
--
ALTER TABLE `tbl_detail_perhitungan`
  ADD CONSTRAINT `tbl_detail_perhitungan_ibfk_1` FOREIGN KEY (`id_perhitungan`) REFERENCES `tbl_perhitungan` (`id_perhitungan`),
  ADD CONSTRAINT `tbl_detail_perhitungan_ibfk_2` FOREIGN KEY (`id_smartphone`) REFERENCES `tbl_smartphone` (`id`),
  ADD CONSTRAINT `tbl_detail_perhitungan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Constraints for table `tbl_normalisasi`
--
ALTER TABLE `tbl_normalisasi`
  ADD CONSTRAINT `tbl_normalisasi_ibfk_1` FOREIGN KEY (`id_detail`) REFERENCES `tbl_detail_perhitungan` (`id_detail`);

--
-- Constraints for table `tbl_pertanyaan`
--
ALTER TABLE `tbl_pertanyaan`
  ADD CONSTRAINT `tbl_pertanyaan_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `tbl_kriteria` (`id_kriteria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
