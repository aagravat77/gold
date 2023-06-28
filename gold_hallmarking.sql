-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 02:02 AM
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
(5, 'amit agravat', 'aalgopal97@gmail.com', 'i am not happy ok'),
(6, 'amit agravat', 'aagravat805@rku.ac.in', 'moj ne');

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
  `party_id` varchar(10) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` varchar(50) NOT NULL,
  `item_quantity` varchar(50) NOT NULL,
  `item_weight` text NOT NULL,
  `item_image` text NOT NULL,
  `date` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'Not Approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`party_id`, `item_id`, `item_name`, `item_price`, `item_quantity`, `item_weight`, `item_image`, `date`, `status`) VALUES
('1e10', '4841b060bab', 'asdasd', '123', '123', '123', '644afbd933c9a.jpg', '2023-04-28 04:18:57', 'Done'),
('1e10', '814864ba10a', 'weqr', '123', '123', '23.21', '644af2894cf6f.jpg', '2023-04-28 03:39:13', 'Done'),
('1e10', 'fad82bc1b1b', '1212121212121212', '123123', '12312', '12', '644afc900c8a2.png', '2023-04-28 04:22:00', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `party_id` varchar(10) NOT NULL,
  `party_name` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bis_license_image` text NOT NULL,
  `address` text NOT NULL,
  `party_logo` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Not Approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`id`, `party_id`, `party_name`, `date`, `bis_license_image`, `address`, `party_logo`, `status`) VALUES
(2, '1e10', 'adasdasd', '2023-04-27 20:02:37', '644ad4afed437.jpg', 'shree ram,34,rajkot', '644ad4afeda42.jpg', 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `party_done`
--

CREATE TABLE `party_done` (
  `done_id` bigint(50) NOT NULL,
  `item_done_id` varchar(50) NOT NULL,
  `karat` varchar(50) NOT NULL,
  `gold` varchar(50) NOT NULL,
  `other` varchar(50) NOT NULL,
  `charges` varchar(50) NOT NULL,
  `tax` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `date_done` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `party_done`
--

INSERT INTO `party_done` (`done_id`, `item_done_id`, `karat`, `gold`, `other`, `charges`, `tax`, `total`, `date_done`) VALUES
(47, '814864ba10a', '22k916', '91.7%', '1%', '45', '3', '5536.35', '2023-04-27 22:09:23'),
(48, '4841b060bab', '24k999', '99.9%', '1%', '45', '3', '5536.35', '2023-04-27 22:49:06'),
(49, 'fad82bc1b1b', '20k833', '83.3%', '1%', '45', '3', '554041.35', '2023-04-27 22:52:11');

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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(10) NOT NULL,
  `item_pay_id` varchar(50) NOT NULL,
  `card_num` varchar(50) NOT NULL,
  `cvv` varchar(50) NOT NULL,
  `date_card` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT 'Done',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`p_id`, `item_pay_id`, `card_num`, `cvv`, `date_card`, `year`, `amount`, `status`, `date`) VALUES
(9, '814864ba10a', '1212121212121212', '122', '12', '2023', '5536.35', 'Done', '2023-04-27 22:09:46'),
(10, '814864ba10a', '5454545454545454', '132', '12', '2023', '5536.35', 'Done', '2023-04-27 22:52:36');

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
(1, 'Amit Agravat', '9081250270', 'agravat805@rku.ac.in', '2023-04-07 14:26:26', '$2y$10$vNeXoPhsk9oBfr4sEbyXU.zNlFMWA6tyKovQSR1vft8nR2tDjm2Xa', '12121212', 'admin', 'Active', NULL, '2023-04-07 14:24:34', '2023-04-07 14:37:40'),
(2, 'HET GORIYA R.', '9854872154', 'het21@gmal.com', '2023-04-10 13:53:18', '$2y$10$2g6vJak6jScAlBcb3egdXeiEOVhVfysBzIkvF0Q5SI93Mb0a1HYA6', 'asasasas', 'user', 'Active', 'ZbEm5yoWGwdyrwMkO1hY0T7H1jZPCuQlDflTiBelBcTnGFtsmSKWiI4xqmQu', '2023-04-10 13:52:41', '2023-04-27 13:31:53'),
(3, 'RAJ JUNJU', '5421202010', 'raju@gmail.com', '2023-04-19 08:11:40', '$2y$10$aDxFxvKCp8muHupDck35ruo7CXPmpDSzs2orQBFOjeFG8sxIzzpTm', 'qwqwqwqw', 'user', 'Active', NULL, '2023-04-19 08:10:59', '2023-04-19 08:11:40'),
(4, 'heto', '8754215487', 'hetvi@gmail.com', '2023-04-26 04:41:32', '$2y$10$AK3iwsP4IIlLYNoRyVk03O02HcH4wot8t95Cl9jpiGEWoOhF76bVS', 'qwqwqwqw', 'user', 'Active', NULL, '2023-04-26 04:40:58', '2023-04-26 04:41:32');

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
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `a1` (`party_id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`party_id`),
  ADD KEY `order1` (`id`) USING BTREE;

--
-- Indexes for table `party_done`
--
ALTER TABLE `party_done`
  ADD PRIMARY KEY (`done_id`),
  ADD KEY `qw` (`item_done_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `pay` (`item_pay_id`);

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
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactmodel`
--
ALTER TABLE `contactmodel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `party_done`
--
ALTER TABLE `party_done`
  MODIFY `done_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `a1` FOREIGN KEY (`party_id`) REFERENCES `party` (`party_id`);

--
-- Constraints for table `party`
--
ALTER TABLE `party`
  ADD CONSTRAINT `partyid` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `party_done`
--
ALTER TABLE `party_done`
  ADD CONSTRAINT `qw` FOREIGN KEY (`item_done_id`) REFERENCES `order` (`item_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `pay` FOREIGN KEY (`item_pay_id`) REFERENCES `order` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
