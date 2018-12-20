
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+05:45";

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` varchar(50) NOT NULL,
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;
