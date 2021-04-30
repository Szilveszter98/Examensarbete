-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 30 apr 2021 kl 20:15
-- Serverversion: 10.4.11-MariaDB
-- PHP-version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `jobnetwork`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `companies`
--

CREATE TABLE `companies` (
  `ID` int(50) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefonNummer` varchar(20) NOT NULL,
  `organisationsNummer` int(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `type` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `postnummer` int(10) NOT NULL,
  `region` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `companies`
--

INSERT INTO `companies` (`ID`, `companyName`, `email`, `telefonNummer`, `organisationsNummer`, `description`, `type`, `address`, `postnummer`, `region`, `password`) VALUES
(8, 'Bygg och Tak AB', 'asd123@gmail.com', '0712345678', 2147483647, 'Vi hjälper personer med bygg och tak med fokus på kunden', '', 'Strålsjövägen 11', 18493, '', 'bfd59291e825b5f2bbf1eb76569f8fe7'),
(13, 'VVS centrum', 'snickare123@gmail.com', '0722505369', 119843, 'Beskrivning om företaget\r\n', '', 'åkersberga', 13242, '', 'bfd59291e825b5f2bbf1eb76569f8fe7'),
(16, 'Lindströms El', 'lindstromsel@gmail.com', '0722505330', 2147483647, 'En pålitlig företag med focus på kundens behov', 'Elektriker', 'Strålsjövägen 11', 18469, '', 'bfd59291e825b5f2bbf1eb76569f8fe7');

-- --------------------------------------------------------

--
-- Tabellstruktur `companycomments`
--

CREATE TABLE `companycomments` (
  `ID` int(50) NOT NULL,
  `companyID` int(50) NOT NULL,
  `comment` text NOT NULL,
  `date_posted` date NOT NULL DEFAULT current_timestamp(),
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `companycomments`
--

INSERT INTO `companycomments` (`ID`, `companyID`, `comment`, `date_posted`, `name`) VALUES
(7, 13, 'Riktigt bra företag!', '2021-04-15', 'Szilveszter Mag'),
(8, 16, 'Duktiga och snabba grabbar!', '2021-04-30', 'Szilveszter Mag');

-- --------------------------------------------------------

--
-- Tabellstruktur `companyimages`
--

CREATE TABLE `companyimages` (
  `ID` int(11) NOT NULL,
  `companyID` int(11) NOT NULL,
  `file_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `companyimages`
--

INSERT INTO `companyimages` (`ID`, `companyID`, `file_name`) VALUES
(32, 8, '6077f78ce36a27.54763405.jpg'),
(33, 8, '6077f78ce47148.75838412.jpg'),
(35, 13, '6077f9f9009085.72684819.jpg'),
(36, 13, '6077f9f901b1c7.56299464.jpg'),
(37, 13, '6079555fd88c94.65579690.jpg'),
(41, 16, '608c3cfd4c5457.81752357.jpg');

-- --------------------------------------------------------

--
-- Tabellstruktur `companylogos`
--

CREATE TABLE `companylogos` (
  `ID` int(50) NOT NULL,
  `companyID` int(50) NOT NULL,
  `file_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `companylogos`
--

INSERT INTO `companylogos` (`ID`, `companyID`, `file_name`) VALUES
(18, 8, '6077f77794c8d7.56588197.jpg'),
(21, 13, '607955cbc3e023.51999328.jpg'),
(22, 16, '608c3ce61f7c08.02117215.jpg');

-- --------------------------------------------------------

--
-- Tabellstruktur `companytokens`
--

CREATE TABLE `companytokens` (
  `ID` int(50) NOT NULL,
  `company_id` int(50) NOT NULL,
  `date_updated` int(50) NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur `faktura`
--

CREATE TABLE `faktura` (
  `ID` int(50) NOT NULL,
  `companyID` int(11) NOT NULL,
  `companyReferens` varchar(50) NOT NULL,
  `fakturaDate` date NOT NULL DEFAULT current_timestamp(),
  `ProductName` varchar(50) NOT NULL,
  `bankgiro` varchar(50) NOT NULL DEFAULT '1234-5678',
  `plusgiro` varchar(50) NOT NULL DEFAULT '65432-1',
  `amount` int(11) NOT NULL,
  `companyAddress` varchar(300) NOT NULL,
  `fakturaNumber` int(100) NOT NULL DEFAULT 1223334444,
  `companyName` varchar(50) NOT NULL,
  `lastPayDate` date NOT NULL,
  `productValidTime` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `faktura`
--

INSERT INTO `faktura` (`ID`, `companyID`, `companyReferens`, `fakturaDate`, `ProductName`, `bankgiro`, `plusgiro`, `amount`, `companyAddress`, `fakturaNumber`, `companyName`, `lastPayDate`, `productValidTime`) VALUES
(78, 13, 'Jag', '2021-04-16', '30 days PREMIUM', '1234-5678', '65432-1', 1500, 'åkersberga', 1223334444, 'VVS centrum', '2021-05-16', '30 days'),
(79, 13, 'Jag', '2021-04-16', '30 days PREMIUM', '1234-5678', '65432-1', 1500, 'åkersberga', 1223334444, 'VVS centrum', '2021-05-16', '30 days'),
(80, 13, 'jag', '2021-04-16', '30 days PREMIUM', '1234-5678', '65432-1', 1500, 'åkersberga', 1223334444, 'VVS centrum', '2021-05-16', '30 days'),
(81, 13, 'Jackson JAck', '2021-04-16', '3 months PREMIUM', '1234-5678', '65432-1', 3990, 'åkersberga', 1223334444, 'VVS centrum', '2021-05-16', '60 days'),
(82, 13, 'Jackson JAck', '2021-04-16', '3 months PREMIUM', '1234-5678', '65432-1', 3990, 'åkersberga', 1223334444, 'VVS centrum', '2021-05-16', '60 days'),
(83, 13, 'Jackson JAck', '2021-04-16', '3 months PREMIUM', '1234-5678', '65432-1', 3990, 'åkersberga', 1223334444, 'VVS centrum', '2021-05-16', '60 days'),
(84, 13, 'Jackson JAck', '2021-04-16', '3 months PREMIUM', '1234-5678', '65432-1', 3990, 'åkersberga', 1223334444, 'VVS centrum', '2021-05-16', '60 days'),
(85, 13, 'Jackson JAck', '2021-04-16', '3 months PREMIUM', '1234-5678', '65432-1', 3990, 'åkersberga', 1223334444, 'VVS centrum', '2021-05-16', '60 days'),
(86, 13, 'Jackson JAck', '2021-04-16', '3 months PREMIUM', '1234-5678', '65432-1', 3990, 'åkersberga', 1223334444, 'VVS centrum', '2021-05-16', '60 days'),
(87, 13, 'Jackson JAck', '2021-04-16', '3 months PREMIUM', '1234-5678', '65432-1', 3990, 'åkersberga', 1223334444, 'VVS centrum', '2021-05-16', '60 days'),
(88, 13, 'Jackson JAck', '2021-04-16', '3 months PREMIUM', '1234-5678', '65432-1', 3990, 'åkersberga', 1223334444, 'VVS centrum', '2021-05-16', '60 days'),
(89, 13, 'Jackson JAck', '2021-04-16', '3 months PREMIUM', '1234-5678', '65432-1', 3990, 'åkersberga', 1223334444, 'VVS centrum', '2021-05-16', '60 days'),
(90, 13, 'Jackson JAck', '2021-04-16', '3 months PREMIUM', '1234-5678', '65432-1', 3990, 'åkersberga', 1223334444, 'VVS centrum', '2021-05-16', '60 days'),
(91, 13, 'Jackson JAck', '2021-04-16', '3 months PREMIUM', '1234-5678', '65432-1', 3990, 'åkersberga', 1223334444, 'VVS centrum', '2021-05-16', '60 days'),
(92, 13, 'Jackson JAck', '2021-04-16', '3 months PREMIUM', '1234-5678', '65432-1', 3990, 'åkersberga', 1223334444, 'VVS centrum', '2021-05-16', '60 days'),
(93, 13, 'Jackson JAck', '2021-04-26', '3 months PREMIUM', '1234-5678', '65432-1', 3990, 'åkersberga', 1223334444, 'VVS centrum', '2021-05-26', '60 days'),
(94, 13, 'Jackson JAck', '2021-04-26', '3 months PREMIUM', '1234-5678', '65432-1', 3990, 'åkersberga', 1223334444, 'VVS centrum', '2021-05-26', '60 days'),
(95, 16, 'Matias Lindström', '2021-04-30', '6 months PREMIUM', '1234-5678', '65432-1', 7500, 'Strålsjövägen 11', 1223334444, 'Lindströms El', '2021-05-30', '180 days'),
(96, 16, 'Matias Lindström', '2021-04-30', '6 months PREMIUM', '1234-5678', '65432-1', 7500, 'Strålsjövägen 11', 1223334444, 'Lindströms El', '2021-05-30', '180 days'),
(97, 16, 'Matias Lindström', '2021-04-30', '6 months PREMIUM', '1234-5678', '65432-1', 7500, 'Strålsjövägen 11', 1223334444, 'Lindströms El', '2021-05-30', '180 days'),
(98, 16, 'sdasda', '2021-04-30', '30 days PREMIUM', '1234-5678', '65432-1', 1500, 'Strålsjövägen 11', 1223334444, 'Lindströms El', '2021-05-30', '30 days'),
(99, 16, 'sdasda', '2021-04-30', '30 days PREMIUM', '1234-5678', '65432-1', 1500, 'Strålsjövägen 11', 1223334444, 'Lindströms El', '2021-05-30', '30 days'),
(100, 16, 'sdasda', '2021-04-30', '30 days PREMIUM', '1234-5678', '65432-1', 1500, 'Strålsjövägen 11', 1223334444, 'Lindströms El', '2021-05-30', '30 days'),
(101, 16, 'sdasda', '2021-04-30', '30 days PREMIUM', '1234-5678', '65432-1', 1500, 'Strålsjövägen 11', 1223334444, 'Lindströms El', '2021-05-30', '30 days');

-- --------------------------------------------------------

--
-- Tabellstruktur `postimages`
--

CREATE TABLE `postimages` (
  `ID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `file_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `postimages`
--

INSERT INTO `postimages` (`ID`, `postID`, `file_name`) VALUES
(3, 34, '6050b0c22cbc38.19257175.jpg'),
(4, 39, '6050c516794fb4.56224090.jpg'),
(15, 61, '608c1f26be6e91.65896294.jpg'),
(16, 62, '608c4078776c70.69020823.jpg');

-- --------------------------------------------------------

--
-- Tabellstruktur `posts`
--

CREATE TABLE `posts` (
  `ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `startDate` date NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `type` varchar(50) NOT NULL,
  `ort` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefonNummer` varchar(20) NOT NULL,
  `userID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `posts`
--

INSERT INTO `posts` (`ID`, `title`, `description`, `startDate`, `date`, `type`, `ort`, `email`, `telefonNummer`, `userID`) VALUES
(61, 'Bygga altan', 'Vi behöver hjälp av en pålitlig företag med altanen. Vi behöver bygga om den och den är 4x4 meter.', '2021-05-06', '2021-04-30 17:15:19', 'Snickare', 'Strålsjövägen 11', 'szilveszter.mag98@gmail.com', '0722505330', 17),
(62, 'Koppla om el', 'Vi har  en sommarstuga som behöver renoveras och då ska elen dras om. Vi söker efter duktiga elektriker', '2021-05-06', '2021-04-30 19:37:19', 'Elektriker', 'Strålsjövägen 11', 'szilveszter.mag98@gmail.com', '0722505330', 2);

-- --------------------------------------------------------

--
-- Tabellstruktur `premiumcompanies`
--

CREATE TABLE `premiumcompanies` (
  `ID` int(50) NOT NULL,
  `companyID` int(50) NOT NULL,
  `token` varchar(300) NOT NULL,
  `date_updated` int(50) NOT NULL,
  `productID` int(10) NOT NULL,
  `endDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `premiumcompanies`
--

INSERT INTO `premiumcompanies` (`ID`, `companyID`, `token`, `date_updated`, `productID`, `endDate`) VALUES
(25, 13, '5abeed49ae2135fae7af3cc443e99197', 1619451309, 2, '2021-07-25'),
(26, 16, '988a5646052e5c45e2fdb076290077a2', 1619804702, 3, '2021-10-27');

-- --------------------------------------------------------

--
-- Tabellstruktur `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(15) NOT NULL,
  `description` text NOT NULL,
  `file_name` varchar(300) NOT NULL,
  `validTime` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`ID`, `name`, `price`, `description`, `file_name`, `validTime`) VALUES
(1, '30 days PREMIUM', 1500, '-Access to all registered jobs what fits your company in 1 month', 'product1.png', '30 days'),
(2, '3 months PREMIUM', 3990, '-Access to all registered jobs what fits your company in 3 months', 'product2.png', '60 days'),
(3, '6 months PREMIUM', 7500, '-Access to all registered jobs what fits your company in 6 months', 'product3.png', '180 days');

-- --------------------------------------------------------

--
-- Tabellstruktur `tokens`
--

CREATE TABLE `tokens` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_updated` int(11) NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `tokens`
--

INSERT INTO `tokens` (`ID`, `user_id`, `date_updated`, `token`) VALUES
(89, 17, 1619805298, '05e8710c21f9868a10c1bc1ca6f36da2');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `ID` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`ID`, `firstname`, `lastname`, `username`, `email`, `password`, `role`) VALUES
(2, 'Szilveszte', 'Mag', 'silver123', 'szilveszter.mag98@gmail.com', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'user'),
(3, 'Jack', 'Sparrow', 'Captian', 'silver.privat98@gmail.com', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'user'),
(17, 'Kalle', 'Anka', 'kalleanka90', 'kalleanka90@gmail.com', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'user');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `companycomments`
--
ALTER TABLE `companycomments`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `companyimages`
--
ALTER TABLE `companyimages`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `companylogos`
--
ALTER TABLE `companylogos`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `companytokens`
--
ALTER TABLE `companytokens`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `faktura`
--
ALTER TABLE `faktura`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `postimages`
--
ALTER TABLE `postimages`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `premiumcompanies`
--
ALTER TABLE `premiumcompanies`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `companies`
--
ALTER TABLE `companies`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT för tabell `companycomments`
--
ALTER TABLE `companycomments`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT för tabell `companyimages`
--
ALTER TABLE `companyimages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT för tabell `companylogos`
--
ALTER TABLE `companylogos`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT för tabell `companytokens`
--
ALTER TABLE `companytokens`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT för tabell `faktura`
--
ALTER TABLE `faktura`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT för tabell `postimages`
--
ALTER TABLE `postimages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT för tabell `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT för tabell `premiumcompanies`
--
ALTER TABLE `premiumcompanies`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT för tabell `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `tokens`
--
ALTER TABLE `tokens`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
