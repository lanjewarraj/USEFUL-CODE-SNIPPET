

CREATE TABLE `chatrooms` (
  `cr_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` varchar(1000) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `created_date` date NOT NULL,
  `s_id` int(11) NOT NULL,
  PRIMARY KEY (`cr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO chatrooms VALUES("1","a","2022-03-22 14:07:41","2022-03-22","2");
INSERT INTO chatrooms VALUES("2","b","2022-03-22 14:07:43","2022-03-22","2");
INSERT INTO chatrooms VALUES("3","c","2022-03-22 14:07:45","2022-03-22","2");
INSERT INTO chatrooms VALUES("4","d","2022-03-22 14:07:46","2022-03-22","2");
INSERT INTO chatrooms VALUES("5","e","2022-03-22 14:07:47","2022-03-22","2");
INSERT INTO chatrooms VALUES("6","f","2022-03-22 14:07:49","2022-03-22","2");
INSERT INTO chatrooms VALUES("11","new","2022-03-23 20:57:33","2022-03-23","4");
INSERT INTO chatrooms VALUES("12","new comment","2022-03-25 16:28:26","2022-03-25","2");
INSERT INTO chatrooms VALUES("13","ssdsd","2022-03-29 14:38:00","2022-03-29","2");
INSERT INTO chatrooms VALUES("14","1","2022-03-29 14:39:29","2022-03-29","2");
INSERT INTO chatrooms VALUES("15","2","2022-03-29 14:39:31","2022-03-29","2");
INSERT INTO chatrooms VALUES("16","3","2022-03-29 14:39:34","2022-03-29","2");
INSERT INTO chatrooms VALUES("17","new","2022-03-29 14:40:37","2022-03-29","2");
INSERT INTO chatrooms VALUES("18","new 1","2022-03-29 14:40:43","2022-03-29","2");
INSERT INTO chatrooms VALUES("19","new 3","2022-03-29 14:40:47","2022-03-29","2");



CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO contact_us VALUES("1","dsdadasdad","asdasd","asdasdaasdadad","2022-03-27 21:00:36");



CREATE TABLE `logo` (
  `logo_id` int(50) NOT NULL AUTO_INCREMENT,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `link` varchar(5000) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`logo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO logo VALUES("1","StalkMarket-2.png","This portal involves an elements of financial risk and may be addictive. Please take your financial decisions responsibly and at your own risk.","https://www.stalkmarket.in","1","2022-03-01 14:01:11");



CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `userid` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

INSERT INTO messages VALUES("28","1","hiLorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa molestiae et, quisquam fugit. Neque maxime similique est adipisci laborum velit.","2022-02-23 22:26:28","");
INSERT INTO messages VALUES("29","1","hiLorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa molestiae et, quisquam fugit. Neque maxime similique est adipisci laborum velit.","2022-02-23 22:26:30","");
INSERT INTO messages VALUES("30","1","sdfsdfLorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa molestiae et, quisquam fugit. Neque maxime similique est adipisci laborum velit.","2022-02-23 22:28:54","");
INSERT INTO messages VALUES("31","1","sdfsdLorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa molestiae et, quisquam fugit. Neque maxime similique est adipisci laborum velit.","2022-02-23 22:29:22","");
INSERT INTO messages VALUES("32","1","sdfLorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa molestiae et, quisquam fugit. Neque maxime similique est adipisci laborum velit.","2022-02-23 22:29:34","");
INSERT INTO messages VALUES("33","1","Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa molestiae et, quisquam fugit. Neque maxime similique est adipisci laborum velit. https://www.google.com","2022-02-23 22:40:00","");
INSERT INTO messages VALUES("34","3","Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa molestiae et, quisquam fugit. Neque maxime similique est adipisci laborum velit.","2022-02-23 22:40:02","");
INSERT INTO messages VALUES("35","1","Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa molestiae et, quisquam fugit. Neque maxime similique est adipisci laborum velit.","2022-02-23 22:40:02","");
INSERT INTO messages VALUES("36","3","Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa molestiae et, quisquam fugit. Neque maxime similique est adipisci laborum velit.","2022-02-23 22:40:02","");



CREATE TABLE `requested_ad` (
  `ra_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ra_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO requested_ad VALUES("1","fddg","dgdfgd","34343434","2022-03-04 00:03:01");



CREATE TABLE `stock_request` (
  `stckid` int(11) NOT NULL AUTO_INCREMENT,
  `stock_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`stckid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO stock_request VALUES("1","abc","2022-03-03 10:40:09");



CREATE TABLE `stocks` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_name` varchar(255) NOT NULL,
  `stock_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` varchar(255) DEFAULT NULL,
  `hex_color` text NOT NULL,
  `position` text NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO stocks VALUES("1","SBI Bank","6.jpg","2022-02-22 17:02:46","","f4f4f4","3");
INSERT INTO stocks VALUES("2","ICICI Bank","2.jpg","2022-02-22 17:02:46","","f4f4f4","1");
INSERT INTO stocks VALUES("3","HDFC Bank","3.jpg","2022-02-22 17:02:46","","f4f4f4","5");
INSERT INTO stocks VALUES("4","Bank of Baroda","4.jpg","2022-02-22 17:02:46","","f4f4f4","2");
INSERT INTO stocks VALUES("5","Bank of India","5.jpg","2022-02-22 17:02:46","","f4f4f4","4");



CREATE TABLE `tbl_comment_post` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_content` longtext CHARACTER SET latin1 DEFAULT NULL,
  `post_datetime` timestamp NULL DEFAULT NULL,
  `page_post` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_comment_post VALUES("1","hello","2022-03-15 22:11:24","2");
INSERT INTO tbl_comment_post VALUES("2","what is php","2022-03-15 22:16:32","2");
INSERT INTO tbl_comment_post VALUES("3","hello","2022-03-15 18:50:02","3");
INSERT INTO tbl_comment_post VALUES("4","sdsdsd","2022-03-15 19:03:55","3");
INSERT INTO tbl_comment_post VALUES("5","new comment
","2022-03-16 14:34:55","4");
INSERT INTO tbl_comment_post VALUES("6","new 11","2022-03-16 19:20:37","0");
INSERT INTO tbl_comment_post VALUES("7","test","2022-03-16 19:20:56","0");
INSERT INTO tbl_comment_post VALUES("8","New New","2022-03-16 19:26:33","3");
INSERT INTO tbl_comment_post VALUES("9","obs studio","2022-03-17 15:38:29","3");
INSERT INTO tbl_comment_post VALUES("10","ner","2022-03-17 15:43:41","3");
INSERT INTO tbl_comment_post VALUES("11","new","2022-03-17 15:44:20","3");
INSERT INTO tbl_comment_post VALUES("12","here","2022-03-17 15:57:19","3");
INSERT INTO tbl_comment_post VALUES("13","good","2022-03-17 15:58:13","3");
INSERT INTO tbl_comment_post VALUES("14",",","2022-03-17 15:58:45","3");
INSERT INTO tbl_comment_post VALUES("15","f","2022-03-17 15:58:56","3");
INSERT INTO tbl_comment_post VALUES("16","nice","2022-03-17 15:59:09","3");
INSERT INTO tbl_comment_post VALUES("17","https://www.reddit.com/r/vscode/comments/rhqoud/bracket_pair_colorizer_2_alternative/","2022-03-17 16:03:01","3");
INSERT INTO tbl_comment_post VALUES("18","PHP","2022-03-17 18:13:35","3");
INSERT INTO tbl_comment_post VALUES("19","hello","2022-03-17 18:14:06","3");
INSERT INTO tbl_comment_post VALUES("20","new","2022-03-17 18:14:30","3");



CREATE TABLE `tbl_reply` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `cr_id` int(11) NOT NULL,
  `replies` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `timestamp` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`reply_id`),
  KEY `reply_tbl` (`cr_id`),
  CONSTRAINT `reply_tbl` FOREIGN KEY (`cr_id`) REFERENCES `chatrooms` (`cr_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_reply VALUES("5","1","aa","2022-03-22 14:09:55");
INSERT INTO tbl_reply VALUES("6","12","new","2022-03-29 14:28:57");
INSERT INTO tbl_reply VALUES("7","12","new 1","2022-03-29 14:29:04");



CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_status` int(11) NOT NULL DEFAULT 0,
  `type` enum('student','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES("127","raj","","admin.forumui@gmail.com","$2y$10$2bRPaf3BUtBuUFgKhk7EYOHuVvFVsxYPKA6eld3md1ZZy5r3JFCYG","917f9b42a963de68ed6db79e8567337b","1","admin","2021-10-19 11:12:56","","1","default.jpg");

