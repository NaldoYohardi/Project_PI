-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 05:44 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_pi`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `approval_id` int(10) NOT NULL,
  `request_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `export_history`
--

CREATE TABLE `export_history` (
  `export_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `import_data`
--

CREATE TABLE `import_data` (
  `id` int(11) NOT NULL,
  `import_id` int(10) NOT NULL,
  `approval_id` int(10) NOT NULL,
  `name` text NOT NULL,
  `amount` text DEFAULT NULL,
  `category_id` text DEFAULT NULL,
  `harga` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `import_data`
--

INSERT INTO `import_data` (`id`, `import_id`, `approval_id`, `name`, `amount`, `category_id`, `harga`) VALUES
(2, 1, 1, '{\r\n    \"data\": [\r\n        \"Lampu LED\",\r\n        \"Pensil 2B\",\r\n        \"Pen Standard\"\r\n    ]\r\n}', '{\r\n    \"data\": [\r\n        \"2\",\r\n        \"1\",\r\n        \"3\"\r\n    ]\r\n}', '{\r\n    \"data\": [\r\n        \"1\",\r\n        \"2\",\r\n        \"2\"\r\n    ]\r\n}', '{\r\n    \"data\": [\r\n        \"15000\",\r\n        \"3000\",\r\n        \"2500\"\r\n    ]\r\n}'),
(3, 2, 2, '{\r\n    \"data\": [\r\n        \"LED\",\r\n        \"Pensil 2B\",\r\n        \"Pen Standard\"\r\n    ]\r\n}', '{\r\n    \"data\": [\r\n        \"2\",\r\n        \"1\",\r\n        \"3\"\r\n    ]\r\n}', '{\r\n    \"data\": [\r\n        \"1\",\r\n        \"2\",\r\n        \"2\"\r\n    ]\r\n}', '{\r\n    \"data\": [\r\n        \"15000\",\r\n        \"3000\",\r\n        \"2500\"\r\n    ]\r\n}'),
(4, 10, 10, '[\"Lampu\",\"Pen\",\"Pensil\"]', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `import_history`
--

CREATE TABLE `import_history` (
  `import_id` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_id` int(10) NOT NULL,
  `name` varchar(225) NOT NULL,
  `stock` int(10) NOT NULL,
  `qr_code` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `category_id` int(3) NOT NULL,
  `date_imported` timestamp NOT NULL DEFAULT current_timestamp(),
  `harga_unit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `customer` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified` int(1) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `email_verified`, `password`, `verification_code`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'aldrich', 'aldrich@gmail.com', 0, '$2y$10$vadIvj69BqhAHVXGFWhzsOlzWY4KhMTwRKU4RYMG6YUKX3PUzYM9y', 'e7850ca2d5b8fb08206b46dfb8ec34fd7e3dcc98', 0, NULL, '2021-05-19 19:54:05', '2021-05-19 19:54:05'),
(4, 'naldo', 'naldo@gmail.com', 1, '$2y$10$bbe1C/UtxqERj6XIjvYkRexq4mSeUmZmlzkTPbmV96fyhUwKo5z56', '1d8a38060d237bc12e2307782741bed6ce214d95', 1, NULL, '2021-05-21 21:27:57', '2021-05-21 21:27:57'),
(9, 'endity', 'ndtblank@gmail.com', 0, '$2y$10$WCD/EzDtk1eYIsqoBlimo.TkH4YciYNm3W6BFA9444m1ZKE3jntbO', 'f283a622389ef0f50ccdea1a011d12d5001da3b6', 0, NULL, '2021-05-21 22:54:14', '2021-05-21 22:54:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD KEY `request_id` (`request_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `import_data`
--
ALTER TABLE `import_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_history`
--
ALTER TABLE `import_history`
  ADD KEY `import_id` (`import_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `category_id` (`category_id`);

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
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
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
-- AUTO_INCREMENT for table `import_data`
--
ALTER TABLE `import_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
