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
        <div id="connexion">
        <div id="pre-cadre">
            <p> 
                L'onglet <strong> Mon compte </strong> vous permet d'accéder aux fonctionnalités de réservation, d'annulation de réservation, de modification de vos informations ainsi qu'un espace commentaire. <br/>
            </p>
            <div id="cadre">
                <div class="formulaire">
                    <p class="titre"><a href="inscription.php"> INSCRIPTION </a></p>
                </div>
                <div class="formulaire">
                    <p class="titre"> DEJA INSCRIT </p>
                    <form method="post" action="connexion.php">
                        <label for="id" class="connexion"> Email </label></br>
                        <input type="text" name="id" id="id" placeholder="JohnDoe@comchienchat.com" size="20" required/></br>
                        <label for="mdp" class="connexion"> Mot de passe </label></br>
                        <input type="password" name="mdp" id="mdp" placeholder="**************" size="20" required/></br>
                        <input type="checkbox" name="rester"/>
                        <label for="rester" id="rester"> Rester connecté </label>
                        <p id="centrer"><input type="submit" value="connexion"/></p>
                    </form>
                </div>
            </div>
            <div id="post-cadre">
                <p>
                    --INFORMATION PDS--<br/>
                    Les liens ci-dessous vous permettent de voir les pages des différents profils après la connexion:<br/>
                <ul>
                    <li> <a href="client.php"> CLIENT </a> </li>
                    <li> <a href="operateur.php"> OPERATEUR </a> </li>
                    <li> <a href="administrateur.php"> ADMINISTRATEUR </a> </li>
                </ul>
                </p>
            </div>
        </div>
        <?php include("Script_PHP/traitementConnexion.php") ?>
        <?php include("structure/footer.php") ?>
    </body>
</html>


