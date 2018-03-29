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
  `title` varchar(8) NOT NULL,
  `link` varchar(50) NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=174 DEFAULT CHARSET=utf8 COMMENT='链接表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dh_links`
--

LOCK TABLES `dh_links` WRITE;
/*!40000 ALTER TABLE `dh_links` DISABLE KEYS */;
INSERT INTO `dh_links` VALUES (26,'13名站导航','http://www.13mzdh.info/?ngdh.pw',37,'',7,0,0,1522230394),(25,'8090导航','http://www.8090dh.top/?ngdh.pw',9,'',7,0,0,1522229871),(27,'大官人导航','http://www.dgrdh.top/?ngdh.pw',10,'',7,0,0,1522230694),(33,'好莱污论坛','http://www.hlw-1.com',0,'',9,0,0,1522233656),(32,'福利社区','http://fl477.com/forum.php',0,'',9,0,0,1522233596),(31,'CKCK在线视频','http://www.ckck.pw/',0,'',6,0,0,1522233346),(30,'Se98视频','http://98hut.com/',0,'',6,0,0,1522233285),(29,'老虎视频','http://laohu8.xyz/',1,'',6,0,0,1522233191),(28,'k6在线','http://www.6kdh.xyz/',0,'',6,0,0,1522233107),(24,'美国十次啦','http://www.mgavdh.pw/?ngdh.pw',23,'',7,0,0,1522229823),(34,'第一会所','http://162.252.9.15/forum/',0,'',9,0,0,1522233734),(35,'奇色社区','http://qssq2.xyz/',0,'',9,0,0,1522233804),(36,'18P2P','http://14.102.250.19/forum/',0,'',9,0,0,1522234083),(37,' 1024核工厂','http://y3.1024yxy.club/pw/',0,'',9,0,0,1522234167),(38,'52尤物','http://www.52youwu.info',0,'',9,0,0,1522234280),(39,'爱碧论坛','http://173.192.147.23',0,'',9,0,0,1522234396),(40,'玛雅网','http://www.tttmaya.com',0,'',9,0,0,1522234425),(41,'桃隐社区','http://user.taoy11.info',0,'',9,0,0,1522234480),(42,'AV狼','http://av.avlang18.info',0,'',9,0,0,1522234553),(43,'痴漢俱樂部','http://www.piring.com',0,'',9,0,0,1522234610),(44,'夜色小说','http://www.yesesu.com/',0,'',4,0,0,1522234705),(45,'艳文屋','https://www.yanwenwu.com/',0,'',4,0,0,1522234765),(46,'翻走','http://www.fanzou.com',0,'',4,0,0,1522235224),(47,'老哥小说','http://www.laogedu.net/',0,'',4,0,0,1522235358),(48,'桃色成人小说','https://www.taosetxt.com/',0,'',4,0,0,1522235436),(49,'情色文学','https://wuso.me/forum-novel-1.html',0,'',4,0,0,1522235549),(50,'草榴小说','https://dd.ddder.us/thread0806.php?fid=20',0,'',4,0,0,1522235601),(51,'微笑街拍','http://www.siwahd.com/',0,'',5,0,0,1522235715),(52,'美女生活照','http://www.nucvrj.com/',0,'',5,0,0,1522235756),(53,'蚂蚁小说','http://mayi02.xyz/',0,'',4,0,0,1522235817),(54,'妹子图','http://www.mmjpg.com/',0,'',5,0,0,1522235857),(55,'性感美女图片','https://girl-atlas.com/',0,'',5,0,0,1522235935),(56,'尤物美女图','http://www.ugirls.com/',0,'',5,0,0,1522235974),(57,'搜性情色小說','http://sosing.com/',0,'',4,0,0,1522243275),(58,'牛牛小说网','http://www.66rou.com/',0,'',4,0,0,1522243343),(59,'大众小说','http://www.dzxs.cc/',0,'',4,0,0,1522243406),(60,'微拍福利社','http://www.qiumm.com/',0,'',5,0,0,1522243493),(61,'藏图吧','http://www.cangtuba.com/',0,'',5,0,0,1522243569),(62,'国模丽影','http://www.guomoart.com/',0,'',5,0,0,1522243604),(63,'一图吧','https://www.1tuba.com/',0,'',5,0,0,1522243691),(64,'爱美女图','http://www.lovemn.cn/',0,'',5,0,0,1522243747),(65,'老司机美图','http://fq.qf.qq.ff.f.q.l.cmm889.com/',0,'',5,0,0,1522243840),(66,'豆瓣美女','https://www.dbmeinv.com/',0,'',5,0,0,1522243975),(67,'美女私房图','http://www.sifangtu.net/',0,'',5,0,0,1522244010),(68,'宅宅爱动漫','http://18h.animezilla.com/',0,'',12,0,0,1522244283),(69,'117成人漫画','http://www.177piczz.info/',0,'',12,0,0,1522244324),(70,'绅士漫画','https://www.wnacg.org',0,'',12,0,0,1522244355),(71,'漫爱次元','https://www.comici.win/',0,'',12,0,0,1522244424),(72,'绅士二次元','https://www.acg.tf/',0,'',12,0,0,1522244459),(73,'紳士の庭','http://gmgard.com/',0,'',12,0,0,1522244523),(74,'爱弹幕动漫','https://idanmu.ch/',0,'',12,0,0,1522244609),(75,'天使二次元','https://www.tianshif.com/',0,'',12,0,0,1522244660),(76,'Featured','https://hentaistream.com/',0,'',12,0,0,1522244969),(77,'hentai动漫','https://www.hentai.xxx/',0,'',12,0,0,1522245042),(78,'HentaiSt','http://hentai.animestigma.com/',0,'',12,0,0,1522245132),(79,'Studio F','https://www.studiofow.com/',0,'',12,0,0,1522245218),(80,'Cartoon ','https://www.cartoontube.xxx/',0,'',12,0,0,1522245296),(81,' Anime动漫','https://www.cartoonpornvideos.com/',0,'',12,0,0,1522245427),(82,'3D动漫','http://collection-3d.com/',0,'',12,0,0,1522245565),(83,'免費成人視頻','https://www.xvideos.com/',0,'',11,0,0,1522245710),(84,'Pornhub','https://www.pornhub.com/',0,'',11,0,0,1522245782),(85,'hot porn','https://liebelib.net/',0,'',11,0,0,1522245862),(86,' Sex Mov','https://beemtube.com/',0,'',11,0,0,1522245910),(87,' TNAFlix','https://www.tnaflix.com/',0,'',11,0,0,1522246044),(88,'Keezmovi','https://www.keezmovies.com/',0,'',11,0,0,1522246109),(89,'無料HD動画','https://www.hd21.com',0,'',11,0,0,1522246246),(90,'PornoMov','https://www.pornomovies.com/',0,'',11,0,0,1522246304),(91,'InstantF','http://instantfap.com/',0,'',11,0,0,1522246360),(92,'ThisVid','https://thisvid.com/',0,'',11,0,0,1522246417),(93,'Fetish S','https://www.fetishshrine.com/',0,'',11,0,0,1522246458),(94,'tub99','https://tub99.com/',0,'',11,0,0,1522246559),(95,'SeeMyPor','http://www.seemyporn.com/',0,'',11,0,0,1522246631),(96,'VRGirlz','https://www.vrgirlz.com/',0,'',13,0,0,1522247209),(97,'vrporn','https://vrporn.com/',0,'',13,0,0,1522247244),(98,'vrtube','https://vrtube.xxx/',0,'',13,0,0,1522247271),(99,'vrsexper','https://vrsexperience.com/',0,'',13,0,0,1522247305),(100,'vrtittie','http://vrtitties.com',0,'',13,0,0,1522247330),(101,'metavers','https://metaversexxx.com/',0,'',13,0,0,1522247450),(102,'Trannies','https://www.tranniesvr.com/',0,'',13,0,0,1522247542),(103,'gayvirtV','https://www.gayvirt.com/',0,'',13,0,0,1522247577),(104,'Bdsm Por','http://www.bdsmpornvr.com/',0,'',13,0,0,1522247622),(105,'HoloGirl','https://www.hologirlsvr.com/',0,'',13,0,0,1522247664),(106,'Handhel','http://www.naughtyvirtualreality.com/',0,'',13,0,0,1522247805),(107,'Czech VR','https://www.czechvr.com/',0,'',13,0,0,1522247849),(108,'pornfoxV','https://www.pornfoxvr.com/',0,'',13,0,0,1522247889),(109,'Google短网','https://goo.gl/',0,'',10,0,0,1522248145),(110,'内射少妇','http://www.fdrg.fiberstorm.net',0,'tok00@yahoo.cn',6,1,0,1522248181),(111,'百度云盘','http://pan.baidu.com/',0,'',10,0,0,1522248183),(112,'Google翻译','https://translate.google.cn/',0,'',10,0,0,1522248248),(113,'福利搜索','https://boodigo.com/',0,'',10,0,0,1522248308),(114,'BT种子磁力下载','http://cililianc.com/',0,'',10,0,0,1522248391),(115,'IP地址查询','http://www.ip138.com/',0,'',10,0,0,1522248433),(116,'善用搜索','https://www.betterso.com/',0,'',10,0,0,1522248505),(117,'种子转磁力','http://www.torrent.org.cn/',0,'',10,0,0,1522248556),(118,'IP域名查询','https://dns.aizhan.com/',0,'',10,0,0,1522248635),(119,'360种子编辑器','http://360xixi.com/',0,'',10,0,0,1522248699),(120,'Google图片','https://www.google.com.hk/imghp?hl=zh-CN',0,'',10,0,0,1522248768),(121,'vip视频解锁','http://tv.dsqndh.com/',0,'',10,0,0,1522248847),(122,'工具箱','http://tool.114la.com/',0,'',10,0,0,1522248914),(123,'站长工具','http://tool.chinaz.com/',0,'',10,0,0,1522248971),(124,'火导航','http://www.huodh.com/?ngdh.pw',48,'',7,0,0,1522250650),(125,'90后成人导航','http://www.90hdh.info/?ngdh.pw',7,'',7,0,0,1522251417),(126,'蓝色导航','http://www.lansedh.com/?ngdh.pw',56,'',7,0,0,1522252125),(127,'农夫色导航','http://www.nfavdh.pw/?ngdh.pw',31,'',7,0,0,1522329247),(129,'Qisky在线','http://www.qisky.net',3,'sbpport@godsky.org',6,0,0,1522257433),(130,'『萝莉破处直播』','http://www.ur1000.com',1,'58605678@qq.com',6,0,0,1522295252),(134,'AVS成人导航','http://www.avs66.pw/?ngdh.pw',1,'',7,0,0,1522305748),(132,'哇嘎成人视频 ','http://vagaa.ga/?ngdh.pw',8,'',7,0,0,1522298984),(133,'MCC名站导航','http://www.mccdh3.pw/?ngdh.pw',10,'',7,0,0,1522299472),(135,'聚色导航','http://www.jsavdh.pw/?ngdh.pw',0,'',7,0,0,1522305931),(136,'性吧色导航 ','http://www.xbdh8.top/?ngdh.pw',2,'',7,0,0,1522306033),(137,'老司机日报','http://www.laosijiribao.net/',0,'',5,0,0,1522310587),(138,'绝对领域','http://www.jdlingyu.fun/',0,'',5,0,0,1522310666),(139,'日出微拍福利','http://www.richuweipai.com/',0,'',5,0,0,1522310765),(140,'司机会所','https://www.dakashangche.org/',0,'',5,0,0,1522310826),(141,'春满四合院','http://www.spring4u.info',0,'',4,0,0,1522311100),(142,'禁忌书屋','http://www.cool18.com',0,'',4,0,0,1522311139),(143,'任我淫书屋','http://www.hyperfree.com',0,'',4,0,0,1522311168),(144,'姐妹文学','https://b.sis.la/',0,'',4,0,0,1522311211),(145,'痴情书库','https://www.aastory.club/',0,'',4,0,0,1522311257),(146,'龙腾小说','http://www.ltxs3.com/',0,'',4,0,0,1522311352),(147,'小淫书','http://www.yinshu.xyz/',0,'',4,0,0,1522311404),(148,'相似网站搜索','https://www.similarsitesearch.com',0,'',10,0,0,1522311913),(149,'电子书搜索','https://www.jiumodiary.com/',0,'',10,0,0,1522311996),(150,'datoporn','http://datoporn.co/',0,'',10,0,0,1522312534),(151,'faapy','https://faapy.com/',0,'',11,0,0,1522312595),(152,'Amateur','https://www.youramateurporn.com/',0,'',11,0,0,1522312649),(153,'voyeurse','http://www.voyeurseason.com/',0,'',11,0,0,1522312680),(154,'pentasex','https://www.pentasex.io/',0,'',11,0,0,1522312719),(155,'porncorn','https://porncorn.co/',0,'',11,0,0,1522312761),(156,'perfectg','http://www.perfectgirls.net/',0,'',11,0,0,1522312784),(157,'moviesha','https://www.movieshark.com/',0,'',11,0,0,1522312802),(158,'shesfrea','https://www.shesfreaky.com/',0,'',11,0,0,1522312829),(159,'pornoxo','https://www.pornoxo.com/',0,'',11,0,0,1522312853),(160,'sexytube','https://www.sexytube.me/',0,'',11,0,0,1522313066),(161,'porn300','https://www.porn300.com/',0,'',11,0,0,1522313085),(162,'huge6','https://www.huge6.com/',0,'',11,0,0,1522313107),(163,'analdin','https://www.analdin.com/',0,'',11,0,0,1522313130),(164,'hpjav','https://hpjav.com/',0,'',11,0,0,1522313151),(165,'xxxkinky','https://www.xxxkinky.com/',0,'',11,0,0,1522313172),(166,'porndig','https://www.porndig.com/',0,'',11,0,0,1522313204),(167,'porncom','https://www.porn.com/',0,'',11,0,0,1522313233),(168,'魔王视频网','http://www.mwsp.xyz/',0,'',6,0,0,1522325628),(169,'723草','http://www.caoav.psk6.ml/',0,'',6,0,0,1522325685),(170,'AVhub','http://iavhub.ml/',0,'',6,0,0,1522325712),(171,'快播电影','http://www.ayaovo.com/',0,'',6,0,0,1522325748),(172,'让我爽福利网','http://153dy3.xyz/',0,'',6,0,0,1522325804),(173,'狼友小说','http://123lang.top',1,'1392849503@qq.com',4,0,0,1522333070);
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
) ENGINE=MyISAM AUTO_INCREMENT=266 DEFAULT CHARSET=utf8 COMMENT='访问来源表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dh_links_source`
--

