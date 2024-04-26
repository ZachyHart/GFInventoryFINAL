-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2024-04-14 11:01:37
-- 服务器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `login_system`
--

-- --------------------------------------------------------

--
-- 表的结构 `customerfeedbacks`
--

CREATE TABLE `customerfeedbacks` (
  `FeedbackID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `FeedbackTitle` varchar(50) NOT NULL,
  `FeedbackContent` varchar(500) NOT NULL,
  `reply` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `customerfeedbacks`
--

INSERT INTO `customerfeedbacks` (`FeedbackID`, `Email`, `FeedbackTitle`, `FeedbackContent`, `reply`, `updated_at`) VALUES
(1, 'johanmariocampo@gmail.com', 'Iron Man Funko', 'Are there any more Iron Man funko pops in your inventory?', 'We we will restock next week :)', '2024-04-13 09:41:18'),
(11, 'wangwestley@gmail.com', 'Test', 'Test1', '', '2024-04-13 13:48:56'),
(12, 'wangwestley@gmail.com', 'Test2', 'test2', 'gjj', '2024-04-13 13:51:38'),
(13, 'danfelicisimo@hotspot.com', 'Custom funko pop.', 'The Funko pop should be black and have the face of Mike Tyson.', 'sure!', '2024-04-13 14:15:05'),
(14, 'danfelicisimo@hotspot.com', 'Custom funko pop (1)', 'I would also add my family as a funko pop.', 'Testtttt', '2024-04-13 15:29:13'),
(15, 'sadsaa@efe.com', 'SE TEST', 'SE TEST', 'Reply to SE TEST', '2024-04-13 15:42:59');

-- --------------------------------------------------------

--
-- 表的结构 `customerpwdreset`
--

CREATE TABLE `customerpwdreset` (
  `cpwdResetId` int(11) NOT NULL,
  `cpwdResetEmail` text NOT NULL,
  `cpwdResetSelector` text NOT NULL,
  `cpwdResetToken` text NOT NULL,
  `cpwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `customerpwdreset`
--

INSERT INTO `customerpwdreset` (`cpwdResetId`, `cpwdResetEmail`, `cpwdResetSelector`, `cpwdResetToken`, `cpwdResetExpires`) VALUES
(8, 'westleywang30@gmail.com', '23f3ebf5eadb3200', '$2y$10$KKl3xPDiZp80v0R0nXN6c.MfXo..xNtxI0Se1ysCR/ectvcKn99gC', '1708671163'),
(13, '', '559f565e9801db46', '$2y$10$ULnNE20lEJY.CuZkDb2S1O2bRl6tVujspXRXyw.rnIAlPV97iDTTG', '1712976434');

-- --------------------------------------------------------

--
-- 表的结构 `customerusers`
--

CREATE TABLE `customerusers` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL,
  `confirmToken` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `customerusers`
--

INSERT INTO `customerusers` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`, `confirmToken`) VALUES
(14, 'west', 'wangwestley@gmail.com', 'west', '$2y$10$kWolw9SXqWHa03KeirX/b.cgcZoraSL4/kW6MzuyCLMaDDJXE5H8i', 'confirmed'),
(15, 'zachy', 'rqfashion2018@gmail.com', 'zachy', '$2y$10$BkZfEC5cONBkahdmQY9cj.Gr6LpqhPFYD0b0fFk7/57q03W2CF1ry', 'confirmed');

-- --------------------------------------------------------

--
-- 表的结构 `product_table`
--

CREATE TABLE `product_table` (
  `product_id` int(10) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `product_table`
--

INSERT INTO `product_table` (`product_id`, `product_image`, `product_category`, `product_name`, `price`, `stock`) VALUES
(16, 'Green Goblin.jpg', 'MARVEL', 'FUNKO! GREEN GOBLIN', 200, 1),
(17, 'Venomized Thanos.jpg', 'MARVEL', 'FUNKO! VENOMIZED THANOS', 1000, 2),
(18, 'Venomized Thor.jpg', 'MARVEL', 'FUNKO! VENOMIZED THOR', 1000, 2),
(19, 'Warcraft.jpg', 'Warcraft', 'FUNKO! WARCRAFT', 1000, 2),
(20, 'Alice.jpg', 'DISNEY', 'FUNKO! ALICE IN THE WONDERLAND', 900, 2),
(21, 'Batman.jpg', 'DC', 'FUNKO! RED DEATH FLASH/BATMAN', 1000, 2),
(22, 'Boa Hancock.jpg', 'ANIME', 'FUNKO! BOA HANCOCK', 1000, 2),
(23, 'Electro (Yellow).jpg', 'MARVEL', 'FUNKO! ELECTRO (YELLOW)', 400, 2),
(24, 'Eleven (Elevated).jpg', 'STRANGER THINGS', 'FUNKO! ELEVEN (ELEVATED)', 200, 2),
(25, 'Spectre.jpg', 'DC', 'FUNKO! SPECTRE', 200, 5),
(26, 'Muzan Kibutsuji.jpg', 'Demon Slayer', 'FUNKO! MUZAN KIBUTSUJI', 200, 4),
(27, 'Mahito.jpg', 'Jujutsu Kaisen', 'FUNKO! mahito', 200, 2),
(28, 'Iron-Man.jpg', 'marvel', 'FUNKO! AVENGERS IRON MAN', 200, 2),
(29, 'Gyomei Himejima.jpg', 'DEMON SLAYER', 'FUNKO! GYOMEI HIMEJIMA', 200, 2),
(30, 'Electro (Blue).jpg', 'MARVEL', 'FUNKO! ELECTRO (BLUE)', 1000, 5),
(31, 'Iron Man (Black).jpg', 'MARVEL', 'FUNKO! IRON-MAN (BLACK)', 200, 5),
(32, 'Ed Sheeran.jpg', 'MUSIC ARTIST', 'FUNKO! ED SHEERAN', 1000, 2),
(33, 'Dustin.jpg', 'STRANGER THINGS', 'FUNKO! DUSTIN', 1000, 4),
(34, 'Champa.jpg', 'DRAGON BALL', 'FUNKO! CHAMPA', 1000, 1),
(35, 'Champ.jpg', 'Jollibee', 'FUNKO! Champ Jollibee', 1000, 2),
(36, 'Yoda (Spirit).jpg', 'STAR WARS', 'FUNKO! YODA (SPIRIT)', 1000, 2),
(37, 'Summoned Skull.jpg', 'YU GI-OH', 'FUNKO! SUMMONED SKULL', 1000, 2),
(38, 'Spider-Man.jpg', 'MARVEL', 'FUNKO! SPIDERMAN', 1000, 1),
(39, 'Spider-Man (Bag).jpg', 'MARVEL', 'FUNKO! Spiderman in Bag', 1000, 2),
(40, 'Sasuke.jpg', 'NARUTO', 'FUNKO! SASUKE UCHIHA', 1000, 2),
(41, 'Picke Rick (With Laser).jpg', 'Rick N\' Morty', 'FUNKO! PICKLE RICK', 1000, 2),
(42, 'Notorious B.I.G.jpg', 'MUSIC ARTIST', 'FUNKO! NOTORIOUS B.I.G', 1000, 5),
(43, 'Miles Morales.jpg', 'MARVEL', 'FUNKO! MILES MORALES', 1000, 2),
(44, 'J. Jonah Jameson.jpg', 'MARVEL', 'FUNKO! J. JONAH JAMESON', 1000, 3),
(45, 'Inspector Gadget.jpg', 'INSPECTOR GADGET', 'FUNKO! INSPECTOR GADGET', 1000, 5),
(46, 'Gorr.jpg', 'MARVEL', 'FUNKO! GORR', 1000, 2),
(47, 'Frost Giant Loki.jpg', 'MARVEL', 'FUNKO! FROST GIANT LOKI', 1000, 5);

-- --------------------------------------------------------

--
-- 表的结构 `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` text NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(11, 'westleyrichard.wang.cics@ust.edu.ph', '38f18b7058f4029c', '$2y$10$lYCJjShPfAzddGgFNzn9duw8h9aXzaMZC1gFK54VxSQC/AYjhBs.G', '1708424287'),
(12, 'westleywang30@gmail.com', '00514fe098902a4b', '$2y$10$.mZpMuGRMjxOKdZgFepmI.0RHGXNZ4uk8tdlRbCEpkVusCPtUPQNK', '1708424300'),
(13, 'sfadf@qq.com', '065f67f393c1939a', '$2y$10$ZaXGjEM4yxZSxlhoX8gYoeNAXAyN7RqjHlTHjYnxpGfB1Kam03fve', '1708424436'),
(15, 'fosfjo@gmail.com', 'abdf06ca1f7e04d7', '$2y$10$g2IMeYqF10QXKSxrOnT4fuutN4EAw78AyBejLgIQUMzXWfHnZJksi', '1708425843'),
(30, 'rq', 'f250f52061942cbc', '$2y$10$HC9QsCK17pbmGUlO3D9cr.CcTT7WBXDvnNSIC/ZM4mxYnxE/W0W5a', '1708612429'),
(41, 'rqfashion2018@gmail.com', '617a836853ef29a1', '$2y$10$i1vvWUzIFZ.LLW1mLz9eQexdtypXRpTal5PlQXBPoCO3AlwsvaYvi', '1708670573'),
(42, 'test@gmail.com', '39ece5e72da2960f', '$2y$10$zi5W9IuGbnvBEQ.4rRpyO.w6S97i690UPmHr6H4NwL0aonlT6qtpu', '1709690707'),
(45, '12', 'edd7f91b668ae3b0', '$2y$10$10DBRc8udP1aFtxlDCMiD.Do4r8DRQ3c3PDS3sOv2Rhl7YcZgOi76', '1712976518'),
(46, '', '617052eae9a68be1', '$2y$10$1cJUtQEtnQrHF7CEyibcLud904BIjtxp2Z2kPK9pRRf6xWDFkDYwC', '1712988375');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL,
  `confirmToken` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`, `confirmToken`) VALUES
(22, 'imran', 'ijason2002@gmail.com', 'imran', '$2y$10$L4eH.DiAVxgsjEdKBbPfrOSX0nBZJy2y..c0aOO1nwlSq0go0ypzO', 'confirmed');

--
-- 转储表的索引
--

--
-- 表的索引 `customerfeedbacks`
--
ALTER TABLE `customerfeedbacks`
  ADD PRIMARY KEY (`FeedbackID`);

--
-- 表的索引 `customerpwdreset`
--
ALTER TABLE `customerpwdreset`
  ADD PRIMARY KEY (`cpwdResetId`);

--
-- 表的索引 `customerusers`
--
ALTER TABLE `customerusers`
  ADD PRIMARY KEY (`usersId`);

--
-- 表的索引 `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`product_id`);

--
-- 表的索引 `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `customerfeedbacks`
--
ALTER TABLE `customerfeedbacks`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用表AUTO_INCREMENT `customerpwdreset`
--
ALTER TABLE `customerpwdreset`
  MODIFY `cpwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用表AUTO_INCREMENT `customerusers`
--
ALTER TABLE `customerusers`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用表AUTO_INCREMENT `product_table`
--
ALTER TABLE `product_table`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- 使用表AUTO_INCREMENT `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
