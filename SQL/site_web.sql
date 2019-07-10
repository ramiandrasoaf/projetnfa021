-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2019 at 11:47 AM
-- Server version: 8.0.16
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE `instruments` (
  `id_instru` bigint(20) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Contient le nom de l''instrument',
  `a_propos` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT 'Description de l''instrument',
  `id_instr_type` int(11) NOT NULL COMMENT 'Pointe vers la table "type_d_instrument"',
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'La date d''enregistrement del''instrument',
  `date_modification` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Date de modification de l''enregistrement',
  `id_createur` bigint(20) NOT NULL COMMENT 'Le créateur de l''enregistrement',
  `id_modificateur` bigint(20) DEFAULT NULL COMMENT 'Le modificateur de l''enregistrement'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `types_instrument`
--

CREATE TABLE `types_instrument` (
  `id_instr_type` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `libelle` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'La déscription du type de l''instrument',
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT ' 	La date de l''enregistrement du type de l''instrument',
  `date_modification` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'La date de modification de l''enregistrement',
  `id_createur` bigint(20) NOT NULL COMMENT 'Le créateur de l''enregistrement',
  `id_modificateur` bigint(20) DEFAULT NULL COMMENT 'Le modificateur de l''enregistrement'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contient une liste de type d''instrument';

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` bigint(20) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) NOT NULL COMMENT 'L''email de l''utilisateur',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Mot de pass de l''utlisateur encodé',
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pseudo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'La date de création de l''enregistrement',
  `date_modification` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'La date de modification de l''engresitrement'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `prenom`, `email`, `password`, `phone`, `pseudo`, `date_modification`) VALUES
(4, 'a', 'a', 'aa@fr.fr', '$2y$10$Ff/niS.tgE99.Q6WTTBkOeRdQkY0lbhksOA6hXN/Bu9CV.jKegcM6', 'a', 'a', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instruments`
--
ALTER TABLE `instruments`
  ADD PRIMARY KEY (`id_instru`),
  ADD UNIQUE KEY `idx_instr_nom` (`nom`) USING BTREE,
  ADD KEY `idx_instr_type` (`id_instr_type`),
  ADD KEY `idx_id_createur` (`id_createur`),
  ADD KEY `idx_id_modificateur` (`id_modificateur`) USING BTREE;

--
-- Indexes for table `types_instrument`
--
ALTER TABLE `types_instrument`
  ADD PRIMARY KEY (`id_instr_type`),
  ADD UNIQUE KEY `idx_instr_type_code` (`code`) USING BTREE,
  ADD KEY `idx_id_createur` (`id_createur`) USING BTREE,
  ADD KEY `idx_id_modificateur` (`id_modificateur`) USING BTREE;

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `idx_pseudo` (`pseudo`) USING BTREE,
  ADD UNIQUE KEY `idx_email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instruments`
--
ALTER TABLE `instruments`
  MODIFY `id_instru` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types_instrument`
--
ALTER TABLE `types_instrument`
  MODIFY `id_instr_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `instruments`
--
ALTER TABLE `instruments`
  ADD CONSTRAINT `instruments_ibfk_1` FOREIGN KEY (`id_instr_type`) REFERENCES `types_instrument` (`id_instr_type`) ON DELETE CASCADE,
  ADD CONSTRAINT `instruments_ibfk_2` FOREIGN KEY (`id_createur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE CASCADE,
  ADD CONSTRAINT `instruments_ibfk_3` FOREIGN KEY (`id_modificateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE CASCADE;

--
-- Constraints for table `types_instrument`
--
ALTER TABLE `types_instrument`
  ADD CONSTRAINT `types_instrument_ibfk_1` FOREIGN KEY (`id_createur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE CASCADE,
  ADD CONSTRAINT `types_instrument_ibfk_2` FOREIGN KEY (`id_modificateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
