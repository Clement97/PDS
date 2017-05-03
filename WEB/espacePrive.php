<?php 
session_start();

	if(isset($_SESSION['type'])&&isset($_SESSION['login'])){

		include("Script_PHP/BDDAccess.php");

		if($_SESSION['type']=='Client'){
			include("client.php");
		}
		if($_SESSION['type']=='Operateur'){
			include("operateur.php");
		}
		if($_SESSION['type']=='Administrateur'){
			include("administrateur.php");
		}


	}
	else {
		echo('<script>alert("Vas t\'en vilain hackeur" </script>');
	}
?>