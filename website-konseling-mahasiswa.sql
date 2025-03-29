-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 21, 2024 at 02:20 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website-konseling-mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `konselor`
--

CREATE TABLE `konselor` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konselor`
--

INSERT INTO `konselor` (`id`, `user_id`, `gambar`, `nip`, `no_telepon`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'img-foto-konselor/vRlylFPWwFn6mqyb6pedBkstGsmUtRRruPy4ELBe.jpg', '77', '38', 'Voluptatibus dolor v', '2024-12-13 11:51:20', '2024-12-13 11:51:20', '2024-12-01 18:55:23'),
(2, 2, 'img-foto-konselor/iqSizB8MjxP4LNfvOjnnFHAFgNByHUZE4uF7yThf.jpg', '85', '72', 'Numquam praesentium', '2024-12-13 11:59:18', '2024-12-13 12:42:03', '2024-12-13 12:42:03'),
(3, 2, 'img-foto-konselor/WauSpISuAnzwbSGTWjHL6XkYfp4Yq7yxzsDRg2YY.jpg', '88', '18', 'Cupidatat odit adipi', '2024-12-13 12:42:18', '2024-12-13 12:42:18', NULL),
(4, 4, 'img-foto-konselor/WRem44ivfbmYtWvXHUXqwBsKAekLTLSYkopCjjiW.jpg', '2', '1', 'Ut a sapiente autem <br />\r\n<br />\r\ns<br />\r\ns<br />\r\n<br />\r\ns<br />\r\n<br />\r\nw<br />\r\nw<br />\r\nd', '2024-12-13 12:50:35', '2024-12-13 12:50:35', NULL),
(5, 5, 'img-foto-konselor/12Lok6C3aMT1QPJbFK43JpSYVBZB5kzQOnxkU9Gj.jpg', '25', '50', 'Esse amet aut adipi', '2024-12-13 15:32:59', '2024-12-13 15:32:59', NULL),
(6, 6, 'img-foto-konselor/t9RSDumjKGL6Cl7EBnwb7KuNoKHU2T86P2v96QtD.jpg', '76', '1', 'Praesentium ex debit', '2024-12-13 15:33:13', '2024-12-13 15:33:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_13_181124_create_konselor_table', 2),
(6, '2024_12_13_181537_create_sesi_konseling_table', 2),
(7, '2024_12_14_232208_create_pendaftaran_konseling_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_konseling`
--

