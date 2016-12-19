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
  UNIQUE KEY `Index 1` (`auto_kenteken`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mvc.autos: ~2 rows (approximately)
/*!40000 ALTER TABLE `autos` DISABLE KEYS */;
INSERT INTO `autos` (`auto_kenteken`, `auto_merk`, `auto_type`, `auto_prijs`, `auto_beschrijving`) VALUES
	('AA-BB-00', 'test', 'test', 55, 'test beschrijving'),
	('BB-AA-00', 'test2', 'test2', 11, 'beschrijving testen');
/*!40000 ALTER TABLE `autos` ENABLE KEYS */;

-- Dumping structure for table mvc.klant
CREATE TABLE IF NOT EXISTS `klant` (
  `klant_id` int(11) NOT NULL,
  `klant_naam` varchar(50) NOT NULL,
  `klant_email` varchar(50) NOT NULL,
  `klant_wachtwoord` varchar(50) NOT NULL,
  `klant_adres` varchar(50) NOT NULL,
  `klant_postcode` varchar(50) NOT NULL,
  `klant_plaats` varchar(50) NOT NULL,
  PRIMARY KEY (`klant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mvc.klant: ~2 rows (approximately)
/*!40000 ALTER TABLE `klant` DISABLE KEYS */;
INSERT INTO `klant` (`klant_id`, `klant_naam`, `klant_email`, `klant_wachtwoord`, `klant_adres`, `klant_postcode`, `klant_plaats`) VALUES
	(0, 'test', 'test@gmail.com', '$2y$10$Lkrxntx3iWBFgjCa4hJb.e6GuSWU7yU6W/ilnUGW/ue', 'test', 'tes', 'test'),
	(1, 'Tim Hoenselaar', '', '', 'boot', '6598 BM', 'Heijen');
/*!40000 ALTER TABLE `klant` ENABLE KEYS */;

-- Dumping structure for table mvc.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `factuurnummer` int(11) NOT NULL AUTO_INCREMENT,
  `orderdatum` date DEFAULT NULL,
  `behandelaar` varchar(50) DEFAULT NULL,
  `klant_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`factuurnummer`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table mvc.orders: ~2 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`factuurnummer`, `orderdatum`, `behandelaar`, `klant_id`) VALUES
	(8, '2016-12-19', 'tim', 1),
	(9, '2016-12-19', 'tester', 1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table mvc.reservering
CREATE TABLE IF NOT EXISTS `reservering` (
  `factuurnummer` int(11) NOT NULL,
  `auto_kenteken` varchar(8) NOT NULL,
  `auto_gereserveerd_van` date DEFAULT NULL,
  `auto_gereserveerd_tot` date DEFAULT NULL,
  PRIMARY KEY (`factuurnummer`),
  UNIQUE KEY `Index 2` (`auto_kenteken`),
  CONSTRAINT `FK_reservering_autos` FOREIGN KEY (`auto_kenteken`) REFERENCES `autos` (`auto_kenteken`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_reservering_orders` FOREIGN KEY (`factuurnummer`) REFERENCES `orders` (`factuurnummer`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mvc.reservering: ~1 rows (approximately)
/*!40000 ALTER TABLE `reservering` DISABLE KEYS */;
INSERT INTO `reservering` (`factuurnummer`, `auto_kenteken`, `auto_gereserveerd_van`, `auto_gereserveerd_tot`) VALUES
	(8, 'AA-BB-00', '2016-12-19', '2017-12-19');
/*!40000 ALTER TABLE `reservering` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
