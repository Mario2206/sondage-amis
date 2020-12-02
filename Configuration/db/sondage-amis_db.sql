-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2020 at 10:27 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sondage-amis`
--
CREATE DATABASE IF NOT EXISTS `sondage-amis` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sondage-amis`;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nVoter` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `answerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer`, `nVoter`, `questionId`, `answerId`) VALUES
('Rouge', 0, 1, 1),
('Vert', 0, 1, 2),
('Bleu ', 0, 1, 3),
('Blanc', 0, 1, 4),
('2', 0, 2, 5),
('3', 0, 2, 6),
('4', 0, 2, 7),
('1', 0, 2, 8),
('Un Montre', 0, 3, 9),
('Un hÃ©ro', 0, 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `idUser` int(11) NOT NULL,
  `idFriend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`idUser`, `idFriend`) VALUES
(2, 3),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `idUser` int(11) NOT NULL,
  `pollName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `availableAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `unAvailableAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idPoll` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`idUser`, `pollName`, `description`, `createdAt`, `availableAt`, `unAvailableAt`, `idPoll`) VALUES
(2, 'Sondage test', 'Une petite description ... ', '2020-12-01 22:42:14', '2020-12-01 22:39:00', '2020-12-10 22:39:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idQuestion` int(11) NOT NULL,
  `idPoll` int(11) NOT NULL,
  `questionOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question`, `idQuestion`, `idPoll`, `questionOrder`) VALUES
('Quelle est la couleur d\'un chat ?', 1, 2, 0),
('Combien de pattes Ã  un chat ?', 2, 2, 1),
('Qui est Hulk ?', 3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tchatmessages`
--

CREATE TABLE `tchatmessages` (
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `idUser` int(11) NOT NULL,
  `idPoll` int(11) NOT NULL,
  `idTchat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `firstName` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `idUser` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstName`, `lastName`, `email`, `password`, `idUser`, `username`) VALUES
('Mathieu', 'Raimbault', 'mario@mail.com', '$2y$10$GHy2ydTJ1HvlfcfW.ynes.p7R5uayOSpvKyUlDHbOBVOTTDGnZ3m.', 2, 'Mario2206'),
('Mirtille', 'Mandibule', 'derf@mail.com', '$2y$10$Y9sO6iv32FiFZhds0oOSPennQDcXB1pATsNEDCmNZrnop.w.lOxZS', 3, 'Derf2506');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answerId`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`idPoll`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`idQuestion`);

--
-- Indexes for table `tchatmessages`
--
ALTER TABLE `tchatmessages`
  ADD PRIMARY KEY (`idUser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `idPoll` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `idQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tchatmessages`
--
ALTER TABLE `tchatmessages`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
