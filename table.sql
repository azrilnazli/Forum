-- MySQL dump 10.13  Distrib 5.1.33, for Win32 (ia32)
--
-- Host: localhost    Database: forum_dev
-- ------------------------------------------------------
-- Server version	5.1.33-community

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
-- Table structure for table `forum_categories`
--

DROP TABLE IF EXISTS `forum_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_information_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `descriptions` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_categories`
--

LOCK TABLES `forum_categories` WRITE;
/*!40000 ALTER TABLE `forum_categories` DISABLE KEYS */;
INSERT INTO `forum_categories` VALUES (1,1,'Bincang Semasa','Kategori untuk perbincangan isu semasa','2011-03-21 06:49:31','2011-03-21 06:49:31',NULL,NULL);
/*!40000 ALTER TABLE `forum_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_replies`
--

DROP TABLE IF EXISTS `forum_replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_information_id` int(11) DEFAULT NULL,
  `forum_category_id` int(11) DEFAULT NULL,
  `forum_topic_id` int(11) DEFAULT NULL,
  `reply` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_replies`
--

LOCK TABLES `forum_replies` WRITE;
/*!40000 ALTER TABLE `forum_replies` DISABLE KEYS */;
INSERT INTO `forum_replies` VALUES (13,2,1,21,'testreply','2011-03-31 05:15:32','2011-03-31 05:15:32',NULL,NULL),(12,2,1,21,'anotherlogin','2011-03-31 05:14:45','2011-03-31 05:14:45',NULL,NULL),(11,2,1,22,'sdsdsdv','2011-03-31 04:44:05','2011-03-31 04:44:05',NULL,NULL),(10,2,1,22,'sdfgsfgs','2011-03-31 04:44:00','2011-03-31 04:44:00',NULL,NULL),(8,2,1,22,'qwrwrweawe','2011-03-31 04:36:51','2011-03-31 04:36:51',NULL,NULL),(9,2,1,22,'dfbvdfbdf','2011-03-31 04:36:55','2011-03-31 04:36:55',NULL,NULL),(14,2,1,21,'anotherreplies','2011-03-31 05:15:50','2011-03-31 05:15:50',NULL,NULL),(15,2,1,21,'thisisanotherreply','2011-03-31 05:16:02','2011-03-31 05:16:02',NULL,NULL);
/*!40000 ALTER TABLE `forum_replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_roles`
--

DROP TABLE IF EXISTS `forum_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `descriptions` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_roles`
--

LOCK TABLES `forum_roles` WRITE;
/*!40000 ALTER TABLE `forum_roles` DISABLE KEYS */;
INSERT INTO `forum_roles` VALUES (1,'Admin','Forum Administrator','2011-03-21 06:41:45','2011-03-21 06:41:45',NULL,NULL),(2,'Moderator','Forum Moderator','2011-03-21 06:42:00','2011-03-21 06:42:00',NULL,NULL),(3,'User','Forum Normal Users','2011-03-21 06:42:22','2011-03-21 06:42:22',NULL,NULL);
/*!40000 ALTER TABLE `forum_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_topics`
--

DROP TABLE IF EXISTS `forum_topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_information_id` int(11) DEFAULT NULL,
  `forum_category_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `descriptions` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_topics`
--

LOCK TABLES `forum_topics` WRITE;
/*!40000 ALTER TABLE `forum_topics` DISABLE KEYS */;
INSERT INTO `forum_topics` VALUES (13,2,1,'Nuclear','nuclearwarhead','2011-03-31 03:34:28','2011-03-31 03:34:28',NULL,NULL),(14,2,1,'TestPower','Testpowertopic','2011-03-31 03:34:50','2011-03-31 03:34:50',NULL,NULL),(15,2,1,'Mencuba','mencuba','2011-03-31 03:35:10','2011-03-31 03:35:10',NULL,NULL),(16,2,1,'test123','test123','2011-03-31 03:35:23','2011-03-31 03:35:23',NULL,NULL),(17,2,1,'mencarketenangan','itudia','2011-03-31 03:35:42','2011-03-31 03:35:42',NULL,NULL),(18,2,1,'percubaan123','percubaan123','2011-03-31 03:35:59','2011-03-31 03:35:59',NULL,NULL),(19,2,1,'helloworld','cuba123','2011-03-31 03:36:20','2011-03-31 03:36:20',NULL,NULL),(20,2,1,'topicke10','cubaanke10','2011-03-31 03:36:32','2011-03-31 03:36:32',NULL,NULL),(21,2,1,'anothertopic','thisisanothertopic','2011-03-31 03:36:49','2011-03-31 03:36:49',NULL,NULL),(22,2,1,'manasaya','dimana','2011-03-31 03:37:10','2011-03-31 03:37:10',NULL,NULL);
/*!40000 ALTER TABLE `forum_topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_informations`
--

DROP TABLE IF EXISTS `staff_informations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_informations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forum_role_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `biodata` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_informations`
--

LOCK TABLES `staff_informations` WRITE;
/*!40000 ALTER TABLE `staff_informations` DISABLE KEYS */;
INSERT INTO `staff_informations` VALUES (1,3,'azril','34da7db567898e05ba6aa706b397a26848a12fd3','azril.nazli@gmail.com','test','2011-03-29 07:07:59','2011-03-30 03:40:24',NULL,NULL),(2,3,'myjpn','ab2671f6e8f84f2243f9e77d730d66b5bac51377','myjpn@test.com','test','2011-03-30 06:55:58','2011-03-30 06:55:58',NULL,NULL);
/*!40000 ALTER TABLE `staff_informations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_information_id` int(11) DEFAULT NULL,
  `ticket` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,1,'9017dc67bba53bf98fe0deb1f42c66ff','2011-03-29 08:08:13'),(2,1,'1e6c95ffc5de5338a6c1d01c48639d21','2011-03-29 08:09:14'),(3,1,'df90b8a9cb8a8a75c7cab556e266b082','2011-03-29 08:09:26'),(4,1,'e6508819a856dce2c21f0b8d677db346','2011-03-30 01:55:23'),(5,1,'6c7ea044c996a933401baaeb9f2ac3b5','2011-03-30 02:03:51'),(6,1,'72af687c330d6ed2b00bee995c6859fb','2011-03-30 02:25:34'),(7,1,'3c409dbfc55afaefc1c62fe3a77ba78a','2011-03-30 02:26:44');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-03-31  9:29:00
