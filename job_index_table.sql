-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017 年 8 月 27 日 10:42
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dirma`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `job_index_table`
--

CREATE TABLE IF NOT EXISTS `job_index_table` (
`id` int(11) NOT NULL,
  `corporate` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `job_title` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `job_sort` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `job_sort_detail` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `workplace` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `comp_min` int(16) NOT NULL,
  `comp_max` int(16) NOT NULL,
  `job_contents` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `wanted` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `job_index_table`
--

INSERT INTO `job_index_table` (`id`, `corporate`, `job_title`, `job_sort`, `job_sort_detail`, `workplace`, `comp_min`, `comp_max`, `job_contents`, `wanted`, `date`) VALUES
(1, '株式会社ファーストリテイリング', 'ジーユー担当　戦略人事（ビジネスパートナー）', '経営企画・事業企画・管理部門', '人事・総務', '東京都', 580, 1200, 'ジーユー本部のビジネスパートナー（戦略人事）として、各部門の人事業務（要員計画・人件費の策定・管理、タレントマネジメント、労務管理等）を担当いただきます。', '人事関連業務（採用、タレントマネジメント、制度企画、報酬設計、労務管理など）の企画・運用経験。未経験も可（詳細ご確認下さい）。', '2017-08-23'),
(2, '株式会社ファーストリテイリング', 'ジーユー新卒採用担当メンバー', '経営企画・事業企画、管理部門', '人事・総務', '東京都', 580, 1200, 'ファーストリテイリング人事部に所属し、ジーユーの新卒採用担当人事として、採用業務全般を担当いただきます。', '新卒採用業務経験者。未経験でも、人事を志す明確な動機があり、かつ自ら課題を設定し周囲をまきこみ物事を推進されてきた経験がある方は歓迎。', '2017-08-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_index_table`
--
ALTER TABLE `job_index_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_index_table`
--
ALTER TABLE `job_index_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
