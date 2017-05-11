<?php 
session_start();

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
        <div id="calendrier">
            <aside id="simulation">
                <p> Le calendrier affiche les places disponibles de la <em>semaine actuelle</em>. Pour obtenir des informations sur les semaines à venir, veuiller remplir les champs ci-dessous: </p>
                <form method="post" action="calendrier.php">
                    <fieldset>
                        <legend> Recherche de place disponible </legend>
                        <label for="dateRecherche" class="titrelabel"> Place disponible au: </label></br>
                        <input type="date" name="dateRecherche" id="dateRecherche" placeholder="aaaa-mm-jj" size="4" maxlength="10" step="10" required/></br>
                        <!--min= date('d/m/Y') et max= date('d/m/Y')+6 mois pour respecter conditions du PDS-->
                        <label for="ani" class="titrelabel"> L'animal que vous souhaitez faire garder: </label> <br>
                        <input type="radio" name="animal" value="chien" id="Chien" checked/> <label for="Chien" class="choixlabel">Chien</label></br>      
                        <input type="radio" name="animal" value="chat" id="Chat"/> <label for="Chat" class="choixlabel">Chat</label></br>
                        <input type="radio" name="animal" value="rongeur" id="Rongeur"/> <label for="Rongeur" class="choixlabel">Rongeur</label></br>
                        <label for="box" class="titrelabel"> La condition de traitement de votre animal: </label> <br>
                        <input type="radio" name="box" value="0" id="Groupe" checked/> <label for="Groupe" class="choixlabel">En groupe</label></br>      
                        <input type="radio" name="box" value="1" id="Seul"/> <label for="Seul" class="choixlabel">Seul</label></br>
                        <input type="submit" name ="valider" value="Envoyer"/>
                        <?php include("Script_PHP/placesDisponiblesCalendrier.php") ?>
                    </fieldset>
                </form>
            </aside>
            	<?php include ("Script_PHP/tableauPlacesCalendrier.php") ?>
        </div>
        <?php include("structure/footer.php") ?>	
    </body>
</html>


