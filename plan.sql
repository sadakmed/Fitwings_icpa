-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 20, 2018 at 10:40 AM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plan`
--

-- --------------------------------------------------------

--
-- Table structure for table `hmod`
--

CREATE TABLE `hmod` (
  `idh` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `NomTech` varchar(30) NOT NULL,
  `shift` char(4) NOT NULL,
  `site` int(10) NOT NULL,
  `date` int(15) NOT NULL,
  `motif` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `holydays`
--

CREATE TABLE `holydays` (
  `idH` int(5) NOT NULL,
  `Hname` varchar(50) NOT NULL,
  `HdateStart` int(15) NOT NULL,
  `HdateEnd` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `idsite` int(6) NOT NULL,
  `name` varchar(15) NOT NULL,
  `region` varchar(15) NOT NULL,
  `ville` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`idsite`, `name`, `region`, `ville`) VALUES
(5001, 'karama', 'nord', 'meknes'),
(5002, 'valencia', 'nord', 'fes'),
(5003, 'bahia', 'sud', 'tantan'),
(5004, 'marquise', 'center', 'casa');

-- --------------------------------------------------------

--
-- Table structure for table `wplan`
--

CREATE TABLE `wplan` (
  `idP` int(11) NOT NULL,
  `NomTech` varchar(30) NOT NULL,
  `shift` char(4) NOT NULL,
  `site` varchar(10) NOT NULL,
  `date` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wplan`
--

INSERT INTO `wplan` (`idP`, `NomTech`, `shift`, `site`, `date`) VALUES
(108, 'Said ', 'AM', '5004', 1532318400),
(114, 'Rafik', 'AM', '5001', 1532318400),
(115, 'Rafik', 'NGHT', '5001', 1532404800),
(116, 'Rafik', 'PM', '5001', 1532491200),
(138, 'Said ', 'PM', '5002', 1532318400),
(139, 'Said ', 'PM', '5002', 1532404800),
(140, 'Said ', 'PM', '5002', 1532491200),
(141, 'Said ', 'PM', '5002', 1532577600),
(142, 'Said ', 'PM', '5002', 1532664000),
(143, 'Said ', 'PM', '5002', 1532750400),
(144, 'Said ', 'PM', '5002', 1532836800),
(152, 'Hamid', 'NRM', '5002', 1532318400),
(153, 'Hamid', 'NRM', '5002', 1532404800),
(154, 'Hamid', 'NRM', '5002', 1532491200),
(155, 'Hamid', 'NRM', '5002', 1532577600),
(156, 'Hamid', 'NRM', '5002', 1532664000),
(157, 'Hamid', 'NRM', '5002', 1532750400),
(158, 'Hamid', 'NRM', '5002', 1532836800),
(159, 'Hamid', 'NRM', '5004', 1532318400),
(160, 'Hamid', 'NRM', '5004', 1532404800),
(161, 'Hamid', 'NRM', '5004', 1532491200),
(162, 'Hamid', 'NRM', '5004', 1532577600),
(163, 'Hamid', 'NRM', '5004', 1532664000),
(164, 'Hamid', 'NRM', '5004', 1532750400),
(165, 'Hamid', 'NRM', '5004', 1532836800),
(173, 'Rafik', 'AM', '5002', 1532318400),
(174, 'Rafik', 'AM', '5002', 1532404800),
(175, 'Rafik', 'AM', '5002', 1532491200),
(176, 'Rafik', 'AM', '5002', 1532577600),
(177, 'Rafik', 'AM', '5002', 1532664000),
(178, 'Rafik', 'AM', '5002', 1532750400),
(179, 'Rafik', 'AM', '5002', 1532836800);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hmod`
--
ALTER TABLE `hmod`
  ADD PRIMARY KEY (`idh`);

--
-- Indexes for table `holydays`
--
ALTER TABLE `holydays`
  ADD PRIMARY KEY (`idH`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`idsite`);

--
-- Indexes for table `wplan`
--
ALTER TABLE `wplan`
  ADD PRIMARY KEY (`idP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hmod`
--
ALTER TABLE `hmod`
  MODIFY `idh` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `holydays`
--
ALTER TABLE `holydays`
  MODIFY `idH` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `idsite` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5005;
--
-- AUTO_INCREMENT for table `wplan`
--
ALTER TABLE `wplan`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
