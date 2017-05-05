<?php
	
	if(isset($_POST['nom'])&&isset($_FILES['certificat'])&&($_FILES['certificat']['error']==0)){
		if(!(isset($_SESSION['sauvegardeAni'])&&isset($_SESSION['sauvegardeNom'])&&
		(($_SESSION['sauvegardeAni']==$_POST['ani'])&&($_SESSION['sauvegardeNom']==$_POST['nom'])))){ //afin d'éviter le rmplissage quand on actualise !
			if(($_FILES['certificat']['size'] <= 1000000) && ($_FILES['certificat']['size'] >= 10000)){
				move_uploaded_file($_FILES['certificat']['tmp_name'],'Certificats/'.basename($_FILES['certificat']['name']));
				include("Script_PHP/BDDAccess.php");
				$identification='';
				if(isset($_POST['identification'])){
					$identification=$_POST['identification'];
				}
				$insert=$bdd->prepare('insert into Animal(idClient,type,nom,identification,carnetVaccinationValide,dateUpload) values(:idClient,:type,:nom,:identification,:carnetVaccinationValide,:dateUpload)');
				$insert->execute(array(
					'idClient'=> $_SESSION['id'],
					'type'=>$_POST['ani'],
					'nom'=>$_POST['nom'],
					'identification'=>$identification,
					'carnetVaccinationValide'=>1,
					'dateUpload'=>date("Y-m-d")
				));
				$_SESSION['sauvegardeAni']=$_POST['ani'];
				$_SESSION['sauvegardeNom']=$_POST['nom'];
			}else echo('\n Le fichier n\'a pas une taille adaptée');

		}


	}
	
?>