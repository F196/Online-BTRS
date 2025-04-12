-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2025 at 07:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busticketmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `BusID` int(11) NOT NULL,
  `BusNumber` varchar(50) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `MaintenanceStatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`BusID`, `BusNumber`, `Capacity`, `MaintenanceStatus`) VALUES
(1, 'KBA 001A', 33, 'Out of Service'),
(2, 'KBA 002B', 45, 'Under Maintenance'),
(3, 'KBA 003C', 51, 'Operational'),
(4, 'KBA 004D', 60, 'Operational'),
(5, 'KBA 005E', 40, 'Needs Repair'),
(6, 'KBA 006F', 50, 'Under Maintenance'),
(7, 'KBA 007G', 33, 'Operational'),
(8, 'KBA 008H', 45, 'Operational'),
(9, 'KBA 009J', 51, 'Operational'),
(10, 'KBA 010K', 60, 'Operational'),
(11, 'KBA 011L', 40, 'Under Maintenance'),
(12, 'KBA 012M', 50, 'Operational'),
(13, 'KBA 013N', 33, 'Operational'),
(14, 'KBA 014P', 45, 'Under Maintenance'),
(15, 'KBA 015Q', 51, 'Operational'),
(16, 'KBA 016R', 60, 'Operational'),
(17, 'KBA 017S', 40, 'Operational'),
(18, 'KBA 018T', 50, 'Operational'),
(19, 'KBA 019U', 33, 'Under Maintenance'),
(20, 'KBA 020V', 45, 'Operational'),
(21, 'KBA 021W', 51, 'Operational'),
(22, 'KBA 022X', 60, 'Under Maintenance'),
(23, 'KBA 023Y', 40, 'Operational'),
(24, 'KBA 024Z', 50, 'Operational'),
(25, 'KBB 025A', 33, 'Operational'),
(26, 'KBB 026B', 45, 'Operational'),
(27, 'KBB 027C', 51, 'Under Maintenance'),
(28, 'KBB 028D', 60, 'Operational'),
(29, 'KBB 029E', 40, 'Operational'),
(30, 'KBB 030F', 50, 'Operational'),
(31, 'KBB 031G', 33, 'Operational'),
(32, 'KBB 032H', 45, 'Operational'),
(33, 'KBB 033J', 51, 'Under Maintenance'),
(34, 'KBB 034K', 60, 'Operational'),
(35, 'KBB 035L', 40, 'Operational'),
(36, 'KBB 036M', 50, 'Under Maintenance'),
(37, 'KBB 037N', 33, 'Operational'),
(38, 'KBB 038P', 45, 'Operational'),
(39, 'KBB 039Q', 51, 'Operational'),
(40, 'KBB 040R', 60, 'Operational'),
(41, 'KBB 041S', 40, 'Under Maintenance'),
(42, 'KBB 042T', 50, 'Operational'),
(43, 'KBB 043U', 33, 'Operational'),
(44, 'KBB 044V', 45, 'Under Maintenance'),
(45, 'KBB 045W', 51, 'Operational'),
(46, 'KBB 046X', 60, 'Operational'),
(47, 'KBB 047Y', 40, 'Operational'),
(48, 'KBB 048Z', 50, 'Operational'),
(49, 'KBC 049A', 33, 'Operational'),
(50, 'KBC 050B', 45, 'Under Maintenance'),
(51, 'KBC 051C', 51, 'Operational'),
(52, 'KBC 052D', 60, 'Operational'),
(53, 'KBC 053E', 40, 'Operational'),
(54, 'KBC 054F', 50, 'Under Maintenance'),
(55, 'KBC 055G', 33, 'Operational'),
(56, 'KBC 056H', 45, 'Operational'),
(57, 'KBC 057J', 51, 'Under Maintenance'),
(58, 'KBC 058K', 60, 'Operational'),
(59, 'KBC 059L', 40, 'Operational'),
(60, 'KBC 060M', 50, 'Under Maintenance'),
(61, 'KBC 061N', 33, 'Operational'),
(62, 'KBC 062P', 45, 'Operational'),
(63, 'KBC 063Q', 51, 'Operational'),
(64, 'KBC 064R', 60, 'Operational'),
(65, 'KBC 065S', 40, 'Under Maintenance'),
(66, 'KBC 066T', 50, 'Operational'),
(67, 'KBC 067U', 33, 'Operational'),
(68, 'KBC 068V', 45, 'Under Maintenance'),
(69, 'KBC 069W', 51, 'Operational'),
(70, 'KBC 070X', 60, 'Operational'),
(71, 'KBC 071Y', 40, 'Operational'),
(72, 'KBC 072Z', 50, 'Operational'),
(73, 'KBD 073A', 33, 'Operational'),
(74, 'KBD 074B', 45, 'Under Maintenance'),
(75, 'KBD 075C', 51, 'Operational'),
(76, 'KBD 076D', 60, 'Operational'),
(77, 'KBD 077E', 40, 'Operational'),
(78, 'KBD 078F', 50, 'Under Maintenance'),
(79, 'KBD 079G', 33, 'Operational'),
(80, 'KBD 080H', 45, 'Operational'),
(81, 'KBD 081J', 51, 'Under Maintenance'),
(82, 'KBD 082K', 60, 'Operational'),
(83, 'KBD 083L', 40, 'Operational'),
(84, 'KBD 084M', 50, 'Under Maintenance'),
(85, 'KBD 085N', 33, 'Operational'),
(86, 'KBD 086P', 45, 'Operational'),
(87, 'KBD 087Q', 51, 'Operational'),
(88, 'KBD 088R', 60, 'Operational'),
(89, 'KBD 089S', 40, 'Under Maintenance'),
(90, 'KBD 090T', 50, 'Operational'),
(91, 'KBD 091U', 33, 'Operational'),
(92, 'KBD 092V', 45, 'Under Maintenance'),
(93, 'KBD 093W', 51, 'Operational'),
(94, 'KBD 094X', 60, 'Operational'),
(95, 'KBD 095Y', 40, 'Operational'),
(96, 'KBD 096Z', 50, 'Operational'),
(97, 'KBE 097A', 33, 'Operational'),
(98, 'KBE 098B', 45, 'Under Maintenance'),
(99, 'KBE 099C', 51, 'Operational'),
(100, 'KBE 100D', 60, 'Operational'),
(101, 'KAD 771Y', 100, 'Out of Service'),
(102, 'KAV 771Q', 100, 'Needs Repair'),
(103, 'KAV 771A', 100, 'Out of Service');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `RouteID` int(11) DEFAULT NULL,
  `FeedbackText` text DEFAULT NULL,
  `FeedbackDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackID`, `UserID`, `RouteID`, `FeedbackText`, `FeedbackDate`) VALUES
(75, 3, 2, 'The journey was smooth and comfortable. Great service!', '2025-04-01 12:00:00'),
(76, 6, 2, 'Bus was clean, but the seats were a bit cramped.', '2025-04-01 13:00:00'),
(77, 7, 4, 'Arrived earlier than expected. Very punctual.', '2025-04-02 09:00:00'),
(78, 8, 4, 'Great service, but the driver was slightly rushed.', '2025-04-02 10:00:00'),
(79, 9, 6, 'Amazing experience, I enjoyed the journey!', '2025-04-01 18:00:00'),
(80, 10, 6, 'The bus was a bit late, but otherwise good service.', '2025-04-01 19:00:00'),
(81, 11, 7, 'Very professional service and comfortable bus.', '2025-04-02 11:30:00'),
(82, 12, 7, 'Satisfied with the journey. Keep it up!', '2025-04-02 12:00:00'),
(83, 13, 8, 'The ride was safe, and the staff were friendly.', '2025-04-01 15:00:00'),
(84, 14, 8, 'I wish there was better air conditioning.', '2025-04-01 16:00:00'),
(85, 15, 9, 'Had a pleasant journey. Thank you!', '2025-04-02 13:00:00'),
(86, 16, 9, 'Excellent service and timely arrival.', '2025-04-02 14:00:00'),
(87, 17, 10, 'Well-organized journey, very happy with the service.', '2025-04-01 20:00:00'),
(88, 18, 10, 'Comfortable seating and helpful staff.', '2025-04-01 21:00:00'),
(89, 19, 11, 'Loved the smooth ride. Will travel again.', '2025-04-02 17:00:00'),
(90, 20, 11, 'Could improve the cleanliness a bit.', '2025-04-02 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `LocationID` int(11) NOT NULL,
  `LocationName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`LocationID`, `LocationName`) VALUES
