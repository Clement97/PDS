DELIMITER /

DROP FUNCTION IF EXISTS F_Definir_Montant/
DROP FUNCTION IF EXISTS F_3Resa_Meme_Periode/
DROP PROCEDURE IF EXISTS F_3Resa_Meme_Periode/

DROP PROCEDURE IF EXISTS P_Reservation/

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

CREATE Procedure F_3Resa_Meme_Periode(idC int,dateDebPotentiel date, dateFinPotentiel date)
begin

  Declare firstDate date;
  Declare lastDate date;
  set firstDate = (select min(dateDebut) from reservation where idClient=idC);
  set lastDate =(select max(dateFin) from reservation where idClient=idC);
  select firstDate;
  select lastDate;
      WHILE (firstDate!=lastDate) DO 
        set firstDate=DATE_ADD(firstDate,interval 1 day);    
          Begin
            DECLARE nbrResaParJour TINYINT DEFAULT 0;
            DECLARE curs_dateD date;
            DECLARE curs_dateF date;
            DECLARE finCurs TINYINT DEFAULT 0;
            DECLARE curs_interval CURSOR
              FOR SELECT dateDebut,dateFin  -- remplacer cette requête par une préparé )
              FROM Reservation
              WHERE (idClient=idC) and (valide=1); 

            DECLARE CONTINUE HANDLER FOR NOT FOUND SET finCurs = 1; 

            OPEN curs_interval;  -- Ouverture du curseur
              valideJour :LOOP
                  FETCH curs_interval INTO curs_dateD,curs_dateF;    
                  IF firstDate between curs_dateD and curs_dateF then set nbrResaParJour=nbrResaParJour+1; END IF;
                  IF finCurs=1 THEN LEAVE valideJour; END IF;      -- Structure IF pour quitter la boucle à la fin des résultats
              END LOOP valideJour;
            CLOSE curs_interval;     -- Fermeture du curseur
             if(nbrResaParJour>3)then select 'return false';end if;
          End;

      END WHILE;
        



      -- déployer un curseur et voir pour chaque dateDebPotentiel et dateFinPotentiel si cela se trouve entre
      -- mettre dateDebPotentiel et dateFinPotentiel en arg

end/

CALL F_3Resa_Meme_Periode(1,'2012-02-20','2012-03-20')/

-- TYPE mon_tableau IS VARRAY(8) OF VARCHAR2(10) ; 
-- TYPE TabInt IS VARRAY(select count(*) from reservation where )
  -- select firstDate;
  -- select lastDate;

-- CREATE PROCEDURE P_Reservation(operateur tinyint,categorie tinyint,dateDebut date,duree int,idA int,promenade tinyint,valide tinyint, idC int)
-- begin
--   IF(DATE_ADD(NOW(),interval 6 MONTH)>dateDebut) THEN select operateur;
--       IF(operateur='1') THEN
--         IF(duree>7) THEN select 'impossible de réserver pour une durée supérieur à 7 jours si vous effectuez vous même la réservation' as 'Erreur:'; 
--         ELSE 
--           insert into Reservation(idAnimal,idClient,dateReservation,dateDebut,dateFin,montant,valide,isolé) values (idA,idClient,NOW,dateDebut,DATE_ADD(dateDebut,interval duree day),F_Definir_Montant(DATEDIFF(dateFin,dateDebut),(select type from animal where idAnimal=idA),isolé,promenace),valide,isolé);
--           IF(>2) then select 'impossible de réserver plus de 2 places dans la même période si vous effectuez vous même la réservation' as 'Erreur:'; ;end if;
--         END IF;
--       ELSE select operateur;
--       END IF;


--   ELSE select 'impossible de réserver 6 mois à l\'avance' as 'Erreur:' ;
--   END IF;
-- end/




-- CALL P_Reservation(1,1,'2020-01-01',4,2,1,4)/

-- select (('2015-05-05','2015-05-25') OVERLAPS ('2015-05-03','2015-05-20'));




DELIMITER ;

  /*
  CREATE PROCEDURE update_instruct_age()
BEGIN
    DECLARE v_date date;
    DECLARE v_id int;
    DECLARE fin TINYINT DEFAULT 0;                      



    DECLARE curs_interval CURSOR
        FOR SELECT DateNaissance,PiloteNum  -- Le SELECT récupère deux colonnes
        FROM ac_pilotes; -- On trie les clients par ordre alphabétique

    -- Gestionnaire d'erreur pour la condition NOT FOUND
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET fin = 1; 

    OPEN curs_interval;  -- Ouverture du curseur

      lol :LOOP

        FETCH curs_interval INTO v_date,v_id;    
        update ac_vols
        SET instruct_age= F_age(v_date,null)
        where v_id=lpl_ptr_instruct;

          -- Structure IF pour quitter la boucle à la fin des résultats
          IF fin = 1 THEN 
              LEAVE lol;
          END IF;

     END LOOP lol;
        


    CLOSE curs_interval;     -- Fermeture du curseur
        

END|


P_RESERVATION (type de place, date, durée, animal, promenade, client)
Cette procédure réserve une place à un animal donné d’un client donné pour une date donnée.
 D’autres paramètres sont à déterminer en option. Cette procédure doit tenir compte des règles métier suivantes :

la réservation ne peut excéder une semaine pour une réservation effectuée par le client lui-même.
Une réservation n’est possible que jusque 6 mois à l’avance.
Un client ne peut réserver plus de 2 places pour la même période lorsque la  réservation est effectuée directement par ses soins. 
P_ANNULE_RESERVATION() 


  DECLARE PrixJour int;
  DECLARE Montant int;

    IF(type = 'chient')
          THEN set PrixJour=40
      ELSE IF(type = 'chat')
          THEN set PrixJour=30;
      ELSE set PrixJour=15;
    END IF;

    IF(catégorie='0') THEN set PrixJour=PrixJour-5;END IF;
    IF(promenade='1') THEN set PrixJour=PrixJour+5;END IF;

    set Montant=Durée*PrixJour;
    return Montant;

    faire la fonction et les 2 procédures
    demander si rajouter "promenade" à la structure est vrmt essentiel ?( autre que pr le montant)

    faire gaf à la position de isolé par rapport à Montant(appel de la fct)

  */