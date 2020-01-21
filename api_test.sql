-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 17 jan. 2020 à 01:01
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `api_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `otpstore`
--

CREATE TABLE `otpstore` (
  `id` int(11) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `is_expired` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `otpstore`
--

INSERT INTO `otpstore` (`id`, `otp`, `is_expired`, `create_at`) VALUES
(1, '9760', 0, '2020-01-13 11:49:24'),
(2, '8005', 1, '2020-01-13 11:52:31'),
(3, '1645', 0, '2020-01-16 23:13:27'),
(4, '8578', 0, '2020-01-16 23:14:03'),
(5, '9425', 0, '2020-01-16 23:16:06'),
(6, '8344', 0, '2020-01-16 23:16:22'),
(7, '1001', 0, '2020-01-16 23:19:36'),
(8, '9654', 1, '2020-01-17 00:08:03');

-- --------------------------------------------------------

--
-- Structure de la table `userprofile`
--

CREATE TABLE `userprofile` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `userprofile`
--

INSERT INTO `userprofile` (`id`, `nom`, `mobile`) VALUES
(0, 'robert', '698711956'),
(0, 'marie', '681855871');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `otpstore`
--
ALTER TABLE `otpstore`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `otpstore`
--
ALTER TABLE `otpstore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
