-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 02:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita`
--
CREATE DATABASE IF NOT EXISTS `berita` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `berita`;

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(231) NOT NULL,
  `isi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi`) VALUES
(1, 'Serangan Siber Terbaru Mengguncang Jaringan Perusahaan Besar', 'Sebuah serangan siber baru-baru ini mengguncang jaringan perusahaan besar, mengakibatkan kebocoran data sensitif dan kerugian finansial yang signifikan. Penyelidikan sedang berlangsung untuk mengungkap siapa pelaku di balik serangan ini.'),
(2, 'Kelompok Hacker Mysterius Meretas Situs Web Pemerintah', 'Sebuah kelompok hacker yang misterius berhasil meretas beberapa situs web pemerintah dan menampilkan pesan provokatif. Pemerintah sedang bekerja keras untuk memulihkan kendali atas situs-situs tersebut dan melacak pelaku di balik serangan ini.'),
(3, 'Data Pribadi Jutaan Pengguna Terancam dalam Serangan Ransomware Terbaru', 'Sebuah serangan ransomware terbaru telah mengancam data pribadi jutaan pengguna. Penjahat siber meminta tebusan besar untuk memulihkan data yang terenkripsi, dan korban dihadapkan pada keputusan sulit.'),
(4, 'Penyusup Siber Bocorkan Informasi Rahasia Perusahaan Teknologi Terkemuka', 'Seorang penyusup siber berhasil meretas perusahaan teknologi terkemuka dan mencuri informasi rahasia yang sangat bernilai. Perusahaan tersebut sekarang dalam upaya besar untuk memitigasi kerugian dan mengidentifikasi pelaku di balik serangan ini.'),
(5, '1adkald', '1213jk13');

-- --------------------------------------------------------

--
-- Table structure for table `halaman_utama`
--

CREATE TABLE `halaman_utama` (
  `id` int(11) NOT NULL,
  `judul_web` varchar(250) NOT NULL,
  `text_berjalan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `halaman_utama`
--

INSERT INTO `halaman_utama` (`id`, `judul_web`, `text_berjalan`) VALUES
(1, 'Elephant News', 'Situs berita terkini dan terpercaya!');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halaman_utama`
--
ALTER TABLE `halaman_utama`
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
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `halaman_utama`
--
ALTER TABLE `halaman_utama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
