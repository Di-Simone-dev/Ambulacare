-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mag 26, 2024 alle 18:28
-- Versione del server: 10.1.37-MariaDB
-- Versione PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AmbulaCare`
--
CREATE DATABASE IF NOT EXISTS `AmbulaCare` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `AmbulaCare`;

-- --------------------------------------------------------

--
-- Struttura della tabella `Amministratore`
--
-- Creazione: Mag 25, 2024 alle 12:54
--

DROP TABLE IF EXISTS `Amministratore`;
CREATE TABLE `Amministratore` (
  `IdAdm` int(4) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELAZIONI PER TABELLA `Amministratore`:
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Appuntamento`
--
-- Creazione: Mag 25, 2024 alle 13:02
--

DROP TABLE IF EXISTS `Appuntamento`;
CREATE TABLE `Appuntamento` (
  `IdApp` int(10) UNSIGNED NOT NULL,
  `stato` varchar(5) NOT NULL,
  `Paziente` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELAZIONI PER TABELLA `Appuntamento`:
--   `Paziente`
--       `Paziente` -> `IdPaz`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Calendario`
--
-- Creazione: Mag 25, 2024 alle 13:05
--

DROP TABLE IF EXISTS `Calendario`;
CREATE TABLE `Calendario` (
  `IdCalendario` int(10) UNSIGNED NOT NULL,
  `Medico` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELAZIONI PER TABELLA `Calendario`:
--   `Medico`
--       `Medico` -> `IdMed`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Fascia_oraria`
--
-- Creazione: Mag 16, 2024 alle 17:02
--

DROP TABLE IF EXISTS `Fascia_oraria`;
CREATE TABLE `Fascia_oraria` (
  `IdFasciaOrario` int(10) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `ora_inizio` time NOT NULL,
  `Calendario` int(10) UNSIGNED NOT NULL,
  `Appuntamento` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELAZIONI PER TABELLA `Fascia_oraria`:
--   `Appuntamento`
--       `Appuntamento` -> `IdApp`
--   `Calendario`
--       `Calendario` -> `IdCalendario`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Medico`
--
-- Creazione: Mag 25, 2024 alle 13:06
--

DROP TABLE IF EXISTS `Medico`;
CREATE TABLE `Medico` (
  `IdMed` int(4) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `attivo` char(1) NOT NULL,
  `costo` float NOT NULL,
  `Tipologia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELAZIONI PER TABELLA `Medico`:
--   `Tipologia`
--       `Tipologia` -> `IdTipologia`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Paziente`
--
-- Creazione: Mag 25, 2024 alle 12:56
--

DROP TABLE IF EXISTS `Paziente`;
CREATE TABLE `Paziente` (
  `IdPaz` int(4) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Codice_Fiscale` varchar(16) NOT NULL,
  `Data_nascita` date NOT NULL,
  `Luogo_nascita` varchar(255) NOT NULL,
  `residenza` varchar(255) NOT NULL,
  `Numero_telefono` varchar(10) NOT NULL,
  `attivo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELAZIONI PER TABELLA `Paziente`:
--

--
-- Dump dei dati per la tabella `Paziente`
--

INSERT INTO `Paziente` (`IdPaz`, `nome`, `cognome`, `email`, `password`, `Codice_Fiscale`, `Data_nascita`, `Luogo_nascita`, `residenza`, `Numero_telefono`, `attivo`) VALUES
(2, 'emanuele', 'papile', 'emanuele@abruzzofoto.it', '$2y$10$ciwSx/55RaS3FyDCIAQq..Qmp7TlbzJH2/VK/p0pAPaN9VO.kAw5S', 'PPLMNL02E18C632S', '2002-05-18', 'Chieti', 'via costa delle plaie 34', '3703117772', '1');

-- --------------------------------------------------------

--
-- Struttura della tabella `Recensione`
--
-- Creazione: Mag 26, 2024 alle 16:25
--

DROP TABLE IF EXISTS `Recensione`;
CREATE TABLE `Recensione` (
  `IdRecensione` int(10) UNSIGNED NOT NULL,
  `oggetto` varchar(255) NOT NULL,
  `contenuto` text NOT NULL,
  `valutazione` float NOT NULL,
  `data_creazione_recensione` datetime NOT NULL,
  `Medico` int(4) UNSIGNED NOT NULL,
  `Paziente` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELAZIONI PER TABELLA `Recensione`:
--   `Medico`
--       `Medico` -> `IdMed`
--   `Paziente`
--       `Paziente` -> `IdPaz`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Referto`
--
-- Creazione: Mag 16, 2024 alle 17:12
--

DROP TABLE IF EXISTS `Referto`;
CREATE TABLE `Referto` (
  `IdReferto` int(10) UNSIGNED NOT NULL,
  `oggetto` varchar(255) NOT NULL,
  `contenuto` varchar(255) NOT NULL,
  `file` mediumblob NOT NULL,
  `Appuntamento` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELAZIONI PER TABELLA `Referto`:
--   `Appuntamento`
--       `Appuntamento` -> `IdApp`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Risposta`
--
-- Creazione: Mag 26, 2024 alle 16:25
--

DROP TABLE IF EXISTS `Risposta`;
CREATE TABLE `Risposta` (
  `IdRisposta` int(10) UNSIGNED NOT NULL,
  `contenuto` text NOT NULL,
  `data_creazione_risposta` datetime NOT NULL,
  `Recensione` int(10) UNSIGNED NOT NULL,
  `Medico` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELAZIONI PER TABELLA `Risposta`:
--   `Recensione`
--       `Recensione` -> `IdRecensione`
--   `Medico`
--       `Medico` -> `IdMed`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Tipologia`
--
-- Creazione: Mag 16, 2024 alle 16:51
--

DROP TABLE IF EXISTS `Tipologia`;
CREATE TABLE `Tipologia` (
  `IdTipologia` int(10) UNSIGNED NOT NULL,
  `Nome_Tipologia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELAZIONI PER TABELLA `Tipologia`:
--

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Amministratore`
--
ALTER TABLE `Amministratore`
  ADD PRIMARY KEY (`IdAdm`);

--
-- Indici per le tabelle `Appuntamento`
--
ALTER TABLE `Appuntamento`
  ADD PRIMARY KEY (`IdApp`),
  ADD KEY `Paziente` (`Paziente`);

--
-- Indici per le tabelle `Calendario`
--
ALTER TABLE `Calendario`
  ADD PRIMARY KEY (`IdCalendario`),
  ADD KEY `Medico` (`Medico`);

--
-- Indici per le tabelle `Fascia_oraria`
--
ALTER TABLE `Fascia_oraria`
  ADD PRIMARY KEY (`IdFasciaOrario`),
  ADD KEY `Calendario` (`Calendario`),
  ADD KEY `Appuntamento` (`Appuntamento`);

--
-- Indici per le tabelle `Medico`
--
ALTER TABLE `Medico`
  ADD PRIMARY KEY (`IdMed`),
  ADD KEY `Tipologia` (`Tipologia`);

--
-- Indici per le tabelle `Paziente`
--
ALTER TABLE `Paziente`
  ADD PRIMARY KEY (`IdPaz`);

--
-- Indici per le tabelle `Recensione`
--
ALTER TABLE `Recensione`
  ADD PRIMARY KEY (`IdRecensione`),
  ADD KEY `Medico` (`Medico`),
  ADD KEY `Paziente` (`Paziente`);

--
-- Indici per le tabelle `Referto`
--
ALTER TABLE `Referto`
  ADD PRIMARY KEY (`IdReferto`),
  ADD KEY `Appuntamento` (`Appuntamento`);

--
-- Indici per le tabelle `Risposta`
--
ALTER TABLE `Risposta`
  ADD PRIMARY KEY (`IdRisposta`),
  ADD KEY `Recensione` (`Recensione`),
  ADD KEY `Medico` (`Medico`);

--
-- Indici per le tabelle `Tipologia`
--
ALTER TABLE `Tipologia`
  ADD PRIMARY KEY (`IdTipologia`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Amministratore`
--
ALTER TABLE `Amministratore`
  MODIFY `IdAdm` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `Appuntamento`
--
ALTER TABLE `Appuntamento`
  MODIFY `IdApp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `Calendario`
--
ALTER TABLE `Calendario`
  MODIFY `IdCalendario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `Fascia_oraria`
--
ALTER TABLE `Fascia_oraria`
  MODIFY `IdFasciaOrario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `Medico`
--
ALTER TABLE `Medico`
  MODIFY `IdMed` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `Paziente`
--
ALTER TABLE `Paziente`
  MODIFY `IdPaz` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `Recensione`
--
ALTER TABLE `Recensione`
  MODIFY `IdRecensione` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `Referto`
--
ALTER TABLE `Referto`
  MODIFY `IdReferto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `Risposta`
--
ALTER TABLE `Risposta`
  MODIFY `IdRisposta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `Tipologia`
--
ALTER TABLE `Tipologia`
  MODIFY `IdTipologia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Appuntamento`
--
ALTER TABLE `Appuntamento`
  ADD CONSTRAINT `Paziente` FOREIGN KEY (`Paziente`) REFERENCES `Paziente` (`IdPaz`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `Calendario`
--
ALTER TABLE `Calendario`
  ADD CONSTRAINT `Medico` FOREIGN KEY (`Medico`) REFERENCES `Medico` (`IdMed`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `Fascia_oraria`
--
ALTER TABLE `Fascia_oraria`
  ADD CONSTRAINT `Appuntamento` FOREIGN KEY (`Appuntamento`) REFERENCES `Appuntamento` (`IdApp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Calendario` FOREIGN KEY (`Calendario`) REFERENCES `Calendario` (`IdCalendario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `Medico`
--
ALTER TABLE `Medico`
  ADD CONSTRAINT `Tipologia` FOREIGN KEY (`Tipologia`) REFERENCES `Tipologia` (`IdTipologia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `Recensione`
--
ALTER TABLE `Recensione`
  ADD CONSTRAINT `recensione_ibfk_1` FOREIGN KEY (`Medico`) REFERENCES `Medico` (`IdMed`),
  ADD CONSTRAINT `recensione_ibfk_2` FOREIGN KEY (`Paziente`) REFERENCES `Paziente` (`IdPaz`);

--
-- Limiti per la tabella `Referto`
--
ALTER TABLE `Referto`
  ADD CONSTRAINT `referto_ibfk_1` FOREIGN KEY (`Appuntamento`) REFERENCES `Appuntamento` (`IdApp`);

--
-- Limiti per la tabella `Risposta`
--
ALTER TABLE `Risposta`
  ADD CONSTRAINT `Recensione` FOREIGN KEY (`Recensione`) REFERENCES `Recensione` (`IdRecensione`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `risposta_ibfk_1` FOREIGN KEY (`Medico`) REFERENCES `Medico` (`IdMed`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
