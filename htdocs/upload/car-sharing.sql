-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: car-sharing
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

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
-- Table structure for table `auto`
--

DROP TABLE IF EXISTS `auto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `targa` varchar(7) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modello` varchar(20) NOT NULL,
  `costo_giornaliero` int(11) NOT NULL,
  `immagine` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `auto_targa_uindex` (`targa`),
  UNIQUE KEY `auto_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auto`
--

LOCK TABLES `auto` WRITE;
/*!40000 ALTER TABLE `auto` DISABLE KEYS */;
INSERT INTO `auto` VALUES (1,'KV609XZ','Mini','Cooper S Countryman',949,NULL),(2,'VL957MV','Volkswagen','181',500,NULL),(3,'TL598DK','Honda','Accord',629,NULL),(4,'MV048PH','Mini','Cooper Countryman',435,NULL),(5,'KX653MF','Peugeot','307',385,NULL),(6,'RC053RN','Alfa Romeo','Alfa 75',669,NULL),(7,'SH319MZ','Citroen','C1',279,NULL),(8,'SF829WT','Fiat','Seicento',892,NULL),(9,'JP304ER','Opel','Calibra',531,NULL),(10,'LR569NE','Peugeot','Boxer',996,NULL),(11,'345','','',0,'345.png');
/*!40000 ALTER TABLE `auto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noleggi`
--

DROP TABLE IF EXISTS `noleggi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noleggi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codice_noleggio` varchar(10) NOT NULL,
  `inizio` date NOT NULL,
  `fine` date DEFAULT NULL,
  `id_auto` int(11) NOT NULL,
  `id_socio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noleggi`
--

LOCK TABLES `noleggi` WRITE;
/*!40000 ALTER TABLE `noleggi` DISABLE KEYS */;
INSERT INTO `noleggi` VALUES (1,'74633410','2021-12-07','0000-00-00',5,9),(2,'73155363','2021-12-01','2021-12-05',2,4),(3,'19518275','2022-01-01','2022-01-31',1,2);
/*!40000 ALTER TABLE `noleggi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soci`
--

DROP TABLE IF EXISTS `soci`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soci` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cf` varchar(16) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `indirizzo` varchar(50) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `soci_cf_uindex` (`cf`),
  UNIQUE KEY `soci_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soci`
--

LOCK TABLES `soci` WRITE;
/*!40000 ALTER TABLE `soci` DISABLE KEYS */;
INSERT INTO `soci` VALUES (1,'TSCPNG15D01L201C','Taschi','Pierangelo','Via Benedetto Marcello, 31/j','0471/1061724'),(2,'PSQGMR61P03C424M','Pasqualon','Gianmarco','Via Angelo della Pergola, 232','081/633425'),(3,'GVRRNL07H30A094K','Giaveri','Reginaldo','Via Festa del Santo Natale, 111','0165/829781'),(4,'FSTPRM12T28I242J','Fausti','Primo','Via G. Branci, 107','0372/561291'),(5,'LSTLNS34D22E375L','Liistri','Alfonso','Via P. I. Ciaikovsky, 258','0523/235814'),(6,'VGNBTS35E30D290I','Vignogna','Battista','Raccordo Cavalcavia Friuli, 237','0161/216112'),(7,'MGNMNA09D14A004J','Magnin','Aimone','Via G. Albertolli, 205','0422/991493'),(8,'FRSLND48E29F156U','Foresti','Olindo','Via Tintoretto, 212/a','0775/1006748'),(9,'RLDRNR97B25A893C','Arioldi','Raniero','Via A. Lavaggi, 64/i','035/811257'),(10,'CMPGPL00D10B098C','Campagnolo','Gianpaolo','Sottovia G. Candiani, 195','0471/133490');
/*!40000 ALTER TABLE `soci` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-18 11:42:29
