-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 23, 2024 at 08:55 AM
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
-- Database: `pwl_uts`
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
(6, '2024_09_10_103052_create_m_kategori_table', 1),
(7, '2024_09_10_103108_create_m_supplier_table', 1),
(8, '2024_09_10_105243_create_m_user_table', 1),
(9, '2024_09_10_120810_create_m_barang_table', 1),
(10, '2024_09_10_120836_create_t_penjualan_table', 1),
(11, '2024_09_10_120907_create_t_stok_table', 1),
(12, '2024_09_10_120921_create_t_penjualan_detail_table', 1);

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
(101, 1, 'MKN001', 'Nasi Goreng', 15000, 25000, NULL, NULL),
(102, 1, 'MKN002', 'Rendang Sapi', 30000, 45000, NULL, NULL),
(103, 1, 'MKN003', 'Sate Ayam', 20000, 30000, NULL, NULL),
(104, 1, 'MKN004', 'Gado-Gado', 10000, 20000, NULL, NULL),
(105, 1, 'MKN005', 'Soto Ayam', 15000, 25000, NULL, NULL),
(201, 2, 'MNM001', 'Es Teh Manis', 3000, 7000, NULL, NULL),
(202, 2, 'MNM002', 'Es Jeruk', 5000, 10000, NULL, NULL),
(203, 2, 'MNM003', 'Jus Alpukat', 8000, 15000, NULL, NULL),
(204, 2, 'MNM004', 'Es Kopi Susu', 10000, 18000, NULL, NULL),
(205, 2, 'MNM005', 'Wedang Jahe', 5000, 10000, NULL, NULL),
(301, 3, 'DSR001', 'Es Cendol', 5000, 10000, NULL, NULL),
(302, 3, 'DSR002', 'Pisang Goreng', 3000, 7000, NULL, NULL),
(303, 3, 'DSR003', 'Kue Lupis', 4000, 8000, NULL, NULL),
(304, 3, 'DSR004', 'Klepon', 3000, 7000, NULL, NULL),
(305, 3, 'DSR005', 'Bubur Ketan Hitam', 4000, 9000, NULL, NULL),
(401, 4, 'APP001', 'Singkong Goreng', 3000, 6000, NULL, NULL),
(402, 4, 'APP002', 'Tahu Isi', 2000, 5000, NULL, NULL),
(403, 4, 'APP003', 'Tempe Mendoan', 2000, 5000, NULL, NULL),
(404, 4, 'APP004', 'Perkedel Kentang', 3000, 7000, NULL, NULL),
(405, 4, 'APP005', 'Martabak Mini', 5000, 10000, NULL, NULL),
(501, 5, 'MSN001', 'Nasi Tumpeng', 50000, 75000, NULL, NULL),
(502, 5, 'MSN002', 'Ikan Bakar Jimbaran', 40000, 60000, NULL, NULL),
(503, 5, 'MSN003', 'Ayam Betutu', 35000, 50000, NULL, NULL),
(504, 5, 'MSN004', 'Sop Buntut', 40000, 60000, NULL, NULL),
(505, 5, 'MSN005', 'Rawon', 30000, 45000, NULL, NULL);

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
(1, 'MKN', 'Makanan', NULL, NULL),
(2, 'MNM', 'Minuman', NULL, NULL),
(3, 'DSR', 'Dessert', NULL, NULL),
(4, 'APP', 'Appetizer', NULL, NULL),
(5, 'MSN', 'Makanan Spesial', NULL, NULL),
(6, 'COBA', 'COBA TAMBAH KATEGORI', NULL, NULL);

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
(1, 'ADM', 'Administrator', NULL, '2024-10-22 13:19:09'),
(2, 'MNG', 'Manager', NULL, NULL),
(3, 'STF', 'Staff/Kasir', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_supplier`
--

CREATE TABLE `m_supplier` (
  `supplier_id` bigint UNSIGNED NOT NULL,
  `supplier_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_supplier`
--

INSERT INTO `m_supplier` (`supplier_id`, `supplier_kode`, `supplier_nama`, `supplier_alamat`, `created_at`, `updated_at`) VALUES
(1, 'SUP001', 'PT. Sumber Pangan Nusantara', 'Jl. Sudirman No. 123, Jakarta', NULL, NULL),
(2, 'SUP002', 'CV. Minuman Segar Sejahtera', 'Jl. Merdeka No. 45, Bandung', NULL, NULL),
(3, 'SUP003', 'UD. Rasa Manis Cendana', 'Jl. Diponegoro No. 78, Surabaya', NULL, NULL),
(4, 'SUP004', 'PT. Hidangan Nusantara Lestari', 'Jl. Gajah Mada No. 32, Yogyakarta', NULL, NULL),
(5, 'SUP005', 'CV. Speciality Foods Indonesia', 'Jl. Pahlawan No. 88, Semarang', NULL, NULL);

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
  `user_foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`user_id`, `level_id`, `username`, `nama`, `password`, `user_foto`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'Administrator', '$2y$12$k3Vmxxuaa3Cb8WaHKniriuYa2MBMcYREypvugWX0KufM1O6lbDVM6', NULL, NULL, NULL),
