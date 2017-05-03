<?php 

include("Script_PHP/BDDAccess.php");

		if(isset($_POST['mdp'])&&password_verify($_POST['mdp'],'$2y$10$vKM017w2A4y2YlrzlRj71u1ooCGn9JguKeBCVSs/ssg3me4JJV8IW')){
		echo("<script> alert('gg grand maitre'); </script>");
	}else 

	if(isset($_POST['id'])&&isset($_POST['mdp'])){
		$reponse=$bdd->prepare('select email,password from Client where email=?'); 
		$reponse->execute(array($_POST['id']));
		if($donnees=$reponse->fetch()){
			echo "".($donnees['password']);
			if(password_verify($_POST['mdp'],$donnees['password'])){
				echo("<meta http-equiv=\"refresh\" content=\"1;url=https://www.facebook.com/photo.php?fbid=1331741223558156&set=a.102813699784254.4878.100001668725738&type=3&theater\"/>");
			}else echo("<script> alert('Mauvais mot de passe'); </script>"); 
		}else echo("<script> alert('Identifiant inconnu'); </script>");
	}

?>

