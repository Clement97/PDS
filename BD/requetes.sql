/*

Le tarif d’une place isolée est de 30€/jour pour un chat, 40€/jour pour un chien et 15€/jour pour un rongeur.
Le tarif d’une place partagée est de 25€/jour pour un chat, 35€/jour pour un chien et 10€/jour pour un rongeur.
Un supplément de 5€/jour est demandé si le maître souhaite pour son chien une promenade journalière en laisse dans un parc.
o 42 chats en communauté, 10 chats isolés
o 30 chiens en communauté, 10 chiens isolés
o 18 rongeurs avec leur cage en communauté, 5 rongeurs isolés.

Formulez dans le langage SQL les demandes ci-dessous :

*/

-- R1 : Quel est le client ayant réservé le plus de journées en 2016 ? 

select idClient,C.nom,C.prenom,sum(365-(IF(YEAR(dateDebut)<='2016',datediff(dateDebut,'2016-01-01'),0))-(IF(YEAR(dateFin)>='2016',datediff('2016-12-31',dateFin),0))) as NbrJourReservésMaxEn2016
from Animal join reservation using(idAnimal) join Client as C using(idClient)
where (YEAR(dateDebut)<='2016' and YEAR(dateFin)>='2016') and (valide=1)
group by idClient
limit 1;


-- R2 : Combien de clients ont-ils réservé plus de 8 jours au total en 2016 ?

select count(*) as NbrClient
from (select idClient,C.nom,C.prenom,sum(datediff(dateFin,dateDebut)) as NbrJourReservésMax
    from Animal join reservation using(idAnimal) join Client as C using(idClient)
    where (YEAR(dateDebut)<='2016' and YEAR(dateFin)>='2016') and (valide=1)
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
    where (NOW() between dateDebut and dateFin) and valide=1
    group by concat(type,isolé)) as T2
  on concat(T1.isolé,T1.type)=concat(T2.isolé,T2.type)
  order by PlacesDisponibles DESC


-- R4 : Quel est le chiffre d’affaire réalisé en Janvier 2016 ?

select sum(Montant) as ChiffreAffaireJanvier2016
from reservation
where YEAR(dateReservation)='2016' and MONTH(dateReservation)='01' and (valide=1)	
	-- on considère ici que le chiffre d'affaire correspond au moment ou l'argent est reçu
	-- ainsi l'argent est reçu au moment de la réservation, c'est pourquoi nous prenons la date de reservation comme condition dans le where

-- R5: Quel est le taux d’occupation moyen du mois de Juillet 2016 pour les rongeurs ?

Select Catégorie ,(100*nbrJourJuillet2016)/(31*IF(Catégorie='isolé',5,18)) as TauxOccupationJuillet2016
from(
      select IF(isolé,'isolé','groupe')as Catégorie,sum( IF(YEAR(dateDebut)<'2016',0,IF(MONTH(dateDebut)<'07',0,DATEDIFF('2016-07-01',dateDebut)))
                                                        +IF(YEAR(dateFin)>'2016',0,IF(MONTH(dateFin)>'07',0,DATEDIFF(dateFin,'2016-07-31')))
                                                        +31) as nbrJourJuillet2016
      from Reservation join animal using(idAnimal)
      where (type='rongeur') and (YEAR(dateDebut)<'2016' or (YEAR(dateDebut)='2016' and MONTH(dateDebut)<='07')) and (YEAR(dateFin)>'2016' or (YEAR(dateFin)='2016' and MONTH(dateFin)>='07')) and (valide=1)
      group by isolé
) as SubQuerry



