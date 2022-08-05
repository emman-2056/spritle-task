-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2022 at 07:59 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `commenter_id` int(11) NOT NULL,
  `poster_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `commenter_id`, `poster_id`, `comment`, `created`, `modified`) VALUES
(1, 2, 2, 1, 'asdasdsdasd sdfassdasd', '2022-08-25 00:00:00', '2022-08-26 00:00:00'),
(2, 1, 2, 0, 'edrfwerf', '2022-08-04 17:55:13', '2022-08-04 17:55:13'),
(3, 1, 2, 0, 'fdhfdfg', '2022-08-04 17:56:05', '2022-08-04 17:56:05'),
(4, 1, 3, 0, 'dfsdf', '2022-08-04 17:56:16', '2022-08-04 17:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `liker_id` int(11) NOT NULL,
  `poster_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `liker_id`, `poster_id`, `created`, `modified`) VALUES
(7, 1, 2, 1, '2022-08-04 15:16:53', '2022-08-04 15:16:53'),
(9, 2, 3, 1, '2022-08-04 17:24:19', '2022-08-04 17:24:19'),
(11, 2, 2, 1, '2022-08-04 17:56:41', '2022-08-04 17:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `created`, `modified`) VALUES
(1, 1, 'title one', 'sdrfs sdfoihxcnk vjnc vosdv sdifvujnhdsv', '2022-08-04 12:46:37', '2022-08-04 12:46:37'),
(2, 1, 'sacasd', 'cvxcvefdrqwerwefwew wefrwefwerfd', '2022-08-04 12:48:14', '2022-08-04 12:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `created`, `modified`) VALUES
(1, 'emman@gmail.com', 'emman@gmail.com', '$2y$10$XCfigRZmVtTjUyypvEaOIexJQfeBDHVfjdKJEKJP0cUrXtXR6ZzZK', 'Emman', '2022-08-04 12:14:05', '2022-08-04 12:14:05'),
(2, 'raja@gmail.com', 'raja@gmail.com', '$2y$10$99GPGafoldkAGuGtxY92r.695D7cdbjl1CmVpGaC5AXU86JRIvZW2', 'Raja', '2022-08-04 12:16:08', '2022-08-04 12:16:08'),
(3, 'sundar@gmail.com', 'sundar@gmail.com', '$2y$10$cUTkLWqu09CIHljRxtD0QucOKl0aMOpVpLV/IewgTA4q/UBDGXL56', 'Sundar', '2022-08-04 17:22:03', '2022-08-04 17:22:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
