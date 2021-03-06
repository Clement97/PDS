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
							<th>Supprimer</th>
						</tr>
						<tr>	
							<td>".$id."</td>
							<td>".$donnees['login']."</td>
							<td>".$donnees['nom']."</td>
							<td>".$donnees['prenom']."</td>
							<td><a href=\"espacePrive.php?action=modifier&amp;".$idRequete."=".$id."&amp;init=1\"><button type=\"button\">Modifier</button> </td>
							<td><button type=\"button\" name=".$id.">Supprimer</button> </td>
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
							<td><a href=\"espacePrive.php?action=modifier&amp;".$idRequete."=".$id."&amp;init=1\"><button type=\"button\">Modifier</button> </td>
							<td><button type=\"button\" name=".$id.">Supprimer</button> </td>
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
						<th>Supprimer</th>
					</tr>
					<tr>	
						<td>".$donnees['idClient']."</td>
						<td>".$donnees['email']."</td>
						<td>".$donnees['nom']."</td>
						<td>".$donnees['prenom']."</td>
						<td>".$donnees['tel']."</td>
						<td>".$donnees['adresse']."</td>
						<td><a href=\"espacePrive.php?action=afficherReservation&amp;init=1&amp;idClient=".$donnees['idClient']."\"><button type=\"button\">afficher Reservations</button> </td>
						<td><a href=\"espacePrive.php?action=afficherAnimaux&amp;init=1&amp;idClient=".$donnees['idClient']."\"><button type=\"button\">afficher Animaux</button> </td>
						<td><a href=\"espacePrive.php?action=modifier&amp;init=1&amp;idClient=".$donnees['idClient']."\"><button type=\"button\">Modifier</button> </td>
						<td><button type=\"button\" name=".$donnees['idClient'].">Supprimer</button> </td>
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
						<td><a href=\"espacePrive.php?action=afficherReservation&amp;init=1&amp;idClient=".$donnees['idClient']."\"><button type=\"button\">afficher Reservations</button> </td>
						<td><a href=\"espacePrive.php?action=afficherAnimaux&amp;init=1&amp;idClient=".$donnees['idClient']."\"><button type=\"button\">afficher Animaux</button> </td>
						<td><a href=\"espacePrive.php?action=modifier&amp;init=1&amp;idClient=".$donnees['idClient']."\"><button type=\"button\">Modifier</button> </td>
						<td><button type=\"button\" name=".$donnees['idClient'].">Supprimer</button> </td>
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

        echo("                  <script>

                                    var boutonsSupprimer = document.querySelectorAll('button[name]');

                                    for(var i=0;i<boutonsSupprimer.length;i++){
                                        boutonsSupprimer[i].addEventListener(\"click\", function(event) { ");
                                            if(isset($_POST['profils'])){
                                                if($_POST['profils']=='Administrateur'){
                                                    echo("
                                                    var confOk=confirm(\"Êtes-vous vraiment sûr de supprimer cet administrateur ? \");
                                                    var idAdministrateur=event.target.getAttribute('name');
                                                    if(confOk){
                                                        document.location.replace('espacePrive.php?action=supprimer&init=1&idAdministrateur='+idAdministrateur);
                                                    }");
                                                }elseif($_POST['profils']=='Operateur'){
                                                    echo("
                                                    var confOk=confirm(\"Êtes-vous vraiment sûr de supprimer cet operateur ? \");
                                                    var idOperateur=event.target.getAttribute('name');
                                                    if(confOk){
                                                        document.location.replace('espacePrive.php?action=supprimer&init=1&idOperateur='+idOperateur);
                                                    }");
                                                }
                                                else{
                                                    echo("
                                                    var confOk=confirm(\"Êtes-vous vraiment sûr de supprimer ce client ? (toutes les reservations et animaux associés seront aussi supprimées)\");
                                                    var idClient=event.target.getAttribute('name');
                                                     if(confOk){
                                                        document.location.replace('espacePrive.php?action=supprimer&init=1&idClient='+idClient);
                                                    }");
 
                                                }
                                            }
                                            else{
                                                echo("
                                                var confOk=confirm(\"Êtes-vous vraiment sûr de supprimer ce client ? (toutes les reservations et animaux associés seront aussi supprimées)\");
                                                var idClient=event.target.getAttribute('name');
                                                 if(confOk){
                                                    document.location.replace('espacePrive.php?action=supprimer&init=1&idClient='+idClient);
                                                }");

                                            }
                                                
                    echo("                  
                                        });
                                    }
                                </script>");
                                            

?>
