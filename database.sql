-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 21, 2013 at 10:50 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `japannab_p4_japanna_me`
--

-- --------------------------------------------------------

--
-- Table structure for table `faucets`
--

CREATE TABLE `faucets` (
  `faucet_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(255) NOT NULL,
  `serial_no` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `spout_type` varchar(255) NOT NULL,
  `opacity` varchar(255) NOT NULL,
  `overall_height_in` float NOT NULL,
  `overall_height_cm` float NOT NULL,
  `spout_height_in` float NOT NULL,
  `spout_height_cm` float NOT NULL,
  `projection_in` float NOT NULL,
  `projection_cm` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `img_front` varchar(255) NOT NULL,
  `img_side` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `major_diameter_in` float NOT NULL,
  `minor_diameter_in` float NOT NULL,
  `major_diameter_cm` float NOT NULL,
  `minor_diameter_cm` float NOT NULL,
  `hardware_finish` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`faucet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `faucets`
--

INSERT INTO `faucets` (`faucet_id`, `item_type`, `serial_no`, `color`, `spout_type`, `opacity`, `overall_height_in`, `overall_height_cm`, `spout_height_in`, `spout_height_cm`, `projection_in`, `projection_cm`, `description`, `img_front`, `img_side`, `price`, `major_diameter_in`, `minor_diameter_in`, `major_diameter_cm`, `minor_diameter_cm`, `hardware_finish`, `created`) VALUES
(91, 'Spout', '08-016', 'Gold', 'double', 'Transparent', 15, 38.1, 5.5, 13.97, 6, 15.24, 'Iris gold, fades from a light opaque mocha to a warm gold, \r\ngreen and red dichroic overtones.', '08-016f', '08-016s', 2500, 0, 0, 0, 0, '', '2013-12-18 17:31:18'),
(93, 'Control', 'H-10', 'Cobalt', '', '', 5.5, 13.97, 0, 0, 0, 0, 'Medium cobalt control with chrome hardware.', 'H-10f', 'H-10s', 800, 0, 0, 0, 0, 'Chrome', '2013-12-18 18:54:14'),
(94, 'Spout', '08-013', 'Emerald', 'single', 'Transparent', 14.5, 36.83, 5.5, 13.97, 5, 12.7, 'Deep emerald color at base fading to medium throughout.', '08-013f', '08-013s', 2000, 0, 0, 0, 0, '', '2013-12-18 19:03:41'),
(95, 'Spout', '08-020', 'Ruby', 'single', 'Transparent', 14, 35.56, 6.5, 16.51, 5.5, 13.97, 'Gold Ruby - a rich watermelon-pink color.', '08-020f', '08-020s', 2000, 0, 0, 0, 0, '', '2013-12-18 19:23:01'),
(96, 'Spout', '08-025', 'Ruby', 'double', 'Opaque', 11, 27.94, 3.5, 8.89, 3.5, 8.89, 'Opaque lipstick-red double twist. Very bright color under \r\nincandescent light.', '08-025f', '08-025s', 2500, 0, 0, 0, 0, '', '2013-12-18 19:26:36'),
(97, 'Spout', '08-040', 'Cobalt', 'double', 'Transparent', 14, 35.56, 3, 7.62, 5, 12.7, 'Fades from a dark cobalt to medium in the body and tip.', '08-040f', '08-040s', 2500, 0, 0, 0, 0, '', '2013-12-18 19:29:25'),
(98, 'Spout', '08-065', 'Ebony', 'double', 'Opaque', 16, 40.64, 5, 12.7, 6, 15.24, 'Jet black.', '08-065f', '08-065s', 2500, 0, 0, 0, 0, '', '2013-12-18 19:31:25'),
(99, 'Spout', '09-009', 'Cobalt', 'double', 'Opaque', 17.5, 44.45, 7, 17.78, 7, 17.78, 'Opaque Cobalt for hard water applications.', '09-009f', '09-009s', 2500, 0, 0, 0, 0, '', '2013-12-18 19:33:31'),
(100, 'Bowl', 'S02', 'Cobalt', '', '', 5.75, 14.605, 0, 0, 0, 0, 'A cobalt bowl with a white lip, a little deeper than most and \r\nwell suited to a taller faucet.\r\n', 'S02f', 'S02s', 1000, 15, 15, 38.1, 38.1, '', '2013-12-18 19:34:58'),
(101, 'Bowl', 's03', 'Custom', '', '', 4.75, 12.065, 0, 0, 0, 0, 'A ruby pink bowl with a white lip. Deep color and almost \r\nearth-toned.', 's03f', 's03s', 1000, 14.5, 15, 36.83, 38.1, '', '2013-12-18 19:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `created`, `modified`, `token`, `password`, `last_login`, `name`, `email`) VALUES
(2, 1386645840, 1386645840, '9b13b940da86993bfc840b72ae0b84408452377d', 'b7501f246606b1abcbc986982db25758eb5f4701', 0, 'Anna McKelvey', 'anna@ledyardbattell.com'),
(3, 1386646767, 1386646767, '7a83701bc94a18cd1486fc6bbe99921f20e56206', 'b7501f246606b1abcbc986982db25758eb5f4701', 0, 'Jimmy McKelvey', 'jimmy@ledyardbattell.com'),
(4, 1386708473, 1386708473, '7435ad0aefee0cf1d372bacd30981155468a9d3f', 'cdd47495f3c26a5dc6c537d19c0093fa22f51582', 0, 'Supersecretuser', 'secret@secret'),
(8, 1386871818, 1386871818, '2a0fda835e4f4e5e40d0ae136766e3d9fa60a557', '69271921d63ba0ab09d1edcf9a025dff1fdb691f', 0, 'test', 'test@test');

-- --------------------------------------------------------

--
-- Table structure for table `users_faucets`
--

CREATE TABLE `users_faucets` (
  `user_faucet_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `faucet_id` int(11) NOT NULL,
  PRIMARY KEY (`user_faucet_id`),
  KEY `user_id` (`user_id`),
  KEY `faucet_id` (`faucet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `users_faucets`
--

INSERT INTO `users_faucets` (`user_faucet_id`, `created`, `user_id`, `faucet_id`) VALUES
(48, '2013-12-18 21:02:40', 4, 96),
(50, '2013-12-19 06:27:58', 2, 95),
(51, '2013-12-21 03:18:06', 4, 97),
(52, '2013-12-21 03:19:36', 2, 99),
(53, '2013-12-21 15:00:39', 2, 97);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_faucets`
--
ALTER TABLE `users_faucets`
  ADD CONSTRAINT `users_faucets_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_faucets_ibfk_1` FOREIGN KEY (`faucet_id`) REFERENCES `faucets` (`faucet_id`) ON DELETE CASCADE ON UPDATE CASCADE;
