-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017 年 8 月 27 日 20:54
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
-- テーブルの構造 `user_table`
--

CREATE TABLE `user_table` (
  `id` int(12) NOT NULL,
  `nickname` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lpw` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `family_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `family_kana` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `first_kana` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `postal_code` int(7) NOT NULL,
  `prefectures` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `phone_num` int(11) NOT NULL,
  `company` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(2) NOT NULL,
  `annual_income` int(6) NOT NULL,
  `job_title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `experience_num` int(3) NOT NULL,
  `career` text COLLATE utf8_unicode_ci NOT NULL,
  `school` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `graduation_date` date NOT NULL,
  `graduated` tinyint(1) NOT NULL,
  `desired_job` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `desired_income` int(6) NOT NULL,
  `desired_region` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `desired_contents` text COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`id`, `nickname`, `email`, `lpw`, `family_name`, `first_name`, `family_kana`, `first_kana`, `birthday`, `gender`, `postal_code`, `prefectures`, `address`, `phone_num`, `company`, `year`, `annual_income`, `job_title`, `experience_num`, `career`, `school`, `department`, `graduation_date`, `graduated`, `desired_job`, `desired_income`, `desired_region`, `desired_contents`, `kanri_flg`) VALUES
(1, 'ooiwa', 'aaa@aaa.us', '$2y$10$oqeKsEB4aImy7KVqyX9lPucx32SEs02ZBiFAiOhzvFBsBza.Vamku', '', '', '', '', '0000-00-00', 0, 0, '', '', 0, '', 0, 0, '', 0, '', '', '', '0000-00-00', 0, '', 0, '', '', 1),
(5, NULL, 'bbb@bbb.com', '$2y$10$Q/bAca7kSRRzXgSTjGB3F./xrXHJOqehyn3STHHYAfJ6GgKklTBru', '', '', '', '', '0000-00-00', 0, 0, '', '', 0, '', 0, 0, '', 0, '', '', '', '0000-00-00', 0, '', 0, '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
