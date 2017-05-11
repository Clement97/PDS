<?php

	if(isset($_SESSION['idClient']))
    unset($_SESSION['idClient']);

	if(isset($_SESSION['idOperateur']))
    unset($_SESSION['idOperateur']);

	if(isset($_SESSION['idAdministrateur']))
    unset($_SESSION['idAdministrateur']);

	if(isset($_SESSION['idReservation']))
    unset($_SESSION['idReservation']);

	if(isset($_SESSION['idAnimal']))
    unset($_SESSION['idAnimal']);

	

	function traitementOpeAdmin($profil){
		if(empty($_POST['choixRecherche'])){
			def($profil);
		}
		else{
			if($_POST['choixRecherche']=='Login'){
				login($profil,$_POST['login']);
			}
			else{
				nomPrenom($profil,$_POST['nom'],$_POST['prenom']);
			}
		}
	}

	function afficheRequete($requete,$profil){
		$idRequete="id".$profil;
		if($donnees=$requete->fetch()){
			$id;
			if($profil=='Administrateur')
				$id=$donnees['idAdministrateur'];
			else
				$id=$donnees['idOperateur'];
			echo("	<table>
						<tr>
							<th>Numero d'identification</th>
							<th>Login</th>
							<th>Nom</th>
							<th>Prenom</th>
							<th>Modifier</th>
						</tr>
						<tr>	
							<td>".$id."</td>
							<td>".$donnees['login']."</td>
							<td>".$donnees['nom']."</td>
							<td>".$donnees['prenom']."</td>
							<td><a href=\"espacePrive.php?action=modifier&amp;".$idRequete."=".$id."\"><button type=\"button\">Modifier</button> </td>
						</tr>
					");		
		}
		else{
	    	echo("<script> alert('Aucun compte ".strtolower($profil) ." pour le moment'); </script>");
		}	
		while($donnees=$requete -> fetch()){
			$id;
			if($profil=='Administrateur')
				$id=$donnees['idAdministrateur'];
			else
				$id=$donnees['idOperateur'];

			echo("

						<tr>	
							<td>".$id."</td>
							<td>".$donnees['login']."</td>
							<td>".$donnees['nom']."</td>
							<td>".$donnees['prenom']."</td>
							<td><a href=\"espacePrive.php?action=modifier&amp;".$idRequete."=".$id."\"><button type=\"button\">Modifier</button> </td>
						</tr>");
		}
		echo("</table>");
	}

	function login($profil,$login){
		include("Script_PHP/BDDAccess.php");
		$idRequete="id".$profil;
		$requete=$bdd->query('
			select login,nom,prenom,'.$idRequete.'
			from '.$profil.'
			where login=\''.$login.'\'');
		afficheRequete($requete,$profil);
	}

	function nomPrenom($profil,$nom,$prenom){
		include("Script_PHP/BDDAccess.php");
		$idRequete="id".$profil;
		$requete=$bdd->query('
			select login,nom,prenom,'.$idRequete.'
			from '.$profil.'
			where nom=\''.$nom.'\' and prenom =\''.$prenom.'\'');
		afficheRequete($requete,$profil);
	}

	function def($profil){
		include("Script_PHP/BDDAccess.php");
		$idRequete="id".$profil;
		$requete=$bdd->query('
			select login,nom,prenom,'.$idRequete.'
			from '.$profil.'');
		afficheRequete($requete,$profil);
	}

	if(!isset($_POST['profils'])||empty($_POST['profils'])||$_POST['profils']=='Client'){
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
						<th>Modifier</th>
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
						<td><a href=\"espacePrive.php?action=modifier&amp;idClient".$donnees['idClient']."\"><button type=\"button\">Modifier</button> </td>
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
						<td><a href=\"espacePrive.php?action=modifier&amp;idClient=".$donnees['idClient']."\"><button type=\"button\">Modifier</button> </td>
					</tr>
					");
		}
		echo("</table>");

	}elseif($_POST['profils']=='Operateur'){
		$profil='Operateur';
		traitementOpeAdmin($profil);
	}
	elseif($_POST['profils']=='Administrateur'){
		$profil='Administrateur';
		traitementOpeAdmin($profil);
	}                                        

?>
