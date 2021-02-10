-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 25, 2020 at 10:23 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evaluateProfessors_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `enseignement`
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
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `num_etu` smallint(5) NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`num_etu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `etudiant`
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
-- Table structure for table `evaluation`
--

DROP TABLE IF EXISTS `evaluation`;
CREATE TABLE IF NOT EXISTS `evaluation` (
  `num_prof` smallint(5) NOT NULL,
  `num_etu` smallint(5) NOT NULL,
  `text` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` decimal(10,0) NOT NULL,
  PRIMARY KEY (`num_prof`,`num_etu`),
  KEY `fk_evaluation_etudiant` (`num_etu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`num_prof`, `num_etu`, `text`, `note`) VALUES
(3, 1, 'nice one', '5'),
(2, 1, 'il explique bien Ã  les filles,nous il nous ignore espÃ©ce de raisain', '1'),
(1, 3, 'bon', '4'),
(1, 1, 'demission', '1'),
(4, 1, 'je ne sais pas comment vous Ãªtes devenues prof,merde', '2'),
(5, 1, 'dommage,y\'a pas zero pour la notation', '1'),
(6, 1, 'toujours abscent', '1'),
(2, 3, 'ok', '4'),
(3, 3, 'good', '5'),
(4, 3, 'hgh jkjk jkjkj jkjk oio ipip ipoip jlnk nkb n l,l lklj jljl jljl jljl jljl jljl jljl jljl jljl jljl jljl jlj ljl jl jl jl jl j lj lj lj oj pk pk pi pi', '5'),
(5, 3, 'non', '4');

-- --------------------------------------------------------

--
-- Table structure for table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `num_prof` smallint(5) NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`num_prof`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `professeur`
--

INSERT INTO `professeur` (`num_prof`, `nom`, `prenom`) VALUES
(1, 'abdel', 'hadi'),
(2, 'Mu', 'stapha'),
(3, 'ra', 'chid'),
(4, 'ka', 'rima'),
(5, 'hi', 'nd'),
(6, 'syl', 'vain');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
