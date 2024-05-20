-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 01:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `attempt_questions`
--

CREATE TABLE `attempt_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(1000) DEFAULT NULL,
  `correctAnswer` varchar(1000) DEFAULT NULL,
  `userAnswer` varchar(1000) DEFAULT NULL,
  `bank` varchar(1000) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attempt_questions`
--

INSERT INTO `attempt_questions` (`id`, `question`, `correctAnswer`, `userAnswer`, `bank`, `userId`, `UserName`, `created_at`, `updated_at`) VALUES
(1, '[\"In what year did the Great October Socialist Revolution take place?\",\"hello\",\"who is ahsan\"]', '[\"A\",\"A\",\"A\"]', '[\"A\",\"C\",\"A\"]', '1', '2', 'user', '2024-05-20 06:40:34', '2024-05-20 06:40:34'),
(2, '[\"In what year did the Great October Socialist Revolution take place?\",\"hello\",\"who is ahsan\"]', '[\"A\",\"A\",\"A\"]', '[\"A\",\"C\",\"D\"]', '1', '2', 'user', '2024-05-20 06:41:51', '2024-05-20 06:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bank1', 1, '2024-05-17 15:21:18', '2024-05-19 10:48:29'),
(2, 'bank2', 1, '2024-05-17 15:21:56', '2024-05-19 07:35:12'),
(3, 'test1', 0, '2024-05-17 15:22:35', '2024-05-19 07:35:40'),
(9, 'test2', 1, '2024-05-19 07:35:47', '2024-05-19 07:35:47');

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
(10, '2024_05_17_155257_create_quiz_questions_table', 1),
(11, '2024_05_17_164956_create_users_table', 1),
(12, '2024_05_17_174150_create_banks_table', 1),
(13, '2024_05_19_101734_create_results_table', 2),
(14, '2024_05_20_070655_create_attempt_questions_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) DEFAULT '0',
  `a` varchar(255) DEFAULT '0',
  `b` varchar(255) DEFAULT '0',
  `c` varchar(255) DEFAULT '0',
  `d` varchar(255) DEFAULT '0',
  `answer` varchar(255) DEFAULT '0',
  `bank` varchar(255) DEFAULT '0',
  `marks` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `question`, `a`, `b`, `c`, `d`, `answer`, `bank`, `marks`, `created_at`, `updated_at`) VALUES
(1, 'In what year did the Great October Socialist Revolution take place?', '1917', '1923', '1915', '1920', 'A', '1', 20, '2024-05-17 15:20:40', '2024-05-19 10:48:10'),
(2, 'hello', '1917', '1923', '1914', '1920', 'A', '1', 10, '2024-05-17 15:21:28', '2024-05-19 12:20:58'),
(3, 'In what year did the Great October Socialist Revolution take place?', '1917', '1923', '1914', '1920', 'A', '3', 30, '2024-05-17 15:23:15', '2024-05-17 15:28:40'),
(5, 'who is ahsan', 'Amazing', 'good', 'perfect', 'Excellent', 'c', '1', 30, '2024-05-19 07:04:46', '2024-05-20 03:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `percentage` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `user_name`, `percentage`, `bank`, `created_at`, `updated_at`) VALUES
(1, '2', 'user', '66.66666666666666', '1', '2024-05-20 06:40:37', '2024-05-20 06:40:37'),
(2, '2', 'user', '33.33333333333333', '1', '2024-05-20 06:41:51', '2024-05-20 06:41:51');

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
('bIWhfKEZhqkzqnqwDomfqnelw0iJWcsZgCewKMVX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0', 'YTo3OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiaHAyZjUwckZVNlhONW9raXZhVEI5ejc5TXZSUFREVnJqNEIxNnZjdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9EYXNoYm9hcmQiO31zOjQ6InJvbGUiO3M6NToiYWRtaW4iO3M6MjoiaWQiO2k6MTtzOjQ6Im5hbWUiO3M6NToiQWhzYW4iO3M6NDoicm9sbCI7aToxO30=', 1716205470);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Ahsan', 'admin@gmail.com', 'admin123', 'admin', '2024-05-17 15:37:11', '2024-05-20 06:44:29'),
(2, 'user', 'user@gmail.com', 'user123', 'user', '2024-05-18 01:51:05', '2024-05-18 01:51:05'),
(4, 'user', 'user12@gmail.com', 'areej1234', 'user', '2024-05-18 14:13:23', '2024-05-18 14:13:23'),
(6, 'areej@gmail.com', 'areej@gmail.com', '2271', 'user', '2024-05-18 14:47:30', '2024-05-18 14:47:30'),
(7, 'ahsan', 'ahsan@gmail.com', '6444', 'user', '2024-05-19 07:06:13', '2024-05-19 07:06:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempt_questions`
--
ALTER TABLE `attempt_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
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
-- AUTO_INCREMENT for table `attempt_questions`
--
ALTER TABLE `attempt_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