(2, 2, 'manager', 'Manager', '$2y$12$iViLtRwUuVaNXPfDcGCaY.NxAvJUYMDZ1G2mFAEqEjmdf4Jf76tNe', NULL, NULL, NULL),
(3, 3, 'staff', 'Staff/Kasir', '$2y$12$PElSWweRTLm.Jq2OCi8uruwofR0yBc5/KRx1Jg3uCNvtXhDY6WCOC', NULL, NULL, NULL),
(4, 1, 'divaadmin', 'diva as admin', '$2y$12$Thcm1jDa9RJ.qKX4BKy7F.dyXSrRr7q0.O0X9EWK/uHuvSbpg0peO', NULL, '2024-10-22 08:22:19', '2024-10-22 08:22:19'),
(5, 2, 'divamanager', 'diva as manager', '$2y$12$jm04ir/IOs9ZLh4tYYYnM.gPUecK.MS7JACDM1F6JJkBIr/dmMF9.', NULL, '2024-10-22 13:32:24', '2024-10-22 13:32:24'),
(6, 3, 'divastaf', 'diva as staff/kasir', '$2y$12$H0Qpt.XLxrO./pJj2UW8W.LY3bJYUMnODlI0sP0o6Wsn0bsev/RdW', 'profile_4.png', '2024-10-22 14:27:38', '2024-10-23 01:10:03');

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
(1, 3, 'Andi', 'TRX001', '2024-10-22 13:31:08', NULL, NULL),
(2, 3, 'Budi', 'TRX002', '2024-10-22 13:31:08', NULL, NULL),
(3, 3, 'Citra', 'TRX003', '2024-10-22 13:31:08', NULL, NULL),
(4, 3, 'Dewi', 'TRX004', '2024-10-22 13:31:08', NULL, NULL),
(5, 3, 'Eka', 'TRX005', '2024-10-22 13:31:08', NULL, NULL),
(6, 3, 'Fajar', 'TRX006', '2024-10-22 13:31:08', NULL, NULL),
(7, 3, 'Gita', 'TRX007', '2024-10-22 13:31:08', NULL, NULL),
(8, 3, 'Hadi', 'TRX008', '2024-10-22 13:31:08', NULL, NULL),
(9, 3, 'Indra', 'TRX009', '2024-10-22 13:31:08', NULL, NULL),
(10, 3, 'Joko', 'TRX010', '2024-10-22 13:31:08', NULL, NULL);

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
(1, 1, 101, 20000, 1, NULL, NULL),
(2, 1, 102, 15000, 2, NULL, NULL),
(3, 1, 103, 25000, 1, NULL, NULL),
(4, 2, 104, 18000, 3, NULL, NULL),
(5, 2, 105, 10000, 1, NULL, NULL),
(6, 2, 201, 12000, 5, NULL, NULL),
(7, 3, 202, 20000, 2, NULL, NULL),
(8, 3, 203, 25000, 4, NULL, NULL),
(9, 3, 204, 15000, 3, NULL, NULL),
(10, 4, 205, 10000, 6, NULL, NULL),
(11, 4, 301, 25000, 2, NULL, NULL),
(12, 4, 302, 15000, 10, NULL, NULL),
(13, 5, 303, 30000, 15, NULL, NULL),
(14, 5, 304, 12000, 12, NULL, NULL),
(15, 5, 305, 18000, 8, NULL, NULL),
(16, 6, 101, 20000, 1, NULL, NULL),
(17, 6, 201, 12000, 2, NULL, NULL),
(18, 6, 302, 15000, 5, NULL, NULL),
(19, 7, 103, 25000, 2, NULL, NULL),
(20, 7, 202, 20000, 3, NULL, NULL),
(21, 7, 204, 15000, 4, NULL, NULL),
(22, 8, 105, 10000, 1, NULL, NULL),
(23, 8, 301, 25000, 8, NULL, NULL),
(24, 8, 303, 30000, 20, NULL, NULL),
(25, 9, 201, 12000, 3, NULL, NULL),
(26, 9, 302, 15000, 10, NULL, NULL),
(27, 9, 305, 18000, 6, NULL, NULL),
(28, 10, 101, 20000, 1, NULL, NULL),
(29, 10, 104, 18000, 4, NULL, NULL),
(30, 10, 204, 15000, 5, NULL, NULL);

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
(1, 1, 101, 3, '2024-10-22 13:31:03', 150, NULL, NULL),
(2, 1, 102, 3, '2024-10-22 13:31:03', 100, NULL, NULL),
(3, 1, 103, 3, '2024-10-22 13:31:03', 200, NULL, NULL),
(4, 1, 104, 3, '2024-10-22 13:31:03', 50, NULL, NULL),
(5, 1, 105, 3, '2024-10-22 13:31:03', 75, NULL, NULL),
(6, 2, 201, 3, '2024-10-22 13:31:03', 250, NULL, NULL),
(7, 2, 202, 3, '2024-10-22 13:31:03', 180, NULL, NULL),
(8, 2, 203, 3, '2024-10-22 13:31:03', 300, NULL, NULL),
(9, 2, 204, 3, '2024-10-22 13:31:03', 150, NULL, NULL),
(10, 2, 205, 3, '2024-10-22 13:31:03', 200, NULL, NULL),
(11, 3, 301, 3, '2024-10-22 13:31:03', 300, NULL, NULL),
(12, 3, 302, 3, '2024-10-22 13:31:03', 250, NULL, NULL),
(13, 3, 303, 3, '2024-10-22 13:31:03', 100, NULL, NULL),
(14, 3, 304, 3, '2024-10-22 13:31:03', 50, NULL, NULL),
(15, 3, 305, 3, '2024-10-22 13:31:03', 400, NULL, NULL),
(16, 4, 401, 3, '2024-10-22 13:31:03', 150, NULL, NULL),
(17, 4, 402, 3, '2024-10-22 13:31:03', 100, NULL, NULL),
(18, 4, 403, 3, '2024-10-22 13:31:03', 50, NULL, NULL),
(19, 4, 404, 3, '2024-10-22 13:31:03', 80, NULL, NULL),
(20, 4, 405, 3, '2024-10-22 13:31:03', 120, NULL, NULL),
(21, 5, 501, 3, '2024-10-22 13:31:03', 200, NULL, NULL),
(22, 5, 502, 3, '2024-10-22 13:31:03', 300, NULL, NULL),
(23, 5, 503, 3, '2024-10-22 13:31:03', 150, NULL, NULL),
(24, 5, 504, 3, '2024-10-22 13:31:03', 100, NULL, NULL),
(25, 5, 505, 3, '2024-10-22 13:31:03', 80, NULL, NULL);

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
  MODIFY `barang_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=506;

--
-- AUTO_INCREMENT for table `m_kategori`
--
ALTER TABLE `m_kategori`
  MODIFY `kategori_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_level`
--
ALTER TABLE `m_level`
  MODIFY `level_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_supplier`
--
ALTER TABLE `m_supplier`
  MODIFY `supplier_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `stok_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