CREATE TABLE `pendaftaran_konseling` (
  `id` bigint UNSIGNED NOT NULL,
  `sesi_konseling_id` bigint UNSIGNED NOT NULL,
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `nim` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakulitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_tanggal_lahir` date DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluhan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Menunggu','Terverifikasi','Selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `link` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kesimpulan` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftaran_konseling`
--

INSERT INTO `pendaftaran_konseling` (`id`, `sesi_konseling_id`, `mahasiswa_id`, `nim`, `jurusan`, `fakulitas`, `tempat_tanggal_lahir`, `phone`, `keluhan`, `status`, `created_at`, `updated_at`, `deleted_at`, `link`, `kesimpulan`) VALUES
(1, 1, 3, '56', 'Quisquam tempore ci', 'Sed possimus ad cul', '2022-03-10', '94', 'Eos dolore exercitat', 'Selesai', '2024-12-14 16:47:10', '2024-12-16 08:55:15', NULL, 'http://127.0.0.1:8000/admin/pendaftaran_konseling', 'shshsy'),
(2, 2, 3, '21', 'Itaque minim id culp', 'Qui debitis nostrud', '2023-11-01', '21', 'Non in adipisci ea e', 'Selesai', '2024-12-14 17:22:31', '2024-12-16 08:46:50', NULL, 'http://127.0.0.1:8000/', NULL),
(3, 1, 1, '567', '56uinv', '456', '2024-12-25', '556789', '56', 'Menunggu', '2024-12-16 11:12:27', '2024-12-16 11:12:27', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sesi_konseling`
--

CREATE TABLE `sesi_konseling` (
  `id` bigint UNSIGNED NOT NULL,
  `konselor_id` bigint UNSIGNED NOT NULL,
  `sesi` enum('08:00-09:00','09:00-10:00','10:00-11:00','13:00-14:00','14:00-15:00') COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Tersedia','Terisi') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tersedia',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sesi_konseling`
--

INSERT INTO `sesi_konseling` (`id`, `konselor_id`, `sesi`, `hari`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, '08:00-09:00', 'Selasa', 'Terisi', '2024-12-13 13:33:03', '2024-12-16 11:12:27', NULL),
(2, 3, '14:00-15:00', 'Rabu', 'Tersedia', '2024-12-13 13:45:52', '2024-12-16 08:46:50', NULL),
(3, 4, '14:00-15:00', 'Selasa', 'Terisi', '2024-12-13 15:32:42', '2024-12-14 17:22:31', NULL),
(4, 4, '09:00-10:00', 'Selasa', 'Tersedia', '2024-12-13 15:33:20', '2024-12-13 15:33:20', NULL),
(5, 5, '10:00-11:00', 'Selasa', 'Tersedia', '2024-12-13 15:33:26', '2024-12-13 15:33:26', NULL),
(6, 6, '08:00-09:00', 'Kamis', 'Terisi', '2024-12-13 15:33:37', '2024-12-13 15:33:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_role` enum('Admin','Konselor','Mahasiswa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Mahasiswa',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'Admin', NULL, '$2y$10$Fdg6A56XRN9KOZnauo/vruqyI90KVvr6RtegkzEhHKmie/6ls0MSq', NULL, '2024-12-13 10:19:23', '2024-12-13 10:19:23', NULL),
(2, 'Bert Bernard', 'konserlor@gmail.com', 'Konselor', NULL, '$2y$10$MuHwr5zn5H14eO./E3Ltv.XgX4iB4CCZXyc0iWKyre7Db2Hkz6HY6', NULL, '2024-12-13 10:48:22', '2024-12-13 13:26:21', NULL),
(3, 'Mahasiswa', 'Mahasiwa@gmail.com', 'Mahasiswa', NULL, '$2y$10$vT9oNA77FN43pxpMFkoCou3Nlgub.7TdXdHDiP4GqzP2ufgtiZtvS', NULL, '2024-12-13 10:48:46', '2024-12-13 10:48:46', NULL),
(4, 'Thane Wooten', 'vihopem@mailinator.com', 'Konselor', NULL, '$2y$10$GPF6WdE23aAIR3KdZaxpr.l2Y5Y1uXWmnah9/mNP1Uanm42FIBCRy', NULL, '2024-12-13 12:49:52', '2024-12-13 12:49:52', NULL),
(5, 'Veronica Mayo', 'luqogyb@mailinator.com', 'Konselor', NULL, '$2y$10$rMftiiAanyFmu80CR4TnoOLoeqohhcEgBoztNqctkgTA2S6AXG/e6', NULL, '2024-12-13 12:50:00', '2024-12-13 12:50:00', NULL),
(6, 'Murphy Becker', 'byma@mailinator.com', 'Konselor', NULL, '$2y$10$SPpffDM11Mrnbq24olB6W.mfWK8w9.rtxnKfpnK99/ZCwFXDsVi4K', NULL, '2024-12-13 12:50:08', '2024-12-13 12:50:08', NULL),
(7, 'April Mccray', 'tukapad@mailinator.com', 'Mahasiswa', NULL, '$2y$10$tCF8AgnnDuKgHMpMr9QmhOxqknwTNqC07i67HnBQ7U5JfU6b/THEy', NULL, '2024-12-13 12:50:13', '2024-12-13 12:50:13', NULL);

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
-- Indexes for table `konselor`
--
ALTER TABLE `konselor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `konselor_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pendaftaran_konseling`
--
ALTER TABLE `pendaftaran_konseling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftaran_konseling_sesi_konseling_id_foreign` (`sesi_konseling_id`),
  ADD KEY `pendaftaran_konseling_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sesi_konseling`
--
ALTER TABLE `sesi_konseling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sesi_konseling_konselor_id_foreign` (`konselor_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konselor`
--
ALTER TABLE `konselor`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pendaftaran_konseling`
--
ALTER TABLE `pendaftaran_konseling`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sesi_konseling`
--
ALTER TABLE `sesi_konseling`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `konselor`
--
ALTER TABLE `konselor`
  ADD CONSTRAINT `konselor_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pendaftaran_konseling`
--
ALTER TABLE `pendaftaran_konseling`
  ADD CONSTRAINT `pendaftaran_konseling_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pendaftaran_konseling_sesi_konseling_id_foreign` FOREIGN KEY (`sesi_konseling_id`) REFERENCES `sesi_konseling` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sesi_konseling`
--
ALTER TABLE `sesi_konseling`
  ADD CONSTRAINT `sesi_konseling_konselor_id_foreign` FOREIGN KEY (`konselor_id`) REFERENCES `konselor` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
