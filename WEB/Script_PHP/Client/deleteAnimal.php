<?php
    include("Script_PHP/BDDAccess.php");



    $requete=$bdd->prepare('delete from Animal where idAnimal=?');
    $requete->execute(array($_GET['idAnimal']));
    $requete=$bdd->prepare('update Reservation set valide=0 where idAnimal=?');
    $requete->execute(array($_GET['idAnimal']));
?>
<meta http-equiv="refresh" content="1;url=espacePrive.php?init=1"/>

<!--
ALTER TABLE Reservation
  ADD CONSTRAINT fk_reservation_animal FOREIGN KEY (idAnimal) REFERENCES Animal (idAnimal);
