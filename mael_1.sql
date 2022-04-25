-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 23 avr. 2022 à 16:53
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mael`
--

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `Id_photo` int(11) NOT NULL COMMENT 'Image number',
  `Photo` blob NOT NULL COMMENT 'Image path',
  `Date/heure` date NOT NULL COMMENT 'Photo time'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Photo Storing Table ';

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`Id_photo`, `Photo`, `Date/heure`) VALUES
(1, 0x433a5c746573745c6a73705f6f755f736f6e745f6c65735f70686f746f73, '2012-10-25');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `Id_user` int(11) NOT NULL,
  `Nom` varchar(30) NOT NULL COMMENT 'First Name',
  `Prenom` varchar(30) NOT NULL COMMENT 'Lasr Name ',
  `Identifiant` varchar(30) NOT NULL COMMENT 'Login',
  `Mot de passe` varchar(100) NOT NULL COMMENT 'Password ',
  `Admin` tinyint(1) NOT NULL COMMENT 'Is it Admin ?'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Id_user`, `Nom`, `Prenom`, `Identifiant`, `Mot de passe`, `Admin`) VALUES
(1, 'Albany', 'Mael', 'am103879', '*310AF8D67AE450FB86125F07FF75D1583528B45F', 1),
(2, 'Bruneau', 'Jean-baptiste', 'JB140005', '*47A6B0EA08A36FAEBE4305B373FE37E3CF27C357', 1),
(3, 'Brimboeuf', 'Nicolas', 'NB254163', '*87B9764F5F4A7CBB7092CC73CF1B03BCC264FDBB', 0),
(4, 'Abdallah ', 'Selyan', 'AB254269', '*AC48903ECE8945AD386409528525491DE0580658', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`Id_photo`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `Id_photo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Image number', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `Id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
