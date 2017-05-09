<?php 

	include("BDDAccess.php");
	
	if (isset($_POST['valider']) ) {	
	
		$requete = $bdd->prepare("SELECT count(*) FROM Reservation JOIN Animal USING (idAnimal) WHERE type = :animal AND isolé = :groupe AND :recherche BETWEEN dateDebut AND dateFin");
		$requete->execute(array(
					'animal'=>$_POST['animal'],
					'groupe'=>$_POST['box'],
					'recherche'=>$_POST['dateRecherche']));

		$nombre = $requete->fetch();
		
			echo ('<p></br> Au <strong>' . $_POST['dateRecherche'] . '</strong> il y a <strong>' . $nombre[0] . '</strong> place(s) occupées.</p>');
		
}
?>
