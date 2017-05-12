<?php 
	include("Script_PHP/BDDAccess.php");

	function sameMail($mail,$idClient){
		include("Script_PHP/BDDAccess.php");
		$requete=$bdd->query('select email from Client where idClient=\''.$idClient.'\'');
		if($donnees=$requete->fetch()){ 
			if($donnees['email']==$mail){
				return true;			
			} 
			return false;
		}
		return false;
	}

	function mailExist($mail){
		include("Script_PHP/BDDAccess.php");
		$requete=$bdd->query('select email from Client where email=\''.$mail.'\'');
		if($donnees=$requete->fetch()){ 
			return true;
		}
		return false;
	}


	if(isset($_POST['mail'])){
		if(!sameMail($_POST['mail'],$_SESSION['idClient'])&&mailExist($_POST['mail'])){ 
			echo('<script> alert("Cette adresse email est déjà lié à un compte ")</script>');
		}
		else{
			$requete=$bdd->prepare('
				update Client set
					email= :email,
					password= :password,
					nom= :nom,
					prenom = :prenom,
					tel = :tel,
					adresse = :adresse
				where idClient= :idClient');

			$requete->execute(array(
				'email'=>$_POST['mail'],
				'password'=>password_hash($_POST['mdp'],PASSWORD_DEFAULT),
				'nom'=>$_POST['nom'],
				'prenom'=>$_POST['prenom'],
				'tel'=> $_POST['tel'],
				'adresse'=>$_POST['adresse'],
				'idClient'=> $_SESSION['idClient']));

			echo("<script> alert('modification réalisée avec succès !'); </script>");
		}
	}
	if(!empty($_POST['profils'])){
		echo("<meta http-equiv=\"refresh\" content=\"1;url=espacePrive.php?init=1\"/>");
	}


?>