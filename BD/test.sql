-- CREATE PROCEDURE P_Reservation(idA int,dateDebut date,duree int,estClient tinyint,estIsole tinyint,promenade tinyint)

-- CALL P_Reservation(1,'2017-10-16',7,1,1,0);

/*

42 chats en communauté, 10 chats isolés
30 chiens en communauté, 10 chiens isolés
18 rongeurs avec leur cage en communauté, 5 rongeurs isolés.

 (1,'chat','tigrou','9423XL219',1,'2015-02-11');
 (1,'rongeur','l\'autrerongeur','8321DJEZ213',1,'2015-02-01');
 (2,'chien','jean-pierre','0231LZAE7523',1,'2015-02-01');

 (3,'chat','edgar','0321IEZA231',1,'2015-03-11');

 (4,'chien','luna','9932XL23',1,'2015-01-22');
 (5,'rongeur','lerongeur','230MSAZ0214',1,'2015-02-01');

*/


-- (YEAR(dateDebut)<'2016' or (YEAR(dateDebut)='2016' and MONTH(dateDebut)=<'07')) and (YEAR(dateFin)>'2016' or (YEAR(dateFin)='2016' and MONTH(dateFin)=>'07'))
