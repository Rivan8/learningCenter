/*
 Navicat Premium Data Transfer

 Source Server         : myesc
 Source Server Type    : MySQL
 Source Server Version : 80200 (8.2.0)
 Source Host           : localhost:3306
 Source Schema         : esc_perpustakaan

 Target Server Type    : MySQL
 Target Server Version : 80200 (8.2.0)
 File Encoding         : 65001

 Date: 08/01/2025 10:29:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_buku` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year NOT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `books_isbn_unique` (`isbn`),
  KEY `books_category_id_foreign` (`category_id`),
  CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of books
-- ----------------------------
BEGIN;
INSERT INTO `books` (`id`, `title`, `kode_buku`, `author`, `publisher`, `year`, `isbn`, `category_id`, `quantity`, `description`, `created_at`, `updated_at`) VALUES (98, 'Berteologi dalam Iman: Dasar-Dasar Teologi Sistematika-Konstruktif', 'B005', 'Joas Adiprasetya', 'BPK Gunung Mulia', 2023, '978-3-16-148410-0', 8, 6, 'sebuah buku yang mengupas tema-tema fundamental dalam kekristenan. Buku ini mencakup berbagai topik penting seperti gereja, manusia, keselamatan, roh kudus, dan trinitas, yang semuanya dilihat melalui perspektif teologi sistematika-konstruktif.', NULL, '2025-01-08 10:00:45');
INSERT INTO `books` (`id`, `title`, `kode_buku`, `author`, `publisher`, `year`, `isbn`, `category_id`, `quantity`, `description`, `created_at`, `updated_at`) VALUES (99, 'Handbook to the Bible: Pedoman Lengkap & Pendalaman Alkitab\"', NULL, 'Jane Smith', 'Gandum Mas', 2018, '978-1-23-456789-7', 8, 4, 'panduan komprehensif yang dirancang untuk membantu pembaca memahami setiap kitab dalam Alkitab', NULL, '2024-12-22 22:12:24');
INSERT INTO `books` (`id`, `title`, `kode_buku`, `author`, `publisher`, `year`, `isbn`, `category_id`, `quantity`, `description`, `created_at`, `updated_at`) VALUES (172, 'Keluarga Kristen yang Sehat', NULL, 'Gary Chapman', 'BPK Gunung Mulia', 2022, '978-602-6740-06-0', 8, 11, NULL, NULL, NULL);
INSERT INTO `books` (`id`, `title`, `kode_buku`, `author`, `publisher`, `year`, `isbn`, `category_id`, `quantity`, `description`, `created_at`, `updated_at`) VALUES (190, 'Kepemimpinan Kristen yang Berhasil', NULL, 'John Maxwell', 'BPK Gunung Mulia', 2021, '978-602-6740-08-4', 8, 13, NULL, NULL, NULL);
INSERT INTO `books` (`id`, `title`, `kode_buku`, `author`, `publisher`, `year`, `isbn`, `category_id`, `quantity`, `description`, `created_at`, `updated_at`) VALUES (194, 'Perspektif Alkitab tentang Keluarga ', NULL, 'Tim Chester ', 'BPK Gunung Mulia ', 2022, '978 -979 -29 -2043 -1 ', 8, 11, NULL, NULL, NULL);
INSERT INTO `books` (`id`, `title`, `kode_buku`, `author`, `publisher`, `year`, `isbn`, `category_id`, `quantity`, `description`, `created_at`, `updated_at`) VALUES (203, 'THE PURPOSE DRIVEN LIFE', 'ESC TD', 'RICK WARREN', 'Immanuel', 2018, '978-602-8537-59-9', 17, 4, '4', '2025-01-08 10:20:04', '2025-01-08 10:20:04');
INSERT INTO `books` (`id`, `title`, `kode_buku`, `author`, `publisher`, `year`, `isbn`, `category_id`, `quantity`, `description`, `created_at`, `updated_at`) VALUES (204, '10 Jam Menjelang Kematian', 'ESC 1K', 'Brian Wills', 'Light Publishing', 2010, '-', 17, 1, '1', '2025-01-08 10:28:35', '2025-01-08 10:28:35');
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of borrowings
-- ----------------------------
BEGIN;
INSERT INTO `borrowings` (`id`, `user_id`, `book_id`, `borrowed_at`, `due_date`, `returned_at`, `status`, `created_at`, `updated_at`) VALUES (23, 2, 98, '2024-12-07', '2024-12-14', '2024-12-14', 'Dikembalikan', '2024-12-14 12:19:20', '2024-12-14 21:15:20');
COMMIT;

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
COMMIT;

-- ----------------------------
-- Table structure for denda
-- ----------------------------
DROP TABLE IF EXISTS `denda`;
CREATE TABLE `denda` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `borrowing_id` bigint unsigned NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `status` enum('unpaid','paid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
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
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
COMMIT;

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sessions
-- ----------------------------
BEGIN;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('OASbqZYHQ9MCCup8jAAUZsTuNIbEzMIYbpSnnRX4', 1, '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRlFqSXRNS2k3OXJWR3VxeW5FNkdmcGdKSjlGYnJheHpaYXhKSTZxdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9sb2NhbGhvc3QvZXNjLWxpYnJhcnkvYm9ycm93aW5ncyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1736305801);
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('OPVFdzqCGDKnNqjQoOoB6bvuy7uYXKe0hPHMo0hc', 14, '192.168.1.249', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRU5VUEViRU9NanhRUDVrNFBkaFhTVGowYlJocnc5YWN3ZjNlTkw0SSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xOTIuMTY4LjEuNjUvZXNjLWxpYnJhcnkvbG9naW4iO31zOjEwOiJuZXdfbWVtYmVyIjtzOjEyOiJOYW9taSBZZW1pbWEiO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE0O30=', 1736304699);
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('tWVuUZXFyilKPuWECDCVt9l0YqfHKJTagKguwwGR', 13, '192.168.1.135', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNEdKMXh1Wkd4NUg3ckd0bk43TnlObTdMeG9FVFV1Nkpuc244MGVWOSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xOTIuMTY4LjEuNjUvRVNDLUxJQlJBUlkvYm9va3MvMjA0L2VkaXQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMzt9', 1736306923);
COMMIT;

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci,
  `role` enum('admin','member') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`) VALUES (1, 'Rivan Stevanus Tampi', 'rivan.tampi7@gmail.com', '$2y$12$93QqvrG3BvNDPfd51IoG0O8638MwxskafolAgU0MXPD.6S86M4pfu', '085234786655', 'Jl. Sungai Raya Dalam. Komp. Puri Akcaya 2 No. D.12 Sungai Raya Dalam', 'admin', 'photo/1734619796-40117.jpeg', '2024-12-12 04:26:10', '2025-01-07 12:01:50', 'Laki-laki');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`) VALUES (2, 'Rivan Tampi', 'rivan.tampi@gmail.com', '$2y$12$pgnrFfQlBli7YHF0/zTh0.f/Wtgpt2kMWdXBXrJT9SbXyYTBoV0Kq', '345252352352', 'Pontianak', 'member', NULL, '2024-12-12 04:27:07', '2024-12-12 04:29:53', 'Laki-laki');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`) VALUES (3, 'Makayla Shekinah Tampi', 'Makayla77@gmail.com', '$2y$12$XitRVjCGVpzOAwSIGUm8j.OnxWmHH1b4FJlug..42QfU9RoSqr.06', '085234786655', 'Amurang', 'member', 'photo/1736224344-profile.jpg', '2024-12-12 04:29:33', '2025-01-07 11:32:24', 'Perempuan');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`) VALUES (4, 'Rivan Stevanus', 'rivan.tampi77@gmail.com', '$2y$12$LQkpGAeAfhTP8Fxbt77EgOSMYFI9gBDF2rFMz1mnG8oV8x/dKqFPq', '085234786655', 'Tumpaan', 'member', 'photo/1734004012-10815.jpg', '2024-12-12 18:46:52', '2024-12-12 18:46:52', 'Laki-laki');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`) VALUES (5, 'Shane Darren Ghevariel Tampi', 'rivan.tampi777@gmail.com', '$2y$12$FfbWolCv550835jRmKw4Q.ZSDnTIBZnlsCrtBbM67ofKFANDJkaHm', '085234786655', 'Pontianak', 'member', 'photo/1734005007-40117.jpeg', '2024-12-12 19:03:28', '2024-12-12 19:03:28', 'Laki-laki');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`) VALUES (6, 'Zukri', 'zukri@gmail.com.com', '$2y$12$NIAipx40kWdeD/qWcOOiD.SHpSzuA6JYJ0GP9ewj5qxJ4Ci3yGDGW', '0811786655', NULL, 'member', 'photo/1734620313-ss.jpg', '2024-12-13 09:53:55', '2024-12-19 21:58:33', 'Laki-laki');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`) VALUES (7, 'Mieke Dotulong', 'mieke7@gmail.com', '$2y$12$AsTxdn6nTnaJe0wnmtWZZOlWKeTxBxKrurJidG9XUerZgYwygEhhC', '0811786655', NULL, 'member', NULL, '2024-12-28 19:57:29', '2024-12-28 19:57:29', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`) VALUES (8, 'Agam Suteja', 'agam7@gmail.com', '$2y$12$tRE7NXheHdHMpNxFw28a7eDM3SjaNMuoN6j7HTk/OueWGbaXO4F8C', '098739850994', NULL, 'member', NULL, '2024-12-28 22:56:19', '2024-12-28 22:56:19', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`) VALUES (9, 'Yopi Kadem', 'yopi@gmail.com', '$2y$12$MWJ2gQX2VftZQFy4UqmLbOvH1daT1qCn3ot.edykT5JNTGoCXNFFe', '345252352352', NULL, 'member', NULL, '2024-12-28 23:08:55', '2024-12-28 23:08:55', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`) VALUES (12, 'Next Step', 'nextstep@gmail.com', '$2y$12$n5UKIlu9Cx7k0X/LlwqbSOb61SF9eryJlR88GUXebDfmz4ym/4ky6', '0811786655', 'Pontianak', 'admin', 'photo/1736303493-jesus.jpg', '2025-01-08 09:31:34', '2025-01-08 09:31:34', 'Perempuan');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`) VALUES (13, 'Nurimang Abigail', 'abbya1480@gmail.com', '$2y$12$MMg9CdfesNkseRFIqMhgSeAy.9tWv.88iY36pBmIUQIgLC9cAwtqW', '089526245460', 'Jl. Prof. M Yamin', 'admin', NULL, '2025-01-08 09:43:27', '2025-01-08 09:43:27', 'Perempuan');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `role`, `photo`, `created_at`, `updated_at`, `jenis_kelamin`) VALUES (14, 'Naomi Yemima', 'naomi1234@gmail.com', '$2y$12$NpNwq3iSmX/bPMF472qsl.DF/xCUaIq/sqPuj/GGK6C/xM5JZRIJu', '12345678999', NULL, 'member', NULL, '2025-01-08 09:51:39', '2025-01-08 09:51:39', NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
