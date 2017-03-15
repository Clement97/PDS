drop table Operateur, Reservation, Animal, Administrateur;
drop table Client;


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

insert into Client(login,password,nom,prenom,email,tel,adresse) values ('log1','mdp1','nom1','prenom1','email@hotmail.fr','0143863123','7 rue des potiers');
insert into Client(login,password,nom,prenom,email,tel,adresse) values ('log2','mdp2','nom2','prenom2','email@hotmail.fr','0143970231','9 rue des potiers');
insert into Client(login,password,nom,prenom,email,tel,adresse) values ('log3','mdp3','nom3','prenom3','email@hotmail.fr','0143120571','8 rue des potiers');

insert into Animal(idClient,type,nom,identification,carnetVaccinationValide,dateUpload) values (1,'chat','tigrou','9423XL219',1,'2015-02-11');
insert into Animal(idClient,type,nom,identification,carnetVaccinationValide,dateUpload) values (2,'chat','edgar','0321IEZA231',1,'2015-03-11');
insert into Animal(idClient,type,nom,identification,carnetVaccinationValide,dateUpload) values (1,'chien','jean-pierre','0231LZAE7523',1,'2015-02-01');
insert into Animal(idClient,type,nom,identification,carnetVaccinationValide,dateUpload) values (3,'chien','luna','9932XL23',1,'2015-01-22');
insert into Animal(idClient,type,nom,identification,carnetVaccinationValide,dateUpload) values (3,'rongeur','lerongeur','230MSAZ0214',1,'2015-02-01');
insert into Animal(idClient,type,nom,identification,carnetVaccinationValide,dateUpload) values (1,'rongeur','l\'autrerongeur','8321DJEZ213',1,'2015-02-01');

insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (1,1,'2016-05-19','2016-02-21','2016-02-25',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=1),isolé,0),1,0);
insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (2,2,'2016-04-26','2016-05-21','2016-05-29',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=2),isolé,0),1,0);
insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (3,1,'2016-03-24','2016-02-11','2016-03-25',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=3),isolé,1),1,0);
insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (4,3,'2016-02-20','2016-02-21','2016-02-28',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=4),isolé,1),1,1);
insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (5,3,'2016-01-09','2016-01-21','2016-02-12',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=5),isolé,0),1,1);
insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (1,1,'2016-11-11','2016-12-06','2016-12-11',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=1),isolé,0),1,0);
insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (2,2,'2016-01-01','2016-01-07','2016-01-09',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=2),isolé,0),1,1);
insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (3,1,'2016-05-31','2016-06-05','2016-06-25',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=3),isolé,0),1,1);
insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (1,1,'2016-02-26','2016-02-15','2016-02-25',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=1),isolé,0),1,0);
insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (2,2,'2016-02-26','2016-02-22','2016-02-25',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=2),isolé,0),1,1);
insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (5,3,'2016-02-22','2016-02-20','2016-02-29',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=5),isolé,0),1,0);
insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (5,3,'2016-07-05','2016-07-10','2016-07-29',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=1),isolé,0),1,0);
insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (6,1,'2016-07-10','2016-07-12','2016-07-18',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=6),isolé,0),1,0);
insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (6,1,'2016-07-01','2016-07-02','2016-07-10',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=6),isolé,0),1,1);


insert into Operateur(login,password,nom,prenom) values('log1','mdp1','nom1','prenom1');
insert into Administrateur(login,password,nom,prenom) values('log1','mdp1','nom1','prenom1');