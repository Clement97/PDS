<?php
    include("Script_PHP/BDDAccess.php");
    $requete=$bdd->prepare('update Reservation set valide=0 where idReservation=?');
    $requete->execute(array($_GET['idReservation']));
?>
<meta http-equiv="refresh" content="1;url=espacePrive.php?init=1"/>

