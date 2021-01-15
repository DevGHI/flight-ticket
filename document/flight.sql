-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 05:44 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flight`
--

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE `airlines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Air KBZ', 'upload/airline/60012911ca023.png', NULL, '2021-01-14 23:03:05'),
(2, 'Golden Myanmar Airlines', 'upload/airline/600128be718b4.png', NULL, '2021-01-14 23:01:42'),
(3, 'Mann Yadanarpon Airlines', 'upload/airline/60012970b066a.png', NULL, '2021-01-14 23:04:40'),
(4, 'Myanmar Airways International', 'upload/airline/600129b355a27.png', NULL, '2021-01-14 23:05:47'),
(5, 'Myanmar National Airlines', 'upload/airline/6001286469c10.jpg', NULL, '2021-01-14 23:00:12'),
(6, 'Yangon Airways', 'upload/airline/600129e43a941.png', NULL, '2021-01-14 23:06:36'),
(7, 'Air Bagan', 'upload/airline/60012a71f18e3.png', NULL, '2021-01-14 23:08:57'),
(9, 'Air Mandalay', 'upload/airline/60012a410ede4.png', '2021-01-14 23:08:09', '2021-01-14 23:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Yangon', NULL, NULL),
(2, 'Mandalay', NULL, NULL),
(3, 'Nay Pyi Taw', NULL, NULL),
(4, 'Taunggyi', NULL, NULL),
(5, 'Myitkyina', NULL, NULL),
(6, 'Loikaw', NULL, NULL),
(7, 'Pa-an', NULL, NULL),
(8, 'Mawlamyine', NULL, NULL),
(9, 'Kawthaung', NULL, NULL),
(10, 'Dawei', NULL, NULL),
(11, 'Myeik', NULL, NULL),
(12, 'Kyaing Tong', NULL, NULL),
(13, 'Sittwe', NULL, NULL),
(14, 'Thandwe', NULL, NULL),
(15, 'Bhamo', NULL, NULL),
(16, 'Pathein', NULL, NULL),
(17, 'Nyaung-U', NULL, NULL),
(18, 'Kyaukpyu', NULL, NULL),
(19, 'Lashio', NULL, NULL),
(20, 'Heho', NULL, NULL),
(21, 'Tachilek', NULL, NULL),
(22, 'Putao', NULL, NULL);

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_11_23_142315_create_cities_table', 1),
(7, '2020_11_25_153538_create_airlines_table', 1),
(8, '2020_11_30_132739_create_tickets_table', 1),
(9, '2020_11_30_132751_create_ticket_prices_table', 1),
(10, '2020_12_02_041348_create_sessions_table', 1),
(11, '2020_12_02_132049_create_orders_table', 1),
(12, '2020_12_13_073231_add_users_to_users', 1),
(13, '2021_01_07_064620_add_total_ticket_prices_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `unit_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 3, 'flight', '77b213028f4960b5bd3daa786b4aa05a1ea860d49548f136080baeda79a41001', '[\"*\"]', '2021-01-14 22:07:46', '2021-01-14 22:07:30', '2021-01-14 22:07:46'),
(2, 'App\\Models\\User', 3, 'flight', 'a730ddc4b5e076a473a196491cac5bbffdc4b7862327e298d06fae7ff1d9f247', '[\"*\"]', '2021-01-15 00:29:13', '2021-01-15 00:27:45', '2021-01-15 00:29:13'),
(3, 'App\\Models\\User', 3, 'flight', '368ffb16bccaad2bda960c39e105a843680585e1e8e9c909ec79e91271dcd351', '[\"*\"]', '2021-01-15 05:07:14', '2021-01-15 05:07:07', '2021-01-15 05:07:14'),
(4, 'App\\Models\\User', 3, 'flight', 'd01c84a257dca849c13a5d35ac7a9ceb12e929eda54e22379289482c4dc7a8a8', '[\"*\"]', NULL, '2021-01-15 09:33:57', '2021-01-15 09:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bZ4EHGbxeERD1fNgl3gZNQ9mHEkvxyritjTKksOY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiemVXblNZTTRPVVdVeDBwelZ3QklGTjVjVE9BNkN1ajRnRHBaM3J4NiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2NpdHkiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2NpdHkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1610703427),
('d15pLRSLCYYxMmbpqlhglwe7XGMa5gARt5cLHdMU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT21TWmZ2VFp6blB6cEZhaWdLa2h6SHl5RXFUdzF4WEFqSUxoeWJJaSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2NpdHkiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2NpdHkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1610703428),
('fblcq6KPhGEFUCPtMqNfDBliR5au2bOWV7SVhmjs', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYUhZTURLT3pHeDlseWJPSGJZQkRvc0h3QUhFVjB5UGgzdlYya0RFdCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1610693865),
('gGvLlpam5DMWPp8fQjLIoY6NTp9HWTuDdThyo6cp', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRWRyeXR1UU1nM1RGa1dqUUpwQk5nanNZYktrcFhFS0c1cGlCcERERCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1610726637),
('jF97LpiAHWZwcRWyOCn5xFoFBpNtdo08LZuKZPE9', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoic3JhU29RVzd6aXllVkpTc1hwM0ZzNUhvSUppWlRoY0psVGsyU25sTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2VycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRqdUY4bFNldnEvWXVrWDk0WGVVQ0ZlWW9PUHlndUc0Sm5jZVhENkZjbUtKRFNVOVRrRUs1MiI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkanVGOGxTZXZxL1l1a1g5NFhlVUNGZVlvT1B5Z3VHNEpuY2VYRDZGY21LSkRTVTlUa0VLNTIiO30=', 1610728376),
('JlNc5BNpdUd2m2GINYPUuwIKEj8yt71WXfVCaVz7', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiaHRrQ3hZZ3lGb1hHSGV4VzdySnRNaVN5ZjFxNk1uZmtTUldLQkdlNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2VycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkdEJwbXIyUlBtTFhSbVhiUGk4dkJOdUNVWVdoL0FUU3h4VU1SNEhzeUJGM29GT3F3cFQzQ3EiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHRCcG1yMlJQbUxYUm1YYlBpOHZCTnVDVVlXaC9BVFN4eFVNUjRIc3lCRjNvRk9xd3BUM0NxIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1610694039),
('LrmB0yU76RbC0BjL3vGnG7r4zPj7fEAniujym4Zp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'YTo2OntzOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vdXNlcnMiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6IkpoQlhqRlZab2p5cDE5VklSbWtwQVNqR2VaMFlkVzZCWkY0SUl3czUiO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkZkxxeDdLZnFXVDJWZHdiMHA4dGROdWhYa0ViNWNWaU16d1FBRkpYdEtaYy85dGZINC9uQmUiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGZMcXg3S2ZxV1QyVmR3YjBwOHRkTnVoWGtFYjVjVmlNendRQUZKWHRLWmMvOXRmSDQvbkJlIjt9', 1610729050),
('puayw2OKzipqEeTBTJSX8tiYQ0y0fBjWhjJyI5RO', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRnRnQUpnWlM2OGNjbWxrRlpDT3VwZUVGdmFJa2xmOGZoNXBJWHdUTCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1610710627),
('TFVnPTO6lnRZgjOCOCA1RfbGseuh8xoIBP9DbaRS', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiWE5ON3VUOTBhSFREM0c3RFlMcUNwRUZ5aUJLVDNYa0NBYWs5VEFyQSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vdGlja2V0cy9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkdEJwbXIyUlBtTFhSbVhiUGk4dkJOdUNVWVdoL0FUU3h4VU1SNEhzeUJGM29GT3F3cFQzQ3EiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHRCcG1yMlJQbUxYUm1YYlBpOHZCTnVDVVlXaC9BVFN4eFVNUjRIc3lCRjNvRk9xd3BUM0NxIjt9', 1610703642),
('txUfWNGZFlETILjboiFMdduBPkHyyAVqYLjTjkoK', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiNXpscGxFMnBaQkR1U0xJaDI0YUJoM2cwR09yVWxqQm1PWlgwdjZUSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3RlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQyZnNQa2RqU2ltRFJWSEtYc043d2Z1Q2puUDl3MFl5NVozUkVieTM2enhYZ2l0aERNLk1YTyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkMmZzUGtkalNpbURSVkhLWHNON3dmdUNqblA5dzBZeTVaM1JFYnkzNnp4WGdpdGhETS5NWE8iO3M6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9jaXR5Ijt9fQ==', 1610688178);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_city` bigint(20) UNSIGNED NOT NULL,
  `end_city` bigint(20) UNSIGNED NOT NULL,
  `airline_id` bigint(20) UNSIGNED NOT NULL,
  `destination_time` datetime NOT NULL,
  `arrival_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `start_city`, `end_city`, `airline_id`, `destination_time`, `arrival_time`, `created_at`, `updated_at`) VALUES
(1, 2, 8, 4, '2021-01-15 10:47:00', '2021-01-21 10:47:00', '2021-01-14 21:49:09', '2021-01-14 21:49:09'),
(2, 2, 1, 5, '2021-01-15 11:14:00', '2021-01-22 11:15:00', '2021-01-14 22:15:44', '2021-01-14 22:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_prices`
--

CREATE TABLE `ticket_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `duration` date NOT NULL,
  `limit` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_prices`
--

INSERT INTO `ticket_prices` (`id`, `ticket_id`, `price`, `level`, `amount`, `total`, `duration`, `limit`, `created_at`, `updated_at`) VALUES
(1, 1, 20000, 1, 2, 5, '2021-01-16', 1, '2021-01-14 21:49:09', '2021-01-15 00:29:13'),
(2, 1, 25000, 2, 5, 5, '2021-01-18', 2, '2021-01-14 21:49:09', '2021-01-14 21:49:09'),
(3, 1, 30000, 4, 5, 5, '2021-01-20', 2, '2021-01-14 21:49:09', '2021-01-14 21:49:09'),
(4, 2, 10000, 1, 3, 5, '2021-01-17', 2, '2021-01-14 22:15:44', '2021-01-15 05:07:14'),
(5, 2, 15000, 2, 5, 5, '2021-01-19', 2, '2021-01-14 22:15:44', '2021-01-14 22:15:44'),
(6, 2, 20000, 4, 5, 5, '2021-01-21', 2, '2021-01-14 22:15:44', '2021-01-14 22:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `name`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `user_type`) VALUES
(5, 'eemt1721@gmail.com', NULL, '$2y$10$fLqx7KfqWT2Vdwb0p8tdNuhXkEb5cViMzwQAFJXtKZc/9tfH4/nBe', NULL, NULL, 'May Thu', NULL, NULL, NULL, '2021-01-15 10:05:21', '2021-01-15 10:05:21', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ticket_id_foreign` (`ticket_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_start_city_foreign` (`start_city`),
  ADD KEY `tickets_end_city_foreign` (`end_city`),
  ADD KEY `tickets_airline_id_foreign` (`airline_id`);

--
-- Indexes for table `ticket_prices`
--
ALTER TABLE `ticket_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_prices_ticket_id_foreign` (`ticket_id`);

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
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket_prices`
--
ALTER TABLE `ticket_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_airline_id_foreign` FOREIGN KEY (`airline_id`) REFERENCES `airlines` (`id`),
  ADD CONSTRAINT `tickets_end_city_foreign` FOREIGN KEY (`end_city`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `tickets_start_city_foreign` FOREIGN KEY (`start_city`) REFERENCES `cities` (`id`);

--
-- Constraints for table `ticket_prices`
--
ALTER TABLE `ticket_prices`
  ADD CONSTRAINT `ticket_prices_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
