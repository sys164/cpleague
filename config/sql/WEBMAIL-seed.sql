SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

USE `dbs335705`;

-- --------------------------------------------------------

--
-- Clear tables
--
DROP TABLE IF EXISTS `rainloop_ab_contacts`;
DROP TABLE IF EXISTS `rainloop_ab_properties`;
DROP TABLE IF EXISTS `rainloop_system`;
DROP TABLE IF EXISTS `rainloop_users`;

-- --------------------------------------------------------

--
-- Table structure for table `rainloop_ab_contacts`
--

CREATE TABLE IF NOT EXISTS `rainloop_ab_contacts` (
  `id_contact` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_contact_str` varchar(128) NOT NULL DEFAULT '',
  `id_user` int(10) UNSIGNED NOT NULL,
  `display` varchar(255) NOT NULL DEFAULT '',
  `changed` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `deleted` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `etag` varchar(128) CHARACTER SET ascii NOT NULL DEFAULT '',
  PRIMARY KEY (`id_contact`),
  KEY `id_user_rainloop_ab_contacts_index` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rainloop_ab_properties`
--

CREATE TABLE IF NOT EXISTS `rainloop_ab_properties` (
  `id_prop` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_contact` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `prop_type` tinyint(3) UNSIGNED NOT NULL,
  `prop_type_str` varchar(255) CHARACTER SET ascii NOT NULL DEFAULT '',
  `prop_value` text NOT NULL,
  `prop_value_custom` text NOT NULL,
  `prop_value_lower` text NOT NULL,
  `prop_frec` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_prop`),
  KEY `id_user_rainloop_ab_properties_index` (`id_user`),
  KEY `id_user_id_contact_rainloop_ab_properties_index` (`id_user`,`id_contact`),
  KEY `id_contact_prop_type_rainloop_ab_properties_index` (`id_contact`,`prop_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rainloop_system`
--

CREATE TABLE IF NOT EXISTS `rainloop_system` (
  `sys_name` varchar(50) NOT NULL,
  `value_int` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `value_str` varchar(128) NOT NULL DEFAULT '',
  KEY `sys_name_rainloop_system_index` (`sys_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rainloop_users`
--

CREATE TABLE IF NOT EXISTS `rainloop_users` (
  `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rl_email` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_user`),
  KEY `rl_email_rainloop_users_index` (`rl_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;
