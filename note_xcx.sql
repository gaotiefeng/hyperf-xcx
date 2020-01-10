# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 139.9.164.21 (MySQL 5.5.60-MariaDB)
# Database: note_xcx
# Generation Time: 2020-01-10 04:12:47 +0000
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

DROP TABLE IF EXISTS `admin`;

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

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;

INSERT INTO `admin` (`id`, `mobile`, `password`, `content`, `created_at`, `updated_at`)
VALUES
	(1,'15904434500','$2y$12$DkP7KN05KskX6fCa/vEgduWJVHo44pSWaLVMC5NmSm/Jduz7ZelWS','','2020-01-10 11:54:03','2020-01-10 11:54:03');

/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table remark
# ------------------------------------------------------------

DROP TABLE IF EXISTS `remark`;

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



# Dump of table remark_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `remark_type`;

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

DROP TABLE IF EXISTS `user`;

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
	(1,'oCID10O8mXhkB2StEjNrL9wytUcU','NI0LEz0NCO6uucJuNMo6OA==',61409845592461313,0,'流年','https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTIVYVibMhaHM1uwhEYnMfFkD2e2y5d86rMlVibKgI8X8UVsy5ziaPd7FZlIxOYicOrcWoEHU43icoPFr0w/132','Beijing','Fengtai','2019-12-06 11:00:48','2020-01-10 12:10:53');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_remark_money
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_remark_money`;

CREATE TABLE `user_remark_money` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(64) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL COMMENT '类型 ID',
  `money` bigint(11) DEFAULT NULL COMMENT '类型总金额',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