(1, 'Nairobi'),
(2, 'Mombasa'),
(3, 'Kisumu'),
(4, 'Nakuru'),
(5, 'Eldoret'),
(6, 'Thika'),
(7, 'Nyeri'),
(8, 'Meru'),
(9, 'Malindi'),
(10, 'Kitale'),
(11, 'Garissa'),
(12, 'Kakamega'),
(13, 'Kericho'),
(14, 'Nanyuki'),
(15, 'Machakos'),
(16, 'Embu'),
(17, 'Homa Bay'),
(18, 'Kisii'),
(19, 'Narok'),
(20, 'Lodwar'),
(21, 'Voi'),
(22, 'Marsabit'),
(23, 'Wajir'),
(24, 'Isiolo'),
(25, 'Mumias'),
(26, 'Busia'),
(27, 'Siaya'),
(28, 'Bungoma'),
(29, 'Chuka'),
(30, 'Migori'),
(31, 'Kapenguria'),
(32, 'Maralal'),
(33, 'Kilifi'),
(34, 'Lamu'),
(35, 'Kwale'),
(36, 'Taita Taveta'),
(37, 'Mandera'),
(38, 'Moyale'),
(39, 'Taveta'),
(40, 'Bomet'),
(41, 'Sotik'),
(42, 'Kajiado'),
(43, 'Namanga'),
(44, 'Karatina'),
(45, 'Maua'),
(46, 'Runyenjes'),
(47, 'Limuru'),
(48, 'Naivasha'),
(49, 'Gilgil'),
(50, 'Kapsabet'),
(51, 'Litein'),
(52, 'Kimilili'),
(53, 'Oyugis'),
(54, 'Wote'),
(55, 'Kabarnet'),
(56, 'Iten'),
(57, 'Mwingi'),
(58, 'Kibwezi'),
(59, 'Tala'),
(60, 'Kangundo'),
(61, 'Makindu'),
(62, 'Chogoria'),
(63, 'Ol Kalou'),
(64, 'Kerugoya'),
(65, 'Githunguri'),
(66, 'Kikuyu'),
(67, 'Ruiru'),
(68, 'Kiambu'),
(69, 'Karuri'),
(70, 'Ngong'),
(71, 'Molo'),
(72, 'Ol Kalou'),
(73, 'Nyahururu'),
(74, 'Samburu'),
(75, 'Rumuruti'),
(76, 'Mtito Andei'),
(77, 'Mbale'),
(78, 'Tarime'),
(79, 'Teso'),
(80, 'Ukunda'),
(81, 'Kipkelion'),
(82, 'Cheptais'),
(83, 'Sirare'),
(84, 'Isebania');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `NotificationID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Message` text DEFAULT NULL,
  `NotificationDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `ReservationID` int(11) NOT NULL,
  `BusID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `RouteID` int(11) DEFAULT NULL,
  `SeatNumber` int(11) NOT NULL,
  `ReservationDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`ReservationID`, `BusID`, `UserID`, `RouteID`, `SeatNumber`, `ReservationDate`) VALUES
(2, 2, NULL, NULL, 1, '2025-03-24 21:14:48'),
(118, 1, 3, 2, 1, '2025-04-01 08:00:00'),
(119, 2, 6, 2, 2, '2025-04-02 09:00:00'),
(120, 3, 7, 4, 3, '2025-04-01 10:00:00'),
(121, 4, 8, 4, 4, '2025-04-03 06:30:00'),
(122, 5, 9, 2, 5, '2025-04-03 08:45:00'),
(123, 6, 10, 4, 6, '2025-04-04 07:15:00'),
(124, 7, 11, 2, 7, '2025-04-01 09:00:00'),
(125, 8, 12, 2, 8, '2025-04-01 11:30:00'),
(126, 9, 13, 4, 9, '2025-04-02 12:45:00'),
(127, 10, 14, 4, 10, '2025-04-01 07:00:00'),
(128, 11, 15, 2, 11, '2025-04-03 06:45:00'),
(129, 12, 16, 2, 12, '2025-04-02 08:00:00'),
(130, 13, 17, 2, 13, '2025-04-03 09:30:00'),
(131, 14, 18, 4, 14, '2025-04-01 10:15:00'),
(132, 15, 19, 4, 15, '2025-04-02 11:00:00'),
(133, 16, 20, 4, 16, '2025-04-03 07:30:00'),
(134, 17, 21, 2, 17, '2025-04-02 06:15:00'),
(135, 18, 22, 2, 18, '2025-04-01 08:30:00'),
(136, 19, 23, 4, 19, '2025-04-04 09:45:00'),
(137, 20, 24, 2, 20, '2025-04-01 07:45:00'),
(138, 21, 25, 4, 21, '2025-04-02 08:00:00'),
(139, 22, 26, 2, 22, '2025-04-03 06:45:00'),
(140, 23, 27, 4, 23, '2025-04-01 09:30:00'),
(141, 24, 28, 2, 24, '2025-04-02 12:00:00'),
(142, 25, 29, 4, 25, '2025-04-03 08:15:00'),
(143, 26, 30, 2, 26, '2025-04-01 10:45:00'),
(144, 27, 31, 4, 27, '2025-04-03 09:00:00'),
(145, 28, 32, 2, 28, '2025-04-02 11:15:00'),
(146, 29, 33, 4, 29, '2025-04-01 08:30:00'),
(147, 30, 34, 2, 30, '2025-04-03 07:00:00'),
(148, 31, 3, 2, 31, '2025-04-01 09:00:00'),
(149, 32, 6, 4, 32, '2025-04-01 10:00:00'),
(150, 33, 7, 4, 33, '2025-04-03 06:30:00'),
(151, 34, 8, 2, 34, '2025-04-01 08:45:00'),
(152, 35, 9, 2, 35, '2025-04-02 07:15:00'),
(153, 36, 10, 4, 36, '2025-04-04 07:00:00'),
(154, 37, 11, 2, 37, '2025-04-01 11:30:00'),
(155, 38, 12, 4, 38, '2025-04-01 08:00:00'),
(156, 39, 13, 4, 39, '2025-04-02 10:45:00'),
(157, 40, 14, 2, 40, '2025-04-01 06:30:00'),
(158, 41, 15, 4, 41, '2025-04-03 06:45:00'),
(159, 42, 16, 2, 42, '2025-04-01 12:00:00'),
(160, 43, 17, 4, 43, '2025-04-03 08:15:00'),
(161, 44, 18, 4, 44, '2025-04-02 10:00:00'),
(162, 45, 19, 4, 45, '2025-04-01 11:00:00'),
(163, 46, 20, 2, 46, '2025-04-02 07:30:00'),
(164, 47, 21, 4, 47, '2025-04-01 06:15:00'),
(165, 48, 22, 4, 48, '2025-04-03 06:30:00'),
(166, 49, 23, 4, 49, '2025-04-02 08:00:00'),
(167, 50, 24, 2, 50, '2025-04-01 09:45:00'),
(215, 1, 3, 2, 51, '2025-03-25 09:00:00'),
(216, 2, 6, 2, 52, '2025-03-25 10:00:00'),
(217, 3, 7, 2, 53, '2025-03-25 11:00:00'),
(218, 4, 8, 2, 54, '2025-03-25 12:30:00'),
(219, 5, 9, 4, 55, '2025-04-02 11:30:00'),
(220, 6, 10, 4, 56, '2025-04-02 12:00:00'),
(221, 7, 11, 4, 57, '2025-04-02 12:30:00'),
(222, 8, 12, 4, 58, '2025-04-02 13:00:00'),
(223, 9, 13, 6, 59, '2025-04-01 08:30:00'),
(224, 10, 14, 6, 60, '2025-04-01 09:00:00'),
(225, 11, 15, 6, 61, '2025-04-01 09:30:00'),
(226, 12, 16, 6, 62, '2025-04-01 10:00:00'),
(227, 13, 17, 7, 63, '2025-04-01 09:30:00'),
(228, 14, 18, 7, 64, '2025-04-01 10:00:00'),
(229, 15, 19, 7, 65, '2025-04-01 10:30:00'),
(230, 16, 20, 7, 66, '2025-04-01 11:00:00'),
(231, 45, 22, 45, 97, '2025-04-03 08:30:00'),
(232, 46, 23, 45, 98, '2025-04-03 09:00:00'),
(233, 47, 24, 45, 99, '2025-04-03 09:30:00'),
(234, 48, 25, 45, 100, '2025-04-03 10:00:00'),
(235, 0, 20, 6, 9, '2025-03-31 20:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`RoleID`, `RoleName`) VALUES
(1, 'Admin'),
(2, 'Passenger');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `RouteID` int(11) NOT NULL,
  `DepartureLocation` varchar(100) NOT NULL,
  `ArrivalLocation` varchar(100) NOT NULL,
  `DepartureTime` datetime NOT NULL,
  `ArrivalTime` datetime NOT NULL,
  `BusID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`RouteID`, `DepartureLocation`, `ArrivalLocation`, `DepartureTime`, `ArrivalTime`, `BusID`) VALUES
