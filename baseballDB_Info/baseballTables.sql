-- phpMyAdmin SQL Dump
-- version 4.4.15
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2015 at 05:34 PM
-- Server version: 5.5.44-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baseball`
--

-- --------------------------------------------------------

--
-- Table structure for table `AllstarFull`
--

CREATE TABLE IF NOT EXISTS `AllstarFull` (
  `playerID` varchar(9) NOT NULL DEFAULT '',
  `yearID` int(11) NOT NULL DEFAULT '0',
  `gameNum` int(11) NOT NULL DEFAULT '0',
  `gameID` varchar(12) DEFAULT NULL,
  `teamID` varchar(3) DEFAULT NULL,
  `lgID` varchar(2) DEFAULT NULL,
  `GP` int(11) DEFAULT NULL,
  `startingPos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Appearances`
--

CREATE TABLE IF NOT EXISTS `Appearances` (
  `yearID` int(11) NOT NULL DEFAULT '0',
  `teamID` varchar(3) NOT NULL DEFAULT '',
  `lgID` varchar(2) DEFAULT NULL,
  `playerID` varchar(9) NOT NULL DEFAULT '',
  `G_all` int(11) DEFAULT NULL,
  `GS` int(11) DEFAULT NULL,
  `G_batting` int(11) DEFAULT NULL,
  `G_defense` int(11) DEFAULT NULL,
  `G_p` int(11) DEFAULT NULL,
  `G_c` int(11) DEFAULT NULL,
  `G_1b` int(11) DEFAULT NULL,
  `G_2b` int(11) DEFAULT NULL,
  `G_3b` int(11) DEFAULT NULL,
  `G_ss` int(11) DEFAULT NULL,
  `G_lf` int(11) DEFAULT NULL,
  `G_cf` int(11) DEFAULT NULL,
  `G_rf` int(11) DEFAULT NULL,
  `G_of` int(11) DEFAULT NULL,
  `G_dh` int(11) DEFAULT NULL,
  `G_ph` int(11) DEFAULT NULL,
  `G_pr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `AwardsManagers`
--

