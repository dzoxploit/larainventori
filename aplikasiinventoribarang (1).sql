-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 Jul 2018 pada 11.36
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasiinventoribarang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id_barang` int(20) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `id_kategori` int(20) NOT NULL,
  `harga` int(10) NOT NULL,
  `quantity` int(3) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemens`
--

CREATE TABLE `departemens` (
  `id_departemen` int(20) NOT NULL,
  `name_departemen` varchar(50) NOT NULL,
  `id_headofdept` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `departemens`
--

INSERT INTO `departemens` (`id_departemen`, `name_departemen`, `id_headofdept`, `status`, `created_at`, `updated_at`) VALUES
(10120, 'software engginering', '16102089', 'aktif', '2018-07-11 14:18:57', '2018-07-11 07:18:57'),
(10121, 'akuntansi', NULL, 'aktif', '2018-07-11 06:27:36', '2018-07-11 06:27:36'),
(10123, 'human resource managemen system', NULL, 'aktif', '2018-07-16 18:34:55', '2018-07-16 18:34:55'),
(10124, 'biro iklan', NULL, 'non aktif', '2018-07-24 05:46:50', '2018-07-24 05:46:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_permintaans`
--

CREATE TABLE `detail_permintaans` (
  `no_permintaan` varchar(20) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `quantity` int(3) NOT NULL,
  `satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id_kategori` int(20) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `harga_estimasi_minimum` int(10) NOT NULL,
  `harga_estimasi_maksimum` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id_kategori`, `nama_kategori`, `harga_estimasi_minimum`, `harga_estimasi_maksimum`, `created_at`, `updated_at`) VALUES
(1, 'elektronik', 3000000, 5000000, '2018-07-11 12:59:07', '2018-07-11 05:59:07'),
(2, 'mebel', 1000000, 2000000, '2018-07-11 05:55:15', '2018-07-11 05:55:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_25_035935_create_posisitions_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawais`
--

CREATE TABLE `pegawais` (
  `nip` int(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `posisition` varchar(20) DEFAULT NULL,
  `no_mobile` varchar(12) NOT NULL,
  `id_departemen` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawais`
--

INSERT INTO `pegawais` (`nip`, `first_name`, `last_name`, `address`, `email`, `posisition`, `no_mobile`, `id_departemen`, `status`, `created_at`, `updated_at`) VALUES
(16102088, 'ahmad', 'hariwijaya', 'jalan kemenangan', 'ahmad@gmail.com', '102', '08182828', '10120', 'tetap', '2018-07-11 12:49:25', '2018-07-11 05:49:25'),
(16102089, 'didin', 'nur yahya', 'parung serab', 'gokil@gmail.com', '103', '08182828', '10120', 'internship', '2018-07-11 05:50:39', '2018-07-11 05:50:39'),
(16102090, 'gilang', 'wijaya', 'bintaro', 'gilang@gmail.com', '109', '081828289', '10121', 'internship', '2018-07-11 06:31:16', '2018-07-11 06:31:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuanbarangbarus`
--

CREATE TABLE `pengajuanbarangbarus` (
  `no_order` varchar(20) NOT NULL,
  `date_order` date NOT NULL,
  `division_department` varchar(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `quantity` int(3) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `harga` int(15) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `id_pegawai` int(20) NOT NULL,
  `id_hrd` int(20) DEFAULT NULL,
  `id_direktur` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuanbarangbarus`
--

INSERT INTO `pengajuanbarangbarus` (`no_order`, `date_order`, `division_department`, `nama_barang`, `merk`, `quantity`, `satuan`, `id_kategori`, `harga`, `status`, `id_pegawai`, `id_hrd`, `id_direktur`, `created_at`, `updated_at`) VALUES
('1028272122', '2018-07-16', '10121', 'meja', NULL, 1, 'pcs', '2', 200000, NULL, 16102088, NULL, NULL, '2018-07-16 10:03:35', '2018-07-16 10:03:35'),
('1610222', '2018-07-15', '1612', 'laptop', NULL, 1, 'pcs', '1', 10000, NULL, 1610288, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaanpenggunaanbarangs`
--

CREATE TABLE `permintaanpenggunaanbarangs` (
  `no_permintaan` varchar(20) NOT NULL,
  `tanggal_permintaan` date NOT NULL,
  `pemohon` varchar(50) NOT NULL,
  `division_departemen` varchar(20) NOT NULL,
  `nama_acara` text NOT NULL,
  `tanggal_acara` date NOT NULL,
  `id_pemohon` varchar(255) DEFAULT NULL,
  `id_hrd` varchar(255) DEFAULT NULL,
  `id_direktur` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisitions`
--

CREATE TABLE `posisitions` (
  `id_posisitions` int(10) UNSIGNED NOT NULL,
  `name_posisitions` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_departemen` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posisitions`
--

INSERT INTO `posisitions` (`id_posisitions`, `name_posisitions`, `id_departemen`, `created_at`, `updated_at`) VALUES
(106, 'Android developer', '10120', '2018-07-11 06:09:03', '2018-07-11 06:09:03'),
(107, 'quality assurances', '10120', '2018-07-11 06:09:56', '2018-07-11 06:09:56'),
(108, 'php developer', '10120', '2018-07-11 06:10:46', '2018-07-11 06:10:46'),
(109, 'managemen akuntansi', '10121', '2018-07-11 06:29:59', '2018-07-11 06:29:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rule_login`
--

CREATE TABLE `rule_login` (
  `nip` varchar(20) NOT NULL,
  `posisitions` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `path_image`, `nip`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bekasi-ada-di-luar-Bumi-Jangan-Ngaco-karena-Ratusan-Industri-di-Bekasi-Teraliri-Gas-Bumi-lho-820x410.png', NULL, 'ghozi', 'didinnuryahya@gmail.com', '$2y$10$4KKWbUjipV0z9JXAq9Pc6er3oj7VcQuN3gCSPrak/tVhHcgk7LqbK', 'qw30cOdG6P8mClb5mpWkfKyhz1NLd4igfxY2pG6YA27dggOImzPsDbLcMC1A', '2018-02-21 21:37:37', '2018-03-06 23:49:49'),
(2, NULL, NULL, 'Admin jaya', 'quinton13@example.net', '$2y$10$a6GUJzRFtl4rEK9WZvVblu78vH265PyX5vBX8i.MEL9/4F/z6p1xm', 'PLSqI9ER00efeWkhsyQtMvzwYTcwDvsK4Z8Mip2ZOrsb1czZP8bEn1w9t2Dz', '2018-02-21 23:41:22', '2018-03-06 09:15:55'),
(3, 'Apoteker.jpg', NULL, 'jquera santos', 'jquerasantos@gmail.com', '$2y$10$c/g.eR0DGcKVjBdgf89sAuHlTtPs4/Iz8GUae0.a9xw/1wXsmz6ya', 'wpMwCuR4tcXTIzUSqVb1cuvjEEXfkeX7GEcUMq8ijYNE4Q3SnJGcvDADeOxr', '2018-02-26 01:15:35', '2018-03-06 23:34:06'),
(4, NULL, NULL, 'halim', 'halim@jquera.com', '$2y$10$O1ma60LBKDf4I0JUzsNM5OyZeq1r2NftlGZUSmHv/DFvVZo9tPv4y', NULL, '2018-02-27 19:44:28', '2018-03-06 09:10:05'),
(5, NULL, NULL, 'gaga', 'gaga@gmail.com', '$2y$10$Tpag9t8H7/p.PeRRqMWIHed4G1T9oeT.E.upHAts2vuLN.3IwR.IO', NULL, '2018-03-02 01:12:58', '2018-03-06 03:13:14'),
(6, NULL, NULL, 'guzzle', 'freekvanderherten@gmail.com', '$2y$10$EUUi8AkUqFKDDc./3QWGjeuY.qmnG/DmL3jh2g5vBU6owwbsfzfpi', NULL, '2018-03-02 01:13:45', '2018-03-06 03:06:37'),
(7, NULL, NULL, 'jajang moelyana', 'jajangmulyana@gmail.com', '$2y$10$2z4h1BjLQ73iBZhDAigmwODdyx6/4h7D7YIR6WBswrKG8btnWxHRO', NULL, '2018-03-05 22:14:37', '2018-03-06 03:15:50'),
(8, NULL, NULL, 'gery anantya nugraha', 'gerygoceng@gmail.com', '$2y$10$euCuHvUZ1C6uLaFO.YlXz.7oshneiX6h7dvAcc4RBLRhYstbU43L.', NULL, '2018-03-06 00:11:57', '2018-03-06 00:11:57'),
(9, NULL, NULL, 'didin frances', 'francescovanboteng@gmail.com', '$2y$10$RStdVfDYVMbGjYRl0GWDjeFF7gHuiaeyG3I3UaP8fTC73m7R0akZa', NULL, '2018-03-14 00:00:21', '2018-03-14 00:00:21'),
(10, 'logbi.png', '16102088', 'admin', 'admin@gmail.com', '$2y$10$dDE1lZ7/VpMOzL6jic/o4u7pJWWTvfj6bHQ2kNwshLF3yDlNYfT0O', '48xCnn2cvpqTrLN515spgQDAQkDKTBrsLkayQN6kKdk6bWCg6K5zHxDyyWJx', '2018-03-15 08:15:19', '2018-07-10 07:45:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `departemens`
--
ALTER TABLE `departemens`
  ADD PRIMARY KEY (`id_departemen`),
  ADD UNIQUE KEY `id_headofdept` (`id_headofdept`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id_kategori`);

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
-- Indexes for table `pengajuanbarangbarus`
--
ALTER TABLE `pengajuanbarangbarus`
  ADD PRIMARY KEY (`no_order`);

--
-- Indexes for table `permintaanpenggunaanbarangs`
--
ALTER TABLE `permintaanpenggunaanbarangs`
  ADD PRIMARY KEY (`no_permintaan`);

--
-- Indexes for table `posisitions`
--
ALTER TABLE `posisitions`
  ADD PRIMARY KEY (`id_posisitions`);

--
-- Indexes for table `rule_login`
--
ALTER TABLE `rule_login`
  ADD UNIQUE KEY `nip` (`nip`);

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
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id_barang` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departemens`
--
ALTER TABLE `departemens`
  MODIFY `id_departemen` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10125;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id_kategori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posisitions`
--
ALTER TABLE `posisitions`
  MODIFY `id_posisitions` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
