  <?php

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
                            include("Script_PHP/Administrateur/traitementSupprimer.php");
                            include("Script_PHP/Administrateur/GestionComptes.php"); 
                              //supprime un client ou opérateur ou admin ou résa ou animal
                        }
                    }
                    else{
                        include("Script_PHP/Administrateur/GestionComptes.php"); 
                    }
                ?>
            </div>
        </div>
        <?php include("Script_JS/actualiseForm.php") ?>
