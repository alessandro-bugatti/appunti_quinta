-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: banca_2021
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nominativo` varchar(50) NOT NULL,
  `codice_fiscale` varchar(16) NOT NULL,
  `citta` varchar(50) NOT NULL,
  `indirizzo` varchar(50) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Giuseppa Filindi','GSPFLN45H54B157G','Brescia','Via dei Calamari 45','364764734627'),(2,'Marco Trandinio','MRCTRN15G27B157T','Brescia','VIa Amedeo Amedei 67','535656533333');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conto_corrente`
--

DROP TABLE IF EXISTS `conto_corrente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conto_corrente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero_conto` varchar(20) DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `id_filiale` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conto_corrente`
--

LOCK TABLES `conto_corrente` WRITE;
/*!40000 ALTER TABLE `conto_corrente` DISABLE KEYS */;
INSERT INTO `conto_corrente` VALUES (1,'3637648324',12345,1),(2,'3423242344',13423,2),(3,'4234234233',342342342,2);
/*!40000 ALTER TABLE `conto_corrente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filiale`
--

DROP TABLE IF EXISTS `filiale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filiale` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `codice` varchar(20) NOT NULL,
  `indirizzo` varchar(50) NOT NULL,
  `patrimonio_totale` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filiale`
--

LOCK TABLES `filiale` WRITE;
/*!40000 ALTER TABLE `filiale` DISABLE KEYS */;
INSERT INTO `filiale` VALUES (1,'Filiale Brescia Ovest','25678','Via dei rampini 22',2459876),(2,'Filiale Mandolossa','23456','Via del Caprimulgo 12',1234567);
/*!40000 ALTER TABLE `filiale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intestato`
--

DROP TABLE IF EXISTS `intestato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `intestato` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_conto_corrente` int(10) unsigned NOT NULL,
  `id_cliente` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intestato`
--

LOCK TABLES `intestato` WRITE;
/*!40000 ALTER TABLE `intestato` DISABLE KEYS */;
INSERT INTO `intestato` VALUES (1,1,1),(2,2,1),(3,2,2);
/*!40000 ALTER TABLE `intestato` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-28 15:09:27
