-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Lun 20 Février 2017 à 15:59
-- Version du serveur :  5.6.28
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `PDS`
--

-- --------------------------------------------------------
/*
Le tarif d’une place isolée est de 30€/jour pour un chat, 40€/jour pour un chien et 15€/jour pour un rongeur.
Le tarif d’une place partagée est de 25€/jour pour un chat, 35€/jour pour un chien et 10€/jour pour un rongeur.
Un supplément de 5€/jour est demandé si le maître souhaite pour son chien une promenade journalière en laisse dans un parc.

*/


--
-- Structure de la table `Administrateur`
--

CREATE TABLE `Administrateur` (
  `idAdministrateur` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Animal`
--

CREATE TABLE `Animal` (
  `idAnimal` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `identification` varchar(255) NOT NULL,
  `carnetVaccinationValide` tinyint(1) NOT NULL,
  `dateUpload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Client`
--

CREATE TABLE `Client` (
  `idClient` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Operateur`
--

CREATE TABLE `Operateur` (
  `idOperateur` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Reservation`
--

CREATE TABLE `Reservation` (
  `idReservation` int(11) NOT NULL,
  `idAnimal` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `dateReservation` date NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `montant` int(11) NOT NULL,
  `valide` tinyint(1) NOT NULL,
  `isolé` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Index pour les tables exportées
--

--
-- Index pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  ADD PRIMARY KEY (`idAdministrateur`);

--
-- Index pour la table `Animal`
--
ALTER TABLE `Animal`
  ADD PRIMARY KEY (`idAnimal`);

--
-- Index pour la table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `Operateur`
--
ALTER TABLE `Operateur`
  ADD PRIMARY KEY (`idOperateur`);

--
-- Index pour la table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`idReservation`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  MODIFY `idAdministrateur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Animal`
--
ALTER TABLE `Animal`
  MODIFY `idAnimal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Client`
--
ALTER TABLE `Client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Operateur`
--
ALTER TABLE `Operateur`
  MODIFY `idOperateur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Animal`
--
ALTER TABLE `Animal`
  ADD CONSTRAINT `fk_animal_client` FOREIGN KEY (`idClient`) REFERENCES `Client` (`idClient`);

--
-- Contraintes pour la table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `fk_reservation_animal` FOREIGN KEY (`idAnimal`) REFERENCES `Animal` (`idAnimal`),
  ADD CONSTRAINT `fk_reservation_client` FOREIGN KEY (`idClient`) REFERENCES `Client` (`idClient`);
