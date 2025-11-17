# ************************************************************
# Antares - SQL Client
# Version 0.7.19
# 
# https://antares-sql.app/
# https://github.com/antares-sql/antares
# 
# Host: 192.168.1.99 ((Ubuntu) 8.0.35)
# Database: DB_remunerasi
# Generation time: 2023-11-20T13:59:40+07:00
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, "2014_10_12_000000_create_users_table", 1),
	(2, "2014_10_12_100000_create_password_resets_table", 1),
	(3, "2019_08_19_000000_create_failed_jobs_table", 1),
	(4, "2020_08_22_094721_unit_layanan", 1),
	(7, "2020_10_07_043855_create_permission_tables", 2),
	(8, "2020_10_29_112348_create_penjamin", 3),
	(10, "2020_11_03_040755_create_bap", 5),
	(11, "2020_11_03_041126_create_pencairan", 6),
	(15, "2020_10_09_141033_create_pelayanan", 7),
	(22, "2020_10_31_033231_create_pengajuan_klaim", 8),
	(23, "2020_12_03_040631_create_item_pengajuanklaim", 8),
	(25, "2020_12_28_063437_create_penagihan", 10),
	(26, "2021_01_07_041448_create_penagihan_umum", 11),
	(27, "2021_02_13_065938_saldo_awal", 12),
	(28, "2021_02_16_015223_create_rkakl", 13),
	(29, "2021_02_17_012908_create_item_rkakl", 13),
	(30, "2021_03_02_011912_create_sumber_dana", 13),
	(31, "2021_03_02_011925_create_output", 13),
	(32, "2021_03_02_011936_create_komponen", 13),
	(33, "2021_03_02_011945_create_akun", 13),
	(35, "2021_03_09_020713_lv1_histori_sumberdana", 13),
	(36, "2021_03_09_023403_lv2_histori_output", 13),
	(37, "2021_03_09_031541_lv3_histori_komponen", 13),
	(38, "2021_03_09_032727_lv4_histori_akun", 13),
	(40, "2021_03_02_011953_create_kegiatan", 14),
	(41, "2021_03_09_032738_lv5_histori_kegiatan", 14),
	(44, "2021_06_10_073522_create_cicilan_jaminan", 15),
	(45, "2021_06_10_073535_create_cicilan_nonjaminan", 15),
	(47, "2020_12_22_005435_nonjaminan", 16),
	(48, "2021_07_17_144001_create_transaksi_jaminan", 17),
	(50, "2021_07_18_132643_create_transaksi_nonjaminan", 18),
	(51, "2021_07_28_125202_create_penggolongan_jaminan", 19),
	(52, "2021_07_28_125422_create_penggolongan_nonjaminan", 19),
	(53, "2021_09_30_030520_create_level_rkakl", 20),
	(59, "2021_10_01_062834_create_master_rkakl", 21),
	(60, "2021_10_01_063339_create_items_rkakl", 21),
	(61, "2021_11_21_024604_create_histori_itemsv3rkakl", 22),
	(103, "2022_01_10_012748_create_checklist_ppk", 23),
	(104, "2022_01_10_012800_create_checklist_kontrak", 23),
	(105, "2022_01_10_012811_create_checklist_penerima", 23),
	(106, "2022_01_10_012817_create_checklist_bast", 23),
	(107, "2022_01_10_012822_create_checklist_kwitansi", 23),
	(108, "2022_01_10_012824_create_checklist_ppspm", 23),
	(109, "2022_01_10_012842_create_checklist_invoice", 23),
	(110, "2022_01_10_012848_create_checklist_suratjalan", 23),
	(111, "2022_01_10_012858_create_checklistmaster", 23),
	(112, "2022_01_10_012858_create_efaktur", 23),
	(113, "2022_01_10_012859_create_checklist", 23),
	(114, "2022_01_10_012910_create_checklist_trackrecord", 23),
	(116, "2022_03_31_124702_create_pph21", 25),
	(117, "2022_03_31_124704_create_pph22", 25),
	(118, "2022_03_31_124706_create_pph23", 25),
	(119, "2022_03_31_124726_create_setoranlain", 25),
	(120, "2022_04_04_135826_create_ppn", 26),
	(122, "2022_04_21_092152_create_persekot", 28),
	(124, "2022_01_10_012840_create_monev_realisasi", 29),
	(127, "2022_03_22_141013_create_spby", 30),
	(129, "2022_03_22_141012_create_kode_trans", 31),
	(130, "2022_03_22_141012_create_kode_transaksi", 31),
	(132, "2020_08_22_095332_create_tindakan", 32),
	(133, "2020_08_22_095734_create_benpen", 33),
	(134, "2022_04_20_141639_create_bridge_pemindah_bukuan", 34),
	(135, "2022_06_17_091248_create_coa", 34),
	(137, "2022_06_28_143806_create_hutang", 35),
	(141, "2022_08_05_145520_create_pemindahbukuan", 37),
	(142, "2022_01_10_012841_create_dokumenlain", 38),
	(143, "2022_09_26_101237_create_pasal4ayat2", 39),
	(144, "2022_09_28_142348_create_kode_transaksi_penerimaan", 40),
	(145, "2022_12_29_085102_create_kelengkapan_pajak", 41),
	(147, "2023_02_14_152337_create_cobacoba", 42),
	(150, "2023_02_13_111943_create_checklist_item_belanja", 43),
	(151, "2022_07_04_095937_create_hutang_manual", 44),
	(152, "2023_03_10_152421_create_hutang_item_belanja", 45),
	(155, "2023_04_11_121038_create_checklist_item_belanja_termin", 46),
	(157, "2023_06_20_094126_create_trans_benpen", 47),
	(158, "2023_08_14_150726_create_uang_muka", 48),
	(161, "2023_09_21_093611_create_uangmuka_item", 49);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table model_has_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table model_has_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, "App\\User", 1),
	(24, "App\\User", 40),
	(3, "App\\User", 45),
	(4, "App\\User", 46),
	(25, "App\\User", 48),
	(25, "App\\User", 49),
	(6, "App\\User", 52),
	(22, "App\\User", 75),
	(25, "App\\User", 356),
	(11, "App\\User", 366),
	(8, "App\\User", 382),
	(25, "App\\User", 391),
	(25, "App\\User", 398),
	(25, "App\\User", 405),
	(26, "App\\User", 410),
	(25, "App\\User", 422),
	(12, "App\\User", 426),
	(23, "App\\User", 468);

