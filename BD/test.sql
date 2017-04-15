Select Catégorie ,(100*nbrJourJuillet2016)/(31*IF(Catégorie='isolé',5,18)) as TauxOccupationJuillet2016
from(
      select IF(isolé,'isolé','groupe')as Catégorie,sum( IF(YEAR(dateDebut)<'2016',0,IF(MONTH(dateDebut)<'07',0,DATEDIFF('2016-07-01',dateDebut)))
                                                        +IF(YEAR(dateFin)>'2016',0,IF(MONTH(dateFin)>'07',0,DATEDIFF(dateFin,'2016-07-31')))
                                                        +31) as nbrJourJuillet2016
      from Reservation join animal using(idAnimal)
      where (type='rongeur') and (YEAR(dateDebut)<'2016' or (YEAR(dateDebut)='2016' and MONTH(dateDebut)<='07')) and (YEAR(dateFin)>'2016' or (YEAR(dateFin)='2016' and MONTH(dateFin)>='07')) and (valide=1)
      group by isolé
) as SubQuerry


/*

42 chats en communauté, 10 chats isolés
30 chiens en communauté, 10 chiens isolés
18 rongeurs avec leur cage en communauté, 5 rongeurs isolés.

*/


-- (YEAR(dateDebut)<'2016' or (YEAR(dateDebut)='2016' and MONTH(dateDebut)=<'07')) and (YEAR(dateFin)>'2016' or (YEAR(dateFin)='2016' and MONTH(dateFin)=>'07'))
