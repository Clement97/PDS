

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
            <div id="resadm">
                <div class="res">
                    <h2> Consultation et suppression des réservations </h2>
                </div>
                <div class="res">
                    <form method="post" action="">
                        <fieldset>
                        <label for="datedeb" class="pt"> Date début  </label></br>
                        <input type="date" name="datedeb" id="datedeb" placeholder="jj/mm/aaaa" size="4" maxlength="10" step="10" required/></br></br>
                        <!--min= date('d/m/Y') et max= date('d/m/Y')+6 mois pour respecter conditions du PDS-->
                        <label for="datefin" class="pt"> Date de fin </label></br>
                        <input type="date" name="datefin" id="datefin" placeholder="jj/mm/aaaa" size="4" maxlength="10" step="10" required/></br></br>
                        <label> Type d'animal </label></br>
                        <select name="animal" size="1">
                            <option> Tous </option>
                            <option> Chien </option>
                            <option> Chien avec extra </option>
                            <option> Chat </option>
                            <option> Rongeur </option>
                        </select>
                        <br/> <br/>
                        <input type="submit" value="rechercher"/>
                    </form>
                </div>
                <div class="res">
                    <ul>
                        <li> MARTI Enzo - 15/03/17 au 17/03/17 - chat - isolé - Ulahup - 90€ <a href=""><img src="images/client/croix.png" alt="croix" height="15" weight="15"/></a> </li>
                        <br/>
                        <li> ALDOBRANDI Clément - 18/03/17 au 24/03/17 - chien - isolé - Jul - 280€ <a href=""><img src="images/client/croix.png" alt="croix" height="15" weight="15"/></a> </li>
                        <br/>
                        <li> MARTI Enzo - 15/03/17 au 17/03/17 - chat - isolé - Ulahup - 90€ <a href=""><img src="images/client/croix.png" alt="croix" height="15" weight="15"/></a> </li>
                        <br/>
                        <li> ALDOBRANDI Clément - 18/03/17 au 24/03/17 - chien - isolé - Jul - 280€ <a href=""><img src="images/client/croix.png" alt="croix" height="15" weight="15"/></a> </li>
                        <br/>
                        <li> MARTI Enzo - 15/03/17 au 17/03/17 - chat - isolé - Ulahup - 90€ <a href=""><img src="images/client/croix.png" alt="croix" height="15" weight="15"/></a> </li>
                        <br/>
                        <li> ALDOBRANDI Clément - 18/03/17 au 24/03/17 - chien - isolé - Jul - 280€ <a href=""><img src="images/client/croix.png" alt="croix" height="15" weight="15"/></a> </li>
                        <br/>
                    </ul>
                </div>
            </div>
            <div id="cliadm">
                <div class="cli">
                    <h2> Consultation et suppression des clients </h2>
                </div>
                <div class="cli">
                    <form method="post" action="">
                        <fieldset>
                        <label for="nom"> Nom </label></br>
                        <input type="text" name="nom" id="nom" placeholder="John" size="15" required/></br></br>
                        <label for="prenom"> Prénom </label></br>
                        <input type="text" name="prenom" id="prenom" placeholder="Doe" size="15" required/></br></br>
                        <label for="tel"> Téléphone </label></br>
                        <input type="text" name="tel" id="tel" placeholder="0607080900" size="15" required/></br></br>
                        <label for="adresse"> Adresse </label></br>
                        <input type="text" name="adresse" id="adresse" placeholder="12 avenue des Lacs" size="15" required/></br></br>
                        <input id="center" type="submit" value="Envoyer"/>
                    </form>
                </div>
                <div class="cli">
                    <ul>
                        <li> MARTI - Enzo - 0611111111 - 24 avenue du oui <a href=""><img src="images/client/croix.png" alt="croix" height="15" weight="15"/></a> </li>
                        <br/>
                        <li> MARTI - Enzo - 0611111111 - 24 avenue du oui <a href=""><img src="images/client/croix.png" alt="croix" height="15" weight="15"/></a> </li>
                        <br/>
                        <li> MARTI - Enzo - 0611111111 - 24 avenue du oui <a href=""><img src="images/client/croix.png" alt="croix" height="15" weight="15"/></a> </li>
                        <br/>
                        <li> MARTI - Enzo - 0611111111 - 24 avenue du oui <a href=""><img src="images/client/croix.png" alt="croix" height="15" weight="15"/></a> </li>
                        <br/>
                    </ul>
                </div>
            </div>
        </div>
        <?php include("structure/footer.php") ?>
    </body>
</html>


