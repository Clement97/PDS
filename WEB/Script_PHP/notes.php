echo "<script type='text/javascript'>document.location.replace('page.php');</script>";
<meta http-equiv="refresh" content="1;url=http://www.dvp.com"/>

controler entrées :
-traitementConnexion
-


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










            -->
