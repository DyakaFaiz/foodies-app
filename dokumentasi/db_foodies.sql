-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_foodies
CREATE DATABASE IF NOT EXISTS `db_foodies` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_foodies`;

-- Dumping structure for table db_foodies.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_foodies.cache: ~0 rows (approximately)

-- Dumping structure for table db_foodies.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_foodies.cache_locks: ~0 rows (approximately)

-- Dumping structure for table db_foodies.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_foodies.categories: ~0 rows (approximately)

-- Dumping structure for table db_foodies.detail_pesanan
CREATE TABLE IF NOT EXISTS `detail_pesanan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pesanan` int NOT NULL,
  `id_produk` int NOT NULL,
  `jumlah` int NOT NULL,
  `harga` decimal(15,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_foodies.detail_pesanan: ~6 rows (approximately)
INSERT INTO `detail_pesanan` (`id`, `id_pesanan`, `id_produk`, `jumlah`, `harga`, `created_at`, `updated_at`) VALUES
	(1, 1, 5, 1, 50000, '2025-06-06 08:56:32', NULL),
	(2, 1, 3, 1, 25000, '2025-06-06 08:56:32', NULL),
	(3, 2, 3, 10, 25000, '2025-06-06 08:59:24', NULL),
	(4, 2, 5, 11, 50000, '2025-06-06 08:59:24', NULL),
	(5, 3, 5, 2, 50000, '2025-06-10 08:18:07', NULL),
	(6, 4, 5, 3, 50000, '2025-06-10 08:29:40', NULL),
	(7, 5, 5, 2, 50000, '2025-06-10 08:32:51', NULL),
	(8, 6, 3, 4, 25000, '2025-06-11 13:07:44', NULL);

-- Dumping structure for table db_foodies.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_foodies.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table db_foodies.isi_keranjang
CREATE TABLE IF NOT EXISTS `isi_keranjang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_keranjang` int NOT NULL,
  `id_produk` int NOT NULL,
  `jumlah` int NOT NULL,
  `harga` decimal(15,0) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_foodies.isi_keranjang: ~14 rows (approximately)
INSERT INTO `isi_keranjang` (`id`, `id_keranjang`, `id_produk`, `jumlah`, `harga`, `created_at`, `updated_at`) VALUES
	(5, 1, 3, 1, 25000, '2025-05-31 14:07:41', NULL),
	(6, 2, 4, 6, 50000, '2025-06-01 11:58:24', NULL),
	(8, 2, 3, 2, 25000, '2025-06-01 12:32:04', NULL),
	(9, 3, 4, 2, 50000, '2025-06-06 06:04:11', NULL),
	(10, 3, 3, 2, 25000, '2025-06-06 06:04:18', NULL),
	(11, 4, 4, 1, 50000, '2025-06-06 06:52:30', NULL),
	(12, 4, 3, 1, 25000, '2025-06-06 06:52:36', NULL),
	(13, 5, 3, 10, 25000, '2025-06-06 08:58:56', NULL),
	(14, 5, 4, 10, 50000, '2025-06-06 08:59:02', NULL),
	(15, 6, 4, 2, 50000, '2025-06-10 07:45:57', NULL),
	(16, 7, 4, 3, 50000, '2025-06-10 08:28:59', NULL),
	(17, 8, 4, 2, 50000, '2025-06-10 08:32:22', NULL),
	(18, 9, 3, 4, 25000, '2025-06-10 08:58:05', NULL),
	(23, 10, 5, 2, 16000, '2025-06-11 16:28:07', NULL);

-- Dumping structure for table db_foodies.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_foodies.jobs: ~0 rows (approximately)

-- Dumping structure for table db_foodies.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_foodies.job_batches: ~0 rows (approximately)

-- Dumping structure for table db_foodies.keranjang
CREATE TABLE IF NOT EXISTS `keranjang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_tamu` varchar(255) NOT NULL DEFAULT '',
  `status` int NOT NULL COMMENT '0 = aktif, 1 = checkout',
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_foodies.keranjang: ~9 rows (approximately)
INSERT INTO `keranjang` (`id`, `id_tamu`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'guest-1748572716933-3972', 1, '2025-05-31 07:07:41', '2025-05-31 07:07:41'),
	(2, 'guest-1748572716933-3972', 1, '2025-06-01 04:58:24', '2025-06-01 04:58:24'),
	(3, 'guest-1748572716933-3972', 1, '2025-06-05 23:04:11', '2025-06-05 23:04:11'),
	(4, 'guest-1748572716933-3972', 1, '2025-06-05 23:52:30', '2025-06-05 23:52:30'),
	(5, 'guest-1748572716933-3972', 1, '2025-06-06 01:58:56', '2025-06-06 01:58:56'),
	(6, 'guest-1748572716933-3972', 1, '2025-06-10 00:45:57', '2025-06-10 00:45:57'),
	(7, 'guest-1748572716933-3972', 1, '2025-06-10 01:28:59', '2025-06-10 01:28:59'),
	(8, 'guest-1748572716933-3972', 1, '2025-06-10 01:32:22', '2025-06-10 01:32:22'),
	(9, 'guest-1748572716933-3972', 1, '2025-06-10 01:58:05', '2025-06-10 01:58:05'),
	(10, 'guest-1748572716933-3972', 0, '2025-06-11 07:44:28', '2025-06-11 07:44:28');

-- Dumping structure for table db_foodies.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_foodies.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_02_08_140857_create_brands_table', 1),
	(5, '2025_02_10_124239_create_categories_table', 1);

-- Dumping structure for table db_foodies.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_foodies.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table db_foodies.pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_tamu` varchar(255) NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nomor_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_foodies.pelanggan: ~0 rows (approximately)
INSERT INTO `pelanggan` (`id`, `id_tamu`, `nama`, `nomor_hp`, `alamat`, `created_at`, `updated_at`) VALUES
	(1, 'guest-1748572716933-3972', 'mega', '80608080', 'jl. pati', '2025-05-31 11:54:04', NULL);

