-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 09:25 AM
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
-- Database: `puskesmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `asuransi`
--

CREATE TABLE `asuransi` (
  `no_asuransi` int(11) NOT NULL,
  `nama_asuransi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asuransi`
--

INSERT INTO `asuransi` (`no_asuransi`, `nama_asuransi`) VALUES
(1, 'BPJS Kesehatan'),
(2, 'UMUM');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `no_kunjungan` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `no_pasien` int(11) NOT NULL,
  `no_ruangan` int(11) NOT NULL,
  `no_asuransi` int(11) NOT NULL,
  `jenis_kunjungan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`no_kunjungan`, `tanggal`, `no_pasien`, `no_ruangan`, `no_asuransi`, `jenis_kunjungan`) VALUES
(1, '2024-06-06 07:30:16', 1, 1, 1, 'LAMA'),
(2, '2024-06-06 09:16:05', 2, 2, 2, 'LAMA'),
(3, '2024-06-06 07:34:25', 3, 3, 2, 'LAMA'),
(4, '2024-06-06 07:47:12', 4, 1, 1, 'LAMA'),
(5, '2024-06-06 07:48:43', 5, 2, 2, 'BARU'),
(6, '2024-06-06 07:50:53', 6, 3, 1, 'BARU'),
(7, '2024-06-06 07:56:46', 7, 3, 1, 'LAMA'),
(8, '2024-06-06 07:57:38', 8, 1, 1, 'LAMA'),
(9, '2024-06-06 07:59:16', 9, 4, 1, 'LAMA'),
(10, '2024-06-06 08:05:50', 10, 5, 2, 'BARU');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `no_pasien` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nomor_bpjs` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`no_pasien`, `nama`, `nomor_bpjs`) VALUES
(1, 'DEDE MASKANAH', '0002399226952'),
(2, 'MUHAMMAD RISWAN', NULL),
(3, 'SELFIA PUTRI NUR KANIA', NULL),
(4, 'CEPI BIN ODANG', '0003326921357'),
(5, 'NENG SITI ROBIAH DAWIAH', NULL),
(6, 'ANGGI ANGRAENI', '0003310335821'),
(7, 'MUHAMMAD ALKANTARA EBRAHIM', '0003552137829'),
(8, 'NOVA NOVIANTI,NY', '0001313073279'),
(9, 'AJA MIHARJA,TN', '0001282080093'),
(10, 'NENG SITI ROBIAH DAWIAH', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `no_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`no_ruangan`, `nama_ruangan`) VALUES
(1, 'Usia Dewasa'),
(2, 'Anak Usia Sekolah & Remaja'),
(3, 'Balita & Anak Pra-Sekolah'),
(4, 'Lansia'),
(5, 'Laboratorium');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asuransi`
--
ALTER TABLE `asuransi`
  ADD PRIMARY KEY (`no_asuransi`);

--
-- Indexes for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`no_kunjungan`),
  ADD KEY `no_ruangan` (`no_ruangan`),
  ADD KEY `no_asuransi` (`no_asuransi`),
  ADD KEY `kunjungan_ibfk_1` (`no_pasien`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`no_pasien`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`no_ruangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asuransi`
--
ALTER TABLE `asuransi`
  MODIFY `no_asuransi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `no_kunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `no_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `no_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD CONSTRAINT `kunjungan_ibfk_1` FOREIGN KEY (`no_pasien`) REFERENCES `pasien` (`no_pasien`) ON DELETE CASCADE,
  ADD CONSTRAINT `kunjungan_ibfk_2` FOREIGN KEY (`no_ruangan`) REFERENCES `ruangan` (`no_ruangan`),
  ADD CONSTRAINT `kunjungan_ibfk_3` FOREIGN KEY (`no_asuransi`) REFERENCES `asuransi` (`no_asuransi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
