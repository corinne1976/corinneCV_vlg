-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 06 oct. 2017 à 16:17
-- Version du serveur :  10.1.22-MariaDB
-- Version de PHP :  7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sitecv`
--
CREATE DATABASE IF NOT EXISTS `sitecv` DEFAULT CHARACTER SET utf8 COLLATE utf8_german2_ci;
USE `sitecv`;

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateurs`
--

DROP TABLE IF EXISTS `t_utilisateurs`;
CREATE TABLE `t_utilisateurs` (
  `id_utilisateur` int(3) NOT NULL,
  `prenom` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `nom` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `telephone` int(10) UNSIGNED ZEROFILL NOT NULL,
  `mdp` varchar(12) COLLATE utf8_german2_ci NOT NULL,
  `pseudo` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `avatar` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `age` int(3) NOT NULL,
  `date-naissance` date NOT NULL,
  `sexe` enum('h','f') COLLATE utf8_german2_ci NOT NULL,
  `etat_civil` enum('m','mme') COLLATE utf8_german2_ci NOT NULL,
  `adresse` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `code-postal` int(5) UNSIGNED ZEROFILL NOT NULL,
  `ville` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `pays` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `site_web` varchar(50) COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Déchargement des données de la table `t_utilisateurs`
--

INSERT INTO `t_utilisateurs` (`id_utilisateur`, `prenom`, `nom`, `email`, `telephone`, `mdp`, `pseudo`, `avatar`, `age`, `date-naissance`, `sexe`, `etat_civil`, `adresse`, `code-postal`, `ville`, `pays`, `site_web`) VALUES
(1, 'corinne', 'tina', 'corinne.tina@lepoles.com', 0650163510, '123456', 'coco1976', 'tc76', 41, '1976-10-16', 'f', 'mme', '17 rue gustave eiffeil', 92110, 'clichy', 'france', 'mon site cv');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_utilisateurs`
--
ALTER TABLE `t_utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_utilisateurs`
--
ALTER TABLE `t_utilisateurs`
  MODIFY `id_utilisateur` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
