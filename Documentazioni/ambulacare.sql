-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 08:11 PM
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

CREATE TABLE `amministratore` (
  `IdAdmin` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `amministratore`
--

INSERT INTO `amministratore` (`IdAdmin`, `nome`, `cognome`, `email`, `password`) VALUES
(1, 'Jennie', 'Kerluke', 'Elyssa_Ward@example.org', 'QuUjxmc5bzs8sof'),
(2, 'Zena', 'Bergnaum', 'Dina16@example.net', '0tGqgGwLxR0Y2pt'),
(3, 'Noel', 'Price', 'Hoyt_Stokes72@example.net', 'Py8xusI_kUaOKnf'),
(4, 'Rosina', 'Cassin', 'Fredrick94@example.net', 'l81dNbFliDQkALj'),
(5, 'Gwen', 'Prosacco', 'Morgan.Breitenberg@example.org', 'LUe0SyPO634nzWt'),
(6, 'Henri', 'Lowe', 'Nikolas_Lakin@example.com', 'uB0SyBAZzirUrkA'),
(7, 'Madyson', 'Pfeffer', 'Jenifer.Shanahan59@example.org', 'C_hVhtwviFqPJTe'),
(8, 'Orrin', 'Ledner', 'Diamond_Connelly@example.org', 'wJGgkeMPNbZtJec'),
(9, 'Rachael', 'Rutherford', 'Zena.Haag84@example.com', 'bdE9DhjYDXes6mH'),
(10, 'Tracey', 'Runte', 'Eldora.Wisozk19@example.org', 'T9a4AIlVeuWqDUZ'),
(11, 'Manuel', 'Gutmann', 'Billie.Kshlerin@example.net', 'b2TLBKQIeXYDNQ8'),
(12, 'Anita', 'Hermann', 'Brendan38@example.net', 'j8DSRcyyVY4OhKC'),
(13, 'Brando', 'Maggio', 'Stanford_Hansen0@example.com', 'PFMvA1bYrXv469o'),
(14, 'Maritza', 'Bayer', 'Ezekiel.Harvey30@example.net', 'grhXWc3nvvGL4P3'),
(15, 'Coby', 'Heathcote', 'Lily2@example.net', 'g0Rvuzvyhq31xFS'),
(16, 'Jennie', 'Kassulke', 'Oceane_Smith3@example.org', 'WeVnY5hoW_WeMdl'),
(17, 'Nora', 'Boehm', 'Martina59@example.com', 'tgWbVYAaFhF4wHx'),
(18, 'Savanah', 'Wolf', 'Ludwig57@example.org', '6HpYEpxl0a6_iUY'),
(19, 'Tommie', 'Larkin', 'Eleanora67@example.org', 'H_yZdHnX0nmxvyR'),
(20, 'Heath', 'Hodkiewicz', 'Violet_Rosenbaum@example.com', 'abhkjqGafsX_hLE'),
(21, 'Sabryna', 'VonRueden', 'Cecil_Littel@example.net', 'HZyek5e0oY4OsfD'),
(22, 'Jaida', 'Hickle', 'Cristopher39@example.net', 'VF6xQz7y7uYycAL'),
(23, 'Judson', 'Robel', 'Xzavier.Thompson@example.com', 'Hdo0YNaUKmVXPTW'),
(24, 'Elwin', 'Dare', 'Darrin_Boyer@example.org', 'Lrk36p15ZNQH6uG'),
(25, 'Freddie', 'Reilly', 'Lizzie_Borer@example.com', 'pZT6AJOjfmEMo5V'),
(26, 'Robyn', 'Cremin', 'Oswald39@example.org', 'nX67d_jxnNWEALt'),
(27, 'Christy', 'Kiehn', 'Graciela_Kerluke@example.org', 'gBq5Ht7v3t43OJE'),
(28, 'Gussie', 'Friesen', 'Fanny97@example.org', 'FmoQGD2q9YbUi9d'),
(29, 'Maynard', 'Erdman', 'Charlotte56@example.org', 'ySbESknQgfAdeN3'),
(30, 'Alford', 'Lockman', 'Flavio.Wilkinson7@example.net', 'J1IPWvhkKIcw7e3'),
(31, 'Lauryn', 'Schumm', 'Susanna99@example.com', '15Ue5ARglVl5wSU'),
(32, 'Cedrick', 'Abshire', 'Gino.Klein@example.net', 'ab4GCieNTLlI0ja'),
(33, 'Stefan', 'Wehner', 'Joshua_Hickle47@example.com', 'wpPUO45LFjWeCrQ'),
(34, 'Westley', 'Berge', 'Payton.Donnelly@example.net', 'pqZnzW35CMFbmRf'),
(35, 'Alverta', 'Jacobi', 'Wilbert5@example.net', 'uscgJY4bkzbcSn0'),
(36, 'Crawford', 'Shields', 'Dandre_Erdman35@example.net', 'IbAde3TglLSmIAn'),
(37, 'Zachariah', 'Terry', 'Jake_Rippin99@example.org', 'iz2l8KDcVPAPjCh'),
(38, 'Cole', 'Emmerich', 'Breanna.Waelchi63@example.net', 'O95rNX8ichIR_wS'),
(39, 'Betty', 'MacGyver', 'Corene.Bahringer@example.org', 'V4P0mq9ghPn_Gbk'),
(40, 'Branson', 'Mayer', 'Brannon_Keebler@example.com', 'PpuRl_xxfDK2cpw'),
(41, 'Idella', 'Ryan', 'Ericka_Denesik3@example.com', 'AYYwA99p1P5VZSi'),
(42, 'Barton', 'Purdy', 'Amparo.Blick36@example.net', 'Vq49Vmg8CqyWJL8'),
(43, 'Darius', 'Rogahn', 'Arno_Beier@example.org', 'bgttEf2Kg3VNMin'),
(44, 'Donnell', 'Medhurst', 'Linnie.McDermott6@example.net', '4b5nqGB7tWHgRj7'),
(45, 'Brennon', 'Harber', 'Janelle.Rau@example.org', 'KmFsAQF5qFhkodR'),
(46, 'Sadye', 'Thompson', 'Ethelyn_Kessler30@example.net', 'v2JuUJhsRDdhNgJ'),
(47, 'Reuben', 'Buckridge', 'Pablo.Dicki@example.com', 'Q5GS38ACtE8_MTB'),
(48, 'Reese', 'Wisozk', 'Madalyn88@example.net', 'jPqUJCxjbl3ID36'),
(49, 'Melvina', 'Rath', 'Victoria83@example.org', 'MBfWKGg_a0QSPHs'),
(50, 'Marcelle', 'Kutch', 'Monroe10@example.com', 'a1uxOG2Um_Wrs8x');

-- --------------------------------------------------------

--
-- Table structure for table `appuntamento`
--

CREATE TABLE `appuntamento` (
  `IdAppuntamento` int(10) UNSIGNED NOT NULL,
  `IdPaziente` int(10) UNSIGNED NOT NULL,
  `IdFasciaOraria` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calendario`
--

CREATE TABLE `calendario` (
  `IdCalendario` int(10) UNSIGNED NOT NULL,
  `IdMedico` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fascia_oraria`
--

CREATE TABLE `fascia_oraria` (
  `IdFasciaOraria` int(10) UNSIGNED NOT NULL,
  `data` datetime NOT NULL,
  `IdCalendario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immagine`
--

CREATE TABLE `immagine` (
  `IdImmagine` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `dimensione` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `dati` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medico`
--

CREATE TABLE `medico` (
  `IdMedico` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `attivo` char(1) NOT NULL,
  `costo` float NOT NULL,
  `IdTipologia` int(10) UNSIGNED NOT NULL,
  `IdImmagine` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paziente`
--

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

CREATE TABLE `recensione` (
  `IdRecensione` int(10) UNSIGNED NOT NULL,
  `titolo` varchar(255) NOT NULL,
  `contenuto` varchar(255) NOT NULL,
  `valutazione` float NOT NULL,
  `data_creazione` datetime NOT NULL,
  `IdMedico` int(10) UNSIGNED NOT NULL,
  `IdPaziente` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referto`
--

CREATE TABLE `referto` (
  `IdReferto` int(10) UNSIGNED NOT NULL,
  `oggetto` varchar(255) NOT NULL,
  `contenuto` varchar(255) NOT NULL,
  `IdAppuntamento` int(10) UNSIGNED NOT NULL,
  `IdImmagine` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `risposta`
--

CREATE TABLE `risposta` (
  `IdRisposta` int(10) UNSIGNED NOT NULL,
  `contenuto` varchar(255) NOT NULL,
  `data_creazione` datetime NOT NULL,
  `IdRecensione` int(10) UNSIGNED NOT NULL,
  `IdMedico` int(10) UNSIGNED NOT NULL COMMENT 'Campo ridondante, visto che il medico che può rispondere è solo quello della recensione, quindi direttamente correlato, ma teniamo questo campo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipologia`
--

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
  ADD KEY `Tipologia` (`IdTipologia`),
  ADD KEY `Fotoprofilo` (`IdImmagine`);

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
  ADD KEY `Appuntamento` (`IdAppuntamento`),
  ADD KEY `Immagine referto` (`IdImmagine`);

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
  MODIFY `IdAdmin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

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
  ADD CONSTRAINT `Fotoprofilo` FOREIGN KEY (`IdImmagine`) REFERENCES `immagine` (`IdImmagine`),
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
  ADD CONSTRAINT `Immagine referto` FOREIGN KEY (`IdImmagine`) REFERENCES `immagine` (`IdImmagine`),
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
