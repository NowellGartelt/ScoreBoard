-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: 2016 年 6 月 18 日 18:01
-- サーバのバージョン： 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ScoreBoard`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gameTable`
--

CREATE TABLE `gameTable` (
  `gameId` int(11) NOT NULL,
  `gameTitleId` int(11) NOT NULL,
  `gameDate` date NOT NULL,
  `gameNo` int(2) NOT NULL,
  `gameEntry` int(2) NOT NULL,
  `registDate` datetime NOT NULL,
  `updateDate` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2016052911 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gameTable`
--

INSERT INTO `gameTable` (`gameId`, `gameTitleId`, `gameDate`, `gameNo`, `gameEntry`, `registDate`, `updateDate`) VALUES
(2016052901, 2, '2016-05-29', 1, 6, '2016-05-29 03:24:45', NULL),
(2016052902, 2, '2016-05-29', 2, 5, '2016-05-29 03:44:46', NULL),
(2016052903, 2, '2016-05-29', 3, 5, '2016-05-29 04:12:57', NULL),
(2016052904, 2, '2016-05-29', 4, 5, '2016-05-29 04:29:22', NULL),
(2016052905, 1, '2016-05-29', 5, 5, '2016-05-29 05:05:41', NULL),
(2016052906, 1, '2016-05-29', 6, 5, '2016-05-29 05:55:32', NULL),
(2016052907, 1, '2016-05-29', 7, 5, '2016-05-29 07:36:29', NULL),
(2016052908, 1, '2016-05-29', 8, 5, '2016-05-29 08:09:43', NULL),
(2016052909, 1, '2016-05-29', 9, 5, '2016-05-29 09:03:11', NULL),
(2016052910, 1, '2016-05-29', 10, 5, '2016-05-29 10:00:18', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `gametitletable`
--

CREATE TABLE `gametitletable` (
  `gametitleid` int(11) NOT NULL,
  `gamename` char(15) NOT NULL,
  `gamememo` tinytext NOT NULL,
  `adddate` datetime NOT NULL,
  `updatedate` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gametitletable`
--

INSERT INTO `gametitletable` (`gametitleid`, `gamename`, `gamememo`, `adddate`, `updatedate`) VALUES
(1, 'ラブライブ！ボードゲーム', 'ラブライブのボードゲーム。戦略性が高い。1プレイ1時間半程度。', '2016-05-25 15:40:31', NULL),
(3, '転生', '1ゲームが短い。', '2016-05-29 05:06:32', NULL),
(2, 'ラブライブ！スクコレ', 'ラブライブのカードゲーム。ソリティアできる', '2016-05-30 18:44:53', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `scoreTable`
--

CREATE TABLE `scoreTable` (
  `scoreId` bigint(15) NOT NULL,
  `gameId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `score` int(2) NOT NULL,
  `registDate` datetime NOT NULL,
  `updateDate` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=201605291006 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `scoreTable`
--

INSERT INTO `scoreTable` (`scoreId`, `gameId`, `userId`, `score`, `registDate`, `updateDate`) VALUES
(201605290101, 2016052901, 1, 4, '2016-05-29 03:24:45', NULL),
(201605290102, 2016052901, 2, 3, '2016-05-29 03:24:45', NULL),
(201605290103, 2016052901, 3, 2, '2016-05-29 03:24:45', NULL),
(201605290104, 2016052901, 4, 0, '2016-05-29 03:24:45', NULL),
(201605290105, 2016052901, 5, 1, '2016-05-29 03:24:45', NULL),
(201605290106, 2016052901, 6, 0, '2016-05-29 03:24:45', NULL),
(201605290201, 2016052902, 1, 5, '2016-05-29 03:44:46', NULL),
(201605290202, 2016052902, 2, 3, '2016-05-29 03:44:46', NULL),
(201605290203, 2016052902, 3, 4, '2016-05-29 03:44:46', NULL),
(201605290204, 2016052902, 4, 2, '2016-05-29 03:44:46', NULL),
(201605290205, 2016052902, 5, 1, '2016-05-29 03:44:46', NULL),
(201605290301, 2016052903, 1, 4, '2016-05-29 04:12:57', NULL),
(201605290302, 2016052903, 2, 2, '2016-05-29 04:12:57', NULL),
(201605290303, 2016052903, 3, 5, '2016-05-29 04:12:57', NULL),
(201605290304, 2016052903, 4, 1, '2016-05-29 04:12:57', NULL),
(201605290305, 2016052903, 5, 3, '2016-05-29 04:12:57', NULL),
(201605290401, 2016052904, 1, 3, '2016-05-29 04:29:22', NULL),
(201605290402, 2016052904, 2, 2, '2016-05-29 04:29:22', NULL),
(201605290403, 2016052904, 3, 4, '2016-05-29 04:29:22', NULL),
(201605290404, 2016052904, 4, 1, '2016-05-29 04:29:22', NULL),
(201605290405, 2016052904, 5, 5, '2016-05-29 04:29:22', NULL),
(201605290501, 2016052905, 1, 0, '2016-05-29 05:05:41', NULL),
(201605290502, 2016052905, 2, 13, '2016-05-29 05:05:41', NULL),
(201605290503, 2016052905, 3, 0, '2016-05-29 05:05:41', NULL),
(201605290504, 2016052905, 4, 5, '2016-05-29 05:05:41', NULL),
(201605290505, 2016052905, 5, 17, '2016-05-29 05:05:41', NULL),
(201605290601, 2016052906, 1, 0, '2016-05-29 05:55:32', NULL),
(201605290602, 2016052906, 2, 18, '2016-05-29 05:55:32', NULL),
(201605290603, 2016052906, 3, 20, '2016-05-29 05:55:32', NULL),
(201605290604, 2016052906, 4, 0, '2016-05-29 05:55:32', NULL),
(201605290605, 2016052906, 5, 11, '2016-05-29 05:55:32', NULL),
(201605290701, 2016052907, 1, 0, '2016-05-29 07:36:29', NULL),
(201605290702, 2016052907, 2, 0, '2016-05-29 07:36:29', NULL),
(201605290703, 2016052907, 3, 16, '2016-05-29 07:36:29', NULL),
(201605290704, 2016052907, 4, 5, '2016-05-29 07:36:29', NULL),
(201605290705, 2016052907, 5, 19, '2016-05-29 07:36:29', NULL),
(201605290801, 2016052908, 1, 12, '2016-05-29 08:09:43', NULL),
(201605290802, 2016052908, 2, 0, '2016-05-29 08:09:43', NULL),
(201605290803, 2016052908, 3, 0, '2016-05-29 08:09:43', NULL),
(201605290804, 2016052908, 4, 5, '2016-05-29 08:09:43', NULL),
(201605290805, 2016052908, 5, 10, '2016-05-29 08:09:43', NULL),
(201605290901, 2016052909, 1, 0, '2016-05-29 09:03:11', NULL),
(201605290902, 2016052909, 2, 22, '2016-05-29 09:03:11', NULL),
(201605290903, 2016052909, 3, 15, '2016-05-29 09:03:11', NULL),
(201605290904, 2016052909, 4, 0, '2016-05-29 09:03:11', NULL),
(201605290905, 2016052909, 5, 22, '2016-05-29 09:03:11', NULL),
(201605291001, 2016052910, 1, 0, '2016-05-29 10:00:18', NULL),
(201605291002, 2016052910, 2, 21, '2016-05-29 10:00:18', NULL),
(201605291003, 2016052910, 3, 17, '2016-05-29 10:00:18', NULL),
(201605291004, 2016052910, 4, 0, '2016-05-29 10:00:18', NULL),
(201605291005, 2016052910, 5, 23, '2016-05-29 10:00:18', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `usertable`
--

CREATE TABLE `usertable` (
  `userid` int(11) NOT NULL,
  `password` tinytext NOT NULL,
  `name` char(20) NOT NULL,
  `adddate` datetime NOT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isAdmin` int(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `usertable`
--

INSERT INTO `usertable` (`userid`, `password`, `name`, `adddate`, `updatedate`, `isAdmin`) VALUES
(1, 'otonoki', 'Y.Nakamura', '2016-05-29 03:19:06', NULL, 1),
(2, 'otonoki', '塚本　憲明', '2016-05-29 03:19:33', NULL, 1),
(3, 'otonoki', '八屋　亮二', '2016-05-29 03:21:14', NULL, 1),
(4, 'otonoki', '谷　大介', '2016-05-29 03:21:50', NULL, 1),
(5, 'otonoki', '小塙　大征', '2016-05-29 03:23:19', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gameTable`
--
ALTER TABLE `gameTable`
  ADD PRIMARY KEY (`gameId`);

--
-- Indexes for table `gametitletable`
--
ALTER TABLE `gametitletable`
  ADD PRIMARY KEY (`gametitleid`),
  ADD UNIQUE KEY `gamename` (`gamename`);

--
-- Indexes for table `scoreTable`
--
ALTER TABLE `scoreTable`
  ADD PRIMARY KEY (`scoreId`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gameTable`
--
ALTER TABLE `gameTable`
  MODIFY `gameId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2016052911;
--
-- AUTO_INCREMENT for table `gametitletable`
--
ALTER TABLE `gametitletable`
  MODIFY `gametitleid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `scoreTable`
--
ALTER TABLE `scoreTable`
  MODIFY `scoreId` bigint(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=201605291006;
--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