CREATE TABLE IF NOT EXISTS `AwardsManagers` (
  `playerID` varchar(10) NOT NULL DEFAULT '',
  `awardID` varchar(75) NOT NULL DEFAULT '',
  `yearID` int(11) NOT NULL DEFAULT '0',
  `lgID` varchar(2) NOT NULL DEFAULT '',
  `tie` varchar(1) DEFAULT NULL,
  `notes` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `AwardsPlayers`
--

CREATE TABLE IF NOT EXISTS `AwardsPlayers` (
  `playerID` varchar(9) NOT NULL DEFAULT '',
  `awardID` varchar(255) NOT NULL DEFAULT '',
  `yearID` int(11) NOT NULL DEFAULT '0',
  `lgID` varchar(2) NOT NULL DEFAULT '',
  `tie` varchar(1) DEFAULT NULL,
  `notes` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `AwardsShareManagers`
--

CREATE TABLE IF NOT EXISTS `AwardsShareManagers` (
  `awardID` varchar(25) NOT NULL DEFAULT '',
  `yearID` int(11) NOT NULL DEFAULT '0',
  `lgID` varchar(2) NOT NULL DEFAULT '',
  `playerID` varchar(10) NOT NULL DEFAULT '',
  `pointsWon` int(11) DEFAULT NULL,
  `pointsMax` int(11) DEFAULT NULL,
  `votesFirst` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `AwardsSharePlayers`
--

CREATE TABLE IF NOT EXISTS `AwardsSharePlayers` (
  `awardID` varchar(25) NOT NULL DEFAULT '',
  `yearID` int(11) NOT NULL DEFAULT '0',
  `lgID` varchar(2) NOT NULL DEFAULT '',
  `playerID` varchar(9) NOT NULL DEFAULT '',
  `pointsWon` double DEFAULT NULL,
  `pointsMax` int(11) DEFAULT NULL,
  `votesFirst` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Batting`
--

CREATE TABLE IF NOT EXISTS `Batting` (
  `playerID` varchar(9) NOT NULL DEFAULT '',
  `yearID` int(11) NOT NULL DEFAULT '0',
  `stint` int(11) NOT NULL DEFAULT '0',
  `teamID` varchar(3) DEFAULT NULL,
  `lgID` varchar(2) DEFAULT NULL,
  `G` int(11) DEFAULT NULL,
  `G_batting` int(11) DEFAULT NULL,
  `AB` int(11) DEFAULT NULL,
  `R` int(11) DEFAULT NULL,
  `H` int(11) DEFAULT NULL,
  `2B` int(11) DEFAULT NULL,
  `3B` int(11) DEFAULT NULL,
  `HR` int(11) DEFAULT NULL,
  `RBI` int(11) DEFAULT NULL,
  `SB` int(11) DEFAULT NULL,
  `CS` int(11) DEFAULT NULL,
  `BB` int(11) DEFAULT NULL,
  `SO` int(11) DEFAULT NULL,
  `IBB` int(11) DEFAULT NULL,
  `HBP` int(11) DEFAULT NULL,
  `SH` int(11) DEFAULT NULL,
  `SF` int(11) DEFAULT NULL,
  `GIDP` int(11) DEFAULT NULL,
  `G_old` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `BattingPost`
--

CREATE TABLE IF NOT EXISTS `BattingPost` (
  `yearID` int(11) NOT NULL DEFAULT '0',
  `round` varchar(10) NOT NULL DEFAULT '',
  `playerID` varchar(9) NOT NULL DEFAULT '',
  `teamID` varchar(3) DEFAULT NULL,
  `lgID` varchar(2) DEFAULT NULL,
  `G` int(11) DEFAULT NULL,
  `AB` int(11) DEFAULT NULL,
  `R` int(11) DEFAULT NULL,
  `H` int(11) DEFAULT NULL,
  `2B` int(11) DEFAULT NULL,
  `3B` int(11) DEFAULT NULL,
  `HR` int(11) DEFAULT NULL,
  `RBI` int(11) DEFAULT NULL,
  `SB` int(11) DEFAULT NULL,
  `CS` int(11) DEFAULT NULL,
  `BB` int(11) DEFAULT NULL,
  `SO` int(11) DEFAULT NULL,
  `IBB` int(11) DEFAULT NULL,
  `HBP` int(11) DEFAULT NULL,
  `SH` int(11) DEFAULT NULL,
  `SF` int(11) DEFAULT NULL,
  `GIDP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `CollegePlaying`
--

CREATE TABLE IF NOT EXISTS `CollegePlaying` (
  `playerID` varchar(9) DEFAULT NULL,
  `schoolID` varchar(15) DEFAULT NULL,
  `yearID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Fielding`
--

CREATE TABLE IF NOT EXISTS `Fielding` (
  `playerID` varchar(9) NOT NULL DEFAULT '',
  `yearID` int(11) NOT NULL DEFAULT '0',
  `stint` int(11) NOT NULL DEFAULT '0',
  `teamID` varchar(3) DEFAULT NULL,
  `lgID` varchar(2) DEFAULT NULL,
  `POS` varchar(2) NOT NULL DEFAULT '',
  `G` int(11) DEFAULT NULL,
  `GS` int(11) DEFAULT NULL,
  `InnOuts` int(11) DEFAULT NULL,
  `PO` int(11) DEFAULT NULL,
  `A` int(11) DEFAULT NULL,
  `E` int(11) DEFAULT NULL,
  `DP` int(11) DEFAULT NULL,
  `PB` int(11) DEFAULT NULL,
  `WP` int(11) DEFAULT NULL,
  `SB` int(11) DEFAULT NULL,
  `CS` int(11) DEFAULT NULL,
  `ZR` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `FieldingOF`
--

CREATE TABLE IF NOT EXISTS `FieldingOF` (
  `playerID` varchar(9) NOT NULL DEFAULT '',
  `yearID` int(11) NOT NULL DEFAULT '0',
  `stint` int(11) NOT NULL DEFAULT '0',
  `Glf` int(11) DEFAULT NULL,
  `Gcf` int(11) DEFAULT NULL,
  `Grf` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `FieldingPost`
--

CREATE TABLE IF NOT EXISTS `FieldingPost` (
  `playerID` varchar(9) NOT NULL DEFAULT '',
  `yearID` int(11) NOT NULL DEFAULT '0',
  `teamID` varchar(3) DEFAULT NULL,
  `lgID` varchar(2) DEFAULT NULL,
  `round` varchar(10) NOT NULL DEFAULT '',
  `POS` varchar(2) NOT NULL DEFAULT '',
  `G` int(11) DEFAULT NULL,
  `GS` int(11) DEFAULT NULL,
  `InnOuts` int(11) DEFAULT NULL,
  `PO` int(11) DEFAULT NULL,
  `A` int(11) DEFAULT NULL,
  `E` int(11) DEFAULT NULL,
  `DP` int(11) DEFAULT NULL,
  `TP` int(11) DEFAULT NULL,
  `PB` int(11) DEFAULT NULL,
  `SB` int(11) DEFAULT NULL,
  `CS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `HallOfFame`
--

CREATE TABLE IF NOT EXISTS `HallOfFame` (
  `playerID` varchar(10) NOT NULL DEFAULT '',
  `yearid` int(11) NOT NULL DEFAULT '0',
  `votedBy` varchar(64) NOT NULL DEFAULT '',
  `ballots` int(11) DEFAULT NULL,
  `needed` int(11) DEFAULT NULL,
  `votes` int(11) DEFAULT NULL,
  `inducted` varchar(1) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `needed_note` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Managers`
--

CREATE TABLE IF NOT EXISTS `Managers` (
  `playerID` varchar(10) DEFAULT NULL,
  `yearID` int(11) NOT NULL DEFAULT '0',
  `teamID` varchar(3) NOT NULL DEFAULT '',
  `lgID` varchar(2) DEFAULT NULL,
  `inseason` int(11) NOT NULL DEFAULT '0',
  `G` int(11) DEFAULT NULL,
  `W` int(11) DEFAULT NULL,
  `L` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `plyrMgr` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ManagersHalf`
--

CREATE TABLE IF NOT EXISTS `ManagersHalf` (
  `playerID` varchar(10) NOT NULL DEFAULT '',
  `yearID` int(11) NOT NULL DEFAULT '0',
  `teamID` varchar(3) NOT NULL DEFAULT '',
  `lgID` varchar(2) DEFAULT NULL,
  `inseason` int(11) DEFAULT NULL,
  `half` int(11) NOT NULL DEFAULT '0',
  `G` int(11) DEFAULT NULL,
  `W` int(11) DEFAULT NULL,
  `L` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Master`
--

CREATE TABLE IF NOT EXISTS `Master` (
  `playerID` varchar(10) NOT NULL,
  `birthYear` int(11) DEFAULT NULL,
  `birthMonth` int(11) DEFAULT NULL,
  `birthDay` int(11) DEFAULT NULL,
  `birthCountry` varchar(50) DEFAULT NULL,
  `birthState` varchar(2) DEFAULT NULL,
  `birthCity` varchar(50) DEFAULT NULL,
  `deathYear` int(11) DEFAULT NULL,
  `deathMonth` int(11) DEFAULT NULL,
  `deathDay` int(11) DEFAULT NULL,
  `deathCountry` varchar(50) DEFAULT NULL,
  `deathState` varchar(2) DEFAULT NULL,
  `deathCity` varchar(50) DEFAULT NULL,
  `nameFirst` varchar(50) DEFAULT NULL,
  `nameLast` varchar(50) DEFAULT NULL,
  `nameGiven` varchar(255) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `height` double DEFAULT NULL,
  `bats` varchar(1) DEFAULT NULL,
  `throws` varchar(1) DEFAULT NULL,
  `debut` datetime DEFAULT NULL,
  `finalGame` datetime DEFAULT NULL,
  `retroID` varchar(9) DEFAULT NULL,
  `bbrefID` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Pitching`
--

CREATE TABLE IF NOT EXISTS `Pitching` (
  `playerID` varchar(9) NOT NULL DEFAULT '',
  `yearID` int(11) NOT NULL DEFAULT '0',
  `stint` int(11) NOT NULL DEFAULT '0',
  `teamID` varchar(3) DEFAULT NULL,
  `lgID` varchar(2) DEFAULT NULL,
  `W` int(11) DEFAULT NULL,
  `L` int(11) DEFAULT NULL,
  `G` int(11) DEFAULT NULL,
  `GS` int(11) DEFAULT NULL,
  `CG` int(11) DEFAULT NULL,
  `SHO` int(11) DEFAULT NULL,
  `SV` int(11) DEFAULT NULL,
  `IPouts` int(11) DEFAULT NULL,
  `H` int(11) DEFAULT NULL,
  `ER` int(11) DEFAULT NULL,
  `HR` int(11) DEFAULT NULL,
  `BB` int(11) DEFAULT NULL,
  `SO` int(11) DEFAULT NULL,
  `BAOpp` double DEFAULT NULL,
  `ERA` double DEFAULT NULL,
  `IBB` int(11) DEFAULT NULL,
  `WP` int(11) DEFAULT NULL,
  `HBP` int(11) DEFAULT NULL,
  `BK` int(11) DEFAULT NULL,
  `BFP` int(11) DEFAULT NULL,
  `GF` int(11) DEFAULT NULL,
  `R` int(11) DEFAULT NULL,
  `SH` int(11) DEFAULT NULL,
  `SF` int(11) DEFAULT NULL,
  `GIDP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `PitchingPost`
--

CREATE TABLE IF NOT EXISTS `PitchingPost` (
  `playerID` varchar(9) NOT NULL DEFAULT '',
  `yearID` int(11) NOT NULL DEFAULT '0',
  `round` varchar(10) NOT NULL DEFAULT '',
  `teamID` varchar(3) DEFAULT NULL,
  `lgID` varchar(2) DEFAULT NULL,
  `W` int(11) DEFAULT NULL,
  `L` int(11) DEFAULT NULL,
  `G` int(11) DEFAULT NULL,
  `GS` int(11) DEFAULT NULL,
  `CG` int(11) DEFAULT NULL,
  `SHO` int(11) DEFAULT NULL,
  `SV` int(11) DEFAULT NULL,
  `IPouts` int(11) DEFAULT NULL,
  `H` int(11) DEFAULT NULL,
  `ER` int(11) DEFAULT NULL,
  `HR` int(11) DEFAULT NULL,
  `BB` int(11) DEFAULT NULL,
  `SO` int(11) DEFAULT NULL,
  `BAOpp` double DEFAULT NULL,
  `ERA` double DEFAULT NULL,
  `IBB` int(11) DEFAULT NULL,
  `WP` int(11) DEFAULT NULL,
  `HBP` int(11) DEFAULT NULL,
  `BK` int(11) DEFAULT NULL,
  `BFP` int(11) DEFAULT NULL,
  `GF` int(11) DEFAULT NULL,
  `R` int(11) DEFAULT NULL,
  `SH` int(11) DEFAULT NULL,
  `SF` int(11) DEFAULT NULL,
  `GIDP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `playerPicture`
--

CREATE TABLE IF NOT EXISTS `playerPicture` (
  `picID` int(7) NOT NULL,
  `playerID` varchar(10) NOT NULL,
  `picture` varchar(40) NOT NULL,
  `picWidth` varchar(4) DEFAULT NULL,
  `picHeigth` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Salaries`
--

CREATE TABLE IF NOT EXISTS `Salaries` (
  `yearID` int(11) NOT NULL DEFAULT '0',
  `teamID` varchar(3) NOT NULL DEFAULT '',
  `lgID` varchar(2) NOT NULL DEFAULT '',
  `playerID` varchar(9) NOT NULL DEFAULT '',
  `salary` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Schools`
--

CREATE TABLE IF NOT EXISTS `Schools` (
  `schoolID` varchar(15) NOT NULL,
  `name_full` varchar(255) DEFAULT NULL,
  `city` varchar(55) DEFAULT NULL,
  `state` varchar(55) DEFAULT NULL,
  `country` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `SeriesPost`
--

CREATE TABLE IF NOT EXISTS `SeriesPost` (
  `yearID` int(11) NOT NULL DEFAULT '0',
  `round` varchar(5) NOT NULL DEFAULT '',
  `teamIDwinner` varchar(3) DEFAULT NULL,
  `lgIDwinner` varchar(2) DEFAULT NULL,
  `teamIDloser` varchar(3) DEFAULT NULL,
  `lgIDloser` varchar(2) DEFAULT NULL,
  `wins` int(11) DEFAULT NULL,
  `losses` int(11) DEFAULT NULL,
  `ties` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Teams`
--

CREATE TABLE IF NOT EXISTS `Teams` (
  `yearID` int(11) NOT NULL DEFAULT '0',
  `lgID` varchar(2) NOT NULL DEFAULT '',
  `teamID` varchar(3) NOT NULL DEFAULT '',
  `franchID` varchar(3) DEFAULT NULL,
  `divID` varchar(1) DEFAULT NULL,
  `Rank` int(11) DEFAULT NULL,
  `G` int(11) DEFAULT NULL,
  `Ghome` int(11) DEFAULT NULL,
  `W` int(11) DEFAULT NULL,
  `L` int(11) DEFAULT NULL,
  `DivWin` varchar(1) DEFAULT NULL,
  `WCWin` varchar(1) DEFAULT NULL,
  `LgWin` varchar(1) DEFAULT NULL,
  `WSWin` varchar(1) DEFAULT NULL,
  `R` int(11) DEFAULT NULL,
  `AB` int(11) DEFAULT NULL,
  `H` int(11) DEFAULT NULL,
  `2B` int(11) DEFAULT NULL,
  `3B` int(11) DEFAULT NULL,
  `HR` int(11) DEFAULT NULL,
  `BB` int(11) DEFAULT NULL,
  `SO` int(11) DEFAULT NULL,
  `SB` int(11) DEFAULT NULL,
  `CS` int(11) DEFAULT NULL,
  `HBP` int(11) DEFAULT NULL,
  `SF` int(11) DEFAULT NULL,
  `RA` int(11) DEFAULT NULL,
  `ER` int(11) DEFAULT NULL,
  `ERA` double DEFAULT NULL,
  `CG` int(11) DEFAULT NULL,
  `SHO` int(11) DEFAULT NULL,
  `SV` int(11) DEFAULT NULL,
  `IPouts` int(11) DEFAULT NULL,
  `HA` int(11) DEFAULT NULL,
  `HRA` int(11) DEFAULT NULL,
  `BBA` int(11) DEFAULT NULL,
  `SOA` int(11) DEFAULT NULL,
  `E` int(11) DEFAULT NULL,
  `DP` int(11) DEFAULT NULL,
  `FP` double DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `park` varchar(255) DEFAULT NULL,
  `attendance` int(11) DEFAULT NULL,
  `BPF` int(11) DEFAULT NULL,
  `PPF` int(11) DEFAULT NULL,
  `teamIDBR` varchar(3) DEFAULT NULL,
  `teamIDlahman45` varchar(3) DEFAULT NULL,
  `teamIDretro` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TeamsFranchises`
--

CREATE TABLE IF NOT EXISTS `TeamsFranchises` (
  `franchID` varchar(3) NOT NULL,
  `franchName` varchar(50) DEFAULT NULL,
  `active` varchar(2) DEFAULT NULL,
  `NAassoc` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TeamsHalf`
--

CREATE TABLE IF NOT EXISTS `TeamsHalf` (
  `yearID` int(11) NOT NULL DEFAULT '0',
  `lgID` varchar(2) NOT NULL DEFAULT '',
  `teamID` varchar(3) NOT NULL DEFAULT '',
  `Half` varchar(1) NOT NULL DEFAULT '',
  `divID` varchar(1) DEFAULT NULL,
  `DivWin` varchar(1) DEFAULT NULL,
  `Rank` int(11) DEFAULT NULL,
  `G` int(11) DEFAULT NULL,
  `W` int(11) DEFAULT NULL,
  `L` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AllstarFull`
--
ALTER TABLE `AllstarFull`
  ADD PRIMARY KEY (`playerID`,`yearID`,`gameNum`);

--
-- Indexes for table `Appearances`
--
ALTER TABLE `Appearances`
  ADD PRIMARY KEY (`yearID`,`teamID`,`playerID`);

--
-- Indexes for table `AwardsManagers`
--
ALTER TABLE `AwardsManagers`
  ADD PRIMARY KEY (`yearID`,`awardID`,`lgID`,`playerID`);

--
-- Indexes for table `AwardsPlayers`
--
ALTER TABLE `AwardsPlayers`
  ADD PRIMARY KEY (`yearID`,`awardID`,`lgID`,`playerID`);

--
-- Indexes for table `AwardsShareManagers`
--
ALTER TABLE `AwardsShareManagers`
  ADD PRIMARY KEY (`awardID`,`yearID`,`lgID`,`playerID`);

--
-- Indexes for table `AwardsSharePlayers`
--
ALTER TABLE `AwardsSharePlayers`
  ADD PRIMARY KEY (`awardID`,`yearID`,`lgID`,`playerID`);

--
-- Indexes for table `Batting`
--
ALTER TABLE `Batting`
  ADD PRIMARY KEY (`playerID`,`yearID`,`stint`);

--
-- Indexes for table `BattingPost`
--
ALTER TABLE `BattingPost`
  ADD PRIMARY KEY (`yearID`,`round`,`playerID`);

--
-- Indexes for table `Fielding`
--
ALTER TABLE `Fielding`
  ADD PRIMARY KEY (`playerID`,`yearID`,`stint`,`POS`);

--
-- Indexes for table `FieldingOF`
--
ALTER TABLE `FieldingOF`
  ADD PRIMARY KEY (`playerID`,`yearID`,`stint`);

--
-- Indexes for table `FieldingPost`
--
ALTER TABLE `FieldingPost`
  ADD PRIMARY KEY (`playerID`,`yearID`,`round`,`POS`);

--
-- Indexes for table `HallOfFame`
--
ALTER TABLE `HallOfFame`
  ADD PRIMARY KEY (`playerID`,`yearid`,`votedBy`);

--
-- Indexes for table `Managers`
--
ALTER TABLE `Managers`
  ADD PRIMARY KEY (`yearID`,`teamID`,`inseason`);

--
-- Indexes for table `ManagersHalf`
--
ALTER TABLE `ManagersHalf`
  ADD PRIMARY KEY (`yearID`,`teamID`,`playerID`,`half`);

--
-- Indexes for table `Master`
--
ALTER TABLE `Master`
  ADD PRIMARY KEY (`playerID`);

--
-- Indexes for table `Pitching`
--
ALTER TABLE `Pitching`
  ADD PRIMARY KEY (`playerID`,`yearID`,`stint`);

--
-- Indexes for table `PitchingPost`
--
ALTER TABLE `PitchingPost`
  ADD PRIMARY KEY (`playerID`,`yearID`,`round`);

--
-- Indexes for table `playerPicture`
--
ALTER TABLE `playerPicture`
  ADD PRIMARY KEY (`picID`),
  ADD UNIQUE KEY `playerID` (`playerID`);

--
-- Indexes for table `Salaries`
--
ALTER TABLE `Salaries`
  ADD PRIMARY KEY (`yearID`,`teamID`,`lgID`,`playerID`);

--
-- Indexes for table `Schools`
--
ALTER TABLE `Schools`
  ADD PRIMARY KEY (`schoolID`);

--
-- Indexes for table `SeriesPost`
--
ALTER TABLE `SeriesPost`
  ADD PRIMARY KEY (`yearID`,`round`);

--
-- Indexes for table `Teams`
--
ALTER TABLE `Teams`
  ADD PRIMARY KEY (`yearID`,`lgID`,`teamID`);

--
-- Indexes for table `TeamsFranchises`
--
ALTER TABLE `TeamsFranchises`
  ADD PRIMARY KEY (`franchID`);

--
-- Indexes for table `TeamsHalf`
--
ALTER TABLE `TeamsHalf`
  ADD PRIMARY KEY (`yearID`,`teamID`,`lgID`,`Half`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playerPicture`
--
ALTER TABLE `playerPicture`
  MODIFY `picID` int(7) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `playerPicture`
--
ALTER TABLE `playerPicture`
  ADD CONSTRAINT `playerPicture_ibfk_1` FOREIGN KEY (`playerID`) REFERENCES `Master` (`playerID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
