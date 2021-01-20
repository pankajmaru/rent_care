-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 06:20 AM
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
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `name`, `email`, `password`, `admin_image`, `created_at`, `updated_at`) VALUES
(1, 'anjali', 'hulk@gmail.com', '$2y$10$HGqlRHtFMh1RPLbzAMDacOV2m2299zOd2QbADggHCy3s4GYJqBbj6', '0.67884200 1610536727.jpg', '2021-01-12 02:26:13', '2021-01-13 05:48:47');

-- --------------------------------------------------------

--
-- Table structure for table `admin_expenses`
--

CREATE TABLE `admin_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_electricity_bill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_water_bill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maintenance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_expenses`
--

INSERT INTO `admin_expenses` (`id`, `month`, `total_electricity_bill`, `total_water_bill`, `maintenance`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, '1200', '2021-01-15 04:02:28', '2021-01-15 04:02:28'),
(2, NULL, NULL, NULL, '1200', '2021-01-15 04:03:44', '2021-01-15 04:03:44'),
(3, NULL, NULL, NULL, '1200', '2021-01-15 04:04:49', '2021-01-15 04:04:49');

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
  `net_amount` int(11) DEFAULT NULL,
  `total_paid` varchar(255) DEFAULT NULL,
  `total_dues` varchar(255) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `user_id`, `room_id`, `type`, `invoice_number`, `electricity_unit`, `water_unit`, `net_amount`, `total_paid`, `total_dues`, `from_date`, `to_date`, `created_at`, `updated_at`) VALUES
