-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: nerd_luv
-- ------------------------------------------------------
-- Server version	5.7.17

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
-- Table structure for table `user_fav_os`
--

DROP TABLE IF EXISTS `user_fav_os`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_fav_os` (
  `id` int(10) unsigned DEFAULT NULL,
  `os` varchar(8) NOT NULL,
  KEY `id` (`id`),
  CONSTRAINT `user_fav_os_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_fav_os`
--

LOCK TABLES `user_fav_os` WRITE;
/*!40000 ALTER TABLE `user_fav_os` DISABLE KEYS */;
INSERT INTO `user_fav_os` VALUES (1,'Linux'),(15,'Linux'),(16,'Linux');
/*!40000 ALTER TABLE `user_fav_os` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `age` int(2) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_info`
--

LOCK TABLES `user_info` WRITE;
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
INSERT INTO `user_info` VALUES (1,'Ashok Tamang','M',23),(15,'Ada Lovelace','F',23),(16,'Dana Scully','F',23);
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_personality`
--

DROP TABLE IF EXISTS `user_personality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_personality` (
  `id` int(10) unsigned DEFAULT NULL,
  `personality_type` varchar(4) NOT NULL,
  KEY `id` (`id`),
  CONSTRAINT `user_personality_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_personality`
--

LOCK TABLES `user_personality` WRITE;
/*!40000 ALTER TABLE `user_personality` DISABLE KEYS */;
INSERT INTO `user_personality` VALUES (1,'IJNF'),(15,'ESTJ'),(16,'INTJ');
/*!40000 ALTER TABLE `user_personality` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_seeking_age`
--

DROP TABLE IF EXISTS `user_seeking_age`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_seeking_age` (
  `id` int(10) unsigned DEFAULT NULL,
  `min_seeking_age` int(2) unsigned NOT NULL,
  `max_seeking_age` int(2) unsigned NOT NULL,
  KEY `id` (`id`),
  CONSTRAINT `user_seeking_age_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_seeking_age`
--

LOCK TABLES `user_seeking_age` WRITE;
/*!40000 ALTER TABLE `user_seeking_age` DISABLE KEYS */;
INSERT INTO `user_seeking_age` VALUES (1,18,25),(15,18,23),(16,18,25);
/*!40000 ALTER TABLE `user_seeking_age` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-02 23:56:35
