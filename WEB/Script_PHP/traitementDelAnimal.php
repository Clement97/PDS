<?php
	$idAnimal=$_GET['idAnimal'];
	include("Script_PHP/BDDAccess.php");
	$requete=$bdd->prepare('delete from Animal where idAnimal=?');
	$requete->execute(array($idAnimal));
?>