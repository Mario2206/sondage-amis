-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 02 déc. 2020 à 22:18
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
-- Base de données : `sondage-amis`
--
CREATE DATABASE IF NOT EXISTS `sondage-amis` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sondage-amis`;

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

CREATE TABLE `answers` (
  `answer` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `questionId` int(11) NOT NULL,
  `answerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `answers`
--

INSERT INTO `answers` (`answer`, `questionId`, `answerId`) VALUES
('Rouge', 1, 1),
('Vert', 1, 2),
('Bleu ', 1, 3),
('Blanc', 1, 4),
('2', 2, 5),
('3', 2, 6),
('4', 2, 7),
('1', 2, 8),
('Un Montre', 3, 9),
('Un hÃ©ro', 3, 10),
('RÃ©ponse 1', 8, 11),
('RÃ©ponse 2', 8, 12),
('RÃ©ponse 3', 8, 13),
('Une question test', 9, 14),
('Une super question', 9, 15),
('La super question', 9, 16);

-- --------------------------------------------------------

--
-- Structure de la table `friends`
--

CREATE TABLE `friends` (
  `idUser` int(11) NOT NULL,
  `idFriend` int(11) NOT NULL,
  `accepted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `friends`
--

INSERT INTO `friends` (`idUser`, `idFriend`, `accepted`) VALUES
(2, 3, 1),
(3, 2, 1),
(4, 2, 1),
(2, 4, 1),
(5, 2, 1),
(2, 5, 0);

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
(2, 'Sondage test', 'Une petite description ... ', '2020-12-01 22:42:14', '2020-12-01 22:39:00', '2020-12-02 21:25:40', 2),
(2, 'Sondage test date', 'La description du sondage test', '2020-12-02 21:17:37', '2020-12-02 00:00:00', '2020-12-02 22:13:54', 3),
(2, 'Sondage test date', 'La description du sondage test', '2020-12-02 21:18:34', '2020-12-02 00:00:00', '2020-12-20 00:00:00', 4),
(2, 'Sondage test date', 'La description du sondage test', '2020-12-02 21:19:19', '2020-12-02 00:00:00', '2020-12-20 00:00:00', 5),
(2, 'Sondage test date', 'La description du sondage test', '2020-12-02 21:20:07', '2020-12-02 00:00:00', '2020-12-02 22:13:50', 6),
(2, 'Sondage test date', 'La description du sondage test', '2020-12-02 21:22:37', '2020-12-02 00:00:00', '2020-12-02 22:13:48', 7),
(2, 'Le test du soir', 'Ceci est le tet du soir ', '2020-12-02 22:15:30', '2020-12-02 00:00:00', '2020-12-15 00:00:00', 8);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `question` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idQuestion` int(11) NOT NULL,
  `idPoll` int(11) NOT NULL,
  `questionOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`question`, `idQuestion`, `idPoll`, `questionOrder`) VALUES
('Quelle est la couleur d\'un chat ?', 1, 2, 0),
('Combien de pattes Ã  un chat ?', 2, 2, 1),
('Qui est Hulk ?', 3, 2, 2),
('Quelle est la premiÃ¨re question ?', 4, 3, 0),
('Quelle est la premiÃ¨re question ?', 5, 4, 0),
('Quelle est la premiÃ¨re question ?', 6, 5, 0),
('Quelle est la premiÃ¨re question ?', 7, 6, 0),
('Quelle est la premiÃ¨re question ?', 8, 7, 0),
('Quelle est cette question ?', 9, 8, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tchatmessages`
--

CREATE TABLE `tchatmessages` (
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `idUser` int(11) NOT NULL,
  `idPoll` int(11) NOT NULL,
  `idMessage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `tchatmessages`
--

INSERT INTO `tchatmessages` (`message`, `createdAt`, `idUser`, `idPoll`, `idMessage`) VALUES
('dqzdzq', '2020-12-02 18:01:54', 3, 2, 1),
('Test', '2020-12-02 18:14:04', 3, 2, 2),
('Salut bro', '2020-12-02 18:20:39', 4, 2, 3),
('Ã§a va ?', '2020-12-02 18:20:52', 3, 2, 4),
('Salut bro', '2020-12-02 18:21:04', 4, 2, 5),
('Salut bro', '2020-12-02 18:21:04', 4, 2, 6),
('Salut bro', '2020-12-02 18:21:05', 4, 2, 7),
('Salut bro', '2020-12-02 18:21:06', 4, 2, 8),
('Salut bro', '2020-12-02 18:21:06', 4, 2, 9),
('dzqd', '2020-12-02 18:21:46', 3, 2, 10),
('dzqdqzdzq', '2020-12-02 18:21:48', 3, 2, 11),
('dzqdqz', '2020-12-02 18:22:05', 3, 2, 12),
('dzqdqz', '2020-12-02 18:22:06', 3, 2, 13),
('dzqdqzqzdzq', '2020-12-02 18:22:10', 3, 2, 14),
('Salut', '2020-12-02 18:22:16', 3, 2, 15),
('dzqdq', '2020-12-02 18:24:51', 3, 2, 16),
('dzqdqdzqdzq', '2020-12-02 18:24:53', 3, 2, 17),
('qzdz', '2020-12-02 18:28:36', 3, 2, 18),
('dzqd', '2020-12-02 18:28:41', 4, 2, 19),
('dzdzq', '2020-12-02 18:37:49', 2, 2, 20),
('salutpatron', '2020-12-02 18:38:00', 4, 2, 21),
('salut patron', '2020-12-02 18:38:05', 4, 2, 22),
('yo', '2020-12-02 20:02:54', 2, 2, 23),
('Salut !!!', '2020-12-02 20:43:49', 5, 2, 24),
('Hol', '2020-12-02 22:14:11', 5, 4, 25),
('Bonjour Ã  tous', '2020-12-02 22:17:45', 2, 8, 26);

-- --------------------------------------------------------

--
-- Structure de la table `user-answers`
--

CREATE TABLE `user-answers` (
  `idUser` int(11) NOT NULL,
  `idAnswer` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user-answers`
--

INSERT INTO `user-answers` (`idUser`, `idAnswer`, `idQuestion`) VALUES
(3, 1, 1),
(3, 6, 2),
(3, 9, 3),
(4, 2, 1),
(4, 8, 2),
(4, 9, 3),
(5, 3, 1),
(5, 8, 2),
(5, 10, 3),
(5, 16, 9);

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
('MathieuR', 'Raimbault', 'mario@mail.com', '$2y$10$HPPpK.YuNJ9dRgT/4GH53uA6kETzwXuTy.ToNMRJJYwfS1VyX5.4i', 2, 'Mario2206'),
('Mirtille', 'Mandibule', 'derf@mail.com', '$2y$10$Y9sO6iv32FiFZhds0oOSPennQDcXB1pATsNEDCmNZrnop.w.lOxZS', 3, 'Derf2506'),
('Lored', 'Prenom', 'markus@mail.com', '$2y$10$oQHJLb6F.u8UO/yX60kJROzQC9gH8zh4IGho0vUSOYGhqjCViqUdi', 4, 'Markus15'),
('NewUser', 'MyUser', 'toto@mail.com', '$2y$10$HUU.OtwOSqdumoOD55TSheyXxc7VqqIycpZ8N/Gv0H1cOrneBvkeq', 5, 'Toto1510');

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
  ADD PRIMARY KEY (`idMessage`);

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
  MODIFY `answerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `poll`
--
ALTER TABLE `poll`
  MODIFY `idPoll` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `idQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `tchatmessages`
--
ALTER TABLE `tchatmessages`
  MODIFY `idMessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
