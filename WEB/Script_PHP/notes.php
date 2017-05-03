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




-Le client doit pouvoir saisir d’éventuels commentaires au gestionnaire de la pension.


o Public (sans authentification) pour la consultation des disponibilités des places
o client (consultation des places disponibles, réservations, modifications et annulation
de ses réservations)
o opérateur (consultation des places, réservations, mise à jour des informations de
place, modification et annulations des réservations)
o administrateur (tout type de manipulation, suppression client et informations
associées par exemple, ...)