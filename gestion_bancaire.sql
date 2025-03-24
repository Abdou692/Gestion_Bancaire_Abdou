-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 24 mars 2025 à 03:51
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
(4, 'admin1', 'admin@banque.com', '$2y$10$8mQ7M8Wj6Xw44J4lFwpjpe9aRfh6Pc3joOhwK2P/1G.TLsDI7WEse', '2025-03-23 15:09:13', '2025-03-23 18:46:45'),
(5, 'admin2', 'add@gmail.com', '$2y$10$P5AOuv1dApTildac69mUzOrtBNWL.GFqWLDh50Y.3a5wsuq7neANi', '2025-03-23 21:34:36', '2025-03-23 21:34:36');

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
(3, 'Lefevre', 'Pierre', 'pierre.lefevre@example.com', '0712345678', '30 boulevard de la Mer, Marseille'),
(4, 'Garcia', 'Marie', 'marie.garcia@example.com', '0498765432', '40 rue du Port, Nice'),
(9, 'Durand', 'Laurent', 'laurent.durand@example.com', '0812345678', '90 avenue de la Victoire, Nantes'),
(10, 'Assia', 'Yasmine', 'sandrine.moreau@example.com', '0798765432', '100 rue du Commerce, Rennes'),
(16, 'Lambert', 'Martine', 'martine.lambert@example.com', '0987654321', '160 rue de la Republique, Toulon'),
(18, 'Thomas', 'Catherine', 'catherine.thomas@example.com', '0798765432', '180 rue du Commerce, Clermont-Ferrand'),
(19, 'Vincent', 'Nicolas', 'nicolas.vincent@example.com', '0612345678', '190 avenue de la Victoire, Limoges'),
(20, 'Clement', 'Valerie', 'valerie.clement@example.com', '0598765432', '200 rue de la Paix, Tours'),
(68, 'Sow', 'samba', 'add@gmail.com', '0668998044', '1 Rue Danielle Casanova 78990 Dreux');

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
(2, 'FR7655667788990011223344556671', 'Compte epargne', 8500.00, 19),
(3, 'FR7611223344556677889900112231', 'Compte courant', 2600.00, 20),
(4, 'FR7666778899001122334455667781', 'Compte courant', 1300.00, 1),
(7, 'FR7633445566778899001122334451', 'Compte courant', 2100.00, 4),
(12, 'FR7611223344556677889900112232', 'Compte courant', 2700.00, 9),
(13, 'FR7666778899001122334455667782', 'Compte courant', 10000.00, 10),
(19, 'FR7600112233445566778899001122', 'Compte courant', 2400.00, 16),
(29, 'FR7645667788990011223344556601', 'Compte courant', 8.00, 68),
(34, 'FR7645667788990011223344556405', 'Compte epargne', 2000.00, 1),
(35, 'FR7645667788990011223344556345', 'Compte epargne', 5000.00, 10),
(36, 'FR7645667788990011223344559567', 'Compte epargne', 2500.00, 68),
(37, 'FR7645667788990011223344556709', 'Compte courant', 300.00, 19),
(38, 'FR7645667788990011223344559805', 'Compte courant', 450.00, 3),
(39, 'FR7645667788980011223344556456', 'Compte courant', 200.00, 2),
(40, 'FR7645247788990011223344556879', 'Compte courant', 450.00, 18);

-- --------------------------------------------------------

--
-- Structure de la table `contrats`
--

CREATE TABLE `contrats` (
  `id` int(11) NOT NULL,
  `typeContrat` varchar(50) NOT NULL,
  `montantSouscrit` decimal(10,0) NOT NULL,
  `duree` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `idClient` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contrats`
--

INSERT INTO `contrats` (`id`, `typeContrat`, `montantSouscrit`, `duree`, `dateDebut`, `dateFin`, `idClient`) VALUES
(1, 'Pret immobilier', 250000, 360, '2023-01-15', '2053-01-15', 1),
(2, 'Assurance vie', 50000, 120, '2022-05-10', '2032-05-10', 2),
(3, 'Pret personnel', 10000, 24, '2023-03-01', '2025-03-01', 3),
(4, 'Compte Epargne Logement (CEL)', 100000, 12, '2024-03-01', '2025-03-01', 4),
(5, 'Pret immobilier', 300000, 240, '2023-06-20', '2043-06-20', 9),
(6, 'Assurance vie', 75000, 180, '2022-11-05', '2037-11-05', 10),
(7, 'Pret personnel', 15000, 36, '2023-09-12', '2026-09-12', 16),
(8, 'Compte Epargne Logement (CEL)', 50000, 24, '2024-01-01', '2026-01-01', 18),
(9, 'Pret immobilier', 280000, 300, '2023-04-25', '2048-04-25', 19),
(10, 'Assurance vie', 60000, 150, '2022-08-18', '2035-08-18', 20),
(11, 'Pret personnel', 12000, 30, '2023-07-03', '2025-01-03', 68);

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
-- Index pour la table `contrats`
--
ALTER TABLE `contrats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idClient` (`idClient`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT pour la table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `contrats`
--
ALTER TABLE `contrats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD CONSTRAINT `comptes_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `contrats`
--
ALTER TABLE `contrats`
  ADD CONSTRAINT `contrats_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
