<?php

	if(isset($_SESSION['idClient'])){
		include("Script_PHP/Administrateur/formModifierClient.php"); // OK
	}

	if(isset($_SESSION['idOperateur'])||isset($_SESSION['idAdministrateur'])){ 
		include("Script_PHP/Administrateur/formModifierAdmin.php");
	}
	
	if(isset($_SESSION['idReservation'])){
		include("Script_PHP/Administrateur/formModifierReservation.php"); 
	}

?>