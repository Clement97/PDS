<!-- <?php
session_start();
?> -->

<?php

if(isset($_GET['init'])){

    unset($_SESSION['action']);
    unset($_SESSION['idClient']);
    unset($_SESSION['idOperateur']);
    unset($_SESSION['idAdministrateur']);
    unset($_SESSION['idReservation']);
    unset($_SESSION['idAnimal']);

}


   if(isset($_GET['action']))
        $_SESSION['action']=$_GET['action'];

    if(isset($_GET['idClient']))
        $_SESSION['idClient']=$_GET['idClient'];

    if(isset($_GET['idOperateur']))
        $_SESSION['idOperateur']=$_GET['idOperateur'];

    if(isset($_GET['idAdministrateur']))
        $_SESSION['idAdministrateur']=$_GET['idAdministrateur'];

    if(isset($_GET['idReservation']))
        $_SESSION['idReservation']=$_GET['idReservation'];

    if(isset($_GET['idAnimal']))
        $_SESSION['idAnimal']=$_GET['idAnimal'];



?>



<!DOCTYPE html>
<html>
<head> 
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="style.css"/>
	<title> comChien&Chat </title>
</head>

<body>

	<?php include("structure/header.php") ?>
	
	<div id="operateur">
                    <h2> Consultation des différents comptes</h2>
                    <form method="post" action="operateur.php">
                   	<div>	
                   		<label for="recherche"> Recherche par </label><br/>
		               <select name="recherche" id="recherche" size="1">
		                    <option>     </option>
		                    <option> Nom et Prenom </option>
		                    <option> Login </option>
		               </select>
		        </div>
		             <input type="submit" value="rechercher"/>
                 </form>
            <div id="gestionCompte">
                <?php    
                   if(isset($_SESSION['action'])){
                        if($_SESSION['action']=='afficherReservation'){
                            include("Script_PHP/Operateur/gestionReservation.php"); // ok
                        }
                        elseif($_SESSION['action']=='afficherAnimaux'){
                            include("Script_PHP/Operateur/gestionAnimaux.php");   // ok
                        }
                        elseif($_SESSION['action']=='reserver'){
                            include("Script_PHP/Operateur/formReservation.php"); //ok
                        }
                        elseif($_SESSION['action']=='modifier'){
                            include("Script_PHP/Operateur/formModifier.php"); // modifie un client ou une résa
                        }elseif($_SESSION['action']=='supprimer'){
                            include("Script_PHP/Operateur/traitementSupprimer.php");
                            include("Script_PHP/Operateur/GestionClient.php"); 
                              //supprime un client ou résa ou animal
                        }
                    }
                    else{
                        include("Script_PHP/Operateur/GestionClient.php"); 
                    }
                ?>
        </div>

        <?php include("Script_JS/actualiseForm.php") ?>
		
	<?php include("structure/footer.php") ?>

</body>

</html>
