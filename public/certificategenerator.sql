-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
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


-- Dumping database structure for certificategenerator
CREATE DATABASE IF NOT EXISTS `certificategenerator` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `certificategenerator`;

-- Dumping structure for table certificategenerator.attendees
CREATE TABLE IF NOT EXISTS `attendees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `seminar` int DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `pre_reg` date DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seminar` (`seminar`),
  CONSTRAINT `attendees_ibfk_1` FOREIGN KEY (`seminar`) REFERENCES `seminars` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;



-- Dumping structure for table certificategenerator.certificate
CREATE TABLE IF NOT EXISTS `certificate` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) DEFAULT NULL,
  `seminar` int DEFAULT NULL,
  `attendee` int DEFAULT NULL,
  `cert_no` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seminar` (`seminar`),
  KEY `attendee` (`attendee`),
  CONSTRAINT `certificate_ibfk_1` FOREIGN KEY (`seminar`) REFERENCES `seminars` (`id`),
  CONSTRAINT `certificate_ibfk_2` FOREIGN KEY (`attendee`) REFERENCES `attendees` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;



-- Dumping structure for table certificategenerator.seminars
CREATE TABLE IF NOT EXISTS `seminars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `owner` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `venue` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `owner` (`owner`),
  CONSTRAINT `seminars_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;


-- Dumping structure for table certificategenerator.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table certificategenerator.users: ~15 rows (approximately)
INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `created_at`) VALUES
	(1, NULL, 'admin', '$2y$10$/6tAEm74QhNLofgp9obBS.z9wdfpXnSJWg66BM9VS5QNFigBg76Y.', 1, '2023-08-10 22:27:48'),
	(2, NULL, 'owner1', '$2y$10$//JzFiF81aNFFz4xf2gNJ.5XC8.e5q.ShVhXlj.3hmhSI3blTI.Ni', 2, '2023-07-19 22:52:28');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
