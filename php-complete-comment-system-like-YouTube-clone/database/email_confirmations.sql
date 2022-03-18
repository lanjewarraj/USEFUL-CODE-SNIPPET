-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 29, 2021 at 09:09 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `email_confirmations`
--

-- --------------------------------------------------------

--
-- Table structure for table `like_unlike`
--

DROP TABLE IF EXISTS `like_unlike`;
CREATE TABLE IF NOT EXISTS `like_unlike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_email` varchar(200) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `type` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `like_unlike`
--

INSERT INTO `like_unlike` (`id`, `member_email`, `comment_id`, `type`) VALUES
(55, 'gjhwatters@gmail.com', 0, -1),
(56, 'gjhwatters@gmail.com', 1, -1),
(54, 'gjhwatters@gmail.com', 3, 1),
(53, 'gjhwatters@gmail.com', 9, -1),
(52, 'gjhwatters@gmail.com', 20, 1),
(57, 'gjhwatters@gmail.com', 22, 0),
(58, 'gjhwatters@gmail.com', 26, -1),
(59, 'gjhwatters@gmail.com', 2, 1),
(60, 'gjhwatters@gmail.com', 27, 0),
(61, 'neche1995@gmail.com', 3, -1),
(62, 'neche1995@gmail.com', 27, 0),
(63, 'gjhwatters@gmail.com', 33, 0),
(65, 'neche1995@gmail.com', 1, -1),
(64, '', 33, 0),
(66, 'neche1995@gmail.com', 45, 1),
(67, 'gjhwatters@gmail.com', 45, 1),
(68, 'gjhwatters@gmail.com', 46, -1),
(69, 'gjhwatters@gmail.com', 44, 1),
(70, 'gjhwatters@gmail.com', 41, 0),
(71, 'gjhwatters@gmail.com', 42, 1),
(72, 'gjhwatters@gmail.com', 48, 1),
(73, 'neche1995@gmail.com', 48, 0),
(74, 'gjhwatters@gmail.com', 49, 1),
(75, 'neche1995@gmail.com', 49, 0),
(76, 'gjhwatters@gmail.com', 37, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reply_likeunlike`
--

DROP TABLE IF EXISTS `reply_likeunlike`;
CREATE TABLE IF NOT EXISTS `reply_likeunlike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_email` varchar(200) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `type` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reply_likeunlike`
--

INSERT INTO `reply_likeunlike` (`id`, `member_email`, `reply_id`, `type`) VALUES
(1, 'gjhwatters@gmail.com', 32, -1),
(2, 'gjhwatters@gmail.com', 31, -1),
(3, 'neche1995@gmail.com', 21, -1),
(4, 'gjhwatters@gmail.com', 29, 1),
(5, 'gjhwatters@gmail.com', 38, 1),
(6, 'gjhwatters@gmail.com', 39, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reported_user` varchar(50) NOT NULL,
  `reported_email` varchar(200) NOT NULL,
  `reported_content` longtext NOT NULL,
  `report` varchar(50) NOT NULL,
  `comment_postId` varchar(20) NOT NULL,
  `page_post` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `reported_user`, `reported_email`, `reported_content`, `report`, `comment_postId`, `page_post`) VALUES
(9, 'neche1995', 'neche1995@gmail.com', 'this is showing the same time ', 'Unwanted Commercial Content or Spam', '3', '2'),
(10, 'neche1995', 'neche1995@gmail.com', 'This is a good way to go', 'Pornography or Sexually Explicit Material', '1', '2'),
(11, 'sirhenks007', 'gjhwatters@gmail.com', 'I simplified my question to leave out irrelevant stuff', 'Child Abuse', '9', '2'),
(12, 'neche1995', 'neche1995@gmail.com', 'This is a good way to go', 'Harrassment or Bullying', '1', '2'),
(13, 'neche1995', 'neche1995@gmail.com', 'This is great', 'Child Abuse', '2', '2'),
(14, 'sirhenks007', 'gjhwatters@gmail.com', '1WE ARE GOOD ddf hjhlkjhlkj ok', 'Pornography or Sexually Explicit Material', '33', '2'),
(15, 'neche1995', 'neche1995@gmail.com', 'this is showing the same time ', 'Child Abuse', '3', '2'),
(16, 'neche1995', 'neche1995@gmail.com', 'Reunification of migrant toddlers, parents should be completed Thursday', 'Hate Speech or Graphic Violence', '45', '1');

-- --------------------------------------------------------

--
-- Table structure for table `reports_reply`
--

DROP TABLE IF EXISTS `reports_reply`;
CREATE TABLE IF NOT EXISTS `reports_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reported_user` varchar(50) NOT NULL,
  `reported_email` varchar(200) NOT NULL,
  `reported_content` longtext NOT NULL,
  `report` varchar(50) NOT NULL,
  `reply_postId` varchar(20) NOT NULL,
  `page_post` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reports_reply`
--

INSERT INTO `reports_reply` (`id`, `reported_user`, `reported_email`, `reported_content`, `report`, `reply_postId`, `page_post`) VALUES
(1, 'neche1995><i class=', 'neche1995@gmail.com', 'I can not say more than that to you', 'Harrassment or Bullying', '32', '2'),
(2, 'neche1995', 'neche1995@gmail.com', 'wow nice work', 'Unwanted Commercial Content or Spam', '33', '2'),
(3, 'neche1995', 'neche1995@gmail.com', 'I can not say more than that to you', 'Hate Speech or Graphic Violence', '32', '2');

-- --------------------------------------------------------

--
-- Table structure for table `resetpasswords`
--

DROP TABLE IF EXISTS `resetpasswords`;
CREATE TABLE IF NOT EXISTS `resetpasswords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment_post`
--

DROP TABLE IF EXISTS `tbl_comment_post`;
CREATE TABLE IF NOT EXISTS `tbl_comment_post` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `post_content` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `post_datetime` varchar(50) DEFAULT NULL,
  `page_post` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comment_post`
--

INSERT INTO `tbl_comment_post` (`comment_id`, `email`, `post_content`, `post_datetime`, `page_post`) VALUES
(3, 'neche1995@gmail.com', 'this is showing the same time ', '2021-01-03 15:21:00', 2),
(27, 'gjhwatters@gmail.com', 'seat hope this works for oldest post', '2021-01-05 20:30:51', 2),
(32, 'gjhwatters@gmail.com', 'ffI am there to help', '2021-01-10 11:42:53', 2),
(33, 'gjhwatters@gmail.com', 'WE ARE GOOD ddf am grateful for all your efforts in making sure this is possible.t', '2021-01-03 17:37:14', 2),
(35, 'neche1995@gmail.com', 'comfort me please lord', '2021-01-02 18:04:17', 3),
(36, 'gjhwatters@gmail.com', 'my aim is to make money', '2021-01-02 18:07:25', 4),
(37, 'gjhwatters@gmail.com', 'Oh lord save me from corona virus', '2021-01-02 18:09:37', 3),
(38, 'neche1995@gmail.com', 'this is insane to always be a bad leader. Well if am elected my case will be different. Kudos to the world leaders day. am grateful for all your efforts in making sure this is possible. electrical', '2021-01-03 17:42:45', 2),
(39, 'neche1995@gmail.com', 'oh my goodness in vitamin a, c and minerals like iron and manganese. fresh dill with simple seasoning. this', '2021-01-03 17:43:19', 2),
(40, 'gjhwatters@gmail.com', 'open for booking,  just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese. 1', '2021-01-03 16:42:38', 2),
(41, 'gjhwatters@gmail.com', ' The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese. I am a good boy', '2021-01-10 19:46:32', 2),
(42, 'neche1995@gmail.com', 'ofcourse am not going to go there ever', '2021-01-03 16:29:58', 2),
(43, 'neche1995@gmail.com', 'I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, j', '2021-01-03 17:44:21', 4),
(44, 'neche1995@gmail.com', ' all kinds of them but yellow moong dal is my go-to lentil', '2021-01-03 17:54:38', 4),
(45, 'neche1995@gmail.com', 'Reunification of migrant toddlers, parents should be completed Thursday', '2021-01-03 17:55:44', 1),
(46, 'gjhwatters@gmail.com', 'I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes', '2021-01-03 17:56:43', 1),
(48, 'gjhwatters@gmail.com', 'I am not feeling too well guys. I have malaria o', '2021-04-29 10:06:48', 2),
(49, 'gjhwatters@gmail.com', 'I am not feeling too well. You guys should pray for me. I am getting much better', '2021-01-10 20:05:01', 1),
(51, 'gjhwatters@gmail.com', 'ok', '2021-04-29 09:52:37', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reply`
--

DROP TABLE IF EXISTS `tbl_reply`;
CREATE TABLE IF NOT EXISTS `tbl_reply` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `replies` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `timestamp` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reply`
--

INSERT INTO `tbl_reply` (`reply_id`, `comment_id`, `email`, `replies`, `timestamp`) VALUES
(3, 3, 'gjhwatters@gmail.com', 'Okay no problem i believe you', '2020-12-14 10:01:10'),
(5, 3, 'neche1995@gmail.com', 'rok i have heard mate', '2021-01-02 18:01:47'),
(7, 1, 'gjhwatters@gmail.com', 'dfsdfs', '2020-12-17 00:44:22'),
(11, 2, 'gjhwatters@gmail.com', 'This is not possible', '2020-12-17 11:32:19'),
(12, 2, 'gjhwatters@gmail.com', 'Try that again', '2020-12-17 11:33:14'),
(13, 2, 'gjhwatters@gmail.com', 'going again', '2020-12-17 11:35:58'),
(14, 27, 'gjhwatters@gmail.com', 'tt', '2020-12-17 11:46:20'),
(15, 27, 'gjhwatters@gmail.com', 'e dfsfd', '2021-01-02 13:07:50'),
(18, 1, 'gjhwatters@gmail.com', 'opppp', '2020-12-17 12:05:37'),
(19, 1, 'gjhwatters@gmail.com', 'slide the fuck down', '2020-12-17 12:06:56'),
(20, 2, 'gjhwatters@gmail.com', 'go down', '2020-12-17 12:15:36'),
(21, 1, 'gjhwatters@gmail.com', 'tf oggle', '2021-01-02 13:08:18'),
(24, 3, 'gjhwatters@gmail.com', 'phyno onye high way', '2021-01-02 14:04:43'),
(26, 32, 'gjhwatters@gmail.com', 'let me know now', '2021-01-03 16:38:21'),
(29, 3, 'gjhwatters@gmail.com', 'this is insane o', '2021-01-10 12:00:53'),
(30, 33, 'gjhwatters@gmail.com', 'edsfs', '2021-01-02 13:23:58'),
(31, 33, 'gjhwatters@gmail.com', 'rrr reEOK GOOD, sdas', '2021-01-02 13:39:04'),
(32, 33, 'neche1995@gmail.com', 'I can not say more than that to you', '2021-01-02 14:27:25'),
(33, 32, 'neche1995@gmail.com', 'wow nice work', '2021-01-02 14:37:25'),
(34, 35, 'gjhwatters@gmail.com', 'you are just an idiot', '2021-01-02 18:05:20'),
(35, 1, 'neche1995@gmail.com', 'this is serious', '2021-01-03 15:13:20'),
(36, 36, 'neche1995@gmail.com', 'I like how you code', '2021-01-03 17:48:45'),
(37, 48, 'neche1995@gmail.com', 'hope you get much better', '2021-01-10 19:49:40'),
(38, 49, 'neche1995@gmail.com', 'I hope you get much better', '2021-01-10 20:06:14'),
(39, 44, 'gjhwatters@gmail.com', 'alright good', '2021-04-29 10:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `isEmailConfirmed` tinyint(4) NOT NULL,
  `token` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `refcode` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `profile_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `acctname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `acctnumb` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `bankname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `earning` int(255) NOT NULL DEFAULT '30',
  `paystatus` int(50) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `isEmailConfirmed`, `token`, `refcode`, `profile_image`, `acctname`, `acctnumb`, `bankname`, `phone`, `earning`, `paystatus`, `date`) VALUES
(1, 'Watters Henry', 'sirhenks007', 'gjhwatters@gmail.com', '$2y$10$D2jLe9oeAvSMSrzHQBYhe.PN2qbSugNxHD/8f5dp1gDSYXrYEIPja', 1, '', 'gjhwatters@gmail.com?429DE63E', '1303439849.jpg', 'Watters Henry Ojimba', '0032071189', 'Diamond bak', '08036623350', 410, 0, '2021-04-29 08:51:03'),
(2, 'Neche Onunze', 'neche1995', 'neche1995@gmail.com', '$2y$10$ip72mM2SdpFrv0bVrIbK2OVtnQ92ngnKpGTdLA11zOgTsRuI6TCtW', 1, '', 'neche1995@gmail.com?D7099CAC', '1007433748.png', 'Neche Milian Onunze', '0098786765', 'GTB Bank', '09054565464', 140, 0, '2021-01-10 17:17:02'),
(3, 'bestquotesng', 'sirhenks007rrr', 'gjhwatters@gmai.com', '$2y$10$FeGbR3UNxIm7UMsfHnxdt.Z3noXl0A1zMsShbcR29EEqLGJM4Of7u', 0, 'tOQTAXdHre', 'gjhwatters@gmai.com?743EDB19', NULL, NULL, NULL, NULL, NULL, 30, 0, '2019-09-06 18:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `video_post`
--

DROP TABLE IF EXISTS `video_post`;
CREATE TABLE IF NOT EXISTS `video_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `video_image` varchar(50) NOT NULL,
  `video_link` varchar(200) NOT NULL,
  `brief_description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `video_post`
--

INSERT INTO `video_post` (`id`, `title`, `video_image`, `video_link`, `brief_description`) VALUES
(1, 'Stripe integration payment gateway', 'video-image/stripe.jpg', '2zLHeO9p9Fo', 'Stripe I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe fo'),
(2, 'Paypal paymnet gateway integration', 'video-image/paypal.jpg', 'l0ZiQth7XVc', 'Paypal I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe fo'),
(3, 'PHP timeago function tutorial', 'video-image/timeago.jpg', '51UUYGq9cjk', 'timeago I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe f'),
(4, 'Pro Ecommerce Website Demo', 'video-image/ecom.jpg', 'VBhTLgrcuQQ', 'Pro Ecommerce I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal re');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
