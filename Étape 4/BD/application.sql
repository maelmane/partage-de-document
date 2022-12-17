-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.6.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.2.0.6576
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for application
CREATE DATABASE IF NOT EXISTS `application` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `application`;

-- Dumping structure for table application.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table application.users: ~8 rows (approximately)
INSERT INTO `users` (`id`, `username`, `password`) VALUES
	(1, 'john_12', '$2y$10$.jreKCXvvBWzKvq01EmLvuO4V1xbf3x7zIwBg9PgcPLz49F7xsCRi'),
	(2, 'JoshDane', '$2y$10$Tbbevd1HykuqBwDvVVBwRe0dk2X91ZolnnPHT.isKQ6Cd3OKUH8Y6'),
	(3, 'JaneDoe7', '$2y$10$kFTr8wfkJqe/9coQlYKS9uDSNiUBxHNPQnS630O0GEd6M4tTE3i8.'),
	(4, 'Joe64', '$2y$10$r6/qVf2t0SehhKK2QDAEn.MMYSBT67rhOmnCXcmTJgXjeM31YQtze'),
	(5, 'matt_4', '$2y$10$dxOIcUqJrpirq1X4YFGvU.nxp8Djc2J7B8qD6eOPXJ/T1Uv3XRA1y'),
	(6, 'paulie90', '$2y$10$hLAdNhvZt6Gzt.7YGE2TrO41I7zzX6/VN5U/hSlL7KPE9Dr1rqwUy'),
	(7, 'Alex_Smith', '$2y$10$awdjyUoPY2YQLPYT1tFvGuI86b9F6ZxSoJwFzZTUg/RksRvWug1tm'),
	(8, 'XwillieX', '$2y$10$xgX3AXZtiFgke/Y/fDDi7.DoKTSyw8pgG18IfX6zvXxKaomfl2zbi');

-- Dumping structure for table application.documents
CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `auteur` varchar(50) NOT NULL COMMENT 'username de l''auteur',
  `statut` varchar(50) NOT NULL COMMENT 'public,privé,protégé',
  `nbLike` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `auteur` (`auteur`),
  CONSTRAINT `auteur` FOREIGN KEY (`auteur`) REFERENCES `users` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table application.documents: ~4 rows (approximately)
INSERT INTO `documents` (`id`, `titre`, `url`, `auteur`, `statut`, `nbLike`) VALUES
	(1, 'Exercie1.py', '/exercices', 'JaneDoe7', 'privé', 0),
	(2, 'photo_vaccances.png', '/images', 'john_12', 'public', 122),
	(3, 'examenFormatif.java', '/examen', 'JaneDoe7', 'public', 32),
	(4, 'Devoir2.php', '/images', 'JoshDane', 'public', 0);

-- Dumping structure for table application.files
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL DEFAULT '',
  `auteur` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `statut` varchar(50) NOT NULL DEFAULT 'privé',
  `nbLike` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table application.files: ~9 rows (approximately)
INSERT INTO `files` (`id`, `titre`, `auteur`, `date`, `statut`, `nbLike`) VALUES
	(1, 'CompteException.java', 'JaneDoe7', '2022-12-15 21:58:13', 'privé', 0),
	(2, 'ExempleBlocException.java', 'JaneDoe7', '2022-12-15 21:59:10', 'privé', 0),
	(3, 'ExempleOutofMemoryError.java', 'JaneDoe7', '2022-12-16 01:53:31', 'public', 1),
	(4, 'GuessingGame.java', 'matt_4', '2022-12-16 01:56:47', 'public', 5),
	(5, 'Cube.py', 'matt_4', '2022-12-16 01:57:37', 'public', 6),
	(6, 'character.txt', 'paulie90', '2022-12-16 01:58:19', 'public', 3),
	(7, 'labo3-2.png', 'paulie90', '2022-12-16 01:59:09', 'public', 0),
	(8, 'Série E13 1.csproj', 'paulie90', '2022-12-16 01:59:43', 'public', 0),
	(9, 'BD relationnelles.pdf', 'paulie90', '2022-12-16 02:00:08', 'public', 3);

-- Dumping structure for table application.relation
CREATE TABLE IF NOT EXISTS `relation` (
  `id_relation` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(50) NOT NULL COMMENT 'username du user qui envoie la demande',
  `receiver` varchar(50) NOT NULL COMMENT 'username de celui qui recoit la demande',
  `statut` varchar(1) NOT NULL COMMENT 'P(ending)/F(riend)/B(locked)',
  PRIMARY KEY (`id_relation`),
  UNIQUE KEY `id_relation` (`id_relation`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table application.relation: ~4 rows (approximately)
INSERT INTO `relation` (`id_relation`, `sender`, `receiver`, `statut`) VALUES
	(1, 'john_12', 'JaneDoe7', 'F'),
	(2, 'JaneDoe7', 'Alex_Smith', 'F'),
	(3, 'paulie90', 'JaneDoe7', 'P'),
	(4, 'matt_4', 'john_12', 'F'),
	(5, 'Joe64', 'JaneDoe7', 'P');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
