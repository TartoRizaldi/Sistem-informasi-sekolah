-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 05:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `telepon`, `alamat`, `created_at`, `updated_at`, `user_id`) VALUES
(17, 'Ilham Kusuma Hidayat', '084232523456', 'Cillacap', '2022-07-06 11:09:50', '2022-07-06 18:09:50', 112),
(18, 'Susi Pujiastuti', '083421325874', 'Cilacap', '2022-07-06 15:10:04', '2022-07-06 22:10:04', 121),
(19, 'Ahmad Fauzi', '085948365012', 'Banyumas', '2022-07-06 15:10:49', '2022-07-06 22:10:49', 122),
(20, 'Komar Sunaryo', '084237489231', 'Cilacap', '2022-07-06 15:11:35', '2022-07-06 22:11:35', 123),
(21, 'Tuti Handayani', '089523769236', 'Cilacap', '2022-07-06 15:12:17', '2022-07-06 22:12:17', 124);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`, `guru_id`, `created_at`, `updated_at`) VALUES
(1, 'X RPL 1', 17, '2022-07-18 13:21:23', NULL),
(4, 'XI BDP 1', 18, '2022-07-18 07:29:16', '2022-07-18 07:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `kode` varchar(191) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `kode`, `nama`, `semester`, `guru_id`, `created_at`, `updated_at`) VALUES
(10, 'M001', 'Matmatika', 'ganjil', 17, '2022-07-06 11:52:31', '2022-07-06 18:52:31'),
(11, 'B002', 'Bahasa Indonesia', 'ganjil', 18, '2022-07-06 15:13:00', '2022-07-06 22:13:00'),
(12, 'I003', 'Bahasa Inggris', 'ganjil', 21, '2022-07-06 15:13:26', '2022-07-06 22:13:26'),
(13, 'O004', 'Olah Raga', 'ganjil', 20, '2022-07-06 15:14:03', '2022-07-06 22:14:03'),
(14, 'A005', 'Agama Islam', 'ganjil', 20, '2022-07-06 15:14:48', '2022-07-06 22:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `mapel_siswa`
--

CREATE TABLE `mapel_siswa` (
  `id` int(11) NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel_siswa`
--

