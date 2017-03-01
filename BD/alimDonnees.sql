insert into Client(login,password,nom,prenom,email,tel,adresse) values ('log1','mdp1','nom1','prenom1','email@hotmail.fr','0143863123','7 rue des potiers');
insert into Client(login,password,nom,prenom,email,tel,adresse) values ('log2','mdp2','nom2','prenom2','email@hotmail.fr','0143970231','9 rue des potiers');
insert into Client(login,password,nom,prenom,email,tel,adresse) values ('log3','mdp3','nom3','prenom3','email@hotmail.fr','0143120571','8 rue des potiers');

insert into Animal(idClient,type,nom,identification,carnetVaccinationValide,dateUpload) values (1,'chat','tigrou','9423XL219',1,'2015-02-11');
insert into Animal(idClient,type,nom,identification,carnetVaccinationValide,dateUpload) values (2,'chat','edgar','0321IEZA231',1,'2015-03-11');
insert into Animal(idClient,type,nom,identification,carnetVaccinationValide,dateUpload) values (1,'chien','jean-pierre','0231LZAE7523',1,'2015-06-01');
insert into Animal(idClient,type,nom,identification,carnetVaccinationValide,dateUpload) values (3,'chien','luna','9932XL23',1,'2015-01-22');
insert into Animal(idClient,type,nom,identification,carnetVaccinationValide,dateUpload) values (3,'rongeur','lerongeur','230MSAZ0214',1,'2015-06-01');

insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide) values (1,1,'2016-05-19','2016-06-21','2016-06-25',125,1);
insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide) values (2,2,'2016-04-26','2016-05-21','2016-05-29',270,1);
insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide) values (3,1,'2016-03-24','2016-02-11','2016-03-25',1505,1);
insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide) values (4,3,'2016-02-20','2016-02-21','2016-02-28',280,1);
insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide) values (5,3,'2016-01-09','2016-01-21','2016-02-12',220,1);
insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide) values (1,1,'2016-11-11','2016-12-06','2016-12-11',180,1);
insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide) values (2,2,'2016-01-01','2016-01-07','2016-01-09',75,1);
insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide) values (3,1,'2016-05-31','2016-06-05','2016-06-25',800,1);

insert into Operateur(login,password,nom,prenom) values('log1','mdp1','nom1','prenom1');
insert into Administrateur(login,password,nom,prenom) values('log1','mdp1','nom1','prenom1');



/*

client réservé en 2016, plus précisément en janvier 2016
Clients ont réservé + de 8j (en plusieurs réservation)
Faire plusieurs animaux

-Client qui a réservé le plus de jours en 2016
-Nbr Client qui ont réservé + de 8j au total en 2016
-Capacité totale de la pension par animal au jour d’aujourd’hui.


Le tarif d’une place isolée est de 30€/jour pour un chat, 40€/jour pour un chien et 15€/jour pour un rongeur.
Le tarif d’une place partagée est de 25€/jour pour un chat, 35€/jour pour un chien et 10€/jour pour un rongeur.
Un supplément de 5€/jour est demandé si le maître souhaite pour son chien une promenade journalière en laisse dans un parc.
*/