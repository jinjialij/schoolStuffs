-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2018 at 04:34 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `FollowingID` int(11) NOT NULL,
  `User` int(11) NOT NULL,
  `FollowingUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `following`
--

INSERT INTO `following` (`FollowingID`, `User`, `FollowingUser`) VALUES
(1, 1, 4),
(2, 1, 5),
(3, 1, 7),
(4, 2, 1),
(5, 3, 1),
(6, 6, 1),
(7, 1, 2),
(8, 5, 4),
(9, 3, 5),
(10, 4, 7),
(11, 1, 3),
(12, 8, 1),
(13, 8, 4),
(14, 8, 5),
(15, 8, 2),
(16, 9, 1),
(17, 9, 4),
(18, 10, 2),
(19, 10, 3),
(20, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `loginID` int(4) NOT NULL,AUTO_INCREMENT
  `UserID` int(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginID`, `UserID`, `username`, `password`) VALUES
(1, 1, 'jiali', '123456'),
(2, 2, 'iris', 'ab3456'),
(3, 3, 'jane', 'kb3456'),
(4, 4, 'luke', 'em3456'),
(5, 5, 'steve', 's23456'),
(6, 6, 'ty', 't23456'),
(7, 8, 'mary123', '123mary123'),
(8, 9, 'kim', '123456a'),
(9, 10, 'roger', 'asdf123d');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `PostID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Post` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`PostID`, `UserID`, `Date`, `Post`) VALUES
(1, 1, '2018-08-21 04:08:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac metus nec est tempor tempor sit amet non justo. Duis molestie enim id rutrum eleifend.\r\n'),
(2, 1, '2018-09-30 22:23:00', 'Sed suscipit lacus a orci vestibulum, id varius neque pellentesque. Proin luctus sodales odio, in commodo velit euismod a. Integer dolor velit, condimentum in ipsum sed, venenatis faucibus ligula. Mauris lobortis iaculis commodo. \r\n'),
(3, 1, '2018-10-01 12:52:00', 'Morbi purus est, bibendum at pulvinar eget, tempus sed tortor. In tincidunt elementum ornare. Donec nulla massa, ultricies vel lorem quis, consectetur interdum felis\r\n'),
(4, 1, '2018-10-14 09:06:00', 'Maecenas ullamcorper accumsan pretium. Nulla mollis purus nec venenatis ornare. Nulla est mauris, semper non porttitor a, viverra eu eros.\r\n'),
(5, 2, '2018-09-27 14:35:00', 'Nam viverra sollicitudin magna, tincidunt scelerisque erat ultrices et. Nunc faucibus dui et leo tempor, vitae interdum quam hendrerit. Donec in aliquet justo.\r\n'),
(6, 2, '2018-08-01 09:23:00', 'Vivamus lorem metus, ullamcorper et vulputate sed, tincidunt posuere dolor. Integer scelerisque vel mi eget convallis. Quisque ultricies leo dignissim, porta eros feugiat, ullamcorper diam.\r\n'),
(7, 2, '2018-10-14 15:53:00', 'Praesent id ultrices orci, eu pulvinar lorem. Aenean id erat vel elit commodo dictum. Ut interdum arcu dui, blandit molestie risus luctus ac. Phasellus porttitor accumsan lectus in varius.\r\n'),
(8, 3, '2018-10-13 16:26:00', 'Sed sem lorem, aliquam sit amet fringilla sed, venenatis quis nunc. Ut consectetur eget ligula semper pulvinar.\r\n'),
(9, 3, '2018-10-14 15:51:00', 'Nunc varius, quam quis lacinia congue, nulla libero tempus quam, sit amet mollis nunc diam ut mauris. Proin faucibus pulvinar sem vitae suscipit.\r\n'),
(10, 3, '2018-10-14 06:18:00', 'Nunc faucibus dui et leo tempor, vitae interdum quam hendrerit. Ut tellus felis, porta eget laoreet pellentesque, aliquet vel nulla.\r\n'),
(11, 4, '2018-08-19 19:23:00', 'Proin tempor quam nec diam rutrum congue.'),
(12, 4, '2018-10-13 12:52:00', 'Sed lacinia tortor a metus pharetra pharetra. Morbi varius facilisis tellus sit amet congue. Nam bibendum est elementum augue maximus, non ultrices nisl finibus.\r\n'),
(13, 4, '2018-10-14 16:32:00', 'Nullam tincidunt, tortor ut aliquam laoreet, lectus lorem semper turpis, ac euismod nunc enim ut sapien.\r\n'),
(14, 4, '2018-10-15 19:45:00', 'Nulla vel dapibus justo, a dignissim purus. Sed vehicula consectetur tellus vitae facilisis. Sed vulputate convallis.\r\n'),
(15, 5, '2018-09-02 01:35:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi purus est, bibendum at pulvinar eget, tempus sed tortor. In tincidunt elementum ornare. Donec nulla massa, ultricies vel lorem quis, consectetur interdum felis.\r\n'),
(16, 5, '2018-10-13 12:49:00', 'Aenean in enim vel enim cursus facilisis. Proin ac mollis quam. Etiam pretium, sapien sed consequat pharetra, sapien lacus volutpat lacus, lobortis lacinia sem erat quis neque.\r\n'),
(17, 5, '2018-10-14 15:31:00', 'Ut eu odio fermentum, ullamcorper velit in, faucibus enim. Sed mattis tincidunt laoreet. Nunc blandit ultrices orci vel ullamcorper. Nunc sodales erat at mauris rutrum hendrerit.\r\n'),
(18, 6, '2018-09-02 02:35:00', 'Maecenas ullamcorper accumsan pretium. Nulla mollis purus nec venenatis ornare. Nulla est mauris, semper non porttitor a, viverra eu eros.\r\n'),
(19, 6, '2018-10-14 15:53:00', 'Cras vel justo massa. Maecenas hendrerit elementum elit non volutpat. Ut venenatis neque ac justo ornare accumsan. Nunc mollis, ligula ut molestie efficitur, risus ipsum fringilla dui, sed sodales elit nibh ac dolor.\r\n'),
(20, 6, '2018-10-14 06:19:00', 'Maecenas auctor gravida erat, eget interdum ante porttitor quis. Mauris lacus justo, rhoncus in arcu sed, dignissim rhoncus elit. \r\n'),
(21, 7, '2018-08-21 04:08:00', 'Morbi id volutpat est, in ornare justo. Vestibulum sit amet volutpat neque. Donec blandit mi nibh, sed molestie magna pellentesque vitae. Phasellus imperdiet lacinia tincidunt. Aliquam erat volutpat.\r\n'),
(22, 7, '2018-10-13 12:56:00', 'Donec enim velit, rutrum nec tellus sed, fermentum consectetur diam. Donec magna sapien, tempor vitae laoreet id, scelerisque sit amet nibh. \r\n'),
(23, 7, '2018-10-13 12:57:00', 'Fusce hendrerit ultricies purus, quis cursus ex hendrerit in. In mi nisl, fringilla ut orci vitae, luctus tristique felis. Cras finibus lobortis est, eget ullamcorper felis fringilla nec.\r\n'),
(24, 8, '2018-11-24 04:05:33', 'Nullam placerat, ante sed aliquam congue, ligula libero vestibulum orci, quis ornare libero purus nec justo.'),
(25, 8, '2018-11-24 04:05:49', 'Cras nec enim a quam sodales luctus.'),
(26, 9, '2018-11-24 04:13:11', 'li'),
(27, 9, '2018-11-24 04:18:41', 'Hello'),
(28, 10, '2018-11-24 04:29:21', 'Maecenas ullamcorper accumsan pretium. Nulla mollis purus nec venenatis ornare. Nulla est mauris, semper non porttitor a, viverra eu eros.'),
(29, 10, '2018-11-24 04:29:24', 'Aenean sed efficitur lorem. In sed sapien gravida, porta augue ut, commodo risus. Nullam augue lectus.'),
(30, 10, '2018-11-24 04:29:42', 'Hahahahahaha! Happy!');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Profile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Name`, `Profile`) VALUES
(1, 'Jiali Jin', 'I am Jiali. I am new to Chatter!'),
(2, 'Iris Morris', 'A short description of Iris Morris  Mauris vitae convallis nulla. Aliquam id lorem ipsum. Phasellus ornare, leo sed tincidunt vulputate, neque sem vehicula enim, at mattis dolor mi eget ligula. '),
(3, 'Jane Harris', 'A short description of Jane Harris  Nam vehicula faucibus est sed accumsan. Vestibulum imperdiet arcu ex. Vivamus gravida enim felis, vitae ornare ipsum tempus sed. \r\n'),
(4, 'Luke Empire', 'A short description of Luke Empire  Sed non urna id arcu vestibulum luctus.'),
(5, 'Marty Fly', 'A short description of Marty Fly  Morbi id volutpat est, in ornare justo. Vestibulum sit amet volutpat neque. Donec blandit mi nibh, sed molestie magna pellentesque vitae.'),
(6, 'Steve Law', 'A short description of Steve Law  Integer rhoncus purus ut ornare venenatis. Nullam ullamcorper interdum mi condimentum consequat. Mauris dapibus sed ex vitae rhoncus. '),
(7, 'Ty Lysa', 'A short description of Ty Lysa  Cras dapibus blandit nulla ac dignissim. Cras elementum elit non tortor suscipit aliquet.'),
(8, 'Mary Smith', 'I am Mary. Love chatting!'),
(9, 'Kim Cook', 'I am Kim. Please call me Kimmy!'),
(10, 'Roger Stone', 'I am Roger. I am happy.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`FollowingID`),
  ADD KEY `User` (`User`),
  ADD KEY `FollowingUser` (`FollowingUser`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`loginID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `following`
--
ALTER TABLE `following`
  MODIFY `FollowingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `loginID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `following`
--
ALTER TABLE `following`
  ADD CONSTRAINT `following_ibfk_1` FOREIGN KEY (`User`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `following_ibfk_2` FOREIGN KEY (`FollowingUser`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
