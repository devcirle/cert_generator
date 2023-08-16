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

-- Dumping data for table certificategenerator.attendees: ~52 rows (approximately)
INSERT INTO `attendees` (`id`, `seminar`, `district`, `school`, `name`, `position`, `contact`, `gender`, `age`, `pre_reg`, `date`, `created_at`, `code`) VALUES
	(1, 1, 'District 1', 'Sinait National High School', 'Richie Ritz Yoro', 'Student', '09669532713', NULL, 22, NULL, NULL, '2023-08-02 22:22:30', NULL),
	(2, 4, 'District 2', 'Test School', 'Test Name', 'Test Position', '09669532713', NULL, 22, NULL, NULL, '2023-08-02 22:25:57', NULL),
	(3, 5, 'test', 'test', 'test', 'test', '09669532713', NULL, 22, NULL, NULL, '2023-08-02 22:26:57', NULL),
	(4, 2, 'kljjkljkj', 'jkljkljlkjj', 'jkljkljkljklj', 'jkljkljkljklj', '09123456789', 'Male', 22, '2023-08-03', NULL, '2023-08-03 15:54:05', NULL),
	(5, 1, 'district', 'school', 'name', 'student', '09123456789', 'Male', 22, '2023-08-03', NULL, '2023-08-03 15:53:55', NULL),
	(6, 4, 'district', 'school', 'name', 'position', '09123456789', 'Male', 22, '2023-08-03', NULL, '2023-08-03 16:03:02', NULL),
	(7, 1, 'District', 'school', 'name', 'position', '09123456789', 'Female', 22, '2023-08-03', NULL, '2023-08-03 17:27:40', NULL),
	(8, 6, 'district', 'school', 'name', 'position', '09123456789', 'Male', 22, '2023-08-03', NULL, '2023-08-03 17:28:52', NULL),
	(9, 6, 'district', 'school', 'name', 'position', '09123456789', 'Male', 22, '2023-08-03', NULL, '2023-08-03 20:54:03', NULL),
	(10, 8, 'District 1', 'Sinait National High School', 'Richie Ritz Yoro', 'Programmer', '09919502683', 'Male', 22, '2023-08-04', NULL, '2023-08-04 01:58:15', NULL),
	(11, 8, 'District', 'School', 'Name', 'Position', '09123456789', 'Male', 22, '2023-08-04', NULL, '2023-08-04 18:01:13', NULL),
	(12, 8, 'District', 'School', 'Name', 'Position', '09123456789', 'Male', 22, '2023-08-04', NULL, '2023-08-04 18:01:46', NULL),
	(13, 9, 'district', 'school', 'name', 'position', '09123456789', 'Male', 22, '2023-08-04', NULL, '2023-08-04 18:03:26', NULL),
	(14, 8, 'district', 'school', 'name', 'position', '09123456789', 'Male', 22, '2023-08-04', NULL, '2023-08-04 18:08:45', NULL),
	(15, 3, 'district', 'school', 'name', 'position', '09123456789', 'Male', 22, '2023-08-04', NULL, '2023-08-04 18:09:41', NULL),
	(16, 15, 'district', 'school', 'name', 'position', '09123456789', 'Male', 22, '2023-08-08', NULL, '2023-08-08 15:53:22', NULL),
	(17, 14, 'district', 'school', 'name', 'position', '09987654321', 'Female', 22, '2023-08-08', NULL, '2023-08-08 15:54:42', NULL),
	(18, 4, 'district', 'school', 'name', 'position', '09123456789', 'Female', 22, '2023-08-08', NULL, '2023-08-08 15:57:14', 'SDOIN-1XNY23'),
	(19, 3, 'district', 'school', 'name', 'position', '09123456789', 'Male', 22, '2023-08-11', NULL, '2023-08-11 02:27:23', 'SDOIN-23'),
	(20, 3, 'district', 'school', 'name', 'position', '09876543219', 'Male', 22, '2023-08-11', NULL, '2023-08-11 02:29:47', 'SDOIN-323'),
	(21, 3, '', '', '', '', '', 'Male', 0, '2023-08-11', NULL, '2023-08-11 02:31:44', 'SDOIN-223'),
	(22, 4, 'district test', 'school test', 'name test', 'position test', '09123456789', 'Female', 22, '2023-08-11', NULL, '2023-08-11 05:00:54', 'SDOIN-123'),
	(23, 20, 'district', 'school', 'name', 'position', '09123456789', 'Male', 22, '2023-08-11', NULL, '2023-08-11 22:24:58', 'SDOIN-Q8CC23'),
	(24, 21, 'district', 'school', 'name', ' position', '09123456789', 'Male', 22, '2023-08-14', NULL, '2023-08-14 15:59:49', 'SDOIN-1Z4M23'),
	(25, 21, 'new district ', 'new school', 'new name', 'new position', '09123456789', 'Male', 22, '2023-08-14', NULL, '2023-08-14 16:14:28', 'SDOIN-EUEW23'),
	(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-14', '2023-08-14 16:17:47', NULL),
	(27, 21, 'district', 'school', 'name', 'position', '09123456789', 'Male', 22, '2023-08-14', '2023-08-142023-08-15', '2023-08-15 16:28:57', 'SDOIN-ZMMX23'),
	(28, 21, 'district', 'school', 'name', ' position', '09123456789', 'Male', 22, '2023-08-15', ' , "2023-08-14"', '2023-08-14 16:34:02', 'SDOIN-6Y7I23'),
	(29, 21, 'district', '', '', '', '', 'Male', 0, '2023-08-14', NULL, '2023-08-14 16:43:06', 'SDOIN-34JS23'),
	(30, 21, 'district', 'school', 'name', ' position', '09123456789', 'Male', 22, '2023-08-14', '"2023-08-14" , ', '2023-08-14 16:43:59', 'SDOIN-UO4123'),
	(31, 21, 'district', 'school', 'name', ' position', '09123456789', 'Male', 22, '2023-08-14', '[]"2023-08-14" , ', '2023-08-14 16:45:24', 'SDOIN-HYAI23'),
	(32, 21, 'district', 'school', 'name', 'position', '09123456789', 'Male', 22, '2023-08-14', '"2023-08-14","2023-08-15",', '2023-08-15 17:00:56', 'SDOIN-LU8M23'),
	(33, 22, 'district', 'school', 'name', ' position', '09123456789', 'Male', 22, '2023-08-16', NULL, '2023-08-16 17:30:27', 'SDOIN-VSSI23'),
	(34, 23, 'district', 'school', 'name', 'position', '09123456789', 'Male', 22, '2023-08-14', '"2023-08-14","2023-08-15",', '2023-08-15 17:36:43', 'SDOIN-KEFS23'),
	(37, 23, 'district', 'school', 'yoro', ' position', '09123456789', 'Male', 22, '2023-08-16', NULL, '2023-08-16 20:16:01', 'SDOIN-0YMK23'),
	(38, 23, 'district', 'school', 'name', '', '', 'Male', 22, '2023-08-16', NULL, '2023-08-16 20:16:53', 'SDOIN-OATJ23'),
	(39, 23, '', '', '', '', '', 'Male', 0, '2023-08-16', NULL, '2023-08-16 20:17:06', 'SDOIN-BCT923'),
	(40, 23, 'district', 'school', 'name', 'position', '09123456789', 'Male', 22, '2023-08-16', NULL, '2023-08-16 20:17:29', 'SDOIN-48P223'),
	(41, 23, 'district', 'school', 'name', 'position', '09123456789', 'Male', 22, '2023-08-16', NULL, '2023-08-16 20:19:21', 'SDOIN-QR6L23'),
	(42, 23, 'district', 'school', 'name', 'position', '09123456789', 'Male', 22, '2023-08-16', NULL, '2023-08-16 20:21:33', 'SDOIN-A2NR23'),
	(43, 23, 'district', 'school', 'name', 'position', '09123456789', 'Male', 22, '2023-08-16', NULL, '2023-08-16 20:22:35', 'SDOIN-G4GX23'),
	(45, NULL, 'district', 'school', 'yoro', 'position', '09123456789', 'Male', 22, '2023-08-16', NULL, '2023-08-16 20:26:39', 'SDOIN-69AT23'),
	(46, 23, 'district', 'school', 'yoro', 'position', '09123456789', 'Male', 22, '2023-08-16', NULL, '2023-08-16 20:27:54', 'SDOIN-A42523'),
	(47, 23, 'district', 'school', 'Richie', 'position', '09123456789', 'Male', 22, '2023-08-16', NULL, '2023-08-16 20:30:12', 'SDOIN-375L23'),
	(48, 23, 'district', 'school', 'yoro', 'position', '09123456789', 'Male', 22, '2023-08-16', NULL, '2023-08-16 20:32:37', 'SDOIN-FIC823'),
	(49, 23, 'district', 'school', 'yoro', 'position', '09123456789', 'Male', 22, '2023-08-16', NULL, '2023-08-16 20:33:06', 'SDOIN-G3XX23'),
	(50, 23, 'district', 'school', 'yoro', 'position', '09123456789', 'Male', 22, '2023-08-16', NULL, '2023-08-16 20:48:16', 'SDOIN-4B1M23'),
	(51, 23, 'district test', 'Sinait', 'Richie Ritz Yoro', 'position', '09123456789', 'Male', 22, '2023-08-16', '"2023-08-14","2023-08-15",', '2023-08-15 22:01:15', 'SDOIN-H1IS23'),
	(52, 23, 'district', 'school', 'new', 'position', '09123456789', 'Male', 22, '2023-08-16', '"2023-08-14","2023-08-15",', '2023-08-15 21:51:57', 'SDOIN-PROE23'),
	(53, 23, 'district', 'school', 'certificate test', 'position', '09123456789', 'Male', 22, '2023-08-16', '"2023-08-14","2023-08-15",', '2023-08-15 21:39:59', 'SDOIN-8Q7323'),
	(54, 23, 'district', 'school', 'cert status', 'position', '09123456789', 'Male', 22, '2023-08-15', '"2023-08-14","2023-08-15",', '2023-08-15 22:04:33', 'SDOIN-MHGC23'),
	(55, 24, 'District', 'School', 'Richie Ritz Yoro', 'Position', '09123456789', 'Male', 22, '2023-08-15', '"2023-08-15",', '2023-08-15 22:30:03', 'SDOIN-MIPY23'),
	(56, 24, 'district', 'school', 'Neil Ritzson Guillermo', 'position', '09123456789', 'Male', 22, '2023-08-15', '"2023-08-15",', '2023-08-15 22:36:02', 'SDOIN-KYCA23'),
	(57, 24, 'district', 'school', 'Mark Eugene Lorenzo', 'position', '09123456789', 'Male', 22, '2023-08-15', '"2023-08-15",', '2023-08-15 22:51:49', 'SDOIN-7F2123'),
	(58, 24, 'district', 'school', 'Jerico Valencia', 'position', '09123456789', 'Male', 22, '2023-08-15', '"2023-08-15",', '2023-08-15 23:49:32', 'SDOIN-CASS23'),
	(59, 22, 'district', 'school', 'testing of preregister', 'position', '09123456789', 'Male', 22, '2023-08-14', NULL, '2023-08-14 11:58:34', 'SDOIN-8JAY23'),
	(60, 22, 'District 1', 'Mariano Marcos State University', 'Richie Yoro', 'Student', '09123456789', 'Male', 22, '2023-08-14', NULL, '2023-08-14 12:02:00', 'SDOIN-X9DR23'),
	(61, 22, 'District 1', 'Mariano Marcos State University', 'Richie Yoro', 'Student', '09123456789', 'Male', 22, '2023-08-14', NULL, '2023-08-14 12:02:22', 'SDOIN-NKN023'),
	(62, 25, 'district', 'school', 'event 1 preregister', 'position', '09123456789', 'Male', 22, '2023-08-14', NULL, '2023-08-14 12:11:34', 'SDOIN-3I1T23'),
	(63, 30, 'district', 'school', 'Richie', 'position', '09123456789', 'Male', 22, '2023-08-15', '"2023-08-15",', '2023-08-15 08:29:15', 'SDOIN-E1L223'),
	(64, 29, 'district', 'school', 'name', 'position', '09123456789', 'Male', 22, '2023-08-15', NULL, '2023-08-15 08:48:11', 'SDOIN-ZRRN23'),
	(65, 29, 'district', 'school', 'name', 'position', '09123456789', 'Female', 22, '2023-08-15', NULL, '2023-08-15 08:50:33', 'SDOIN-S37C23');

-- Dumping data for table certificategenerator.certificate: ~6 rows (approximately)
INSERT INTO `certificate` (`id`, `status`, `seminar`, `attendee`, `cert_no`) VALUES
	(2, 0, 23, NULL, 'SDOIN-G3XX23'),
	(3, 0, 23, 51, 'SDOIN-H1IS23'),
	(4, 0, 23, 52, 'SDOIN-PROE23'),
	(5, 1, 23, 53, 'SDOIN-8Q7323'),
	(6, 1, 23, 54, 'SDOIN-MHGC23'),
	(7, 1, 24, 55, 'SDOIN-MIPY23'),
	(8, 1, 24, 56, 'SDOIN-KYCA23'),
	(9, 1, 24, 57, 'SDOIN-7F2123'),
	(10, 1, 24, 58, 'SDOIN-CASS23'),
	(11, 0, 22, 59, 'SDOIN-8JAY23'),
	(12, 0, 22, 60, 'SDOIN-X9DR23'),
	(13, 0, 22, 61, 'SDOIN-NKN023'),
	(14, 0, 25, 62, 'SDOIN-3I1T23'),
	(15, 0, 30, 63, 'SDOIN-E1L223'),
	(16, 0, 29, 64, 'SDOIN-ZRRN23'),
	(17, 0, 29, 65, 'SDOIN-S37C23');

-- Dumping data for table certificategenerator.seminars: ~24 rows (approximately)
INSERT INTO `seminars` (`id`, `owner`, `status`, `title`, `date`, `venue`, `created_at`) VALUES
	(1, 2, NULL, 'testseminar', '', 'laoag', '2023-07-24 19:00:44'),
	(2, 2, NULL, 'test2', '', 'batac', '2023-07-24 19:56:32'),
	(3, 10, NULL, 'newSeminar', '["2023-01-04","2023-01-05"]', 'Laoag', '2023-08-01 18:33:27'),
	(4, 10, NULL, 'errorchk', '["2023-01-07","2023-01-08","2023-01-09","2023-01-10","2023-01-11"]', 'Laoag', '2023-08-01 18:40:50'),
	(5, 1, NULL, 'no_owner', '["2023-08-02"]', 'Laoag', '2023-08-02 17:11:52'),
	(6, 2, NULL, 'testing', '["2023-01-20","2023-01-21"]', 'Batac', '2023-08-02 21:09:41'),
	(7, 2, NULL, 'testing1', '["2023-01-20"]', 'Batac', '2023-08-02 21:11:56'),
	(8, 11, NULL, 'seminar one', '["2023-01-04","2023-01-05"]', 'Laoag', '2023-08-04 01:55:14'),
	(9, 11, NULL, 'seminar two', '["2023-01-06","2023-01-07"]', 'Laoag', '2023-08-04 01:55:30'),
	(10, 2, NULL, 'sem inar', '["2023-01-06","2023-01-07"]', 'batac', '2023-08-04 22:49:05'),
	(11, 2, NULL, 'fjdasklfjl', '["2023-01-03"]', 'jfdlasjfljfjas', '2023-08-04 22:55:47'),
	(12, 2, NULL, 'fdsalkfjdsajfkl', '["2023-01-02"]', 'jdfsa', '2023-08-04 22:57:06'),
	(13, 2, NULL, 'fdsalkfjdsajfkl', '["2023-01-02"]', 'jdfsa', '2023-08-04 22:57:11'),
	(14, 13, NULL, 'owner41 seminar', '["2023-01-04"]', 'Batac', '2023-08-04 23:01:59'),
	(15, 13, NULL, 'owner41 seminar 2', '["2023-01-05"]', 'batac', '2023-08-04 23:02:56'),
	(16, 10, NULL, 'ureoquroqu', '', 'rueioqeruiwru', '2023-08-04 23:07:52'),
	(17, 11, NULL, 'Sample Event Name', '["2023-01-06","2023-01-07"]', 'Sample Venue For Event', '2023-08-11 20:27:55'),
	(18, 11, NULL, 'New Sample Event Name', '["2023-01-06"]', 'New Sample Event Venue', '2023-08-11 20:31:42'),
	(19, 11, NULL, 'Sample Event', '["2023-01-05"]', 'Sample Venue', '2023-08-11 20:40:37'),
	(20, 2, NULL, 'Sample Event Name for Attendance Checking', '["2023-08-10","2023-08-11","2023-08-12"]', 'Sample Venue', '2023-08-11 22:21:04'),
	(21, 10, 0, 'attendance test', '["2023-08-13","2023-08-14","2023-08-15"]', 'attendance venue test', '2023-08-17 05:16:30'),
	(22, 10, 0, 'new seminar', '["2023-08-14","2023-08-15","2023-08-16"]', 'new venue', '2023-08-17 05:16:30'),
	(23, 10, 0, 'event', '["2023-08-14","2023-08-15"]', 'venue', '2023-08-17 05:16:30'),
	(24, 10, 0, 'IT Seminar', '["2023-08-15"]', 'Laoag City, Ilocos Norte', '2023-08-17 05:16:30'),
	(25, 10, 0, 'event 1', '["2023-08-14","2023-08-15","2023-08-16"]', 'venue 1', '2023-08-17 05:16:30'),
	(26, 10, 0, 'lower date check', '["2023-08-14","2023-08-15","2023-08-16"]', 'lower', '2023-08-17 05:28:22'),
	(27, 10, 2, 'higher date check', '["2023-08-17","2023-08-18","2023-08-19","2023-08-20","2023-08-21","2023-08-22","2023-08-23","2023-08-24"]', 'higher', '2023-08-17 05:28:22'),
	(28, 10, 1, 'new seminar event', '', 'should be ended', '2023-08-15 07:49:03'),
	(29, 10, 1, 'new event again', '["2023-09-01","2023-09-02"]', 'september event', '2023-08-15 07:52:43'),
	(30, 13, 2, 'session tester', '["2023-08-14","2023-08-15","2023-08-16","2023-08-17"]', 'session venue', '2023-08-15 08:27:26');

-- Dumping data for table certificategenerator.users: ~15 rows (approximately)
INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `created_at`) VALUES
	(1, NULL, 'admin', '$2y$10$/6tAEm74QhNLofgp9obBS.z9wdfpXnSJWg66BM9VS5QNFigBg76Y.', 1, '2023-08-10 22:27:48'),
	(2, NULL, 'owner1', '$2y$10$//JzFiF81aNFFz4xf2gNJ.5XC8.e5q.ShVhXlj.3hmhSI3blTI.Ni', 2, '2023-07-19 22:52:28'),
	(3, NULL, 'louis.dev', '$2y$10$SECtkpCA6jGCY41V6Fkjk.Tf57GQkoqNbs218XYnOb9FQ1R.IkYMq', 2, '2023-08-10 23:03:48'),
	(4, NULL, 'owner5', '$2y$10$IrHS9aYyIW75Cu6NKUA6SemIlUKrl6Y6NKsFbgt2uQl5Jhmrw364q', 2, '2023-08-10 22:20:52'),
	(5, NULL, 'owner6', '$2y$10$QP2lXijLFt96HR0RrrC39e9blt4qe2RanT5802KyMA6hnkswTiZ2y', 2, '2023-08-10 22:20:52'),
	(6, NULL, 'owner7', '$2y$10$H1f/RCZ7cQGc8iIyGqBRXe9HVOJUPhg0dBLmbX8DT2pmlBiUqZNKG', 2, '2023-08-10 22:28:14'),
	(7, NULL, 'owner8', '$2y$10$68H9aJbtA3.zah7qej6VIeR8R264kw.aLM1eG.iF5e74sRimbcS4y', 2, '2023-08-10 22:28:14'),
	(8, NULL, 'owner9', '$2y$10$Etn2VnSuZJ2zijhOmW58lOK9nZs2GE1rL9ZHTxd9PJnqgDX.Ry5Na', 2, '2023-08-10 22:28:14'),
	(9, NULL, 'owner0', '$2y$10$1HcG7PufJ3bUOEDUR4GxEeCkMkoYH/MIpL5AAK8WwkKtn2cl1RmrW', 2, '2023-08-01 16:48:43'),
	(10, NULL, 'jerico', '$2y$10$JC/ygnXUF0nvVjxzOMhAV.jGv7vl7ud7RP8mePNQMuxThYXqT5sI2', 2, '2023-08-10 22:59:09'),
	(11, NULL, 'new', '$2y$10$zcW3c9P23AMz22zjOshrIeoeV7/NwWgY3tk3UQdl4CVdKRf2funly', 2, '2023-08-04 01:54:44'),
	(12, NULL, 'owner32', '$2y$10$Qu7Kz9dyLSuYdO.zPV/HPOvlNEZoyQ9yokJ7lYla3GJmy1GjwgLze', 2, '2023-08-10 22:20:52'),
	(13, NULL, 'owner41', '$2y$10$7KrdnuUfrkweNG1trBwSNu97t9Pdk.XgaHL3Af/KqIRVLCdggGyG.', 2, '2023-08-04 23:01:35'),
	(14, 'account test', 'account_test', '$2y$10$9em.xtLoW5LHmnW80ZlW4.Ln6FRqd9fUy9YQP1jRivqGtMY1jQqnq', 2, '2023-08-16 19:21:52'),
	(15, 'Richie Ritz Yoro', 'newusername', '$2y$10$c5FC9hqNXUqLNwop63.80e2UHy2TmfOwtazB/sKYjHBEtRJ66FMqu', 2, '2023-08-16 21:26:03');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
