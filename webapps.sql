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
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Software Development'),(2,'Networking'),(3,'Business Management'),(4,'Computer'),(5,'Seminar'),(6,'On-Campus Interview'),(7,'Workshop'),(8,'Mobile');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `idcompany` int(11) NOT NULL AUTO_INCREMENT,
  `companyname` varchar(45) NOT NULL,
  `companydescription` varchar(1000) DEFAULT NULL,
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
INSERT INTO `company` VALUES (1,'Google','Google is an American multinational corporation specializing in Internet-related services and products. These include search, cloud computing, software, and online advertising technologies. Most of its profits are derived from AdWords','Philippines','09171234567','google@gmail.com',1,'http://www.google.com',NULL),(2,'Accenture','Accenture plc is a multinational management consulting, technology services and outsourcing company. Incorporated headquarters are in Dublin, Republic of Ireland while operations headquarters are in Chicago, Illinois.','Philippines','09121234567','accenture@accenture.com',2,'http://www.accenture.com',NULL),(3,'Hewlett Packard','Hewlett-Packard Company or HP is an American multinational information technology corporation headquartered in Palo Alto, California, United States.','Philippines','09172324142','hp@hp.com',3,'http://www.hp.com',NULL),(4,'De La Salle University','De La Salle University is a private Lasallian university in Taft Avenue, Malate, Manila, Philippines. It was founded in 1911 by De La Salle Brothers as the De La Salle College in Paco, Manila with Blimond Pierre serving as its first director','De La Salle University , Taft Avenue , Manila','(02) 5244611','lscs@dlsu.com',4,'http://www.dlsu.edu.ph/',NULL),(5,'Smart Communications Inc.','Smart Communications is a wholly owned mobile phone and Internet service subsidiary of the Philippine Long Distance Telephone Company. On September 2013 the company reported that it has over 72.5 million cellular subscribers.','Smart Communications, Inc. 6799 Ayala Ave., M','09185678934','publicaffairs@smart.com.ph',5,'http://www1.smart.com.ph/corporate',NULL),(6,'Macquarie','Macquarie Group is a leading provider of banking, financial, advisory, investment and funds management services. Our global operations include offices in the world\'s major financial centres.\r\n\r\n\r\n\r\nWe combine entrepreneurial drive with deep industry and regional expertise and robust risk management. This gives our clients and investors confidence, and allows us to deliver innovative products and services and strong investment returns.','22/f 6750 Office Tower Ayala Avenue, Makati C','+63 2 857 0888','macquarie@macquarie.com',6,'http://www.macquarie.ph/mgl/ph',NULL);
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
INSERT INTO `company_category` VALUES (1,1),(2,1),(2,2),(3,3),(4,5),(4,6),(4,7),(5,8),(6,1),(6,4);
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
INSERT INTO `company_event` VALUES (1,1),(4,2),(4,3),(4,4),(4,5),(4,6),(4,7),(5,8),(6,9);
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
INSERT INTO `companypicture` VALUES (1,'Google','images/google.jpg'),(2,'Accenture','images/accenture.jpg'),(3,'HP','images/hp.jpg'),(4,'dlsu','images/dlsuLogo.jpe'),(5,'smart','images/smartLogo.jpe'),(6,'macquarie','images/macquarieLogo.jpe');
/*!40000 ALTER TABLE `companypicture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `idevent` int(11) NOT NULL AUTO_INCREMENT,
  `eventname` varchar(45) NOT NULL,
  `location` varchar(45) DEFAULT NULL,
  `startdatetime` datetime DEFAULT NULL,
  `enddatetime` datetime DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `active` varchar(10) NOT NULL,
  `idpicture` int(11) DEFAULT NULL,
  PRIMARY KEY (`idevent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,'Job Expo 2014','Ayala Avenue corner,Makati Avenue,Makati City','2014-04-24 08:00:00','2014-04-24 12:00:00','Job Expo for DLSU Students','YES',2),(2,'Azeus Company Talk and Exam','A703, De La Salle University Manila','2014-05-24 08:00:00','2014-05-24 13:00:00','Hi guys, OJT season is almost here and we would like to invite you as LSCS presents to you Company Talks and Exam : Azues Systems Philippines. The talk would be held at A703 from 10:00 - 11:00 and the exam would be held from 11:00 - 1:00pm at A703 on Jan 25. Please don\'t forget to pre-register and click attending! Pre-registered participants would receive food during the talk. \r\n\r\n\r\n\r\nhttp://tinyurl.com/AzeusTalk-Exam\r\n\r\n\r\n\r\nSee you guys there!','YES',3),(3,'ThesisIt! ','Y507 De La Salle University Manila','2014-07-14 08:00:00','2014-07-14 18:00:00','It\'s OJT and Employment season again and the hunt is on.\r\n\r\n\r\n\r\nLa Salle Computer Society and CATCH2T15 Batch Government brings you Resume Making Seminar.\r\n\r\n\r\n\r\nJoin us as we prepare you with the right equipment for the hunt. The seminar would be held at Y507 from 1:00 - 2:30 PM. \r\n\r\n\r\n\r\nPlease make sure to join in the facebook event. See you at the hunt!','YES',4),(4,'Python 101: beginners workshop ','A903 De La Salle University Manila','2014-05-24 08:00:00','2014-05-24 10:00:00','GEAR UP and LEARN PYTHON. Participants will get a chance to win free tickets for the Python Conference 2014 (http://pycon.python.ph/). Register now at http://bit.ly/LAWp8p','YES',5),(5,'Dart Flight School','G302A & G302B Gokingwei Building, De La Salle','2014-05-30 08:00:00','2014-05-30 09:00:00','Come fly with us and enroll in Dart Flight School! Dart is a new language, with tools and libraries, for scalable web app engineering. Dart is an open-source project with contributors from Google and elsewhere. We\'re flying this Saturday, February 15, from 9am-4pm. Register at: > DLSU Students - http://tinyurl.com/dartflightdlsu  > Outsiders - http://tinyurl.com/dartflightMNL','YES',6),(6,'Game Development using Construct2','De La Salle University Manila','2014-07-30 08:00:00','2014-07-30 09:00:00','Want to make your own game without going through any programming? It\'s time to let out the game developer in you! Come to the Game Development using Construct2 seminar this friday, February 7, from 10:00 am - 12:00 pm. See you in G304A!','YES',7),(7,'Leap Class Enrollment 2014','De La Salle University','2014-07-12 08:00:00','2014-07-12 10:00:00','Want to make your own game without going through any programming? It\'s time to let out the game developer in you! Come to the Game Development using Construct2 seminar this friday, February 7, from 10:00 am - 12:00 pm. See you in G304A!','YES',8),(8,'Smart On-Campus Interview','L128B  De La Salle University Manila','2014-06-14 08:00:00','2014-06-14 08:10:00','Smart will be having its on-campus interview at De La Salle University.','YES',9),(9,'Macquarie Company Orientation','Y409 De La Salle University Manila','2014-06-14 08:00:00','2014-06-14 09:00:00','Macquarie will be having its company orientation at De La Salle University. ','YES',10);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventpicture`
--

DROP TABLE IF EXISTS `eventpicture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventpicture` (
  `ideventpicture` int(11) NOT NULL AUTO_INCREMENT,
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
INSERT INTO `eventpicture` VALUES (1,'logo','images/e-logo.jpg'),(2,'job expo','images/job expo.jpg'),(3,'Azeus Exam and Talk','images/AzeusTalkNExam.jpg'),(4,'Thesis It','images/ThesisIt.jpg'),(5,'Python 101','images/Python101.png'),(6,'Darts','images/Dart.jpg'),(7,'game dev using construct2','images/GameDevConstruct2.jpg'),(8,'leap enrollment','images/leap.jpg'),(9,'smart','images/smart.jpg'),(10,'macquarie','images/macquarieLogo.jpg');
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

-- Dump completed on 2014-03-18 16:14:49
