<?php
    include("Script_PHP/BDDAccess.php");
    $requete=$bdd->prepare('delete from Animal where idAnimal=?');
    $requete->execute(array($_GET['idAnimal']));
    $requete=$bdd->prepare('update Reservation set valide=0 where idAnimal=?');
    $requete->execute(array($_GET['idAnimal']));
?>