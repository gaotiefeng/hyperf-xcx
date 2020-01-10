# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 139.9.164.21 (MySQL 5.5.60-MariaDB)
# Database: note_xcx
# Generation Time: 2020-01-10 02:28:38 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin
# ------------------------------------------------------------

CREATE TABLE `admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mobile` varchar(11) DEFAULT '''''',
  `password` varchar(64) DEFAULT '''''',
  `content` varchar(1024) DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table remark
# ------------------------------------------------------------

CREATE TABLE `remark` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(11) DEFAULT NULL,
  `remark` text,
  `user_id` int(11) DEFAULT NULL,
  `openid` varchar(64) DEFAULT NULL,
  `money` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `remark` WRITE;
/*!40000 ALTER TABLE `remark` DISABLE KEYS */;

INSERT INTO `remark` (`id`, `type_id`, `remark`, `user_id`, `openid`, `money`, `created_at`, `updated_at`)
VALUES
	(1,1,'今天100元',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',10000,'2019-12-07 12:29:52','2019-12-07 12:29:52'),
	(2,2,'200购物',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',20000,'2019-12-07 12:30:42','2019-12-07 12:30:42'),
	(3,3,'一周公交',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',3000,'2019-12-07 14:03:04','2019-12-07 14:03:04'),
	(4,2,'购买长春万达企业',NULL,'oCID10LmF8R8Ml9OvhHBR8wClXck',53000000000000,'2019-12-07 15:58:05','2019-12-07 15:58:05'),
	(5,3,'公交',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',200,'2019-12-07 21:28:25','2019-12-07 21:28:25'),
	(6,1,'房租',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',200000,'2019-12-08 10:19:31','2019-12-08 10:19:31'),
	(7,1,'',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',1500,'2019-12-09 10:45:32','2019-12-09 10:45:32'),
	(8,3,'公交',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',200,'2019-12-09 16:30:02','2019-12-09 16:30:02'),
	(9,3,'公交',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',200,'2019-12-10 09:26:14','2019-12-10 09:26:14'),
	(10,3,'公交',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',200,'2019-12-11 10:21:53','2019-12-11 10:21:53'),
	(11,1,'午饭',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',1500,'2019-12-11 10:22:03','2019-12-11 10:22:03'),
	(12,2,'服务器',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',40000,'2019-12-11 18:58:45','2019-12-11 18:58:45'),
	(13,3,'公交',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',200,'2019-12-12 08:39:32','2019-12-12 08:39:32'),
	(14,3,'公交',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',200,'2019-12-12 23:08:02','2019-12-12 23:08:02'),
	(15,3,'公交',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',200,'2019-12-13 09:44:45','2019-12-13 09:44:45'),
	(16,1,'',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',1500,'2019-12-13 12:23:44','2019-12-13 12:23:44'),
	(17,3,'公交',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',200,'2019-12-13 18:18:37','2019-12-13 18:18:37'),
	(18,2,'超市',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',7000,'2019-12-14 21:50:00','2019-12-14 21:50:00'),
	(19,2,'饼干',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',1000,'2019-12-15 18:48:34','2019-12-15 18:48:34'),
	(20,3,'公交',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',200,'2019-12-16 08:44:45','2019-12-16 08:44:45'),
	(21,1,'午饭',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',1500,'2019-12-16 13:35:28','2019-12-16 13:35:28'),
	(22,1,'麻辣烫',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',3330,'2019-12-16 19:28:17','2019-12-16 19:28:17'),
	(23,1,'午饭',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',1500,'2019-12-17 12:48:35','2019-12-17 12:48:35'),
	(24,1,'',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',400,'2019-12-17 12:48:47','2019-12-17 12:48:47'),
	(25,1,'',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',1500,'2019-12-18 21:57:55','2019-12-18 21:57:55'),
	(26,1,'',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',2300,'2019-12-18 21:58:05','2019-12-18 21:58:05'),
	(27,1,'',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',630,'2019-12-19 08:57:59','2019-12-19 08:57:59'),
	(28,1,'',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',1500,'2019-12-19 12:12:14','2019-12-19 12:12:14'),
	(29,1,'苹果',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',1300,'2019-12-19 19:15:52','2019-12-19 19:15:52'),
	(30,1,'',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',3550,'2019-12-20 22:38:18','2019-12-20 22:38:18'),
	(31,1,'吃饭',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',16000,'2019-12-21 20:16:08','2019-12-21 20:16:08'),
	(32,1,'饺子',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',10000,'2019-12-23 12:37:11','2019-12-23 12:37:11'),
	(33,1,'午饭🥣',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',1500,'2019-12-23 12:37:24','2019-12-23 12:37:24'),
	(34,1,'午饭',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',1500,'2019-12-24 17:45:22','2019-12-24 17:45:22'),
	(35,1,'坐车',NULL,'oCID10AXfAyoeKCv7JkwPSMygyXo',1000,'2019-12-24 17:45:41','2019-12-24 17:45:41'),
	(36,1,'',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',1500,'2019-12-25 12:07:05','2019-12-25 12:07:05'),
	(37,1,'百事和烟',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',1580,'2019-12-25 12:07:20','2019-12-25 12:07:20'),
	(38,1,'超市',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',7580,'2019-12-26 21:01:00','2019-12-26 21:01:00'),
	(39,1,'',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',2500,'2019-12-29 08:48:14','2019-12-29 08:48:14'),
	(40,1,'',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',1500,'2020-01-03 21:07:06','2020-01-03 21:07:06'),
	(41,1,'烟',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',2600,'2020-01-04 09:53:28','2020-01-04 09:53:28'),
	(42,1,'烟',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',2600,'2020-01-04 09:53:29','2020-01-04 09:53:29'),
	(43,1,'烟',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',2600,'2020-01-04 09:53:29','2020-01-04 09:53:29'),
	(44,1,'烟',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',2600,'2020-01-04 09:53:29','2020-01-04 09:53:29'),
	(45,1,'烟',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',2600,'2020-01-04 09:53:29','2020-01-04 09:53:29'),
	(46,1,'烟',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',2600,'2020-01-04 09:53:29','2020-01-04 09:53:29'),
	(47,1,'15元',NULL,'oCID10O8mXhkB2StEjNrL9wytUcU',1500,'2020-01-06 09:19:34','2020-01-06 09:19:34');

/*!40000 ALTER TABLE `remark` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table remark_type
# ------------------------------------------------------------

CREATE TABLE `remark_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `display` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `remark_type` WRITE;
/*!40000 ALTER TABLE `remark_type` DISABLE KEYS */;

INSERT INTO `remark_type` (`id`, `name`, `display`, `created_at`, `updated_at`)
VALUES
	(1,'生活',1,NULL,NULL),
	(2,'购物',NULL,NULL,NULL),
	(3,'出行',NULL,NULL,NULL);

/*!40000 ALTER TABLE `remark_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(64) DEFAULT NULL,
  `session_key` varchar(64) DEFAULT NULL,
  `only_id` bigint(20) DEFAULT NULL,
  `money` bigint(11) DEFAULT NULL,
  `nickName` varchar(32) DEFAULT NULL,
  `avatarUrl` varchar(255) DEFAULT NULL,
  `province` varchar(64) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `openid` (`openid`),
  KEY `only_id` (`only_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `openid`, `session_key`, `only_id`, `money`, `nickName`, `avatarUrl`, `province`, `city`, `created_at`, `updated_at`)
VALUES
	(1,'oCID10O8mXhkB2StEjNrL9wytUcU','NI0LEz0NCO6uucJuNMo6OA==',61409845592461313,365570,'流年','https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTIVYVibMhaHM1uwhEYnMfFkD2e2y5d86rMlVibKgI8X8UVsy5ziaPd7FZlIxOYicOrcWoEHU43icoPFr0w/132','Beijing','Fengtai','2019-12-06 11:00:48','2020-01-06 09:19:34'),
	(2,'oCID10Nu_obJQziKMZrhAO2H51Cw','dLyXRWMDYhF7m0IZXfzY8Q==',61438151750590465,NULL,NULL,NULL,NULL,NULL,'2019-12-06 12:53:16','2019-12-06 12:53:16'),
	(3,'oCID10GeFirNafMhwvuR6AFEX4o8','8iPCQqhb+cpBtSefPTqVkA==',61521813317890049,NULL,'CC十七','https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKAGzI6VuRUrGBLvDc3Vf2JZibfPibe1zD7Ey5a9WREw1ibiaxic337hay24WpJclaRnTqqxbO6tYPJv4A/132','','','2019-12-06 18:25:43','2019-12-07 15:16:06'),
	(4,'oCID10KmJQ3urqJ9LjJcp2dg53D0','W/wj1g0/1qI2AStryO3w0w==',61817909982281729,NULL,NULL,NULL,NULL,NULL,'2019-12-07 14:02:18','2019-12-07 14:02:18'),
	(5,'oCID10KiIZHjQhBrERdXeh0-w52w','YEG7jeDBY1S+aN/XtBSuIA==',61817910192001025,NULL,NULL,NULL,NULL,NULL,'2019-12-07 14:02:18','2019-12-07 14:02:18'),
	(6,'oCID10K3Yxmw-TN7pg8jG5NcdjOg','c2mlIPhvqKpk8QfnjoPFfw==',61826054506962945,NULL,NULL,NULL,NULL,NULL,'2019-12-07 14:34:40','2019-12-07 14:34:40'),
	(7,'oCID10LmF8R8Ml9OvhHBR8wClXck','3Iv2lRdWVWXVgQyDHpvLIQ==',61846931076313088,53000000000000,NULL,NULL,NULL,NULL,'2019-12-07 15:57:37','2019-12-07 15:58:05'),
	(8,'oCID10OFabatAi6OGa77JPmVpOXQ','4l82sS29dIwpRcWyDnF5gQ==',61947475266666496,NULL,'谢泰平','https://wx.qlogo.cn/mmhead/g9NGeASbVQ5p9hFIWIicicL6t1ACSrdbGibN4Trw5VBL8Q/132','','','2019-12-07 22:37:09','2019-12-07 22:38:20'),
	(9,'oCID10FmTC0zluoR2Q430wLhk_og','kxXuh9LGG7nGaQwE+nW/eA==',62098025446674432,NULL,NULL,NULL,NULL,NULL,'2019-12-08 08:35:22','2019-12-08 08:35:22'),
	(10,'oCID10DnGycyeq8pSw6FxZd3YOn8','MNNYtvvEIlTnLulHgZ8DkA==',62837008321519617,NULL,NULL,NULL,NULL,NULL,'2019-12-10 09:31:50','2019-12-10 09:31:50'),
	(11,'oCID10BHCqdqb3FHX74OEMiAr1h8','D7k/N5EP33kJjYK4vSM8Xg==',63005555223998464,NULL,NULL,NULL,NULL,NULL,'2019-12-10 20:41:34','2019-12-10 20:41:34'),
	(12,'oCID10FxNPdWK0unxYhZCoEbp-Ps','runLkAU1YIa87ig4E71YtQ==',63212365302251520,NULL,NULL,NULL,NULL,NULL,'2019-12-11 10:23:22','2019-12-11 10:23:22'),
	(13,'oCID10IOu7zMSQI8Fy_gBqjdPKHM','nBU3uuk7V+VJqeVfvyUtFg==',63902436644933632,NULL,NULL,NULL,NULL,NULL,'2019-12-13 08:05:28','2019-12-13 08:05:28'),
	(14,'oCID10MxhJxxz450waq97Ch4AiUQ','jgkc2f7Vu4cWpaXyRvSWzQ==',66461199671287808,NULL,NULL,NULL,NULL,NULL,'2019-12-20 09:33:04','2019-12-20 09:33:04'),
	(15,'oCID10AXfAyoeKCv7JkwPSMygyXo','IzYHdTXv8zq92d6JLycp9g==',68034548847407104,1000,NULL,NULL,NULL,NULL,'2019-12-24 17:45:00','2019-12-24 17:45:41'),
	(16,'oCID10C3VJDXkVupBrNxDyE-avJA','ytCPjDL1HH2CSOhHVDcfiA==',68911499736842240,NULL,NULL,NULL,NULL,NULL,'2019-12-27 03:49:41','2019-12-27 03:49:41'),
	(17,'oCID10FuRcPS31Fa3Q6S2FhulLfo','xyAIzZVj6+pCCSv/v8DwnQ==',71840349596749824,NULL,NULL,NULL,NULL,NULL,'2020-01-04 05:47:54','2020-01-04 05:47:54'),
	(18,'oCID10MoHeMVGKwXNkJ9jOna2dAE','ijB47gtVE17ZKy17YY/p0A==',74003501868457985,NULL,NULL,NULL,NULL,NULL,'2020-01-10 05:03:29','2020-01-10 05:03:29');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_remark_money
# ------------------------------------------------------------

CREATE TABLE `user_remark_money` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(64) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL COMMENT '类型 ID',
  `money` bigint(11) DEFAULT NULL COMMENT '类型总金额',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `user_remark_money` WRITE;
/*!40000 ALTER TABLE `user_remark_money` DISABLE KEYS */;

INSERT INTO `user_remark_money` (`id`, `openid`, `type_id`, `money`, `created_at`, `updated_at`)
VALUES
	(1,'oCID10O8mXhkB2StEjNrL9wytUcU',1,292770,'2019-12-07 12:29:52','2020-01-06 09:19:34'),
	(2,'oCID10O8mXhkB2StEjNrL9wytUcU',2,68000,'2019-12-07 12:30:42','2019-12-15 18:48:34'),
	(3,'oCID10O8mXhkB2StEjNrL9wytUcU',3,4800,'2019-12-07 14:03:04','2019-12-16 08:44:46'),
	(4,'oCID10LmF8R8Ml9OvhHBR8wClXck',2,53000000000000,'2019-12-07 15:58:05','2019-12-07 15:58:05'),
	(5,'oCID10AXfAyoeKCv7JkwPSMygyXo',1,1000,'2019-12-24 17:45:41','2019-12-24 17:45:41');

/*!40000 ALTER TABLE `user_remark_money` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
