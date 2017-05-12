<?php 

session_start();

	if(!empty($_SESSION['type'])&&!empty($_SESSION['login'])){

		// pas besoin de traitement injection car login provient de login déjà traité et type ne peut
		//contenir que 3 valeurs définie par nous même

		include("Script_PHP/BDDAccess.php");

		if($_SESSION['type']=='Client'){
				$requeteID=$bdd->prepare('select idClient from Client where email=?');
				$requeteID->execute(array($_SESSION['login']));
				if($donnees=$requeteID->fetch()){
					$_SESSION['id']=$donnees['idClient'];
				include("client.php");
			}
		}

		if($_SESSION['type']=='Operateur'){
				$requeteID=$bdd->prepare('select idOperateur from Operateur where login=?');
				$requeteID->execute(array($_SESSION['login']));
				if($donnees=$requeteID->fetch()){
					$_SESSION['id']=$donnees['idOperateur'];
				}
				include("operateur.php");
		}

		if($_SESSION['type']=='Administrateur'){
			if(!(isset($_SESSION['id']))){
				$requeteID=$bdd->prepare('select idAdministrateur from Administrateur where login=?');
				$requeteID->execute(array($_SESSION['login']));
				if($donnees=$requeteID->fetch()){
					$_SESSION['id']=$donnees['idAdministrateur'];
				}
			}
			include("administrateur.php");
		}
		// j'ai modifié ici l'admin




	}
	else {
		echo('<script>alert("Vas t\'en vilain hackeur" </script>');
	}
?>