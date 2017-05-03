<?php 

include("Script_PHP/BDDAccess.php");

	if(isset($_POST['mail'])){
		$reponse=$bdd->prepare('select * from Client where email=?'); 
		$reponse->execute(array($_POST['mail']));

		if($donnees=$reponse->fetch()){ 
			echo("<script> alert(' ".$_POST['mail']."'); </script>");
		}
		else{
			$reponse=$bdd->prepare('insert into Client(email,password,nom,prenom,tel,adresse) values(:email,:password,:nom,:prenom,:tel,:adresse)');
			$reponse->execute(array('email'=>$_POST['mail'],'password'=>password_hash($_POST['mdp'],PASSWORD_DEFAULT),'nom'=>$_POST['nom'],'prenom'=>$_POST['prenom'],'tel'=> $_POST['tel'],'adresse'=>$_POST['adresse']));
			echo("<script> alert('Inscription réalisée avec succès !'); </script>");
		}
	}

?>