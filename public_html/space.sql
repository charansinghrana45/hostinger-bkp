
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2018 at 07:09 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u263595047_space`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `article_image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;


--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(255) NOT NULL,
  `book_price` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;


--
-- Table structure for table `brico_beta_extern_newspapers`
--

CREATE TABLE IF NOT EXISTS `brico_beta_extern_newspapers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `npid` int(11) unsigned NOT NULL,
  `npname` varchar(250) NOT NULL,
  `docurl` varchar(500) NOT NULL,
  `docurl2` varchar(500) NOT NULL,
  `docurl3` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `npid` (`npid`,`npname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


--
-- Table structure for table `brico_newspapers`
--

CREATE TABLE IF NOT EXISTS `brico_newspapers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `npid` int(11) unsigned NOT NULL,
  `npname` varchar(250) NOT NULL,
  `docurl` varchar(500) NOT NULL,
  `docurl2` varchar(500) NOT NULL,
  `docurl3` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `npid` (`npid`,`npname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;


--
-- Table structure for table `dk_newspapers`
--

CREATE TABLE IF NOT EXISTS `dk_newspapers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `npid` int(11) unsigned NOT NULL,
  `npname` varchar(250) NOT NULL,
  `docurl` varchar(500) NOT NULL,
  `docurl2` varchar(500) NOT NULL,
  `docurl3` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `npid` (`npid`,`npname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;



--
-- Table structure for table `egp_fr_newspapers`
--

CREATE TABLE IF NOT EXISTS `egp_fr_newspapers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `npid` int(11) unsigned NOT NULL,
  `npname` varchar(250) NOT NULL,
  `docurl` varchar(500) NOT NULL,
  `docurl2` varchar(500) NOT NULL,
  `docurl3` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `npid` (`npid`,`npname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;


--
-- Table structure for table `fi_newspapers`
--

CREATE TABLE IF NOT EXISTS `fi_newspapers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `npid` int(11) unsigned NOT NULL,
  `npname` varchar(250) NOT NULL,
  `docurl` varchar(500) NOT NULL,
  `docurl2` varchar(500) NOT NULL,
  `docurl3` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `npid` (`npid`,`npname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;


--
-- Table structure for table `fr_newspapers`
--

CREATE TABLE IF NOT EXISTS `fr_newspapers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `npid` int(11) unsigned NOT NULL,
  `npname` varchar(250) NOT NULL,
  `docurl` varchar(500) NOT NULL,
  `docurl2` varchar(500) NOT NULL,
  `docurl3` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `npid` (`npid`,`npname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=344 ;


--
-- Table structure for table `id_newspapers`
--

CREATE TABLE IF NOT EXISTS `id_newspapers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `npid` int(11) unsigned NOT NULL,
  `npname` varchar(250) NOT NULL,
  `docurl` varchar(500) NOT NULL,
  `docurl2` varchar(500) NOT NULL,
  `docurl3` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `npid` (`npid`,`npname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;


--
-- Table structure for table `meubles_newspapers`
--

CREATE TABLE IF NOT EXISTS `meubles_newspapers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `npid` int(11) unsigned NOT NULL,
  `npname` varchar(250) NOT NULL,
  `docurl` varchar(500) NOT NULL,
  `docurl2` varchar(500) NOT NULL,
  `docurl3` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `npid` (`npid`,`npname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;


--
-- Table structure for table `multi_newspapers`
--

CREATE TABLE IF NOT EXISTS `multi_newspapers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `npid` int(11) unsigned NOT NULL,
  `npname` varchar(250) NOT NULL,
  `docurl` varchar(500) NOT NULL,
  `docurl2` varchar(500) NOT NULL,
  `docurl3` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `npid` (`npid`,`npname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;


--
-- Table structure for table `my_newspapers`
--

CREATE TABLE IF NOT EXISTS `my_newspapers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `npid` int(11) unsigned NOT NULL,
  `npname` varchar(250) NOT NULL,
  `docurl` varchar(500) NOT NULL,
  `docurl2` varchar(500) NOT NULL,
  `docurl3` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `npid` (`npid`,`npname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;


--
-- Table structure for table `no_newspapers`
--

CREATE TABLE IF NOT EXISTS `no_newspapers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `npid` int(11) unsigned NOT NULL,
  `npname` varchar(250) NOT NULL,
  `docurl` varchar(500) NOT NULL,
  `docurl2` varchar(500) NOT NULL,
  `docurl3` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `npid` (`npid`,`npname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;


--
-- Table structure for table `ph_newspapers`
--

CREATE TABLE IF NOT EXISTS `ph_newspapers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `npid` int(11) unsigned NOT NULL,
  `npname` varchar(250) NOT NULL,
  `docurl` varchar(500) NOT NULL,
  `docurl2` varchar(500) NOT NULL,
  `docurl3` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `npid` (`npid`,`npname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Table structure for table `sg_newspapers`
--

CREATE TABLE IF NOT EXISTS `sg_newspapers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `npid` int(11) unsigned NOT NULL,
  `npname` varchar(250) NOT NULL,
  `docurl` varchar(500) NOT NULL,
  `docurl2` varchar(500) NOT NULL,
  `docurl3` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `npid` (`npid`,`npname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;



--
-- Table structure for table `sw_newspapers`
--

CREATE TABLE IF NOT EXISTS `sw_newspapers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `npid` int(11) unsigned NOT NULL,
  `npname` varchar(250) NOT NULL,
  `docurl` varchar(500) NOT NULL,
  `docurl2` varchar(500) NOT NULL,
  `docurl3` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `npid` (`npid`,`npname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;



--
-- Table structure for table `th_newspapers`
--

CREATE TABLE IF NOT EXISTS `th_newspapers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `npid` int(11) unsigned NOT NULL,
  `npname` varchar(250) NOT NULL,
  `docurl` varchar(500) NOT NULL,
  `docurl2` varchar(500) NOT NULL,
  `docurl3` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `npid` (`npid`,`npname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `level` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


--
-- Table structure for table `vn_newspapers`
--

CREATE TABLE IF NOT EXISTS `vn_newspapers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `npid` int(11) unsigned NOT NULL,
  `npname` varchar(250) NOT NULL,
  `docurl` varchar(500) NOT NULL,
  `docurl2` varchar(500) NOT NULL,
  `docurl3` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `npid` (`npid`,`npname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
