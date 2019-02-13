-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 13, 2019 at 12:55 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `venue`, `date`, `time`, `description`) VALUES
(1, 'My event', 'asdeghdjyk', '2019-02-17', '03:04:00', 'sfdmhet,tmsgnadn'),
(2, 'Event 2', 'qwert dfgh xcv bn', '2019-07-31', '05:07:00', 'qwer asdfg werft sdfg wert,awdfg wertfg asdfg sdfgqekhfgjhaefbvejafbvekf.\r\nwwdjefvbiefhbvqjhefv,hwbwrbiwbvospfvoqejfnkqeefbkenf75613dfb.\r\nwfjhqwbfvbqwkfvbkwfnv,effivbqefvjefbveenfjknefefbefbqefb,efbqefbqem enbefbg ebwefbgbegbqef bfg etbqet sefb,et bqethmje bqeth ewtgqet, jol;olkhgsfg, \r\nThank you.'),
(3, 'Event 2', 'qwert dfgh xcv bn', '2019-07-31', '05:07:00', 'qwer asdfg werft sdfg wert,awdfg wertfg asdfg sdfgqekhfgjhaefbvejafbvekf.\r\nwwdjefvbiefhbvqjhefv,hwbwrbiwbvospfvoqejfnkqeefbkenf75613dfb.\r\nwfjhqwbfvbqwkfvbkwfnv,effivbqefvjefbveenfjknefefbefbqefb,efbqefbqem enbefbg ebwefbgbegbqef bfg etbqet sefb,et bqethmje bqeth ewtgqet, jol;olkhgsfg, \r\nThank you.'),
(4, 'Event 2', 'qwert dfgh xcv bn', '2019-07-31', '05:07:00', 'qwer asdfg werft sdfg wert,awdfg wertfg asdfg sdfgqekhfgjhaefbvejafbvekf.\r\nwwdjefvbiefhbvqjhefv,hwbwrbiwbvospfvoqejfnkqeefbkenf75613dfb.\r\nwfjhqwbfvbqwkfvbkwfnv,effivbqefvjefbveenfjknefefbefbqefb,efbqefbqem enbefbg ebwefbgbegbqef bfg etbqet sefb,et bqethmje bqeth ewtgqet, jol;olkhgsfg, \r\nThank you.'),
(5, 'My event 2', 'asdeghdjyk', '2019-02-16', '08:09:00', 'qwertyuifdsdfghjmnbv sdfhjvcvb'),
(6, 'My event 2', 'asdeghdjyk', '2019-02-16', '08:09:00', 'qwertyuifdsdfghjmnbv sdfhjvcvb'),
(7, 'Not my event', 'wethyjkt', '2019-02-23', '04:08:00', 'adsdfgfhn sdfdgrnh sfdgfbnth sfgbsrhn sfvgbrhnsfvgrbnh\r\n wfesgrbnhsfvgbhn. fegrnh\r\nwdfgehyjn fvgrbnh.sfgbrnh\r\nfegrbhyfsgbrn, frghnkffnveeb,eknggb kne tbrkgnfbejtokhne, fgnjrth, rgntrmdgh\r\n.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Prajwal', 'prajwalbarapatre13@gmail.com', '967454173c7637d071a8bd30224407e3'),
(4, 'Akash', 'verma@common.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 'kash', 'sbarapatre62@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'Sandeep', 'common@email.com', '9efab2399c7c560b34de477b9aa0a465');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
