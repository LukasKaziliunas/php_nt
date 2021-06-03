-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2019 m. Spa 04 d. 11:22
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
-- Database: `ktuevents2`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `atstovybe`
--

CREATE TABLE `atstovybe` (
  `pavadinimas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `atstovybe`
--

INSERT INTO `atstovybe` (`pavadinimas`) VALUES
('atstovybe'),
('test');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `fakultetas`
--

CREATE TABLE `fakultetas` (
  `pavadinimas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `fakultetas`
--

INSERT INTO `fakultetas` (`pavadinimas`) VALUES
('fakultetas'),
('test');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `naudotojai`
--

CREATE TABLE `naudotojai` (
  `vardas` varchar(255) NOT NULL,
  `pavarde` varchar(255) NOT NULL,
  `elPastas` varchar(255) NOT NULL,
  `slaptazodis` varchar(255) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `naudotojai`
--

INSERT INTO `naudotojai` (`vardas`, `pavarde`, `elPastas`, `slaptazodis`, `ID`) VALUES
('admin', 'admin', 'admin', 'admin', 1),
('test', 'test', 'test@test', 'test', 2);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `organizatorius`
--

CREATE TABLE `organizatorius` (
  `pavadinimas` varchar(255) NOT NULL,
  `kita_info` varchar(255) DEFAULT NULL,
  `elpastas` varchar(255) NOT NULL,
  `slaptazodis` varchar(255) NOT NULL,
  `ID` int(11) NOT NULL,
  `fk_fakultetaspavadinimas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `organizatorius`
--

INSERT INTO `organizatorius` (`pavadinimas`, `kita_info`, `elpastas`, `slaptazodis`, `ID`, `fk_fakultetaspavadinimas`) VALUES
('admin', NULL, 'admin', 'admin', 1, NULL),
('test1', NULL, 'test@test', 't', 7, 'test'),
('test2', NULL, 'test@test', 't', 8, NULL),
('lukas', NULL, 'lukas@123', '123', 11, NULL);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `renginys`
--

CREATE TABLE `renginys` (
  `pavadinimas` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `vieta` varchar(255) NOT NULL,
  `laikas` time NOT NULL,
  `aprasymas` longtext,
  `ID` int(11) NOT NULL,
  `fk_tipas` varchar(255) DEFAULT NULL,
  `fk_atstovybe` varchar(255) DEFAULT NULL,
  `fk_fakultetas` varchar(255) DEFAULT NULL,
  `fk_organizatoriusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `renginys`
--

INSERT INTO `renginys` (`pavadinimas`, `data`, `vieta`, `laikas`, `aprasymas`, `ID`, `fk_tipas`, `fk_atstovybe`, `fk_fakultetas`, `fk_organizatoriusID`) VALUES
('test', '2019-09-19', 'test', '02:32:00', '', 8, 'tipas', 'atstovybe', 'fakultetas', 1);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `tipas`
--

CREATE TABLE `tipas` (
  `tipas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `tipas`
--

INSERT INTO `tipas` (`tipas`) VALUES
('test'),
('tipas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atstovybe`
--
ALTER TABLE `atstovybe`
  ADD PRIMARY KEY (`pavadinimas`);

--
-- Indexes for table `fakultetas`
--
ALTER TABLE `fakultetas`
  ADD PRIMARY KEY (`pavadinimas`);

--
-- Indexes for table `naudotojai`
--
ALTER TABLE `naudotojai`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `organizatorius`
--
ALTER TABLE `organizatorius`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `priklauso` (`fk_fakultetaspavadinimas`);

--
-- Indexes for table `renginys`
--
ALTER TABLE `renginys`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `apibudina` (`fk_tipas`),
  ADD KEY `turi2` (`fk_atstovybe`),
  ADD KEY `turi` (`fk_fakultetas`),
  ADD KEY `rengia` (`fk_organizatoriusID`);

--
-- Indexes for table `tipas`
--
ALTER TABLE `tipas`
  ADD PRIMARY KEY (`tipas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `naudotojai`
--
ALTER TABLE `naudotojai`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `organizatorius`
--
ALTER TABLE `organizatorius`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `renginys`
--
ALTER TABLE `renginys`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Apribojimai eksportuotom lentelėm
--

--
-- Apribojimai lentelei `organizatorius`
--
ALTER TABLE `organizatorius`
  ADD CONSTRAINT `priklauso` FOREIGN KEY (`fk_fakultetaspavadinimas`) REFERENCES `fakultetas` (`pavadinimas`);

--
-- Apribojimai lentelei `renginys`
--
ALTER TABLE `renginys`
  ADD CONSTRAINT `apibudina` FOREIGN KEY (`fk_tipas`) REFERENCES `tipas` (`tipas`),
  ADD CONSTRAINT `rengia` FOREIGN KEY (`fk_organizatoriusID`) REFERENCES `organizatorius` (`ID`),
  ADD CONSTRAINT `turi` FOREIGN KEY (`fk_fakultetas`) REFERENCES `fakultetas` (`pavadinimas`),
  ADD CONSTRAINT `turi2` FOREIGN KEY (`fk_atstovybe`) REFERENCES `atstovybe` (`pavadinimas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
