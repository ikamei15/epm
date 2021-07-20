/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : epm

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 20/07/2021 20:02:38
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang_data
-- ----------------------------
DROP TABLE IF EXISTS `barang_data`;
CREATE TABLE `barang_data`  (
  `bd_id` int NOT NULL AUTO_INCREMENT,
  `bd_kategori` int NULL DEFAULT NULL,
  `bd_nama_barang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bd_harga` double(25, 2) NULL DEFAULT NULL,
  `bd_deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `bd_stok` int NULL DEFAULT NULL,
  `bd_berat` int NULL DEFAULT NULL,
  `bd_gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`bd_id`) USING BTREE,
  INDEX `fk_1`(`bd_kategori`) USING BTREE,
  CONSTRAINT `fk_1` FOREIGN KEY (`bd_kategori`) REFERENCES `kategori_barang` (`kb_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of barang_data
-- ----------------------------
INSERT INTO `barang_data` VALUES (1, 3, 'Floor Hinge Dorma BTS 84', 1300000.00, 'Floor Hinge Dorma BTS 84 HO Body only ( Engsel Lantai )\r\n100 % Original Dorma\r\n- Engsel Lantai Dorma BTS 84 dirancang untuk pintu kaca frameless atau dengan frame alumunium\r\n- Untuk lebar pintu hingga 1100 mm, dan berat pintu maks 100 kg\r\n- Instalasi mudah, hanya butuh kedalaman 40 mm\r\n- Untuk pintu kaca frameless, anda juga perlu penjepit kaca / patch fitting (harga belum termasuk)\r\n- Ada fitur hold open (pintu dapat ditahan pada posisi 90 derajad)\r\n', 100, 7000, '20210713160715.PNG');
INSERT INTO `barang_data` VALUES (2, 5, 'Shower Hinge Dekson SH 5301 (GW) PSS', 700000.00, 'Shower Hinge Dekson SH 5301 (GW) PSS, Engsel kaca ke tembok.\r\n\r\n- Material Stainless Steel SUS 304\r\n- Tebal Kaca : 8 - 10 mm\r\n- Kapasitas Maksimum :\r\n2 Pcs : Lebar Pintu 80 Cm, Beban 50 Kg\r\n3 Pcs : Lebar Pintu 90 Cm, Beban 65 Kg\r\n- Harga 1 set = 2 pcs', 100, 1200, '20210713160735.PNG');
INSERT INTO `barang_data` VALUES (3, 5, 'Shower Hinge Dekson SH 5305 (GG) 135 PSS', 700000.00, 'Shower Hinge Dekson SH 5305 (GG) 135 PSS Engsel kaca ke kaca 135\r\nderajad.\r\n- Material Stainless Steel SUS 304\r\n- Tebal Kaca : 8 - 10 mm\r\n- Kapasitas Maksimum :\r\n2 Pcs : Lebar Pintu 80 Cm, Beban 50 Kg\r\n3 Pcs : Lebar Pintu 90 Cm, Beban 65 Kg\r\n- Harga 1 set = 2 pcs', 100, 2200, '20210713160753.PNG');
INSERT INTO `barang_data` VALUES (4, 5, 'Shower Hinge Dekson SH 5303 (GG) 180 PSS', 500000.00, 'Shower Hinge Dekson SH 5303 (GG) 180 PSS Engsel kaca ke kaca 180\r\nderajad.\r\n- Material Stainless Steel SUS 304\r\n- Tebal Kaca : 8 - 10 mm\r\n- Kapasitas Maksimum :\r\n2 Pcs : Lebar Pintu 80 Cm, Beban 50 Kg\r\n3 Pcs : Lebar Pintu 90 Cm, Beban 65 Kg\r\n- Harga 1 set = 2 pcs', 100, 2000, '20210713160732.PNG');
INSERT INTO `barang_data` VALUES (5, 4, 'Handle Shower Dekson PH DL814 25x150x450 PSS', 400000.00, 'Handle pintu shower Dekson \r\n- Ukuran 15cm x 45cm\r\n- Material Stainless Steel', 100, 600, '20210713160732.PNG');
INSERT INTO `barang_data` VALUES (6, 4, 'Handle Shower Dekson PH DL814 25x20x500 PSS', 400000.00, 'Handle pintu shower Dekson \r\n- Ukuran 20cm x 50cm\r\n- Material Stainless Steel\r\n', 100, 600, '20210713160743.PNG');
INSERT INTO `barang_data` VALUES (7, 3, 'Floor Hinge Dekson FH 84, PT 10 PSS, PT 20 PSS, US 10 PSS(Complete)', 1500000.00, '1 set komplit berisi \r\n-1 Floor Hinge Dekson FH 84\r\n-1 PT 10 PSS\r\n-1 PT 20 PSS\r\n-1 US 10 PSS\r\n', 100, 10000, '20210713160731.PNG');
INSERT INTO `barang_data` VALUES (8, 6, 'Patch Fitting PT 40 PSS', 900000.00, 'Patch Fitting PT 40 PSS, Penjepit dan penopang pintu kaca tempered..\r\n- Tebal kaca 10-12mm\r\n- Material Stainless Steel\r\n', 100, 1000, '20210713160732.PNG');
INSERT INTO `barang_data` VALUES (9, 1, 'Glass Clip GC U8541 PSS', 50000.00, 'Glass Clip GC U8541 PSS, klip kaca ke tembok - Tebal kaca 8-10mm - Material Stainless Steel ', 100, 150, '20210713160740.PNG');
INSERT INTO `barang_data` VALUES (10, 1, 'Glass Clip GC U800 AL CP', 50000.00, 'Glass Clip GC U800 AL CP, klip kaca ke lantai.\r\n- Tebal kaca 8-10mm\r\n- Material Stainless Steel\r\n', 97, 300, '20210713160732.PNG');

-- ----------------------------
-- Table structure for bo_users
-- ----------------------------
DROP TABLE IF EXISTS `bo_users`;
CREATE TABLE `bo_users`  (
  `bu_id` int NOT NULL AUTO_INCREMENT,
  `bu_username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bu_password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bu_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bu_last_login` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of bo_users
-- ----------------------------
INSERT INTO `bo_users` VALUES (1, 'admin', '7c222fb2927d828af22f592134e8932480637c0d', 'Administator', '2021-07-17 14:13:21');

-- ----------------------------
-- Table structure for detail_pesanan
-- ----------------------------
DROP TABLE IF EXISTS `detail_pesanan`;
CREATE TABLE `detail_pesanan`  (
  `dp_id` int NOT NULL AUTO_INCREMENT,
  `dp_ringkasan_id` int NULL DEFAULT NULL,
  `dp_user` int NULL DEFAULT NULL,
  `dp_barang` int NULL DEFAULT NULL,
  `dp_qty` int NULL DEFAULT NULL,
  `dp_total_harga` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dp_created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`dp_id`) USING BTREE,
  INDEX `fk_dp_2`(`dp_user`) USING BTREE,
  INDEX `fk_dp_1`(`dp_ringkasan_id`) USING BTREE,
  INDEX `fk_dp_3`(`dp_barang`) USING BTREE,
  CONSTRAINT `fk_dp_1` FOREIGN KEY (`dp_ringkasan_id`) REFERENCES `ringkasan_pesanan` (`rp_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_dp_2` FOREIGN KEY (`dp_user`) REFERENCES `user_data` (`ud_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_dp_3` FOREIGN KEY (`dp_barang`) REFERENCES `barang_data` (`bd_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of detail_pesanan
-- ----------------------------
INSERT INTO `detail_pesanan` VALUES (1, 1, 1, 2, 1, '50000', '2021-07-14 21:08:17');
INSERT INTO `detail_pesanan` VALUES (2, 2, 1, 5, 1, '50000', '2021-07-14 21:08:49');
INSERT INTO `detail_pesanan` VALUES (3, 3, 1, 8, 1, '50000', '2021-07-14 21:10:57');
INSERT INTO `detail_pesanan` VALUES (4, 4, 7, 7, 1, '50000', '2021-07-15 01:22:42');
INSERT INTO `detail_pesanan` VALUES (5, 4, 7, 2, 1, '50000', '2021-07-15 01:22:42');
INSERT INTO `detail_pesanan` VALUES (6, 5, 10, 10, 3, '150000', '2021-07-16 02:14:36');

-- ----------------------------
-- Table structure for hubungi_kami
-- ----------------------------
DROP TABLE IF EXISTS `hubungi_kami`;
CREATE TABLE `hubungi_kami`  (
  `hk_id` int NOT NULL AUTO_INCREMENT,
  `hk_nama_lengkap` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hk_email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hk_notelp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hk_pesan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hk_created_date` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`hk_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of hubungi_kami
-- ----------------------------
INSERT INTO `hubungi_kami` VALUES (1, 'Adam Marulyanto', 'adammarulyanto@gmail.com', '08888888888', 'Test Pesan', '2021-07-15 01:42:45');
INSERT INTO `hubungi_kami` VALUES (2, 'Adam', 'adammarulyanto@gmail.com', '081123123123', 'Pesan 12345', '2021-07-15 01:45:27');

-- ----------------------------
-- Table structure for kategori_barang
-- ----------------------------
DROP TABLE IF EXISTS `kategori_barang`;
CREATE TABLE `kategori_barang`  (
  `kb_id` int NOT NULL AUTO_INCREMENT,
  `kb_nama_kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kb_created_date` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kb_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of kategori_barang
-- ----------------------------
INSERT INTO `kategori_barang` VALUES (1, 'Glass Clip', '2021-07-16 01:13:21');
INSERT INTO `kategori_barang` VALUES (2, 'Glass Clamp', '2021-07-13 21:21:25');
INSERT INTO `kategori_barang` VALUES (3, 'Floor Hinge', '2021-07-13 21:21:42');
INSERT INTO `kategori_barang` VALUES (4, 'Handle', '2021-07-13 21:21:54');
INSERT INTO `kategori_barang` VALUES (5, 'Engsel', '2021-07-13 21:22:10');
INSERT INTO `kategori_barang` VALUES (6, 'Patch Fitting', '2021-07-13 21:33:02');

-- ----------------------------
-- Table structure for keranjang
-- ----------------------------
DROP TABLE IF EXISTS `keranjang`;
CREATE TABLE `keranjang`  (
  `kr_id` int NOT NULL AUTO_INCREMENT,
  `kr_user` int NULL DEFAULT NULL,
  `kr_barang` int NULL DEFAULT NULL,
  `kr_qty` int NULL DEFAULT NULL,
  PRIMARY KEY (`kr_id`) USING BTREE,
  INDEX `fk_kr_1`(`kr_user`) USING BTREE,
  INDEX `fk_kr_2`(`kr_barang`) USING BTREE,
  CONSTRAINT `fk_kr_1` FOREIGN KEY (`kr_user`) REFERENCES `user_data` (`ud_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_kr_2` FOREIGN KEY (`kr_barang`) REFERENCES `barang_data` (`bd_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of keranjang
-- ----------------------------
INSERT INTO `keranjang` VALUES (2, 7, 10, 1);

-- ----------------------------
-- Table structure for ringkasan_pesanan
-- ----------------------------
DROP TABLE IF EXISTS `ringkasan_pesanan`;
CREATE TABLE `ringkasan_pesanan`  (
  `rp_id` int NOT NULL AUTO_INCREMENT,
  `rp_user` int NULL DEFAULT NULL,
  `rp_no_pesanan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rp_qty` int NULL DEFAULT NULL,
  `rp_total_harga` double(25, 2) NULL DEFAULT NULL,
  `rp_ongkir` double(25, 2) NULL DEFAULT NULL,
  `rp_penerima` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rp_alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `rp_kodepos` int NULL DEFAULT NULL,
  `rp_notelp` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rp_noresi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rp_bukti_pembayaran` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rp_status` int NULL DEFAULT NULL,
  `rp_tgl_pembayaran` datetime NULL DEFAULT NULL,
  `rp_created_date` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rp_id`) USING BTREE,
  INDEX `fk_rp_1`(`rp_user`) USING BTREE,
  CONSTRAINT `fk_rp_1` FOREIGN KEY (`rp_user`) REFERENCES `user_data` (`ud_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of ringkasan_pesanan
-- ----------------------------
INSERT INTO `ringkasan_pesanan` VALUES (1, 1, 'INV20210711', 1, 50000.00, 9000.00, 'Admin', 'jl. Sepanjang Jalan Menuju Roma, Pondok Ranji, Tangerang Selatan 14014', 14014, '88809323231', NULL, NULL, 2, NULL, '2021-04-14 21:08:17');
INSERT INTO `ringkasan_pesanan` VALUES (2, 1, 'INV20210712', 1, 50000.00, NULL, 'Admin', 'jl. Sepanjang Jalan Menuju Roma, Pondok Ranji, Tangerang Selatan 14014', 14014, '88809323231', NULL, NULL, 1, NULL, '2021-05-14 21:08:49');
INSERT INTO `ringkasan_pesanan` VALUES (3, 1, 'INV20210713', 1, 50000.00, 9000.00, 'Admin', 'jl. Sepanjang Jalan Menuju Roma, Pondok Ranji, Tangerang Selatan 14014', 14014, '88809323231', '12312312312', '20210714160702', 5, NULL, '2021-06-14 21:10:57');
INSERT INTO `ringkasan_pesanan` VALUES (4, 7, 'INV20210771', 2, 100000.00, 9000.00, 'Adam', 'asdasd', 1235, '8888123123', '12312312312', '20210714200707', 4, NULL, '2021-07-15 01:22:42');
INSERT INTO `ringkasan_pesanan` VALUES (5, 10, 'INV202107101', 3, 150000.00, 9000.00, 'Adam Marulyanto', 'Adasdasda', 12345, '888', '1232133345', '20210715210735', 5, NULL, '2021-07-16 02:14:36');

-- ----------------------------
-- Table structure for slide_banner
-- ----------------------------
DROP TABLE IF EXISTS `slide_banner`;
CREATE TABLE `slide_banner`  (
  `sb_id` int NOT NULL AUTO_INCREMENT,
  `sb_gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sb_created_date` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sb_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of slide_banner
-- ----------------------------
INSERT INTO `slide_banner` VALUES (3, '20210713180740.png', '2021-07-13 23:27:40');
INSERT INTO `slide_banner` VALUES (4, '20210713180713.png', '2021-07-13 23:29:13');
INSERT INTO `slide_banner` VALUES (5, '20210713180719.png', '2021-07-13 23:29:19');

-- ----------------------------
-- Table structure for testimoni_pembeli
-- ----------------------------
DROP TABLE IF EXISTS `testimoni_pembeli`;
CREATE TABLE `testimoni_pembeli`  (
  `tp_id` int NOT NULL AUTO_INCREMENT,
  `tp_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tp_testimoni` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tp_created_date` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tp_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of testimoni_pembeli
-- ----------------------------
INSERT INTO `testimoni_pembeli` VALUES (2, 'Marul', 'Keren bed dah ah', '2021-07-15 01:59:27');

-- ----------------------------
-- Table structure for user_data
-- ----------------------------
DROP TABLE IF EXISTS `user_data`;
CREATE TABLE `user_data`  (
  `ud_id` int NOT NULL AUTO_INCREMENT,
  `ud_nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_last_login` datetime NOT NULL,
  `ud_alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `ud_kodepos` int NULL DEFAULT NULL,
  `ud_notelp` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ud_verified` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'N',
  `ud_verified_date` datetime NULL DEFAULT NULL,
  `ud_created_date` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ud_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of user_data
-- ----------------------------
INSERT INTO `user_data` VALUES (1, 'Admin', 'admin@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '2021-07-14 21:31:54', 'jl. Sepanjang Jalan Menuju Roma, Pondok Ranji, Tangerang Selatan 14014', 14014, '088809323231', 'N', NULL, '2021-07-14 00:26:20');
INSERT INTO `user_data` VALUES (7, 'Adam', 'adammarulyanto@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '2021-07-16 12:44:53', 'asdasd', 1235, '08888123123', 'Y', '2021-07-15 01:16:23', '2021-07-14 23:41:35');
INSERT INTO `user_data` VALUES (8, 'Marul', 'amarulyantooo@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '2021-07-15 01:01:47', NULL, NULL, NULL, 'Y', '2021-07-14 23:50:22', '2021-07-14 23:45:04');
INSERT INTO `user_data` VALUES (9, 'Anto', 'adammarulyanto@icloud.com', '7c222fb2927d828af22f592134e8932480637c0d', '2021-07-15 01:28:51', NULL, NULL, NULL, 'Y', '2021-07-15 01:28:37', '2021-07-15 01:26:44');
INSERT INTO `user_data` VALUES (10, 'Adam Marulyanto', 'amarulyanto@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '2021-07-16 02:18:42', NULL, NULL, NULL, 'Y', '2021-07-16 02:03:54', '2021-07-16 02:01:56');

SET FOREIGN_KEY_CHECKS = 1;
