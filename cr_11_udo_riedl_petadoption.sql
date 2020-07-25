-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Jul 2020 um 16:58
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr_11_udo_riedl_petadoption`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animals`
--

CREATE TABLE `animals` (
  `animals_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `breed` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `age_category` enum('Young','Adult','Senior') NOT NULL,
  `size` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `animals`
--

INSERT INTO `animals` (`animals_id`, `img`, `name`, `type`, `breed`, `age`, `age_category`, `size`, `description`, `hobbies`, `location`) VALUES
(1, 'bald', 'Dog', 'dog', 'Bulldog', 5, 'Adult', 'small', 'good boy', 'eat', 'tierschutzhaus vienna'),
(11, 'NO IMG', 'Snuffl', 'Dog', 'Bulldog', 12, 'Senior', 'medium', 'good dog', 'eat', ''),
(13, 'NO IMG', 'Snuffl', 'Cat', 'Main-Coon', 1, 'Young', 'medium', 'good cat', 'sleep', ''),
(14, 'NO IMG', 'Snowball', 'Cat', 'Main-Coon', 1, 'Young', 'medium', 'good cat', 'eat', ''),
(15, 'NO IMG', 'Snowball2', 'Cat', 'Main-Coon', 1, 'Young', 'medium', 'good cat', 'eat', ''),
(16, 'NO IMG', 'Butch', 'Dog', 'Bulldog', 3, 'Adult', 'medium', 'good dog', 'sleep', ''),
(17, 'NO IMG', 'Mr. Maus', 'Maus', 'just a mouse', 1, 'Young', 'small', 'good mouse', 'eat', ''),
(18, 'NO IMG', 'Mr. Maus', 'Mouse', 'just a mouse', 1, 'Young', 'small', 'good mouse', 'eat', ''),
(19, 'NO IMG', 'Ms. Maus', 'Maus', 'just a mouse', 1, 'Young', 'small', 'good mouse', 'eat', ''),
(20, 'NO', 'Horso', 'Horse', 'Ponny', 4, 'Adult', 'large', 'good ponny', 'eat', ''),
(21, 'NO IMG', 'Horso2', 'Horse', 'Ponny', 9, 'Senior', 'large', 'good ponny', 'eat', ''),
(22, 'NO IMG', 'Horso3', 'Donkey', 'Donkey', 9, 'Senior', 'large', 'good donkey', 'eat', ''),
(24, 'NO IMG', 'Horso4', 'Donkey', 'Donkey', 10, 'Senior', 'large', 'good donkey', 'sleep', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customerPass` varchar(255) NOT NULL,
  `role` enum('customer','admin','super_admin') NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `customer_email`, `customerPass`, `role`) VALUES
(3, 'testa', 'testa@testa.at', '39ad43d6ad8a58be3c1def105e4f5a469336c003c36ad7850b688e94ded2b3b2', 'admin'),
(4, 'testi', 'testi@testi.at', 'f16273c2f4c5ae62d55930bcb9dfdd6f1ff653292d52e2b1a9e8a565a9fa6ccc', 'super_admin'),
(5, 'testu', 'testu@testu.at', 'a106de2276882c6b5c15d4c66ba24c5c849b8a1292387c080b39c92e1d5d5c1c', 'customer');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animals_id`);

--
-- Indizes für die Tabelle `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_email` (`customer_email`) USING BTREE;

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `animals`
--
ALTER TABLE `animals`
  MODIFY `animals_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT für Tabelle `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
