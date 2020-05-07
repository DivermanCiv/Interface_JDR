-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 07 mai 2020 à 13:03
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `interface_jdr`
--

-- --------------------------------------------------------

--
-- Structure de la table `camp`
--

CREATE TABLE `camp` (
  `camp_id` int(11) NOT NULL,
  `camp_picture` varchar(255) DEFAULT NULL,
  `camp_description` text DEFAULT NULL,
  `camp_notes` text DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `character`
--

CREATE TABLE `character` (
  `character_id` int(11) NOT NULL,
  `character_name` varchar(255) DEFAULT NULL,
  `character_background` text DEFAULT NULL,
  `character_notes` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `character`
--

INSERT INTO `character` (`character_id`, `character_name`, `character_background`, `character_notes`, `user_id`, `class_id`) VALUES
(1, 'Joe', 'blabla', NULL, 1, 3),
(3, 'Natacha', 'test de perso 2', NULL, 1, 5),
(5, 'Jean-Michel', 'blabla3', NULL, 1, 8),
(6, 'Indy', 'Né à Indianapolis, lorem ipsum... ', NULL, 1, 3),
(7, 'Perso_test', 'Biologiste de métier..... ', NULL, 2, 4),
(9, 'Anne', 'Anne : sa vie, son oeuvre', NULL, 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `character_stat`
--

CREATE TABLE `character_stat` (
  `character_stat_id` int(11) NOT NULL,
  `character_stat_max_value` int(11) DEFAULT NULL,
  `character_stat_current_value` int(11) DEFAULT NULL,
  `character_id` int(11) NOT NULL,
  `stat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `character_stat`
--

INSERT INTO `character_stat` (`character_stat_id`, `character_stat_max_value`, `character_stat_current_value`, `character_id`, `stat_id`) VALUES
(241, 11, 11, 1, 1),
(242, 11, 11, 1, 2),
(243, 11, 11, 1, 3),
(244, 11, 11, 1, 4),
(245, 11, 11, 1, 5),
(246, 11, 11, 1, 6),
(247, 11, 11, 1, 7),
(248, 11, 11, 1, 8),
(249, 22, 22, 1, 9),
(250, 22, 22, 1, 10),
(271, 7, 7, 3, 1),
(272, 15, 15, 3, 2),
(273, 5, 5, 3, 3),
(274, 12, 12, 3, 4),
(275, 16, 16, 3, 5),
(276, 14, 14, 3, 6),
(277, 11, 11, 3, 7),
(278, 14, 14, 3, 8),
(279, 12, 12, 3, 9),
(280, 21, 21, 3, 10),
(291, 5, 5, 5, 1),
(292, 12, 12, 5, 2),
(293, 9, 9, 5, 3),
(294, 12, 12, 5, 4),
(295, 17, 17, 5, 5),
(296, 15, 15, 5, 6),
(297, 9, 9, 5, 7),
(298, 12, 12, 5, 8),
(299, 14, 14, 5, 9),
(300, 26, 26, 5, 10),
(301, 11, 11, 6, 1),
(302, 15, 15, 6, 2),
(303, 8, 8, 6, 3),
(304, 9, 9, 6, 4),
(305, 12, 12, 6, 5),
(306, 11, 11, 6, 6),
(307, 13, 13, 6, 7),
(308, 12, 12, 6, 8),
(309, 19, 19, 6, 9),
(310, 20, 20, 6, 10),
(311, 6, 6, 7, 1),
(312, 10, 10, 7, 2),
(313, 7, 7, 7, 3),
(314, 15, 15, 7, 4),
(315, 17, 17, 7, 5),
(316, 16, 16, 7, 6),
(317, 8, 8, 7, 7),
(318, 13, 13, 7, 8),
(319, 13, 13, 7, 9),
(320, 24, 24, 7, 10),
(331, 12, 12, 9, 1),
(332, 13, 13, 9, 2),
(333, 10, 10, 9, 3),
(334, 16, 16, 9, 4),
(335, 4, 4, 9, 5),
(336, 10, 10, 9, 6),
(337, 13, 13, 9, 7),
(338, 15, 15, 9, 8),
(339, 22, 22, 9, 9),
(340, 14, 14, 9, 10);

-- --------------------------------------------------------

--
-- Structure de la table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `class_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `class_description`) VALUES
(3, 'Explorateur', 'Tu es Indiana Jones, mais en moins stylé et sans le fouet. Pas de chance !'),
(4, 'Biologiste', 'La classe des beaux gosses qui murmurent à l\'oreille des animaux et des végétaux'),
(5, 'Photoreporter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in gravida nisi. Aenean eros libero.'),
(6, 'Chasseur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in gravida nisi. Aenean eros libero.'),
(7, 'Soldat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in gravida nisi. Aenean eros libero.'),
(8, 'Médecin militaire', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in gravida nisi. Aenean eros libero.');

-- --------------------------------------------------------

--
-- Structure de la table `exist`
--

CREATE TABLE `exist` (
  `game_id` int(11) NOT NULL,
  `character_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE `game` (
  `game_id` int(11) NOT NULL,
  `game_name` varchar(255) DEFAULT NULL,
  `game_description` text DEFAULT NULL,
  `game_picture` varchar(255) DEFAULT NULL,
  `game_gm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `master`
--

CREATE TABLE `master` (
  `character_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `master`
--

INSERT INTO `master` (`character_id`, `skill_id`) VALUES
(1, 31),
(1, 34),
(3, 36),
(3, 42),
(5, 28),
(5, 38),
(5, 40),
(6, 23),
(6, 33),
(6, 39),
(7, 24),
(7, 34),
(7, 37),
(9, 27),
(9, 29),
(9, 34);

-- --------------------------------------------------------

--
-- Structure de la table `place`
--

CREATE TABLE `place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(255) DEFAULT NULL,
  `place_description` text DEFAULT NULL,
  `place_picture1` varchar(255) DEFAULT NULL,
  `place_picture2` varchar(255) DEFAULT NULL,
  `place_picture3` varchar(255) DEFAULT NULL,
  `place_gmnotes` text DEFAULT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `play`
--

CREATE TABLE `play` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

CREATE TABLE `skill` (
  `skill_id` int(11) NOT NULL,
  `skill_name` varchar(255) DEFAULT NULL,
  `skill_description` text DEFAULT NULL,
  `skill_bonus` varchar(255) DEFAULT NULL,
  `skill_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `skill`
--

INSERT INTO `skill` (`skill_id`, `skill_name`, `skill_description`, `skill_bonus`, `skill_type`) VALUES
(23, 'Mac Giver', 'Permet de faire du feu et de bricoler des objets avec trois fois rien', '+1', 'Explorateur'),
(24, 'Science Infuse', 'Reconnaît les propriétés des végétaux ou des animaux', '+2', 'Biologiste'),
(25, 'Lâcheté', 'Permet de se mettre à l’écart d’un combat pour prendre des photos', '+3', 'Photoreporter'),
(26, 'Gros Guns', 'Sait utiliser des armes lourdes', '', 'Soldat'),
(27, 'Pisteur', 'Peut suivre un animal à la trace ', '', 'Chasseur'),
(28, 'Chirurgie', 'Peut restaurer tous le PV d’un personnage au camp (contre 1 jour de récup’)', '', 'Médecin militaire'),
(29, 'Sniper', 'Permet d’utiliser un sniper', '', 'Combat'),
(30, 'Karaté Tiger', 'Lorem Ipsum Dolores', '', 'Combat'),
(31, 'Fan de Couteaux', 'Lorem Ipsum Dolores', '', 'Combat'),
(32, 'Ambidextre', 'Lorem Ipsum Dolores', '', 'Combat'),
(33, 'Contre-Attaquant', 'Lorem Ipsum Dolores', '', 'Combat'),
(34, 'Dresseur', 'Lorem Ipsum Dolores', '', 'Déplacement'),
(35, 'Homme Invisible', 'Lorem Ipsum Dolores', '', 'Déplacement'),
(36, 'Escalator', 'Lorem Ipsum Dolores', '', 'Déplacement'),
(37, 'Plongeur de Fond', 'Lorem Ipsum Dolores', '', 'Déplacement'),
(38, 'Rage du Desespoir', 'Lorem Ipsum Dolores', '', 'Survie'),
(39, '6e Sens', 'Lorem Ipsum Dolores', '', 'Survie'),
(40, 'Mental d\'Acier', 'Lorem Ipsum Dolores', '', 'Survie'),
(41, 'Survivaliste', 'Lorem Ipsum Dolores', '', 'Survie'),
(42, 'Hippie', 'Lorem Ipsum Dolores', '', 'Survie'),
(43, 'A la Diète', 'Lorem Ipsum Dolores', '', 'Survie');

-- --------------------------------------------------------

--
-- Structure de la table `stat`
--

CREATE TABLE `stat` (
  `stat_id` int(11) NOT NULL,
  `stat_name` varchar(255) DEFAULT NULL,
  `stat_description` text DEFAULT NULL,
  `stat_is_primary` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stat`
--

INSERT INTO `stat` (`stat_id`, `stat_name`, `stat_description`, `stat_is_primary`) VALUES
(1, 'Force', 'Soulever des trucs et mettre des pains dans la gueule. Détermine également la statistique <strong>PV</strong> et <strong>Combat Rapproché</strong>', 1),
(2, 'Agilité', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis venenatis orci scelerisque odio facilisis aliquet. Suspendisse quis tempus augue. Fusce.', 1),
(3, 'Endurance', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis venenatis orci scelerisque odio facilisis aliquet. Suspendisse quis tempus augue. Fusce.', 1),
(4, 'Perception', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis venenatis orci scelerisque odio facilisis aliquet. Suspendisse quis tempus augue. Fusce.', 1),
(5, 'Intelligence', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis venenatis orci scelerisque odio facilisis aliquet. Suspendisse quis tempus augue. Fusce.', 1),
(6, 'Tir et Lancer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis venenatis orci scelerisque odio facilisis aliquet. Suspendisse quis tempus augue. Fusce.', 0),
(7, 'Combat Rapproché', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis venenatis orci scelerisque odio facilisis aliquet. Suspendisse quis tempus augue. Fusce.', 0),
(8, 'Contrer et Esquiver', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis venenatis orci scelerisque odio facilisis aliquet. Suspendisse quis tempus augue. Fusce.', 0),
(9, 'PV', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis venenatis orci scelerisque odio facilisis aliquet. Suspendisse quis tempus augue. Fusce.', 0),
(10, 'Moral', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis venenatis orci scelerisque odio facilisis aliquet. Suspendisse quis tempus augue. Fusce.', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_mail` varchar(255) DEFAULT NULL,
  `user_is_validated` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_mail`, `user_is_validated`) VALUES
(1, 'Adam', '$2y$10$lpsGLbF7y7RzQTPGaCG0j.YrqWcazipHlKQ9zKq9Ke7YmPDv.k3am', 'adam@mail.com', 0),
(2, 'Test', '$2y$10$lpsGLbF7y7RzQTPGaCG0j.YrqWcazipHlKQ9zKq9Ke7YmPDv.k3am', 'test@mail.com', 0),
(3, 'Jean-Mi', '$2y$10$Ru2W8biYrXFrPYYcLLztvOg9EvRaM.1ZxaHHWazaAsAWFbpygoTkO', 'jean@michel.mail', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `camp`
--
ALTER TABLE `camp`
  ADD PRIMARY KEY (`camp_id`),
  ADD KEY `FK_camp_game_id` (`game_id`);

--
-- Index pour la table `character`
--
ALTER TABLE `character`
  ADD PRIMARY KEY (`character_id`),
  ADD KEY `FK_character_user_id` (`user_id`),
  ADD KEY `FK_character_class_id` (`class_id`);

--
-- Index pour la table `character_stat`
--
ALTER TABLE `character_stat`
  ADD PRIMARY KEY (`character_stat_id`),
  ADD KEY `FK_character_stat_stat_id` (`stat_id`),
  ADD KEY `FK_character_stat_character_id` (`character_id`);

--
-- Index pour la table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Index pour la table `exist`
--
ALTER TABLE `exist`
  ADD PRIMARY KEY (`game_id`,`character_id`),
  ADD KEY `FK_exist_character_id` (`character_id`);

--
-- Index pour la table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`);

--
-- Index pour la table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`character_id`,`skill_id`),
  ADD KEY `FK_master_skill_id` (`skill_id`);

--
-- Index pour la table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`place_id`),
  ADD KEY `FK_place_game_id` (`game_id`);

--
-- Index pour la table `play`
--
ALTER TABLE `play`
  ADD PRIMARY KEY (`user_id`,`game_id`),
  ADD KEY `FK_play_game_id` (`game_id`);

--
-- Index pour la table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`skill_id`);

--
-- Index pour la table `stat`
--
ALTER TABLE `stat`
  ADD PRIMARY KEY (`stat_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `camp`
--
ALTER TABLE `camp`
  MODIFY `camp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `character`
--
ALTER TABLE `character`
  MODIFY `character_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `character_stat`
--
ALTER TABLE `character_stat`
  MODIFY `character_stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

--
-- AUTO_INCREMENT pour la table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `exist`
--
ALTER TABLE `exist`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `master`
--
ALTER TABLE `master`
  MODIFY `character_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `place`
--
ALTER TABLE `place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `play`
--
ALTER TABLE `play`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `skill`
--
ALTER TABLE `skill`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `stat`
--
ALTER TABLE `stat`
  MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `camp`
--
ALTER TABLE `camp`
  ADD CONSTRAINT `FK_camp_game_id` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `character`
--
ALTER TABLE `character`
  ADD CONSTRAINT `FK_character_class_id` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `FK_character_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `character_stat`
--
ALTER TABLE `character_stat`
  ADD CONSTRAINT `FK_character_stat_character_id` FOREIGN KEY (`character_id`) REFERENCES `character` (`character_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_character_stat_stat_id` FOREIGN KEY (`stat_id`) REFERENCES `stat` (`stat_id`);

--
-- Contraintes pour la table `exist`
--
ALTER TABLE `exist`
  ADD CONSTRAINT `FK_exist_character_id` FOREIGN KEY (`character_id`) REFERENCES `character` (`character_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_exist_game_id` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `master`
--
ALTER TABLE `master`
  ADD CONSTRAINT `FK_master_character_id` FOREIGN KEY (`character_id`) REFERENCES `character` (`character_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_master_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`skill_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `FK_place_game_id` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `play`
--
ALTER TABLE `play`
  ADD CONSTRAINT `FK_play_game_id` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_play_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
