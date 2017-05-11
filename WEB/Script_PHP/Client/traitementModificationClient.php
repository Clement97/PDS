<?php 
	include("Script_PHP/BDDAccess.php");

	function sameMail($mail,$idClient){
		$requete=$bdd->query('select email from Client where idClient=\''.$idClient'\'');
		if($mail==$requete['email']) return true;
	}


	if(isset($_POST['mail'])){
		$requete=$bdd->prepare('select * from Client where email=?'); 
		$requete->execute(array($_POST['mail']));

		if($donnees=$requete->fetch()){ 
			echo('<script> alert("Cette adresse email est déjà lié à un compte ")</script>');
		}
		else{
			$requete=$bdd->prepare('insert into Client(email,password,nom,prenom,tel,adresse) values(:email,:password,:nom,:prenom,:tel,:adresse)');
			$requete->execute(array('email'=>$_POST['mail'],'password'=>password_hash($_POST['mdp'],PASSWORD_DEFAULT),'nom'=>$_POST['nom'],'prenom'=>$_POST['prenom'],'tel'=> $_POST['tel'],'adresse'=>$_POST['adresse']));
			echo("<script> alert('Inscription réalisée avec succès !'); </script>");
		}
	}
?>