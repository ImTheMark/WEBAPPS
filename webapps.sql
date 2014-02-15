CREATE DATABASE  IF NOT EXISTS `webapps` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `webapps`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: webapps
-- ------------------------------------------------------
-- Server version	5.6.14

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `idcategory` int(11) NOT NULL,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Software Development'),(2,'Networking'),(3,'Business Management');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `idcompany` int(11) NOT NULL,
  `companyname` varchar(45) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `contactnumber` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `idpicture` int(11) DEFAULT NULL,
  `website` varchar(45) DEFAULT NULL,
  `calendarlink` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcompany`),
  KEY `idpicture_idx` (`idpicture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'Google','Philippines','09171234567','google@gmail.com',1,'http://www.google.com',NULL),(2,'Accenture','Philippines','09121234567','accenture@accenture.com',2,'http://www.accenture.com',NULL),(3,'Hewlett Packard','Philippines','09172324142','hp@hp.com',3,'http://www.hp.com',NULL);
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_category`
--

DROP TABLE IF EXISTS `company_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_category` (
  `idcompany` int(11) NOT NULL,
  `idcategory` int(11) NOT NULL,
  PRIMARY KEY (`idcompany`,`idcategory`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_category`
--

LOCK TABLES `company_category` WRITE;
/*!40000 ALTER TABLE `company_category` DISABLE KEYS */;
INSERT INTO `company_category` VALUES (1,1);
/*!40000 ALTER TABLE `company_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_event`
--

DROP TABLE IF EXISTS `company_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_event` (
  `idcompany` int(11) NOT NULL,
  `idevent` int(11) NOT NULL,
  PRIMARY KEY (`idcompany`,`idevent`),
  KEY `idevent_idx` (`idevent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_event`
--

LOCK TABLES `company_event` WRITE;
/*!40000 ALTER TABLE `company_event` DISABLE KEYS */;
INSERT INTO `company_event` VALUES (1,1),(1,2);
/*!40000 ALTER TABLE `company_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companypicture`
--

DROP TABLE IF EXISTS `companypicture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companypicture` (
  `idcompanypicture` int(11) NOT NULL,
  `picturename` varchar(45) NOT NULL,
  `picturelink` varchar(100) NOT NULL,
  PRIMARY KEY (`idcompanypicture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companypicture`
--

LOCK TABLES `companypicture` WRITE;
/*!40000 ALTER TABLE `companypicture` DISABLE KEYS */;
INSERT INTO `companypicture` VALUES (1,'Google','google.jpg'),(2,'Accenture','accenture.jpg'),(3,'HP','hp.jpg');
/*!40000 ALTER TABLE `companypicture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `idevent` int(11) NOT NULL,
  `eventname` varchar(45) NOT NULL,
  `location` varchar(45) DEFAULT NULL,
  `startdatetime` datetime DEFAULT NULL,
  `enddatetime` datetime DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `active` varchar(10) NOT NULL,
  `idpicture` int(11) DEFAULT NULL,
  PRIMARY KEY (`idevent`),
  CONSTRAINT `idpicture` FOREIGN KEY (`idevent`) REFERENCES `eventpicture` (`ideventpicture`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,'Job Expo 2014','DLSU','2014-02-04 08:00:00','2014-02-06 20:00:00','Job Expo for DLSU Students','YES',2),(2,'Leap 2014','DLSU','2014-02-01 10:00:00','2014-02-11 18:00:00','Leap 2014 for DLSU Students','YES',3);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventpicture`
--

DROP TABLE IF EXISTS `eventpicture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventpicture` (
  `ideventpicture` int(11) NOT NULL,
  `picturename` varchar(45) NOT NULL,
  `picturelink` varchar(45) NOT NULL,
  PRIMARY KEY (`ideventpicture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventpicture`
--

LOCK TABLES `eventpicture` WRITE;
/*!40000 ALTER TABLE `eventpicture` DISABLE KEYS */;
INSERT INTO `eventpicture` VALUES (1,'logo','http://localhost/WEBAPPS/images/e-logo.jpg'),(2,'job expo','http://localhost/WEBAPPS/images/job expo.jpg'),(3,'leap','http://localhost/WEBAPPS/images/leap.jpg'),(4,'gamedev','http://localhost/WEBAPPS/images/gamedev-poste');
/*!40000 ALTER TABLE `eventpicture` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-15 15:55:51
