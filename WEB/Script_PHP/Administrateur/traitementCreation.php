<?php 

	include("Script_PHP/BDDAccess.php");

	function loginPresentOpe($login){
	include("Script_PHP/BDDAccess.php");
			$requete=$bdd->prepare('select login from Operateur where login=?'); 
			$requete->execute(array($login));
			if($donnees=$requete->fetch()){
				return true;
			}
			return false;
	}

	function loginPresentAdmin($login){
	include("Script_PHP/BDDAccess.php");
			$requete=$bdd->prepare('select login from Administrateur where login=?'); 
			$requete->execute(array($login));
			if($donnees=$requete->fetch()){
				return true;
			}
			return false;
	}


	if(isset($_POST['login'])){
		if(loginPresentAdmin($_POST['login'])||loginPresentOpe($_POST['login'])){
			echo('<script> alert("Ce login est déjà lié à un compte ")</script>');
		}
		else{
			if($_POST['type']=='Operateur'){
				$requete=$bdd->prepare('insert into Operateur(login,password,nom,prenom) values(:login,:password,:nom,:prenom)');
				$requete->execute(array(
					'login'=>$_POST['login'],
					'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT),
					'nom'=>$_POST['nom'],
					'prenom'=>$_POST['prenom']));
				echo("<script> alert('Inscription réalisée avec succès !'); </script>");
			}
			else{
				$requete=$bdd->prepare('insert into Administrateur(login,password,nom,prenom) values(:login,:password,:nom,:prenom)');
				$requete->execute(array(
					'login'=>$_POST['login'],
					'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT),
					'nom'=>$_POST['nom'],
					'prenom'=>$_POST['prenom']));
				echo("<script> alert('Inscription réalisée avec succès !'); </script>");
			}
		}
	}

?>

