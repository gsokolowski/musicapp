# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.26)
# Database: musicapp
# Generation Time: 2016-09-16 16:51:35 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table playlists
# ------------------------------------------------------------

DROP TABLE IF EXISTS `playlists`;

CREATE TABLE `playlists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `playlistname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `playlists` WRITE;
/*!40000 ALTER TABLE `playlists` DISABLE KEYS */;

INSERT INTO `playlists` (`id`, `playlistname`, `username`, `created_at`, `updated_at`)
VALUES
	(1,'Eletctro','Greg','2016-09-16 15:47:39','2016-09-16 15:47:39'),
	(2,'Techno','Greg','2016-08-27 16:49:39','2016-08-27 16:49:39'),
	(3,'name','Greg','2016-09-16 15:42:47','2016-09-16 15:42:47'),
	(7,'Rock','Marta','2016-09-16 15:45:02','2016-09-16 15:45:02'),
	(8,'Rock','Marta','2016-09-16 15:51:11','2016-09-16 15:51:11'),
	(9,'dasdsa','','2016-09-16 15:55:11','2016-09-16 15:55:11'),
	(10,'dasdsa','dsadsasasa','2016-09-16 15:55:21','2016-09-16 15:55:21'),
	(11,'dasdsa','dsadsasasa','2016-09-16 15:57:34','2016-09-16 15:57:34'),
	(12,'dasdsa','dsadsasasa','2016-09-16 15:58:15','2016-09-16 15:58:15'),
	(13,'R&B','Jon','2016-09-16 15:58:41','2016-09-16 16:15:53'),
	(15,'dasdsa','dsadsasasa','2016-09-16 16:26:30','2016-09-16 16:26:30');

/*!40000 ALTER TABLE `playlists` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tracks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tracks`;

CREATE TABLE `tracks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `trackname` varchar(255) DEFAULT NULL,
  `energy` float DEFAULT NULL,
  `explicit` tinyint(1) DEFAULT NULL,
  `artist` varchar(255) DEFAULT NULL,
  `playlist_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tracks` WRITE;
/*!40000 ALTER TABLE `tracks` DISABLE KEYS */;

INSERT INTO `tracks` (`id`, `trackname`, `energy`, `explicit`, `artist`, `playlist_id`)
VALUES
	(2,'Uptown Funk',0.3,1,'Mark Ronson | Bruno Mars',1),
	(14,'Smells like a teen spirit',0.9,1,'Nirvana | One',3),
	(15,'Smells like a teen spirit',0.9,1,'Nirvana | One',3),
	(18,'Smells like a teen spirit',0.9,1,'Nirvana | One',3),
	(19,'dasdasdsadsa',0.4,1,'One|Two',2),
	(20,'Smells like a teen spirit',0.9,1,'Nirvana | One',3),
	(21,'dasdasdsadsa',0.4,1,'One|Two',2),
	(23,'Smells like a teen spirit',0.9,1,'Nirvana | One',3),
	(26,'Smells like a teen spirit',0.9,1,'Nirvana | One',3),
	(27,'dasdasdsadsa',0.4,1,'One|Two',2),
	(28,'Smells like a teen spirit',0.9,1,'Nirvana | One',3),
	(29,'dasdasdsadsa',0.4,1,'One|Two',2),
	(30,'Smells like a teen spirit',0.9,1,'Nirvana | One',3),
	(31,'dasdasdsadsa',0.4,1,'One|Two',2);

/*!40000 ALTER TABLE `tracks` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
