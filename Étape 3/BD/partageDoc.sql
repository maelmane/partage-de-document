-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.11 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for partagedoc
CREATE DATABASE IF NOT EXISTS `partagedoc` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `partagedoc`;

-- Dumping structure for table partagedoc.compte
CREATE TABLE IF NOT EXISTS `compte` (
  `username` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `passwd` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table partagedoc.compte: ~0 rows (approximately)
DELETE FROM `compte`;
/*!40000 ALTER TABLE `compte` DISABLE KEYS */;
/*!40000 ALTER TABLE `compte` ENABLE KEYS */;

-- Dumping structure for table partagedoc.docpublic
CREATE TABLE IF NOT EXISTS `docpublic` (
  `idDoc` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL DEFAULT '',
  `username` varchar(100) NOT NULL DEFAULT '' COMMENT 'nom auteur',
  PRIMARY KEY (`idDoc`),
  KEY `username` (`username`),
  CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `compte` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table partagedoc.docpublic: ~0 rows (approximately)
DELETE FROM `docpublic`;
/*!40000 ALTER TABLE `docpublic` DISABLE KEYS */;
/*!40000 ALTER TABLE `docpublic` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