/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, "Bendahara Penerimaan - Manage Tindakan", "web", "2020-10-07 06:55:53", "2022-12-27 13:40:37"),
	(2, "Bendahara Penerimaan - Data Penerimaan", "web", "2020-10-07 06:56:26", "2022-12-27 13:34:12"),
	(3, "Bendahara Penerimaan - Laporan", "web", "2020-10-07 06:57:11", "2022-12-27 13:48:48"),
	(4, "Manage All User Plus Role Permission", "web", "2020-10-11 15:04:33", "2020-10-11 15:04:33"),
	(5, "Manage Klaim Jaminan", "web", "2020-10-18 06:40:29", "2020-10-18 06:40:29"),
	(6, "Manage Laporan Klaim Jaminan", "web", "2020-11-04 00:37:04", "2020-11-04 00:37:04"),
	(7, "Manage Data Master Penjamin", "web", "2021-02-14 18:52:20", "2021-02-14 18:52:20"),
	(8, "Manage Data RKAKL V.2", "web", "2021-03-30 14:30:51", "2021-03-30 14:30:51"),
	(9, "Laporan RKAKL V.2", "web", "2021-03-30 14:31:07", "2021-03-30 14:31:07"),
	(10, "Manage Data RKAKL (V.1)", "web", "2021-03-30 14:31:23", "2021-05-07 01:51:54"),
	(11, "Return Data RKAKL V.2", "web", "2021-05-07 01:52:12", "2021-05-07 01:52:12"),
	(12, "Manage Data RKAKL V.3", "web", "2021-09-30 08:54:44", "2021-09-30 08:54:44"),
	(14, "Tagihan/Checklist - Manage Checklist Tagihan", "web", "2022-01-07 13:17:18", "2022-12-28 11:16:45"),
	(16, "Restore Data", "web", "2022-02-15 12:19:19", "2022-02-15 13:13:32"),
	(17, "Bendahara Pengeluaran - Review Tagihan / Checklist", "web", "2022-02-17 08:31:00", "2023-06-08 13:27:37"),
	(18, "Bendahara Pengeluaran - Manage BP Bendahara Pengeluaran", "web", "2022-03-29 16:25:02", "2022-12-27 15:26:03"),
	(19, "Bendahara Penerimaan - Pemindah Bukuan", "web", "2022-04-20 15:15:05", "2022-12-27 13:52:37"),
	(20, "Bendahara Pengeluaran - Persekot", "web", "2022-04-21 16:17:09", "2022-12-27 15:24:05"),
	(21, "Bendahara Pengeluaran - Review Lumpsum", "web", "2022-04-26 16:04:41", "2022-12-27 15:23:45"),
	(22, "Hutang - COA", "web", "2022-06-15 18:15:17", "2022-12-28 14:12:16"),
	(23, "Bendahara Penerimaan - Manage Unit Layanan", "web", "2022-08-04 16:16:44", "2022-12-27 13:40:06"),
	(24, "Manage Hutang - Hutang Manual", "web", "2022-08-10 13:37:39", "2022-08-10 13:37:39"),
	(25, "Bendahara Pengeluaran - Manage Tagihan Tanpa Approval", "web", "2022-08-23 10:03:00", "2022-12-27 15:22:31"),
	(26, "PAJAK - Laporan Pajak", "web", "2022-08-24 14:55:34", "2022-12-28 14:24:29"),
	(27, "Bendahara Penerimaan - Laporan BP", "web", "2022-09-28 13:18:34", "2022-12-27 13:50:45"),
	(28, "Bendahara Pengeluaran - Kelengkapan Berkas Pajak", "web", "2022-10-13 09:59:42", "2023-06-30 10:49:56"),
	(29, "Bendahara Pengeluaran - Kelengkapan Berkas Non LS (Pajak)", "web", "2022-10-13 09:59:53", "2022-12-27 15:25:09"),
	(30, "Bendahara Pengeluaran - Uraian Kegiatan", "web", "2022-11-08 08:21:48", "2022-12-27 15:23:00"),
	(31, "Bendahara Penerimaan - Uraian Kegiatan", "web", "2022-11-09 08:24:14", "2022-12-27 13:31:24"),
	(32, "Bendahara Penerimaan - Data Pengeluaran", "web", "2022-12-27 13:35:09", "2022-12-27 13:35:09"),
	(33, "Anggaran - Sub Level Pagu / RKAKL", "web", "2022-12-27 14:04:05", "2022-12-27 14:06:37"),
	(34, "Anggaran - Data Pagu / RKAKL", "web", "2022-12-27 14:05:41", "2022-12-27 14:06:45"),
	(35, "Anggaran - Laporan Pagu / RKAKL", "web", "2022-12-27 15:18:24", "2022-12-27 15:18:24"),
	(36, "Anggaran - Laporan Semula Menjadi", "web", "2022-12-27 15:19:29", "2022-12-27 15:19:29"),
	(37, "Anggaran - Laporan Monev Evaluasi", "web", "2022-12-27 15:19:38", "2022-12-27 15:19:38"),
	(38, "Anggaran - Laporan Realisasi Belanja", "web", "2022-12-27 15:19:48", "2022-12-27 15:19:48"),
	(39, "Tagihan/Checklist - Rekap Data Tagihan", "web", "2022-12-28 11:17:02", "2022-12-28 11:17:02"),
	(40, "Tagihan/Checklist - Master PPK", "web", "2022-12-28 11:17:30", "2022-12-28 11:17:30"),
	(41, "Tagihan/Checklist - Master Penerima", "web", "2022-12-28 11:17:47", "2022-12-28 11:17:47"),
	(42, "Tagihan/Checklist - Master PPSPM", "web", "2022-12-28 11:17:56", "2022-12-28 11:17:56"),
	(43, "Hutang - Data Hutang", "web", "2022-12-28 14:13:33", "2022-12-28 14:13:33"),
	(44, "Hutang - Rekapitulasi Hutang", "web", "2022-12-28 14:13:45", "2022-12-28 14:13:45"),
	(45, "Hutang - Hutang Manual Perusahaan", "web", "2022-12-28 14:16:13", "2022-12-28 14:16:13"),
	(46, "Hutang - Hutang Manual Penerimaan", "web", "2022-12-28 14:16:21", "2022-12-28 14:16:21"),
	(47, "PAJAK - Rekap PPH 21", "web", "2022-12-28 14:30:10", "2022-12-28 14:30:10"),
	(48, "PAJAK - Rekap PPH 22", "web", "2022-12-28 14:30:19", "2022-12-28 14:30:19"),
	(49, "PAJAK - Rekap PPH 23", "web", "2022-12-28 14:30:29", "2022-12-28 14:30:29"),
	(50, "PAJAK - Rekap PPN", "web", "2022-12-28 14:30:38", "2022-12-28 14:30:38"),
	(51, "PAJAK - Rekap PPH Pasal 4(2)", "web", "2022-12-28 14:30:48", "2022-12-28 14:30:48"),
	(52, "Bendahara Penerimaan - Referensi BP", "web", "2023-01-10 15:42:46", "2023-01-10 15:42:46"),
	(53, "Bendahara Pengeluaran - Referensi BP", "web", "2023-01-11 08:42:10", "2023-01-11 08:42:10"),
	(59, "PPK BLU - Review Tagihan / Checklist", "web", "2023-06-08 13:25:39", "2023-06-08 13:25:39"),
	(60, "PPK RM - Review Tagihan / Checklist", "web", "2023-06-08 13:25:46", "2023-06-08 13:25:46"),
	(61, "PPSPM - Review Tagihan / Checklist", "web", "2023-06-08 13:25:55", "2023-06-08 13:25:55"),
	(62, "Bendahara Penerimaan - Rekap Uraian Pemasukan Berdasarkan tanggal", "web", "2023-06-26 08:59:25", "2023-06-26 08:59:25"),
	(63, "Bendahara Penerimaan - Rekap Uraian Pemasukan Berdasarkan Antar Tanggal", "web", "2023-06-26 08:59:35", "2023-06-26 08:59:35"),
	(64, "Bendahara Penerimaan - Rekap Uraian Pemasukan Berdasarkan Tahun", "web", "2023-06-26 08:59:44", "2023-06-26 08:59:44"),
	(65, "Bendahara Penerimaan - Buku Kas Umum", "web", "2023-06-26 08:59:52", "2023-06-26 08:59:52"),
	(66, "Bendahara Penerimaan - Rekap Penerimaan Berdasarkan Tindakan", "web", "2023-06-26 09:00:01", "2023-06-26 09:00:01"),
	(67, "Bendahara Penerimaan - Uang Muka", "web", "2023-08-15 08:47:35", "2023-08-15 08:47:35"),
	(68, "Bendahara Pengeluaran - Realisasi Tagihan", "web", "2023-09-08 14:52:10", "2023-09-08 14:52:10"),
	(69, "Bendahara Penerimaan - Data Pengembalian", "web", "2023-09-15 09:52:35", "2023-09-15 09:52:35");

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table role_has_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(14, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(21, 1),
	(22, 1),
	(23, 1),
	(24, 1),
	(25, 1),
	(26, 1),
	(27, 1),
	(28, 1),
	(29, 1),
	(30, 1),
	(31, 1),
	(32, 1),
	(33, 1),
	(34, 1),
	(35, 1),
	(36, 1),
	(37, 1),
	(38, 1),
	(39, 1),
	(40, 1),
	(41, 1),
	(42, 1),
	(43, 1),
	(44, 1),
	(45, 1),
	(46, 1),
	(47, 1),
	(48, 1),
	(49, 1),
	(50, 1),
	(51, 1),
	(52, 1),
	(53, 1),
	(59, 1),
	(60, 1),
	(61, 1),
	(62, 1),
	(63, 1),
	(64, 1),
	(65, 1),
	(66, 1),
	(67, 1),
	(68, 1),
	(69, 1),
	(4, 2),
	(1, 3),
	(2, 3),
	(23, 3),
	(27, 3),
	(31, 3),
	(32, 3),
	(52, 3),
	(62, 3),
	(63, 3),
	(64, 3),
	(65, 3),
	(66, 3),
	(67, 3),
	(69, 3),
	(17, 4),
	(18, 4),
	(21, 4),
	(25, 4),
	(28, 4),
	(29, 4),
	(30, 4),
	(37, 4),
	(38, 4),
	(5, 5),
	(6, 5),
	(7, 5),
	(12, 6),
	(33, 6),
	(34, 6),
	(35, 6),
	(36, 6),
	(37, 6),
	(14, 8),
	(24, 8),
	(39, 8),
	(40, 8),
	(41, 8),
	(42, 8),
	(22, 11),
	(24, 11),
	(43, 11),
	(44, 11),
	(45, 11),
	(46, 11),
	(26, 12),
	(28, 12),
	(29, 12),
	(47, 12),
	(48, 12),
	(49, 12),
	(50, 12),
	(51, 12),
	(59, 22),
	(60, 23),
	(61, 24),
	(2, 25),
	(62, 25),
	(67, 25),
	(69, 25),
	(17, 26),
	(68, 26);

/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, "superadmin", "web", "2020-10-07 06:54:51", "2020-10-07 06:54:51"),
	(2, "administrator", "web", "2020-10-07 06:54:56", "2020-10-07 06:54:56"),
	(3, "bendahara_penerimaan", "web", "2020-10-07 06:55:08", "2023-06-08 09:11:42"),
	(4, "bendahara_pengeluaran", "web", "2020-10-07 06:55:17", "2020-10-07 06:55:17"),
	(5, "penjamin", "web", "2020-10-07 06:55:23", "2020-10-07 06:55:23"),
	(6, "anggaran", "web", "2021-03-30 14:29:33", "2021-03-30 14:29:33"),
	(8, "checklist_tagihan", "web", "2022-01-07 13:16:28", "2022-01-07 13:16:28"),
	(10, "pengadaan", "web", "2022-03-11 23:13:09", "2022-03-11 23:13:09"),
	(11, "hutang", "web", "2022-06-15 17:29:31", "2022-06-15 17:29:31"),
	(12, "pajak", "web", "2022-08-24 14:51:34", "2022-08-24 14:51:34"),
	(22, "PPKBLU", "web", "2023-06-08 10:02:58", "2023-06-08 10:05:33"),
	(23, "PPKRM", "web", "2023-06-08 10:03:03", "2023-06-08 10:09:48"),
	(24, "PPSPM", "web", "2023-06-08 10:03:09", "2023-06-08 10:09:56"),
	(25, "Kasir", "web", "2023-06-09 14:16:24", "2023-06-09 14:16:24"),
	(26, "Perbendaharaan", "web", "2023-06-26 14:12:16", "2023-06-26 14:12:16");

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table struktur_organisasi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `struktur_organisasi`;

