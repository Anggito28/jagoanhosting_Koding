-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Mar 2023 pada 15.06
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apk_bidan_mandiri1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Umum', '2023-03-27 08:58:25', '2023-03-27 08:58:25'),
(2, 'Hamil', '2023-03-27 08:58:25', '2023-03-27 08:58:25'),
(3, 'Nifas', '2023-03-27 08:58:25', '2023-03-27 08:58:25'),
(4, 'MTBS', '2023-03-27 08:58:25', '2023-03-27 08:58:25'),
(5, 'Persalinan', '2023-03-27 08:58:25', '2023-03-27 08:58:25'),
(6, 'Rujukan', '2023-03-27 08:58:25', '2023-03-27 08:58:25'),
(7, 'KB', '2023-03-27 08:58:25', '2023-03-27 08:58:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `health_services`
--

CREATE TABLE `health_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `date_of_entry` date NOT NULL,
  `anamnesis` text NOT NULL,
  `diagnosis` text NOT NULL,
  `therapy` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `rujukan` varchar(255) DEFAULT NULL,
  `rujukan_id` int(11) DEFAULT NULL,
  `pemeriksaan` varchar(255) DEFAULT NULL,
  `tujuan_rujukan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `health_services`
--

INSERT INTO `health_services` (`id`, `patient_id`, `date_of_entry`, `anamnesis`, `diagnosis`, `therapy`, `created_at`, `updated_at`, `category_id`, `rujukan`, `rujukan_id`, `pemeriksaan`, `tujuan_rujukan`) VALUES
(1, 1, '2023-03-27', 'tee', 'erwr', 'erw', '2023-03-27 10:09:26', '2023-03-27 10:09:26', 6, 'erww', 4, 'erw', 'RSUD dr.Sayidiman Magetan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_16_084119_create_categories_table', 1),
(6, '2023_02_16_084303_create_patients_table', 1),
(7, '2023_02_16_084330_create_health_services_table', 1),
(8, '2023_03_07_105252_add_category_id_to_health_services_table', 1),
(9, '2023_03_25_143206_add_field_rujukan_to_healtservices', 1),
(10, '2023_03_25_143509_add_field_pemeriksaan_to_healtservices', 1),
(11, '2023_03_25_144013_add_field_antrian_to_patients', 1),
(12, '2023_03_25_163025_add_field_softdelete_to_patients', 1),
(13, '2023_03_27_123647_add_field_tujuan_rujukan_tables', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registration_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `jkn` varchar(255) DEFAULT NULL,
  `job` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `birth_place` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `name_parents` varchar(255) NOT NULL,
  `additional_information` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `antrian` varchar(255) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `patients`
--

INSERT INTO `patients` (`id`, `registration_number`, `name`, `nik`, `jkn`, `job`, `age`, `gender`, `birth_place`, `birth_date`, `phone_number`, `address`, `name_parents`, `additional_information`, `created_at`, `updated_at`, `antrian`, `deleted_at`) VALUES
(1, '0000001', 'tese', '3423424234232323', '2323232323', 'pns', 27, 'Laki-laki', 'tes', '1995-05-17', '1231231232132', '213', '21312', '213', '2023-03-27 10:08:37', '2023-03-27 10:08:49', '0', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','petugas') NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Galak Tamba', 'prakasa.darmanto@example.com', 'admin', '2023-03-27 08:58:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'eE245CfFcb', '2023-03-27 08:58:25', '2023-03-27 08:58:25'),
(2, 'Balijan Warji Maheswara M.Kom.', 'yani.rajasa@example.com', 'admin', '2023-03-27 08:58:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'q9UcBTN5I9', '2023-03-27 08:58:25', '2023-03-27 08:58:25'),
(3, 'Yahya Raden Firgantoro', 'khutasoit@example.org', 'admin', '2023-03-27 08:58:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7FVidndHOq', '2023-03-27 08:58:25', '2023-03-27 08:58:25'),
(4, 'Jarwadi Dongoran', 'cinta.tampubolon@example.org', 'admin', '2023-03-27 08:58:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '845VEZzJG1', '2023-03-27 08:58:25', '2023-03-27 08:58:25'),
(5, 'Jasmin Mutia Hasanah S.Pd', 'baktiadi.mangunsong@example.net', 'admin', '2023-03-27 08:58:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kYBtcJLp3l', '2023-03-27 08:58:25', '2023-03-27 08:58:25'),
(6, 'Nova Rahimah', 'maryati.maya@example.com', 'admin', '2023-03-27 08:58:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jwcKvN8Dby', '2023-03-27 08:58:25', '2023-03-27 08:58:25'),
(7, 'Galuh Galar Narpati S.H.', 'anita11@example.org', 'admin', '2023-03-27 08:58:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MQvkEb3gwd', '2023-03-27 08:58:25', '2023-03-27 08:58:25'),
(8, 'Yance Fujiati', 'okta62@example.org', 'admin', '2023-03-27 08:58:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zNL5EpA3z5', '2023-03-27 08:58:25', '2023-03-27 08:58:25'),
(9, 'Kayla Namaga', 'hamima.hartati@example.org', 'admin', '2023-03-27 08:58:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 's1kJ5q1XHs', '2023-03-27 08:58:25', '2023-03-27 08:58:25'),
(10, 'Salsabila Mulyani S.IP', 'darsirah10@example.com', 'admin', '2023-03-27 08:58:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vXaEfmWo4n', '2023-03-27 08:58:25', '2023-03-27 08:58:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `health_services`
--
ALTER TABLE `health_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `health_services_patient_id_foreign` (`patient_id`),
  ADD KEY `health_services_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `health_services`
--
ALTER TABLE `health_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `health_services`
--
ALTER TABLE `health_services`
  ADD CONSTRAINT `health_services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `health_services_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
