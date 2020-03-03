# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.21)
# Database: shop_bee
# Generation Time: 2020-03-03 06:28:05 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table t_attachment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_attachment`;

CREATE TABLE `t_attachment` (
  `attach_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '附件ID',
  `g_id` bigint(20) unsigned NOT NULL COMMENT '附件组ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '附件名称',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '附件地址',
  `attach_type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '附件类型 [1:图片 | 2:视频]',
  `attach_size` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '附件大小',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '是否删除 [1:是 | 2: 否]',
  PRIMARY KEY (`attach_id`),
  KEY `idx_g_id_is_delete` (`g_id`,`is_delete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table t_brand
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_brand`;

CREATE TABLE `t_brand` (
  `brand_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '品牌ID',
  `brand_name` varchar(60) NOT NULL DEFAULT '' COMMENT '品牌名称',
  `brand_logo` varchar(255) NOT NULL DEFAULT '' COMMENT '品牌图片',
  `brand_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '品牌描述',
  `cat_id` bigint(20) unsigned NOT NULL COMMENT '品牌分类ID',
  `sort_order` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '品牌在前台页面的显示顺序,数字越大越靠前',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '品牌是否显示 [1:是 | 2:否 ]',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '品牌创建时间',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '品牌修改时间',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '是否被删除: 1:删除时间戳 2: 正常',
  PRIMARY KEY (`brand_id`),
  KEY `idx_created_at` (`created_at`),
  KEY `idx_show_order` (`is_show`,`sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='产品品牌表';

LOCK TABLES `t_brand` WRITE;
/*!40000 ALTER TABLE `t_brand` DISABLE KEYS */;

INSERT INTO `t_brand` (`brand_id`, `brand_name`, `brand_logo`, `brand_desc`, `cat_id`, `sort_order`, `is_show`, `created_at`, `updated_at`, `is_delete`)
VALUES
	(10000,'阿迪达斯','http://www.baidu.com','全球最大的运动品牌',10010,1,1,'2020-02-16 14:20:03','2020-02-16 14:31:25',2),
	(10001,'耐克','http://www.nike.com','美国最大的运动品牌',10010,100,1,'2020-02-16 14:20:45','2020-02-16 14:20:45',2);

/*!40000 ALTER TABLE `t_brand` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_category`;

CREATE TABLE `t_category` (
  `cat_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `parent_cat_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '父级分类ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '分类名称',
  `alias` varchar(30) NOT NULL COMMENT '分类别名',
  `desc` varchar(255) NOT NULL COMMENT '分类描述',
  `show_in_nav` tinyint(2) unsigned NOT NULL DEFAULT '2' COMMENT '导航栏是否展示  [1:是 | 2: 否]',
  `is_show` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '前端是否显示 [1:是 | 2: 否]',
  `is_parent` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '是否为父级分类 [1:是 | 2: 否]',
  `state` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '分类状态[1:正常]',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `is_delete` tinyint(2) unsigned NOT NULL DEFAULT '2' COMMENT '是否删除 [1:是 | 2: 否]',
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `uk_name_is_delete` (`name`,`is_delete`),
  KEY `idx_cat_id_pid_is_delete` (`cat_id`,`parent_cat_id`,`is_delete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `t_category` WRITE;
/*!40000 ALTER TABLE `t_category` DISABLE KEYS */;

INSERT INTO `t_category` (`cat_id`, `parent_cat_id`, `name`, `alias`, `desc`, `show_in_nav`, `is_show`, `is_parent`, `state`, `created_at`, `updated_at`, `is_delete`)
VALUES
	(10001,10000,'游戏话费','游戏话费','游戏话费',1,0,1,1,'2020-02-14 23:19:14','2020-02-14 23:35:06',2),
	(10002,10000,'服装鞋包','服装鞋包','服装鞋包',1,0,1,1,'2020-02-14 23:20:22','2020-02-14 23:35:06',2),
	(10003,10000,'手机数码','手机数码','手机数码',1,0,1,1,'2020-02-14 23:20:38','2020-02-14 23:35:06',2),
	(10004,10000,'家用电器','家用电器','家用电器',1,0,1,1,'2020-02-14 23:20:55','2020-02-14 23:35:06',2),
	(10005,10000,'美妆饰品','美妆饰品','美妆饰品',1,0,1,1,'2020-02-14 23:21:15','2020-02-14 23:35:06',2),
	(10006,10000,'母婴用品','母婴用品','母婴用品',1,0,1,1,'2020-02-14 23:21:30','2020-02-14 23:35:06',2),
	(10007,10000,'家具建材','家具建材','家具建材',1,0,1,1,'2020-02-14 23:21:48','2020-02-15 13:18:11',2),
	(10008,10000,'百货食品','百货食品','百货食品',1,0,1,1,'2020-02-14 23:22:05','2020-02-14 23:35:06',2),
	(10009,10000,'运动户外','运动户外','运动户外',1,0,1,1,'2020-02-14 23:22:18','2020-02-14 23:35:06',2),
	(10010,10002,'流行男鞋','流行男鞋','流行男鞋',1,0,1,1,'2020-02-14 23:24:47','2020-02-14 23:35:06',2),
	(10011,10002,'男鞋','男鞋','男鞋',1,1,1,1,'2020-02-14 23:28:03','2020-02-15 14:11:53',2),
	(10012,10011,'T恤','T恤','T恤',1,0,0,1,'2020-02-14 23:28:46','2020-02-14 23:35:06',2),
	(10013,10011,'风衣','风衣','风衣',1,0,0,1,'2020-02-14 23:33:08','2020-02-14 23:33:08',2),
	(10014,10011,'夹克','夹克','夹克',1,0,0,1,'2020-02-14 23:34:31','2020-02-14 23:34:31',2),
	(10016,10011,'衬衫','衬衫','衬衫',1,1,1,1,'2020-02-14 23:51:16','2020-02-19 14:40:16',2),
	(10017,10000,'asdfasdf','asdfasdf','asdfasdfasdfasdf',0,0,0,1,'2020-02-19 11:44:32','2020-02-19 14:40:00',2),
	(10018,10000,'asdfasfsafasdf','asdfasdf','sdfasfasdf',0,0,0,1,'2020-02-19 11:44:45','2020-02-19 14:40:00',2),
	(10019,10000,'aaaaaaaaaa','撒打算放','asdfasfasdfadsf',0,0,0,1,'2020-02-19 11:45:21','2020-02-19 14:40:00',2),
	(10020,10000,'阿萨德飞洒','大事发生','撒打发斯蒂芬',0,0,0,1,'2020-02-19 14:53:30','2020-02-19 14:53:30',2),
	(10021,10018,'我的撒发生的','阿斯顿发发阿法士大夫','按时发送',0,0,0,1,'2020-02-19 14:55:27','2020-02-19 14:55:27',2);

/*!40000 ALTER TABLE `t_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_item_sku
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_item_sku`;

CREATE TABLE `t_item_sku` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table t_item_spd
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_item_spd`;

CREATE TABLE `t_item_spd` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` bigint(20) unsigned NOT NULL COMMENT '店铺ID',
  `goods_id` bigint(20) unsigned NOT NULL COMMENT '商品ID',
  `cate_id` int(11) unsigned NOT NULL COMMENT '商品分类ID',
  `goods_type` tinyint(4) unsigned NOT NULL COMMENT '商品类型[1:实物、]',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '商品名称',
  `sharing_description` varchar(40) NOT NULL DEFAULT '' COMMENT '分享描述',
  `selling_point` varchar(60) NOT NULL DEFAULT '' COMMENT '商品卖点',
  `is_delete` tinyint(2) unsigned NOT NULL DEFAULT '2' COMMENT '是否删除 [1：是 | 2：否]',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  `updated_at` datetime NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table t_item_spec
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_item_spec`;

CREATE TABLE `t_item_spec` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table t_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_menu`;

CREATE TABLE `t_menu` (
  `menu_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '菜单ID',
  `menu_pid` int(11) unsigned NOT NULL COMMENT '菜单父级ID',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `addr` varchar(100) NOT NULL DEFAULT '' COMMENT '菜单地址',
  `is_menu` tinyint(11) unsigned NOT NULL DEFAULT '1' COMMENT '是否为菜单',
  `group_title` varchar(20) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `is_delete` int(11) unsigned NOT NULL DEFAULT '2' COMMENT '是否删除 [1:是 | 2: 否]',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table t_proudct
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_proudct`;

CREATE TABLE `t_proudct` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table t_seller
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_seller`;

CREATE TABLE `t_seller` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '用户手机号',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '用户姓名',
  `email` varchar(30) NOT NULL DEFAULT '' COMMENT '邮箱',
  `avatar` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `position` varchar(20) NOT NULL DEFAULT '' COMMENT '职位',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '登录密码',
  `state` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT '状态',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '是否删除 [1:是 | 2: 否]',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_mobile_is_delete` (`mobile`,`is_delete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `t_seller` WRITE;
/*!40000 ALTER TABLE `t_seller` DISABLE KEYS */;

INSERT INTO `t_seller` (`id`, `mobile`, `name`, `email`, `avatar`, `position`, `password`, `state`, `created_at`, `updated_at`, `is_delete`)
VALUES
	(1,'13520928996','杨骏','psj474@163.com','','','$2y$10$YoE.6W11gp6R.YjUFXtpr.7/hwJe9yY1eXzBje7RFywMNzAl1J9eO',2,'2020-02-07 13:35:03','2020-02-07 13:35:03',2),
	(2,'17610258996','17610258996','','','','$2y$10$o8Pk20J1.VR2F2wx0jS1G.uHFx1W/0oMXwpLlh00Kf8DKAf7x9uI.',2,'2020-02-19 19:36:18','2020-02-19 19:36:18',2);

/*!40000 ALTER TABLE `t_seller` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_shop
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_shop`;

CREATE TABLE `t_shop` (
  `s_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '店铺ID',
  `seller_id` bigint(20) unsigned NOT NULL COMMENT '卖家ID',
  `cat_id` bigint(20) unsigned NOT NULL COMMENT '店铺主营分类',
  `version` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '店铺版本 [1:单店铺 | 2:多店铺]',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '店铺类型 [1:普通商城 | 2: 新零售]',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '店铺名称',
  `desc` varchar(100) NOT NULL DEFAULT '' COMMENT '店铺描述',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT '店铺LOGO',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '店铺地址',
  `cert_type` tinyint(4) unsigned NOT NULL COMMENT '店铺认证类型',
  `state` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '店铺状态[1:营业中 | 2: 打样]',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '是否删除 [1:是 | 2: 否]',
  PRIMARY KEY (`s_id`),
  UNIQUE KEY `uk_name_is_delete` (`name`,`is_delete`),
  KEY `idx_seller_id_is_delete` (`seller_id`,`is_delete`),
  KEY `idx_sid_is_delete` (`s_id`,`is_delete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='店铺表';

LOCK TABLES `t_shop` WRITE;
/*!40000 ALTER TABLE `t_shop` DISABLE KEYS */;

INSERT INTO `t_shop` (`s_id`, `seller_id`, `cat_id`, `version`, `type`, `name`, `desc`, `logo`, `url`, `cert_type`, `state`, `created_at`, `updated_at`, `is_delete`)
VALUES
	(1,1,1,1,1,'舌尖上的中国','舌尖上的中国','','',0,1,'2020-02-09 22:46:46','2020-02-10 23:56:25',2);

/*!40000 ALTER TABLE `t_shop` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_shop_address
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_shop_address`;

CREATE TABLE `t_shop_address` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table t_shop_attach_group
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_shop_attach_group`;

CREATE TABLE `t_shop_attach_group` (
  `g_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '附件组ID',
  `s_id` bigint(20) unsigned NOT NULL COMMENT '店铺ID',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '附件组名称',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '是否删除 [1:是 | 2: 否]',
  PRIMARY KEY (`g_id`),
  UNIQUE KEY `uk_s_id_name_is_delete` (`s_id`,`name`,`is_delete`),
  KEY `idx_g_id_is_delete` (`g_id`,`is_delete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table t_shop_permission
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_shop_permission`;

CREATE TABLE `t_shop_permission` (
  `permission_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '权限ID',
  `permission_name` varchar(20) NOT NULL DEFAULT '' COMMENT '权限名称',
  `permission_desc` varchar(30) NOT NULL DEFAULT '' COMMENT '权限描述',
  `permission_type` tinyint(3) unsigned NOT NULL COMMENT '权限类型 [1:menu | 2: button]',
  `route` varchar(30) NOT NULL DEFAULT '' COMMENT '权限路由',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '是否删除 [1:是 | 2: 否]',
  PRIMARY KEY (`permission_id`),
  UNIQUE KEY `uk_name_route_type_is_delete` (`permission_name`,`route`,`permission_type`,`is_delete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table t_shop_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_shop_role`;

CREATE TABLE `t_shop_role` (
  `role_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色ID',
  `role_name` varchar(20) NOT NULL DEFAULT '' COMMENT '角色名称',
  `role_type` smallint(6) unsigned NOT NULL COMMENT '角色类型',
  `role_desc` varchar(30) NOT NULL DEFAULT '' COMMENT '角色描述',
  `is_admin` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '是否为超管 [1:是 | 2: 否]',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '是否删除 [1:是 | 2: 否]',
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `uk_name_type_is_delete` (`role_name`,`role_type`,`is_delete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table t_shop_role_permission
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_shop_role_permission`;

CREATE TABLE `t_shop_role_permission` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `role_id` bigint(20) unsigned NOT NULL COMMENT '角色ID',
  `permission_id` bigint(20) unsigned NOT NULL COMMENT '权限ID',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `is_delete` tinyint(1) unsigned NOT NULL COMMENT '是否删除 [1:是 | 2: 否]',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table t_shop_seller
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_shop_seller`;

CREATE TABLE `t_shop_seller` (
  `s_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table t_shop_staff
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_shop_staff`;

CREATE TABLE `t_shop_staff` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `staff_no` varchar(20) NOT NULL DEFAULT '' COMMENT '员工编号',
  `s_id` bigint(20) unsigned NOT NULL COMMENT '员工所属店铺ID',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '员工姓名',
  `phone` varchar(20) NOT NULL DEFAULT '' COMMENT '员工联系方式',
  `state` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '员工状态[1:启用 | 2: 停用]',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  `updated_at` datetime NOT NULL COMMENT '更新时间',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '是否删除 [1:是 | 2: 否]',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_statf_no_sid_is_delete` (`staff_no`,`s_id`,`is_delete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='店铺员工表';



# Dump of table t_sku_images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_sku_images`;

CREATE TABLE `t_sku_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
