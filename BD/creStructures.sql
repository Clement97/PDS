--
-- Base de données :  PDS
--



-- Structure de la table Administrateur


CREATE TABLE Administrateur (
  idAdministrateur int(11) NOT NULL,
  login varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  nom varchar(255) NOT NULL,
  prenom varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* _-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_- */


-- Structure de la table Animal

CREATE TABLE Animal (
  idAnimal int(11) NOT NULL,
  idClient int(11) NOT NULL,
  type enum('rongeur','chat','chien') NOT NULL,
  nom varchar(255) NOT NULL,
  identification varchar(255) NOT NULL,
  carnetVaccinationValide tinyint(1) NOT NULL,
  dateUpload date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* _-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_- */

-- Structure de la table Client

CREATE TABLE Client (
  idClient int(11) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  nom varchar(255) NOT NULL,
  prenom varchar(255) NOT NULL,
  tel varchar(12) NOT NULL,
  adresse varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* _-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_- */

-- Structure de la table Operateur

CREATE TABLE Operateur (
  idOperateur int(11) NOT NULL,
  login varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  nom varchar(255) NOT NULL,
  prenom varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* _-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_- */


-- Structure de la table Reservation

CREATE TABLE Reservation (
  idReservation int(11) NOT NULL,
  idAnimal int(11) NOT NULL,
  dateReservation date NOT NULL,
  dateDebut date NOT NULL,
  dateFin date NOT NULL,
  montant int(11) NOT NULL,
  valide tinyint(1) NOT NULL,
  isolé tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/* _-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_- */

-- Clés primaires

ALTER TABLE Administrateur
  ADD PRIMARY KEY (idAdministrateur);

ALTER TABLE Animal
  ADD PRIMARY KEY (idAnimal);

ALTER TABLE Client
  ADD PRIMARY KEY (idClient);

ALTER TABLE Operateur
  ADD PRIMARY KEY (idOperateur);

ALTER TABLE Reservation
  ADD PRIMARY KEY (idReservation);

/* _-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_- */

-- Auto Increment pour les clés primaires

ALTER TABLE Administrateur
  MODIFY idAdministrateur int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE Animal
  MODIFY idAnimal int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE Client
  MODIFY idClient int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE Operateur
  MODIFY idOperateur int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE Reservation
  MODIFY idReservation int(11) NOT NULL AUTO_INCREMENT;

/* _-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_- */

-- Clés étrangères

ALTER TABLE Animal
  ADD CONSTRAINT fk_animal_client FOREIGN KEY (idClient) REFERENCES Client (idClient);

ALTER TABLE Reservation
  ADD CONSTRAINT fk_reservation_animal FOREIGN KEY (idAnimal) REFERENCES Animal (idAnimal);
