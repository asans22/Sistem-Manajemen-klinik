-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 05:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_manajemen_klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dokters`
--

CREATE TABLE `dokters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_dokter` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `spesialis` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `jadwal` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokters`
--

INSERT INTO `dokters` (`id`, `email`, `id_dokter`, `name`, `alamat`, `no_hp`, `password`, `spesialis`, `deskripsi`, `jadwal`, `image`, `created_at`, `updated_at`) VALUES
(3, 'fadhil@gmail.com', '22081071554', 'dr. Fadhil Ramadhan Sp.P', 'lamgugop', '087801482963', '$2y$12$.yyf7BdTcVXEPaz4GrRHAODvlwuVe7zaTJC/9bcOqIJVypd0810Me', 'paru-paru', 'dokter yang menangani permasalahan mengenai pernapasan terkhususnya paru-paru', 'senin-jumat, 08.00-12.00', '1717565297.jpg', '2024-06-04 22:28:17', '2024-06-04 22:28:17'),
(4, 'magfirah@gmail.com', '1354961984', 'dr. Magfirah Anindia SpPD.', 'meulaboh', '0876589866', '$2y$12$PNK.y03tHlJOnpy/6bfL5.1LPF0/ST2Cr8snf/.QL7CIaNew.nG/2', 'Penyakit Dalam', 'menangani penyakit di dalam tubuh', 'senin-jumat, 08.00-12.00', '1717600952.jpg', '2024-06-05 08:22:33', '2024-06-05 08:30:57'),
(5, 'bintang@gmail.com', '8431687312153', 'dr. Muhammad Bintang, Sp.KK', 'Belawan', '0879268846556', '$2y$12$DLAbcj5sm1OfzKxXkcbklO4bsy9TSJntjoywxAAz/DHFaZ24bQ.GW', 'Spesialis Kulit dan Kelamin', 'Dokter kulit dan kelamin, atau dermatolog.', 'kamis-jumat, 14.00-20.00', '1717601236.jpg', '2024-06-05 08:27:17', '2024-06-05 08:31:29');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_14_173746_create_obats_table', 1),
(5, '2024_05_23_091604_create_dokters_table', 1),
(6, '2024_05_28_224837_create_pasien_table', 1),
(7, '2024_05_29_014757_create_pasien_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `obats`
--

CREATE TABLE `obats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obats`
--

INSERT INTO `obats` (`id`, `name`, `jenis`, `stok`, `created_at`, `updated_at`) VALUES
(3, 'omeprazol', 'obat mag', 3, '2024-06-04 20:56:48', '2024-06-04 22:29:34'),
(4, 'mixagrip', 'obat pusing dan demam', 15, '2024-06-04 22:29:23', '2024-06-04 22:29:23'),
(5, 'Diapet', 'obat diare', 22, '2024-06-05 08:28:01', '2024-06-05 08:28:01'),
(6, 'tolak angin', 'Obat Masuk Angin', 47, '2024-06-05 08:28:29', '2024-06-05 08:28:29'),
(7, 'Lelap', 'obat tidur', 12, '2024-06-05 08:29:00', '2024-06-05 08:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `dokter` varchar(255) NOT NULL,
  `obat` varchar(255) NOT NULL DEFAULT '',
  `hasil_pemeriksaan` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `name`, `keluhan`, `dokter`, `obat`, `hasil_pemeriksaan`, `created_at`, `updated_at`) VALUES
(3, 'Agil', 'sesak nafas', 'dr. Fadhil Ramadhan Sp.P', 'inhelir', 'lakukan ct sceen pada paru paru dan jangan kerja berat', '2024-06-04 22:46:25', '2024-06-04 22:48:22');

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
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `dokter` varchar(255) NOT NULL,
  `spesialis` varchar(255) NOT NULL,
  `jadwal` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id`, `name`, `email`, `alamat`, `dokter`, `spesialis`, `jadwal`, `tanggal`, `keluhan`, `created_at`, `updated_at`) VALUES
(3, 'Agil', 'agil1@gmail.com', 'Blang bintang, Aceh Besar', 'dr. Fadhil Ramadhan Sp.P', 'paru-paru', 'senin-jumat, 08.00-12.00', '2024-06-06', 'sesak nafas', '2024-06-04 22:46:25', '2024-06-04 22:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('suhKfwv4FAJ41Vssy3GZPqpR9RxQ4XE0M1OyVGUz', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:126.0) Gecko/20100101 Firefox/126.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWkl6STRmMnJsUkpHbHdBWnQwQWRLVjJDS3Z6Sm40WlNzMGxSMkp3ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZXNlcnZhc2lEb2t0ZXIvNCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1717601513);

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
  `no_hp` varchar(255) NOT NULL DEFAULT '',
  `alamat` varchar(255) NOT NULL DEFAULT '',
  `role` enum('admin','user','dokter') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `no_hp`, `alamat`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ahmad', 'ahmadsyahrmdn@gmail.com', NULL, '$2y$12$8Q9g.wD7yJwMQa4ffCDmGee4BrGA/E0Xg28Vl.N5QR91AJMWKgeHu', '087801482963', 'Jalan Utama Gampong Rukoh', 'admin', NULL, '2024-05-29 23:36:53', '2024-05-29 23:36:53'),
(2, 'agil mughni', 'agil@gmail.com', NULL, '$2y$12$iQOIRvVwFMVZz6020u/32.S6xHIJDaB/MxhcH8ynzIGRDvJUHbaue', '0878787878', 'blang bintang', 'user', NULL, '2024-05-29 23:38:17', '2024-05-29 23:38:17'),
(5, 'ammar  qurtuby', 'ammar@gmail.com', NULL, '$2y$12$xuVj1vlpHLBEymIjN0u3o.6Q6xGuM8zhpTjYaUf86Y/TMADIGQ2cq', '08782136548', 'lamgugop', 'user', NULL, '2024-06-02 21:16:54', '2024-06-02 21:16:54'),
(6, 'dr. Fadhil Ramadhan Sp.P', 'fadhil@gmail.com', NULL, '$2y$12$Pqi/vKAN5Kd5Uq8.fjtiOuO4yTEmy4JPAYwaqEdkAW3c62aH2u8V2', '087801482963', 'lamgugop', 'dokter', NULL, '2024-06-04 22:28:18', '2024-06-04 22:28:18'),
(7, 'Agil', 'agil1@gmail.com', NULL, '$2y$12$hZ7aiIqFzwVgKf4IgSqIaeBusEsxEfuA6Cc0JpHyM9Gfseav8FGae', '082361983696', 'Blang bintang, Kec. Kuta Baro, Aceh Besar', 'user', NULL, '2024-06-04 22:30:48', '2024-06-04 22:47:14'),
(8, 'almahfuzh fadhlur roman', 'roman@gmail.com', NULL, '$2y$12$p1MpQr.wDopn1Vh7wzKFlOuv97N2vV0IUGzxV.SZjojtp9360FiDG', '0878512641', 'binjai', 'user', NULL, '2024-06-05 08:11:47', '2024-06-05 08:11:47'),
(9, 'shofia nurul huda', 'shofia@gmail.com', NULL, '$2y$12$PxWLCiLHZ6s9tz/w499CXesSSZycRA5plnqKmxeklE5NgFg5kSipC', '086513546845', 'tungkop', 'user', NULL, '2024-06-05 08:13:08', '2024-06-05 08:13:08'),
(10, 'dr. Magfirah Anindia SpPD.', 'magfirah@gmail.com', NULL, '$2y$12$7oRrj9cc8ItHu4iWZ0AvDuzpx3iKcfZPYgI4x6BXf1JPmzDmXQJQW', '0876589866', 'meulaboh', 'dokter', NULL, '2024-06-05 08:22:33', '2024-06-05 08:30:58'),
(11, 'dr. Muhammad Bintang, Sp.KK', 'bintang@gmail.com', NULL, '$2y$12$mRS3dYo8O.VBkMtoi1rGAeciZ.RtxiHRulAgXYJYy7KhXHBoEmtde', '0879268846556', 'Belawan', 'dokter', NULL, '2024-06-05 08:27:17', '2024-06-05 08:31:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `dokters`
--
ALTER TABLE `dokters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dokters_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obats`
--
ALTER TABLE `obats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `dokters`
--
ALTER TABLE `dokters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `obats`
--
ALTER TABLE `obats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
