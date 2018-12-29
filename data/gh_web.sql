/*
Navicat MySQL Data Transfer

Source Server         : zzt
Source Server Version : 50719
Source Host           : 127.0.0.1:3306
Source Database       : gh_web

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-12-22 12:11:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '醋', '南有山西陈醋，北有光华醋');
INSERT INTO `category` VALUES ('2', '酱油', '..');
INSERT INTO `category` VALUES ('3', '料酒', '..');
INSERT INTO `category` VALUES ('4', '酱', null);
INSERT INTO `category` VALUES ('5', '醋精', null);
INSERT INTO `category` VALUES ('6', '大礼包', '非常好！');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `addtime` datetime DEFAULT NULL,
  `content` varchar(300) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `v_id` int(10) DEFAULT NULL,
  `r_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '2018-12-10 03:04:40', 'dsadsads', '159', '3', null);
INSERT INTO `comment` VALUES ('2', '2018-12-10 03:07:17', 'dsadsa', '159', '17', null);
INSERT INTO `comment` VALUES ('3', '2018-12-13 07:14:11', 'dsadsadsadsadsad', '19', '12', null);
INSERT INTO `comment` VALUES ('4', '2018-12-19 16:50:01', '我来了\r\n', '58', '9', null);

-- ----------------------------
-- Table structure for company
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) DEFAULT NULL,
  `introduce` varchar(300) DEFAULT NULL,
  `introduce_j` varchar(300) DEFAULT NULL,
  `introduce_h` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of company
-- ----------------------------
INSERT INTO `company` VALUES ('1', '关于光华', '丹东光华酿造有限公司简介 丹东光华酿造有限公司坐落于丹东市元宝区光华路1号，已有70多年的生产调味品的历史，2004年由国企转 制为股份有限责任公司， 占地23亩，建筑面积8000平方米，系丹东市最大的专业生产调味品企业，中国调味品协会会员单位。 ', '公司注册资本500万元， 资产总值3000余万元。公司2000年起被授予“辽宁省放心食品示范企业”。', '丹东“AAA级放心食品生产企业”，丹东市 第二批市级农业 产业化重点龙头企业，国家工业产品生产许可证获证单位，辽宁省“守合同、重信用企业“。');

-- ----------------------------
-- Table structure for milestone
-- ----------------------------
DROP TABLE IF EXISTS `milestone`;
CREATE TABLE `milestone` (
  `id` int(10) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `introduce` varchar(300) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of milestone
-- ----------------------------
INSERT INTO `milestone` VALUES ('1', '企业里程碑', '光华创始人-孙志国先生在中国南海沿岸广东省南水乡发明蚝油，并成立李锦记，生产及销售蚝油和虾酱两种产品', '光华创始人-孙志国先生在中国南海沿岸广东省南水乡发明蚝油，并成立李锦记，生产及销售蚝油和虾酱两种产品', '1888年 发明耗油,创立光华', null);

-- ----------------------------
-- Table structure for reply
-- ----------------------------
DROP TABLE IF EXISTS `reply`;
CREATE TABLE `reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(300) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `v_id` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `r_user_id` int(11) DEFAULT NULL,
  `r_username` varchar(50) DEFAULT NULL,
  `r_image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reply
-- ----------------------------
INSERT INTO `reply` VALUES ('42', 'hello 你好，怎么啦！', '2018-12-09 07:37:37', '19', '3', '20', '19', 'root', '1543072422.jpg');
INSERT INTO `reply` VALUES ('43', 'dsadsadsa', '2018-12-10 03:07:31', '159', '17', '2', '159', 'admin', 'qq.jpg');
INSERT INTO `reply` VALUES ('44', 'asdadsadsa', '2018-12-10 03:07:42', '159', '17', '2', '159', 'admin', 'qq.jpg');

-- ----------------------------
-- Table structure for shopping
-- ----------------------------
DROP TABLE IF EXISTS `shopping`;
CREATE TABLE `shopping` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `sum` int(11) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `v_id` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shopping
-- ----------------------------
INSERT INTO `shopping` VALUES ('54', '71', null, null, null, '2018-12-09 08:02:34', '5', null);
INSERT INTO `shopping` VALUES ('55', '74', null, null, null, '2018-12-09 08:19:27', '33', null);
INSERT INTO `shopping` VALUES ('56', '155', null, null, null, '2018-12-09 12:06:08', '3', null);
INSERT INTO `shopping` VALUES ('57', '157', null, null, null, '2018-12-09 12:25:25', '33', null);
INSERT INTO `shopping` VALUES ('58', '159', null, null, null, '2018-12-10 03:03:45', '3', null);
INSERT INTO `shopping` VALUES ('59', '159', null, null, null, '2018-12-10 03:06:00', '17', null);
INSERT INTO `shopping` VALUES ('60', '19', null, null, null, '2018-12-13 07:13:25', '12', null);
INSERT INTO `shopping` VALUES ('61', '19', null, null, null, '2018-12-19 13:18:21', '5', null);
INSERT INTO `shopping` VALUES ('62', '58', null, null, null, '2018-12-19 16:49:08', '12', null);
INSERT INTO `shopping` VALUES ('63', '155', null, null, null, '2018-12-20 03:56:29', '21', null);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL COMMENT '用户的姓名',
  `password` varchar(30) DEFAULT NULL COMMENT '用户的密码',
  `sex` varchar(2) DEFAULT NULL COMMENT '用户的性别',
  `addtime` datetime DEFAULT NULL COMMENT '用户注册的时间',
  `email` varchar(30) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL COMMENT '用户的手机号',
  `role` int(1) DEFAULT NULL COMMENT '用户的权限',
  `remark` int(1) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('19', 'root', '123456', '男', '2018-12-07 10:49:02', '2568044874@qq.com', '1543072422.jpg', '15641596067', '1', null, '我喜欢旅行！在云南');
INSERT INTO `user` VALUES ('58', 'zhang', '123456', '男', '2018-11-24 16:14:00', '2568044874@qq.com', '1543072440.jpg', '15641596067', '1', null, null);
INSERT INTO `user` VALUES ('67', '多多', '123456', '男', '2018-12-07 10:14:57', '2568044874@qq.com', '1544169242.jpg', '15641596067', '0', null, null);
INSERT INTO `user` VALUES ('155', 'xiaoming', '123456', null, '2018-12-09 12:05:21', '2568044825@qq.com', 'qq.jpg', '15641596067', null, null, '我是潇洒点好么~。。。\r\n');
INSERT INTO `user` VALUES ('157', 'username', '123456', null, '2018-12-09 12:24:54', '2568044874@qq.com', 'qq.jpg', '15641596067', null, null, null);
INSERT INTO `user` VALUES ('159', 'admin', '123456', null, '2018-12-10 03:02:37', '255555@qq.com', 'qq.jpg', '15641596067', null, null, null);
INSERT INTO `user` VALUES ('160', 'xiaozhang', '123456', null, '2018-12-19 11:39:00', '2568044874@qq.com', 'qq.jpg', '15641596067', '0', null, null);
INSERT INTO `user` VALUES ('170', 'xiaozhuzhu', '123456', null, '2018-12-19 12:46:43', '25680444@qq.com', 'qq.jpg', '15641596067', '0', null, null);
INSERT INTO `user` VALUES ('171', 'zhangzetian', 'asd5154744', null, '2018-12-20 07:18:36', '2568044874@qq.com', 'qq.jpg', '15641596067', '0', null, null);

-- ----------------------------
-- Table structure for vinegar
-- ----------------------------
DROP TABLE IF EXISTS `vinegar`;
CREATE TABLE `vinegar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL COMMENT '醋的价格',
  `image` varchar(100) DEFAULT NULL,
  `ml` varchar(10) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `explain` varchar(100) DEFAULT NULL,
  `o_price` decimal(10,2) DEFAULT NULL,
  `comment_id` int(10) DEFAULT NULL,
  `tab` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category_vinegar` (`category_id`),
  CONSTRAINT `fk_category_vinegar` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of vinegar
-- ----------------------------
INSERT INTO `vinegar` VALUES ('3', '光华醋', '15.00', '1542887508.jpg', '500ml', '2018-11-22 12:56:35', '1', '光华醋真的不错！', '20.00', null, '1');
INSERT INTO `vinegar` VALUES ('4', '光华醋（袋装）', '2.00', '1542887474.jpg', '200ml', '2018-11-22 12:56:17', '1', '光华醋真的不错！', '25.00', null, null);
INSERT INTO `vinegar` VALUES ('5', '光华醋（方瓶）', '15.00', '1542881502.jpg', '500', '2018-11-22 11:11:42', '1', '光华醋是瓶好醋！', '35.00', null, '1');
INSERT INTO `vinegar` VALUES ('7', '18°醋精', '18.00', '1542880649.jpg', '500', '2018-11-22 10:57:29', '5', null, '15.00', null, null);
INSERT INTO `vinegar` VALUES ('9', '陈醋', '50.00', '1542881397.jpg', '4.25L', '2018-11-22 11:09:57', '1', null, '32.00', null, '1');
INSERT INTO `vinegar` VALUES ('10', '9°塔醋', '35.00', '1542881473.jpg', '500ml', '2018-11-22 11:11:13', '1', null, '15.00', null, null);
INSERT INTO `vinegar` VALUES ('12', '光华白醋', '20.00', '1542887874.jpg', '500', '2018-12-03 08:49:21', '1', null, '15.00', null, '1');
INSERT INTO `vinegar` VALUES ('13', '一品鲜酱油', '36.00', '1542887991.jpg', '1.81L', '2018-11-22 12:59:51', '2', null, null, null, null);
INSERT INTO `vinegar` VALUES ('14', '二级酱油', '3.00', '1542888017.jpg', '200', '2018-11-22 13:00:17', '2', null, null, null, '1');
INSERT INTO `vinegar` VALUES ('15', '光华黄豆酱油', '36.00', '1542888052.jpg', '2L', '2018-11-22 13:00:52', '2', null, null, null, null);
INSERT INTO `vinegar` VALUES ('16', '光华生抽', '9.00', '1542888083.jpg', '500', '2018-11-22 13:01:23', '2', null, null, null, null);
INSERT INTO `vinegar` VALUES ('17', '光华老抽', '12.00', '1542888129.jpg', '500ml', '2018-11-22 13:02:09', '2', null, null, null, null);
INSERT INTO `vinegar` VALUES ('18', '特级酱油', '15.00', '1542888271.jpg', '500', '2018-11-22 13:04:31', '2', null, null, null, '1');
INSERT INTO `vinegar` VALUES ('20', '方瓶料酒', '15.00', '1542889247.jpg', '500', '2018-11-22 13:20:47', '3', null, null, null, null);
INSERT INTO `vinegar` VALUES ('21', '佐料酒', '12.00', '1542889283.jpg', '500', '2018-11-22 13:21:23', '3', null, null, null, '1');
INSERT INTO `vinegar` VALUES ('22', '新（佐料酒）', '15.00', '1542889311.jpg', '500', '2018-11-22 13:21:52', '3', null, null, null, null);
INSERT INTO `vinegar` VALUES ('23', '12°醋精', '5.00', '1542889350.jpg', '450', '2018-11-22 13:22:30', '5', null, null, null, null);
INSERT INTO `vinegar` VALUES ('24', '10°醋精', '12.00', '1542889373.jpg', '500', '2018-11-22 13:25:34', '5', null, null, null, null);
INSERT INTO `vinegar` VALUES ('27', '30°醋精', '10.00', '1542889457.jpg', '450', '2018-11-22 13:24:17', '5', null, null, null, null);
INSERT INTO `vinegar` VALUES ('28', '醋王', '12.00', '1542889482.jpg', '500', '2018-11-22 13:24:42', '5', null, null, null, null);
INSERT INTO `vinegar` VALUES ('29', '12°塑料醋精', '3.50', '1542889588.jpg', '500', '2018-11-22 13:26:28', '5', null, null, null, '1');
INSERT INTO `vinegar` VALUES ('30', '豆瓣酱', '10.00', '1542889895.jpg', '500', '2018-11-22 13:31:35', '4', null, null, null, null);
INSERT INTO `vinegar` VALUES ('31', '高丽辣酱桶', '10.00', '1542889918.jpg', '500', '2018-11-22 13:33:06', '4', null, null, null, null);
INSERT INTO `vinegar` VALUES ('32', '高丽鲜美辣酱', '10.00', '1542889945.jpg', '300', '2018-11-22 13:33:17', '4', null, null, null, null);
INSERT INTO `vinegar` VALUES ('33', '光华醋', '20.00', '1543042178.jpg', '500', '2018-11-24 07:49:38', '1', null, null, null, '1');
INSERT INTO `vinegar` VALUES ('34', '蘑菇肉酱', '15.00', '1543212620.jpg', '500', '2018-11-26 07:10:20', '4', null, null, null, null);
INSERT INTO `vinegar` VALUES ('35', '蒜蓉辣酱桶', '20.00', '1543212656.jpg', '1L', '2018-11-26 07:10:56', '4', null, null, null, null);
INSERT INTO `vinegar` VALUES ('36', '月亮岛豆瓣酱', '30.00', '1543212795.jpg', '1L', '2018-11-26 07:13:15', '4', null, null, null, null);
INSERT INTO `vinegar` VALUES ('37', '光华精品礼包', '69.00', '1543213705.jpg', '5l', '2018-11-26 07:34:07', '6', null, null, null, null);
INSERT INTO `vinegar` VALUES ('38', '光华醋礼包', '39.00', '1543213765.jpg', '3l', '2018-11-26 07:29:25', '6', null, null, null, null);
INSERT INTO `vinegar` VALUES ('39', '光华礼盒', '59.00', '1543213791.jpg', '5L', '2018-11-26 07:29:51', '6', null, null, null, null);
INSERT INTO `vinegar` VALUES ('40', '光华旅游礼盒', '32.00', '1543213819.jpg', '2L', '2018-11-26 07:30:19', '6', null, null, null, '1');
INSERT INTO `vinegar` VALUES ('41', '全家福', '30.00', '1543213841.jpg', '5L', '2018-12-07 13:25:55', '6', null, null, null, null);

-- ----------------------------
-- View structure for comment_view
-- ----------------------------
DROP VIEW IF EXISTS `comment_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `comment_view` AS select `user`.`id` AS `user_id`,`user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`image` AS `image`,`comment`.`id` AS `c_id`,`comment`.`addtime` AS `addtime`,`comment`.`content` AS `content`,`vinegar`.`id` AS `v_id`,`vinegar`.`name` AS `v_name` from ((`user` join `comment`) join `vinegar`) where ((`user`.`id` = `comment`.`user_id`) and (`comment`.`v_id` = `vinegar`.`id`)) ;

-- ----------------------------
-- View structure for reply_view
-- ----------------------------
DROP VIEW IF EXISTS `reply_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reply_view` AS select `user`.`id` AS `user_id`,`user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`image` AS `image`,`reply`.`id` AS `r_id`,`reply`.`r_user_id` AS `r_user_id`,`reply`.`r_username` AS `r_username`,`reply`.`addtime` AS `r_addtime`,`reply`.`r_image` AS `r_image`,`reply`.`content` AS `r_content`,`vinegar`.`id` AS `v_id`,`vinegar`.`name` AS `v_name`,`comment`.`id` AS `c_id`,`comment`.`content` AS `c_content`,`comment`.`addtime` AS `c_addtime` from (((`user` join `reply`) join `vinegar`) join `comment`) where ((`user`.`id` = `reply`.`user_id`) and (`reply`.`v_id` = `vinegar`.`id`) and (`reply`.`c_id` = `comment`.`id`)) ;

-- ----------------------------
-- View structure for shopping_view
-- ----------------------------
DROP VIEW IF EXISTS `shopping_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shopping_view` AS select `user`.`id` AS `user_id`,`user`.`username` AS `username`,`vinegar`.`image` AS `image`,`shopping`.`id` AS `s_id`,`shopping`.`addtime` AS `addtime`,`shopping`.`sum` AS `sum`,`vinegar`.`price` AS `price`,`vinegar`.`id` AS `v_id`,`vinegar`.`name` AS `v_name`,`vinegar`.`category_id` AS `category_id` from ((`user` join `shopping`) join `vinegar`) where ((`user`.`id` = `shopping`.`user_id`) and (`shopping`.`v_id` = `vinegar`.`id`)) ;

-- ----------------------------
-- Procedure structure for prog_login
-- ----------------------------
DROP PROCEDURE IF EXISTS `prog_login`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `prog_login`(in name varchar(30),in password varchar(30),out result boolean)
begin
declare getpwd varchar(30) default'';
select password into getpwd from user where username = name;
if getpwd = password then
set result = true;
else
set result = false;
end if;
end
;;
DELIMITER ;
