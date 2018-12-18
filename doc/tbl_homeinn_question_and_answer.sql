/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50723
Source Host           : localhost:3306
Source Database       : misurino_crm_develop

Target Server Type    : MYSQL
Target Server Version : 50723
File Encoding         : 65001

Date: 2018-11-09 18:27:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_homeinn_question_and_answer
-- ----------------------------
DROP TABLE IF EXISTS `tbl_homeinn_question_and_answer`;
CREATE TABLE `tbl_homeinn_question_and_answer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question` text,
  `answer` text,
  `final` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_homeinn_question_and_answer
-- ----------------------------
INSERT INTO `tbl_homeinn_question_and_answer` VALUES ('1', '{“dfs”:\"sfsf\"}', '{“dfs”:\"sfsf\"}', '{“dfs”:\"sfsf\"}');
INSERT INTO `tbl_homeinn_question_and_answer` VALUES ('2', '{\"sadf\":\"adfsadf\"}', '{\"sad呃呃f\":\"adf额sadf\"}', '{\"sad呃躲到都呃f\":\"adf额 士大夫 sadf\"}');
INSERT INTO `tbl_homeinn_question_and_answer` VALUES ('3', '{\"sadf\":\"adfsadf\"}', '{\"sad呃呃f\":\"adf额sadf\"}', '{\"sad呃躲到都呃f\":\"adf额 士大夫 sadf\"}');
