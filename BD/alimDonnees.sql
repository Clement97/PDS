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

/*



Le tarif d’une place isolée est de 30€/jour pour un chat, 40€/jour pour un chien et 15€/jour pour un rongeur.
Le tarif d’une place partagée est de 25€/jour pour un chat, 35€/jour pour un chien et 10€/jour pour un rongeur.
Un supplément de 5€/jour est demandé si le maître souhaite pour son chien une promenade journalière en laisse dans un parc.

*/