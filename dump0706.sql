-- MySQL dump 10.13  Distrib 5.1.61, for debian-linux-gnu (i486)
--
-- Host: 192.168.1.93    Database: snar
-- ------------------------------------------------------
-- Server version	5.1.61-0+squeeze1

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
-- Table structure for table `tbl_group`
--

DROP TABLE IF EXISTS `tbl_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `maillist` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `weight_factor` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_group_admin` (`admin_id`),
  CONSTRAINT `FK_group_admin` FOREIGN KEY (`admin_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_group`
--

LOCK TABLES `tbl_group` WRITE;
/*!40000 ALTER TABLE `tbl_group` DISABLE KEYS */;
INSERT INTO `tbl_group` VALUES (1,'Алтай 2011','altay-pohod-2011@googlegroups.com',1,0.7),(2,'Дигория 2012','digoriya-2012@googlegroups.com',1,NULL),(3,'lol test','digoriya-2012@googlegroups.com',1,NULL),(4,'test2 test','digoriya-2012@googlegroups.com',1,NULL),(5,'ВШМ','digoriya-2012@googlegroups.com',1,NULL);
/*!40000 ALTER TABLE `tbl_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lookup`
--

DROP TABLE IF EXISTS `tbl_lookup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lookup`
--

LOCK TABLES `tbl_lookup` WRITE;
/*!40000 ALTER TABLE `tbl_lookup` DISABLE KEYS */;
INSERT INTO `tbl_lookup` VALUES (9,'В поход - общественное',1,'SnarStatus',1),(10,'В поход - личное',2,'SnarStatus',2),(11,'Запасное',3,'SnarStatus',3),(12,'Мужской',1,'UserGender',1),(13,'Женский',2,'UserGender',2);
/*!40000 ALTER TABLE `tbl_lookup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_profiles`
--

DROP TABLE IF EXISTS `tbl_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `gender` int(11) DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_profiles`
--

LOCK TABLES `tbl_profiles` WRITE;
/*!40000 ALTER TABLE `tbl_profiles` DISABLE KEYS */;
INSERT INTO `tbl_profiles` VALUES (1,'Семёнов','Никита','1986-08-14',2),(4,'Козырев','Роман','0000-00-00',2),(5,'Морев','Роман','0000-00-00',2),(6,'Калыгин','Михаил','0000-00-00',2),(7,'Калыгина','Оксана','0000-00-00',1),(8,'Матюхина','Анна','0000-00-00',1),(9,'Маругина','Ольга','0000-00-00',1),(10,'Качулина','Ольга','0000-00-00',1),(11,'Щавлеева','Марина','0000-00-00',1),(12,'Долгополова','Мария','0000-00-00',1),(13,'Исаев','Андрей','0000-00-00',2),(14,'Мацнева','Евгения','0000-00-00',1),(15,'Павлович','Максим','0000-00-00',2);
/*!40000 ALTER TABLE `tbl_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_profiles_fields`
--

DROP TABLE IF EXISTS `tbl_profiles_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_profiles_fields`
--

LOCK TABLES `tbl_profiles_fields` WRITE;
/*!40000 ALTER TABLE `tbl_profiles_fields` DISABLE KEYS */;
INSERT INTO `tbl_profiles_fields` VALUES (1,'lastname','Last Name','VARCHAR',50,3,1,'','','Incorrect Last Name (length between 3 and 50 characters).','','','','',1,3),(2,'firstname','First Name','VARCHAR',50,3,1,'','','Incorrect First Name (length between 3 and 50 characters).','','','','',0,3),(3,'birthday','Birthday','DATE',0,0,2,'','','','','0000-00-00','UWjuidate','{\"ui-theme\":\"redmond\"}',3,2),(4,'gender','пол','INTEGER',0,0,1,'','','','','1','','',4,3);
/*!40000 ALTER TABLE `tbl_profiles_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_snar`
--

DROP TABLE IF EXISTS `tbl_snar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_snar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `weight` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_snar_owner` (`owner_id`),
  CONSTRAINT `FK_snar_owner` FOREIGN KEY (`owner_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_snar`
--

LOCK TABLES `tbl_snar` WRITE;
/*!40000 ALTER TABLE `tbl_snar` DISABLE KEYS */;
INSERT INTO `tbl_snar` VALUES (9,'весы','',145,1,1),(15,'Палатка 3-4 х месная с большими тамбурами Снаряжение','',3500,1,4),(16,'Палатка Ладога 3-х месная - 4 кг','',3000,1,8),(17,'Палатка NovaTour 4-х месная','',2800,1,1),(18,'Горелка Primus + баллон для бензина - 750 гр','',750,1,4),(24,'Расходный репшнур 4 мл - 15 метров','',100,1,4),(26,'Крючья скальные + молоток+ набор закладок','',1500,1,4),(27,'Расходный репшнур 6 мм - 20 метров','',200,1,4),(28,'Расходная веревка для проушин 8(9 мм )- 20 метров','',500,1,4),(29,'ЖПС 1 + батарейки','',600,1,4),(30,'ЖПС 2 + батарейки','',600,1,6),(31,'Спутниковый телефон','',600,1,4),(32,'Аптечка','',2000,1,5),(33,'ремнабор','',1000,1,6),(34,'Спутниковый телефон 2','',500,1,4),(35,'пила цепочка','',500,3,1),(38,'кошки campus','',1000,1,13),(42,'горелка','',700,1,10),(43,'горелка','',700,1,6),(44,'лавлист','',290,1,5),(45,'экран','',100,1,9),(46,'набор капитана','',2100,1,4),(47,'шнур 4 мм для сдерга','',500,1,4),(48,'Рация маленькая Олина','без батареек',88,1,9),(49,'Рация большая Олина','',130,1,9),(50,'фотоаппарат','',200,1,9),(52,'кухня (половник, мочалка, скатерть, доска)','',200,1,9),(53,'Палатка 3-4 х месная  Снаряжение -- стойки','',1000,1,4),(54,'Палатка Ладога 3-х месная -- стойки','',1000,1,8),(55,'Палатка NovaTour 4-х месная -- стойки','',1000,1,1),(56,'тент 3х4','',1010,1,1),(57,'12 батареек ААА','',144,1,1),(59,'спальник 4-ка новый','',3000,1,4),(60,'спальник 4-ка новый (палатка Ани)','',3000,1,4),(61,'аптечка 2 часть','',2000,1,5),(62,'рация прокатная','',105,1,9),(63,'рация прокатная 2','',105,1,9),(64,'33 батарейки АА','',825,1,1),(66,'Горелка','',600,1,6),(67,'стеклоткань','',310,1,5),(102,'Штопор','',5,0,1);
/*!40000 ALTER TABLE `tbl_snar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_snar_group_reference`
--

DROP TABLE IF EXISTS `tbl_snar_group_reference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_snar_group_reference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `snar_id` int(11) NOT NULL,
  `snar_status` int(11) NOT NULL,
  `carrier_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `snar_id` (`snar_id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `tbl_snar_group_reference_ibfk_1` FOREIGN KEY (`snar_id`) REFERENCES `tbl_snar` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_snar_group_reference_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `tbl_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_snar_group_reference`
--

LOCK TABLES `tbl_snar_group_reference` WRITE;
/*!40000 ALTER TABLE `tbl_snar_group_reference` DISABLE KEYS */;
INSERT INTO `tbl_snar_group_reference` VALUES (3,1,9,1,15),(8,1,15,1,5),(9,1,16,1,13),(10,1,17,1,6),(11,1,18,1,15),(17,1,24,1,6),(19,1,26,1,12),(20,1,27,1,8),(21,1,28,1,6),(22,1,29,1,4),(23,1,30,1,6),(24,1,31,1,15),(25,1,32,1,5),(26,1,33,1,13),(27,1,34,1,6),(35,1,42,1,15),(38,1,45,1,6),(39,1,46,1,4),(40,1,47,1,6),(41,1,48,1,19),(42,1,49,1,15),(43,1,50,1,9),(45,1,52,1,19),(46,1,53,1,11),(47,1,54,1,13),(48,1,55,1,1),(49,1,56,1,12),(50,1,57,1,10),(52,1,59,1,4),(53,1,60,1,15),(54,1,61,1,11),(55,1,62,1,15),(56,1,63,1,15),(57,1,64,1,1),(59,1,66,1,6),(60,1,67,1,5),(86,2,102,1,NULL);
/*!40000 ALTER TABLE `tbl_snar_group_reference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_group_reference`
--

DROP TABLE IF EXISTS `tbl_user_group_reference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_group_reference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_role` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `palatka` int(11) DEFAULT NULL,
  `svyazka` int(11) DEFAULT NULL,
  `otdelenie` int(11) DEFAULT NULL,
  `user_name` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `tbl_user_group_reference_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_user_group_reference_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `tbl_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_group_reference`
--

LOCK TABLES `tbl_user_group_reference` WRITE;
/*!40000 ALTER TABLE `tbl_user_group_reference` DISABLE KEYS */;
INSERT INTO `tbl_user_group_reference` VALUES (1,1,1,2,'2',NULL,NULL,NULL,NULL),(4,1,5,2,'2',NULL,NULL,NULL,NULL),(6,1,6,2,'2',NULL,NULL,NULL,NULL),(8,1,7,2,'2',NULL,NULL,NULL,NULL),(9,1,8,2,'2',NULL,NULL,NULL,NULL),(10,1,9,2,'2',NULL,NULL,NULL,NULL),(11,1,10,2,'2',NULL,NULL,NULL,NULL),(12,1,11,2,'2',NULL,NULL,NULL,NULL),(13,1,12,2,'2',NULL,NULL,NULL,NULL),(14,1,13,2,'2',NULL,NULL,NULL,NULL),(15,1,15,2,'2',NULL,NULL,NULL,NULL),(16,1,4,2,'1',NULL,NULL,NULL,NULL),(17,2,1,0,'снаряженец',NULL,NULL,NULL,NULL),(19,2,9,0,'финансист',NULL,NULL,NULL,NULL),(20,3,1,0,'',NULL,NULL,NULL,NULL),(21,4,1,0,'',NULL,NULL,NULL,NULL),(22,5,1,0,'',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_user_group_reference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `gender` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES (1,'admin','098f6bcd4621d373cade4e832627b4f6','crazy-paratrooper@yandex.ru','cdd764829a81d6f41c5f9fe55ef6f2de',1261146094,1338884409,1,1,1),(4,'romank','098f6bcd4621d373cade4e832627b4f6','skinrol@gmail.com','66d4c3c6bbffdd9160ed7af05c459f1a',1307193277,1308866301,0,1,1),(5,'romanm','098f6bcd4621d373cade4e832627b4f6','r.morev@yandex.ru','dba21c62974e982760652b58e42f8997',1307193368,1308839127,0,1,1),(6,'mihailkalygin','098f6bcd4621d373cade4e832627b4f6','mihailkalygin@yandex.ru','0619eaa729e4272d61fbf9df4a743dc6',1307193777,1308841138,0,1,1),(7,'okbur','098f6bcd4621d373cade4e832627b4f6','okbur@mail.ru','cbb7fbd9de8af40b3189d612e5f1c04e',1307193876,1307655621,0,1,1),(8,'atrkik','098f6bcd4621d373cade4e832627b4f6','atrkik@yandex.ru','27d02ee2936f0798066a6e788f25b458',1307193986,1308870546,0,1,1),(9,'lelelik','098f6bcd4621d373cade4e832627b4f6','lelelik@list.ru','d4cc4e6df6e6dbaa40ff449213e7044b',1307194132,1316673048,0,1,1),(10,'olga','098f6bcd4621d373cade4e832627b4f6','not.only.mountains@gmail.com','97c1a489269145d381762de1ee3b75ec',1307194242,1307196070,0,1,1),(11,'marina','098f6bcd4621d373cade4e832627b4f6','mistralm@mail.ru','826b2e1082ef4ac5f5d911ec6852b708',1307194337,1308829510,0,1,1),(12,'maria','098f6bcd4621d373cade4e832627b4f6','mashandij@gmail.com','6d4f9c82ff305e5ee244f66569f8d31e',1307194447,1307194447,0,1,1),(13,'isaev','098f6bcd4621d373cade4e832627b4f6','Isaev@izvestia.ru','f1e0a9c22c33f436d79a3dc55fc677ba',1307195032,1307744813,0,1,1),(14,'evgenia','098f6bcd4621d373cade4e832627b4f6','st-shapoklyak@mail.ru','d04f55ef3cb3785944b765dd15a011fe',1307195188,1307195188,0,1,1),(15,'maxim','098f6bcd4621d373cade4e832627b4f6','mps17@yandex.ru','995842fde539dd8c8e99523a11e7868f',1311138463,1311138463,0,1,1);
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-06-07 15:00:03
