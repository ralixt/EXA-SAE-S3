-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db_letscode:3306
-- Généré le : mer. 18 jan. 2023 à 12:03
-- Version du serveur : 10.9.3-MariaDB-1:10.9.3+maria~ubu2204
-- Version de PHP : 8.0.24

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
CREATE DEFINER=`root`@`%` FUNCTION `listeImage` (`projetID` INT) RETURNS TEXT CHARSET utf8mb4  BEGIN
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

CREATE DEFINER=`root`@`%` FUNCTION `listeTag` (`idProjet` INT) RETURNS TEXT CHARSET utf8mb4  BEGIN
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `createdAt`, `content`, `rating`, `author`, `projet`) VALUES
(7, '2023-01-06 16:25:13', 'C\'etait null', 0, 19, 6),
(8, '2023-01-06 16:25:35', 'J\'ai bien aimé le projet ;)', 5, 19, 6),
(9, '2023-01-18 10:28:34', 'en effet je suis un petit curieux', 5, 20, 27);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `likecomment`
--

CREATE TABLE `likecomment` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `likeproject`
--

CREATE TABLE `likeproject` (
  `user` int(11) NOT NULL,
  `project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `likeproject`
--

INSERT INTO `likeproject` (`user`, `project`) VALUES
(20, 6),
(21, 6);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id`, `createdAt`, `titre`, `content`, `author`, `status`, `difficulte`, `isPremium`, `URL_Zip`) VALUES
(6, '2023-01-06 16:24:38', 'Site Web pour une librairie solidaire', '# 1- Introduction\r\nLe site web est un site web pour une librairie solidaire qui s\'appelle \"La librairie solidaire\", ce site devra etre fait en HTML, CSS et Javascript.\r\n\r\n# 2- Structure du site\r\nLa librairie solidaire se compose de plusieurs pages :\r\n- Accueil\r\n- Livres\r\n- Mon compte\r\n- Mes reservations\r\n- Nos librairies\r\n\r\n# La suite est dans les ressources', 19, 'Published', 'Intermediaire', 0, 'DSTP.zip'),
(7, '2023-01-06 16:39:07', 'Application for Salaries management', 'This is an Java application for manage salaries of employee.\r\n\r\n', 19, 'Published', 'Debutant', 0, 'DSTP.zip'),
(8, '2023-01-18 09:08:28', 'projet enfer des pointeurs', '# sujet d\'exercice sur les pointeurs\r\n \r\n- Implémentez une fonction en C qui prend en entrée un tableau d\'entiers et sa taille, et utilise un pointeur pour trier le tableau dans l\'ordre croissant.\r\n\r\n- Écrivez un programme qui déclare un pointeur vers un entier, puis alloue de la mémoire pour cet entier à l\'aide de la fonction malloc(). Utilisez ce pointeur pour affecter une valeur à cet entier, puis libérez la mémoire allouée.\r\n\r\n- Implémentez une fonction en C qui prend en entrée un pointeur vers un nœud d\'une liste chainée, et utilise un pointeur de pointeur pour supprimer ce nœud de la liste.\r\n\r\n- Écrivez un programme qui déclare un pointeur vers une structure contenant deux champs : un entier et un pointeur vers un autre de la même structure. Allouez de la mémoire pour cette structure, utilisez les pointeurs pour créer une liste chainée de ces structures, puis libérez la mémoire allouée.\r\n\r\n- Implémentez une fonction en C qui prend en entrée un tableau d\'entiers et sa taille, et utilise un pointeur pour inverser l\'ordre des éléments dans le tableau.\r\n\r\n\r\n## j\'espère que l\'exercice vous a plu, il vous a été proposé par Chatgpt', 21, 'Published', 'Avance', 0, ''),
(9, '2023-01-18 09:19:44', 'Les différentes manières de faire une boucle', '## Voici les différentes manières de faire une boucle en C# :\r\n\r\nBoucle \"for\" : utilisée pour itérer un certain nombre de fois. Exemple :\r\n`\r\nfor (int i = 0; i < 10; i++) {\r\n  Console.WriteLine(i);\r\n}\r\n`\r\nBoucle \"foreach\" : utilisée pour itérer à travers les éléments d\'une collection. Exemple :\r\n\r\n`\r\nint[] numbers = {1, 2, 3, 4, 5};\r\nforeach (int number in numbers) {\r\n  Console.WriteLine(number);\r\n}\r\n`\r\n\r\nBoucle \"while\" : utilisée pour itérer tant qu\'une condition est vraie. Exemple :\r\n\r\n`\r\nint i = 0;\r\nwhile (i < 10) {\r\n  Console.WriteLine(i);\r\n  i++;\r\n}\r\n`\r\n\r\nBoucle \"do-while\" : similaire à la boucle \"while\", mais la condition est vérifiée après l\'exécution de la boucle. Exemple :\r\n\r\n`\r\nint i = 0;\r\ndo {\r\n  Console.WriteLine(i);\r\n  i++;\r\n} while (i < 10);\r\n`\r\n\r\n## Voici les différentes manières de faire une boucle en java:\r\n\r\nBoucle \"for\" : utilisée pour itérer un certain nombre de fois. Exemple :\r\n\r\n`\r\nfor (int i = 0; i < 10; i++) {\r\n  System.out.println(i);\r\n}\r\n`\r\n\r\nBoucle \"for-each\" : utilisée pour itérer à travers les éléments d\'une collection. Exemple :\r\n\r\n`\r\nint[] numbers = {1, 2, 3, 4, 5};\r\nfor (int number : numbers) {\r\n  System.out.println(number);\r\n}\r\n`\r\n\r\nBoucle \"while\" : utilisée pour itérer tant qu\'une condition est vraie. Exemple :\r\n\r\n`\r\nint i = 0;\r\nwhile (i < 10) {\r\n  System.out.println(i);\r\n  i++;\r\n}\r\n`\r\n\r\nBoucle \"do-while\" : similaire à la boucle \"while\", mais la condition est vérifiée après l\'exécution de la boucle. Exemple :\r\n\r\n`\r\nint i = 0;\r\ndo {\r\n  System.out.println(i);\r\n  i++;\r\n} while (i < 10);\r\n`\r\n\r\n## Il y a un certain nombre de différences entre les syntaxes utilisées pour ces différentes boucles dans ces deux langages, mais leur fonctionnement est généralement similaire.', 21, 'Reviewing', 'Debutant', 0, ''),
(27, '2023-01-18 10:15:46', 'Bingo', '# Félicitation !!!!!\r\n## vous avez trouvé le projet secret contenant tous les tags possible\r\n\r\nvous êtes un petit curieux', 20, 'Published', 'Debutant', 1, ''),
(29, '2023-01-18 10:37:13', 'Javascript exo moyen', '# Voici un exercice de niveau intermédiaire en JavaScript :\r\n## Cet exercice est un bon moyen de pratiquer les tableaux, les objets, les fonctions, les boucles et les conditions en JavaScript. Il permet de mettre en oeuvre plusieurs concepts importants de la programmation orientée objet.\r\n\r\n- Créez un tableau d\'objets employees avec les propriétés suivantes pour chaque employé : name, age, salary.\r\n\r\n- Ecrire une fonction calculateTotalSalary() qui prend en entrée le tableau d\'employés et qui retourne la somme des salaires de tous les employés.\r\n\r\n- Ecrire une fonction findEmployeeByName() qui prend en entrée le tableau d\'employés et un nom d\'employé, et qui retourne l\'objet employé correspondant à ce nom. Si aucun employé n\'a ce nom, la fonction doit retourner null.\r\n\r\n- Ecrire une fonction incrementAgeByOne() qui prend en entrée le tableau d\'employés et qui incrémente l\'âge de chaque employé de 1.\r\n\r\n- Utilisez les fonctions précédemment définies pour effectuer les opérations suivantes :\r\n\r\n- Affichez la somme des salaires de tous les employés.\r\n- Recherchez l\'employé dont le nom est \"John Doe\" et affichez son objet.\r\n- Incrémentez l\'âge de tous les employés de 1 et affichez le tableau mis à jour.\r\n- Exemple :\r\n\r\n`\r\nconst employees = [\r\n  { name: \"John Doe\", age: 30, salary: 5000 },\r\n  { name: \"Jane Smith\", age: 35, salary: 6000 },\r\n  { name: \"Bob Johnson\", age: 40, salary: 6500 }\r\n];\r\n\r\nfunction calculateTotalSalary(employees) {\r\n  let total = 0;\r\n  for (const employee of employees) {\r\n    total += employee.salary;\r\n  }\r\n  return total;\r\n}\r\n\r\nfunction findEmployeeByName(employees, name) {\r\n  for (const employee of employees) {\r\n    if (employee.name === name) {\r\n      return employee;\r\n    }\r\n  }\r\n  return null;\r\n}\r\n\r\nfunction incrementAgeByOne(employees) {\r\n  for (const employee of employees) {\r\n    employee.age++;\r\n  }\r\n}\r\n\r\nconsole.log(\"Total Salary: \" + calculateTotalSalary(employees));\r\nconst employee = findEmployeeByName(employees, \"John Doe\");\r\nconsole.log(employee);\r\nincrementAgeByOne(employees);\r\nconsole.log(\"Employees: \" + JSON.stringify(employees));\r\n`\r\nMerci d\'avoir suivi cet exercice il fut proposé par Chatgpt\r\n', 18, 'Published', 'Intermediaire', 0, ''),
(30, '2023-01-18 11:38:26', 'mini juegos', '## Este juego genera un número aleatorio entre 1 y 100 (inclusive) y el usuario tiene que adivinarlo. El programa le indica al usuario si el número que ingresó es mayor o menor al número secreto, hasta que adivina correctamente.\r\n\r\n\r\n``\r\nimport java.util.Random;\r\nimport java.util.Scanner;\r\n\r\npublic class AdivinaElNumero {\r\n    public static void main(String[] args) {\r\n        Random rand = new Random();\r\n        int numeroSecreto = rand.nextInt(100) + 1;\r\n        Scanner scanner = new Scanner(System.in);\r\n\r\n        int intentos = 0;\r\n        while (true) {\r\n            System.out.println(\"Adivina el número secreto (entre 1 y 100): \");\r\n            int numero = scanner.nextInt();\r\n            intentos++;\r\n\r\n            if (numero == numeroSecreto) {\r\n                System.out.println(\"¡Felicidades, adivinaste el número en \" + intentos + \" intentos!\");\r\n                break;\r\n            } else if (numero < numeroSecreto) {\r\n                System.out.println(\"El número secreto es mayor\");\r\n            } else {\r\n                System.out.println(\"El número secreto es menor\");\r\n            }\r\n        }\r\n    }\r\n}\r\n``', 18, 'Published', 'Debutant', 0, ''),
(33, '2023-01-18 11:49:51', 'SQL', '# Eine Möglichkeit, eine Datenbank zu erstellen, besteht darin, die Structured Query Language (SQL) zu verwenden. Folgendes Beispiel zeigt, wie man eine einfache Datenbank mit einer Tabelle namens \"Kunden\" erstellt:\r\n\r\n- Verbinden Sie sich mit einem SQL-Server, z.B. über ein SQL-Managementtool wie phpMyAdmin oder Microsoft SQL Server Management Studio.\r\n\r\n- Führen Sie den folgenden Befehl aus, um eine neue Datenbank mit dem Namen \"meineDB\" zu erstellen:\r\n\r\n\r\n`CREATE DATABASE meineDB;`\r\n\r\n\r\n- Verwenden Sie die neu erstellte Datenbank, indem Sie den Befehl:\r\n\r\n`USE meineDB;`\r\n\r\n- Erstellen Sie eine Tabelle namens \"Kunden\" mit Spalten für ID, Name, Adresse und Telefonnummer:\r\n\r\n`CREATE TABLE Kunden (\r\n  ID int PRIMARY KEY,\r\n  Name varchar(255),\r\n  Adresse varchar(255),\r\n  Telefonnummer varchar(255)\r\n);`\r\n\r\n- Fügen Sie einige Beispieldaten hinzu:\r\n\r\n`INSERT INTO Kunden (ID, Name, Adresse, Telefonnummer)\r\nVALUES (1, \'Max Mustermann\', \'Musterstraße 1\', \'1234567890\');`\r\n\r\n- Überprüfen Sie Ihre Datenbank, indem Sie die Tabelle \"Kunden\" abfragen:\r\n\r\n`SELECT * FROM Kunden;`\r\n\r\n## Hinweis: dies ist eine einfache Beispiel, die Ihnen zeigt, wie Sie eine Datenbank erstellen und eine Tabelle anlegen können. In der Praxis werden Sie normalerweise weitere Spalten und Beziehungen zwischen Tabellen hinzufügen und fortgeschrittene Funktionen wie Indizes und Fremdschlüssel verwenden.', 18, 'Published', 'Debutant', 0, ''),
(34, '2023-01-18 11:57:07', 'test', 'test 1\r\n\r\n# test 2', 21, 'Reviewing', 'Intermediaire', 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `projet_tag`
--

CREATE TABLE `projet_tag` (
  `id_projet` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(7, 33),
(8, 4),
(8, 29),
(8, 33),
(8, 34),
(9, 5),
(9, 6),
(9, 29),
(9, 33),
(9, 34),
(27, 1),
(27, 2),
(27, 3),
(27, 4),
(27, 5),
(27, 6),
(27, 7),
(27, 29),
(27, 30),
(27, 31),
(27, 32),
(27, 33),
(27, 34),
(27, 35),
(27, 36),
(27, 37),
(27, 38),
(27, 39),
(27, 40),
(29, 7),
(29, 9),
(29, 29),
(29, 33),
(29, 34),
(30, 6),
(30, 31),
(30, 33),
(30, 34),
(33, 32),
(33, 33),
(33, 34),
(33, 38),
(34, 6),
(34, 31),
(34, 32),
(34, 33),
(34, 34),
(34, 36);

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(38, 'SQL'),
(39, 'Android'),
(40, 'IOS');

-- --------------------------------------------------------

--
-- Structure de la table `url_images`
--

CREATE TABLE `url_images` (
  `id` int(11) NOT NULL,
  `projet_id` int(11) NOT NULL,
  `nameImage` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `url_images`
--

INSERT INTO `url_images` (`id`, `projet_id`, `nameImage`) VALUES
(3, 6, 'book-wall-g6767de7e4_1920.jpg'),
(4, 6, 'raspberry-g9a583f36f_1920.jpg'),
(5, 7, 'programming-gfc281a4ea_1920.png'),
(6, 8, 'pointeur.png'),
(7, 8, 'pointeur1-2-2.png'),
(8, 9, 'Les-boucles-2.jpeg'),
(9, 9, 'Programmation-en-Java-Les-boucles.jpg'),
(21, 27, 'bingo.jfif'),
(22, 29, 'JS.png'),
(23, 30, 'miniJuegos.png'),
(27, 33, 'SQL-Coding.jpeg'),
(28, 34, 'pointeur.png'),
(29, 34, 'pointeur1-2-2.png'),
(30, 34, 'Programmation-en-Java-Les-boucles.jpg'),
(31, 34, 'SQL-Coding.jpeg');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `Pseudo`, `email`, `password`, `role`, `createdAt`, `subscriptionId`, `hasActiveSubscription`) VALUES
(18, 'Batos1er', 'bap.menet@gmail.com', 'b42324fe7d0b5d42325ed37788c466d5eba20aa9ab49a366d669e45b522ad5f4', 'Admin', '2022-11-08 10:00:53', 'null', 0),
(19, 'TalkBog', 'matteo.robin12@gmail.com', '739681ae714128fa519fdb0b5b8b1de1c0663e42ff1f4488114ebc997e3c9eec', 'User', '2023-01-06 16:05:28', '0', 0),
(20, 'a', 'a@a.com', 'f3029a66c61b61b41b428963a2fc134154a5383096c776f3b4064733c5463d90', 'Premium_User', '2023-01-17 10:40:11', '0', 0),
(21, 'moha', 'moha@gmail.com', '924592b9b103f14f833faafb67f480691f01988aa457c0061769f58cd47311bc', 'User', '2023-01-18 08:37:10', '0', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `url_images`
--
ALTER TABLE `url_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  ADD CONSTRAINT `projet_tag_ibfk_1` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projet_tag_ibfk_2` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `url_images`
--
ALTER TABLE `url_images`
  ADD CONSTRAINT `FK_Id_Projet` FOREIGN KEY (`projet_id`) REFERENCES `projet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
