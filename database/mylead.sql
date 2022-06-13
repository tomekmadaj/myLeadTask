-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Cze 2022, 11:33
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mylead`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `failed_jobs`
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
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_08_171629_create_product_table', 2),
(6, '2022_06_08_172024_create_price_table', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `personal_access_tokens`
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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `prices`
--

INSERT INTO `prices` (`id`, `product_id`, `price`, `created_at`, `updated_at`) VALUES
(104, 35, 15.00, '2022-06-13 07:21:00', '2022-06-13 07:29:16'),
(105, 36, 20.00, '2022-06-13 07:21:15', '2022-06-13 07:28:57'),
(106, 37, 95.00, '2022-06-13 07:21:34', '2022-06-13 07:21:34'),
(107, 38, 15.00, '2022-06-13 07:22:02', '2022-06-13 07:29:06'),
(108, 39, 10.00, '2022-06-13 07:22:20', '2022-06-13 07:28:49'),
(109, 40, 150.00, '2022-06-13 07:22:36', '2022-06-13 07:22:36'),
(110, 35, 30.00, '2022-06-13 07:23:08', '2022-06-13 07:29:16'),
(111, 41, 60.00, '2022-06-13 07:24:46', '2022-06-13 07:24:46'),
(118, 41, 80.00, '2022-06-13 07:28:42', '2022-06-13 07:28:42'),
(119, 41, 120.00, '2022-06-13 07:28:42', '2022-06-13 07:28:42'),
(120, 39, 900.00, '2022-06-13 07:28:49', '2022-06-13 07:28:49'),
(121, 36, 40.00, '2022-06-13 07:28:57', '2022-06-13 07:28:57'),
(122, 36, 80.00, '2022-06-13 07:28:57', '2022-06-13 07:28:57'),
(123, 38, 35.00, '2022-06-13 07:29:06', '2022-06-13 07:29:06'),
(124, 38, 65.00, '2022-06-13 07:29:06', '2022-06-13 07:29:06');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(35, 'new1', 'new description1', '', '2022-06-13 07:21:00', '2022-06-13 07:21:00'),
(36, 'new2', 'new description2', '', '2022-06-13 07:21:15', '2022-06-13 07:21:15'),
(37, 'new3', 'new description3', 'products/OO6IIeFPxy2av7w3dKTfXN75NyR6DLH89WdYKL2Q.jpg', '2022-06-13 07:21:34', '2022-06-13 07:21:34'),
(38, 'product 1', 'product description', '', '2022-06-13 07:22:02', '2022-06-13 07:22:02'),
(39, 'product 2', 'product description', '', '2022-06-13 07:22:20', '2022-06-13 07:22:20'),
(40, 'product 3', 'product description', '', '2022-06-13 07:22:36', '2022-06-13 07:22:36'),
(41, 'product 4', 'new description', '', '2022-06-13 07:24:46', '2022-06-13 07:24:46');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'menager', 'menager@mylead.global', NULL, '$2y$10$Ppi0mnZywb8PUu1oZZxlkum2ZnDKRqgxpXCr9wyijGeORUs28nrAC', NULL, '2022-06-09 12:32:03', '2022-06-09 12:32:03');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeksy dla tabeli `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeksy dla tabeli `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price_product_id_index` (`product_id`) USING BTREE;

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `price_productid_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
