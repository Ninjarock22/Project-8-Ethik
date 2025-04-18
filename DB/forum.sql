-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Apr 2025 um 23:12
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `ethik-project`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `forum`
--

CREATE TABLE `forum` (
  `id` int(11) UNSIGNED NOT NULL,
  `idnutzer` int(11) NOT NULL,
  `messagetext` text NOT NULL,
  `showentry` tinyint(4) NOT NULL,
  `entrytime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `forum`
--

INSERT INTO `forum` (`id`, `idnutzer`, `messagetext`, `showentry`, `entrytime`) VALUES
(1, 1, 'Dies ein Text, welcher schon in der Datenbank steht.', 1, '2025-04-17 20:21:18');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
