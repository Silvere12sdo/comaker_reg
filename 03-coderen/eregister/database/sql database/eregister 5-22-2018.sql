-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 22 mei 2018 om 15:57
-- Serverversie: 10.1.30-MariaDB
-- PHP-versie: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE `gebruiker` (
  `ID` int(50) NOT NULL,
  `email` varchar(256) NOT NULL,
  `wachtwoord` varchar(256) NOT NULL,
  `temp_wachtwoord` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`ID`, `email`, `wachtwoord`, `temp_wachtwoord`) VALUES
(1, '1117592@student.windesheim.nl', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', 0),
(2, 's1110101@student.windesheim.nl', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', 0),
(3, 's1112233@student.windesheim.nl', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', 0),
(18, 's1114455@student.windesheim.nl', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klas`
--

CREATE TABLE `klas` (
  `ID` int(11) NOT NULL,
  `gebruiker_ID` int(50) NOT NULL,
  `klassen_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `klas`
--

INSERT INTO `klas` (`ID`, `gebruiker_ID`, `klassen_ID`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 18, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klassen`
--

CREATE TABLE `klassen` (
  `ID` int(11) NOT NULL,
  `omschrijving` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `klassen`
--

INSERT INTO `klassen` (`ID`, `omschrijving`) VALUES
(1, 'HBOICTwf1A'),
(2, 'HBOICTwf1B');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `profiel`
--

CREATE TABLE `profiel` (
  `ID` int(11) NOT NULL,
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
-- Gegevens worden geëxporteerd voor tabel `profiel`
--

INSERT INTO `profiel` (`ID`, `gebruiker_ID`, `naam`, `tussenvoegsel`, `achternaam`, `postcode`, `plaats`, `straat`, `straatnummer`, `land`) VALUES
(1, 1, 'gert', 'van', 'achteren', '1276AG', 'emmen', 'baarmanstraat', 64, 'Nederland'),
(2, 2, 'Jan', NULL, 'Hofferen', '1290RB', 'Zwolle', 'Zwoelestraat', 12, 'Nederland'),
(3, 3, 'geert', 'van de', 'buurt', '6307VM', 'Den Haag', 'bommelenstraat', 503, 'Nederland'),
(18, 18, 'joey', NULL, 'bravo', '4650RN', 'Alkmaar', 'Alkmaarderstraat', 1, 'Nederland');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `registratie`
--

CREATE TABLE `registratie` (
  `ID` int(11) NOT NULL,
  `vakken_ID` int(11) NOT NULL,
  `gebruiker_ID` int(50) NOT NULL,
  `datum` date NOT NULL,
  `token` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `registratie`
--

INSERT INTO `registratie` (`ID`, `vakken_ID`, `gebruiker_ID`, `datum`, `token`) VALUES
(1, 1, 1, '2018-05-16', 123),
(2, 1, 18, '2018-05-16', 123),
(3, 2, 3, '2018-05-31', 456),
(4, 2, 2, '2018-05-31', 456);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vakken`
--

CREATE TABLE `vakken` (
  `ID` int(11) NOT NULL,
  `omschrijving` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `vakken`
--

INSERT INTO `vakken` (`ID`, `omschrijving`) VALUES
(1, 'webdevelopment 1'),
(2, 'onderzoeken en rapporteren');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexen voor tabel `klas`
--
ALTER TABLE `klas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `gebruiker_ID` (`gebruiker_ID`),
  ADD KEY `klassen_ID` (`klassen_ID`);

--
-- Indexen voor tabel `klassen`
--
ALTER TABLE `klassen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `profiel`
--
ALTER TABLE `profiel`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `gebruiker_ID` (`gebruiker_ID`);

--
-- Indexen voor tabel `registratie`
--
ALTER TABLE `registratie`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `vak_ID` (`vakken_ID`),
  ADD KEY `gebruiker_ID` (`gebruiker_ID`);

--
-- Indexen voor tabel `vakken`
--
ALTER TABLE `vakken`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT voor een tabel `klas`
--
ALTER TABLE `klas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `klassen`
--
ALTER TABLE `klassen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `profiel`
--
ALTER TABLE `profiel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT voor een tabel `registratie`
--
ALTER TABLE `registratie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `vakken`
--
ALTER TABLE `vakken`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
