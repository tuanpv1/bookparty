/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : bookparty

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2016-09-28 20:33:29
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `banner`
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `des` text,
  `price` int(11) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO banner VALUES ('1', '1.57df4291504b51474249361.jpg', 'QC 1', '', null, '1', null, null, null);
INSERT INTO banner VALUES ('2', '1.57df73265d13c1474261798.jpg', 'Tiệc cưới', 'Để phục vụ được chu đáo quý khách vui lòng đặt cơm trước 11h30\'.\r\nQuý khách đặt cơm ngay dưới stt này hoặc liên hệ sdt 096 711 3242 - 096 805 8888.\r\nCơm 121 phục vụ cơm tự chọn, cơm văn phòng, cơm đĩa, cơm hộp, cơm xuất. Giá từ 30.000 VND.\r\nNhận hợp đồng đặt cơm hộp theo tháng.', null, '10', null, null, '1474266654');
INSERT INTO banner VALUES ('3', '1.57df73e8bdc931474261992.jpg', 'Tiệc cưới 1', 'Để phục vụ được chu đáo quý khách vui lòng đặt cơm trước 11h30\'.\r\nQuý khách đặt cơm ngay dưới stt này hoặc liên hệ sdt 096 711 3242 - 096 805 8888.\r\nCơm 121 phục vụ cơm tự chọn, cơm văn phòng, cơm đĩa, cơm hộp, cơm xuất. Giá từ 30.000 VND.\r\nNhận hợp đồng đặt cơm hộp theo tháng.', null, '10', null, null, '1474266717');
INSERT INTO banner VALUES ('4', '1.57df73f9901f51474262009.jpg', 'Tiệc cưới 2', 'Để phục vụ được chu đáo quý khách vui lòng đặt cơm trước 11h30\'.\r\nQuý khách đặt cơm ngay dưới stt này hoặc liên hệ sdt 096 711 3242 - 096 805 8888.\r\nCơm 121 phục vụ cơm tự chọn, cơm văn phòng, cơm đĩa, cơm hộp, cơm xuất. Giá từ 30.000 VND.\r\nNhận hợp đồng đặt cơm hộp theo tháng.', null, '10', null, null, '1474266727');

-- ----------------------------
-- Table structure for `book`
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `type` int(5) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book
-- ----------------------------

-- ----------------------------
-- Table structure for `food`
-- ----------------------------
DROP TABLE IF EXISTS `food`;
CREATE TABLE `food` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `des` text,
  `price` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of food
-- ----------------------------
INSERT INTO food VALUES ('1', '1.57df437fa33661474249599.jpg', 'Sườn xào chua ngọt', '', null, null, '10', null, null);
INSERT INTO food VALUES ('2', '1.57df43954e4f41474249621.jpg', 'Bắp cải luộc', '', null, null, '10', null, null);
INSERT INTO food VALUES ('3', '1.57df43ad033371474249645.jpg', 'Cá Kho', '', null, null, '10', null, null);
INSERT INTO food VALUES ('4', '1.57df44093b2d21474249737.jpg', 'Thịt nướng', '', null, null, '10', null, null);
INSERT INTO food VALUES ('5', '1.57df441f7326a1474249759.jpg', 'Mướp đắng xào trứng', '', null, null, '10', null, null);
INSERT INTO food VALUES ('6', '1.57df4457dcace1474249815.jpg', 'Đậu xốt cà chua', '', null, null, '10', null, null);
INSERT INTO food VALUES ('7', '1.57df44cacdadc1474249930.jpg', 'Rau luộc', '', null, null, '10', null, null);
INSERT INTO food VALUES ('8', '1.57df44ddd3cdc1474249949.jpg', 'Bò xào', '', null, null, '10', null, null);
INSERT INTO food VALUES ('9', '1.57df44f7e8ad01474249975.jpg', 'Xườn non chiên', '', null, null, '10', null, null);
INSERT INTO food VALUES ('10', '1.57df4548c6e491474250056.jpg', 'Thịt kho tàu', '', null, null, '10', null, null);

