-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 20 déc. 2023 à 14:17
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `patoune`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE `activite` (
  `Id_activite` int(11) NOT NULL,
  `nom` text NOT NULL,
  `description` text NOT NULL,
  `minidesc` text NOT NULL,
  `img` text NOT NULL,
  `date` date NOT NULL,
  `horaire_deb` time NOT NULL,
  `horaire_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`Id_activite`, `nom`, `description`, `minidesc`, `img`, `date`, `horaire_deb`, `horaire_fin`) VALUES
(1, 'Concours de beauté félins\n', 'Y\'a plein de chat\n', 'blabla\n', '\n', '2025-03-01', '09:30:00', '10:30:00'),
(7, 'Concours de beauté canin', 'il y a plein de chien', '\"bah oui pour baudry\"', '', '2025-03-01', '15:30:00', '16:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE `participant` (
  `Id_participant` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `nom_animal` text NOT NULL,
  `info_animal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `participant`
--

INSERT INTO `participant` (`Id_participant`, `nom`, `prenom`, `nom_animal`, `info_animal`) VALUES
(1, 'Borné', 'Léa', 'Baudry', 'C\'est mon chien depuis peu cependant je l\'ai bien dresser a aboyer'),
(2, 'Souche', 'Aurore', 'Arthur ', 'Allergique au poil de ses congénères ils ne supportent pas les autres animaux. Surtout pas Baudry, en même les chats et les chiens ne sont pas copains ');

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

CREATE TABLE `participe` (
  `Id_activite` int(11) NOT NULL,
  `Id_participant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `participe`
--

INSERT INTO `participe` (`Id_activite`, `Id_participant`) VALUES
(1, 2),
(7, 1),
(7, 4),
(7, 12);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`Id_activite`);

--
-- Index pour la table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`Id_participant`);

--
-- Index pour la table `participe`
--
ALTER TABLE `participe`
  ADD KEY `Id_activite` (`Id_activite`,`Id_participant`),
  ADD KEY `Id_participant` (`Id_participant`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activite`
--
ALTER TABLE `activite`
  MODIFY `Id_activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `participant`
--
ALTER TABLE `participant`
  MODIFY `Id_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `participe`
--
ALTER TABLE `participe`
  ADD CONSTRAINT `participe_ibfk_1` FOREIGN KEY (`Id_participant`) REFERENCES `participant` (`id_participant`),
  ADD CONSTRAINT `participe_ibfk_2` FOREIGN KEY (`Id_activite`) REFERENCES `activite` (`Id_activite`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
