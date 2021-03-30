-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-03-30 14:03:16
-- サーバのバージョン： 10.4.17-MariaDB
-- PHP のバージョン: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `animal_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `animal_table`
--

CREATE TABLE `animal_table` (
  `id` int(12) NOT NULL,
  `a_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `kaisetu` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `animal_table`
--

INSERT INTO `animal_table` (`id`, `a_name`, `category`, `kaisetu`, `img`) VALUES
(50, 'うさぎ', 'ほにゅう類', 'かわいい', './img/1440_900_20091218092627147450.jpg'),
(51, 'キリン', 'ほにゅう類', '首が長い、木の上の葉っぱを食べて生活しているよ！', './img/kirin.jpg'),
(52, 'ペンギン', 'ちょう類', '寒いところが大好き', './img/pengin.jpg'),
(53, 'カエル', 'りょう類', 'げこーっとなく', './img/kaeru.jpg'),
(54, 'いぬ', 'ほにゅう類', 'ワンと吠えるよ', './img/10671198.jpg'),
(55, 'カンガルー', 'その他', 'お腹の袋で赤ちゃんを育てるよ', './img/kangaru.jpg'),
(56, 'あ', 'ちょう類', 'あ', './img/2018-08-20_13-13-12_188.jpeg'),
(57, 'あ', 'ちょう類', 'あ', './img/2018-08-20_13-13-12_188.jpeg'),
(59, 'あ', 'ちょう類', 'あ', './img/2018-08-20_13-13-12_188.jpeg'),
(60, 'あ', 'ちょう類', 'あ', './img/2018-08-20_13-13-12_188.jpeg'),
(61, 'あ', 'ちょう類', 'あ', './img/2018-08-20_13-13-12_188.jpeg'),
(62, 'あ', 'ちょう類', 'あ', './img/2018-08-20_13-13-12_188.jpeg');

-- --------------------------------------------------------

--
-- テーブルの構造 `member_table`
--

CREATE TABLE `member_table` (
  `id` int(12) NOT NULL,
  `u_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `u_id` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `u_pw` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `member_table`
--

INSERT INTO `member_table` (`id`, `u_name`, `u_id`, `u_pw`, `indate`) VALUES
(3, 'a', 'a', 'aaaaaaaa', '2021-03-28 13:46:40');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `animal_table`
--
ALTER TABLE `animal_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `member_table`
--
ALTER TABLE `member_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `animal_table`
--
ALTER TABLE `animal_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- テーブルの AUTO_INCREMENT `member_table`
--
ALTER TABLE `member_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