(27, 125, 15, 'tenants', 104, 126, 216, 342, NULL, NULL, '2020-09-01', '2020-09-30', '2021-01-13 08:30:48', '2021-01-13 08:30:48'),
(28, 125, 16, 'tenants', 105, 108, 108, 216, NULL, NULL, '2020-08-01', '2020-08-31', '2021-01-13 08:34:43', '2021-01-13 08:34:43'),
(29, 120, 12, 'tenants', 1201, 900, 900, 100, NULL, NULL, '2020-12-27', '2021-01-30', '2021-01-15 01:29:08', '2021-01-15 01:29:08'),
(30, 120, 11, 'tenants', 1301, 900, 900, 100, NULL, NULL, '2021-01-15', '2021-01-15', '2021-01-15 01:41:34', '2021-01-15 01:41:34'),
(31, 120, 11, 'tenants', 2344, 900, 900, 100, NULL, NULL, '2021-01-15', '2021-01-15', '2021-01-15 01:42:00', '2021-01-15 01:42:00'),
(32, 122, 13, 'tenants', 2344, 1080, 1080, 2172, NULL, NULL, '2021-01-15', '2021-01-15', '2021-01-15 01:47:49', '2021-01-15 01:47:49'),
(33, 123, 16, 'tenants', 1323, 450, 450, 12900, NULL, NULL, '2021-01-15', '2021-01-15', '2021-01-15 01:55:55', '2021-01-15 01:55:55'),
(35, 120, 11, 'tenants', 1501, 900, 900, 5800, NULL, NULL, '2021-01-15', '2021-01-15', '2021-01-15 01:58:40', '2021-01-15 01:58:40'),
(36, 123, 14, 'tenants', 2344, 900, 900, 9800, '5000', '4800', '2021-01-15', '2021-01-15', '2021-01-15 02:55:29', '2021-01-15 02:55:29'),
(37, 120, 12, 'tenants', 1201, 2106, 900, 8006, '100', '7906', '2021-01-18', '2021-01-18', '2021-01-18 05:19:51', '2021-01-18 05:19:51'),
(40, 123, 14, 'tenants', 1548, 900, 1080, 9980, '120', '9860', '2021-01-18', '2021-01-18', '2021-01-18 05:32:43', '2021-01-18 05:32:43'),
(41, 123, 14, 'tenants', 1548, 900, 1080, 9980, '120', '9860', '2021-01-18', '2021-01-18', '2021-01-18 05:34:52', '2021-01-18 05:34:52'),
(42, 123, 14, 'tenants', 1548, 900, 1080, 9980, '120', '9860', '2021-01-18', '2021-01-18', '2021-01-18 05:36:07', '2021-01-18 05:36:07'),
(43, 123, 14, 'tenants', 1548, 900, 1080, 9980, '120', '9860', '2021-01-18', '2021-01-18', '2021-01-18 05:48:11', '2021-01-18 05:48:11'),
(44, 123, 14, 'tenants', 1548, 900, 1080, 9980, '120', '9860', '2021-01-18', '2021-01-18', '2021-01-18 05:48:29', '2021-01-18 05:48:29'),
(45, 124, 16, 'tenants', 132, 1125, 1125, 14250, '3211', '11039', '2021-01-18', '2021-01-18', '2021-01-18 05:59:31', '2021-01-18 05:59:31'),
(46, 124, 16, 'tenants', 132, 1125, 1125, 14250, '3211', '11039', '2021-01-18', '2021-01-18', '2021-01-18 06:00:12', '2021-01-18 06:00:12'),
(47, 124, 16, 'tenants', 132, 1125, 1125, 14250, '3211', '11039', '2021-01-18', '2021-01-18', '2021-01-18 06:01:50', '2021-01-18 06:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `landlord_expenses`
--

CREATE TABLE `landlord_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_electricity_bill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_water_bill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maintenance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landlord_expenses`
--

INSERT INTO `landlord_expenses` (`id`, `month`, `total_electricity_bill`, `total_water_bill`, `maintenance`, `created_at`, `updated_at`) VALUES
(1, '1', '15000', '5000', '1000', '2021-01-15 07:43:32', '2021-01-15 07:43:32');

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
(15, '2020_12_29_085052_create_user_images_table', 4),
(16, '2021_01_12_070443_administrator--table', 5),
(17, '2021_01_15_085035_admin_expenses_table', 6),
(18, '2021_01_15_124020_landlord_table', 7);

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
(11, '13A', 4000, '2021-01-07 01:30:27', '2021-01-07 01:30:27'),
(12, '13B', 5000, '2021-01-07 01:30:33', '2021-01-07 01:30:33'),
(13, '13C', 6000, '2021-01-07 01:30:41', '2021-01-07 01:30:41'),
(14, '13D', 8000, '2021-01-07 01:30:49', '2021-01-07 01:30:49'),
(15, '13F', 10000, '2021-01-07 01:31:00', '2021-01-07 01:31:00'),
(16, '13G', 12000, '2021-01-07 01:31:08', '2021-01-07 01:31:08');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `room_id`, `first_name`, `last_name`, `mobile_number`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(120, '11', 'umesh', 'kumar', '9876546544', NULL, NULL, NULL, '2021-01-13 06:14:40', '2021-01-13 06:14:40'),
(121, '12', 'thor', 'vyas', '9876543211', NULL, NULL, NULL, '2021-01-13 06:15:13', '2021-01-13 06:15:13'),
(122, '13', 'yogi', 'baba', '99999944555', NULL, NULL, NULL, '2021-01-13 06:15:40', '2021-01-13 06:15:40'),
(123, '14', 'hulk', 'singh', '9879879877', NULL, NULL, NULL, '2021-01-13 06:16:11', '2021-01-13 06:16:11'),
(124, '15', 'geli', 'devi', '9856589652', NULL, NULL, NULL, '2021-01-13 06:18:08', '2021-01-13 06:18:08'),
(125, '16', 'urmila', 'puri', '3216546549', NULL, NULL, NULL, '2021-01-13 06:18:28', '2021-01-13 06:18:28');

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
(1, 113, '0.86400200 1610006363.png', '2021-01-07 02:29:23', '2021-01-07 02:29:23'),
(2, 114, '0.36358300 1610006376.png', '2021-01-07 02:29:36', '2021-01-07 02:29:36'),
(3, 115, '0.38721900 1610006393.png', '2021-01-07 02:29:53', '2021-01-07 02:29:53'),
(4, 120, '0.15674500 1610538280.jpg', '2021-01-13 06:14:40', '2021-01-13 06:14:40'),
(5, 121, '0.91200500 1610538313.png', '2021-01-13 06:15:13', '2021-01-13 06:15:13'),
(6, 122, '0.89057000 1610538340.jpg', '2021-01-13 06:15:40', '2021-01-13 06:15:40'),
(7, 123, '0.40451700 1610538371.png', '2021-01-13 06:16:11', '2021-01-13 06:16:11'),
(8, 124, '0.06880700 1610538488.jpg', '2021-01-13 06:18:08', '2021-01-13 06:18:08'),
(9, 125, '0.47672000 1610538508.jpg', '2021-01-13 06:18:28', '2021-01-13 06:18:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_expenses`
--
ALTER TABLE `admin_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landlord_expenses`
--
ALTER TABLE `landlord_expenses`
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
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `admin_expenses`
--
ALTER TABLE `admin_expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `landlord_expenses`
--
ALTER TABLE `landlord_expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `user_images`
--
ALTER TABLE `user_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
