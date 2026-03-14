/*
 Navicat Premium Dump SQL

 Source Server         : Elshaddai
 Source Server Type    : MySQL
 Source Server Version : 80027 (8.0.27)
 Source Host           : localhost:3306
 Source Schema         : esc_class

 Target Server Type    : MySQL
 Target Server Version : 80027 (8.0.27)
 File Encoding         : 65001

 Date: 27/08/2025 11:41:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for access_requests
-- ----------------------------
DROP TABLE IF EXISTS `access_requests`;
CREATE TABLE `access_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `alasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `access_requests_user_id_foreign` (`user_id`),
  CONSTRAINT `access_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of access_requests
-- ----------------------------
BEGIN;
INSERT INTO `access_requests` (`id`, `user_id`, `alasan`, `status`, `created_at`, `updated_at`) VALUES (9, 2, 'minimal; 10 karakter', 'approved', '2025-08-15 12:33:30', '2025-08-15 12:33:53');
COMMIT;

-- ----------------------------
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_buku` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year NOT NULL,
  `isbn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `cover` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `books_isbn_unique` (`isbn`),
  KEY `books_category_id_foreign` (`category_id`),
  CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of books
-- ----------------------------
BEGIN;
INSERT INTO `books` (`id`, `title`, `kode_buku`, `author`, `publisher`, `year`, `isbn`, `category_id`, `quantity`, `cover`, `description`, `created_at`, `updated_at`) VALUES (98, 'Berteologi dalam Iman: Dasar-Dasar Teologi Sistematika-Konstruktif', 'B005', 'Joas Adiprasetya', 'BPK Gunung Mulia', 2023, '978-3-16-148410-0', 8, 4, 'photo/1736999077-cover 5.png', 'sebuah buku yang mengupas tema-tema fundamental dalam kekristenan. Buku ini mencakup berbagai topik penting seperti gereja, manusia, keselamatan, roh kudus, dan trinitas, yang semuanya dilihat melalui perspektif teologi sistematika-konstruktif.', NULL, '2025-01-17 11:35:19');
INSERT INTO `books` (`id`, `title`, `kode_buku`, `author`, `publisher`, `year`, `isbn`, `category_id`, `quantity`, `cover`, `description`, `created_at`, `updated_at`) VALUES (99, 'Handbook to the Bible: Pedoman Lengkap & Pendalaman Alkitab\"', 'B00100', 'Jane Smith', 'Gandum Mas', 2018, '978-1-23-456789-7', 8, 4, '', 'panduan komprehensif yang dirancang untuk membantu pembaca memahami setiap kitab dalam Alkitab', NULL, '2025-01-16 10:54:18');
INSERT INTO `books` (`id`, `title`, `kode_buku`, `author`, `publisher`, `year`, `isbn`, `category_id`, `quantity`, `cover`, `description`, `created_at`, `updated_at`) VALUES (172, 'Keluarga Kristen yang Sehat', NULL, 'Gary Chapman', 'BPK Gunung Mulia', 2022, '978-602-6740-06-0', 8, 10, NULL, NULL, NULL, '2025-01-17 09:37:08');
INSERT INTO `books` (`id`, `title`, `kode_buku`, `author`, `publisher`, `year`, `isbn`, `category_id`, `quantity`, `cover`, `description`, `created_at`, `updated_at`) VALUES (190, 'Kepemimpinan Kristen yang Berhasil', NULL, 'John Maxwell', 'BPK Gunung Mulia', 2021, '978-602-6740-08-4', 8, 13, NULL, NULL, NULL, NULL);
INSERT INTO `books` (`id`, `title`, `kode_buku`, `author`, `publisher`, `year`, `isbn`, `category_id`, `quantity`, `cover`, `description`, `created_at`, `updated_at`) VALUES (194, 'Perspektif Alkitab tentang Keluarga ', NULL, 'Tim Chester ', 'BPK Gunung Mulia ', 2022, '978 -979 -29 -2043 -1 ', 8, 11, NULL, NULL, NULL, NULL);
INSERT INTO `books` (`id`, `title`, `kode_buku`, `author`, `publisher`, `year`, `isbn`, `category_id`, `quantity`, `cover`, `description`, `created_at`, `updated_at`) VALUES (203, 'THE PURPOSE DRIVEN LIFE', 'ESC TD', 'RICK WARREN', 'Immanuel', 2018, '978-602-8537-59-9', 17, 4, 'photo/1737000090-cover 3.png', '4', '2025-01-08 10:20:04', '2025-01-16 11:01:30');
INSERT INTO `books` (`id`, `title`, `kode_buku`, `author`, `publisher`, `year`, `isbn`, `category_id`, `quantity`, `cover`, `description`, `created_at`, `updated_at`) VALUES (204, '10 Jam Menjelang Kematian', 'ESC 1K', 'Brian Wills', 'Light Publishing', 2010, '-', 17, 1, NULL, '1', '2025-01-08 10:28:35', '2025-01-08 10:28:35');
INSERT INTO `books` (`id`, `title`, `kode_buku`, `author`, `publisher`, `year`, `isbn`, `category_id`, `quantity`, `cover`, `description`, `created_at`, `updated_at`) VALUES (205, 'Bergulat di Tepian', 'ESC DB', 'Daniel K.Listijabudi', 'BPK', 2019, '978-602-231-561-2', 17, 0, NULL, '1', '2025-01-08 10:48:21', '2025-01-17 09:37:46');
INSERT INTO `books` (`id`, `title`, `kode_buku`, `author`, `publisher`, `year`, `isbn`, `category_id`, `quantity`, `cover`, `description`, `created_at`, `updated_at`) VALUES (206, 'Destiny', 'ESC DT', 'Steven Teo', 'Andi', 2009, '978-979-29-1026-1', 17, 1, NULL, '1', '2025-01-08 10:51:32', '2025-01-08 10:51:32');
INSERT INTO `books` (`id`, `title`, `kode_buku`, `author`, `publisher`, `year`, `isbn`, `category_id`, `quantity`, `cover`, `description`, `created_at`, `updated_at`) VALUES (210, 'Elshaddai Gereja ku', 'B00511', 'Elshaddai Church', 'Elshaddai', 2025, '1234-12212-11123', 8, 3, 'photo/1736998864-cover 2.png', 'Ini Deskripsi', '2025-01-16 09:37:32', '2025-01-16 09:37:32');
COMMIT;

-- ----------------------------
-- Table structure for borrowings
-- ----------------------------
DROP TABLE IF EXISTS `borrowings`;
CREATE TABLE `borrowings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `book_id` bigint unsigned NOT NULL,
  `borrowed_at` date NOT NULL,
  `due_date` date NOT NULL,
  `returned_at` date DEFAULT NULL,
  `status` enum('Dipinjam','Dikembalikan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Dipinjam',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `borrowings_user_id_foreign` (`user_id`),
  KEY `borrowings_book_id_foreign` (`book_id`),
  CONSTRAINT `borrowings_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  CONSTRAINT `borrowings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of borrowings
-- ----------------------------
BEGIN;
INSERT INTO `borrowings` (`id`, `user_id`, `book_id`, `borrowed_at`, `due_date`, `returned_at`, `status`, `created_at`, `updated_at`) VALUES (23, 2, 98, '2024-12-07', '2024-12-14', '2024-12-14', 'Dikembalikan', '2024-12-14 12:19:20', '2024-12-14 21:15:20');
INSERT INTO `borrowings` (`id`, `user_id`, `book_id`, `borrowed_at`, `due_date`, `returned_at`, `status`, `created_at`, `updated_at`) VALUES (32, 2, 172, '2025-01-17', '2025-01-24', NULL, 'Dipinjam', '2025-01-17 09:37:08', '2025-01-17 09:37:08');
INSERT INTO `borrowings` (`id`, `user_id`, `book_id`, `borrowed_at`, `due_date`, `returned_at`, `status`, `created_at`, `updated_at`) VALUES (33, 3, 98, '2025-01-17', '2025-01-24', NULL, 'Dipinjam', '2025-01-17 09:37:25', '2025-01-17 09:37:25');
INSERT INTO `borrowings` (`id`, `user_id`, `book_id`, `borrowed_at`, `due_date`, `returned_at`, `status`, `created_at`, `updated_at`) VALUES (34, 5, 205, '2025-01-16', '2025-01-23', NULL, 'Dipinjam', '2025-01-17 09:37:46', '2025-01-17 09:37:46');
INSERT INTO `borrowings` (`id`, `user_id`, `book_id`, `borrowed_at`, `due_date`, `returned_at`, `status`, `created_at`, `updated_at`) VALUES (35, 8, 98, '2025-01-13', '2025-01-20', NULL, 'Dipinjam', '2025-01-17 11:35:19', '2025-01-17 11:35:19');
COMMIT;

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cache
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for cache_locks
-- ----------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cache_locks
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
BEGIN;
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (8, 'Teologi', 'Buku yang membahas konsep-konsep dasar teologi, doktrin, dan ajaran agama.', '2024-12-12 04:35:28', '2024-12-12 04:35:28');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (10, 'Church Growth Through Cell Group', 'Buku yang membahas pertumbuhan gereja dalam sebuah komunitas', '2025-01-08 10:08:13', '2025-01-08 10:08:13');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (11, 'Dinamika Pertumbuhan Gereja', 'Sebuah buku dinamika pertumbuhan gereja', '2025-01-08 10:08:59', '2025-01-08 10:08:59');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (12, 'Ekklesia', '-', '2025-01-08 10:09:18', '2025-01-08 10:09:18');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (13, 'Gempa Gereja', '-', '2025-01-08 10:09:40', '2025-01-08 10:09:40');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (14, 'Gereja Imitasi', '-', '2025-01-08 10:11:11', '2025-01-08 10:11:11');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (15, 'Gereja Organik', '-', '2025-01-08 10:11:24', '2025-01-08 10:11:24');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (16, 'Katekismus Gereja Bethel Indonesia', '-', '2025-01-08 10:11:38', '2025-01-08 10:11:38');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (17, 'KESAKSIAN', 'Sebuah buku penuntun pada perjalanan rohani 40 hari yang akan menolong anda menemukan jawaban terhadap pertanyaan yang paling mendasar dalam hidup : Apa sebenarnya tujuan dari keberadaanku?', '2025-01-08 10:18:20', '2025-01-08 10:18:20');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (18, 'Family/Keluarga', 'Buku yang menceritakan sebuah keluarga', '2025-01-08 10:53:12', '2025-01-08 10:53:12');
COMMIT;

-- ----------------------------
-- Table structure for denda
-- ----------------------------
DROP TABLE IF EXISTS `denda`;
CREATE TABLE `denda` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `borrowing_id` bigint unsigned NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `status` enum('unpaid','paid') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `paid_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `denda_borrowing_id_foreign` (`borrowing_id`),
  CONSTRAINT `denda_borrowing_id_foreign` FOREIGN KEY (`borrowing_id`) REFERENCES `borrowings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of denda
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for job_batches
-- ----------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of job_batches
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4, '2024_12_10_075050_create_categories_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5, '2024_12_10_075151_create_books_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (6, '2024_12_10_075339_create_borrowings_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (7, '2024_12_10_075505_create_denda_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8, '2024_12_10_075550_create_setting_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (9, '2024_12_12_042230_create_sessions_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (10, '2025_07_30_110354_add_status_to_users_table', 3);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (11, '2025_08_01_081106_create_password_reset_tokens_table', 4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (12, '2025_08_07_043259_create_video_progress_table', 5);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (13, '2025_08_09_024002_add_video_duration_to_video_progress_table', 6);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (14, '2025_08_10_000000_create_access_requests_table', 7);
COMMIT;

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_reset_tokens_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------
BEGIN;
INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES ('rivan.tampi7@gmail.com', '$2y$12$RQ/nWrbx7m0ICO9HfS7UWeFnDljS.lKw4faVqFbN8jBluK3xFpubK', '2025-08-07 02:48:53');
COMMIT;

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sessions
-- ----------------------------
BEGIN;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('YV153i3zQSy9F1FYKky9DmsnnkCyc1e3YiI8RD0D', 2, '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVmFBQVNKSkFsR2tDeVc1QlRtN1o2MWdFS0F6VHRSejlRaFl6Qk1nNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjM6Imh0dHA6Ly9sb2NhbGhvc3QvYXBpL3ZpZGVvLXByb2dyZXNzL2xhc3Qtd2F0Y2hlZD92aWRlb190eXBlPXdoeSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1756267428);
COMMIT;

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of setting
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `role` enum('admin','member') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statusanggota` enum('Core Team','DM','belum') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','suspended') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `statusnextstep` enum('new','plant','grow','fruitfull') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`, `statusanggota`, `status`, `statusnextstep`) VALUES (1, 'Rivan Stevanus Tampi', 'rivan.tampi7@gmail.com', '$2y$12$93QqvrG3BvNDPfd51IoG0O8638MwxskafolAgU0MXPD.6S86M4pfu', '085234786655', 'Jl. Sungai Raya Dalam. Komp. Puri Akcaya 2 No. D.12 Sungai Raya Dalam', 'admin', 'photo/1754397436-ai-generated-8560269_640.jpg', '2024-12-12 04:26:10', '2025-08-05 12:37:16', 'Laki-laki', 'DM', 'active', 'plant');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`, `statusanggota`, `status`, `statusnextstep`) VALUES (2, 'Rivan Tampi', 'rivan.tampi@gmail.com', '$2y$12$pgnrFfQlBli7YHF0/zTh0.f/Wtgpt2kMWdXBXrJT9SbXyYTBoV0Kq', '345252352352', 'Pontianak', 'member', 'photo/1754397564-naruto-3757871_640.jpg', '2024-12-12 04:27:07', '2025-08-13 03:48:01', 'Laki-laki', 'belum', 'active', 'plant');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`, `statusanggota`, `status`, `statusnextstep`) VALUES (3, 'Makayla Shekinah Tampi', 'Makayla77@gmail.com', '$2y$12$XitRVjCGVpzOAwSIGUm8j.OnxWmHH1b4FJlug..42QfU9RoSqr.06', '085234786655', 'Amurang', 'admin', 'photo/1736224344-profile.jpg', '2024-12-12 04:29:33', '2025-07-30 11:08:31', 'Laki-laki', 'DM', 'active', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`, `statusanggota`, `status`, `statusnextstep`) VALUES (4, 'Rivan Stevanus', 'rivan.tampi77@gmail.com', '$2y$12$LQkpGAeAfhTP8Fxbt77EgOSMYFI9gBDF2rFMz1mnG8oV8x/dKqFPq', '085234786655', 'Tumpaan', 'member', 'photo/1754397659-ai-generated-8582619_640.jpg', '2024-12-12 18:46:52', '2025-08-08 05:24:29', 'Laki-laki', 'Core Team', 'active', 'plant');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`, `statusanggota`, `status`, `statusnextstep`) VALUES (5, 'Shane Darren Ghevariel Tampi', 'rivan.tampi777@gmail.com', '$2y$12$FfbWolCv550835jRmKw4Q.ZSDnTIBZnlsCrtBbM67ofKFANDJkaHm', '085234786655', 'Pontianak', 'member', 'photo/1754706201-Screen Shot 2025-02-25 at 14.33.52.png', '2024-12-12 19:03:28', '2025-08-09 02:23:21', 'Laki-laki', 'Core Team', 'active', 'new');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`, `statusanggota`, `status`, `statusnextstep`) VALUES (8, 'Agam Suteja', 'agam7@gmail.com', '$2y$12$tRE7NXheHdHMpNxFw28a7eDM3SjaNMuoN6j7HTk/OueWGbaXO4F8C', '098739850994', NULL, 'admin', NULL, '2024-12-28 22:56:19', '2024-12-28 22:56:19', NULL, NULL, 'active', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`, `statusanggota`, `status`, `statusnextstep`) VALUES (15, 'Imelda Blegur', 'imeldablegs@gmail.com', '$2y$12$Dp.R3CNYd2ez4/ESaggJ6epwr0opn7gIIbqpdox6IWaqrbqeTWbEC', '085245767038', NULL, 'member', NULL, '2025-03-20 09:21:44', '2025-03-20 09:21:44', NULL, NULL, 'active', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`, `statusanggota`, `status`, `statusnextstep`) VALUES (19, 'Lampos Rajagukguk', 'workoflamposaritonang@gmail.com', '$2y$12$I3HU3PUw0rckbm4njbtIzOXojLRvWpxwyrqIQ3pelK7e7UPjMzaUm', '089648565494', NULL, 'member', NULL, '2025-03-21 13:16:47', '2025-03-21 13:16:47', NULL, NULL, 'active', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`, `statusanggota`, `status`, `statusnextstep`) VALUES (20, 'Shane Darren Gevariel Tampi', 'rivan.tampi83@gmail.com', '$2y$12$uJeI5CaidjdHaZRJ3XF5B.VFfYHYBFx1tpxgK0AMQ33YEY0gxsg7y', '124131', NULL, 'member', NULL, '2025-08-07 02:43:16', '2025-08-07 02:43:16', NULL, NULL, 'active', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`, `statusanggota`, `status`, `statusnextstep`) VALUES (21, 'Alfiano Armando Tagor', 'alfiano.armando46@gmail.com', '$2y$12$LQOwE0ELdRSZvOsBrYGcaOpU2/iODrpOv6YyfW5gIqDyKu4ku7iKa', '081251125443', 'Mes GBI El Shaddai', 'member', 'photo/1754536691-ai-generated-8604384_640.png', '2025-08-07 02:44:35', '2025-08-13 02:43:48', 'Laki-laki', 'Core Team', 'active', 'new');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`, `statusanggota`, `status`, `statusnextstep`) VALUES (22, 'Imelda Blegur', 'imeldablegur15@gmail.com', '$2y$12$16fcOUl2Zaan8QUsU425ku1xGNLob/WQJDRW4ArVMOnRTeM4unU2W', '085245767038', NULL, 'member', NULL, '2025-08-07 02:47:47', '2025-08-07 02:47:47', NULL, NULL, 'active', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`, `statusanggota`, `status`, `statusnextstep`) VALUES (23, 'Rina Vidiawati', 'rinavidiawati@gmail.com', '$2y$12$1LExHaZSEz7bBBnXdgW/h.aLzBOxjleN0DJCJPvFLgH/Bn//DbAcW', '0812000111222', NULL, 'member', NULL, '2025-08-14 00:49:45', '2025-08-14 00:49:45', NULL, NULL, 'active', NULL);
COMMIT;

-- ----------------------------
-- Table structure for video_progress
-- ----------------------------
DROP TABLE IF EXISTS `video_progress`;
CREATE TABLE `video_progress` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `video_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_index` int NOT NULL,
  `progress_percentage` int NOT NULL DEFAULT '0',
  `current_time` double NOT NULL DEFAULT '0',
  `video_duration` double DEFAULT NULL COMMENT 'Video duration in seconds',
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `last_watched_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `video_progress_user_id_video_type_video_index_unique` (`user_id`,`video_type`,`video_index`),
  CONSTRAINT `video_progress_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of video_progress
-- ----------------------------
BEGIN;
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (1, 4, 'why', 0, 9, 25.990818, 303, 0, '2025-08-15 11:50:53', '2025-08-07 04:48:40', '2025-08-15 11:50:53');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (2, 21, 'why', 0, 100, 150.305576, 303, 1, '2025-08-15 04:08:58', '2025-08-07 04:58:35', '2025-08-15 04:08:58');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (3, 4, 'why', 1, 0, 0.736986, 601.2, 0, '2025-08-15 02:35:05', '2025-08-07 04:59:45', '2025-08-15 02:35:05');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (4, 21, 'why', 1, 100, 0.66124, NULL, 1, '2025-08-07 09:24:14', '2025-08-07 05:01:42', '2025-08-07 09:24:14');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (5, 4, 'why', 2, 1, 5.601309, 870, 0, '2025-08-09 04:01:55', '2025-08-07 07:40:41', '2025-08-09 04:01:55');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (6, 21, 'why', 2, 100, 0.957328, NULL, 1, '2025-08-07 09:01:01', '2025-08-07 08:20:09', '2025-08-07 09:01:01');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (7, 21, 'why', 3, 100, 25.980874, NULL, 1, '2025-08-07 09:01:29', '2025-08-07 08:27:26', '2025-08-07 09:01:29');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (8, 21, 'why', 4, 100, 5.77406, NULL, 1, '2025-08-07 09:24:29', '2025-08-07 08:34:01', '2025-08-07 09:24:29');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (9, 4, 'why', 3, 0, 0.928685, 788, 0, '2025-08-09 04:02:17', '2025-08-07 08:35:18', '2025-08-09 04:02:17');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (10, 21, 'why', 5, 100, 0.974503, NULL, 1, '2025-08-07 09:24:21', '2025-08-07 08:42:27', '2025-08-07 09:24:21');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (11, 21, 'why', 6, 100, 0.971774, NULL, 1, '2025-08-07 09:24:19', '2025-08-07 08:50:21', '2025-08-07 09:24:19');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (12, 21, 'why', 7, 100, 180.893003, 476, 1, '2025-08-13 02:35:45', '2025-08-07 08:54:04', '2025-08-13 02:35:45');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (13, 4, 'why', 4, 0, 0.940769, 1005.733333, 0, '2025-08-15 02:34:44', '2025-08-07 08:57:38', '2025-08-15 02:34:44');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (14, 21, 'why', 8, 100, 15.996146, NULL, 1, '2025-08-07 09:24:53', '2025-08-07 08:58:04', '2025-08-07 09:24:53');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (15, 1, 'why', 0, 3, 0, NULL, 0, '2025-08-08 05:24:06', '2025-08-08 05:23:24', '2025-08-08 05:24:06');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (16, 3, 'why', 0, 100, 303, NULL, 1, '2025-08-09 02:21:33', '2025-08-09 01:51:59', '2025-08-09 02:21:33');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (17, 3, 'why', 1, 2, 0, NULL, 0, '2025-08-09 02:22:20', '2025-08-09 02:21:34', '2025-08-09 02:22:20');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (18, 5, 'why', 0, 100, 0, NULL, 1, '2025-08-09 02:56:03', '2025-08-09 02:24:29', '2025-08-09 02:56:03');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (19, 5, 'why', 1, 100, 601.2, NULL, 1, '2025-08-09 02:55:52', '2025-08-09 02:40:25', '2025-08-09 02:55:52');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (20, 5, 'why', 2, 100, 870, NULL, 1, '2025-08-09 03:16:16', '2025-08-09 02:55:54', '2025-08-09 03:16:16');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (21, 5, 'why', 3, 19, 145.792834, 788, 0, '2025-08-15 11:55:21', '2025-08-09 03:16:18', '2025-08-15 11:55:21');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (22, 4, 'why', 5, 0, 0.926491, 945, 0, '2025-08-09 04:02:20', '2025-08-09 03:27:11', '2025-08-09 04:02:20');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (23, 4, 'why', 6, 2, 10.499266, 442.2, 0, '2025-08-09 04:02:25', '2025-08-09 03:35:07', '2025-08-09 04:02:25');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (24, 4, 'why', 7, 78, 370.738658, 476, 0, '2025-08-15 11:51:00', '2025-08-09 03:38:51', '2025-08-15 11:51:00');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (25, 4, 'why', 8, 100, 0.80941, 202, 1, '2025-08-14 00:34:36', '2025-08-09 03:44:27', '2025-08-14 00:34:36');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (26, 2, 'why', 0, 100, 300.872245, 303, 1, '2025-08-27 04:02:42', '2025-08-15 00:54:47', '2025-08-27 04:02:42');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (27, 2, 'why', 1, 100, 600.903003, 601.2, 1, '2025-08-27 04:03:14', '2025-08-27 04:02:46', '2025-08-27 04:03:14');
INSERT INTO `video_progress` (`id`, `user_id`, `video_type`, `video_index`, `progress_percentage`, `current_time`, `video_duration`, `is_completed`, `last_watched_at`, `created_at`, `updated_at`) VALUES (28, 2, 'why', 2, 100, 865.818851, 870, 1, '2025-08-27 04:03:48', '2025-08-27 04:03:16', '2025-08-27 04:03:48');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
