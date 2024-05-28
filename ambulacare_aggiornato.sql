-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 04:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ambulacare`
--
CREATE DATABASE IF NOT EXISTS `ambulacare` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ambulacare`;

-- --------------------------------------------------------

--
-- Table structure for table `amministratore`
--

DROP TABLE IF EXISTS `amministratore`;
CREATE TABLE `amministratore` (
  `IdAdmin` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appuntamento`
--

DROP TABLE IF EXISTS `appuntamento`;
CREATE TABLE `appuntamento` (
  `IdAppuntamento` int(10) UNSIGNED NOT NULL,
  `stato` varchar(20) NOT NULL,
  `IdPaziente` int(10) UNSIGNED NOT NULL,
  `IdFasciaOraria` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calendario`
--

DROP TABLE IF EXISTS `calendario`;
CREATE TABLE `calendario` (
  `IdCalendario` int(10) UNSIGNED NOT NULL,
  `IdMedico` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fascia_oraria`
--

DROP TABLE IF EXISTS `fascia_oraria`;
CREATE TABLE `fascia_oraria` (
  `IdFasciaOraria` int(10) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `ora_inizio` time NOT NULL,
  `IdCalendario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immagine`
--

DROP TABLE IF EXISTS `immagine`;
CREATE TABLE `immagine` (
  `IdImmagine` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `dimensione` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `dati` longblob NOT NULL,
  `IdMedico_Referto` int(10) DEFAULT NULL COMMENT 'nel caso di una foto profilo ci va l''id del medico, altrimenti quello del referto'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medico`
--

DROP TABLE IF EXISTS `medico`;
CREATE TABLE `medico` (
  `IdMedico` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `attivo` char(1) NOT NULL,
  `costo` float NOT NULL,
  `IdTipologia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paziente`
--

DROP TABLE IF EXISTS `paziente`;
CREATE TABLE `paziente` (
  `IdPaziente` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `codice_fiscale` varchar(16) NOT NULL,
  `data_nascita` date NOT NULL,
  `luogo_nascita` varchar(255) NOT NULL,
  `residenza` varchar(255) NOT NULL,
  `numero_telefono` varchar(10) NOT NULL,
  `attivo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `paziente`
--

INSERT INTO `paziente` (`IdPaziente`, `nome`, `cognome`, `email`, `password`, `codice_fiscale`, `data_nascita`, `luogo_nascita`, `residenza`, `numero_telefono`, `attivo`) VALUES
(2, 'emanuele', 'papile', 'emanuele@abruzzofoto.it', '$2y$10$ciwSx/55RaS3FyDCIAQq..Qmp7TlbzJH2/VK/p0pAPaN9VO.kAw5S', 'PPLMNL02E18C632S', '2002-05-18', 'Chieti', 'via costa delle plaie 34', '3703117772', '1');

-- --------------------------------------------------------

--
-- Table structure for table `recensione`
--

DROP TABLE IF EXISTS `recensione`;
CREATE TABLE `recensione` (
  `IdRecensione` int(10) UNSIGNED NOT NULL,
  `titolo` varchar(255) NOT NULL,
  `contenuto` varchar(255) NOT NULL,
  `valutazione` float NOT NULL,
  `data_creazione_recensione` datetime NOT NULL,
  `IdMedico` int(10) UNSIGNED NOT NULL,
  `IdPaziente` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referto`
--

DROP TABLE IF EXISTS `referto`;
CREATE TABLE `referto` (
  `IdReferto` int(10) UNSIGNED NOT NULL,
  `oggetto` varchar(255) NOT NULL,
  `contenuto` varchar(255) NOT NULL,
  `file` mediumblob NOT NULL,
  `IdAppuntamento` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `risposta`
--

DROP TABLE IF EXISTS `risposta`;
CREATE TABLE `risposta` (
  `IdRisposta` int(10) UNSIGNED NOT NULL,
  `contenuto` varchar(255) NOT NULL,
  `data_creazione_risposta` datetime NOT NULL,
  `IdRecensione` int(10) UNSIGNED NOT NULL,
  `IdMedico` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipologia`
--

DROP TABLE IF EXISTS `tipologia`;
CREATE TABLE `tipologia` (
  `IdTipologia` int(10) UNSIGNED NOT NULL,
  `nome_tipologia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amministratore`
--
ALTER TABLE `amministratore`
  ADD PRIMARY KEY (`IdAdmin`);

--
-- Indexes for table `appuntamento`
--
ALTER TABLE `appuntamento`
  ADD PRIMARY KEY (`IdAppuntamento`),
  ADD KEY `Paziente` (`IdPaziente`),
  ADD KEY `Fasciaoraria` (`IdFasciaOraria`);

--
-- Indexes for table `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`IdCalendario`),
  ADD KEY `Medico` (`IdMedico`);

--
-- Indexes for table `fascia_oraria`
--
ALTER TABLE `fascia_oraria`
  ADD PRIMARY KEY (`IdFasciaOraria`),
  ADD KEY `Calendario` (`IdCalendario`);

--
-- Indexes for table `immagine`
--
ALTER TABLE `immagine`
  ADD PRIMARY KEY (`IdImmagine`);

--
-- Indexes for table `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`IdMedico`),
  ADD KEY `Tipologia` (`IdTipologia`);

--
-- Indexes for table `paziente`
--
ALTER TABLE `paziente`
  ADD PRIMARY KEY (`IdPaziente`);

--
-- Indexes for table `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`IdRecensione`),
  ADD KEY `Medico` (`IdMedico`),
  ADD KEY `Paziente` (`IdPaziente`);

--
-- Indexes for table `referto`
--
ALTER TABLE `referto`
  ADD PRIMARY KEY (`IdReferto`),
  ADD KEY `Appuntamento` (`IdAppuntamento`);

--
-- Indexes for table `risposta`
--
ALTER TABLE `risposta`
  ADD PRIMARY KEY (`IdRisposta`),
  ADD KEY `Recensione` (`IdRecensione`),
  ADD KEY `Medico` (`IdMedico`);

--
-- Indexes for table `tipologia`
--
ALTER TABLE `tipologia`
  ADD PRIMARY KEY (`IdTipologia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amministratore`
--
ALTER TABLE `amministratore`
  MODIFY `IdAdmin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appuntamento`
--
ALTER TABLE `appuntamento`
  MODIFY `IdAppuntamento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calendario`
--
ALTER TABLE `calendario`
  MODIFY `IdCalendario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fascia_oraria`
--
ALTER TABLE `fascia_oraria`
  MODIFY `IdFasciaOraria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `immagine`
--
ALTER TABLE `immagine`
  MODIFY `IdImmagine` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medico`
--
ALTER TABLE `medico`
  MODIFY `IdMedico` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paziente`
--
ALTER TABLE `paziente`
  MODIFY `IdPaziente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recensione`
--
ALTER TABLE `recensione`
  MODIFY `IdRecensione` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referto`
--
ALTER TABLE `referto`
  MODIFY `IdReferto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `risposta`
--
ALTER TABLE `risposta`
  MODIFY `IdRisposta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipologia`
--
ALTER TABLE `tipologia`
  MODIFY `IdTipologia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appuntamento`
--
ALTER TABLE `appuntamento`
  ADD CONSTRAINT `Fasciaoraria` FOREIGN KEY (`IdFasciaOraria`) REFERENCES `fascia_oraria` (`IdFasciaOraria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `calendario`
--
ALTER TABLE `calendario`
  ADD CONSTRAINT `Medico` FOREIGN KEY (`IdMedico`) REFERENCES `medico` (`IdMedico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fascia_oraria`
--
ALTER TABLE `fascia_oraria`
  ADD CONSTRAINT `Calendario` FOREIGN KEY (`IdCalendario`) REFERENCES `calendario` (`IdCalendario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `Tipologia` FOREIGN KEY (`IdTipologia`) REFERENCES `tipologia` (`IdTipologia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recensione`
--
ALTER TABLE `recensione`
  ADD CONSTRAINT `recensione_ibfk_1` FOREIGN KEY (`IdMedico`) REFERENCES `medico` (`IdMedico`),
  ADD CONSTRAINT `recensione_ibfk_2` FOREIGN KEY (`IdPaziente`) REFERENCES `paziente` (`IdPaziente`);

--
-- Constraints for table `referto`
--
ALTER TABLE `referto`
  ADD CONSTRAINT `referto_ibfk_1` FOREIGN KEY (`IdAppuntamento`) REFERENCES `appuntamento` (`IdAppuntamento`);

--
-- Constraints for table `risposta`
--
ALTER TABLE `risposta`
  ADD CONSTRAINT `Recensione` FOREIGN KEY (`IdRecensione`) REFERENCES `recensione` (`IdRecensione`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `risposta_ibfk_1` FOREIGN KEY (`IdMedico`) REFERENCES `medico` (`IdMedico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
