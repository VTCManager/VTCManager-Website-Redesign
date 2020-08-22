-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 14. Mrz 2020 um 17:16
-- Server-Version: 10.3.17-MariaDB
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
-- Datenbank: `vtcmanager`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `application`
--

CREATE TABLE `application` (
  `byUserID` int(11) DEFAULT NULL,
  `forCompanyID` int(11) DEFAULT NULL,
  `applicationID` int(11) DEFAULT NULL,
  `forRank` varchar(200) DEFAULT NULL,
  `status` varchar(200) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `authcode_table`
--

CREATE TABLE `authcode_table` (
  `User` varchar(200) NOT NULL,
  `Token` varchar(200) NOT NULL,
  `Expires` datetime NOT NULL DEFAULT current_timestamp(),
  `client` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `career_table`
--

CREATE TABLE `career_table` (
  `username` varchar(200) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `atCompanyID` int(11) DEFAULT NULL,
  `job` varchar(100) DEFAULT NULL,
  `start_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` datetime DEFAULT NULL,
  `fire_reason` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `company_information_table`
--

CREATE TABLE `company_information_table` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `founded_date` datetime NOT NULL DEFAULT current_timestamp(),
  `employees` int(11) DEFAULT NULL,
  `tours_done` int(11) DEFAULT NULL,
  `driven_km` int(11) DEFAULT NULL,
  `rank_route` int(11) DEFAULT NULL,
  `rank_money` int(11) DEFAULT NULL,
  `bank_balance` double DEFAULT NULL,
  `exist_another_client` tinyint(4) DEFAULT NULL,
  `company_pic_url` varchar(200) NOT NULL DEFAULT 'https://vtc.northwestvideo.de/media/profile_pictures/default_avatar.png',
  `discord_url` varchar(200) DEFAULT NULL,
  `website_url` varchar(200) DEFAULT NULL,
  `teamspeak_url` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `help_articles`
--

CREATE TABLE `help_articles` (
  `article_name` varchar(400) DEFAULT NULL,
  `ID` int(11) DEFAULT NULL,
  `clicks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `help_articles`
--

INSERT INTO `help_articles` (`article_name`, `ID`, `clicks`) VALUES
('VTCManager zeigt Initialisierung... an', 1, 18);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `job_market`
--

CREATE TABLE `job_market` (
  `byCompanyID` int(11) DEFAULT NULL,
  `rank` varchar(200) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `AdID` int(11) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `money_transfer`
--

CREATE TABLE `money_transfer` (
  `sender` varchar(200) DEFAULT NULL,
  `receiver` varchar(200) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL,
  `date_sent` datetime NOT NULL DEFAULT current_timestamp(),
  `amount` double DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `notification`
--

CREATE TABLE `notification` (
  `id` int(11) DEFAULT NULL,
  `forUser` varchar(200) DEFAULT NULL,
  `time` datetime DEFAULT current_timestamp(),
  `read_status` tinyint(4) DEFAULT NULL,
  `event` varchar(40) DEFAULT NULL,
  `eventID` int(11) DEFAULT NULL,
  `eventbyUser` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `process_whitelist`
--

CREATE TABLE `process_whitelist` (
  `event` varchar(200) DEFAULT NULL,
  `value1` varchar(300) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `process_whitelist`
--

INSERT INTO `process_whitelist` (`event`, `value1`, `userID`, `created_date`) VALUES
('connectToIFMP', '', 1, '2020-02-27 18:59:41');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rank`
--

CREATE TABLE `rank` (
  `name` varchar(200) DEFAULT NULL,
  `forCompanyID` int(11) DEFAULT NULL,
  `EditProfile` tinyint(4) NOT NULL DEFAULT 0,
  `SeeLogbook` tinyint(4) NOT NULL DEFAULT 0,
  `EditLogbook` tinyint(4) NOT NULL DEFAULT 0,
  `SeeBank` tinyint(4) NOT NULL DEFAULT 0,
  `UseBank` tinyint(4) NOT NULL DEFAULT 0,
  `EditEmployees` tinyint(4) NOT NULL DEFAULT 0,
  `EditSalary` tinyint(4) NOT NULL DEFAULT 0,
  `salary` int(11) DEFAULT NULL,
  `struct_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `staff_roles`
--

CREATE TABLE `staff_roles` (
  `name` varchar(200) DEFAULT NULL,
  `struct_id` int(11) DEFAULT NULL,
  `change_staff_rank` tinyint(4) DEFAULT NULL,
  `remove_staff` tinyint(4) DEFAULT NULL,
  `view_user_data` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `staff_roles`
--

INSERT INTO `staff_roles` (`name`, `struct_id`, `change_staff_rank`, `remove_staff`, `view_user_data`) VALUES
('Project Director', 1000, 1, 1, 1),
('Project Manager', 900, 1, 1, 1),
('Developer', 600, 1, 1, 1),
('Supporter', 400, 0, 0, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tour_table`
--

CREATE TABLE `tour_table` (
  `username` varchar(100) DEFAULT NULL,
  `departure` varchar(100) DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `truck_manufacturer` varchar(100) DEFAULT NULL,
  `truck_model` varchar(100) DEFAULT NULL,
  `trailer_damage` int(11) DEFAULT 0,
  `cargo_weight` varchar(100) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `money_earned` int(11) DEFAULT 0,
  `tour_date` datetime NOT NULL DEFAULT current_timestamp(),
  `finished_date` datetime DEFAULT NULL,
  `tour_id` int(11) DEFAULT 0,
  `status` varchar(50) DEFAULT NULL,
  `percentage` int(11) DEFAULT 0,
  `companyID` int(11) DEFAULT 0,
  `global_tourid` int(11) DEFAULT 0,
  `depature_company` varchar(200) DEFAULT NULL,
  `destination_company` varchar(200) DEFAULT NULL,
  `tour_approved` tinyint(4) NOT NULL DEFAULT 0,
  `distance` int(11) DEFAULT 0,
  `hash_tag` varchar(300) DEFAULT NULL,
  `fuelconsumption` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `truck_info`
--

CREATE TABLE `truck_info` (
  `manufacturer` varchar(200) DEFAULT NULL,
  `model` varchar(200) DEFAULT NULL,
  `image_source_url` varchar(300) DEFAULT NULL,
  `image_url` varchar(200) DEFAULT NULL,
  `performance` varchar(150) DEFAULT NULL,
  `emission_standard` varchar(100) DEFAULT NULL,
  `engine` varchar(100) DEFAULT NULL,
  `engine_manufacturer` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `truck_info`
--

INSERT INTO `truck_info` (`manufacturer`, `model`, `image_source_url`, `image_url`, `performance`, `emission_standard`, `engine`, `engine_manufacturer`) VALUES
('Renault', 'T', 'https://www.renault-trucks.de/media/image/nouvelles-gammes/renault-trucks-t-high-2019-image.jpg', '/media/images/trucks/renault-t.jpg', '380-520PS', 'Euro 6', 'DTI 11/13', 'Volvo');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_data`
--

CREATE TABLE `user_data` (
  `userID` int(100) DEFAULT NULL,
  `userCompanyID` int(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `profile_pic_url` varchar(300) DEFAULT NULL,
  `last_tour_id` int(11) DEFAULT NULL,
  `bank_balance` double DEFAULT NULL,
  `rank` varchar(100) DEFAULT NULL,
  `last_seen` datetime DEFAULT NULL,
  `coordinate_x` double DEFAULT NULL,
  `coordinate_y` double DEFAULT NULL,
  `rotation` double DEFAULT NULL,
  `last_loc_update` datetime DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `lang` varchar(10) DEFAULT NULL,
  `staff_role` varchar(100) DEFAULT NULL,
  `staff_struct_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user_data`
--

INSERT INTO `user_data` (`userID`, `userCompanyID`, `username`, `profile_pic_url`, `last_tour_id`, `bank_balance`, `rank`, `last_seen`, `coordinate_x`, `coordinate_y`, `rotation`, `last_loc_update`, `created_date`, `lang`, `staff_role`, `staff_struct_id`) VALUES
(1, 0, 'admin', 'https://vtc.northwestvideo.de/media/profile_pictures/admin.PNG', 145, 7002, 'owner', '2020-03-14 17:10:49', 1000, 1000, 0, '2020-03-14 16:49:28', '2020-01-02 12:44:14', 'de', 'Project Director', 1000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
