-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 23 mars 2025 à 20:55
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_bancaire`
--
CREATE DATABASE IF NOT EXISTS `gestion_bancaire` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gestion_bancaire`;

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(4, 'admin1', 'admin@banque.com', '$2y$10$8mQ7M8Wj6Xw44J4lFwpjpe9aRfh6Pc3joOhwK2P/1G.TLsDI7WEse', '2025-03-23 15:09:13', '2025-03-23 18:46:45');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `email`, `telephone`, `adresse`) VALUES
(1, 'Dupont', 'Jean', 'jean.dupont@example.com', '0123456789', '10 rue de la Paix, Paris'),
(2, 'Martin', 'Sophie', 'sophie.martin@example.com', '0698765432', '20 avenue des Fleurs, Lyon'),
(3, 'Lefevre', 'Pierree', 'pierre.lefevre@example.com', '0712345678', '30 boulevard de la Mer, Marseille'),
(4, 'Garcia', 'Marie', 'marie.garcia@example.com', '0498765432', '40 rue du Port, Nice'),
(5, 'Dubois', 'Michel', 'michel.dubois@example.com', '0512345678', '50 avenue de la Gare, Toulouse'),
(6, 'Robert', 'Nathalie', 'nathalie.robert@example.com', '0398765432', '60 rue de la Republique, Lille'),
(8, 'Petit', 'Isabelle', 'isabelle.petit@example.com', '0987654321', '80 rue de la Liberte, Strasbourg'),
(9, 'Durand', 'Laurent', 'laurent.durand@example.com', '0812345678', '90 avenue de la Victoire, Nantes'),
(10, 'Moreau', 'Sandrine', 'sandrine.moreau@example.com', '0798765432', '100 rue du Commerce, Rennes'),
(11, 'Simon', 'Philippe', 'philippe.simon@example.com', '0612345678', '110 avenue de la Paix, Montpellier'),
(15, 'Blanc', 'Patrick', 'patrick.blanc@example.com', '0212345678', '150 avenue des Champs, Reims'),
(16, 'Lambert', 'Martine', 'martine.lambert@example.com', '0987654321', '160 rue de la Republique, Toulon'),
(17, 'Bertrand', 'Alain', 'alain.bertrand@example.com', '0812345678', '170 avenue de la Liberte, Angers'),
(18, 'Thomas', 'Catherine', 'catherine.thomas@example.com', '0798765432', '180 rue du Commerce, Clermont-Ferrand'),
(19, 'Vincent', 'Nicolas', 'nicolas.vincent@example.com', '0612345678', '190 avenue de la Victoire, Limoges'),
(20, 'Clement', 'Valerie', 'valerie.clement@example.com', '0598765432', '200 rue de la Paix, Tours'),
(68, 'ka', 'samba', 'add@gmail.com', '0668997544', '1 Rue Danielle Casanova 78990 TRAPPES');

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `id` int(11) NOT NULL,
  `rib` varchar(34) NOT NULL,
  `typeCompte` varchar(20) NOT NULL,
  `solde` decimal(10,2) NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comptes`
--

INSERT INTO `comptes` (`id`, `rib`, `typeCompte`, `solde`, `idClient`) VALUES
(1, 'FR7699001122334455667788990011', 'Compte courant', 1904.00, 68),
(2, 'FR7655667788990011223344556671', 'Compte epargne', 8500.00, 19),
(3, 'FR7611223344556677889900112231', 'Compte courant', 2600.00, 20),
(4, 'FR7666778899001122334455667781', 'Compte courant', 1300.00, 1),
(5, 'FR7622334455667788990011223341', 'Compte epargne', 7200.00, 2),
(6, 'FR7677889900112233445566778891', 'Compte courant', 3300.00, 3),
(7, 'FR7633445566778899001122334451', 'Compte courant', 2100.00, 4),
(8, 'FR7688990011223344556677889901', 'Compte epargne', 6600.00, 5),
(9, 'FR7644556677889900112233445561', 'Compte courant', 1850.00, 6),
(11, 'FR7655667788990011223344556672', 'Compte epargne', 8200.00, 8),
(12, 'FR7611223344556677889900112232', 'Compte courant', 2700.00, 9),
(13, 'FR7666778899001122334455667782', 'Compte courant', 1400.00, 10),
(14, 'FR7622334455667788990011223342', 'Compte epargne', 7400.00, 11),
(18, 'FR7644556677889900112233445562', 'Compte courant', 1950.00, 15),
(19, 'FR7600112233445566778899001122', 'Compte courant', 2400.00, 16),
(20, 'FR7655667788990011223344556673', 'Compte epargne', 8400.00, 17),
(29, 'FR7645667788990011223344556601', 'Compte courant', 8.00, 68),
(30, 'FR7645667788990011223344556602', 'Compte épargne', 7.00, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rib` (`rib`),
  ADD KEY `idClient` (`idClient`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT pour la table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD CONSTRAINT `comptes_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
