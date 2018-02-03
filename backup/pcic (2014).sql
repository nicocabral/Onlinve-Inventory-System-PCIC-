-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2016 at 08:03 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pcic`
--
CREATE DATABASE IF NOT EXISTS `pcic` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pcic`;

-- --------------------------------------------------------

--
-- Table structure for table `pcic_accounts`
--

CREATE TABLE IF NOT EXISTS `pcic_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `office` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pcic_accounts`
--

INSERT INTO `pcic_accounts` (`id`, `name`, `username`, `password`, `usertype`, `position`, `office`) VALUES
(1, 'Nico Cabral', 'nico', 'admin', 'admin', 'admin', 'AFD'),
(2, 'Juan Delacruz', 'juan', 'juan123', 'user', 'user', 'CAD'),
(3, 'Sample', 'sample', 'sample', 'user', 'Sample', 'MSD');

-- --------------------------------------------------------

--
-- Table structure for table `pcic_app`
--

CREATE TABLE IF NOT EXISTS `pcic_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemno` int(11) DEFAULT NULL,
  `itemnam` varchar(50) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `totalreq` int(11) DEFAULT NULL,
  `dep` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pcic_items`
--

CREATE TABLE IF NOT EXISTS `pcic_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemno` int(20) DEFAULT NULL,
  `item_name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `qty` varchar(20) DEFAULT NULL,
  `bal_qty` int(11) DEFAULT NULL,
  `specification` varchar(50) DEFAULT NULL,
  `unit_cost` varchar(50) DEFAULT NULL,
  `total_cost` varchar(50) DEFAULT NULL,
  `bal_totalcost` varchar(11) DEFAULT NULL,
  `date_arrival` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `itemno` (`itemno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=230 ;

--
-- Dumping data for table `pcic_items`
--

INSERT INTO `pcic_items` (`id`, `itemno`, `item_name`, `description`, `unit`, `qty`, `bal_qty`, `specification`, `unit_cost`, `total_cost`, `bal_totalcost`, `date_arrival`) VALUES
(13, 1, 'AIR FRESHENER', 'freshener', 'CAN', '3', 3, '280ml', '85.05', '255.15', '255.15', '2016-01-27'),
(14, 2, 'Alcohol', 'Ethyl', 'Bottle', '33', 33, '500ml 70% sol', '45.25', '1493.25', '1493.25', '2016-01-04'),
(15, 3, 'Ballpen', 'Faber castle', 'Piece', '180', 180, 'Black', '10', '1800.00', '1800.00', '2015-10-10'),
(16, 4, 'Ballpen', 'Faber Castle', 'Piece', '100', 100, 'Blue', '10', '1000.00', '1000.00', '2015-10-14'),
(17, 5, 'Ballpen', 'Faber Castle', 'Piece', '120', 120, 'Red', '10', '1200.00', '1200.00', '2015-10-14'),
(18, 6, 'Ballpen', 'HBW', 'Piece', '2', 2, 'Black', '7', '14.00', '14.00', '2015-10-13'),
(19, 7, 'Ballpen', 'HBW', 'Piece', '56', 56, 'Blue', '7', '392.00', '392.00', '2015-10-13'),
(20, 8, 'Ballpen', 'Ordinary', 'Piece', '200', 200, 'Black', '4.50', '900.00', '900.00', '2016-05-16'),
(21, 9, 'Ballpen', 'Ordinary', 'Piece', '100', 100, 'Blue', '4.50', '450.00', '450.00', '2016-05-13'),
(22, 10, 'Ballpen Classic', 'Panda', 'Piece', '100', 100, 'Blue', '5.10', '510.00', '510.00', '2016-03-11'),
(23, 11, 'Bundy Card', 'ER', 'PACK', '6', 6, 'Punch card', '250', '1500.00', '1500.00', '2016-01-04'),
(25, 13, 'Calculator', 'Canon', 'Piece', '3', 3, 'Calculator', '350', '1050.00', '1050.00', '2015-10-13'),
(28, 14, 'Calculator', 'Casio', 'Piece', '18', 18, 'Bussiness calculator', '300', '5400.00', '5400.00', '2015-09-14'),
(29, 15, 'Chalk', 'White', 'BOX', '1', 1, 'Enamel', '300', '300.00', '300.00', '2015-10-13'),
(30, 16, 'Clip Binder', 'easy', 'Box', '49', 49, '25mm small', '48', '2352.00', '2352.00', '2015-10-14'),
(31, 17, 'Clip Binder', 'Easy', 'Box', '28', 28, '51mm 2inches', '58', '1624.00', '1624.00', '2016-01-04'),
(32, 18, 'Clip Paper', 'Joy Vinyl', 'Box', '72', 72, '33mm', '46.15', '3322.80', '3322.80', '2016-01-04'),
(33, 19, 'Clip Paper', 'Jumbo Prine', 'Box', '35', 35, 'Jumbo', '14.20', '497.00', '497.00', '2016-01-04'),
(34, 20, 'Clip Spring', 'Joy', 'Box', '1', 1, 'Metal', '130', '130.00', '130.00', '2015-10-13'),
(35, 21, 'Columnar Book', 'columnar book', 'Piece', '10', 10, '10columns', '38', '380.00', '380.00', '2016-05-13'),
(36, 22, 'Correction Pen', 'joy', 'Piece', '81', 81, '8ml', '29', '2349.00', '2349.00', '2015-10-13'),
(37, 23, 'Correction Tape', 'Joy', 'Piece', '100', 100, '8ml,5m,6meter', '25', '2500.00', '2500.00', '2015-10-27'),
(38, 24, 'Dater', 'Binbin', 'Piece', '12', 12, 'Binbin', '35', '420.00', '420.00', '2015-10-13'),
(39, 25, 'Detergent', 'Powder Soap', 'POUCH', '15', 15, '1kg', '43.60', '654.00', '654.00', '2016-01-27'),
(40, 26, 'Desenfectant', 'Spray', 'CAN', '15', 15, '400gms', '42.5', '637.50', '637.50', '2016-03-11'),
(41, 27, 'Envelope', 'Coin', 'Box', '4', 4, 'Coin', '190', '760.00', '760.00', '2016-01-04'),
(42, 28, 'Envelop', 'Ordinary', 'Piece', '66', 66, 'Short, brown', '1.5', '99.00', '99.00', '2016-01-12'),
(43, 29, 'Envelope', 'Mailing, Classic', 'Box Piece', '15850', 15850, 'Long, White', '.38', '6023.00', '6023.00', '2015-10-13'),
(44, 30, 'Envelope', 'Expanding', 'Piece', '200', 200, 'Blue', '10.5', '2100.00', '2100.00', '2016-05-13'),
(45, 31, 'Envelope', 'Expanding', 'Piece', '100', 100, 'Brown', '8.80', '880.00', '880.00', '2016-01-01'),
(46, 32, 'Envelope', 'Expanding', 'Piece', '55', 55, 'RED', '12', '660.00', '660.00', '2016-01-04'),
(47, 33, 'Envelope', 'Expanding', 'Piece', '200', 200, 'Legal Size', '6.21', '1242.00', '1242.00', '2016-04-12'),
(48, 34, 'Eraser', 'Rubber', 'Piece', '15', 15, 'Steadler 3.00', '3', '45.00', '45.00', '2015-10-13'),
(49, 35, 'Fastener Paper', 'Prince Vinyl Coat', 'Box', '30', 30, 'Ordinary short', '38', '1140.00', '1140.00', '2015-10-27'),
(50, 36, 'Fastener Paper', 'Vinyl Coat', 'Box', '1', 1, 'Ordinary - TM', '21', '21.00', '21.00', '2015-10-13'),
(51, 37, 'Fastener Paper', 'Vinyl Coat', 'Box', '15', 15, 'Long - Brite', '68.55', '1028.25', '1028.25', '2015-10-13'),
(52, 38, 'Fastener Paper', 'Vinyl Coat', 'Box', '15', 15, 'Long Trio', '185', '2775.00', '2775.00', '2015-10-27'),
(53, 39, 'Fastener Paper', 'Vinyl Coat', 'Box', '9', 9, 'Safety-apple-metal', '75', '675.00', '675.00', '2015-10-13'),
(54, 40, 'Folder', 'File', 'Piece', '62', 62, 'Brown-A4', '5', '310.00', '310.00', '2015-10-13'),
(55, 41, 'Folder', 'File', 'Piece', '580', 580, 'Long - White', '6', '3480.00', '3480.00', '2015-10-13'),
(56, 42, 'Folder', 'File', 'Piece', '356', 356, 'Short - White', '5', '1780.00', '1780.00', '2015-10-13'),
(57, 43, 'Folder Sliding', 'Morocco', 'Piece', '34', 34, 'short ,Blue', '7', '238.00', '238.00', '2015-10-13'),
(58, 44, 'Folder Sliding', 'Morocco', 'Piece', '44', 44, 'Short, Green', '7', '308.00', '308.00', '2015-10-13'),
(59, 45, 'Folder Sliding', 'Morocco', 'Piece', '37', 37, 'Short, Red', '7', '259.00', '259.00', '2015-10-13'),
(60, 46, 'Folder Sliding', 'Morocco', 'Piece', '34', 34, 'Short, Yellow', '7', '238.00', '238.00', '2015-10-13'),
(61, 47, 'Glue', 'kippy white All purpose Glue', 'Jar', '20', 20, '300Grams', '51.25', '1025.00', '1025.00', '2015-10-07'),
(62, 48, 'Glue', 'Elmers', 'Bottle', '5', 5, 'All purpose', '42', '210.00', '210.00', '2015-10-24'),
(63, 49, 'Highlighter', 'Marvy', 'Pack', '8', 8, 'Green', '30', '240.00', '240.00', '2016-01-04'),
(64, 50, 'Highlighter', 'Marvy', 'Pack', '20', 20, 'Green', '35', '700.00', '700.00', '2016-05-06'),
(65, 51, 'Ink Hp Advcantage', '2515', 'Piece', '22', 22, 'Tri Color', '485', '10670.00', '10670.00', '2015-11-07'),
(66, 52, 'Ink Hp Advcantage', '2515', 'Piece', '5', 5, 'Black', '396', '1980.00', '1980.00', '2015-11-24'),
(67, 53, 'Ink Cartridge', 'Epson', 'Piece', '3', 3, 'Cyan', '385', '1155.00', '1155.00', '2016-01-04'),
(68, 54, 'Ink Cartridge', 'Epson', 'Piece', '3', 3, 'Magenta', '385', '1155.00', '1155.00', '2016-01-04'),
(69, 55, 'Ink Cartridge', 'Epson', 'Piece', '3', 3, 'Yellow', '385', '1155.00', '1155.00', '2016-01-04'),
(70, 56, 'Ink Printer Epson', 'T664', 'Bottle', '385', 385, 'Black', '30', '11550.00', '11550.00', '2015-10-27'),
(71, 57, 'Ink Printer', 'Epson T664', 'Bottle', '25', 25, 'Black', '390', '9750.00', '9750.00', '2016-03-11'),
(72, 58, 'Ink Cartridge', 'Epson', 'Bottle', '13', 13, 'T664, Cyan', '385', '5005.00', '5005.00', '2015-10-27'),
(73, 59, 'Ink Printer', 'Epson', 'Bottle', '12', 12, 'T664, Cyan', '390', '4680.00', '4680.00', '2016-03-11'),
(74, 60, 'Ink Printer', 'Epson', 'Bottle', '14', 14, 'T664, Magenta', '385', '5390.00', '5390.00', '2015-10-27'),
(75, 61, 'Ink Printer', 'Epson', 'Bottle', '16', 16, 'T664, Magenta', '390', '6240.00', '6240.00', '2016-03-11'),
(76, 62, 'Ink Printer', 'Epson', 'Bottle', '13', 13, 'T664, Yellow', '385', '5005.00', '5005.00', '2015-10-27'),
(77, 63, 'Ink Printer', 'Epson', 'Bottle', '12', 12, 'T664, Yellow', '390', '4680.00', '4680.00', '2016-03-11'),
(78, 64, 'Ink Stamping Pad', 'LCT', 'Bottle', '2', 2, '30ml', '15', '30.00', '30.00', '2016-01-04'),
(79, 65, 'Ink Stamping Pad', 'LCT', 'Bottle', '30', 30, '30ml', '30', '900.00', '900.00', '2016-01-11'),
(80, 66, 'Ink -RISO', 'KZ Type', 'Piece', '6', 6, 'KZ - 30 Black', '1148', '6888.00', '6888.00', '2016-04-19'),
(81, 67, 'Ledger', 'General Ledger', 'Piece', '26', 26, 'General Ledger', '12', '312.00', '312.00', '2016-01-04'),
(82, 68, 'Ledger', 'Equipment', 'Piece', '77', 77, 'Property Plant', '12', '924.00', '924.00', '2016-01-04'),
(83, 69, 'Stock Cards', 'Ledger', 'Piece', '366', 366, 'Ledger', '12', '4392.00', '4392.00', '2016-01-04'),
(84, 70, 'Marker Permanent', 'Baifa/Yoka', 'Bottle', '4', 4, 'Permanent Blue', '50', '200.00', '200.00', '2015-10-13'),
(85, 71, 'Marker Permanent', 'Yoka', 'Bottle', '10', 10, 'Permanent Blue', '13', '130.00', '130.00', '2015-11-07'),
(86, 72, 'Marker Permanent', 'Yoka', 'Bottle', '48', 48, 'Permanet Blue', '9.65', '463.20', '463.20', '2016-04-12'),
(90, 73, 'Marker Permanent', 'Beifa', 'Bottle', '8', 8, 'Permanent Blue', '13', '104.00', '104.00', '2015-10-13'),
(91, 74, 'Marker Permanent', 'Monami', 'Bottle', '13', 13, 'Permanent Red', '13', '169.00', '169.00', '2016-01-04'),
(92, 75, 'Marker Permanent', 'Supecy', 'Bottle', '8', 8, 'Permanent Black', '13', '104.00', '104.00', '2015-10-13'),
(93, 76, 'Marker Black', 'Permanent', 'Piece', '10', 10, 'Black', '12.75', '127.50', '127.50', '2015-10-13'),
(94, 77, 'Marker Black', 'Permanent', 'Piece', '48', 48, 'Black', '9.65', '463.20', '463.20', '2016-04-22'),
(95, 78, 'Marker Permanent', 'Pilot', 'Piece', '1', 1, 'Black', '25', '25.00', '25.00', '2015-10-25'),
(96, 79, 'Marker Permanent', 'Pilot', 'Piece', '9', 9, 'Red', '25', '225.00', '225.00', '2015-10-13'),
(97, 80, 'Marker WhiteBoard', 'Beifa', 'Piece', '11', 11, 'Black', '13', '143.00', '143.00', '2015-10-13'),
(98, 81, 'Marker WhiteBoard', 'Monami', 'Piece', '28', 28, 'Blue', '12.40', '347.20', '347.20', '2015-10-13'),
(99, 82, 'Marker WhiteBoard', 'Monami', 'Piece', '19', 19, 'Blue', '12.40', '235.6', '235.6', '2015-10-13'),
(100, 83, 'Master Roll', 'Flange F', 'Piece/Roll', '2', 2, 'RISO KZ 30', '1317', '2634.00', '2634.00', '2016-04-19'),
(101, 84, 'Marker WhiteBoard', 'Monami', 'Piece', '16', 16, 'Blue', '13', '208.00', '208.00', '2015-10-13'),
(102, 85, 'Notebook Writing', 'Vanda - Spiral', 'Book', '50', 50, '90 lvs', '38', '1900.00', '1900.00', '2015-10-27'),
(103, 86, 'Notebook - Stenographer', 'Steno', 'Piece', '100', 100, '40 lvs', '14', '1400.00', '1400.00', '2016-03-16'),
(104, 87, 'Bondpaper', 'Book/Bond', 'REAM', '200', 200, 'A4 - PPC', '111.35', '22270.00', '22270.00', '2016-04-12'),
(105, 88, 'Bondpaper', 'Eagle Multi Copy', 'REAM', '202', 202, 'A4 60gsm/S-20', '123.50', '24947.00', '24947.00', '2015-10-07'),
(106, 89, 'Bondpaper', 'Eagle Multi Copy', 'REAM', '50', 50, 'A4 60gsm / S-20', '110.95', '5547.50', '5547.50', '2016-01-27'),
(108, 90, 'Bondpaper', 'Book/Bond', 'REAM', '150', 150, 'PPC - Legal', '125', '18750.00', '18750.00', '2016-04-12'),
(109, 91, 'Bondpaper', 'Book/Bond', 'REAM', '10', 10, 'PPC - Legal', '150', '1500.00', '1500.00', '2016-06-10'),
(110, 92, 'Bondpaper', 'Book/Bond', 'REAM', '100', 100, 'Multicopy Eagle Legal', '138.40', '13840.00', '13840.00', '2015-10-07'),
(111, 93, 'Bondpaper', 'Book/Bond', 'REAM', '100', 100, 'Multicopy Eagle - Legal', '138.40', '13840.00', '13840.00', '2016-02-10'),
(112, 94, 'Bondpaper', 'Book/Bond', 'REAM', '19', 19, '999Special - Legal', '123', '2337.00', '2337.00', '2015-10-13'),
(113, 95, 'Bondpaper', 'Bond', 'REAM', '24', 24, 'Yes/Paperone Legal - 70gsm/S 21', '200', '4800.00', '4800.00', '2015-10-13'),
(114, 96, 'Paper Carbon', 'Film', 'Box', '19', 19, 'Black', '300', '5700.00', '5700.00', '2015-10-13'),
(115, 97, 'Paper Stationary', 'Witla PCIC', 'Piece', '10', 10, 'letter head', '150', '1500.00', '1500.00', '2015-10-13'),
(116, 98, 'Paper Tissue', 'Tissue', 'ROLL', '57', 57, 'ECO - 2ply', '75.1', '4280.70', '4280.70', '2015-10-13'),
(117, 99, 'Pencil', 'Mongol', 'Piece', '12', 12, 'Mongol', '5', '60.00', '60.00', '2015-10-13'),
(118, 100, 'Pencil', 'Bright', 'Piece', '56', 56, 'Bright', '4', '224.00', '224.00', '2015-10-13'),
(119, 101, 'Pins (Hammerhead)', 'pin', 'Box', '1', 1, 'pin', '120', '120.00', '120.00', '2015-10-13'),
(120, 102, 'Pins (MAP)', 'map', 'Piece', '1', 1, 'map', '120', '120.00', '120.00', '2015-10-13'),
(121, 103, 'Pins (Push)', 'pins', 'Piece', '1', 1, 'pins', '120', '120.00', '120.00', '2015-10-13'),
(122, 104, 'Puncher', 'Joy', 'Piece', '9', 9, '70mm', '150', '1350.00', '1350.00', '2015-10-13'),
(123, 105, 'Record Book', 'Book', 'Book', '56', 56, 'MO Office Products', '63.25', '3542.00', '3542.00', '2015-10-07'),
(124, 106, 'Ribbon', 'Bundy Card', 'Piece', '5', 5, 'Max Er 1500', '800', '4000.00', '4000.00', '2014-09-14'),
(125, 107, 'Ribbon Cartridge', 'Epson', 'Piece', '11', 11, 'SD16 / #8750 17.7 m /58 ft LX 300', '130', '1430.00', '1430.00', '2015-01-14'),
(126, 108, 'Rubber band', 'Rubber', 'Box', '1', 1, 'All purpose natural', '300', '300.00', '300.00', '2015-10-27'),
(127, 109, 'Rubber band', 'Rubber', 'Box', '10', 10, 'All purpose natural', '110.95', '1109.50', '1109.50', '2016-01-22'),
(128, 110, 'Rubber band (M.O)', 'Rubber', 'Box', '11', 11, 'M.O', '20', '220.00', '220.00', '2015-10-13'),
(129, 111, 'Ruler Plastic', 'Prince', 'Piece', '6', 6, '12 inches', '6', '36.00', '36.00', '2015-10-10'),
(130, 112, 'Ruler', 'Plastic', 'Piece', '12', 12, '18 inches', '16.35', '196.20', '196.20', '2016-01-27'),
(131, 113, 'Scissor', 'scissor', 'Piece', '3', 3, 'scissor', '25', '75.00', '75.00', '2015-10-13'),
(132, 114, 'Scissor', 'S', 'Piece', '20', 20, 'S', '45', '900.00', '900.00', '2016-03-11'),
(133, 115, 'Scoring Pad', 'Scoth brite', 'Pack/Pieces', '50', 50, 'Economy size(140mmx220mm)', '25.07', '1253.50', '1253.50', '2016-01-27'),
(134, 116, 'Signpen', 'Dong - A myGel', 'Piece', '6', 6, 'Black 0.5mm', '18', '108.00', '108.00', '2015-10-25'),
(135, 117, 'Signpen', 'Dong - A', 'Piece', '20', 20, 'Blue', '21', '420.00', '420.00', '2016-03-11'),
(136, 118, 'Signpen', 'Dong - A', 'Piece', '26', 26, 'Green', '18', '468.00', '468.00', '2015-10-13'),
(137, 119, 'Signpen Dong - A', 'Refilable', 'Piece', '48', 48, 'Red', '19', '912.00', '912.00', '2016-05-13'),
(138, 120, 'Signpen Pentel', 'Energel', 'Piece', '8', 8, '0.5mm Black', '46.15', '369.20', '369.20', '2015-10-13'),
(139, 121, 'Signpen Pentel', 'Energel', 'Piece', '48', 48, '0.5mm Blue', '46.15', '2215.20', '2215.20', '2015-10-07'),
(140, 122, 'Signpen Refill', 'Dong - A', 'Piece', '136', 136, 'Black', '6', '816.00', '816.00', '2016-01-04'),
(141, 123, 'Signpen Refill', 'Dong - A', 'Piece', '125', 125, 'Blue', '6', '750.00', '750.00', '2016-01-04'),
(142, 124, 'Signpen Refill', 'Dong - A', 'Piece', '72', 72, 'Green', '19', '1368.00', '1368.00', '2016-05-13'),
(143, 125, 'Signpen Refill', 'Dong - A', 'Piece', '72', 72, 'Red', '19', '1368.00', '1368.00', '2016-05-13'),
(144, 126, 'Specialty board', 'Apple Green', 'Pack', '250', 250, 'Long', '35', '8750.00', '8750.00', '2016-05-13'),
(145, 127, 'Stamp pad', 'joy', 'Piece', '24', 24, 'sp', '25', '600.00', '600.00', '2015-10-13'),
(146, 128, 'Stapler', 'Max HD10', 'Piece', '18', 18, 'Small', '55', '990.00', '990.00', '2015-10-27'),
(147, 129, 'Stapler', 'Max', 'Piece', '11', 11, 'Big', '250', '2750.00', '2750.00', '2015-10-13'),
(148, 130, 'Staple Wire', 'max', 'Box', '114', 114, 'No.10', '5', '570.00', '570.00', '2016-10-13'),
(149, 131, 'Staple Wire', 'MPC', 'Box', '60', 60, 'No.35', '25', '1500.00', '1500.00', '2016-10-13'),
(150, 132, 'Tape Dispenser', 'Heavy duty', 'Piece', '3', 3, '24mm(1 inches)', '50', '150.00', '150.00', '2016-01-27'),
(151, 133, 'Tape Packaging', 'Tape', 'Roll', '22', 22, 'No.2 48mm 2 inches', '34.90', '767.80', '767.80', '2015-10-07'),
(152, 134, 'Tape Trasnparent', 'Tape', 'Roll', '40', 40, 'no.1 24 mm', '18.20', '728.00', '728.00', '2015-10-07'),
(153, 135, 'Tape Scotch', 'Transparent', 'Roll', '20', 20, 'no.2 48mm', '34.90', '698.00', '698.00', '2016-01-27'),
(154, 136, 'Tape Masking', 'Tape', 'Roll', '10', 10, 'no.1 24mm', '57.80', '578.00', '578.00', '2015-10-07'),
(155, 137, 'Tape Masking no.2', 'Tape', 'Roll', '17', 17, '45 mm', '107.95', '1835.15', '1835.15', '2015-10-13'),
(156, 138, 'Toilet Bowl & urinal Cleaner', 'Aerosol', 'Bottle', '6', 6, '500ml', '165', '990.00', '990.00', '2016-03-10'),
(157, 139, 'Toilet Deodorant Cake', 'cake 99%', 'Box', '15', 15, '50grms', '26.20', '393.00', '393.00', '2016-01-27'),
(158, 140, 'Trashbag', 'Plastic', 'Roll', '20', 20, 'Black 40 lenght,width 18,5', '151.35', '3027.00', '3027.00', '2016-01-27'),
(159, 141, 'HP Deskjet 2515', 'Printer', 'Piece', '1', 1, 'Deskjet 2515', '3733', '3733.00', '3733.00', '2014-03-18'),
(160, 142, 'Stand Fan', 'Fan', 'unit', '1', 1, 'Standard', '1750', '1750.00', '1750.00', '2014-04-02'),
(161, 143, 'Bond paper', 'Book/Bond', 'REAMS', '100', 100, 'A4 S-20', '107.35', '10735.00', '10735.00', '2014-04-25'),
(162, 144, 'Bond Paper', 'Book/Bond', 'REAMS', '100', 100, 'Long S-21', '116.6', '11660.00', '11660.00', '2014-04-25'),
(163, 145, 'Battery', 'Energizer', 'Doz', '3', 3, 'AA', '20.15', '60.45', '60.45', '2014-04-25'),
(164, 146, 'Alcohol', 'Ethyl', 'Bottle', '12', 12, '70% sol', '40.10', '481.20', '481.20', '2014-04-25'),
(165, 147, 'Film carbon paper', 'Gold Inernational', 'Boxes', '5', 5, 'Legal - Black', '304.85', '1524.25', '1524.25', '2014-04-25'),
(166, 148, 'Floor MOP', 'Scotch brite', 'Piece', '2', 2, 'scouring pad', '123', '246.00', '246.00', '2014-04-25'),
(167, 149, 'Masking Tape 2', 'mt', 'Piece', '12', 12, 'mt 2inches', '107.95', '1295.40', '1295.40', '2014-04-25'),
(168, 150, 'Nylon Straw', 'Twine', 'Piece', '2', 2, 'nylon', '47.85', '95.70', '95.70', '2014-04-25'),
(169, 151, 'Official Record Book', 'Book', 'Piece', '24', 24, '300  Pages', '54.50', '1308.00', '1308.00', '2014-04-25'),
(170, 152, 'Paper Clip', 'clip', 'Doz', '3', 3, 'Jumbo', '12.85', '38.55', '38.55', '2014-04-25'),
(171, 153, 'Paper Fastener', 'fastener', 'Boxes', '3', 3, 'pf', '68.55', '205.65', '205.65', '2014-04-25'),
(172, 154, 'Pencil', 'Mongol', 'Doz', '3', 3, '2', '25', '75.00', '75.00', '2014-04-25'),
(173, 155, 'Pentel Pen', 'Pilot', 'Piece', '12', 12, 'Black', '12.75', '153.00', '153.00', '2014-04-25'),
(174, 156, 'Pentel Pen', 'Pilot', 'Piece', '12', 12, 'Blue', '12.75', '153.00', '153.00', '2014-04-25'),
(175, 157, 'Packing Tape', 'pt', 'Piece', '12', 12, '2 inches', '34.90', '418.80', '418.80', '2014-04-25'),
(176, 158, 'Ruler', 'Plastic', 'Piece', '12', 12, '12inches', '3.30', '39.60', '39.60', '2014-04-25'),
(177, 159, 'Scissor', 'sc', 'Piece', '3', 3, 'sc', '16.35', '49.05', '49.05', '2014-04-25'),
(178, 160, 'Scotch tape 1', 'st', '12', '12', 12, '1 Inches', '18.20', '218.40', '218.40', '2014-04-25'),
(179, 161, 'Soap', 'Detergent Powder', 'Pack', '12', 12, '1kg', '26.20', '314.40', '314.40', '2014-04-25'),
(180, 162, 'Tissue', 'Paper', 'Piece', '12', 12, '2ply', '76.10', '913.20', '913.20', '2014-04-25'),
(181, 163, 'Typewriter', 'Ribbon', 'Piece', '12', 12, 'Ribbon', '19.90', '238.80', '238.80', '2014-04-25'),
(182, 164, 'Yellow pad', 'yp', 'Pads', '2', 2, 'yp', '18.35', '36.70', '36.70', '2014-04-25'),
(183, 165, 'Printer Canon Class MF 3010', 'canon', 'unit', '1', 1, 'MF 3010', '3710', '3710.00', '3710.00', '2014-05-19'),
(184, 166, 'Office Table Model No. JIT-F48', 'table', 'Unit', '3', 3, 'Wenge', '2395', '7185.00', '7185.00', '2014-05-29'),
(185, 167, 'Office Chair W/Arm MODEL:STM10017703', 'Chair', 'Unit', '3', 3, 'Black', '1795', '5385.00', '5385.00', '2014-05-29'),
(186, 168, 'Plastic Chair', 'Chair', 'Unit', '6', 6, 'Cofta Green', '495', '2970.00', '2970.00', '2014-05-29'),
(187, 169, 'Office Table', 'Table', 'unit', '3', 3, 'ot', '1500', '4500.00', '4500.00', '2014-03-14'),
(188, 170, 'Swivel Chair', 'Chair', 'Unit', '3', 3, 'sc', '1500', '4500.00', '4500.00', '2014-03-26'),
(189, 171, 'Monoblock Chair', 'Chair', 'Piece', '2', 2, 'mbc', '365', '730.00', '730.00', '2014-03-26'),
(190, 172, '3 Layer File Cabinet', 'Cabinet', 'Unit', '1', 1, 'lfc', '2600', '2600.00', '2600.00', '2014-03-26'),
(191, 173, 'Office Table', 'Table', 'Unit', '2', 2, 'ot', '3700', '7400.00', '7400.00', '2014-04-02'),
(192, 174, 'Chair', 'c', 'Piece', '2', 2, 'c', '400', '800.00', '800.00', '2014-04-02'),
(193, 175, 'Cofta bench/lounge Chair', 'chair', 'Unit', '1', 1, 'cb/lc', '3250', '3250.00', '3250.00', '2014-04-02'),
(194, 176, '4 Layer Cabinet File Cabinet', 'Cabinet', 'Unit', '1', 1, '4 Layer', '2150', '2150.00', '2150.00', '2014-04-02'),
(195, 177, 'Office Table', 'Table', 'Piece', '3', 3, 'ot', '1687', '5061.00', '5061.00', '2014-04-02'),
(196, 178, 'Office Chair', 'oc', 'Piece', '3', 3, 'oc', '1433', '4299.00', '4299.00', '2014-04-02'),
(197, 179, 'Loveseat', 'seat', 'Piece', '2', 2, 'ls', '1100', '2200.00', '2200.00', '2014-04-02'),
(198, 180, 'Storage Box', 'sb', 'Piece', '1', 1, '4 Layer', '4155', '4155.00', '4155.00', '2014-04-02'),
(199, 181, 'Cabinet (Divider type)', 'cabinet', 'Piece', '1', 1, 'divider type', '3800', '3800.00', '3800.00', '2014-08-28'),
(200, 182, 'Monoblock Chair', 'Chair', 'Piece', '3', 3, 'mc', '390', '1170.00', '1170.00', '2014-08-27'),
(201, 183, 'Table(JIT - F48; Color: Wenge)', 'Table', 'Piece', '3', 3, 'Wenge', '2395', '7185.00', '7185.00', '2014-08-29'),
(202, 184, 'Chair (with Arm, Color : Black)', 'Chair', 'Piece', '3', 3, 'Black', '1795', '5385.00', '5385.00', '2014-08-27'),
(203, 185, 'Cofta Monoblock Chairs (color:White)', 'chair', 'Piece', '6', 6, 'White', '495', '2970.00', '2970.00', '2014-08-27'),
(204, 186, 'Electric Fan (Hanabishi Stand Fan)', 'Hanabishi', 'Piece', '1', 1, 'Stand Fan', '1795', '1795.00', '1795.00', '2014-08-27'),
(205, 187, 'Brown Envelope', 'envelope', 'Piece', '100', 100, 'Long', '1.80', '180', '180', '2014-09-09'),
(206, 188, 'Brown Envelope', 'Envelope', 'Piece', '100', 100, 'Short', '1.50', '150.00', '150.00', '2014-09-09'),
(207, 189, 'Bundy Card Ribbon Max(ER1500)', 'ribbon', 'Piece', '5', 5, 'Max(ER1500)', '800', '4000.00', '4000.00', '2014-09-09'),
(208, 190, 'Expanding Envelope', 'envelope', 'Piece', '150', 150, 'Green', '12', '1800.00', '1800.00', '2014-09-09'),
(209, 191, 'Expanding Envelope', 'envelope', 'Piece', '150', 150, 'Red', '12', '1800.00', '1800.00', '2014-09-09'),
(210, 192, 'Folder Long 14 PTS', 'folder', 'Pack', '10', 10, 'Long 14 PTS', '400', '4000.00', '4000.00', '2014-09-09'),
(211, 193, 'HP Ink Advantage 2515 Black', 'Ink', 'Piece', '10', 10, 'Black', '396', '3960.00', '3960.00', '2014-09-09'),
(212, 194, 'HP Ink Advantage 2515 Colored', 'Ink', 'Piece', '10', 10, 'Colored', '396', '3960.00', '3960.00', '2014-09-09'),
(213, 195, 'HP Ink Deskjet 1515 Black', 'Ink', 'Piece', '10', 10, 'Black', '396', '3960.00', '3960.00', '2014-09-09'),
(214, 196, 'HP Ink Deskjet 1515 Colored', 'Ink', 'Piece', '10', 10, 'Colored', '396', '3960.00', '3960.00', '2014-09-09'),
(215, 197, 'Max Heavy Duty puncher', 'puncher', 'Piece', '8', 8, 'heavy duty', '150', '1200.00', '1200.00', '2014-09-09'),
(216, 198, 'Max Stapler Big', 'stapler', 'Piece', '8', 8, 'Big', '265', '2120.00', '2120.00', '2014-09-09'),
(217, 199, 'My Gel Pen Refill - Black', 'Refill', 'Doz', '10', 10, 'Black', '180', '1800.00', '1800.00', '2014-09-09'),
(218, 200, 'Max Stapler Small', 'Stapler', 'Piece', '15', 15, 'Small', '55', '825.00', '825.00', '2014-09-09'),
(219, 201, 'My Gel Pen Refill - Blue', 'Pen Refill', 'Doz', '10', 10, 'Blue', '180', '1800.00', '1800.00', '2014-09-09'),
(220, 202, 'Casio Bussiness Calculator(12 Digit)', 'Casio', 'Piece', '18', 18, '12 Digit Calculator', '300', '5400.00', '5400.00', '2014-09-09'),
(221, 203, 'Paper Clip Jumbo', 'clip', 'Box', '30', 30, 'Jumbo', '18', '540.00', '540.00', '2014-09-09'),
(222, 204, 'Plastic Ruler (Transparent)', 'Ruler', 'Piece', '30', 30, 'Transparent', '18', '540', '540', '2014-09-09'),
(223, 205, 'Plastic Envelope', 'envelope', 'doz', '3', 3, 'plastic', '90', '270.00', '270.00', '2014-09-09'),
(224, 206, 'Office tables (Desk w/ Drawers)', 'Tables', 'Piece', '2', 2, 'desk w/ drawers', '3600', '7200.00', '7200.00', '2014-09-19'),
(225, 207, 'Electric fan - Standard 16 inches Stainless Model', 'Fan', 'Piece', '1', 1, 'Stainless', '1700', '1700.00', '1700.00', '2014-09-23'),
(226, 208, 'Cabinet Divider', 'cabinet', 'Unit', '1', 1, 'cd', '5395', '5395.00', '5395.00', '2014-09-23'),
(227, 209, 'Stocking Chair', 'chair', 'Piece', '5', 5, 'Black', '420', '2100.00', '2100.00', '2014-09-23'),
(228, 210, 'UPS', 'Battery', 'Piece', '6', 6, 'Backup', '1216.67', '7300.02', '7300.02', '2014-09-13'),
(229, 211, 'Computer Software', 'computer os', 'Piece', '6', 6, 'cs', '8323.34', '49940.04', '49940.04', '2014-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `pcic_purchase`
--

CREATE TABLE IF NOT EXISTS `pcic_purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_itemname` varchar(50) DEFAULT NULL,
  `p_qty` int(11) DEFAULT NULL,
  `p_cost` float DEFAULT NULL,
  `p_tcost` float DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pcic_purchase`
--

INSERT INTO `pcic_purchase` (`id`, `p_itemname`, `p_qty`, `p_cost`, `p_tcost`, `p_date`) VALUES
(1, 'asdsda', 1, 1, 1, '2016-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `pcic_reqpurpose`
--

CREATE TABLE IF NOT EXISTS `pcic_reqpurpose` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(30) DEFAULT NULL,
  `office` varchar(20) DEFAULT NULL,
  `purpose` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pcic_requestitem`
--

CREATE TABLE IF NOT EXISTS `pcic_requestitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemno` int(11) DEFAULT NULL,
  `itemname` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `specicfication` varchar(50) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `ucost` varchar(30) DEFAULT NULL,
  `tcots` varchar(30) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `office` varchar(50) DEFAULT NULL,
  `purpose` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `requested_by` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pcic_stockcard`
--

CREATE TABLE IF NOT EXISTS `pcic_stockcard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stockno` int(11) DEFAULT NULL,
  `stockitemname` varchar(50) DEFAULT NULL,
  `stockdescription` varchar(50) DEFAULT NULL,
  `stockunit` varchar(30) DEFAULT NULL,
  `date_recieved` date DEFAULT NULL,
  `recieved_qty` int(11) DEFAULT NULL,
  `recieved_cost` float DEFAULT NULL,
  `recievedtotalcost` float DEFAULT NULL,
  `issueddep` varchar(40) DEFAULT NULL,
  `issuedqty` int(11) DEFAULT NULL,
  `issuedcost` float DEFAULT NULL,
  `issuedtotalcost` float DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `stockendbal` int(11) DEFAULT NULL,
  `stockcost` float DEFAULT NULL,
  `stocktotalcost` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=253 ;

--
-- Dumping data for table `pcic_stockcard`
--

INSERT INTO `pcic_stockcard` (`id`, `stockno`, `stockitemname`, `stockdescription`, `stockunit`, `date_recieved`, `recieved_qty`, `recieved_cost`, `recievedtotalcost`, `issueddep`, `issuedqty`, `issuedcost`, `issuedtotalcost`, `status`, `stockendbal`, `stockcost`, `stocktotalcost`, `date`) VALUES
(37, 1, 'AIR FRESHENER', 'freshener', 'CAN', '2016-07-14', 3, 85.05, 255.15, NULL, NULL, NULL, NULL, 'Updated', 3, 85.05, 255.15, '2016-01-27'),
(38, 2, 'Alcohol', 'Ethyl', 'Bottle', '2016-07-14', 33, 45.25, 1493.25, NULL, NULL, NULL, NULL, 'Updated', 33, 45.25, 1493.25, '2016-01-04'),
(39, 3, 'Ballpen', 'Faber castle', 'Piece', '2016-07-14', 180, 10, 1800, NULL, NULL, NULL, NULL, 'Updated', 180, 10, 1800, '2015-10-10'),
(40, 4, 'Ballpen', 'Faber Castle', 'Piece', '2016-07-14', 100, 10, 1000, NULL, NULL, NULL, NULL, 'Updated', 100, 10, 1000, '2015-10-14'),
(41, 5, 'Ballpen', 'Faber Castle', 'Piece', '2016-07-14', 120, 10, 1200, NULL, NULL, NULL, NULL, 'Updated', 120, 10, 1200, '2015-10-14'),
(42, 6, 'Ballpen', 'HBW', 'Piece', '2016-07-14', 2, 7, 14, NULL, NULL, NULL, NULL, 'Updated', 2, 7, 14, '2015-10-13'),
(43, 7, 'Ballpen', 'HBW', 'Piece', '2016-07-14', 56, 7, 392, NULL, NULL, NULL, NULL, 'Updated', 56, 7, 392, '2015-10-13'),
(44, 8, 'Ballpen', 'Ordinary', 'Piece', '2016-07-14', 200, 4.5, 900, NULL, NULL, NULL, NULL, 'Updated', 200, 4.5, 900, '2016-05-16'),
(45, 9, 'Ballpen', 'Ordinary', 'Piece', '2016-07-14', 100, 4.5, 450, NULL, NULL, NULL, NULL, 'Updated', 100, 4.5, 450, '2016-05-13'),
(46, 10, 'Ballpen Classic', 'Panda', 'Piece', '2016-07-14', 100, 5.1, 510, NULL, NULL, NULL, NULL, 'Updated', 100, 5.1, 510, '2016-03-11'),
(47, 11, 'Bundy Card', 'ER', 'PACK', '2016-07-14', 6, 250, 1500, NULL, NULL, NULL, NULL, 'Updated', 6, 250, 1500, '2016-01-04'),
(48, 12, 'Calculator', 'Canon', 'Piece', '2016-07-14', 3, 350, 1050, NULL, NULL, NULL, NULL, 'Updated', 3, 350, 1050, '0005-10-13'),
(49, 13, 'Calculator', 'Canon', 'Piece', '2016-07-14', 3, 350, 1050, NULL, NULL, NULL, NULL, 'Updated', 3, 350, 1050, '2015-10-13'),
(50, 14, 'Calculator', 'Casio', 'Piece', '2016-07-14', 18, 300, 5400, NULL, NULL, NULL, NULL, 'Updated', 18, 300, 5400, '2015-09-14'),
(51, 15, 'Chalk', 'White', 'BOX', '2016-07-14', 1, 300, 300, NULL, NULL, NULL, NULL, 'Updated', 1, 300, 300, '2015-10-13'),
(52, 16, 'Clip Binder', 'easy', 'Box', '2016-07-14', 49, 48, 2352, NULL, NULL, NULL, NULL, 'Updated', 49, 48, 2352, '2015-10-14'),
(53, 17, 'Clip Binder', 'Easy', 'Box', '2016-07-14', 28, 58, 1624, NULL, NULL, NULL, NULL, 'Updated', 28, 58, 1624, '2016-01-04'),
(54, 18, 'Clip Paper', 'Joy Vinyl', 'Box', '2016-07-14', 72, 46.15, 3322.8, NULL, NULL, NULL, NULL, 'Updated', 72, 46.15, 3322.8, '2016-01-04'),
(55, 19, 'Clip Paper', 'Jumbo Prine', 'Box', '2016-07-14', 35, 14.2, 497, NULL, NULL, NULL, NULL, 'Updated', 35, 14.2, 497, '2016-01-04'),
(56, 20, 'Clip Spring', 'Joy', 'Box', '2016-07-14', 1, 130, 130, NULL, NULL, NULL, NULL, 'Updated', 1, 130, 130, '2015-10-13'),
(57, 21, 'Columnar Book', 'columnar book', 'Piece', '2016-07-14', 10, 38, 380, NULL, NULL, NULL, NULL, 'Updated', 10, 38, 380, '2016-05-13'),
(58, 22, 'Correction Pen', 'joy', 'Piece', '2016-07-14', 81, 29, 2349, NULL, NULL, NULL, NULL, 'Updated', 81, 29, 2349, '2015-10-13'),
(59, 23, 'Correction Tape', 'Joy', 'Piece', '2016-07-14', 100, 25, 2500, NULL, NULL, NULL, NULL, 'Updated', 100, 25, 2500, '2015-10-27'),
(60, 24, 'Dater', 'Binbin', 'Piece', '2016-07-14', 12, 35, 420, NULL, NULL, NULL, NULL, 'Updated', 12, 35, 420, '2015-10-13'),
(61, 25, 'Detergent', 'Powder Soap', 'POUCH', '2016-07-14', 15, 43.6, 654, NULL, NULL, NULL, NULL, 'Updated', 15, 43.6, 654, '2016-01-27'),
(62, 26, 'Desenfectant', 'Spray', 'CAN', '2016-07-14', 15, 42.5, 637.5, NULL, NULL, NULL, NULL, 'Updated', 15, 42.5, 637.5, '2016-03-11'),
(63, 27, 'Envelope', 'Coin', 'Box', '2016-07-14', 4, 190, 760, NULL, NULL, NULL, NULL, 'Updated', 4, 190, 760, '2016-01-04'),
(64, 28, 'Envelop', 'Ordinary', 'Piece', '2016-07-14', 66, 1.5, 99, NULL, NULL, NULL, NULL, 'Updated', 66, 1.5, 99, '2016-01-12'),
(65, 29, 'Envelope', 'Mailing, Classic', 'Box Piece', '2016-07-14', 15850, 0.38, 6023, NULL, NULL, NULL, NULL, 'Updated', 15850, 0.38, 6023, '2015-10-13'),
(66, 30, 'Envelope', 'Expanding', 'Piece', '2016-07-14', 200, 10.5, 2100, NULL, NULL, NULL, NULL, 'Updated', 200, 10.5, 2100, '2016-05-13'),
(67, 31, 'Envelope', 'Expanding', 'Piece', '2016-07-14', 100, 8.8, 880, NULL, NULL, NULL, NULL, 'Updated', 100, 8.8, 880, '2016-01-01'),
(68, 32, 'Envelope', 'Expanding', 'Piece', '2016-07-14', 55, 12, 660, NULL, NULL, NULL, NULL, 'Updated', 55, 12, 660, '2016-01-04'),
(69, 33, 'Envelope', 'Expanding', 'Piece', '2016-07-14', 200, 6.21, 1242, NULL, NULL, NULL, NULL, 'Updated', 200, 6.21, 1242, '2016-04-12'),
(70, 34, 'Eraser', 'Rubber', 'Piece', '2016-07-14', 15, 3, 45, NULL, NULL, NULL, NULL, 'Updated', 15, 3, 45, '2015-10-13'),
(71, 35, 'Fastener Paper', 'Prince Vinyl Coat', 'Box', '2016-07-14', 30, 38, 1140, NULL, NULL, NULL, NULL, 'Updated', 30, 38, 1140, '2015-10-27'),
(72, 36, 'Fastener Paper', 'Vinyl Coat', 'Box', '2016-07-14', 1, 21, 21, NULL, NULL, NULL, NULL, 'Updated', 1, 21, 21, '2015-10-13'),
(73, 37, 'Fastener Paper', 'Vinyl Coat', 'Box', '2016-07-14', 15, 68.55, 1028.25, NULL, NULL, NULL, NULL, 'Updated', 15, 68.55, 1028.25, '2015-10-13'),
(74, 38, 'Fastener Paper', 'Vinyl Coat', 'Box', '2016-07-14', 15, 185, 2775, NULL, NULL, NULL, NULL, 'Updated', 15, 185, 2775, '2015-10-27'),
(75, 39, 'Fastener Paper', 'Vinyl Coat', 'Box', '2016-07-14', 9, 75, 675, NULL, NULL, NULL, NULL, 'Updated', 9, 75, 675, '2015-10-13'),
(76, 40, 'Folder', 'File', 'Piece', '2016-07-14', 62, 5, 310, NULL, NULL, NULL, NULL, 'Updated', 62, 5, 310, '2015-10-13'),
(77, 41, 'Folder', 'File', 'Piece', '2016-07-14', 580, 6, 3480, NULL, NULL, NULL, NULL, 'Updated', 580, 6, 3480, '2015-10-13'),
(78, 42, 'Folder', 'File', 'Piece', '2016-07-14', 356, 5, 1780, NULL, NULL, NULL, NULL, 'Updated', 356, 5, 1780, '2015-10-13'),
(79, 43, 'Folder Sliding', 'Morocco', 'Piece', '2016-07-14', 34, 7, 238, NULL, NULL, NULL, NULL, 'Updated', 34, 7, 238, '2015-10-13'),
(80, 44, 'Folder Sliding', 'Morocco', 'Piece', '2016-07-14', 44, 7, 308, NULL, NULL, NULL, NULL, 'Updated', 44, 7, 308, '2015-10-13'),
(81, 45, 'Folder Sliding', 'Morocco', 'Piece', '2016-07-14', 37, 7, 259, NULL, NULL, NULL, NULL, 'Updated', 37, 7, 259, '2015-10-13'),
(82, 46, 'Folder Sliding', 'Morocco', 'Piece', '2016-07-14', 34, 7, 238, NULL, NULL, NULL, NULL, 'Updated', 34, 7, 238, '2015-10-13'),
(83, 47, 'Glue', 'kippy white All purpose Glue', 'Jar', '2016-07-14', 20, 51.25, 1025, NULL, NULL, NULL, NULL, 'Updated', 20, 51.25, 1025, '2015-10-07'),
(84, 48, 'Glue', 'Elmers', 'Bottle', '2016-07-14', 5, 42, 210, NULL, NULL, NULL, NULL, 'Updated', 5, 42, 210, '2015-10-24'),
(85, 49, 'Highlighter', 'Marvy', 'Pack', '2016-07-14', 8, 30, 240, NULL, NULL, NULL, NULL, 'Updated', 8, 30, 240, '2016-01-04'),
(86, 50, 'Highlighter', 'Marvy', 'Pack', '2016-07-14', 20, 35, 700, NULL, NULL, NULL, NULL, 'Updated', 20, 35, 700, '2016-05-06'),
(87, 51, 'Ink Hp Advcantage', '2515', 'Piece', '2016-07-14', 22, 485, 10670, NULL, NULL, NULL, NULL, 'Updated', 22, 485, 10670, '2015-11-07'),
(88, 52, 'Ink Hp Advcantage', '2515', 'Piece', '2016-07-14', 5, 396, 1980, NULL, NULL, NULL, NULL, 'Updated', 5, 396, 1980, '2015-11-24'),
(89, 53, 'Ink Cartridge', 'Epson', 'Piece', '2016-07-14', 3, 385, 1155, NULL, NULL, NULL, NULL, 'Updated', 3, 385, 1155, '2016-01-04'),
(90, 54, 'Ink Cartridge', 'Epson', 'Piece', '2016-07-14', 3, 385, 1155, NULL, NULL, NULL, NULL, 'Updated', 3, 385, 1155, '2016-01-04'),
(91, 55, 'Ink Cartridge', 'Epson', 'Piece', '2016-07-14', 3, 385, 1155, NULL, NULL, NULL, NULL, 'Updated', 3, 385, 1155, '2016-01-04'),
(92, 56, 'Ink Printer Epson', 'T664', 'Bottle', '2016-07-14', 385, 30, 11550, NULL, NULL, NULL, NULL, 'Updated', 385, 30, 11550, '2015-10-27'),
(93, 57, 'Ink Printer', 'Epson T664', 'Bottle', '2016-07-14', 25, 390, 9750, NULL, NULL, NULL, NULL, 'Updated', 25, 390, 9750, '2016-03-11'),
(94, 58, 'Ink Cartridge', 'Epson', 'Bottle', '2016-07-14', 13, 385, 5005, NULL, NULL, NULL, NULL, 'Updated', 13, 385, 5005, '2015-10-27'),
(95, 59, 'Ink Printer', 'Epson', 'Bottle', '2016-07-14', 12, 390, 4680, NULL, NULL, NULL, NULL, 'Updated', 12, 390, 4680, '2016-03-11'),
(96, 60, 'Ink Printer', 'Epson', 'Bottle', '2016-07-14', 14, 385, 5390, NULL, NULL, NULL, NULL, 'Updated', 14, 385, 5390, '2015-10-27'),
(97, 61, 'Ink Printer', 'Epson', 'Bottle', '2016-07-14', 16, 390, 6240, NULL, NULL, NULL, NULL, 'Updated', 16, 390, 6240, '2016-03-11'),
(98, 62, 'Ink Printer', 'Epson', 'Bottle', '2016-07-14', 13, 385, 5005, NULL, NULL, NULL, NULL, 'Updated', 13, 385, 5005, '2015-10-27'),
(99, 63, 'Ink Printer', 'Epson', 'Bottle', '2016-07-14', 12, 390, 4680, NULL, NULL, NULL, NULL, 'Updated', 12, 390, 4680, '2016-03-11'),
(100, 64, 'Ink Stamping Pad', 'LCT', 'Bottle', '2016-07-14', 2, 15, 30, NULL, NULL, NULL, NULL, 'Updated', 2, 15, 30, '2016-01-04'),
(101, 65, 'Ink Stamping Pad', 'LCT', 'Bottle', '2016-07-14', 30, 30, 900, NULL, NULL, NULL, NULL, 'Updated', 30, 30, 900, '2016-01-11'),
(102, 66, 'Ink -RISO', 'KZ Type', 'Piece', '2016-07-14', 6, 1148, 6888, NULL, NULL, NULL, NULL, 'Updated', 6, 1148, 6888, '2016-04-19'),
(103, 67, 'Ledger', 'General Ledger', 'Piece', '2016-07-14', 26, 12, 312, NULL, NULL, NULL, NULL, 'Updated', 26, 12, 312, '2016-01-04'),
(104, 68, 'Ledger', 'Equipment', 'Piece', '2016-07-14', 77, 12, 924, NULL, NULL, NULL, NULL, 'Updated', 77, 12, 924, '2016-01-04'),
(105, 69, 'Stock Cards', 'Ledger', 'Piece', '2016-07-14', 366, 12, 4392, NULL, NULL, NULL, NULL, 'Updated', 366, 12, 4392, '2016-01-04'),
(106, 70, 'Marker Permanent', 'Baifa/Yoka', 'Bottle', '2016-07-14', 4, 50, 200, NULL, NULL, NULL, NULL, 'Updated', 4, 50, 200, '2015-10-13'),
(107, 71, 'Marker Permanent', 'Yoka', 'Bottle', '2016-07-14', 10, 13, 130, NULL, NULL, NULL, NULL, 'Updated', 10, 13, 130, '2015-11-07'),
(108, 72, 'Marker Permanent', 'Yoka', 'Bottle', '2016-07-14', 48, 9.65, 463.2, NULL, NULL, NULL, NULL, 'Updated', 48, 9.65, 463.2, '2016-04-12'),
(109, 73, 'Marker Permanent', 'Yoka', 'Bottle', '2016-07-14', 48, 9.65, 463.2, NULL, NULL, NULL, NULL, 'Updated', 48, 9.65, 463.2, '2016-04-12'),
(110, 73, 'Marker Permanent', 'Beifa', 'Bottle', '2016-07-14', 8, 13, 104, NULL, NULL, NULL, NULL, 'Updated', 8, 13, 104, '2015-10-13'),
(111, 74, 'Marker Permanent', 'Monami', 'Bottle', '2016-07-14', 13, 13, 169, NULL, NULL, NULL, NULL, 'Updated', 13, 13, 169, '2016-01-04'),
(112, 75, 'Marker Permanent', 'Supecy', 'Bottle', '2016-07-14', 8, 13, 104, NULL, NULL, NULL, NULL, 'Updated', 8, 13, 104, '2015-10-13'),
(113, 76, 'Marker Black', 'Permanent', 'Piece', '2016-07-14', 10, 12.75, 127.5, NULL, NULL, NULL, NULL, 'Updated', 10, 12.75, 127.5, '2015-10-13'),
(114, 77, 'Marker Black', 'Permanent', 'Piece', '2016-07-14', 48, 9.65, 463.2, NULL, NULL, NULL, NULL, 'Updated', 48, 9.65, 463.2, '2016-04-22'),
(115, 78, 'Marker Permanent', 'Pilot', 'Piece', '2016-07-14', 1, 25, 25, NULL, NULL, NULL, NULL, 'Updated', 1, 25, 25, '2015-10-25'),
(116, 79, 'Marker Permanent', 'Pilot', 'Piece', '2016-07-14', 9, 25, 225, NULL, NULL, NULL, NULL, 'Updated', 9, 25, 225, '2015-10-13'),
(117, 80, 'Marker WhiteBoard', 'Beifa', 'Piece', '2016-07-14', 11, 13, 143, NULL, NULL, NULL, NULL, 'Updated', 11, 13, 143, '2015-10-13'),
(118, 81, 'Marker WhiteBoard', 'Monami', 'Piece', '2016-07-14', 28, 12.4, 347.2, NULL, NULL, NULL, NULL, 'Updated', 28, 12.4, 347.2, '2015-10-13'),
(119, 82, 'Marker WhiteBoard', 'Monami', 'Piece', '2016-07-14', 9, 12.4, 111.6, NULL, NULL, NULL, NULL, 'Updated', 9, 12.4, 111.6, '2015-10-13'),
(121, 83, 'Master Roll', 'Flange F', 'Piece/Roll', '2016-07-14', 2, 1317, 2634, NULL, NULL, NULL, NULL, 'Updated', 2, 1317, 2634, '2016-04-19'),
(122, 84, 'Marker WhiteBoard', 'Monami', 'Piece', '2016-07-14', 16, 13, 208, NULL, NULL, NULL, NULL, 'Updated', 16, 13, 208, '2015-10-13'),
(123, 85, 'Notebook Writing', 'Vanda - Spiral', 'Book', '2016-07-14', 50, 38, 1900, NULL, NULL, NULL, NULL, 'Updated', 50, 38, 1900, '2015-10-27'),
(124, 86, 'Notebook - Stenographer', 'Steno', 'Piece', '2016-07-14', 100, 14, 1400, NULL, NULL, NULL, NULL, 'Updated', 100, 14, 1400, '2016-03-16'),
(125, 87, 'Bondpaper', 'Book/Bond', 'REAM', '2016-07-14', 200, 111.35, 22270, NULL, NULL, NULL, NULL, 'Updated', 200, 111.35, 22270, '2016-04-12'),
(126, 88, 'Bondpaper', 'Eagle Multi Copy', 'REAM', '2016-07-14', 202, 123.5, 24947, NULL, NULL, NULL, NULL, 'Updated', 202, 123.5, 24947, '2015-10-07'),
(127, 89, 'Bondpaper', 'Eagle Multi Copy', 'REAM', '2016-07-14', 50, 110.95, 5547.5, NULL, NULL, NULL, NULL, 'Updated', 50, 110.95, 5547.5, '2016-01-27'),
(128, 90, 'Bondpaper', 'Book/Bond', 'REAM', '2016-07-14', 150, 125, 18750, NULL, NULL, NULL, NULL, 'Updated', 150, 125, 18750, '2016-04-12'),
(129, 91, 'Bondpaper', 'Book/Bond', 'REAM', '2016-07-14', 10, 150, 1500, NULL, NULL, NULL, NULL, 'Updated', 10, 150, 1500, '2016-06-10'),
(130, 92, 'Bondpaper', 'Book/Bond', 'REAM', '2016-07-14', 100, 138.4, 13840, NULL, NULL, NULL, NULL, 'Updated', 100, 138.4, 13840, '2015-10-07'),
(131, 93, 'Bondpaper', 'Book/Bond', 'REAM', '2016-07-14', 100, 138.4, 13840, NULL, NULL, NULL, NULL, 'Updated', 100, 138.4, 13840, '2016-02-10'),
(132, 94, 'Bondpaper', 'Book/Bond', 'REAM', '2016-07-14', 19, 123, 2337, NULL, NULL, NULL, NULL, 'Updated', 19, 123, 2337, '2015-10-13'),
(133, 95, 'Bondpaper', 'Bond', 'REAM', '2016-07-14', 24, 200, 4800, NULL, NULL, NULL, NULL, 'Updated', 24, 200, 4800, '2015-10-13'),
(134, 96, 'Paper Carbon', 'Film', 'Box', '2016-07-14', 19, 300, 5700, NULL, NULL, NULL, NULL, 'Updated', 19, 300, 5700, '2015-10-13'),
(135, 97, 'Paper Stationary', 'Witla PCIC', 'Piece', '2016-07-14', 10, 150, 1500, NULL, NULL, NULL, NULL, 'Updated', 10, 150, 1500, '2015-10-13'),
(136, 98, 'Paper Tissue', 'Tissue', 'ROLL', '2016-07-14', 57, 75.1, 4280.7, NULL, NULL, NULL, NULL, 'Updated', 57, 75.1, 4280.7, '2015-10-13'),
(137, 99, 'Pencil', 'Mongol', 'Piece', '2016-07-14', 12, 5, 60, NULL, NULL, NULL, NULL, 'Updated', 12, 5, 60, '2015-10-13'),
(138, 100, 'Pencil', 'Bright', 'Piece', '2016-07-14', 56, 4, 224, NULL, NULL, NULL, NULL, 'Updated', 56, 4, 224, '2015-10-13'),
(139, 101, 'Pins (Hammerhead)', 'pin', 'Box', '2016-07-14', 1, 120, 120, NULL, NULL, NULL, NULL, 'Updated', 1, 120, 120, '2015-10-13'),
(140, 102, 'Pins (MAP)', 'map', 'Piece', '2016-07-14', 1, 120, 120, NULL, NULL, NULL, NULL, 'Updated', 1, 120, 120, '2015-10-13'),
(141, 103, 'Pins (Push)', 'pins', 'Piece', '2016-07-14', 1, 120, 120, NULL, NULL, NULL, NULL, 'Updated', 1, 120, 120, '2015-10-13'),
(142, 104, 'Puncher', 'Joy', 'Piece', '2016-07-14', 9, 150, 1350, NULL, NULL, NULL, NULL, 'Updated', 9, 150, 1350, '2015-10-13'),
(143, 105, 'Record Book', 'Book', 'Book', '2016-07-14', 56, 63.25, 3542, NULL, NULL, NULL, NULL, 'Updated', 56, 63.25, 3542, '2015-10-07'),
(144, 106, 'Ribbon', 'Bundy Card', 'Piece', '2016-07-14', 5, 800, 4000, NULL, NULL, NULL, NULL, 'Updated', 5, 800, 4000, '2014-09-14'),
(145, 107, 'Ribbon Cartridge', 'Epson', 'Piece', '2016-07-14', 11, 130, 1430, NULL, NULL, NULL, NULL, 'Updated', 11, 130, 1430, '2015-01-14'),
(146, 108, 'Rubber band', 'Rubber', 'Box', '2016-07-14', 1, 300, 300, NULL, NULL, NULL, NULL, 'Updated', 1, 300, 300, '2015-10-27'),
(147, 109, 'Rubber band', 'Rubber', 'Box', '2016-07-14', 10, 110.95, 1109.5, NULL, NULL, NULL, NULL, 'Updated', 10, 110.95, 1109.5, '2016-01-22'),
(148, 110, 'Rubber band (M.O)', 'Rubber', 'Box', '2016-07-14', 11, 20, 220, NULL, NULL, NULL, NULL, 'Updated', 11, 20, 220, '2015-10-13'),
(149, 111, 'Ruler Plastic', 'Prince', 'Piece', '2016-07-14', 6, 6, 36, NULL, NULL, NULL, NULL, 'Updated', 6, 6, 36, '2015-10-10'),
(150, 112, 'Ruler', 'Plastic', 'Piece', '2016-07-14', 12, 16.35, 196.2, NULL, NULL, NULL, NULL, 'Updated', 12, 16.35, 196.2, '2016-01-27'),
(151, 113, 'Scissor', 'scissor', 'Piece', '2016-07-14', 3, 25, 75, NULL, NULL, NULL, NULL, 'Updated', 3, 25, 75, '2015-10-13'),
(152, 114, 'Scissor', 'S', 'Piece', '2016-07-14', 20, 45, 900, NULL, NULL, NULL, NULL, 'Updated', 20, 45, 900, '2016-03-11'),
(153, 115, 'Scoring Pad', 'Scoth brite', 'Pack/Pieces', '2016-07-14', 50, 25.07, 1253.5, NULL, NULL, NULL, NULL, 'Updated', 50, 25.07, 1253.5, '2016-01-27'),
(154, 116, 'Signpen', 'Dong - A myGel', 'Piece', '2016-07-14', 6, 18, 108, NULL, NULL, NULL, NULL, 'Updated', 6, 18, 108, '2015-10-25'),
(155, 117, 'Signpen', 'Dong - A', 'Piece', '2016-07-14', 20, 21, 420, NULL, NULL, NULL, NULL, 'Updated', 20, 21, 420, '2016-03-11'),
(156, 118, 'Signpen', 'Dong - A', 'Piece', '2016-07-14', 26, 18, 468, NULL, NULL, NULL, NULL, 'Updated', 26, 18, 468, '2015-10-13'),
(157, 119, 'Signpen Dong - A', 'Refilable', 'Piece', '2016-07-14', 48, 19, 912, NULL, NULL, NULL, NULL, 'Updated', 48, 19, 912, '2016-05-13'),
(158, 120, 'Signpen Pentel', 'Energel', 'Piece', '2016-07-14', 8, 46.15, 369.2, NULL, NULL, NULL, NULL, 'Updated', 8, 46.15, 369.2, '2015-10-13'),
(159, 121, 'Signpen Pentel', 'Energel', 'Piece', '2016-07-14', 48, 46.15, 2215.2, NULL, NULL, NULL, NULL, 'Updated', 48, 46.15, 2215.2, '2015-10-07'),
(160, 122, 'Signpen Refill', 'Dong - A', 'Piece', '2016-07-14', 136, 6, 816, NULL, NULL, NULL, NULL, 'Updated', 136, 6, 816, '2016-01-04'),
(161, 123, 'Signpen Refill', 'Dong - A', 'Piece', '2016-07-14', 125, 6, 750, NULL, NULL, NULL, NULL, 'Updated', 125, 6, 750, '2016-01-04'),
(162, 124, 'Signpen Refill', 'Dong - A', 'Piece', '2016-07-14', 72, 19, 1368, NULL, NULL, NULL, NULL, 'Updated', 72, 19, 1368, '2016-05-13'),
(163, 125, 'Signpen Refill', 'Dong - A', 'Piece', '2016-07-14', 72, 19, 1368, NULL, NULL, NULL, NULL, 'Updated', 72, 19, 1368, '2016-05-13'),
(164, 126, 'Specialty board', 'Apple Green', 'Pack', '2016-07-14', 250, 35, 8750, NULL, NULL, NULL, NULL, 'Updated', 250, 35, 8750, '2016-05-13'),
(165, 127, 'Stamp pad', 'joy', 'Piece', '2016-07-14', 24, 25, 600, NULL, NULL, NULL, NULL, 'Updated', 24, 25, 600, '2015-10-13'),
(166, 128, 'Stapler', 'Max HD10', 'Piece', '2016-07-14', 18, 55, 990, NULL, NULL, NULL, NULL, 'Updated', 18, 55, 990, '2015-10-27'),
(167, 129, 'Stapler', 'Max', 'Piece', '2016-07-14', 11, 250, 2750, NULL, NULL, NULL, NULL, 'Updated', 11, 250, 2750, '2015-10-13'),
(168, 130, 'Staple Wire', 'max', 'Box', '2016-07-14', 114, 5, 570, NULL, NULL, NULL, NULL, 'Updated', 114, 5, 570, '2016-10-13'),
(169, 131, 'Staple Wire', 'MPC', 'Box', '2016-07-14', 60, 25, 1500, NULL, NULL, NULL, NULL, 'Updated', 60, 25, 1500, '2016-10-13'),
(170, 132, 'Tape Dispenser', 'Heavy duty', 'Piece', '2016-07-14', 3, 50, 150, NULL, NULL, NULL, NULL, 'Updated', 3, 50, 150, '2016-01-27'),
(171, 133, 'Tape Packaging', 'Tape', 'Roll', '2016-07-14', 22, 34.9, 767.8, NULL, NULL, NULL, NULL, 'Updated', 22, 34.9, 767.8, '2015-10-07'),
(172, 134, 'Tape Trasnparent', 'Tape', 'Roll', '2016-07-14', 40, 18.2, 728, NULL, NULL, NULL, NULL, 'Updated', 40, 18.2, 728, '2015-10-07'),
(173, 135, 'Tape Scotch', 'Transparent', 'Roll', '2016-07-14', 20, 34.9, 698, NULL, NULL, NULL, NULL, 'Updated', 20, 34.9, 698, '2016-01-27'),
(174, 136, 'Tape Masking', 'Tape', 'Roll', '2016-07-14', 10, 57.8, 578, NULL, NULL, NULL, NULL, 'Updated', 10, 57.8, 578, '2015-10-07'),
(175, 137, 'Tape Masking no.2', 'Tape', 'Roll', '2016-07-14', 17, 107.95, 1835.15, NULL, NULL, NULL, NULL, 'Updated', 17, 107.95, 1835.15, '2015-10-13'),
(176, 138, 'Toilet Bowl & urinal Cleaner', 'Aerosol', 'Bottle', '2016-07-14', 6, 165, 990, NULL, NULL, NULL, NULL, 'Updated', 6, 165, 990, '2016-03-10'),
(177, 139, 'Toilet Deodorant Cake', 'cake 99%', 'Box', '2016-07-14', 15, 26.2, 393, NULL, NULL, NULL, NULL, 'Updated', 15, 26.2, 393, '2016-01-27'),
(178, 140, 'Trashbag', 'Plastic', 'Roll', '2016-07-14', 20, 151.35, 3027, NULL, NULL, NULL, NULL, 'Updated', 20, 151.35, 3027, '2016-01-27'),
(179, 141, 'HP Deskjet 2515', 'Printer', 'Piece', '2016-07-14', 1, 3733, 3733, NULL, NULL, NULL, NULL, 'Updated', 1, 3733, 3733, '2014-03-18'),
(180, 142, 'Stand Fan', 'Fan', 'unit', '2016-07-14', 1, 1750, 1750, NULL, NULL, NULL, NULL, 'Updated', 1, 1750, 1750, '2014-04-02'),
(181, 143, 'Bond paper', 'Book/Bond', 'REAMS', '2016-07-14', 100, 107.35, 10735, NULL, NULL, NULL, NULL, 'Updated', 100, 107.35, 10735, '2014-04-25'),
(182, 144, 'Bond Paper', 'Book/Bond', 'REAMS', '2016-07-14', 100, 116.6, 11660, NULL, NULL, NULL, NULL, 'Updated', 100, 116.6, 11660, '2014-04-25'),
(183, 145, 'Battery', 'Energizer', 'Doz', '2016-07-14', 3, 20.15, 60.45, NULL, NULL, NULL, NULL, 'Updated', 3, 20.15, 60.45, '2014-04-25'),
(184, 146, 'Alcohol', 'Ethyl', 'Bottle', '2016-07-14', 12, 40.1, 481.2, NULL, NULL, NULL, NULL, 'Updated', 12, 40.1, 481.2, '2014-04-25'),
(185, 147, 'Film carbon paper', 'Gold Inernational', 'Boxes', '2016-07-14', 5, 304.85, 1524.25, NULL, NULL, NULL, NULL, 'Updated', 5, 304.85, 1524.25, '2014-04-25'),
(186, 148, 'Floor MOP', 'Scotch brite', 'Piece', '2016-07-14', 2, 123, 246, NULL, NULL, NULL, NULL, 'Updated', 2, 123, 246, '2014-04-25'),
(187, 149, 'Masking Tape 2', 'mt', 'Piece', '2016-07-14', 12, 107.95, 1295.4, NULL, NULL, NULL, NULL, 'Updated', 12, 107.95, 1295.4, '2014-04-25'),
(188, 150, 'Nylon Straw', 'Twine', 'Piece', '2016-07-14', 2, 47.85, 95.7, NULL, NULL, NULL, NULL, 'Updated', 2, 47.85, 95.7, '2014-04-25'),
(189, 151, 'Official Record Book', 'Book', 'Piece', '2016-07-14', 24, 54.5, 1308, NULL, NULL, NULL, NULL, 'Updated', 24, 54.5, 1308, '2014-04-25'),
(190, 152, 'Paper Clip', 'clip', 'Doz', '2016-07-14', 3, 12.85, 38.55, NULL, NULL, NULL, NULL, 'Updated', 3, 12.85, 38.55, '2014-04-25'),
(191, 153, 'Paper Fastener', 'fastener', 'Boxes', '2016-07-14', 3, 68.55, 205.65, NULL, NULL, NULL, NULL, 'Updated', 3, 68.55, 205.65, '2014-04-25'),
(192, 154, 'Pencil', 'Mongol', 'Doz', '2016-07-14', 3, 25, 75, NULL, NULL, NULL, NULL, 'Updated', 3, 25, 75, '2014-04-25'),
(193, 155, 'Pentel Pen', 'Pilot', 'Piece', '2016-07-14', 12, 12.75, 153, NULL, NULL, NULL, NULL, 'Updated', 12, 12.75, 153, '2014-04-25'),
(194, 156, 'Pentel Pen', 'Pilot', 'Piece', '2016-07-14', 12, 12.75, 153, NULL, NULL, NULL, NULL, 'Updated', 12, 12.75, 153, '2014-04-25'),
(195, 157, 'Packing Tape', 'pt', 'Piece', '2016-07-14', 12, 34.9, 418.8, NULL, NULL, NULL, NULL, 'Updated', 12, 34.9, 418.8, '2014-04-25'),
(196, 158, 'Ruler', 'Plastic', 'Piece', '2016-07-14', 12, 3.3, 39.6, NULL, NULL, NULL, NULL, 'Updated', 12, 3.3, 39.6, '2014-04-25'),
(197, 159, 'Scissor', 'sc', 'Piece', '2016-07-14', 3, 16.35, 49.05, NULL, NULL, NULL, NULL, 'Updated', 3, 16.35, 49.05, '2014-04-25'),
(198, 160, 'Scotch tape 1', 'st', '12', '2016-07-14', 12, 18.2, 218.4, NULL, NULL, NULL, NULL, 'Updated', 12, 18.2, 218.4, '2014-04-25'),
(199, 161, 'Soap', 'Detergent Powder', 'Pack', '2016-07-14', 12, 26.2, 314.4, NULL, NULL, NULL, NULL, 'Updated', 12, 26.2, 314.4, '2014-04-25'),
(200, 162, 'Tissue', 'Paper', 'Piece', '2016-07-14', 12, 76.1, 913.2, NULL, NULL, NULL, NULL, 'Updated', 12, 76.1, 913.2, '2014-04-25'),
(201, 163, 'Typewriter', 'Ribbon', 'Piece', '2016-07-14', 12, 19.9, 238.8, NULL, NULL, NULL, NULL, 'Updated', 12, 19.9, 238.8, '2014-04-25'),
(202, 164, 'Yellow pad', 'yp', 'Pads', '2016-07-14', 2, 18.35, 36.7, NULL, NULL, NULL, NULL, 'Updated', 2, 18.35, 36.7, '2014-04-25'),
(203, 165, 'Printer Canon Class MF 3010', 'canon', 'unit', '2016-07-14', 1, 3710, 3710, NULL, NULL, NULL, NULL, 'Updated', 1, 3710, 3710, '2014-05-19'),
(204, 166, 'Office Table Model No. JIT-F48', 'table', 'Unit', '2016-07-14', 3, 2395, 7185, NULL, NULL, NULL, NULL, 'Updated', 3, 2395, 7185, '2014-05-29'),
(205, 167, 'Office Chair W/Arm MODEL:STM10017703', 'Chair', 'Unit', '2016-07-14', 3, 1795, 5385, NULL, NULL, NULL, NULL, 'Updated', 3, 1795, 5385, '2014-05-29'),
(206, 168, 'Plastic Chair', 'Chair', 'Unit', '2016-07-14', 6, 495, 2970, NULL, NULL, NULL, NULL, 'Updated', 6, 495, 2970, '2014-05-29'),
(207, 169, 'Office Table', 'Table', 'unit', '2016-07-14', 3, 1500, 4500, NULL, NULL, NULL, NULL, 'Updated', 3, 1500, 4500, '2014-03-14'),
(208, 170, 'Swivel Chair', 'Chair', 'Unit', '2016-07-14', 3, 1500, 4500, NULL, NULL, NULL, NULL, 'Updated', 3, 1500, 4500, '2014-03-26'),
(209, 171, 'Monoblock Chair', 'Chair', 'Piece', '2016-07-14', 2, 365, 730, NULL, NULL, NULL, NULL, 'Updated', 2, 365, 730, '2014-03-26'),
(210, 172, '3 Layer File Cabinet', 'Cabinet', 'Unit', '2016-07-14', 1, 2600, 2600, NULL, NULL, NULL, NULL, 'Updated', 1, 2600, 2600, '2014-03-26'),
(211, 173, 'Office Table', 'Table', 'Unit', '2016-07-14', 2, 3700, 7400, NULL, NULL, NULL, NULL, 'Updated', 2, 3700, 7400, '2014-04-02'),
(212, 174, 'Chair', 'c', 'Piece', '2016-07-14', 2, 400, 800, NULL, NULL, NULL, NULL, 'Updated', 2, 400, 800, '2014-04-02'),
(213, 175, 'Cofta bench/lounge Chair', 'chair', 'Unit', '2016-07-14', 1, 3250, 3250, NULL, NULL, NULL, NULL, 'Updated', 1, 3250, 3250, '2014-04-02'),
(214, 176, '4 Layer Cabinet File Cabinet', 'Cabinet', 'Unit', '2016-07-14', 1, 2150, 2150, NULL, NULL, NULL, NULL, 'Updated', 1, 2150, 2150, '2014-04-02'),
(215, 177, 'Office Table', 'Table', 'Piece', '2016-07-14', 3, 1687, 5061, NULL, NULL, NULL, NULL, 'Updated', 3, 1687, 5061, '2014-04-02'),
(216, 178, 'Office Chair', 'oc', 'Piece', '2016-07-14', 3, 1433, 4299, NULL, NULL, NULL, NULL, 'Updated', 3, 1433, 4299, '2014-04-02'),
(217, 179, 'Loveseat', 'seat', 'Piece', '2016-07-14', 2, 1100, 2200, NULL, NULL, NULL, NULL, 'Updated', 2, 1100, 2200, '2014-04-02'),
(218, 180, 'Storage Box', 'sb', 'Piece', '2016-07-14', 1, 4155, 4155, NULL, NULL, NULL, NULL, 'Updated', 1, 4155, 4155, '2014-04-02'),
(219, 181, 'Cabinet (Divider type)', 'cabinet', 'Piece', '2016-07-14', 1, 3800, 3800, NULL, NULL, NULL, NULL, 'Updated', 1, 3800, 3800, '2014-08-28'),
(220, 182, 'Monoblock Chair', 'Chair', 'Piece', '2016-07-14', 3, 390, 1170, NULL, NULL, NULL, NULL, 'Updated', 3, 390, 1170, '2014-08-27'),
(221, 183, 'Table(JIT - F48; Color: Wenge)', 'Table', 'Piece', '2016-07-14', 3, 2395, 7185, NULL, NULL, NULL, NULL, 'Updated', 3, 2395, 7185, '2014-08-29'),
(222, 184, 'Chair (with Arm, Color : Black)', 'Chair', 'Piece', '2016-07-14', 3, 1795, 5385, NULL, NULL, NULL, NULL, 'Updated', 3, 1795, 5385, '2014-08-27'),
(223, 185, 'Cofta Monoblock Chairs (color:White)', 'chair', 'Piece', '2016-07-14', 6, 495, 2970, NULL, NULL, NULL, NULL, 'Updated', 6, 495, 2970, '2014-08-27'),
(224, 186, 'Electric Fan (Hanabishi Stand Fan)', 'Hanabishi', 'Piece', '2016-07-14', 1, 1795, 1795, NULL, NULL, NULL, NULL, 'Updated', 1, 1795, 1795, '2014-08-27'),
(225, 187, 'Brown Envelope', 'envelope', 'Piece', '2016-07-14', 100, 1.8, 180, NULL, NULL, NULL, NULL, 'Updated', 100, 1.8, 180, '2014-09-09'),
(226, 187, 'Brown Envelope', 'envelope', 'Piece', '2014-09-09', 0, 1.8, 0, NULL, NULL, NULL, NULL, 'Updated', 100, 1.8, 180, '2014-09-09'),
(227, 188, 'Brown Envelope', 'Envelope', 'Piece', '2016-07-14', 100, 1.5, 150, NULL, NULL, NULL, NULL, 'Updated', 100, 1.5, 150, '2014-09-09'),
(228, 189, 'Bundy Card Ribbon Max(ER1500)', 'ribbon', 'Piece', '2016-07-14', 5, 800, 4000, NULL, NULL, NULL, NULL, 'Updated', 5, 800, 4000, '2014-09-09'),
(229, 190, 'Expanding Envelope', 'envelope', 'Piece', '2016-07-14', 150, 12, 1800, NULL, NULL, NULL, NULL, 'Updated', 150, 12, 1800, '2014-09-09'),
(230, 191, 'Expanding Envelope', 'envelope', 'Piece', '2016-07-14', 150, 12, 1800, NULL, NULL, NULL, NULL, 'Updated', 150, 12, 1800, '2014-09-09'),
(231, 192, 'Folder Long 14 PTS', 'folder', 'Pack', '2016-07-14', 10, 400, 4000, NULL, NULL, NULL, NULL, 'Updated', 10, 400, 4000, '2014-09-09'),
(232, 193, 'HP Ink Advantage 2515 Black', 'Ink', 'Piece', '2016-07-14', 10, 396, 3960, NULL, NULL, NULL, NULL, 'Updated', 10, 396, 3960, '2014-09-09'),
(233, 194, 'HP Ink Advantage 2515 Colored', 'Ink', 'Piece', '2016-07-14', 10, 396, 3960, NULL, NULL, NULL, NULL, 'Updated', 10, 396, 3960, '2014-09-09'),
(234, 195, 'HP Ink Deskjet 1515 Black', 'Ink', 'Piece', '2016-07-14', 10, 396, 3960, NULL, NULL, NULL, NULL, 'Updated', 10, 396, 3960, '2014-09-09'),
(235, 196, 'HP Ink Deskjet 1515 Colored', 'Ink', 'Piece', '2016-07-14', 10, 396, 3960, NULL, NULL, NULL, NULL, 'Updated', 10, 396, 3960, '2014-09-09'),
(236, 197, 'Max Heavy Duty puncher', 'puncher', 'Piece', '2016-07-14', 8, 150, 1200, NULL, NULL, NULL, NULL, 'Updated', 8, 150, 1200, '2014-09-09'),
(237, 198, 'Max Stapler Big', 'stapler', 'Piece', '2016-07-14', 8, 265, 2120, NULL, NULL, NULL, NULL, 'Updated', 8, 265, 2120, '2014-09-09'),
(238, 199, 'My Gel Pen Refill - Black', 'Refill', 'Doz', '2016-07-14', 10, 180, 1800, NULL, NULL, NULL, NULL, 'Updated', 10, 180, 1800, '2014-09-09'),
(239, 200, 'Max Stapler Small', 'Stapler', 'Piece', '2016-07-14', 15, 55, 825, NULL, NULL, NULL, NULL, 'Updated', 15, 55, 825, '2014-09-09'),
(240, 201, 'My Gel Pen Refill - Blue', 'Pen Refill', 'Doz', '2016-07-14', 10, 180, 1800, NULL, NULL, NULL, NULL, 'Updated', 10, 180, 1800, '2014-09-09'),
(241, 202, 'Casio Bussiness Calculator(12 Digit)', 'Casio', 'Piece', '2016-07-14', 18, 300, 5400, NULL, NULL, NULL, NULL, 'Updated', 18, 300, 5400, '2014-09-09'),
(242, 203, 'Paper Clip Jumbo', 'clip', 'Box', '2016-07-14', 30, 18, 540, NULL, NULL, NULL, NULL, 'Updated', 30, 18, 540, '2014-09-09'),
(243, 204, 'Plastic Ruler (Transparent)', 'Ruler', 'Piece', '2016-07-14', 18, 6, 108, NULL, NULL, NULL, NULL, 'Updated', 18, 6, 108, '2014-09-09'),
(244, 204, 'Plastic Ruler (Transparent)', 'Ruler', 'Piece', '2014-09-09', 0, 18, 0, NULL, NULL, NULL, NULL, 'Updated', 18, 18, 324, '2014-09-09'),
(245, 204, 'Plastic Ruler (Transparent)', 'Ruler', 'Piece', '2014-09-09', 12, 18, 216, NULL, NULL, NULL, NULL, 'Updated', 30, 18, 540, '2014-09-09'),
(246, 205, 'Plastic Envelope', 'envelope', 'doz', '2016-07-14', 3, 90, 270, NULL, NULL, NULL, NULL, 'Updated', 3, 90, 270, '2014-09-09'),
(247, 206, 'Office tables (Desk w/ Drawers)', 'Tables', 'Piece', '2016-07-14', 2, 3600, 7200, NULL, NULL, NULL, NULL, 'Updated', 2, 3600, 7200, '2014-09-19'),
(248, 207, 'Electric fan - Standard 16 inches Stainless Model', 'Fan', 'Piece', '2016-07-14', 1, 1700, 1700, NULL, NULL, NULL, NULL, 'Updated', 1, 1700, 1700, '2014-09-23'),
(249, 208, 'Cabinet Divider', 'cabinet', 'Unit', '2016-07-14', 1, 5395, 5395, NULL, NULL, NULL, NULL, 'Updated', 1, 5395, 5395, '2014-09-23'),
(250, 209, 'Stocking Chair', 'chair', 'Piece', '2016-07-14', 5, 420, 2100, NULL, NULL, NULL, NULL, 'Updated', 5, 420, 2100, '2014-09-23'),
(251, 210, 'UPS', 'Battery', 'Piece', '2016-07-14', 6, 1216.67, 7300.02, NULL, NULL, NULL, NULL, 'Updated', 6, 1216.67, 7300.02, '2014-09-13'),
(252, 211, 'Computer Software', 'computer os', 'Piece', '2016-07-14', 6, 8323.34, 49940, NULL, NULL, NULL, NULL, 'Updated', 6, 8323.34, 49940, '2014-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `pcic_stockinventory`
--

CREATE TABLE IF NOT EXISTS `pcic_stockinventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(50) DEFAULT NULL,
  `startbal` int(11) DEFAULT NULL,
  `startucost` float DEFAULT NULL,
  `startamount` float DEFAULT NULL,
  `issuanceqty` int(11) DEFAULT NULL,
  `issuancecost` float DEFAULT NULL,
  `issuanceamount` float DEFAULT NULL,
  `endbal` int(11) DEFAULT NULL,
  `enducost` float DEFAULT NULL,
  `endamount` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  `itemno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `dep` varchar(11) DEFAULT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL,
  `content` longblob NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `name`, `dep`, `type`, `size`, `content`, `timestamp`) VALUES
(1, 'Project Proposal Template.doc', 'AFD', 'application/msword', 31232, 0xd0cf11e0a1b11ae1000000000000000000000000000000003e000300feff0900060000000000000000000000010000003800000000000000001000003a00000001000000feffffff0000000037000000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffeca5c10059e009040000f012bf000000000000100000000000080000181100000e00626a626a5bc95bc900000000000000000000000000000000000009041600341c000039a30a5c39a30a5c8c080000000000008b0000000000000000000000000000000000000000000000ffff0f000000000000000000ffff0f000000000000000000ffff0f0000000000000000000000000000000000b700000000000209000000000000020900007a160000000000007a160000000000007a160000000000007a160000000000007a160000140000000000000000000000ffffffff000000008e160000000000008e160000000000008e16000038000000c61600001c000000e2160000140000008e160000000000004e290000ac010000f616000000000000f616000000000000f616000000000000f616000000000000f616000000000000e517000000000000e517000000000000e517000000000000cd28000002000000cf28000000000000cf28000000000000cf28000000000000cf28000000000000cf28000000000000cf28000024000000fa2a0000b6020000b02d0000b0000000f328000015000000000000000000000000000000000000007a16000000000000e51700000000000000000000000000000000000000000000e517000000000000e517000000000000e517000000000000e517000000000000f32800000000000000000000000000007a160000000000007a16000000000000f6160000000000000000000000000000f6160000ef0000000829000016000000111900000000000011190000000000001119000000000000e51700006a0000007a16000000000000f6160000000000007a16000000000000f616000000000000cd2800000000000000000000000000001119000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000e517000000000000cd280000000000000000000000000000111900000000000011190000aa000000072600007c0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000005b27000000000000f616000000000000ffffffff0000000020da6869a5ced1010000000000000000ffffffff000000004f1800004600000083260000120000000000000000000000b9280000140000001e290000300000004e2900000000000095260000c6000000602e000000000000951800007c000000602e0000240000005b27000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000005b27000026000000602e00000000000000000000000000007a160000000000008127000038010000e517000000000000e5170000000000001119000000000000e517000000000000e5170000000000000000000000000000000000000000000000000000000000000000000000000000e517000000000000e517000000000000e517000000000000f328000000000000f328000000000000000000000000000000000000000000000000000000000000000000000000000011190000000000000000000000000000000000000000000000000000000000000000000000000000e517000000000000e517000000000000e5170000000000004e29000000000000e517000000000000e517000000000000e517000000000000e5170000000000000000000000000000ffffffff00000000ffffffff00000000ffffffff000000000000000000000000ffffffff00000000ffffffff00000000ffffffff00000000ffffffff00000000ffffffff00000000ffffffff00000000ffffffff00000000ffffffff00000000ffffffff00000000ffffffff00000000ffffffff00000000ffffffff00000000ffffffff00000000ffffffff00000000602e000000000000e517000000000000e517000000000000e517000000000000e517000000000000e517000000000000e5170000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000e517000000000000e517000000000000e517000000000000020900003e0c0000401500003a010000050012010000093400000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000b496e74726f64756374696f6e200b496e76656e746f7279206973206261736963616c6c792074686520746f74616c20616d6f756e74206f6620676f6f647320616e64206d6174657269616c732068656c6420696e2073746f636b206279206120666163746f72792c2073746f726520616e64206f7468657220627573696e6573732e20416e20696e76656e746f72792073797374656d20697320612070726f636573732077686572656279206120627573696e657373206b6565707320747261636b206f662074686520676f6f647320616e64206d6174657269616c2068617320617661696c61626c652e20546f646179927320636f6d706574697469766520656e7669726f6e6d656e7420697320666163746f72696e6720636f6d70616e69657320746f206f7074696d697a65207468652070726f637572656d656e742070726f63657373657320616e6420696e76656e746f7279206c6576656c73207768696c65206174207468652073616d652074696d6520656e73757265206163637572616379206f6620636f6e74726f6c7320616e6420696d706c656d656e746174696f6e206f66207374616e646172642070726f6365647572657320666f722074686520666c6f77206f66206d6174657269616c732e20486f77657665722c20696e2074686520616273656e6365206f6620617070726f7072696174652073797374656d7320616e6420696e666f726d6174696f6e20696e6672617374727563747572652c20636f6d70616e696573206172652066696e64696e6720697420646966666963756c7420746f206163686965766520736d6f6f746820616e6420656666696369656e742e0d526174696f6e616c650d536f6d65206f66206578697374696e672073797374656d206973206d616e75616c20746f206b656570207472616e73616374696f6e207265636f7264206f662074686520696e76656e746f727920696e20746865204465706172746d656e74206f6620696e76656e746f72792e2050656f706c65207374696c6c2070726566657220746f20666f6c6c6f7720746865206d616e75616c206d6574686f6420746f206b65657020746865207265636f7264206f662073746f636b2070757263686173652c20696e76656e746f72792e204574632e20466f6c6c6f77696e672074686973206d6574686f6420697320766572792074696d6520636f6e73756d696e6720616e6420746564696f75732e20497420686173206d616e7920647261776261636b73206173207468657265206d6179206265206d697374616b6573207768696c65207265636f7264696e67206c61726765206461746120616e642074686973206d617920646973727570742074686520696d706f7274616e74207472616e73616374696f6e2e20496e20746869732070726f6a6563742077652061726520747279696e6720746f206d616b6520696e76656e746f7279206d616e6167656d656e742073797374656d2077686963682077696c6c2068656c7020656d706c6f7965657320746f206b656570207265636f7264206f6620696e76656e746f7269657320696e2073797374656d617469632077617920616e642068656c70207468656d2070726f64756365207265706f72742063757272656e746c7920617661696c61626c6520496e20746865697220206465706172746d656e7420696e206175746f6d617469632077617920746f2068656c70207468656d206465636973696f6e206d616b696e672061626f7574207468652073746f636b206574632e0d0b4f626a656374697665730d4f626a65637469766573206f66207468652070726f6a65637420697320746f20646576656c6f7020696e76656e746f7279206d616e6167656d656e742073797374656d20666f72206465706172746d656e74206f6620696e76656e746f72792e0d456e7375726520656666696369656e7420616e642074696d656c79206964656e74696669636174696f6e206f6620766974616c20636f72706f726174650d546f2070726f7669646520696e76656e746f72792073797374656d2061636365737320746f20616c6c206e656365737361727920706572736f6e6e656c0d546f2070726f7669646520612066756c6c2072616e6765206f66207265706f72747320746861742077696c6c207361746973667920696e666f726d6174696f6e616c20726571756972656d656e74732e0d446576656c6f7020616e206175746f6d617465642073797374656d20746861742077696c6c2062652061626c6520746f207265636f72642c2073746f72652c20726574726965766520616e642067656e6572617465207265706f727473206f6620696e76656e746f72792075736566756c20746f206d616e6167656d656e7420696e6465636973696f6e206d616b696e672e0d0b4d6574686f646f6c6f67790b312e436f6c6c65637420646174610d4d656574207468652073746166662028696e76656e746f727920706572736f6e6e656c2c20696e666f726d6174696f6e20746563686e6f6c6f67792e2920616e6420676574207468652064657461696c73207468657920617265207573696e6720666f72207468656972206d616e75616c20776f726b206f6620696e76656e746f7279206d616e6167656d656e742e0d322e20446973637573732077697468207468652067726f75700d09322e3120446973637573732061626f7574207468652070726f6a65637420776f726b206173206f72646572696e672074686520636f6c6c656374656420696e666f726d6174696f6e2c206372656174696e67206461746162617365207461626c65732c204552206469616772616d732c206574632e0d332e2054616c6b2077697468207468652070726f70657220706572736f6e0d09332e312054616c6b2077697468207468652073746166662028696e76656e746f727920706572736f6e6e656c2920746f206b6e6f772061626f757420746865697220726571756972656d656e74732e200d030d0d040d0d030d0d040d0d0d446f6d696e69636f20532e2047616d6f6e0d526567696f6e616c204469726563746f720d5068696c697070696e652043726f7020496e737572616e636520436f72706f726174696f6e0d4a756e652032372c20323031360d496e76656e746f7279204d616e6167656d656e742053797374656d202d20494d530d0d0d0d0d0d0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000080000010800000d0800000e0800000f080000690a00006a0a0000730a0000740a0000d70a0000e00a0000250b0000100d0000110d0000120d00001c0d00001d0d0000ebd6c1b2a39484776b5f6b53a344c12f00000000000000000000281568ab3e4f0016689c077700350881422a01434a1800614a18006d48090470680000000073480904001c1568ab3e4f001668c04df700434a1800614a18006d480904734809040016166826332000434a1800614a18006d480904734809040016166815267f00434a1800614a18006d4809047348090400161668ab3e4f00434a1800614a18006d4809047348090400191668ab3e4f00350881434a1800614a18006d480904734809041f1568ab3e4f001668ab3e4f00350881434a1800614a18006d480904734809041c1568ab3e4f00166862053900434a1800614a18006d48090473480904001c1568ab3e4f001668ab3e4f00434a1800614a18006d48090473480904001c1568ab3e4f001668d7056800434a1800614a18006d4809047348090400281568ab3e4f001668c04df700350881422a01434a1800614a18006d4809047068000000007348090400281568ab3e4f001668ab3e4f00350881422a01434a1800614a18006d4809047068000000007348090400281568ab3e4f0016686a34ec00350881422a01434a1800614a18006d4809047068000000007348090410000800006a0a0000740a0000110d00001d0d00007e0d0000bc0d0000fa0d00004b0e0000de0e0000fa0e00008a0f0000a40f00001b1000003a1000008c1000008e1000008f100000911000009210000094100000951000009710000098100000f7000000000000000000000000f7000000000000000000000000f7000000000000000000000000f7000000000000000000000000f7000000000000000000000000ec000000000000000000000000ec000000000000000000000000ec000000000000000000000000ec000000000000000000000000e0000000000000000000000000d5000000000000000000000000e0000000000000000000000000e0000000000000000000000000e0000000000000000000000000e0000000000000000000000000cb000000000000000000000000c9000000000000000000000000cb000000000000000000000000c9000000000000000000000000cb000000000000000000000000c9000000000000000000000000cb000000000000000000000000c90000000000000000000000000000000000000000010000000900001264f000010014a4000067648a1e0d000b0f000324030a26010b460600612403676426332000000b0f000324030f8400005e8400006124036764263320000b0f000324030a26000b4605006124036764263320000007000003240361240367642633200000171d0d00007d0d0000bb0d0000bc0d0000f90d0000fa0d00004a0e00004b0e0000dd0e0000de0e0000df0e0000ea0e0000eb0e0000f90e0000fa0e00008b1000008c1000008d1000008f10000090100000921000009310000095100000961000009810000099100000ecddc8ddc8ddb3ecb3a39384756675574f4b4f4b4f4b4f4b42000000111668ab3e4f003508816d4809047348090406166810332000000f036a000000001668103320005508011c1568263320001668824d9200434a1800614a18006d48090473480904001c1568ab3e4f001668a273e200434a1800614a18006d48090473480904001c1568ab3e4f001668b34a7700434a1800614a18006d48090473480904001c1568ab3e4f001668d7056800434a1800614a18006d48090473480904001f1568ab3e4f001668b34a7700350881434a1800614a18006d480904734809041f1568ab3e4f0016687633e400350881434a1800614a18006d48090473480904281568ab3e4f00166862053900350881422a01434a1800614a18006d4809047068000000007348090400281568ab3e4f0016689c077700350881422a01434a1800614a18006d48090470680000000073480904001c1568ab3e4f00166862053900434a1800614a18006d4809047348090400251568ab3e4f00166862053900422a01434a1800614a18006d4809047068000000007348090400199810000099100000ab100000bd100000e3100000f1100000131100001411000015110000161100001711000018110000fa000000000000000000000000fa000000000000000000000000fa000000000000000000000000fa000000000000000000000000fa000000000000000000000000f2000000000000000000000000ea000000000000000000000000e2000000000000000000000000e0000000000000000000000000e0000000000000000000000000d40000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000b0f000324030f8400005e84000061240367642633200000010000000713000324016124016764a6607e00000711000324026124026764fb28bc00000711000324016124016764fb28bc00000411006764fb28bc00000b99100000e2100000e3100000e4100000ea100000ed100000f0100000f110000012110000131100001411000015110000161100001711000018110000f3e7ded5def3e7c0aba796a7928300000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000001c1568263320001668824d9200434a1800614a18006d48090473480904000616681033200000211568f126be001668e24d1e00422a0f434a10006d4809047068808080007348090406166850636d0000281568103320001668fb28bc00350881422a01434a1c00614a1c006d48090470680000000073480904002815681033200016686c0a0a00350881422a01434a1c00614a1c006d4809047068000000007348090400111668ab3e4f003508816d480904734809041116686c0a0a003508816d480904734809041715686c0a0a001668fb28bc003508816d480904734809041715686c0a0a0016686c0a0a003508816d48090473480904000e3200319068013a707633e4001fb0822e20b0c64121b0890522b0520323901c0124901c0125b0000017b0c40218b0c4020c90c402000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000a0616001200010073010f0007000300030003000000040008000000980000009e0000009e0000009e0000009e0000009e0000009e0000009e0000009e0000003606000036060000360600003606000036060000360600003606000036060000360600007602000076020000760200007602000076020000760200007602000076020000760200003606000036060000360600003606000036060000360600003e020000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000a80000003606000036060000160000003606000036060000360600003606000036060000360600003606000036060000b800000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000068010000480100003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000360600003606000036060000b0030000360600003206000018000000c0030000d0030000e0030000f003000000040000100400002004000030040000400400005004000060040000700400008004000090040000c0030000d0030000e0030000f003000000040000100400003206000028020000d8010000e80100002004000030040000400400005004000060040000700400008004000090040000c0030000d0030000e0030000f003000000040000100400002004000030040000400400005004000060040000700400008004000090040000c0030000d0030000e0030000f003000000040000100400002004000030040000400400005004000060040000700400008004000090040000c0030000d0030000e0030000f003000000040000100400002004000030040000400400005004000060040000700400008004000090040000c0030000d0030000e0030000f003000000040000100400002004000030040000400400005004000060040000700400008004000090040000c0030000d0030000e0030000f0030000000400001004000020040000300400004004000050040000600400007004000080040000900400003801000058010000f80100000802000018020000560200007e02000090020000a0020000b0020000c0020000d002000080020000e0020000f00200000003000010030000200300003003000040030000e0020000f00200000003000010030000200300003003000040030000e0020000f00200000003000010030000200300003003000040030000e0020000f00200000003000010030000200300003003000040030000e0020000f00200000003000010030000200300003003000040030000e0020000f00200000003000010030000200300003003000040030000e0020000f00200000003000010030000200300003003000040030000e0020000f00200000003000010030000200300003003000040030000e0020000f00200000003000010030000200300003003000040030000e0020000f00200000003000010030000200300003003000040030000e0020000f00200000003000010030000200300003003000040030000e0020000f00200000003000010030000200300003003000040030000e0020000f00200000003000010030000200300003003000040030000e0020000f00200000003000010030000200300003003000040030000200000004f4a0300504a0300514a03005f4801046d4809346e4809347348093474480934000000004a000060f1ff02004a000c100000d7056800000006004e006f0072006d0061006c0000000c00000012641401010014a4c8001800434a16005f480104614a16006d482204734822047448090400000000000000000000000000000000000044004120f2ffa10044000c0d00000000000010001600440065006600610075006c0074002000500061007200610067007200610070006800200046006f006e0074000000000052006900f3ffb30052000c0d00000000000030060c005400610062006c00650020004e006f0072006d0061006c0000001c0017f603000034d60600010a036c0034d60600010503000061f603000002000b00000028006b20f4ffc1002800000d000000000000300607004e006f0020004c00690073007400000002000c00000000004000b3400100f20040000c100000d705680020020e004c006900730074002000500061007200610067007200610070006800000009000f005e84d0026d240100000074009a00b300030174000c0000008a1e0d00b0030a005400610062006c00650020004700720069006400000037003a56100013d630000000ff04010000000000ff04010000000000ff04010000000000ff04010000000000ff04010000000000ff04010000000c0010001264f000010014a4000000003e001f40010012013e000c0812008a1e0d00300606004800650061006400650072000000170011001264f000010014a4000015c6080002d312a72501020000002e00fe0fa20021012e000c0011008a1e0d0030060b0048006500610064006500720020004300680061007200000000003e002040010032013e000c0814008a1e0d003006060046006f006f007400650072000000170013001264f000010014a4000015c6080002d312a72501020000002e00fe0fa20041012e000c0013008a1e0d0030060b0046006f006f00740065007200200043006800610072000000000036005520f2ff510136000c080000e24d1e0030060900480079007000650072006c0069006e006b0000000c003e2a01422a0070680000ff00504b030414000600080000002100e9de0fbfff0000001c020000130000005b436f6e74656e745f54797065735d2e786d6cac91cb4ec3301045f748fc83e52d4a9cb2400825e982c78ec7a27cc0c8992416c9d8b2a755fbf74cd25442a820166c2cd933f79e3be372bd1f07b5c3989ca74aaff2422b24eb1b475da5df374fd9ad5689811a183c61a50f98f4babebc2837878049899a52a57be670674cb23d8e90721f90a4d2fa3802cb35762680fd800ecd7551dc18eb899138e3c943d7e503b6b01d583deee5f99824e290b4ba3f364eac4a430883b3c092d4eca8f946c916422ecab927f52ea42b89a1cd59c254f919b0e85e6535d135a8de20f20b8c12c3b00c895fcf6720192de6bf3b9e89ecdbd6596cbcdd8eb28e7c365ecc4ec1ff1460f53fe813d3cc7f5b7f020000ffff0300504b030414000600080000002100a5d6a7e7c0000000360100000b0000005f72656c732f2e72656c73848fcf6ac3300c87ef85bd83d17d51d2c31825762fa590432fa37d00e1287f68221bdb1bebdb4fc7060abb0884a4eff7a93dfeae8bf9e194e720169aaa06c3e2433fcb68e1763dbf7f82c985a4a725085b787086a37bdbb55fbc50d1a33ccd311ba548b63095120f88d94fbc52ae4264d1c910d24a45db3462247fa791715fd71f989e19e0364cd3f51652d73760ae8fa8c9ffb3c330cc9e4fc17faf2ce545046e37944c69e462a1a82fe353bd90a865aad41ed0b5b8f9d6fd010000ffff0300504b0304140006000800000021006b799616830000008a0000001c0000007468656d652f7468656d652f7468656d654d616e616765722e786d6c0ccc4d0ac3201040e17da17790d93763bb284562b2cbaebbf600439c1a41c7a0d29fdbd7e5e38337cedf14d59b4b0d592c9c070d8a65cd2e88b7f07c2ca71ba8da481cc52c6ce1c715e6e97818c9b48d13df49c873517d23d59085adb5dd20d6b52bd521ef2cdd5eb9246a3d8b4757e8d3f729e245eb2b260a0238fd010000ffff0300504b030414000600080000002100aa5225dfc60600008b1a0000160000007468656d652f7468656d652f7468656d65312e786d6cec595d8bdb46147d2ff43f08bd3bfe92fcb1c41b6cd9ceb6d94d42eca4e4716c8fadc98e344633de8d0981923c160aa569e943037deb43691b48a02fe9afd936a54d217fa17746b63c638fbb9b2585a5640d8b343af7ce997bafce1d4997afdc8fa87384134e58dc708b970aae83e3211b9178d2706ff7bbb99aeb7081e211a22cc60d778eb97b65f7c30f2ea31d11e2083b601ff31dd4704321a63bf93c1fc230e297d814c7706dcc920809384d26f951828ec16f44f3a542a1928f10895d274611b8bd311e932176fad2a5bbbb74dea1701a0b2e078634e949d7d8b050d8d1615122f89c0734718e106db830cf881df7f17de13a147101171a6e41fdb9f9ddcb79b4b330a2628bad66d7557f0bbb85c1e8b0a4e64c26836c52cff3bd4a33f3af00546ce23ad54ea553c9fc29001a0e61a52917dda7dfaab7dafe02ab81d2438bef76b55d2e1a78cd7f798373d3973f03af40a97f6f03dfed06104503af4029dedfc07b5eb51478065e81527c65035f2d34db5ed5c02b5048497cb8812ef89572b05c6d061933ba6785d77daf5b2d2d9caf50500d5975c929c62c16db6a2d42f758d2058004522448ec88f9148fd110aa3840940c12e2ec93490885374531e3305c2815ba8532fc973f4f1da988a01d8c346bc90b98f08d21c9c7e1c3844c45c3fd18bcba1ae4cdcb1fdfbc7cee9c3c7a71f2e89793c78f4f1efd9c3a32acf6503cd1ad5e7fffc5df4f3f75fe7afeddeb275fd9f15cc7fffed367bffdfaa51d082b5d85e0d5d7cffe78f1ecd5379ffff9c3130bbc99a0810eef930873e73a3e766eb10816a6426032c783e4ed2cfa2122ba45339e701423398bc57f478406fafa1c5164c1b5b019c13b09488c0d787576cf20dc0b939920168fd7c2c8001e30465b2cb146e19a9c4b0b737f164fec9327331d770ba123dbdc018a8dfc766653d05662731984d8a07993a258a0098eb170e4357688b16575770931e27a408609e36c2c9cbbc46921620d499f0c8c6a5a19ed9108f232b711847c1bb139b8e3b418b5adba8d8f4c24dc15885ac8f73135c27815cd048a6c2efb28a27ac0f791086d247bf364a8e33a5c40a6279832a733c29cdb6c6e24b05e2de9d7405eec693fa0f3c84426821cda7cee23c674649b1d06218aa6366c8fc4a18efd881f428922e7261336f80133ef10790e7940f1d674df21d848f7e96a701b9455a7b42a107965965872791533a37e7b733a4658490d08bfa1e711894f15f73559f7ff5b5907217df5ed53cbaa2eaaa0371362bda3f6d6647c1b6e5dbc03968cc8c5d7ee369ac53731dc2e9b0decbd74bf976ef77f2fdddbeee7772fd82b8d06f9965bc574abae36eed1d67dfb9850da13738af7b9daba73e84ca32e0c4a3bf5cc8ab3e7b8690887f24e86090cdc2441cac64998f88488b017a229ecef8bae7432e10bd713ee4c19876dbf1ab6fa96783a8b0ed8287d5c2d16e5a3692a1e1c89d578c1cfc6e15143a4e84a75f50896b9576c27ea51794940dabe0d096d329344d942a2ba1c9441520fe610340b09b5b277c2a26e615193ee97a9da6001d4b2acc0d6c9810d57c3f53d30012378a242148f649ed2542fb3ab92f92e33bd2d984605c03e625901ab4cd725d7adcb93ab4b4bed0c99364868e566925091513d8c87688417d52947cf42e36d735d5fa5d4a02743a1e683d25ad1a8d6fe8dc579730d76ebda40635d2968ec1c37dc4ad9879219a269c31dc3633f1c4653a81d2eb7bc884ee0ddd95024e90d7f1e6599265cb4110fd3802bd149d5202202270e2551c395cbcfd24063a5218a5bb104827061c9d541562e1a3948ba99643c1ee3a1d0d3ae8dc848a7a7a0f0a95658af2af3f383a5259b41ba7be1e8d819d059720b4189f9d5a20ce0887078fb534ca33922f03a3313b255fdad35a685eceaef13550da5e3884e43b4e828ba98a77025e5191d7596c5403b5bac1902aa8564d1080713d960f5a01add34eb1a2987ad5df7742319394d34573dd35015d935ed2a66ccb06c036bb13c5f93d7582d430c9aa677f854bad725b7bed4bab57d42d62520e059fc2c5df70c0d41a3b69acca026196fcab0d4ecc5a8d93b960b3c85da599a84a6fa95a5dbb5b8653dc23a1d0c9eabf383dd7ad5c2d078b9af549156df3df44f136c700fc4a30d2f81675470954af8f09020d810f5d49e24950db845ee8bc5ad0147ce2c210df741c16f7a41c90f72859adfc97965af90abf9cd72aee9fbe562c72f16daadd243682c228c8a7efacda50bafa2e87cf1e5458d6f7c7d89966fdb2e0d599467eaeb4a5e11575f5f8aa5ed5f5f1c02a2f3a052ead6cbf55625572f37bb39afddaae5ea41a5956b57826abbdb0efc5abdfbd0758e14d86b9603afd2a9e52ac520c8799582a45fabe7aa5ea9d4f4aacd5ac76b3e5c6c6360e5a97c2c6201e155bc76ff010000ffff0300504b0304140006000800000021000dd1909fb60000001b010000270000007468656d652f7468656d652f5f72656c732f7468656d654d616e616765722e786d6c2e72656c73848f4d0ac2301484f78277086f6fd3ba109126dd88d0add40384e4350d363f2451eced0dae2c082e8761be9969bb979dc9136332de3168aa1a083ae995719ac16db8ec8e4052164e89d93b64b060828e6f37ed1567914b284d262452282e3198720e274a939cd08a54f980ae38a38f56e422a3a641c8bbd048f7757da0f19b017cc524bd62107bd5001996509affb3fd381a89672f1f165dfe514173d9850528a2c6cce0239baa4c04ca5bbabac4df000000ffff0300504b01022d0014000600080000002100e9de0fbfff0000001c0200001300000000000000000000000000000000005b436f6e74656e745f54797065735d2e786d6c504b01022d0014000600080000002100a5d6a7e7c0000000360100000b00000000000000000000000000300100005f72656c732f2e72656c73504b01022d00140006000800000021006b799616830000008a0000001c00000000000000000000000000190200007468656d652f7468656d652f7468656d654d616e616765722e786d6c504b01022d0014000600080000002100aa5225dfc60600008b1a00001600000000000000000000000000d60200007468656d652f7468656d652f7468656d65312e786d6c504b01022d00140006000800000021000dd1909fb60000001b0100002700000000000000000000000000d00900007468656d652f7468656d652f5f72656c732f7468656d654d616e616765722e786d6c2e72656c73504b050600000000050005005d010000cb0a000000003c3f786d6c2076657273696f6e3d22312e302220656e636f64696e673d225554462d3822207374616e64616c6f6e653d22796573223f3e0d0a3c613a636c724d617020786d6c6e733a613d22687474703a2f2f736368656d61732e6f70656e786d6c666f726d6174732e6f72672f64726177696e676d6c2f323030362f6d61696e22206267313d226c743122207478313d22646b3122206267323d226c743222207478323d22646b322220616363656e74313d22616363656e74312220616363656e74323d22616363656e74322220616363656e74333d22616363656e74332220616363656e74343d22616363656e74342220616363656e74353d22616363656e74352220616363656e74363d22616363656e74362220686c696e6b3d22686c696e6b2220666f6c486c696e6b3d22666f6c486c696e6b222f3e00000000180900001900001c00000000ffffffff00000000030000000600000006000000090000000c0000000c0000000c00000088000000880000008a0000008a0000008a0000008d000000000800001d0d00009910000018110000090000000b0000000d0000000008000098100000181100000a0000000c0000000f0000f04c000000000006f01800000002040000020000000100000001000000010000000200000023000bf00c00000086c100000000c5c10000000040001ef110000000ffff00000000ff0080808000f7000010000f0002f092000000100008f00800000001000000010400000f0003f0300000000f0004f028000000010009f0100000000000000000000000000000000000000002000af00800000000040000050000000f0004f04200000012000af00800000001040000000e000053000bf01e000000bf0100001000cb0100000000ff01000008000403090000003f0301000100000011f0040000000100000000000000d7020000e00200008c0800008e0800008f08000091080000920800009408000095080000970800009808000099080000a1080000a5080000aa08000016090000190900000700040007000700020007000200070002000700020007001c0007001c0007000200000000008c0800008e0800008f08000091080000920800009408000095080000970800009808000016090000190900000700070002000700020007000200070002000700020000000000d7020000e00200008a0800008a0800008c0800008e0800008f080000910800009208000094080000950800009708000098080000e2080000e3080000f0080000f10800001209000016090000190900000300040003000400030007000200070002000700020007000200040007000400070004000700020006003c7e1f030edf9a9bff0fff0fff0fff0fff0fff0fff0fff0fff0f0000005a4c0586cb94edff0fff0fff0fff0fff0fff0fff0fff0fff0f1000172ef21c0cadecc8ff0fff0fff0fff0fff0fff0fff0fff0fff0f10006516a933940e0686ff0fff0fff0fff0fff0fff0fff0fff0fff0f1000da2b656526cea636ff0fff0fff0fff0fff0fff0fff0fff0fff0f1000054e566dde04c2e5ff0fff0fff0fff0fff0fff0fff0fff0fff0f1000010000000000010000000000000000000000000000000000031000000f846801118498fe5e846801608498fe6f280001000000010000000000010300000000000000000000000000000000031000000f842c04118498fe5e842c04608498fe6f2800030000002e000100010000000000010305000000000000000000000000000000031000000f845808118430fd5e845808608430fd6f2800050000002e0001002e000200010000000000010305070000000000000000000000000000031000000f841c0b118430fd5e841c0b608430fd6f2800070000002e0001002e0002002e000300010000000000010305070900000000000000000000000000031000000f84480f1184c8fb5e84480f6084c8fb6f2800090000002e0001002e0002002e0003002e00040001000000000001030507090b000000000000000000000000031000000f840c121184c8fb5e840c126084c8fb6f28000b0000002e0001002e0002002e0003002e0004002e00050001000000000001030507090b0d0000000000000000000000031000000f843816118460fa5e843816608460fa6f28000d0000002e0001002e0002002e0003002e0004002e0005002e00060001000000000001030507090b0d0f00000000000000000000031000000f84fc18118460fa5e84fc18608460fa6f28000f0000002e0001002e0002002e0003002e0004002e0005002e0006002e00070001000000000001030507090b0d0f11000000000000000000031000000f84c01b118460fa5e84c01b608460fa6f2800110000002e0001002e0002002e0003002e0004002e0005002e0006002e0007002e000800010000000000010000000000000000000000000000000000001000000f84d002118498fe5e84d002608498fe020000002e00010000000480010000000000000000000000000000000000001000000f84a005118498fe5e84a005608498fe020001002e00010000000282010000000000000000000000000000000000001000000f84700811844cff5e84700860844cff020002002e00010000000080010000000000000000000000000000000000001000000f84400b118498fe5e84400b608498fe020003002e00010000000480010000000000000000000000000000000000001000000f84100e118498fe5e84100e608498fe020004002e00010000000282010000000000000000000000000000000000001000000f84e01011844cff5e84e01060844cff020005002e00010000000080010000000000000000000000000000000000001000000f84b013118498fe5e84b013608498fe020006002e00010000000480010000000000000000000000000000000000001000000f848016118498fe5e848016608498fe020007002e00010000000282010000000000000000000000000000000000001000000f84501911844cff5e84501960844cff020008002e00010000000000010000000000000000000000000000000000001000000f84d002118498fe5e84d002608498fe020000002e00010000000480010000000000000000000000000000000000001000000f84a005118498fe5e84a005608498fe020001002e00010000000282010000000000000000000000000000000000001000000f84700811844cff5e84700860844cff020002002e00010000000080010000000000000000000000000000000000001000000f84400b118498fe5e84400b608498fe020003002e00010000000480010000000000000000000000000000000000001000000f84100e118498fe5e84100e608498fe020004002e00010000000282010000000000000000000000000000000000001000000f84e01011844cff5e84e01060844cff020005002e00010000000080010000000000000000000000000000000000001000000f84b013118498fe5e84b013608498fe020006002e00010000000480010000000000000000000000000000000000001000000f848016118498fe5e848016608498fe020007002e00010000000282010000000000000000000000000000000000001000000f84501911844cff5e84501960844cff020008002e000100000017000000000000000000000000000000000000000b1000000f84d002118498fe5e84d002608498fe4f4a0100514a01006f28000100b7f00100000017800000000000000000000000000000000000000f1000000f84a005118498fe5e84a005608498fe4f4a0400514a04005e4a04006f280001006f000100000017800000000000000000000000000000000000000b1000000f847008118498fe5e847008608498fe4f4a0500514a05006f28000100a7f00100000017800000000000000000000000000000000000000b1000000f84400b118498fe5e84400b608498fe4f4a0100514a01006f28000100b7f00100000017800000000000000000000000000000000000000f1000000f84100e118498fe5e84100e608498fe4f4a0400514a04005e4a04006f280001006f000100000017800000000000000000000000000000000000000b1000000f84e010118498fe5e84e010608498fe4f4a0500514a05006f28000100a7f00100000017800000000000000000000000000000000000000b1000000f84b013118498fe5e84b013608498fe4f4a0100514a01006f28000100b7f00100000017800000000000000000000000000000000000000f1000000f848016118498fe5e848016608498fe4f4a0400514a04005e4a04006f280001006f000100000017800000000000000000000000000000000000000b1000000f845019118498fe5e845019608498fe4f4a0500514a05006f28000100a7f0010000001700000000000000000000000000000000000000131000000f846801118498fe5e846801608498fe434a16004f4a0100514a0100614a16006f28000100b7f00100000017800000000000000000000000000000000000000f1000000f843804118498fe5e843804608498fe4f4a0400514a04005e4a04006f280001006f000100000017800000000000000000000000000000000000000b1000000f840807118498fe5e840807608498fe4f4a0500514a05006f28000100a7f00100000017800000000000000000000000000000000000000b1000000f84d809118498fe5e84d809608498fe4f4a0100514a01006f28000100b7f00100000017800000000000000000000000000000000000000f1000000f84a80c118498fe5e84a80c608498fe4f4a0400514a04005e4a04006f280001006f000100000017800000000000000000000000000000000000000b1000000f84780f118498fe5e84780f608498fe4f4a0500514a05006f28000100a7f00100000017800000000000000000000000000000000000000b1000000f844812118498fe5e844812608498fe4f4a0100514a01006f28000100b7f00100000017800000000000000000000000000000000000000f1000000f841815118498fe5e841815608498fe4f4a0400514a04005e4a04006f280001006f000100000017800000000000000000000000000000000000000b1000000f84e817118498fe5e84e817608498fe4f4a0500514a05006f28000100a7f0010000001700000000000000000000000000000000000000131000000f846801118498fe5e846801608498fe434a16004f4a0100514a0100614a16006f28000100b7f00100000017800000000000000000000000000000000000000f1000000f843804118498fe5e843804608498fe4f4a0400514a04005e4a04006f280001006f000100000017800000000000000000000000000000000000000b1000000f840807118498fe5e840807608498fe4f4a0500514a05006f28000100a7f00100000017800000000000000000000000000000000000000b1000000f84d809118498fe5e84d809608498fe4f4a0100514a01006f28000100b7f00100000017800000000000000000000000000000000000000f1000000f84a80c118498fe5e84a80c608498fe4f4a0400514a04005e4a04006f280001006f000100000017800000000000000000000000000000000000000b1000000f84780f118498fe5e84780f608498fe4f4a0500514a05006f28000100a7f00100000017800000000000000000000000000000000000000b1000000f844812118498fe5e844812608498fe4f4a0100514a01006f28000100b7f00100000017800000000000000000000000000000000000000f1000000f841815118498fe5e841815608498fe4f4a0400514a04005e4a04006f280001006f000100000017800000000000000000000000000000000000000b1000000f84e817118498fe5e84e817608498fe4f4a0500514a05006f28000100a7f0060000006516a933000000000000000000000000172ef21c000000000000000000000000005a4c05000000000000000000000000da2b6565000000000000000000000000054e566d0000000000000000000000003c7e1f03000000000000000000000000ffffffffffffffffffffffffffffffffffffffffffffffffffff06000000000000000000000000000000ffff06000000000012000f002204190022041b0022040f002204190022041b0022040f002204190022041b00220412000f002204190022041b0022040f002204190022041b0022040f002204190022041b002204120001002204030022040500220401002204030022040500220401002204030022040500220412009618de25030022040500220401002204030022040500220401002204030022040500220412005e951e2303002204050022040100220403002204050022040100220403002204050022040200307cd80f0000000000000000000102000200d91a4a390000000000000000000102000200480000000400000008000000e50000000000000019000000de74040038050800a02708006c0a0a0057600c008a1e0d0063670e0087111200ab1b1600c979160037311d00e24d1e001033200026332000fb212d00447e3000620539006c783d00a1604300110b4400ef654400aa1346004c3d46001a3e48003a67490058384c00ab3e4f008566510034715300fc455400101e550035495600eb445900e0225a007b316000de236400d70568003a4b690050636d00d42e76009c077700b34a770059247b00a6607e0015267f00b049800068318e00824d9200be299300551e9e00c55b9e00ed489f00ab74a8002542ac00014aba00e87aba00fb28bc00f126be002e2bbf000461c700711cca000760ca00f607cf00a24adb00a273e2007633e4006062e7007e63ea00ea54eb006a34ec005330f500c04df700000000008c0800008e0800000000000001000000ff4001800000e0020000e00200000000000001000100e002000002000000e00200000000000002100000000000000018090000c800001000400000ffff01000000070055006e006b006e006f0077006e00ffff0100080000000000000000000000ffff010000000000ffff00000200ffff00000000ffff00000200ffff0000000007000000471e9001000002020603050405020304ff2e00e0437800c00900000000000000ff01000000000000540069006d006500730020004e0065007700200052006f006d0061006e000000351e9001020005050102010706020507000000000000001000000000000000000000008000000000530079006d0062006f006c000000332e90010000020b0604020202020204ff2e00e0437800c00900000000000000ff0100000000000041007200690061006c000000372e90010000020f0502020204030204ff0200e0ffac004001000000000000009f01000000000000430061006c00690062007200690000003f3d9001000002070309020205020404ff2e00e0437800c00900000000000000ff0100000000000043006f007500720069006500720020004e006500770000003b0e9001020005000000000000000000000000000000001000000000000000000000008000000000570069006e006700640069006e00670073000000411e9001000002040503050406030204ff0200e0ff24004200000000000000009f01000000000000430061006d00620072006900610020004d006100740068000000220004007108881800f0c4020000a90100000000ead3312772cb46c70000000009007e0000004601000046070000010004000000040003900f00000046010000460700000100040000000f00000000000000210300f0100000000100000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000089051c01b400b400818172300000000000000000000000000000880800008808000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000002000000000000000000044b835100f010000800fcfd010000000000000000000000000000000000000000000000000848500000000009f0ff0f000924500000e3040000ffffff7fffffff7fffffff7fffffff7fffffff7fffffff7fffffff7ffb212d0000040000320000000000000000000000000000000000000000002104000000000000000000000000000000000000101c00000600000000000000000078000000780000000000000000000000a0050000000000000b00000000000000dc00000001000000ffff12000000000000001900500072006f006a006500630074002000500072006f0070006f00730061006c002000540065006d0070006c0061007400650000001900500072006f006a006500630074002000500072006f0070006f00730061006c002000540065006d0070006c0061007400650000000d007700770077002e00630061007300750061006c002e0070006d0004004100630065007200000000000000000000000000000000000000000024000000060000000600000000000c0001000c0002000c0003000c0004000c0005000c000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000feff0000060202000000000000000000000000000000000001000000e0859ff2f94f6810ab9108002b27b3d93000000090010000100000000100000088000000020000009000000003000000b400000004000000c000000005000000d800000007000000fc00000008000000100100000900000020010000120000002c0100000a0000004c0100000c000000580100000d000000640100000e000000700100000f000000780100001000000080010000130000008801000002000000e40400001e0000001c00000050726f6a6563742050726f706f73616c2054656d706c6174650000001e00000004000000000000001e000000100000007777772e63617375616c2e706d0000001e0000001c00000050726f6a6563742050726f706f73616c2054656d706c6174650000001e0000000c0000004e6f726d616c2e646f746d001e0000000800000041636572000000001e00000004000000390000001e000000180000004d6963726f736f6674204f666669636520576f72640000004000000000741c9a1100000040000000009475913b39d0014000000000f42d69a5ced1010300000001000000030000004601000003000000460700000300000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000feff000006020200000000000000000000000000000000000100000002d5cdd59c2e1b10939708002b2cf9ae30000000280100000c00000001000000680000000f00000070000000050000007c0000000600000084000000110000008c00000017000000940000000b0000009c00000010000000a400000013000000ac00000016000000b40000000d000000bc0000000c000000e700000002000000e9fd00001e0000000400000000000000030000000f000000030000000400000003000000880800000300000000000f000b000000000000000b000000000000000b000000000000000b000000000000001e100000020000001a00000050726f6a6563742050726f706f73616c2054656d706c6174650001000000000c100000040000001e000000060000005469746c650003000000010000001e00000011000000d09dd0b0d0b7d0b2d0b0d0bdd0b8d0b5000300000001000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000100000002000000030000000400000005000000060000000700000008000000090000000a0000000b0000000c0000000d0000000e000000feffffff100000001100000012000000130000001400000015000000160000001700000018000000190000001a0000001b0000001c0000001d0000001e0000001f00000020000000210000002200000023000000240000002500000026000000feffffff28000000290000002a0000002b0000002c0000002d0000002e000000feffffff30000000310000003200000033000000340000003500000036000000fefffffffdffffff39000000fefffffffefffffffeffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff52006f006f007400200045006e00740072007900000000000000000000000000000000000000000000000000000000000000000000000000000000000000000016000501ffffffffffffffff030000000609020000000000c00000000000004600000000000000000000000080db7a69a5ced1013b000000800000000000000031005400610062006c006500000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000e000201ffffffff05000000ffffffff0000000000000000000000000000000000000000000000000000000000000000000000000f000000842e00000000000057006f007200640044006f00630075006d0065006e007400000000000000000000000000000000000000000000000000000000000000000000000000000000001a00020101000000ffffffffffffffff00000000000000000000000000000000000000000000000000000000000000000000000000000000341c0000000000000500530075006d006d0061007200790049006e0066006f0072006d006100740069006f006e000000000000000000000000000000000000000000000000000000280002010200000004000000ffffffff000000000000000000000000000000000000000000000000000000000000000000000000270000000010000000000000050044006f00630075006d0065006e007400530075006d006d0061007200790049006e0066006f0072006d006100740069006f006e000000000000000000000038000201ffffffffffffffffffffffff0000000000000000000000000000000000000000000000000000000000000000000000002f0000000010000000000000010043006f006d0070004f0062006a0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000012000200ffffffffffffffffffffffff0000000000000000000000000000000000000000000000000000000000000000000000000000000072000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000ffffffffffffffffffffffff0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000ffffffffffffffffffffffff00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000001000000feffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0100feff030a0000ffffffff0609020000000000c000000000000046200000004d6963726f736f667420576f72642039372d3230303320446f63756d656e74000a0000004d53576f7264446f630010000000576f72642e446f63756d656e742e3800f439b2710000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, '2016-07-13 06:43:41');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
