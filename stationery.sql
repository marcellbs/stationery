-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2023 pada 14.34
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stationery`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'L QUEENLY'),
(2, 'L MTH AKSESORIS (IM)'),
(3, 'L MTH TABUNG (LK)'),
(4, 'SP MTH SPAREPART (LK)'),
(5, 'CI MTH TINTA LAIN (IM)'),
(6, 'S MTH STEMPEL (IM)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2023_11_28_022900_create_kategori_table', 1),
(21, '2023_11_28_023110_create_status_table', 1),
(22, '2023_11_28_025004_create_produk_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `created_at`, `updated_at`, `kategori_id`, `status_id`) VALUES
(1, 'ALCOHOL GEL POLISH CLEANSER GP-CLN01', 12500, '2023-11-28 03:11:36', '2023-11-28 03:11:36', 1, 1),
(2, 'ALUMUNIUM FOIL ALL IN ONE BULAT 23mm IM', 1000, '2023-11-28 03:11:36', '2023-11-28 03:11:36', 2, 1),
(10, 'ALUMUNIUM FOIL ALL IN ONE BULAT 30mm IM', 1000, '2023-11-29 05:44:09', '2023-11-29 05:44:09', 2, 1),
(11, 'ALUMUNIUM FOIL ALL IN ONE SHEET 250mm IM', 12500, '2023-11-29 05:45:09', '2023-11-29 05:45:09', 2, 2),
(12, 'ALUMUNIUM FOIL HDPE/PE BULAT 30mm IM', 1000, '2023-11-29 05:45:51', '2023-11-29 05:45:51', 2, 1),
(13, 'ALUMUNIUM FOIL HDPE/PE SHEET 250mm IM', 13000, '2023-11-29 05:48:33', '2023-11-29 05:48:33', 2, 2),
(14, 'ALUMUNIUM FOIL PET SHEET 250mm IM', 1000, '2023-11-29 05:49:02', '2023-11-29 05:49:02', 2, 2),
(15, 'ARM SUPPORT KECIL', 13000, '2023-11-29 05:49:38', '2023-11-29 05:49:38', 3, 2),
(16, 'ARM SUPPORT KOTAK PUTIH', 13000, '2023-11-29 05:50:14', '2023-11-29 05:50:14', 2, 2),
(17, 'ARM SUPPORT PENDEK POLOS', 13000, '2023-11-29 05:51:04', '2023-11-29 05:51:04', 3, 1),
(18, 'ARM SUPPORT S IM', 1000, '2023-11-29 05:51:35', '2023-11-29 05:51:35', 2, 2),
(19, 'ARM SUPPORT T (IMPORT)', 13000, '2023-11-29 05:52:05', '2023-11-29 05:52:05', 2, 1),
(20, 'ARM SUPPORT T - MODEL 1 ( LOKAL )', 10000, '2023-11-29 05:53:03', '2023-11-29 05:53:03', 3, 1),
(21, 'BLACK LASER TONER FP-T3 (100gr)', 13000, '2023-11-29 05:53:44', '2023-11-29 05:53:44', 2, 2),
(22, 'BODY PRINTER CANON IP2770', 500, '2023-11-29 05:54:18', '2023-11-29 05:54:18', 4, 1),
(23, 'BODY PRINTER T13X', 15000, '2023-11-29 05:54:52', '2023-11-29 05:54:52', 4, 1),
(24, 'BOTOL 1000ML BLUE KHUSUS UNTUK EPSON R1800/R800 - 4180 IM (T054920)', 10000, '2023-11-29 05:55:40', '2023-11-29 05:55:40', 5, 1),
(25, 'BOTOL 1000ML CYAN KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4120 IM (T054220)', 10000, '2023-11-29 05:56:25', '2023-11-29 05:56:25', 5, 2),
(26, 'BOTOL 1000ML GLOSS OPTIMIZER KHUSUS UNTUK EPSON R1800/R800/R1900/R2000/IX7000/MG6170 - 4100 IM (T054020)', 1500, '2023-11-29 05:57:15', '2023-11-29 05:57:15', 5, 1),
(27, 'BOTOL 1000ML L.LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0599 IM', 1500, '2023-11-29 05:58:04', '2023-11-29 05:58:04', 5, 2),
(28, 'BOTOL 1000ML LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0597 IM', 1500, '2023-11-29 05:58:59', '2023-11-29 05:58:59', 5, 2),
(29, 'BOTOL 1000ML MAGENTA KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4140 IM (T054320)', 1000, '2023-11-29 05:59:37', '2023-11-29 05:59:37', 5, 1),
(30, 'BOTOL 1000ML ORANGE KHUSUS UNTUK EPSON R1900/R2000 IM - 4190 (T087920)', 1500, '2023-11-29 06:00:07', '2023-11-29 06:00:07', 5, 1),
(31, 'BOTOL 1000ML RED KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4170 IM (T054720)', 1000, '2023-11-29 06:00:39', '2023-11-29 06:00:39', 5, 2),
(32, 'BOTOL 1000ML YELLOW KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4160 IM (T054420)', 1500, '2023-11-29 06:01:18', '2023-11-29 06:01:18', 5, 2),
(33, 'BOTOL KOTAK 100ML LK', 1000, '2023-11-29 06:02:08', '2023-11-29 06:02:08', 2, 1),
(34, 'BOTOL 10ML IM', 1000, '2023-11-29 06:02:36', '2023-11-29 06:02:36', 6, 2),
(35, 'ARM PENDEK MODEL U', 13000, '2023-11-29 06:09:53', '2023-11-29 06:09:53', 2, 1),
(36, 'ALUMUNIUM FOIL HDPE/PE BULAT 23mm IM', 12500, '2023-11-29 06:10:36', '2023-11-29 06:10:36', 2, 1),
(37, 'BOTOL 1000ML MATTE BLACK KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 3503 IM (T054820)', 1500, '2023-11-29 06:20:03', '2023-11-29 06:20:03', 5, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` bigint(20) UNSIGNED NOT NULL,
  `nama_status` enum('bisa dijual','tidak bisa dijual') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(1, 'bisa dijual'),
(2, 'tidak bisa dijual');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

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
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `produk_kategori_id_foreign` (`kategori_id`),
  ADD KEY `produk_status_id_foreign` (`status_id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `produk_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
