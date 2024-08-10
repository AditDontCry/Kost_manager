-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2024 at 06:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kos_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemilik_kos`
--

CREATE TABLE `pemilik_kos` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nomor_telepon` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemilik_kos`
--

INSERT INTO `pemilik_kos` (`id`, `nama`, `email`, `password`, `nomor_telepon`, `alamat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(28, 'Afgani Ardi Maryanto061', 'afgan@gmail.com', '$2y$10$vCJawKXt01JeNSMHrBPeceMDj2QHq.8B9kfHWYW.dtdBLE1FZ0rmi', '0831273821', 'surabaya pusat', '2024-08-07 10:36:08', '2024-08-07 12:26:48', NULL),
(29, 'han', 'han@gmail.com', '$2y$10$vCJawKXt01JeNSMHrBPeceMDj2QHq.8B9kfHWYW.dtdBLE1FZ0rmi', '1234', 'jbb', '2024-08-07 08:49:39', '2024-08-07 18:23:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tempat_kos`
--

CREATE TABLE `tempat_kos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama_tempat_kos` varchar(100) NOT NULL,
  `kamar` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tempat_kos`
--

INSERT INTO `tempat_kos` (`id`, `user_id`, `nama_tempat_kos`, `kamar`, `alamat`, `deskripsi`, `harga`, `status`) VALUES
(17, 29, 'Kos Sejahtera', 10, 'Jl. Merdeka No. 45, Jakarta', 'Kos nyaman dan strategis di pusat kota.', 2000000, 'Tersedia'),
(18, 29, 'Kos Harapan', 5, 'Jl. Raya Kencana, Bandung', 'Kos dengan fasilitas lengkap dan dekat kampus.', 1800000, 'Tersedia'),
(19, 29, 'Kos Asri', 8, 'Jl. Sukarno No. 12, Surabaya', 'Kos dengan lingkungan tenang dan aman.', 2500000, 'Tersedia'),
(20, 29, 'Kos Indah', 6, 'Jl. Cendana No. 21, Yogyakarta', 'Kos dengan akses mudah dan dekat dengan pusat perbelanjaan.', 1900000, 'Tersedia'),
(21, 29, 'Kos Maju', 4, 'Jl. Pahlawan No. 8, Medan', 'Kos baru dengan fasilitas modern dan harga bersaing.', 2200000, 'Tidak Tersedia'),
(22, 28, 'Kos Bahagia', 6, 'Jl. Raya Merdeka No. 15, Bali', 'Kos dengan pemandangan pantai yang indah.', 3000000, 'Tersedia'),
(23, 28, 'Kos Cendana', 4, 'Jl. Semangka No. 8, Makassar', 'Kos dengan fasilitas lengkap dan dekat dengan pusat perbelanjaan.', 1700000, 'Tidak Tersedia'),
(24, 28, 'Kos Terang', 5, 'Jl. Taman Sari No. 10, Malang', 'Kos yang nyaman dengan lingkungan yang tenang.', 2100000, 'Tersedia'),
(25, 28, 'Kos Kencana', 8, 'Jl. Kuning No. 3, Palembang', 'Kos dengan akses mudah ke transportasi umum.', 2400000, 'Tersedia'),
(26, 28, 'Kos Purnama', 6, 'Jl. Merpati No. 9, Semarang', 'Kos dengan desain modern dan harga terjangkau.', 1800000, 'Tidak Tersedia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemilik_kos`
--
ALTER TABLE `pemilik_kos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tempat_kos`
--
ALTER TABLE `tempat_kos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemilik_kos_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemilik_kos`
--
ALTER TABLE `pemilik_kos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tempat_kos`
--
ALTER TABLE `tempat_kos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tempat_kos`
--
ALTER TABLE `tempat_kos`
  ADD CONSTRAINT `tempat_kos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pemilik_kos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
