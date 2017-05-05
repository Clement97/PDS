<h2> mes animaux</h2>

<?php
	
	function estVide(&$identification){
		if ($identification==''){
			return 'aucune';
		}else return $identification;
	}

	function est1(&$carnetVaccinationValide){
		if($carnetVaccinationValide==1){
			return 'valide';
		}else return 'non valide';
	}

	include("Script_PHP/BDDAccess.php");

	$requete=$bdd->prepare('select type,nom,identification,carnetVaccinationValide,dateUpload,idAnimal from Animal where idClient=?');
	$requete->execute(array($_SESSION['id']));

	// mettre à jour avant affichage si le carnet de vaccination est toujours valide
	if($donnees=$requete -> fetch()){
	echo("	<table>
				<tr>
					<th>nom</th>
					<th>type</th>
					<th>identification</th>
					<th>Etat Carnet</th>
					<th>dateUpload</th>
					<th>Reserver</th>
					<th>Modifier</th>
					<th>Effacer</th>
				</tr>
				<tr>	
					<td>".$donnees['nom']."</td>
					<td>".$donnees['type']."</td>
					<td>".estVide($donnees['identification'])."</td>
					<td>".est1($donnees['carnetVaccinationValide'])."</td>
					<td>".$donnees['dateUpload']."</td>
					<td><a href=\"client.php?action=reserver&amp;idAnimal=".$donnees['idAnimal']."\"><button type=\"button\" >R</button> </td></td>
					<td><a href=\"client.php?action=modifier&amp;idAnimal=".$donnees['idAnimal']."\"><button type=\"button\" >M</button> </td></td>
					<td><button type=\"button\" name=".$donnees['idAnimal'].">X</button> </td>
				</tr>
			");
	}
	else{
		echo("<h3 style='text-align:center'>Vous n'avez pas encore ajouté d'animal</h3>");
	}
	while($donnees=$requete -> fetch()){
	echo("
				<tr>	
					<td>".$donnees['nom']."</td>
					<td>".$donnees['type']."</td>
					<td>".estVide($donnees['identification'])."</td>
					<td>".est1($donnees['carnetVaccinationValide'])."</td>
					<td>".$donnees['dateUpload']."</td>
					<td><a href=\"client.php?action=reserver&amp;idAnimal=".$donnees['idAnimal']."\"><button type=\"button\" >R</button> </td></td>
					<td><a href=\"client.php?action=modifier&amp;idAnimal=".$donnees['idAnimal']."\"><button type=\"button\" >M</button> </td></td>
					<td><button type=\"button\" name=".$donnees['idAnimal'].">X</button> </td>



				</tr>
	");	
	}
	echo("	</table>");

?>


<!--
    <tr> </tr>: indique le début et la fin d'une ligne du tableau ;

    <td> </td>: indique le début et la fin du contenu d'une cellule.
 -->