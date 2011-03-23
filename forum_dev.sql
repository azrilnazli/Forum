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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_categories`
--

LOCK TABLES `forum_categories` WRITE;
/*!40000 ALTER TABLE `forum_categories` DISABLE KEYS */;
INSERT INTO `forum_categories` VALUES (1,1,'Bincang Semasa','Kategori untuk perbincangan isu semasa','2011-03-21 06:49:31','2011-03-21 06:49:31',NULL,NULL),(2,1,'Gossip Artis','Gossip para artis','2011-03-21 06:49:53','2011-03-21 06:49:53',NULL,NULL),(3,1,'Movies Review','Review movie - movie terkini','2011-03-21 06:50:45','2011-03-21 06:50:45',NULL,NULL);
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_replies`
--

LOCK TABLES `forum_replies` WRITE;
/*!40000 ALTER TABLE `forum_replies` DISABLE KEYS */;
INSERT INTO `forum_replies` VALUES (1,1,1,1,'sangat kuat dan berbahaya','2011-03-21 07:03:47','2011-03-21 07:03:47',NULL,NULL),(2,1,1,1,'Sangat mengerunkanlah, 10000 orang terkorban','2011-03-21 07:06:26','2011-03-21 07:06:26',NULL,NULL),(3,2,1,2,'kejam sungguh tentera bersekutu','2011-03-21 07:06:51','2011-03-21 07:06:51',NULL,NULL),(4,3,1,2,'sangat jahat','2011-03-21 07:07:02','2011-03-21 07:07:02',NULL,NULL),(5,1,1,2,'apa nak jadi ?','2011-03-21 07:07:15','2011-03-21 07:07:15',NULL,NULL),(6,3,2,3,'benarkan begitu ?','2011-03-21 07:07:34','2011-03-21 07:07:34',NULL,NULL),(7,2,2,3,'saya pun tidak tahu perkara sebenar ?','2011-03-21 07:07:51','2011-03-21 07:07:51',NULL,NULL),(8,2,3,5,'wah wah wah...apa jadi dengan Antonio Banderas ?','2011-03-21 07:08:12','2011-03-21 07:08:12',NULL,NULL);
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_topics`
--

LOCK TABLES `forum_topics` WRITE;
/*!40000 ALTER TABLE `forum_topics` DISABLE KEYS */;
INSERT INTO `forum_topics` VALUES (1,1,1,'Gempa bumi di Jepun','Gempa bumi berskala 9.8Ritcher telah melanda jepun','2011-03-21 06:54:13','2011-03-21 06:54:13',NULL,NULL),(2,2,1,'Libya diserang','Lubya diserang tentera bersekutu','2011-03-21 06:54:58','2011-03-21 06:54:58',NULL,NULL),(3,3,2,'Farah Fauzana tinggalkan Melodi?','Adakah benar ?','2011-03-21 06:56:53','2011-03-21 06:56:53',NULL,NULL),(4,2,2,'Jejai minat Farah Fauzana ?','Jejai test 123','2011-03-21 06:57:28','2011-03-21 06:57:28',NULL,NULL),(5,1,2,'Angelina Jolie teringat cinta lama bersama Antonio Banderas','Original Sin','2011-03-21 06:58:08','2011-03-21 06:58:08',NULL,NULL),(6,2,3,'Rango 10/10','Kisah mengenai cicak yang sunyi','2011-03-21 06:58:40','2011-03-21 06:58:40',NULL,NULL),(7,3,3,'Kak Limah Balik Kampung 2','Part 2','2011-03-21 06:59:02','2011-03-21 06:59:02',NULL,NULL);
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
  `biodata` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_informations`
--

LOCK TABLES `staff_informations` WRITE;
/*!40000 ALTER TABLE `staff_informations` DISABLE KEYS */;
INSERT INTO `staff_informations` VALUES (1,1,'admin',NULL,'Admin user','2011-03-21 06:44:11','2011-03-21 06:44:11',NULL,NULL),(2,2,'moderator',NULL,'moderator','2011-03-21 06:44:30','2011-03-21 06:44:30',NULL,NULL),(3,3,'user',NULL,'Normal User','2011-03-21 06:44:47','2011-03-21 06:44:47',NULL,NULL);
/*!40000 ALTER TABLE `staff_informations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-03-23  9:23:02
