

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="style.css"/>
        <title> comChien&Chat </title>
    </head>
    <body>
        <?php include("structure/header.php") ?>
        <div id="modification">
            <div class="modif">
                <h1> Modification des informations de votre profil </h1>
            </div>
            <div class="modif">
                <form method="post" action="">
                    <fieldset>
                    <table>
                        <tr>
                            <td>
                                <label for="nom"> Nom </label></br>
                                <input type="text" name="nom" id="nom" placeholder="John" size="20" required/> 
                            </td>
                            <td>	
                                <label for="prenom"> Prénom </label></br>
                                <input type="text" name="prenom" id="prenom" placeholder="Doe" size="20" required/> 
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label for="tel"> Téléphone </label></br>
                                <input type="text" name="tel" id="tel" placeholder="0607080900" size="20" required/>
                            </td>
                            <td>
                                <label for="adresse"> Adresse </label></br>
                                <input type="text" name="adresse" id="adresse" placeholder="12 avenue des Lacs" size="20" required/> 
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label for="mail"> Adresse email </label></br>
                                <input type="email" name="mail" id="mail" placeholder="comchientchat@gmail.com" size="20" required/>
                            </td>
                            <td> 
                                <label for="confmail"> Confirmez votre adresse email </label></br>
                                <input type="text" name="confmail" id="confmail" placeholder="comchientchat@gmail.com" size="20" required/>
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label for="mdp"> Mot de passe </label></br>
                                <input type="password" name="mdp" id="mdp" placeholder="********" size="20" required/>
                            </td>
                            <td>
                                <label for="confmdp"> Confirmez votre mot de passe </label></br>
                                <input type="password" name="confmdp" id="confmdp" placeholder="********" size="20" required/> 	
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label for="newmdp"> Nouveau mot de passe </label></br>
                                <input type="password" name="newmdp" id="newmdp" placeholder="********" size="20" required/>
                            </td>
                            <td>
                                <label for="newconfmdp"> Confirmez votre nouveau mot de passe </label></br>
                                <input type="password" name="newconfmdp" id="newconfmdp" placeholder="********" size="20" required/> 	
                            </td>
                        </tr>
                        <tr>
                            <td id="center" colspan="2"> <input id="center" type="submit" value="Envoyer"/> </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <?php include("structure/footer.php") ?>
    </body>
</html>