LOCK TABLES `dh_links_source` WRITE;
/*!40000 ALTER TABLE `dh_links_source` DISABLE KEYS */;
INSERT INTO `dh_links_source` VALUES (17,'qisky.net','108.61.201.158','2018-03-29',129,1),(18,'ngdh.pw','108.61.201.158','2018-03-29',26,1),(19,'13mzdh.info','182.100.140.122','2018-03-29',26,1),(20,'mgavdh.pw','111.26.30.137','2018-03-29',24,1),(21,'lansedh.com','183.192.89.117','2018-03-29',126,1),(22,'lansedh.com','111.14.81.184','2018-03-29',126,1),(23,'225dh.com','61.240.237.191','2018-03-29',127,1),(24,'huodh.com','118.212.206.34','2018-03-29',124,1),(25,'225dh.com','223.104.18.60','2018-03-29',127,1),(26,'huodh.com','110.247.122.218','2018-03-29',124,1),(27,'225dh.com','110.26.226.12','2018-03-29',127,1),(28,'ngdh.pw','110.26.226.12','2018-03-29',26,1),(29,'huodh.com','183.240.202.242','2018-03-29',124,1),(30,'lansedh.com','139.214.120.67','2018-03-29',126,1),(31,'mgavdh.pw','61.158.78.44','2018-03-29',24,1),(32,'mgavdh.pw','58.22.171.160','2018-03-29',24,1),(33,'lansedh.com','1.204.33.25','2018-03-29',126,1),(34,'huodh.com','183.202.72.159','2018-03-29',124,1),(35,'mgavdh.pw','220.176.62.230','2018-03-29',24,1),(36,'huodh.com','111.140.51.174','2018-03-29',124,1),(37,'mgavdh.pw','221.2.112.186','2018-03-29',24,1),(38,'huodh.com','111.50.67.236','2018-03-29',124,1),(39,'225dh.com','124.234.123.68','2018-03-29',127,1),(40,'225dh.com','175.44.187.204','2018-03-29',127,1),(41,'huodh.com','218.87.61.120','2018-03-29',124,1),(42,'huodh.com','120.239.112.95','2018-03-29',124,1),(43,'8090dh.top','182.149.67.157','2018-03-29',25,1),(44,'90hdh.info','112.111.109.152','2018-03-29',125,1),(45,'225dh.com','39.77.209.2','2018-03-29',127,1),(46,'225dh.com','106.118.213.156','2018-03-29',127,1),(47,'mgavdh.pw','221.2.114.44','2018-03-29',24,1),(48,'ngdh.pw','221.2.114.44','2018-03-29',26,1),(49,'mgavdh.pw','119.248.176.189','2018-03-29',24,1),(50,'mgavdh.pw','117.40.212.230','2018-03-29',24,1),(51,'13mzdh.info','223.214.103.93','2018-03-29',26,1),(52,'225dh.com','123.122.80.168','2018-03-29',127,1),(53,'huodh.com','124.227.0.72','2018-03-29',124,1),(54,'huodh.com','221.11.254.214','2018-03-29',124,1),(55,'lansedh.com','58.244.193.55','2018-03-29',126,1),(56,'13mzdh.info','39.75.167.131','2018-03-29',26,1),(57,'dgrdh.top','120.10.15.99','2018-03-29',27,1),(58,'qisky.net','183.184.145.236','2018-03-29',129,1),(59,'huodh.com','125.71.222.240','2018-03-29',124,1),(60,'225dh.com','182.245.137.29','2018-03-29',127,1),(61,'90hdh.info','122.114.215.17','2018-03-29',125,1),(62,'ngdh.pw','122.114.215.17','2018-03-29',26,1),(63,'mgavdh.pw','111.78.23.9','2018-03-29',24,1),(64,'13mzdh.info','119.120.171.8','2018-03-29',26,1),(65,'90hdh.info','175.181.185.157','2018-03-29',125,1),(66,'lansedh.com','112.64.89.199','2018-03-29',126,1),(67,'lansedh.com','223.104.178.98','2018-03-29',126,1),(68,'225dh.com','182.116.193.80','2018-03-29',127,1),(69,'lansedh.com','112.49.92.194','2018-03-29',126,1),(70,'huodh.com','180.140.80.53','2018-03-29',124,1),(71,'225dh.com','114.139.217.209','2018-03-29',127,1),(72,'8090dh.top','119.248.176.81','2018-03-29',25,1),(73,'13mzdh.info','183.197.191.31','2018-03-29',26,1),(74,'lansedh.com','60.190.222.94','2018-03-29',126,1),(75,'huodh.com','124.160.215.118','2018-03-29',124,1),(76,'225dh.com','119.183.20.46','2018-03-29',127,1),(77,'lansedh.com','111.85.30.137','2018-03-29',126,1),(78,'huodh.com','223.152.216.209','2018-03-29',124,1),(79,'laohu8.xyz','182.103.48.62','2018-03-29',29,1),(80,'225dh.com','124.115.135.35','2018-03-29',127,1),(81,'lansedh.com','175.16.102.42','2018-03-29',126,1),(82,'dgrdh.top','218.204.243.14','2018-03-29',27,1),(83,'huodh.com','111.22.185.235','2018-03-29',124,1),(84,'225dh.com','211.143.24.84','2018-03-29',127,1),(85,'lansedh.com','112.194.106.183','2018-03-29',126,1),(86,'mgavdh.pw','175.44.155.87','2018-03-29',24,1),(87,'huodh.com','119.126.88.231','2018-03-29',124,1),(88,'huodh.com','113.7.118.255','2018-03-29',124,1),(89,'lansedh.com','223.100.116.68','2018-03-29',126,1),(90,'huodh.com','112.230.219.111','2018-03-29',124,1),(91,'lansedh.com','182.86.41.225','2018-03-29',126,1),(92,'ngdh.pw','182.86.41.225','2018-03-29',26,1),(93,'lansedh.com','36.250.142.89','2018-03-29',126,1),(94,'mgavdh.pw','205.139.16.51','2018-03-29',24,1),(95,'225dh.com','61.53.83.206','2018-03-29',127,1),(96,'13mzdh.info','115.60.82.138','2018-03-29',26,1),(97,'225dh.com','123.178.77.111','2018-03-29',127,1),(98,'huodh.com','116.1.63.234','2018-03-29',124,1),(99,'225dh.com','117.172.54.188','2018-03-29',127,1),(100,'lansedh.com','175.19.58.133','2018-03-29',126,1),(101,'ur1000.com','117.172.54.188','2018-03-29',130,1),(102,'ngdh.pw','117.172.54.188','2018-03-29',26,1),(103,'225dh.com','218.86.11.54','2018-03-29',127,1),(104,'225dh.com','220.142.95.251','2018-03-29',127,1),(105,'225dh.com','36.248.141.127','2018-03-29',127,1),(106,'ngdh.pw','36.248.141.127','2018-03-29',26,1),(107,'dgrdh.top','116.24.64.65','2018-03-29',27,1),(108,'ngdh.pw','116.24.64.65','2018-03-29',26,1),(109,'lansedh.com','117.95.55.224','2018-03-29',126,1),(110,'225dh.com','124.227.105.49','2018-03-29',127,1),(111,'huodh.com','220.161.224.231','2018-03-29',124,1),(112,'lansedh.com','140.143.89.118','2018-03-29',126,1),(113,'225dh.com','218.57.3.105','2018-03-29',127,1),(114,'225dh.com','111.53.68.198','2018-03-29',127,1),(115,'225dh.com','122.114.234.149','2018-03-29',127,1),(116,'13mzdh.info','221.210.148.144','2018-03-29',26,1),(117,'lansedh.com','112.23.127.147','2018-03-29',126,1),(118,'huodh.com','117.93.78.211','2018-03-29',124,1),(119,'lansedh.com','120.200.64.20','2018-03-29',126,1),(120,'lansedh.com','182.45.11.208','2018-03-29',126,1),(121,'225dh.com','27.153.183.85','2018-03-29',127,1),(122,'dgrdh.top','175.42.106.34','2018-03-29',27,1),(123,'dgrdh.top','180.122.49.64','2018-03-29',27,1),(124,'mccdh3.pw','49.112.57.23','2018-03-29',133,1),(125,'mgavdh.pw','182.44.192.233','2018-03-29',24,1),(126,'ngdh.pw','182.44.192.233','2018-03-29',26,1),(127,'lansedh.com','116.55.207.210','2018-03-29',126,1),(128,'huodh.com','49.118.133.17','2018-03-29',124,1),(129,'huodh.com','124.239.251.38','2018-03-29',124,1),(130,'225dh.com','223.104.188.225','2018-03-29',127,1),(131,'lansedh.com','74.91.118.248','2018-03-29',126,1),(132,'225dh.com','115.236.175.131','2018-03-29',127,1),(133,'huodh.com','111.29.143.175','2018-03-29',124,1),(134,'huodh.com','111.23.37.226','2018-03-29',124,1),(135,'mccdh3.pw','61.142.103.98','2018-03-29',133,1),(136,'ngdh.pw','61.142.103.98','2018-03-29',26,1),(137,'huodh.com','220.177.211.133','2018-03-29',124,1),(138,'8090dh.top','27.194.59.57','2018-03-29',25,1),(139,'lansedh.com','116.2.204.104','2018-03-29',126,1),(140,'13mzdh.info','182.44.227.51','2018-03-29',26,1),(141,'225dh.com','119.191.255.140','2018-03-29',127,1),(142,'lansedh.com','61.187.101.225','2018-03-29',126,1),(143,'225dh.com','223.72.75.11','2018-03-29',127,1),(144,'mccdh3.pw','111.175.148.35','2018-03-29',133,1),(145,'lansedh.com','223.104.145.99','2018-03-29',126,1),(146,'mccdh3.pw','36.250.152.53','2018-03-29',133,1),(147,'huodh.com','111.61.66.30','2018-03-29',124,1),(148,'13mzdh.info','39.128.80.189','2018-03-29',26,1),(149,'huodh.com','39.70.237.124','2018-03-29',124,1),(150,'lansedh.com','27.225.247.2','2018-03-29',126,1),(151,'huodh.com','39.86.77.46','2018-03-29',124,1),(152,'xbdh8.top','111.183.104.28','2018-03-29',136,1),(153,'mgavdh.pw','175.42.188.14','2018-03-29',24,1),(154,'ngdh.pw','175.42.188.14','2018-03-29',26,1),(155,'13mzdh.info','175.148.62.121','2018-03-29',26,1),(156,'huodh.com','122.114.27.151','2018-03-29',124,1),(157,'8090dh.top','113.132.170.165','2018-03-29',25,1),(158,'huodh.com','123.113.197.51','2018-03-29',124,1),(159,'vagaa.ga','60.25.181.93','2018-03-29',132,1),(160,'huodh.com','180.102.126.172','2018-03-29',124,1),(161,'huodh.com','183.22.27.254','2018-03-29',124,1),(162,'mgavdh.pw','221.234.135.230','2018-03-29',24,1),(163,'vagaa.ga','36.157.90.133','2018-03-29',132,1),(164,'lansedh.com','120.8.144.48','2018-03-29',126,1),(165,'13mzdh.info','112.132.118.147','2018-03-29',26,1),(166,'lansedh.com','59.44.235.220','2018-03-29',126,1),(167,'13mzdh.info','60.7.99.81','2018-03-29',26,1),(168,'huodh.com','120.68.191.154','2018-03-29',124,1),(169,'lansedh.com','111.63.3.187','2018-03-29',126,1),(170,'vagaa.ga','219.138.249.15','2018-03-29',132,1),(171,'lansedh.com','119.60.238.197','2018-03-29',126,1),(172,'lansedh.com','144.0.143.152','2018-03-29',126,1),(173,'mccdh3.pw','117.28.115.255','2018-03-29',133,1),(174,'vagaa.ga','106.6.107.55','2018-03-29',132,1),(175,'lansedh.com','1.83.28.110','2018-03-29',126,1),(176,'8090dh.top','124.234.119.211','2018-03-29',25,1),(177,'dgrdh.top','112.83.180.255','2018-03-29',27,1),(178,'ngdh.pw','112.83.180.255','2018-03-29',26,1),(179,'vagaa.ga','112.26.79.210','2018-03-29',132,1),(180,'lansedh.com','124.119.134.181','2018-03-29',126,1),(181,'8090dh.top','116.196.85.222','2018-03-29',25,1),(182,'13mzdh.info','183.198.4.147','2018-03-29',26,1),(183,'avs66.pw','111.22.232.49','2018-03-29',134,1),(184,'lansedh.com','139.213.189.140','2018-03-29',126,1),(185,'13mzdh.info','222.93.171.82','2018-03-29',26,1),(186,'8090dh.top','223.107.201.92','2018-03-29',25,1),(187,'mgavdh.pw','27.19.48.212','2018-03-29',24,1),(188,'ngdh.pw','27.19.48.212','2018-03-29',26,1),(189,'8090dh.top','183.62.57.130','2018-03-29',25,1),(190,'mgavdh.pw','183.62.57.130','2018-03-29',24,1),(191,'huodh.com','171.118.99.172','2018-03-29',124,1),(192,'lansedh.com','42.86.32.170','2018-03-29',126,1),(193,'huodh.com','123.55.50.179','2018-03-29',124,1),(194,'huodh.com','180.154.164.170','2018-03-29',124,1),(195,'lansedh.com','111.39.78.143','2018-03-29',126,1),(196,'lansedh.com','125.121.60.85','2018-03-29',126,1),(197,'dgrdh.top','124.132.208.26','2018-03-29',27,1),(198,'mccdh3.pw','182.103.48.129','2018-03-29',133,1),(199,'lansedh.com','122.114.172.252','2018-03-29',126,1),(200,'lansedh.com','41.236.28.250','2018-03-29',126,1),(201,'lansedh.com','27.219.172.54','2018-03-29',126,1),(202,'mccdh3.pw','52.80.149.24','2018-03-29',133,1),(203,'ngdh.pw','52.80.149.24','2018-03-29',26,1),(204,'lansedh.com','113.0.9.247','2018-03-29',126,1),(205,'dgrdh.top','112.111.117.146','2018-03-29',27,1),(206,'ngdh.pw','112.111.117.146','2018-03-29',26,1),(207,'90hdh.info','116.196.121.73','2018-03-29',125,1),(208,'90hdh.info','222.16.42.161','2018-03-29',125,1),(209,'dgrdh.top','125.89.225.87','2018-03-29',27,1),(210,'huodh.com','116.253.42.126','2018-03-29',124,1),(211,'huodh.com','183.199.184.147','2018-03-29',124,1),(212,'lansedh.com','118.119.174.149','2018-03-29',126,1),(213,'lansedh.com','116.28.142.52','2018-03-29',126,1),(214,'mgavdh.pw','60.191.47.90','2018-03-29',24,1),(215,'ngdh.pw','60.191.47.90','2018-03-29',26,1),(216,'225dh.com','119.5.29.185','2018-03-29',127,1),(217,'13mzdh.info','111.18.32.83','2018-03-29',26,1),(218,'huodh.com','221.233.60.96','2018-03-29',124,1),(219,'mgavdh.pw','182.44.225.169','2018-03-29',24,1),(220,'13mzdh.info','49.85.201.132','2018-03-29',26,1),(221,'huodh.com','112.39.16.153','2018-03-29',124,1),(222,'225dh.com','14.204.0.236','2018-03-29',127,1),(226,'mgavdh.pw','221.195.4.78','2018-03-29',24,1),(224,'lansedh.com','14.221.48.98','2018-03-29',126,1),(225,'90hdh.info','111.22.184.54','2018-03-29',125,1),(227,'ngdh.pw','221.195.4.78','2018-03-29',26,1),(228,'qisky.net','113.110.215.26','2018-03-29',129,1),(229,'vagaa.ga','183.198.34.77','2018-03-29',132,1),(230,'lansedh.com','1.27.107.239','2018-03-29',126,1),(231,'huodh.com','183.18.200.209','2018-03-29',124,1),(232,'lansedh.com','124.160.215.83','2018-03-29',126,1),(233,'90hdh.info','39.182.78.61','2018-03-29',125,1),(234,'mgavdh.pw','58.19.59.0','2018-03-29',24,1),(235,'lansedh.com','106.110.154.175','2018-03-29',126,1),(236,'huodh.com','118.120.74.6','2018-03-29',124,1),(237,'mccdh3.pw','122.6.78.176','2018-03-29',133,1),(238,'lansedh.com','123.14.115.171','2018-03-29',126,1),(239,'lansedh.com','106.109.37.208','2018-03-29',126,1),(240,'xbdh8.top','112.5.234.45','2018-03-29',136,1),(241,'lansedh.com','124.160.154.28','2018-03-29',126,1),(242,'mccdh3.pw','112.111.117.124','2018-03-29',133,1),(243,'mccdh3.pw','125.34.53.59','2018-03-29',133,1),(244,'mgavdh.pw','122.114.217.136','2018-03-29',24,1),(245,'13mzdh.info','113.246.2.61','2018-03-29',26,1),(246,'huodh.com','58.243.117.196','2018-03-29',124,1),(247,'huodh.com','101.30.93.185','2018-03-29',124,1),(248,'vagaa.ga','180.105.79.130','2018-03-29',132,1),(249,'ngdh.pw','113.2.184.110','2018-03-29',26,1),(250,'mgavdh.pw','122.114.214.93','2018-03-29',24,1),(251,'ngdh.pw','122.114.214.93','2018-03-29',26,1),(252,'mgavdh.pw','27.216.129.24','2018-03-29',24,1),(253,'8090dh.top','121.11.117.22','2018-03-29',25,1),(254,'huodh.com','117.136.75.226','2018-03-29',124,1),(255,'lansedh.com','106.6.170.212','2018-03-29',126,1),(256,'huodh.com','119.136.113.98','2018-03-29',124,1),(257,'vagaa.ga','60.222.141.156','2018-03-29',132,1),(258,'dgrdh.top','1.207.39.36','2018-03-29',27,1),(259,'13mzdh.info','183.198.26.188','2018-03-29',26,1),(260,'lansedh.com','183.206.6.102','2018-03-29',126,1),(261,'lansedh.com','112.94.102.2','2018-03-29',126,1),(262,'lansedh.com','183.48.20.28','2018-03-29',126,1),(263,'huodh.com','211.97.131.77','2018-03-29',124,1),(264,'lansedh.com','112.101.117.244','2018-03-29',126,1),(265,'123lang.top','211.97.131.77','2018-03-29',173,1);
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
  `type` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='分类';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dh_sort`
--

LOCK TABLES `dh_sort` WRITE;
/*!40000 ALTER TABLE `dh_sort` DISABLE KEYS */;
INSERT INTO `dh_sort` VALUES (6,'国内视频','gnsp',5,0),(5,'美图街拍','video',14,0),(4,'激情小说','book',12,0),(7,'福利导航','fulidaohang',4,0),(12,'动漫ACG','dmacg',16,0),(9,'综合论坛','zhlt',11,0),(10,'在线工具','zxgj',25,0),(11,'国外视频','gwsp',17,0),(13,'VR资源','vrzy',19,0);
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='订阅邮箱';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dh_subscribe`
--

