-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: ssb_db
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `specials`
--

DROP TABLE IF EXISTS `specials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specials` (
  `text` varchar(1000) NOT NULL,
  `day` varchar(9) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specials`
--

LOCK TABLES `specials` WRITE;
/*!40000 ALTER TABLE `specials` DISABLE KEYS */;
INSERT INTO `specials` VALUES ('11-4pm: Red brat, french fries, and a soda for $5.','monday',6),('<span class=\"progressive-night\">Progressive Night!</span>','monday',7),('Flip night! Win the coin flip for %75 off your entire drink order. ','tuesday',12),('11-4pm: Worlds best brat, french fries, and a soda for $5.','wednesday',13),('11-4pm: Cheeseburger, french fries, and a soda for $5.','thursday',14),('11-4pm: Fish sandwich, french fries, and a soda for $5.','friday',15),('4-9pm: 10 wings for $4.','wednesday',16),('4-9pm: Double stack burger for $2.50.','thursday',17),('4-9pm: Fish fry dinner for $7.','friday',18),('<span class=\"progressive-night\">Progressive Night!</span>','wednesday',19),('<span class=\"progressive-night\">Progressive Night!</span>','thursday',20),('New Glarus: $3 pints, $8 pitchers, $10 boots.','wednesday',21),('4-9: Ale Asylum: $3 pints, $8 pitchers, $10 boots.','thursday',22),('Tullamore Dew Whiskey, Absolut Vodka: $6.50 doubles.','friday',23),('Skyy Vodka: $6.50 doubles.','saturday',24),('$5 Absolut vodka and Rockstar. $30 pitcher.','sunday',25),('$5 Absolut screwdriver. $30 pitcher.','sunday',26),('$5 Absolut bloody mary. $30 pitcher.','sunday',27),('$10 bottomless mimosas. ','sunday',28),('11-4pm: Grilled cheese, french fries, and a soda for $5.','tuesday',29);
/*!40000 ALTER TABLE `specials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password_digest` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('andrewpereli','$2y$10$mWR3eIE0rUfxkHm3kaNeuOuO1BUOSvwkp5seC/3g6sucLOzqcW4nq',0),('drewpereli','$2y$10$Qj6jrQw5S/dQ/6s3BRKlqeOtTuxLfcyuUllZZClGMQ50qJgY8bFNq',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-24 18:06:35
