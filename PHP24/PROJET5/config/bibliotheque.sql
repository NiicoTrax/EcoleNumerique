-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 15 juil. 2024 à 14:33
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
-- Base de données :  `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `emprunts`
--

CREATE TABLE `emprunts` (
  `id` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `date_emprunt` date NOT NULL,
  `date_retour` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `emprunts`
--

INSERT INTO `emprunts` (`id`, `id_livre`, `id_membre`, `date_emprunt`, `date_retour`) VALUES
(1, 1, 1, '2023-06-01', '2023-06-15'),
(2, 2, 2, '2023-07-01', '2023-07-15'),
(3, 3, 2, '2024-07-10', '2024-07-13');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `id` int(11) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `annee_publication` int(11) NOT NULL,
  `genre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `isbn`, `titre`, `auteur`, `annee_publication`, `genre`) VALUES
(1, '9780451524935', '1984', 'George Orwell', 1949, 'Dystopie'),
(2, '9780156012195', 'Le Petit Prince', 'Antoine de Saint-Exupery', 1943, 'Conte'),
(3, '9782253004226', 'Les Miserables', 'Victor Hugo', 1862, 'Roman historique'),
(4, '9782070468964', 'La Verite sur l\'affaire Harry Quebert', 'Joel Dicker', 2012, 'Thriller'),
(5, '9782253109156', 'L\'elegance du herisson', 'Muriel Barbery', 2006, 'Roman'),
(6, '9782253260802', 'La Delicatesse', 'David Foenkinos', 2009, 'Roman'),
(7, '9782848765093', 'Le Sympathisant', 'Viet Thanh Nguyen', 2015, 'Roman'),
(8, '9782253131508', 'Chanson douce', 'Leila Slimani', 2016, 'Roman'),
(9, '9782260025366', 'Au revoir la-haut', 'Pierre Lemaitre', 2013, 'Roman historique'),
(10, '9782253083715', 'La Tresse', 'Laetitia Colombani', 2017, 'Roman'),
(11, '9782330072334', 'Le lambeau', 'Philippe Lancon', 2018, 'Autobiographie'),
(12, '9782072765245', 'Changer l\'eau des fleurs', 'Valerie Perrin', 2018, 'Roman'),
(13, '9782070468896', 'En attendant Bojangles', 'Olivier Bourdeaut', 2016, 'Roman'),
(14, '9782070144905', 'Leurs enfants apres eux', 'Nicolas Mathieu', 2018, 'Roman'),
(15, '9782757819325', 'La Nuit des temps', 'Rene Barjavel', 1968, 'Science-fiction'),
(16, '9782253240927', 'L\'ordre du jour', 'Eric Vuillard', 2017, 'Roman historique'),
(17, '9782021382069', 'La Carte postale', 'Anne Berest', 2021, 'Roman'),
(18, '9782714482010', 'Les loyautes', 'Delphine de Vigan', 2018, 'Roman'),
(19, '9782072797021', 'Soumission', 'Michel Houellebecq', 2015, 'Roman'),
(20, '9782253071781', 'Un appartement a Paris', 'Guillaume Musso', 2017, 'Thriller'),
(21, '9782330128727', 'Serotonine', 'Michel Houellebecq', 2019, 'Roman'),
(22, '9782330129786', 'La Disparition de Stephanie Mailer', 'Joel Dicker', 2018, 'Thriller'),
(23, '9782072920191', 'La vie secrete des ecrivains', 'Guillaume Musso', 2019, 'Roman'),
(24, '9782070360024', 'L\'Etranger', 'Albert Camus', 1942, 'Roman'),
(25, '9782253082064', 'Madame Bovary', 'Gustave Flaubert', 1857, 'Roman'),
(26, '9782070413119', 'Le Rouge et le Noir', 'Stendhal', 1830, 'Roman'),
(27, '9782070368228', 'La Peste', 'Albert Camus', 1947, 'Roman'),
(28, '9782253038405', 'Les Fleurs du mal', 'Charles Baudelaire', 1857, 'Poesie'),
(29, '9782253044901', 'Germinal', 'Emile Zola', 1885, 'Roman'),
(30, '9782253147664', 'Le Comte de Monte-Cristo', 'Alexandre Dumas', 1844, 'Roman'),
(31, '9782070360284', 'A la recherche du temps perdu', 'Marcel Proust', 1913, 'Roman'),
(32, '9782070368822', 'L\'Assommoir', 'Emile Zola', 1877, 'Roman'),
(33, '9782253174059', 'Les Trois Mousquetaires', 'Alexandre Dumas', 1844, 'Roman'),
(34, '9782070363834', 'Bel-Ami', 'Guy de Maupassant', 1885, 'Roman'),
(35, '9782070378753', 'La Condition humaine', 'Andre Malraux', 1933, 'Roman'),
(36, '9782070393749', 'Le Petit Prince', 'Antoine de Saint-Exupery', 1943, 'Conte'),
(37, '9782070366163', 'Candide', 'Voltaire', 1759, 'Conte philosophique'),
(38, '9782253034216', 'La Chartreuse de Parme', 'Stendhal', 1839, 'Roman'),
(39, '9782253085621', 'Le Pere Goriot', 'Honore de Balzac', 1835, 'Roman'),
(41, '9782070413270', 'Notre-Dame de Paris', 'Victor Hugo', 1831, 'Roman historique'),
(42, '9782070369003', 'Therese Raquin', 'Emile Zola', 1867, 'Roman'),
(43, '9782070363698', 'La Princesse de Cleves', 'Madame de La Fayette', 1678, 'Roman');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_adhesion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `email`, `date_adhesion`) VALUES
(1, 'Alice Johnson', 'alice.johnson@example.com', '2022-01-15'),
(2, 'Bob Smith', 'bob.smith@example.com', '2021-03-22'),
(3, 'Jean Dupont', 'jean.dupont@example.com', '2022-04-01'),
(4, 'Marie Curie', 'marie.curie@example.com', '2021-07-12'),
(5, 'Pierre Durand', 'pierre.durand@example.com', '2020-09-05'),
(6, 'Sophie Martin', 'sophie.martin@example.com', '2019-11-23'),
(7, 'Luc Leroy', 'luc.leroy@example.com', '2021-03-17'),
(8, 'Julie Robert', 'julie.robert@example.com', '2022-01-30'),
(9, 'Marc Dubois', 'marc.dubois@example.com', '2020-06-08'),
(10, 'Claire Moreau', 'claire.moreau@example.com', '2021-05-25'),
(11, 'Antoine Petit', 'antoine.petit@example.com', '2019-08-14'),
(12, 'Emma Lefevre', 'emma.lefevre@example.com', '2020-02-20'),
(13, 'Paul Fournier', 'paul.fournier@example.com', '2021-10-03'),
(14, 'Laura Dupuis', 'laura.dupuis@example.com', '2019-04-18'),
(15, 'Louis Michel', 'louis.michel@example.com', '2022-02-27'),
(16, 'Nina Garcia', 'nina.garcia@example.com', '2020-12-07'),
(17, 'Hugo David', 'hugo.david@example.com', '2021-11-22'),
(18, 'Alice Bertrand', 'alice.bertrand@example.com', '2019-06-16'),
(19, 'Maxime Rousseau', 'maxime.rousseau@example.com', '2022-05-19'),
(20, 'Camille Blanchard', 'camille.blanchard@example.com', '2020-01-31'),
(21, 'Julien Morel', 'julien.morel@example.com', '2021-08-29'),
(22, 'Elodie Lambert', 'elodie.lambert@example.com', '2019-07-21');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Niico', '$2y$10$1X/mnHqMYm9yGjMG1aG.e.d0U7cUJF8RDHXJxfwhclsQc04/tB1Wu');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `emprunts`
--
ALTER TABLE `emprunts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_livre` (`id_livre`),
  ADD KEY `id_membre` (`id_membre`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_titre` (`titre`),
  ADD KEY `idx_auteur` (`auteur`),
  ADD KEY `idx_genre` (`genre`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `emprunts`
--
ALTER TABLE `emprunts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunts`
--
ALTER TABLE `emprunts`
  ADD CONSTRAINT `emprunts_ibfk_1` FOREIGN KEY (`id_livre`) REFERENCES `livres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `emprunts_ibfk_2` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