LOCK TABLES `dh_subscribe` WRITE;
/*!40000 ALTER TABLE `dh_subscribe` DISABLE KEYS */;
INSERT INTO `dh_subscribe` VALUES (1,'admin@admin.com',1522132168,'192.168.50.1'),(2,'admin@admins.com',1522132239,'192.168.50.1'),(3,'adminjk@asd.com',1522222594,'14.127.249.49');
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
INSERT INTO `dh_system` VALUES (1,'农耕导航','一个纯净的福利导航网站，网站主可以自助申请收录并自助修改网站信息。','http://www.ngdh.pw','http://www.ngdh.pw','qsinfo@mail.ru','<script type=\"text/javascript\">var cnzz_protocol = ((\"https:\" == document.location.protocol) ? \" https://\" : \" http://\");document.write(unescape(\"%3Cspan id=\'cnzz_stat_icon_1273258507\'%3E%3C/span%3E%3Cscript src=\'\" + cnzz_protocol + \"s19.cnzz.com/z_stat.php%3Fid%3D1273258507\' type=\'text/javascript\'%3E%3C/script%3E\"));</script>','农耕导航,福利导航,蓝色导航,蓝导航','农耕导航打造最全面的福利导航，汇集影视、技术、ACG、福利等宅男腐女的爱好导航');
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

-- Dump completed on 2018-03-29 22:20:31
