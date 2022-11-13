-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.11 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for partagedoc
CREATE DATABASE IF NOT EXISTS `partagedoc` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `partagedoc`;

-- Dumping structure for table partagedoc.documents
CREATE TABLE IF NOT EXISTS `documents` (
  `idDoc` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL DEFAULT '',
  `username` varchar(100) NOT NULL DEFAULT '' COMMENT 'nom auteur',
  `nbLike` int(11) DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL COMMENT 'privé/protégé/public',
  PRIMARY KEY (`idDoc`),
  KEY `username` (`username`),
  CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `compte` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table partagedoc.documents: ~3 rows (approximately)
INSERT INTO `documents` (`idDoc`, `titre`, `username`, `nbLike`, `statut`) VALUES
	(1, 'Exemple1.html', 'user1', 21, 'public'),
	(2, 'Exemple3.php', 'test2', 45, 'public'),
	(3, 'Devoir4.py', 'user1', 2, 'public');

-- Dumping structure for table partagedoc.relation
CREATE TABLE IF NOT EXISTS `relation` (
  `from` varchar(50) NOT NULL COMMENT 'username de la personne qui fait la demande',
  `to` varchar(50) NOT NULL COMMENT 'username de la personne qui reçoit la demande',
  `statut` varchar(1) NOT NULL COMMENT '(P)ending/(F)riend/(B)locked',
  PRIMARY KEY (`from`,`to`,`statut`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table partagedoc.relation: ~0 rows (approximately)

-- Dumping structure for table partagedoc.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table partagedoc.users: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
