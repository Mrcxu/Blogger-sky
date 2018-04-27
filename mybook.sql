/*
Navicat MySQL Data Transfer

Source Server         : xyf
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mybook

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-12-31 04:28:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MessageContent` varchar(255) DEFAULT NULL,
  `MessageName` varchar(255) DEFAULT NULL,
  `ReplyTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `MessageName` (`MessageName`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------

-- ----------------------------
-- Table structure for `text`
-- ----------------------------
DROP TABLE IF EXISTS `text`;
CREATE TABLE `text` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MessageName` varchar(255) DEFAULT NULL,
  `MessageText` varchar(255) DEFAULT NULL,
  `TextTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `T_M` (`MessageName`),
  CONSTRAINT `T_M` FOREIGN KEY (`MessageName`) REFERENCES `message` (`MessageName`) ON DELETE NO ACTION ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of text
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '123');
