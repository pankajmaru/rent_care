-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 02:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `type` enum('admin','tenants') DEFAULT NULL,
  `invoice_number` int(11) NOT NULL,
  `electricity_unit` int(11) DEFAULT NULL,
  `water_unit` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `gst` int(11) DEFAULT NULL,
  `net_amount` int(11) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `user_id`, `room_id`, `type`, `invoice_number`, `electricity_unit`, `water_unit`, `sub_total`, `gst`, `net_amount`, `from_date`, `to_date`, `created_at`, `updated_at`) VALUES
(2, 105, 1, 'tenants', 102, 50, 50, NULL, NULL, NULL, '2020-11-29', '2021-01-09', '2020-12-24 04:04:01', '2020-12-24 04:04:01'),
(3, 107, 3, 'tenants', 102, 100, 100, NULL, NULL, NULL, '2020-11-29', '2021-01-02', '2020-12-24 06:12:01', '2020-12-24 06:12:01'),
(4, 106, 6, 'tenants', 501, 1520, 1250, NULL, NULL, NULL, '2020-11-29', '2021-01-09', '2020-12-24 06:16:55', '2020-12-24 06:16:55'),
(5, 106, 6, 'tenants', 107, 12, 35, NULL, NULL, NULL, '2020-11-29', '2021-01-09', '2020-12-24 08:01:09', '2020-12-24 08:01:09');

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
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2020_12_08_131227_create_users_table', 1),
(10, '2020_12_25_121201_create_images_table', 1),
(11, '2020_12_28_063955_create_image_table', 2),
(13, '2020_12_28_092256_create_users_table', 3),
(15, '2020_12_29_085052_create_user_images_table', 4);

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
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_number` varchar(255) DEFAULT NULL,
  `rent_amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_number`, `rent_amount`, `created_at`, `updated_at`) VALUES
(1, 'S1', 3000, '2020-12-24 01:44:59', '2020-12-24 01:44:59'),
(2, 's2', 5000, '2020-12-24 01:45:10', '2020-12-24 02:30:28'),
(3, 's3', 8000, '2020-12-24 01:45:17', '2020-12-24 01:45:17'),
(4, 's5', 10000, '2020-12-24 01:45:24', '2020-12-24 01:45:24'),
(5, 's6', 12000, '2020-12-24 01:45:32', '2020-12-24 01:45:32'),
(6, 's7', 15000, '2020-12-24 01:45:38', '2020-12-24 01:45:38'),
(7, 's10', 20000, '2020-12-24 01:47:19', '2020-12-24 02:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `room_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('admin','tenants') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `room_id`, `first_name`, `last_name`, `mobile_number`, `name`, `email`, `password`, `type`, `created_at`, `updated_at`) VALUES
(10, NULL, NULL, NULL, NULL, 'thor', 'thor@gmail.com', '$2y$10$87/f/8LA/AJPlg6Ocy6/c.T69WZt70rZGuPWD2XhVsvNR2ff5jX66', NULL, '2020-12-28 23:26:59', '2020-12-28 23:26:59'),
(39, '1', 'asdff', 'man', '9876546544', NULL, NULL, NULL, 'tenants', '2020-12-29 05:17:46', '2020-12-29 05:17:46'),
(40, '6', 'yogi', 'baba', '9876546544', NULL, NULL, NULL, 'tenants', '2020-12-29 05:35:17', '2020-12-29 05:35:17'),
(41, '6', 'yogi', 'baba', '9876546544', NULL, NULL, NULL, 'tenants', '2020-12-29 05:55:05', '2020-12-29 05:55:05'),
(42, '6', 'yogi', 'baba', '9876546544', NULL, NULL, NULL, 'tenants', '2020-12-29 05:58:57', '2020-12-29 05:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_images`
--

CREATE TABLE `user_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_images`
--

INSERT INTO `user_images` (`id`, `user_id`, `image`, `created_at`, `updated_at`) VALUES
(8, 39, '0.32792100 1609238866.png', '2020-12-29 05:17:46', '2020-12-29 05:17:46'),
(9, 40, '0.59687500 1609239917.jpg', '2020-12-29 05:35:17', '2020-12-29 05:35:17'),
(10, 40, '0.63727200 1609239917.jpg', '2020-12-29 05:35:17', '2020-12-29 05:35:17'),
(11, 40, '0.68822400 1609239917.jpg', '2020-12-29 05:35:17', '2020-12-29 05:35:17'),
(12, 40, '0.76239800 1609239917.jpg', '2020-12-29 05:35:17', '2020-12-29 05:35:17'),
(13, 41, '0.63163300 1609241105.jpg', '2020-12-29 05:55:05', '2020-12-29 05:55:05'),
(14, 41, '0.69780900 1609241105.jpg', '2020-12-29 05:55:05', '2020-12-29 05:55:05'),
(15, 41, '0.74782000 1609241105.jpg', '2020-12-29 05:55:05', '2020-12-29 05:55:05'),
(16, 41, '0.82245600 1609241105.jpg', '2020-12-29 05:55:05', '2020-12-29 05:55:05'),
(17, 42, '0.25940700 1609241337.jpg', '2020-12-29 05:58:57', '2020-12-29 05:58:57'),
(18, 42, '0.29201200 1609241337.jpg', '2020-12-29 05:58:57', '2020-12-29 05:58:57'),
(19, 42, '0.33405100 1609241337.jpg', '2020-12-29 05:58:57', '2020-12-29 05:58:57'),
(20, 42, '0.36691900 1609241337.jpg', '2020-12-29 05:58:57', '2020-12-29 05:58:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_images`
--
ALTER TABLE `user_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user_images`
--
ALTER TABLE `user_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
