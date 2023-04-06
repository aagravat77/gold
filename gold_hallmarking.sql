-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 03:17 AM
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
-- Database: `gold_hallmarking`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactmodel`
--

CREATE TABLE `contactmodel` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactmodel`
--

INSERT INTO `contactmodel` (`id`, `name`, `email`, `message`) VALUES
(2, 'amit agravat', 'aagravat805@rku.ac.in', 'sdfsdf'),
(3, 'amit agravat', 'aagravat805@rku.ac.in', 'sdfsdf');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint(20) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `itemprice` varchar(50) NOT NULL,
  `itemquantity` varchar(50) NOT NULL,
  `partyname` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `address` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `itemname`, `itemprice`, `itemquantity`, `partyname`, `date`, `address`, `status`) VALUES
(1, 'gold', '500', '2', 'agravat', '2023-04-06 06:22:48', 'rajkot', 'Pending');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `repeat_password` text NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `number`, `email`, `email_verified_at`, `password`, `repeat_password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Amit Agravat', '9081250270', 'aagravat805@rku.ac.in', '2023-03-29 14:42:40', 'qw12QW!@', '', 'user', 'Deactive', NULL, '2023-03-29 14:41:57', '2023-03-29 14:42:40'),
(4, 'amit agravat', '8080808080', 'hewqt21@gmal.com', '2023-03-29 14:53:54', '$2y$10$aUyKsrHn9SI08xPKZFAKJeWn7gSMXsBydjF.C3xCcYYc.nCg4Xldm', 'qwqw1212', 'user', 'Active', NULL, '2023-03-29 14:53:36', '2023-03-29 14:53:54'),
(6, 'raju', '5060204010', 'raj22@gmail.com', '2023-04-03 03:48:31', '$2y$10$PxJHBwpe0WrKJZ3ialRpq.IcspMeYX8T2hR2jLedhDkP0cEtJFx6W', 'qw12QW!@', 'user', 'Active', NULL, '2023-04-03 03:48:03', '2023-04-03 03:48:31'),
(9, 'goplo', '5050505050', 'gopal@gmail.com', '2023-04-04 11:38:59', '$2y$10$ctk.tSWs5O7eNSfXU6oNku5mqmelutfNeGAhLbskGx7suUgfic3om', 'qw12qw12', 'user', 'Active', 'b74GsxxESyVdQyH3RlK8UIpdroc9CkykRs0GGP09VO7p6GHN8bHXi1jlYIIj', '2023-04-04 11:38:16', '2023-04-04 11:49:10'),
(10, 'asd', '8754215487', 'admin7854@gmail.com', '2023-04-05 12:11:51', '$2y$10$sVTDTL9aYrS3WFT1iyhPyO0EEabbgGPJZs9BWus1oK3PtjgX2GjeC', 'qwqwqwqw', 'user', 'Active', '3NfdDTqsdjdCHGknW8jzjw9uLn5unEnI0gUNCmXRPm72iSvA9JBf6lab1U5I', '2023-04-05 12:07:54', '2023-04-05 14:11:08'),
(12, 'amit agravat', '9999999998', 'baba@gmail.com', '2023-04-05 14:47:46', '$2y$10$ZpMwW609Z.kFJWlQ7Yvr7.zLLlia8rh2p/vmN/YrUrPgdnaKA64BW', '79846512', 'admin', 'Active', NULL, '2023-04-05 14:47:07', '2023-04-05 17:50:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactmodel`
--
ALTER TABLE `contactmodel`
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
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `contactmodel`
--
ALTER TABLE `contactmodel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
