<?php
	if(isset($_GET['idAnimal']))
		$_SESSION['idAnimal']=$_GET['idAnimal'];

	if(isset($_POST['nom'])&&isset($_FILES['certificat'])&&($_FILES['certificat']['error']==0)){
		if(!(isset($_SESSION['sauvegardeAni'])&&isset($_SESSION['sauvegardeNom'])&&
		(($_SESSION['sauvegardeAni']==$_POST['ani'])&&($_SESSION['sauvegardeNom']==$_POST['nom'])))){ 
		//afin d'éviter le rmplissage quand on actualise !
			if(($_FILES['certificat']['size'] <= 1000000) && ($_FILES['certificat']['size'] >= 10000)){
				move_uploaded_file($_FILES['certificat']['tmp_name'],'Certificats/'.basename($_FILES['certificat']['name']));
				include("Script_PHP/BDDAccess.php");
				$identification='';
				if(isset($_POST['identification'])){
					$identification=$_POST['identification'];
				}
				$update=$bdd->prepare('
					update Animal 
					set type=:type,
						nom=:nom,
					 	identification=:identification,
						carnetVaccinationValide=:carnetVaccinationValide,
						dateUpload=:dateUpload
					where idAnimal=:idAnimal');

				$update->execute(array(
					'type'=>$_POST['ani'],
					'nom'=>$_POST['nom'],
					'identification'=>$identification,
					'carnetVaccinationValide'=>1,
					'dateUpload'=>date("Y-m-d"),
					'idAnimal'=>$_SESSION['idAnimal']));

				$_SESSION['sauvegardeAni']=$_POST['ani'];
				$_SESSION['sauvegardeNom']=$_POST['nom'];
				echo("<script>document.location.replace('espacePrive.php?init=1');</script>");
			}else echo('\n Le fichier n\'a pas une taille adaptée');

		}

	}
?>