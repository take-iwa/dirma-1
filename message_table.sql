-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017 年 9 月 09 日 13:54
-- サーバのバージョン： 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_db08`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `message_table`
--

CREATE TABLE `message_table` (
  `id` int(24) NOT NULL,
  `company_id` int(12) DEFAULT NULL,
  `user_id` int(12) DEFAULT NULL,
  `subject` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `reply_id` int(24) NOT NULL,
  `transmission` tinyint(1) NOT NULL DEFAULT '0',
  `already` tinyint(1) NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `message_table`
--

INSERT INTO `message_table` (`id`, `company_id`, `user_id`, `subject`, `message`, `reply_id`, `transmission`, `already`, `datetime`) VALUES
(1, 1, 1, '', 'message1message1message1message1message1message1message1message1message1message1message1message1message1message1message1message1message1message1message1message1message1message1message1message1message1', 0, 0, 1, '2017-09-03 12:37:27'),
(2, 1, 1, '', 'message2message2message2message2message2message2message2message2message2message2message2message2message2message2message2message2message2message2message2message2message2message2message2message2message2', 1, 1, 1, '2017-09-03 13:15:28'),
(3, 1, 1, '', 'message3message3message3message3message3message3message3message3message3message3message3message3message3message3message3message3message3message3message3message3message3message3message3message3message3', 2, 0, 1, '2017-09-03 13:46:11'),
(4, 1, 1, '', 'message4message4message4message4message4message4message4message4message4message4message4message4message4message4message4message4message4message4message4message4message4message4message4message4message4', 3, 1, 1, '2017-09-03 18:24:08'),
(5, 1, 1, '', 'message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5message5', 4, 0, 1, '2017-09-04 01:05:07'),
(6, 1, 1, '', 'message6message6message6message6message6\r\nmessage6message6message6message6message6message6message6\r\nmessage6message6message6message6message6message6message6message6\r\nmessage6message6message6message6message6message6message6message6message6message6\r\nmessage6message6message6message6\r\nmessage6\r\n\r\nmessage6', 5, 1, 1, '2017-09-04 08:16:01'),
(7, 1, 1, '', 'テキスト7テキスト7テキスト7テキスト7テキスト7テキスト7テキスト7テキスト7テキスト7\r\nテキスト7テキスト7テキスト7テキスト7\r\nテキスト7テキスト7テキスト7テキスト7\r\n\r\n\r\nテキスト7テキスト7テキスト7テキスト7テキスト7テキスト7テキスト7\r\nテキスト7テキスト7テキスト7テキスト7テキスト7テキスト7\r\nテキスト7テキスト7テキスト7\r\nテキスト7テキスト7テキスト7テキスト7テキスト7テキスト7', 6, 0, 1, '2017-09-09 11:30:56'),
(8, 1, 1, '', 'テキスト８テキスト８テキスト８テキスト８テキスト８テキスト８テキスト８テキスト８\r\nテキスト８テキスト８テキスト８\r\nテキスト８テキスト８テキスト８\r\n\r\n\r\nテキスト８テキスト８テキスト８テキスト８テキスト８\r\nテキスト８テキスト８テキスト８テキスト８テキスト８テキスト８テキスト８\r\nテキスト８テキスト８\r\n\r\nテキスト８テキスト８', 7, 1, 1, '2017-09-09 12:01:44'),
(9, 1, 1, '', 'テキスト９テキスト９テキスト９テキスト９テキスト９<br />\r\n<br />\r\nテキスト９テキスト９テキスト９<br />\r\n<br />\r\nテキスト９テキスト９テキスト９<br />\r\n<br />\r\nテキスト９テキスト９テキスト９テキスト９テキスト９テキスト９<br />\r\n<br />\r\n<br />\r\n<br />\r\nテキスト９テキスト９<br />\r\n<br />\r\nテキスト９テキスト９テキスト９<br />\r\n<br />\r\n<br />\r\n<br />\r\nテキスト９テキスト９テキスト９<br />\r\n<br />\r\nテキスト９', 8, 0, 1, '2017-09-09 12:05:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message_table`
--
ALTER TABLE `message_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message_table`
--
ALTER TABLE `message_table`
  MODIFY `id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
