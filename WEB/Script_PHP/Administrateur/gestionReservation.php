<?php

    function gestion(&$isole){
        if($isole==1){
            return "Seul";
        }
        else return "En groupe";
    }


    include("Script_PHP/BDDAccess.php");

    $requete=$bdd->prepare('
        select idReservation,a.nom,dateReservation,dateDebut,dateFin,montant,isolé 
        from Reservation join Animal as a using(idAnimal) join Client using(idClient)
         where idClient=? and valide=1
         order by dateDebut');
    $requete->execute(array($_SESSION['idClient']));

    if($donnees=$requete -> fetch()){
    echo("  <table>
                <tr>
                    <th>Numéro</th>
                    <th>Nom</th>
                    <th>Date de réservation</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Montant</th>
                    <th>Gestion</th>
                    <th>Modifier</th>
                    <th>Annuler</th>
                </tr>
                <tr>    
                    <td>".$donnees['idReservation']."</td>
                    <td>".$donnees['nom']."</td>
                    <td>".$donnees['dateReservation']."</td>
                    <td>".$donnees['dateDebut']."</td>
                    <td>".$donnees['dateFin']."</td>
                    <td>".$donnees['montant']."</td>
                    <td>".gestion($donnees['isolé'])."</td>
                    <td><a href=\"espacePrive.php?action=modifier&amp;idReservation=".$donnees['idReservation']."\"><button type=\"button\" >M</button> </td></td>
                    <td><button type=\"button\" name=".$donnees['idReservation'].">X</button> </td>
                </tr>
        ");
    }
    else{
    	echo("<script> alert('Ce client n\'a pas de réservations actuellement'); </script>");
		echo("<script>document.location.replace('espacePrive.php?init=1');</script>");
    }
    while($donnees=$requete -> fetch()){
    echo("
                <tr>    
                    <td>".$donnees['idReservation']."</td>
                    <td>".$donnees['nom']."</td>
                    <td>".$donnees['dateReservation']."</td>
                    <td>".$donnees['dateDebut']."</td>
                    <td>".$donnees['dateFin']."</td>
                    <td>".$donnees['montant']."</td>
                    <td>".gestion($donnees['isolé'])."</td>
                    <td><a href=\"espacePrive.php?action=modifier&amp;idReservation=".$donnees['idReservation']."\"><button type=\"button\" >M</button> </td></td>
                    <td><button type=\"button\" name=".$donnees['idReservation'].">X</button> </td>
                </tr>    "); 
    }
    echo("  </table>"); 

?>