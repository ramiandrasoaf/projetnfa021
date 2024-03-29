-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- HÃ´te : 127.0.0.1
-- GÃ©nÃ©rÃ© le :  ven. 28 juin 2019 Ã  20:59
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de donnÃ©es :  `site_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `instruments`
--

CREATE TABLE `instruments` (
  `Nom` varchar(255) NOT NULL,
  `A_propos` text NOT NULL,
  `id_instru` varchar(255) NOT NULL,
  `id_type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- DÃ©chargement des donnÃ©es de la table `instruments`
--

INSERT INTO `instruments` (`Nom`, `A_propos`, `id_instru`, `id_type`) VALUES
('Piano', 'Le piano est un instrument polyphonique Ã  clavier et Ã  cordes.\r\nIl existe deux sortes de piano :\r\n- le piano droit dont les cordes et la table d\'harmonie sont verticales, \r\n- le piano Ã  queue dont les cordes et la table d\'harmonie sont horizontales.', 'pi', 'c');

--
-- Index pour les tables dÃ©chargÃ©es
--

--
-- Index pour la table `instruments`
--
ALTER TABLE `instruments`
  ADD PRIMARY KEY (`Nom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
