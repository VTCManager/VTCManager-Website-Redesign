-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 11. Mrz 2020 um 19:58
-- Server-Version: 10.0.38-MariaDB-0+deb8u1
-- PHP-Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `nwv_api`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `data_service`
--

CREATE TABLE `data_service` (
  `Name` varchar(100) NOT NULL,
  `Value_int` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `data_service`
--

INSERT INTO `data_service` (`Name`, `Value_int`) VALUES
('total_user', 249);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_data`
--

CREATE TABLE `user_data` (
  `user_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `email_address` varchar(300) NOT NULL,
  `password_hash` varchar(300) NOT NULL,
  `activated` tinyint(4) NOT NULL DEFAULT '0',
  `activate_hash` varchar(200) NOT NULL,
  `reset_hash` varchar(200) NOT NULL,
  `language` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user_data`
--

INSERT INTO `user_data` (`user_id`, `username`, `full_name`, `email_address`, `password_hash`, `activated`, `activate_hash`, `reset_hash`, `language`) VALUES
(1, 'admin', 'Admin', 'admin@admin.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, 'activated', 'used', 'de');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
