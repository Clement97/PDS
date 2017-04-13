

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
                                    <input type="text" name="nom" id="nom" placeholder="Doe" size="20" /> 
                                </td>
                                <td>	
                                    <label for="prenom"> Prénom </label></br>
                                    <input type="text" name="prenom" id="prenom" alt='test' placeholder="John" size="20" /> 
                                </td>
                            </tr>
                            <tr>
                                <td> 
                                    <label for="tel"> Téléphone </label></br>
                                    <input type="text" name="tel" id="tel" placeholder="0607080900" size="20" />
                                </td>
                                <td>
                                    <label for="adresse"> Adresse </label></br>
                                    <input type="text" name="adresse" id="adresse" placeholder="12 avenue des Lacs" size="20" /> 
                                </td>
                            </tr>
                            <tr>
                                <td> 
                                    <label for="mail"> Adresse email </label></br>
                                    <input type="text" name="mail" id="mail" placeholder="comchientchat@gmail.com" size="20"   />
                                </td>
                                <td> 
                                    <label for="confmail"> Confirmez votre adresse email </label></br>
                                    <input type="text" name="confmail" id="confmail" placeholder="comchientchat@gmail.com" size="20" />
                                </td>
                            </tr>
                            <tr>
                                <td> 
                                    <label for="mdp"> Mot de passe </label></br>
                                    <input type="password" name="mdp" id="mdp" placeholder="********" size="20"/>
                                </td>
                                <td>
                                    <label for="confmdp"> Confirmez votre mot de passe </label></br>
                                    <input type="password" name="confmdp" id="confmdp" placeholder="********" size="20"/> 	
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

        <script type="text/javascript" src="Script_JS/verifFormInscription.js"></script>    
        <?php include("structure/footer.php") ?>
 </body>
</html>


