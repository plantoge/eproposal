/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : db_proposal

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 16/10/2024 14:21:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for berita
-- ----------------------------
DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita`  (
  `BERITA_ID` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `USERS_ID` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `BERITA_KATEGORI_ID` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `BERITA_TITLE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `BERITA_SLUG` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `BERITA_KONTEN` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `BERITA_GAMBAR` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `BERITA_STATUS` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`BERITA_ID`) USING BTREE,
  UNIQUE INDEX `berita_berita_slug_unique`(`BERITA_SLUG` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of berita
-- ----------------------------
INSERT INTO `berita` VALUES ('347190dc-930d-426b-9426-188bcb633c58', '2e482dc3-e8ef-41a9-bd68-dbaeabab6bf4', '10a3b08b-9524-4d1c-a8a2-19c0745ad290', 'tes tes', 'tes-tes', '<p>tes</p>', '4Wx1gTwwbMMB0ZrL2GMFwdl8CkCAeTyE2fDNPuM1.jpg', 'Arsip', '2024-02-05 07:55:15', '2024-02-05 10:05:19', NULL);
INSERT INTO `berita` VALUES ('3c529aee-83e5-40bb-8972-ce56bf5c3b78', '2e482dc3-e8ef-41a9-bd68-dbaeabab6bf4', '10a3b08b-9524-4d1c-a8a2-19c0745ad290', 'tes tes', 'tes-tes-', '<p style=\"margin: 0.5em 0px 1em; color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 2;\">Setelah tamat dari sekolah kedokteran tahun&nbsp;<a style=\"text-decoration-line: none; color: #3366cc; background: none; overflow-wrap: break-word;\" title=\"1942\" href=\"https://id.wikipedia.org/wiki/1942\">1942</a>, ia bekerja di bagian Penyakit Dalam&nbsp;<a class=\"mw-redirect\" style=\"text-decoration-line: none; color: #3366cc; background: none; overflow-wrap: break-word;\" title=\"RSCM\" href=\"https://id.wikipedia.org/wiki/RSCM\">CBZ, Jakarta</a>. Setelah kemerdekaan RI, ia melanjutkan kariernya di RS Bethesda&nbsp;<a style=\"text-decoration-line: none; color: #3366cc; background: none; overflow-wrap: break-word;\" title=\"Daerah Istimewa Yogyakarta\" href=\"https://id.wikipedia.org/wiki/Daerah_Istimewa_Yogyakarta\">Yogyakarta</a>&nbsp;bagian penyakit anak. Tahun&nbsp;<a style=\"text-decoration-line: none; color: #3366cc; background: none; overflow-wrap: break-word;\" title=\"1951\" href=\"https://id.wikipedia.org/wiki/1951\">1951</a>&nbsp;ia memulai kariernya di Kementerian Kesehatan. Di situ ia menjabat berbagai posisi yaitu Kepala bagian Kesejahteraan Ibu dan Anak, Kepala Hubungan Luar Negeri, Wakil Kepala Bagian Pendidikan, Kepala Bagian Kesehatan Masyarakat Desa dan Pendidikan Kesehatan Rakyat, dan Kepala Planning Board.</p>\r\n<p style=\"margin: 0.5em 0px 1em; color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 2;\">Tahun&nbsp;<a style=\"text-decoration-line: none; color: #3366cc; background: none; overflow-wrap: break-word;\" title=\"1967\" href=\"https://id.wikipedia.org/wiki/1967\">1967</a>, Julie diangkat menjadi Direktur Jenderal Pencegahan, Pemberantasan dan Pembasmian Penyakit Menular (P4M) dan merangkap Ketua Research Kesehatan Nasional (LRKN) Departemen Kesehatan. Pada tahun&nbsp;<a style=\"text-decoration-line: none; color: #3366cc; background: none; overflow-wrap: break-word;\" title=\"1969\" href=\"https://id.wikipedia.org/wiki/1969\">1969</a>, ia dikukuhkan sebagai Profesor pada&nbsp;<a style=\"text-decoration-line: none; color: #3366cc; background: none; overflow-wrap: break-word;\" title=\"Universitas Airlangga\" href=\"https://id.wikipedia.org/wiki/Universitas_Airlangga\">Universitas Airlangga</a>&nbsp;<a class=\"mw-redirect\" style=\"text-decoration-line: none; color: #3366cc; background: none; overflow-wrap: break-word;\" title=\"Surabaya\" href=\"https://id.wikipedia.org/wiki/Surabaya\">Surabaya</a>&nbsp;dengan mengucapkan pidato pengukuhan \"Pendekatan Epidemiologis dalam Menanggulangi Penyakit\".</p>\r\n<p style=\"margin: 0.5em 0px 1em; color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 2;\">Pada tahun&nbsp;<a style=\"text-decoration-line: none; color: #3366cc; background: none; overflow-wrap: break-word;\" title=\"1975\" href=\"https://id.wikipedia.org/wiki/1975\">1975</a>, Julie mengundurkan diri dari jabatannya sebagai Dirjen P4M dan diangkat menjadi Kepala Badan Penelitian dan Pengembangan Kesehatan Departemen Kesehatan sampai dengan tahun&nbsp;<a style=\"text-decoration-line: none; color: #3366cc; background: none; overflow-wrap: break-word;\" title=\"1978\" href=\"https://id.wikipedia.org/wiki/1978\">1978</a>. Pada tahun 1978 ia diangkat menjadi anggota tim perumus dan evaluasi Program Utama Nasional Bidang Ristek yang diperbantukan pada Menteri Negara Ristek. Dan pada tanggal&nbsp;<a style=\"text-decoration-line: none; color: #3366cc; background: none; overflow-wrap: break-word;\" title=\"1 Januari\" href=\"https://id.wikipedia.org/wiki/1_Januari\">1 Januari</a>&nbsp;<a style=\"text-decoration-line: none; color: #3366cc; background: none; overflow-wrap: break-word;\" title=\"1979\" href=\"https://id.wikipedia.org/wiki/1979\">1979</a>&nbsp;ia diangkat menjadi staf ahli Menteri Kesehatan. Pada tahun&nbsp;<a style=\"text-decoration-line: none; color: #3366cc; background: none; overflow-wrap: break-word;\" title=\"1979\" href=\"https://id.wikipedia.org/wiki/1979\">1979</a>&nbsp;ia ditunjuk sebagai anggota&nbsp;<em>Board of Trustess of the International Center of Diarrhea Disease Research</em>&nbsp;<a style=\"text-decoration-line: none; color: #3366cc; background: none; overflow-wrap: break-word;\" title=\"Bangladesh\" href=\"https://id.wikipedia.org/wiki/Bangladesh\">Bangladesh</a>&nbsp;dan menjabat&nbsp;<em>Chairman of the Board</em>&nbsp;selama setahun dari&nbsp;<a style=\"text-decoration-line: none; color: #3366cc; background: none; overflow-wrap: break-word;\" title=\"1979\" href=\"https://id.wikipedia.org/wiki/1979\">1979</a>&nbsp;sampai&nbsp;<a style=\"text-decoration-line: none; color: #3366cc; background: none; overflow-wrap: break-word;\" title=\"1980\" href=\"https://id.wikipedia.org/wiki/1980\">1980</a>. Pada tahun 1981 menjadi penasehat Proyek Perintis Bina Keluarga dan Balita di bawah Menteri Muda Urusan Peranan Wanita. Pada tahun 1982 diangkat menjadi Dosen pada Lembaga Kedokteran Gigi Dinas Kesehatan&nbsp;<a class=\"mw-redirect\" style=\"text-decoration-line: none; color: #3366cc; background: none; overflow-wrap: break-word;\" title=\"TNI Angkatan Laut\" href=\"https://id.wikipedia.org/wiki/TNI_Angkatan_Laut\">Angkatan Laut</a>.</p>\r\n<p style=\"margin: 0.5em 0px 1em; color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 2;\">Julie juga pernah menjabat Ketua Gugus Tugas Penyusunan Rencana Lima tahun PELITA II sektor Kesehatan, pernah mewakili Pemerintah RI dalam sidang-sidang Internasional di Bidang Kesehatan, menjadi anggota&nbsp;<a class=\"mw-redirect\" style=\"text-decoration-line: none; color: #3366cc; background: none; overflow-wrap: break-word;\" title=\"WHO\" href=\"https://id.wikipedia.org/wiki/WHO\">WHO</a>&nbsp;Expert Committee of Maternity and Child Health, anggota Komisi PBB Community Development di Negara-negara&nbsp;<a style=\"text-decoration-line: none; color: #3366cc; background: none; overflow-wrap: break-word;\" title=\"Afrika\" href=\"https://id.wikipedia.org/wiki/Afrika\">Afrika</a>, anggota Honorary Society on Public Health Delta Omega, anggota WHO Expert Committee of Internasional Surveilance of Communicable Diseases, anggota Komisi Nasional Kedudukan Wanita Indonesia, President of the World Health Assembly dan anggota Badan Eksekutif WHO.</p>', 'DOaK0DIwk7uN3NNnZlVxyMyBcx2YfLCsdJ8nqe5g.jpg', 'Arsip', '2024-01-17 11:29:02', '2024-02-05 09:55:12', NULL);
INSERT INTO `berita` VALUES ('535b7850-1b46-41ae-af10-5f072ab77775', '2e482dc3-e8ef-41a9-bd68-dbaeabab6bf4', '10a3b08b-9524-4d1c-a8a2-19c0745ad290', 'awda', 'awda', '<p>tesss</p>', 'auc5le4L0S077v6u4yfGcH9z9wMyfeTgwbDsMqEM.jpg', 'Arsip', '2024-02-02 15:12:50', '2024-02-02 15:12:50', NULL);
INSERT INTO `berita` VALUES ('5ab99de2-e848-45c1-8293-08155f081324', '2e482dc3-e8ef-41a9-bd68-dbaeabab6bf4', 'a816b36e-d2f0-4ab7-9149-4b9bc802d18e', 'asdasda', 'asdasda', '<p style=\"text-align: justify;\"><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">Dia lulus sekolah kedokterannya tahun&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"1942\" href=\"https://id.wikipedia.org/wiki/1942\">1942</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;dari GHS (sekolah tinggi kedokteran) di&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"Batavia\" href=\"https://id.wikipedia.org/wiki/Batavia\">Batavia</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;(</span><a class=\"mw-redirect\" style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"\" href=\"https://id.wikipedia.org/wiki/Jakarta\">Jakarta</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">). Kemudian ia meneruskan pendidikannya di Inggris, Skandinavia, Amerika Serikat dan Malaya selama 2 tahun (</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"1950\" href=\"https://id.wikipedia.org/wiki/1950\">1950</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;sampai&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"1951\" href=\"https://id.wikipedia.org/wiki/1951\">1951</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">) dan mendapatkan&nbsp;</span><em style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">Certificate of Public Health Administrasion</em><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;dari&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"Universitas London\" href=\"https://id.wikipedia.org/wiki/Universitas_London\">Universitas London</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">. Pada tahun&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"1962\" href=\"https://id.wikipedia.org/wiki/1962\">1962</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;ia memperoleh gelar MPH (</span><em style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">Master of Public Health</em><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">) dan TM (</span><em style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">Tropical Medicine</em><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">), kemudian memperoleh gelar&nbsp;</span><em style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">Doctor of Public Health</em><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;(Epidemiologi) tahun&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"1965\" href=\"https://id.wikipedia.org/wiki/1965\">1965</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;setelah mempertahankan disertasi yang berjudul&nbsp;</span><em style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">The Natural History of Enteropathogenic Escherechia Coli Infections</em><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;di Tulane Medical School,&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"New Orleans\" href=\"https://id.wikipedia.org/wiki/New_Orleans\">New Orleans</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">,&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"Louisiana\" href=\"https://id.wikipedia.org/wiki/Louisiana\">Louisiana</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">,&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"Amerika Serikat\" href=\"https://id.wikipedia.org/wiki/Amerika_Serikat\">Amerika Serikat</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">.MKHJH</span></p>', 'MjRqpApgjmCmKLOIZ4s5GQzHKMnPMJ195RrBc3Fl.jpg', 'Publik', '2024-01-17 11:44:39', '2024-01-17 11:44:39', NULL);
INSERT INTO `berita` VALUES ('a9222ff2-0a34-4037-b52a-d17e730920bd', '2e482dc3-e8ef-41a9-bd68-dbaeabab6bf4', 'a816b36e-d2f0-4ab7-9149-4b9bc802d18e', 'teasdasd asdas dasdas das das asdasd', 'teasdasd-asdas-dasdas-das-das-asdasd', '<p style=\"text-align: justify;\"><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">Dia lulus sekolah kedokterannya tahun&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"1942\" href=\"https://id.wikipedia.org/wiki/1942\">1942</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;dari GHS (sekolah tinggi kedokteran) di&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"Batavia\" href=\"https://id.wikipedia.org/wiki/Batavia\">Batavia</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;(</span><a class=\"mw-redirect\" style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"Jakarta\" href=\"https://id.wikipedia.org/wiki/Jakarta\">Jakarta</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">). Kemudian ia meneruskan pendidikannya di Inggris, Skandinavia, Amerika Serikat dan Malaya selama 2 tahun (</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"1950\" href=\"https://id.wikipedia.org/wiki/1950\">1950</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;sampai&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"1951\" href=\"https://id.wikipedia.org/wiki/1951\">1951</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">) dan mendapatkan&nbsp;</span><em style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">Certificate of Public Health Administrasion</em><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;dari&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"Universitas London\" href=\"https://id.wikipedia.org/wiki/Universitas_London\">Universitas London</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">. Pada tahun&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"1962\" href=\"https://id.wikipedia.org/wiki/1962\">1962</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;ia memperoleh gelar MPH (</span><em style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">Master of Public Health</em><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">) dan TM (</span><em style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">Tropical Medicine</em><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">), kemudian memperoleh gelar&nbsp;</span><em style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">Doctor of Public Health</em><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;(Epidemiologi) tahun&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"1965\" href=\"https://id.wikipedia.org/wiki/1965\">1965</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;setelah mempertahankan disertasi yang berjudul&nbsp;</span><em style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">The Natural History of Enteropathogenic Escherechia Coli Infections</em><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;di Tulane Medical School,&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"New Orleans\" href=\"https://id.wikipedia.org/wiki/New_Orleans\">New Orleans</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">,&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"Louisiana\" href=\"https://id.wikipedia.org/wiki/Louisiana\">Louisiana</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">,&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"Amerika Serikat\" href=\"https://id.wikipedia.org/wiki/Amerika_Serikat\">Amerika Serikat</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">.MKHJH</span></p>', 'wEG4IeL3qnJTcoXqsUeRVmCjyZPqfiDkiSZnrhbS.jpg', 'Publik', '2024-01-17 09:59:54', '2024-01-17 11:41:24', NULL);
INSERT INTO `berita` VALUES ('e0cbc3f5-1b33-4ae1-ac50-41d71a2e5da7', '2e482dc3-e8ef-41a9-bd68-dbaeabab6bf4', '10a3b08b-9524-4d1c-a8a2-19c0745ad290', 'asdasdasd asdasd asda sds', 'asdasdasd-asdasd-asda-sds', '<p style=\"text-align: justify;\"><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">Dia lulus sekolah kedokterannya tahun&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"1942\" href=\"https://id.wikipedia.org/wiki/1942\">1942</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;dari GHS (sekolah tinggi kedokteran) di&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"Batavia\" href=\"https://id.wikipedia.org/wiki/Batavia\">Batavia</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;(</span><a class=\"mw-redirect\" style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"\" href=\"https://id.wikipedia.org/wiki/Jakarta\">Jakarta</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">). Kemudian ia meneruskan pendidikannya di Inggris, Skandinavia, Amerika Serikat dan Malaya selama 2 tahun (</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"1950\" href=\"https://id.wikipedia.org/wiki/1950\">1950</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;sampai&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"1951\" href=\"https://id.wikipedia.org/wiki/1951\">1951</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">) dan mendapatkan&nbsp;</span><em style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">Certificate of Public Health Administrasion</em><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;dari&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"Universitas London\" href=\"https://id.wikipedia.org/wiki/Universitas_London\">Universitas London</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">. Pada tahun&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"1962\" href=\"https://id.wikipedia.org/wiki/1962\">1962</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;ia memperoleh gelar MPH (</span><em style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">Master of Public Health</em><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">) dan TM (</span><em style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">Tropical Medicine</em><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">), kemudian memperoleh gelar&nbsp;</span><em style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">Doctor of Public Health</em><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;(Epidemiologi) tahun&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"1965\" href=\"https://id.wikipedia.org/wiki/1965\">1965</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;setelah mempertahankan disertasi yang berjudul&nbsp;</span><em style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">The Natural History of Enteropathogenic Escherechia Coli Infections</em><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;di Tulane Medical School,&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"New Orleans\" href=\"https://id.wikipedia.org/wiki/New_Orleans\">New Orleans</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">,&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"Louisiana\" href=\"https://id.wikipedia.org/wiki/Louisiana\">Louisiana</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">,&nbsp;</span><a style=\"text-decoration-line: none; color: #3366cc; background: none #ffffff; overflow-wrap: break-word; font-family: sans-serif; font-size: 14px;\" title=\"Amerika Serikat\" href=\"https://id.wikipedia.org/wiki/Amerika_Serikat\">Amerika Serikat</a><span style=\"color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">.MKHJH</span></p>', 'I3EbBe580YyMGlluNncleHwk3TgW53IPXkv7LChe.jpg', 'Publik', '2024-01-17 11:44:55', '2024-01-17 11:44:55', NULL);

-- ----------------------------
-- Table structure for berita_kategori
-- ----------------------------
DROP TABLE IF EXISTS `berita_kategori`;
CREATE TABLE `berita_kategori`  (
  `BERITA_KATEGORI_ID` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `BERITA_KATEGORI` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `BERITA_KATEGORI_SLUG` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`BERITA_KATEGORI_ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of berita_kategori
-- ----------------------------
INSERT INTO `berita_kategori` VALUES ('10a3b08b-9524-4d1c-a8a2-19c0745ad290', 'hightlight news 2024', 'hightlight-news-2024', '2024-01-15 09:35:08', '2024-01-15 09:35:08', NULL);
INSERT INTO `berita_kategori` VALUES ('a816b36e-d2f0-4ab7-9149-4b9bc802d18e', 'berita covid 19', 'berita-covid-19', '2024-01-15 09:34:49', '2024-01-15 09:34:49', NULL);
INSERT INTO `berita_kategori` VALUES ('cb70c5dd-e30f-4b83-90d3-b21dbfe57332', 'ini adalah tag testing ubah', 'ini-adalah-tag-testing-ubah', '2024-02-05 10:16:24', '2024-02-05 10:16:34', NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for history_file
-- ----------------------------
DROP TABLE IF EXISTS `history_file`;
CREATE TABLE `history_file`  (
  `HISTORY_ID` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `HISTORY_PROPOSAL_ID` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `HISTORY_FILE` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `HISTORY_KETERANGAN` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `HISTORY_USER_ID` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`HISTORY_ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of history_file
-- ----------------------------
INSERT INTO `history_file` VALUES ('3d75c502-6612-4d79-9d6f-e43a898ce201', '43e7cc00-d28e-4048-98fd-96f64341c276', '18092024135317_php.pdf', 'Revisi Proposal', '840b9b6d-d8ce-4c1a-bfa2-a8a9acbae93f', '2024-09-18 14:10:25', '2024-09-18 14:10:25', NULL);
INSERT INTO `history_file` VALUES ('c4091382-dfeb-4dec-9200-66968296cdc2', '43e7cc00-d28e-4048-98fd-96f64341c276', '18092024135317_php.pdf', 'Pengajuan Awal', '840b9b6d-d8ce-4c1a-bfa2-a8a9acbae93f', '2024-09-18 13:53:17', '2024-09-18 13:53:17', NULL);
INSERT INTO `history_file` VALUES ('ce361bf5-c464-4e01-bce2-cb65d9feb5d7', '9b892117-dc70-4db4-b353-de53a3006671', '11102024110505_php.pdf', 'Pengajuan Awal', '2e482dc3-e8ef-41a9-bd68-dbaeabab6bf4', '2024-10-11 11:05:06', '2024-10-11 11:05:06', NULL);

-- ----------------------------
-- Table structure for informasi_kontak
-- ----------------------------
DROP TABLE IF EXISTS `informasi_kontak`;
CREATE TABLE `informasi_kontak`  (
  `INFO_ID` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `SAMBUTAN_BERANDA` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `DESKRIPSI_AGENDA` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `DESKRIPSI_TENTANGKAMI` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `DESKRIPSI_SINGKAT_POINTPLUS` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `DESKRIPSI_SINGKAT_EVENT_BERANDA` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `DESKRIPSI_SINGKAT_EVENT` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `DESKRIPSI_SINGKAT_TESTIMONY` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `DESKRIPSI_SINGKAT_AGENDA` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `DESKRIPSI_SINGKAT_BERITA` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `DESKRIPSI_BIAYA` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `TELEPON` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `FAX` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `CALLCENTER` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `HOTLINE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `EMAIL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `FACEBOOK` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `INSTAGRAM` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `TWITTER` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `WHATSAPP` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ALAMAT` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `DESKRIPSI_ALAMAT` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `CP_KAJI_ETIK` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `CP_PKS` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `CP_MTA` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `CP_KERAHASIAAN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `WA_KAJI_ETIK` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `WA_PKS` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `WA_MTA` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `WA_KERAHASIAAN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `PEMILIK_REKENING` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `NOMOR_REKENING` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `NAMA_BANK` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `LOGO_BANK` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`INFO_ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of informasi_kontak
-- ----------------------------
INSERT INTO `informasi_kontak` VALUES ('001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Biaya tarif persetujuan Etik Penelitian sesuai dengan SK Direktur Utama RSPI - SS Nomor: HK.02.04/VII/653/2014 dan dibayarkan melalui Bank Mandiri Cabang Sunter Permai an. RSPI Prof Dr. Sulianti Saroso di Nomor Rekening 1200044544547.</p>\r\n<p>&nbsp;</p>\r\n<p>Kegiatan Penelitian Eksternal&nbsp;</p>\r\n<p>Penelitian Pendidikan&nbsp;</p>\r\n<p>DIII Rp. 100.000,-</p>\r\n<p>S1&nbsp; &nbsp;Rp. 150.000,-</p>\r\n<p>S2&nbsp; &nbsp;Rp. 200.000,- / Rp.&nbsp; &nbsp; 500.000,- (Fullboard)</p>\r\n<p>S3&nbsp; &nbsp;Rp. 500.000,- / Rp. 1.000.000,- (Fullboard)</p>\r\n<p>Penelitian Non Pendidikan&nbsp;</p>\r\n<p>Penelitian dengan sponsor Dalam Negeri Rp. 2.500.000,-</p>\r\n<p>Penelitian dengan sponsor Luar Negeri&nbsp; &nbsp; &nbsp;Rp. 5.000.000,-</p>\r\n<p>&nbsp;</p>\r\n<p>Biaya tarif Kegiatan Penelitian sesuai dengan SK Direktur Utama RSPI-SS Nomor: HK.02.03/XXXVIII/2893/2022 dan dibayarkan melalui Bank Mandiri Cabang Sunter Permai an. RSPI Prof Dr. Sulianti Saroso di Nomor Rekening 1200044544547.</p>\r\n<p>&nbsp;</p>\r\n<p>Biaya Administrasi Penelitian Pendidikan&nbsp;</p>\r\n<p>Mahasiswa D-III&nbsp; &nbsp; &nbsp; &nbsp; Rp. 200.000,-</p>\r\n<p>Mahasiswa D-IV&nbsp; &nbsp; &nbsp; &nbsp; Rp. 250.000,-</p>\r\n<p>Mahasiswa S1&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Rp. 400.000,-</p>\r\n<p>Mahasiswa S2/PPDS Rp. 600.000,-</p>\r\n<p>Mahasiswa S3&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Rp. 750.000,-</p>\r\n<p>&nbsp;</p>\r\n<p>Biaya Administrasi Penelitian dari Badan/ Institusi&nbsp;</p>\r\n<p>- Badan/Instansi pemerintah baik Pendidikan maupun Non Pendidikan (Rp. 2.000.000,-)</p>\r\n<p>- Badan/Instansi pendidikan Swasta Dalam Negeri (Rp. 3.000.000,-)</p>\r\n<p>- Badan/Instansi Non Pendidikan Swasta dan Luar Negeri (Disesuaikan dengan TOR/RAB)</p>', '021-6506559 ext 3119', '021-123-456', '021-333-444', '021-334455', 'timkerjapenelitianrspiss@gmail.com', '@facebook', '@instagram', '@twitter', '0812345678', NULL, NULL, 'Ade Septya Dara', 'Gusmi Kurniasih', 'Gusmi Kurniasih', 'Kunti Wijiarti', '089653773269', '08567126315', '08567126315', '081384526455', 'RSPI Sulianti Saroso', '12000-445445-47', 'Mandiri', '', '2024-01-09 09:19:27', '2024-06-11 13:22:37', NULL);

-- ----------------------------
-- Table structure for laporan_penelitian
-- ----------------------------
DROP TABLE IF EXISTS `laporan_penelitian`;
CREATE TABLE `laporan_penelitian`  (
  `PENELITIAN_ID` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROPOSAL_ID` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `PENELITIAN_LAPORAN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PENELITIAN_RAW_DATA` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PENELITIAN_SURAT_IZIN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PENELITIAN_USER_ID` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `PENELITIAN_STATUS` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PENELITIAN_ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of laporan_penelitian
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 182 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_tables', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_08_22_094721_unit_layanan', 1);
INSERT INTO `migrations` VALUES (7, '2020_10_07_043855_create_permission_tables', 2);
INSERT INTO `migrations` VALUES (8, '2020_10_29_112348_create_penjamin', 3);
INSERT INTO `migrations` VALUES (10, '2020_11_03_040755_create_bap', 5);
INSERT INTO `migrations` VALUES (11, '2020_11_03_041126_create_pencairan', 6);
INSERT INTO `migrations` VALUES (15, '2020_10_09_141033_create_pelayanan', 7);
INSERT INTO `migrations` VALUES (22, '2020_10_31_033231_create_pengajuan_klaim', 8);
INSERT INTO `migrations` VALUES (23, '2020_12_03_040631_create_item_pengajuanklaim', 8);
INSERT INTO `migrations` VALUES (25, '2020_12_28_063437_create_penagihan', 10);
INSERT INTO `migrations` VALUES (26, '2021_01_07_041448_create_penagihan_umum', 11);
INSERT INTO `migrations` VALUES (27, '2021_02_13_065938_saldo_awal', 12);
INSERT INTO `migrations` VALUES (28, '2021_02_16_015223_create_rkakl', 13);
INSERT INTO `migrations` VALUES (29, '2021_02_17_012908_create_item_rkakl', 13);
INSERT INTO `migrations` VALUES (30, '2021_03_02_011912_create_sumber_dana', 13);
INSERT INTO `migrations` VALUES (31, '2021_03_02_011925_create_output', 13);
INSERT INTO `migrations` VALUES (32, '2021_03_02_011936_create_komponen', 13);
INSERT INTO `migrations` VALUES (33, '2021_03_02_011945_create_akun', 13);
INSERT INTO `migrations` VALUES (35, '2021_03_09_020713_lv1_histori_sumberdana', 13);
INSERT INTO `migrations` VALUES (36, '2021_03_09_023403_lv2_histori_output', 13);
INSERT INTO `migrations` VALUES (37, '2021_03_09_031541_lv3_histori_komponen', 13);
INSERT INTO `migrations` VALUES (38, '2021_03_09_032727_lv4_histori_akun', 13);
INSERT INTO `migrations` VALUES (40, '2021_03_02_011953_create_kegiatan', 14);
INSERT INTO `migrations` VALUES (41, '2021_03_09_032738_lv5_histori_kegiatan', 14);
INSERT INTO `migrations` VALUES (44, '2021_06_10_073522_create_cicilan_jaminan', 15);
INSERT INTO `migrations` VALUES (45, '2021_06_10_073535_create_cicilan_nonjaminan', 15);
INSERT INTO `migrations` VALUES (47, '2020_12_22_005435_nonjaminan', 16);
INSERT INTO `migrations` VALUES (48, '2021_07_17_144001_create_transaksi_jaminan', 17);
INSERT INTO `migrations` VALUES (50, '2021_07_18_132643_create_transaksi_nonjaminan', 18);
INSERT INTO `migrations` VALUES (51, '2021_07_28_125202_create_penggolongan_jaminan', 19);
INSERT INTO `migrations` VALUES (52, '2021_07_28_125422_create_penggolongan_nonjaminan', 19);
INSERT INTO `migrations` VALUES (53, '2021_09_30_030520_create_level_rkakl', 20);
INSERT INTO `migrations` VALUES (59, '2021_10_01_062834_create_master_rkakl', 21);
INSERT INTO `migrations` VALUES (60, '2021_10_01_063339_create_items_rkakl', 21);
INSERT INTO `migrations` VALUES (61, '2021_11_21_024604_create_histori_itemsv3rkakl', 22);
INSERT INTO `migrations` VALUES (103, '2022_01_10_012748_create_checklist_ppk', 23);
INSERT INTO `migrations` VALUES (104, '2022_01_10_012800_create_checklist_kontrak', 23);
INSERT INTO `migrations` VALUES (105, '2022_01_10_012811_create_checklist_penerima', 23);
INSERT INTO `migrations` VALUES (106, '2022_01_10_012817_create_checklist_bast', 23);
INSERT INTO `migrations` VALUES (107, '2022_01_10_012822_create_checklist_kwitansi', 23);
INSERT INTO `migrations` VALUES (108, '2022_01_10_012824_create_checklist_ppspm', 23);
INSERT INTO `migrations` VALUES (109, '2022_01_10_012842_create_checklist_invoice', 23);
INSERT INTO `migrations` VALUES (110, '2022_01_10_012848_create_checklist_suratjalan', 23);
INSERT INTO `migrations` VALUES (111, '2022_01_10_012858_create_checklistmaster', 23);
INSERT INTO `migrations` VALUES (112, '2022_01_10_012858_create_efaktur', 23);
INSERT INTO `migrations` VALUES (113, '2022_01_10_012859_create_checklist', 23);
INSERT INTO `migrations` VALUES (114, '2022_01_10_012910_create_checklist_trackrecord', 23);
INSERT INTO `migrations` VALUES (116, '2022_03_31_124702_create_pph21', 25);
INSERT INTO `migrations` VALUES (117, '2022_03_31_124704_create_pph22', 25);
INSERT INTO `migrations` VALUES (118, '2022_03_31_124706_create_pph23', 25);
INSERT INTO `migrations` VALUES (119, '2022_03_31_124726_create_setoranlain', 25);
INSERT INTO `migrations` VALUES (120, '2022_04_04_135826_create_ppn', 26);
INSERT INTO `migrations` VALUES (122, '2022_04_21_092152_create_persekot', 28);
INSERT INTO `migrations` VALUES (124, '2022_01_10_012840_create_monev_realisasi', 29);
INSERT INTO `migrations` VALUES (127, '2022_03_22_141013_create_spby', 30);
INSERT INTO `migrations` VALUES (129, '2022_03_22_141012_create_kode_trans', 31);
INSERT INTO `migrations` VALUES (130, '2022_03_22_141012_create_kode_transaksi', 31);
INSERT INTO `migrations` VALUES (132, '2020_08_22_095332_create_tindakan', 32);
INSERT INTO `migrations` VALUES (133, '2020_08_22_095734_create_benpen', 33);
INSERT INTO `migrations` VALUES (134, '2022_04_20_141639_create_bridge_pemindah_bukuan', 34);
INSERT INTO `migrations` VALUES (135, '2022_06_17_091248_create_coa', 34);
INSERT INTO `migrations` VALUES (137, '2022_06_28_143806_create_hutang', 35);
INSERT INTO `migrations` VALUES (141, '2022_08_05_145520_create_pemindahbukuan', 37);
INSERT INTO `migrations` VALUES (142, '2022_01_10_012841_create_dokumenlain', 38);
INSERT INTO `migrations` VALUES (143, '2022_09_26_101237_create_pasal4ayat2', 39);
INSERT INTO `migrations` VALUES (144, '2022_09_28_142348_create_kode_transaksi_penerimaan', 40);
INSERT INTO `migrations` VALUES (145, '2022_12_29_085102_create_kelengkapan_pajak', 41);
INSERT INTO `migrations` VALUES (147, '2023_02_14_152337_create_cobacoba', 42);
INSERT INTO `migrations` VALUES (150, '2023_02_13_111943_create_checklist_item_belanja', 43);
INSERT INTO `migrations` VALUES (151, '2022_07_04_095937_create_hutang_manual', 44);
INSERT INTO `migrations` VALUES (152, '2023_03_10_152421_create_hutang_item_belanja', 45);
INSERT INTO `migrations` VALUES (155, '2023_04_11_121038_create_checklist_item_belanja_termin', 46);
INSERT INTO `migrations` VALUES (157, '2023_06_20_094126_create_trans_benpen', 47);
INSERT INTO `migrations` VALUES (158, '2023_08_14_150726_create_uang_muka', 48);
INSERT INTO `migrations` VALUES (161, '2023_09_21_093611_create_uangmuka_item', 49);
INSERT INTO `migrations` VALUES (162, '2024_01_02_111349_create_events', 50);
INSERT INTO `migrations` VALUES (165, '2024_01_04_115339_create_order_event', 51);
INSERT INTO `migrations` VALUES (166, '2024_01_04_115352_create_itemorder_event', 51);
INSERT INTO `migrations` VALUES (169, '2014_10_12_000000_create_users_table', 52);
INSERT INTO `migrations` VALUES (170, '2024_01_09_090838_create_informasi_kontak', 53);
INSERT INTO `migrations` VALUES (171, '2024_01_09_104328_create_testimony', 54);
INSERT INTO `migrations` VALUES (172, '2024_01_10_111952_create_gambar', 55);
INSERT INTO `migrations` VALUES (173, '2024_01_12_103201_create_keunggulan', 56);
INSERT INTO `migrations` VALUES (174, '2024_01_15_085204_create_berita_kategori', 57);
INSERT INTO `migrations` VALUES (175, '2024_01_15_085218_create_berita', 57);
INSERT INTO `migrations` VALUES (176, '2024_01_24_103443_create_resetpassword', 58);
INSERT INTO `migrations` VALUES (177, '2024_02_19_083153_create_pengajuan_penelitian', 59);
INSERT INTO `migrations` VALUES (178, '2024_03_01_091916_create_proposal', 60);
INSERT INTO `migrations` VALUES (179, '2024_03_04_114450_create_laporan_penelitian', 61);
INSERT INTO `migrations` VALUES (180, '2024_04_16_105305_create_history_file', 62);
INSERT INTO `migrations` VALUES (181, '2024_04_16_105455_create_trace_track_proposal', 63);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', '0528f4f7-61ba-4996-83b7-9b92f9770508');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', '08f27297-d73e-45e3-b486-419eb54f2933');
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', '1');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', '241f5f73-2376-4b4f-96da-4008974905a0');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', '24b2da6c-786b-4793-8cda-262e3ab0fcc5');
INSERT INTO `model_has_roles` VALUES (36, 'App\\User', '2e482dc3-e8ef-41a9-bd68-dbaeabab6bf4');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', '46b6006e-23ac-4830-9112-b4d991e64ab9');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', '593d19c9-903a-40e2-b14e-df98493a46b0');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', '5e38ade4-cd33-4124-a3d4-198602efe62a');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', '6084f161-b18d-4211-829a-4e11e18aab9d');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', '65cf4508-1f41-42e6-8665-2db192b48ef7');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', '6a1345ce-afb0-4d3a-9858-8c947c08d449');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', '7045d9e7-19e9-4329-80c9-e1a7bd33fe1f');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', '74f8f66b-e1c2-4d40-b677-618910a7ad62');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', '76dad95f-36a5-4a20-9c82-90d03ff91a75');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', '802a2bab-5756-4d43-a838-5acb22f78a7b');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', '840b9b6d-d8ce-4c1a-bfa2-a8a9acbae93f');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', '893294ed-3117-4c98-8a36-7a1f8006db20');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', '94c3ec22-65a6-4431-9b57-9520f1b5815a');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', '94f8c64b-3035-44da-b33c-60176137f3d0');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', '98ad78fd-6dff-41ce-9418-6a9b8d8e2149');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', '9b524602-0876-4367-a24f-65cf231fb1af');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', 'a3b55b1d-48dc-4a15-b987-75fb5e6cde3c');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', 'bb7ea0f7-3936-42a1-b699-61a93a88642a');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', 'cf51f3bb-fde4-4e12-ac8e-3c6dadc6b72c');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', 'd1ba4276-d33a-460b-aa9a-cd016819f98c');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', 'd4412b6c-7425-42f0-8365-6d654cde2630');
INSERT INTO `model_has_roles` VALUES (35, 'App\\User', 'ef9c224a-f474-4e0f-b670-88abce00c34d');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 86 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (4, 'Manage All User Plus Role Permission', 'web', '2020-10-11 15:04:33', '2020-10-11 15:04:33');
INSERT INTO `permissions` VALUES (78, 'Visitor - Pengajuan saya', 'web', '2024-02-22 09:59:30', '2024-02-22 09:59:30');
INSERT INTO `permissions` VALUES (80, 'Operator - Antrian Pengajuan Proposal', 'web', '2024-03-01 08:59:19', '2024-03-04 08:06:00');
INSERT INTO `permissions` VALUES (83, 'Operator - Riwayat Proposal', 'web', '2024-03-19 09:49:02', '2024-03-19 09:49:02');
INSERT INTO `permissions` VALUES (84, 'Visitor - Riwayat Pengajuan', 'web', '2024-03-27 11:20:48', '2024-03-27 11:20:48');

