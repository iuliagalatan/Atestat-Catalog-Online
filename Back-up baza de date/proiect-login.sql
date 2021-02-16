-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2019 at 11:32 AM
-- Server version: 5.5.61-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `proiect-login`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

DROP TABLE IF EXISTS `catalog`;
CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `materie` varchar(20) NOT NULL,
  `nota` int(3) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id`, `id_user`, `materie`, `nota`, `data`) VALUES
(1, 6, 'Matematica', 10, '2019-02-21'),
(2, 9, 'Limba romana', 9, '2019-03-11'),
(3, 6, 'Limba romana', 8, '0000-00-00'),
(4, 6, 'Fizica', 6, '0000-00-00'),
(5, 6, 'Limba romana', 7, '2019-08-07'),
(9, 9, 'Psihologie', 10, '2000-01-01'),
(10, 9, 'Fizica', 6, '2008-02-21'),
(12, 9, 'Biologie', 8, '2019-07-11'),
(13, 9, 'Matematica', 10, '2019-04-20'),
(14, 6, 'Informatica', 8, '2019-04-20'),
(15, 9, 'Geografie', 8, '2019-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_first` varchar(250) NOT NULL,
  `user_last` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_uid` varchar(250) NOT NULL,
  `user_pwd` varchar(250) NOT NULL,
  `este_admin` int(11) NOT NULL,
  `este_elev` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`, `este_admin`, `este_elev`) VALUES
(2, 'Galatan', 'Susana', 'galatan_suzana@yahoo.com', 'admin', '1234', 1, 0),
(4, 'Galatan', 'Susana', 'galatan_suzana@yahoo.com', 'admin', 'iuliuta', 0, 1),
(5, 'Galatan', 'Susana', 'galatan_suzana@yahoo.com', '1', '1', 0, 1),
(6, 'Iulia', 'Galatan', 'iulia.frumusyk@yahoo.com', 'admin2', 'iulia', 0, 1),
(7, 'ili', 'tyyy', 'iulia.frumusyk@yahoo.com', 'mo', 'mo', 0, 1),
(8, 'Galatan', 'Susana', 'galatan_suzana@yahoo.com', 'tivu', '45', 0, 1),
(9, 'Alex', 'Bota', 'alebota2ooo@yahoo.com', 'alex', 'alex', 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
