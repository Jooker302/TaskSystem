-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2022 at 04:53 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasksystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `status`, `user_status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'superadmin@mail.com', 'superadmin', NULL, NULL, '$2y$10$s2HOmEgPfpEe3e9.NHMJa.wZehWvCFXf0cVuSS/N5Qc.QQWyZvj9q', NULL, '2022-11-26 06:00:37', '2022-11-26 06:00:37'),
(2, 'admin', 'admin@mail.com', 'admin', NULL, NULL, '$2y$10$tgfpsfu8Q3ULd4YltHsDMO5OBlpzFw3lw5H2VpRZY1prEEh1r6cAK', NULL, '2022-11-26 06:01:16', '2022-11-26 06:01:16'),
(3, 'User', 'user@mail.com', 'user', NULL, NULL, '$2y$10$xIzgohhCEFWSh87nh5FgzO.UTkvOZx18uXpvahCIImtcez321ID6G', NULL, '2022-11-26 06:01:46', '2022-11-29 10:46:22'),
(4, 'newadmin', 'newadmin@mail.com', 'admin', NULL, NULL, '$2y$10$sKC8c06x6TZPUSdjZiCD5eXy82R5pOSXL1lBRY.uI2SDFotntlO.C', NULL, '2022-11-26 10:51:31', '2022-11-26 10:51:31'),
(5, 'newuser', 'newuser@mail.com', 'user', 'blocked', NULL, '$2y$10$udVgBlHcy9/Y48P6peIFw.NRS.mC0ay23.IIc8DO4khi17ifaogP.', NULL, '2022-11-26 10:52:44', '2022-11-29 10:46:25');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
