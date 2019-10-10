-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 10 oct. 2019 à 10:27
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
-- Base de données :  `perso`
--

-- --------------------------------------------------------

--
-- Structure de la table `adore`
--

CREATE TABLE `adore` (
  `ADORID` int(11) NOT NULL,
  `LOGID` int(11) NOT NULL,
  `HOBID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adore`
--

INSERT INTO `adore` (`ADORID`, `LOGID`, `HOBID`) VALUES
(13, 1, 1),
(11, 1, 2),
(12, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `connecte`
--

CREATE TABLE `connecte` (
  `CONID` int(11) NOT NULL,
  `CONLOGIN` varchar(50) NOT NULL,
  `CONDATE` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connecte`
--

INSERT INTO `connecte` (`CONID`, `CONLOGIN`, `CONDATE`) VALUES
(5, 'toto', '2019-10-09 09:30:00'),
(4, 'PROF', '2019-10-08 16:48:00'),
(3, 'MASTER', '2019-10-08 16:36:00'),
(6, 'MASTER', '2019-10-09 10:28:00'),
(7, 'MASTER', '2019-10-09 10:33:00'),
(8, 'mec', '2019-10-09 10:57:00'),
(9, 'MASTER', '2019-10-09 11:18:00'),
(10, 'MASTER', '2019-10-09 11:21:00'),
(11, 'MASTER', '2019-10-09 11:23:00'),
(12, 'MASTER', '2019-10-09 11:24:00'),
(13, 'MASTER', '2019-10-09 11:27:00'),
(14, 'MASTER', '2019-10-09 11:27:00'),
(15, 'MASTER', '2019-10-09 11:30:00'),
(16, 'toto', '2019-10-09 11:36:00'),
(17, 'MASTER', '2019-10-09 11:37:00'),
(18, 'MASTER', '2019-10-09 11:52:00'),
(19, 'MASTER', '2019-10-09 14:25:00'),
(20, 'MASTER', '2019-10-09 14:26:00'),
(21, 'MASTER', '2019-10-09 14:29:00'),
(22, 'MASTER', '2019-10-09 14:46:00'),
(23, 'MASTER', '2019-10-09 14:49:00'),
(24, 'MASTER', '2019-10-09 15:01:00'),
(25, 'MASTER', '2019-10-09 15:06:00'),
(26, 'MASTER', '2019-10-09 15:36:00'),
(27, 'MASTER', '2019-10-09 15:38:00'),
(28, 'MASTER', '2019-10-09 15:58:00'),
(29, 'MASTER', '2019-10-10 09:05:00'),
(30, 'toto', '2019-10-10 09:53:00'),
(31, 'MASTER', '2019-10-10 09:53:00'),
(32, 'MASTER', '2019-10-10 10:25:00');

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE `droit` (
  `DROID` int(11) NOT NULL,
  `DRONOM` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `droit`
--

INSERT INTO `droit` (`DROID`, `DRONOM`) VALUES
(1, 'ADMINISTRATEUR'),
(2, 'UTILISATEUR'),
(3, 'RAPPORTEUR');

-- --------------------------------------------------------

--
-- Structure de la table `hobby`
--

CREATE TABLE `hobby` (
  `HOBID` int(11) NOT NULL,
  `HOBNOM` varchar(200) NOT NULL,
  `HOBDESCRI` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `hobby`
--

INSERT INTO `hobby` (`HOBID`, `HOBNOM`, `HOBDESCRI`) VALUES
(1, 'Geek', 'Accro de l\'informatique et Antisociale'),
(2, 'SÃ©ries', 'abonnÃ© Ã  Netflix'),
(3, 'FlÃ©chettes', 'Dans un bar avec une bonne biÃ¨re');

-- --------------------------------------------------------

--
-- Structure de la table `log`
--

CREATE TABLE `log` (
  `LOGID` int(11) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `DATE_CRE` date NOT NULL,
  `DROID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `log`
--

INSERT INTO `log` (`LOGID`, `LOGIN`, `PASSWORD`, `DATE_CRE`, `DROID`) VALUES
(1, 'MASTER', 'NSI', '2019-06-14', 1),
(2, 'PROF', 'LOOSER', '2019-06-15', 2),
(3, 'toto', 'tutu', '2019-10-09', 3),
(4, 'tutu', 'titi', '2019-10-09', 3),
(5, 'mec', 'nana', '2019-10-09', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adore`
--
ALTER TABLE `adore`
  ADD PRIMARY KEY (`ADORID`);

--
-- Index pour la table `connecte`
--
ALTER TABLE `connecte`
  ADD PRIMARY KEY (`CONID`);

--
-- Index pour la table `droit`
--
ALTER TABLE `droit`
  ADD PRIMARY KEY (`DROID`);

--
-- Index pour la table `hobby`
--
ALTER TABLE `hobby`
  ADD PRIMARY KEY (`HOBID`);

--
-- Index pour la table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`LOGID`),
  ADD KEY `LOGIN` (`LOGIN`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adore`
--
ALTER TABLE `adore`
  MODIFY `ADORID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `connecte`
--
ALTER TABLE `connecte`
  MODIFY `CONID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `droit`
--
ALTER TABLE `droit`
  MODIFY `DROID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `hobby`
--
ALTER TABLE `hobby`
  MODIFY `HOBID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `log`
--
ALTER TABLE `log`
  MODIFY `LOGID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
