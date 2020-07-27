SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `dbs324471`
--
-- CREATE DATABASE IF NOT EXISTS `dbs324471` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dbs324471`;

-- --------------------------------------------------------

--
-- Clear tables
--
DROP TABLE IF EXISTS `chairperson`;
DROP TABLE IF EXISTS `clubs`;
DROP TABLE IF EXISTS `commmittee`;
DROP TABLE IF EXISTS `divisions`;
DROP TABLE IF EXISTS `secretary`;
DROP TABLE IF EXISTS `treasurer`;
DROP TABLE IF EXISTS `welfare`;
DROP TABLE IF EXISTS `teams`;
DROP TABLE IF EXISTS `coaches`;

-- --------------------------------------------------------

--
-- Table structure for table `chairperson`
--
CREATE TABLE `chairperson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`),
  `firstname` varchar(20) DEFAULT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `hash` varchar(32) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--
CREATE TABLE `clubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`),
  `name` varchar(50) NOT NULL,
    UNIQUE KEY `name` (`name`),
  `street` varchar(50) DEFAULT NULL,
  `area` varchar(50) NOT NULL,
  `town` varchar(50) NOT NULL,
  `postcode1` varchar(10) NOT NULL,
  `postcode2` varchar(10) DEFAULT NULL,
  `website` varchar(60) DEFAULT NULL,
  `distance` decimal(20,13) NOT NULL,
  `chairperson` int(11) DEFAULT NULL,
  `secretary` int(11) DEFAULT NULL,
  `welfare` int(11) DEFAULT NULL,
  `treasurer` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commmittee`
--
CREATE TABLE `commmittee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`),
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `email` varchar(255) DEFAULT NULL,
    UNIQUE KEY `email` (`email`),
  `mobile` varchar(11) DEFAULT NULL,
  `position` enum('Secretary','Chairman','Treasurer','Welfare Officer','Discipline Officer','Assistant Secretary','Committee') DEFAULT NULL,
  `agegroup` set('U7','U8','U9','U10','U11','U11','U12','U13','U14') DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Modified` datetime DEFAULT NULL,
  `Active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--
CREATE TABLE IF NOT EXISTS `divisions` (
  `id` int(11) NOT NULL,
    PRIMARY KEY (`id`),
  `league_id` int(11) NOT NULL,
  `agegroup` enum('U7','U8','U9','U10','U11','U12','U13','U14','U15','U16','U17','U18','Open') NOT NULL,
  `season` enum('2019-20','2020-21','2021-22','2022-23','2023-24') NOT NULL,
  `season_id` int(11) NOT NULL,
  `division_suffix` varchar(255) DEFAULT NULL,
  `division_code` varchar(5) NOT NULL,
  `division_id` int(11) NOT NULL,
    UNIQUE KEY `division_id` (`division_id`),
  `division_season` int(11) DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Modified` datetime DEFAULT NULL,
  `Active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `secretary`
--
CREATE TABLE IF NOT EXISTS `secretary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`),
  `firstname` varchar(20) DEFAULT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `hash` varchar(32) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `treasurer`
--
CREATE TABLE IF NOT EXISTS `treasurer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`),
  `firstname` varchar(20) DEFAULT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `welfare`
--
CREATE TABLE IF NOT EXISTS `welfare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`),
  `firstname` varchar(20) DEFAULT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--
CREATE TABLE IF NOT EXISTS `coaches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`),
  `firstname` varchar(20) DEFAULT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`),
  `age` enum('U7','U8','U9','U10','U11','U12','U13','U14','U15','U16','U17','U18','Open') NOT NULL,
  `name` int(11) DEFAULT NULL,
  `club` int(11) DEFAULT NULL,
  `coach` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

COMMIT;
