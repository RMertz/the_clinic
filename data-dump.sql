-- MySQL dump 10.14  Distrib 5.5.60-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: group1
-- ------------------------------------------------------
-- Server version	5.5.60-MariaDB

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
-- Table structure for table `Algorithm`
--

DROP TABLE IF EXISTS `Algorithm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Algorithm` (
  `AlgorithmID` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `json` longtext,
  PRIMARY KEY (`AlgorithmID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Algorithm`
--

LOCK TABLES `Algorithm` WRITE;
/*!40000 ALTER TABLE `Algorithm` DISABLE KEYS */;
/*!40000 ALTER TABLE `Algorithm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Conflicting Medication`
--

DROP TABLE IF EXISTS `Conflicting Medication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Conflicting Medication` (
  `ConflictingID` int(11) NOT NULL,
  `MedicationID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ConflictingID`),
  KEY `MedicationID_idx` (`MedicationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Conflicting Medication`
--

LOCK TABLES `Conflicting Medication` WRITE;
/*!40000 ALTER TABLE `Conflicting Medication` DISABLE KEYS */;
/*!40000 ALTER TABLE `Conflicting Medication` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Diagnosis`
--

DROP TABLE IF EXISTS `Diagnosis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Diagnosis` (
  `DiagnosisName` varchar(30) NOT NULL,
  `DiagnosisID` int(11) NOT NULL,
  PRIMARY KEY (`DiagnosisID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Diagnosis`
--

LOCK TABLES `Diagnosis` WRITE;
/*!40000 ALTER TABLE `Diagnosis` DISABLE KEYS */;
/*!40000 ALTER TABLE `Diagnosis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DoctorInformation`
--

DROP TABLE IF EXISTS `DoctorInformation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DoctorInformation` (
  `DoctorID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `PatientID` int(11) DEFAULT NULL,
  `Username` char(255) CHARACTER SET utf8 NOT NULL,
  `Password` text NOT NULL,
  PRIMARY KEY (`DoctorID`),
  UNIQUE KEY `DoctorID_UNIQUE` (`DoctorID`),
  UNIQUE KEY `Username_UNIQUE` (`Username`),
  KEY `PatientID_idx` (`PatientID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DoctorInformation`
--

LOCK TABLES `DoctorInformation` WRITE;
/*!40000 ALTER TABLE `DoctorInformation` DISABLE KEYS */;
INSERT INTO `DoctorInformation` VALUES (1,'Dan','Jeff',NULL,'Jeff1',''),(3,'Chris','Miller',NULL,'doctor1',''),(4,'Chris','Miller',NULL,'chrismiller','Test123'),(5,'Rostik','Mertz',NULL,'bounce','bouncer'),(6,'Angelica','Jones',NULL,'AngieJones','Ilovecookies'),(7,'Rostik','Mertz',NULL,'sekiro','shadows');
/*!40000 ALTER TABLE `DoctorInformation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MedicationInformation`
--

DROP TABLE IF EXISTS `MedicationInformation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MedicationInformation` (
  `MedicationID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'The ID of each drug.',
  `MinimumDosage` mediumtext COMMENT 'The smallest dose for each drug',
  `MaximumDosage` mediumtext COMMENT 'The largest dose for each drug.',
  `Diagnosis` mediumtext COMMENT 'The diagnosis the drug is used for.',
  `Conflicting Medication` int(11) DEFAULT NULL,
  `Name` text NOT NULL,
  PRIMARY KEY (`MedicationID`),
  UNIQUE KEY `MedicationID_UNIQUE` (`MedicationID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MedicationInformation`
--

LOCK TABLES `MedicationInformation` WRITE;
/*!40000 ALTER TABLE `MedicationInformation` DISABLE KEYS */;
INSERT INTO `MedicationInformation` VALUES (1,'2000Mg','20000mg',NULL,NULL,'Fun Juice'),(2,'100 mg','200 mg',NULL,NULL,'Lithium'),(3,'10mg','100mg',NULL,NULL,'Zertec');
/*!40000 ALTER TABLE `MedicationInformation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PatientInformation`
--

DROP TABLE IF EXISTS `PatientInformation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PatientInformation` (
  `PatientID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(30) NOT NULL,
  `Surname` varchar(30) NOT NULL,
  `Diagnosis` varchar(45) NOT NULL,
  `MedicationID` int(11) DEFAULT NULL,
  `CurrentDose` varchar(15) DEFAULT NULL,
  `LastVisit` date DEFAULT NULL,
  `NextVisit` datetime DEFAULT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `depTreatment` int(11) DEFAULT NULL,
  `bipolarDTreatment` int(11) DEFAULT NULL,
  `bipolarMTreatment` int(11) DEFAULT NULL,
  `depPrevTreatment` int(11) DEFAULT NULL,
  `bipolarDPrevTreatment` int(11) DEFAULT NULL,
  `bipolarMPrevTreatment` int(11) DEFAULT NULL,
  PRIMARY KEY (`PatientID`),
  UNIQUE KEY `PatientID_UNIQUE` (`PatientID`),
  KEY `DoctorID_idx` (`DoctorID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PatientInformation`
--

LOCK TABLES `PatientInformation` WRITE;
/*!40000 ALTER TABLE `PatientInformation` DISABLE KEYS */;
INSERT INTO `PatientInformation` VALUES (2,'Chris','Miller','None',1,'15000mg','2019-04-15','2019-03-20 00:00:00',4,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Bob','Joe','None',NULL,NULL,NULL,'2019-03-13 00:00:00',4,NULL,NULL,NULL,NULL,NULL,NULL),(7,'Pie','Man','',NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL),(8,'Joe','Bob','None',NULL,NULL,NULL,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL),(9,'Joe','Bob','None',NULL,NULL,NULL,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL),(10,'Fred','Weezer','Possible Bipolar I Disorder',2,'100 mg','2019-03-28','2019-04-02 10:20:00',4,NULL,5,NULL,NULL,10,NULL),(11,'Fred','Weezer','None',2,'100 mg','2019-03-15','2019-03-30 10:10:00',4,NULL,4,NULL,NULL,8,NULL),(12,'Eve','Law','Depression',1,'2000','2019-03-29',NULL,4,NULL,2,NULL,NULL,10,NULL),(13,'Gary','Smith','Depression',1,'20,000MG','2019-04-12','2019-04-12 12:00:00',6,NULL,NULL,NULL,NULL,NULL,NULL),(14,'Fredrick','Willis','BiPolar',1,'3000Mg','2019-04-12','2019-04-19 03:00:00',6,NULL,NULL,4,NULL,NULL,4),(15,'poor ','guy','depressed',1,'2000mg','2019-04-13',NULL,7,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `PatientInformation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Prescription`
--

DROP TABLE IF EXISTS `Prescription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Prescription` (
  `MedicationID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `CurrentDosage` mediumtext,
  `Diagnosis` mediumtext COMMENT 'The diagnosis the drug is used for.',
  PRIMARY KEY (`PatientID`),
  KEY `MedicationID_idx` (`MedicationID`),
  KEY `PatientID_idx` (`PatientID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Prescription`
--

LOCK TABLES `Prescription` WRITE;
/*!40000 ALTER TABLE `Prescription` DISABLE KEYS */;
/*!40000 ALTER TABLE `Prescription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Visit`
--

DROP TABLE IF EXISTS `Visit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Visit` (
  `LastVisit` date DEFAULT NULL,
  `NextVisit` date DEFAULT NULL,
  `VisitID` int(11) NOT NULL,
  `DoctorID` int(11) NOT NULL,
  PRIMARY KEY (`VisitID`),
  KEY `DoctorID_idx` (`DoctorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Visit`
--

LOCK TABLES `Visit` WRITE;
/*!40000 ALTER TABLE `Visit` DISABLE KEYS */;
/*!40000 ALTER TABLE `Visit` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-15 10:30:37
