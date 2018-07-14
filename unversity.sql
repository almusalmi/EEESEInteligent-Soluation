-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2018 at 12:42 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unversity`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Parent` int(11) NOT NULL DEFAULT '0',
  `Ordaring` int(11) DEFAULT NULL,
  `Visibility` tinyint(4) NOT NULL DEFAULT '0',
  `Allow_comment` tinyint(4) NOT NULL DEFAULT '0',
  `Allow_ads` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `Name`, `Description`, `Parent`, `Ordaring`, `Visibility`, `Allow_comment`, `Allow_ads`) VALUES
(1, 'Information System', 'Information System side and all its need', 0, 2, 0, 0, 0),
(3, 'Computer Science', 'Computer Science Students part', 0, 0, 1, 1, 1),
(4, 'Information Technology', 'Information Technology Students part', 0, 1, 1, 0, 0),
(5, 'Techers', 'this is Techers side and all its needs', 0, 2, 0, 0, 0),
(6, 'Admins', 'Admins side and thier needs', 0, 3, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `C_id` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '0',
  `Comment_date` date NOT NULL,
  `Item_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`C_id`, `Comment`, `Status`, `Comment_date`, `Item_id`, `User_id`) VALUES
(1, 'nice one', 0, '0000-00-00', 7, 7),
(2, 'wow', 1, '0000-00-00', 5, 18),
(3, 'no way', 1, '2017-11-01', 5, 18),
(5, 'nnnn', 1, '2018-07-13', 9, 23),
(6, 'ccccc', 1, '2018-07-13', 11, 23),
(7, 'Award for Successful Student in 2013', 1, '2018-07-13', 12, 23),
(8, 'Develop Android Mobile Application with Java', 1, '2018-07-13', 12, 23),
(9, 'الدرس جميل جدا', 1, '2018-07-13', 12, 26),
(10, 'شكرا جميلا', 1, '2018-07-13', 12, 23),
(11, 'noooooooooo', 1, '2018-07-13', 21, 26),
(12, 'hhhhhhhhh yesss', 1, '2018-07-13', 21, 23),
(13, 'hi oli how do you do', 1, '2018-07-13', 12, 1),
(14, 'so the certifcate will be on starday', 1, '2018-07-13', 12, 1),
(15, 'سلامات', 1, '2018-07-13', 24, 18),
(16, 'مرحب', 1, '2018-07-13', 24, 18),
(17, 'كيفك', 1, '2018-07-13', 24, 1),
(18, 'ليه', 1, '2018-07-14', 24, 18);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `Item_ID` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Description` text CHARACTER SET utf8 NOT NULL,
  `Price` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Add_Date` date NOT NULL,
  `Country_Made` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Status` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Rating` smallint(6) NOT NULL,
  `Approve` tinyint(4) NOT NULL DEFAULT '0',
  `Cat_ID` int(11) NOT NULL,
  `Member_ID` int(11) NOT NULL,
  `Tags` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`Item_ID`, `Name`, `Description`, `Price`, `Add_Date`, `Country_Made`, `Image`, `Status`, `Rating`, `Approve`, `Cat_ID`, `Member_ID`, `Tags`) VALUES
(4, 'sony', 'sony X2', '$30', '2017-11-23', 'chaina', '', '2', 0, 0, 4, 1, ''),
(5, 'ticno', 'ticno c8', '$90', '2017-11-23', 'sudan', '', '2', 0, 1, 4, 18, ''),
(6, 'lenovo', 'nice pc', '$90', '2017-11-23', 'USA', '', '2', 0, 1, 1, 17, ''),
(7, 'nokia', 'nokia is nice phone', '$100', '2017-11-23', 'USA', '', '3', 0, 1, 6, 17, ''),
(9, 'Game', 'its game for kids', '123', '2017-11-30', 'USA', '', '2', 0, 1, 1, 19, ''),
(10, 'aaaaaa', 'aaaaaaaa aaaaaaa', '11', '2018-07-13', 'aaaa', '', '2', 0, 1, 1, 23, 'new'),
(11, 'certificate', 'i need my certificate', '111', '2018-07-13', 'sudan', '', '1', 0, 1, 5, 19, 'new,test'),
(12, 'test', ' Ahme husss Ah', '11', '2018-07-13', 'aaaa', '', '4', 0, 1, 6, 23, 'new,test'),
(13, 'qqq', 'qqqqqqqqq', '1', '2018-07-13', 'aaaa', '', '2', 0, 1, 1, 1, 'new'),
(14, 'Secund Year', 'fffffffffffff', '111', '2018-07-13', 'aaaa', '', '2', 0, 1, 1, 12, 'new'),
(16, 'no ', 'nononono', '100', '2018-07-13', 'sudan', '', '2', 0, 0, 3, 7, 'new'),
(17, 'Secund Year', 'wssssssssssssssssssss', '100', '2018-07-13', 'sudan', '', '1', 0, 1, 5, 23, 'new,test'),
(18, 'certificate bri', 'certificate bri certificate bri', '100', '2018-07-13', 'sudan', '', '2', 0, 1, 3, 23, 'new'),
(19, 'bb bb', 'this is for test', '100', '2018-07-13', 'sudan', '', '4', 0, 1, 6, 23, 'new,test'),
(20, 'تأجيل محاضره', 'لقد تم تأجيل محاضرة', '100', '2018-07-13', 'sudan', '', '2', 0, 1, 3, 26, '4,5'),
(21, 'تاجيل امتحان', 'لقد تم تاجيل امتحان جافا', '100', '2018-07-13', 'sudan', '', '2', 0, 1, 3, 23, '5,cs,it,is,3'),
(22, 'certificate', 'certificate certificate certificate certificate', '100', '2018-07-13', 'sudan', '', '4', 0, 1, 6, 1, 'certificate'),
(23, 'السلام عليكم', 'هل الجافا لغة برمجة ؟', '100', '2018-07-13', 'sudan', '', '2', 0, 1, 3, 18, 'اساتذة,cs,it,is'),
(24, 'اعلان هام', 'تحزير الاستاذ عبود من الغياب', '100', '2018-07-13', 'sudan', '', '4', 0, 1, 6, 18, 'new,test');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `message`) VALUES
(1, '                    hi\r\n                '),
(2, 'how are you'),
(3, '                    good\r\n                '),
(4, '                    hi 2\r\n                '),
(5, 'good an you ?'),
(6, '                    hhhhh\r\n                '),
(7, ''),
(8, 'bbbb'),
(9, '                    \r\n                mmm'),
(10, '                    \r\n                hollo'),
(11, '                    hi\r\n                '),
(12, 'سلامات'),
(13, '                    \r\n              Hi'),
(14, 'كيفك تمام'),
(15, 'hgfgfg'),
(16, 'دا شنو دا'),
(17, 'جاك'),
(18, '                    \r\n                اااا'),
(19, 'لللل'),
(20, '                    \r\n                jjjjjjjjjjjjjjj'),
(21, '                    اع\r\n\r\n                '),
(22, 'الاخبار شنو');

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Fulname` varchar(255) NOT NULL,
  `GroupID` int(11) NOT NULL DEFAULT '0',
  `TrustStatus` int(11) NOT NULL DEFAULT '0',
  `RegStatus` int(11) NOT NULL DEFAULT '0',
  `Date` date NOT NULL,
  `Avatar` varchar(255) NOT NULL,
  `Statuss` int(11) NOT NULL DEFAULT '2',
  `Category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `Email`, `Fulname`, `GroupID`, `TrustStatus`, `RegStatus`, `Date`, `Avatar`, `Statuss`, `Category`) VALUES
(1, 'ahmed', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ba@gmail.com', 'ahmed hussein bo', 1, 0, 1, '0000-00-00', '', 0, 6),
(7, 'Khalid', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'khalid@gmail.com', 'Khalid Mohammed', 0, 0, 1, '0000-00-00', '', 1, 1),
(12, 'hali', 'e16f2cfe3eeddac6a07d0579fc92925faf1d9f49', 'hali@gmail.com', 'hali holol', 0, 0, 0, '2017-10-22', '', 1, 1),
(17, 'moize', 'b42a6d93d796915222f6ffb2ffdd6137d93c1cdb', 'ali@gmail.com', 'ali ahmed', 0, 0, 1, '2017-10-25', '', 2, 1),
(18, 'Atybe', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'aty@aty.com', 'atybe adam', 0, 0, 1, '2017-11-23', '', 2, 1),
(19, 'bokhw', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'bokhw@gm.com', 'bokhw hussein', 0, 0, 1, '2017-11-24', '', 3, 4),
(21, 'sideg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'sideg@gmail.com', '', 0, 0, 1, '2017-11-30', '', 2, 4),
(23, 'olii', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'oli@gmail.com', 'oli ali oli', 0, 0, 1, '2018-07-13', '327786_‏ الله.jpg', 2, 5),
(24, 'gammer', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Status@gmail.com', 'gammer mht', 0, 0, 1, '2018-07-13', '791067_198.JPG', 2, 3),
(25, 'nnnn', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'nnn@nn.nn', 'nnnn nnnnnnn', 0, 0, 1, '2018-07-13', '913922________.JPG', 2, 3),
(26, 'ابوبكر', '8cb2237d0679ca88db6464eac60da96345513964', 'abubakr772@gmail.com', 'ابوبكر مسلمي السعيد', 0, 0, 1, '2018-07-13', '', 2, 3),
(27, 'mamon', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ma@gm.cm', 'mamon ali', 0, 0, 1, '2018-07-13', '399461_Oryx Antelope.jpg', 3, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`C_id`),
  ADD KEY `item_comment` (`Item_id`),
  ADD KEY `user_comment` (`User_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`Item_ID`),
  ADD KEY `member_1` (`Member_ID`),
  ADD KEY `cat_1` (`Cat_ID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `C_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `Item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `item_comment` FOREIGN KEY (`Item_id`) REFERENCES `items` (`Item_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_comment` FOREIGN KEY (`User_id`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `cat_1` FOREIGN KEY (`Cat_ID`) REFERENCES `categories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_1` FOREIGN KEY (`Member_ID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
