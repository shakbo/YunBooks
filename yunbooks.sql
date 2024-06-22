-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 06:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+08:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yunbooks`
--
CREATE DATABASE IF NOT EXISTS `yunbooks` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `yunbooks`;

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

DROP TABLE IF EXISTS `accesslevel`;
CREATE TABLE IF NOT EXISTS `accesslevel` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`id`, `name`) VALUES
(1, '管理員'),
(2, '一般用戶');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(800) NOT NULL,
  `image` varchar(255) NOT NULL,
  `writer` int(10) NOT NULL,
  `publisher` int(10) NOT NULL,
  `publishdate` date NOT NULL,
  `description` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `books_ibfk_1` (`writer`),
  KEY `books_ibfk_2` (`publisher`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `image`, `writer`, `publisher`, `publishdate`, `description`) VALUES
(1, 'A Mystery at the Incredible Hotelww', 'public/assets/images/books/1.png', 1, 1, '2024-05-04', '「不可思議大飯店」的蛋糕享負盛名，吸引人們特地前來飯店品嘗美味，就連公爵夫人也每天帶著愛犬馬卡龍造訪。'),
(2, 'Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones', 'public/assets/images/books/2.png', 2, 2, '2019-10-01', '從運動生涯幾乎結束，到入選全美明星陣容，甚至在畢業時獲得學業方面的總統獎章，他是怎麼做到的？一切只因他認識且善用了「原子習慣」的力量！'),
(3, 'A Shelter for Sadness', 'public/assets/images/books/3.png', 3, 3, '2022-02-18', '英國水石書店年度最佳童書得主，《森林裡的鋼琴師》大衛．里奇斐德最新作品'),
(4, 'The Incredible Hotel', 'public/assets/images/books/4.png', 1, 1, '2020-08-04', '如果你來到德朗尼市，別忘了去看看「不可思議大飯店」。飯店裡的一切都精準運行，Stephan 是飯店廚房的小助理，飯店的每一天從他泡的咖啡開始，咖啡香喚醒飯店主廚，主廚做好早餐，交給領班端去給經理，就這樣飯店的一天順利展開。Stephen 每天有忙不完的雜事要做，但他總是幻想著有一天能夠做出厲害甜點，贏得大家的讚美。'),
(5, '排球少年！！10週年編年史 全', 'public/assets/images/books/5.png', 4, 4, '2024-04-02', '本書有歷任責編與老師多達90頁的長篇對談，《排球少年！！》從2012年連載至今的大小企劃、週邊商品的介紹、還有作品10週年紀念主視覺圖、出版物未收錄的插圖和漫畫等等，極具收藏價值，排球少年迷不容錯過。'),
(6, 'GIVEN 被贈與的未來(09)完', 'public/assets/images/books/6.png', 5, 5, '2024-05-10', '「真冬的歌聲宛如魔法。」'),
(7, '原子習慣：細微改變帶來巨大成就的實證法則', 'public/assets/images/books/7.png', 2, 6, '2019-06-01', '善用「複利」效應，讓小小的原子習慣利滾利，滾出生命的大不同！'),
(8, 'ONE PIECE航海王 108', 'public/assets/images/books/8.png', 7, 4, '2024-04-25', '魯夫一行人打算逃離未來島，卻遭到海軍的大船隊包圍整座島，率領船隊的人是上將『黃猿』！而其中也有五老星的身影，規模前所未有之大的戰鬥，即將籠罩於此……一場爭奪「ONE PIECE」的海上冒險故事！'),
(9, '我可能錯了：森林智者的最後一堂人生課', 'public/assets/images/books/9.png', 8, 7, '2023-02-01', '「我可能錯了」這句話，正是比約恩在寺院中汲取到最有智慧的工具，幫他挺過17年後再回瑞典時的憂鬱風暴，以及罹患漸凍症逐漸走向死亡的日子。'),
(10, '蛤蟆先生去看心理師', 'public/assets/images/books/10.png', 9, 8, '2022-01-26', '藉由蛤蟆先生和心理師的10次諮商，演繹心理諮商全過程，見證療癒與改變的發生。'),
(11, '食遇美國：固執台妹的異鄉冒險', 'public/assets/images/books/11.png', 11, 9, '2018-09-03', '本書不是食譜，而是一本私房日記。'),
(12, '我不願將就這個功利的世界', 'public/assets/images/books/12.png', 12, 9, '2018-02-01', '本書引導人們以「不將就」的態度，認真地對待僅有一次的人生。期勉人們成為勤奮努力、勇敢堅定的強者，無所畏懼地逆風飛行，於平凡生活中打造不平凡。');

-- --------------------------------------------------------

--
-- Table structure for table `ownedbooks`
--

DROP TABLE IF EXISTS `ownedbooks`;
CREATE TABLE IF NOT EXISTS `ownedbooks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user` int(10) NOT NULL,
  `book` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `book_ibfk_1` (`book`),
  KEY `ownedbooks_ibfk_2` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

DROP TABLE IF EXISTS `publisher`;
CREATE TABLE IF NOT EXISTS `publisher` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id`, `name`) VALUES
(1, 'Lincoln Children’s Books'),
(2, 'Avery'),
(3, 'Templar Publishing'),
(4, '東立'),
(5, '尖端'),
(6, '方智'),
(7, '先覺'),
(8, '三采'),
(9, '力得'),
(10, '人類文化');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(320) NOT NULL,
  `phoneNumber` varchar(13) DEFAULT NULL,
  `token_key` varchar(255) NOT NULL,
  `token_value` varchar(255) NOT NULL,
  `accesslevel` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_ibfk_1` (`email`),
  KEY `users_ibfk_2` (`accesslevel`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
-- INSERT INTO `users` (`username`, `password`, `email`, `phoneNumber`, `token_key`, `token_value`, `accesslevel`) VALUES
-- 

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phoneNumber`, `token_key`, `token_value`, `accesslevel`) VALUES
(1, 'admin', '$2y$10$7zc8eLDSfqNKaVGPKmsA8OXgJhdiLwN8hoZ2chBTQ/ywmVVOGTjYW', 'admin@yunbooks.com', NULL, '', '', 1),
(2, 'RoboStudio', '$2y$10$w94klPgHrVbeBMIy9h29qOnjgJN04.feh6RrVUhoOZvV75aNPP3aa', 'speciers63@gmail.com', '', '', '', 1),
(3, 'achacha', '$2y$10$7qTSi2N0.7spBivQjE0Y7uYpyRLu/cNjMQvucRlQ934H4NOO2tvbm', 'boy.yang.2222@gmail.com', NULL, '', '', 2),
(4, 'samantha88', '$2y$10$e2gwAHNgv3iNMzC43iu0f..YY7Y3d2VEJMQyjylNJq6qJnC4dLBt6', 'samantha@gmail.com', NULL, '', '', 2),
(5, 'mike_smith', '$2y$10$TLQYx4kjDDtvshxi9VcHl.I0H8aVW5ySpQ3gx6iDkmDn9ujSFuWWe', 'mikesmith@hotmail.com', NULL, '', '', 2),
(6, 'alex_taylor', '$2y$10$aD.1zcwrVpQdHi4QEJ59Tu/QW2VdoiwdDoeH8Ru.R/rrrJ0qACBR2', 'alextaylor@yahoo.com', NULL, '', '', 2),
(7, 'karen_miller', '$2y$10$SAGRLgdBK398BbHeNOigTubxHBHfgE9k630OXo.PiOjiMMctGQI.O', 'karenmiller@gmail.com', NULL, '', '', 2),
(8, 'davidjones', '$2y$10$e/G4e8Y1dgGyBlRlLT2dZOnYeElbpwDgU7qFLnImw1R0Ja0m8RHc2', 'davidjones@gmail.com', NULL, '', '', 2),
(9, 'emily_brown', '$2y$10$mtv36dTYsP9ekH6FHMjsruH56XTW9U2XZV3X9IJi96VUL01QFD9Ru', 'emilybrown@outlook.com', NULL, '', '', 2),
(10, 'robert_davis', '$2y$10$GYSxUxed5qgVPgbDGFdNv.KQ8MoSqI.XXLDU3Sc24HdE/ApOAWLYi', 'robertdavis@gmail.com', NULL, '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `writer`
--

DROP TABLE IF EXISTS `writer`;
CREATE TABLE IF NOT EXISTS `writer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `writer`
--

INSERT INTO `writer` (`id`, `name`) VALUES
(1, 'Kate Davies'),
(2, 'James Clear'),
(3, 'Anne Booth'),
(4, '古舘春一'),
(5, 'キヅナツキ'),
(6, '詹姆斯‧克利爾'),
(7, '尾田榮一郎'),
(8, '比約恩．納提科．林德布勞'),
(9, '羅伯．狄保德'),
(10, '陳俊旭'),
(11, 'Corrinne'),
(12, '南陳');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`writer`) REFERENCES `writer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`publisher`) REFERENCES `publisher` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ownedbooks`
--
ALTER TABLE `ownedbooks`
  ADD CONSTRAINT `ownedbooks_ibfk_1` FOREIGN KEY (`book`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `ownedbooks_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`accesslevel`) REFERENCES `accesslevel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
