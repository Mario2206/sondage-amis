-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 29 nov. 2020 à 23:00
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sondage_amis`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

CREATE TABLE `answers` (
  `answer` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nVoter` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `answerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `answers`
--

INSERT INTO `answers` (`answer`, `nVoter`, `questionId`, `answerId`) VALUES
('17', 0, 1, 1),
('18', 0, 1, 2),
('19', 0, 1, 3),
('Chien', 0, 2, 4),
('Chat', 0, 2, 5),
('Hiboux', 0, 2, 6),
('Steack / Frite', 0, 3, 7),
('Haricots Verts', 0, 3, 8),
('La Raclette ', 0, 3, 9),
('2', 0, 4, 10),
('3', 0, 4, 11),
('6', 0, 4, 12),
('5', 0, 4, 13),
('qzdzqd', 0, 5, 14),
('dzqdq', 0, 6, 15);

-- --------------------------------------------------------

--
-- Structure de la table `friends`
--

CREATE TABLE `friends` (
  `idUser` int(11) NOT NULL,
  `idFriend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `poll`
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
-- Déchargement des données de la table `poll`
--

INSERT INTO `poll` (`idUser`, `pollName`, `description`, `createdAt`, `availableAt`, `unAvailableAt`, `idPoll`) VALUES
(2, 'Mon sondage test', 'Ceci est un sondage test merci d\'y rÃ©pondre avec soin !!', '2020-11-29 17:11:49', '2020-11-29 21:59:37', '2020-11-29 23:13:23', 2),
(2, 'Second test de sondage trÃ¨s court', 'Voici un second sondage test !', '2020-11-29 17:11:53', '2020-11-29 23:12:07', '2020-11-29 23:13:23', 3),
(2, 'Sondage date', '', '2020-11-29 22:11:24', '2020-11-29 23:45:00', '2020-11-30 23:45:00', 4),
(2, 'Second test', 'dzqdqzd', '2020-11-29 22:11:18', '2020-11-29 23:11:00', '2020-11-30 23:11:00', 5);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `question` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idQuestion` int(11) NOT NULL,
  `idPoll` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`question`, `idQuestion`, `idPoll`) VALUES
('Quel est mon Ã¢ge ?', 1, 2),
('Quel est mon animal prÃ©fÃ©rÃ© ?', 2, 2),
('Quel est ton plat le plus dÃ©testÃ© ?', 3, 2),
('Combien de doigts un Ãªtre humain possÃ¨de ?', 4, 3),
('dqzdqz', 5, 4),
('dzqdqzd', 6, 5);

-- --------------------------------------------------------

--
-- Structure de la table `tchatmessages`
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
-- Structure de la table `users`
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
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`firstName`, `lastName`, `email`, `password`, `idUser`, `username`) VALUES
('Mathieu', 'Raimbault', 'mario@mail.com', '$2y$10$GHy2ydTJ1HvlfcfW.ynes.p7R5uayOSpvKyUlDHbOBVOTTDGnZ3m.', 2, 'Mario2206');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answerId`);

--
-- Index pour la table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`idPoll`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`idQuestion`);

--
-- Index pour la table `tchatmessages`
--
ALTER TABLE `tchatmessages`
  ADD PRIMARY KEY (`idUser`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `answers`
--
ALTER TABLE `answers`
  MODIFY `answerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `poll`
--
ALTER TABLE `poll`
  MODIFY `idPoll` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `idQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tchatmessages`
--
ALTER TABLE `tchatmessages`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
