-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 03:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catering`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `isi`, `created_at`, `updated_at`) VALUES
(15, 3, 'Makanannya enak, pengirimannya sangat cepat dan aman👍', '2023-08-03 01:40:04', '2023-08-03 01:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_langganan`
--

CREATE TABLE `jenis_langganan` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(200) NOT NULL,
  `diskon` int(11) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_langganan`
--

INSERT INTO `jenis_langganan` (`id`, `nama_jenis`, `diskon`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, '2 Minggu', 15000, 'Paket langganan catering selama 2 minggu adalah solusi yang ideal bagi pelanggan yang ingin menikmati kelezatan hidangan kami dalam jangka waktu yang lebih lama. Dengan berlangganan paket ini, Anda akan merasakan nikmatnya makanan berkualitas tinggi selama dua minggu penuh. Tidak hanya itu, pilihan ini juga memberi Anda kebebasan dari repotnya memesan setiap hari, sehingga Anda bisa lebih santai dan menikmati waktu Anda.', 'foto_menu\\Paket 2 minggu.png', '2023-07-16 19:06:43', '2023-08-08 09:19:48'),
(2, '1 Bulan', 25000, 'Jika Anda mencari pengalaman kuliner yang memuaskan dan praktis, paket langganan catering selama 1 bulan adalah pilihan yang tepat. Dengan berlangganan paket ini, Anda akan mendapatkan kelezatan hidangan kami setiap hari selama 30 hari. Nikmati berbagai variasi menu yang lezat dan seimbang, memberikan Anda kenyamanan dan kepuasan kuliner sepanjang bulan.', 'foto_menu\\Paket 1 bulan.png', '2023-07-16 19:06:43', '2023-08-08 09:20:06'),
(3, '3 Bulan', 35000, 'Paket langganan selama 3 bulan adalah solusi terbaik untuk anda yang menginginkan manfaat penuh dari layanan catering kami. Dengan berlangganan paket ini, Anda akan menikmati hidangan lezat yang konsisten selama 90 hari. Pilihan ini cocok bagi anda yang menghargai kualitas dan ingin pengalaman kuliner yang luar biasa dalam jangka waktu yang lebih panjang. Dengan investasi dalam paket ini, Anda akan merasakan kenyamanan dan kelezatan yang berkelanjutan.', 'foto_menu\\Paket 3 bulan.png', '2023-07-16 19:06:43', '2023-08-08 09:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `created_at`, `update_at`) VALUES
(1, 'Harian', '2023-07-10 17:14:34', '2023-07-10 17:14:34'),
(2, 'Prasmanan', '2023-07-10 17:14:34', '2023-07-10 17:14:34'),
(3, 'Snack Box', '2023-07-10 17:14:34', '2023-07-10 17:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `jenis_menu` varchar(200) NOT NULL DEFAULT 'biasa',
  `updated_at` timestamp NULL DEFAULT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `kategori_id`, `nama_menu`, `created_at`, `jenis_menu`, `updated_at`, `deskripsi`, `harga`, `gambar`) VALUES
(1, 1, 'Paket Spesial', NULL, 'terbaik', '2023-07-23 03:37:51', 'Sarapan : Bubur ayam + telur + usus/ati ampela. Makan Siang : Nasi, ayam goreng, lalapan, sambal, jeruk, puding. Makan Malam : Nasi, ayam bakar, lalapan, sambal, jeruk, puding.', 65000, 'foto_menu\\Paket Spesial.png'),
(2, 1, 'Paket Regular', NULL, 'biasa', '2023-07-23 03:38:49', 'Sarapan : Bubur ayam + telur. Makan Siang : Nasi, ayam goreng, lalapan, sambal, jeruk. Makan Malam : Nasi, ayam bakar, lalapan, sambal, jeruk.', 55000, 'foto_menu\\Paket Regular.png'),
(3, 2, 'Paket Standar', NULL, 'biasa', '2023-07-23 03:39:06', 'Tersedia 5 macam menu : Nasi, ayam suwir, kentang balado, rujak, capcay', 500000, 'foto_menu\\masakan indonesia.jpg'),
(9, 1, 'Paket Standar', '2023-07-17 10:39:03', 'terbaik', '2023-07-23 03:29:01', 'Sarapan : Bubur ayam. Makan Siang : Nasi, ayam bakar, lalapan, sambal,. Makan Malam : Nasi, ayam bakar, lalapan, sambal', 35000, 'foto_menu\\Paket Standar .png'),
(10, 2, 'Paket Regular', '2023-07-23 02:56:07', 'biasa', '2023-07-23 02:56:07', 'Tersedia 7 macam menu : Nasi, ayam suwir, kentang balado, rujak, capcay, bihun oseng, acar', 750000, 'foto_menu\\masakan indonesia.jpg'),
(11, 2, 'Paket Spesial', '2023-07-23 02:59:39', 'biasa', '2023-07-23 03:00:56', 'Tersedia 10 macam menu : Nasi, ayam suwir, kentang balado, rujak, capcay, bihun oseng, acar, tempe orek, telur balado, rolade sapi', 900000, 'foto_menu\\masakan indonesia.jpg'),
(12, 3, 'Paket Standar', '2023-07-23 04:14:22', 'biasa', '2023-07-23 04:14:22', 'Tersedia 4 macam makanan : Lemper ayam, karoket bihun, kue mangkok, pudding', 6000, 'foto_menu\\Snack bos standar.png');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_08_183644_create_menu_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `kategori_id` int(20) DEFAULT NULL,
  `no_pesanan` varchar(200) DEFAULT NULL,
  `nama_menu` varchar(200) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL,
  `qty` int(20) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `subtotal` bigint(20) DEFAULT NULL,
  `diskon` int(20) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `status` enum('proses','kirim') NOT NULL DEFAULT 'proses',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `user_id`, `kategori_id`, `no_pesanan`, `nama_menu`, `deskripsi`, `harga`, `qty`, `alamat`, `subtotal`, `diskon`, `total`, `status`, `created_at`, `updated_at`) VALUES
(20, 3, 1, 'VC-002229', 'Paket Standar', 'Sarapan : Bubur ayam. Makan Siang : Nasi, ayam bakar, lalapan, sambal,. Makan Malam : Nasi, ayam bakar, lalapan, sambal', 35000, 7, 'Jl. Cikutra no 38', 24500000, 35000, 21000000, 'kirim', '2023-08-03 02:48:01', '2023-08-03 05:36:06'),
(22, 24, 3, 'VC-003399', 'Paket Standar', 'Tersedia 4 macam makanan : Lemper ayam, karoket bihun, kue mangkok, pudding', 6000, 7, 'Cikutra', 4200000, 0, 4200000, 'kirim', '2023-08-09 23:40:12', '2023-08-09 23:55:22'),
(24, 23, 1, 'VC-009933', 'Paket Spesial', 'Sarapan : Bubur ayam + telur + usus/ati ampela. Makan Siang : Nasi, ayam goreng, lalapan, sambal, jeruk, puding. Makan Malam : Nasi, ayam bakar, lalapan, sambal, jeruk, puding.', 65000, 3, 'Bandung', 19500000, 0, 19500000, 'proses', '2023-08-10 06:01:47', '2023-08-10 06:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `is_member` int(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `is_member`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ima', 'ima@gmail.com', NULL, '$2y$10$TlIfGmnrjbppiieVUIvk4ehENQ5D3uMHXnH.3RWTfCRdLCxaSCtd6', 'user', 1, NULL, '2023-07-08 12:03:50', '2023-07-23 08:31:18'),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$VzTa7V5c5myz4h1mdE38l..uUdaLFlSgDme8uPe/GmZKp0LX8aoOS', 'admin', NULL, NULL, '2023-07-08 12:03:50', '2023-07-08 12:03:50'),
(3, 'user', 'user@gmail.com', NULL, '$2a$12$A7YX.WRxP8gNyBrtX0tuqOWyN/4N0zSYVFFBRuXqcH1kgiuVfUm6e\n$2a$12$A7YX.WRxP8gNyBrtX0tuqOWyN/4N0zSYVFFBRuXqcH1kgiuVfUm6e\n$2a$12$A7YX.WRxP8gNyBrtX0tuqOWyN/4N0zSYVFFBRuXqcH1kgiuVfUm6e\n$2a$12$A7YX.WRxP8gNyBrtX0tuqOWyN/4N0zSYVFFBRuXqcH1kgiuVfUm6e', 'user', 3, NULL, '2023-07-13 09:48:59', '2023-08-03 03:24:00'),
(5, 'Salma', 'salma@gmail.com', NULL, '$2y$10$czYJQgpWjdtAX6JjpILwBOxOeBOiwAHnP3nneRYPPs5UIjQcOuFpm', 'user', 3, NULL, '2023-07-16 13:54:04', '2023-07-16 14:06:35'),
(23, 'New User', 'newuser@gmail.com', NULL, '$2y$10$COGe2tY4K9b8GAVWCK2tFeo1TV/6XFgY31oPC8of2on6gZ6OvmemK', 'user', NULL, NULL, '2023-08-08 09:21:49', '2023-08-08 09:21:49'),
(24, 'User 2', 'user2@gmail.com', NULL, '$2y$10$MFfnEbyVh04tFncsSemBdOJxwEawXgEdrFolpKcf/iX9M2kYIXJ2C', 'user', 2, NULL, '2023-08-09 23:38:06', '2023-08-09 23:41:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_langganan`
--
ALTER TABLE `jenis_langganan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jenis_langganan`
--
ALTER TABLE `jenis_langganan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
