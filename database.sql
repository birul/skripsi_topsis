-- MySQL dump 10.13  Distrib 5.5.25a, for Linux (i686)
--
-- Host: localhost    Database: s_topsis2
-- ------------------------------------------------------
-- Server version	5.5.25a

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
-- Table structure for table `s_alternative`
--

DROP TABLE IF EXISTS `s_alternative`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_alternative` (
  `alternative_id` int(20) NOT NULL AUTO_INCREMENT,
  `alternative_code` varchar(20) DEFAULT NULL,
  `alternative_name` varchar(100) DEFAULT NULL,
  `alternative_description` text,
  `alternative_image` varchar(100) DEFAULT NULL,
  `problem_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`alternative_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_alternative`
--

LOCK TABLES `s_alternative` WRITE;
/*!40000 ALTER TABLE `s_alternative` DISABLE KEYS */;
INSERT INTO `s_alternative` VALUES (8,'TS','Toshiba','',NULL,2),(9,'Sm','Samsung','',NULL,2),(10,'sn','Sony Vaio','Made in Japan',NULL,2),(12,'CIS','CodeIgniter Skeleton 2.1.0','http://socialcompare.com/r/?https%3A%2F%2Fgithub.com%2Fanvoz%2FCodeIgniter-Skeleton',NULL,1),(13,'CP','CodeIgniterPlus','http://socialcompare.com/r/?https%3A%2F%2Fgithub.com%2Franacseruet%2Fcodeigniterplus',NULL,1),(14,'CDB','CodeIgniter Doctrine Bootstrap','http://socialcompare.com/r/?https%3A%2F%2Fgithub.com%2Fpedrozok%2Fcodeigniter-doctrine-bootstrap',NULL,1),(15,'CB3','CodeIgniter 2.1.4 Bootstrap 3','http://socialcompare.com/r/?https%3A%2F%2Fgithub.com%2FFateicha%2FCodeIgniter-2.1.4-Bootstrap-3',NULL,1),(16,'CH5BTB','codeigniter-html5boilerplate-twitter-bootstrap','http://socialcompare.com/r/?https%3A%2F%2Fgithub.com%2Fvesparny%2Fcodeigniter-html5boilerplate-twitter-bootstrap',NULL,1),(17,'CB','CodeIgniter Bootstrap','http://socialcompare.com/r/?https%3A%2F%2Fgithub.com%2Fsjlu%2FCodeIgniter-Bootstrap',NULL,1);
/*!40000 ALTER TABLE `s_alternative` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_criteria`
--

DROP TABLE IF EXISTS `s_criteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_criteria` (
  `criteria_id` int(20) NOT NULL AUTO_INCREMENT,
  `criteria_name` varchar(100) DEFAULT NULL,
  `criteria_description` text,
  `criteria_type` enum('benefit','cost') DEFAULT 'benefit',
  `criteria_weight` float DEFAULT '0',
  `problem_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`criteria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_criteria`
--

LOCK TABLES `s_criteria` WRITE;
/*!40000 ALTER TABLE `s_criteria` DISABLE KEYS */;
INSERT INTO `s_criteria` VALUES (6,'Harga','','cost',2,2),(7,'Kualitas','','benefit',6,2),(8,'CI Version','Minimum 2.1.4','benefit',214,1),(9,'doctrine','Minimum 2.4','benefit',24,1),(10,'CI Ion Auth','','benefit',1,1),(11,'CI DX_Auth','','benefit',1,1),(12,'Hybridauth','','benefit',1,1),(13,'HMVC','5.4','benefit',1,1),(14,'Grocery CRUD','','benefit',1,1),(15,'Image CRUD','','benefit',1,1),(16,'CI REST Library','','benefit',1,1),(17,'Facebook Library','','benefit',1,1),(18,'Curl Library','','benefit',1,1),(19,'AWS Library','','benefit',1,1),(20,'MongoDB Library','','benefit',1,1),(21,'Cloudfiles Library','','benefit',1,1),(22,'Template library','','benefit',1,1),(23,'Smarty','','benefit',1,1),(24,'html5boilerplate','','benefit',1,1),(25,'Bootstrap','','benefit',3,1),(26,'Bootstrap form helpers','','benefit',1,1),(27,'UIKit','','benefit',1,1),(28,'jQuery UI','','benefit',1,1),(29,'jQuery','','benefit',1,1),(30,'jQuery File Upload','','benefit',1,1),(31,'jQuery Validate Plugin','','benefit',1,1),(32,'jQuery Form Plugin','','benefit',1,1),(33,'Google map API','','benefit',1,1),(34,'Google Map API Wrapper','','benefit',1,1),(35,'underscore.js','','benefit',1,1),(36,'Steal.js from JavascriptMVC','','benefit',1,1),(37,'FontAwesome','','benefit',1,1),(38,'Glyphicons','','benefit',1,1);
/*!40000 ALTER TABLE `s_criteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_decision`
--

DROP TABLE IF EXISTS `s_decision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_decision` (
  `decision_id` int(20) NOT NULL AUTO_INCREMENT,
  `decision_point` float DEFAULT '0',
  `criteria_id` int(20) DEFAULT NULL,
  `alternative_id` int(20) DEFAULT NULL,
  `problem_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`decision_id`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_decision`
--

LOCK TABLES `s_decision` WRITE;
/*!40000 ALTER TABLE `s_decision` DISABLE KEYS */;
INSERT INTO `s_decision` VALUES (1,214,8,12,1),(2,0,9,12,1),(3,1,10,12,1),(4,0,11,12,1),(5,0,12,12,1),(6,1,13,12,1),(7,0,14,12,1),(8,0,15,12,1),(9,0,16,12,1),(10,0,17,12,1),(11,0,18,12,1),(12,0,19,12,1),(13,0,20,12,1),(14,0,21,12,1),(15,1,22,12,1),(16,0,23,12,1),(17,0,24,12,1),(18,3,25,12,1),(19,1,26,12,1),(20,0,27,12,1),(21,1,28,12,1),(22,1,29,12,1),(23,1,30,12,1),(24,0,31,12,1),(25,0,32,12,1),(26,0,33,12,1),(27,0,34,12,1),(28,0,35,12,1),(29,0,36,12,1),(30,0,37,12,1),(31,0,38,12,1),(32,214,8,13,1),(33,1,9,13,1),(34,0,10,13,1),(35,1,11,13,1),(36,1,12,13,1),(37,1,13,13,1),(38,1,14,13,1),(39,1,15,13,1),(40,0,16,13,1),(41,0,17,13,1),(42,0,18,13,1),(43,0,19,13,1),(44,0,20,13,1),(45,0,21,13,1),(46,0,22,13,1),(47,1,23,13,1),(48,0,24,13,1),(49,2,25,13,1),(50,0,26,13,1),(51,0,27,13,1),(52,1,28,13,1),(53,1,29,13,1),(54,0,30,13,1),(55,1,31,13,1),(56,1,32,13,1),(57,1,33,13,1),(58,1,34,13,1),(59,0,35,13,1),(60,1,36,13,1),(61,0,37,13,1),(62,0,38,13,1),(63,214,8,14,1),(64,1,9,14,1),(65,0,10,14,1),(66,0,11,14,1),(67,0,12,14,1),(68,0,13,14,1),(69,0,14,14,1),(70,0,15,14,1),(71,0,16,14,1),(72,0,17,14,1),(73,0,18,14,1),(74,0,19,14,1),(75,0,20,14,1),(76,0,21,14,1),(77,0,22,14,1),(78,0,23,14,1),(79,0,24,14,1),(80,3,25,14,1),(81,0,26,14,1),(82,0,27,14,1),(83,1,28,14,1),(84,1,29,14,1),(85,0,30,14,1),(86,0,31,14,1),(87,0,32,14,1),(88,0,33,14,1),(89,0,34,14,1),(90,0,35,14,1),(91,0,36,14,1),(92,0,37,14,1),(93,0,38,14,1),(94,214,8,15,1),(95,0,9,15,1),(96,0,10,15,1),(97,0,11,15,1),(98,0,12,15,1),(99,0,13,15,1),(100,0,14,15,1),(101,0,15,15,1),(102,0,16,15,1),(103,0,17,15,1),(104,0,18,15,1),(105,0,19,15,1),(106,0,20,15,1),(107,0,21,15,1),(108,0,22,15,1),(109,0,23,15,1),(110,0,24,15,1),(111,3,25,15,1),(112,0,26,15,1),(113,0,27,15,1),(114,1,28,15,1),(115,1,29,15,1),(116,0,30,15,1),(117,0,31,15,1),(118,0,32,15,1),(119,0,33,15,1),(120,0,34,15,1),(121,0,35,15,1),(122,0,36,15,1),(123,1,37,15,1),(124,1,38,15,1),(125,214,8,16,1),(126,0,9,16,1),(127,0,10,16,1),(128,0,11,16,1),(129,0,12,16,1),(130,0,13,16,1),(131,0,14,16,1),(132,0,15,16,1),(133,0,16,16,1),(134,0,17,16,1),(135,0,18,16,1),(136,0,19,16,1),(137,0,20,16,1),(138,0,21,16,1),(139,0,22,16,1),(140,0,23,16,1),(141,1,24,16,1),(142,3,25,16,1),(143,0,26,16,1),(144,0,27,16,1),(145,1,28,16,1),(146,0,29,16,1),(147,0,30,16,1),(148,0,31,16,1),(149,0,32,16,1),(150,0,33,16,1),(151,0,34,16,1),(152,1,35,16,1),(153,0,36,16,1),(154,0,37,16,1),(155,0,38,16,1),(156,214,8,17,1),(157,2,9,17,1),(158,0,10,17,1),(159,0,11,17,1),(160,0,12,17,1),(161,0,13,17,1),(162,0,14,17,1),(163,0,15,17,1),(164,1,16,17,1),(165,1,17,17,1),(166,1,18,17,1),(167,1,19,17,1),(168,1,20,17,1),(169,1,21,17,1),(170,0,22,17,1),(171,0,23,17,1),(172,0,24,17,1),(173,3,25,17,1),(174,0,26,17,1),(175,0,27,17,1),(176,0,28,17,1),(177,0,29,17,1),(178,0,30,17,1),(179,0,31,17,1),(180,0,32,17,1),(181,0,33,17,1),(182,0,34,17,1),(183,0,35,17,1),(184,0,36,17,1),(185,1,37,17,1),(186,0,38,17,1);
/*!40000 ALTER TABLE `s_decision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_problem`
--

DROP TABLE IF EXISTS `s_problem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_problem` (
  `problem_id` int(20) NOT NULL AUTO_INCREMENT,
  `problem_name` varchar(100) DEFAULT NULL,
  `problem_description` text,
  PRIMARY KEY (`problem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_problem`
--

LOCK TABLES `s_problem` WRITE;
/*!40000 ALTER TABLE `s_problem` DISABLE KEYS */;
INSERT INTO `s_problem` VALUES (1,'Penentuan Jabatan',NULL),(2,'Penentuan Jenis Produk',NULL);
/*!40000 ALTER TABLE `s_problem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_user`
--

DROP TABLE IF EXISTS `s_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_user` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_address` varchar(100) DEFAULT NULL,
  `user_date_join` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_role` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_user`
--

LOCK TABLES `s_user` WRITE;
/*!40000 ALTER TABLE `s_user` DISABLE KEYS */;
INSERT INTO `s_user` VALUES (1,'morkid','admin@mail.com','5f4dcc3b5aa765d61d8327deb882cf99','Jakarta','2014-04-26 07:03:53',1);
/*!40000 ALTER TABLE `s_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-01 15:27:31
