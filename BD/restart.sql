drop table Operateur, Reservation, Animal, Administrateur;
drop table Client;



--
-- Base de données :  PDS
--


--
-- Structure de la table Administrateur
--

CREATE TABLE Administrateur (
  idAdministrateur int(11) NOT NULL,
  login varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  nom varchar(255) NOT NULL,
  prenom varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table Animal
--

CREATE TABLE Animal (
  idAnimal int(11) NOT NULL,
  idClient int(11) NOT NULL,
  type enum('rongeur','chat','chien') NOT NULL,
  nom varchar(255) NOT NULL,
  identification varchar(255) NOT NULL,
  carnetVaccinationValide tinyint(1) NOT NULL,
  dateUpload date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table Client
--

CREATE TABLE Client (
  idClient int(11) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  nom varchar(255) NOT NULL,
  prenom varchar(255) NOT NULL,
  tel varchar(12) NOT NULL,
  adresse varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table Operateur
--

CREATE TABLE Operateur (
  idOperateur int(11) NOT NULL,
  login varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  nom varchar(255) NOT NULL,
  prenom varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table Reservation
--

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


--
-- Index pour la table Administrateur
--
ALTER TABLE Administrateur
  ADD PRIMARY KEY (idAdministrateur);

--
-- Index pour la table Animal
--
ALTER TABLE Animal
  ADD PRIMARY KEY (idAnimal);

--
-- Index pour la table Client
--
ALTER TABLE Client
  ADD PRIMARY KEY (idClient);

--
-- Index pour la table Operateur
--
ALTER TABLE Operateur
  ADD PRIMARY KEY (idOperateur);

--
-- Index pour la table Reservation
--
ALTER TABLE Reservation
  ADD PRIMARY KEY (idReservation);

--
-- AUTO_INCREMENT pour la table Administrateur
--
ALTER TABLE Administrateur
  MODIFY idAdministrateur int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table Animal
--
ALTER TABLE Animal
  MODIFY idAnimal int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table Client
--
ALTER TABLE Client
  MODIFY idClient int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table Operateur
--
ALTER TABLE Operateur
  MODIFY idOperateur int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table Reservation
--
ALTER TABLE Reservation
  MODIFY idReservation int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table Animal
--
ALTER TABLE Animal
  ADD CONSTRAINT fk_animal_client FOREIGN KEY (idClient) REFERENCES Client (idClient);

--
-- Contraintes pour la table Reservation
--
ALTER TABLE Reservation
  ADD CONSTRAINT fk_reservation_animal FOREIGN KEY (idAnimal) REFERENCES Animal (idAnimal);

DELIMITER /

DROP FUNCTION IF EXISTS F_Definir_Montant/
DROP FUNCTION IF EXISTS F_Resa_Meme_Animal/
DROP FUNCTION IF EXISTS F_3Resa_Meme_Periode/
DROP PROCEDURE IF EXISTS P_Reservation/
DROP PROCEDURE IF EXISTS P_ANNULE_RESERVATION/



CREATE FUNCTION F_Definir_Montant(duree int,type varchar(255),categorie tinyint,promenade tinyint) RETURNS INT
begin
    DECLARE PrixJour int;
    DECLARE Montant int;

    IF(type = 'chient')
          THEN set PrixJour=40;
      ELSE  IF(type = 'chat')
                THEN set PrixJour=30;
              ELSE set PrixJour=15;
            END IF;
    END IF; 

    IF(catégorie='0') THEN set PrixJour=PrixJour-5;END IF;
    IF(promenade='1') THEN set PrixJour=PrixJour+5;END IF;

    set Montant=Durée*PrixJour;
    return Montant;
end/

CREATE Function F_3Resa_Meme_Periode(idC int,dateDebPotentiel date, dateFinPotentiel date) returns tinyint -- return 1 <=> resa impossible
begin
  WHILE (dateDebPotentiel!=dateFinPotentiel) DO 
    set dateDebPotentiel=DATE_ADD(dateDebPotentiel,interval 1 day);    
      Begin
        DECLARE nbrResaParJour TINYINT DEFAULT 0;
        DECLARE curs_dateD date;
        DECLARE curs_dateF date;
        DECLARE finCurs TINYINT DEFAULT 0;
        DECLARE curs_interval CURSOR
          FOR SELECT dateDebut,dateFin  
              FROM Reservation
              WHERE (idClient=idC) and (valide=1);
        DECLARE CONTINUE HANDLER FOR NOT FOUND SET finCurs = 1;
        OPEN curs_interval;  -- Ouverture du curseur
          valideJour :LOOP
              FETCH curs_interval INTO curs_dateD,curs_dateF;    
                  IF dateDebPotentiel between curs_dateD and curs_dateF then set nbrResaParJour=nbrResaParJour+1; END IF;
                  if(nbrResaParJour>1) then return 1;end if;
                  IF finCurs=1 THEN LEAVE valideJour; END IF;      -- Structure IF pour quitter la boucle à la fin des résultats          
          END LOOP valideJour;
        CLOSE curs_interval;     -- Fermeture du curseur
     End;
     return 0;
  END WHILE;
end/



CREATE FUNCTION F_Resa_Meme_Animal(idA int,dateDebPotentiel date,dateFinPotentiel date) returns tinyint -- return 1 <=> resa impossible
Begin
  WHILE (dateDebPotentiel!=dateFinPotentiel) DO 
    set dateDebPotentiel=DATE_ADD(dateDebPotentiel,interval 1 day);    
      Begin
        DECLARE nbrResaParJour TINYINT DEFAULT 0;
        DECLARE curs_dateD date;
        DECLARE curs_dateF date;
        DECLARE finCurs TINYINT DEFAULT 0;
        DECLARE curs_interval CURSOR
          FOR SELECT dateDebut,dateFin  
              FROM Reservation
              WHERE (idAnimal=idA) and (valide=1);
        DECLARE CONTINUE HANDLER FOR NOT FOUND SET finCurs = 1;
        OPEN curs_interval;  -- Ouverture du curseur
          valideJour :LOOP
              FETCH curs_interval INTO curs_dateD,curs_dateF;    
                  IF dateDebPotentiel between curs_dateD and curs_dateF then set nbrResaParJour=nbrResaParJour+1; END IF;
                  if(nbrResaParJour>0) then return 1;end if;
                  IF finCurs=1 THEN LEAVE valideJour; END IF;      -- Structure IF pour quitter la boucle à la fin des résultats          
          END LOOP valideJour;
        CLOSE curs_interval;     -- Fermeture du curseur
     End;
     return 0;
  END WHILE;
end/



CREATE PROCEDURE P_Reservation(idA int,dateDebut date,duree int,estClient tinyint,estIsole tinyint,promenade tinyint)
begin
  declare dateFin int DEFAULT DATE_ADD(dateDebut,interval duree day);
  declare idC int DEFAULT (select idClient from animal where idAnimal=idA);
  declare type int DEFAULT (select type from animal where idAnimal=idA);
  declare carnetVaccinationValide tinyint DEFAULT( select carnetVaccinationValide from animal where idAnimal=idA);
  IF(carnetVaccinationValide='1') then
    IF(F_Resa_Meme_Animal(idA,dateDebut,dateFin)='1') THEN select 'Votre animal a déjà une reservation sur cette plage de date' as 'Erreur';
    ELSE
      IF(DATE_ADD(NOW(),interval 6 MONTH)>dateDebut) THEN 
          IF(estClient='1') THEN
            IF(duree>7) THEN select 'impossible de réserver pour une durée supérieur à 7 jours si vous effectuez vous même la réservation' as 'Erreur:'; 
            ELSE  IF(F_3Resa_Meme_Periode(idC,dateDebut,dateFin)='1') then select 'impossible de réserver plus de 2 places dans la même période si vous effectuez vous même la réservation' as 'Erreur:';
                  ELSE insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (idA,idC,NOW(),dateDebut,dateFin,F_Definir_Montant(DATEDIFF(dateFin,dateDebut),type,estIsole,promenade),1,estIsole);
                  end if;
            END IF;
          ELSE insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (idA,idC,NOW(),dateDebut,dateFin,F_Definir_Montant(DATEDIFF(dateFin,dateDebut),type,estIsole,promenade),1,estIsole);
          END IF;
      ELSE select 'impossible de réserver 6 mois à l\'avance' as 'Erreur:' ;
      END IF;
    END IF;
  ELSE select 'impossible de réserver tant que le carnet de Vaccination de votre animal n\'est pas à jour' as 'Erreur:';
  END IF;
end/

CREATE PROCEDURE P_ANNULE_RESERVATION(idR int)
begin
  update reservation
  set valide=0
  where (idReservation=idR);
end/ 



DELIMITER ;



insert into Client(email,password,nom,prenom,tel,adresse) values ('emailfake@hotmail.fr','mdp1','nom1','prenom1','0143863123','7 rue des potiers');
insert into Client(email,password,nom,prenom,tel,adresse) values ('emailfake@hotmail.fr','mdp2','nom2','prenom2','0143970231','9 rue des potiers');
insert into Client(email,password,nom,prenom,tel,adresse) values ('emailfake@hotmail.fr','mdp3','nom3','prenom3','0143321451','8 rue des potiers');
insert into Client(email,password,nom,prenom,tel,adresse) values ('emailfake@hotmail.fr','mdp4','nom4','prenom4','0143132571','1 rue des potiers');
insert into Client(email,password,nom,prenom,tel,adresse) values ('emailfake@hotmail.fr','mdp5','nom5','prenom5','0143321351','2 rue des potiers');

insert into Animal(idClient,type,nom,identification,carnetVaccinationValide,dateUpload) values (1,'chat','tigrou','9423XL219',1,'2015-02-11');
insert into Animal(idClient,type,nom,identification,carnetVaccinationValide,dateUpload) values (1,'rongeur','l\'autrerongeur','8321DJEZ213',1,'2015-02-01');
insert into Animal(idClient,type,nom,identification,carnetVaccinationValide,dateUpload) values (2,'chien','jean-pierre','0231LZAE7523',1,'2015-02-01');

insert into Animal(idClient,type,nom,identification,carnetVaccinationValide,dateUpload) values (3,'chat','edgar','0321IEZA231',1,'2015-03-11');

insert into Animal(idClient,type,nom,identification,carnetVaccinationValide,dateUpload) values (4,'chien','luna','9932XL23',1,'2015-01-22');
insert into Animal(idClient,type,nom,identification,carnetVaccinationValide,dateUpload) values (5,'rongeur','lerongeur','230MSAZ0214',1,'2015-02-01');



insert into Reservation(idAnimal,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (1,'2016-03-19','2016-05-21','2016-07-25',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=1),isolé,0),1,0);
insert into Reservation(idAnimal,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (1,'2016-03-24','2017-03-26','2017-04-25',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=1),isolé,1),1,0);
insert into Reservation(idAnimal,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (1,'2017-03-20','2017-04-21','2017-05-28',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=1),isolé,1),1,1);

insert into Reservation(idAnimal,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (2,'2016-01-01','2016-01-07','2016-01-09',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=2),isolé,0),1,1);
insert into Reservation(idAnimal,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (2,'2016-02-28','2016-06-05','2016-08-13',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=2),isolé,0),1,1);
insert into Reservation(idAnimal,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (2,'2016-02-26','2016-06-15','2016-06-25',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=2),isolé,0),1,1);
insert into Reservation(idAnimal,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (2,'2016-02-26','2017-03-22','2017-03-25',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=2),isolé,0),1,0);
insert into Reservation(idAnimal,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (2,'2016-02-22','2017-04-25','2017-06-29',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=2),isolé,0),1,0);

