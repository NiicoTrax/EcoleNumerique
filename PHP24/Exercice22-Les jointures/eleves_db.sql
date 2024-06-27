-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 27 juin 2024 à 13:32
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `eleves_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `id` bigint(20) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`id`, `titre`, `description`) VALUES
(1, 'Mathématiques', 'Compétences en mathématiques'),
(2, 'Science', 'Compétences en science'),
(3, 'Informatique', 'Compétences en informatique'),
(4, 'Physique', 'Compétences en physique'),
(5, 'Chimie', 'Compétences en chimie');

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE `eleves` (
  `id` bigint(5) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`id`, `prenom`, `nom`, `login`, `password`) VALUES
(1, 'John', 'Doe', 'johndoe', 'password1'),
(2, 'Jane', 'Smith', 'janesmith', 'password2'),
(3, 'Alice', 'Johnson', 'alicej', 'password3'),
(4, 'Bob', 'Brown', 'bobb', 'password4'),
(5, 'Charlie', 'Davis', 'charlied', 'password5'),
(6, 'David', 'Wilson', 'davidw', 'password6'),
(7, 'Emma', 'Taylor', 'emmat', 'password7');

-- --------------------------------------------------------

--
-- Structure de la table `eleves_competences`
--

CREATE TABLE `eleves_competences` (
  `id` bigint(20) NOT NULL,
  `niveau` tinyint(4) DEFAULT NULL,
  `niveau_ae` tinyint(4) DEFAULT NULL,
  `eleves_id` bigint(5) DEFAULT NULL,
  `competences_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `eleves_competences`
--

INSERT INTO `eleves_competences` (`id`, `niveau`, `niveau_ae`, `eleves_id`, `competences_id`) VALUES
(1, 5, 4, 1, 1),
(2, 3, 3, 1, 2),
(3, 4, 5, 2, 1),
(4, 4, 3, 2, 3),
(5, 5, 5, 3, 2),
(6, 3, 4, 3, 1),
(7, 2, 2, 3, 4),
(8, 4, 4, 4, 3),
(9, 3, 3, 5, 2),
(10, 4, 3, 5, 5),
(11, 4, 4, 6, 2),
(12, 3, 5, 6, 4),
(13, 5, 5, 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `eleves_informations`
--

CREATE TABLE `eleves_informations` (
  `id` bigint(5) NOT NULL,
  `age` smallint(6) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `eleves_id` bigint(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `eleves_informations`
--

INSERT INTO `eleves_informations` (`id`, `age`, `ville`, `avatar`, `eleves_id`) VALUES
(1, 15, 'Paris', 'avatar1.png', 1),
(2, 16, 'Paris', 'avatar2.png', 2),
(3, 15, 'Paris', 'avatar2.png', 3),
(4, 15, 'Paris', 'avatar1.png', 4),
(5, 16, 'Paris', 'avatar1.png', 5),
(6, 15, 'Paris', 'avatar1.png', 6),
(7, 16, 'Paris', 'avatar2.png', 7);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eleves_competences`
--
ALTER TABLE `eleves_competences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_eleves_competences_eleves_idx` (`eleves_id`),
  ADD KEY `fk_eleves_competences_competences_idx` (`competences_id`);

--
-- Index pour la table `eleves_informations`
--
ALTER TABLE `eleves_informations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_eleves_informations_eleves_idx` (`eleves_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `id` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `eleves_competences`
--
ALTER TABLE `eleves_competences`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `eleves_informations`
--
ALTER TABLE `eleves_informations`
  MODIFY `id` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `eleves_competences`
--
ALTER TABLE `eleves_competences`
  ADD CONSTRAINT `fk_eleves_competences_competences` FOREIGN KEY (`competences_id`) REFERENCES `competences` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_eleves_competences_eleves` FOREIGN KEY (`eleves_id`) REFERENCES `eleves` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `eleves_informations`
--
ALTER TABLE `eleves_informations`
  ADD CONSTRAINT `fk_eleves_informations_eleves` FOREIGN KEY (`eleves_id`) REFERENCES `eleves` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
