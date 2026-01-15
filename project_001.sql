-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.31 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for project_001
CREATE DATABASE IF NOT EXISTS `project_001` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `project_001`;

-- Dumping structure for table project_001.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `adminId` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `lastlogindate` datetime DEFAULT NULL,
  `uniqid` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.admin: ~0 rows (approximately)
INSERT INTO `admin` (`adminId`, `fname`, `lname`, `email`, `password`, `lastlogindate`, `uniqid`) VALUES
	(1, 'lakshan', 'Eranga', 'eranga34063@gmail.com', 'Lucky/27', '2023-12-17 17:19:11', '657ee02f2d5ec');

-- Dumping structure for table project_001.amenties
CREATE TABLE IF NOT EXISTS `amenties` (
  `amenties_id` int NOT NULL AUTO_INCREMENT,
  `amenties_name` varchar(45) NOT NULL,
  `autpriceamen` double DEFAULT NULL,
  PRIMARY KEY (`amenties_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.amenties: ~9 rows (approximately)
INSERT INTO `amenties` (`amenties_id`, `amenties_name`, `autpriceamen`) VALUES
	(1, 'Wifi', 30),
	(2, 'TV', 30),
	(3, 'Kitchen', 30),
	(4, 'Washer', 30),
	(5, 'Free Parking', 30),
	(6, 'Paid Parking', 30),
	(7, 'Air Condition', 30),
	(8, 'Workspace', 30),
	(9, 'Heater', 30);

-- Dumping structure for table project_001.basic_facilities
CREATE TABLE IF NOT EXISTS `basic_facilities` (
  `bs_fac_id` int NOT NULL AUTO_INCREMENT,
  `bs_fac_name` varchar(45) NOT NULL,
  `autpricefac` double DEFAULT NULL,
  PRIMARY KEY (`bs_fac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.basic_facilities: ~4 rows (approximately)
INSERT INTO `basic_facilities` (`bs_fac_id`, `bs_fac_name`, `autpricefac`) VALUES
	(1, 'Guests', 50),
	(2, 'Bedrooms', 10),
	(3, 'Beds', 20),
	(4, 'Bathrooms', 80);

-- Dumping structure for table project_001.chat
CREATE TABLE IF NOT EXISTS `chat` (
  `chat_id` int NOT NULL AUTO_INCREMENT,
  `content` text,
  `datetime` varchar(45) NOT NULL,
  `admin_adminId` int NOT NULL,
  `from` int DEFAULT NULL,
  `to` int DEFAULT NULL,
  PRIMARY KEY (`chat_id`),
  KEY `fk_chat_admin1_idx` (`admin_adminId`),
  KEY `fk_chat_customer1_idx` (`from`),
  KEY `fk_chat_customer2_idx` (`to`),
  CONSTRAINT `fk_chat_admin1` FOREIGN KEY (`admin_adminId`) REFERENCES `admin` (`adminId`),
  CONSTRAINT `fk_chat_customer1` FOREIGN KEY (`from`) REFERENCES `customer` (`customer_id`),
  CONSTRAINT `fk_chat_customer2` FOREIGN KEY (`to`) REFERENCES `customer` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.chat: ~3 rows (approximately)
INSERT INTO `chat` (`chat_id`, `content`, `datetime`, `admin_adminId`, `from`, `to`) VALUES
	(164, 'hey', '2023:10:31 04:31:20', 1, 265, NULL),
	(166, 'haraka', '2023:10:31 04:34:08', 1, 265, NULL),
	(168, 'hey', '2024:05:29 18:04:14', 1, 266, NULL);

-- Dumping structure for table project_001.country
CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int NOT NULL AUTO_INCREMENT,
  `country_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.country: ~2 rows (approximately)
INSERT INTO `country` (`country_id`, `country_name`) VALUES
	(1, 'Sri Lanka'),
	(2, 'USA');

-- Dumping structure for table project_001.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `nic` varchar(45) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `registered_date` datetime NOT NULL,
  `verification_code` varchar(45) DEFAULT NULL,
  `notification` text,
  `country_id` int DEFAULT NULL,
  `gender_gender_id` int DEFAULT NULL,
  `status_status_id` int NOT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `fk_customer_gender1_idx` (`gender_gender_id`),
  KEY `fk_customer_province_idx` (`country_id`),
  KEY `fk_customer_status1_idx` (`status_status_id`),
  CONSTRAINT `fk_customer_gender1` FOREIGN KEY (`gender_gender_id`) REFERENCES `gender` (`gender_id`),
  CONSTRAINT `fk_customer_province` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`),
  CONSTRAINT `fk_customer_status1` FOREIGN KEY (`status_status_id`) REFERENCES `status` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=267 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.customer: ~1 rows (approximately)
INSERT INTO `customer` (`customer_id`, `email`, `fname`, `lname`, `mobile`, `password`, `nic`, `address`, `registered_date`, `verification_code`, `notification`, `country_id`, `gender_gender_id`, `status_status_id`) VALUES
	(265, 'lukyheshan@gmail.com', 'Lakshan', 'Eranga', '0710817211', 'Lucky/27', '200600201851', '35/5 Theldeniy Rd, Madawala', '2023-10-23 21:33:58', '6536996ed71ef', NULL, 1, 1, 1),
	(266, 'eranga34063@gmail.com', NULL, NULL, NULL, 'Lucky/27', NULL, NULL, '2023-11-09 17:57:08', '654cd01cc62fb', NULL, NULL, 1, 2);

-- Dumping structure for table project_001.customer_has_sociel_media
CREATE TABLE IF NOT EXISTS `customer_has_sociel_media` (
  `customer_customer_id` int NOT NULL,
  `sociel_media_smedia_id` int NOT NULL,
  `customer_has_sociel_media_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`customer_has_sociel_media_id`),
  KEY `fk_customer_has_sociel_media_sociel_media1_idx` (`sociel_media_smedia_id`),
  KEY `fk_customer_has_sociel_media_customer1_idx` (`customer_customer_id`),
  CONSTRAINT `fk_customer_has_sociel_media_customer1` FOREIGN KEY (`customer_customer_id`) REFERENCES `customer` (`customer_id`),
  CONSTRAINT `fk_customer_has_sociel_media_sociel_media1` FOREIGN KEY (`sociel_media_smedia_id`) REFERENCES `sociel_media` (`smedia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.customer_has_sociel_media: ~0 rows (approximately)

-- Dumping structure for table project_001.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `gender_id` int NOT NULL AUTO_INCREMENT,
  `gender_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.gender: ~2 rows (approximately)
INSERT INTO `gender` (`gender_id`, `gender_name`) VALUES
	(1, 'Male'),
	(2, 'Female');

-- Dumping structure for table project_001.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int NOT NULL AUTO_INCREMENT,
  `discount` double DEFAULT NULL,
  `adultqty` int DEFAULT NULL,
  `childqty` int DEFAULT NULL,
  `infantqty` int DEFAULT NULL,
  `oneAdprice` double DEFAULT NULL,
  `oneChprice` double DEFAULT NULL,
  `oneInfprice` double DEFAULT NULL,
  `chekinDate` varchar(45) DEFAULT NULL,
  `cheloutDate` varchar(45) DEFAULT NULL,
  `fulltotal` double DEFAULT NULL,
  `issuedate` datetime DEFAULT NULL,
  `place_place_id` int DEFAULT NULL,
  `customer_customer_id` int DEFAULT NULL,
  `invoiceIduniquly` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `fk_invoice_place1_idx` (`place_place_id`),
  KEY `fk_invoice_customer1_idx` (`customer_customer_id`),
  CONSTRAINT `fk_invoice_customer1` FOREIGN KEY (`customer_customer_id`) REFERENCES `customer` (`customer_id`),
  CONSTRAINT `fk_invoice_place1` FOREIGN KEY (`place_place_id`) REFERENCES `place` (`place_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.invoice: ~2 rows (approximately)
INSERT INTO `invoice` (`invoice_id`, `discount`, `adultqty`, `childqty`, `infantqty`, `oneAdprice`, `oneChprice`, `oneInfprice`, `chekinDate`, `cheloutDate`, `fulltotal`, `issuedate`, `place_place_id`, `customer_customer_id`, `invoiceIduniquly`) VALUES
	(31, 0, 0, 0, 0, 3000, 1500, 500, '2023-10-23', '2023-10-25', 0, '2023-10-23 21:57:45', 349, 265, '65369f0153cb9'),
	(32, 0, 3, 1, 0, 3000, 1500, 500, '2023-10-23', '2023-10-25', 21000, '2023-10-23 21:58:08', 349, 265, '65369f186416a'),
	(33, 0, 1, 1, 1, 3000, 1500, 500, '2023-10-23', '2023-10-25', 10000, '2023-10-23 22:15:49', 349, 265, '6536a33d2ee41'),
	(34, 0, 0, 3, 0, 3000, 1500, 500, '2023-12-12', '2023-12-13', 4500, '2023-12-11 16:35:55', 349, 266, '6576ed134070e');

-- Dumping structure for table project_001.place
CREATE TABLE IF NOT EXISTS `place` (
  `place_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `location` text,
  `added_time` datetime DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `address1` varchar(45) DEFAULT NULL,
  `address2` varchar(45) DEFAULT NULL,
  `plc_cat_id` int NOT NULL,
  `customer_customer_id` int NOT NULL,
  `place_type_place_type_id` int DEFAULT NULL,
  `country_country_id` int DEFAULT NULL,
  `adultprice` double DEFAULT NULL,
  `childprice` double DEFAULT NULL,
  `infantprice` double DEFAULT NULL,
  `status` int NOT NULL,
  `addingprice` double DEFAULT NULL,
  PRIMARY KEY (`place_id`),
  KEY `fk_place_customer1_idx` (`customer_customer_id`),
  KEY `fk_place_place_category1_idx` (`plc_cat_id`),
  KEY `fk_place_place_type1_idx` (`place_type_place_type_id`),
  KEY `fk_place_country1_idx` (`country_country_id`),
  KEY `fk_place_status1_idx` (`status`),
  CONSTRAINT `fk_place_country1` FOREIGN KEY (`country_country_id`) REFERENCES `country` (`country_id`),
  CONSTRAINT `fk_place_customer1` FOREIGN KEY (`customer_customer_id`) REFERENCES `customer` (`customer_id`),
  CONSTRAINT `fk_place_place_category1` FOREIGN KEY (`plc_cat_id`) REFERENCES `place_category` (`place_category_id`),
  CONSTRAINT `fk_place_place_type1` FOREIGN KEY (`place_type_place_type_id`) REFERENCES `place_type` (`place_type_id`),
  CONSTRAINT `fk_place_status1` FOREIGN KEY (`status`) REFERENCES `status` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=356 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.place: ~6 rows (approximately)
INSERT INTO `place` (`place_id`, `title`, `description`, `location`, `added_time`, `state`, `city`, `address1`, `address2`, `plc_cat_id`, `customer_customer_id`, `place_type_place_type_id`, `country_country_id`, `adultprice`, `childprice`, `infantprice`, `status`, `addingprice`) VALUES
	(349, 'Kandy wila', 'Do you like enjoy better experience..!  come this', NULL, '2023-10-23 21:53:40', 'Kandy', 'Kandy', '35/5', 'Theldeniya Rd, Madawala', 5, 265, 2, 1, 3000, 1500, 500, 2, 200),
	(350, 'Kandy wila', 'Do you like enjoy better experience..!  come this', NULL, '2023-10-23 21:55:03', 'Kandy', 'Kandy', '35/5', 'Theldeniya Rd, Madawala', 5, 265, 2, 1, 3000, 1500, 500, 1, 2150),
	(351, 'Queens', 'Do you like enjoy better experience..!  come this', NULL, '2023-10-24 05:46:59', 'KANDY', 'Senkadagala', '35/3', 'Kandy rd', 6, 265, 3, 1, 5000, 4500, 2000, 1, 4600),
	(352, 'Chikago intes', 'Do you like enjoy better experience..!  come this', NULL, '2023-10-24 05:53:57', 'chikago', 'chikago', 'Chikago', 'Bakery rd', 2, 265, 3, 2, 1000, 1000, 1000, 1, 2520),
	(353, 'Kandy village', 'Do you like enjoy better experience..!  come this', NULL, '2023-10-30 16:01:22', 'Madawala', 'Kandy', '35/3', 'Theldeniya rd,', 5, 265, 1, 1, 10000, 20000, 100000, 1, 2560),
	(354, 'Kandy', 'Do you like enjoy better experience..!  come this', NULL, '2023-12-11 16:37:51', 'KANDY', 'Kandy', '35/3', 'Theldeniya road,Madawala', 6, 266, 3, 1, 10000, 20000, 100000, 1, 4500),
	(355, 'kndy', 'Do you like enjoy better experience..!  come this', NULL, '2024-05-29 21:36:51', 'ffff', 'dddddddddd', '35/3', 'jndihhui', 6, 266, 2, 1, 1000, 20000, 100000, 1, 2860);

-- Dumping structure for table project_001.place_category
CREATE TABLE IF NOT EXISTS `place_category` (
  `place_category_id` int NOT NULL AUTO_INCREMENT,
  `plc_cat_name` varchar(50) NOT NULL,
  `autpricecat` double DEFAULT NULL,
  PRIMARY KEY (`place_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.place_category: ~7 rows (approximately)
INSERT INTO `place_category` (`place_category_id`, `plc_cat_name`, `autpricecat`) VALUES
	(1, 'Home', 10),
	(2, 'Appartment', 20),
	(3, 'Cabin', 30),
	(4, 'Cabana', 40),
	(5, 'Hotel', 60),
	(6, 'Forest Homes', 2000),
	(7, 'Tree houses', 2000);

-- Dumping structure for table project_001.place_has_basic_facilities
CREATE TABLE IF NOT EXISTS `place_has_basic_facilities` (
  `place_has_basic_faciliti_id` int NOT NULL AUTO_INCREMENT,
  `place_place_id` int NOT NULL,
  `basic_facilities_bs_fac_id` int NOT NULL,
  `qty` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`place_has_basic_faciliti_id`),
  KEY `fk_place_has_basic_facilities_basic_facilities1_idx` (`basic_facilities_bs_fac_id`),
  KEY `fk_place_has_basic_facilities_place1_idx` (`place_place_id`),
  CONSTRAINT `fk_place_has_basic_facilities_basic_facilities1` FOREIGN KEY (`basic_facilities_bs_fac_id`) REFERENCES `basic_facilities` (`bs_fac_id`),
  CONSTRAINT `fk_place_has_basic_facilities_place1` FOREIGN KEY (`place_place_id`) REFERENCES `place` (`place_id`)
) ENGINE=InnoDB AUTO_INCREMENT=889 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.place_has_basic_facilities: ~28 rows (approximately)
INSERT INTO `place_has_basic_facilities` (`place_has_basic_faciliti_id`, `place_place_id`, `basic_facilities_bs_fac_id`, `qty`) VALUES
	(861, 349, 1, '1'),
	(862, 349, 2, '1'),
	(863, 349, 3, '1'),
	(864, 349, 4, '1'),
	(865, 350, 1, '1'),
	(866, 350, 2, '1'),
	(867, 350, 3, '1'),
	(868, 350, 4, '1'),
	(869, 351, 1, '2'),
	(870, 351, 2, '4'),
	(871, 351, 3, '2'),
	(872, 351, 4, '1'),
	(873, 352, 1, '1'),
	(874, 352, 2, '1'),
	(875, 352, 3, '1'),
	(876, 352, 4, '1'),
	(877, 353, 1, '1'),
	(878, 353, 2, '1'),
	(879, 353, 3, '1'),
	(880, 353, 4, '1'),
	(881, 354, 1, '1'),
	(882, 354, 2, '1'),
	(883, 354, 3, '1'),
	(884, 354, 4, '1'),
	(885, 355, 1, '1'),
	(886, 355, 2, '1'),
	(887, 355, 3, '1'),
	(888, 355, 4, '1');

-- Dumping structure for table project_001.place_has_facilities
CREATE TABLE IF NOT EXISTS `place_has_facilities` (
  `place_has_facilitie_id` int NOT NULL AUTO_INCREMENT,
  `place_place_id` int NOT NULL,
  `safety_items_safety items_id` int DEFAULT NULL,
  `amenties_amenties_id` int DEFAULT NULL,
  `standout_amenities_standout_amenities_id` int DEFAULT NULL,
  PRIMARY KEY (`place_has_facilitie_id`),
  KEY `fk_place_has_facilities_place1_idx` (`place_place_id`),
  KEY `fk_place_has_facilities_safety_items1_idx` (`safety_items_safety items_id`),
  KEY `fk_place_has_facilities_amenties1_idx` (`amenties_amenties_id`),
  KEY `fk_place_has_facilities_standout_amenities1_idx` (`standout_amenities_standout_amenities_id`),
  CONSTRAINT `fk_place_has_facilities_amenties1` FOREIGN KEY (`amenties_amenties_id`) REFERENCES `amenties` (`amenties_id`),
  CONSTRAINT `fk_place_has_facilities_place1` FOREIGN KEY (`place_place_id`) REFERENCES `place` (`place_id`),
  CONSTRAINT `fk_place_has_facilities_safety_items1` FOREIGN KEY (`safety_items_safety items_id`) REFERENCES `safety_items` (`safety items_id`),
  CONSTRAINT `fk_place_has_facilities_standout_amenities1` FOREIGN KEY (`standout_amenities_standout_amenities_id`) REFERENCES `standout_amenities` (`standout_amenities_id`)
) ENGINE=InnoDB AUTO_INCREMENT=470 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.place_has_facilities: ~96 rows (approximately)
INSERT INTO `place_has_facilities` (`place_has_facilitie_id`, `place_place_id`, `safety_items_safety items_id`, `amenties_amenties_id`, `standout_amenities_standout_amenities_id`) VALUES
	(374, 349, NULL, 2, NULL),
	(375, 349, NULL, NULL, 11),
	(376, 349, 3, NULL, NULL),
	(377, 349, 7, NULL, NULL),
	(378, 350, NULL, 2, NULL),
	(379, 350, NULL, NULL, 11),
	(380, 350, 3, NULL, NULL),
	(381, 350, 7, NULL, NULL),
	(382, 351, NULL, 1, NULL),
	(383, 351, NULL, 2, NULL),
	(384, 351, NULL, 3, NULL),
	(385, 351, NULL, 4, NULL),
	(386, 351, NULL, 5, NULL),
	(387, 351, NULL, 6, NULL),
	(388, 351, NULL, 7, NULL),
	(389, 351, NULL, 9, NULL),
	(390, 351, NULL, NULL, 1),
	(391, 351, NULL, NULL, 2),
	(392, 351, NULL, NULL, 4),
	(393, 351, NULL, NULL, 5),
	(394, 351, NULL, NULL, 6),
	(395, 351, NULL, NULL, 7),
	(396, 351, NULL, NULL, 8),
	(397, 351, NULL, NULL, 9),
	(398, 351, NULL, NULL, 11),
	(399, 351, NULL, NULL, 12),
	(400, 351, 2, NULL, NULL),
	(401, 351, 3, NULL, NULL),
	(402, 351, 5, NULL, NULL),
	(403, 351, 6, NULL, NULL),
	(404, 352, NULL, 1, NULL),
	(405, 352, NULL, 2, NULL),
	(406, 352, NULL, 3, NULL),
	(407, 352, NULL, 4, NULL),
	(408, 352, NULL, 5, NULL),
	(409, 352, NULL, 6, NULL),
	(410, 352, NULL, 7, NULL),
	(411, 352, NULL, 9, NULL),
	(412, 352, NULL, NULL, 1),
	(413, 352, NULL, NULL, 2),
	(414, 352, NULL, NULL, 4),
	(415, 352, NULL, NULL, 5),
	(416, 352, NULL, NULL, 6),
	(417, 352, NULL, NULL, 7),
	(418, 352, NULL, NULL, 8),
	(419, 352, NULL, NULL, 9),
	(420, 352, NULL, NULL, 11),
	(421, 352, NULL, NULL, 12),
	(422, 352, 2, NULL, NULL),
	(423, 352, 3, NULL, NULL),
	(424, 352, 5, NULL, NULL),
	(425, 352, 6, NULL, NULL),
	(426, 353, NULL, 1, NULL),
	(427, 353, NULL, 2, NULL),
	(428, 353, NULL, 3, NULL),
	(429, 353, NULL, 4, NULL),
	(430, 353, NULL, 5, NULL),
	(431, 353, NULL, 6, NULL),
	(432, 353, NULL, 7, NULL),
	(433, 353, NULL, 9, NULL),
	(434, 353, NULL, NULL, 1),
	(435, 353, NULL, NULL, 2),
	(436, 353, NULL, NULL, 4),
	(437, 353, NULL, NULL, 5),
	(438, 353, NULL, NULL, 6),
	(439, 353, NULL, NULL, 7),
	(440, 353, NULL, NULL, 8),
	(441, 353, NULL, NULL, 9),
	(442, 353, NULL, NULL, 11),
	(443, 353, NULL, NULL, 12),
	(444, 353, 2, NULL, NULL),
	(445, 353, 3, NULL, NULL),
	(446, 353, 5, NULL, NULL),
	(447, 353, 6, NULL, NULL),
	(448, 354, NULL, 1, NULL),
	(449, 354, NULL, 2, NULL),
	(450, 354, NULL, 3, NULL),
	(451, 354, NULL, 4, NULL),
	(452, 354, NULL, 5, NULL),
	(453, 354, NULL, 6, NULL),
	(454, 354, NULL, 7, NULL),
	(455, 354, NULL, 9, NULL),
	(456, 354, NULL, NULL, 1),
	(457, 354, NULL, NULL, 2),
	(458, 354, NULL, NULL, 4),
	(459, 354, NULL, NULL, 5),
	(460, 354, NULL, NULL, 6),
	(461, 354, NULL, NULL, 7),
	(462, 354, NULL, NULL, 8),
	(463, 354, NULL, NULL, 9),
	(464, 354, NULL, NULL, 11),
	(465, 354, NULL, NULL, 12),
	(466, 354, 2, NULL, NULL),
	(467, 354, 3, NULL, NULL),
	(468, 354, 5, NULL, NULL),
	(469, 354, 6, NULL, NULL);

-- Dumping structure for table project_001.place_img
CREATE TABLE IF NOT EXISTS `place_img` (
  `place_id` int NOT NULL AUTO_INCREMENT,
  `path` varchar(45) NOT NULL,
  `place_place_id` int NOT NULL,
  PRIMARY KEY (`place_id`),
  KEY `fk_product_img_place1_idx` (`place_place_id`),
  CONSTRAINT `fk_product_img_place1` FOREIGN KEY (`place_place_id`) REFERENCES `place` (`place_id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.place_img: ~28 rows (approximately)
INSERT INTO `place_img` (`place_id`, `path`, `place_place_id`) VALUES
	(84, '/upproduct//_0_65369dc58e870.jpeg', 349),
	(85, '/upproduct//_1_65369dc59132f.jpeg', 349),
	(86, '/upproduct//_2_65369dc591607.jpeg', 349),
	(87, '/upproduct//_3_65369dc5918d0.jpeg', 349),
	(88, '/upproduct//_0_65369dc58e870.jpeg', 350),
	(89, '/upproduct//_1_65369dc59132f.jpeg', 350),
	(90, '/upproduct//_2_65369dc591607.jpeg', 350),
	(91, '/upproduct//_3_65369dc5918d0.jpeg', 350),
	(92, '/upproduct//_0_65370cc626831.jpeg', 351),
	(93, '/upproduct//_1_65370cc62706b.jpeg', 351),
	(94, '/upproduct//_2_65370cc6272e1.jpeg', 351),
	(95, '/upproduct//_3_65370cc6275a0.jpeg', 351),
	(96, '/upproduct//_0_65370e87ae873.jpeg', 352),
	(97, '/upproduct//_1_65370e87aeaa3.jpeg', 352),
	(98, '/upproduct//_2_65370e87aecd8.jpeg', 352),
	(99, '/upproduct//_3_65370e87aee5d.jpeg', 352),
	(100, '/upproduct//_0_653f85e451106.jpeg', 353),
	(101, '/upproduct//_1_653f85e451a98.jpeg', 353),
	(102, '/upproduct//_2_653f85e451e1c.jpeg', 353),
	(103, '/upproduct//_3_653f85e452121.jpeg', 353),
	(104, '/upproduct//_0_6576ed7330286.jpeg', 354),
	(105, '/upproduct//_1_6576ed73309c2.jpeg', 354),
	(106, '/upproduct//_2_6576ed7330bcf.jpeg', 354),
	(107, '/upproduct//_3_6576ed7330e88.jpeg', 354),
	(108, '/upproduct//_0_665752816e27c.jpeg', 355),
	(109, '/upproduct//_1_6657528177fbe.jpeg', 355),
	(110, '/upproduct//_2_6657528178392.jpeg', 355),
	(111, '/upproduct//_3_66575281786a5.jpeg', 355);

-- Dumping structure for table project_001.place_type
CREATE TABLE IF NOT EXISTS `place_type` (
  `place_type_id` int NOT NULL AUTO_INCREMENT,
  `plc_type_name` varchar(50) NOT NULL,
  `plc_typprice` double NOT NULL,
  PRIMARY KEY (`place_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.place_type: ~4 rows (approximately)
INSERT INTO `place_type` (`place_type_id`, `plc_type_name`, `plc_typprice`) VALUES
	(1, 'An Entire Place', 700),
	(2, 'A Room', 700),
	(3, 'A Shared Room', 700),
	(4, 'A Couple Room', 700);

-- Dumping structure for table project_001.profile_img
CREATE TABLE IF NOT EXISTS `profile_img` (
  `profile_img_id` int NOT NULL AUTO_INCREMENT,
  `path` varchar(100) DEFAULT NULL,
  `customer_customer_id` int NOT NULL,
  PRIMARY KEY (`profile_img_id`),
  KEY `fk_profile_img_customer1_idx` (`customer_customer_id`),
  CONSTRAINT `fk_profile_img_customer1` FOREIGN KEY (`customer_customer_id`) REFERENCES `customer` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.profile_img: ~0 rows (approximately)
INSERT INTO `profile_img` (`profile_img_id`, `path`, `customer_customer_id`) VALUES
	(27, '/userimg//65369abbd4a18_Lakshan_.jpeg', 265);

-- Dumping structure for table project_001.safety_items
CREATE TABLE IF NOT EXISTS `safety_items` (
  `safety items_id` int NOT NULL AUTO_INCREMENT,
  `safety items_name` varchar(45) NOT NULL,
  `safety_itemprice` double NOT NULL,
  PRIMARY KEY (`safety items_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.safety_items: ~6 rows (approximately)
INSERT INTO `safety_items` (`safety items_id`, `safety items_name`, `safety_itemprice`) VALUES
	(1, 'Smoke alarm', 100),
	(2, 'First aid kit', 100),
	(3, 'Fire alarm', 100),
	(4, 'Security Room', 100),
	(5, 'Ambulance', 100),
	(6, 'Other', 100),
	(7, 'Body gurds', 1000);

-- Dumping structure for table project_001.sociel_media
CREATE TABLE IF NOT EXISTS `sociel_media` (
  `smedia_id` int NOT NULL AUTO_INCREMENT,
  `smedia_name` varchar(45) NOT NULL,
  `smedia_path` varchar(45) NOT NULL,
  PRIMARY KEY (`smedia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.sociel_media: ~0 rows (approximately)

-- Dumping structure for table project_001.standout_amenities
CREATE TABLE IF NOT EXISTS `standout_amenities` (
  `standout_amenities_id` int NOT NULL AUTO_INCREMENT,
  `standout_amenities_name` varchar(45) NOT NULL,
  `autstaprice` double DEFAULT NULL,
  PRIMARY KEY (`standout_amenities_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.standout_amenities: ~12 rows (approximately)
INSERT INTO `standout_amenities` (`standout_amenities_id`, `standout_amenities_name`, `autstaprice`) VALUES
	(1, 'Pool', 100),
	(2, 'Hot tub', 100),
	(3, 'Patio', 100),
	(4, 'BBQ grill', 100),
	(5, 'Dining area', 100),
	(6, 'Fire pit', 100),
	(7, 'Beach access', 100),
	(8, 'Lake access', 100),
	(9, 'Pool table', 100),
	(10, 'Outdoor Shower', 100),
	(11, 'Piano', 100),
	(12, 'GYM', 100);

-- Dumping structure for table project_001.status
CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int NOT NULL AUTO_INCREMENT,
  `status_name` varchar(45) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.status: ~2 rows (approximately)
INSERT INTO `status` (`status_id`, `status_name`) VALUES
	(1, 'Activated'),
	(2, 'Deactivated');

-- Dumping structure for table project_001.watchlist
CREATE TABLE IF NOT EXISTS `watchlist` (
  `watchlist_id` int NOT NULL AUTO_INCREMENT,
  `customer_customer_id` int NOT NULL,
  `place_place_id` int NOT NULL,
  PRIMARY KEY (`watchlist_id`),
  KEY `fk_watchlist_customer1_idx` (`customer_customer_id`),
  KEY `fk_watchlist_place1_idx` (`place_place_id`),
  CONSTRAINT `fk_watchlist_customer1` FOREIGN KEY (`customer_customer_id`) REFERENCES `customer` (`customer_id`),
  CONSTRAINT `fk_watchlist_place1` FOREIGN KEY (`place_place_id`) REFERENCES `place` (`place_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_001.watchlist: ~2 rows (approximately)
INSERT INTO `watchlist` (`watchlist_id`, `customer_customer_id`, `place_place_id`) VALUES
	(24, 265, 349),
	(25, 265, 351);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
