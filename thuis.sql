-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for mvc
CREATE DATABASE IF NOT EXISTS `mvc` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mvc`;

-- Dumping structure for table mvc.autos
CREATE TABLE IF NOT EXISTS `autos` (
  `auto_kenteken` varchar(8) NOT NULL,
  `auto_merk` varchar(50) DEFAULT NULL,
  `auto_type` varchar(50) DEFAULT NULL,
  `auto_prijs` double NOT NULL,
  `auto_beschrijving` text,
  PRIMARY KEY (`auto_kenteken`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mvc.autos: ~3 rows (approximately)
/*!40000 ALTER TABLE `autos` DISABLE KEYS */;
INSERT INTO `autos` (`auto_kenteken`, `auto_merk`, `auto_type`, `auto_prijs`, `auto_beschrijving`) VALUES
	('00-jms-7', 'bond', '007', 11, 'hihih'),
	('11-PO-TT', 'bmw', '730 (diesel v12)', 85, 'sportwagen'),
	('AA-BB-00', 'bmw', '099', 55, 'mooie blauwe bwm met snelle optrek'),
	('BB-AA-00', 'audi', 'a4', 110, 'grijze audi');
/*!40000 ALTER TABLE `autos` ENABLE KEYS */;

-- Dumping structure for table mvc.gebruiker
CREATE TABLE IF NOT EXISTS `gebruiker` (
  `gebruiker_id` int(11) NOT NULL AUTO_INCREMENT,
  `gebruiker_naam` varchar(50) NOT NULL,
  `gebruiker_email` varchar(50) NOT NULL,
  `gebruiker_wachtwoord` varchar(60) NOT NULL,
  `gebruiker_adres` varchar(50) NOT NULL,
  `gebruiker_postcode` varchar(50) NOT NULL,
  `gebruiker_plaats` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  UNIQUE KEY `Index 2` (`gebruiker_email`),
  KEY `Index 1` (`gebruiker_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table mvc.gebruiker: ~3 rows (approximately)
/*!40000 ALTER TABLE `gebruiker` DISABLE KEYS */;
INSERT INTO `gebruiker` (`gebruiker_id`, `gebruiker_naam`, `gebruiker_email`, `gebruiker_wachtwoord`, `gebruiker_adres`, `gebruiker_postcode`, `gebruiker_plaats`, `role_id`) VALUES
	(5, 'admin', 'admin@gmail.com', '$2y$10$E9Fc9K.yCU3butfW/4ugZ.PTV/9qZDjqg6bwLEsu1wWAVMuikrWbu', 'adminstraat 24', '1234 HI', 'Kantoor', 3),
	(3, 'gebruiker', 'gebruiker@gebruiker.nl', '$2y$10$S1PshA7TI5AKT5pwEF5RHe5b7Y3YcpKWzIDuru4Ofyagm75hr8HoC', 'gebruiker', 'gebruiker', 'gebruiker', 1),
	(1, 'Tim Hoenselaar', 'tim.hoenselaar@gmail.com', '$2y$10$Lkrxntx3iWBFgjCa4hJb.e6GuSWU7yU6W/ilnUGW/ue', 'Rijksvluchthaven 24', '6598 BM', 'Heijen', 1);
/*!40000 ALTER TABLE `gebruiker` ENABLE KEYS */;

-- Dumping structure for table mvc.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `factuurnummer` int(11) NOT NULL AUTO_INCREMENT,
  `orderdatum` date DEFAULT NULL,
  `medewerker_id` int(11) DEFAULT NULL,
  `klant_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`factuurnummer`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table mvc.orders: ~3 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`factuurnummer`, `orderdatum`, `medewerker_id`, `klant_id`) VALUES
	(8, '2016-12-20', 1, 1),
	(9, '2016-12-20', 2, 1),
	(10, '2016-12-20', 2, 2);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table mvc.reservering
CREATE TABLE IF NOT EXISTS `reservering` (
  `reservering_id` int(11) NOT NULL AUTO_INCREMENT,
  `auto_kenteken` varchar(8) NOT NULL,
  `factuurnummer` int(11) NOT NULL,
  `auto_gereserveerd_van` date DEFAULT NULL,
  `auto_gereserveerd_tot` date DEFAULT NULL,
  PRIMARY KEY (`reservering_id`),
  KEY `auto_kenteken` (`auto_kenteken`),
  KEY `factuurnummer` (`factuurnummer`),
  CONSTRAINT `FK_reservering_autos` FOREIGN KEY (`auto_kenteken`) REFERENCES `autos` (`auto_kenteken`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_reservering_orders` FOREIGN KEY (`factuurnummer`) REFERENCES `orders` (`factuurnummer`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table mvc.reservering: ~6 rows (approximately)
/*!40000 ALTER TABLE `reservering` DISABLE KEYS */;
INSERT INTO `reservering` (`reservering_id`, `auto_kenteken`, `factuurnummer`, `auto_gereserveerd_van`, `auto_gereserveerd_tot`) VALUES
	(1, 'AA-BB-00', 8, '2016-12-21', '2016-12-21'),
	(2, 'BB-AA-00', 9, '2016-12-20', '2016-12-21'),
	(3, 'AA-BB-00', 9, '2016-12-20', '2016-12-20'),
	(5, 'BB-AA-00', 10, '2016-12-20', '2016-12-20'),
	(6, '11-PO-TT', 10, '2016-12-20', '2016-12-20'),
	(7, 'AA-BB-00', 10, '2016-12-20', '2016-12-20');
/*!40000 ALTER TABLE `reservering` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
