-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: keuangan
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `benpen`
--

DROP TABLE IF EXISTS `benpen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `benpen` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_kertas` int(11) NOT NULL,
  `no_bukti` int(11) NOT NULL,
  `tanggal_kuitansi` date DEFAULT NULL,
  `shift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tindakan_id` bigint(20) unsigned NOT NULL,
  `DK` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diskon` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(20) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `benpen_tindakan_id_foreign` (`tindakan_id`),
  CONSTRAINT `benpen_tindakan_id_foreign` FOREIGN KEY (`tindakan_id`) REFERENCES `tindakan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `benpen`
--

LOCK TABLES `benpen` WRITE;
/*!40000 ALTER TABLE `benpen` DISABLE KEYS */;
INSERT INTO `benpen` VALUES (21,157331,3794,'2020-10-01','Sore',4,'D',0,1,120000,'Darsono','2020-10-01 20:13:19','2020-10-01 20:13:19'),(22,157317,3793,'2020-10-01','Pagi',4,'D',0,1,120000,'Majid','2020-10-01 20:13:54','2020-10-01 20:13:54'),(23,157317,4301,'2020-10-01','Pagi',1,'D',0,1,15000,'Majid','2020-10-01 20:14:58','2020-10-01 20:14:58'),(24,157307,3788,'2020-10-01','Pagi',14,'D',0,1,90000,'Majid','2020-10-01 20:17:44','2020-10-01 20:17:44'),(25,157307,4297,'2020-10-01','Pagi',11,'D',0,1,15000,'Majid','2020-10-01 20:19:09','2020-10-01 21:14:52'),(26,157306,3787,'2020-10-01','Pagi',4,'D',0,1,120000,'Majid','2020-10-01 20:20:26','2020-10-01 20:20:26'),(27,157299,3786,'2020-10-01','Pagi',3,'D',0,1,130000,'Majid','2020-10-01 20:21:46','2020-10-01 20:21:46'),(28,157299,4293,'2020-10-01','Pagi',11,'D',0,1,15000,'Majid','2020-10-01 20:24:06','2020-10-01 20:24:06'),(29,157323,3791,'2020-10-01','Pagi',3,'D',0,1,130000,'Majid','2020-10-01 20:25:33','2020-10-01 20:25:33'),(30,157285,3777,'2020-10-01','Pagi',4,'D',0,1,120000,'Majid','2020-10-01 20:28:32','2020-10-01 20:28:32'),(31,157285,4283,'2020-10-01','Pagi',11,'D',0,1,15000,'Majid','2020-10-01 20:29:42','2020-10-01 20:29:42'),(32,157284,3778,'2020-10-01','Pagi',4,'D',0,1,120000,'Majid','2020-10-01 20:30:59','2020-10-01 20:30:59'),(33,157284,4284,'2020-10-01','Pagi',1,'D',0,1,15000,'Majid','2020-10-01 20:34:09','2020-10-01 20:34:09'),(34,157286,3779,'2020-10-01','Pagi',4,'D',0,1,120000,'Majid','2020-10-01 20:35:02','2020-10-01 20:35:02'),(35,157286,4285,'2020-10-01','Pagi',1,'D',0,1,15000,'Majid','2020-10-01 20:45:46','2020-10-01 20:45:46'),(36,157287,3780,'2020-10-01','Pagi',4,'D',0,1,120000,'Majid','2020-10-01 20:46:37','2020-10-01 20:46:37'),(37,157288,4287,'2020-10-01','Pagi',1,'D',0,1,15000,'Majid','2020-10-01 20:48:17','2020-10-01 20:48:17'),(38,157287,4286,'2020-10-01','Pagi',1,'D',0,1,15000,'Majid','2020-10-01 20:52:53','2020-10-01 20:52:53'),(39,157288,3781,'2020-10-01','Pagi',4,'D',0,1,120000,'Majid','2020-10-01 20:56:54','2020-10-01 20:56:54'),(40,157306,4296,'2020-10-01','Pagi',1,'D',0,1,15000,'Majid','2020-10-01 21:17:29','2020-10-01 21:17:29'),(42,157292,3782,'2020-10-01','Pagi',4,'D',0,1,120000,'Majid','2020-10-01 23:23:27','2020-10-01 23:23:27'),(43,157292,4289,'2020-10-01','Pagi',1,'D',0,1,15000,'Majid','2020-10-01 23:24:29','2020-10-02 00:01:49'),(45,157293,3783,'2020-10-01','Pagi',4,'D',0,1,120000,'Majid','2020-10-01 23:56:56','2020-10-01 23:56:56'),(47,157293,4290,'2020-10-01','Pagi',1,'D',0,1,15000,'Majid','2020-10-02 00:02:38','2020-10-02 00:02:38'),(48,157297,3785,'2020-10-01','Pagi',4,'D',0,1,120000,'Majid','2020-10-02 00:04:37','2020-10-02 00:04:37'),(49,157297,4292,'2020-10-01','Pagi',1,'D',0,1,15000,'Majid','2020-10-02 00:05:34','2020-10-02 00:05:34'),(50,157314,3790,'2020-10-01','Pagi',4,'D',0,1,120000,'Majid','2020-10-02 00:09:47','2020-10-02 00:09:47'),(51,157314,4299,'2020-10-01','Pagi',1,'D',0,1,15000,'Majid','2020-10-02 00:10:30','2020-10-02 00:10:30'),(52,157316,3791,'2020-10-01','Pagi',14,'D',0,1,90000,'Majid','2020-10-02 00:11:41','2020-10-02 00:11:41'),(53,157316,4300,'2020-10-01','Pagi',11,'D',0,1,15000,'Majid','2020-10-02 00:13:03','2020-10-02 00:13:03'),(54,157331,3794,'2020-10-01','Pagi',14,'D',0,1,90000,'Majid','2020-10-02 00:42:48','2020-10-02 00:42:48'),(55,157319,3789,'2020-10-01','Pagi',4,'D',0,1,120000,'Majid','2020-10-02 00:54:49','2020-10-02 00:54:49'),(56,157319,4298,'2020-10-01','Pagi',1,'D',0,1,15000,'Majid','2020-10-02 00:55:21','2020-10-02 00:55:21'),(57,157340,347,'2020-10-01','siang',14,'D',0,1,90000,'Darsono','2020-10-02 01:35:31','2020-10-02 01:35:31'),(58,157340,4303,'2020-10-01','siang',11,'D',0,1,15000,'Darsono','2020-10-02 01:36:09','2020-10-02 01:38:58'),(59,157340,1100,'2020-10-01','siang',12,'D',0,1,35000,'Darsono','2020-10-02 01:37:04','2020-10-02 01:39:42'),(60,157327,3795,'2020-10-01','siang',4,'D',0,1,120000,'Darsono','2020-10-02 01:37:59','2020-10-02 01:37:59'),(61,157327,1099,'2020-10-01','siang',2,'D',0,1,35000,'Darsono','2020-10-02 01:41:37','2020-10-02 01:41:37'),(62,157327,4302,'2020-10-01','siang',1,'D',0,1,15000,'Darsono','2020-10-02 01:43:26','2020-10-02 01:43:26'),(63,157327,480,'2020-10-01','Pagi',10,'D',0,1,25000,'Darsono','2020-10-02 02:09:54','2020-10-02 02:09:54'),(64,157305,4295,'2020-10-01','Pagi',11,'D',0,1,15000,'Majid','2020-10-02 02:18:52','2020-10-02 02:18:52'),(65,157295,3784,'2020-10-01','Pagi',4,'D',0,1,120000,'Majid','2020-10-02 02:19:59','2020-10-02 02:19:59'),(66,157295,479,'2020-10-01','Pagi',10,'D',0,1,25000,'Darsono','2020-10-02 02:20:48','2020-10-02 02:23:48'),(67,157295,4291,'2020-10-01','Pagi',1,'D',0,1,15000,'Majid','2020-10-02 02:21:47','2020-10-02 02:21:47'),(68,157295,1097,'2020-10-01','Pagi',2,'D',0,1,35000,'Majid','2020-10-02 02:22:26','2020-10-02 02:22:26'),(69,157353,350,'2020-10-01','Pagi',15,'D',0,1,50000,'Vivi Latifah','2020-10-02 02:25:26','2020-10-02 02:25:26'),(70,157353,4305,'2020-10-01','Pagi',11,'D',0,1,15000,'Vivi Latifah','2020-10-02 02:26:29','2020-10-02 02:26:29'),(72,1234,123,'2020-10-02','Pagi',379,'D',0,1,120000,'Darsono','2020-10-06 06:48:33','2020-11-12 08:32:08'),(74,0,0,NULL,'-',377,'D',0,1,10000000,'Rawat Jalan','2020-11-08 20:11:11','2020-11-08 20:11:11'),(75,0,0,NULL,'-',377,'D',0,1,1231231,'Obat (Rawat Jalan)','2020-11-09 08:15:50','2020-11-09 08:15:50');
/*!40000 ALTER TABLE `benpen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_08_22_094721_unit_layanan',1),(5,'2020_08_22_095332_tindakan',1),(6,'2020_08_22_095731_benpen',1),(7,'2020_10_07_043855_create_permission_tables',2),(8,'2020_10_29_112348_create_penjamin',3),(10,'2020_11_03_040755_create_bap',5),(11,'2020_11_03_041126_create_pencairan',6),(15,'2020_10_09_141033_create_pelayanan',7),(16,'2020_10_31_033231_create_pengajuan_klaim',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (3,'App\\User',1),(5,'App\\User',4),(1,'App\\User',6);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelayanan`
--

DROP TABLE IF EXISTS `pelayanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pelayanan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pelayanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelayanan`
--

LOCK TABLES `pelayanan` WRITE;
/*!40000 ALTER TABLE `pelayanan` DISABLE KEYS */;
INSERT INTO `pelayanan` VALUES (2,'Rawat Inap','-','2020-11-09 07:43:30','2020-11-09 07:43:30'),(3,'Rawat Jalan','-','2020-11-09 07:43:38','2020-11-09 07:43:38'),(4,'Obat (Rawat Jalan)','-','2020-11-09 07:44:00','2020-11-09 07:44:17'),(5,'Denda Rawat Inap','-','2020-11-09 07:55:35','2020-11-09 07:55:35'),(6,'Denda Rawat Jalan','-','2020-11-09 07:56:48','2020-11-09 07:56:48'),(7,'Denda Obat (Rawat Jalan)','-','2020-11-09 07:57:12','2020-11-09 07:57:12');
/*!40000 ALTER TABLE `pelayanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengajuanklaim`
--

DROP TABLE IF EXISTS `pengajuanklaim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengajuanklaim` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `penjamin_id` bigint(20) unsigned NOT NULL,
  `pelayanan_id` bigint(20) unsigned NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `tanggal_pelayanan` date NOT NULL,
  `jml_kasus` int(11) NOT NULL,
  `jml_klaim` int(11) NOT NULL,
  `tanggal_bap` date NOT NULL,
  `jml_bap` int(11) NOT NULL,
  `jml_selisih` int(11) NOT NULL,
  `status_bap` int(11) NOT NULL,
  `tanggal_cair` date NOT NULL,
  `rtgs` int(11) NOT NULL,
  `jml_bayar` int(11) NOT NULL,
  `jml_pending` int(11) NOT NULL,
  `jml_tidaklayak` int(11) NOT NULL,
  `status_cair` int(11) NOT NULL,
  `status_kirim` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pengajuanklaim_penjamin_id_foreign` (`penjamin_id`),
  KEY `pengajuanklaim_pelayanan_id_foreign` (`pelayanan_id`),
  CONSTRAINT `pengajuanklaim_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `pelayanan` (`id`),
  CONSTRAINT `pengajuanklaim_penjamin_id_foreign` FOREIGN KEY (`penjamin_id`) REFERENCES `penjamin` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengajuanklaim`
--

LOCK TABLES `pengajuanklaim` WRITE;
/*!40000 ALTER TABLE `pengajuanklaim` DISABLE KEYS */;
INSERT INTO `pengajuanklaim` VALUES (2,2,4,'2020-01-01','2020-01-01',0,1231231,'2020-11-09',1231231,0,1,'2020-11-09',0,1231231,0,0,1,1,'2020-11-09 08:06:51','2020-11-09 08:15:50'),(3,5,4,'2020-01-01','2020-01-01',0,12789361,'2020-11-10',0,0,0,'2020-11-10',0,0,0,0,0,0,'2020-11-09 17:25:26','2020-11-09 17:25:26'),(4,2,2,'2020-01-01','2020-01-01',0,23434234,'2020-11-10',0,0,0,'2020-11-10',0,0,0,0,0,0,'2020-11-09 17:27:01','2020-11-09 17:27:01'),(5,5,2,'2020-01-01','2020-01-01',0,1234567890,'2020-11-10',0,0,0,'2020-11-10',0,0,0,0,0,0,'2020-11-09 17:27:30','2020-11-09 17:27:30'),(6,2,3,'2020-01-01','2020-01-01',0,1234234343,'2020-11-10',0,0,0,'2020-11-10',0,0,0,0,0,0,'2020-11-09 17:28:52','2020-11-09 17:28:52'),(7,5,3,'2020-01-01','2020-01-01',0,123129831,'2020-11-10',0,0,0,'2020-11-10',0,0,0,0,0,0,'2020-11-09 17:29:11','2020-11-09 17:29:11');
/*!40000 ALTER TABLE `pengajuanklaim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penjamin`
--

DROP TABLE IF EXISTS `penjamin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penjamin` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `penjamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjamin`
--

LOCK TABLES `penjamin` WRITE;
/*!40000 ALTER TABLE `penjamin` DISABLE KEYS */;
INSERT INTO `penjamin` VALUES (2,'BPJS','Pemerintah','2020-10-29 06:46:40','2020-10-29 06:46:40'),(3,'Kota Tenggerang','Pemerintah Kota','2020-10-29 06:47:27','2020-10-29 06:47:27'),(4,'Kota Bekasi','Pemerintah Kota','2020-10-29 06:47:39','2020-10-29 06:47:39'),(5,'IOM','-','2020-10-29 06:47:58','2020-10-29 06:47:58'),(6,'CWS','-','2020-10-29 06:48:06','2020-10-29 06:48:06'),(7,'Perusahaan Lainnya','-','2020-10-29 06:48:15','2020-10-29 06:48:15');
/*!40000 ALTER TABLE `penjamin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'Manage Tindakan','web','2020-10-06 23:55:53','2020-10-06 23:55:53'),(2,'Manage Data Penerimaan & Pengeluaran Bendahara Penerimaan','web','2020-10-06 23:56:26','2020-10-06 23:56:26'),(3,'Laporan Data Penerimaan By Date, Month, Year, BKU  Bendahara Penerimaan','web','2020-10-06 23:57:11','2020-10-06 23:57:11'),(4,'Manage All User Plus Role Permission','web','2020-10-11 08:04:33','2020-10-11 08:04:33'),(5,'Manage Klaim Jaminan','web','2020-10-17 23:40:29','2020-10-17 23:40:29'),(6,'Manage Laporan Klaim Jaminan','web','2020-11-03 17:37:04','2020-11-03 17:37:04');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (4,1),(4,2),(1,3),(2,3),(3,3),(5,5),(6,5);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'superadmin','web','2020-10-06 23:54:51','2020-10-06 23:54:51'),(2,'administrator','web','2020-10-06 23:54:56','2020-10-06 23:54:56'),(3,'bendahara_penerimaan','web','2020-10-06 23:55:08','2020-10-06 23:55:08'),(4,'bendahara_pengeluaran','web','2020-10-06 23:55:17','2020-10-06 23:55:17'),(5,'penjamin','web','2020-10-06 23:55:23','2020-10-06 23:55:23');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tindakan`
--

DROP TABLE IF EXISTS `tindakan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tindakan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `unit_layanan_id` bigint(20) unsigned NOT NULL,
  `tindakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemilik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tindakan_unit_layanan_id_foreign` (`unit_layanan_id`),
  CONSTRAINT `tindakan_unit_layanan_id_foreign` FOREIGN KEY (`unit_layanan_id`) REFERENCES `unit_layanan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=380 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tindakan`
--

LOCK TABLES `tindakan` WRITE;
/*!40000 ALTER TABLE `tindakan` DISABLE KEYS */;
INSERT INTO `tindakan` VALUES (1,1,'RAWAT JALAN EKSEKUTIF - Pendaftaran ','Per Pendaftaran',15000,'-','1',NULL,NULL),(2,1,'RAWAT JALAN EKSEKUTIF - Administrasi Rekam Medis','Per Pendaftaran',35000,'-','1',NULL,NULL),(3,1,'KONSULTASI EKSEKUTIF - Dokter Sub Spesialis','Per Pemeriksaan',130000,'-','1',NULL,NULL),(4,1,'KONSULTASI EKSEKUTIF - Dokter Spesialis','Per Konsul',120000,'-','1',NULL,NULL),(5,1,'KONSULTASI EKSEKUTIF - Dokter Umum','Per Konsul',70000,'-','1',NULL,NULL),(6,1,'KONSULTASI EKSEKUTIF - Dokter Gigi ','Per Konsul',70000,'-','1',NULL,NULL),(7,1,'KONSULTASI EKSEKUTIF - Psikolog Klinis','Per Konsul',70000,'-','1',NULL,NULL),(8,1,'KONSULTASI EKSEKUTIF - Keperawatan','Per Konsul',50000,'-','1',NULL,NULL),(9,1,'KONSULTASI EKSEKUTIF - Gizi','Per Konsul',50000,'-','1',NULL,NULL),(10,1,'KONSULTASI EKSEKUTIF - Pekerja Sosial','Per Konsul',25000,'-','1',NULL,NULL),(11,1,'RAWAT JALAN REGULER - Pendaftaran ','Per Pendaftaran',15000,'-','1',NULL,NULL),(12,1,'RAWAT JALAN REGULER - Administrasi Rekam Medis','Per Pendaftaran',35000,'-','1',NULL,NULL),(13,1,'KONSULTASI REGULER - Dokter Sub Spesialis','Per Konsultasi',100000,'-','1',NULL,NULL),(14,1,'KONSULTASI REGULER - Dokter Spesialis','Per Konsultasi',90000,'-','1',NULL,NULL),(15,1,'KONSULTASI REGULER - Dokter Umum','Per Konsultasi',50000,'-','1',NULL,NULL),(16,1,'KONSULTASI REGULER - Dokter Gigi','Per Konsultasi',50000,'-','1',NULL,NULL),(17,1,'KONSULTASI REGULER - Psikolog Klinis','Per Konsultasi',50000,'-','1',NULL,NULL),(18,1,'KONSULTASI REGULER - Keperawatan','Per Konsultasi',40000,'-','1',NULL,NULL),(19,1,'KONSULTASI REGULER - Gizi','Per Konsultasi',40000,'-','1',NULL,NULL),(20,1,'KONSULTASI REGULER - Pekerja Sosial','Per Konsultasi',20000,'-','1',NULL,NULL),(21,2,'RAWAT INAP VIP - Akomodasi','Per Hari',400000,'-','1',NULL,NULL),(22,2,'RAWAT INAP VIP - Visite Dokter Sub Spesialis','Per Visite',175000,'-','1',NULL,NULL),(23,2,'RAWAT INAP VIP - Visite Dokter Spesialis','Per Visite',150000,'-','1',NULL,NULL),(24,2,'RAWAT INAP VIP - Visite Dokter Umum','Per Visite',70000,'-','1',NULL,NULL),(25,2,'RAWAT INAP VIP - Asuhan Keperawatan','Per Kegiatan',50000,'-','1',NULL,NULL),(26,2,'RAWAT INAP VIP -  Ranap Napza HCU Napza','Per Orang/Paket',700000,'-','1',NULL,NULL),(27,2,'RAWAT INAP VIP -  Ranap Napza Detoksifikasi','Per Orang/Paket',600000,'-','1',NULL,NULL),(28,2,'RAWAT INAP VIP -  Ranap Napza Hospice / Ruang Sakit Napza','Per Orang/Paket',550000,'-','1',NULL,NULL),(29,2,'RAWAT INAP VIP -  Ranap Napza Motivational Enhancement Therapy','Per Orang/Paket',300000,'-','1',NULL,NULL),(30,2,'RAWAT INAP VIP -  Ranap Napza Terapi Substitusi-(Codein)','Per Orang/Paket',550000,'-','1',NULL,NULL),(31,2,'RAWAT INAP VIP -  Ranap Napza Kegiatan Napza  (Outbond / Retret)','Per Orang/Paket',400000,'-','1',NULL,NULL),(32,2,'RAWAT INAP KELAS I - Akomodasi','Per Hari',255000,'-','1',NULL,NULL),(33,2,'RAWAT INAP KELAS I - Visite Dokter Sub Spesialis','Per Visite',140000,'-','1',NULL,NULL),(34,2,'RAWAT INAP KELAS I - Visite Dokter Spesialis','Per Visite',100000,'-','1',NULL,NULL),(35,2,'RAWAT INAP KELAS I - Visite Dokter Umum','Per Visite',50000,'-','1',NULL,NULL),(36,2,'RAWAT INAP KELAS I - Asuhan Keperawatan','Per Kegiatan',45000,'-','1',NULL,NULL),(37,2,'RAWAT INAP KELAS I - Rawat Inap Napza HCU Napza','Per Orang/Paket',600000,'-','1',NULL,NULL),(38,2,'RAWAT INAP KELAS I - Rawat Inap Napza Detoksifikasi','Per Orang/Paket',500000,'-','1',NULL,NULL),(39,2,'RAWAT INAP KELAS I - Rawat Inap Napza Hospice / Ruang Sakit Napza','Per Orang/Paket',450000,'-','1',NULL,NULL),(40,2,'RAWAT INAP KELAS I - Rawat Inap Napza Motivational Enhancement Therapy','Per Orang/Paket',250000,'-','1',NULL,NULL),(41,2,'RAWAT INAP KELAS I - Rawat Inap Napza Terapi Substitusi-(Codein)','Per Orang/Paket',500000,'-','1',NULL,NULL),(42,2,'RAWAT INAP KELAS I - Rawat Inap Napza Kegiatan Napza  (Outbond / Retret)','Per Orang/Paket',350000,'-','1',NULL,NULL),(43,2,'RAWAT INAP KELAS II - Akomodasi','Per hari',125000,'-','1',NULL,NULL),(44,2,'RAWAT INAP KELAS II - Visite Dokter Sub Spesialis','Per visite',75000,'-','1',NULL,NULL),(45,2,'RAWAT INAP KELAS II - Visite Dokter Spesialis','Per visite',50000,'-','1',NULL,NULL),(46,2,'RAWAT INAP KELAS II - Visite Dokter Umum','Per visite',20000,'-','1',NULL,NULL),(47,2,'RAWAT INAP KELAS II - Asuhan Keperawatan','Per Kegiatan',40000,'-','1',NULL,NULL),(48,2,'RAWAT INAP KELAS II - Rawat Inap Napza HCU Napza','Per Orang/Paket',500000,'-','1',NULL,NULL),(49,2,'RAWAT INAP KELAS II - Rawat Inap Napza Detoksifikasi','Per Orang/Paket',400000,'-','1',NULL,NULL),(50,2,'RAWAT INAP KELAS II - Rawat Inap Napza Hospice / Ruang Sakit Napza','Per Orang/Paket',350000,'-','1',NULL,NULL),(51,2,'RAWAT INAP KELAS II - Rawat Inap Napza Motivational Enhancement Therapy','Per Orang/Paket',150000,'-','1',NULL,NULL),(52,2,'RAWAT INAP KELAS II - Rawat Inap Napza Terapi Substitusi-(Codein)','Per Orang/Paket',400000,'-','1',NULL,NULL),(53,2,'RAWAT INAP KELAS II - Rawat Inap Napza Kegiatan Napza  (Outbond / Retret)','Per Orang/Paket',300000,'-','1',NULL,NULL),(54,2,'RAWAT INAP KELAS III - Akomodasi','Per hari',100000,'-','1',NULL,NULL),(55,2,'RAWAT INAP KELAS III - Visite Dokter Sub Spesialis','Per visite',65000,'-','1',NULL,NULL),(56,2,'RAWAT INAP KELAS III - Visite Dokter Spesialis','Per visite',45000,'-','1',NULL,NULL),(57,2,'RAWAT INAP KELAS III - Visite Dokter Umum','Per visite',18000,'-','1',NULL,NULL),(58,2,'RAWAT INAP KELAS III - Askep Intensive Care','Per Kegiatan',30000,'-','1',NULL,NULL),(59,2,'RAWAT INAP KELAS III - Askep Total Care','Per Kegiatan',28000,'-','1',NULL,NULL),(60,2,'RAWAT INAP KELAS III - Askep Parsial Care','Per Kegiatan',25000,'-','1',NULL,NULL),(61,2,'RAWAT INAP KELAS III - Askep Minimal Care','Per Kegiatan',20000,'-','1',NULL,NULL),(62,2,'RAWAT INAP KELAS III - Rawat Inap Napza HCU Napza','Per Orang/Paket',400000,'-','1',NULL,NULL),(63,2,'RAWAT INAP KELAS III - Rawat Inap Napza Detoksifikasi','Per Orang/Paket',300000,'-','1',NULL,NULL),(64,2,'RAWAT INAP KELAS III - Rawat Inap Napza Hospice / Ruang Sakit Napza','Per Orang/Paket',250000,'-','1',NULL,NULL),(65,2,'RAWAT INAP KELAS III - Rawat Inap Napza Motivational Enhancement  Therapy','Per Orang/Paket',125000,'-','1',NULL,NULL),(66,2,'RAWAT INAP KELAS III - Rawat Inap Napza Terapi Substitusi-(Codein)','Per Orang/Paket',350000,'-','1',NULL,NULL),(67,2,'RAWAT INAP KELAS III - Rawat Inap Napza Kegiatan Napza  (Outbond / Retret)','Per Orang/Paket',200000,'-','1',NULL,NULL),(68,3,'Terapi Aktivitas Kelompok (per orang)','Perkegiatan',10000,'-','1',NULL,NULL),(69,3,'Fiksasi Gerak','Pertindakan',60000,'-','1',NULL,NULL),(70,3,'Ambil Darah Astrup','Pertindakan',125000,'-','1',NULL,NULL),(71,3,'Combustio (Kecil)','Pertindakan',75000,'-','1',NULL,NULL),(72,3,'Combustio (Sedang)','Pertindakan',100000,'-','1',NULL,NULL),(73,3,'Combustio (Besar)','Pertindakan',125000,'-','1',NULL,NULL),(74,3,'Corpus Alineum','Pertindakan',125000,'-','1',NULL,NULL),(75,3,'Debridement Sedang','Pertindakan',100000,'-','1',NULL,NULL),(76,3,'Debridement Besar','Pertindakan',125000,'-','1',NULL,NULL),(77,3,'Dilatasi Phymosis','Pertindakan',125000,'-','1',NULL,NULL),(78,3,'Eksterpasi Tumor Vagina/Vulva Kecil','Pertindakan',125000,'-','1',NULL,NULL),(79,3,'Ekstraksi Kuku','Pertindakan',125000,'-','1',NULL,NULL),(80,3,'Ganti / Balut Besar','Pertindakan',125000,'-','1',NULL,NULL),(81,3,'Ganti/Balut Sedang','Pertindakan',100000,'-','1',NULL,NULL),(82,3,'Ganti/Balut Kecil','Pertindakan',75000,'-','1',NULL,NULL),(83,3,'Hidrotubasi','Pertindakan',125000,'-','1',NULL,NULL),(84,3,'Incisi Abses','Pertindakan',125000,'-','1',NULL,NULL),(85,3,'Injeksi','Pertindakan',30000,'-','1',NULL,NULL),(86,3,'Intubasi','Pertindakan',125000,'-','1',NULL,NULL),(87,3,'Jahit Luka 1 s/d 5','Pertindakan',100000,'-','1',NULL,NULL),(88,3,'Jahit Luka > 5','Perjahitan',125000,'-','1',NULL,NULL),(89,3,'Jahitan Luka Besar Vagina / Vulva','Pertindakan',125000,'-','1',NULL,NULL),(90,3,'Klisma','Pertindakan',100000,'-','1',NULL,NULL),(91,3,'Kuretage','Pertindakan',125000,'-','1',NULL,NULL),(92,3,'Lavage Lambung','Pertindakan',125000,'-','1',NULL,NULL),(93,3,'Nekrotomi Kecil','Pertindakan',100000,'-','1',NULL,NULL),(94,3,'Nekrotomi Sedang','Pertindakan',125000,'-','1',NULL,NULL),(95,3,'Nekrotomi Besar','Pertindakan',125000,'-','1',NULL,NULL),(96,3,'Pasang Folley Catheter/ Pelepasan','Pertindakan',125000,'-','1',NULL,NULL),(97,3,'Pemasangan Infus / Pelepasan','Pertindakan',75000,'-','1',NULL,NULL),(98,3,'Pemasangan NGT / Pelepasan','Pertindakan',100000,'-','1',NULL,NULL),(99,3,'Pemasangan O2 / jam','Pertindakan',75000,'-','1',NULL,NULL),(100,3,'Pemasangan Kondom Cateter / Pelepasan','Pertindakan',75000,'-','1',NULL,NULL),(101,3,'Pemasangan Ventilator','Pertindakan',125000,'-','1',NULL,NULL),(102,3,'Pemasangan WSD','Pertindakan',125000,'-','1',NULL,NULL),(103,3,'Pungsi Ascites','Pertindakan',125000,'-','1',NULL,NULL),(104,3,'Partus Normal ','Pertindakan',1250000,'-','1',NULL,NULL),(105,3,'Pungsi Cairan Sendi','Pertindakan',125000,'-','1',NULL,NULL),(106,3,'Supra Pungsi Pubis','Pertindakan',125000,'-','1',NULL,NULL),(107,3,'Terapi Inhalasi / Nebulizer (Tanpa Obat)','Pertindakan',75000,'-','1',NULL,NULL),(108,3,'Terapi Inhalasi / Nebulizer (Dengan Obat)','Pertindakan',125000,'-','1',NULL,NULL),(109,3,'Vena Seksi','Pertindakan',125000,'-','1',NULL,NULL),(110,3,'Observasi 1 Jam Berikutnya (IGD)','Pertindakan',72000,'-','1',NULL,NULL),(111,3,'Skin Tes','Pertindakan',72000,'-','1',NULL,NULL),(112,3,'Memasang Infus Pump','Pertindakan',72000,'-','1',NULL,NULL),(113,3,'Pemasangan Data Scope','Pertindakan',100000,'-','1',NULL,NULL),(114,3,'Ekatraksi korpus alineum','Perkegiatan',100000,'-','1',NULL,NULL),(115,3,'RJP','Perkegiatan',125000,'-','1',NULL,NULL),(116,3,'ANC/Pemeriksaan kehamilan','Perkegiatan',72000,'-','1',NULL,NULL),(117,4,'MEDIKOLEGAL - Surat Keterangan Sehat Jiwa ','Persurat',130000,'(tidak termasuk test Psikometri)','1',NULL,NULL),(118,4,'MEDIKOLEGAL - Surat Keterangan Bebas Narkoba','Persurat',130000,'(tidak termasuk test Laboratorium)','1',NULL,NULL),(119,4,'MEDIKOLEGAL - Surat Keterangan Visum et Repertum Psikiatrikum ','Persurat',400000,'(tidak termasuk pemeriksaan/tes)','1',NULL,NULL),(120,4,'MEDIKOLEGAL - Surat Keterangan Berbadan Sehat','Persurat',50000,'(termasuk konsultasi)','1',NULL,NULL),(121,4,'PSIKOMETRI - Tes Kecerdasan','Pertest',180000,'-','1',NULL,NULL),(122,4,'PSIKOMETRI - Tes Kepribadian','Pertest',200000,'-','1',NULL,NULL),(123,4,'PSIKOMETRI - Tes Minat','Pertest',180000,'-','1',NULL,NULL),(124,4,'PSIKOMETRI - Tes Bakat','Pertest',180000,'-','1',NULL,NULL),(125,4,'PSIKOMETRI - Tes Kematangan','Pertest',180000,'-','1',NULL,NULL),(126,4,'PSIKOMETRI - Tes Kualitas Kerja','Pertest',200000,'-','1',NULL,NULL),(127,4,'PSIKOMETRI - Tes MMPI Pemeriksaan Perorangan','Pertest',200000,'diluar surat sehat jiwa','1',NULL,NULL),(128,4,'PSIKOMETRI - Tes MMPI Paket klasikal 26-50    orang','Perorang',180000,'tanpa surat Keterangan sehat jiwa','1',NULL,NULL),(129,4,'PSIKOMETRI - Tes MMPI Paket klasikal 51-100  orang','Perorang',160000,'tanpa surat Keterangan sehat jiwa','1',NULL,NULL),(130,4,'PSIKOMETRI - Tes MMPI Paket klasikal 100-500  orang','Perorang',140000,'tanpa surat Keterangan sehat jiwa','1',NULL,NULL),(131,4,'PSIKOMETRI - Tes MMPI Paket klasikal >500      orang','Perorang',100000,'tanpa surat Keterangan sehat jiwa','1',NULL,NULL),(132,5,'Play Therapy','Perterapi',100000,'-','1',NULL,NULL),(133,5,'Terapi Wicara','Perterapi',100000,'-','1',NULL,NULL),(134,5,'Terapi Okupasi','Perterapi',100000,'-','1',NULL,NULL),(135,5,'Terapi Sensori Integrasi','Perterapi',150000,'-','1',NULL,NULL),(136,5,'Modifikasi Perilaku','Perterapi',100000,'-','1',NULL,NULL),(137,5,'Terapi Snoozellen ','Perterapi',150000,'-','1',NULL,NULL),(138,5,'Terapi Remedial ','Perterapi',100000,'-','1',NULL,NULL),(139,5,'Terapi Musik','Perterapi',150000,'-','1',NULL,NULL),(140,5,'Art Therapy','Perterapi',100000,'-','1',NULL,NULL),(141,5,'Fisioterapi Anak','Perterapi',100000,'-','1',NULL,NULL),(142,5,'Psikoterapi Individual','Perterapi',150000,'-','1',NULL,NULL),(143,5,'Cognitive Behaviour Therapy*','Perterapi',150000,'-','1',NULL,NULL),(144,5,'Terapi Kelompok','Perterapi',100000,'-','1',NULL,NULL),(145,5,'Hypnotherapy','Perterapi',100000,'-','1',NULL,NULL),(146,5,'Terapi Relaksasi','Perterapi',100000,'-','1',NULL,NULL),(147,5,'Konseling Individu','Perterapi',150000,'-','1',NULL,NULL),(148,5,'Psikoedukasi Keluarga','Perterapi',100000,'-','1',NULL,NULL),(149,5,'Terapi Keluarga*','Perterapi',100000,'-','1',NULL,NULL),(150,6,'Psiko Terapi Individual','Per Kegiatan',110000,'-','1',NULL,NULL),(151,7,'Psikoterapi','Perjam',180000,'-','1',NULL,NULL),(152,7,'Tes Kecerdasan','Pertest',180000,'-','1',NULL,NULL),(153,7,'Tes Kepribadian','Pertest',200000,'-','1',NULL,NULL),(154,7,'Tes Minat','Pertest',180000,'-','1',NULL,NULL),(155,7,'Tes Bakat','Pertest',180000,'-','1',NULL,NULL),(156,7,'Tes Kematangan','Pertest',180000,'-','1',NULL,NULL),(157,7,'Tes Kualitas Kerja','Pertest',200000,'-','1',NULL,NULL),(158,7,'Tes MMPI (diluar surat sehat jiwa)','Pertest',200000,'-','1',NULL,NULL),(159,8,'KECIL - Poles Tambalan','Per Tindakan',65000,'-','1',NULL,NULL),(160,8,'KECIL - Incici Abces intra oral','Per Tindakan',65000,'-','1',NULL,NULL),(161,8,'SEDANG - Curettage','Per Tindakan',95000,'-','1',NULL,NULL),(162,8,'SEDANG - Perawatan syaraf gigi anterior tetap / gigi sulung','Per Tindakan',95000,'-','1',NULL,NULL),(163,8,'SEDANG - Perawatan syaraf gigi posterior tetap ','Per Tindakan',95000,'-','1',NULL,NULL),(164,8,'SEDANG - Ekstraksi Gigi Sulung','Per Tindakan',95000,'-','1',NULL,NULL),(165,8,'SEDANG - Incici Abses ekstra oral','Per Tindakan',95000,'-','1',NULL,NULL),(166,8,'BESAR - Tumpatan Amalgam','Per Tindakan',125000,'-','1',NULL,NULL),(167,8,'BESAR - Ekstraksi Gigi Tetap','Per Tindakan',125000,'-','1',NULL,NULL),(168,8,'BESAR - Tumpatan GIC','Per Tindakan',125000,'-','1',NULL,NULL),(169,8,'BESAR - Scalling Rahang Bawah','Per Tindakan',125000,'-','1',NULL,NULL),(170,8,'KHUSUS - Ekstraksi Komplikasi','Per Tindakan',400000,'-','1',NULL,NULL),(171,8,'KHUSUS - Tumpatan Composit ','Per Tindakan',300000,'-','1',NULL,NULL),(172,8,'KHUSUS - Odontektomi','Per Tindakan',600000,'-','1',NULL,NULL),(173,9,'Tes Berra','Per Tindakan',550000,'-','1',NULL,NULL),(174,9,'P300','Per Tindakan',550000,'-','1',NULL,NULL),(175,9,'Polysomnografi','Per Tindakan',550000,'-','1',NULL,NULL),(176,9,'Brain Mapping','Per Tindakan',550000,'-','1',NULL,NULL),(177,9,'Mobile Polygrafh','Per Tindakan',550000,'-','1',NULL,NULL),(178,9,'Neurofeedback','Per Tindakan',400000,'-','1',NULL,NULL),(179,9,'Terapi TOVA  - Visual','Persesi',300000,'-','1',NULL,NULL),(180,9,'Terapi TOVA  - Auditori','Persesi',300000,'-','1',NULL,NULL),(181,9,'Terapi TOVA  - Double (Visual + Auditori)','Persesi',500000,'-','1',NULL,NULL),(182,9,'Brain Mapping','Perpemeriksaan',550000,'-','1',NULL,NULL),(183,9,'EEG Konvensional','Perpemeriksaan',280000,'-','1',NULL,NULL),(184,9,'EKG','Pertindakan',80000,'-','1',NULL,NULL),(185,9,'ECT Bermonitor premedikasi','Perpemeriksaan',400000,'-','1',NULL,NULL),(186,9,'ECT Konvensional','Perpemeriksaan',350000,'-','1',NULL,NULL),(187,10,'Akomodasi Day Care','Perkunjungan',90000,'-','1',NULL,NULL),(188,10,'Rekreasi','Orang/Kegiatan',125000,'-','1',NULL,NULL),(189,10,'Educational Therapy - Pelatihan English Class','Orang/Kegiatan',30000,'-','1',NULL,NULL),(190,10,'Educational Therapy - Pelatihan Administrasi','Orang/Kegiatan',30000,'-','1',NULL,NULL),(191,10,'Educational Therapy - Pelatihan Komputer','Orang/Kegiatan',40000,'-','1',NULL,NULL),(192,10,'Occupational Therapy - AKS/ADL(Aktifitas kegiatan sehari-hari)','Orang/Kegiatan',20000,'-','1',NULL,NULL),(193,10,'Occupational Therapy - Tata Boga','Orang/Kegiatan',40000,'-','1',NULL,NULL),(194,10,'Occupational Therapy - Salon','Orang/Kegiatan',40000,'-','1',NULL,NULL),(195,10,'Occupational Therapy - Menjahit','Orang/Kegiatan',40000,'-','1',NULL,NULL),(196,10,'Occupational Therapy - Kerajinan Tangan','Orang/Kegiatan',20000,'-','1',NULL,NULL),(197,10,'Occupational Therapy - Perkebunan/Pertamanan','Orang/Kegiatan',20000,'-','1',NULL,NULL),(198,10,'Occupational Therapy - Sablon Mug','Orang/Kegiatan',40000,'-','1',NULL,NULL),(199,10,'Music Therapy - Organ Tunggal/Band/Music','Orang/Kegiatan',40000,'-','1',NULL,NULL),(200,10,'Music Therapy - Paduan Suara','Orang/Kegiatan',40000,'-','1',NULL,NULL),(201,10,'Music Therapy - Seni Tari','Orang/Kegiatan',40000,'-','1',NULL,NULL),(202,10,'Music Therapy - Karaoke','Orang/Kegiatan',40000,'-','1',NULL,NULL),(203,10,'Vocational Rehabilitation - RH Ponsel','Orang/Kegiatan',40000,'-','1',NULL,NULL),(204,10,'Vocational Rehabilitation - RH Garden','Orang/Kegiatan',20000,'-','1',NULL,NULL),(205,10,'Vocational Rehabilitation - RH Corner','Orang/Kegiatan',40000,'-','1',NULL,NULL),(206,10,'Vocational Rehabilitation - RH Cleaning Service','Orang/Kegiatan',30000,'-','1',NULL,NULL),(207,10,'Rehabilitation Not Classified - Perpustakaan','Orang/Kegiatan',30000,'-','1',NULL,NULL),(208,10,'Relaxation Training - Terapi Relaksasi','Orang/Kegiatan',30000,'-','1',NULL,NULL),(209,10,'Play Psycotherapy - Olahraga','Orang/Kegiatan',30000,'-','1',NULL,NULL),(210,10,'Play Psycotherapy - Olahraga dengan alat (fitnes)','Orang/Kegiatan',30000,'-','1',NULL,NULL),(211,10,'Play Psycotherapy - Melukis','Orang/Kegiatan',100000,'-','1',NULL,NULL),(212,10,'Play Psycotherapy - Menonton Film/DVD','Orang/Kegiatan',20000,'-','1',NULL,NULL),(213,10,'Supprotive Verbal Psycotherapy - Kerohanian Islam','Orang/Kegiatan',30000,'-','1',NULL,NULL),(214,10,'Supprotive Verbal Psycotherapy - Kerohanian Kristen','Orang/Kegiatan',30000,'-','1',NULL,NULL),(215,10,'Supprotive Verbal Psycotherapy - Latihan Teknik Komunikasi','Orang/Kegiatan',30000,'-','1',NULL,NULL),(216,10,'Family Therapy - Terapi Keluarga','Orang/Kegiatan',125000,'-','1',NULL,NULL),(217,10,'Family Therapy - Family Gathering','Orang/Kegiatan',125000,'-','1',NULL,NULL),(218,10,'Family Therapy - Kunjungan Rumah','Orang/Kunjungan',125000,'-','1',NULL,NULL),(219,10,'Psycodrama - Psikodrama','Orang/Kegiatan',20000,'-','1',NULL,NULL),(220,10,'Terapi Kelompok Tim Profesi - (Psikolog, OT, PekSos, Perawat)','Orang/Kegiatan',10000,'-','1',NULL,NULL),(221,10,'Program Pilihan - Program Night Care I','Orang/bulan',2550000,'-','1',NULL,NULL),(222,10,'Program Pilihan - Program Night Care II','Orang/bulan',1250000,'-','1',NULL,NULL),(223,10,'Program Pilihan - Program Night Care III','Orang/bulan',800000,'-','1',NULL,NULL),(224,11,'Short Wave Diathermy (SWD)','Pertindakan',40000,'-','1',NULL,NULL),(225,11,'Microwave Diathermy (MWD)','Pertindakan',40000,'-','1',NULL,NULL),(226,11,'Trans Electrical Nerve Stimulatin  (TENS)','Pertindakan',40000,'-','1',NULL,NULL),(227,11,'Faradisasi','Pertindakan',40000,'-','1',NULL,NULL),(228,11,'Traksi Lumbal','Pertindakan',40000,'-','1',NULL,NULL),(229,11,'Traksi Cervival','Pertindakan',40000,'-','1',NULL,NULL),(230,11,'Exercise Therapy Ringan','Pertindakan',40000,'-','1',NULL,NULL),(231,11,'Exercise Therapy Berat','Pertindakan',40000,'-','1',NULL,NULL),(232,11,'Masase','Pertindakan',40000,'-','1',NULL,NULL),(233,11,'Ultrasound Therapy','Pertindakan',40000,'-','1',NULL,NULL),(234,11,'Infra Red Radiation (IRR)','Pertindakan',40000,'-','1',NULL,NULL),(235,11,'IPP General','Pertindakan',40000,'-','1',NULL,NULL),(236,11,'Asuhan Fisioterapi','Pertindakan',40000,'-','1',NULL,NULL),(237,11,'Pemeriksaan Kebugaran  (Treadmill)','Pertindakan',40000,'-','1',NULL,NULL),(238,12,'Kelompok 1 - Foto Thorax PA/AP dan Lat','Per Pemeriksaan',137500,'-','1',NULL,NULL),(239,12,'Kelompok 1 - Foto Schedel/Kepala AP/Lat','Per Pemeriksaan',137500,'-','1',NULL,NULL),(240,12,'Kelompok 1 - Foto Mandibula AP/Lat','Per Pemeriksaan',137500,'-','1',NULL,NULL),(241,12,'Kelompok 1 - Foto Abdomen Polos','Per Pemeriksaan',137500,'-','1',NULL,NULL),(242,12,'Kelompok 1 - Foto Shoulder Joint','Per Pemeriksaan',137500,'-','1',NULL,NULL),(243,12,'Kelompok 1 - Foto Cubiti AP/Lat','Per Pemeriksaan',137500,'-','1',NULL,NULL),(244,12,'Kelompok 1 - Foto Wrist Joint Perbandingan','Per Pemeriksaan',137500,'-','1',NULL,NULL),(245,12,'Kelompok 1 - Foto Clavicula AP/Lat Perbandingan','Per Pemeriksaan',137500,'-','1',NULL,NULL),(246,12,'Kelompok 1 - Foto Coccygues AP/LAT','Per Pemeriksaan',137500,'-','1',NULL,NULL),(247,12,'Kelompok 1 - Foto Pedis Perbandingan','Per Pemeriksaan',137500,'-','1',NULL,NULL),(248,12,'Kelompok 1 - Foto Angkle Joint Perbandingan','Per Pemeriksaan',137500,'-','1',NULL,NULL),(249,12,'Kelompok 1 - Foto Manus Perbandingan','Per Pemeriksaan',137500,'-','1',NULL,NULL),(250,12,'Kelompok 1 - Foto Cranium  /Basiscranium','Per Pemeriksaan',137500,'-','1',NULL,NULL),(251,12,'Kelompok 1 - Foto Pelvis','Per Pemeriksaan',137500,'-','1',NULL,NULL),(252,12,'Kelompok 1 - Foto Extermitas atas-bawah Ka/Ki','Per Pemeriksaan',137500,'-','1',NULL,NULL),(253,12,'Kelompok 1 - Foto Vertebrae Thoracal AP/Lat','Per Pemeriksaan',137500,'-','1',NULL,NULL),(254,12,'Kelompok 1 - Foto Vertebrae Lumbal AP/Lat','Per Pemeriksaan',137500,'-','1',NULL,NULL),(255,12,'Kelompok 1 - Foto Lumbo Sacral','Per Pemeriksaan',137500,'-','1',NULL,NULL),(256,12,'Kelompok 1 - Foto Panoramic','Per Pemeriksaan',137500,'-','1',NULL,NULL),(257,12,'Kelompok 1 - Foto Top Lordotic','Per Pemeriksaan',137500,'-','1',NULL,NULL),(258,12,'Kelompok 2 - Foto Os Nasal','Per Pemeriksaan',137500,'-','1',NULL,NULL),(259,12,'Kelompok 2 - Foto Pedis Ka/Ki','Per Pemeriksaan',137500,'-','1',NULL,NULL),(260,12,'Kelompok 2 - Foto Cubiti AP/Lat','Per Pemeriksaan',137500,'-','1',NULL,NULL),(261,12,'Kelompok 2 - Foto Gigi','Per Pemeriksaan',137500,'-','1',NULL,NULL),(262,12,'Kelompok 2 - Foto Basis Cranii','Per Pemeriksaan',137500,'-','1',NULL,NULL),(263,12,'Kelompok 2 - Foto Wrist Joint Ka/Ki','Per Pemeriksaan',137500,'-','1',NULL,NULL),(264,12,'Kelompok 2 - Foto Genu AP/Lat Ka/Ki','Per Pemeriksaan',137500,'-','1',NULL,NULL),(265,12,'Kelompok 2 - Foto Clavicula Ka/Ki','Per Pemeriksaan',137500,'-','1',NULL,NULL),(266,12,'Kelompok 2 - Foto Manus Ka/Ki','Per Pemeriksaan',137500,'-','1',NULL,NULL),(267,12,'Kelompok 2 - Foto Angkle Joint Ka/Ki','Per Pemeriksaan',137500,'-','1',NULL,NULL),(268,12,'Kelompok 2 - Foto Leher/Adenoid Lateral','Per Pemeriksaan',137500,'-','1',NULL,NULL),(269,12,'Kelompok 2 - Foto Scavula Ka/Ki','Per Pemeriksaan',137500,'-','1',NULL,NULL),(270,12,'Kelompok 3 - Foto Sinus Paranasal','Per Pemeriksaan',162500,'-','1',NULL,NULL),(271,12,'Kelompok 3 - Foto Extremitas atas Perbandingan','Per Pemeriksaan',162500,'-','1',NULL,NULL),(272,12,'Kelompok 3 - Foto Shoulder Joint Perbandingan','Per Pemeriksaan',162500,'-','1',NULL,NULL),(273,12,'Kelompok 3 - Foto TMJ PA/Lat','Per Pemeriksaan',162500,'-','1',NULL,NULL),(274,12,'Kelompok 3 - Foto Extremitas Bawah Perbandingan                  ','Per Pemeriksaan',162500,'-','1',NULL,NULL),(275,12,'Kelompok 3 - Foto Genu AP/LAT Perbandingan','Per Pemeriksaan',162500,'-','1',NULL,NULL),(276,12,'Kelompok 3 - Foto Mastoid','Per Pemeriksaan',162500,'-','1',NULL,NULL),(277,12,'Kelompok 3 - Foto Os Sacrum','Per Pemeriksaan',162500,'-','1',NULL,NULL),(278,12,'Kelompok 4 - Foto Cervical AP/Lat/Oblique','Per Pemeriksaan',162500,'-','1',NULL,NULL),(279,12,'Kelompok 4 - Foto Thoraco Lumbal AP/Lat','Per Pemeriksaan',162500,'-','1',NULL,NULL),(280,12,'Kelompok 4 - Foto Thoracal AP/Lat','Per Pemeriksaan',162500,'-','1',NULL,NULL),(281,12,'Kelompok 4 - Foto Lumbo Sacral AP/Lat','Per Pemeriksaan',162500,'-','1',NULL,NULL),(282,12,'Kelompok 5 - Foto Thoracal AP/Lat/Oblique','Per Pemeriksaan',162500,'-','1',NULL,NULL),(283,12,'Kelompok 5 - Foto Abdomen 3 Posisi','Per Pemeriksaan',162500,'-','1',NULL,NULL),(284,12,'Kelompok 5 - Foto Lumbo Sacral AP/Lat/Oblique','Per Pemeriksaan',162500,'-','1',NULL,NULL),(285,12,'Kelompok 5 - Thoracal AP/Lat/Oblique','Per Pemeriksaan',162500,'-','1',NULL,NULL),(286,12,'Kelompok 6 - USG Abdomen','Per Pemeriksaan',345000,'-','1',NULL,NULL),(287,12,'Kelompok 6 - USG Obgyn','Per Pemeriksaan',345000,'-','1',NULL,NULL),(288,13,'HEMATOLOGI - Darah Rutin (Leukosit, Hb, Hematokrit, Trombosit)      ','Per Pemeriksaan',70000,'-','1',NULL,NULL),(289,13,'HEMATOLOGI - Darah Lengkap','Per Pemeriksaan',100000,'-','1',NULL,NULL),(290,13,'HEMATOLOGI - Diff/Hitung Jenis','Per Pemeriksaan',20000,'-','1',NULL,NULL),(291,13,'HEMATOLOGI - LED','Per Pemeriksaan',25000,'-','1',NULL,NULL),(292,13,'HEMATOLOGI - Malaria','Per Pemeriksaan',50000,'-','1',NULL,NULL),(293,13,'HEMATOLOGI - Golongan Darah','Per Pemeriksaan',25000,'-','1',NULL,NULL),(294,13,'HEMATOLOGI - Morfologi Darah Tepi (MDT)','Per Pemeriksaan',200000,'-','1',NULL,NULL),(295,13,'HEMOSTATIS - CT','Per Pemeriksaan',20000,'-','1',NULL,NULL),(296,13,'HEMOSTATIS - BT','Per Pemeriksaan',20000,'-','1',NULL,NULL),(297,13,'URINALISIS - Urin Rutin','Per Pemeriksaan',30000,'-','1',NULL,NULL),(298,13,'URINALISIS - Tes Kehamilan','Per Pemeriksaan',30000,'-','1',NULL,NULL),(299,13,'KIMIA DARAH - Gula (Swaktu, Puasa, 2 Jam PP)','Per Pemeriksaan',30000,'-','1',NULL,NULL),(300,13,'KIMIA DARAH - SGOT','Per Pemeriksaan',30000,'-','1',NULL,NULL),(301,13,'KIMIA DARAH - SGPT','Per Pemeriksaan',30000,'-','1',NULL,NULL),(302,13,'KIMIA DARAH - Ureum ','Per Pemeriksaan',30000,'-','1',NULL,NULL),(303,13,'KIMIA DARAH - Creatinin','Per Pemeriksaan',30000,'-','1',NULL,NULL),(304,13,'KIMIA DARAH - Asam Urat','Per Pemeriksaan',30000,'-','1',NULL,NULL),(305,13,'KIMIA DARAH - Koleserol Total','Per Pemeriksaan',35000,'-','1',NULL,NULL),(306,13,'KIMIA DARAH - HDL','Per Pemeriksaan',35000,'-','1',NULL,NULL),(307,13,'KIMIA DARAH - LDL','Per Pemeriksaan',35000,'-','1',NULL,NULL),(308,13,'KIMIA DARAH - Trigliserid','Per Pemeriksaan',35000,'-','1',NULL,NULL),(309,13,'KIMIA DARAH - Bilirubin Total','Per Pemeriksaan',35000,'-','1',NULL,NULL),(310,13,'KIMIA DARAH - Bilirubin Direct','Per Pemeriksaan',35000,'-','1',NULL,NULL),(311,13,'KIMIA DARAH - Protein Total','Per Pemeriksaan',35000,'-','1',NULL,NULL),(312,13,'KIMIA DARAH - Albumin','Per Pemeriksaan',35000,'-','1',NULL,NULL),(313,13,'KIMIA DARAH - Alkali Pospatase','Per Pemeriksaan',35000,'-','1',NULL,NULL),(314,13,'KIMIA DARAH - Gamma GT','Per Pemeriksaan',35000,'-','1',NULL,NULL),(315,13,'ELEKTROLIT - Na, K, Cl','Per Pemeriksaan',170000,'-','1',NULL,NULL),(316,13,'ELEKTROLIT - Li','Per Pemeriksaan',200000,'-','1',NULL,NULL),(317,13,'SEROLOGI - Tubex','Per Pemeriksaan',200000,'-','1',NULL,NULL),(318,13,'SEROLOGI - HBsAg','Per Pemeriksaan',150000,'-','1',NULL,NULL),(319,13,'SEROLOGI - Anti HCV','Per Pemeriksaan',150000,'-','1',NULL,NULL),(320,13,'SEROLOGI - Anti HIV','Per Pemeriksaan',150000,'-','1',NULL,NULL),(321,13,'SEROLOGI - Dengue Combo (NS1 & Ig M/G)','Per Pemeriksaan',200000,'-','1',NULL,NULL),(322,13,'SEROLOGI - Faeces Lengkap','Per Pemeriksaan',35000,'-','1',NULL,NULL),(323,13,'SEROLOGI - DRUG (Amphetamin, BZO, CocIN, Metamphatin, Opiate)','Per Pemeriksaan',200000,'-','1',NULL,NULL),(324,13,'SEROLOGI - BTA Sputum','Per Pemeriksaan',25000,'-','1',NULL,NULL),(325,13,'SEROLOGI - Tes NAPZA ','Per Pemeriksaan',200000,'-','1',NULL,NULL),(326,14,'Operasi Besar I','Pertindakan',5040000,'-','1',NULL,NULL),(327,14,'Operasi Besar II','Pertindakan',5040000,'-','1',NULL,NULL),(328,14,'Operasi Sedang I','Pertindakan',3120000,'-','1',NULL,NULL),(329,14,'Operasi Sedang II','Pertindakan',3120000,'-','1',NULL,NULL),(330,14,'Operasi Kecil I','Pertindakan',1680000,'-','1',NULL,NULL),(331,14,'Operasi Kecil II','Pertindakan',1680000,'-','1',NULL,NULL),(332,14,'Operasi Khusus I','Pertindakan',9480000,'-','1',NULL,NULL),(333,14,'Operasi Khusus II','Pertindakan',10200000,'-','1',NULL,NULL),(334,15,'Pendidikan Kepanitraan Medis - Program Dokter Spesialis','Per Orang / Paket',2500000,'-','1',NULL,NULL),(335,15,'Pendidikan Kepanitraan Medis - Program Dokter / Co Ass','Per Orang / Paket',650000,'-','1',NULL,NULL),(336,15,'Pendidikan keperawatan D3 - Praktek Laboratorium','Per Orang/Paket/5 hari',100000,'-','1',NULL,NULL),(337,15,'Pendidikan keperawatan D3 - Praktek Klinik Keperawatan  (PKK)','Per Orang/Paket/5 hari',270000,'-','1',NULL,NULL),(338,15,'Pendidikan keperawatan D3 - Praktek UAP','Per Orang/Paket/5 hari',160000,'-','1',NULL,NULL),(339,15,'Pendidikan keperawatan D4 - Praktek Klinik Keperawatan  (PKK)','Per Orang/Paket/5 hari',270000,'-','1',NULL,NULL),(340,15,'Pendidikan keperawatan S1 - Praktek Laboratorium','Per Orang/Paket/5 hari',110000,'-','1',NULL,NULL),(341,15,'Pendidikan keperawatan S1 - Praktek Profesi Keperawatan/Nurse','Per Orang/Paket/20 hari',500000,'-','1',NULL,NULL),(342,15,'Pendidikan keperawatan S1 - Magang Dosen','Per Orang/Paket/3 bulan',750000,'-','1',NULL,NULL),(343,15,'Pendidikan keperawatan S2 - Praktek Klinik Keperawatan Jiwa','Per Orang/Paket/5 hari',750000,'-','1',NULL,NULL),(344,15,'Pendidikan Psikologi - Kuliah Kerja Lapangan (KKL) S1','Per Orang/Paket/20 hari',350000,'-','1',NULL,NULL),(345,15,'Pendidikan Psikologi - Magang S1','Per Orang/Paket/40 hari',700000,'-','1',NULL,NULL),(346,15,'Pendidikan Psikologi - Praktek Magister Profesi','Per Orang/Paket/10 hari',250000,'-','1',NULL,NULL),(347,15,'Pendidikan Lain Lain - Setara D3 ','Per Orang/Paket/20 hari',350000,'-','1',NULL,NULL),(348,15,'Pendidikan Lain Lain - Setara S1','Per Orang/Paket/20 hari',410000,'-','1',NULL,NULL),(349,15,'Magang SLTA','',0,'-','1',NULL,NULL),(350,15,'Magang D1 - D3','Per Orang/Paket/10 hari',150000,'-','1',NULL,NULL),(351,15,'Magang S1 Umum','Per Orang/Paket/10 hari',200000,'-','1',NULL,NULL),(352,15,'Magang S2','Per Orang/Paket/10 hari',300000,'-','1',NULL,NULL),(353,15,'Praktik Kerja (Magang) Institusi','Per Orang/Paket/10 hari',300000,'-','1',NULL,NULL),(354,15,'Survey/ Observasi Lapangan','Per Orang/data',100000,'-','1',NULL,NULL),(355,15,'Studi Banding','Per Orang/hari',275000,'-','1',NULL,NULL),(356,15,'Kunjungan Institusi Pendidikan - SMA dan sederajat','Per Kunjungan',500000,'-','1',NULL,NULL),(357,15,'Kunjungan Institusi Pendidikan - D1 - S3','Per Kunjungan',1000000,'-','1',NULL,NULL),(358,15,'Tambahan Materi','',275000,'-','1',NULL,NULL),(359,15,'Penelitian - D1 - D3','Per Penelitian',250000,'-','1',NULL,NULL),(360,15,'Penelitian - D4 - S1','Per Penelitian',500000,'-','1',NULL,NULL),(361,15,'Penelitian - S2','Per Penelitian',750000,'-','1',NULL,NULL),(362,15,'Penelitian - S3','Per Penelitian',1000000,'-','1',NULL,NULL),(363,15,'Penelitian - Institusional Komersial','Per Sampel',2000000,'-','1',NULL,NULL),(364,15,'Sertifikat Kompetensi','Per Sertifikat',10000,'-','1',NULL,NULL),(365,16,'Penggunaan Lahan Rumah Sakit ','Per m2/bulan',8150,'-','1',NULL,NULL),(366,16,'Lapangan Sepakbola/Futsal','Per Jam',75000,'-','1',NULL,NULL),(367,16,'Lapangan Tenis','Per Jam',50000,'-','1',NULL,NULL),(368,16,'Penggunaan Lahan untuk ATM BRI','Per Bulan',1100000,'-','1',NULL,NULL),(369,16,'Asrama Putri ','Per Kamar/hari/orng',40000,'-','1',NULL,NULL),(370,16,'Wisma Diklat - Kamar Deluxe','Per Kamar/hari/orng',50000,'-','1',NULL,NULL),(371,16,'Wisma Diklat - Kamar Standart','Per Kamar/hari/orng',45000,'-','1',NULL,NULL),(372,16,'Perawatan Jenazah','Per Kegiatan',500000,'-','1',NULL,NULL),(373,16,'Ambulance - Tarif Dasar Per 25 KM','Per 25 Km',300000,'-','1',NULL,NULL),(374,16,'Ambulance - Tarif Tambahan per KM','Per Km',6000,'-','1',NULL,NULL),(375,16,'Bus - Dalam Kota  (10 jam)','Per Hari',1500000,'-','1',NULL,NULL),(376,16,'Bus - Luar Kota (paket)','Per Hari',2500000,'-','1',NULL,NULL),(377,17,'Setoran PNBP','-',0,'-','2','2020-09-16 00:09:23','2020-09-16 00:09:23'),(378,17,'EDC','-',0,'-','2','2020-09-16 18:47:07','2020-09-16 18:47:07'),(379,18,'Obat','-',0,'-','1','2020-10-05 21:09:29','2020-10-05 21:09:29');
/*!40000 ALTER TABLE `tindakan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unit_layanan`
--

DROP TABLE IF EXISTS `unit_layanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unit_layanan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `layanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit_layanan`
--

LOCK TABLES `unit_layanan` WRITE;
/*!40000 ALTER TABLE `unit_layanan` DISABLE KEYS */;
INSERT INTO `unit_layanan` VALUES (1,'RAWAT JALAN',NULL,NULL),(2,'RAWAT INAP',NULL,NULL),(3,'MEDIS DAN KEPERAWATAN',NULL,NULL),(4,'MHCU',NULL,NULL),(5,'TERAPI',NULL,NULL),(6,'PSIKIATRIK DEWASA',NULL,NULL),(7,'PSIKOLOGI',NULL,NULL),(8,'GIGI ',NULL,NULL),(9,'ELEKTROMEDIK',NULL,NULL),(10,'REHABILITASI PSIKOSOSIAL',NULL,NULL),(11,'REHABILITASI  MEDIK',NULL,NULL),(12,'RADIOLOGI',NULL,NULL),(13,'LABORATORIUM',NULL,NULL),(14,'BEDAH',NULL,NULL),(15,'PENDIDIKAN DAN LATIHAN (DIKLAT)',NULL,NULL),(16,'PENGGUNAAN SARANA DAN PRASARANA',NULL,NULL),(17,'Lain-lainnya',NULL,NULL),(18,'Farmasi',NULL,NULL);
/*!40000 ALTER TABLE `unit_layanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'bendahara_penerimaan','April Santy, SE','april.santy','$2y$10$XVneBBpQI8hT4dfrYVrRD.qQ1iiMAmVY6dYg4Qwmz13AHbmmIN.j6','email@gmail.com',NULL,NULL,'2020-09-15 23:31:46','2020-09-15 23:31:46'),(4,'penjamin','Ahmad Furkon, SE','ahmad.furkon','$2y$10$/FSzEG8CKJuCGFYl9P1SqeCJ6ELtJjY53/O8Hzs3TXjsiH4RyYaYm','email1@gmail.com',NULL,NULL,'2020-10-06 18:36:13','2020-10-06 18:36:13'),(6,'superadmin','Fauzi','superadmin','$2y$10$e8PuXPffEriV4QXOy6caiO4Fs6MJQoj8EWQ/7un6x4rFjCdNQLZMq','arsipfauzi@gmail.com',NULL,NULL,'2020-10-14 18:52:40','2020-10-14 18:52:40'),(7,'user','User Testing','testing1','$2y$10$TQLcIF3XbkzhdRlh.yRR6.5pXaCLT.vJfi9siyDpb72E1zQ/FQ/zq','asdadsa@gmail.com',NULL,NULL,'2020-10-16 05:52:42','2020-10-16 05:52:42');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-30  8:51:04
