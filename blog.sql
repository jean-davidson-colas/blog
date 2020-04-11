-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 10 avr. 2020 à 18:09
-- Version du serveur :  10.4.10-MariaDB
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
-- Base de données :  `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `article` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `article`, `id_utilisateur`, `id_categorie`, `date`) VALUES
(20, 'reztyruiyoup', 1345, 1, '2020-04-08 18:45:48'),
(2, 'tyriytr', 1337, 1, '2020-03-22 13:10:29'),
(3, 'tiriury', 1337, 1, '2020-03-22 13:10:31'),
(19, 'fretyuiryou', 1345, 1, '2020-04-08 18:45:46'),
(17, 'ezrtyiuopÃ´', 1345, 1, '2020-04-08 18:45:41'),
(18, 'rzetryiuopuoi^ml', 1345, 1, '2020-04-08 18:45:44'),
(21, 'dfs<gsuih', 1345, 1, '2020-04-08 18:45:51'),
(22, 'fTRUI', 1345, 1, '2020-04-08 18:45:52'),
(23, 'ertyiuop', 1345, 1, '2020-04-10 15:48:26'),
(24, 'Le Lorem Ipsum est simplement du faux texte employÃ© dans la composition et la mise en page avant impression. Le Lorem Ipsum', 1347, 1, '2020-04-10 17:33:02'),
(25, 'Le Lorem Ipsum est simplement du faux texte employÃ© dans la composition et la mise en page avant impression. Le Lorem Ipsum e', 1347, 1, '2020-04-10 17:37:00'),
(26, 'Le Lorem Ipsum est simplement du faux texte employÃ© dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux', 1347, 1, '2020-04-10 17:37:36'),
(27, 'Le Lorem Ipsum est simplement du faux texte employÃ© dans la composition et la mise en page avant impression. Le Lorem Ipsum est le', 1347, 2, '2020-04-10 17:37:47'),
(28, 'Le Lorem Ipsum est simplement du faux texte employÃ© dans la composition et la mise en page avant impression. Le Lorem Ipsum e\r\n', 1347, 3, '2020-04-10 17:38:04');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'konoha'),
(2, 'Oto'),
(3, 'Iwa'),
(4, 'Kusa'),
(5, 'Suna');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(1024) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_article`, `id_utilisateur`, `date`) VALUES
(12, 'EDRSETRYTUYI', 0, 1344, '2020-04-08 18:28:25'),
(11, 'YRUIYOYUTYTRE', 9, 1344, '2020-04-08 18:28:25'),
(13, 'rzteyrtuiuo', 19, 1345, '2020-04-10 13:49:03'),
(14, 'zertyiuopo^Ã ^Ã§)=', 19, 1345, '2020-04-10 13:49:14'),
(15, 'ezartyiuopÃ´', 19, 1345, '2020-04-10 13:49:25'),
(16, '', 19, 1345, '2020-04-10 13:50:47'),
(17, 'azertyui', 18, 1345, '2020-04-10 13:51:29');

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

DROP TABLE IF EXISTS `droits`;
CREATE TABLE IF NOT EXISTS `droits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1338 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateur'),
(42, 'modérateur'),
(1337, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1348 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `id_droits`) VALUES
(1337, 'admin', '$2y$12$1C.Lu2hgLhQ9afAX9.x.8uOAAS0ZmfgHbI8gg4wqqfUumg0C4vXxq', 'jdcolas888@gmail.com', 1337),
(1339, 'azerty', '$2y$12$hNE8NUf9QgXJmACe8Rb3sekKVu146ffG1NmjqSvQqAGcpFAbvjUCu', 'jdcolas8188@gmail.com', 1),
(1345, 'dre', '$2y$12$03Bht3qkaO8jC7THF7YQi./AWKclM6aOIJ5/6UZrEsAvsp2LuArWG', 'jdcolas8a88@gmail.com', 42),
(1344, 't', '$2y$12$ot.NYmS17TnswWN/J/orMeIiu3SWYkMwVFE80KHrYVTRguqFn9qJO', 'jdcolas8e88@gmail.com', 1),
(1346, 'PO123', '$2y$12$kS79k1W264np1gssjoIaGeZvBD7rIvalepUq5eTNsO4PM5RC55wtK', 'jdcolas8s88@gmail.com', 1),
(1347, 'sassou', '$2y$12$vEwwnorQ6uXH0nUrJwgnU.mF.sUbFUsDcKnkMx6qZbtYH90VFsfAO', 'sassiya.kouachi@yahoo.fr', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