CREATE TABLE `struktur_organisasi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `head` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `parent` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `child` int DEFAULT NULL,
  `kode` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jabatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `struktur_organisasi` WRITE;
/*!40000 ALTER TABLE `struktur_organisasi` DISABLE KEYS */;

INSERT INTO `struktur_organisasi` (`id`, `head`, `parent`, `child`, `kode`, `jabatan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(14, "1", NULL, 1, "1", "Direktur Utama", "2023-08-09 08:40:43", "2023-08-09 08:40:43", NULL),
	(106, "2", "1", 1, "1.1", "Ketua Dewan Pengawas", "2023-11-03 10:02:31", "2023-11-03 10:02:31", NULL),
	(107, "2", "1", 2, "1.2", "Kepala Satuan Pemeriksa Internal", "2023-11-03 10:02:31", "2023-11-03 10:02:31", NULL),
	(108, "2", "1", 3, "1.3", "Direktur SDM, Pendidikan dan Penelitian", "2023-11-03 10:02:31", "2023-11-03 10:02:31", NULL),
	(109, "2", "1", 4, "1.4", "Direktur Perencanaan, Keuangan dan BMN", "2023-11-03 10:02:31", "2023-11-03 10:02:31", NULL),
	(110, "2", "1", 5, "1.5", "Direktur Medik dan Keperawatan", "2023-11-03 10:02:31", "2023-11-03 10:02:31", NULL),
	(111, "2", "1", 6, "1.6", "Ketua Komite Medik", "2023-11-03 10:02:31", "2023-11-03 10:02:31", NULL),
	(112, "2", "1", 7, "1.7", "Ketua Komite Etik dan Hukum", "2023-11-03 10:02:31", "2023-11-03 10:02:31", NULL),
	(113, "2", "1", 8, "1.8", "Ketua Komite Mutu Rumah Sakit", "2023-11-03 10:02:31", "2023-11-03 10:02:31", NULL),
	(114, "2", "1", 9, "1.9", "Ketua Komite Keperawatan", "2023-11-03 10:02:31", "2023-11-03 10:02:31", NULL),
	(115, "2", "1", 10, "1.10", "Ketua Komite Tenaga Kesehatan Lainnya", "2023-11-03 10:02:31", "2023-11-03 10:02:31", NULL),
	(116, "3", "1.5", 1, "1.5.1", "Manajer Pelayanan Medik", "2023-11-03 10:06:09", "2023-11-03 10:06:09", NULL),
	(117, "3", "1.5", 2, "1.5.2", "Manajer Pelayanan Keperawatan", "2023-11-03 10:06:09", "2023-11-03 10:06:09", NULL),
	(118, "3", "1.5", 3, "1.5.3", "Manajer Pelayanan Penunjang", "2023-11-03 10:06:09", "2023-11-03 10:06:09", NULL),
	(119, "3", "1.5", 4, "1.5.4", "Ketua KSM Psikiatri", "2023-11-03 10:06:09", "2023-11-03 10:06:09", NULL),
	(120, "3", "1.5", 5, "1.5.5", "Ketua KSM Non Psikiatri", "2023-11-03 10:06:10", "2023-11-03 10:06:10", NULL),
	(121, "3", "1.5", 6, "1.5.6", "Ketua KSM Umum", "2023-11-03 10:06:10", "2023-11-03 10:06:10", NULL),
	(122, "3", "1.5", 7, "1.5.7", "Kepala Instalasi Farmasi", "2023-11-03 10:06:10", "2023-11-03 10:06:10", NULL),
	(123, "3", "1.5", 8, "1.5.8", "Kepala Instalasi Rawat Inap Psikiatri Dewasa", "2023-11-03 10:06:10", "2023-11-03 10:06:10", NULL),
	(124, "3", "1.5", 9, "1.5.9", "Kepala Instalasi Laboratorium", "2023-11-03 10:06:10", "2023-11-03 10:06:10", NULL),
	(125, "3", "1.5", 10, "1.5.10", "Kepala Instalasi Gizi", "2023-11-03 10:06:10", "2023-11-03 10:06:10", NULL),
	(126, "3", "1.5", 11, "1.5.11", "Kepala Instalasi Psikogeriatri", "2023-11-03 10:06:10", "2023-11-03 10:06:10", NULL),
	(127, "3", "1.5", 12, "1.5.12", "Kepala Instalasi Rehabilitasi", "2023-11-03 10:06:10", "2023-11-03 10:06:10", NULL),
	(128, "3", "1.5", 13, "1.5.13", "Kepala Instalasi Rawat Jalan Psikiatri Dewasa", "2023-11-03 10:06:10", "2023-11-03 10:06:10", NULL),
	(129, "3", "1.5", 14, "1.5.14", "Kepala Instalasi Gawat Darurat", "2023-11-03 10:06:10", "2023-11-03 10:06:10", NULL),
	(130, "3", "1.5", 15, "1.5.15", "Kepala Instalasi Radiologi", "2023-11-03 10:06:10", "2023-11-03 10:06:10", NULL),
	(131, "3", "1.5", 16, "1.5.16", "Kepala Instalasi Psikiatri Anak dan Remaja", "2023-11-03 10:06:10", "2023-11-03 10:06:10", NULL),
	(132, "3", "1.5", 17, "1.5.17", "Kepala Instalasi Elektromedik", "2023-11-03 10:06:10", "2023-11-03 10:06:10", NULL),
	(133, "3", "1.5", 18, "1.5.18", "Kepala Instalasi Bedah Sentral", "2023-11-03 10:06:10", "2023-11-03 10:06:10", NULL),
	(134, "4", "1.5.1", 1, "1.5.1.1", "Asisten Manajer Pelayanan Medik", "2023-11-03 10:07:09", "2023-11-03 10:07:09", NULL),
	(135, "4", "1.5.2", 1, "1.5.2.1", "Asisten Manajer Pelayanan Keperawatan", "2023-11-03 10:07:26", "2023-11-03 10:07:26", NULL),
	(136, "4", "1.5.3", 1, "1.5.3.1", "Asisten Manajer Pelayanan Penunjang", "2023-11-03 10:08:08", "2023-11-03 10:08:08", NULL),
	(137, "3", "1.3", 1, "1.3.1", "Manajer Organisasi dan SDM", "2023-11-03 10:08:44", "2023-11-03 10:08:44", NULL),
	(138, "3", "1.3", 2, "1.3.2", "Manajer Pendidikan dan Pelatihan", "2023-11-03 10:08:44", "2023-11-03 10:08:44", NULL),
	(139, "3", "1.3", 3, "1.3.3", "Kepala Instalasi Pendidikan dan Penelitian", "2023-11-03 10:08:44", "2023-11-03 10:08:44", NULL),
	(140, "4", "1.3.1", 1, "1.3.1.1", "Asisten Manajer Organisasi SDM", "2023-11-03 10:09:03", "2023-11-03 10:09:03", NULL),
	(141, "4", "1.3.2", 1, "1.3.2.1", "Asisten Manajer Pendidikan dan Pelatihan", "2023-11-03 10:09:17", "2023-11-03 10:09:17", NULL),
	(142, "3", "1.4", 1, "1.4.1", "Kepala Unit Layanan Pengadaan", "2023-11-03 10:13:30", "2023-11-03 10:13:30", NULL),
	(143, "3", "1.4", 2, "1.4.2", "Manajer Perencanaan Program, Anggaran dan Evaluasi", "2023-11-03 10:13:31", "2023-11-03 10:13:31", NULL),
	(144, "3", "1.4", 3, "1.4.3", "Manajer Pelaksanaan Keuangan", "2023-11-03 10:13:31", "2023-11-03 10:13:31", NULL),
	(145, "3", "1.4", 4, "1.4.4", "Manajer Akuntansi dan BMN", "2023-11-03 10:13:31", "2023-11-03 10:13:31", NULL),
	(146, "3", "1.4", 5, "1.4.5", "Manajer Hukum dan Hubungan Masyarakat", "2023-11-03 10:13:31", "2023-11-03 10:13:31", NULL),
	(147, "3", "1.4", 6, "1.4.6", "Manajer Tata Usaha dan Rumah Tangga", "2023-11-03 10:13:31", "2023-11-03 10:13:31", NULL),
	(148, "3", "1.4", 7, "1.4.7", "Kepala Instalasi Rekam Medik", "2023-11-03 10:13:31", "2023-11-03 10:13:31", NULL),
	(149, "3", "1.4", 8, "1.4.8", "Kepala Instalasi Kesehatan Lingkungan dan K3RS", "2023-11-03 10:13:31", "2023-11-03 10:13:31", NULL),
	(150, "3", "1.4", 9, "1.4.9", "Kepala Instalasi Verifikasi dan Penjamin Pasien", "2023-11-03 10:13:31", "2023-11-03 10:13:31", NULL),
	(151, "3", "1.4", 10, "1.4.10", "Kepala Instalasi Keswamas dan PKRS", "2023-11-03 10:13:31", "2023-11-03 10:13:31", NULL),
	(152, "3", "1.4", 12, "1.4.12", "Kepala Instalasi Sistem Informasi Manajemen Rumah Sakit", "2023-11-03 10:13:31", "2023-11-03 10:13:31", NULL),
	(153, "3", "1.4", 13, "1.4.13", "Kepala Instalasi Pemeliharaan Sarana dan Prasarana RS", "2023-11-03 10:13:31", "2023-11-03 10:13:31", NULL),
	(154, "3", "1.4", 14, "1.4.14", "Kepala Instalasi Sentralisasi Sentral dan Binatu", "2023-11-03 10:13:31", "2023-11-03 10:13:31", NULL),
	(155, "4", "1.4.2", 1, "1.4.2.1", "Asisten Manajer Perencanaan Program, Anggaran dan Evaluasi", "2023-11-03 10:21:37", "2023-11-03 10:21:37", NULL),
	(156, "4", "1.4.3", 1, "1.4.3.1", "Asisten Manajer Pelaksanaan Keuangan", "2023-11-03 10:21:56", "2023-11-03 10:21:56", NULL),
	(157, "4", "1.4.4", 1, "1.4.4.1", "Asisten Manajer Akuntansi dan BMN", "2023-11-03 10:22:16", "2023-11-03 10:22:16", NULL),
	(158, "4", "1.4.5", 1, "1.4.5.1", "Asisten Manajer Hukum dan Hubungan Masyarakat", "2023-11-03 10:22:35", "2023-11-03 10:22:35", NULL),
	(159, "4", "1.4.6", 1, "1.4.6.1", "Asisten Manajer Usaha dan Rumah Tangga", "2023-11-03 10:22:52", "2023-11-03 10:22:52", NULL),
	(160, "3", "1.9", 1, "1.9.1", "testing", "2023-11-03 10:37:04", "2023-11-03 10:37:30", "2023-11-03 10:37:30"),
	(161, "2", "1", 11, "1.11", "testing", "2023-11-13 11:21:10", "2023-11-13 11:21:15", "2023-11-13 11:21:15");

