-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 22, 2020 at 02:47 PM
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
-- Database: `db_blogtemplate`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `posts_id` int(11) NOT NULL AUTO_INCREMENT,
  `posts_user` varchar(256) NOT NULL,
  `posts_date` varchar(256) NOT NULL,
  `posts_postheader` varchar(256) NOT NULL,
  `posts_content` varchar(2500) NOT NULL,
  PRIMARY KEY (`posts_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`posts_id`, `posts_user`, `posts_date`, `posts_postheader`, `posts_content`) VALUES
(13, 'GarthVader45', 'August 8, 2020', 'Avengers Endgame', 'vrvwe'),
(12, 'GarthVader45', 'August 8, 2020', 'Avengers Endgame', 'evevcthr'),
(10, 'GarthVader45', 'August 8, 2020', 'Avengers Endgame', 'brtb'),
(6, 'GarthVader45', 'August 8, 2020', 'Avengers', 'ergervgcevrgc'),
(14, 'GarthVader45', 'August 8, 2020', 'Avengers', 'iououi'),
(15, 'GarthVader45', 'August 10, 2020', 'NoiseTacbrbr', 'ntrrtrnrt'),
(16, 'GarthVader45', 'August 19, 2020', 'test', 'test test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_userid` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_pass` varchar(256) NOT NULL,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_bio` varchar(256) NOT NULL,
  `user_profilepic` varchar(256) DEFAULT NULL,
  `user_userlevel` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_userid`, `user_email`, `user_pass`, `user_first`, `user_last`, `user_bio`, `user_profilepic`, `user_userlevel`) VALUES
(2, 'GarthVader45', 'grichardson@live.ca', '$2y$10$434uMGgZP/WlzBjL0Kw16.PDQKawsD8go6LKVlB4FQ4Rq3eqYtCRi', 'Gareth', 'Richardson', 'hahahhahahahahha', NULL, 1),
(10, 'trich23', 'trich@live.ca', '$2y$10$9jnvJ9l8UYTh/crgNqGe/eVFKy.T73GdxCb71R/qKMdiGxQUYjqYW', 'Thomas', 'Richardson', 'Im not interesting at all Nothing to see here', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_var`
--

DROP TABLE IF EXISTS `tbl_var`;
CREATE TABLE IF NOT EXISTS `tbl_var` (
  `var_configId` tinyint(4) NOT NULL AUTO_INCREMENT,
  `var_headerTitle` varchar(100) NOT NULL,
  `var_footerMsg` varchar(200) NOT NULL,
  `var_logo` varchar(200) NOT NULL,
  `var_logoAsTitle` tinyint(1) NOT NULL,
  `var_includeSliderOnHome` tinyint(1) NOT NULL,
  `var_includeContactOnHome` tinyint(1) NOT NULL,
  `var_navColor` varchar(30) NOT NULL,
  `var_footerColor` varchar(30) NOT NULL,
  `var_buttonColor` varchar(30) NOT NULL,
  `var_darkMode` tinyint(1) NOT NULL,
  `var_fontFamilyP` varchar(100) NOT NULL,
  `var_fontFamilyH` varchar(100) NOT NULL,
  PRIMARY KEY (`var_configId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_var`
--

INSERT INTO `tbl_var` (`var_configId`, `var_headerTitle`, `var_footerMsg`, `var_logo`, `var_logoAsTitle`, `var_includeSliderOnHome`, `var_includeContactOnHome`, `var_navColor`, `var_footerColor`, `var_buttonColor`, `var_darkMode`, `var_fontFamilyP`, `var_fontFamilyH`) VALUES
(1, 'PHP Blog Template', 'Blog Template by Gareth Richardson', 'gr-media-square-white-xs.png', 0, 1, 0, '#333', '#333', '#007bff', 1, 'Raleway', 'Raleway');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
