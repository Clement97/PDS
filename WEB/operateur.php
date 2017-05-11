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
                            include("Script_PHP/Opérateur/gestionReservation.php");  // OK
                        }
                        elseif($_SESSION['action']=='afficherAnimaux'){
                            include("Script_PHP/Opérateur/gestionAnimaux.php");  // OK
                        }
                        elseif($_SESSION['action']=='reserver'){
                            include("Script_PHP/Opérateur/formReservation.php");//OK
                        }
                        elseif($_SESSION['action']=='modifier'){
                            include("Script_PHP/Opérateur/formModifier.php"); // modifie un client ou opérateur ou administrateur ou resa 
                        }elseif($_SESSION['action']=='supprimer'){
                            include("Script_PHP/Opérateur/traitementSupprimer.php");
                            include("Script_PHP/Opérateur/GestionComptes.php"); 
                              //supprime un client ou opérateur ou admin ou résa ou animal
                        }
                    }
                    else{
                        include("Script_PHP/Opérateur/GestionComptes.php"); 
                    }
                ?>
        </div>

        <?php include("Script_JS/actualiseForm.php") ?>
		
	<?php include("structure/footer.php") ?>

</body>

</html>
