-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2018 at 02:20 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eregister`
--

-- --------------------------------------------------------

--
-- Table structure for table `gebruiker`
--

CREATE TABLE `gebruiker` (
  `ID` int(50) NOT NULL,
  `email` varchar(256) NOT NULL,
  `pers_nummer` varchar(20) NOT NULL,
  `wachtwoord` varchar(256) NOT NULL,
  `temp_wachtwoord` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gebruiker`
--

INSERT INTO `gebruiker` (`ID`, `email`, `pers_nummer`, `wachtwoord`, `temp_wachtwoord`) VALUES
(1, 's1117592@student.windesheim.nl', 's1117592', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', 0),
(2, 's1110101@student.windesheim.nl', 's1110101', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', 0),
(3, 's1112233@student.windesheim.nl', 's1112233', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', 0),
(18, 's1114455@student.windesheim.nl', 's1114455', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', 0),
(19, 's1122661@student.windesheim.nl', 's1122661', 'e4a0a90e5ac07d5435c6f25c4cf7cc565becb797bb5b83c515bc427ef32a4770', 0),
(20, '1@docent.windesheim.nl', '1', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', 0);

-- --------------------------------------------------------

--
-- Table structure for table `klas`
--

CREATE TABLE `klas` (
  `ID` int(11) NOT NULL,
  `omschrijving` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klas`
--

INSERT INTO `klas` (`ID`, `omschrijving`) VALUES
(1, 'HBOICTwf1A'),
(2, 'HBOICTwf1B');

-- --------------------------------------------------------

--
-- Table structure for table `profiel`
--

CREATE TABLE `profiel` (
  `ID` int(50) NOT NULL,
  `gebruiker_ID` int(50) NOT NULL,
  `naam` varchar(256) DEFAULT NULL,
  `tussenvoegsel` varchar(256) DEFAULT NULL,
  `achternaam` varchar(256) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `plaats` varchar(256) DEFAULT NULL,
  `straat` varchar(256) DEFAULT NULL,
  `straatnummer` int(50) DEFAULT NULL,
  `land` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiel`
--

INSERT INTO `profiel` (`ID`, `gebruiker_ID`, `naam`, `tussenvoegsel`, `achternaam`, `postcode`, `plaats`, `straat`, `straatnummer`, `land`) VALUES
(1, 1, 'gert', 'van', 'achteren', '1276AG', 'emmen', 'baarmanstraat', 64, 'Nederland'),
(2, 2, 'Jan', NULL, 'Hofferen', '1290RB', 'Zwolle', 'Zwoelestraat', 12, 'Nederland'),
(3, 3, 'geert', 'van de', 'buurt', '6307VM', 'Den Haag', 'bommelenstraat', 503, 'Nederland'),
(18, 18, 'joey', NULL, 'bravo', '4650RN', 'Alkmaar', 'Alkmaarderstraat', 1, 'Nederland');

-- --------------------------------------------------------

--
-- Table structure for table `profiel_klas`
--

CREATE TABLE `profiel_klas` (
  `ID` int(11) NOT NULL,
  `profiel_ID` int(50) NOT NULL,
  `klas_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiel_klas`
--

INSERT INTO `profiel_klas` (`ID`, `profiel_ID`, `klas_ID`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 18, 2);

-- --------------------------------------------------------

--
-- Table structure for table `registratie`
--

CREATE TABLE `registratie` (
  `ID` int(11) NOT NULL,
  `vak_ID` int(11) NOT NULL,
  `profiel_ID` varchar(20) NOT NULL,
  `datum` date NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registratie`
--

INSERT INTO `registratie` (`ID`, `vak_ID`, `profiel_ID`, `datum`, `token`) VALUES
(1, 1, '19', '2018-05-16', '123'),
(2, 1, '19', '2018-05-16', '123'),
(3, 2, '19', '2018-05-31', '456'),
(4, 2, '19', '2018-05-31', '456');

-- --------------------------------------------------------

--
-- Table structure for table `vak`
--

CREATE TABLE `vak` (
  `ID` int(11) NOT NULL,
  `omschrijving` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vak`
--

INSERT INTO `vak` (`ID`, `omschrijving`) VALUES
(1, 'webdevelopment 1'),
(2, 'onderzoeken en rapporteren');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `pers_nummer` (`pers_nummer`);

--
-- Indexes for table `klas`
--
ALTER TABLE `klas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `profiel`
--
ALTER TABLE `profiel`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `gebruiker_ID` (`gebruiker_ID`);

--
-- Indexes for table `profiel_klas`
--
ALTER TABLE `profiel_klas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `gebruiker_ID` (`profiel_ID`),
  ADD KEY `klassen_ID` (`klas_ID`);

--
-- Indexes for table `registratie`
--
ALTER TABLE `registratie`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `vak_ID` (`vak_ID`),
  ADD KEY `profiel_ID` (`profiel_ID`);

--
-- Indexes for table `vak`
--
ALTER TABLE `vak`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `klas`
--
ALTER TABLE `klas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profiel`
--
ALTER TABLE `profiel`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `profiel_klas`
--
ALTER TABLE `profiel_klas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registratie`
--
ALTER TABLE `registratie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vak`
--
ALTER TABLE `vak`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