insert into Reservation(idAnimal,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (3,'2016-01-05','2016-07-10','2016-07-29',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=3),isolé,0),1,0);
insert into Reservation(idAnimal,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (3,'2016-07-10','2016-08-12','2016-08-18',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=3),isolé,0),1,0);
insert into Reservation(idAnimal,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (3,'2016-11-11','2016-12-06','2017-05-11',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=3),isolé,0),1,0);

insert into Reservation(idAnimal,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (4,'2016-07-01','2016-07-05','2016-09-11',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=4),isolé,0),1,0);
insert into Reservation(idAnimal,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (4,'2016-07-01','2016-10-02','2016-12-10',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=4),isolé,0),1,0);
insert into Reservation(idAnimal,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (4,'2016-07-01','2017-04-02','2017-07-11',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=4),isolé,0),1,0);

insert into Reservation(idAnimal,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (5,'2016-07-01','2016-07-05','2016-07-21',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=5),isolé,0),1,1);
insert into Reservation(idAnimal,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (5,'2016-07-01','2017-02-02','2017-04-10',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=5),isolé,0),1,1);
insert into Reservation(idAnimal,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (5,'2016-07-01','2017-04-12','2017-07-10',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=5),isolé,0),1,0);

insert into Reservation(idAnimal,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (6,'2016-07-01','2016-06-10','2016-08-20',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=6),isolé,0),1,1);
insert into Reservation(idAnimal,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (6,'2016-07-01','2016-06-02','2016-08-17',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=6),isolé,0),1,0);
insert into Reservation(idAnimal,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (6,'2016-07-01','2017-04-02','2017-05-12',F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=6),isolé,0),1,1);



insert into Operateur(login,password,nom,prenom) values('log1','mdp1','nom1','prenom1');
insert into Administrateur(login,password,nom,prenom) values('log1','mdp1','nom1','prenom1');

/*



Le tarif d’une place isolée est de 30€/jour pour un chat, 40€/jour pour un chien et 15€/jour pour un rongeur.
Le tarif d’une place partagée est de 25€/jour pour un chat, 35€/jour pour un chien et 10€/jour pour un rongeur.
Un supplément de 5€/jour est demandé si le maître souhaite pour son chien une promenade journalière en laisse dans un parc.

*/


