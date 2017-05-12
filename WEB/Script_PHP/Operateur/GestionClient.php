<?php

	if(isset($_SESSION['idClient']))
    unset($_SESSION['idClient']);


		include("Script_PHP/BDDAccess.php");
		$requete;
		if(empty($_POST['choixRecherche'])){
		$requete=$bdd->query('
			select *
			from Client');
		}
		else{
			if($_POST['choixRecherche']=='Login'){
			$requete=$bdd->query('
				select *
				from Client
				where email=\''.$_POST['login'].'\'');
			}
			else{
			$requete=$bdd->query('
				select *
				from Client
				where nom=\''.$_POST['nom'].'\'and prenom =\''.$_POST['prenom'].'\'');
			}
		}
		if($donnees=$requete->fetch()){
		echo("	<table>
					<tr>
						<th>Numéro d'identification</th>
						<th>Email</th>
						<th>Nom</th>
						<th>Prenom</th>
						<th>Telephone</th>
						<th>Adresse</th>
						<th>Reservation</th>
						<th>Animaux</th>
					</tr>
					<tr>	
						<td>".$donnees['idClient']."</td>
						<td>".$donnees['email']."</td>
						<td>".$donnees['nom']."</td>
						<td>".$donnees['prenom']."</td>
						<td>".$donnees['tel']."</td>
						<td>".$donnees['adresse']."</td>
						<td><a href=\"espacePrive.php?action=afficherReservation&amp;idClient=".$donnees['idClient']."\"><button type=\"button\">afficher Reservations</button> </td>
						<td><a href=\"espacePrive.php?action=afficherAnimaux&amp;idClient=".$donnees['idClient']."\"><button type=\"button\">afficher Animaux</button> </td>
					</tr>
				");		
		}
		else{
	    	echo("<h3 style='text-align:center'> Aucun compte client pour le moment </h3>");
		}	
		while($donnees=$requete -> fetch()){
			echo("
						<tr>	
						<td>".$donnees['idClient']."</td>
						<td>".$donnees['email']."</td>
						<td>".$donnees['nom']."</td>
						<td>".$donnees['prenom']."</td>
						<td>".$donnees['tel']."</td>
						<td>".$donnees['adresse']."</td>
						<td><a href=\"espacePrive.php?action=afficherReservation&amp;idClient=".$donnees['idClient']."\"><button type=\"button\">afficher Reservations</button> </td>
						<td><a href=\"espacePrive.php?action=afficherAnimaux&amp;idClient=".$donnees['idClient']."\"><button type=\"button\">afficher Animaux</button> </td>
					</tr>
					");
		}
		echo("</table>");

         

?>
