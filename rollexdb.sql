-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2018 at 10:41 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rollexdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `status` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`, `fullname`, `email`, `no_telp`, `gambar`, `status`) VALUES
(1, 'rikyferdi', '111000', 'Riky Ferdiansyah Rafsanjani', 'ferdiansyahriky@gmail.com', '089510263934', 'riky.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `list_karyawan`
--

CREATE TABLE `list_karyawan` (
  `nip` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `gaji` int(50) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_karyawan`
--

INSERT INTO `list_karyawan` (`nip`, `nama`, `alamat`, `departemen`, `gaji`, `jk`, `no_telp`, `status`, `gambar`) VALUES
('KAR-0001', 'Riky Ferdiansyah Rafsanjani', 'Jl. Panyawungan No.4, Cileunyi Kab. Bandung', 'Informasi & Teknologi', 6300000, 'Laki-Laki', '089510263934', 'Tetap', 'riky.jpg'),
('KAR-0002', 'Deni', 'kp.panyawungan', 'Distribusi', 550000, 'Laki-Laki', '0897896786542', 'Tetap', '1.jpg'),
('KAR-0003', 'intan', 'kp.kara', 'Marketing', 500000, 'Perempuan', '08223467859', 'Tetap', '35339.png'),
('KAR-0004', 'desi', 'jl.suku hilir no 2', 'Personalia', 575000, 'Perempuan', '081234564321', 'Kontrak', 'Candy_in_Damascus.jpg'),
('KAR-0005', 'farhan', 'kp.betawi kab bekasi', 'Informasi & Teknologi', 600000, 'Laki-Laki', '087654453241', 'Tetap', 'candyByColor.jpg'),
('KAR-0006', 'Rina', 'kp.pnyawungan rt 08 rw 03', 'Informasi & Teknologi', 625000, 'Perempuan', '089234876578', 'Tetap', 'FosilDinasurus.jpg'),
('KAR-0007', 'ignis', 'jakarta barat', 'Distribusi', 700000, 'Laki-Laki', '087345543213', 'Tetap', 'led.jpg'),
('KAR-0008', 'Bram', 'kp.sodong', 'Marketing', 650000, 'Laki-Laki', '087678654321', 'Tetap', 'Number_one.png'),
('KAR-0009', 'Alvian', 'bandung timur', 'Manufaktur', 575000, 'Laki-Laki', '089678543123', 'Tetap', '35339.png'),
('KAR-0010', 'ibnul', 'jkarta', 'Distribusi', 600000, 'Laki-Laki', '089510267654', 'Tetap', '1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_karyawan`
--
ALTER TABLE `list_karyawan`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
