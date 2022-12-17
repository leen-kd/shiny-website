-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2022 at 05:15 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shiny-2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `firstName`, `lastName`, `password`) VALUES
('123', 'Sara', 'Ahmad', '$2y$10$Wq.Geb2R0qT8o.kywelrBOL8hZfZaC6jyQkxULuZPvGOoRCBlDJNG');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `idSkin` int(11) NOT NULL,
  `brand` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` float NOT NULL,
  `pic` varchar(500) NOT NULL,
  `saved` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `idSkin`, `brand`, `name`, `description`, `price`, `pic`, `saved`) VALUES
(1, 1, 'Kiehl\'s', 'A multi-miracle ', 'Kiehl\'s, A multi-miracle hydrating water cream infused with concentrated Calendula Serum. 3.4fl oz(100 ml)', 90, 'imgNormal1.png', 0),
(3, 1, 'SkinCeuticals', 'A vitamin C serum.', 'SkinCeuticals,  C E Ferulic, A vitamin C serum. 1fl oz(30 ml)', 166, 'imgNormal3.png', 0),
(4, 1, 'HoliFrog Shasta ', 'AHA Acid Wash A gentle.', 'HoliFrog Shasta AHA Acid Wash A gentle. 5fl oz(150 ml)', 38, 'imgNormal4.png', 0),
(5, 1, 'Kiehl\'s', 'A restorative', 'A restorative, nighttime eye cream. 0.5 oz (15 ml)', 42, 'imgNormal5.png', 0),
(6, 1, 'First Aid Beauty', 'Facial Radiance Pad', 'First Aid Beauty Facial Radiance Pads, A radiance-boosting exfoliant(28 pads)', 19, 'imgNormal6.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `review` text NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `itemID`, `review`, `name`) VALUES
(1, 1, 'item is great I recommend it', 'leen'),
(10, 1, 'greaaattttt supper good', 'Manal'),
(11, 1, 'This product gave me a reaction I am still dealing with. I had to go to urgent care and get prednisone, Zyrtec and Benadryl. My face swelled up to the point my eyes changed shape.', 'Norah Abdullah');

-- --------------------------------------------------------

--
-- Table structure for table `skin`
--

CREATE TABLE `skin` (
  `id` int(11) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skin`
--

INSERT INTO `skin` (`id`, `type`) VALUES
(1, 'normal'),
(2, 'oily'),
(3, 'dry'),
(4, 'combination'),
(5, 'sensitive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSkin` (`idSkin`),
  ADD KEY `idSkin_2` (`idSkin`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemID` (`itemID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`itemID`) REFERENCES `item` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