(2, 'Gilgil', 'Thika', '2025-03-25 08:00:00', '2025-03-25 12:00:00', 101),
(4, 'Ruiru', 'Thika', '2025-04-02 10:45:00', '2025-04-01 11:00:00', 101),
(6, 'Nairobi', 'Mombasa', '2025-04-01 08:00:00', '2025-04-01 16:00:00', 1),
(7, 'Kisumu', 'Eldoret', '2025-04-01 09:30:00', '2025-04-01 11:30:00', 2),
(8, 'Nakuru', 'Nyeri', '2025-04-01 06:15:00', '2025-04-01 09:45:00', 3),
(9, 'Thika', 'Meru', '2025-04-01 10:00:00', '2025-04-01 14:30:00', 4),
(10, 'Malindi', 'Kitale', '2025-04-02 07:00:00', '2025-04-02 15:00:00', 5),
(11, 'Garissa', 'Kakamega', '2025-04-02 08:45:00', '2025-04-02 20:00:00', 6),
(12, 'Kericho', 'Nanyuki', '2025-04-01 07:30:00', '2025-04-01 11:45:00', 7),
(13, 'Machakos', 'Embu', '2025-04-01 12:00:00', '2025-04-01 14:30:00', 8),
(14, 'Homa Bay', 'Kisii', '2025-04-02 09:00:00', '2025-04-02 11:00:00', 9),
(15, 'Narok', 'Lodwar', '2025-04-03 06:00:00', '2025-04-03 18:00:00', 10),
(16, 'Voi', 'Marsabit', '2025-04-02 07:15:00', '2025-04-02 16:45:00', 11),
(17, 'Isiolo', 'Mumias', '2025-04-01 13:30:00', '2025-04-01 20:30:00', 12),
(18, 'Busia', 'Bungoma', '2025-04-03 09:00:00', '2025-04-03 11:30:00', 13),
(19, 'Mombasa', 'Kisumu', '2025-04-02 06:00:00', '2025-04-02 18:00:00', 14),
(20, 'Nyeri', 'Nairobi', '2025-04-03 07:30:00', '2025-04-03 11:00:00', 15),
(21, 'Meru', 'Eldoret', '2025-04-03 08:15:00', '2025-04-03 16:00:00', 16),
(22, 'Kakamega', 'Thika', '2025-04-04 06:45:00', '2025-04-04 13:00:00', 17),
(23, 'Kericho', 'Naivasha', '2025-04-02 09:30:00', '2025-04-02 12:45:00', 18),
(24, 'Eldoret', 'Mombasa', '2025-04-02 06:15:00', '2025-04-02 18:30:00', 19),
(25, 'Thika', 'Busia', '2025-04-01 07:00:00', '2025-04-01 15:00:00', 20),
(26, 'Kisumu', 'Garissa', '2025-04-03 08:45:00', '2025-04-03 20:15:00', 21),
(27, 'Nairobi', 'Nyeri', '2025-04-01 07:30:00', '2025-04-01 10:30:00', 22),
(28, 'Eldoret', 'Marsabit', '2025-04-01 06:45:00', '2025-04-01 20:00:00', 23),
(29, 'Voi', 'Homa Bay', '2025-04-02 06:00:00', '2025-04-02 13:30:00', 24),
(31, 'Kisii', 'Narok', '2025-04-02 06:30:00', '2025-04-02 11:45:00', 26),
(32, 'Lodwar', 'Ruiru', '2025-04-02 07:00:00', '2025-04-02 20:30:00', 27),
(33, 'Bungoma', 'Kitale', '2025-04-01 07:45:00', '2025-04-01 09:00:00', 28),
(34, 'Mumias', 'Nakuru', '2025-04-03 08:30:00', '2025-04-03 13:00:00', 29),
(35, 'Naivasha', 'Thika', '2025-04-01 10:00:00', '2025-04-01 12:30:00', 30),
(36, 'Nyeri', 'Meru', '2025-04-03 09:45:00', '2025-04-03 13:15:00', 31),
(37, 'Mombasa', 'Busia', '2025-04-02 08:15:00', '2025-04-02 19:45:00', 32),
(38, 'Thika', 'Nyeri', '2025-04-01 06:00:00', '2025-04-01 07:45:00', 33),
(39, 'Nakuru', 'Kericho', '2025-04-03 08:15:00', '2025-04-03 10:15:00', 34),
(40, 'Isiolo', 'Narok', '2025-04-02 07:45:00', '2025-04-02 14:00:00', 35),
(41, 'Ruiru', 'Eldoret', '2025-04-03 10:15:00', '2025-04-03 18:45:00', 36),
(42, 'Garissa', 'Homa Bay', '2025-04-01 09:00:00', '2025-04-01 20:30:00', 37),
(43, 'Marsabit', 'Voi', '2025-04-02 07:45:00', '2025-04-02 19:30:00', 38),
(44, 'Kisii', 'Lodwar', '2025-04-04 06:00:00', '2025-04-04 18:00:00', 39),
(45, 'Busia', 'Malindi', '2025-04-03 06:45:00', '2025-04-03 19:30:00', 40);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `RoleID` int(11) DEFAULT NULL,
  `FullName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `RoleID`, `FullName`, `Email`, `PasswordHash`, `PhoneNumber`) VALUES
(2, 1, 'admin', 'admin@gmail.com', '$2y$10$bxIpwX5Y5jyN2eQVHT0O9e25s1voj5Qm4pifdJHEx9ElwXOEEuCPy', NULL),
(3, 2, 'Martin Kuria', 'kuria@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', NULL),
(6, 2, 'Alice Johnson', 'alice.johnson@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0723456789'),
(7, 2, 'Bob Smith', 'bob.smith@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0724567890'),
(8, 2, 'Charlie Adams', 'charlie.adams@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0725678901'),
(9, 2, 'Diana Lee', 'diana.lee@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0726789012'),
(10, 2, 'Edward Green', 'edward.green@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0727890123'),
(11, 2, 'Fiona Brown', 'fiona.brown@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0728901234'),
(12, 2, 'George White', 'george.white@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0729012345'),
(13, 2, 'Hannah Taylor', 'hannah.taylor@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0720123456'),
(14, 2, 'Ian Black', 'ian.black@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0721234567'),
(15, 2, 'Julia Brown', 'julia.brown@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0722345678'),
(16, 2, 'Kevin Miller', 'kevin.miller@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0723456781'),
(17, 2, 'Laura Davis', 'laura.davis@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0724567892'),
(18, 2, 'Michael Parker', 'michael.parker@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0725678903'),
(19, 2, 'Nancy Wilson', 'nancy.wilson@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0726789014'),
(20, 2, 'Oscar Hayes', 'oscar.hayes@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0727890125'),
(21, 2, 'Pamela Moore', 'pamela.moore@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0728901236'),
(22, 2, 'Quentin Hill', 'quentin.hill@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0729012347'),
(23, 2, 'Rebecca Allen', 'rebecca.allen@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0720123458'),
(24, 2, 'Steven Young', 'steven.young@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0721234569'),
(25, 2, 'Thomas Jackson', 'thomas.jackson@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0722345670'),
(26, 2, 'Ursula Roberts', 'ursula.roberts@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0723456781'),
(27, 2, 'Victoria Harris', 'victoria.harris@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0724567892'),
(28, 2, 'Walter King', 'walter.king@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0725678903'),
(29, 2, 'Xander Baker', 'xander.baker@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0726789014'),
(30, 2, 'Yvonne Gray', 'yvonne.gray@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0727890125'),
(31, 2, 'Zachary Cruz', 'zachary.cruz@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0728901236'),
(32, 2, 'Amanda Rivera', 'amanda.rivera@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0729012347'),
(33, 2, 'Brian Cooper', 'brian.cooper@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0720123458'),
(34, 2, 'Cynthia Morgan', 'cynthia.morgan@gmail.com', '$2y$10$Ipygphohj3r2FWGJlkDIj.rwuc55om/xsereDhGci59RpOPA9YpMi', '0721234569');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`BusID`),
  ADD UNIQUE KEY `BusNumber` (`BusNumber`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `feedback_ibfk_2` (`RouteID`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`LocationID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`NotificationID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ReservationID`),
  ADD KEY `RouteID` (`RouteID`),
  ADD KEY `reservations_ibfk_1` (`UserID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`RouteID`),
  ADD KEY `BusID` (`BusID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `RoleID` (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `BusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `LocationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `NotificationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `ReservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `RouteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`RouteID`) REFERENCES `routes` (`RouteID`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`RouteID`) REFERENCES `routes` (`RouteID`);

--
-- Constraints for table `routes`
--
ALTER TABLE `routes`
  ADD CONSTRAINT `routes_ibfk_1` FOREIGN KEY (`BusID`) REFERENCES `buses` (`BusID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `roles` (`RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
