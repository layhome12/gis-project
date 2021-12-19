/*
 Navicat Premium Data Transfer

 Source Server         : mysql_pc
 Source Server Type    : MySQL
 Source Server Version : 50647
 Source Host           : localhost:3306
 Source Schema         : gis_project

 Target Server Type    : MySQL
 Target Server Version : 50647
 File Encoding         : 65001

 Date: 20/12/2021 03:23:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for area_desakelurahan
-- ----------------------------
DROP TABLE IF EXISTS `area_desakelurahan`;
CREATE TABLE `area_desakelurahan`  (
  `desa_kelurahan_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NULL DEFAULT NULL,
  `kabupaten_kota_id` int(11) NULL DEFAULT NULL,
  `provinsi_id` int(11) NULL DEFAULT NULL,
  `area_code` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `desa_kelurahan_nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created` datetime(0) NULL DEFAULT NULL,
  `updated` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  `tahun_data` int(11) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of area_desakelurahan
-- ----------------------------
INSERT INTO `area_desakelurahan` VALUES (48745, 3860, 247, 15, '3572011001', 'KEPANJENKIDUL', '2020-08-24 08:37:11', '2020-08-24 09:11:25', 1, NULL);
INSERT INTO `area_desakelurahan` VALUES (48746, 3860, 247, 15, '3572011002', 'NGADIREJO', '2020-08-24 08:37:11', '2020-08-24 09:11:25', 1, NULL);
INSERT INTO `area_desakelurahan` VALUES (48747, 3860, 247, 15, '3572011003', 'SENTUL', '2020-08-24 08:37:11', '2020-08-24 09:11:25', 1, NULL);
INSERT INTO `area_desakelurahan` VALUES (48748, 3860, 247, 15, '3572011004', 'KAUMAN', '2020-08-24 08:37:11', '2020-08-24 09:11:25', 1, NULL);
INSERT INTO `area_desakelurahan` VALUES (48749, 3860, 247, 15, '3572011005', 'TANGGUNG', '2020-08-24 08:37:11', '2020-08-24 09:11:25', 1, NULL);
INSERT INTO `area_desakelurahan` VALUES (48750, 3860, 247, 15, '3572011006', 'BENDO', '2020-08-24 08:37:11', '2020-08-24 09:11:25', 1, NULL);
INSERT INTO `area_desakelurahan` VALUES (48751, 3860, 247, 15, '3572011007', 'KEPANJENLOR', '2020-08-24 08:37:11', '2020-08-24 09:11:25', 1, NULL);
INSERT INTO `area_desakelurahan` VALUES (48752, 3861, 247, 15, '3572021001', 'PAKUNDEN', '2020-08-24 08:37:11', '2020-08-24 09:11:25', 1, NULL);
INSERT INTO `area_desakelurahan` VALUES (48753, 3861, 247, 15, '3572021002', 'BLITAR', '2020-08-24 08:37:11', '2020-08-24 09:11:25', 1, NULL);
INSERT INTO `area_desakelurahan` VALUES (48754, 3861, 247, 15, '3572021003', 'TLUMPU', '2020-08-24 08:37:11', '2020-08-24 09:11:25', 1, NULL);
INSERT INTO `area_desakelurahan` VALUES (48755, 3861, 247, 15, '3572021004', 'TURI', '2020-08-24 08:37:11', '2020-08-24 09:11:25', 1, NULL);
INSERT INTO `area_desakelurahan` VALUES (48756, 3861, 247, 15, '3572021005', 'KARANGSARI', '2020-08-24 08:37:11', '2020-08-24 09:11:25', 1, NULL);
INSERT INTO `area_desakelurahan` VALUES (48757, 3861, 247, 15, '3572021006', 'SUKOREJO', '2020-08-24 08:37:11', '2020-08-24 09:11:25', 1, NULL);
INSERT INTO `area_desakelurahan` VALUES (48759, 3862, 247, 15, '3572031001', 'GEDOG', '2020-08-24 08:37:11', '2020-08-24 09:11:25', 1, NULL);
INSERT INTO `area_desakelurahan` VALUES (48760, 3862, 247, 15, '3572031002', 'PLOSOKEREP', '2020-08-24 08:37:11', '2020-08-24 09:11:25', 1, NULL);
INSERT INTO `area_desakelurahan` VALUES (48761, 3862, 247, 15, '3572031003', 'KLAMPOK', '2020-08-24 08:37:11', '2020-08-24 09:11:25', 1, NULL);
INSERT INTO `area_desakelurahan` VALUES (48762, 3862, 247, 15, '3572031004', 'SANANWETAN', '2020-08-24 08:37:11', '2020-08-24 09:11:25', 1, NULL);
INSERT INTO `area_desakelurahan` VALUES (48763, 3862, 247, 15, '3572031005', 'REMBANG', '2020-08-24 08:37:11', '2020-08-24 09:11:25', 1, NULL);
INSERT INTO `area_desakelurahan` VALUES (48764, 3862, 247, 15, '3572031006', 'KARANG TENGAH', '2020-08-24 08:37:11', '2020-08-24 09:11:25', 1, NULL);
INSERT INTO `area_desakelurahan` VALUES (48765, 3862, 247, 15, '3572031007', 'BENDOGERIT', '2020-08-24 08:37:11', '2020-08-24 09:11:25', 1, NULL);

-- ----------------------------
-- Table structure for area_kabupaten_kota
-- ----------------------------
DROP TABLE IF EXISTS `area_kabupaten_kota`;
CREATE TABLE `area_kabupaten_kota`  (
  `kabupaten_kota_id` int(11) NOT NULL,
  `provinsi_id` int(11) NULL DEFAULT NULL,
  `area_code` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kabupaten_kota_nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created` datetime(0) NULL DEFAULT NULL,
  `updated` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  `tahun_data` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`kabupaten_kota_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of area_kabupaten_kota
-- ----------------------------
INSERT INTO `area_kabupaten_kota` VALUES (247, 15, '3572', 'KOTA BLITAR', '2020-08-21 16:34:57', '2020-08-21 16:46:37', 1, NULL);

-- ----------------------------
-- Table structure for area_kecamatan
-- ----------------------------
DROP TABLE IF EXISTS `area_kecamatan`;
CREATE TABLE `area_kecamatan`  (
  `kecamatan_id` int(11) NOT NULL,
  `kabupatenkota_id` int(11) NULL DEFAULT NULL,
  `provinsi_id` int(11) NULL DEFAULT NULL,
  `area_code` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kecamatan_nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created` datetime(0) NULL DEFAULT NULL,
  `updated` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  `tahun_data` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`kecamatan_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of area_kecamatan
-- ----------------------------
INSERT INTO `area_kecamatan` VALUES (3860, 247, 15, '357201', 'KEPANJENKIDUL', '2020-08-21 16:32:57', '2020-08-21 16:52:02', 1, NULL);
INSERT INTO `area_kecamatan` VALUES (3861, 247, 15, '357202', 'SUKOREJO', '2020-08-21 16:32:57', '2020-08-21 16:52:02', 1, NULL);
INSERT INTO `area_kecamatan` VALUES (3862, 247, 15, '357203', 'SANANWETAN', '2020-08-21 16:32:57', '2020-08-21 16:52:02', 1, NULL);

-- ----------------------------
-- Table structure for color
-- ----------------------------
DROP TABLE IF EXISTS `color`;
CREATE TABLE `color`  (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `color_type_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `color_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`color_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of color
-- ----------------------------
INSERT INTO `color` VALUES (1, '1', 'Hijau', '2021-12-17 13:38:17', NULL, NULL, NULL);
INSERT INTO `color` VALUES (2, '1', 'Biru', '2021-12-17 13:38:17', NULL, NULL, NULL);
INSERT INTO `color` VALUES (3, '1', 'Merah', '2021-12-17 13:38:17', NULL, NULL, NULL);
INSERT INTO `color` VALUES (5, '3', 'Indikator Covid', '2021-12-17 18:42:01', NULL, '2021-12-18 01:56:34', NULL);
INSERT INTO `color` VALUES (8, '2', '5 Colors', '2021-12-18 00:20:02', NULL, '2021-12-18 04:55:39', NULL);
INSERT INTO `color` VALUES (9, '3', 'Luas Wilayah', '2021-12-18 00:33:41', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for color_fill
-- ----------------------------
DROP TABLE IF EXISTS `color_fill`;
CREATE TABLE `color_fill`  (
  `color_fill_id` int(11) NOT NULL AUTO_INCREMENT,
  `color_id` int(11) NULL DEFAULT NULL,
  `color_fill_hexa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `color_legend` int(11) NULL DEFAULT 0,
  `color_legend_max` int(11) NULL DEFAULT 0,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`color_fill_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of color_fill
-- ----------------------------
INSERT INTO `color_fill` VALUES (1, 1, '#00cc00', 0, NULL, '2021-12-17 13:38:57', NULL, NULL, NULL);
INSERT INTO `color_fill` VALUES (2, 2, '#0000ff', 0, NULL, '2021-12-17 13:38:57', NULL, NULL, NULL);
INSERT INTO `color_fill` VALUES (3, 3, '#ff0000', 0, NULL, '2021-12-17 13:38:57', NULL, NULL, NULL);
INSERT INTO `color_fill` VALUES (10, 5, '#fff2b6', 0, 200, '2021-12-17 19:11:12', NULL, '2021-12-19 02:33:36', 3);
INSERT INTO `color_fill` VALUES (11, 5, '#f5d062', 200, 400, '2021-12-17 19:11:23', NULL, '2021-12-18 22:39:07', 3);
INSERT INTO `color_fill` VALUES (12, 5, '#ffa640', 400, 600, '2021-12-17 19:11:32', NULL, '2021-12-18 22:39:16', 3);
INSERT INTO `color_fill` VALUES (13, 5, '#eb1010', 600, 800, '2021-12-17 19:11:47', NULL, '2021-12-18 22:39:24', 3);
INSERT INTO `color_fill` VALUES (14, 5, '#6e0d0d', 800, 1000, '2021-12-17 19:12:02', NULL, '2021-12-18 22:39:34', 3);
INSERT INTO `color_fill` VALUES (15, 5, '#000000', 1000, 0, '2021-12-17 19:12:16', NULL, '2021-12-18 22:39:57', 3);
INSERT INTO `color_fill` VALUES (17, 8, '#264653', 0, 0, '2021-12-18 00:20:13', NULL, '2021-12-18 04:55:21', NULL);
INSERT INTO `color_fill` VALUES (18, 8, '#d4b400', 0, 0, '2021-12-18 00:20:19', NULL, '2021-12-18 04:55:13', NULL);
INSERT INTO `color_fill` VALUES (19, 8, '#0096c7', 0, 0, '2021-12-18 00:20:25', NULL, NULL, NULL);
INSERT INTO `color_fill` VALUES (20, 8, '#e009b2', 0, 0, '2021-12-18 00:20:35', NULL, NULL, NULL);
INSERT INTO `color_fill` VALUES (21, 9, '#00a606', 0, 100, '2021-12-18 00:34:03', NULL, NULL, NULL);
INSERT INTO `color_fill` VALUES (22, 9, '#9e9e16', 100, 200, '2021-12-18 00:34:20', NULL, NULL, NULL);
INSERT INTO `color_fill` VALUES (23, 9, '#f4a261', 200, 400, '2021-12-18 00:34:35', NULL, NULL, NULL);
INSERT INTO `color_fill` VALUES (24, 9, '#d62828', 400, 600, '2021-12-18 00:34:51', NULL, NULL, NULL);
INSERT INTO `color_fill` VALUES (25, 8, '#11c704', 0, 0, '2021-12-18 04:55:00', NULL, NULL, NULL);
INSERT INTO `color_fill` VALUES (26, 9, '#3b53c9', 600, 800, '2021-12-18 22:37:41', 3, '2021-12-18 22:40:45', 3);
INSERT INTO `color_fill` VALUES (27, 9, '#012757', 800, 0, '2021-12-18 22:41:07', 3, NULL, NULL);

-- ----------------------------
-- Table structure for color_type
-- ----------------------------
DROP TABLE IF EXISTS `color_type`;
CREATE TABLE `color_type`  (
  `color_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `color_type_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`color_type_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of color_type
-- ----------------------------
INSERT INTO `color_type` VALUES (1, 'Single', '2021-12-20 03:22:27', NULL, NULL, NULL);
INSERT INTO `color_type` VALUES (2, 'Multiple', '2021-12-20 03:22:30', NULL, NULL, NULL);
INSERT INTO `color_type` VALUES (3, 'Legend', '2021-12-20 03:22:32', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for geojson
-- ----------------------------
DROP TABLE IF EXISTS `geojson`;
CREATE TABLE `geojson`  (
  `geojson_id` int(11) NOT NULL AUTO_INCREMENT,
  `geojson_type_id` int(11) NULL DEFAULT NULL,
  `color_id` int(11) NULL DEFAULT NULL,
  `geojson_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `geojson_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `geojson_urutan` int(4) NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`geojson_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for geojson_type
-- ----------------------------
DROP TABLE IF EXISTS `geojson_type`;
CREATE TABLE `geojson_type`  (
  `geojson_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `geojson_type_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`geojson_type_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of geojson_type
-- ----------------------------
INSERT INTO `geojson_type` VALUES (1, 'Polygon', '2021-12-15 19:57:50', NULL, NULL, NULL);
INSERT INTO `geojson_type` VALUES (2, 'Line', '2021-12-15 19:57:50', NULL, NULL, NULL);
INSERT INTO `geojson_type` VALUES (3, 'Point', '2021-12-15 19:57:50', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for info_landing
-- ----------------------------
DROP TABLE IF EXISTS `info_landing`;
CREATE TABLE `info_landing`  (
  `info_landing_id` int(11) NOT NULL AUTO_INCREMENT,
  `info_landing_nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `info_landing_keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `info_landing_isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `info_landing_seo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`info_landing_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of info_landing
-- ----------------------------
INSERT INTO `info_landing` VALUES (4, 'Pencegahan Covid', 'Berikut tips menjaga kesehatan di musim pandemi.', '<div class=\"row no-gutters\">\r\n          <div class=\"col-xl-7 d-flex align-items-stretch order-2 order-lg-1\">\r\n            <div class=\"content d-flex flex-column justify-content-center\">\r\n              <div class=\"row\">\r\n                <div class=\"col-md-6 icon-box aos-init aos-animate\" data-aos=\"fade-up\">\r\n                  <i class=\"fa fa-utensils\"></i>\r\n                  <h4>Makan Bergizi</h4>\r\n                  <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>\r\n                </div>\r\n                <div class=\"col-md-6 icon-box aos-init aos-animate\" data-aos=\"fade-up\" data-aos-delay=\"100\">\r\n                  <i class=\"fa fa-bed\"></i>\r\n                  <h4>Istirahat Cukup</h4>\r\n                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>\r\n                </div>\r\n                <div class=\"col-md-6 icon-box aos-init aos-animate\" data-aos=\"fade-up\" data-aos-delay=\"200\">\r\n                  <i class=\"fa fa-hand-sparkles\"></i>\r\n                  <h4>Menjaga Kebersihan</h4>\r\n                  <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>\r\n                </div>\r\n                <div class=\"col-md-6 icon-box aos-init aos-animate\" data-aos=\"fade-up\" data-aos-delay=\"300\">\r\n                  <i class=\"fa fa-shield-virus\"></i>\r\n                  <h4>Vaksinasi</h4>\r\n                  <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>\r\n                </div>\r\n                <div class=\"col-md-6 icon-box aos-init aos-animate\" data-aos=\"fade-up\" data-aos-delay=\"400\">\r\n                  <i class=\"fa fa-running\"></i>\r\n                  <h4>Kerap Olahraga</h4>\r\n                  <p>Et fuga et deserunt et enim. Dolorem architecto ratione tensa raptor marte</p>\r\n                </div>\r\n                <div class=\"col-md-6 icon-box aos-init aos-animate\" data-aos=\"fade-up\" data-aos-delay=\"500\">\r\n                  <i class=\"fa fa-head-side-mask\"></i>\r\n                  <h4>Pakai Masker</h4>\r\n                  <p>Est autem dicta beatae suscipit. Sint veritatis et sit quasi ab aut inventore</p>\r\n                </div>\r\n              </div>\r\n            </div>\r\n          </div>\r\n          <div class=\"image col-xl-5 d-flex align-items-stretch justify-content-center order-1 order-lg-2 aos-init aos-animate\" data-aos=\"fade-left\" data-aos-delay=\"100\">\r\n            <img src=\"https://bootstrapmade.com/demo/templates/Appland/assets/img/features.svg\" class=\"img-fluid\" alt=\"\">\r\n          </div>\r\n        </div>', 'pencegahan-covid', '2021-12-18 23:43:16', 3, '2021-12-19 00:15:49', 3);

-- ----------------------------
-- Table structure for properties
-- ----------------------------
DROP TABLE IF EXISTS `properties`;
CREATE TABLE `properties`  (
  `properties_id` int(11) NOT NULL AUTO_INCREMENT,
  `geojson_id` int(11) NULL DEFAULT NULL,
  `properties_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `properties_label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `properties_tahun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_legend` int(2) NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `created_by` int(255) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`properties_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for properties_sub
-- ----------------------------
DROP TABLE IF EXISTS `properties_sub`;
CREATE TABLE `properties_sub`  (
  `properties_sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `properties_id` int(11) NULL DEFAULT NULL,
  `desa_kelurahan_id` int(11) NULL DEFAULT NULL,
  `properties_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `properties_lcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`properties_sub_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_tanggal_lahir` date NULL DEFAULT NULL,
  `user_tempat_lahir` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (3, 'admin', '$2y$10$mJcwQrgeZYKiHdvmOPyWPOMjrBFdoKT1aocFFAzbirgaxA4N9d1Yi', 'Admin', '1639830906_449f20c5ed57e42d8c56.jpeg', '2021-12-18', 'Blitar', 'Bendosari, Sanankulon, Kab. Blitar', '2021-12-18 06:35:06', NULL, '2021-12-19 01:13:03', 3);
INSERT INTO `user` VALUES (4, 'layhome12', '$2y$10$USXhshNAiAt1zW/kN4Ym9u17VhMSvOG3rdDu6CxX01sqTrWhwrdnS', 'Layhome', NULL, '2021-12-19', 'Blitar', 'Bendosari.', '2021-12-19 02:34:33', 3, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
