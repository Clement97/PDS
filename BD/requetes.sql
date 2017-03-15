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

*/

-- R1 : Quel est le client ayant réservé le plus de journées en 2016 ? 

select idClient,nom,prenom,sum(datediff(dateFin,dateDebut)) as NbrJourReservésMax
from Client join Reservation using(idClient)
group by idClient
limit 1;

-- R2 : Combien de clients ont-ils réservé plus de 8 jours au total en 2016 ?

select count(*)
from (select idClient,nom,prenom,sum(datediff(dateFin,dateDebut)) as NbrJourReservésMax
		from Client join Reservation using(idClient)
		where YEAR(dateDebut) = '2016'
		group by idClient) as SubQuery
where NbrJourReservésMax>8;

-- R3: Quelle est la capacité totale de la pension à ce jour pour chaque type d’animal ?

	select distinct T1.type as Type,IF(T1.isolé,'isolé','groupe') as Catégorie ,NbrPlaceMax-IF(PlaceUtilise is NULL,0,PlaceUtilise) as PlacesDisponibles
	from 		
		(select distinct type,isolé,IF(isolé='1',IF(type = 'chien',10,IF(type = 'chat',10,IF(type = 'rongeur',5,0))),IF(type = 'chien',30,IF(type = 'chat',42,IF(type = 'rongeur',18,0)))) as NbrPlaceMax
		from Animal join Reservation using (idAnimal)) as T1
	left outer join
		(select type,isolé,count(*) as PlaceUtilise
		from Animal join Reservation using (idAnimal)
		where ('2016-02-21' between dateDebut and dateFin) and valide=1
		group by concat(type,isolé)) as T2
	on concat(T1.isolé,T1.type)=concat(T2.isolé,T2.type)
	order by PlacesDisponibles DESC

--modif requête précédente pr faire avec le NOW() date d'auj et donc modif alimDonnes de façon à mettre des dates en avril-mai-juin 2017

-- R4 : Quel est le chiffre d’affaire réalisé en Janvier 2016 ?

select sum(Montant) as ChiffreAffaireJanvier2016
from reservation
where YEAR(dateReservation)='2016' and MONTH(dateReservation)='01' and (valide=1)

-- R5: Quel est le taux d’occupation moyen du mois de Juillet 2016 pour les rongeurs ?

select IF(isolé,'isolé','groupe')as Catégorie,concat(IF(isolé,100*(DATEDIFF('2016-07-01',dateDebut)+DATEDIFF(dateFin,'2016-07-31')+31)/(5*31),100*(DATEDIFF('2016-07-01',dateDebut)+DATEDIFF(dateFin,'2016-07-31')+31)/(18*31)),'%') as TauxOccupationJuillet2016
from Reservation join animal using(idAnimal)
where (type='rongeur') and (MONTH(dateDebut)='07') and (YEAR(dateDebut)='2016') and (valide=1)
group by isolé


-- modif alim pr des resa qui sont a cheval sur juin/juillet ou juillet/aout


