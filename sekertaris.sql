-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 11, 2024 at 11:02 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekertaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(40, '2024_02_11_105138_add_column_more_info_to_users', 2),
(41, '2024_02_11_131212_add_column_data_diri_to_users', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `referal_base` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bisnis_tipe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vidio_diri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tentang_diri` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `jenis_kelamin`, `password`, `remember_token`, `created_at`, `updated_at`, `foto`, `role`, `age`, `referal_base`, `referal_code`, `bisnis_tipe`, `linkedin`, `vidio_diri`, `tentang_diri`) VALUES
(1, 'Superadmin', 'superadmin@gmail.com', 'Laki-Laki', '$2y$10$Ki4l6HxPvh9jdc.ic68Tl.oYgkeZ2RC5dKmVb0vGFXotzK7R1Ctk2', NULL, '2023-12-08 10:40:31', '2024-02-11 03:56:56', '1707623816.png', 'Superadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'Admin', 'admin@gmail.com', NULL, '$2y$10$3g4zJfkxrbYb2bBgOWbq5uFh3AAtC56VWO93ebpD1rvwqf8D8CSZG', NULL, '2024-02-11 03:42:20', '2024-02-11 09:04:55', '1707622940.png', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 'Admin 2', 'admin2@gmail.com', 'Laki-Laki', '$2y$10$oY/AHRNdbqJ5SkwGzh9o7O/TmqGLNzWYBfs4d82wCY.y8jJBWEWLm', NULL, '2024-02-11 03:45:37', '2024-02-11 03:45:37', '1707623137.png', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 'Agensi Manufaktur 1', 'agensimanufaktur@gmail.com', NULL, '$2y$10$cn2Yqp5Cfnij1Z01PlHC8u.aOQ4S1/x8OEjHrw4BnDwooR/xzumqa', NULL, '2024-02-11 04:23:11', '2024-02-11 05:26:31', '1707625833.png', 'Agensi', NULL, '01AGENSI', NULL, NULL, NULL, NULL, NULL),
(128, 'Sekertaris Manufaktur', 'sekertarismanufaktur@gmail.com', 'Laki-Laki', '$2y$10$cn2Yqp5Cfnij1Z01PlHC8u.aOQ4S1/x8OEjHrw4BnDwooR/xzumqa', NULL, '2024-02-11 06:23:22', '2024-02-11 08:58:55', '1707641935.jpg', 'Sekertaris', 27, NULL, '01AGENSI', 'Manufaktur', 'https://www.linkedin.com/in/dadang-redantan-b1567529/?originalSubdomain=id', 'https://www.youtube.com/embed/2lFXPsDhwWw?si=cLX-g7r0_YidjUtw', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'),
(129, 'Sekertaris Manufaktur 2', 'sekertarismanufaktur2@gmail.com', 'Laki-Laki', '$2y$10$uhi2FK1WeFUyauBLaFM8ouXJLaf4zJi4Z7hMCYPeKG0jMwtlLAyA.', NULL, '2024-02-11 09:31:16', '2024-02-11 09:31:16', NULL, 'Sekertaris', 20, NULL, NULL, 'Manufaktur', NULL, NULL, NULL),
(130, 'Customer Manufaktur', 'customermanufaktur@gmail.com', 'Laki-Laki', '$2y$10$S282BLdCfe4rx46nVBbSputVmjb.Si820XKU38SLn8.Yqt7et8p7m', NULL, '2024-02-11 09:53:00', '2024-02-11 09:55:38', NULL, 'Customer', 40, NULL, NULL, 'Manufaktur', 'dasdas', 'https://www.youtube.com/embed/D8n0apF7EhM?si=GaIraD9V6yBHKjkp', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
