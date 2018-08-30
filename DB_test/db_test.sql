/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100134
 Source Host           : localhost:3306
 Source Schema         : db_test

 Target Server Type    : MySQL
 Target Server Version : 100134
 File Encoding         : 65001

 Date: 14/08/2018 16:17:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for departman
-- ----------------------------
DROP TABLE IF EXISTS `departman`;
CREATE TABLE `departman`  (
  `departman_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`departman_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of departman
-- ----------------------------
INSERT INTO `departman` VALUES (1, 'Proizvodnja');
INSERT INTO `departman` VALUES (2, 'Menadžment');
INSERT INTO `departman` VALUES (3, 'Marketing');
INSERT INTO `departman` VALUES (4, 'Prodaja');
INSERT INTO `departman` VALUES (5, 'Obezbeđenje');

-- ----------------------------
-- Table structure for kartica
-- ----------------------------
DROP TABLE IF EXISTS `kartica`;
CREATE TABLE `kartica`  (
  `kartica_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `broj` bigint(11) UNSIGNED NOT NULL,
  `is_active` tinyint(1) UNSIGNED NOT NULL,
  `zaposleni_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`kartica_id`) USING BTREE,
  UNIQUE INDEX `uq_kartica_broj`(`broj`) USING BTREE,
  INDEX `fk_kartica_zaposleni_id`(`zaposleni_id`) USING BTREE,
  CONSTRAINT `fk_kartica_zaposleni_id` FOREIGN KEY (`zaposleni_id`) REFERENCES `zaposleni` (`zaposleni_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kartica
-- ----------------------------
INSERT INTO `kartica` VALUES (1, '2018-08-14 15:52:04', 50125078001, 0, 1);
INSERT INTO `kartica` VALUES (2, '2018-08-14 15:52:04', 70128075521, 1, 1);
INSERT INTO `kartica` VALUES (3, '2018-08-14 15:52:04', 33117720029, 1, 2);
INSERT INTO `kartica` VALUES (4, '2018-08-14 15:52:04', 11378820054, 0, 3);
INSERT INTO `kartica` VALUES (5, '2018-08-14 15:52:04', 55503182739, 1, 3);

-- ----------------------------
-- Table structure for mesto
-- ----------------------------
DROP TABLE IF EXISTS `mesto`;
CREATE TABLE `mesto`  (
  `mesto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`mesto_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mesto
-- ----------------------------
INSERT INTO `mesto` VALUES (1, 'Glavni ulaz');
INSERT INTO `mesto` VALUES (2, 'Sporedni ulaz');
INSERT INTO `mesto` VALUES (3, 'Garaza');
INSERT INTO `mesto` VALUES (4, 'Skaldiste A');
INSERT INTO `mesto` VALUES (5, 'Skladiste B');

-- ----------------------------
-- Table structure for ocitavanje
-- ----------------------------
DROP TABLE IF EXISTS `ocitavanje`;
CREATE TABLE `ocitavanje`  (
  `ocitavanje_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mesto_id` int(10) UNSIGNED NOT NULL,
  `kartica_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`ocitavanje_id`) USING BTREE,
  INDEX `fk_ocitavanje_mesto_id`(`mesto_id`) USING BTREE,
  INDEX `fk_ocitavanje_kartica_id`(`kartica_id`) USING BTREE,
  CONSTRAINT `fk_ocitavanje_kartica_id` FOREIGN KEY (`kartica_id`) REFERENCES `kartica` (`kartica_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_ocitavanje_mesto_id` FOREIGN KEY (`mesto_id`) REFERENCES `mesto` (`mesto_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for stepen_strucne_spreme
-- ----------------------------
DROP TABLE IF EXISTS `stepen_strucne_spreme`;
CREATE TABLE `stepen_strucne_spreme`  (
  `stepen_strucne_spreme_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `oznaka` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`stepen_strucne_spreme_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of stepen_strucne_spreme
-- ----------------------------
INSERT INTO `stepen_strucne_spreme` VALUES (1, 'četvorogodišnja škola', 'IV');
INSERT INTO `stepen_strucne_spreme` VALUES (2, 'trogodišnja viša škola', 'VI/2');
INSERT INTO `stepen_strucne_spreme` VALUES (3, 'osnovne akademske studije', 'VII/1');
INSERT INTO `stepen_strucne_spreme` VALUES (4, 'master studije', 'VII/2');
INSERT INTO `stepen_strucne_spreme` VALUES (5, 'doktorat', 'VIII');

-- ----------------------------
-- Table structure for zaposleni
-- ----------------------------
DROP TABLE IF EXISTS `zaposleni`;
CREATE TABLE `zaposleni`  (
  `zaposleni_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ime` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `jmbg` varchar(13) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `born_at` date NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stepen_strucne_spreme_id` int(10) UNSIGNED NOT NULL,
  `departman_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`zaposleni_id`) USING BTREE,
  INDEX `fk_zaposleni_stepen_strucne_spreme_id`(`stepen_strucne_spreme_id`) USING BTREE,
  INDEX `fk_zaposleni_departman_id`(`departman_id`) USING BTREE,
  UNIQUE INDEX `uq_zaposleni_jmbg`(`jmbg`) USING BTREE,
  CONSTRAINT `fk_zaposleni_stepen_strucne_spreme_id` FOREIGN KEY (`stepen_strucne_spreme_id`) REFERENCES `stepen_strucne_spreme` (`stepen_strucne_spreme_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_zaposleni_departman_id` FOREIGN KEY (`departman_id`) REFERENCES `departman` (`departman_id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of zaposleni
-- ----------------------------
INSERT INTO `zaposleni` VALUES (1, 'Petar', 'Perić', '0112984710022', '1984-12-01', '2018-08-14 15:48:48', 4, 4);
INSERT INTO `zaposleni` VALUES (2, 'Ivana', 'Ivanić', '3001990715200', '1990-01-30', '2018-08-14 15:48:48', 3, 3);
INSERT INTO `zaposleni` VALUES (3, 'Jovana', 'Jovanović', '2402972815012', '1972-02-24', '2018-08-14 15:48:48', 2, 4);

-- ----------------------------
-- View structure for view_departmani
-- ----------------------------
DROP VIEW IF EXISTS `view_departmani`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_departmani` AS SELECT
departman.*,
COUNT(zaposleni.zaposleni_id) AS broj_zaposlenih
FROM
departman
LEFT JOIN zaposleni on departman.departman_id= zaposleni.departman_id
GROUP BY
departman.departman_id
ORDER BY
broj_zaposlenih ;

-- ----------------------------
-- View structure for view_prijave
-- ----------------------------
DROP VIEW IF EXISTS `view_prijave`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_prijave` AS SELECT
ocitavanje.*,
zaposleni.zaposleni_id,
zaposleni.ime,
zaposleni.prezime,
zaposleni.jmbg,
stepen_strucne_spreme.naziv AS naziv_SSS,
stepen_strucne_spreme.oznaka AS oznaka_SSS,
departman.naziv AS naziv_departman,
mesto.naziv AS mesto_naziv
FROM
ocitavanje
INNER JOIN kartica ON ocitavanje.kartica_id = kartica.kartica_id
INNER JOIN zaposleni ON kartica.zaposleni_id = zaposleni.zaposleni_id
INNER JOIN stepen_strucne_spreme ON zaposleni.stepen_strucne_spreme_id = zaposleni.stepen_strucne_spreme_id
INNER JOIN departman ON zaposleni.departman_id = departman.departman_id
INNER JOIN mesto ON ocitavanje.mesto_id = mesto.mesto_id
ORDER BY
ocitavanje.created_at DESC ;

-- ----------------------------
-- View structure for view_zaposleni
-- ----------------------------
DROP VIEW IF EXISTS `view_zaposleni`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_zaposleni` AS SELECT
zaposleni.*,
departman.naziv AS departman_naziv,
stepen_strucne_spreme.naziv AS naziv_SSS,
stepen_strucne_spreme.oznaka AS oznaka_SSS
FROM
zaposleni
INNER JOIN departman ON zaposleni.departman_id = departman.departman_id
INNER JOIN stepen_strucne_spreme ON zaposleni.stepen_strucne_spreme_id = stepen_strucne_spreme.stepen_strucne_spreme_id ;

-- ----------------------------
-- Triggers structure for table kartica
-- ----------------------------
DROP TRIGGER IF EXISTS `trigger_kartica_bi`;
delimiter ;;
CREATE TRIGGER `trigger_kartica_bi` BEFORE INSERT ON `kartica` FOR EACH ROW BEGIN
IF NEW.broj< 10000000000 THEN
SIGNAL SQLSTATE '50001' SET MESSAGE_TEXT = 'Broj ID kartice ne sme da bude manji od 10.000.000.000!';
END IF;

END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table kartica
-- ----------------------------
DROP TRIGGER IF EXISTS `trigger_kartica_bu`;
delimiter ;;
CREATE TRIGGER `trigger_kartica_bu` BEFORE UPDATE ON `kartica` FOR EACH ROW BEGIN
IF NEW.broj< 10000000000 THEN
SIGNAL SQLSTATE '50001' SET MESSAGE_TEXT = 'Broj ID kartice ne sme da bude manji od 10.000.000.000!';
END IF;

END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table zaposleni
-- ----------------------------
DROP TRIGGER IF EXISTS `trigger_zaposleni_bi`;
delimiter ;;
CREATE TRIGGER `trigger_zaposleni_bi` BEFORE INSERT ON `zaposleni` FOR EACH ROW BEGIN
IF CHAR_LENGTH(NEW.ime) <2 OR CHAR_LENGTH(NEW.prezime) < 2 THEN
SIGNAL SQLSTATE '50001' SET MESSAGE_TEXT = 'Ime i prezime moraju da budu veci od 2 karaktera';
END IF;

IF CHAR_LENGTH(NEW.jmbg) !=13 THEN
SIGNAL SQLSTATE '50003' SET MESSAGE_TEXT = 'JMBG mora da ima 13 karaktera!';
END IF;

END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table zaposleni
-- ----------------------------
DROP TRIGGER IF EXISTS `trigger_zaposleni_bu`;
delimiter ;;
CREATE TRIGGER `trigger_zaposleni_bu` BEFORE UPDATE ON `zaposleni` FOR EACH ROW BEGIN
IF CHAR_LENGTH(NEW.ime) <2 OR CHAR_LENGTH(NEW.prezime) < 2 THEN
SIGNAL SQLSTATE '50001' SET MESSAGE_TEXT = 'Ime i prezime moraju da budu veci od 2 karaktera';
END IF;

IF CHAR_LENGTH(NEW.jmbg) !=13 THEN
SIGNAL SQLSTATE '50003' SET MESSAGE_TEXT = 'JMBG mora da ima 13 karaktera!';
END IF;

END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