/*!40000 ALTER TABLE `struktur_organisasi` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table user_has_strukturorganisasi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_has_strukturorganisasi`;

CREATE TABLE `user_has_strukturorganisasi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) DEFAULT NULL,
  `strukturorganisasi_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;





# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status_user` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=469 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `status_user`, `nip`, `name`, `username`, `password`, `email`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, NULL, "", "Fauzi", "superadmin", "$2y$10$e8PuXPffEriV4QXOy6caiO4Fs6MJQoj8EWQ/7un6x4rFjCdNQLZMq", NULL, NULL, NULL, NULL, NULL),
	(2, "PNS", "197009072001122001", "dr. DESMIARTI, Sp.KJ, MARS", "197009072001122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(3, "PNS", "197309282005012001", "dr. GALIANTI PRIHANDAYANI, Sp.KJ, MARS", "197309282005012001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(4, "PNS", "197112231997031002", "EKO HEPPY PURWANTO, SKM, MM, MARS", "197112231997031002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(5, "PNS", "196607121987032001", "Ns. ILAWATI, S.Kep", "196607121987032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(6, "PNS", "198509142015031001", "HENDRO PRASETIYO, Amd", "198509142015031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(7, "PNS", "196709181991031003", "SUNARTO", "196709181991031003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(8, "PNS", "198005162005011005", "Ns. BAMBANG SUMARDI, S.Kep,M.Kep, Sp.Kep.J", "198005162005011005", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(9, "PNS", "196703041992031002", "IMAM PURWADI, S.Pd", "196703041992031002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(10, "PNS", "198205202006041009", "TRI PRASETYO, Amd", "198205202006041009", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(11, "PNS", "196508121987031008", "DEDI SUTISNA", "196508121987031008", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(12, "PNS", "198302172010122002", "WIWIK KURNIATI, S.Kom", "198302172010122002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(13, "PNS", "197110111992031004", "SUHUR, SH, MH", "197110111992031004", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(14, "PNS", "197912232006041014", "CHRISTIAN HUTAPEA, SH", "197912232006041014", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(15, "PNS", "196801021988032001", "DORTEA LEWEN, Ners., M.Kes., MH", "196801021988032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(16, "PNS", "197704272008121001", "JAKPAR RANGKUTI", "197704272008121001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(17, "PNS", "196908192007101001", "BAMBANG HENDARTO", "196908192007101001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(18, "PNS", "197510092005012001", "Ns. DIAH SUKAESTI, S.Kep,M.Kep, Sp.Kep.J", "197510092005012001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(19, "PNS", "197306161998031001", "CHANDRA BENYAL, S.Sos", "197306161998031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(20, "PNS", "196510061992021001", "SATIAWAN PUTRA SARAGIH, S.Sos", "196510061992021001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(21, "PNS", "196811051994032001", "SITI SAPUR", "196811051994032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(22, "PNS", "197405222006041009", "WISNOE AKBAR KERTAPATI, SE", "197405222006041009", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(23, "PNS", "196510091990031003", "EKO SUPRAPTO", "196510091990031003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(24, "PNS", "196608011992031001", "RAKIM", "196608011992031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(25, "PNS", "196603031992031004", "AMBAR", "196603031992031004", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(26, "PNS", "197009012007011033", "MAMAN SULAEMAN", "197009012007011033", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(27, "PNS", "197407212008121002", "MULYADI", "197407212008121002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(28, "PNS", "197605312006042001", "Ns. NENG ESTI WINAHAYU, Sp.Kep.J. M.Kep", "197605312006042001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(29, "PNS", "197705012008121001", "MUHAMAD RIDWAN", "197705012008121001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(30, "PNS", "196712121998031002", "KHAMZAH, S.ST", "196712121998031002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(31, "PNS", "196609302007011028", "NGADIMAN", "196609302007011028", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(32, "PNS", "197903302006042006", "dr. RENY ROSNITA BAASALEM, M.K.K", "197903302006042006", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(33, "PNS", "197204211997031005", "RUDI PRIHANTANA, Amd", "197204211997031005", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(34, "PNS", "198712142010122004", "DWI ASTUTI, Amd.KL", "198712142010122004", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(35, "PNS", "198304202010121002", "ICHSANI, Amd.KL", "198304202010121002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(36, "PNS", "199612252023211004", "WISDA FAHMI SAPUTRA", "199612252023211004", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(37, "PNS", "197103231996032001", "ERIKA BAKKARA, SKM", "197103231996032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(38, "PNS", "196507302007011012", "DIDI ROSADI", "196507302007011012", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(39, "PNS", "196609272007011019", "EDDY SURYANA", "196609272007011019", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(40, "PNS", "196312241987031001", "HARRIS FADILLAH, SE, MM", "196312241987031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(41, "PNS", "197803282005011002", "PETRUS DARIA KONDOALLO, SE., M.Ak", "197803282005011002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(42, "PNS", "197512132005012002", "TAMIANNA SINAGA, SE, M.Ak", "197512132005012002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(43, "PNS", "199309022022032003", "ANIS SEPTYANI PUTRI", "199309022022032003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(44, "PNS", "198204072006042022", "APRILIANI INDAH TAMHER, SE", "198204072006042022", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(45, "PNS", "197304161992032001", "APRIL SANTY, SE", "197304161992032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(46, "PNS", "198507242014021001", "ROMMEL PAKPAHAN, Amd", "198507242014021001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(47, "PNS", "198003132008012016", "DEWI ISABELLA PARMONO, SE", "198003132008012016", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(48, "PNS", "196905081993032001", "SUTJITAWATI", "196905081993032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(49, "PNS", "196810122007011031", "KADIR SOLAIMAN, SE", "196810122007011031", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(50, "PNS", "197207022008121002", "MOHAMMAD ZAENUDIN", "197207022008121002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(51, "PNS", "196510101993031006", "SUPARDI, SE", "196510101993031006", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(52, "PNS", "198510112014022001", "DWI BUDI ASTUTI, Amd", "198510112014022001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(53, "PNS", "197106071996022001", "SUSI FATIMAH, SKM, M.Kes", "197106071996022001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(54, "PNS", "198001112007012018", "SILVI TRIANA, SKM", "198001112007012018", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(55, "PNS", "197211132005012002", "SUWALGIYAH, S.Kep, Ners ", "197211132005012002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(56, "PNS", "196508061999031001", "ARYA YUDHA PUTRA, S.Psi", "196508061999031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(57, "PNS", "198612032015031001", "WAHYU NUGRAHA NUR ARIFFIANTO, Amd", "198612032015031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(58, "PNS", "197207272008121002", "MOH ARIF SALAMPESSY", "197207272008121002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(59, "PNS", "198501242014121001", "drg. IWAN SETIADI", "198501242014121001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(60, "PNS", "197810092010121001", "SULAIMAN, Amd", "197810092010121001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(61, "PNS", "198201132010121003", "TEDHY GARDO YUDHO, Amd", "198201132010121003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(62, "PNS", "199309212022031001", "NURHIDAYATULOH", "199309212022031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(63, "PNS", "199506062022031002", "MUHAMMAD WARDHIANSYAH", "199506062022031002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(64, "PNS", "197102262008011007", "dr. AGUNG FRIJANTO, Sp.KJ, MH", "197102262008011007", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(65, "PNS", "197503092009122003", "dr. AYESHA DEVINA, Sp.KJ", "197503092009122003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(66, "PNS", "196503231993032002", "Ns. SALAMIYAH, S.Kep, M.Si", "196503231993032002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(67, "PNS", "197011292005012003", "dr. I GUSTI AYU DIAH TUNTIAN, M.K.K", "197011292005012003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(68, "PNS", "197105021999031002", "CECE KURNAWAN, SE", "197105021999031002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(69, "PNS", "197702252008012011", "ROSDIYANA ARYATI SYAM, AMG", "197702252008012011", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(70, "PNS", "198007022010121002", "YUDI RACHMAN, AMK", "198007022010121002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(71, "PNS", "196610041987032002", "NANI RUKMANAH, S.Kep, Ners, M.Kes ", "196610041987032002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(72, "PNS", "196506221991032004", "WAHYU RAHAYUNI, SH", "196506221991032004", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(73, "PNS", "197410311999032001", "SONDANG MAWATI INDRIANA BUTAR - BUTAR, S.ST, M.Kes", "197410311999032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(74, "PNS", "196911162002122001", "dr. PARULIAN SANDY NOVERIA, MKK", "196911162002122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(75, "PNS", "197906092008012019", "dr. YUNE LAUKATI", "197906092008012019", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(76, "PNS", "197802232002122002", "LAILI MAHMUDAH, S.Kp", "197802232002122002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(77, "PNS", "198602102008012001", "DIAH FATMAWATI, AM.Keb", "198602102008012001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(78, "PNS", "198202282012122001", "dr. MARISSA FEBIYANI SETIONO", "198202282012122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(79, "PNS", "198312302014022001", "UMBAR KUATININGSIH, Amd", "198312302014022001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(80, "PNS", "196607121989032001", "CAROLINA, S.Kep, Ners, M.Kep", "196607121989032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(81, "PNS", "198108272008012011", "dr. FRISKA AGNOVITA", "198108272008012011", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(82, "PNS", "198309062006042003", "DIAH ASRINA PUTRI, SKM", "198309062006042003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(83, "PNS", "198211172010122002", "ENDAH TRI LESTARI, M.Psi, Psikolog", "198211172010122002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(84, "PNS", "197301231997032001", "MUHAJIRAH ANNISAI, M.Psi.Psikolog", "197301231997032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(85, "PNS", "198102172009122001", "HERNITA WIJAYARATNA, M.Psi, Psikolog", "198102172009122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(86, "PNS", "196606181994031003", "UJANG ASEP MAWARDI", "196606181994031003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(87, "PNS", "199406192022032001", "SILVIANI", "199406192022032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(88, "PNS", "198412162018012001", "dr. ANANDITYA SUKMA DEWI UTAMI, Sp.KJ", "198412162018012001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(89, "PNS", "198106072008122001", "Ns. JUNITA LASMA, S.Kep", "198106072008122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(90, "PNS", "196606121989031002", "SOFYAN, AMK ", "196606121989031002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(91, "PNS", "196511201988031001", "PARDOMUAN SIMANJUNTAK", "196511201988031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(92, "PNS", "197307041998032002", "ROLENTA SIDABUTAR, S.Ft", "197307041998032002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(93, "PNS", "198508032010121003", "DWI BIMANTORO, Amd.OT", "198508032010121003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(94, "PNS", "198511072018011001", "MUHAMMAD BAYU SATRIA, AMK", "198511072018011001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(95, "PNS", "198510102009121001", "LUKITO LUHUR WASKITO, AKFIS", "198510102009121001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(96, "PNS", "199205042020121005", "AZRUL ARDIANSYAH, SST", "199205042020121005", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(97, "PNS", "199801182022032001", "DYAH NUR KHASANAH", "199801182022032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(98, "PNS", "196901261993032001", "TRI SUSILOWATI", "196901261993032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(99, "PNS", "196812291995031001", "CHERUDIN, S.Psi", "196812291995031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(100, "PNS", "196610052002121004", "dr. H. MUH DANIAL UMAR, Sp.KJ., M.Kes", "196610052002121004", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(101, "PNS", "197707062006042001", "ENDAH SUDARWATI, SKM", "197707062006042001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(102, "PNS", "196609011991032003", "ROSWITA ERNAWATI SITOMPUL, SKM", "196609011991032003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(103, "PNS", "197710282005011002", "JOSUA OTTO LAMORA PASARIBU, SKM", "197710282005011002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(104, "PNS", "197512202002121003", "AGUS PRIYANTO, SKM", "197512202002121003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(105, "PNS", "197207271991031001", "HERI YULIANTO MUNAHADI, SE,MM", "197207271991031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(106, "PNS", "196704251999032003", "Dr. dr. SUZY YUSNA DEWI, Sp.KJ (K)., MARS", "196704251999032003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(107, "PNS", "197402022014122001", "dr. ENY FEBRIANI, Sp.A", "197402022014122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(108, "PNS", "197508251999032001", "Ns. DYAH AGUS TRIWIDYANSARI, S.Kep", "197508251999032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(109, "PNS", "198206042008012018", "Ns. ROFIAH, S.Kep", "198206042008012018", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(110, "PNS", "196509181987032001", "NITARINI SUPRIATIN, S.Kep", "196509181987032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(111, "PNS", "198206062006042033", "BANI SABANIAH, AMK", "198206062006042033", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(112, "PNS", "197711152006042010", "SUSILAWATI, AMK", "197711152006042010", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(113, "PNS", "197812232001122001", "Ns. JUNI DARMAWANTI, S.Kep", "197812232001122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(114, "PNS", "198111102006041014", "MOHAMAD ANDI, S.Kep", "198111102006041014", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(115, "PNS", "197506152009121001", "RUDIYANTO, S.FT", "197506152009121001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(116, "PNS", "196903291990032001", "ROSIANA", "196903291990032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(117, "PNS", "197811242010122001", "LILIES SYACHDIANTIE, AKFIS", "197811242010122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(118, "PNS", "197901102010122001", "RIRIN CHAERUL JANAH, Amd.OT", "197901102010122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(119, "PNS", "198008062014022001", "SUSI AGUSTIN, Amd.OT", "198008062014022001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(120, "PNS", "199111182015032002", "NOVI LISTIANI, Amd.OT", "199111182015032002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(121, "PNS", "198706182010122005", "YUNI ANDREASIH, Amd.TW", "198706182010122005", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(122, "PNS", "199104072020122004", "VIVI RAHMADHANI", "199104072020122004", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(123, "PNS", "199701192020122005", "TITIS HARDIAN WIJAYA", "199701192020122005", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(124, "PNS", "196709291987032001", "JATY SUPRIJATI, S.Kep, Ners ", "196709291987032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(125, "PNS", "196605231992031002", "MAIZAR ", "196605231992031002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(126, "PNS", "197012192005012009", "dr. ISMOYOWATI PUTRI UTAMI, Sp.KJ", "197012192005012009", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(127, "PNS", "198104052008012017", "YULINDA, S.Kep, Ners", "198104052008012017", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(128, "PNS", "196502041989032002", "DEDE ROSTINI, S.Kep", "196502041989032002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(129, "PNS", "198302022012122001", "ANDRIANI, AMK", "198302022012122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(130, "PNS", "198504242008011002", "ABDUL LATIEF, AMK", "198504242008011002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(131, "PNS", "198808082009122001", "PUTRI KUSUMAWATI, AMK", "198808082009122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(132, "PNS", "196412061993032003", "drg. HUGANDINI", "196412061993032003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(133, "PNS", "198203012006042002", "PUJI ASTUTI, AMKG", "198203012006042002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(134, "PNS", "199206072014022002", "ARYSNA ANGGERRINI SUNARIYO, AMKG", "199206072014022002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(135, "PNS", "198311242019021001", "dr. WIBOWO PANDAPOTAN SARAGIH", "198311242019021001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(136, "PNS", "197711082000032001", "Ns. LOLY HERAWATI, S.Kep", "197711082000032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(137, "PNS", "197611092010121001", "HARTANTO, AMK", "197611092010121001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(138, "PNS", "199111292014022001", "WENDY ATIKA WIJAYANTI, AMK", "199111292014022001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(139, "PNS", "198812012012122002", "DEWI SUSANTI, AMK", "198812012012122002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(140, "PNS", "197910152012122002", "Rahmawati, AMK", "197910152012122002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(141, "PNS", "199112152018012001", "ADE PUTRI PRANOWO, AMK", "199112152018012001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(142, "PNS", "198707122009122001", "Ns. EVI KURNIAWATI, S.Kep", "198707122009122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(143, "PNS", "199003182022032004", "CYERILIA VITAENDAHASTIWI", "199003182022032004", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(144, "PNS", "198705282008122003", "INES TESIAWATY RANUM, AMK", "198705282008122003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(145, "PNS", "198001302014021001", "KUSWANTO, AMK", "198001302014021001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(146, "PNS", "199104152015031001", "FAIZIN, AMK", "199104152015031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(147, "PNS", "197707062008121002", "SOPRI, AMK", "197707062008121002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(148, "PNS", "198801222014021002", "ANDRE WIDYAWAN ERLANGGA, AMK", "198801222014021002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(149, "PNS", "197710282008121001", "ZAKARIA ACHMAD, S.Kep., Ners", "197710282008121001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(150, "PNS", "198101242008121001", "Ns. WAHYUDIN, S.Kep", "198101242008121001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(151, "PNS", "198312042010122001", "SUSMIYATI, AMK", "198312042010122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(152, "PNS", "198604012009121003", "GIAN ARIESANDI, AMK", "198604012009121003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(153, "PNS", "198010282006042015", "RINA DAMAYANTI LUMBANTORUAN, AMK", "198010282006042015", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(154, "PNS", "198301092018011001", "ASEP AZIZ SIDIK, AMK", "198301092018011001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(155, "PNS", "199111192014022001", "SITI RETNO WULANDARI, AMK", "199111192014022001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(156, "PNS", "198205062008122003", "dr. NURADDIYANI HIDAYAH, Sp.P.K", "198205062008122003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(157, "PNS", "197203071997032001", "SRI SUHARJATI, S.ST", "197203071997032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(158, "PNS", "198403192006042001", "PURNAMASARI FAZAILA, AMd", "198403192006042001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(159, "PNS", "199204142015032001", "ALFINA AMARINI, AMd", "199204142015032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(160, "PNS", "199208062015032001", "FANNY NOVITA SARI, AMd", "199208062015032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(161, "PNS", "199111272014022001", "IKA NURYANTI, AMd", "199111272014022001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(162, "PNS", "199305282018011001", "KELLIK FAHRIYANTO, AMd", "199305282018011001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(163, "PNS", "199607052022031002", "MUHAMMAD GALIH NUGROHO", "199607052022031002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(164, "PNS", "199602152022032005", "ADISA NINDI AYU PURWASIH", "199602152022032005", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(165, "PNS", "199403092022031001", "RIZKY AMBAR TRIHUTOMO", "199403092022031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(166, "PNS", "199906012022032001", "ANISA TRI HANDAYANI", "199906012022032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(167, "PNS", "197811022005012005", "INDAH NOVIANA, S.Si.T", "197811022005012005", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(168, "PNS", "198311152009122001", "DWIARTI TUNGGA DEWI, S.Gz", "198311152009122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(169, "PNS", "196807081991032001", "SUHARTI", "196807081991032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(170, "PNS", "197106171998032001", "KHUSNUL KHOTIMAH, AMG", "197106171998032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(171, "PNS", "197604062005012002", "KUSNANI PRIHARDIATI, AMG", "197604062005012002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(172, "PNS", "197102232008121001", "RACHWAN EFFENDI", "197102232008121001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(173, "PNS", "196802072007011031", "NUR YAMAN", "196802072007011031", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(174, "PNS", "197210141997032001", "MARICE TAMPUBOLON, S.ST", "197210141997032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(175, "PNS", "197509231994021001", "MUHAMAD BUDIMAN, Amd,Rad", "197509231994021001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(176, "PNS", "197702181999032002", "JUHRIAH, S.ST", "197702181999032002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(177, "PNS", "199211082015032001", "DIANI NOVIYANTI, Amd.Rad", "199211082015032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(178, "PNS", "199305132022032002", "ATIK MULYANAH", "199305132022032002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(179, "PNS", "199306242022031001", "LALU IRFANI JUNIARTA", "199306242022031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(180, "PNS", "197811282009122001", "dr. EKA CANDRA SASMITA PUTRI, Sp.S", "197811282009122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(181, "PNS", "198812172018011001", "Ns. NISWANTO, S.Kep", "198812172018011001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(182, "PNS", "196401201991032003", "ROSMALEM, S.Kep", "196401201991032003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(183, "PNS", "197310151995031002", "Ns. BACHTIAR SIAHAAN, S.Kep", "197310151995031002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(184, "PNS", "199002222018011001", "MIFTACHUL MUJAHID, AMK", "199002222018011001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(185, "PNS", "197805172005012006", "USTITA HANUM DELIAN, S.ST", "197805172005012006", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(186, "PNS", "197710012005012002", "IKA DAMAYANTI, S.ST", "197710012005012002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(187, "PNS", "199201152018011001", "AGUNG WAHYUDI,Amd", "199201152018011001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(188, "PNS", "196911031992032001", "RUSTI WINARNI, S.Si.Apt", "196911031992032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(189, "PNS", "196307151989032002", "Dra. SURIYATI HUTAURUK, S.Si.Apt", "196307151989032002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(190, "PNS", "197112061997032002", "THIN MARDIAH, S.Si.Apt", "197112061997032002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(191, "PNS", "196808251997032001", "AWALATUNI, Amd.Farm", "196808251997032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(192, "PNS", "197601281999032001", "ELIBUN NATIO SAGALA, Amd.Far", "197601281999032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(193, "PNS", "198301072014022001", "YUSNITA, S.Si.Apt  ", "198301072014022001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(194, "PNS", "199204292018012001", "FREYDA MONICA SIMBOLON, S.Si.Apt", "199204292018012001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(195, "PNS", "198710182008121001", "AGUNG NUGROHO EDDY SULISTYO, S.Farm, Apt", "198710182008121001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(196, "PNS", "197611132010122001", "RHINE R. NORITA SITINJAK, Amd.Far", "197611132010122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(197, "PNS", "198808162010122001", "DEVI AGUSTIYANI, Amd.Far", "198808162010122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(198, "PNS", "198510262009121001", "WAHYU BUDI PRASTIO, Amd.Far", "198510262009121001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(199, "PNS", "199210012014022001", "OKTAVIA ANGGRAINY, Amd.Far", "199210012014022001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(200, "PNS", "199207182014022001", "ANNISA JULITA SARI, Amd.Far", "199207182014022001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(201, "PNS", "199006302015032001", "DIAH EKOWATI UTAMI, Amd.Far", "199006302015032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(202, "PNS", "196803132007011049", "SUTIRWAN", "196803132007011049", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(203, "PNS", "199505212018012001", "HERWIDHIYA AZIZAH, Amd.Far", "199505212018012001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(204, "PNS", "199309082020122015", "SARTIKA HUTAGAOL, Amd.Farm", "199309082020122015", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(205, "PNS", "198910142022032001", "Apt WIWIN LIDYA, S.Farm", "198910142022032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(206, "PNS", "199402022022032002", "ARDINI ROBIYANTI", "199402022022032002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(207, "PNS", "199503292022032001", "VIRDA THERESA SITORUS", "199503292022032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(208, "PNS", "198407252010122002", "IFAH MUZDALIFAH, Amd", "198407252010122002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(209, "PNS", "196710061991032002", "SAMIYATI", "196710061991032002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(210, "PNS", "197303261994031001", "ISNEN MARJUKI", "197303261994031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(211, "PNS", "198103012010122002", "PIPIT LINDASARI, S.ST", "198103012010122002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(212, "PNS", "198312222010121002", "DEDDY ABDUL HADI, Amd", "198312222010121002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(213, "PNS", "198505022010121004", "ROBI ANDIKA, Amd", "198505022010121004", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(214, "PNS", "199209072014022001", "SHUCI UTARI NURMAULIDA, Amd", "199209072014022001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(215, "PNS", "198401012015032001", "YUNINGSIH, Amd", "198401012015032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(216, "PNS", "199207202015032001", "RISHA WULANSARI, Amd", "199207202015032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(217, "PNS", "199206102018012001", "NURUL ARFIANTI, Amd", "199206102018012001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(218, "PNS", "199802012020121002", "FITRA ANGGA PRATAMA", "199802012020121002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(219, "PNS", "199708182020122004", "METI ANNISA", "199708182020122004", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(220, "PNS", "199104092020122003", "APRILIA INDRA CAHYA", "199104092020122003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(221, "PNS", "196507122000031001", "dr. ASRUL MUHADI, Sp.B", "196507122000031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(222, "PNS", "196506012008012008", "dr. SAFYUNI NASWATI SAHUPALA, Sp.KJ", "196506012008012008", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(223, "PNS", "197201132002121002", "dr. ADHI WIBOWO N, SpKJ, MPH", "197201132002121002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(224, "PNS", "19750726200604107", "dr. BUDI YUWONO, Sp.PD", "19750726200604107", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(225, "PNS", "198205052014121002", "dr. WILLY STEVEN, SpKJ", "198205052014121002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(226, "PNS", "198202202014122006", "dr. ARUNDHANTI NUGRAHANING AJI, SpKJ", "198202202014122006", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(227, "PNS", "197309152014122001", "dr. SAVITRI WULANDARI, SpKJ", "197309152014122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(228, "PNS", "196704212014121002", "dr. SALIKUR KARTONO, M.Biomed., Sp.KJ", "196704212014121002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(229, "PNS", "197207212002122007", "dr. NURINDAH KADIR, Sp.KJ", "197207212002122007", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(230, "PNS", "197512052009121002", "dr. ISA MULTAZAM NOOR, Sp.KJ (K)", "197512052009121002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(231, "PNS", "198504302012121002", "dr. HANDRY CARLOS GUNAWAN", "198504302012121002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(232, "PNS", "199107202018011001", "dr. ADIBA KARLEN", "199107202018011001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(233, "PNS", "199101162019032008", "dr. VICKY VICTORINE PERSIA WARDENAAR", "199101162019032008", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(234, "PNS", "199603112022031003", "dr. GIVARY DYMAR LAZUARDI", "199603112022031003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(235, "PNS", "199302032022032004", "dr. TRY FEBRIANI SIREGAR", "199302032022032004", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(236, "PNS", "196602131989032002", "Ns. SORITA BR SURBAKTI, S.Kep", "196602131989032002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(237, "PNS", "196710201988032001", "Ns. LILIS ISTRIANI, S.Kep", "196710201988032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(238, "PNS", "196811201990032003", "Ns. NURITA TUMANGGER, S.Kep", "196811201990032003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(239, "PNS", "197607172000032002", "TRI YULI HERAWATI, S.Kep, Ners", "197607172000032002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(240, "PNS", "198307192005012001", "SHINTA DEWI, AMK", "198307192005012001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(241, "PNS", "197912192009121002", "SUPRIYADI, AMK", "197912192009121002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(242, "PNS", "199210142019022001", "OKTI HANALUTFI KHAIRIYAH, S.Kep, Ners", "199210142019022001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(243, "PNS", "198310182008012007", "INA RUFIANA, AMK", "198310182008012007", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(244, "PNS", "198712222008121001", "Ns. INDRA MAULANA SANI, S.Kep", "198712222008121001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(245, "PNS", "198306302008011011", "AGUNG LAKSONO, AMK", "198306302008011011", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(246, "PNS", "197903282005012002", "REHULINA Br SEMBIRING, AMK", "197903282005012002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(247, "PNS", "198010282006042015", "RETNO PAWISTIYATUN, AMK", "198010282006042015", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(248, "PNS", "197904052002122002", "DIAN SETIAWANING ENDARTI, AMK", "197904052002122002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(249, "PNS", "197405122000032001", "SUHARTINI, AMK", "197405122000032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(250, "PNS", "198310232008012008", "RAHMI RAHARDIANSARI, AMK", "198310232008012008", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(251, "PNS", "198004272006042012", "APRIANA NONA LINGGU, S.Kep", "198004272006042012", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(252, "PNS", "198110242006041007", "Ns. DARMOKO, S.Kep", "198110242006041007", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(253, "PNS", "198310162012122001", "IIN THERAWATI NUGRAHENI, AMK", "198310162012122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(254, "PNS", "199510202018012001", "VERA EVI ANTARA, AMK", "199510202018012001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(255, "PNS", "198507222009122002", "Ns. SRI SURYANTI, S.Kep", "198507222009122002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(256, "PNS", "196610091987032001", "Ns. DEDEH NUROR BANI ADRIAN, S.Kep", "196610091987032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(257, "PNS", "199708142022031001", "ALDILA PANDU KARTIKO", "199708142022031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(258, "PNS", "199204282022031001", "CHANDRA PRIAN PRATAMA", "199204282022031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(259, "PNS", "197507012005012002", "JUJU, AMK", "197507012005012002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(260, "PNS", "198011132005012004", "Ns. NUNI NURAFNI, S.Kep", "198011132005012004", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(261, "PNS", "199212192019022002", "Ns. GADIS MADADETA SM, S.Kep", "199212192019022002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(262, "PNS", "198804262020122006", "GITA KERINA TARIGAN,S.Kep., Ns", "198804262020122006", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(263, "PNS", "198001282006042001", "Ns. MOLIDDIA PRIHATINNIA SUSKA, S.Kep", "198001282006042001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(264, "PNS", "197801152002122004", "LINDAMORA RITONGA, AMK", "197801152002122004", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(265, "PNS", "198401282010122002", "INDRIANI ENDAH MITASARI, AMK", "198401282010122002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(266, "PNS", "199301272022032003", "GANDA NUR PATMA SUPROBO", "199301272022032003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(267, "PNS", "198801082022031001", "SITI ZULAEHA", "198801082022031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(268, "PNS", "199703072022032004", "RETNO PUJIANA", "199703072022032004", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(269, "PNS", "197001021997031003", "SURANTO, S.Kep", "197001021997031003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(270, "PNS", "196811221990032001", "Ns. ERNI NURHAYATI, S.Kep", "196811221990032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(271, "PNS", "197710172006042002", "Ns. ADRIANA LUBIS, S.Kep", "197710172006042002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(272, "PNS", "196807181989032002", "Ns. T. LUKERTINA TAMBUNAN, S.Kep", "196807181989032002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(273, "PNS", "199508112018011001", "MAULANA YUDHI NURDHYAS, AMK", "199508112018011001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(274, "PNS", "199601082018012001", "SITI NURJANNAH, AMK", "199601082018012001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(275, "PNS", "199311122022032002", "NOVEL SUMENDA TAKALALUMANG", "199311122022032002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(276, "PNS", "198808282014022001", "LIN MARLINA, AMK", "198808282014022001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(277, "PNS", "199202192019022001", "FYANTIAS RENIESTY PISCELIA, S.Kep, Ners", "199202192019022001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(278, "PNS", "198004012012121001", "R ARIEF AWALLUDIN. AMK", "198004012012121001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(279, "PNS", "199308092022032001", "RISTY AMBARWATI", "199308092022032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(280, "PNS", "197711302005012003", "Ns. DIANA NOMIARSIH, S.Kep", "197711302005012003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(281, "PNS", "196712311987032002", "Ns. NORMAL BR KARO, S.Kep", "196712311987032002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(282, "PNS", "197711192001121001", "TRI DONO AJI SASMITO, AMK", "197711192001121001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(283, "PNS", "199312242018011001", "Ns. BAKHTIAR NUR ABDILAH, S.Kep", "199312242018011001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(284, "PNS", "197508101999032001", "NETTY HERAWATY, AMK", "197508101999032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(285, "PNS", "199004142014022001", "LILIS KOMALASARI, AMK", "199004142014022001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(286, "PNS", "198403232008122003", "ROSIE MARDINAH, AMK", "198403232008122003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(287, "PNS", "198008112006041004", "YAYAN RIYANTO, AMK ", "198008112006041004", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(288, "PNS", "199704122022032004", "DEVI MUTIARASANDY", "199704122022032004", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(289, "PNS", "198311202009122001", "Ns. WIWIT KURNIASIH, S.Kep", "198311202009122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(290, "PNS", "197702211999031001", "Ns. AHMAD QAFRAWI, S.Kep", "197702211999031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(291, "PNS", "197508081997031005", "Ns. ADLAN BADUWI, S.Kep", "197508081997031005", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(292, "PNS", "197402122006042002", "ANNY ROYANA TAMBUNAN, S.Kep., Ns", "197402122006042002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(293, "PNS", "196906201993032001", "HOTIBAH, AMK", "196906201993032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(294, "PNS", "197604281998032001", "TETTY SIRAIT, AMK", "197604281998032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(295, "PNS", "198808022012122001", "SRI PUJI ASTUTI, AMK", "198808022012122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(296, "PNS", "199811202022032003", "SHINTA RIZKI WULANDARI", "199811202022032003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(297, "PNS", "196805121988022001", "Ns. ERNI ERNAWATI, S.Kep", "196805121988022001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(298, "PNS", "196805031988022001", "Ns. ANNA ELFAH SURI, S.Kep", "196805031988022001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(299, "PNS", "198802152019022001", "Ns. ALVINDA KURNIA DEWI, S.Kep", "198802152019022001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(300, "PNS", "198206062009122004", "YUNI DWI RAHARDIYATI, AMK", "198206062009122004", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(301, "PNS", "197710262009022002", "MAGDALENA VERITA INTAN MANIK, AMK", "197710262009022002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(302, "PNS", "198208212008122001", "YAN LORENSA SAGALA, AMK", "198208212008122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(303, "PNS", "198505082014022001", "RATNA CATUR SETYANINGSIH, AMK", "198505082014022001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(304, "PNS", "197603071997032001", "SURYANAH, A.Md.Kep", "197603071997032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(305, "PNS", "199107112020122006", "FITRIA YULIANTI, AmdKep", "199107112020122006", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(306, "PNS", "198804092008122001", "FAJAR APRILIANA DEWI, S.Kep", "198804092008122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(307, "PNS", "197909182005012001", "ERNAWATI, AMK", "197909182005012001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(308, "PNS", "199407062022032001", "DIAN ANGGRAINI", "199407062022032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(309, "PNS", "197807112005012002", "SRI MULYANI, S.Kep, Ners", "197807112005012002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(310, "PNS", "197812232000032001", "Ns. RINA SOGIRIN TRISNAWATI, S.Kep", "197812232000032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(311, "PNS", "198211192009122002", "TRI WAHYUNI, AMK", "198211192009122002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(312, "PNS", "198002112006042007", "RISTIN RATI YULIANA, S.Kep", "198002112006042007", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(313, "PNS", "197508222002122003", "PAWIT CAHYATI, AMK", "197508222002122003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(314, "PNS", "197611151999031004", "M. NURSYAH FAHLEVY, AMK", "197611151999031004", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(315, "PNS", "197709092009121001", "BAGIYO, AMK", "197709092009121001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(316, "PNS", "198412032008011005", "ARDHY NUGROHO, AMK", "198412032008011005", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(317, "PNS", "198206142006041012", "ERICK ABDUL RAHMAN BUDIMAN, AMK", "198206142006041012", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(318, "PNS", "197308172001121006", "TASAM, AMK", "197308172001121006", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(319, "PNS", "198207052006042003", "SRI LESTARI, AMK", "198207052006042003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(320, "PNS", "198307312005012001", "PUTRI SUCI KRISTANTI, AMK", "198307312005012001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(321, "PNS", "198010122006041004", "Ns. FAHRUDIN, S.Kep", "198010122006041004", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(322, "PNS", "199405032020122008", "MILKA MARAMBA, S.Kep.,Ns.", "199405032020122008", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(323, "PNS", "199106162018012001", "Ns. MELVA YUSTRIANA SUKMA P, S.Kep", "199106162018012001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(324, "PNS", "198012022008012014", "SITI MUSRIFAH, AMK", "198012022008012014", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(325, "PNS", "198307222014022001", "NURUL HIDAYAH, AMK", "198307222014022001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(326, "PNS", "199102072014021001", "DENDI SUPRIYADI, AMK", "199102072014021001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(327, "PNS", "199506272018012001", "YUNITA SOFIANA LATIFAH, AMK", "199506272018012001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(328, "PNS", "198703032020121002", "MUHAMMAD FAJAR HIDAYAT, AmdKep", "198703032020121002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(329, "PNS", "198706172008122003", "SRI SUGIARTI, AMK", "198706172008122003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(330, "PNS", "198707182022031001", "YUDHI SUKMAYA, AMK", "198707182022031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(331, "PNS", "199503192022032002", "YUMNI FARHAH", "199503192022032002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(332, "PNS", "199512152022032007", "LISNIA DWI SAHARANINGRUM", "199512152022032007", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(333, "PNS", "196705201994032002", "Ns. MERI SIMANJUNTAK, S.Kep", "196705201994032002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(334, "PNS", "196708101998032001", "Ns. HERLINA PASARIBU, S.Kep", "196708101998032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(335, "PNS", "197010161998032001", "Ns. DWI PUTRI NISFUROCHMAH, S.Kep", "197010161998032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(336, "PNS", "198011262008121002", "Ns. CEPI JAPAR SIDIK, S.Kep", "198011262008121002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(337, "PNS", "198406132010122002", "LIAN PURNAMA SARI, S.Kep., Ns", "198406132010122002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(338, "PNS", "199009042015031001", "MUHAMAD DZULFAN HALIL, AMK", "199009042015031001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(339, "PNS", "196906201993032001", "ERNI SIMANJUNTAK, AMK", "196906201993032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(340, "PNS", "199706282020122006", "ALIFA RETNO ASTRIANI, AmdKep", "199706282020122006", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(341, "PNS", "198302022012122001", "RATNA WIJAYANTI, AMK", "198302022012122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(342, "PNS", "198401152012122001", "TRISNANINGSIH, AMK", "198401152012122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(343, "PNS", "198210142008122002", "Ns. IRMA SOFIANI KUSMARA, S.Kep", "198210142008122002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(344, "PNS", "196805171992032002", "Ns. HERNAWATI, S.Kep", "196805171992032002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(345, "PNS", "199309232022032006", "AYU SEPTIANI", "199309232022032006", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(346, "PNS", "197909302008011011", "ASEP SETIADI, AMK", "197909302008011011", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(347, "PNS", "198201052008122001", "Ns. ELLYA FADLLAH, S.Kep", "198201052008122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(348, "PNS", "196803221994032003", "Ns. SRI SUGIATUN, S.Kep", "196803221994032003", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(349, "PNS", "196507091990031002", "SULISTIONO", "196507091990031002", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(350, "PNS", "196601031992031006", "MORING SUMOLANG, S.Sos", "196601031992031006", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(351, "PNS", "198401222009122001", "RATIH PUSPITA KUSUMAYANTI, AMK", "198401222009122001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(352, "PNS", "199001292018012001", "LINTANG KUSUMANING HANAR, AMK", "199001292018012001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(353, "NONPNS", "919640903201001101", "SUTISNA PRIYATNA", "919640903201001101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(354, "NONPNS", "919661019200902201", "SITI RODIAH", "919661019200902201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(355, "NONPNS", "919671211200902201", "SURIP SUMARTI", "919671211200902201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(356, "NONPNS", "919690901200901101", "M. ZAENUDIN", "919690901200901101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(357, "NONPNS", "919720427201803201", "TITI MULYANI", "919720427201803201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(358, "NONPNS", "919730325201609201", "ARNITA SARI", "919730325201609201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(359, "NONPNS", "919740609200905101", "M. ABDUL RAHMAN", "919740609200905101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(360, "NONPNS", "919751003200901201", "HARIYATI", "919751003200901201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(361, "NONPNS", "919751207201001101", "ARIA CANDRA KELANA", "919751207201001101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(362, "NONPNS", "919760929201005101", "STEVAN IMANUEL", "919760929201005101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(363, "NONPNS", "919770818200805101", "SUPRIYATNO", "919770818200805101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(364, "NONPNS", "919771212200905101", "AHMAD MUKAROM", "919771212200905101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(365, "NONPNS", "919781101201101201", "EVI NOVIYANTI", "919781101201101201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(366, "NONPNS", "919781227201101201", "NURBAETI SHOLEHAH", "919781227201101201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(367, "NONPNS", "919790715201001201", "LAELAH SARIAH", "919790715201001201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(368, "NONPNS", "919800327201410101", "ROKY SAPUTRA", "919800327201410101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(369, "NONPNS", "919810418200902101", "SELAMET", "919810418200902101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(370, "NONPNS", "919820107201211201", "GUSTI AYU AMBARWATI", "919820107201211201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(371, "NONPNS", "919820427202207101", "DEA RYANGGA", "919820427202207101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(372, "NONPNS", "919820817201604201", "AGUSTINA HARDANDINI MERDIKA", "919820817201604201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(373, "NONPNS", "919820928202205101", "SUHARPUDIANTO", "919820928202205101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(374, "NONPNS", "919830311201501101", "SAHRUL ARIPIN", "919830311201501101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(375, "NONPNS", "919830402201001101", "ASAM SYAMSUDIN", "919830402201001101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(376, "NONPNS", "919830508201001201", "SUJIYATI", "919830508201001201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(377, "NONPNS", "919831021200901101", "WIBOWO DWI PRASETYO", "919831021200901101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(378, "NONPNS", "919840505201201101", "EROLMAN", "919840505201201101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(379, "NONPNS", "919841020201001101", "JAKA RANTAU PARAPAT", "919841020201001101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(380, "NONPNS", "919850711202105101", "MAULANA", "919850711202105101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(381, "NONPNS", "919850719201310101", "JULIANTO", "919850719201310101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(382, "NONPNS", "919850913201001101", "BAMBANG TRI SAPUTRO", "919850913201001101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(383, "NONPNS", "919851218201707101", "BUDHI PRASETYO", "919851218201707101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(384, "NONPNS", "919860214200905101", "ANGGA HIDAYAT", "919860214200905101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(385, "NONPNS", "919860616201706201", "UQI ZULFA RIZQIYAH", "919860616201706201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(386, "NONPNS", "919860925201001101", "HERI DWI SEPTIONO", "919860925201001101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(387, "NONPNS", "919870316201803101", "RIAN FAJRIAN, S.KOM", "919870316201803101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(388, "NONPNS", "919870509201909101", "DEDY MURDIANTORO", "919870509201909101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(389, "NONPNS", "919870621201306101", "YUNIARTO SETIADI", "919870621201306101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(390, "NONPNS", "919870728202105101", "BAYU JULIAN RENDRA", "919870728202105101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(391, "NONPNS", "919880111201001101", "DARSONO", "919880111201001101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(392, "NONPNS", "919880330202105201", "RETNO PRATIWI", "919880330202105201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(393, "NONPNS", "919880407202101101", "HERI HIDAYAT", "919880407202101101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(394, "NONPNS", "919880424201604201", "APRILIA", "919880424201604201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(395, "NONPNS", "919880629201608101", "TEDI YOGI YONO", "919880629201608101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(396, "NONPNS", "919880707201707101", "DWI YULIANDRY", "919880707201707101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(397, "NONPNS", "919881114201304101", "MASRUKHIN JIRJIS", "919881114201304101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(398, "NONPNS", "919881124201301101", "HERI KUSUMA", "919881124201301101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(399, "NONPNS", "919890127200902201", "LIA NUR AINI", "919890127200902201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(400, "NONPNS", "919890217201101201", "DWI INDRI WIDYANINGSIH", "919890217201101201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(401, "NONPNS", "919890501201802201", "PENNI ERMAWATI", "919890501201802201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(402, "NONPNS", "919890909201706101", "RONI ANTONI", "919890909201706101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(403, "NONPNS", "919891219201706201", "MEILINDA DWI ASTUTI", "919891219201706201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(404, "NONPNS", "919900131201803201", "RAHMY QUDSIA", "919900131201803201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(405, "NONPNS", "919900505201803101", "AHMAD MAJID", "919900505201803101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(406, "NONPNS", "919900828201706201", "LEO GUSTA INDRAJIT", "919900828201706201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(407, "NONPNS", "919900922201601101", "ADITYA EKO NUGROHO", "919900922201601101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(408, "NONPNS", "919910119202105101", "ARIQ AZIZ", "919910119202105101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(409, "NONPNS", "919910207202110201", "RR LUSTYWULAN AYUCAHYANI SUKMA HIDAYAT", "919910207202110201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(410, "NONPNS", "919910222201911101", "RIVALDIANSYAH", "919910222201911101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(411, "NONPNS", "919910305201901201", "MENIK SETYANINGSIH", "919910305201901201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(412, "NONPNS", "919910518201203101", "DADDY YANSURI", "919910518201203101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(413, "NONPNS", "919910712202101101", "IRIANTO WIBOWO", "919910712202101101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(414, "NONPNS", "919910802202101101", "ANGGA RIYANA SAPUTRA", "919910802202101101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(415, "NONPNS", "919911210201501201", "IRHINEU DWI WAHYU PRATIWI", "919911210201501201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(416, "NONPNS", "919920101201712201", "FANI FITRIANI WINDY ASTUTI", "919920101201712201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(417, "NONPNS", "919920401201607201", "MAYA RIANTI", "919920401201607201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(418, "NONPNS", "919920628201601101", "DHIKY TEGUH PRASETYO", "919920628201601101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(419, "NONPNS", "919920806201605201", "AISAH MAMANG", "919920806201605201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(420, "NONPNS", "919920929201910201", "SABILA DINILHAQ", "919920929201910201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(421, "NONPNS", "919930105201601101", "AFIF FATHUL KODIR", "919930105201601101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(422, "NONPNS", "919930728201803201", "VIVI LATIFAH", "919930728201803201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(423, "NONPNS", "919931013202010101", "WAHYUDI", "919931013202010101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(424, "NONPNS", "919931129201908101", "LUBIS", "919931129201908101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(425, "NONPNS", "919931223201910101", "RANDY ABDUL GANI", "919931223201910101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(426, "NONPNS", "919940110201708201", "ISRA MAHARANI DWIASNITA", "919940110201708201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(427, "NONPNS", "919940302201608101", "M. REZA PAHLEVI", "919940302201608101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(428, "NONPNS", "919940302201910101", "ERIFA MAHFUDZ MUDSANA NUR", "919940302201910101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(429, "NONPNS", "919940805202101201", "ENDAH PRADANI", "919940805202101201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(430, "NONPNS", "919941115201608101", "FARIZ DWI PERMANA", "919941115201608101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(431, "NONPNS", "919941128202110101", "WILDAN FAUZI", "919941128202110101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(432, "NONPNS", "919941207202106201", "HERMANITA", "919941207202106201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(433, "NONPNS", "919941211202207201", "DEVINA SAGITANIA", "919941211202207201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(434, "NONPNS", "919941212201801101", "MUHAMAD FAHMI", "919941212201801101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(435, "NONPNS", "919941227201912201", "NIKEN CAHYANTI", "919941227201912201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(436, "NONPNS", "919950225202106201", "ATIKA RINDA SALEH", "919950225202106201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(437, "NONPNS", "919950324201703101", "HANDY SURIYANSYAH", "919950324201703101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(438, "NONPNS", "919950509201910201", "KANA ADYA ISLAMI", "919950509201910201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(439, "NONPNS", "919950608202105201", "NIDIA JUNITA SARI", "919950608202105201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(440, "NONPNS", "919950619202101101", "MUHAMMAD ERWANDI SAPUTRA", "919950619202101101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(441, "NONPNS", "919950711202105101", "MUHAMMAD FAKHRI RAFIF", "919950711202105101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(442, "NONPNS", "919951001202110101", "OKTA CHANDRA PRASAKTI", "919951001202110101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(443, "NONPNS", "919951221201907201", "DESI NURMALA SARI", "919951221201907201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(444, "NONPNS", "919960314201912101", "FAUZI", "919960314201912101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(445, "NONPNS", "919960403202110201", "ARESTIANING PUTRI", "919960403202110201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(446, "NONPNS", "919961010202105101", "RISKI WAHYU KURNIAWAN", "919961010202105101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(447, "NONPNS", "919961014201907201", "DEWI OCTAVIANA CAISARA", "919961014201907201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(448, "NONPNS", "919961019202001201", "IQLIMA NABILA", "919961019202001201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(449, "NONPNS", "919970110202110101", "AGIS RAMDAN", "919970110202110101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(450, "NONPNS", "919970319202201101", "SOBRUN JAMIL", "919970319202201101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(451, "NONPNS", "919970522201912201", "ALFY DANIYATI ROHMAH", "919970522201912201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(452, "NONPNS", "919971106202101201", "ALMATRIA", "919971106202101201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(453, "NONPNS", "919980311202101201", "VANNYA REFYTA", "919980311202101201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(454, "NONPNS", "919980312202105101", "HAFIZ MARDIANSYAH", "919980312202105101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(455, "NONPNS", "919980425202101201", "DADIES APRILYA REDISTA", "919980425202101201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(456, "NONPNS", "919980608202101202", "YESI ARISNI", "919980608202101202", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(457, "NONPNS", "919980614202110101", "GUSTI FIRDAUS", "919980614202110101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(458, "NONPNS", "919981125202110201", "NUR AYNA ANGKAT", "919981125202110201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(459, "NONPNS", "919981223202105201", "MONIKA", "919981223202105201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(460, "NONPNS", "919981223202105202", "INDAH PURWANINGTYAS", "919981223202105202", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(461, "NONPNS", "919990417202105201", "ROJANAH", "919990417202105201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(462, "NONPNS", "919990512202105101", "TUBAGUS MOHAMAD FAUZI IRFANI", "919990512202105101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(463, "NONPNS", "919990512202110101", "ACHMAD NAUFAL ALIM", "919990512202110101", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(464, "NONPNS", "919991008202105201", "WINDY OKVANDIFA", "919991008202105201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(465, "NONPNS", "920000428202109201", "FAJAR EVILIANI", "920000428202109201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(466, "NONPNS", "920000810202109201", "AYU GUSTINA", "920000810202109201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(467, "NONPNS", "920030611202201201", "AIRINE HANANIAH", "920030611202201201", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL),
	(468, "PNS", " 197302011996032001", "Diyah Asida, S.Gz", " 197302011996032001", "$2y$10$wh8bfkCdPkmKZ/aQxy6QeuZOSXIsQByQAQREKj/p.1MLBcuhpTK5G", NULL, NULL, NULL, NULL, NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of views
# ------------------------------------------------------------

# Creating temporary tables to overcome VIEW dependency errors


/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

# Dump completed on 2023-11-20T13:59:40+07:00
