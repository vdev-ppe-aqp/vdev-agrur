-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 21 Novembre 2014 à 11:22
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `agrur`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `num_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(250) COLLATE utf8_bin NOT NULL,
  `adresse_client` text COLLATE utf8_bin NOT NULL,
  `nom_responsable_achat` varchar(250) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`num_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`num_client`, `nom_client`, `adresse_client`, `nom_responsable_achat`) VALUES
(1, 'a', '3 rue truc', 'b');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `num_commande` int(11) NOT NULL AUTO_INCREMENT,
  `date_commande` date NOT NULL,
  `id_livraison` int(11) NOT NULL,
  `num_client` int(11) NOT NULL,
  PRIMARY KEY (`num_commande`),
  KEY `id_livraison` (`id_livraison`,`num_client`),
  KEY `num_client` (`num_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE IF NOT EXISTS `commune` (
  `id_commune` int(11) NOT NULL AUTO_INCREMENT,
  `nom_commune` varchar(250) COLLATE utf8_bin NOT NULL,
  `commune_aoc` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_commune`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `comporter`
--

CREATE TABLE IF NOT EXISTS `comporter` (
  `numero` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  KEY `numero` (`numero`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `conditionnement`
--

CREATE TABLE IF NOT EXISTS `conditionnement` (
  `id_conditionnement` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_conditionnement` varchar(250) COLLATE utf8_bin NOT NULL,
  `poids_conditionnement` int(11) NOT NULL,
  PRIMARY KEY (`id_conditionnement`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Contenu de la table `conditionnement`
--

INSERT INTO `conditionnement` (`id_conditionnement`, `libelle_conditionnement`, `poids_conditionnement`) VALUES
(1, 'Sac de noix', 1);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE IF NOT EXISTS `livraison` (
  `id_livraison` int(11) NOT NULL AUTO_INCREMENT,
  `date_livraison` date NOT NULL,
  `type_produit` varchar(250) COLLATE utf8_bin NOT NULL,
  `quantite` int(11) NOT NULL,
  `num_prod` int(11) NOT NULL,
  PRIMARY KEY (`id_livraison`),
  KEY `num_prod` (`num_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `producteur`
--

CREATE TABLE IF NOT EXISTS `producteur` (
  `num_prod` int(11) NOT NULL AUTO_INCREMENT,
  `adresse_prod` text COLLATE utf8_bin NOT NULL,
  `nom_representant_prod` varchar(250) COLLATE utf8_bin NOT NULL,
  `prenom_representant_prod` varchar(250) COLLATE utf8_bin NOT NULL,
  `societe` varchar(250) COLLATE utf8_bin NOT NULL,
  `date_adhesion` date NOT NULL,
  PRIMARY KEY (`num_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) CHARACTER SET latin1 NOT NULL,
  `mail` varchar(250) CHARACTER SET latin1 NOT NULL,
  `mdp` varchar(250) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `mail`, `mdp`) VALUES
(5, 'a', 'a@gmail.fr', '1234'),
(8, 'dupont', 'dupont@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `variete`
--

CREATE TABLE IF NOT EXISTS `variete` (
  `id_variete` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_variete` varchar(250) COLLATE utf8_bin NOT NULL,
  `AOC` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_variete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `verger`
--

CREATE TABLE IF NOT EXISTS `verger` (
  `id_verger` int(11) NOT NULL AUTO_INCREMENT,
  `nom_verger` varchar(250) COLLATE utf8_bin NOT NULL,
  `superficie` int(11) NOT NULL,
  `nbr_arbre` int(11) NOT NULL,
  `id_variete` int(11) NOT NULL,
  `id_commune` int(11) NOT NULL,
  `num_prod` int(11) NOT NULL,
  PRIMARY KEY (`id_verger`),
  KEY `id_variete` (`id_variete`),
  KEY `id_commune` (`id_commune`),
  KEY `num_prod` (`num_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_livraison`) REFERENCES `livraison` (`id_livraison`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`num_client`) REFERENCES `client` (`num_client`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `comporter`
--
ALTER TABLE `comporter`
  ADD CONSTRAINT `comporter_ibfk_1` FOREIGN KEY (`numero`) REFERENCES `commande` (`num_commande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comporter_ibfk_2` FOREIGN KEY (`id`) REFERENCES `conditionnement` (`id_conditionnement`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (`num_prod`) REFERENCES `producteur` (`num_prod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `verger`
--
ALTER TABLE `verger`
  ADD CONSTRAINT `verger_ibfk_1` FOREIGN KEY (`id_variete`) REFERENCES `variete` (`id_variete`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `verger_ibfk_2` FOREIGN KEY (`id_commune`) REFERENCES `commune` (`id_commune`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `verger_ibfk_3` FOREIGN KEY (`num_prod`) REFERENCES `producteur` (`num_prod`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