-- Dumping structure for table db_foodies.pesanan
CREATE TABLE IF NOT EXISTS `pesanan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_pesanan` varchar(255) DEFAULT NULL,
  `id_tamu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `total` decimal(15,0) NOT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0 = menunggu, 1 = diproses, 2 = dikirim, 3 = selesai',
  `alamat_pengiriman` varchar(50) DEFAULT NULL,
  `metode_pembayaran` int NOT NULL COMMENT '0 = COD, 1 = transfer',
  `bukti_transfer` varchar(255) DEFAULT NULL,
  `waktu_pengiriman` timestamp NULL DEFAULT NULL,
  `waktu_selesai` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_foodies.pesanan: ~6 rows (approximately)
INSERT INTO `pesanan` (`id`, `kode_pesanan`, `id_tamu`, `total`, `status`, `alamat_pengiriman`, `metode_pembayaran`, `bukti_transfer`, `waktu_pengiriman`, `waktu_selesai`, `created_at`, `updated_at`) VALUES
	(1, 'fds-20250606-0001', 'guest-1748572716933-3972', 75000, 0, 'asasdasdadada', 0, NULL, '2025-06-11 08:40:04', NULL, '2025-06-06 08:56:32', NULL),
	(2, 'fds-20250606-0002', 'guest-1748572716933-3972', 750000, 0, 'Jl. Beli banyak', 0, NULL, NULL, NULL, '2025-06-06 08:59:24', NULL),
	(3, 'fds-20250610-0001', 'guest-1748572716933-3972', 100000, 3, 'Jl. Pake, Transfer', 1, 'r9Bf1eccyMFfV2vEfHkvGKtx4i5PiNFubvnMbrAO.png', '2025-06-11 08:48:39', '2025-06-11 08:48:40', '2025-06-10 08:18:07', NULL),
	(4, 'fds-20250610-0002', 'guest-1748572716933-3972', 150000, 2, 'Jl. Pake, Transfer2', 1, 'wHEM3Ngs9wgJvusi7Fsp6I5b7yFA73qMtAjY37Ev.png', '2025-06-11 08:48:36', NULL, '2025-06-10 08:29:40', NULL),
	(5, 'fds-20250610-0003', 'guest-1748572716933-3972', 100000, 1, 'Jl. Pake, Transfer3', 1, 'Lofth7LzWC20XlXc08rF780NTveOidANi6kp4JtZ.png', NULL, NULL, '2025-06-10 08:32:51', NULL),
	(6, 'fds-20250611-0001', 'guest-1748572716933-3972', 100000, 0, 'jl. pati', 0, NULL, NULL, NULL, '2025-06-11 13:07:44', NULL);

-- Dumping structure for table db_foodies.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `harga` decimal(15,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_foodies.produk: ~2 rows (approximately)
INSERT INTO `produk` (`id`, `nama`, `slug`, `foto`, `deskripsi`, `harga`, `created_at`, `updated_at`) VALUES
	(3, 'Salad', 'salad', '1749649404_menu-2.jpg', 'Ini adalah sebuah salad', 14000, '2025-05-31 14:04:06', NULL),
	(5, 'Nasi Goreng Telur', 'nasi-goreng-telur', '1749650889_menu-3.jpg', 'Nasi goreng yang ditambah dengan telur, kerupuk', 16000, '2025-06-11 07:08:09', '2025-06-11 07:08:09');

-- Dumping structure for table db_foodies.profil
CREATE TABLE IF NOT EXISTS `profil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rekening` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_foodies.profil: ~0 rows (approximately)
INSERT INTO `profil` (`id`, `alamat`, `no_hp`, `email`, `rekening`, `created_at`, `updated_at`) VALUES
	(1, 'Jl. Foodies, Semarang Tengah, Kota Semarangg', '082435738234', '23.foodies@gmail.com', '<div><strong>BCA</strong>: 123-456-7890</div><div><strong>BRI</strong>: 345-678-9101</div><div><strong>Mandiri</strong>: 987-654-3210</div><div><strong>DANA, OVO, GoPay, ShopeePay</strong>: 082435738234</div>', '2025-06-11 14:27:58', NULL);

-- Dumping structure for table db_foodies.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_foodies.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('84e2GrqGN6YXJp1JXZ5KSVpJMHInfTWDSD0DeJWK', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:139.0) Gecko/20100101 Firefox/139.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTWphcWxCaTM3MmgzMzQ0akRzZ3UxMHlOcHhxNDc0V3hhNTloTVI5NCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9mb29kaWVzLWFwcC50ZXN0L2FkbWluIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1749840249);

-- Dumping structure for table db_foodies.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USR' COMMENT 'ADM for admin and USR for User or Customer',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_foodies.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `utype`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin Foodies', 'admin@gmail.com', NULL, '$2y$12$u8OKig3.oQsE0aNr2AeXUe6qTDqT1AFn/SZXQb6I9HPsW45aCx8vW', 'USR', NULL, '2025-06-13 18:24:54', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
