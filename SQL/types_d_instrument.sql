-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- HÃ´te : 127.0.0.1
-- GÃ©nÃ©rÃ© le :  ven. 28 juin 2019 Ã  21:04
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
-- Structure de la table `types_d_instrument`
--

CREATE TABLE `types_d_instrument` (
  `Type` varchar(255) NOT NULL,
  `A_propos` text NOT NULL,
  `id_type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- DÃ©chargement des donnÃ©es de la table `types_d_instrument`
--

INSERT INTO `types_d_instrument` (`Type`, `A_propos`, `id_type`) VALUES
('Instruments Ã  cordes', 'Le violon,la guitare,le piano...font partie de cette famille d\'instruments de musique.', 'c'),
('Percussions', 'La famille des percussions compte parmi ses membres, le xylophone, le tambour et les maracas.', 'p'),
('Instruments Ã  vent', 'Ce type d\'instruments se divise en deux catÃ©gories :\r\n- les bois (flÃ»te, bombarde, saxophoneâ€¦),\r\n- les cuivres (trompette, corâ€¦).', 'v');

--
-- Index pour les tables dÃ©chargÃ©es
--

--
-- Index pour la table `types_d_instrument`
--
ALTER TABLE `types_d_instrument`
  ADD PRIMARY KEY (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
