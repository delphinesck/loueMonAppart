-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: loueMonAppart
-- ------------------------------------------------------
-- Server version	5.6.35

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
-- Table structure for table `annonces`
--

DROP TABLE IF EXISTS `annonces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `annonces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `description` longtext,
  `ville` varchar(255) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL,
  `propriete` varchar(255) DEFAULT NULL,
  `superficie` int(11) DEFAULT NULL,
  `dispo_debut` varchar(255) DEFAULT NULL,
  `dispo_fin` varchar(255) DEFAULT NULL,
  `statut` tinyint(1) DEFAULT NULL,
  `photo1` varchar(255) DEFAULT NULL,
  `photo2` varchar(255) DEFAULT NULL,
  `photo3` varchar(255) DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `locataire_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `locataireId` (`locataire_id`),
  CONSTRAINT `annonces_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `annonces`
--

LOCK TABLES `annonces` WRITE;
/*!40000 ALTER TABLE `annonces` DISABLE KEYS */;
INSERT INTO `annonces` VALUES (1,'Appartement cosy en centre-ville','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit nibh non faucibus feugiat. Ut lectus lectus, scelerisque et elementum quis, maximus tincidunt magna. Curabitur in mauris placerat, ultrices diam et, pretium felis. Duis molestie dolor non turpis porta tempus. Fusce ac ligula lectus. Proin semper dignissim justo, vitae finibus diam. Praesent quis mauris non lacus bibendum mollis. Nullam euismod finibus enim. Duis quis accumsan sem.\n\nNulla mollis libero ut purus consequat dapibus. Sed lobortis molestie lectus, vitae lobortis tortor interdum sed. Morbi ex leo, bibendum sit amet ipsum nec, varius vulputate sem. Fusce facilisis tortor a ligula pharetra, eget molestie mauris finibus. Aenean cursus dolor ut vestibulum faucibus. Vivamus ex odio, tempus non magna ac, cursus auctor mi. Fusce congue, erat eget malesuada venenatis, massa diam sagittis leo, sit amet lobortis tortor sem nec nibh. Sed dictum ut risus sed volutpat. Morbi volutpat felis non tempor vehicula.','Marseille',70,'appartement',56,'2017-08-24','2017-08-31',0,'http://resize-elle.ladmedia.fr/r/700,,forcex/img/var/plain_site/storage/images/deco/pieces/salon/20-petits-salons-plein-de-caractere/20-petits-salons-plein-de-caractere6/70313158-1-fre-FR/20-petits-salons-plein-de-caractere.jpg','http://resize-elle.ladmedia.fr/r/700,,forcex/img/var/plain_site/storage/images/deco/pieces/salon/20-petits-salons-plein-de-caractere/20-petits-salons-plein-de-caractere6/70313158-1-fre-FR/20-petits-salons-plein-de-caractere.jpg','http://resize-elle.ladmedia.fr/r/700,,forcex/img/var/plain_site/storage/images/deco/pieces/salon/20-petits-salons-plein-de-caractere/20-petits-salons-plein-de-caractere6/70313158-1-fre-FR/20-petits-salons-plein-de-caractere.jpg','2017-08-21 11:43:15',6,0),(2,'Maison moderne à la campagne','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit nibh non faucibus feugiat. Ut lectus lectus, scelerisque et elementum quis, maximus tincidunt magna. Curabitur in mauris placerat, ultrices diam et, pretium felis. Duis molestie dolor non turpis porta tempus. Fusce ac ligula lectus. Proin semper dignissim justo, vitae finibus diam. Praesent quis mauris non lacus bibendum mollis. Nullam euismod finibus enim. Duis quis accumsan sem.\n\nNulla mollis libero ut purus consequat dapibus. Sed lobortis molestie lectus, vitae lobortis tortor interdum sed. Morbi ex leo, bibendum sit amet ipsum nec, varius vulputate sem. Fusce facilisis tortor a ligula pharetra, eget molestie mauris finibus. Aenean cursus dolor ut vestibulum faucibus. Vivamus ex odio, tempus non magna ac, cursus auctor mi. Fusce congue, erat eget malesuada venenatis, massa diam sagittis leo, sit amet lobortis tortor sem nec nibh. Sed dictum ut risus sed volutpat. Morbi volutpat felis non tempor vehicula.','Toulouse',160,'maison',190,'2017-08-24','2017-08-31',1,'http://www.vivons-maison.com/sites/default/files/sejour-maison-citadine-avec-piscine.jpg','','','2017-08-21 11:55:03',3,6),(3,'Studio près de toutes commodités','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit nibh non faucibus feugiat. Ut lectus lectus, scelerisque et elementum quis, maximus tincidunt magna. Curabitur in mauris placerat, ultrices diam et, pretium felis. Duis molestie dolor non turpis porta tempus. Fusce ac ligula lectus. Proin semper dignissim justo, vitae finibus diam. Praesent quis mauris non lacus bibendum mollis. Nullam euismod finibus enim. Duis quis accumsan sem.\n\nNulla mollis libero ut purus consequat dapibus. Sed lobortis molestie lectus, vitae lobortis tortor interdum sed. Morbi ex leo, bibendum sit amet ipsum nec, varius vulputate sem. Fusce facilisis tortor a ligula pharetra, eget molestie mauris finibus. Aenean cursus dolor ut vestibulum faucibus. Vivamus ex odio, tempus non magna ac, cursus auctor mi. Fusce congue, erat eget malesuada venenatis, massa diam sagittis leo, sit amet lobortis tortor sem nec nibh. Sed dictum ut risus sed volutpat. Morbi volutpat felis non tempor vehicula.','Paris',90,'appartement',70,'2017-09-29','2017-10-13',1,'http://www.vivons-maison.com/sites/default/files/styles/740px/public/field/image/petit-appartement-design-fonctionnel-sejour.jpg?itok=6fTfk7IU','','','2017-08-21 16:18:04',3,2),(6,'Château de famille','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit nibh non faucibus feugiat. Ut lectus lectus, scelerisque et elementum quis, maximus tincidunt magna. Curabitur in mauris placerat, ultrices diam et, pretium felis. Duis molestie dolor non turpis porta tempus. Fusce ac ligula lectus. Proin semper dignissim justo, vitae finibus diam. Praesent quis mauris non lacus bibendum mollis. Nullam euismod finibus enim. Duis quis accumsan sem.\r\n\r\nNulla mollis libero ut purus consequat dapibus. Sed lobortis molestie lectus, vitae lobortis tortor interdum sed. Morbi ex leo, bibendum sit amet ipsum nec, varius vulputate sem. Fusce facilisis tortor a ligula pharetra, eget molestie mauris finibus. Aenean cursus dolor ut vestibulum faucibus. Vivamus ex odio, tempus non magna ac, cursus auctor mi. Fusce congue, erat eget malesuada venenatis, massa diam sagittis leo, sit amet lobortis tortor sem nec nibh. Sed dictum ut risus sed volutpat. Morbi volutpat felis non tempor vehicula.','Lyon',210,'château',480,'2017-08-30','2017-10-27',1,'https://exitmag.fr/x/wp-content/uploads/2015/06/le-chateau-de-la-chaize-1-1-850x450.jpg','https://exitmag.fr/x/wp-content/uploads/2015/06/le-chateau-de-la-chaize-1-1-850x450.jpg','','2017-08-25 16:47:15',2,1);
/*!40000 ALTER TABLE `annonces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avis`
--

DROP TABLE IF EXISTS `avis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` varchar(5) DEFAULT NULL,
  `commentaire` longtext,
  `datecreate` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `annonce_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `annonce_id` (`annonce_id`),
  CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`annonce_id`) REFERENCES `annonces` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avis`
--

LOCK TABLES `avis` WRITE;
/*!40000 ALTER TABLE `avis` DISABLE KEYS */;
INSERT INTO `avis` VALUES (1,'★★★☆☆','Vivamus tincidunt dolor id dui porta lacinia. Integer cursus nulla mauris, id imperdiet felis suscipit a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam ac tortor tellus. Morbi diam ante, blandit sit amet mollis quis, pretium ut erat. Maecenas non auctor lorem, sed vestibulum lectus. Morbi vitae est id nibh ullamcorper efficitur vel at risus. Nulla quis mauris sed tellus molestie scelerisque. Proin at fringilla enim. In maximus placerat ipsum, vitae commodo tortor auctor ut.','2017-08-22 13:48:12',5,1),(3,'★☆☆☆☆','Morbi vitae est id nibh ullamcorper efficitur vel at risus. Nulla quis mauris sed tellus molestie scelerisque. Proin at fringilla enim. In maximus placerat ipsum, vitae commodo tortor auctor ut. Sed ut efficitur risus. Mauris ac mauris a eros dapibus feugiat. Suspendisse nec turpis vel lacus fringilla mattis id eget ligula. Fusce semper lorem nec neque pellentesque, et rutrum dolor efficitur. Aliquam at pulvinar sapien. Donec id turpis gravida, dictum mauris at, porttitor odio.','2017-08-22 14:23:07',4,3),(4,'★★★★☆','Vivamus tincidunt dolor id dui porta lacinia. Integer cursus nulla mauris, id imperdiet felis suscipit a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam ac tortor tellus. Morbi diam ante, blandit sit amet mollis quis, pretium ut erat. Maecenas non auctor lorem, sed vestibulum lectus. Morbi vitae est id nibh ullamcorper efficitur vel at risus. Nulla quis mauris sed tellus molestie scelerisque. Proin at fringilla enim. In maximus placerat ipsum, vitae commodo tortor auctor ut. Sed ut efficitur risus. Mauris ac mauris a eros dapibus feugiat. Suspendisse nec turpis vel lacus fringilla mattis id eget ligula. Fusce semper lorem nec neque pellentesque, et rutrum dolor efficitur. Aliquam at pulvinar sapien. Donec id turpis gravida, dictum mauris at, porttitor odio.','2017-08-22 16:02:11',1,3),(8,'★★★★★','Nam ac tortor tellus. Morbi diam ante, blandit sit amet mollis quis, pretium ut erat. Maecenas non auctor lorem, sed vestibulum lectus. Morbi vitae est id nibh ullamcorper efficitur vel at risus. Nulla quis mauris sed tellus molestie scelerisque. Proin at fringilla enim. In maximus placerat ipsum, vitae commodo tortor auctor ut. Sed ut efficitur risus. Mauris ac mauris a eros dapibus feugiat. Suspendisse nec turpis vel lacus fringilla mattis id eget ligula. Fusce semper lorem nec neque pellentesque, et rutrum dolor efficitur. Aliquam at pulvinar sapien. Donec id turpis gravida, dictum mauris at, porttitor odio.','2017-08-22 16:40:00',2,3);
/*!40000 ALTER TABLE `avis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favoris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `annonce_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `annonce_id` (`annonce_id`),
  CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`annonce_id`) REFERENCES `annonces` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favoris`
--

LOCK TABLES `favoris` WRITE;
/*!40000 ALTER TABLE `favoris` DISABLE KEYS */;
INSERT INTO `favoris` VALUES (18,1,1),(19,4,2),(24,2,1);
/*!40000 ALTER TABLE `favoris` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) DEFAULT NULL,
  `expediteur_id` int(11) DEFAULT NULL,
  `recepteur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expediteur_id` (`expediteur_id`),
  KEY `recepteur_id` (`recepteur_id`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`expediteur_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`recepteur_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `upassword` varchar(255) DEFAULT NULL,
  `telephone` int(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Jean-Pierre','jeanpierre',606060606,'jeanpierre@gmail.com',NULL),(2,'Robert','robert',606060606,'robert@gmail.com',NULL),(3,'Sandrine','sandrine',606060606,'sandrine@gmail.com',NULL),(4,'Yve','yve',606060606,'yve@gmail.com',NULL),(5,'Florence','florence',606060606,'florence@gmail.com',NULL),(6,'Marion','marion',606060606,'marion@gmail.com',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-29 17:00:30
