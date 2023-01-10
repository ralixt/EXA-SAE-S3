-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db_letscode:3306
-- Généré le : lun. 09 jan. 2023 à 12:52
-- Version du serveur : 10.10.2-MariaDB-1:10.10.2+maria~ubu2204
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `letscode`
--

DELIMITER $$
--
-- Fonctions
--
CREATE DEFINER=`root`@`%` FUNCTION `listeImage` (`projetID` INT) RETURNS TEXT CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
DECLARE fini INTEGER DEFAULT 0;
DECLARE liste LONGTEXT;
DECLARE nomImage VARCHAR(2000);
DECLARE monCurseur CURSOR FOR


SELECT nameImage FROM url_images JOIN projet ON projet.id = url_images.projet_id where projet.id = projetID ORDER BY projet.id;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET fini = 1;

SET liste = "";

OPEN monCurseur;
maBoucle: LOOP
FETCH monCurseur INTO nomImage;
IF fini = 1 THEN
LEAVE maBoucle;
END IF;
SET liste = CONCAT(liste, nomImage, " ");
END LOOP maBoucle;
CLOSE monCurseur;

RETURN liste;
END$$

CREATE DEFINER=`root`@`%` FUNCTION `listeTag` (`idProjet` INT) RETURNS TEXT CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
DECLARE fini INTEGER DEFAULT 0;
DECLARE liste LONGTEXT;
DECLARE titleTag VARCHAR(2000);
DECLARE idTag VARCHAR(2000);
DECLARE monCurseur CURSOR FOR

 


SELECT tag.id, tag.title FROM tag JOIN projet_tag ON projet_tag.id_tag = tag.id where projet_tag.id_projet = idProjet ORDER BY projet_tag.id_projet;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET fini = 1;

 

SET liste = "";

 

OPEN monCurseur;
maBoucle: LOOP
FETCH monCurseur INTO idTag, titleTag;
IF fini = 1 THEN
LEAVE maBoucle;
END IF;
SET liste = CONCAT(liste, ",", idTag, ":", titleTag);
END LOOP maBoucle;
CLOSE monCurseur;

 

RETURN liste;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `content` longtext NOT NULL,
  `rating` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `projet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `createdAt`, `content`, `rating`, `author`, `projet`) VALUES
(7, '2023-01-06 16:25:13', 'C\'etait null', 0, 19, 6),
(8, '2023-01-06 16:25:35', 'J\'ai bien aimé le projet ;)', 5, 19, 6);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `mail` text NOT NULL,
  `message` text NOT NULL,
  `statut` enum('non-traite','traite') NOT NULL DEFAULT 'non-traite'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `likecomment`
--

CREATE TABLE `likecomment` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `likeproject`
--

CREATE TABLE `likeproject` (
  `user` int(11) NOT NULL,
  `project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `titre` varchar(256) NOT NULL,
  `content` longtext NOT NULL,
  `author` int(11) NOT NULL,
  `status` enum('Published','Reviewing','Refused') NOT NULL,
  `difficulte` enum('Debutant','Intermediaire','Avance') NOT NULL,
  `isPremium` tinyint(1) NOT NULL,
  `URL_Zip` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id`, `createdAt`, `titre`, `content`, `author`, `status`, `difficulte`, `isPremium`, `URL_Zip`) VALUES
(6, '2023-01-06 16:24:38', 'Site Web pour une librairie solidaire', '# 1- Introduction\r\nLe site web est un site web pour une librairie solidaire qui s\'appelle \"La librairie solidaire\", ce site devra etre fait en HTML, CSS et Javascript.\r\n\r\n# 2- Structure du site\r\nLa librairie solidaire se compose de plusieurs pages :\r\n- Accueil\r\n- Livres\r\n- Mon compte\r\n- Mes reservations\r\n- Nos librairies\r\n\r\n# La suite est dans les ressources', 19, 'Reviewing', 'Debutant', 0, 'DSTP.zip'),
(7, '2023-01-06 16:39:07', 'Application for Salaries management', 'This is an Java application for manage salaries of employee.\r\n\r\n', 19, 'Reviewing', 'Debutant', 0, 'DSTP.zip');

-- --------------------------------------------------------

--
-- Structure de la table `projet_tag`
--

CREATE TABLE `projet_tag` (
  `id_projet` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `projet_tag`
--

INSERT INTO `projet_tag` (`id_projet`, `id_tag`) VALUES
(6, 7),
(6, 29),
(6, 36),
(6, 37),
(7, 6),
(7, 30),
(7, 33);

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`id`, `title`) VALUES
(1, 'C++'),
(2, 'PHP'),
(3, 'Python'),
(4, 'C'),
(5, 'C#'),
(6, 'Java'),
(7, 'Javascript'),
(8, 'debutant'),
(9, 'intermediaire'),
(10, 'avance'),
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
-- Structure de la table `url_images`
--

CREATE TABLE `url_images` (
  `id` int(11) NOT NULL,
  `projet_id` int(11) NOT NULL,
  `nameImage` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `url_images`
--

INSERT INTO `url_images` (`id`, `projet_id`, `nameImage`) VALUES
(3, 6, 'book-wall-g6767de7e4_1920.jpg'),
(4, 6, 'raspberry-g9a583f36f_1920.jpg'),
(5, 7, 'programming-gfc281a4ea_1920.png');

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
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `subscriptionId` text NOT NULL,
  `hasActiveSubscription` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `user`
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
(15, 'Pr3ms', 'prems@first.hj', 'sdimds', 'Premium_User', '2022-10-24 00:00:00', 'fgdhgf051', 1),
(16, 'Batos1er', 'batos.benoist@gmail.com', 'b3e8b25399a4908e8347382e65a1ecd0', 'User', '2022-11-08 09:20:31', 'null', 0),
(17, 'Batos1er', 'batos.benoist@gmail.com', 'b3e8b25399a4908e8347382e65a1ecd0', 'User', '2022-11-08 09:20:47', 'null', 0),
(18, 'Batos1er', 'bap.menet@gmail.com', 'b42324fe7d0b5d42325ed37788c466d5eba20aa9ab49a366d669e45b522ad5f4', 'User', '2022-11-08 10:00:53', 'null', 0),
(19, 'TalkBog', 'matteo.robin12@gmail.com', '739681ae714128fa519fdb0b5b8b1de1c0663e42ff1f4488114ebc997e3c9eec', 'User', '2023-01-06 16:05:28', '0', 0);

--
-- Index pour les tables déchargées
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
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `likecomment`
--
ALTER TABLE `likecomment`
  ADD PRIMARY KEY (`id_comment`,`id_user`),
  ADD KEY `id_user` (`id_user`);

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
ALTER TABLE `projet` ADD FULLTEXT KEY `titre` (`titre`,`content`);

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
-- Index pour la table `url_images`
--
ALTER TABLE `url_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Id_Projet` (`projet_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `url_images`
--
ALTER TABLE `url_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
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
  ADD CONSTRAINT `likecomment_ibfk_1` FOREIGN KEY (`id_comment`) REFERENCES `comment` (`id`),
  ADD CONSTRAINT `likecomment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

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

--
-- Contraintes pour la table `url_images`
--
ALTER TABLE `url_images`
  ADD CONSTRAINT `FK_Id_Projet` FOREIGN KEY (`projet_id`) REFERENCES `projet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
