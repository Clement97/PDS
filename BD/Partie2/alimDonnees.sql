DELIMITER /

DROP FUNCTION IF EXISTS F_Definir_Montant/

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