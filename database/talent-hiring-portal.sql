-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 07:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talent-hiring-portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@email.com', NULL, '$2y$10$/VNQMJm2FA.29BAxjmESpu/IDanH1HMtDy6VK5qlAAOHDiyYj/GLi', NULL, '2022-09-12 05:10:27', '2022-09-12 05:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2022_08_30_145255_create_admins_table', 1),
(5, '2022_09_02_115028_create_quizzes_table', 2),
(6, '2022_09_02_115549_create_quiz_options_table', 2),
(7, '2022_09_12_031327_create_results_table', 3);

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
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'capital of bd', '1', '0', '2022-09-02 07:24:59', '2022-09-12 11:07:35'),
(6, 'Incidunt minima aut qui.', '2', '0', '2022-09-12 10:42:29', '2022-09-12 10:42:29'),
(7, 'Id deserunt reprehenderit sit aut.', '1', '0', '2022-09-12 10:42:29', '2022-09-12 10:42:29'),
(8, 'Qui dolorem est quam totam quia distinctio omnis.', '4', '0', '2022-09-12 10:42:30', '2022-09-12 10:42:30'),
(9, 'Voluptas in est dolor id sed.', '3', '0', '2022-09-12 10:42:30', '2022-09-12 10:42:30'),
(10, 'Aspernatur sint beatae architecto est distinctio ad ex.', '3', '0', '2022-09-12 10:42:30', '2022-09-12 10:42:30'),
(11, 'Dolorum suscipit pariatur sed.', '1', '0', '2022-09-12 10:42:30', '2022-09-12 10:42:30'),
(12, 'Animi voluptatem in at iste.', '1', '0', '2022-09-12 10:42:30', '2022-09-12 10:42:30'),
(13, 'Quis tenetur molestiae molestiae aut impedit.', '3', '0', '2022-09-12 10:42:30', '2022-09-12 10:42:30'),
(14, 'Enim a accusamus quis vitae commodi accusamus.', '4', '0', '2022-09-12 10:42:30', '2022-09-12 10:42:30'),
(15, 'Laboriosam voluptatem ut aut maiores vero.', '3', '0', '2022-09-12 10:42:30', '2022-09-12 10:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_options`
--

CREATE TABLE `quiz_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_ans` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_options`
--

INSERT INTO `quiz_options` (`id`, `quiz_id`, `option`, `correct_ans`, `created_at`, `updated_at`) VALUES
(1, 1, 'dhaka', '1', '2022-09-02 07:24:59', '2022-09-02 10:05:31'),
(2, 1, 'chittagong', '1', '2022-09-02 07:24:59', '2022-09-02 10:05:31'),
(3, 1, 'rajshahi', '1', '2022-09-02 07:24:59', '2022-09-02 10:05:31'),
(4, 1, 'khulna', '1', '2022-09-02 07:24:59', '2022-09-02 10:05:31'),
(17, 6, 'pariatur', '3', '2022-09-12 10:57:06', '2022-09-12 10:57:06'),
(18, 6, 'quae', '1', '2022-09-12 10:57:06', '2022-09-12 10:57:06'),
(19, 6, 'et', '2', '2022-09-12 10:57:06', '2022-09-12 10:57:06'),
(20, 6, 'qui', '4', '2022-09-12 10:57:06', '2022-09-12 10:57:06'),
(21, 7, 'sint', '3', '2022-09-12 10:57:33', '2022-09-12 10:57:33'),
(22, 7, 'corrupti', '2', '2022-09-12 10:57:33', '2022-09-12 10:57:33'),
(23, 7, 'eos', '1', '2022-09-12 10:57:33', '2022-09-12 10:57:33'),
(24, 7, 'quidem', '4', '2022-09-12 10:57:34', '2022-09-12 10:57:34'),
(25, 8, 'repudiandae', '4', '2022-09-12 10:57:39', '2022-09-12 10:57:39'),
(26, 8, 'et', '2', '2022-09-12 10:57:39', '2022-09-12 10:57:39'),
(27, 8, 'aliquid', '1', '2022-09-12 10:57:39', '2022-09-12 10:57:39'),
(28, 8, 'quam', '2', '2022-09-12 10:57:39', '2022-09-12 10:57:39'),
(29, 9, 'animi', '3', '2022-09-12 10:57:46', '2022-09-12 10:57:46'),
(30, 9, 'tempora', '4', '2022-09-12 10:57:46', '2022-09-12 10:57:46'),
(31, 9, 'odio', '1', '2022-09-12 10:57:46', '2022-09-12 10:57:46'),
(32, 9, 'ut', '1', '2022-09-12 10:57:46', '2022-09-12 10:57:46'),
(33, 10, 'aspernatur', '3', '2022-09-12 10:57:53', '2022-09-12 10:57:53'),
(34, 10, 'quidem', '1', '2022-09-12 10:57:53', '2022-09-12 10:57:53'),
(35, 10, 'voluptatem', '4', '2022-09-12 10:57:53', '2022-09-12 10:57:53'),
(36, 10, 'sint', '2', '2022-09-12 10:57:53', '2022-09-12 10:57:53'),
(37, 11, 'harum', '3', '2022-09-12 10:58:00', '2022-09-12 10:58:00'),
(38, 11, 'modi', '4', '2022-09-12 10:58:00', '2022-09-12 10:58:00'),
(39, 11, 'odio', '2', '2022-09-12 10:58:00', '2022-09-12 10:58:00'),
(40, 11, 'dignissimos', '4', '2022-09-12 10:58:00', '2022-09-12 10:58:00'),
(41, 12, 'ipsa', '3', '2022-09-12 10:58:24', '2022-09-12 10:58:24'),
(42, 12, 'quaerat', '1', '2022-09-12 10:58:24', '2022-09-12 10:58:24'),
(43, 12, 'odit', '4', '2022-09-12 10:58:24', '2022-09-12 10:58:24'),
(44, 12, 'quis', '4', '2022-09-12 10:58:25', '2022-09-12 10:58:25'),
(45, 13, 'iure', '4', '2022-09-12 10:58:30', '2022-09-12 10:58:30'),
(46, 13, 'accusamus', '1', '2022-09-12 10:58:30', '2022-09-12 10:58:30'),
(47, 13, 'deleniti', '1', '2022-09-12 10:58:30', '2022-09-12 10:58:30'),
(48, 13, 'aspernatur', '3', '2022-09-12 10:58:30', '2022-09-12 10:58:30'),
(49, 14, 'assumenda', '4', '2022-09-12 10:58:35', '2022-09-12 10:58:35'),
(50, 14, 'eveniet', '1', '2022-09-12 10:58:35', '2022-09-12 10:58:35'),
(51, 14, 'qui', '4', '2022-09-12 10:58:35', '2022-09-12 10:58:35'),
(52, 14, 'voluptates', '4', '2022-09-12 10:58:35', '2022-09-12 10:58:35'),
(53, 15, 'in', '1', '2022-09-12 10:58:41', '2022-09-12 10:58:41'),
(54, 15, 'aperiam', '3', '2022-09-12 10:58:41', '2022-09-12 10:58:41'),
(55, 15, 'velit', '2', '2022-09-12 10:58:41', '2022-09-12 10:58:41'),
(56, 15, 'debitis', '4', '2022-09-12 10:58:41', '2022-09-12 10:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `marks` int(11) NOT NULL,
  `out_of` int(11) NOT NULL,
  `highest` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `marks`, `out_of`, `highest`, `created_at`, `updated_at`) VALUES
(19, 3, 2, 11, '0', '2022-09-12 11:13:53', '2022-09-12 11:14:13'),
(20, 3, 3, 11, '1', '2022-09-12 11:14:13', '2022-09-12 11:14:13'),
(21, 4, 2, 11, '1', '2022-09-12 11:14:54', '2022-09-12 11:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `cv_link`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'userr', 'user@email.com', '01515682746', '', NULL, '$2y$10$xCAe9a7e.AJJWK/H19dZ.eWsGrMhzGJ.vt5xBimIXOric4glV6CBu', '2', NULL, '2022-09-02 01:57:52', '2022-09-02 11:15:21'),
(4, 'user2', 'user2@email.com', '01515682746', 'http://cv.com', NULL, '$2y$10$RCgO4nTGJRMuyLe2hPOZKOV2RTU4jR5CdxEppqF1Lm78jExjJM34K', NULL, NULL, '2022-09-12 04:23:50', '2022-09-12 04:23:50'),
(5, 'user', 'user3@email.com', '0154546665', 'http://fb.com', NULL, '$2y$10$/ryCP50HWtXSkJT.GnRk7.hbXghQ6ny1ijWW/TS7udmOVJ3RxSiau', '1', NULL, '2022-09-12 11:30:51', '2022-09-12 11:31:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_options`
--
ALTER TABLE `quiz_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_options_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `quiz_options`
--
ALTER TABLE `quiz_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quiz_options`
--
ALTER TABLE `quiz_options`
  ADD CONSTRAINT `quiz_options_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
