

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
                <h2> Consultation et réservation </h2>
                <form method="post" action="">
                    <fieldset>
                        <label for="date" class="pt"> Date d'entrée de votre animal:  </label></br>
                        <input type="date" name="date" id="date" placeholder="jj/mm/aaaa" size="4" maxlength="10" step="10" required/></br></br>
                        <!--min= date('d/m/Y') et max= date('d/m/Y')+6 mois pour respecter conditions du PDS-->
                        <label for="duree" class="pt"> Durée du séjour </label></br>
                        <input type="number" name="duree" id="duree" max="7" min="1"/></br></br>
                        <label for="ani" class="pt"> Type d'animal </label></br>
                        <input type="radio" name="ani" value="Chat" id="Chat"/> <label for="Chat">Chat</label></br>
                        <input type="radio" name="ani" value="Rongeur" id="Rongeur"/> <label for="Rongeur">Rongeur</label></br>
                        <input type="radio" name="ani" value="Chien" id="Chien"/> <label for="Chien">Chien</label></br>
                        <input type="radio" name="ani" value="ChienExtra" id="ChienExtra"/> <label for="ChienExtra">Chien avec promenade journalière</label></br></br>
                        <label for="box" class="pt"> La condition de traitement de votre animal: </label> <br>
                        <input type="radio" name="box" value="Groupe" id="Groupe"/> <label for="Groupe" class="choixlabel">En groupe</label></br>
                        <input type="radio" name="box" value="Seul" id="Seul"/> <label for="Seul" class="choixlabel">Seul</label></br></br>
                        <input type="submit" value="Rechercher"/>
                        <!-- Ce menu s'affiche une fois la recherche effectuée donc il y a un deuxième formulaire -->
                        <p> Pour cette date et durée, <strong> 18 </strong> place(s) sont disponible(s). </br>
                            Souhaitez vous reserver? 
                        </p>
                <form method="post" action="">
                <label for="votreanimal"> Quel animal souhaitez vous faire garder? </label></br>
                <select name="votreanimal" id="votreanimal" size="1">
                <option> Pupuce </option>
                <option> Baxter </option>
                <option> Tetine </option>
                </select></br></br>
                <input type="submit" value="Réserver"/>
                </form>
                </fieldset>
                </form>
            </div>
            <div class="ptclt">
                <h2> Ajouter un animal à mon compte </h2>
                <form method="post" action="">
                    <fieldset>
                        <label for="ani" class="pt"> Type d'animal </label></br>
                        <input type="radio" name="ani" value="Chat" id="Chat"/> <label for="Chat">Chat</label></br>
                        <input type="radio" name="ani" value="Rongeur" id="Rongeur"/> <label for="Rongeur">Rongeur</label></br>
                        <input type="radio" name="ani" value="Chien" id="Chien"/> <label for="Chien">Chien</label></br></br>
                        <label for="nom" class="pt"> Le nom de votre animal  </label></br>
                        <input type="text" name="nom" id="nom" placeholder="Nom" size="10" required/></br></br>	
                        <label for="identification" class="pt"> L'identification de votre animal (tatouage/puce) </label></br>
                        <input type="text" name="identification" id="identification" placeholder="012345" size="10" required/></br></br>
                        <label for="certificat" class="pt"> Envoyez-nous le carnet de vaccin de votre animal </label></br>
                        <input type="file" name="certificat" id="certificat"/></br></br>
                        <input type="submit" value="Enregistrer"/>
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
    </body>
</html>


