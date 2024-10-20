-- SQLBook: Code
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2024 at 05:04 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwl_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_10_101724_create_m_level_table', 1),
(6, '2024_09_10_103052_create_m_kategori_table', 2),
(7, '2024_09_10_103108_create_m_supplier_table', 2),
(8, '2024_09_10_105243_create_m_user_table', 3),
(9, '2024_09_10_120810_create_m_barang_table', 4),
(10, '2024_09_10_120836_create_t_penjualan_table', 4),
(11, '2024_09_10_120907_create_t_stok_table', 4),
(12, '2024_09_10_120921_create_t_penjualan_detail_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `m_barang`
--

CREATE TABLE `m_barang` (
  `barang_id` bigint UNSIGNED NOT NULL,
  `kategori_id` bigint UNSIGNED NOT NULL,
  `barang_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_barang`
--

INSERT INTO `m_barang` (`barang_id`, `kategori_id`, `barang_kode`, `barang_nama`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`) VALUES
(101, 1, 'ELK001', 'Laptop Acer Aspire', 7000000, 8500000, NULL, NULL),
(102, 1, 'ELK002', 'Smart TV Samsung', 4000000, 5000000, NULL, NULL),
(103, 1, 'ELK003', 'Smartphone Xiaomi', 3000000, 3800000, NULL, NULL),
(104, 1, 'ELK004', 'Headphone Sony', 800000, 1000000, NULL, NULL),
(105, 1, 'ELK005', 'Kamera Canon EOS', 6000000, 7500000, NULL, NULL),
(201, 2, 'PAK001', 'Kemeja Batik Pria', 150000, 200000, NULL, NULL),
(202, 2, 'PAK002', 'Jaket Kulit Wanita', 500000, 650000, NULL, NULL),
(203, 2, 'PAK003', 'Kaos Polos Katun', 80000, 120000, NULL, NULL),
(204, 2, 'PAK004', 'Celana Jeans Pria', 180000, 250000, NULL, NULL),
(205, 2, 'PAK005', 'Rok Mini Denim', 120000, 170000, NULL, NULL),
(301, 3, 'MNM001', 'Beras Premium 10kg', 90000, 120000, NULL, NULL),
(302, 3, 'MNM002', 'Minyak Goreng 2L', 25000, 35000, NULL, NULL),
(303, 3, 'MNM003', 'Gula Pasir 1kg', 12000, 18000, NULL, NULL),
(304, 3, 'MNM004', 'Tepung Terigu 1kg', 8000, 12000, NULL, NULL),
(305, 3, 'MNM005', 'Susu Bubuk 500g', 45000, 60000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori`
--

CREATE TABLE `m_kategori` (
  `kategori_id` bigint UNSIGNED NOT NULL,
  `kategori_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_kategori`
--

INSERT INTO `m_kategori` (`kategori_id`, `kategori_kode`, `kategori_nama`, `created_at`, `updated_at`) VALUES
(1, 'ELK', 'Elektronik', NULL, NULL),
(2, 'PAK', 'Pakaian', NULL, NULL),
(3, 'MNM', 'Makanan/Minuman', NULL, NULL),
(4, 'PRT', 'Peralatan Rumah Tangga', NULL, NULL),
(5, 'KES', 'Kesehatan/Kecantikan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_level`
--

CREATE TABLE `m_level` (
  `level_id` bigint UNSIGNED NOT NULL,
  `level_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_level`
--

INSERT INTO `m_level` (`level_id`, `level_kode`, `level_nama`, `created_at`, `updated_at`) VALUES
(1, 'ADM', 'Administrator', NULL, NULL),
(2, 'MNG', 'Manager', NULL, NULL),
(3, 'STF', 'Staff/Kasir', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_supplier`
--

CREATE TABLE `m_supplier` (
  `supplier_id` bigint UNSIGNED NOT NULL,
  `supplier_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_supplier`
--

INSERT INTO `m_supplier` (`supplier_id`, `supplier_kode`, `supplier_nama`, `supplier_alamat`, `created_at`, `updated_at`) VALUES
(1, 'SUP001', 'PT. Elektronik Jaya', 'Jl. Sudirman No. 123, Jakarta', NULL, NULL),
(2, 'SUP002', 'CV. Pakaian Nusantara', 'Jl. Merdeka No. 45, Bandung', NULL, NULL),
(3, 'SUP003', 'UD. Sembako Makmur', 'Jl. Diponegoro No. 78, Surabaya', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `user_id` bigint UNSIGNED NOT NULL,
  `level_id` bigint UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`user_id`, `level_id`, `username`, `nama`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'Administrator', '$2y$12$QNema7GONgcP612/DrWxcOmoSBHXF5O2K9VBPmmZpjiqExRuhogoa', NULL, NULL),
(2, 2, 'manager', 'Manager', '$2y$12$5bj95FyCCBWTeKVZOlnmBeexP.jw7ri8cM29IwKnuStFxKCAyvf76', NULL, NULL),
(3, 3, 'staff', 'Staff/Kasir', '$2y$12$1cH8ndwEpXoW8q8SafKPEerEQftXIWww1n6L8/JYmgyLLucSPGX9m', NULL, NULL),
(4, 2, 'manager_dua', 'Manager 2', '$2y$12$EpYJPRcmAof0lv8qwG4pjubkGt6qUjjGrOCmMsyLfYqDflz1FmA.m', '2024-09-17 23:44:05', '2024-09-17 23:44:05'),
(5, 2, 'manager22', 'Manager Dua Dua', '$2y$12$iFy3VJQO6y9vOmezN.di2eLNceCI/miQ.QYKfIOUhM9/I9kGKKbZG', '2024-09-19 03:32:46', '2024-09-19 03:32:46'),
(6, 2, 'manager33', 'Manager Tuga Tiga', '$2y$12$slfZbcxSy63UVXDOMEKDuOpEkKRfLyre.T3.wSusCKJy6vnGVwYKK', '2024-09-19 03:48:02', '2024-09-19 03:48:02'),
(7, 2, 'manager56', 'Manager55', '$2y$12$Ds2xW5bvUhY6IJHUf0VvmOhxUqyL/zrpO8qqXETRWc9wWlO9/wpum', '2024-09-20 04:18:46', '2024-09-20 04:18:46'),
(8, 2, 'manager12', 'Manager11', '$2y$12$xwVMWd0/IjIVT9mVdpB/D.SH1rqEcdh1P4SQhKXGP373zWRpXx2vW', '2024-09-20 04:27:47', '2024-09-20 04:27:47'),
(10, 2, 'fitria', 'ramadhani prihandiva', '$2y$12$ZTpGF4vKl9nPS9qIcqegZuTvDFM15D1AVDL6g.G/kUpZoXeqpI9Me', '2024-09-25 00:02:20', '2024-09-25 00:02:20'),
(12, 3, 'swift', 'taylor swift', '$2y$12$nyIg0l8wjPkiZAIgSWATFejLrnKsdlYaEVsuyTREXGdDo2pgMGvT2', '2024-10-01 05:05:40', '2024-10-01 05:05:40'),
(13, 2, 'dipi', 'diva', '$2y$12$3fK8924XHRXahggqMKZ7T.Xub5Kqhrz/XODFvBEf5uVuJ/tnAnr6O', '2024-10-15 10:41:11', '2024-10-15 10:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_penjualan`
--

CREATE TABLE `t_penjualan` (
  `penjualan_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `pembeli` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjualan_kode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjualan_tanggal` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_penjualan`
--

INSERT INTO `t_penjualan` (`penjualan_id`, `user_id`, `pembeli`, `penjualan_kode`, `penjualan_tanggal`, `created_at`, `updated_at`) VALUES
(1, 3, 'Andi', 'TRX001', '2024-09-11 07:24:01', NULL, NULL),
(2, 3, 'Budi', 'TRX002', '2024-09-11 07:24:01', NULL, NULL),
(3, 3, 'Citra', 'TRX003', '2024-09-11 07:24:01', NULL, NULL),
(4, 3, 'Dewi', 'TRX004', '2024-09-11 07:24:01', NULL, NULL),
(5, 3, 'Eka', 'TRX005', '2024-09-11 07:24:01', NULL, NULL),
(6, 3, 'Fajar', 'TRX006', '2024-09-11 07:24:01', NULL, NULL),
(7, 3, 'Gita', 'TRX007', '2024-09-11 07:24:01', NULL, NULL),
(8, 3, 'Hadi', 'TRX008', '2024-09-11 07:24:01', NULL, NULL),
(9, 3, 'Indra', 'TRX009', '2024-09-11 07:24:01', NULL, NULL),
(10, 3, 'Joko', 'TRX010', '2024-09-11 07:24:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_penjualan_detail`
--

CREATE TABLE `t_penjualan_detail` (
  `detail_id` bigint UNSIGNED NOT NULL,
  `penjualan_id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `harga` int NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_penjualan_detail`
--

INSERT INTO `t_penjualan_detail` (`detail_id`, `penjualan_id`, `barang_id`, `harga`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 101, 8500000, 1, NULL, NULL),
(2, 1, 102, 5000000, 2, NULL, NULL),
(3, 1, 103, 3800000, 1, NULL, NULL),
(4, 2, 104, 1000000, 3, NULL, NULL),
(5, 2, 105, 7500000, 1, NULL, NULL),
(6, 2, 201, 200000, 5, NULL, NULL),
(7, 3, 202, 650000, 2, NULL, NULL),
(8, 3, 203, 120000, 4, NULL, NULL),
(9, 3, 204, 250000, 3, NULL, NULL),
(10, 4, 205, 170000, 6, NULL, NULL),
(11, 4, 301, 120000, 2, NULL, NULL),
(12, 4, 302, 35000, 10, NULL, NULL),
(13, 5, 303, 18000, 15, NULL, NULL),
(14, 5, 304, 12000, 12, NULL, NULL),
(15, 5, 305, 60000, 8, NULL, NULL),
(16, 6, 101, 8500000, 1, NULL, NULL),
(17, 6, 201, 200000, 2, NULL, NULL),
(18, 6, 302, 35000, 5, NULL, NULL),
(19, 7, 103, 3800000, 2, NULL, NULL),
(20, 7, 202, 650000, 3, NULL, NULL),
(21, 7, 204, 250000, 4, NULL, NULL),
(22, 8, 105, 7500000, 1, NULL, NULL),
(23, 8, 301, 120000, 8, NULL, NULL),
(24, 8, 303, 18000, 20, NULL, NULL),
(25, 9, 201, 200000, 3, NULL, NULL),
(26, 9, 302, 35000, 10, NULL, NULL),
(27, 9, 305, 60000, 6, NULL, NULL),
(28, 10, 101, 8500000, 1, NULL, NULL),
(29, 10, 104, 1000000, 4, NULL, NULL),
(30, 10, 204, 250000, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_stok`
--

CREATE TABLE `t_stok` (
  `stok_id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `stok_tanggal` datetime NOT NULL,
  `stok_jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_stok`
--

INSERT INTO `t_stok` (`stok_id`, `supplier_id`, `barang_id`, `user_id`, `stok_tanggal`, `stok_jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 101, 3, '2024-09-11 07:23:54', 50, NULL, NULL),
(2, 1, 102, 3, '2024-09-11 07:23:54', 30, NULL, NULL),
(3, 1, 103, 3, '2024-09-11 07:23:54', 100, NULL, NULL),
(4, 1, 104, 3, '2024-09-11 07:23:54', 150, NULL, NULL),
(5, 1, 105, 3, '2024-09-11 07:23:54', 20, NULL, NULL),
(6, 2, 201, 3, '2024-09-11 07:23:54', 200, NULL, NULL),
(7, 2, 202, 3, '2024-09-11 07:23:54', 75, NULL, NULL),
(8, 2, 203, 3, '2024-09-11 07:23:54', 300, NULL, NULL),
(9, 2, 204, 3, '2024-09-11 07:23:54', 120, NULL, NULL),
(10, 2, 205, 3, '2024-09-11 07:23:54', 180, NULL, NULL),
(11, 3, 301, 3, '2024-09-11 07:23:54', 500, NULL, NULL),
(12, 3, 302, 3, '2024-09-11 07:23:54', 400, NULL, NULL),
(13, 3, 303, 3, '2024-09-11 07:23:54', 600, NULL, NULL),
(14, 3, 304, 3, '2024-09-11 07:23:54', 700, NULL, NULL),
(15, 3, 305, 3, '2024-09-11 07:23:54', 350, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
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
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD UNIQUE KEY `m_barang_barang_kode_unique` (`barang_kode`),
  ADD KEY `m_barang_kategori_id_index` (`kategori_id`);

--
-- Indexes for table `m_kategori`
--
ALTER TABLE `m_kategori`
  ADD PRIMARY KEY (`kategori_id`),
  ADD UNIQUE KEY `m_kategori_kategori_kode_unique` (`kategori_kode`);

--
-- Indexes for table `m_level`
--
ALTER TABLE `m_level`
  ADD PRIMARY KEY (`level_id`),
  ADD UNIQUE KEY `m_level_level_kode_unique` (`level_kode`);

--
-- Indexes for table `m_supplier`
--
ALTER TABLE `m_supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD UNIQUE KEY `m_supplier_supplier_kode_unique` (`supplier_kode`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `m_user_username_unique` (`username`),
  ADD KEY `m_user_level_id_index` (`level_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  ADD PRIMARY KEY (`penjualan_id`),
  ADD UNIQUE KEY `t_penjualan_penjualan_kode_unique` (`penjualan_kode`),
  ADD KEY `t_penjualan_user_id_index` (`user_id`);

--
-- Indexes for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `t_penjualan_detail_penjualan_id_index` (`penjualan_id`),
  ADD KEY `t_penjualan_detail_barang_id_index` (`barang_id`);

--
-- Indexes for table `t_stok`
--
ALTER TABLE `t_stok`
  ADD PRIMARY KEY (`stok_id`),
  ADD KEY `t_stok_supplier_id_index` (`supplier_id`),
  ADD KEY `t_stok_barang_id_index` (`barang_id`),
  ADD KEY `t_stok_user_id_index` (`user_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `m_barang`
--
ALTER TABLE `m_barang`
  MODIFY `barang_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `m_kategori`
--
ALTER TABLE `m_kategori`
  MODIFY `kategori_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_level`
--
ALTER TABLE `m_level`
  MODIFY `level_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_supplier`
--
ALTER TABLE `m_supplier`
  MODIFY `supplier_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  MODIFY `penjualan_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  MODIFY `detail_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `t_stok`
--
ALTER TABLE `t_stok`
  MODIFY `stok_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD CONSTRAINT `m_barang_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `m_kategori` (`kategori_id`);

--
-- Constraints for table `m_user`
--
ALTER TABLE `m_user`
  ADD CONSTRAINT `m_user_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `m_level` (`level_id`);

--
-- Constraints for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  ADD CONSTRAINT `t_penjualan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`);

--
-- Constraints for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  ADD CONSTRAINT `t_penjualan_detail_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `m_barang` (`barang_id`),
  ADD CONSTRAINT `t_penjualan_detail_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `t_penjualan` (`penjualan_id`);

--
-- Constraints for table `t_stok`
--
ALTER TABLE `t_stok`
  ADD CONSTRAINT `t_stok_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `m_barang` (`barang_id`),
  ADD CONSTRAINT `t_stok_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `m_supplier` (`supplier_id`),
  ADD CONSTRAINT `t_stok_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
