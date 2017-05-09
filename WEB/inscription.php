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
        <div id="inscription">
            <div id="titre">
                <h1> Bienvenue sur le page d'inscription </h1>
            </div>
            <div id="contenu">
                <div class="insbloc">
                    <p> 
                        <strong> L'inscription </strong> vous permet d'accéder aux fonctionnalités de <em>réservation, d'annulation de réservation, de modification de vos informations ainsi qu'un espace commentaire </em>. <br/>
                        Il se situe dans l'onglet <strong> Mon compte</strong>, pour vous connecter vous n'aurez qu'à rentrer votre adresse mail et votre mot de passe.</br>
                        <em> Votre mot de passe doit faire plus de 7 caractères. </em>
                    </p>
                </div>
                <div class="insbloc">
                    <form method="post" action="inscription.php">
                        <fieldset>
                        <legend> Formulaire pour s'inscrire </legend>
                        <table>
                            <tr>
                                <td>
                                    <label for="nom"> Nom </label></br>
                                    <input type="text" name="nom" id="nom" placeholder="Doe" size="20" pattern="^[a-zA-Z]{3,25}$}" required/> 
                                </td>
                                <td>	
                                    <label for="prenom"> Prénom </label></br>
                                    <input type="text" name="prenom" id="prenom" alt='test' placeholder="John" size="20" pattern="^[a-zA-Z]{3,25}$" required /> 
                                </td>
                            </tr>
                            <tr>
                                <td> 
                                    <label for="tel"> Téléphone </label></br>
                                    <input type="text" name="tel" id="tel" placeholder="0607080900" size="20" pattern="0[167][0-9]{8}" required />
                                </td>
                                <td>
                                    <label for="adresse"> Adresse </label></br>
                                    <input type="text" name="adresse" id="adresse" placeholder="12 avenue des Lacs" size="20" pattern="[0-9]{1,3}[a-zA-Z\ ]{7,}" required/> 
                                </td>
                            </tr>
                            <tr>
                                <td> 
                                    <label for="mail"> Adresse email </label></br>
                                    <input type="email" name="mail" id="mail" placeholder="comchientchat@gmail.com" size="20" pattern="[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}" required/>
                                </td>
                                <td> 
                                    <label for="confmail"> Confirmez votre adresse email </label></br>
                                    <input type="email" name="confmail" id="confmail" placeholder="comchientchat@gmail.com" size="20" pattern="[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}" required/>
                                </td>
                            </tr>
                            <tr>
                                <td> 
                                    <label for="mdp"> Mot de passe </label></br>
                                    <input type="password" name="mdp" id="mdp" placeholder="********" size="20" pattern="(?=^.{8,}$)^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$"  required/>
                                </td>
                                <td>
                                    <label for="confmdp"> Confirmez votre mot de passe </label></br>
                                    <input type="password" name="confmdp" id="confmdp" placeholder="********" size="20"  pattern="(?=^.{8,}$)^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required /> 	
                                </td>
                            </tr>
                            <tr>
                                <td id="center" colspan="2"> <input id="center" type="submit" value="Envoyer"/> </td>
                            </tr>
                        </table>
                    </form>

                    validation inscription
                </div>
            </div>
        </div>
        <?php include("Script_PHP/traitementInscription.php") ?>
        <?php include("structure/footer.php") ?>
        <script type="text/javascript" src="Script_JS/verifFormInscription.js"></script>
        <script type="text/javascript" src="Script_JS/remplirAuto.js">  </script>

 </body>
</html>