-- ----------------------------
-- Table structure for `migration`
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO migration VALUES ('m000000_000000_base', '1474195571');
INSERT INTO migration VALUES ('m130524_201442_init', '1474195578');
INSERT INTO migration VALUES ('m160918_143633_create_banner_table', '1474209644');
INSERT INTO migration VALUES ('m160918_143716_create_food_table', '1474209644');
INSERT INTO migration VALUES ('m160918_144036_create_package_table', '1474262409');
INSERT INTO migration VALUES ('m160919_062456_create_sale_table', '1474266302');
INSERT INTO migration VALUES ('m160919_114739_create_book_table', '1474285952');
INSERT INTO migration VALUES ('m160919_115117_create_book_table', '1474286028');
INSERT INTO migration VALUES ('m160919_120216_add_x_column_to_order_book_table', '1474286559');

-- ----------------------------
-- Table structure for `order_book`
-- ----------------------------
DROP TABLE IF EXISTS `order_book`;
CREATE TABLE `order_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_book` int(11) DEFAULT NULL,
  `id_food` int(11) DEFAULT NULL,
  `id_package` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `type` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_book
-- ----------------------------

-- ----------------------------
-- Table structure for `package`
-- ----------------------------
DROP TABLE IF EXISTS `package`;
CREATE TABLE `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `des` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of package
-- ----------------------------
INSERT INTO package VALUES ('1', 'Gói 6 người 01', '1.57df8264f19151474265700.jpg', '1600000', '10', null, '', 'Món khai vị:\r\n    Súp hải sản gà\r\n    Salad rau trộn Đà Lạt\r\nMón chính:\r\n    Măng trúc xào tỏi\r\n    Nem hải sản sốt Mayonnaise\r\n    Tôm sú rang muối\r\n    Gà Ri quay mật ong\r\n    Cá Song hấp rượu vang\r\n    Canh hải sản nấm tươi', '1474264903', '1474438521');
INSERT INTO package VALUES ('2', 'Gói 6 người 02', '1.57df827f074fe1474265727.jpg', '1500000', '10', '10', '', 'Món khai vị:\r\n\r\n    Súp hải sản gà\r\n    Salad rau trộn Đà Lạt\r\n\r\n         Món chính:\r\n\r\n    Măng trúc xào tỏi\r\n    Nem hải sản sốt Mayonnaise\r\n    Tôm sú rang muối\r\n    Gà Ri quay mật ong\r\n    Cá Song hấp rượu vang\r\n    Canh hải sản nấm tươi', '1474265727', '1474441301');
INSERT INTO package VALUES ('3', 'Gói 6 người 03', '1.57df82a80b8c01474265768.jpg', '1300000', '10', null, '', 'Món khai vị:\r\n\r\n    Súp hải sản gà\r\n    Salad rau trộn Đà Lạt\r\n\r\n         Món chính:\r\n\r\n    Măng trúc xào tỏi\r\n    Nem hải sản sốt Mayonnaise\r\n    Tôm sú rang muối\r\n    Gà Ri quay mật ong\r\n    Cá Song hấp rượu vang\r\n    Canh hải sản nấm tươi', '1474265768', '1474438563');

-- ----------------------------
-- Table structure for `sale`
-- ----------------------------
DROP TABLE IF EXISTS `sale`;
CREATE TABLE `sale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `des` text,
  `price` int(11) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sale
-- ----------------------------
INSERT INTO sale VALUES ('1', 'Giảm 5% cho bàn 5 người ăn ', 'Đối với bàn khách  hàng đi nhóm 5 người sẽ được giảm giá 5% trên tổng hóa đơn', null, '10', '1474267084', '1474267119');
INSERT INTO sale VALUES ('2', 'Giảm 10% cho bàn ăn 10 người', 'Đối với khách hàng đi nhóm 10 người chúng tôi sẽ giảm giá 10% trên tổng hóa đơn', null, '10', '1474267268', '1474267268');
INSERT INTO sale VALUES ('3', 'Giảm 5% cho đặt tiệc 100 mân', 'Chúng tôi sẽ Giảm 5% cho những khách hàng đặt tiệc từ 50 mân 6 người trở lên', null, '10', '1474267340', '1474267340');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `about` text COLLATE utf8_unicode_ci,
  `gender` smallint(6) NOT NULL DEFAULT '1',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `type` smallint(6) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO user VALUES ('1', 'admin', null, null, 'gawzuh6xTqfAu5jR56c3gw3RcCDs_nrm', '$2y$13$7PzXDkOnOFprYwhO9fjQo.YXpWGt1cP6xL/tCj6828MWREgsE9PWS', 'admin123', 'admin@gmail.com', '', '', null, null, '1', '10', '10', '1474195719', '1474195719');
