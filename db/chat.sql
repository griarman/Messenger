-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2018 at 04:57 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

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
   CREATE DATABASE chat;
   USE chat;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `senderId` varchar(30) NOT NULL,
  `getterId` varchar(30) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `senderId`, `getterId`, `message`, `date`) VALUES
(1, 'user1', 'user2', '1is sms', '2018-05-24 20:08:18'),
(2, 'user1', 'user2', '2rd sms', '2018-05-24 21:33:10'),
(3, 'user1', 'user2', 'jgfdgdf', '2018-05-25 09:15:41'),
(4, 'user2', 'user3', 'dfgfdg', '2018-05-25 09:20:53'),
(5, 'user3', 'user1', 'sax ashaxtuma ))))))', '2018-05-25 09:21:32'),
(6, 'user1', 'user2', 'wqwwqrwqr', '2018-05-25 10:49:07'),
(7, 'user2', 'user1', 'ghrht', '2018-05-25 10:49:15'),
(8, 'user1', 'user2', 'asease', '2018-05-25 11:18:36'),
(9, 'user2', 'user1', 'dsfsdf', '2018-05-25 11:19:19'),
(10, 'user1', 'user2', 'gtdhgdhgd', '2018-05-25 16:25:53'),
(11, 'user2', 'user1', 'sadsad', '2018-05-25 16:26:20'),
(12, 'user1', 'user2', 'jgk', '2018-05-25 16:28:44'),
(13, 'user1', 'user2', 'sdsf', '2018-05-25 16:30:36'),
(14, 'user1', 'user2', 'fvrfvrfv', '2018-05-28 10:04:58'),
(15, 'user2', 'user1', 'aaaaa', '2018-05-28 10:05:07'),
(16, 'user1', 'user2', 'fgfdg', '2018-05-29 09:10:58'),
(17, 'user2', 'user1', 'sadsad', '2018-05-29 09:11:05'),
(18, 'user3', 'user1', 'bari ereko, sa irakan test e irakan cancov', '2018-05-29 15:42:37'),
(19, 'user1', 'user3', 'u ayn stacvec', '2018-05-29 15:44:09'),
(20, 'user3', 'user1', 'uiiiiiiiiiiiiiiiiiiii', '2018-05-29 15:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `token` varchar(40) NOT NULL,
  `expireDate` bigint(20) NOT NULL,
  `userId` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`token`, `expireDate`, `userId`) VALUES
('146986cfc582673fa0052d5a72a6f18d', 1528213330, 'user3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `login` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  `id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`login`, `password`, `id`) VALUES
('user1', '81dc9bdb52d04dc20036dbd8313ed055', 1),
('user2', '4a7d1ed414474e4033ac29ccb8653d9b', 2),
('user3', 'b59c67bf196a4758191e42f76670ceba', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
