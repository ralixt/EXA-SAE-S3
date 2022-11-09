-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 28 Octobre 2022 à 07:52
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `let's code`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` longtext NOT NULL,
  `rating` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `projet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `createdAt`, `content`, `rating`, `author`, `projet`) VALUES
(1, '2022-10-28 09:44:10', 'Je sais enfin faire une table en sql Merci!!!!!!!', 5, 11, 1);

-- --------------------------------------------------------

--
-- Structure de la table `likecomment`
--

CREATE TABLE `likecomment` (
  `user` int(11) NOT NULL,
  `comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `likecomment`
--

INSERT INTO `likecomment` (`user`, `comment`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `likeproject`
--

CREATE TABLE `likeproject` (
  `user` int(11) NOT NULL,
  `project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `titre` mediumtext NOT NULL,
  `content` longtext NOT NULL,
  `author` int(11) NOT NULL,
  `status` enum('Published','Reviewing','Refused') NOT NULL,
  `coverUrl` text NOT NULL,
  `isPremium` tinyint(1) NOT NULL,
  `URL_Image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id`, `createdAt`, `titre`, `content`, `author`, `status`, `coverUrl`, `isPremium`, `URL_Image`) VALUES
(1, '2022-10-28 09:15:30', 'sql table', 'il suffit de faire create table', 14, 'Reviewing', 'text.com/sql', 1, 'truc.png');

-- --------------------------------------------------------

--
-- Structure de la table `projet_tag`
--

CREATE TABLE `projet_tag` (
  `id_projet` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `projet_tag`
--

INSERT INTO `projet_tag` (`id_projet`, `id_tag`) VALUES
(1, 8),
(1, 38);

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tag`
--

INSERT INTO `tag` (`id`, `title`) VALUES
(1, 'C++'),
(2, 'PHP'),
(3, 'Python'),
(4, 'C'),
(5, 'C#'),
(6, 'Java'),
(7, 'Javascript'),
(8, 'facile'),
(9, 'moyen'),
(10, 'difficile'),
(29, 'Français'),
(30, 'English'),
(31, 'Espanol'),
(32, 'Deutsch'),
(33, 'Windows'),
(34, 'Linux'),
(35, 'Mac'),
(36, 'HTML'),
(37, 'CSS'),
(38, 'SQL');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Pseudo` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `role` enum('User','Premium_User','Admin') NOT NULL,
  `createdAt` datetime NOT NULL,
  `subscriptionId` text NOT NULL,
  `hasActiveSubscription` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `Pseudo`, `email`, `password`, `role`, `createdAt`, `subscriptionId`, `hasActiveSubscription`) VALUES
(1, 'Rag', 'rag@letscode.com', 'Rg/dsh0.M', 'Admin', '2022-10-24 14:12:18', 'az4210', 1),
(2, 'Moha', 'moha@code.fr', 'M0hA/Kn.', 'Admin', '2022-10-24 14:12:18', 'fds01', 1),
(3, 'Matt', 'matheho@gcode.io', 'JBds042z/dz0', 'Admin', '2022-10-24 14:15:18', 'sdd4120', 1),
(4, 'Bapt', 'bapt1st@yahoo.cr', 'HUIHfd00', 'Admin', '2022-10-24 14:15:18', 'sdf120', 1),
(11, 'JeanGAm1r', 'jean@proton.me', 'zefdsz07', 'User', '2022-10-24 00:00:00', 'dssfddsd5', 0),
(12, 'Dan1ellou123', 'daniellou@bing.ch', 'Hbds0/0', 'User', '2022-10-24 00:00:00', 'fsfsd25', 0),
(13, 'Marce1', 'marcel@family.com', 'M@rcel', 'User', '2022-10-24 00:00:00', 'fee-42', 0),
(14, 'BigFan', 'bigfan@fan.com', 'F@nOp', 'Premium_User', '2022-10-24 00:00:00', 'dzsdfsd25', 1),
(15, 'Pr3ms', 'prems@first.hj', 'sdimds', 'Premium_User', '2022-10-24 00:00:00', 'fgdhgf051', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`),
  ADD KEY `rating` (`rating`),
  ADD KEY `projet` (`projet`);

--
-- Index pour la table `likecomment`
--
ALTER TABLE `likecomment`
  ADD PRIMARY KEY (`user`,`comment`),
  ADD UNIQUE KEY `user_2` (`user`),
  ADD KEY `user` (`user`),
  ADD KEY `comment` (`comment`);

--
-- Index pour la table `likeproject`
--
ALTER TABLE `likeproject`
  ADD PRIMARY KEY (`user`,`project`),
  ADD KEY `project` (`project`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Index pour la table `projet_tag`
--
ALTER TABLE `projet_tag`
  ADD PRIMARY KEY (`id_projet`,`id_tag`),
  ADD KEY `id_tag` (`id_tag`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `auteurComment` FOREIGN KEY (`author`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`projet`) REFERENCES `projet` (`id`);

--
-- Contraintes pour la table `likecomment`
--
ALTER TABLE `likecomment`
  ADD CONSTRAINT `likecomment_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `likecomment_ibfk_2` FOREIGN KEY (`comment`) REFERENCES `comment` (`id`);

--
-- Contraintes pour la table `likeproject`
--
ALTER TABLE `likeproject`
  ADD CONSTRAINT `likeproject_ibfk_1` FOREIGN KEY (`project`) REFERENCES `projet` (`id`),
  ADD CONSTRAINT `likeproject_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `projet_tag`
--
ALTER TABLE `projet_tag`
  ADD CONSTRAINT `projet_tag_ibfk_1` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`),
  ADD CONSTRAINT `projet_tag_ibfk_2` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
