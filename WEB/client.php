<!-- <?php
session_start();
?> -->
<?php

if(isset($_GET['init'])){

    unset($_SESSION['idAnimal']);
    unset($_SESSION['actionA']);
    unset($_SESSION['idReservation']);
    unset($_SESSION['actionR']);
    unset($_SESSION['sauvegardeAni']);
    unset($_SESSION['sauvegardeNim']);

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
        <div id="client">
            <div id="modifclient">
                <a href="modification.php"> Modification des informations de votre profil </a>
            </div>
            <div class="ptclt" onclick="1">
                <?php 
                    if(!(isset($_GET['actionA'])||isset($_SESSION['actionA']))){    // si on ne va pas vers modifer ou reserver
                        if(isset($_GET['idAnimal'])){    // alors si un idAnimal est qd même passer, on doit le supprimer
                            echo("<div id=\"invisible\">");
                            include("Script_PHP/Client/deleteAnimal.php"); // script qui supprime animal et les resa associés
                            echo("</div>");
                        }
                        include("Script_PHP/Client/GestionAnimaux.php");// alors a la gestion des animaux (même si on a supprimé)

                    }
                    else{
                        if(isset($_SESSION['actionA']))
                            if($_SESSION['actionA']=='reserver')
                                include("Script_PHP/Client/ReservationAnimal.php");
                            else 
                                include("Script_PHP/Client/ModifAnimal.php");
                        else 
                            if($_GET['actionA']=='reserver')
                                include("Script_PHP/Client/ReservationAnimal.php");
                            else 
                                include("Script_PHP/Client/ModifAnimal.php");
                    }
                ?>
            </div>
            <div class="ptclt">
                <h2> Ajouter un animal à mon compte </h2>
                <form method="post" action="client.php" enctype="multipart/form-data">
                    <fieldset>
                        <label for="ani" class="pt"> Type d'animal </label></br>
                        <input type="radio" name="ani" value="chat" id="chat" checked/> <label for="Chat">Chat</label></br>
                        <input type="radio" name="ani" value="rongeur" id="rongeur"/> <label for="Rongeur">Rongeur</label></br>
                        <input type="radio" name="ani" value="chien" id="chien"/> <label for="Chien">Chien</label></br></br>
                        <label for="nom" class="pt" > Le nom de votre animal  </label></br>
                        <input type="text" name="nom" id="nom" placeholder="Nom" size="10" pattern="[a-zA-Z]{3,25}" required/></br></br>    
                        <label for="identification" class="pt"> L'identification de votre animal (tatouage/puce) </label></br>
                        <input type="text" name="identification" id="identification" placeholder="AZ2JZ8" size="10" pattern="[a-zA-Z0-9]{3,10}" required /></br></br>
                        <label for="certificat" class="pt" > Envoyez-nous le carnet de vaccin de votre animal </label></br>
                        <input type="file" name="certificat" id="certificat" required /></br></br>
                        <input type="submit" value="Enregistrer"/>
                        <?php include("Script_PHP/Client/traitementAddAnimal.php") ?>
                    </fieldset>
                </form>
            </div>

            <div class="ptclt" onclick="0">
                <?php 
                    if(!(isset($_GET['idReservation'])||isset($_SESSION['idReservation'])))
                        include("Script_PHP/Client/GestionReservations.php");
                    else{
                        if(isset($_GET['actionR'])||isset($_SESSION['actionR'])) {
                            include("Script_PHP/Client/ModifReservationAnimal.php");
                        }
                        else{
                            include("Script_PHP/Client/deleteReservation.php");
                        }
                    }
                ?>
            </div>

            <div class="ptclt">
                <h2> Laisser un commentaire au gérant </h2>
                <form method="post" action="">
                    <textarea name="comment"/> </textarea><br/>
                    <input type="submit" value="envoyer"/>
                </form>
            </div>
        </div>
        <?php include("structure/footer.php") ?>

                                <script>

                                    var boutonsSupprimerAnimal = document.querySelectorAll('#client .ptclt[onclick=\'1\'] button[name]');

                                    for(var i=0;i<boutonsSupprimerAnimal.length;i++){
                                        boutonsSupprimerAnimal[i].addEventListener("click", function(event) {
                                            var confOk=confirm("Êtes-vous vraiment sûr de supprimer cet animal ? (toutes les reservations associez seront annulées)");
                                            var idAnimal =event.target.getAttribute('name');
                                            if(confOk){
                                                document.location.replace('client.php?idAnimal='+idAnimal);
                                            }
                                        });
                                    }

                                    var boutonsSupprimerReservation = document.querySelectorAll('#client .ptclt[onclick=\'0\'] button[name]');

                                    for(var i=0;i<boutonsSupprimerReservation.length;i++){
                                        boutonsSupprimerReservation[i].addEventListener("click", function(event) {
                                            var confOk=confirm("Êtes-vous vraiment sûr d'annuler cettes reservation ?");
                                            var idReservation =event.target.getAttribute('name');
                                            if(confOk){
                                                document.location.replace('client.php?idReservation='+idReservation);
                                            }
                                        });

                                    }

                                </script>

    </body>
</html>


