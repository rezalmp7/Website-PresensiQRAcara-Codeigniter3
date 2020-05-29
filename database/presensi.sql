-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2020 at 05:42 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` int(6) NOT NULL,
  `noTiket` varchar(6) NOT NULL,
  `waktu` time NOT NULL,
  `idPanitia` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id`, `noTiket`, `waktu`, `idPanitia`) VALUES
(14, '0001', '11:17:20', 1),
(15, '0111', '11:17:54', 1),
(16, '0991', '11:18:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nominalumum`
--

CREATE TABLE `nominalumum` (
  `id` int(6) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `nominal` int(6) NOT NULL DEFAULT '1000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nominalumum`
--

INSERT INTO `nominalumum` (`id`, `keterangan`, `nominal`) VALUES
(3, 'hargaTiket', 120000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(6) NOT NULL,
  `idUser` int(6) NOT NULL,
  `angsuran` int(10) DEFAULT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `idUser`, `angsuran`, `tgl`) VALUES
(1, 10, 20000, '2020-02-23'),
(3, 10, 100000, '2020-03-04'),
(4, 1, 5000, '2020-03-04'),
(5, 0, 115000, '2020-03-04'),
(6, 1, 100000, '2020-03-05'),
(7, 8, 1000, '2020-03-05'),
(8, 1, 15000, '2020-03-07'),
(9, 8, 119000, '2020-03-09'),
(10, 11, 100000, '2020-03-11'),
(11, 11, 10000, '2020-03-11'),
(12, 11, 10000, '2020-03-11'),
(13, 12, 120000, '2020-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaranpanitia`
--

CREATE TABLE `pembayaranpanitia` (
  `id` int(6) NOT NULL,
  `idUser` int(6) NOT NULL,
  `angsuran` int(10) DEFAULT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaranpanitia`
--

INSERT INTO `pembayaranpanitia` (`id`, `idUser`, `angsuran`, `tgl`) VALUES
(2, 1, 100000, '2020-03-05'),
(3, 1, 50000, '2020-03-07'),
(4, 4, 10000, '2020-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `noHp` varchar(20) NOT NULL,
  `kategori` enum('umum','mahasiswa') NOT NULL,
  `institut` varchar(50) DEFAULT NULL,
  `noTiket` varchar(5) NOT NULL,
  `idPanitia` int(6) NOT NULL,
  `tglInput` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `nama`, `noHp`, `kategori`, `institut`, `noTiket`, `idPanitia`, `tglInput`) VALUES
(1, 'Mahasiswa0001', '08123162312', 'mahasiswa', 'UPGRIS', '0001', 1, '2020-02-01'),
(8, 'Umum0111', '0861239218', 'umum', '', '0111', 1, '2020-02-21'),
(10, 'Umum91831', '0861239218', 'umum', '', '91831', 1, '2020-02-23'),
(11, 'Mahasiswa0991', '012381239', 'mahasiswa', 'UNNES', '0991', 1, '2020-03-09'),
(12, 'Umum0007', '9127381627', 'umum', '', '0007', 1, '2020-03-13'),
(13, 'Mahasiswa12399', '0877712318', 'mahasiswa', 'UPGRIS', '12399', 1, '2020-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `posisi`, `level`) VALUES
(1, 'admin', '1', '21232f297a57a5a743894a0e4a801fc3', 'Ketua Umum', 1),
(5, 'Panitia', '2', '9d5ad1b680a172c605ba36749b1177a9', 'Admin', 2),
(7, 'Bendahara', '3', 'c9ccd7f3c1145515a9d3f7415d5bcbea', 'Bendahara', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nominalumum`
--
ALTER TABLE `nominalumum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaranpanitia`
--
ALTER TABLE `pembayaranpanitia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nominalumum`
--
ALTER TABLE `nominalumum`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pembayaranpanitia`
--
ALTER TABLE `pembayaranpanitia`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
