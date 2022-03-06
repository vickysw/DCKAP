-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.26 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6251
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for local_usermgmt
CREATE DATABASE IF NOT EXISTS `local_usermgmt` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `local_usermgmt`;

-- Dumping structure for table local_usermgmt.tbl_city
CREATE TABLE IF NOT EXISTS `tbl_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table local_usermgmt.tbl_city: 73 rows
/*!40000 ALTER TABLE `tbl_city` DISABLE KEYS */;
INSERT INTO `tbl_city` (`id`, `city_name`, `country_id`, `city_code`) VALUES
	(1, 'Ahmedabad', '1', '1201'),
	(2, 'Amreli', '1', '1202'),
	(3, 'Anand', '1', '1203'),
	(4, 'Banaskantha', '1', '1204'),
	(5, 'Baroda', '1', '1205'),
	(6, 'Bharuch', '1', '1206'),
	(7, 'Bhavnagar', '1', '1207'),
	(8, 'Dahod', '1', '1208'),
	(9, 'Dang', '1', '1209'),
	(10, 'Dwarka', '1', '1210'),
	(11, 'Gandhinagar', '1', '1211'),
	(12, 'Jamnagar', '1', '1212'),
	(13, 'Junagadh', '1', '1213'),
	(14, 'Kheda', '1', '1214'),
	(15, 'Kutch', '1', '1215'),
	(16, 'Mehsana', '1', '1216'),
	(17, 'Nadiad', '1', '1217'),
	(18, 'Narmada', '1', '1218'),
	(19, 'Navsari', '1', '1219'),
	(20, 'Panchmahals', '1', '1220'),
	(21, 'Patan', '1', '1221'),
	(22, 'Porbandar', '1', '1222'),
	(23, 'Rajkot', '1', '1223'),
	(24, 'Sabarkantha', '1', '1224'),
	(25, 'Surat', '1', '1225'),
	(26, 'Surendranagar', '1', '1226'),
	(27, 'Vadodara', '1', '1227'),
	(28, 'Valsad', '1', '1228'),
	(29, 'Vapi', '1', '1229'),
	(30, 'Bagalkot', '1', '1701'),
	(31, 'Bangalore', '1', '1702'),
	(32, 'Bangalore Rural', '1', '1703'),
	(33, 'Belgaum', '1', '1704'),
	(34, 'Bellary', '1', '1705'),
	(35, 'Bhatkal', '1', '1706'),
	(36, 'Bidar', '1', '1707'),
	(37, 'Bijapur', '1', '1708'),
	(38, 'Chamrajnagar', '1', '1709'),
	(39, 'Chickmagalur', '1', '1710'),
	(40, 'Chikballapur', '1', '1711'),
	(41, 'Chitradurga', '1', '1712'),
	(42, 'Dakshina Kannada', '1', '1713'),
	(43, 'Davanagere', '1', '1714'),
	(44, 'Dharwad', '1', '1715'),
	(45, 'Gadag', '1', '1716'),
	(46, 'Gulbarga', '1', '1717'),
	(47, 'Hampi', '1', '1718'),
	(48, 'Hassan', '1', '1719'),
	(49, 'Haveri', '1', '1720'),
	(50, 'Hospet', '1', '1721'),
	(51, 'Karwar', '1', '1722'),
	(52, 'Kodagu', '1', '1723'),
	(53, 'Kolar', '1', '1724'),
	(54, 'Koppal', '1', '1725'),
	(55, 'Madikeri', '1', '1726'),
	(56, 'Mandya', '1', '1727'),
	(57, 'Mangalore', '1', '1728'),
	(58, 'Manipal', '1', '1729'),
	(59, 'Mysore', '1', '1730'),
	(60, 'Raichur', '1', '1731'),
	(61, 'Shimoga', '1', '1732'),
	(62, 'Sirsi', '1', '1733'),
	(63, 'Sringeri', '1', '1734'),
	(64, 'Srirangapatna', '1', '1735'),
	(65, 'Tumkur', '1', '1736'),
	(66, 'Udupi', '1', '1737'),
	(67, 'Uttara Kannada', '1', '1738'),
	(68, 'Moscow', '2', '2102'),
	(69, 'Saint Petersburg', '2', '2103'),
	(70, '	Vladimir', '2', '2104'),
	(71, 'Kyiv', '3', '3101'),
	(72, 'Kharkiv', '3', '3102'),
	(73, 'Odesa', '3', '3103');
/*!40000 ALTER TABLE `tbl_city` ENABLE KEYS */;

-- Dumping structure for table local_usermgmt.tbl_country
CREATE TABLE IF NOT EXISTS `tbl_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table local_usermgmt.tbl_country: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_country` DISABLE KEYS */;
INSERT INTO `tbl_country` (`id`, `country_name`, `country_code`) VALUES
	(1, 'India', 'IN'),
	(2, 'Rassia', 'RS'),
	(3, 'Ukrain', 'UKR');
/*!40000 ALTER TABLE `tbl_country` ENABLE KEYS */;

-- Dumping structure for table local_usermgmt.tbl_education_list
CREATE TABLE IF NOT EXISTS `tbl_education_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `degree_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `degree_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table local_usermgmt.tbl_education_list: 6 rows
/*!40000 ALTER TABLE `tbl_education_list` DISABLE KEYS */;
INSERT INTO `tbl_education_list` (`id`, `degree_name`, `degree_code`) VALUES
	(2, 'Pre-Prmary', 'PP'),
	(3, 'Primary', 'p'),
	(4, 'Secondary', 'S'),
	(5, 'Higher Secondary', 'HS'),
	(6, 'Greduation', 'G'),
	(7, 'Post Greduation', 'PG');
/*!40000 ALTER TABLE `tbl_education_list` ENABLE KEYS */;

-- Dumping structure for table local_usermgmt.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `city_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `pincode` tinytext COLLATE utf8_unicode_ci,
  `profile_pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `education_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table local_usermgmt.tbl_user: 0 rows
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
