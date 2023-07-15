-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 15, 2023 at 09:17 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upload_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `question_id`, `answer`, `created_at`, `updated_at`) VALUES
(4, 14, 17, 'Hello', '2023-07-14 01:52:26', '2023-07-14 01:52:26'),
(5, 14, 18, '10173180120006001_1689319346.pdf', '2023-07-14 01:52:26', '2023-07-14 01:52:26'),
(6, 14, 22, 'Screenshot 2023-07-10 at 10.43.05 PM_1689327652.png', '2023-07-14 04:10:52', '2023-07-14 04:10:52'),
(7, 14, 23, 'Hello', '2023-07-14 04:10:52', '2023-07-14 04:10:52'),
(8, 14, 24, 'Yes doen from my side', '2023-07-14 04:12:00', '2023-07-14 04:12:00'),
(9, 11, 25, 'Yes my comments goes here', '2023-07-14 04:24:35', '2023-07-14 04:24:35'),
(10, 11, 26, 'Screenshot 2023-02-22 at 10.34.27 PM_1689328642.png', '2023-07-14 06:27:22', '2023-07-14 06:27:22'),
(11, 11, 27, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like', '2023-07-14 07:02:57', '2023-07-14 07:02:57'),
(12, 11, 28, '10173180120006001_1689330777.pdf', '2023-07-14 07:02:57', '2023-07-14 07:02:57');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_10_114241_create_permalinks_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permalinks`
--

CREATE TABLE `permalinks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permalinks`
--

INSERT INTO `permalinks` (`id`, `user_id`, `permalink`, `created_at`, `updated_at`) VALUES
(1, 2, 'I0ODuhpYcpmoslz01M3opnRSA', '2023-07-10 07:37:22', '2023-07-10 07:37:22'),
(2, 3, 'SKnXdCwBjs2gt4SfMLkAgXOti', '2023-07-10 07:40:29', '2023-07-10 07:40:29'),
(3, 4, 'QbiJd6JshrUkNWPw8wHJwpqsi', '2023-07-10 07:45:32', '2023-07-10 07:45:32'),
(4, 5, '1kOVU1lKLR5hFdfvUqsDEzUZq', '2023-07-10 07:49:24', '2023-07-10 07:49:24'),
(5, 6, 'Mrk5SYnyMoOcqbCchtxE66zpO', '2023-07-10 08:01:06', '2023-07-10 08:01:06'),
(6, 7, '2I1XUerAtb6dmWyDn7ELAyPyf', '2023-07-10 08:05:19', '2023-07-10 08:05:19'),
(7, 8, 'teKxfn5y8ECvfEqAefDwERhzQ', '2023-07-10 08:05:41', '2023-07-10 08:05:41'),
(8, 9, 'YokSbIbSQUWCEYuix1dPuxbDk', '2023-07-10 08:06:13', '2023-07-10 08:06:13'),
(9, 10, 'wzV4Ko90w0ctPf89zkJYD26Iz', '2023-07-10 08:07:27', '2023-07-10 08:07:27'),
(10, 11, 'xkIqfq0zwZ18h7kkMeZJJQ45V', '2023-07-10 08:08:29', '2023-07-10 08:08:29'),
(11, 12, 'ZAxKDSP1eR4h4nn5b1S0lC6Ok', '2023-07-10 08:08:58', '2023-07-10 08:08:58'),
(12, 13, 'reaj7WLDTmSvwzHuCqA2UlY8s', '2023-07-10 08:11:20', '2023-07-10 08:11:20'),
(13, 14, 'nJfOiTQ0ghWXOXB136rm6RDwi', '2023-07-10 10:59:31', '2023-07-10 10:59:31'),
(14, 15, 'wOp1pSmI2Ca8E7mHKLoecSbLo', '2023-07-13 01:33:30', '2023-07-13 01:33:30');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` char(200) NOT NULL,
  `question_type` char(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `question`, `question_type`, `status`, `created_at`, `updated_at`) VALUES
(15, 15, 'Upload NOV statement', 'file', 0, '2023-07-13 01:34:43', '2023-07-13 01:34:43'),
(16, 15, 'Are you married', 'textarea', 0, '2023-07-13 01:34:43', '2023-07-13 01:34:43'),
(17, 14, 'Are you married', 'textarea', 1, '2023-07-14 07:22:26', '2023-07-14 01:52:26'),
(18, 14, 'Upload DEC 2022 satement', 'file', 1, '2023-07-14 07:22:26', '2023-07-14 01:52:26'),
(19, 13, 'sdfsdfsdfsdfsdfsdfsd', 'textarea', 0, '2023-07-13 11:10:29', '2023-07-13 11:10:29'),
(20, 13, 'sdfsdfsdfsdfsdfdsfg', 'file', 0, '2023-07-13 11:10:29', '2023-07-13 11:10:29'),
(21, 13, 'sdfsdfsdfsdf', 'file', 0, '2023-07-13 11:10:29', '2023-07-13 11:10:29'),
(22, 14, 'Upload DEC 2023 statement', 'file', 1, '2023-07-14 09:40:52', '2023-07-14 04:10:52'),
(23, 14, 'Have you submitted your ITR file', 'textarea', 1, '2023-07-14 09:40:52', '2023-07-14 04:10:52'),
(24, 14, 'Are you done', 'textarea', 1, '2023-07-14 09:42:00', '2023-07-14 04:12:00'),
(25, 11, 'hello', 'textarea', 1, '2023-07-14 09:54:35', '2023-07-14 04:24:35'),
(26, 11, 'Upload bank statement for APRIL 2023', 'file', 1, '2023-07-14 09:57:22', '2023-07-14 06:27:22'),
(27, 11, 'New TEXT AQUESTION', 'textarea', 1, '2023-07-14 10:32:57', '2023-07-14 07:02:57'),
(28, 11, 'New Question for upload file', 'file', 1, '2023-07-14 10:32:57', '2023-07-14 07:02:57');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1 COMMENT '1=Admin,2=Client',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$Tz0LHIeIu2hPKpfkh0BR7.40Br/8MxuFzpQq96BOvQHuhVW0luHWu', NULL, 1, '2023-07-10 10:20:15', '2023-07-10 10:20:15'),
(2, 'Rahul mahajan', 'rahul@gmail.com', NULL, '', NULL, 2, '2023-07-10 07:37:22', '2023-07-10 07:37:22'),
(3, 'Sameer Gupta', 'sameer@gmail.com', NULL, '', NULL, 2, '2023-07-10 07:40:29', '2023-07-10 07:40:29'),
(4, 'Kuntal Das', 'kuntal@gmail.com', NULL, '', NULL, 2, '2023-07-10 07:45:32', '2023-07-10 07:45:32'),
(5, 'Krishna Das', 'krishna@gmail.com', NULL, '', NULL, 2, '2023-07-10 07:49:24', '2023-07-10 07:49:24'),
(6, 'Shyam Kumar', 'shyam@gmail.com', NULL, '', NULL, 2, '2023-07-10 08:01:06', '2023-07-10 08:01:06'),
(7, 'Rahul Gupta', 'rahulgupta010@gmail.com', NULL, '', NULL, 2, '2023-07-10 08:05:19', '2023-07-10 08:05:19'),
(8, 'Sanjay Kumar', 'sankaykumar010@gmail.com', NULL, '', NULL, 2, '2023-07-10 08:05:41', '2023-07-10 08:05:41'),
(9, 'Dhruv das', 'exco.dhrubo@gmail.com', NULL, '', NULL, 2, '2023-07-10 08:06:13', '2023-07-10 08:06:13'),
(10, 'Sanjeev Bhadra', 'sanjjevbhadra010@gmail.com', NULL, '', NULL, 2, '2023-07-10 08:07:27', '2023-07-10 08:07:27'),
(11, 'Ranjan Singh', 'ranjansingh09@gmail.com', NULL, '', NULL, 2, '2023-07-10 08:08:29', '2023-07-10 08:08:29'),
(12, 'Raj Mishra', 'raj0878@gmail.com', NULL, '', NULL, 2, '2023-07-10 08:08:58', '2023-07-10 08:08:58'),
(13, 'Kishan Yadav', 'kishan09@gmail.com', NULL, '', NULL, 2, '2023-07-10 08:11:20', '2023-07-10 08:11:20'),
(14, 'Sudip Mishra', 'sudip09@gmail.com', NULL, '', NULL, 2, '2023-07-10 10:59:31', '2023-07-10 10:59:31'),
(15, 'Sanjeev Redy', 'sanjeev_reddy@gmail.com', NULL, '', NULL, 2, '2023-07-13 01:33:30', '2023-07-13 01:33:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `permalinks`
--
ALTER TABLE `permalinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permalinks`
--
ALTER TABLE `permalinks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
