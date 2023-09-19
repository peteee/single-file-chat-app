-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 19, 2023 at 09:17 PM
-- Server version: 10.3.38-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `zjhu5_messages`
--

CREATE TABLE `zjhu5_messages` (
  `id` int(11) NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uid` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `zjhu5_messages`
--

INSERT INTO `zjhu5_messages` (`id`, `message`, `uid`, `uname`) VALUES
(1, 'Hi there, this is Peter', 1, 'peter'),
(2, 'Hi from Mary', 2, 'mary'),
(3, 'Do you like the weather? 🤗', 2, 'mary'),
(4, 'asdaf', 2, 'mary'),
(5, 'asdaf', 2, 'mary'),
(6, 'Howdy!', 1, 'peter'),
(7, 'Chicken Noodle Soup', 1, 'peter'),
(8, 'Guten Tag :)', 1, 'peter'),
(9, 'Gute Nacht!', 1, 'peter'),
(10, 'Do you like the weather? 🤗', 1, 'peter'),
(11, 'good day today!', 2, 'mary'),
(12, 'Good morning', 1, 'peter'),
(13, 'Booh', 1, 'peter'),
(14, 'Hi from Mary', 1, 'peter'),
(15, 'hi', 1, 'peter'),
(16, 'hola', 1, 'peter'),
(17, 'Guten Tag', 1, 'peter'),
(18, 'bladiblub', 1, 'peter'),
(19, 'Hi there, this is Peter', 1, 'peter'),
(20, 'Hi from Mary', 2, 'mary'),
(21, 'Hi there Howdy', 2, 'mary'),
(22, 'lkjsdfkjsldkflkjsdfjkl', 1, 'peter'),
(23, 'Haha, looks nice now!', 1, 'peter'),
(24, 'Yep!', 2, 'mary'),
(25, 'test', 2, 'mary'),
(26, 'Coucou', 1, 'peter'),
(27, 'HAHA', 1, 'peter'),
(28, 'YAY Breakfast!', 1, 'peter'),
(29, 'Do you like the weather? 🤗', 1, 'peter'),
(30, 'it\'s cloudy', 1, 'peter'),
(31, '', 1, 'peter'),
(32, '¯\\_(ツ)_/¯', 1, 'peter'),
(33, 'hi', 1, 'peter'),
(34, 'test', 1, 'peter'),
(35, '', 1, 'peter');

-- --------------------------------------------------------

--
-- Table structure for table `zjhu5_users`
--

CREATE TABLE `zjhu5_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `zjhu5_users`
--

INSERT INTO `zjhu5_users` (`id`, `username`, `password`) VALUES
(1, 'peter', '$2y$10$h6j8JzCBTtQgIQ74ILKGX.hFTo7NEzZ1F1AcJDjNmytfx4b0qvlMa'),
(2, 'mary', '$2y$10$yuoDbzJ.UUCtMmnivY8JB.XNwh5r7QzpuY64D1EQgAkmqqEgkpTAe'),
(3, 'paul', '$2y$10$YCta0fHBLm0a.WDRSh1kAOLB3AgeolfH0nOOrip029aVf6REzN.qS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `zjhu5_messages`
--
ALTER TABLE `zjhu5_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zjhu5_users`
--
ALTER TABLE `zjhu5_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `zjhu5_messages`
--
ALTER TABLE `zjhu5_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `zjhu5_users`
--
ALTER TABLE `zjhu5_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
