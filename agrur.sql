-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 12 Décembre 2014 à 11:42
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
-- Structure de la table `certification`
--

CREATE TABLE IF NOT EXISTS `certification` (
  `id_certif` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_certif` varchar(250) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_certif`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `num_client` int(11) NOT NULL,
  `nom_client` varchar(250) COLLATE utf8_bin NOT NULL,
  `adresse_client` varchar(250) COLLATE utf8_bin NOT NULL,
  `nom_responsable_achat` varchar(250) COLLATE utf8_bin NOT NULL,
  UNIQUE KEY `num_client` (`num_client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `num_client` int(11) NOT NULL,
  `id_conditionnement` int(11) NOT NULL,
  `date_commande` date NOT NULL,
  `quantite` int(11) NOT NULL,
  UNIQUE KEY `id_conditionnement` (`id_conditionnement`),
  UNIQUE KEY `num_client` (`num_client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE IF NOT EXISTS `commune` (
  `id_commune` int(11) NOT NULL AUTO_INCREMENT,
  `nom_commune` varchar(250) COLLATE utf8_bin NOT NULL,
  `commune_aoc` int(1) NOT NULL,
  PRIMARY KEY (`id_commune`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `composer`
--

CREATE TABLE IF NOT EXISTS `composer` (
  `id_lot` int(11) NOT NULL,
  `id_livraison` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  UNIQUE KEY `id_lot` (`id_lot`),
  UNIQUE KEY `id_livraison` (`id_livraison`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `conditionnement`
--

CREATE TABLE IF NOT EXISTS `conditionnement` (
  `id_conditionnement` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_conditionnement` varchar(250) COLLATE utf8_bin NOT NULL,
  `poids_conditionnement` int(11) NOT NULL,
  `id_lot` int(11) NOT NULL,
  PRIMARY KEY (`id_conditionnement`),
  KEY `id_lot` (`id_lot`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE IF NOT EXISTS `livraison` (
  `id_livraison` int(11) NOT NULL AUTO_INCREMENT,
  `date_livraison` date NOT NULL,
  `num_prod` int(11) NOT NULL,
  PRIMARY KEY (`id_livraison`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `lot_production`
--

CREATE TABLE IF NOT EXISTS `lot_production` (
  `calibre` int(11) NOT NULL,
  `type_produit` varchar(250) COLLATE utf8_bin NOT NULL,
  `id_lot` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_lot`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

CREATE TABLE IF NOT EXISTS `posseder` (
  `id_certif` int(11) NOT NULL,
  `num_prod` int(11) NOT NULL,
  `date_obtention` date DEFAULT NULL,
  UNIQUE KEY `id_certif` (`id_certif`),
  UNIQUE KEY `num_prod` (`num_prod`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `producteur`
--

CREATE TABLE IF NOT EXISTS `producteur` (
  `num_prod` int(11) NOT NULL,
  `adresse_prod` varchar(250) COLLATE utf8_bin NOT NULL,
  `nom_representant_prod` varchar(250) COLLATE utf8_bin NOT NULL,
  `prenom_representant_prod` varchar(250) COLLATE utf8_bin NOT NULL,
  `societe` varchar(250) COLLATE utf8_bin NOT NULL,
  `date_adhesion` date DEFAULT NULL,
  UNIQUE KEY `num_prod` (`num_prod`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(250) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(16) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`num`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `variete`
--

CREATE TABLE IF NOT EXISTS `variete` (
  `id_variete` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_variete` varchar(250) COLLATE utf8_bin NOT NULL,
  `AOC` int(1) NOT NULL,
  PRIMARY KEY (`id_variete`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `verger`
--

CREATE TABLE IF NOT EXISTS `verger` (
  `nom_verger` varchar(250) COLLATE utf8_bin NOT NULL,
  `superficie` int(11) NOT NULL,
  `nbr_arbre` int(11) NOT NULL,
  `id_commune` int(11) NOT NULL,
  `num_prod` int(11) NOT NULL,
  `id_variete` int(11) NOT NULL,
  UNIQUE KEY `id_commune` (`id_commune`),
  UNIQUE KEY `num_prod` (`num_prod`),
  UNIQUE KEY `id_variete` (`id_variete`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
