-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2020 m. Sau 05 d. 16:51
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nt2`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `applicant`
--

CREATE TABLE `applicant` (
  `name` varchar(60) DEFAULT NULL,
  `surname` varchar(60) DEFAULT NULL,
  `personal_no` varchar(60) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `phone_no` varchar(60) DEFAULT NULL,
  `CV` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `category`
--

CREATE TABLE `category` (
  `name` varchar(60) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `category`
--

INSERT INTO `category` (`name`, `id`) VALUES
('namas', 1),
('butas', 2),
('kita', 3);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `city`
--

CREATE TABLE `city` (
  `name` varchar(60) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `city`
--

INSERT INTO `city` (`name`, `id`) VALUES
('London', 1),
('Brussels', 2),
('Moscow', 3),
('Prague', 4),
('Pekin', 5),
('Tokyo', 6),
('Canberra', 7),
('Sydney', 8),
('Kabul', 9),
('New Delhi', 10),
('Kaunas', 11),
('Vilnius', 12),
('Ryga', 13);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `client`
--

CREATE TABLE `client` (
  `name` varchar(60) DEFAULT NULL,
  `surname` varchar(60) DEFAULT NULL,
  `personal_no` varchar(60) DEFAULT NULL,
  `phone_no` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `client`
--

INSERT INTO `client` (`name`, `surname`, `personal_no`, `phone_no`, `email`, `password`, `id`) VALUES
('Jonas', 'Baranauskas', '79846456321', '(878) 454-2728', 'jerrikim@ewaves.com', '$2y$10$m7NMG1f7vu9tI3tSnWP4y.sMnGyxNewx9mpF62gPGoCT1KF0CJDau', 4),
('Julijus', 'Anieka', '78986454315', '(986) 315-8562', 'Julij@anieka.com', '$2y$10$KMZouSXGeMxIfwSERvjtcOF0k2p5LUdX1w9Y8DGbDxI8nI.xh9C6a', 6),
('Client', 'Client', '77845621322', '(971) 415-2502', 'client@client', '$2y$10$CEW59ccwzRRqE39NSw/aAOU.Zf1TJN6PRffBuJKeQ52wu8Saq4F1W', 8),
('Buyer', 'Buyer', '88899965432', '(927) 458-2255', 'buyer@buyer', '$2y$10$cwYqPZKY6qYzs0yIBu8/mO/PXGi7sGVUGsUpNRrc/MjrHy437VdUO', 10),
('Seller', 'Seller', '33232361501', '(819)', 'seller@seller', '$2y$10$6wdkf6.895CAaHD3eddtWuwmwBG3l4OJEH9zg3yQxlAZnlYBIFlfi', 11),
('abcd', 'darabc', '78945613987', '798-789-789', 'abc123@abc123.com', '$2y$10$GTQB7Wy0trtIZbRdMncPzuR6a8vzhLjzQm2gNobLivj5xyMPKqwOe', 12),
('testest', 'testset', '21312343132', '12312312', 'test@test', '$2y$10$wY9VXMSdVRzrKfikiuoTE.5iNctqP3SkdymBXqdiaP5Vr58xRLlWG', 20);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `client_answer`
--

CREATE TABLE `client_answer` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` varchar(60) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `fk_SUPPORT_TICKET` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `client_answer`
--

INSERT INTO `client_answer` (`time`, `description`, `id`, `fk_SUPPORT_TICKET`) VALUES
('2019-12-19 12:16:45', 'test', 1, 1),
('2019-12-19 14:11:16', 'klient ats', 2, 2);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `comment`
--

