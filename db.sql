-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Nov 30, 2014 at 08:05 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `chunchung_cs`
--

-- --------------------------------------------------------

--
-- Table structure for table `Actor`
--

CREATE TABLE `Actor` (
`ActorID` int(10) unsigned NOT NULL,
  `FName` varchar(255) DEFAULT NULL,
  `LName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Actor`
--

INSERT INTO `Actor` (`ActorID`, `FName`, `LName`) VALUES
(1, 'Angelina', 'Jolie'),
(2, 'Bradd', 'Pitt'),
(3, 'Jennifer', 'Lawrence'),
(4, 'Josh', 'Hutcherson');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `MobileNumber` varchar(255) NOT NULL,
  `FName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`MobileNumber`, `FName`, `LName`, `DOB`, `Address`, `Email`) VALUES
('0', 'yang', 'chun', '2014-11-03', '4733 Centre, pitt', 'ch@pitt.edu.tw'),
('4123323454', 'Brad', 'Johnson', '2014-07-13', '5309 Beechwood Boulevard, Pittsburgh PA 15332', 'bradx@pitt.edu'),
('4123345434', 'Omar', 'Akhtar', '2014-11-01', '5410 Murdoch Street, Pittsburgh PA 15211', 'omarla@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Genre`
--

CREATE TABLE `Genre` (
  `GenreName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Genre`
--

INSERT INTO `Genre` (`GenreName`) VALUES
('Comedy'),
('Horror'),
('Sci-Fi'),
('Thriller');

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

CREATE TABLE `Login` (
  `Salesperson_SalespersonID` int(10) unsigned NOT NULL,
  `sPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Login`
--

INSERT INTO `Login` (`Salesperson_SalespersonID`, `sPassword`) VALUES
(1000, 'abcd'),
(1001, 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `Movie`
--

CREATE TABLE `Movie` (
`MovieID` int(10) unsigned NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `DirectorName` varchar(255) DEFAULT NULL,
  `Duration` varchar(255) DEFAULT NULL,
  `IMDBRating` float unsigned DEFAULT NULL,
  `Description` longtext,
  `PictureURL` text,
  `ReleaseDate` text
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Movie`
--

INSERT INTO `Movie` (`MovieID`, `Title`, `DirectorName`, `Duration`, `IMDBRating`, `Description`, `PictureURL`, `ReleaseDate`) VALUES
(2, 'Big Hero 6', 'Omar', '141 minutes', 7, 'The special bond that develops between plus-sized inflatable robot Baymax, and prodigy Hiro Hamada, who team up with a group of friends to form a band of high-tech heroes.', 'http://ia.media-imdb.com/images/M/MV5BMjI4MTIzODU2NV5BMl5BanBnXkFtZTgwMjE0NDAwMjE@._V1_SY317_CR0,0,214,317_AL_.jpg', '11/21/2014'),
(3, 'Interstellar', 'Chun', '161 minutes', 8, 'A team of explorers travel through a wormhole in an attempt to find a potentially habitable planet that will sustain humanity.', 'http://ia.media-imdb.com/images/M/MV5BMjIxNTU4MzY4MF5BMl5BanBnXkFtZTgwMzM4ODI3MjE@._V1_SX214_AL_.jpg', '11/21/2014'),
(4, 'Dumb and Dumber To', 'Bobby Fisher', '144 minutes', 9, '20 years since their first adventure, Lloyd and Harry go on a road trip to find Harry''s newly discovered daughter, who was given up for adoption.', 'http://ia.media-imdb.com/images/M/MV5BMTYxMzA0MzAyMF5BMl5BanBnXkFtZTgwMjMyNjcwMjE@._V1_SX214_AL_.jpg', '11/21/2014'),
(5, 'Gone Girl', 'David Fincher', '125 minutes', 6, 'With his wife''s disappearance having become the focus of an intense media circus, a man sees the spotlight turned on him when it''s suspected that he may not be innocent.', 'http://ia.media-imdb.com/images/M/MV5BMTk0MDQ3MzAzOV5BMl5BanBnXkFtZTgwNzU1NzE3MjE@._V1_SY317_CR0,0,214,317_AL_.jpg', '11/21/2014'),
(6, 'The Hunger Games: Mockingjay Part 1', 'Francis Lawrence', '123 minutes', 7, 'When Katniss destroys the games', 'http://ia.media-imdb.com/images/M/MV5BMTcxNDI2NDAzNl5BMl5BanBnXkFtZTgwODM3MTc2MjE@._V1_SX214_AL_.jpg', '11/21/2014'),
(7, 'Maleficent ', 'Robert Stromberg', '97 minutes', 7.1, 'A vengeful fairy is driven to curse an infant princess, only to discover that the child may be the one person who can restore peace to their troubled land.', 'http://ia.media-imdb.com/images/M/MV5BMTQ1NDk3NTk0MV5BMl5BanBnXkFtZTgwMTk3MDcxMzE@._V1_SY317_CR5,0,214,317_AL_.jpg', '5/30/2014');

-- --------------------------------------------------------

--
-- Table structure for table `Movie_has_Actor`
--

CREATE TABLE `Movie_has_Actor` (
  `Movie_MovieID` int(10) unsigned NOT NULL,
  `Actor_ActorID` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Movie_has_Actor`
--

INSERT INTO `Movie_has_Actor` (`Movie_MovieID`, `Actor_ActorID`) VALUES
(2, 1),
(2, 2),
(2, 3),
(3, 2),
(3, 4),
(4, 1),
(4, 3),
(5, 1),
(5, 3),
(7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Movie_has_Genre`
--

CREATE TABLE `Movie_has_Genre` (
  `Movie_MovieID` int(10) unsigned NOT NULL,
  `Genre_GenreName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Movie_has_Genre`
--

INSERT INTO `Movie_has_Genre` (`Movie_MovieID`, `Genre_GenreName`) VALUES
(2, 'Comedy'),
(2, 'Horror'),
(2, 'Sci-Fi'),
(3, 'Thriller'),
(4, 'Sci-Fi'),
(4, 'Thriller'),
(5, 'Horror'),
(6, 'Comedy'),
(6, 'Horror'),
(7, 'Comedy');

-- --------------------------------------------------------

--
-- Table structure for table `Movie_has_Store`
--

CREATE TABLE `Movie_has_Store` (
  `Movie_MovieID` int(10) unsigned NOT NULL,
  `Store_StoreID` int(10) unsigned NOT NULL,
  `Quantity` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Movie_has_Store`
--

INSERT INTO `Movie_has_Store` (`Movie_MovieID`, `Store_StoreID`, `Quantity`) VALUES
(2, 1, 4),
(2, 2, 0),
(3, 1, 2),
(4, 2, 0),
(5, 2, 3),
(6, 2, 2),
(7, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Movie_has_Store_has_Transaction`
--

CREATE TABLE `Movie_has_Store_has_Transaction` (
  `Movie_has_Store_Store_StoreID` int(10) unsigned NOT NULL,
  `Movie_has_Store_Movie_MovieID` int(10) unsigned NOT NULL,
  `Transaction_TransactionID` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Movie_has_Store_has_Transaction`
--

INSERT INTO `Movie_has_Store_has_Transaction` (`Movie_has_Store_Store_StoreID`, `Movie_has_Store_Movie_MovieID`, `Transaction_TransactionID`) VALUES
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(1, 6, 1),
(1, 7, 1),
(2, 3, 2),
(2, 4, 2),
(2, 5, 2),
(2, 6, 2),
(2, 7, 2),
(2, 4, 18),
(2, 4, 19),
(2, 4, 20),
(2, 4, 21),
(2, 4, 22),
(2, 4, 23),
(2, 2, 24),
(2, 2, 25),
(2, 2, 26),
(2, 2, 27),
(2, 2, 28),
(2, 2, 29),
(2, 2, 30),
(2, 2, 31),
(2, 4, 32);

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
`PaymentID` int(10) unsigned NOT NULL,
  `Customer_MobileNumber` varchar(255) NOT NULL,
  `Transaction_TransactionID` int(10) unsigned NOT NULL,
  `Salesperson_SalespersonID` int(10) unsigned NOT NULL,
  `Return_Date` date DEFAULT NULL,
  `Amount` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Salesperson`
--

CREATE TABLE `Salesperson` (
`SalespersonID` int(10) unsigned NOT NULL,
  `Store_StoreID` int(10) unsigned NOT NULL,
  `FName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `Salary` int(10) unsigned NOT NULL,
  `Position` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1002 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Salesperson`
--

INSERT INTO `Salesperson` (`SalespersonID`, `Store_StoreID`, `FName`, `LName`, `DOB`, `Salary`, `Position`) VALUES
(1000, 1, 'Robert', 'Lang', '2014-11-12', 2400, 'Salesperson'),
(1001, 2, 'Marcin', 'Drexel', '2014-08-04', 1200, 'Salesperson');

-- --------------------------------------------------------

--
-- Table structure for table `Store`
--

CREATE TABLE `Store` (
`StoreID` int(10) unsigned NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Manager` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Store`
--

INSERT INTO `Store` (`StoreID`, `Address`, `Manager`) VALUES
(1, '5510 Murray Avenue, Pittsburgh PA 15217', NULL),
(2, '5430 N Craig Street, Pittsburgh PA 15216', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Transaction`
--

CREATE TABLE `Transaction` (
`TransactionID` int(10) unsigned NOT NULL,
  `Customer_MobileNumber` varchar(255) NOT NULL,
  `Salesperson_SalespersonID` int(10) unsigned NOT NULL,
  `Borrow_Date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Transaction`
--

INSERT INTO `Transaction` (`TransactionID`, `Customer_MobileNumber`, `Salesperson_SalespersonID`, `Borrow_Date`) VALUES
(1, '4123323454', 1000, '2014-11-03'),
(2, '4123345434', 1001, '2014-11-22'),
(6, '4123323454', 1001, '2014-11-30'),
(7, '4123323454', 1001, '2014-11-30'),
(8, '4123323454', 1001, '2014-11-30'),
(9, '4123323454', 1001, '2014-11-30'),
(10, '4123323454', 1001, '2014-11-30'),
(11, '4123323454', 1001, '2014-11-30'),
(12, '4123323454', 1001, '2014-11-30'),
(13, '4123345434', 1001, '2014-11-30'),
(14, '4123323454', 1001, '2014-11-30'),
(15, '4123323454', 1001, '2014-11-30'),
(16, '4123323454', 1001, '2014-11-30'),
(17, '4123323454', 1001, '2014-11-30'),
(18, '4123323454', 1001, '2014-11-30'),
(19, '4123323454', 1001, '2014-11-30'),
(20, '4123323454', 1001, '2014-11-30'),
(21, '4123323454', 1001, '2014-11-30'),
(22, '4123323454', 1001, '2014-11-30'),
(23, '4123323454', 1001, '2014-11-30'),
(24, '4123323454', 1001, '2014-11-30'),
(25, '4123345434', 1001, '2014-11-30'),
(26, '4123345434', 1001, '2014-11-30'),
(27, '4123323454', 1001, '2014-11-30'),
(28, '4123345434', 1001, '2014-11-30'),
(29, '4123345434', 1001, '2014-11-30'),
(30, '4123345434', 1001, '2014-11-30'),
(31, '4123345434', 1001, '2014-11-30'),
(32, '4123345434', 1001, '2014-11-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Actor`
--
ALTER TABLE `Actor`
 ADD PRIMARY KEY (`ActorID`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
 ADD PRIMARY KEY (`MobileNumber`);

--
-- Indexes for table `Genre`
--
ALTER TABLE `Genre`
 ADD PRIMARY KEY (`GenreName`);

--
-- Indexes for table `Login`
--
ALTER TABLE `Login`
 ADD KEY `Login_FKIndex1` (`Salesperson_SalespersonID`);

--
-- Indexes for table `Movie`
--
ALTER TABLE `Movie`
 ADD PRIMARY KEY (`MovieID`);

--
-- Indexes for table `Movie_has_Actor`
--
ALTER TABLE `Movie_has_Actor`
 ADD PRIMARY KEY (`Movie_MovieID`,`Actor_ActorID`), ADD KEY `Movie_has_Actor_FKIndex1` (`Movie_MovieID`), ADD KEY `Movie_has_Actor_FKIndex2` (`Actor_ActorID`);

--
-- Indexes for table `Movie_has_Genre`
--
ALTER TABLE `Movie_has_Genre`
 ADD PRIMARY KEY (`Movie_MovieID`,`Genre_GenreName`), ADD KEY `Movie_has_Genre_FKIndex1` (`Movie_MovieID`), ADD KEY `Movie_has_Genre_FKIndex2` (`Genre_GenreName`);

--
-- Indexes for table `Movie_has_Store`
--
ALTER TABLE `Movie_has_Store`
 ADD PRIMARY KEY (`Movie_MovieID`,`Store_StoreID`), ADD KEY `Movie_has_Store_FKIndex1` (`Movie_MovieID`), ADD KEY `Movie_has_Store_FKIndex2` (`Store_StoreID`);

--
-- Indexes for table `Movie_has_Store_has_Transaction`
--
ALTER TABLE `Movie_has_Store_has_Transaction`
 ADD PRIMARY KEY (`Movie_has_Store_Store_StoreID`,`Movie_has_Store_Movie_MovieID`,`Transaction_TransactionID`), ADD KEY `Movie_has_Store_has_Transaction_FKIndex1` (`Movie_has_Store_Movie_MovieID`,`Movie_has_Store_Store_StoreID`), ADD KEY `Movie_has_Store_has_Transaction_FKIndex2` (`Transaction_TransactionID`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
 ADD PRIMARY KEY (`PaymentID`), ADD KEY `Payment_FKIndex1` (`Salesperson_SalespersonID`), ADD KEY `Payment_FKIndex2` (`Transaction_TransactionID`), ADD KEY `Payment_FKIndex3` (`Customer_MobileNumber`);

--
-- Indexes for table `Salesperson`
--
ALTER TABLE `Salesperson`
 ADD PRIMARY KEY (`SalespersonID`), ADD KEY `Salesperson_FKIndex1` (`Store_StoreID`);

--
-- Indexes for table `Store`
--
ALTER TABLE `Store`
 ADD PRIMARY KEY (`StoreID`);

--
-- Indexes for table `Transaction`
--
ALTER TABLE `Transaction`
 ADD PRIMARY KEY (`TransactionID`), ADD KEY `Transaction_FKIndex1` (`Customer_MobileNumber`), ADD KEY `Transaction_FKIndex2` (`Salesperson_SalespersonID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Actor`
--
ALTER TABLE `Actor`
MODIFY `ActorID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Movie`
--
ALTER TABLE `Movie`
MODIFY `MovieID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
MODIFY `PaymentID` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Salesperson`
--
ALTER TABLE `Salesperson`
MODIFY `SalespersonID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1002;
--
-- AUTO_INCREMENT for table `Store`
--
ALTER TABLE `Store`
MODIFY `StoreID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Transaction`
--
ALTER TABLE `Transaction`
MODIFY `TransactionID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Login`
--
ALTER TABLE `Login`
ADD CONSTRAINT `Login_ibfk_1` FOREIGN KEY (`Salesperson_SalespersonID`) REFERENCES `Salesperson` (`SalespersonID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Movie_has_Actor`
--
ALTER TABLE `Movie_has_Actor`
ADD CONSTRAINT `Movie_has_Actor_ibfk_1` FOREIGN KEY (`Movie_MovieID`) REFERENCES `Movie` (`MovieID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `Movie_has_Actor_ibfk_2` FOREIGN KEY (`Actor_ActorID`) REFERENCES `Actor` (`ActorID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Movie_has_Genre`
--
ALTER TABLE `Movie_has_Genre`
ADD CONSTRAINT `Movie_has_Genre_ibfk_1` FOREIGN KEY (`Movie_MovieID`) REFERENCES `Movie` (`MovieID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `Movie_has_Genre_ibfk_2` FOREIGN KEY (`Genre_GenreName`) REFERENCES `Genre` (`GenreName`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Movie_has_Store`
--
ALTER TABLE `Movie_has_Store`
ADD CONSTRAINT `Movie_has_Store_ibfk_1` FOREIGN KEY (`Movie_MovieID`) REFERENCES `Movie` (`MovieID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `Movie_has_Store_ibfk_2` FOREIGN KEY (`Store_StoreID`) REFERENCES `Store` (`StoreID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Movie_has_Store_has_Transaction`
--
ALTER TABLE `Movie_has_Store_has_Transaction`
ADD CONSTRAINT `Movie_has_Store_has_Transaction_FKIndex1` FOREIGN KEY (`Movie_has_Store_Store_StoreID`) REFERENCES `Store` (`StoreID`),
ADD CONSTRAINT `Movie_has_Store_has_Transaction_FKIndex2` FOREIGN KEY (`Transaction_TransactionID`) REFERENCES `Transaction` (`TransactionID`),
ADD CONSTRAINT `Movie_has_Store_has_Transaction_FKIndex3` FOREIGN KEY (`Movie_has_Store_Movie_MovieID`) REFERENCES `Movie` (`MovieID`);

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
ADD CONSTRAINT `Payment_ibfk_1` FOREIGN KEY (`Salesperson_SalespersonID`) REFERENCES `Salesperson` (`SalespersonID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `Payment_ibfk_2` FOREIGN KEY (`Transaction_TransactionID`) REFERENCES `Transaction` (`TransactionID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `Payment_ibfk_3` FOREIGN KEY (`Customer_MobileNumber`) REFERENCES `Customer` (`MobileNumber`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Salesperson`
--
ALTER TABLE `Salesperson`
ADD CONSTRAINT `Salesperson_ibfk_1` FOREIGN KEY (`Store_StoreID`) REFERENCES `Store` (`StoreID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Transaction`
--
ALTER TABLE `Transaction`
ADD CONSTRAINT `Transaction_ibfk_1` FOREIGN KEY (`Customer_MobileNumber`) REFERENCES `Customer` (`MobileNumber`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `Transaction_ibfk_2` FOREIGN KEY (`Salesperson_SalespersonID`) REFERENCES `Salesperson` (`SalespersonID`) ON DELETE NO ACTION ON UPDATE NO ACTION;


