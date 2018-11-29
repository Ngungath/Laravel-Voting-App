-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2018 at 08:11 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vote`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `icon`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Ubunge', NULL, NULL, NULL, '2018-10-18 15:56:39', '2018-10-18 15:56:39'),
(2, 'Mwenyekiti wa Kijiji', NULL, NULL, NULL, '2018-11-10 05:22:38', '2018-11-10 05:22:38'),
(3, 'Diwani', NULL, NULL, NULL, '2018-11-10 05:22:50', '2018-11-10 05:22:50'),
(4, 'Uraisi', NULL, NULL, NULL, '2018-11-18 17:53:16', '2018-11-18 17:53:16');

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
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2018_10_17_111754_create_roles_table', 1),
(6, '2018_10_17_112824_create_nominations_table', 1),
(7, '2018_10_17_113601_create_categories_table', 1),
(8, '2018_10_17_114541_create_nomination_user_table', 1),
(9, '2018_10_17_121946_create_settings_table', 1),
(10, '2018_10_17_122436_create_votings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nominations`
--

CREATE TABLE `nominations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_for_nomination` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_nomination` int(11) NOT NULL DEFAULT '1',
  `no_of_votes` int(11) NOT NULL DEFAULT '0',
  `is_admin_selected` tinyint(1) DEFAULT '0',
  `is_won` tinyint(1) DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nominations`
--

INSERT INTO `nominations` (`id`, `name`, `image`, `gender`, `bio`, `linkedin_url`, `business_name`, `reason_for_nomination`, `no_of_nomination`, `no_of_votes`, `is_admin_selected`, `is_won`, `user_id`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Daniel Ngungath', '1.jpg', 'male', NULL, NULL, 'Gulio Tz', 'I like his ideas', 1, 1, 1, 0, 1, 1, NULL, '2018-11-10 11:08:03', '2018-11-20 04:08:03'),
(4, 'Daniel Elias', '2.jpg', 'Male', NULL, NULL, 'Gulio Tz', 'I like his ideas', 1, 0, 1, NULL, 2, 2, NULL, '2018-11-10 16:46:17', '2018-11-16 04:43:25'),
(5, 'Einoth Elias', '3.jpg', 'Female', NULL, NULL, 'Education Firm', 'I like his ideas', 1, 0, NULL, NULL, 3, 3, NULL, '2018-11-10 17:51:47', '2018-11-16 03:23:04'),
(6, 'Saitoti Elias', '4.jpg', '1', NULL, NULL, 'Gulio Tz', 'I like his ideas', 1, 0, 1, NULL, 4, 1, NULL, '2018-11-17 06:10:48', '2018-11-17 14:56:25'),
(7, 'Nedupoto', 'design2.jpg', 'female', NULL, NULL, 'Health Firm', NULL, 1, 0, 0, 0, 6, 4, NULL, '2018-11-19 07:08:13', '2018-11-19 07:08:13'),
(8, 'Scolastica Samson', 'mandoza.jpg', 'female', NULL, NULL, 'Health Firm', 'I like his ideas', 1, 1, 0, 0, 5, 4, NULL, '2018-11-19 07:17:54', '2018-11-20 04:07:49'),
(9, 'Ayubu Sukuriet', 'IMG-20181119-WA0002.jpg', 'male', 'Professor of chemistry', NULL, 'Health Firm', 'I Like His Knowledge', 1, 0, 0, 0, 5, 2, NULL, '2018-11-20 17:26:16', '2018-11-20 17:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `nomination_user`
--

CREATE TABLE `nomination_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomination_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nomination_user`
--

INSERT INTO `nomination_user` (`id`, `nomination_id`, `user_id`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4, 5, 2, NULL, '2018-11-10 16:46:17', '2018-11-10 16:46:17'),
(2, 5, 5, 3, NULL, '2018-11-10 17:51:48', '2018-11-10 17:51:48'),
(3, 6, 5, 1, NULL, '2018-11-17 06:10:49', '2018-11-17 06:10:49'),
(4, 8, 5, 4, NULL, '2018-11-19 07:17:54', '2018-11-19 07:17:54'),
(5, 9, 5, 2, NULL, '2018-11-20 17:26:16', '2018-11-20 17:26:16');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, '2018-10-18 16:14:38', '2018-10-18 16:14:38'),
(2, 'Moderator', NULL, '2018-10-20 19:21:11', '2018-10-20 19:21:11'),
(3, 'Audit Firm', NULL, '2018-10-20 19:21:36', '2018-10-20 19:21:36'),
(4, 'Voters', NULL, '2018-11-15 06:10:20', '2018-11-15 06:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomination_start_date` datetime NOT NULL,
  `nomination_end_date` datetime NOT NULL,
  `voting_start_date` datetime NOT NULL,
  `voting_end_date` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `nomination_start_date`, `nomination_end_date`, `voting_start_date`, `voting_end_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2018-11-01 05:25:00', '2018-11-22 05:25:00', '2018-11-22 05:25:00', '2018-11-30 05:25:00', NULL, '2018-11-11 07:25:53', '2018-11-11 07:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '4',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Daniel Ngungath', 'danielngungath@gmail.com', '$2y$10$vLlFF54iPN6GK/u1yESdF.xcfnVg/JIar64PlvF0hlQdc7kbfvaYa', 4, '7e2zcqfIQfWMCdaeN3t20RdTej7hN7zZE5jVIsmK77rYPhdb1Akxpwica0ZG', '2018-10-17 09:35:29', '2018-10-17 09:35:29', NULL),
(2, 'Daniel Elias', 'daniel2ngungath@gmail.com', 'ericky123', 1, 'joY8LNwcP8rQp0Oo4FI6Q9E4oeBRRmajsWR041dXoVu5rDkDF3mz9oJNTuuY', '2018-10-20 19:19:33', '2018-10-20 19:25:29', NULL),
(3, 'Scolastica Samson', 'scola@gmail.com', 'scola123', 2, NULL, '2018-10-20 19:26:37', '2018-10-20 19:26:37', NULL),
(4, 'Ayubu Sukuriet', 'ayubu@gmail.com', '$2y$10$6naUycz7R8eIZkQrCFiBsOY3d49UoZkZNNsQ56Ujzk0koaL3m2uju', 4, '41LExihFb7pqkxZVFVG0kYlCT8KzQDihHa2SrlAxGpPmmDbN4BKthKVIynQA', '2018-10-20 19:45:42', '2018-10-20 19:45:42', NULL),
(5, 'Daniel Elias', 'scola1@gmail.com', '$2y$10$jn2vdcsv67YJcQgFu52wWOFjFWAaW7DKgpbFGUlX2NpgOMprAZpdS', 4, '4nfTp6KWpSirBT4ModyBcvRWnX74kj3dJRxaDKesQOmctf2bLiaN5DZObrAq', '2018-11-10 02:26:37', '2018-11-18 10:42:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `votings`
--

CREATE TABLE `votings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nomination_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `votings`
--

INSERT INTO `votings` (`id`, `user_id`, `nomination_id`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(11, 5, 8, 4, NULL, '2018-11-20 04:07:49', '2018-11-20 04:07:49'),
(12, 5, 1, 1, NULL, '2018-11-20 04:08:03', '2018-11-20 04:08:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nominations`
--
ALTER TABLE `nominations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nomination_user`
--
ALTER TABLE `nomination_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `votings`
--
ALTER TABLE `votings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `nominations`
--
ALTER TABLE `nominations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `nomination_user`
--
ALTER TABLE `nomination_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `votings`
--
ALTER TABLE `votings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
