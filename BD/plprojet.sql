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