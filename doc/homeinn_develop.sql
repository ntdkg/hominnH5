/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50723
Source Host           : localhost:3306
Source Database       : homeinn_develop

Target Server Type    : MYSQL
Target Server Version : 50723
File Encoding         : 65001

Date: 2018-11-09 18:35:18
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

-- ----------------------------
-- Table structure for tbl_homeinn_result
-- ----------------------------
DROP TABLE IF EXISTS `tbl_homeinn_result`;
CREATE TABLE `tbl_homeinn_result` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `wechat_open_id` varchar(255) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `weibo_open_id` varchar(255) DEFAULT NULL,
  `qqnumber` int(50) DEFAULT NULL,
  `status` int(10) DEFAULT NULL COMMENT '1微信2微博3QQ',
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_homeinn_result
-- ----------------------------
INSERT INTO `tbl_homeinn_result` VALUES ('1', '242342', '{\"66\":\"66\"}', 'dfg', '4343', '1', '233423423');
INSERT INTO `tbl_homeinn_result` VALUES ('19', '452', '{\"question1\":\"A\",\"question2\":\"B\",\"question3\":\"C\",\"question4\":\"D\",\"final\":\"3\",\"status\":\"1\"}', '我', '2', '1', '1541756718');

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
