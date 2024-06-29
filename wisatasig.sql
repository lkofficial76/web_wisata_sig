-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 12:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `kode_kabupaten` varchar(100) NOT NULL,
  `nama_kabupaten` varchar(100) NOT NULL,
  `koordinat` varchar(100) NOT NULL,
  `jumlah_penduduk` int(11) NOT NULL,
  `luas_wilayah` float(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `kode_kabupaten`, `nama_kabupaten`, `koordinat`, `jumlah_penduduk`, `luas_wilayah`) VALUES
(1, '3302', 'Banyumas', '-7.426283249485628, 109.15612224488187', 1806013, 132760.00);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kode_kecamatan` varchar(100) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL,
  `jumlah_penduduk` int(11) NOT NULL,
  `luas_wilayah` float(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`kode_kecamatan`, `id_kabupaten`, `nama_kecamatan`, `jumlah_penduduk`, `luas_wilayah`) VALUES
('3302010', 1, 'Lumbir', 50546, 102.66),
('3302020', 1, 'Wangon', 84775, 61.00),
('3302030', 1, 'Jatilawang', 67483, 48.00),
('3302040', 1, 'Rawalo', 53711, 54.00),
('3302050', 1, 'Kebasen', 68650, 54.00),
('3302060', 1, 'Kemranjen', 73478, 61.00),
('3302070', 1, 'Sumpiuh', 58580, 60.00),
('3302080', 1, 'Tambak', 51223, 52.00),
('3302090', 1, 'Somagede', 38230, 40.00),
('3302100', 1, 'Kalibagor', 58369, 35.00),
('3302110', 1, 'Banyumas', 53668, 38.00),
('3302120', 1, 'Patikraja', 61998, 43.00),
('3302130', 1, 'Purwojati', 37789, 37.00),
('3302140', 1, 'Ajibarang', 103490, 67.00),
('3302150', 1, 'Gumelar', 54347, 94.00),
('3302160', 1, 'Pekuncen', 76883, 93.00),
('3302170', 1, 'Cilongok', 126255, 105.00),
('3302180', 1, 'Karanglewas', 68467, 33.00),
('3302190', 1, 'Kedungbanteng', 63201, 60.00),
('3302200', 1, 'Baturraden', 54092, 45.00),
('3302210', 1, 'Sumbang', 95916, 53.00),
('3302220', 1, 'Kembaran', 12, 123.00),
('3302230', 1, 'Sokaraja', 90525, 30.00),
('3302710', 1, 'Purwokerto Selatan', 73053, 14.00),
('3302720', 1, 'Purwokerto Barat', 53349, 7.00),
('3302730', 1, 'Purwokerto Timur', 55270, 9.00),
('3302740', 1, 'Purwokerto Utara', 50093, 9.00);

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `kode_pos` int(11) NOT NULL,
  `alamat_wisata` varchar(100) NOT NULL,
  `harga_tiket` int(11) NOT NULL,
  `koordinat` varchar(100) NOT NULL,
  `kode_kecamatan` varchar(100) NOT NULL,
  `nama_wisata` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`kode_pos`, `alamat_wisata`, `harga_tiket`, `koordinat`, `kode_kecamatan`, `nama_wisata`) VALUES
(53161, 'Jl. Kalimanggis Utara, Cilongok 53162 Banyumas', 20000, '-7.402200, 109.142097', '3302170', 'Wisata Pereng Cilongok');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kode_kecamatan`),
  ADD KEY `kecamatan_ibfk_1` (`id_kabupaten`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`kode_pos`),
  ADD KEY `kode_kecamatan` (`kode_kecamatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3303;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_2` FOREIGN KEY (`id_kabupaten`) REFERENCES `kabupaten` (`id_kabupaten`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wisata`
--
ALTER TABLE `wisata`
  ADD CONSTRAINT `wisata_ibfk_1` FOREIGN KEY (`kode_kecamatan`) REFERENCES `kecamatan` (`kode_kecamatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
