-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 29. Okt 2011 um 16:48
-- Server Version: 5.5.16
-- PHP-Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `cms`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cms_meta_global`
--

CREATE TABLE IF NOT EXISTS `cms_meta_global` (
  `name` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `cms_meta_global`
--

INSERT INTO `cms_meta_global` (`name`, `content`) VALUES
('author', 'Autor'),
('description', 'Beschreibung der Seite');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cms_meta_local`
--

CREATE TABLE IF NOT EXISTS `cms_meta_local` (
  `name` varchar(100) NOT NULL,
  `page` int(10) NOT NULL,
  `content` varchar(100) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cms_settings`
--

CREATE TABLE IF NOT EXISTS `cms_settings` (
  `property` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `activated` int(4) NOT NULL DEFAULT '1',
  `is_editable` int(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`property`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `cms_settings`
--

INSERT INTO `cms_settings` (`property`, `value`, `activated`, `is_editable`) VALUES
('selectedskin', 'default', 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `menuID` int(10) NOT NULL DEFAULT '1',
  `content` varchar(600) NOT NULL,
  `href` varchar(800) NOT NULL,
  `activated` int(10) NOT NULL DEFAULT '1',
  `owner` int(10) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`,`menuID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `menu`
--

INSERT INTO `menu` (`id`, `menuID`, `content`, `href`, `activated`, `owner`) VALUES
(1, 1, 'Startseite / Home', 'Startseite.html', 1, -1),
(2, 1, 'Testseite', 'Testseite.html', 1, -1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `gesperrt` int(10) DEFAULT '0',
  `editable` int(10) NOT NULL DEFAULT '1',
  `activated` int(10) NOT NULL DEFAULT '1',
  `owner` int(11) NOT NULL DEFAULT '-1',
  `menu` int(11) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `pages`
--

INSERT INTO `pages` (`id`, `alias`, `title`, `gesperrt`, `editable`, `activated`, `owner`, `menu`) VALUES
(1, 'Startseite', 'Startseite', 0, 1, 1, -1, -1),
(2, '404', 'Fehler 404', 0, 1, 1, -1, -1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
