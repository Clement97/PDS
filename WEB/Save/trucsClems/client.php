<!-- <?php
session_start();
?> -->
<?php
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
            <div class="ptclt">
                <h2> mes animaux</h2>
                <?php 
                    if(!isset($_GET['action'])){    // si on ne va pas vers modifer ou reserver
                        if(isset($_GET['idAnimal'])){    // si un idAnimal est qd même passer, on doit le supprimer
                            include("Script_PHP/deleteAnimal.php"); // script qui supprime animal et les resa associés
                        }
                        include("Script_PHP/GestionAnimaux.php");// même si on supprime on à derrière la gestion
                    }
                    else{
                        if($_GET['action']=='reserver')
                            include("Script_PHP/ReservationAnimal.php");
                        if($_GET['action']=='modifier')
                            include("Script_PHP/ModifReservationAnimal.php");
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
                        <label for="identification" class="pt" pattern="[a-zA-Z0-9]{3,25}" > L'identification de votre animal (tatouage/puce) </label></br>
                        <input type="text" name="identification" id="identification" placeholder="012345" size="10" /></br></br>
                        <label for="certificat" class="pt" > Envoyez-nous le carnet de vaccin de votre animal </label></br>
                        <input type="file" name="certificat" id="certificat" required /></br></br>
                        <input type="submit" value="Enregistrer"/>
                        <?php include("Script_PHP/traitementAddAnimal.php") ?>
                    </fieldset>
                </form>
            </div>
            <div class="ptclt">
                <h2> Mes réservations </h2>
                <ul>
                    <li> 15/03/17 au 17/03/17 - chien - isolé - Pupuce - 120€ <a href=""><img src="images/client/croix.png" alt="croix" height="15" weight="15"/></a> </li>
                    <li> 18/03/17 au 24/03/17 - rongeur - en groupe - Baxter - 70€ <a href=""><img src="images/client/croix.png" alt="croix" height="15" weight="15"/></a> </li>
                    <li> 19/03/17 au 20/03/17 - chien avec extra - seul - Tetine - 45€ <a href=""><img src="images/client/croix.png" alt="croix" height="15" weight="15"/></a> </li>
                </ul>
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
                                    var boutonsSupprimerAnimal = document.querySelectorAll('button[name]');

                                    for(var i=0;i<boutonsSupprimerAnimal.length;i++){
                                        boutonsSupprimerAnimal[i].addEventListener("click", function(event) {
                                            var confOk=confirm("Êtes-vous vraiment sûr de supprimer cet animal ? (toutes les reservations associez seront annulées)");
                                            var idAnimal =event.target.getAttribute('name');
                                            if(confOk){
                                                document.location.replace('client.php?idAnimal='+idAnimal);
                                            }
                                        });

                                    var boutonsSupprimerReservation = document.querySelectorAll('button[name]');

                                    for(var i=0;i<boutonsSupprimerReservation.length;i++){
                                        boutonsSupprimerReservation[i].addEventListener("click", function(event) {
                                            var confOk=confirm("Êtes-vous vraiment sûr de supprimer cet animal ? (toutes les reservations associez seront annulées)");
                                            var idAnimal =event.target.getAttribute('name');
                                            if(confOk){
                                                document.location.replace('client.php?idAnimal='+idAnimal);
                                            }
                                        });

                                    }

                                </script>
    </body>
</html>



