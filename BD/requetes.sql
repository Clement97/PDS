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
o 42 chats en communauté, 10 chats isolés
o 30 chiens en communauté, 10 chiens isolés
o 18 rongeurs avec leur cage en communauté, 5 rongeurs isolés.

Formulez dans le langage SQL les demandes ci-dessous :
Quel est le client ayant réservé le plus de journées en 2016 ? 

select idClient,nom,prenom,sum(datediff(dateFin,dateDebut)) as NbrJourReservésMax
from Client join Reservation using(idClient)
group by idClient
limit 1;

Combien de clients ont-ils réservé plus de 8 jours au total en 2016 ?

select count(*)
from (select idClient,nom,prenom,sum(datediff(dateFin,dateDebut)) as NbrJourReservésMax
		from Client join Reservation using(idClient)
		where YEAR(dateDebut) = '2016'
		group by idClient) as SubQuery
where NbrJourReservésMax>8;

Quelle est la capacité totale de la pension à ce jour pour chaque type d’animal ?

select type,isolé,nbrPlaceMax-count(*) as nbrPlaceDispo
from (
	select type,isolé,count(*),IF(isolé='1',IF(type = 'chien',10,IF(type = 'chat',10,IF(type = 'rongeur',5,0))),IF(type = 'chien',30,IF(type = 'chat',42,IF(type = 'rongeur',18,0)))) as NbrPlaceMax
	from Animal join Reservation using (idAnimal)
	where ('2016-02-21' between dateDebut and dateFin) and valide=1
	group by NbrPlaceMax) as SubQuery
group by NbrPlaceMax


Quel est le chiffre d’affaire réalisé en Janvier 2016 ?
Quel est le taux d’occupation moyen du mois de Juillet 2016 pour les rongeurs ?

*/

-- select type,isolé, IF(isolé='1',IF(type = 'chien',10,IF(type = 'chat',10,IF(type = 'rongeur',5,0))),IF(type = 'chien',30,IF(type = 'chat',42,IF(type = 'rongeur',18,0)))) as NbrPlaceMax
-- from Animal join Reservation using (idAnimal);

