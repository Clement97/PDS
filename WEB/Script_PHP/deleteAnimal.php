<?php
    include("Script_PHP/BDDAccess.php");

    $requete=$bdd->query('alter table Reservation drop foreign key fk_reservation_animal');

    $requete=$bdd->prepare('delete from Reservation idAnimal=?');
    $requete->execute(array($_GET['idAnimal']));


    $requete=$bdd->prepare('delete from Animal where idAnimal=?');
    $requete->execute(array($_GET['idAnimal']));

    $requete=$bdd->query('ALTER TABLE Reservation ADD CONSTRAINT fk_reservation_animal FOREIGN KEY (idAnimal) REFERENCES Animal (idAnimal)');


?>
<!--
ALTER TABLE Reservation
  ADD CONSTRAINT fk_reservation_animal FOREIGN KEY (idAnimal) REFERENCES Animal (idAnimal);
