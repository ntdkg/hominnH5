/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50723
Source Host           : localhost:3306
Source Database       : misurino_crm_develop

Target Server Type    : MYSQL
Target Server Version : 50723
File Encoding         : 65001

Date: 2018-11-09 18:27:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_homeinn_statistics
-- ----------------------------
DROP TABLE IF EXISTS `tbl_homeinn_statistics`;
CREATE TABLE `tbl_homeinn_statistics` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question1` varchar(255) DEFAULT NULL,
  `question2` varchar(255) DEFAULT NULL,
  `question3` varchar(255) DEFAULT NULL,
  `question4` varchar(255) DEFAULT NULL,
  `final` varchar(255) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `create_time` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_homeinn_statistics
-- ----------------------------
INSERT INTO `tbl_homeinn_statistics` VALUES ('1', 'A', 'b', 'C', 'd', '4', '1', null);
INSERT INTO `tbl_homeinn_statistics` VALUES ('2', 'A', 'B', 'C', 'D', '3', '1', null);
INSERT INTO `tbl_homeinn_statistics` VALUES ('3', 'A', 'B', 'C', 'D', '3', '1', '1541752048');
INSERT INTO `tbl_homeinn_statistics` VALUES ('4', 'A', 'B', 'C', 'D', '3', '1', '1541756718');
