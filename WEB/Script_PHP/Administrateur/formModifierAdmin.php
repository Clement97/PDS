<div id="inscription">
            <div id="titre">
                <h1> Modifié un compte salarié </h1>
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
                    <form method="post" action="espacePrive.php" onsubmit="return (loginOK && passwordOK && confPasswordOK && nomOK && prenomOK); ">
                        <table>
                            <tr>
                                <td> 
                                    <label for="login"> Login </label></br>
                                    <input type="text" name="login" id="login" placeholder="admin1" size="20" pattern="^[a-zA-Z0-9]{3,25}$" required />
                                </td>
                                <td>
                                   <label for="type">Type</label><br>
                                       <select name="type" id="type">
                                           <option value="Operateur">Operateur</option>
                                           <option value="Administrateur">Administrateur</option>
                                       </select>                                
                                </td>
                            </tr>
                            <tr>
                                <td> 
                                    <label for="password"> Mot de passe </label></br>
                                    <input type="password" name="password" id="password" placeholder="********" size="20" pattern="(?=^.{8,}$)^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required/>
                                </td>
                                <td> 
                                    <label for="confPassword"> Mot de passe: confirmation </label></br>
                                    <input type="password" name="confPassword" id="confPassword" placeholder="********" size="20" pattern="(?=^.{8,}$)^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required/>
                                </td>
                            </tr>
                            <tr>    
                                <td>
                                    <label for="nom"> Nom </label></br>
                                    <input type="text" name="nom" id="nom" placeholder="Doe" size="20" pattern="^[a-zA-Z]{3,25}|| $"/> 
                                </td>
                                <td>	
                                    <label for="prenom"> Prénom </label></br>
                                    <input type="text" name="prenom" id="prenom"  placeholder="John" size="20" pattern="^[a-zA-Z]{3,25}|| $" /> 
                                </td>
                            </tr>
               
                                <td id="center" colspan="2"> <input id="center" type="submit" value="Envoyer"/> </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="Script_JS/verifFormAdmin.js"></script>
        <?php include("Script_PHP/Administrateur/traitementModifierAdmin.php"); ?>
