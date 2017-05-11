echo "<script type='text/javascript'>document.location.replace('page.php');</script>";
<meta http-equiv="refresh" content="1;url=http://www.dvp.com"/>

voir pq on ne peut que supprimer un client sur 2 (rapport avec init=1)
puis remplacer &amp; par & en js pas besoin du amp;

Admin:

recherche admin
	--> supprimer admin
	--> créer operateur
	--> créer administrateur
recherche ope
	--> supprimer ope
recherche client 
	-->	consulter reservation 
	--> effectuer reservation
	--> modifier reservation
	--> annuler reservation

Opé:

recherche client 
	-->	consulter reservation 
	--> effectuer reservation
	--> modifier reservation
	--> annuler reservation

Client: 
	--> consulter places
	--> consulter ses réservations
	--> modifier ses reservations
	--> annuler ses réservations

public:
	--> consulter places




===>
Client: ok ou quelques petite modifs lors du script
Ope: enlever  "Consultation des places occupées" et mettre une "recherche par client(nom,prenom)"
Administrateur: faire un form de recherche (avec checkbox qui peut chercher des admins, des clients ou des opés),  recherche par nom,prenom ou par login


Client: 
--> ajouter animal
--> mes reservations
--> mes animaux
--> coms

Reserver,Mdifier, effacer
Reserver => GoFormulaire pr réserver
Modifier => GoFormulaire pr réserver != traitementReservation
Effacer => onclick:



-Le client doit pouvoir saisir d’éventuels commentaires au gestionnaire de la pension.


o Public (sans authentification) pour la consultation des disponibilités des places
o client (consultation des places disponibles, réservations, modifications et annulation
de ses réservations)
o opérateur (consultation des places, réservations, mise à jour des informations de
place, modification et annulations des réservations)
o administrateur (tout type de manipulation, suppression client et informations
associées par exemple, ...)
<!--
            <div class="ptclt">
                <h2> Consultation et réservation </h2>
                <form method="post" action="">
                    <fieldset>
                        <label for="date" class="pt"> Date d'entrée de votre animal:  </label></br>
                        <input type="date" name="date" id="date" placeholder="jj/mm/aaaa" size="4" maxlength="10" step="10" pattern="^(0?\d|[12]\d|3[01])-(0?\d|1[012])-((?:19|20)\d{2})$" required/></br></br>
                        min= date('d/m/Y') et max= date('d/m/Y')+6 mois pour respecter conditions du PDS
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
                        <!-- Ce menu s'affiche une fois la recherche effectuée donc il y a un deuxième formulaire 
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


                                                            <?php
                                                    // include("Script_PHP/BDDAccess.php");
                                                    // $requete=$bdd->prepare('delete from Animal where idAnimal=?');
                                                    // $requete->execute(array($idAnimal));
                                                    // $requete=$bdd->prepare('update reservations set valide=0 where idAnimal=?');
                                                    // $requete->execute(array($idAnimal));                                            
                                                ?>







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




                                        <div class="input">
                        <label for="prenom"> Prenom </label></br>
                        <input type="text" name="prenom" id="prenom" placeholder="John" size="15" required/></br></br>
                        </div>

                        <div class="input">
                        <label for="nom"> Nom </label></br>
                        <input type="text" name="nom" id="nom" placeholder="Snow" size="15" required/></br></br>
                        </div>

                        <div class="input">
                        <label for="login"> login </label></br>
                        <input type="text" name="login" id="login" placeholder="login" size="15" required/></br></br>
                        </div>                                    





            -->