CREATE TABLE `comment` (
  `text` varchar(255) COLLATE utf8mb4_lithuanian_ci DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `conclusion`
--

CREATE TABLE `conclusion` (
  `tipas` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `fk_COMMENT` int(11) NOT NULL,
  `fk_RATING` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `conclusions_of_visits`
--

CREATE TABLE `conclusions_of_visits` (
  `id` int(11) NOT NULL,
  `fk_VISIT` int(11) NOT NULL,
  `fk_CONCLUSION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `conclusion_of_visits`
--

CREATE TABLE `conclusion_of_visits` (
  `id` int(11) NOT NULL,
  `fk_VISIT` int(11) NOT NULL,
  `fk_CONCLUSION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `conclusion_types`
--

CREATE TABLE `conclusion_types` (
  `id` int(11) NOT NULL,
  `name` char(9) COLLATE utf8mb4_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `conclusion_types`
--

INSERT INTO `conclusion_types` (`id`, `name`) VALUES
(1, 'Interest'),
(2, 'Complaint'),
(3, 'Condition');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `conditions`
--

CREATE TABLE `conditions` (
  `name` varchar(60) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `conditions`
--

INSERT INTO `conditions` (`name`, `id`) VALUES
('Good', 1),
('Decent', 2),
('Bad', 3),
('Wonderful', 4),
('Nature present', 5),
('Spectacular', 6),
('Work of art', 7),
('Modern', 8),
('Mint condition', 9);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `register_date` date DEFAULT NULL,
  `date_signed` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `contract_details` varchar(60) DEFAULT NULL,
  `payment_amount` double DEFAULT NULL,
  `fee_percentage` double DEFAULT NULL,
  `fee_amount` double DEFAULT NULL,
  `fk_TRANSACTION` int(11) DEFAULT NULL,
  `fk_CONTRACT_TYPE` int(11) NOT NULL,
  `fk_SOLICITOR` int(11) DEFAULT NULL,
  `fk_STAFF` int(11) DEFAULT NULL,
  `fk_ESTATE` int(11) NOT NULL,
  `fk_CLIENT_BUY` int(11) DEFAULT NULL,
  `fk_CLIENT_SELL` int(11) NOT NULL,
  `status_active` tinyint(1) DEFAULT NULL,
  `status_approved` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `contract`
--

INSERT INTO `contract` (`id`, `register_date`, `date_signed`, `end_date`, `contract_details`, `payment_amount`, `fee_percentage`, `fee_amount`, `fk_TRANSACTION`, `fk_CONTRACT_TYPE`, `fk_SOLICITOR`, `fk_STAFF`, `fk_ESTATE`, `fk_CLIENT_BUY`, `fk_CLIENT_SELL`, `status_active`, `status_approved`) VALUES
(1, '2019-12-21', '2019-12-26', '2020-12-11', 'Perkamas butas.', 64000, 0.05, 3200, 1, 1, 1, 3, 4, 10, 11, 1, 1),
(2, '2019-12-12', NULL, '2020-12-12', 'Planuojama nusipirkti.', 120000.75, 0.05, 6000.0375, NULL, 2, NULL, NULL, 1, 10, 11, 1, NULL),
(5, '2018-12-02', '2019-12-13', '2019-12-02', 'Everything', 75230, 0.05, 3761.5, NULL, 1, 1, 3, 5, 4, 6, 1, 1),
(6, '2019-12-19', '2019-12-19', '2019-12-19', 'House', 1234, 0, 536, 1, 1, 1, NULL, 1, 10, 11, 1, 1),
(35, '2019-12-19', NULL, '2020-12-18', 'Contract Details', 75230, 0.05, 3761.5, NULL, 1, NULL, NULL, 5, 8, 6, 1, 1),
(37, '2019-12-19', NULL, '2020-12-18', '', 0, 0, 78787878, NULL, 1, NULL, NULL, 8, 12, 6, 1, 1),
(38, '2019-12-19', NULL, '2020-12-18', 'qwert', 75230, 0.05, 3761.5, NULL, 1, NULL, NULL, 5, 12, 6, 1, 1),
(39, '2019-12-19', NULL, '2020-12-18', 'Contract Details', 120000.75, 0.05, 6000.0375, NULL, 1, NULL, NULL, 1, 10, 11, 1, 1),
(41, '2019-12-19', NULL, '2020-12-18', 'Contract Details', 1400000.25, 0.15, 210000.0375, NULL, 1, NULL, NULL, 3, 10, 11, 1, 1);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `contracts_of_estates`
--

CREATE TABLE `contracts_of_estates` (
  `id` int(11) NOT NULL,
  `fk_ESTATE` int(11) NOT NULL,
  `fk_CONTRACT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `contract_clients`
--

CREATE TABLE `contract_clients` (
  `fk_CONTRACT` int(11) NOT NULL,
  `fk_CLIENT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `contract_invoice`
--

CREATE TABLE `contract_invoice` (
  `date_created` date DEFAULT NULL,
  `billing_date` date DEFAULT NULL,
  `issued_by` varchar(60) DEFAULT NULL,
  `issued_to` varchar(60) DEFAULT NULL,
  `invoice_details` varchar(60) DEFAULT NULL,
  `invoice_amount` int(11) DEFAULT NULL,
  `date_paid` date DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `contract_type`
--

CREATE TABLE `contract_type` (
  `contract_type` varchar(60) DEFAULT NULL,
  `fee_percentage` decimal(10,0) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `contract_type`
--

INSERT INTO `contract_type` (`contract_type`, `fee_percentage`, `id`) VALUES
('client_buy', NULL, 1),
('agent_buy', NULL, 2),
('company_buy', NULL, 3);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `convenience`
--

CREATE TABLE `convenience` (
  `name` varchar(60) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `convenience`
--

INSERT INTO `convenience` (`name`, `id`) VALUES
('vandentiekis', 1),
('elektra', 2),
('dujos', 3),
('garazas', 4),
('baseinas', 5),
('zidinys', 6),
('liftas', 7),
('balkonas', 8);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `conveniences_of_estates`
--

CREATE TABLE `conveniences_of_estates` (
  `fk_ESTATE` int(11) NOT NULL,
  `fk_CONVENIENCE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `conveniences_of_estates`
--

INSERT INTO `conveniences_of_estates` (`fk_ESTATE`, `fk_CONVENIENCE`) VALUES
(1, 1),
(1, 3),
(1, 5),
(14, 1),
(14, 2),
(14, 3);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `estate`
--

CREATE TABLE `estate` (
  `area` double DEFAULT NULL,
  `build_year` int(11) DEFAULT NULL,
  `room_count` int(11) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `description` text,
  `ownership_document` varchar(60) DEFAULT NULL,
  `cadastral_document` varchar(60) DEFAULT NULL,
  `fee` double DEFAULT NULL,
  `fee_amount` double DEFAULT NULL,
  `id` int(11) NOT NULL,
  `fk_CATEGORY` int(11) DEFAULT NULL,
  `fk_SELLER` int(11) DEFAULT NULL,
  `fk_STREET` int(11) DEFAULT NULL,
  `fk_CONDITIONS` int(11) DEFAULT NULL,
  `fk_ESTATE_TYPE` int(11) DEFAULT NULL,
  `fk_HEATING` int(11) DEFAULT NULL,
  `fk_BUYER` int(11) DEFAULT NULL,
  `fk_CITY` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `estate`
--

INSERT INTO `estate` (`area`, `build_year`, `room_count`, `floor`, `price`, `description`, `ownership_document`, `cadastral_document`, `fee`, `fee_amount`, `id`, `fk_CATEGORY`, `fk_SELLER`, `fk_STREET`, `fk_CONDITIONS`, `fk_ESTATE_TYPE`, `fk_HEATING`, `fk_BUYER`, `fk_CITY`, `timestamp`) VALUES
(50.5, 2019, 4, 1, 120000.75, 'Naujai pastatytas loftas', '', '', 0.05, 6000.0375, 1, 1, 11, 20, 8, 7, 5, 10, 1, '2019-12-19 12:24:00'),
(1020.7, 1920, 16, 3, 1400000.25, 'Mokykla', '', '', 0.15, 210000.0375, 3, 1, 11, 16, 2, 6, 9, 10, 1, '2019-12-19 12:24:00'),
(24, 2004, 3, 4, 64000, 'Renovuotas butas', NULL, NULL, 0.05, 3200, 4, 3, 11, 20, 9, 6, 3, 10, 1, '2019-12-19 12:24:00'),
(79, 2007, 4, 1, 75230, 'Naujos statybos butas', NULL, NULL, 0.05, 3761.5, 5, 3, 6, 20, 7, 6, 8, 4, 1, '2019-12-19 12:24:00'),
(66, 1211, 4, NULL, NULL, NULL, NULL, NULL, 0, 78787878, 8, 1, 6, 20, 1, 6, 3, NULL, 1, '2019-12-19 12:24:00'),
(123123, 123213, 0, 0, 12123, '123213', '12312321', '31223', 606.15, 0.05, 13, 1, 11, 12, 1, 6, 2, NULL, 1, '2019-12-19 12:24:00'),
(55, 1234, 0, 0, 12341224, 'dsdsdsfgsd', 'sdfsdf', 'dsfdsf', 617061.2, 0.05, 14, 1, 20, 12, 4, 6, 3, NULL, 1, '2019-12-19 13:34:04');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `estate_type`
--

CREATE TABLE `estate_type` (
  `name` varchar(60) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `estate_type`
--

INSERT INTO `estate_type` (`name`, `id`) VALUES
('murinis', 6),
('blokinis', 7),
('medinis', 8),
('kita', 9);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `heating`
--

CREATE TABLE `heating` (
  `name` varchar(60) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `heating`
--

INSERT INTO `heating` (`name`, `id`) VALUES
('Nuclear', 1),
('Thermal', 2),
('Electric', 3),
('Electric & Thermal', 4),
('Electric & Nuclear', 5),
('Thermal & Nuclear', 6),
('Air conditioned', 7),
('Floor heated', 8),
('Central heating', 9);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `job_application`
--

CREATE TABLE `job_application` (
  `date` date DEFAULT NULL,
  `description` varchar(60) DEFAULT NULL,
  `job_type` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `fk_APPLICANT` int(11) NOT NULL,
  `fk_STAFF` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `levels_of_visits`
--

CREATE TABLE `levels_of_visits` (
  `id` int(11) NOT NULL,
  `name` char(10) COLLATE utf8mb4_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `levels_of_visits`
--

INSERT INTO `levels_of_visits` (`id`, `name`) VALUES
(1, 'registered'),
(2, 'clarified'),
(3, 'accepted'),
(4, 'completed'),
(5, 'concluded');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `message`
--

CREATE TABLE `message` (
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `fk_SENDER` int(11) DEFAULT NULL,
  `fk_RECEIVER` int(11) DEFAULT NULL,
  `fk_COMMENT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `messages_of_visits`
--

CREATE TABLE `messages_of_visits` (
  `id` int(11) NOT NULL,
  `fk_MESSAGE` int(11) NOT NULL,
  `fk_VISIT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `message_sizes`
--

CREATE TABLE `message_sizes` (
  `id` int(11) NOT NULL,
  `name` char(22) COLLATE utf8mb4_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `message_sizes`
--

INSERT INTO `message_sizes` (`id`, `name`) VALUES
(1, 'Short (up to 50 s.)'),
(2, 'Average (50-250 s.)'),
(3, 'Expanded (over 250 s.)');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `message_types`
--

CREATE TABLE `message_types` (
  `id` int(11) NOT NULL,
  `name` char(13) COLLATE utf8mb4_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `message_types`
--

INSERT INTO `message_types` (`id`, `name`) VALUES
(1, 'accepted'),
(2, 'denied'),
(3, 'appended'),
(4, 'communication');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `picture`
--

CREATE TABLE `picture` (
  `name` varchar(60) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `fk_ESTATE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `picture`
--

INSERT INTO `picture` (`name`, `id`, `fk_ESTATE`) VALUES
('5dfb62b7605174.09001591.jpg', 1, 8),
('5dfb638bd811f7.26784021.jpg', 2, 8),
('5dfb63a926cdc8.03502946.jpg', 3, 8),
('5dfb64d1bf3515.06519031.jpg', 4, 13),
('5dfb7c4c4d90a5.90060644.jpg', 5, 14);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `rating`
--

CREATE TABLE `rating` (
  `level` int(11) DEFAULT NULL,
  `current_tendency` int(11) DEFAULT NULL,
  `last_tendency` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `fk_CLIENT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `rating`
--

INSERT INTO `rating` (`level`, `current_tendency`, `last_tendency`, `id`, `fk_CLIENT`) VALUES
(0, 2, NULL, 1, 11),
(0, 2, NULL, 2, 4),
(0, 2, NULL, 4, 20);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `selected_estate`
--

CREATE TABLE `selected_estate` (
  `id` int(11) NOT NULL,
  `fk_CLIENT` int(11) NOT NULL,
  `fk_ESTATE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `selected_estate`
--

INSERT INTO `selected_estate` (`id`, `fk_CLIENT`, `fk_ESTATE`) VALUES
(1, 11, 1),
(2, 8, 1);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `solicitor`
--

CREATE TABLE `solicitor` (
  `name` varchar(60) DEFAULT NULL,
  `surname` varchar(60) DEFAULT NULL,
  `phone_no` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `solicitor`
--

INSERT INTO `solicitor` (`name`, `surname`, `phone_no`, `email`, `password`, `type`, `id`) VALUES
('Solicitor', 'Solicitor', '(903) 463-2636', 'solicitor@solicitor', '$2y$10$lsLtnSPusxxdTkc6uxc0S.c90mAfEeh6lRhIS58ZAejSdzs627bSm', 3, 1);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `staff`
--

CREATE TABLE `staff` (
  `name` varchar(60) DEFAULT NULL,
  `surname` varchar(60) DEFAULT NULL,
  `phone_no` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `staff`
--

INSERT INTO `staff` (`name`, `surname`, `phone_no`, `email`, `password`, `type`, `id`) VALUES
('admin', 'admin', '(806) 523-7718', 'admin@admin', '$2y$10$Qia8rLCq5HHryz7cPNZZoeZVUeifyruJ52BtsduDmE1nuMrn516G6', 10, 1),
('Solicitor', 'Solicitor', '(856) 523-3018', 'solicitor@solicitor', '$2y$10$lsLtnSPusxxdTkc6uxc0S.c90mAfEeh6lRhIS58ZAejSdzs627bSm', 3, 2),
('Broker', 'Broker', '(930) 454-2282', 'broker@broker', '$2y$10$nky31WkPgZdkQ5.bc0rsO.B0qI.BKzqLXIVMEUrnS.2USI/VVtOlG', 2, 3);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `staff_answer`
--

CREATE TABLE `staff_answer` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` varchar(60) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `fk_SUPPORT_TICKET` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `staff_answer`
--

INSERT INTO `staff_answer` (`time`, `description`, `id`, `fk_SUPPORT_TICKET`) VALUES
('2019-12-19 12:17:14', 'atsakymas', 1, 1),
('2019-12-19 14:10:57', 'ats', 2, 2),
('2019-12-19 15:01:47', 'iuhyil', 3, 3);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `staff_types`
--

CREATE TABLE `staff_types` (
  `id` int(11) NOT NULL,
  `name` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `staff_types`
--

INSERT INTO `staff_types` (`id`, `name`) VALUES
(2, 'broker'),
(3, 'notary'),
(9, 'moderator'),
(10, 'admin');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `street`
--

CREATE TABLE `street` (
  `name` varchar(60) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `fk_CITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `street`
--

INSERT INTO `street` (`name`, `id`, `fk_CITY`) VALUES
('Elm Place', 11, 7),
('Seaview Avenue', 12, 1),
('Applegate Court', 13, 4),
('Cozine Avenue', 14, 12),
('Morton Street', 15, 7),
('Lafayette Walk', 16, 1),
('Mermaid Avenue', 17, 3),
('Humboldt Street', 18, 3),
('Frost Street', 19, 13),
('Monroe Place', 20, 1);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `support_ticket`
--

CREATE TABLE `support_ticket` (
  `title` varchar(60) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `desciption` text,
  `id` int(11) NOT NULL,
  `fk_STAFF` int(11) DEFAULT NULL,
  `fk_CLIENT` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `support_ticket`
--

INSERT INTO `support_ticket` (`title`, `time`, `desciption`, `id`, `fk_STAFF`, `fk_CLIENT`, `status`) VALUES
('testas', '2019-12-19 12:17:21', 'testklausimas', 1, 1, 11, 0),
('test', '2019-12-19 14:11:35', 'etstset', 2, 1, 8, 0),
('13', '2019-12-19 15:02:05', '123', 3, 1, 8, 0);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `tendencies`
--

CREATE TABLE `tendencies` (
  `id` int(11) NOT NULL,
  `name` char(10) COLLATE utf8mb4_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `tendencies`
--

INSERT INTO `tendencies` (`id`, `name`) VALUES
(1, 'growing'),
(2, 'unchanging'),
(3, 'shrinking');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `transaction_date` date DEFAULT NULL,
  `transaction_details` varchar(60) DEFAULT NULL,
  `fk_ISSUED_BY` int(11) NOT NULL,
  `fk_RECEIVED_BY` int(11) NOT NULL,
  `fk_SOLICITOR` int(11) NOT NULL,
  `fk_TRANSACTION_TYPE` int(11) NOT NULL,
  `fk_CONTRACT_INVOICE` int(11) DEFAULT NULL,
  `paid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `transaction`
--

INSERT INTO `transaction` (`id`, `transaction_date`, `transaction_details`, `fk_ISSUED_BY`, `fk_RECEIVED_BY`, `fk_SOLICITOR`, `fk_TRANSACTION_TYPE`, `fk_CONTRACT_INVOICE`, `paid`) VALUES
(1, '2019-12-26', 'Perkamas naujos renovacijos butas.', 10, 11, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `transaction_type`
--

CREATE TABLE `transaction_type` (
  `id` int(11) NOT NULL,
  `transaction_type_name` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `transaction_type`
--

INSERT INTO `transaction_type` (`id`, `transaction_type_name`) VALUES
(1, 'Payment'),
(2, 'Refund');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `visit`
--

CREATE TABLE `visit` (
  `hours_spent` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `fk_BUYER` int(11) NOT NULL,
  `fk_SELLER` int(11) NOT NULL,
  `fk_ESTATE` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `visit`
--

INSERT INTO `visit` (`hours_spent`, `level`, `id`, `fk_BUYER`, `fk_SELLER`, `fk_ESTATE`, `datetime`) VALUES
(NULL, 1, 2, 8, 11, 1, '2019-12-12 23:21:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_answer`
--
ALTER TABLE `client_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `includes_2` (`fk_SUPPORT_TICKET`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `size` (`size`);

--
-- Indexes for table `conclusion`
--
ALTER TABLE `conclusion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_COMMENT` (`fk_COMMENT`),
  ADD KEY `tipas` (`tipas`),
  ADD KEY `shapes` (`fk_RATING`);

--
-- Indexes for table `conclusions_of_visits`
--
ALTER TABLE `conclusions_of_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `included_in40` (`fk_VISIT`),
  ADD KEY `included_in30` (`fk_CONCLUSION`);

--
-- Indexes for table `conclusion_of_visits`
--
ALTER TABLE `conclusion_of_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `included_in4` (`fk_VISIT`),
  ADD KEY `included_in3` (`fk_CONCLUSION`);

--
-- Indexes for table `conclusion_types`
--
ALTER TABLE `conclusion_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contains2` (`fk_ESTATE`),
  ADD KEY `included_in6` (`fk_CONTRACT_TYPE`),
  ADD KEY `included_in8` (`fk_SOLICITOR`),
  ADD KEY `includes_3` (`fk_TRANSACTION`),
  ADD KEY `participates_as_buyer` (`fk_CLIENT_BUY`),
  ADD KEY `participates_as_seller` (`fk_CLIENT_SELL`),
  ADD KEY `sends_2` (`fk_STAFF`);

--
-- Indexes for table `contracts_of_estates`
--
ALTER TABLE `contracts_of_estates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `has6` (`fk_ESTATE`),
  ADD KEY `makes2` (`fk_CONTRACT`);

--
-- Indexes for table `contract_clients`
--
ALTER TABLE `contract_clients`
  ADD PRIMARY KEY (`fk_CONTRACT`,`fk_CLIENT`);

--
-- Indexes for table `contract_invoice`
--
ALTER TABLE `contract_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_type`
--
ALTER TABLE `contract_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `convenience`
--
ALTER TABLE `convenience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conveniences_of_estates`
--
ALTER TABLE `conveniences_of_estates`
  ADD KEY `part_of` (`fk_ESTATE`),
  ADD KEY `part_of2` (`fk_CONVENIENCE`);

--
-- Indexes for table `estate`
--
ALTER TABLE `estate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `has` (`fk_CATEGORY`),
  ADD KEY `sells` (`fk_SELLER`),
  ADD KEY `located_at` (`fk_STREET`),
  ADD KEY `has2` (`fk_CONDITIONS`),
  ADD KEY `made_of` (`fk_ESTATE_TYPE`),
  ADD KEY `has3` (`fk_HEATING`),
  ADD KEY `buys` (`fk_BUYER`),
  ADD KEY `built_in` (`fk_CITY`);

--
-- Indexes for table `estate_type`
--
ALTER TABLE `estate_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heating`
--
ALTER TABLE `heating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_application`
--
ALTER TABLE `job_application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_type` (`job_type`),
  ADD KEY `creates` (`fk_APPLICANT`),
  ADD KEY `accepts` (`fk_STAFF`);

--
-- Indexes for table `levels_of_visits`
--
ALTER TABLE `levels_of_visits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_COMMENT` (`fk_COMMENT`),
  ADD KEY `type` (`type`),
  ADD KEY `sends` (`fk_SENDER`),
  ADD KEY `answers` (`fk_RECEIVER`);

--
-- Indexes for table `messages_of_visits`
--
ALTER TABLE `messages_of_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `has20` (`fk_MESSAGE`),
  ADD KEY `has41` (`fk_VISIT`);

--
-- Indexes for table `message_sizes`
--
ALTER TABLE `message_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_types`
--
ALTER TABLE `message_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `has5` (`fk_ESTATE`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_CLIENT` (`fk_CLIENT`),
  ADD KEY `current_tendency` (`current_tendency`);

--
-- Indexes for table `selected_estate`
--
ALTER TABLE `selected_estate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `selects` (`fk_CLIENT`),
  ADD KEY `part_of3` (`fk_ESTATE`);

--
-- Indexes for table `solicitor`
--
ALTER TABLE `solicitor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `staff_answer`
--
ALTER TABLE `staff_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `includes` (`fk_SUPPORT_TICKET`);

--
-- Indexes for table `staff_types`
--
ALTER TABLE `staff_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `street`
--
ALTER TABLE `street`
  ADD PRIMARY KEY (`id`),
  ADD KEY `has4` (`fk_CITY`);

--
-- Indexes for table `support_ticket`
--
ALTER TABLE `support_ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `processes` (`fk_STAFF`),
  ADD KEY `submits` (`fk_CLIENT`);

--
-- Indexes for table `tendencies`
--
ALTER TABLE `tendencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `confirms` (`fk_SOLICITOR`),
  ADD KEY `included_in5` (`fk_TRANSACTION_TYPE`),
  ADD KEY `issued_by` (`fk_ISSUED_BY`),
  ADD KEY `produces` (`fk_CONTRACT_INVOICE`),
  ADD KEY `received_by` (`fk_RECEIVED_BY`);

--
-- Indexes for table `transaction_type`
--
ALTER TABLE `transaction_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`),
  ADD KEY `makes` (`fk_SELLER`),
  ADD KEY `happens_in` (`fk_ESTATE`),
  ADD KEY `attends` (`fk_BUYER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `client_answer`
--
ALTER TABLE `client_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conclusion`
--
ALTER TABLE `conclusion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conclusions_of_visits`
--
ALTER TABLE `conclusions_of_visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conclusion_of_visits`
--
ALTER TABLE `conclusion_of_visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conclusion_types`
--
ALTER TABLE `conclusion_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `contracts_of_estates`
--
ALTER TABLE `contracts_of_estates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_invoice`
--
ALTER TABLE `contract_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_type`
--
ALTER TABLE `contract_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `convenience`
--
ALTER TABLE `convenience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `estate`
--
ALTER TABLE `estate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `estate_type`
--
ALTER TABLE `estate_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `heating`
--
ALTER TABLE `heating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_application`
--
ALTER TABLE `job_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levels_of_visits`
--
ALTER TABLE `levels_of_visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages_of_visits`
--
ALTER TABLE `messages_of_visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_sizes`
--
ALTER TABLE `message_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message_types`
--
ALTER TABLE `message_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `selected_estate`
--
ALTER TABLE `selected_estate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `solicitor`
--
ALTER TABLE `solicitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff_answer`
--
ALTER TABLE `staff_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `street`
--
ALTER TABLE `street`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `support_ticket`
--
ALTER TABLE `support_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tendencies`
--
ALTER TABLE `tendencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction_type`
--
ALTER TABLE `transaction_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Apribojimai eksportuotom lentelėm
--

--
-- Apribojimai lentelei `client_answer`
--
ALTER TABLE `client_answer`
  ADD CONSTRAINT `includes_2` FOREIGN KEY (`fk_SUPPORT_TICKET`) REFERENCES `support_ticket` (`id`) ON DELETE CASCADE;

--
-- Apribojimai lentelei `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`size`) REFERENCES `message_sizes` (`id`);

--
-- Apribojimai lentelei `conclusion`
--
ALTER TABLE `conclusion`
  ADD CONSTRAINT `conclusion_ibfk_1` FOREIGN KEY (`tipas`) REFERENCES `conclusion_types` (`id`),
  ADD CONSTRAINT `included_in2` FOREIGN KEY (`fk_COMMENT`) REFERENCES `comment` (`id`),
  ADD CONSTRAINT `shapes` FOREIGN KEY (`fk_RATING`) REFERENCES `rating` (`id`);

--
-- Apribojimai lentelei `conclusions_of_visits`
--
ALTER TABLE `conclusions_of_visits`
  ADD CONSTRAINT `included_in30` FOREIGN KEY (`fk_CONCLUSION`) REFERENCES `conclusion` (`id`),
  ADD CONSTRAINT `included_in40` FOREIGN KEY (`fk_VISIT`) REFERENCES `visit` (`id`);

--
-- Apribojimai lentelei `conclusion_of_visits`
--
ALTER TABLE `conclusion_of_visits`
  ADD CONSTRAINT `included_in3` FOREIGN KEY (`fk_CONCLUSION`) REFERENCES `conclusion` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `included_in4` FOREIGN KEY (`fk_VISIT`) REFERENCES `visit` (`id`) ON DELETE CASCADE;

--
-- Apribojimai lentelei `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contains2` FOREIGN KEY (`fk_ESTATE`) REFERENCES `estate` (`id`),
  ADD CONSTRAINT `included_in6` FOREIGN KEY (`fk_CONTRACT_TYPE`) REFERENCES `contract_type` (`id`),
  ADD CONSTRAINT `included_in8` FOREIGN KEY (`fk_SOLICITOR`) REFERENCES `solicitor` (`id`),
  ADD CONSTRAINT `includes_3` FOREIGN KEY (`fk_TRANSACTION`) REFERENCES `transaction` (`id`),
  ADD CONSTRAINT `participates_as_buyer` FOREIGN KEY (`fk_CLIENT_BUY`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `participates_as_seller` FOREIGN KEY (`fk_CLIENT_SELL`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `sends_2` FOREIGN KEY (`fk_STAFF`) REFERENCES `staff` (`id`);

--
-- Apribojimai lentelei `contracts_of_estates`
--
ALTER TABLE `contracts_of_estates`
  ADD CONSTRAINT `has6` FOREIGN KEY (`fk_ESTATE`) REFERENCES `estate` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `makes2` FOREIGN KEY (`fk_CONTRACT`) REFERENCES `contract` (`id`) ON DELETE CASCADE;

--
-- Apribojimai lentelei `contract_clients`
--
ALTER TABLE `contract_clients`
  ADD CONSTRAINT `included_in7` FOREIGN KEY (`fk_CONTRACT`) REFERENCES `contract` (`id`) ON DELETE CASCADE;

--
-- Apribojimai lentelei `conveniences_of_estates`
--
ALTER TABLE `conveniences_of_estates`
  ADD CONSTRAINT `part_of` FOREIGN KEY (`fk_ESTATE`) REFERENCES `estate` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `part_of2` FOREIGN KEY (`fk_CONVENIENCE`) REFERENCES `convenience` (`id`) ON DELETE CASCADE;

--
-- Apribojimai lentelei `estate`
--
ALTER TABLE `estate`
  ADD CONSTRAINT `built_in` FOREIGN KEY (`fk_CITY`) REFERENCES `city` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `buys` FOREIGN KEY (`fk_BUYER`) REFERENCES `client` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `has` FOREIGN KEY (`fk_CATEGORY`) REFERENCES `category` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `has2` FOREIGN KEY (`fk_CONDITIONS`) REFERENCES `conditions` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `has3` FOREIGN KEY (`fk_HEATING`) REFERENCES `heating` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `located_at` FOREIGN KEY (`fk_STREET`) REFERENCES `street` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `made_of` FOREIGN KEY (`fk_ESTATE_TYPE`) REFERENCES `estate_type` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sells` FOREIGN KEY (`fk_SELLER`) REFERENCES `client` (`id`) ON DELETE CASCADE;

--
-- Apribojimai lentelei `job_application`
--
ALTER TABLE `job_application`
  ADD CONSTRAINT `accepts` FOREIGN KEY (`fk_STAFF`) REFERENCES `staff` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `creates` FOREIGN KEY (`fk_APPLICANT`) REFERENCES `applicant` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_application_ibfk_1` FOREIGN KEY (`job_type`) REFERENCES `staff_types` (`id`) ON DELETE CASCADE;

--
-- Apribojimai lentelei `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `answers` FOREIGN KEY (`fk_RECEIVER`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `included_in` FOREIGN KEY (`fk_COMMENT`) REFERENCES `comment` (`id`),
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`type`) REFERENCES `message_types` (`id`),
  ADD CONSTRAINT `sends` FOREIGN KEY (`fk_SENDER`) REFERENCES `client` (`id`);

--
-- Apribojimai lentelei `messages_of_visits`
--
ALTER TABLE `messages_of_visits`
  ADD CONSTRAINT `has20` FOREIGN KEY (`fk_MESSAGE`) REFERENCES `message` (`id`),
  ADD CONSTRAINT `has41` FOREIGN KEY (`fk_VISIT`) REFERENCES `visit` (`id`);

--
-- Apribojimai lentelei `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `has5` FOREIGN KEY (`fk_ESTATE`) REFERENCES `estate` (`id`) ON DELETE CASCADE;

--
-- Apribojimai lentelei `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `has0` FOREIGN KEY (`fk_CLIENT`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`current_tendency`) REFERENCES `tendencies` (`id`);

--
-- Apribojimai lentelei `selected_estate`
--
ALTER TABLE `selected_estate`
  ADD CONSTRAINT `part_of3` FOREIGN KEY (`fk_ESTATE`) REFERENCES `estate` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `selects` FOREIGN KEY (`fk_CLIENT`) REFERENCES `client` (`id`) ON DELETE CASCADE;

--
-- Apribojimai lentelei `solicitor`
--
ALTER TABLE `solicitor`
  ADD CONSTRAINT `solicitor_ibfk_1` FOREIGN KEY (`type`) REFERENCES `staff_types` (`id`) ON DELETE CASCADE;

--
-- Apribojimai lentelei `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`type`) REFERENCES `staff_types` (`id`) ON DELETE CASCADE;

--
-- Apribojimai lentelei `staff_answer`
--
ALTER TABLE `staff_answer`
  ADD CONSTRAINT `includes` FOREIGN KEY (`fk_SUPPORT_TICKET`) REFERENCES `support_ticket` (`id`) ON DELETE CASCADE;

--
-- Apribojimai lentelei `street`
--
ALTER TABLE `street`
  ADD CONSTRAINT `has4` FOREIGN KEY (`fk_CITY`) REFERENCES `city` (`id`) ON DELETE CASCADE;

--
-- Apribojimai lentelei `support_ticket`
--
ALTER TABLE `support_ticket`
  ADD CONSTRAINT `processes` FOREIGN KEY (`fk_STAFF`) REFERENCES `staff` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `submits` FOREIGN KEY (`fk_CLIENT`) REFERENCES `client` (`id`) ON DELETE CASCADE;

--
-- Apribojimai lentelei `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `confirms` FOREIGN KEY (`fk_SOLICITOR`) REFERENCES `solicitor` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `included_in5` FOREIGN KEY (`fk_TRANSACTION_TYPE`) REFERENCES `transaction_type` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `issued_by` FOREIGN KEY (`fk_ISSUED_BY`) REFERENCES `client` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produces` FOREIGN KEY (`fk_CONTRACT_INVOICE`) REFERENCES `contract_invoice` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `received_by` FOREIGN KEY (`fk_RECEIVED_BY`) REFERENCES `client` (`id`) ON DELETE CASCADE;

--
-- Apribojimai lentelei `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `attends` FOREIGN KEY (`fk_BUYER`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `happens_in` FOREIGN KEY (`fk_ESTATE`) REFERENCES `estate` (`id`),
  ADD CONSTRAINT `makes` FOREIGN KEY (`fk_SELLER`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `visit_ibfk_1` FOREIGN KEY (`level`) REFERENCES `levels_of_visits` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
