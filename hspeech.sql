-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 12, 2013 at 07:36 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hspeech`
--

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE IF NOT EXISTS `rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruleAsRegex` text NOT NULL,
  `descriptionOfRule` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `ruleAsRegex`, `descriptionOfRule`) VALUES
(1, '/.*kibaki.*/', 'Should not have kibaki in it');

-- --------------------------------------------------------

--
-- Table structure for table `source`
--

CREATE TABLE IF NOT EXISTS `source` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  `sourceReference` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `source`
--

INSERT INTO `source` (`id`, `type`, `sourceReference`, `content`) VALUES
(1, 'sms', '123123123', 'President kibaki yesterday expressed concern over reports that some Kenyans are using social media to spread hate speech ahead of the March 4 polls.\r\n“I call kibaki the young people to rise up in unity and reject all perpetrators of hate and division,” said the President.');

-- --------------------------------------------------------

--
-- Table structure for table `violations`
--

CREATE TABLE IF NOT EXISTS `violations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruleId` int(11) NOT NULL,
  `sourceId` int(11) NOT NULL,
  `textWithViolation` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `violations`
--

INSERT INTO `violations` (`id`, `ruleId`, `sourceId`, `textWithViolation`) VALUES
(2, 1, 1, 'President kibaki yesterday expressed concern over reports that some Kenyans are using social media to spread hate speech ahead of the March 4 polls.\r'),
(3, 1, 1, 'President kibaki yesterday expressed concern over reports that some Kenyans are using social media to spread hate speech ahead of the March 4 polls.\r'),
(4, 1, 1, '“I call kibaki the young people to rise up in unity and reject all perpetrators of hate and division,” said the President.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
