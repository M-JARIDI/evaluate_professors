-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  jeu. 18 fév. 2021 à 20:21
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `evaluateprofessors_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `enseignement`
--

DROP TABLE IF EXISTS `enseignement`;
CREATE TABLE IF NOT EXISTS `enseignement` (
  `num_prof` smallint(5) NOT NULL,
  `num_etu` smallint(5) NOT NULL,
  PRIMARY KEY (`num_prof`,`num_etu`),
  KEY `fk_enseignement_etudiant` (`num_etu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `num_etu` smallint(5) NOT NULL,
  `nom` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`num_etu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`num_etu`, `nom`, `prenom`) VALUES
(1, 'Christensen', 'Olivier'),
(2, 'Cabrera', 'Christophe'),
(3, 'Leveugle', 'Olivier'),
(4, 'Bulte', 'Nadege'),
(5, 'Carioca', 'Mikhail'),
(6, 'Subiger', 'Jerome');

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

DROP TABLE IF EXISTS `evaluation`;
CREATE TABLE IF NOT EXISTS `evaluation` (
  `num_prof` smallint(5) NOT NULL,
  `num_etu` smallint(5) NOT NULL,
  `text` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` decimal(10,0) NOT NULL,
  PRIMARY KEY (`num_prof`,`num_etu`),
  KEY `fk_evaluation_etudiant` (`num_etu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `evaluation`
--

INSERT INTO `evaluation` (`num_prof`, `num_etu`, `text`, `note`) VALUES
(7, 1, 'il explique bien', '5'),
(2, 1, 'QUell prooof', '5'),
(1, 3, 'bon', '4'),
(2, 3, 'quel prof', '5'),
(4, 1, 'okeeey', '2'),
(5, 1, 'niveau moyen d\'enseignement, mais ça marche', '3'),
(6, 1, 'toujours abscent', '1'),
(3, 3, 'good', '5'),
(5, 4, 'belle prof', '4'),
(5, 3, 'non', '4');

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `num_prof` smallint(5) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`num_prof`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`num_prof`, `nom`, `prenom`) VALUES
(1, 'abdel', 'hadi'),
(2, 'Mu', 'stapha'),
(3, 'ra', 'chid'),
(4, 'ka', 'rima'),
(5, 'hi', 'nd'),
(6, 'syl', 'vain'),
(7, 'ja', 'mal');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
