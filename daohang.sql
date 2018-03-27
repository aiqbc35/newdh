-- MySQL dump 10.13  Distrib 5.5.56, for Linux (x86_64)
--
-- Host: localhost    Database: daohang
-- ------------------------------------------------------
-- Server version	5.5.56-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dh_admin`
--

DROP TABLE IF EXISTS `dh_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dh_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dh_admin`
--

LOCK TABLES `dh_admin` WRITE;
/*!40000 ALTER TABLE `dh_admin` DISABLE KEYS */;
INSERT INTO `dh_admin` VALUES (1,'admin','c33367701511b4f6020ec61ded352059');
/*!40000 ALTER TABLE `dh_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dh_links`
--

DROP TABLE IF EXISTS `dh_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dh_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `link` varchar(145) NOT NULL,
  `source` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '来源数量',
  `email` varchar(45) NOT NULL COMMENT '管理邮箱',
  `sort_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态，0：正常，1：锁定，2：黑名单',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型，0：常规，1：推荐',
  `addtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `link` (`link`),
  KEY `sort_id` (`sort_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='链接表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dh_links`
--

LOCK TABLES `dh_links` WRITE;
/*!40000 ALTER TABLE `dh_links` DISABLE KEYS */;
INSERT INTO `dh_links` VALUES (12,'xiaobai','http://baidud.com',3,'admin@admin.com',5,0,0,1522138654),(13,'baidu','baidu.coms',0,'',4,0,0,1522145477),(14,'guge','gujkil.com',0,'',4,0,0,1522038024),(15,'baiduimages','http;//images.baidu.com',0,'',6,0,0,1522062624),(16,'demo1','jkhk.com',0,'',6,0,0,1522062258),(17,'dasdasd','baidukl.com',0,'',6,0,0,1522062659),(18,'baidu1','http://baidu.com',0,'admin@admin1.com',6,1,0,1522064087),(19,'baidu2','http://baidu2.com',0,'admin@admin2.com',6,1,0,1522064155),(20,'baiduss','http://googlkj.com',0,'ghjhyuy@jhj.com',6,1,0,1522066417),(21,'baidussss','http://googlkjww.com',0,'ghjhyuy@jhsj.com',6,1,0,1522066513),(22,'sadasdczxzc','http://jhjkhjk.com',0,'jhjkhjkds@vom.com',6,1,0,1522066847);
/*!40000 ALTER TABLE `dh_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dh_links_source`
--

DROP TABLE IF EXISTS `dh_links_source`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dh_links_source` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(145) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `addtime` date NOT NULL,
  `links_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否已更新，默认：0;更新：1，未找到对应网站：2',
  PRIMARY KEY (`id`),
  KEY `fk_dh_links_source_dh_links_idx` (`links_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='访问来源表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dh_links_source`
--

LOCK TABLES `dh_links_source` WRITE;
/*!40000 ALTER TABLE `dh_links_source` DISABLE KEYS */;
/*!40000 ALTER TABLE `dh_links_source` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dh_sort`
--

DROP TABLE IF EXISTS `dh_sort`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dh_sort` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `code` varchar(45) NOT NULL,
  `sorting` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='分类';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dh_sort`
--

LOCK TABLES `dh_sort` WRITE;
/*!40000 ALTER TABLE `dh_sort` DISABLE KEYS */;
INSERT INTO `dh_sort` VALUES (6,'在线美图','images',0),(5,'在线视频','video',2),(4,'激情小说','book',3);
/*!40000 ALTER TABLE `dh_sort` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dh_subscribe`
--

DROP TABLE IF EXISTS `dh_subscribe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dh_subscribe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `addtime` int(11) NOT NULL,
  `addip` char(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='订阅邮箱';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dh_subscribe`
--

LOCK TABLES `dh_subscribe` WRITE;
/*!40000 ALTER TABLE `dh_subscribe` DISABLE KEYS */;
INSERT INTO `dh_subscribe` VALUES (1,'admin@admin.com',1522132168,'192.168.50.1'),(2,'admin@admins.com',1522132239,'192.168.50.1');
/*!40000 ALTER TABLE `dh_subscribe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dh_system`
--

DROP TABLE IF EXISTS `dh_system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dh_system` (
  `id` int(11) NOT NULL,
  `website` varchar(45) NOT NULL COMMENT '网站名称',
  `notice` varchar(200) NOT NULL COMMENT '公告',
  `weblink` varchar(145) NOT NULL COMMENT '网站',
  `newlink` varchar(145) DEFAULT NULL COMMENT '最新网址',
  `email` varchar(45) DEFAULT NULL COMMENT '联系邮箱',
  `count` text,
  `keyword` varchar(145) NOT NULL,
  `descr` varchar(245) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统设置';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dh_system`
--

LOCK TABLES `dh_system` WRITE;
/*!40000 ALTER TABLE `dh_system` DISABLE KEYS */;
INSERT INTO `dh_system` VALUES (1,'nonggeng','new link','http://www.ngdh','126.com','qsinfo@mail.ru','ddf','福利导航,蓝色导航,蓝导航','蓝导航打造最全面的福利导航，汇集影视、技术、ACG、福利等宅男腐女的爱好导航');
/*!40000 ALTER TABLE `dh_system` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-27 18:53:10
