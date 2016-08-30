-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2016 at 05:36 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `_letsreadtogther`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `book_ID` int(11) NOT NULL,
  `book_DONOR_ID` int(20) NOT NULL,
  `book_NAME` varchar(100) NOT NULL,
  `book_AUTHOR` varchar(50) NOT NULL,
  `book_EDITION` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_ID`, `book_DONOR_ID`, `book_NAME`, `book_AUTHOR`, `book_EDITION`) VALUES
(3, 3, 'Data Communications and Networking', 'Behroz.A Forozan', 'Ninth'),
(4, 4, 'Operation Research moti wali', 'mujhe yaad nai', '78');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE IF NOT EXISTS `donor` (
  `book_DONOR_ID` int(20) NOT NULL,
  `donor_NAME` varchar(100) NOT NULL,
  `donor_EMAIL` varchar(100) NOT NULL,
  `donor_CONTACT` varchar(20) NOT NULL,
  `donor_ADDRESS` varchar(500) NOT NULL,
  `donor_MESSAGE` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`book_DONOR_ID`, `donor_NAME`, `donor_EMAIL`, `donor_CONTACT`, `donor_ADDRESS`, `donor_MESSAGE`) VALUES
(3, 'Syed Muhammad Musfar Nayyar', 'smngraphica@outlook.com', '+923062601677', 'R-97 Sector 11-C/1 North Karachi, Karachi, Pakistan.                        ', 'Please come after 3pm, I am university from 11am till 3pm.\r\nthanks.'),
(4, 'Salman Ahmed Noor', 'salmanahmednoor@outlook.com', '+923012480111', 'R-983                        ', 'lelo akar.                        ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_ID`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`book_DONOR_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `book_DONOR_ID` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