INSERT INTO `mapel_siswa` (`id`, `siswa_id`, `mapel_id`, `nilai`, `created_at`, `updated_at`) VALUES
(102, 1058, 10, 75, '2022-07-06 16:18:38', '2022-07-06 23:18:38'),
(103, 1064, 10, 85, '2022-07-06 16:18:54', '2022-07-06 23:18:54'),
(104, 1059, 10, 70, '2022-07-06 16:19:05', '2022-07-06 23:19:05'),
(105, 1063, 10, 80, '2022-07-06 16:19:18', '2022-07-06 23:19:18'),
(106, 1062, 10, 90, '2022-07-06 16:19:30', '2022-07-06 23:19:30'),
(107, 1061, 10, 80, '2022-07-06 16:19:41', '2022-07-06 23:19:41'),
(108, 1060, 10, 80, '2022-07-06 16:19:52', '2022-07-06 23:19:52'),
(109, 1057, 11, 90, '2022-07-07 22:42:06', '2022-07-08 05:42:06'),
(110, 1058, 11, 80, '2022-07-07 22:42:19', '2022-07-08 05:42:19'),
(111, 1059, 11, 85, '2022-07-07 22:42:30', '2022-07-08 05:42:30'),
(112, 1060, 11, 70, '2022-07-07 22:42:44', '2022-07-08 05:42:44'),
(113, 1061, 11, 85, '2022-07-07 22:42:58', '2022-07-08 05:42:58'),
(114, 1062, 11, 90, '2022-07-07 22:43:09', '2022-07-08 05:43:09'),
(115, 1063, 11, 90, '2022-07-07 22:43:23', '2022-07-08 05:43:23'),
(116, 1064, 11, 60, '2022-07-07 22:43:35', '2022-07-08 05:43:35'),
(117, 1057, 13, 90, '2022-07-07 22:48:08', '2022-07-08 05:48:08'),
(118, 1058, 13, 90, '2022-07-07 22:48:17', '2022-07-08 05:48:17'),
(119, 1059, 13, 90, '2022-07-07 22:48:27', '2022-07-08 05:48:27'),
(120, 1060, 13, 80, '2022-07-07 22:48:37', '2022-07-08 05:48:37'),
(121, 1061, 13, 85, '2022-07-07 22:48:47', '2022-07-08 05:48:47'),
(122, 1062, 13, 70, '2022-07-07 22:48:57', '2022-07-08 05:48:57'),
(123, 1063, 13, 85, '2022-07-07 22:49:13', '2022-07-08 05:49:13'),
(124, 1064, 13, 85, '2022-07-07 22:49:25', '2022-07-08 05:49:25'),
(125, 1057, 12, 75, '2022-07-07 22:50:08', '2022-07-08 05:50:08'),
(126, 1058, 12, 80, '2022-07-07 22:50:18', '2022-07-08 05:50:18'),
(127, 1060, 12, 90, '2022-07-07 22:50:27', '2022-07-08 05:50:27'),
(128, 1059, 12, 70, '2022-07-07 22:50:37', '2022-07-08 05:50:37'),
(129, 1061, 12, 85, '2022-07-07 22:50:48', '2022-07-08 05:50:48'),
(130, 1062, 12, 90, '2022-07-07 22:51:00', '2022-07-08 05:51:00'),
(131, 1064, 12, 85, '2022-07-07 22:51:13', '2022-07-08 05:51:13'),
(133, 1063, 12, 60, '2022-07-07 22:51:49', '2022-07-08 05:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_21_140020_create_siswa_table', 1),
(5, '2021_04_21_174120_create_siswa_table', 2),
(6, '2022_07_18_123934_kelas', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `slug`, `thumbnail`, `created_at`, `updated_at`) VALUES
(8, 112, 'Pengumuman Remidial', '<p>Remidial Matematika bagi siswa yang bernama :&nbsp;</p><ol><li>Rahmat</li><li>Fauzi</li></ol>', 'pengumuman-remidial', 'http://localhost/storage/photos/112/default image.jpg', '2022-07-06 12:23:32', '2022-07-06 19:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` int(10) NOT NULL,
  `nama_depan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `NIS` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `user_id`, `kelas_id`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `agama`, `alamat`, `avatar`, `created_at`, `updated_at`, `NIS`) VALUES
(1057, 113, 1, 'Rahmat Nurul', 'Ikhsan', 'L', 'Kristen', 'Palu', 'default image.jpg', '2022-07-06 11:30:15', '2022-07-06 11:30:15', '13001'),
(1058, 114, 1, 'Bagus', 'Sejahtera', 'L', 'Islam', 'Rembang', 'default image.jpg', '2022-07-06 11:37:36', '2022-07-06 11:37:36', '13002'),
(1059, 115, 1, 'Muhammad', 'Fauzi', 'L', 'Kristen', 'Binangun', 'default image.jpg', '2022-07-06 11:55:39', '2022-07-06 11:55:39', '13003'),
(1060, 116, 1, 'Srirahayu', 'Siti', 'P', 'Islam', 'Cilacap', 'default image.jpg', '2022-07-06 11:57:49', '2022-07-06 11:57:49', '13004'),
(1061, 117, 1, 'Arfan', 'Azmi', 'L', 'Islam', 'Banyumas', 'default image.jpg', '2022-07-06 11:59:07', '2022-07-06 11:59:07', '13108'),
(1062, 118, 1, 'Wulandari', 'Khodijah', 'P', 'Islam', 'Cilacap', 'default image.jpg', '2022-07-06 12:00:29', '2022-07-06 12:00:29', '13109'),
(1063, 119, 1, 'Nurdin', 'Syaifuloh', 'L', 'Islam', 'Banyumas', 'default image.jpg', '2022-07-06 12:03:31', '2022-07-06 12:03:31', '13110'),
(1064, 120, 1, 'Rudiono', 'Budiawan', 'L', 'Islam', 'Banyumas', NULL, '2022-07-06 12:08:13', '2022-07-06 12:08:13', '13111');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(21, 'superAdmin', 'Hidayat', 'hikmahul@gmail.com', NULL, '$2y$10$vNdhCQBQcTlVJAZhyxJZr.rDBu1Xr2Z4ILfoxUGqpEiU6D.qosTUi', 'LIzXnBlMvtARMh1bgmf9A69RvftP5rcnts4l1EGWQuAMgrDGzpwoyQx6gq9M', '2022-04-16 15:31:55', NULL),
(100, 'superAdmin', 'Ilham', 'ilhamhidayat@gmail.com', NULL, '$2y$10$vNdhCQBQcTlVJAZhyxJZr.rDBu1Xr2Z4ILfoxUGqpEiU6D.qosTUi', NULL, NULL, NULL),
(112, 'admin', 'Ilham Kusuma Hidayat', 'hidayatmahul@gmail.com', NULL, '$2y$10$KOsk0oagzhFpz24XDtaFRumxfDkh5AOwxXxLgdhAJ8HinGG7zl3i2', NULL, '2022-07-06 11:09:50', '2022-07-06 11:09:50'),
(113, 'siswa', 'Rahmat Nurul', 'rahmat@gmail.com', NULL, '$2y$10$LXZkHQyTlb/MtmEnnHr7IO4ovQg7DPYMxuSdngRmuG6cdTZzfOrLa', 'EV8D5Ln4tiePYfhMpZh9ecBJGOc62gr99ByJ0LOttKfrvZxq7xozOmZB5iji', '2022-07-06 11:30:15', '2022-07-06 11:30:15'),
(114, 'siswa', 'Bagus', 'bagus@gmail.com', NULL, '$2y$10$qckaKhOxsgmB7z3gnmxkueKAedpP0Thr5FgSfxCE8ITTMrqB8LbHS', 'oxGjkGNtS7IqPmcCY1bGO9eDLZ82BC4wFfvyu88QNoFm624nty1UoWgZz3G4', '2022-07-06 11:37:36', '2022-07-06 11:37:36'),
(115, 'siswa', 'Muhammad', 'fauzi@gmail.com', NULL, '$2y$10$iH8.5AjZviWvIigvYqsM/.U4pSIh6pCrFv27Zr394sKPjpjxGbSK6', 'vVYFxwgilndpmq7pgE8BNbnE09wu9Hwo8UaReZnk7JfCnH2NyQrjijfYJXR6', '2022-07-06 11:55:39', '2022-07-06 11:55:39'),
(116, 'siswa', 'Srirahayu', 'sri@gmail.com', NULL, '$2y$10$H.8KgFkSU3nfj3wqu4/M2ezLY5bzjBpdzYkup/p0lY3GRaQEY9u.q', 'ZpfkhoTJO0UvevKyhzXDMmWhUbp6qUxB9y6g6A5mFM7LOpIzMXqFScIWvJJf', '2022-07-06 11:57:49', '2022-07-06 11:57:49'),
(117, 'siswa', 'Arfan', 'arfan@gmail.com', NULL, '$2y$10$qUSgFOTEJ8YbHAi00cfV7.qNmc7V8W5WKpQABxp1bH7oWhMVXok.a', 'uK3p2MNM2GrMJZHpVi5JQtpwYJqbDg5okk7IXYoyNFw6xdjoh3PasX3ny4wk', '2022-07-06 11:59:07', '2022-07-06 11:59:07'),
(118, 'siswa', 'Wulandari', 'wulan@gmail.com', NULL, '$2y$10$KW5y6H4Q48l/.1V6lj0wEu/lZGJ6c10ciMFCMWKL9Pjy9loYJuA0q', 'XklNjdrh9DvE3YEtHppCUXGruH3gbVHqkxDOljUm3IRjxFNQKbjYTdp15Z4O', '2022-07-06 12:00:29', '2022-07-06 12:00:29'),
(119, 'siswa', 'Nurdin', 'nurdin@gmail.com', NULL, '$2y$10$L.yquDwn62QdRuU6f5qr2.ydGadDxbmaW5nZuKWrYl.THj.gEXxYS', 'Kv4f6C9DAic45MMaF5VnHcb02BJQ6ZurGVR35bSfsuBqIbOC6ByxENydDvDg', '2022-07-06 12:03:31', '2022-07-06 12:03:31'),
(120, 'siswa', 'Rudiono', 'rudi@gmail.com', NULL, '$2y$10$ZdJ/tiCM9Rp8hd/KJ48eRek9Z5s4dAacA/MetXBmJ1N3I1VUk8lCW', 'wPEGJWzBoE4Bnduo5EJSpMBAVzwDS8h71NlKVMNhP8mYDDGjRXTvM6Xs4O5g', '2022-07-06 12:08:13', '2022-07-06 12:08:13'),
(121, 'admin', 'Susi Pujiastuti', 'susi@gmail.com', NULL, '$2y$10$CKRc9dGfhrHLsyLzcA9nQewCrrcWMmrLwbF7wfQJaOQSJ7wL89i1W', NULL, '2022-07-06 15:10:04', '2022-07-06 15:10:04'),
(122, 'admin', 'Ahmad Fauzi', 'ahmad@gmail.com', NULL, '$2y$10$jPkN6DxwH5wao1Hd2R8.S.10xG7mjy5Ic/ElR693rrl3eReY7HbcW', NULL, '2022-07-06 15:10:49', '2022-07-06 15:10:49'),
(123, 'admin', 'Komar Sunaryo', 'komar@gmail.com', NULL, '$2y$10$rh/hsm9KdXbPm.W1rYERQeslZUiPo4M23vvvAjfos0slasgAnGXrO', NULL, '2022-07-06 15:11:35', '2022-07-06 15:11:35'),
(124, 'admin', 'Tuti Handayani', 'tuti@gmail.com', NULL, '$2y$10$SPaK5o67ZCgEDPNEsqdlL.9Gbnrq3tyu2tNVhIco5v//B/Y8mOf1G', NULL, '2022-07-06 15:12:17', '2022-07-06 15:12:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_id` (`guru_id`);

--
-- Indexes for table `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `mapel_id` (`mapel_id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1065;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  ADD CONSTRAINT `mapel_siswa_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mapel_siswa_ibfk_2` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
