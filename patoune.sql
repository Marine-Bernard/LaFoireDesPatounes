-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 22 déc. 2023 à 12:50
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

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
(1, 'Concours de beauté félins\n', 'Hey les fans de chats ! On vous invite au Salon Félin Glamour, le lieu où chaque chat est une star. Notre concours de beauté pour chats est une vraie fête pour les amoureux de félins. Les juges pros vont scruter chaque poil et chaque pas avec style.\r\n\r\nDes catégories comme \"La queue la plus majestueuse\" et \"La grâce en action\" font monter l\'excitation. Les gagnants repartent avec des prix spéciaux. Au Salon Félin Glamour, on adore nos amis félins et on veut le montrer !\r\n\r\n', 'On vous invite au Salon Félin Glamour, le lieu où chaque chat est une star.', '1x/Plan de travail 1.png', '2025-03-01', '09:30:00', '10:30:00'),
(7, 'Concours de beauté canin', 'Salut les amis des chiens ! Bienvenue au Salon Canin Élégance, là où on célèbre la classe des toutous. Notre concours de beauté pour chiens est super chic. Si t\'as un chien stylé, c\'est l\'occasion parfaite !\r\n\r\nDes juges pros vont regarder chaque chien sous toutes les coutures, de la truffe à la queue. Il y a des catégories cool comme \"La plus belle coiffure\" et \"L\'élégance en mouvement\". Les gagnants repartent avec des prix géniaux. Le Salon Canin Élégance, c\'est l\'endroit où l\'on met la beauté des chiens à l\'honneur !\r\n', 'Salut les amis des chiens ! Bienvenue au Salon Canin Élégance, là où on célèbre la classe des toutous.', '1x/Plan de travail 1_1.png', '2025-03-01', '15:30:00', '16:30:00'),
(8, 'rhyy', 'egthe', 'trbnt', 'gbr', '2025-03-01', '09:30:00', '17:00:00'),
(9, 'Course Canine', 'Salut les fans de chiens qui aiment bouger ! Préparez-vous à une journée de folie au Salon Sportif pour Chiens Intrépides avec notre Course Canine. Si t\'as un chien rapide et plein d\'énergie, c\'est l\'occasion de briller !\r\n\r\nLe parcours a des obstacles trop marrants. Des virages serrés, des sauts cool et des tunnels existants. Les chiens les plus rapides remportent des prix géniaux. Au Salon Sportif pour Chiens Intrépides, on célèbre le fun et l\'énergie de nos amis canins. Venez nombreux pour une journée pleine de joie et d\'action !\r\n', 'Salut les fans de chiens qui aiment bouger !', '1x/Plan de travail 1_2.png', '2025-03-02', '09:30:00', '17:00:00');

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
(2, 'Souche', 'Aurore', 'Arthur ', 'Allergique au poil de ses congénères ils ne supportent pas les autres animaux. Surtout pas Baudry, en même les chats et les chiens ne sont pas copains '),
(17, 'Bernard', 'Marine', 'Trifouilli', 'Trifouilli aussi appelé trifouille, la magouille, est classé premier dans le coeur de la team');

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
(1, 17),
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
  MODIFY `Id_activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `participant`
--
ALTER TABLE `participant`
  MODIFY `Id_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`Id_participant`) REFERENCES `participe` (`Id_participant`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `participe`
--
ALTER TABLE `participe`
  ADD CONSTRAINT `participe_ibfk_1` FOREIGN KEY (`Id_activite`) REFERENCES `activite` (`Id_activite`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
