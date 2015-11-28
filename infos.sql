-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 28 Novembre 2015 à 18:19
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `mujdum`
--

-- --------------------------------------------------------

--
-- Structure de la table `Infos`
--
CREATE DATABASE mujdum;
USE mujdum;
CREATE TABLE `Infos` (
  `id_inf` smallint(5) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `adresse` varchar(80) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Infos`
--

INSERT INTO `Infos` (`id_inf`, `nom`, `prenom`, `adresse`, `tel`, `latitude`, `longitude`, `prix`) VALUES
(1, 'Onche', 'Patrick', '10 Rue Miollis, 75015 Paris, France', '06.42.52.84.98', 48.87148983809234, 2.3291015625, 35000),
(2, 'Dubois', 'Michel', '91 Boulevard Raspail, 75006 Paris, France', '06.53.62.12.66', 48.8473212003792, 2.3280715942382812, 40000),
(3, 'Rozon', 'Bertrand', '53-55 Rue Crozatier, 75012 Paris, France', '06.25.98.68.45', 48.848789721584026, 2.380084991455078, 50000);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Infos`
--
ALTER TABLE `Infos`
  ADD PRIMARY KEY (`id_inf`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Infos`
--
ALTER TABLE `Infos`
  MODIFY `id_inf` smallint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;