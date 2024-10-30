-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 01:55 AM
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
-- Database: `mading_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id`, `user_id`, `judul`, `tanggal`, `deskripsi`, `gambar`) VALUES
(1, 5, 'Alomani', '2024-10-29', 'sosok alomani bernama Amba', 'ambatukam.jpg'),
(2, 5, 'Mas Rusdi', '2024-10-19', 'yang punya rusdi barbershop cik 😏😋', 'masrusdi.jpg'),
(3, 5, 'Dimas Hotwil', '2024-10-08', 'Juara dunia lomba hotwil cik', 'dimasHotwil.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `level`, `password`) VALUES
(1, 'Rassya', 'rrassya404@gmail.com', 'siswa', '$2y$10$3.K5WNsUrOgbnsSYBL17MueZTFnhjr1L6D9S/gJxo4SzHzHnDJD/O'),
(2, 'keenan', 'keEEnan12@gmail.com', 'siswa', '$2y$10$OUt1jqDgJ/JOIA3BZP4o0.D/6H2/7o1eRg4dtUlb2yBIFyyMvqwVu'),
(3, 'keenan', 'keEEnan12@gmail.com', 'siswa', '$2y$10$Zf455ct.B38sUC1h3zNM3uoCMD4aZ58CujgTVA9JrgKfSJrYpEDhG'),
(4, 'keenan', 'keEEnan12@gmail.com', 'siswa', '$2y$10$KLbWytge79UJ/BtpvWgmzOsZZxqoXujxffkD.Gk.0.quHlRLzL34O'),
(5, 'dicka', 'dikaja45@gmail.com', 'siswa', '$2y$10$2m7e2NVD4uIQgsEYUU9kZuIqeHvmFin8YZ0fAKoSrC2u/Hd5g0oD6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
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
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
