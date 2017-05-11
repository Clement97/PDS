<?php
	function updateCarnetNonValide(&$idAnimal){
		include("Script_PHP/BDDAccess.php");
		$requete=$bdd->prepare('update Animal set carnetVaccinationValide=0 where idAnimal=?');
		$requete->execute(array($idAnimal));
	}

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

	$verifValiditeCarnet=$bdd->prepare('
		select IF(DATE_ADD(dateUpload,interval 1 YEAR)>NOW(),1,0) as CarnetBon,idAnimal
		from Animal
		where idClient=?');
	$verifValiditeCarnet->execute(array($_SESSION['idClient']));

	while($donnees=$verifValiditeCarnet->fetch()){
		if($donnees['CarnetBon']==0){
			updateCarnetNonValide($donnees['idAnimal']);
		}
	}


	$requete=$bdd->prepare('
		select type,nom,identification,carnetVaccinationValide,dateUpload,idAnimal 
		from Animal 
		where idClient=?');
	$requete->execute(array($_SESSION['idClient']));

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
					<th>Effacer</th>
				</tr>
				<tr>	
					<td>".$donnees['nom']."</td>
					<td>".$donnees['type']."</td>
					<td>".estVide($donnees['identification'])."</td>
					<td>".est1($donnees['carnetVaccinationValide'])."</td>
					<td>".$donnees['dateUpload']."</td>
					<td><a href=\"espacePrive.php?action=reserver&amp;idAnimal=".$donnees['idAnimal']."\"><button type=\"button\" >R</button> </td></td>
					<td><button type=\"button\" name=".$donnees['idAnimal'].">X</button> </td>
				</tr>
			");
	}
	else{
    	echo("<script> alert(\"Ce client na pas d\'animal actuellement\"); </script>");
        include("Script_PHP/Administrateur/GestionComptes.php"); 
	}
	while($donnees=$requete -> fetch()){
	echo("

				<tr>	
					<td>".$donnees['nom']."</td>
					<td>".$donnees['type']."</td>
					<td>".estVide($donnees['identification'])."</td>
					<td>".est1($donnees['carnetVaccinationValide'])."</td>
					<td>".$donnees['dateUpload']."</td>
					<td><a href=\"espacePrive.php?action=reserver&amp;idAnimal=".$donnees['idAnimal']."\"><button type=\"button\" >R</button> </td>
					<td><button type=\"button\" name=".$donnees['idAnimal'].">X</button> </td>
				</tr>
	");	
	}
	echo("	</table>");

?>

                                <script>

                                    var boutonsSupprimer = document.querySelectorAll('button[name]');

                                    for(var i=0;i<boutonsSupprimer.length;i++){
                                        boutonsSupprimer[i].addEventListener("click", function(event) {
                                            var confOk=confirm("Êtes-vous vraiment sûr de supprimer cet animal ? (toutes les reservations associez seront annulées)");
                                            var idAnimal =event.target.getAttribute('name');
                                            if(confOk){
                                                document.location.replace('espacePrive.php?action=supprimer&idAnimal='+idAnimal);
                                            }
                                        });
                                    }
                                </script>

<?php


	unset($_SESSION['action']);
?>


