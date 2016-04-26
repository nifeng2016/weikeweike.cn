/*
 Navicat MySQL Backup

 Source Server         : MysqlCon
 Source Server Version : 50616
 Source Host           : localhost
 Source Database       : phpproject1

 Target Server Version : 50616
 File Encoding         : utf-8

 Date: 04/15/2016 21:19:27 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `p_about`
-- ----------------------------
DROP TABLE IF EXISTS `p_about`;
CREATE TABLE `p_about` (
  `DES` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `CONN` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `GURL` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `p_about`
-- ----------------------------
BEGIN;
INSERT INTO `p_about` VALUES ('<p><img src=\"data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsKCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT/2wBDAQMEBAUEBQkFBQkUDQsNFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBT/wAARCAGuAa4DASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD9U6KKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKK', '<p>dasdsadasdasda<br></p>', '', '0');
COMMIT;

-- ----------------------------
--  Table structure for `p_bbs1`
-- ----------------------------
DROP TABLE IF EXISTS `p_bbs1`;
CREATE TABLE `p_bbs1` (
  `ID` int(32) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(60) NOT NULL,
  `USERNAME` varchar(40) NOT NULL,
  `LASTTIME` varchar(30) NOT NULL,
  `CONDITION` int(1) NOT NULL DEFAULT '0',
  `REPLY` int(32) NOT NULL,
  `VIEW` int(32) NOT NULL,
  `CONTENT` varchar(1000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `p_bbs1`
-- ----------------------------
BEGIN;
INSERT INTO `p_bbs1` VALUES ('3', '如何学习php', 'wangxiangan', '2015-12-15 00:38:38', '0', '0', '0', ''), ('4', '12321', 'wangxg', '2015-12-15 00:38:38', '0', '0', '0', ''), ('5', 'ASDS.KHFD;DGKLHSFLGDA', '温志远', '2016-04-14 19:12:54', '0', '0', '1', '<p>SD,HF.S<br></p>');
COMMIT;

-- ----------------------------
--  Table structure for `p_bbs2`
-- ----------------------------
DROP TABLE IF EXISTS `p_bbs2`;
CREATE TABLE `p_bbs2` (
  `ID` int(32) NOT NULL AUTO_INCREMENT,
  `FID` int(32) NOT NULL,
  `USERNAME` varchar(40) CHARACTER SET utf8 NOT NULL,
  `WORDS` varchar(200) CHARACTER SET utf8 NOT NULL,
  `TIME` varchar(30) CHARACTER SET utf8 NOT NULL,
  `CONDITION` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `p_bbs2`
-- ----------------------------
BEGIN;
INSERT INTO `p_bbs2` VALUES ('14', '3', 'wangxiangan', 'php哪家好', '2015-12-15 00:38:38', '0'), ('15', '3', 'wang', '去蓝翔', '2015-12-15 00:38:55', '0'), ('16', '3', 'wangxiangan', '去新东方', '2015-12-15 00:39:18', '0'), ('17', '3', 'wang', '去新东方烹饪学校', '2015-12-15 00:39:47', '0'), ('18', '3', 'wangxg', '123qwe', '2016-04-12 11:20:05', '0'), ('19', '3', 'wangxg', '21312312', '2016-04-12 11:20:51', '0'), ('20', '4', 'wangxg', '2312313', '2016-04-12 11:21:10', '0'), ('21', '4', 'wangxg', '1232131', '2016-04-13 14:16:27', '0'), ('22', '3', '温志远', 'ASDFASDFA', '2016-04-14 19:13:02', '0'), ('23', '3', '温志远', 'asdassd', '2016-04-15 17:31:45', '0'), ('24', '3', '温志远', 'asda', '2016-04-15 17:31:48', '0'), ('25', '3', '温志远', 'asdas', '2016-04-15 17:31:52', '0'), ('26', '3', '温志远', 'asda', '2016-04-15 17:31:55', '0');
COMMIT;

-- ----------------------------
--  Table structure for `p_dongtai1`
-- ----------------------------
DROP TABLE IF EXISTS `p_dongtai1`;
CREATE TABLE `p_dongtai1` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(100) NOT NULL,
  `TIME` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `p_dongtai1`
-- ----------------------------
BEGIN;
INSERT INTO `p_dongtai1` VALUES ('1', '111', '2016-04-11 00:00:01'), ('2', '1', '2016-04-11 00:00:01'), ('3', '1', '2016-04-11 00:00:01'), ('4', '?????', '2016-04-11 13:08:51'), ('5', '这是个逗逼', '2016-04-11 13:10:59'), ('6', 'ASDDSA1', '2016-04-11 13:12:54'), ('7', '阿萨德撒', '2016-04-11 15:41:57'), ('8', '烦烦烦', '2016-04-11 15:42:51'), ('9', 'dasda', '2016-04-11 15:57:55'), ('10', 'ads', '2016-04-11 15:58:01'), ('11', 'asdsa', '2016-04-11 15:58:05'), ('12', 'asdasd', '2016-04-11 16:29:32');
COMMIT;

-- ----------------------------
--  Table structure for `p_dongtai2`
-- ----------------------------
DROP TABLE IF EXISTS `p_dongtai2`;
CREATE TABLE `p_dongtai2` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TID` int(11) NOT NULL,
  `CONTENT` varchar(1000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `p_dongtai2`
-- ----------------------------
BEGIN;
INSERT INTO `p_dongtai2` VALUES ('1', '1', 'ashfskahfaljkfjlkas'), ('2', '5', ''), ('3', '6', '<p>DSFSFA</p><p>哈哈哈</p><p><strike>撒大声地</strike><br></p>'), ('4', '7', '<p>是大大大<br></p>'), ('5', '8', '<p>阿萨德撒是打发<br></p>'), ('6', '9', '<p>asdsadsad<br></p>'), ('7', '10', '<p>asdasd<br></p>'), ('8', '11', '<p>asdas<br></p>'), ('9', '12', '<p style=\"margin-left: 40px;\">qda<u>asdasd<strike>asdasd</strike></u></p><p style=\"margin-left: 40px;\"><u><strike>asdasdad</strike></u></p><p style=\"margin-left: 40px;\"><u><strike>saasdasda</strike></u></p><p style=\"margin-left: 40px;\"><u><strike><i>asdasdasd</i></strike></u></p><p style=\"margin-left: 40px;\"><u><strike><i><b>asdasdsadad</b></i></strike></u><br></p>');
COMMIT;

-- ----------------------------
--  Table structure for `p_file`
-- ----------------------------
DROP TABLE IF EXISTS `p_file`;
CREATE TABLE `p_file` (
  `ID` int(32) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) DEFAULT NULL,
  `SIZE` varchar(32) DEFAULT NULL,
  `CREATE_TIME` datetime DEFAULT NULL,
  `ROUTE` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `p_file`
-- ----------------------------
BEGIN;
INSERT INTO `p_file` VALUES ('28', '500题_35页版.docx', '65KB', null, 'http://localhost/project2/public/Uploads/2015-12-28/56811a2d2ed4f.docx');
COMMIT;

-- ----------------------------
--  Table structure for `p_hangye1`
-- ----------------------------
DROP TABLE IF EXISTS `p_hangye1`;
CREATE TABLE `p_hangye1` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(100) NOT NULL,
  `TIME` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `p_hangye1`
-- ----------------------------
BEGIN;
INSERT INTO `p_hangye1` VALUES ('1', 'asfdsa', '2016-04-11 16:31:01'), ('2', 'sssssssss', '2016-04-15 02:22:07'), ('3', 'sssssssss', '2016-04-15 02:22:41'), ('4', 'asdsaxzc', '2016-04-15 02:24:03'), ('5', 'cccccccccc', '2016-04-15 02:24:12');
COMMIT;

-- ----------------------------
--  Table structure for `p_hangye2`
-- ----------------------------
DROP TABLE IF EXISTS `p_hangye2`;
CREATE TABLE `p_hangye2` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TID` int(11) NOT NULL,
  `CONTENT` varchar(10000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `p_hangye2`
-- ----------------------------
BEGIN;
INSERT INTO `p_hangye2` VALUES ('1', '0', '<p style=\"margin-left: 40px;\">asfdasdfsfaas</p><p style=\"margin-left: 40px;\"><u>asdfasdfasdf</u><br></p>'), ('2', '2', '<p>ds<br></p>'), ('3', '4', '<p>vcxbvbfgbd<br></p>'), ('4', '5', '<p>sss<br></p>');
COMMIT;

-- ----------------------------
--  Table structure for `p_history`
-- ----------------------------
DROP TABLE IF EXISTS `p_history`;
CREATE TABLE `p_history` (
  `ID` int(36) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(60) CHARACTER SET utf8 NOT NULL,
  `QQ` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `EMAIL` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `TEXT` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `USERNAME` varchar(30) CHARACTER SET utf8 NOT NULL,
  `SRC` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `p_history`
-- ----------------------------
BEGIN;
INSERT INTO `p_history` VALUES ('4', '温志远', '1231231', '12331231', '1312312312dd', '温志远', 'd41d8cd98f00b204e9800998ecf8427e.jpg'), ('6', 'qQQ', 'q', 'q', 'q', '温志远', 'd41d8cd98f00b204e9800998ecf8427e.jpg');
COMMIT;

-- ----------------------------
--  Table structure for `p_hr`
-- ----------------------------
DROP TABLE IF EXISTS `p_hr`;
CREATE TABLE `p_hr` (
  `ID` int(32) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(60) CHARACTER SET utf8 NOT NULL,
  `POSITION` varchar(255) CHARACTER SET utf8 NOT NULL,
  `SALARY` varchar(255) CHARACTER SET utf8 NOT NULL,
  `PLACE` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `POSDES` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `WORK` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `OFFIDES` varchar(255) CHARACTER SET utf8 NOT NULL,
  `BOSS` varchar(32) CHARACTER SET utf8 NOT NULL,
  `TOOLS` varchar(255) CHARACTER SET utf8 NOT NULL,
  `PUBLISHER` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `DATE` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `p_hr`
-- ----------------------------
BEGIN;
INSERT INTO `p_hr` VALUES ('8', '信科院学生助理', '学生助理', '450/月', '南校区', '发生的李开复韩师傅发生的李开复韩师傅发生的李开复韩师傅发生的李开复韩师傅发生的李开复韩师傅发生的李开复韩师傅发生的李开复韩师傅发生的李开复韩师傅', '多少啊多少啊多少啊多少啊多少啊多少啊多少啊多少啊多少啊多少啊多少啊多少啊多少啊多少啊多少啊多少啊多少啊', '的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒的撒', '文老师', 'Tel: 133321231231', '温志远', '2016-02-23'), ('9', '神奇的职位', '123', '123', '123', '123', '123', '123', '123', '123', '温志远', '2016-04-09'), ('13', 'sdad', 'asdsa', 'asdsa', 'asdas', 'asdasd', 'asd', 'asd', 'asd', 'asd', '温志远', '2016-04-09');
COMMIT;

-- ----------------------------
--  Table structure for `p_info`
-- ----------------------------
DROP TABLE IF EXISTS `p_info`;
CREATE TABLE `p_info` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SRC` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `TITLE` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `p_info`
-- ----------------------------
BEGIN;
INSERT INTO `p_info` VALUES ('5', 'http://localhost/project2/public/edit/f3ccdd27d2000e3f9255a7e3e2c48800.jpg', 'dadasdadas'), ('6', 'http://localhost/project2/public/edit/f3ccdd27d2000e3f9255a7e3e2c48800.jpg', 'afsfsdahkjflaks'), ('7', 'http://localhost/project2/public/edit/f3ccdd27d2000e3f9255a7e3e2c48800.jpg', '项目3'), ('8', 'http://localhost/project2/public/edit/f3ccdd27d2000e3f9255a7e3e2c48800.jpg', '项目4');
COMMIT;

-- ----------------------------
--  Table structure for `p_leccom`
-- ----------------------------
DROP TABLE IF EXISTS `p_leccom`;
CREATE TABLE `p_leccom` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LID` int(11) NOT NULL,
  `UNAME` varchar(11) CHARACTER SET utf8 NOT NULL,
  `WORD` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `p_leccom`
-- ----------------------------
BEGIN;
INSERT INTO `p_leccom` VALUES ('1', '22', '温志远', 'adksjflhhfa'), ('2', '22', '温志远', 'ADFSSADF'), ('3', '22', '温志远', 'dfsaf');
COMMIT;

-- ----------------------------
--  Table structure for `p_lecture`
-- ----------------------------
DROP TABLE IF EXISTS `p_lecture`;
CREATE TABLE `p_lecture` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) NOT NULL,
  `DESCPT` varchar(255) NOT NULL DEFAULT '这个老师很懒，还没有写课程描述~',
  `CLASS` varchar(50) NOT NULL,
  `TEACHER` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `p_lecture`
-- ----------------------------
BEGIN;
INSERT INTO `p_lecture` VALUES ('22', '人生', '人生就是修行，人生就是打代码，人生就是学习，人生就是熬夜。。。。。。你懂么懂么，懂么懂么，么懂么，懂么，么，，', '', ''), ('23', 'kkk', '1', '', ''), ('24', 'qqq', '2', '', ''), ('25', '333', 'dsad', '', ''), ('26', 'dads', 'ssss', '', ''), ('27', 'aaa', 'sss', '', ''), ('28', 'sss', 'sss', '', ''), ('29', 'ssss', 'ssss', '', ''), ('30', 'sss', 'sss', '', ''), ('31', 'ddsas', 'dsadasd', '', ''), ('32', 'asdasd', 'asdasdsd', '', ''), ('33', 'asdfh1', 'asdfhalsgkfjfdsfs', '汽车维修', ''), ('34', '哈哈', 'asdasd大赛', '汽车维修', '文治也');
COMMIT;

-- ----------------------------
--  Table structure for `p_mycounter`
-- ----------------------------
DROP TABLE IF EXISTS `p_mycounter`;
CREATE TABLE `p_mycounter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Counter` int(11) NOT NULL,
  `CounterLastDay` int(10) DEFAULT NULL,
  `CounterToday` int(10) DEFAULT NULL,
  `RecordDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

-- ----------------------------
--  Records of `p_mycounter`
-- ----------------------------
BEGIN;
INSERT INTO `p_mycounter` VALUES ('1', '2186', '0', '0', '2015-12-09');
COMMIT;

-- ----------------------------
--  Table structure for `p_questionnaire1`
-- ----------------------------
DROP TABLE IF EXISTS `p_questionnaire1`;
CREATE TABLE `p_questionnaire1` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `p_questionnaire1`
-- ----------------------------
BEGIN;
INSERT INTO `p_questionnaire1` VALUES ('45', '问卷3', 'wangxg'), ('46', '问卷4', 'wangxg'), ('47', '问卷5', 'wangxg'), ('48', '问卷6', '温志远'), ('49', 'd撒打算', '温志远'), ('50', '的撒发射点', '温志远'), ('51', '倒萨', '温志远'), ('52', 'Real Sheet', '温志远'), ('53', 'sadassa', '温志远');
COMMIT;

-- ----------------------------
--  Table structure for `p_questionnaire2`
-- ----------------------------
DROP TABLE IF EXISTS `p_questionnaire2`;
CREATE TABLE `p_questionnaire2` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TYPE` varchar(255) NOT NULL,
  `SEQUENCE` int(11) NOT NULL,
  `VALUE1` varchar(255) DEFAULT NULL,
  `VALUE2` varchar(100) DEFAULT NULL,
  `VALUE3` varchar(100) DEFAULT NULL,
  `VALUE4` varchar(100) DEFAULT NULL,
  `VALUE5` varchar(100) DEFAULT NULL,
  `VALUE6` varchar(100) DEFAULT NULL,
  `FID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `p_questionnaire2`
-- ----------------------------
BEGIN;
INSERT INTO `p_questionnaire2` VALUES ('1', 'radio', '1', '羁哥1', '羁哥11', '羁哥12', null, null, null, '3'), ('2', 'checkbox', '2', '羁哥2', '羁哥21', '羁哥22', '羁哥23', null, null, '3'), ('3', 'textfield', '3', '羁哥3', null, null, null, null, null, '3'), ('4', 'radio', '1', 'weq', 'qwe', 'ewq', null, null, null, '4'), ('5', 'checkbox', '1', '123', '123', '13123', null, null, null, '5'), ('6', 'radio', '1', '羁哥1', '羁哥2', '羁哥3', '羁哥4', null, null, '6'), ('7', 'textfield', '2', '及格', null, null, null, null, null, '6'), ('8', 'checkbox', '3', '及格1', '及格2', '羁哥23', null, null, null, '6'), ('9', 'imgradio', '1', '羁锅啦啦啦', 'http://localhost/project2.3/public/ques/284512_154157096851_2.jpg', 'http://localhost/project2.3/public/ques/740_63210943251.jpg', null, null, null, '7'), ('10', 'imgradio', '1', '羁锅11', 'http://localhost/project2.3/public/ques/740_63210943251.jpg', 'http://localhost/project2.3/public/ques/235076-1305120P10463.jpg', 'http://localhost/project2.3/public/ques/284512_154157096851_2.jpg', null, null, '8'), ('11', 'radio', '2', '叽叽叽叽哥', '我是羁哥', '你是羁哥', null, null, null, '8'), ('17', 'imgradio', '1', '羁锅是谁', 'http://localhost/project2.3/public/ques/284512_154157096851_2.jpg', 'http://localhost/project2.3/public/ques/740_63210943251.jpg', 'http://localhost/project2.3/public/ques/2394914_124948072138_2.jpg', 'http://localhost/project2.3/public/ques/235076-1305120P10463.jpg', 'http://localhost/project2.3/public/ques/2786001_194345427000_2.jpg', '11'), ('18', 'imgcheckbox', '1', '下面哪两张图一样', 'http://localhost/project2.3/public/ques/740_63210943251.jpg', 'http://localhost/project2.3/public/ques/235076-1305120P10463.jpg', 'http://localhost/project2.3/public/ques/284512_154157096851_2.jpg', 'http://localhost/project2.3/public/ques/2786001_194345427000_2.jpg', 'http://localhost/project2.3/public/ques/235076-1305120P10463.jpg', '12'), ('19', 'imgradio', '2', '找出下图中的羁锅', 'http://localhost/project2.3/public/ques/2394914_124948072138_2.jpg', 'http://localhost/project2.3/public/ques/3.jpg', 'http://localhost/project2.3/public/ques/QQ20130915221417.jpg', 'http://localhost/project2.3/public/ques/mmexport1451305091646.jpg', null, '12'), ('20', 'radio', '3', '羁锅牛不牛逼', '牛逼', '不牛逼', null, null, null, '12'), ('21', 'checkbox', '4', '羁锅有哪些特点', '牛', '逗', '坑', '傻', '萌', '12'), ('22', 'textfield', '5', '说说你心目中的羁锅', null, null, null, null, null, '12'), ('24', 'radio', '1', '2131', '312123', '1231', null, null, null, '15'), ('25', 'checkbox', '2', '321', '123', '3131', null, null, null, '15'), ('26', 'checkbox', '1', '3123', '123123', '31231', null, null, null, '16'), ('27', 'radio', '2', '31321', '31', '3', null, null, null, '16'), ('28', 'radio', '1', '1232', '2321', '12333', null, null, null, '48'), ('29', 'imgradio', '2', '企鹅威威请问', 'http://localhost:8080/project2.1/public/ques/6b13f9104302c16799380fb141412c51.jpg', 'http://localhost:8080/project2.1/public/ques/586e508f161f26ce94633729ac56c602.jpg', null, null, null, '48'), ('30', 'imgradio', '1', '的撒旦撒', 'http://localhost:8080/project2.1/public/ques/156005c5baf40ff51a327f1c34f2975b.jpg', 'http://localhost:8080/project2.1/public/ques/799bad5a3b514f096e69bbc4a7896cd9.jpg', 'http://localhost:8080/project2.1/public/ques/89327175cf60582249f0a8bf54bb473c.jpg', null, null, '49'), ('31', 'radio', '1', '三大殿', '阿斯顿', '倒萨', null, null, null, '50'), ('32', 'checkbox', '2', 'd阿斯顿', '阿斯顿', '大', '倒萨', '阿斯顿', null, '50'), ('33', 'imgradio', '1', '好看', 'http://localhost:8080/project2.1/public/ques/156005c5baf40ff51a327f1c34f2975b.jpg', 'http://localhost:8080/project2.1/public/ques/799bad5a3b514f096e69bbc4a7896cd9.jpg', 'http://localhost:8080/project2.1/public/ques/89327175cf60582249f0a8bf54bb473c.jpg', null, null, '51'), ('34', 'textfield', '1', '姓名', null, null, null, null, null, '52'), ('35', 'radio', '2', '性别', '男', '女', null, null, null, '52'), ('36', 'imgradio', '3', '你见过的', 'http://localhost:8080/project2.1/public/ques/6b13f9104302c16799380fb141412c51.jpg', 'http://localhost:8080/project2.1/public/ques/6b13f9104302c16799380fb141412c51.jpg', 'http://localhost:8080/project2.1/public/ques/6b13f9104302c16799380fb141412c51.jpg', null, null, '52');
COMMIT;

-- ----------------------------
--  Table structure for `p_questionnaire3`
-- ----------------------------
DROP TABLE IF EXISTS `p_questionnaire3`;
CREATE TABLE `p_questionnaire3` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FID` int(11) NOT NULL,
  `PROB1` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `PROB2` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `PROB3` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `PROB4` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `PROB5` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `PROB6` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `PROB7` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `PROB8` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `PROB9` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `PROB10` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `p_questionnaire3`
-- ----------------------------
BEGIN;
INSERT INTO `p_questionnaire3` VALUES ('2', '45', 'a:1:{i:0;s:1:\"A\";}', 'a:1:{i:0;s:1:\"B\";}', 'a:2:{i:0;s:1:\"B\";i:1;s:1:\"C\";}', null, null, null, null, null, null, null), ('3', '46', 'a:1:{i:0;s:8:\"asdasdas\";}', null, null, null, null, null, null, null, null, null), ('4', '46', null, null, null, null, null, null, null, null, null, null), ('5', '45', 'A', 'B', 'B', null, null, null, null, null, null, null), ('6', '45', 'A', 'B', 'B', null, null, null, null, null, null, null), ('7', '45', null, null, null, null, null, null, null, null, null, null), ('8', '45', 'B', 'B', 'AB', null, null, null, null, null, null, null), ('9', '45', 'A', 'B', 'BC', null, null, null, null, null, null, null), ('10', '45', 'B', 'A', 'B', null, null, null, null, null, null, null), ('11', '45', null, null, null, null, null, null, null, null, null, null), ('12', '45', 'A', 'A', 'BC', null, null, null, null, null, null, null), ('13', '45', null, null, null, null, null, null, null, null, null, null), ('14', '45', 'A', 'A', 'CD', null, null, null, null, null, null, null), ('15', '45', 'A', 'B', 'C', null, null, null, null, null, null, null), ('16', '45', null, null, null, null, null, null, null, null, null, null), ('18', '45', null, null, null, null, null, null, null, null, null, null), ('19', '48', 'A', 'B', null, null, null, null, null, null, null, null), ('20', '48', 'A', 'A', null, null, null, null, null, null, null, null), ('21', '48', 'A', 'B', null, null, null, null, null, null, null, null), ('22', '49', 'B', null, null, null, null, null, null, null, null, null), ('23', '52', 'wwe', 'A', 'B', null, null, null, null, null, null, null), ('24', '52', 'weweew', 'A', 'B', null, null, null, null, null, null, null), ('25', '50', 'A', 'ABCD', null, null, null, null, null, null, null, null), ('27', '51', null, null, null, null, null, null, null, null, null, null), ('28', '52', 'dads', 'A', null, null, null, null, null, null, null, null), ('29', '52', 'sadsad', 'B', 'B', null, null, null, null, null, null, null), ('30', '52', 'dsa', 'A', 'B', null, null, null, null, null, null, null), ('31', '52', 'dsa', 'B', 'C', null, null, null, null, null, null, null), ('32', '52', 'dsa', 'B', 'B', null, null, null, null, null, null, null), ('33', '52', '', 'B', 'B', null, null, null, null, null, null, null), ('34', '52', 'dsa', 'B', 'B', null, null, null, null, null, null, null), ('35', '52', '', null, null, null, null, null, null, null, null, null), ('36', '52', '', 'B', 'B', null, null, null, null, null, null, null), ('37', '52', '', 'B', 'B', null, null, null, null, null, null, null), ('38', '52', '', null, null, null, null, null, null, null, null, null), ('39', '52', '', null, null, null, null, null, null, null, null, null), ('40', '52', 'asdsa', 'A', 'B', null, null, null, null, null, null, null), ('41', '52', 'dsa', 'A', 'B', null, null, null, null, null, null, null), ('42', '52', 'dsa', 'A', 'B', null, null, null, null, null, null, null), ('43', '52', 'dsa', 'A', null, null, null, null, null, null, null, null), ('44', '52', 'dsa', 'A', null, null, null, null, null, null, null, null), ('45', '52', 'asd', 'A', 'B', null, null, null, null, null, null, null), ('46', '52', '', 'A', 'B', null, null, null, null, null, null, null), ('47', '52', '', 'A', 'B', null, null, null, null, null, null, null), ('48', '52', 'dsads', 'A', 'B', null, null, null, null, null, null, null), ('49', '52', '', 'A', 'B', null, null, null, null, null, null, null), ('50', '52', '', 'A', 'C', null, null, null, null, null, null, null), ('51', '52', '', 'A', 'C', null, null, null, null, null, null, null), ('52', '52', '', 'A', 'C', null, null, null, null, null, null, null), ('53', '52', '', 'A', 'B', null, null, null, null, null, null, null), ('54', '52', 'dsa', 'A', 'B', null, null, null, null, null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for `p_search`
-- ----------------------------
DROP TABLE IF EXISTS `p_search`;
CREATE TABLE `p_search` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(100) NOT NULL,
  `URL` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `p_signin`
-- ----------------------------
DROP TABLE IF EXISTS `p_signin`;
CREATE TABLE `p_signin` (
  `ID` int(32) NOT NULL AUTO_INCREMENT,
  `USERID` varchar(32) CHARACTER SET utf8 NOT NULL,
  `TIME` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`,`USERID`,`TIME`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `p_signin`
-- ----------------------------
BEGIN;
INSERT INTO `p_signin` VALUES ('1', '3', '2015-12-04'), ('2', '2', '2015-12-04'), ('3', '1', '2015-12-03'), ('4', '1', '2015-12-04'), ('5', '1', '2015-12-05'), ('6', '565bfb21d854b', '2015-12-05'), ('7', '1', '2015-12-09'), ('8', '2', '2015-12-09'), ('9', '3', '2015-12-09'), ('10', '1', '2015-12-11'), ('11', '566c56e6cc7b4', '2015-12-13'), ('12', '2', '2015-12-13'), ('13', '1', '2015-12-13'), ('14', '1', '2015-12-14'), ('15', '1', '2015-12-15'), ('16', '566ffc90e946e', '2015-12-15'), ('17', '565ddad0e3c25', '2015-12-15'), ('18', '300000015', '2015-12-28'), ('19', '300000015', '2015-12-29'), ('20', '300000015', '2016-02-23'), ('21', '300000017', '2016-02-23');
COMMIT;

-- ----------------------------
--  Table structure for `p_text`
-- ----------------------------
DROP TABLE IF EXISTS `p_text`;
CREATE TABLE `p_text` (
  `TEXT` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `p_text`
-- ----------------------------
BEGIN;
INSERT INTO `p_text` VALUES ('DATA工作室与2015年成立。已完成承接项目主要有：资格证模拟考证\r\n平台APP一项；微课学习系统、考勤系统、图书资料管理系统、班主\r\n任系统、仓库管理系统、串口数据传输系统软件六款；已向中国版权\r\n保护中心申请相应软件著作权6款。目前，DATA工作室主要提供的服务有：APP开发、微信APP、论文润色、系统软件开发、软件著作权申请、数据抓取、数据分析等。', '1');
COMMIT;

-- ----------------------------
--  Table structure for `p_user`
-- ----------------------------
DROP TABLE IF EXISTS `p_user`;
CREATE TABLE `p_user` (
  `ID` varchar(32) COLLATE utf8_slovenian_ci NOT NULL,
  `USERNAME` varchar(32) CHARACTER SET utf8 NOT NULL,
  `PASSWORD` varchar(32) CHARACTER SET utf8 NOT NULL,
  `DEPARTMENT` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `SEX` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `E_MAIL` varchar(40) CHARACTER SET utf8 NOT NULL,
  `QQ` varchar(15) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `ROOT` varchar(3) COLLATE utf8_slovenian_ci NOT NULL DEFAULT '1',
  `BADTIMES` int(2) NOT NULL DEFAULT '0',
  `SCHOOL` varchar(255) CHARACTER SET utf8 NOT NULL,
  `LASTONLINE` datetime NOT NULL,
  `RTIME` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- ----------------------------
--  Records of `p_user`
-- ----------------------------
BEGIN;
INSERT INTO `p_user` VALUES ('1', 'wangxg', '46f94c8de14fb36680850768ff1b7f2a', '信息科学与技术学院', '男', 'wang@163.com', '1234524', '0', '0', '', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('2', 'wang', '78ba34a4e264914769bab3c56f82ea31', '数据科学与计算机学院', '男', 'wangxg@qq.com', null, '1', '0', '', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('3', 'wangxiangan', '9470564c89ac8b24c53a73538d770193', '信息科学与技术学院', '男', '12306@123.com', '2222', '1', '0', '', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('300000015', '温志远', '4297f44b13955235245b2497399d7a93', '信息科学与技术学院', '男', 'gee@qq.com', '', '0', '0', '', '2016-04-15 19:02:11', '0000-00-00 00:00:00'), ('300000016', 'aaaaa', '4297f44b13955235245b2497399d7a93', '信息科学与技术学院', '男', '460660934@qq.com', '123456', '1', '0', '中山大学', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('300000017', 'www', 'd41d8cd98f00b204e9800998ecf8427e', '信息科学与技术学院', '女', '132', '132', '1', '0', '123', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('300000018', 'dd', 'd41d8cd98f00b204e9800998ecf8427e', '信息科学与技术学院', '男', '1', '1', '1', '0', '1', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('300000019', 'sa', 'd41d8cd98f00b204e9800998ecf8427e', '信息科学与技术学院', '男', 'q', 'q', '1', '0', 'q', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('300000020', 'qww', 'd41d8cd98f00b204e9800998ecf8427e', '信息科学与技术学院', '男', 'a', 'a', '1', '0', 'a', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('300000021', '1234qwer', '4297f44b13955235245b2497399d7a93', '信息科学与技术学院', '男', '', '', '1', '0', 'sysu', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('300000022', 'wangxx', '202cb962ac59075b964b07152d234b70', '信息科学与技术学院', '男', '', '', '1', '0', '123', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('300000023', '王众', '4297f44b13955235245b2497399d7a93', '信息科学与技术学院', '男', '3232323@qq.com', '46464646', '1', '0', '大山中学', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('300000024', '安度因', '4297f44b13955235245b2497399d7a93', '信息科学与技术学院', '男', '123@163.com', '123123123', '1', '0', '中山大学', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('300000025', '吉安娜', '4297f44b13955235245b2497399d7a93', '信息科学与技术学院', '男', '123@163.com', '123123', '1', '0', '中山大学', '0000-00-00 00:00:00', '2016-04-14 16:37:25'), ('4', 'wenzhiyuan', '96e79218965eb72c92a549dd5a330112', '传播与设计学院', '男', 'woshijige@163.com', '45621212', '1', '0', '', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('56599e97d02f5', 'jige', '46f94c8de14fb36680850768ff1b7f2a', '数据科学与计算机学院', '女', 'jigehenniubi@qq.com', null, '1', '1', '', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('565bfb21d854b', '123qwe', '46f94c8de14fb36680850768ff1b7f2a', '信息科学与技术学院', '女', '123qwe@123.com', null, '1', '1', '', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('565c0a978dd7f', '12345', '827ccb0eea8a706c4c34a16891f84e7b', '数据科学与计算机学院', '女', '12345@12345.com', '22235152', '1', '0', '', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('565d8e8b4db3d', '123123', '4297f44b13955235245b2497399d7a93', '移动信息工程学院', '女', '123@123.COM', '123123', '1', '0', '', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('565d92ebe5e5b', '1234', '81dc9bdb52d04dc20036dbd8313ed055', '信息科学与技术学院', '男', '1234', '', '1', '0', '', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('565ddad0e3c25', 'admin', '21232f297a57a5a743894a0e4a801fc3', '数据科学与计算机学院', '男', 'admin@126.com', '', '1', '0', '', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('566c578129b3c', 'wang11', '4297f44b13955235245b2497399d7a93', '移动信息工程学院', '男', '123123@qq.com', '', '1', '0', '', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('566e5251d93a5', 'aaaaaa', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', '信息科学与技术学院', '男', '123123@126.com', '123123', '1', '0', '', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('566e747603a6a', 'wangxg123', '4297f44b13955235245b2497399d7a93', '信息科学与技术学院', '男', '1@2.com', '', '1', '0', '', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('566e7643123ff', '32132131', '200820e3227815ed1756a6b531e7e0d2', '信息科学与技术学院', '男', '1234@1234.com', '', '1', '0', '', '2016-04-14 00:00:00', '0000-00-00 00:00:00'), ('566ffc90e946e', '123456', 'e10adc3949ba59abbe56e057f20f883e', '数据科学与计算机学院', '男', 'wang@123.com', '', '1', '0', '', '2016-04-14 00:00:00', '0000-00-00 00:00:00');
COMMIT;

-- ----------------------------
--  Table structure for `p_userlecture`
-- ----------------------------
DROP TABLE IF EXISTS `p_userlecture`;
CREATE TABLE `p_userlecture` (
  `ID` int(10) NOT NULL,
  `USERNAME` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `NAME` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Mainid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Mainid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `p_userlecture`
-- ----------------------------
BEGIN;
INSERT INTO `p_userlecture` VALUES ('22', 'wangxg', '人生', '1'), ('24', 'wangxg', 'qqq', '2'), ('24', '温志远', 'qqq', '6');
COMMIT;

-- ----------------------------
--  Table structure for `p_vappend`
-- ----------------------------
DROP TABLE IF EXISTS `p_vappend`;
CREATE TABLE `p_vappend` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `FNAME` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `p_vappend`
-- ----------------------------
BEGIN;
INSERT INTO `p_vappend` VALUES ('1', '实打实的', 'http://localhost/project2/public/appends/2015-12-28/5680b719941fb.cpp', '计算机呀哈哈'), ('2', 'lec1', 'http://localhost/project2/public/appends/2015-12-28/5680ee0982d8f.pdf', '计算机呀哈哈'), ('3', '图片1', 'http://localhost/project2/public/appends/2016-02-22/56cb227f1fa5d.jpg', 'A  教学'), ('4', '大多数', 'http://localhost/project2/public/appends/2016-02-22/56cb24f9ba0eb.jpg', '计算机呀哈哈');
COMMIT;

-- ----------------------------
--  Table structure for `p_videos`
-- ----------------------------
DROP TABLE IF EXISTS `p_videos`;
CREATE TABLE `p_videos` (
  `URL` varchar(255) NOT NULL,
  `ID` int(32) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) NOT NULL,
  `LEC` varchar(255) NOT NULL,
  `UPID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `p_videos`
-- ----------------------------
BEGIN;
INSERT INTO `p_videos` VALUES ('http://localhost/eclipse/project2//public/videos/2016-04-14/570f9d160637c.mp4', '22', '新年', '人生', '0'), ('http://localhost/eclipse/project2//public/videos/2016-04-14/570f9de496311.mp4', '23', 'sadsa', 'kkk', '0'), ('http://localhost/eclipse/project2//public/videos/2016-04-14/570fa2b7b0862.mp4', '24', 'asddsgf', 'aaa', '300000015');
COMMIT;

-- ----------------------------
--  Table structure for `p_vu`
-- ----------------------------
DROP TABLE IF EXISTS `p_vu`;
CREATE TABLE `p_vu` (
  `iD` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NOT NULL,
  `LID` int(11) NOT NULL,
  PRIMARY KEY (`iD`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `p_vu`
-- ----------------------------
BEGIN;
INSERT INTO `p_vu` VALUES ('5', '300000015', '22'), ('6', '300000015', '23'), ('7', '300000015', '27'), ('8', '300000015', '0'), ('9', '300000015', '33');
COMMIT;

-- ----------------------------
--  Table structure for `p_zzfw`
-- ----------------------------
DROP TABLE IF EXISTS `p_zzfw`;
CREATE TABLE `p_zzfw` (
  `ID` int(11) NOT NULL,
  `ZC` varchar(10000) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `p_zzfw`
-- ----------------------------
BEGIN;
INSERT INTO `p_zzfw` VALUES ('0', '<p>asdaksdsdfhlskjdgk;sa</p><p><strike>sadasdasdas</strike><br></p>');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
