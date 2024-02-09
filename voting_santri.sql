-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2024 at 12:03 PM
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
-- Database: `voting_santri`
--

-- --------------------------------------------------------

--
-- Table structure for table `kandidats`
--

CREATE TABLE `kandidats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kandidats`
--

INSERT INTO `kandidats` (`id`, `id_kegiatan`, `nama`, `nik`, `foto`, `visi`, `misi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kandidat 1', '098218392198038912', '1707398873.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-02-08 06:27:53', '2024-02-08 06:27:53'),
(2, 1, 'Kandidat 2', '981293820131', '1707399024.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-02-08 06:28:16', '2024-02-08 06:30:24'),
(3, 1, 'Kandidat 3', '082193812931298', '1707399074.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-02-08 06:31:14', '2024-02-08 06:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatans`
--

CREATE TABLE `kegiatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_dari` date NOT NULL,
  `tanggal_sampai` date NOT NULL,
  `waktu_dari` time NOT NULL,
  `waktu_sampai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatans`
--

INSERT INTO `kegiatans` (`id`, `kegiatan`, `tahun`, `tanggal_dari`, `tanggal_sampai`, `waktu_dari`, `waktu_sampai`, `created_at`, `updated_at`) VALUES
(1, 'Pemilu', '2024', '2024-02-05', '2024-02-10', '09:00:00', '20:00:00', '2024-02-08 05:08:46', '2024-02-09 07:08:47'),
(2, 'Pemilu', '2025', '2025-12-12', '2025-12-15', '08:00:00', '15:00:00', '2024-02-08 05:20:16', '2024-02-08 05:20:16'),
(3, 'Pemilu', '2026', '2026-12-12', '2026-12-15', '08:00:00', '15:00:00', '2024-02-08 05:21:08', '2024-02-08 05:21:08');

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
(5, '2023_12_08_180840_add_column_to_users', 2),
(7, '2023_12_08_192931_create_kegiatans_table', 3),
(9, '2023_12_08_202253_create_data_sampahs_table', 4),
(12, '2023_12_09_035628_create_produks_table', 5),
(14, '2023_12_10_093512_create_dokumentasis_table', 6),
(16, '2023_12_10_094458_create_banners_table', 7),
(17, '2023_12_10_095258_create_beritas_table', 8),
(19, '2023_12_15_131248_create_catatan_keuangans_table', 9),
(20, '2024_01_19_161836_create_data_barangs_table', 10),
(22, '2024_01_19_163302_create_data_suppliers_table', 11),
(23, '2024_01_19_163606_add_column_to_data_barangs', 12),
(24, '2024_01_19_165756_create_barang_masuks_table', 13),
(26, '2024_01_19_173038_create_barang_keluars_table', 14),
(27, '2024_01_19_174233_add_column_to_barang_masuks', 15),
(28, '2024_01_19_174656_add_column_to_barang_keluars', 16),
(29, '2024_01_19_182552_create_reorder_points_table', 17),
(31, '2024_02_07_131317_create_kandidats_table', 18),
(32, '2024_02_08_050023_create_kegiatans_table', 19),
(36, '2024_02_08_135210_create_suaras_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `suaras`
--

CREATE TABLE `suaras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_kandidat` int(11) NOT NULL,
  `tanggal_waktu` datetime NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suaras`
--

INSERT INTO `suaras` (`id`, `id_user`, `id_kegiatan`, `id_kandidat`, `tanggal_waktu`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 106, 1, 2, '2024-02-08 16:43:07', '2024-02-10', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(2, 34, 1, 1, '2024-02-09 16:43:07', '2024-02-05', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(3, 102, 1, 3, '2024-02-05 16:43:07', '2024-02-08', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(4, 91, 1, 1, '2024-02-06 16:43:07', '2024-02-10', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(5, 33, 1, 3, '2024-02-09 16:43:07', '2024-02-09', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(6, 56, 1, 2, '2024-02-06 16:43:07', '2024-02-09', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(7, 29, 1, 3, '2024-02-06 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(8, 115, 1, 2, '2024-02-09 16:43:07', '2024-02-05', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(9, 65, 1, 2, '2024-02-08 16:43:07', '2024-02-08', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(10, 43, 1, 2, '2024-02-07 16:43:07', '2024-02-06', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(11, 84, 1, 3, '2024-02-10 16:43:07', '2024-02-05', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(12, 111, 1, 1, '2024-02-05 16:43:07', '2024-02-06', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(13, 98, 1, 1, '2024-02-08 16:43:07', '2024-02-09', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(14, 104, 1, 2, '2024-02-06 16:43:07', '2024-02-08', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(15, 94, 1, 3, '2024-02-05 16:43:07', '2024-02-06', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(16, 116, 1, 1, '2024-02-05 16:43:07', '2024-02-05', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(17, 60, 1, 3, '2024-02-07 16:43:07', '2024-02-06', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(18, 97, 1, 3, '2024-02-06 16:43:07', '2024-02-09', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(19, 110, 1, 2, '2024-02-09 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(20, 96, 1, 2, '2024-02-05 16:43:07', '2024-02-08', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(21, 43, 1, 3, '2024-02-06 16:43:07', '2024-02-05', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(22, 36, 1, 3, '2024-02-07 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(23, 26, 1, 3, '2024-02-05 16:43:07', '2024-02-05', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(24, 20, 1, 3, '2024-02-10 16:43:07', '2024-02-08', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(25, 39, 1, 1, '2024-02-09 16:43:07', '2024-02-06', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(26, 61, 1, 3, '2024-02-07 16:43:07', '2024-02-08', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(27, 86, 1, 3, '2024-02-07 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(28, 61, 1, 1, '2024-02-07 16:43:07', '2024-02-09', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(29, 27, 1, 1, '2024-02-09 16:43:07', '2024-02-10', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(30, 40, 1, 2, '2024-02-09 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(31, 94, 1, 1, '2024-02-08 16:43:07', '2024-02-08', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(32, 56, 1, 3, '2024-02-08 16:43:07', '2024-02-06', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(33, 30, 1, 1, '2024-02-08 16:43:07', '2024-02-10', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(34, 39, 1, 1, '2024-02-06 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(35, 64, 1, 1, '2024-02-07 16:43:07', '2024-02-05', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(36, 29, 1, 1, '2024-02-05 16:43:07', '2024-02-08', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(37, 68, 1, 3, '2024-02-05 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(38, 36, 1, 1, '2024-02-08 16:43:07', '2024-02-08', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(39, 105, 1, 1, '2024-02-05 16:43:07', '2024-02-05', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(40, 97, 1, 2, '2024-02-08 16:43:07', '2024-02-09', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(41, 30, 1, 2, '2024-02-08 16:43:07', '2024-02-10', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(42, 21, 1, 1, '2024-02-06 16:43:07', '2024-02-06', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(43, 98, 1, 3, '2024-02-06 16:43:07', '2024-02-10', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(44, 46, 1, 1, '2024-02-09 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(45, 35, 1, 3, '2024-02-07 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(46, 22, 1, 2, '2024-02-10 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(47, 41, 1, 3, '2024-02-08 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(48, 57, 1, 2, '2024-02-09 16:43:07', '2024-02-08', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(49, 92, 1, 3, '2024-02-08 16:43:07', '2024-02-08', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(50, 115, 1, 2, '2024-02-09 16:43:07', '2024-02-06', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(51, 55, 1, 3, '2024-02-06 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(52, 86, 1, 2, '2024-02-05 16:43:07', '2024-02-10', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(53, 37, 1, 3, '2024-02-05 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(54, 36, 1, 1, '2024-02-10 16:43:07', '2024-02-05', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(55, 79, 1, 3, '2024-02-07 16:43:07', '2024-02-10', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(56, 100, 1, 1, '2024-02-06 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(57, 26, 1, 3, '2024-02-07 16:43:07', '2024-02-08', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(58, 101, 1, 2, '2024-02-05 16:43:07', '2024-02-06', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(59, 116, 1, 2, '2024-02-10 16:43:07', '2024-02-06', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(60, 20, 1, 2, '2024-02-08 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(61, 48, 1, 1, '2024-02-05 16:43:07', '2024-02-09', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(62, 19, 1, 1, '2024-02-10 16:43:07', '2024-02-05', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(63, 112, 1, 3, '2024-02-06 16:43:07', '2024-02-05', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(64, 70, 1, 1, '2024-02-06 16:43:07', '2024-02-10', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(65, 57, 1, 1, '2024-02-07 16:43:07', '2024-02-05', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(66, 38, 1, 2, '2024-02-10 16:43:07', '2024-02-08', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(67, 66, 1, 2, '2024-02-10 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(68, 46, 1, 2, '2024-02-10 16:43:07', '2024-02-10', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(69, 50, 1, 1, '2024-02-08 16:43:07', '2024-02-06', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(70, 81, 1, 1, '2024-02-08 16:43:07', '2024-02-09', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(71, 94, 1, 2, '2024-02-05 16:43:07', '2024-02-08', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(72, 69, 1, 3, '2024-02-05 16:43:07', '2024-02-09', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(73, 79, 1, 2, '2024-02-05 16:43:07', '2024-02-10', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(74, 77, 1, 2, '2024-02-10 16:43:07', '2024-02-10', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(75, 67, 1, 3, '2024-02-05 16:43:07', '2024-02-06', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(76, 92, 1, 3, '2024-02-10 16:43:07', '2024-02-10', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(77, 37, 1, 2, '2024-02-08 16:43:07', '2024-02-08', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(78, 62, 1, 2, '2024-02-09 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(79, 70, 1, 3, '2024-02-06 16:43:07', '2024-02-10', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(80, 45, 1, 2, '2024-02-05 16:43:07', '2024-02-05', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(81, 42, 1, 1, '2024-02-06 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(82, 61, 1, 3, '2024-02-08 16:43:07', '2024-02-09', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(83, 61, 1, 3, '2024-02-10 16:43:07', '2024-02-06', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(84, 64, 1, 2, '2024-02-08 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(85, 83, 1, 2, '2024-02-05 16:43:07', '2024-02-08', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(86, 61, 1, 2, '2024-02-08 16:43:07', '2024-02-10', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(87, 38, 1, 3, '2024-02-05 16:43:07', '2024-02-10', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(88, 106, 1, 1, '2024-02-10 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(89, 110, 1, 3, '2024-02-08 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(90, 63, 1, 3, '2024-02-06 16:43:07', '2024-02-09', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(91, 62, 1, 1, '2024-02-08 16:43:07', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(92, 54, 1, 2, '2024-02-09 16:43:08', '2024-02-09', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(93, 41, 1, 2, '2024-02-07 16:43:08', '2024-02-10', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(94, 35, 1, 1, '2024-02-06 16:43:08', '2024-02-06', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(95, 72, 1, 1, '2024-02-06 16:43:08', '2024-02-07', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(96, 96, 1, 2, '2024-02-06 16:43:08', '2024-02-08', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(97, 40, 1, 1, '2024-02-07 16:43:08', '2024-02-09', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(98, 68, 1, 3, '2024-02-10 16:43:08', '2024-02-09', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(99, 53, 1, 3, '2024-02-10 16:43:08', '2024-02-09', '2024-02-09 09:43:08', '2024-02-09 09:43:08'),
(100, 114, 1, 1, '2024-02-09 16:43:08', '2024-02-06', '2024-02-09 09:43:08', '2024-02-09 09:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `nik`, `jenis_kelamin`, `password`, `remember_token`, `created_at`, `updated_at`, `foto`, `role`) VALUES
(1, 'admin123', 'admin@gmail.com', '0978090', 'Laki-Laki', '$2y$10$Ki4l6HxPvh9jdc.ic68Tl.oYgkeZ2RC5dKmVb0vGFXotzK7R1Ctk2', NULL, '2023-12-08 10:40:31', '2024-02-07 05:53:40', '1705514188.jpg', 'Admin'),
(17, 'Santri 90', 'santri_90@gmail.com', '93114691', 'Perempuan', '$2y$10$XdhrnmYBZ2FYdjj2fUNLBuDOEDKVmaD0CbghHBkKx/48d8d4Wl2f.', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(18, 'Santri 2', 'santri_2@gmail.com', '26251055', 'Laki-laki', '$2y$10$79UJukbe1Ljd/rlzUtVWOuBQZlEm3hBQNM/b/f5FVO994H1pjp5Ya', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(19, 'Santri 64', 'santri_64@gmail.com', '27772606', 'Laki-laki', '$2y$10$Oxl/kg0Xsf3uokTzb4gpwum0Z5cF/VLvK/bef9YqqU6g1Kj4p5Sva', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(20, 'Santri 68', 'santri_68@gmail.com', '98172064', 'Perempuan', '$2y$10$TlO4c5XsqNWBDSE4ciC0i.66NowsM36pTc7vTtIr9k.Qz/SjRX40y', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(21, 'Santri 28', 'santri_28@gmail.com', '56024979', 'Laki-laki', '$2y$10$uXeKrNk8i3SNkqB8M7FRre38qjRnmYpeU4xwVYU3ypvyZFzV4z1cy', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(22, 'Santri 92', 'santri_92@gmail.com', '55064367', 'Perempuan', '$2y$10$K2QRwivbw8LgSE215dliwOBwohGVZBxmybtx6CaHcejCoaQMzbSA6', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(23, 'Santri 9', 'santri_9@gmail.com', '2991061', 'Laki-laki', '$2y$10$q5vL3Pk09aQnNAJTtPvr1O8.uOcBNObsSSM8vadbHUpFxu57pquSq', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(24, 'Santri 21', 'santri_21@gmail.com', '35327828', 'Laki-laki', '$2y$10$7iCoFfeX7o1JcRbu6I2awedWf/WtHcCEl7f99wdnnQXfgJjuMxLua', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(25, 'Santri 52', 'santri_52@gmail.com', '99946700', 'Laki-laki', '$2y$10$vrKPIu1sCVzvPvHwjwRLXuamGPccN0iJbhIBGtBikZffoUip5ZyMm', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(26, 'Santri 76', 'santri_76@gmail.com', '97982767', 'Perempuan', '$2y$10$4R2juUOHGBOw54.kXFiUIek8QCfjIhCOfk8cZoFZGxBxRBfPvDx3C', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(27, 'Santri 32', 'santri_32@gmail.com', '71373732', 'Perempuan', '$2y$10$LkPatDvjuxGcLk3UTWtWVOndFR4rkX7h/f3oKbCqhpQLN2AC0TCV6', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(28, 'Santri 97', 'santri_97@gmail.com', '80496650', 'Laki-laki', '$2y$10$OFGPKxSbbjdR53sE8zrRteax9IsnL1NEcujVzsiWt0Mh0B8ls3yiy', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(29, 'Santri 10', 'santri_10@gmail.com', '25241713', 'Perempuan', '$2y$10$kJDuNEEBRZppQM/il5GcDeJsZBEqYLh52S4ZJRElQ373236dPhZTq', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(30, 'Santri 72', 'santri_72@gmail.com', '79290137', 'Perempuan', '$2y$10$Zb8NJtxJWBdB8QhsVfRBq.CjSvGyHIEVedDiFRFaTlRmTZd5Xeqca', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(31, 'Santri 15', 'santri_15@gmail.com', '47902271', 'Laki-laki', '$2y$10$053G2M0HuWRPMbfq5SGOUONcJDVp.7X0twPRHQlNdO06EcOUZvbmG', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(32, 'Santri 1', 'santri_1@gmail.com', '74751325', 'Laki-laki', '$2y$10$hulpq12ztYRa.SaO5y62Cu3bhQcPrSIzP8dEuQZS3KBygIeElxUwe', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(33, 'Santri 26', 'santri_26@gmail.com', '68675234', 'Laki-laki', '$2y$10$Hyu/biMzV5LEHv5hy7xdI.ZUHfz/emciQSP8mMVFtNQPRb87kj2FW', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(34, 'Santri 12', 'santri_12@gmail.com', '59119264', 'Laki-laki', '$2y$10$QddS5aLKfO2BJ.W7FG08EOJHAy6Mo8.ZOlaPnmXHsPK93BIz8i3zK', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(35, 'Santri 91', 'santri_91@gmail.com', '26643072', 'Laki-laki', '$2y$10$ZxFCqjNvtW6ND5ISh.iu6uw0.7S.JsgLE7NcUDOItUlPmkQ8b3zQO', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(36, 'Santri 45', 'santri_45@gmail.com', '8908785', 'Perempuan', '$2y$10$ef.gj2JKVCKNmCq6G87kYuapZkbVRBvb5FlLyywFG6v9ssCC.PFje', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(37, 'Santri 86', 'santri_86@gmail.com', '33741443', 'Perempuan', '$2y$10$kPq7cfDoerUmxhXPRAp76.DE3eqDb.EqSHsjyGWv.tvx.UivMEcoy', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(38, 'Santri 67', 'santri_67@gmail.com', '99299743', 'Laki-laki', '$2y$10$TW/amjw.iTXPvgBzfnwIT.6VfDxrL.2673kvwA5GmTBeZZ6JlMBHS', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(39, 'Santri 87', 'santri_87@gmail.com', '24994988', 'Perempuan', '$2y$10$5yE4YFDssAWjVndErlV7O.9qX/h1b0EZcKkLyfGHw2g6Rf5dcP0Fy', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(40, 'Santri 6', 'santri_6@gmail.com', '16400074', 'Laki-laki', '$2y$10$NZfw/urDODXl/MlQIDXSduYKw/.XBvlTqYBmqNVLk2FCQu6sMZdGm', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(41, 'Santri 16', 'santri_16@gmail.com', '75324060', 'Laki-laki', '$2y$10$MBdNLlapEsKgwegCgpxILOeuc6Y9m/9uNGe.mbq3G23lMZ5wpZIkS', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(42, 'Santri 43', 'santri_43@gmail.com', '98896722', 'Perempuan', '$2y$10$tQjxNcKhgYfCsKXlR6eWw.ofytQ19KDHbErRDg6Lj34Z4MxsjqPdy', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(43, 'Santri 33', 'santri_33@gmail.com', '47804358', 'Laki-laki', '$2y$10$fS0bB/0v5Bd9OnYHLZgTb.uvOQ.B8fQxqjZV7gBVF9DEcL.qPxJTS', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(44, 'Santri 3', 'santri_3@gmail.com', '69265838', 'Perempuan', '$2y$10$8km5FiaUJcOX9TX.WBd3pOwHLx9L.xynU9xOObmEQ5ZF0sodh3FaK', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(45, 'Santri 5', 'santri_5@gmail.com', '79999626', 'Perempuan', '$2y$10$d6zYSlZGXRRSb4.zPInYZu23B.87xaGDqCjvYWNS1WAr/cKrOGtbe', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(46, 'Santri 65', 'santri_65@gmail.com', '76320724', 'Perempuan', '$2y$10$j3kddQvTaNFLyo716s9NMeWxK70RpRrbFP9pBlq13mZcQx/Xup.xu', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(47, 'Santri 62', 'santri_62@gmail.com', '64716093', 'Perempuan', '$2y$10$bUQyTfH3UYqs6kh1NMsRquVLRsTrTL2w66fD0tNlbhiAXcOx4ywDm', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(48, 'Santri 39', 'santri_39@gmail.com', '11217564', 'Perempuan', '$2y$10$H2d1e8fpPMjET.2.dGhdOOJz3KLRHKalZ1gGTWl.kfHDpjeYlez9S', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(49, 'Santri 89', 'santri_89@gmail.com', '52850539', 'Perempuan', '$2y$10$3XRgUDIi84JEWj6qD9DEKO5lKh32UVUP5Q8Rw/Y3Hq2mzLyG3jgKm', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(50, 'Santri 61', 'santri_61@gmail.com', '36852863', 'Perempuan', '$2y$10$BVplT1mHOa6jLDcs0JIQMuZ.VeFCUxtd3rh8Sy94YJUw0Ngo7ZbTW', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(51, 'Santri 11', 'santri_11@gmail.com', '1501412', 'Laki-laki', '$2y$10$k8XkU0gNzDnNehCIQ65vruNT8q.8O5SBM7IJDPAWEp3RFU3TRyQmC', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(52, 'Santri 93', 'santri_93@gmail.com', '54096666', 'Perempuan', '$2y$10$2gz9FQBM//kHtU3VgWRZbe6zMD43ZeRzQJihrlN.ylV/uYT6XOzpO', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(53, 'Santri 100', 'santri_100@gmail.com', '53333221', 'Perempuan', '$2y$10$35Pt7VXrTf3LpTKViIrPX.i/bVSkxxReLDLfIRjqUjTajidZMed2S', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(54, 'Santri 73', 'santri_73@gmail.com', '66613395', 'Laki-laki', '$2y$10$AdhHIIgdjSLlQI92iZn.sujMmDOryG6ZuDHeSpm6FkOfH.gAHRh7O', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(55, 'Santri 29', 'santri_29@gmail.com', '20349712', 'Laki-laki', '$2y$10$FkaSpeo4O/GxEmZoiuvpKehsSma/gtdwy8fAl7qSvkiOO65iw9xIa', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(56, 'Santri 77', 'santri_77@gmail.com', '93157196', 'Laki-laki', '$2y$10$i3uyduadMHXfS0J0lwjOzuSxYHncQWSDMh6XtWXf5/f0FJfGm/r6u', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(57, 'Santri 4', 'santri_4@gmail.com', '98940197', 'Perempuan', '$2y$10$LSfztoqvI093LCVMED.wYOijf8ouKJeczEdiFTdjhosDbM8xLFR46', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(58, 'Santri 24', 'santri_24@gmail.com', '47308333', 'Laki-laki', '$2y$10$PgPOKBGJpzXuVI6x2xZ14.WGnh7Lkf4kEA9hlHa/4mXV6oJlnR./m', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(59, 'Santri 98', 'santri_98@gmail.com', '57542464', 'Laki-laki', '$2y$10$q.syBjqiH/3iS6OMcXJb0OSNIfy97oUsacErhgPmIun6Ozp1dfYf.', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(60, 'Santri 35', 'santri_35@gmail.com', '76158144', 'Laki-laki', '$2y$10$T4SsB54lYgTw7deKFzM7F.20sHkN2Hvmf7aTYctnv96ky6YL.wqh6', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(61, 'Santri 14', 'santri_14@gmail.com', '60585193', 'Perempuan', '$2y$10$OKjOcDZsr3FPyMPQsKtomOnz5AaRL.JMSffr0MEzUGJukyzQpvNR6', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(62, 'Santri 31', 'santri_31@gmail.com', '58946384', 'Laki-laki', '$2y$10$Pjf8q3N/2b27GmoLcQLRTuUFgK6Wd1uyfhuhzGl0BR0Ra6F6sqnli', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(63, 'Santri 37', 'santri_37@gmail.com', '64459824', 'Perempuan', '$2y$10$7vXKHJQGNy3JMpAwn.c1T.au.48od1IKglq1s0VF1JwixehXZNic2', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(64, 'Santri 54', 'santri_54@gmail.com', '41475393', 'Perempuan', '$2y$10$NCJhu8BfUslFFZe6FoYtEuAvDafGXbAJ.k4mEXwaGuSByhljTi9mq', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(65, 'Santri 59', 'santri_59@gmail.com', '93388191', 'Perempuan', '$2y$10$BVTZMkbpcivZ7z.VgrZJLOUpaNDZsU5QQtSn2ghwe1BE/laBCD5nC', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(66, 'Santri 50', 'santri_50@gmail.com', '90695950', 'Perempuan', '$2y$10$P6QSqSHi239VnHWujrmjb.JgRZpL4ZCiDExd.1quzbyM9VcrpvO9a', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(67, 'Santri 80', 'santri_80@gmail.com', '98649852', 'Perempuan', '$2y$10$8YN5D947WO/ZY1Yto98Qy.Z97fh/.rj5mdyDEGjbBobj5Cq7OnOu2', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(68, 'Santri 78', 'santri_78@gmail.com', '80958315', 'Laki-laki', '$2y$10$RBLVJ8SDGRAQV9L5tr5pA.oG8ciao4/LM83vs25phWRkUc3X241g.', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(69, 'Santri 99', 'santri_99@gmail.com', '145057', 'Laki-laki', '$2y$10$cI.FLFxhNg/w9fYbJoH6z.GyqyJFXBoQr69YwK/wWjscyNXDinOfG', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(70, 'Santri 66', 'santri_66@gmail.com', '74099706', 'Laki-laki', '$2y$10$UJZcboDgu2qzzOQpqeIV.eEFtDiZlvXXOHC/W0q5dUL3/C3Ex1faq', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(71, 'Santri 19', 'santri_19@gmail.com', '17570109', 'Laki-laki', '$2y$10$pjT5ip6rPpJxEzE0k3HA9ORcfOMy.LGQp.wJvmQQ314TNzwFv.lle', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(72, 'Santri 27', 'santri_27@gmail.com', '67642792', 'Laki-laki', '$2y$10$w1/gmf5I0UkMEueQyBK.4u3B9hMcEYpQ4akuEZNy.txZT8kgyTCLK', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(73, 'Santri 88', 'santri_88@gmail.com', '35854221', 'Perempuan', '$2y$10$Bajo8iFSicG3je9fUri3Vewxrgju.9AyPrJJJH3GAEPxkDvj.XT32', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(74, 'Santri 46', 'santri_46@gmail.com', '41339554', 'Perempuan', '$2y$10$cCEoGsfM6RQ1RoHo1bXNp.pFQ9M4YyYy2iB0KTgbkdzbT8NhG7ZFq', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(75, 'Santri 82', 'santri_82@gmail.com', '68753517', 'Perempuan', '$2y$10$KQFbIBLQvZpz5AwXn7KyOOTQTQspk87uDMCDEnfckn3hwMDpDLpzm', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(76, 'Santri 70', 'santri_70@gmail.com', '58547115', 'Laki-laki', '$2y$10$AS2DVlZQUOhNp7UkzVIu7OFJEVT9PuoKBv2Di1uITvdkw4Tardnci', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(77, 'Santri 25', 'santri_25@gmail.com', '38613017', 'Laki-laki', '$2y$10$d325APmJS0KhGBMqdtYmkO3jgt.yueGZXKMNaiBYHu4SmvbjrEW6u', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(78, 'Santri 58', 'santri_58@gmail.com', '25901184', 'Perempuan', '$2y$10$FJyx5cS/evcMOk2aOIev.eXWqsCJjMZ9FU2MPxb6nsp8eqEE/e20y', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(79, 'Santri 53', 'santri_53@gmail.com', '10761048', 'Laki-laki', '$2y$10$f3Pna1Eq3kDDU5Qpn53XEedtCHMT5ZwqVN7zD2tA/CNH9w24bAmgq', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(80, 'Santri 41', 'santri_41@gmail.com', '18314989', 'Laki-laki', '$2y$10$YSDPqqIUcKeS.6WMJSCmtummtVGKVS7HAN1hXqVjLcpEtm47.lETm', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(81, 'Santri 94', 'santri_94@gmail.com', '65096194', 'Perempuan', '$2y$10$earpLbHavag.v/3X1OfKquSy/JuCj1hIE2s.qYmRfksEsPtX59.ci', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(82, 'Santri 44', 'santri_44@gmail.com', '41407175', 'Perempuan', '$2y$10$QSEpWUXZL3fifwu4nUnA5edJgGK7TMP1r7JTrjqHFfWHfJPc8njv6', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(83, 'Santri 49', 'santri_49@gmail.com', '68120244', 'Perempuan', '$2y$10$dHir9TlvTpPq0UP4disV/.nT77OFcxgJQckBxdYfr478hReuPfUpi', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(84, 'Santri 13', 'santri_13@gmail.com', '51066108', 'Perempuan', '$2y$10$QP4nrKEhEPTPDiHc40zmP.x5W74x8EZvdGVjQ6I8NoBkav93dg25a', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(85, 'Santri 8', 'santri_8@gmail.com', '10842172', 'Laki-laki', '$2y$10$cs/6Wss2z8ZH0dOLzNleWuL5uSh64uUHzIjHfRqhO3WYMyxOfG3Xq', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(86, 'Santri 17', 'santri_17@gmail.com', '1793287', 'Laki-laki', '$2y$10$E5oh6Kf66Bh3njSyqN3zBOmQID9kbfi3TLZwZlggQtjTwuEj5Np2a', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(87, 'Santri 84', 'santri_84@gmail.com', '42301982', 'Laki-laki', '$2y$10$w32dQjS9Xr2VzfLxl9WnveMep7ZtcNMX5LS1pjsU/F9Z7YFqjxnES', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(88, 'Santri 69', 'santri_69@gmail.com', '30838261', 'Perempuan', '$2y$10$YEiPpuXjEs9ALNWPYkKGiuKvhOzGrAYwH5oHZEvQX2Xx5i8EPeOF2', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(89, 'Santri 81', 'santri_81@gmail.com', '48800810', 'Laki-laki', '$2y$10$F4jy.BeXgkADul0Um1gM0ekNiGcSfaaQut2fzp9ifa.egMuqp3bIW', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(90, 'Santri 83', 'santri_83@gmail.com', '54744121', 'Laki-laki', '$2y$10$Y9MVGU3FAkrWIsx8fyT4femLdoacE/eX0Cj.j.FlV/b0Z0/gX6Uue', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(91, 'Santri 57', 'santri_57@gmail.com', '19434003', 'Perempuan', '$2y$10$XCjEDvC0QnTHx8iV2ahIseO0sy4F4v1aX.C3yne36G4bpFs8T2JxG', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(92, 'Santri 22', 'santri_22@gmail.com', '54215876', 'Laki-laki', '$2y$10$xsrWWtyn3bvSwUAYooVLK.qf0u.cuGlIzQW6KPxA7ckI6kRZ0UmRS', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(93, 'Santri 42', 'santri_42@gmail.com', '30912585', 'Laki-laki', '$2y$10$nMV7rR9ysiKXMnwGMLc0c.Pttp8caCoZ9plPgIQ.Ek3B8Ggh58wSK', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(94, 'Santri 23', 'santri_23@gmail.com', '40461092', 'Laki-laki', '$2y$10$aRsHwv.kZ2lmuk.NOvWu.ePaNFg6ct6ulZxjFlDHacuYrvfvpYH96', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(95, 'Santri 47', 'santri_47@gmail.com', '5907290', 'Laki-laki', '$2y$10$VbHt5B/kCVqWELkm3bTE6ukXKDxgi0I5cLDHle9AJW4qWHeOuj2yy', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(96, 'Santri 55', 'santri_55@gmail.com', '83670455', 'Perempuan', '$2y$10$npDhCyaB/.DMnRC1Yei7F.TmCg8xzFc45kUZxPyrAQdiqxj.H9NWC', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(97, 'Santri 95', 'santri_95@gmail.com', '39901854', 'Perempuan', '$2y$10$QvJ7nF8ANU0l2mgvcp/yGeP0pMJmz1jpQYqAzISB1J.W7oUwdHuMi', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(98, 'Santri 38', 'santri_38@gmail.com', '74082638', 'Laki-laki', '$2y$10$lchZGF72fLgNrdVPrgx1C.U1loCc3LSVbcN0rjxCxUXGITgOmo3fS', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(99, 'Santri 36', 'santri_36@gmail.com', '13950944', 'Perempuan', '$2y$10$b5b2WNRhS3bYoL476vm4wuipEmoarxFTEHvl2RJvm/BRH2OU9qO9K', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(100, 'Santri 79', 'santri_79@gmail.com', '90000379', 'Laki-laki', '$2y$10$/V2NCZGY4TFTqrkURIVGA.viYzrHdtRNqFC3720cTSEk7xjxPP16S', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(101, 'Santri 74', 'santri_74@gmail.com', '19858811', 'Perempuan', '$2y$10$n4XqW/X1lxygXaPm9WDkwuQwBAnMVKywEiU0zP/Mn24PkTGzf1qF.', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(102, 'Santri 96', 'santri_96@gmail.com', '22060106', 'Perempuan', '$2y$10$C18joidI8NSjWYP.0jPk9O86ld3lqkknW6N67Nd1BTwNFFY2RyXsq', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(103, 'Santri 48', 'santri_48@gmail.com', '78999619', 'Laki-laki', '$2y$10$/havrTgwkEqKED8VTXuZbO4AAALDVUhF6AqpsKO30MYif62TsjOrS', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(104, 'Santri 63', 'santri_63@gmail.com', '85756756', 'Perempuan', '$2y$10$RdvH.4ranteiGUKjH9f4g.PzKV1ivUq1NI74oZX2DCtuTSbyJzBGq', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(105, 'Santri 85', 'santri_85@gmail.com', '99495174', 'Laki-laki', '$2y$10$sKdZWud.7LGDcmf1drqJee7Oz1JXvbAQ.6N4zA859iSTDTWZXm5LS', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(106, 'Santri 75', 'santri_75@gmail.com', '94677582', 'Laki-laki', '$2y$10$roHVe9nEL3IRjnLPvnD0s.h4wEPqdsM7zZL8XMNbLU.t787ews5ki', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(107, 'Santri 40', 'santri_40@gmail.com', '7237789', 'Laki-laki', '$2y$10$yCEymzhOgPZSG0x4yMmW7uhhkCRQ0837zZz7GAFO0HIzpKF.H5g.K', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(108, 'Santri 60', 'santri_60@gmail.com', '2924230', 'Laki-laki', '$2y$10$ZpjVquW8/lH7w.z96PPM2utXRi0Ra9S7F6QuG/jQW2z1Dk.ZgPeWC', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(109, 'Santri 56', 'santri_56@gmail.com', '81246837', 'Perempuan', '$2y$10$OgGUeqxGAjYoOAjrDhp7eufOflG3tfq6qZNkVpAL4uyyx0.W7hfti', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(110, 'Santri 20', 'santri_20@gmail.com', '93363341', 'Perempuan', '$2y$10$ZnQOJfqq8A7gMwOIovGmHuhy0opa942MWpWK0QyzuoOU3xXma45Ae', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(111, 'Santri 34', 'santri_34@gmail.com', '57403752', 'Laki-laki', '$2y$10$LCGmqnQXC6fHrmVAR9j08.z18FhLfp1xDpqFbwkDQsDkN5mQQ8uae', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(112, 'Santri 51', 'santri_51@gmail.com', '60733774', 'Perempuan', '$2y$10$3q9FA11QF/iBHee3bP9nPOyFHsDlFM6eyEpW.wlwD6r71EcRYBhZ6', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(113, 'Santri 18', 'santri_18@gmail.com', '10597644', 'Perempuan', '$2y$10$ieeOdfxvug3Sd6dVTQgkuekX4wZRCqfdqOrDOruLu76CtjeoT8X7O', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(114, 'Santri 71', 'santri_71@gmail.com', '68024172', 'Perempuan', '$2y$10$7LE60HM1BVe/5rCTdGDKNuST5HS5hwSMzYmcgG.ZHMCR3ZhqLhUoG', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(115, 'Santri 7', 'santri_7@gmail.com', '38649727', 'Perempuan', '$2y$10$AxO2A0LAh5qHyCw5w0ShoOp6LOojrMLJFzSZ1zFNVDBPCc3VQoVLe', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri'),
(116, 'Santri 30', 'santri_30@gmail.com', '51881430', 'Perempuan', '$2y$10$AFjaN24PF3bevYCgToUMm.7QbUPyWvHoov3TF9ix2Si6jUT2up3pq', NULL, '2024-02-09 09:26:53', '2024-02-09 09:26:53', NULL, 'Santri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kandidats`
--
ALTER TABLE `kandidats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suaras`
--
ALTER TABLE `suaras`
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
-- AUTO_INCREMENT for table `kandidats`
--
ALTER TABLE `kandidats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kegiatans`
--
ALTER TABLE `kegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `suaras`
--
ALTER TABLE `suaras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