-- ----------------------------
-- Table structure for proposal
-- ----------------------------
DROP TABLE IF EXISTS `proposal`;
CREATE TABLE `proposal`  (
  `PROPOSAL_ID` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROPOSAL_NOMOR` bigint NULL DEFAULT NULL,
  `PROPOSAL_KODE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PROPOSAL_PENELITI_UTAMA` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PROPOSAL_TIM_PENELITI` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `PROPOSAL_JUDUL_PENELITIAN` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `PROPOSAL_SURAT_PENGANTAR` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PROPOSAL_PROPOSAL_PENELITIAN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PROPOSAL_KAJI_ETIK` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PROPOSAL_RAW_DATA_PENELITIAN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PROPOSAL_SERTIFIKAT_GCP` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PROPOSAL_KAJI_ETIK_RSPI` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `PROPOSAL_PKS` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `PROPOSAL_MTA` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `PROPOSAL_KERAHASIAAN` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `PROPOSAL_BUKTI_BAYAR` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `PROPOSAL_LAPORAN_PENELITIAN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PROPOSAL_IZIN_PENELITIAN_DRAFT` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `PROPOSAL_IZIN_PENELITIAN` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `PROPOSAL_INSTITUSI_ASAL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PROPOSAL_SURAT_TANGGAPAN` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `PROPOSAL_SURAT_PENOLAKAN` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `PROPOSAL_TAHAPAN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PROPOSAL_STATUS` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PROPOSAL_EMAIL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PROPOSAL_PHONE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PROPOSAL_USER_ID` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROPOSAL_TANGGAL_PRESENTASI` timestamp NULL DEFAULT NULL,
  `PROPOSAL_KATEGORI_PRESENTASI` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `PROPOSAL_MEDIA_PRESENTASI` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PROPOSAL_ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of proposal
-- ----------------------------
INSERT INTO `proposal` VALUES ('43e7cc00-d28e-4048-98fd-96f64341c276', 1, 'RSPISS001', 'tes', 'tes', 'tes', '18092024141025_php.pdf', '18092024141025_php.pdf', '18092024141025_php.pdf', '18092024142107_Book1.xlsx', '18092024141025_php.pdf', '18092024141156_php.pdf', NULL, '18092024141156_php.pdf', '18092024141156_php.pdf', '18092024141556_contoh api.jpg', '18092024142107_php.pdf', '18092024141644_php.pdf', '18092024142130_php.pdf', 'rspi', NULL, NULL, '5', 'Penelitian Selesai', 'pipu@gmail.com', '081234', '840b9b6d-d8ce-4c1a-bfa2-a8a9acbae93f', '2024-09-03 23:00:00', 'Luring', 'rspi', '2024-09-18 13:53:17', '2024-09-18 14:21:30', NULL);
INSERT INTO `proposal` VALUES ('9b892117-dc70-4db4-b353-de53a3006671', 2, 'RSPISS002', 'tes', 'tes', 'tes', '11102024110505_php.pdf', '11102024110505_php.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rspi', '11102024143211_php.pdf', NULL, '1', 'Revisi Proposal', 'admin.rspi@gmail.com', '085265650292', '2e482dc3-e8ef-41a9-bd68-dbaeabab6bf4', '2024-10-01 12:00:00', 'Luring', 'rs', '2024-10-11 11:05:06', '2024-10-11 14:32:11', NULL);

-- ----------------------------
-- Table structure for resetpassword
-- ----------------------------
DROP TABLE IF EXISTS `resetpassword`;
CREATE TABLE `resetpassword`  (
  `RESET_ID` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `RESET_EMAIL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `RESET_TOKEN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `RESET_EXPIRE_AT` datetime NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`RESET_ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of resetpassword
-- ----------------------------

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (4, 1);
INSERT INTO `role_has_permissions` VALUES (78, 35);
INSERT INTO `role_has_permissions` VALUES (84, 35);
INSERT INTO `role_has_permissions` VALUES (80, 36);
INSERT INTO `role_has_permissions` VALUES (83, 36);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'superadmin', 'web', '2020-10-07 06:54:51', '2020-10-07 06:54:51');
INSERT INTO `roles` VALUES (35, 'visitor', 'web', '2024-01-02 09:42:56', '2024-01-02 09:42:56');
INSERT INTO `roles` VALUES (36, 'operator', 'web', '2024-01-02 09:43:08', '2024-01-02 09:43:08');

