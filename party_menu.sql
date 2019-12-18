-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2019 at 01:53 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `party_menu`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(8, 'Основно', '2019-11-28 12:32:05', '2019-11-29 05:59:47'),
(9, 'Десерт', '2019-11-28 12:32:17', '2019-11-28 12:32:17'),
(10, 'Предястие', '2019-11-28 12:32:25', '2019-11-28 12:32:25'),
(11, 'Салата', '2019-11-28 14:46:19', '2019-11-28 14:46:19'),
(12, 'Гарнитура', '2019-11-28 14:59:17', '2019-11-28 14:59:17'),
(13, 'Мезета', '2019-11-29 05:51:32', '2019-11-29 05:51:32'),
(14, 'Супи', '2019-11-29 06:30:14', '2019-11-29 06:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`id`, `name`, `price`, `created_at`, `updated_at`, `restaurant_id`) VALUES
(1, 'Ракия', '3.00', '2019-11-28 10:06:20', '2019-11-28 10:06:20', 1),
(2, 'Бира', '2.00', '2019-11-28 13:20:19', '2019-11-28 13:20:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `name`, `price`, `created_at`, `updated_at`, `restaurant_id`, `category_id`) VALUES
(33, 'Пилешка пържола на скара', '5.00', '2019-11-28 14:58:56', '2019-11-28 14:58:56', 7, 8),
(34, 'Свинска пържола', '6.00', '2019-11-29 06:29:52', '2019-11-29 06:29:52', 7, 8),
(35, 'Пилешка', '2.00', '2019-11-29 06:30:36', '2019-11-29 06:30:36', 1, 14),
(37, 'Pile', '2.30', '2019-11-29 06:46:51', '2019-11-29 06:46:51', 1, 14),
(38, '1', '1.00', NULL, NULL, 1, 13),
(39, '2', '2.00', NULL, NULL, 1, 12),
(40, '3', '3.00', NULL, NULL, 1, 9),
(41, '4', '4.00', NULL, NULL, 1, 10),
(42, '5', '5.00', NULL, NULL, 1, 13),
(43, '33', '3.00', NULL, NULL, 1, 9),
(44, '333', '3.00', NULL, NULL, 1, 9),
(45, 'Свинско със зеле', '6.00', '2019-12-16 05:57:34', '2019-12-16 05:57:34', 1, 8),
(46, 'Сссс', '8.50', '2019-12-16 05:58:45', '2019-12-16 05:58:45', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `budget` decimal(8,2) NOT NULL,
  `people` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `budget`, `people`, `created_at`, `updated_at`, `user_id`, `restaurant_id`) VALUES
(1, '123.00', 1, '2019-12-02 05:35:44', '2019-12-02 05:35:44', 2, 1),
(2, '123.00', 1, '2019-12-02 05:36:22', '2019-12-02 05:36:22', 2, 1),
(3, '123.00', 1, '2019-12-02 05:38:42', '2019-12-02 05:38:42', 2, 1),
(4, '123.00', 1, '2019-12-02 05:38:52', '2019-12-02 05:38:52', 2, 1),
(5, '123.00', 1, '2019-12-02 05:39:10', '2019-12-02 05:39:10', 2, 1),
(6, '123.00', 1, '2019-12-02 05:39:34', '2019-12-02 05:39:34', 2, 1),
(7, '123.00', 1, '2019-12-02 05:41:07', '2019-12-02 05:41:07', 2, 1),
(8, '123.00', 1, '2019-12-02 05:41:25', '2019-12-02 05:41:25', 2, 1),
(9, '123.00', 1, '2019-12-02 05:43:22', '2019-12-02 05:43:22', 2, 1),
(10, '123.00', 1, '2019-12-02 06:01:18', '2019-12-02 06:01:18', 2, 1),
(11, '144.00', 2, '2019-12-02 06:01:37', '2019-12-02 06:01:37', 2, 1),
(12, '144.00', 2, '2019-12-02 06:03:28', '2019-12-02 06:03:28', 2, 1),
(13, '122.00', 1, '2019-12-02 06:10:39', '2019-12-02 06:10:39', 2, 1),
(14, '122.00', 1, '2019-12-02 06:18:00', '2019-12-02 06:18:00', 2, 1),
(15, '122.00', 1, '2019-12-02 06:18:58', '2019-12-02 06:18:58', 2, 1),
(16, '122.00', 1, '2019-12-02 06:19:32', '2019-12-02 06:19:32', 2, 1),
(17, '122.00', 1, '2019-12-02 06:20:51', '2019-12-02 06:20:51', 2, 1),
(18, '122.00', 1, '2019-12-02 06:21:06', '2019-12-02 06:21:06', 2, 1),
(19, '122.00', 1, '2019-12-02 06:21:39', '2019-12-02 06:21:39', 2, 1),
(20, '122.00', 1, '2019-12-02 06:23:20', '2019-12-02 06:23:20', 2, 1),
(21, '122.00', 1, '2019-12-02 06:23:49', '2019-12-02 06:23:49', 2, 1),
(22, '122.00', 1, '2019-12-02 06:25:07', '2019-12-02 06:25:07', 2, 1),
(23, '122.00', 1, '2019-12-02 06:53:11', '2019-12-02 06:53:11', 2, 1),
(24, '122.00', 1, '2019-12-02 06:53:42', '2019-12-02 06:53:42', 2, 1),
(25, '122.00', 1, '2019-12-02 06:54:18', '2019-12-02 06:54:18', 2, 1),
(26, '211.00', 2, '2019-12-02 13:07:49', '2019-12-02 13:07:49', 2, 1),
(27, '211.00', 2, '2019-12-02 13:08:16', '2019-12-02 13:08:16', 2, 1),
(28, '54.00', 2, '2019-12-02 13:19:24', '2019-12-02 13:19:24', 2, 1),
(29, '54.00', 2, '2019-12-02 13:19:37', '2019-12-02 13:19:37', 2, 1),
(30, '54.00', 2, '2019-12-02 13:20:15', '2019-12-02 13:20:15', 2, 1),
(31, '54.00', 2, '2019-12-02 13:20:37', '2019-12-02 13:20:37', 2, 1),
(32, '54.00', 1, '2019-12-02 13:20:54', '2019-12-02 13:20:54', 2, 1),
(33, '54.00', 1, '2019-12-02 13:21:12', '2019-12-02 13:21:12', 2, 1),
(34, '54.00', 1, '2019-12-02 13:21:44', '2019-12-02 13:21:44', 2, 1),
(35, '123.00', 12, '2019-12-02 13:22:08', '2019-12-02 13:22:08', 2, 1),
(36, '123.00', 12, '2019-12-02 13:23:53', '2019-12-02 13:23:53', 2, 1),
(37, '21.00', 1, '2019-12-02 13:24:29', '2019-12-02 13:24:29', 2, 1),
(38, '123.00', 1, '2019-12-02 13:25:19', '2019-12-02 13:25:19', 2, 1),
(39, '332.00', 1, '2019-12-02 13:25:45', '2019-12-02 13:25:45', 2, 1),
(40, '332.00', 1, '2019-12-02 13:26:48', '2019-12-02 13:26:48', 2, 1),
(41, '332.00', 1, '2019-12-02 13:27:04', '2019-12-02 13:27:04', 2, 1),
(42, '231.00', 2, '2019-12-02 13:27:11', '2019-12-02 13:27:11', 2, 1),
(43, '123.00', 1, '2019-12-02 13:38:53', '2019-12-02 13:38:53', 2, 1),
(44, '1.00', 1, '2019-12-02 14:42:52', '2019-12-02 14:42:52', 2, 1),
(45, '1.00', 1, '2019-12-02 14:43:19', '2019-12-02 14:43:19', 2, 1),
(46, '-100.00', -2, '2019-12-16 06:00:50', '2019-12-16 06:00:50', 2, 1),
(47, '1000.00', 10, '2019-12-16 06:01:00', '2019-12-16 06:01:00', 2, 1),
(48, '1000.00', 10, '2019-12-16 06:01:13', '2019-12-16 06:01:13', 2, 1),
(49, '1000.00', 10, '2019-12-16 06:01:46', '2019-12-16 06:01:46', 2, 1),
(50, '1000.00', 1, '2019-12-16 06:02:50', '2019-12-16 06:02:50', 2, 1),
(51, '1000.00', 1, '2019-12-16 06:03:09', '2019-12-16 06:03:09', 2, 1),
(52, '1000.00', 1, '2019-12-16 06:03:38', '2019-12-16 06:03:38', 2, 1),
(53, '1000.00', 1, '2019-12-16 06:04:06', '2019-12-16 06:04:06', 2, 1),
(54, '1000.00', 1, '2019-12-16 06:05:11', '2019-12-16 06:05:11', 2, 1),
(55, '100.00', 12, '2019-12-16 06:06:57', '2019-12-16 06:06:57', 2, 1),
(56, '1000.00', 12, '2019-12-16 06:07:13', '2019-12-16 06:07:13', 2, 1),
(57, '1000.00', 1, '2019-12-16 06:07:31', '2019-12-16 06:07:31', 2, 1),
(58, '111.00', 1, '2019-12-16 06:08:16', '2019-12-16 06:08:16', 2, 1),
(59, '111.00', 1, '2019-12-16 06:10:00', '2019-12-16 06:10:00', 2, 1),
(60, '111.00', 1, '2019-12-16 06:10:11', '2019-12-16 06:10:11', 2, 1),
(61, '111.00', 1, '2019-12-16 06:11:31', '2019-12-16 06:11:31', 2, 1),
(62, '111.00', 1, '2019-12-16 06:12:22', '2019-12-16 06:12:22', 2, 1),
(63, '111.00', 1, '2019-12-16 06:12:34', '2019-12-16 06:12:34', 2, 1),
(64, '111.00', 1, '2019-12-16 06:12:42', '2019-12-16 06:12:42', 2, 1),
(65, '111.00', 1, '2019-12-16 06:12:45', '2019-12-16 06:12:45', 2, 1),
(66, '111.00', 1, '2019-12-16 06:12:46', '2019-12-16 06:12:46', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_meals`
--

CREATE TABLE `menu_meals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `meal_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_meals`
--

INSERT INTO `menu_meals` (`id`, `created_at`, `updated_at`, `menu_id`, `meal_id`) VALUES
(1, '2019-12-02 06:03:28', '2019-12-02 06:03:28', 12, 41),
(2, '2019-12-02 06:03:28', '2019-12-02 06:03:28', 12, 39),
(3, '2019-12-02 06:10:39', '2019-12-02 06:10:39', 13, 39),
(4, '2019-12-02 06:10:39', '2019-12-02 06:10:39', 13, 42);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_02_160231_create_restaurants_table', 1),
(5, '2019_11_27_104857_create_categories_table', 2),
(6, '2019_11_27_115325_create_meals_table', 3),
(7, '2019_11_27_115833_add_relations_to_meals_table', 4),
(8, '2019_11_28_112021_create_drinks_table', 5),
(9, '2019_11_28_114908_add_relations_to_drinks_table', 6),
(10, '2019_11_29_155151_create_menus_table', 7),
(11, '2019_11_29_155459_add_relations_to_menus_table', 8),
(14, '2019_12_02_074527_create_menu_meals_table', 9),
(15, '2019_12_02_074627_add_relations_to_menu_meals_table', 9);

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
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Вили', 'ул. Славянска 25', '2019-11-26 12:04:51', '2019-11-28 12:24:52'),
(7, 'Омерта', 'Околчица №', '2019-11-27 08:37:49', '2019-11-28 12:33:32'),
(10, 'Наполи', 'ул. Петропаволска', '2019-11-28 11:18:16', '2019-11-28 11:18:16'),
(11, 'Българе', 'бул.\"2-ри юни\"', '2019-11-28 12:25:10', '2019-11-28 12:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mirsi', 'a@a.a', NULL, '$2y$10$W5qOcNIxtkVA9ek8d2EPMufKOD1Heyz9S41E.18r2hSs/jAkx3UOW', 1, NULL, '2019-11-26 12:03:19', '2019-11-26 12:03:19'),
(2, 'm', 'm@m.m', NULL, '$2y$10$GuJWd9J.fsiDGLtFoYUuou7KRsHgn6dhnbQmF2ZFjeZMNeXYC0zH.', 0, NULL, '2019-11-27 10:07:44', '2019-11-27 10:07:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drinks_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meals_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `meals_category_id_foreign` (`category_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_user_id_foreign` (`user_id`),
  ADD KEY `menus_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `menu_meals`
--
ALTER TABLE `menu_meals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_meals_menu_id_foreign` (`menu_id`),
  ADD KEY `menu_meals_meal_id_foreign` (`meal_id`);

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
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `menu_meals`
--
ALTER TABLE `menu_meals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drinks`
--
ALTER TABLE `drinks`
  ADD CONSTRAINT `drinks_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`);

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `meals_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `meals_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`);

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`),
  ADD CONSTRAINT `menus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `menu_meals`
--
ALTER TABLE `menu_meals`
  ADD CONSTRAINT `menu_meals_meal_id_foreign` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`id`),
  ADD CONSTRAINT `menu_meals_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
