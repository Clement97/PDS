<?php 
session_start();

	if(!empty($_SESSION['type'])&&!empty($_SESSION['login'])){

		// pas besoin de traitement injection car login provient de login déjà traité et type ne peut
		//contenir que 3 valeurs définie par nous même

		include("Script_PHP/BDDAccess.php");

		if($_SESSION['type']=='Client'){
			include("client.php");
			$requeteID=$bdd->prepare('select idClient from Client where email=?');
			$requeteID->execute(array($_SESSION['login']));
			if($donnees=$requeteID->fetch()){
				$_SESSION['id']=$donnees['idClient'];
			}

		}

		if($_SESSION['type']=='Operateur'){
			include("operateur.php");
			$requeteID=$bdd->prepare('select idOperateur from Operateur where login=?');
			$requeteID->execute(array($_SESSION['login']));
			if($donnees=$requeteID->fetch()){
				$_SESSION['id']=$donnees['idOperateur'];
			}
		}

		if($_SESSION['type']=='Administrateur'){
			include("administrateur.php");
			$requeteID=$bdd->prepare('select idAdministrateur from Administrateur where login=?');
			$requeteID->execute(array($_SESSION['login']));
			if($donnees=$requeteID->fetch()){
				$_SESSION['id']=$donnees['idAdministrateur'];
			}
		}




	}
	else {
		echo('<script>alert("Vas t\'en vilain hackeur" </script>');
	}
?>