-- ----------------------------
-- Table structure for struktur_organisasi
-- ----------------------------
DROP TABLE IF EXISTS `struktur_organisasi`;
CREATE TABLE `struktur_organisasi`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `head` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `parent` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `child` int NULL DEFAULT NULL,
  `kode` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `jabatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 162 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of struktur_organisasi
-- ----------------------------
INSERT INTO `struktur_organisasi` VALUES (14, '1', NULL, 1, '1', 'Direktur Utama', '2023-08-09 08:40:43', '2023-08-09 08:40:43', NULL);
INSERT INTO `struktur_organisasi` VALUES (106, '2', '1', 1, '1.1', 'Ketua Dewan Pengawas', '2023-11-03 10:02:31', '2023-11-03 10:02:31', NULL);
INSERT INTO `struktur_organisasi` VALUES (107, '2', '1', 2, '1.2', 'Kepala Satuan Pemeriksa Internal', '2023-11-03 10:02:31', '2023-11-03 10:02:31', NULL);
INSERT INTO `struktur_organisasi` VALUES (108, '2', '1', 3, '1.3', 'Direktur SDM, Pendidikan dan Penelitian', '2023-11-03 10:02:31', '2023-11-03 10:02:31', NULL);
INSERT INTO `struktur_organisasi` VALUES (109, '2', '1', 4, '1.4', 'Direktur Perencanaan, Keuangan dan BMN', '2023-11-03 10:02:31', '2023-11-03 10:02:31', NULL);
INSERT INTO `struktur_organisasi` VALUES (110, '2', '1', 5, '1.5', 'Direktur Medik dan Keperawatan', '2023-11-03 10:02:31', '2023-11-03 10:02:31', NULL);
INSERT INTO `struktur_organisasi` VALUES (111, '2', '1', 6, '1.6', 'Ketua Komite Medik', '2023-11-03 10:02:31', '2023-11-03 10:02:31', NULL);
INSERT INTO `struktur_organisasi` VALUES (112, '2', '1', 7, '1.7', 'Ketua Komite Etik dan Hukum', '2023-11-03 10:02:31', '2023-11-03 10:02:31', NULL);
INSERT INTO `struktur_organisasi` VALUES (113, '2', '1', 8, '1.8', 'Ketua Komite Mutu Rumah Sakit', '2023-11-03 10:02:31', '2024-09-26 10:23:05', '2024-09-26 10:23:05');
INSERT INTO `struktur_organisasi` VALUES (114, '2', '1', 9, '1.9', 'Ketua Komite Keperawatan', '2023-11-03 10:02:31', '2024-09-26 10:22:59', '2024-09-26 10:22:59');
INSERT INTO `struktur_organisasi` VALUES (115, '2', '1', 10, '1.10', 'Ketua Komite Tenaga Kesehatan Lainnya', '2023-11-03 10:02:31', '2023-11-03 10:02:31', NULL);
INSERT INTO `struktur_organisasi` VALUES (116, '3', '1.5', 1, '1.5.1', 'Manajer Pelayanan Medik', '2023-11-03 10:06:09', '2023-11-03 10:06:09', NULL);
INSERT INTO `struktur_organisasi` VALUES (117, '3', '1.5', 2, '1.5.2', 'Manajer Pelayanan Keperawatan', '2023-11-03 10:06:09', '2023-11-03 10:06:09', NULL);
INSERT INTO `struktur_organisasi` VALUES (118, '3', '1.5', 3, '1.5.3', 'Manajer Pelayanan Penunjang', '2023-11-03 10:06:09', '2023-11-03 10:06:09', NULL);
INSERT INTO `struktur_organisasi` VALUES (119, '3', '1.5', 4, '1.5.4', 'Ketua KSM Psikiatri', '2023-11-03 10:06:09', '2023-11-03 10:06:09', NULL);
INSERT INTO `struktur_organisasi` VALUES (120, '3', '1.5', 5, '1.5.5', 'Ketua KSM Non Psikiatri', '2023-11-03 10:06:10', '2023-11-03 10:06:10', NULL);
INSERT INTO `struktur_organisasi` VALUES (121, '3', '1.5', 6, '1.5.6', 'Ketua KSM Umum', '2023-11-03 10:06:10', '2023-11-03 10:06:10', NULL);
INSERT INTO `struktur_organisasi` VALUES (122, '3', '1.5', 7, '1.5.7', 'Kepala Instalasi Farmasi', '2023-11-03 10:06:10', '2023-11-03 10:06:10', NULL);
INSERT INTO `struktur_organisasi` VALUES (123, '3', '1.5', 8, '1.5.8', 'Kepala Instalasi Rawat Inap Psikiatri Dewasa', '2023-11-03 10:06:10', '2023-11-03 10:06:10', NULL);
INSERT INTO `struktur_organisasi` VALUES (124, '3', '1.5', 9, '1.5.9', 'Kepala Instalasi Laboratorium', '2023-11-03 10:06:10', '2023-11-03 10:06:10', NULL);
INSERT INTO `struktur_organisasi` VALUES (125, '3', '1.5', 10, '1.5.10', 'Kepala Instalasi Gizi', '2023-11-03 10:06:10', '2023-11-03 10:06:10', NULL);
INSERT INTO `struktur_organisasi` VALUES (126, '3', '1.5', 11, '1.5.11', 'Kepala Instalasi Psikogeriatri', '2023-11-03 10:06:10', '2023-11-03 10:06:10', NULL);
INSERT INTO `struktur_organisasi` VALUES (127, '3', '1.5', 12, '1.5.12', 'Kepala Instalasi Rehabilitasi', '2023-11-03 10:06:10', '2023-11-03 10:06:10', NULL);
INSERT INTO `struktur_organisasi` VALUES (128, '3', '1.5', 13, '1.5.13', 'Kepala Instalasi Rawat Jalan Psikiatri Dewasa', '2023-11-03 10:06:10', '2023-11-03 10:06:10', NULL);
INSERT INTO `struktur_organisasi` VALUES (129, '3', '1.5', 14, '1.5.14', 'Kepala Instalasi Gawat Darurat', '2023-11-03 10:06:10', '2023-11-03 10:06:10', NULL);
INSERT INTO `struktur_organisasi` VALUES (130, '3', '1.5', 15, '1.5.15', 'Kepala Instalasi Radiologi', '2023-11-03 10:06:10', '2023-11-03 10:06:10', NULL);
INSERT INTO `struktur_organisasi` VALUES (131, '3', '1.5', 16, '1.5.16', 'Kepala Instalasi Psikiatri Anak dan Remaja', '2023-11-03 10:06:10', '2023-11-03 10:06:10', NULL);
INSERT INTO `struktur_organisasi` VALUES (132, '3', '1.5', 17, '1.5.17', 'Kepala Instalasi Elektromedik', '2023-11-03 10:06:10', '2023-11-03 10:06:10', NULL);
INSERT INTO `struktur_organisasi` VALUES (133, '3', '1.5', 18, '1.5.18', 'Kepala Instalasi Bedah Sentral', '2023-11-03 10:06:10', '2023-11-03 10:06:10', NULL);
INSERT INTO `struktur_organisasi` VALUES (134, '4', '1.5.1', 1, '1.5.1.1', 'Asisten Manajer Pelayanan Medik', '2023-11-03 10:07:09', '2023-11-03 10:07:09', NULL);
INSERT INTO `struktur_organisasi` VALUES (135, '4', '1.5.2', 1, '1.5.2.1', 'Asisten Manajer Pelayanan Keperawatan', '2023-11-03 10:07:26', '2023-11-03 10:07:26', NULL);
INSERT INTO `struktur_organisasi` VALUES (136, '4', '1.5.3', 1, '1.5.3.1', 'Asisten Manajer Pelayanan Penunjang', '2023-11-03 10:08:08', '2023-11-03 10:08:08', NULL);
INSERT INTO `struktur_organisasi` VALUES (137, '3', '1.3', 1, '1.3.1', 'Manajer Organisasi dan SDM', '2023-11-03 10:08:44', '2023-11-03 10:08:44', NULL);
INSERT INTO `struktur_organisasi` VALUES (138, '3', '1.3', 2, '1.3.2', 'Manajer Pendidikan dan Pelatihan', '2023-11-03 10:08:44', '2023-11-03 10:08:44', NULL);
INSERT INTO `struktur_organisasi` VALUES (139, '3', '1.3', 3, '1.3.3', 'Kepala Instalasi Pendidikan dan Penelitian', '2023-11-03 10:08:44', '2023-11-03 10:08:44', NULL);
INSERT INTO `struktur_organisasi` VALUES (140, '4', '1.3.1', 1, '1.3.1.1', 'Asisten Manajer Organisasi SDM', '2023-11-03 10:09:03', '2023-11-03 10:09:03', NULL);
INSERT INTO `struktur_organisasi` VALUES (141, '4', '1.3.2', 1, '1.3.2.1', 'Asisten Manajer Pendidikan dan Pelatihan', '2023-11-03 10:09:17', '2023-11-03 10:09:17', NULL);
INSERT INTO `struktur_organisasi` VALUES (142, '3', '1.4', 1, '1.4.1', 'Kepala Unit Layanan Pengadaan', '2023-11-03 10:13:30', '2023-11-03 10:13:30', NULL);
INSERT INTO `struktur_organisasi` VALUES (143, '3', '1.4', 2, '1.4.2', 'Manajer Perencanaan Program, Anggaran dan Evaluasi', '2023-11-03 10:13:31', '2023-11-03 10:13:31', NULL);
INSERT INTO `struktur_organisasi` VALUES (144, '3', '1.4', 3, '1.4.3', 'Manajer Pelaksanaan Keuangan', '2023-11-03 10:13:31', '2023-11-03 10:13:31', NULL);
INSERT INTO `struktur_organisasi` VALUES (145, '3', '1.4', 4, '1.4.4', 'Manajer Akuntansi dan BMN', '2023-11-03 10:13:31', '2023-11-03 10:13:31', NULL);
INSERT INTO `struktur_organisasi` VALUES (146, '3', '1.4', 5, '1.4.5', 'Manajer Hukum dan Hubungan Masyarakat', '2023-11-03 10:13:31', '2023-11-03 10:13:31', NULL);
INSERT INTO `struktur_organisasi` VALUES (147, '3', '1.4', 6, '1.4.6', 'Manajer Tata Usaha dan Rumah Tangga', '2023-11-03 10:13:31', '2023-11-03 10:13:31', NULL);
INSERT INTO `struktur_organisasi` VALUES (148, '3', '1.4', 7, '1.4.7', 'Kepala Instalasi Rekam Medik', '2023-11-03 10:13:31', '2023-11-03 10:13:31', NULL);
INSERT INTO `struktur_organisasi` VALUES (149, '3', '1.4', 8, '1.4.8', 'Kepala Instalasi Kesehatan Lingkungan dan K3RS', '2023-11-03 10:13:31', '2023-11-03 10:13:31', NULL);
INSERT INTO `struktur_organisasi` VALUES (150, '3', '1.4', 9, '1.4.9', 'Kepala Instalasi Verifikasi dan Penjamin Pasien', '2023-11-03 10:13:31', '2023-11-03 10:13:31', NULL);
INSERT INTO `struktur_organisasi` VALUES (151, '3', '1.4', 10, '1.4.10', 'Kepala Instalasi Keswamas dan PKRS', '2023-11-03 10:13:31', '2023-11-03 10:13:31', NULL);
INSERT INTO `struktur_organisasi` VALUES (152, '3', '1.4', 12, '1.4.12', 'Kepala Instalasi Sistem Informasi Manajemen Rumah Sakit', '2023-11-03 10:13:31', '2023-11-03 10:13:31', NULL);
INSERT INTO `struktur_organisasi` VALUES (153, '3', '1.4', 13, '1.4.13', 'Kepala Instalasi Pemeliharaan Sarana dan Prasarana RS', '2023-11-03 10:13:31', '2023-11-03 10:13:31', NULL);
INSERT INTO `struktur_organisasi` VALUES (154, '3', '1.4', 14, '1.4.14', 'Kepala Instalasi Sentralisasi Sentral dan Binatu', '2023-11-03 10:13:31', '2023-11-03 10:13:31', NULL);
INSERT INTO `struktur_organisasi` VALUES (155, '4', '1.4.2', 1, '1.4.2.1', 'Asisten Manajer Perencanaan Program, Anggaran dan Evaluasi', '2023-11-03 10:21:37', '2023-11-03 10:21:37', NULL);
INSERT INTO `struktur_organisasi` VALUES (156, '4', '1.4.3', 1, '1.4.3.1', 'Asisten Manajer Pelaksanaan Keuangan', '2023-11-03 10:21:56', '2023-11-03 10:21:56', NULL);
INSERT INTO `struktur_organisasi` VALUES (157, '4', '1.4.4', 1, '1.4.4.1', 'Asisten Manajer Akuntansi dan BMN', '2023-11-03 10:22:16', '2023-11-03 10:22:16', NULL);
INSERT INTO `struktur_organisasi` VALUES (158, '4', '1.4.5', 1, '1.4.5.1', 'Asisten Manajer Hukum dan Hubungan Masyarakat', '2023-11-03 10:22:35', '2023-11-03 10:22:35', NULL);
INSERT INTO `struktur_organisasi` VALUES (159, '4', '1.4.6', 1, '1.4.6.1', 'Asisten Manajer Usaha dan Rumah Tangga', '2023-11-03 10:22:52', '2023-11-03 10:22:52', NULL);
INSERT INTO `struktur_organisasi` VALUES (160, '3', '1.9', 1, '1.9.1', 'testing', '2023-11-03 10:37:04', '2023-11-03 10:37:30', '2023-11-03 10:37:30');

-- ----------------------------
-- Table structure for trace_track_proposal
-- ----------------------------
DROP TABLE IF EXISTS `trace_track_proposal`;
CREATE TABLE `trace_track_proposal`  (
  `TRACK_ID` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TRACK_PROPOSAL_ID` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `TRACK_TAHAPAN` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `TRACK_STATUS` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `TRACK_KETERANGAN` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `TRACK_USER_ID` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`TRACK_ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of trace_track_proposal
-- ----------------------------

-- ----------------------------
-- Table structure for user_has_strukturorganisasi
-- ----------------------------
DROP TABLE IF EXISTS `user_has_strukturorganisasi`;
CREATE TABLE `user_has_strukturorganisasi`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `strukturorganisasi_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_has_strukturorganisasi
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `institusi_asal` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `jk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `forgot_password_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `forgot_password_at` timestamp NULL DEFAULT NULL,
  `g2fa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `g2fa_active` tinyint(1) NULL DEFAULT NULL,
  `kategori_pendidikan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'visitor', 'superadmin', 'superadmin@gmail.com', '$2y$10$WWhCCkW0xFUQwfkyvVCFTeZVVgDumiipQLuYOebT3lkAQ4ebjtcAG', 'superadmin@simrs.com', '085265650292', 'rspi', NULL, NULL, NULL, NULL, NULL, 'BULC446M4XZTDSCR', NULL, NULL, '2024-02-16 09:06:35', '2024-03-18 13:39:59');
INSERT INTO `users` VALUES ('2e482dc3-e8ef-41a9-bd68-dbaeabab6bf4', 'visitor', 'Fauzi', 'arsipfauzi@gmail.com', '$2y$10$MJ4DkVOyE1CD8pRMnFpSxO0RRGrUThBcz/k0AHRssA2mUcO8CvFPu', 'arsipfauzi@gmail.com', '085265650292', 'rspi', 'Pria', NULL, NULL, NULL, NULL, 'HCKUV5IXSANSQ5ZM', NULL, 'Mahasiswa', '2024-01-08 09:46:45', '2024-10-16 14:10:41');

SET FOREIGN_KEY_CHECKS = 1;
