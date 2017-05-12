<?php 

	include("Script_PHP/BDDAccess.php");

		$type;
		$id;
		if(isset($_SESSION['idOperateur'])){
			$type='Operateur';
			$id=$_SESSION['idOperateur'];
		}
		else{
			$type='Administrateur';
			$id=$_SESSION['idAdministrateur'];
		}


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

	function sameLogin($login,$id,$type){
	include("Script_PHP/BDDAccess.php");
		$requete=$bdd->query('select login from '.$type.' where id'.$type.'=\''.$id.'\'');
		if($donnees=$requete->fetch()){ 
			if($donnees['login']==$login){
				return true;			
			} 
			return false;
		}
		return false;
	}

	function deleteCompte($id,$type){
	include("Script_PHP/BDDAccess.php");
		$requete=$bdd->query('delete from '.$type.' where id'.$type.'=\''.$id.'\'');
	}


	if(isset($_POST['login'])){
		if(!(sameLogin($_POST['login'],$id,$type))&&(loginPresentAdmin($_POST['login'])||loginPresentOpe($_POST['login'])))
		{
			echo('<script> alert("Ce login est déjà lié à un compte ")</script>');
		}
		else{
			if($type!=$_POST['type']){
				deleteCompte($id,$type);
				$requete=$bdd->prepare('insert into '.$_POST['type'].'(login,password,nom,prenom) values(:login,:password,:nom,:prenom)');
			}
			else
			{
				$requete=$bdd->prepare('
					update '.$type.' set 
						login=:login,
						password=:password,
						nom=:nom,
						prenom=:prenom
					where id'.$type.'=\''.$id.'\'');
			}
			$requete->execute(array(
				'login'=>$_POST['login'],
				'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT),
				'nom'=>$_POST['nom'],
				'prenom'=>$_POST['prenom'] ));

			echo('<script> alert("Votre modification a bien été effectuée ")</script>');
			echo("<meta http-equiv=\"refresh\" content=\"1;url=espacePrive.php?init=1\"/>");
		}
	}elseif(!empty($_POST['profils'])){
		echo("<meta http-equiv=\"refresh\" content=\"1;url=espacePrive.php?init=1\"/>");
	}

?>

