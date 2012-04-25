# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.9)
# Database: MVC
# Generation Time: 2012-04-25 17:53:07 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(128) DEFAULT NULL,
  `company` varchar(70) NOT NULL,
  `address1` varchar(100) NOT NULL DEFAULT '',
  `address2` varchar(100) DEFAULT NULL,
  `city` varchar(11) NOT NULL DEFAULT '',
  `zipcode` int(11) NOT NULL,
  `state` varchar(40) NOT NULL DEFAULT '',
  `country` varchar(50) NOT NULL DEFAULT '',
  `taxid` varchar(50) DEFAULT '',
  `datecreated` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;

INSERT INTO `clients` (`id`, `name`, `email`, `company`, `address1`, `address2`, `city`, `zipcode`, `state`, `country`, `taxid`, `datecreated`, `userid`)
VALUES
	(1,'John Doe','john.doe@example.com','Kick Ass Company','21 Main St','Suite 205','Lynbrook',11676,'NY','United States','',1333763195,1),
	(2,'Jean Marc','steve@aol.com','KickAwesome Company','1 Education Dr','','Garden City',11530,'NY','United States','097655113233',1333766032,1);

/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table state
# ------------------------------------------------------------

DROP TABLE IF EXISTS `state`;

CREATE TABLE `state` (
  `state_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'PK: Unique state ID',
  `state` varchar(32) NOT NULL COMMENT 'State name with first letter capital',
  `state_abbr` varchar(8) DEFAULT NULL COMMENT 'Optional state abbreviation (US is 2 capital letters)',
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;

INSERT INTO `state` (`state_id`, `state`, `state_abbr`)
VALUES
	(1,'Alabama','AL'),
	(2,'Alaska','AK'),
	(3,'Arizona','AZ'),
	(4,'Arkansas','AR'),
	(5,'California','CA'),
	(6,'Colorado','CO'),
	(7,'Connecticut','CT'),
	(8,'Delaware','DE'),
	(9,'District of Columbia','DC'),
	(10,'Florida','FL'),
	(11,'Georgia','GA'),
	(12,'Hawaii','HI'),
	(13,'Idaho','ID'),
	(14,'Illinois','IL'),
	(15,'Indiana','IN'),
	(16,'Iowa','IA'),
	(17,'Kansas','KS'),
	(18,'Kentucky','KY'),
	(19,'Louisiana','LA'),
	(20,'Maine','ME'),
	(21,'Maryland','MD'),
	(22,'Massachusetts','MA'),
	(23,'Michigan','MI'),
	(24,'Minnesota','MN'),
	(25,'Mississippi','MS'),
	(26,'Missouri','MO'),
	(27,'Montana','MT'),
	(28,'Nebraska','NE'),
	(29,'Nevada','NV'),
	(30,'New Hampshire','NH'),
	(31,'New Jersey','NJ'),
	(32,'New Mexico','NM'),
	(33,'New York','NY'),
	(34,'North Carolina','NC'),
	(35,'North Dakota','ND'),
	(36,'Ohio','OH'),
	(37,'Oklahoma','OK'),
	(38,'Oregon','OR'),
	(39,'Pennsylvania','PA'),
	(40,'Rhode Island','RI'),
	(41,'South Carolina','SC'),
	(42,'South Dakota','SD'),
	(43,'Tennessee','TN'),
	(44,'Texas','TX'),
	(45,'Utah','UT'),
	(46,'Vermont','VT'),
	(47,'Virginia','VA'),
	(48,'Washington','WA'),
	(49,'West Virginia','WV'),
	(50,'Wisconsin','WI'),
	(51,'Wyoming','WY');

/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table todo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `todo`;

CREATE TABLE `todo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `todos` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `todo` WRITE;
/*!40000 ALTER TABLE `todo` DISABLE KEYS */;

INSERT INTO `todo` (`id`, `todos`)
VALUES
	(1,'Welcome to Sparks!'),
	(2,'Sparks is cool.'),
	(3,'Sparks is awesome');

/*!40000 ALTER TABLE `todo` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(40) NOT NULL DEFAULT '',
  `datecreated` int(11) NOT NULL,
  `lastonline` int(11) NOT NULL,
  `role` enum('owner','admin','default') NOT NULL DEFAULT 'default',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `datecreated`, `lastonline`, `role`)
VALUES
	(1,'admin','bba2eb5e9172ca37cfcf7a1e3322af3f0e58f6e9',1333681579,1333990815,'owner'),
	(3,'manager','ba324ca7b1c77fc20bb970d5aff6eea9377918a5',1333681579,0,'default'),
	(5,'linux','717aab3680e15f2106baad2d16cabc4a1ae67da6',1333681579,1333732881,'default');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
