<?php

    if(isset($_GET['action']))
        $_SESSION['action']=$_GET['action'];

    if(isset($_GET['idClient'])){
        $_SESSION['idClient']=$_GET['idClient'];
    }

    if(isset($_GET['idOperateur']))
        $_SESSION['idOperateur']=$_GET['idOperateur'];

    if(isset($_GET['idAdministrateur']))
        $_SESSION['idAdministrateur']=$_GET['idAdministrateur'];

    if(isset($_GET['idReservation']))
        $_SESSION['idReservation']=$_GET['idReservation'];

    if(isset($_GET['idAnimal']))
        $_SESSION['idAnimal']=$_GET['idAnimal'];

if(isset($_GET['init'])){

    unset($_SESSION['action']);
    unset($_SESSION['idClient']);
    unset($_SESSION['idOperateur']);
    unset($_SESSION['idAdministrateur']);
    unset($_SESSION['idReservation']);
    unset($_SESSION['idAnimal']);

}



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
        
        <div id="admin">
                    <h2> Consultation des différents comptes</h2>
                    <form method="post" action="administrateur.php">
                       <div class="input">
                       <label for="profils"> Type de profil </label><br/>
                       <select name="profils" required>
                            <option>     </option>
                            <option> Client </option>
                            <option> Operateur </option>
                            <option> Administrateur </option>
                       </select>
                       </div>
                       <div class="input">
                       <label for="choixRecherche"> Type de recherche </label><br/>
                       <select name="choixRecherche" size="1">
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
                            include("Script_PHP/Administrateur/gestionReservation.php");  // OK
                        }
                        elseif($_SESSION['action']=='afficherAnimaux'){
                            include("Script_PHP/Administrateur/gestionAnimaux.php");  // OK
                        }
                        elseif($_SESSION['action']=='reserver'){
                            include("Script_PHP/Administrateur/formReservation.php");//OK
                        }
                        elseif($_SESSION['action']=='modifier'){
                            include("Script_PHP/Administrateur/formModifier.php"); // modifie un client ou opérateur ou administrateur ou resa 
                        }elseif($_SESSION['action']=='supprimer'){
                            include("Script_PHP/Administrateur/traitementSupprimer.php");  //supprime un client ou opérateur ou admin ou résa ou animal
                        }
                    }
                    else{
                        include("Script_PHP/Administrateur/GestionComptes.php"); 
                    }
                ?>
            </div>
        </div>
<?php
        echo("                  <script>

                                    var boutonsSupprimer = document.querySelectorAll('button[name]');

                                    for(var i=0;i<boutonsSupprimer.length;i++){
                                        boutonsSupprimer[i].addEventListener(\"click\", function(event) { ");
                                            if(isset($_POST['profils'])){
                                                if($_POST['profils']=='Administrateur'){
                                                    echo("
                                                    var confOk=confirm(\"Êtes-vous vraiment sûr de supprimer cet administrateur ? \");
                                                    var idAdministrateur=event.target.getAttribute('name');
                                                    if(confOk){
                                                        document.location.replace('espacePrive.php?action=supprimer&amp;idAdministrateur='+idAdministrateur);
                                                    }");
                                                }
                                                else{
                                                    echo("
                                                    var confOk=confirm(\"Êtes-vous vraiment sûr de supprimer ce client ? (toutes les reservations et animaux associés seront aussi supprimées)\");
                                                    var idClient=event.target.getAttribute('name');
                                                     if(confOk){
                                                        document.location.replace('espacePrive.php?action=supprimer&amp;idClient='+idClient);
                                                    }");
 
                                                }
                                            }
                                            elseif(isset($_SESSION['action'])){
                                                if($_SESSION['action']=='afficherReservation'){
                                                echo("
                                                var confOk=confirm(\"Êtes-vous vraiment sûr de supprimer cette reservation ? \");
                                                var idReservation=event.target.getAttribute('name');
                                                if(confOk){
                                                    document.location.replace('espacePrive.php?action=supprimer&amp;idReservation='+idReservation);
                                                }");
                                                }elseif($_SESSION['action']=='afficherAnimaux'){
                                                echo("
                                                var confOk=confirm(\"Êtes-vous vraiment sûr de supprimer cet animal ? (les réservations associées seront aussi supprimées)\");
                                                var idAnimal=event.target.getAttribute('name');
                                                if(confOk){
                                                    document.location.replace('espacePrive.php?action=supprimer&amp;idAnimal='+idAnimal);
                                                }");
                                                }
                                                else{
                                                    echo("
                                                    var confOk=confirm(\"Êtes-vous vraiment sûr de supprimer ce client ? (toutes les reservations et animaux associés seront aussi supprimées)\");
                                                    var idClient=event.target.getAttribute('name');
                                                     if(confOk){
                                                        document.location.replace('espacePrive.php?action=supprimer&amp;idClient='+idClient);
                                                    }");
                                                }

                                            }
                                            else{
                                                echo("
                                                var confOk=confirm(\"Êtes-vous vraiment sûr de supprimer ce client ? (toutes les reservations et animaux associés seront aussi supprimées)\");
                                                var idClient=event.target.getAttribute('name');
                                                 if(confOk){
                                                    document.location.replace('espacePrive.php?action=supprimer&amp;idClient='+idClient);
                                                }");

                                            }
                                                
                    echo("                  
                                        });
                                    }
                                </script>");
                                            
?>
        <?php include("Script_JS/actualiseForm.php") ?>
        <?php include("structure/footer.php") ?>
    </body>
</html>