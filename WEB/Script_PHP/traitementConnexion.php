<?php 

include("Script_PHP/BDDAccess.php");


	if(isset($_POST['login'])&&isset($_POST['mdp'])){

// faire ici d'autre test pour éviter injections sql et js


		$truePassword=false;
		$loginExists=false;

		$requeteClient=$bdd->prepare('select email,password from Client where email=?');	// requête si le login 
		$requeteClient->execute(array($_POST['login']));										// correspond à un client

		if($donnees=$requeteClient->fetch()){
			$loginExists=true;												// test si le login
			if(password_verify($_POST['mdp'],$donnees['password'])){		//correspond à un client
				$_SESSION['type']='Client';
				$truePassword=true;
			}
		}										
		else{ // sinon on effectue le même traitement pour un opérateur

			$requeteOperateur=$bdd->prepare('select login,password from Operateur where login=?'); 
			$requeteOperateur->execute(array($_POST['login']));

			if($donnees=$requeteOperateur->fetch()){
				$loginExists=true;
				if(password_verify($_POST['mdp'],$donnees['password'])){
					$_SESSION['type']='Operateur';
					$truePassword=true;
				}
			}else{ // puis pour un admin

				$requeteAdministrateur=$bdd->prepare('select login,password from Administrateur where login=?');
				$requeteAdministrateur->execute(array($_POST['login']));

				if($donnees=$requeteAdministrateur->fetch()){
					$loginExists=true;
					if(password_verify($_POST['mdp'],$donnees['password'])){
						$_SESSION['type']='Administrateur';
						$truePassword=true;
					}
				}

			}

		}

		if(!($loginExists)){ 
			echo("<script> alert('Identifiant inconnu'); </script>");
		}
		else{
			if(!($truePassword)){
				echo("<script> alert('Mauvais mot de passe'); </script>");
			}
			else{
				$_SESSION['login']=$_POST['login'];
				echo("<meta http-equiv=\"refresh\" content=\"1;url=espacePrive.php\"/>");
			}
		}
	







	}

?>


<!--


Notice
: Undefined variable: reponse in
/Users/Clement_temp/Documents/L2/PDS/PDS_Code/WEB/Script_PHP/traitementConnexion.php
on line
20


Fatal error
: Uncaught Error: Call to a member function fetch() on null in /Users/Clement_temp/Documents/L2/PDS/PDS_Code/WEB/Script_PHP/traitementConnexion.php:20 Stack trace: #0 /Users/Clement_temp/Documents/L2/PDS/PDS_Code/WEB/connexion.php(46): include() #1 {main} thrown in
/Users/Clement_temp/Documents/L2/PDS/PDS_Code/WEB/Script_PHP/traitementConnexion.php

				echo("<meta http-equiv=\"refresh\" content=\"1;url=https://www.facebook.com/photo.php?fblogin=1331741223558156&set=a.102813699784254.4878.100001668725738&type=3&theater\"/>");
-->
