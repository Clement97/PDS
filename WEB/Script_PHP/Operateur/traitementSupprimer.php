<?php


    include("Script_PHP/BDDAccess.php");



    if(isset($_SESSION['idClient'])){
	    $requete=$bdd->prepare('update Reservation set valide=0 where idAnimal in (select idAnimal from Animal where idClient=?)');
	    $requete->execute(array($_SESSION['idClient']));
	    $requete=$bdd->prepare('delete from Animal where idClient=?');
	    $requete->execute(array($_SESSION['idClient']));
	    $requete=$bdd->prepare('delete from Client where idClient=?');
	    $requete->execute(array($_SESSION['idClient']));
	    
    }elseif(isset($_SESSION['idOperateur'])){
	    $requete=$bdd->prepare('delete from Operateur where idOperateur=?');
	    $requete->execute(array($_SESSION['idOperateur']));

    }elseif(isset($_SESSION['idAdministrateur'])){
	    $requete=$bdd->prepare('delete from Administrateur where idAdministrateur=?');
	    $requete->execute(array($_SESSION['idAdministrateur']));

    }elseif(isset($_SESSION['idReservation'])){
	    $requete=$bdd->prepare('update Reservation set valide=0 where idReservation=?');
	    $requete->execute(array($_SESSION['idReservation']));

    }elseif(isset($_SESSION['idAnimal'])){
	    $requete=$bdd->prepare('update Reservation set valide=0 where idAnimal=?');
	    $requete->execute(array($_SESSION['idAnimal']));
	    $requete=$bdd->prepare('delete from Animal where idAnimal=?');
	    $requete->execute(array($_SESSION['idAnimal']));
    }





?>

