<?php 
	include("Script_PHP/BDDAccess.php");

	function sameMail($mail,$idClient){
		$requete=$bdd->query('select email from Client where idClient='.$idClient.'');
		if($mail==$requete['email']) return true;
		return false;
	}

	function mailExist($mail){
		$requete=$bdd->query('select email from Client where email=\''.$mail'\'');
		if($donnees=$requete->fetch()){ 
			return true;
		}
		return false;
	}


	if(isset($_POST['mail'])){
		if(!sameMail($_POST['mail'],$_SESSION['idClient']&&mailExist($_POST['mail']))){ 
			echo('<script> alert("Cette adresse email est déjà lié à un compte ")</script>');
		}
		else{
			$requete=$bdd->prepare('insert into Client(email,password,nom,prenom,tel,adresse) values(:email,:password,:nom,:prenom,:tel,:adresse)');
			$requete->execute(array('email'=>$_POST['mail'],'password'=>password_hash($_POST['mdp'],PASSWORD_DEFAULT),'nom'=>$_POST['nom'],'prenom'=>$_POST['prenom'],'tel'=> $_POST['tel'],'adresse'=>$_POST['adresse']));
			echo("<script> alert('Inscription réalisée avec succès !'); </script>");
		}
	}
?>