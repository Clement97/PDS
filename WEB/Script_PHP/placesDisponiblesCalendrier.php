<?php 

	include("BDDAccess.php");
	
	if (isset($_POST['valider']) ) {	
	
		$requete = $bdd->prepare("SELECT count(*) FROM Reservation JOIN Animal USING (idAnimal) WHERE type = :animal AND isolé = :groupe AND :recherche BETWEEN dateDebut AND dateFin");
		$requete->execute(array(
					'animal'=>$_POST['animal'],
					'groupe'=>$_POST['box'],
					'recherche'=>$_POST['dateRecherche']));

		$nombre = $requete->fetch();
		
		if ($_POST['animal'] == 'chien' && $_POST['box'] == 0) {
		$i = 30 - $nombre[0];
			echo ('<p></br> Au <strong>' . $_POST['dateRecherche'] . '</strong> il y a <strong>' . $i . '</strong> place(s) libre(s).</p>');
		}
		
		
		if ($_POST['animal'] == 'chien' && $_POST['box'] == 1) {
		$i = 10 - $nombre[0];
			echo ('<p></br> Au <strong>' . $_POST['dateRecherche'] . '</strong> il y a <strong>' . $i . '</strong> place(s) libre(s).</p>');
		}
		
				
		if ($_POST['animal'] == 'chat' && $_POST['box'] == 0) {
		$i = 42 - $nombre[0];
			echo ('<p></br> Au <strong>' . $_POST['dateRecherche'] . '</strong> il y a <strong>' . $i . '</strong> place(s) libre(s).</p>');
		}
		
				
		if ($_POST['animal'] == 'chat' && $_POST['box'] == 1) {
		$i = 10 - $nombre[0];
			echo ('<p></br> Au <strong>' . $_POST['dateRecherche'] . '</strong> il y a <strong>' . $i . '</strong> place(s) libre(s).</p>');
		}
		
				
		if ($_POST['animal'] == 'rongeur' && $_POST['box'] == 0) {
		$i = 18 - $nombre[0];
			echo ('<p></br> Au <strong>' . $_POST['dateRecherche'] . '</strong> il y a <strong>' . $i . '</strong> place(s) libre(s).</p>');
		}
		
		
		if ($_POST['animal'] == 'rongeur' && $_POST['box'] == 1) {
		$i = 5 - $nombre[0];
			echo ('<p></br> Au <strong>' . $_POST['dateRecherche'] . '</strong> il y a <strong>' . $i . '</strong> place(s) libre(s).</p>');
		}
		
		
}
?>
