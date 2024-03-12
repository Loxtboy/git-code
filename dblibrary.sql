-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2024 at 05:07 AM
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
-- Database: `dblibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `idbuku` int(11) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Pengarang` varchar(255) NOT NULL,
  `TahunTerbit` date NOT NULL,
  `Gambar` varchar(255) NOT NULL,
  `Kategori` enum('Pemrograman','Pendidikan','Novel') NOT NULL,
  `Baca` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idbuku`, `Judul`, `Pengarang`, `TahunTerbit`, `Gambar`, `Kategori`, `Baca`) VALUES
(45235, 'the monkey boy', 'agus', '2024-02-12', '65d8053b2b33f.jpg', 'Novel', '65d8053b2b51e.html'),
(46464, 'web programming', 'josef', '2024-02-13', '65d40d278d827.jpg', 'Pendidikan', '65d40d278dab0.html'),
(53535, 'sukyinn aj', 'beler', '2024-02-27', '65d802e2b20a2.jpg', 'Novel', '65d802e2b21e0.html');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Pegawai','Pengguna') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'josef', '$2y$10$x9Z/CPO6hrHCLLkYs3ggi.q8233Qw.mAFXmkqiSmoPw1eZ70VT4PO', 'Admin'),
(2, 'charles', '$2y$10$pLptCnLH8P6AjPansPPDBeptAwPkN.kqDnfXO.o9lhd6IfSCBTSUe', 'Pegawai'),
(5, 'elvin', '$2y$10$WYPGHz6C6p7ufKlZzGkHFu3VXccARdsM/R.P7BL0QLeY1X7At1Fmi', 'Pengguna'),
(6, 'agus', '$2y$10$B4YVsO4EYMdPET6qG7.YuuSYcRQQsR2NOtdwcfc1bPsoyqH4kCSOe', 'Pengguna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
