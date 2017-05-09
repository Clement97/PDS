

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="style.css"/>
        <title> comChien&Chat </title>
    </head>
    <body>
        <?php include("structure/header.php") ?>
        <div id="calendrier">
            <aside id="simulation">
                <p> Le calendrier affiche les places disponibles de la <em>semaine actuelle</em>. Pour obtenir des informations sur les semaines à venir, veuiller remplir les champs ci-dessous: </p>
                <form method="post" action="">
                    <fieldset>
                        <legend> Recherche de place disponible </legend>
                        <label for="date" class="titrelabel"> Place disponible au: </label></br>
                        <input type="date" name="date" id="date" placeholder="jj/mm/aaaa" size="4" maxlength="10" step="10" required/></br>
                        <!--min= date('d/m/Y') et max= date('d/m/Y')+6 mois pour respecter conditions du PDS-->
                        <label for="ani" class="titrelabel"> L'animal que vous souhaitez faire garder: </label> <br>
                        <input type="radio" name="ani" value="Chien" id="Chien" checked/> <label for="Chien" class="choixlabel">Chien</label></br>      
                        <input type="radio" name="ani" value="Chat" id="Chat"/> <label for="Chat" class="choixlabel">Chat</label></br>
                        <input type="radio" name="ani" value="Rongeur" id="Rongeur"/> <label for="Rongeur" class="choixlabel">Rongeur</label></br>
                        <label for="box" class="titrelabel"> La condition de traitement de votre animal: </label> <br>
                        <input type="radio" name="box" value="Groupe" id="Groupe" checked/> <label for="Groupe" class="choixlabel">En groupe</label></br>      
                        <input type="radio" name="box" value="Seul" id="Seul"/> <label for="Seul" class="choixlabel">Seul</label></br>
                        <input type="submit" value="Envoyer"/>
                        <p><br/> Au <strong> 01/01/2017 </strong> il y a <strong> 9 </strong> place(s) libre(s). </p>
                    </fieldset>
                </form>
            </aside>
            <table id="tabcalendrier">
                <tr>
                    <th> Catégorie/Date </th>
                    <th class="enthaut"> Lundi </th>
                    <th class="enthaut"> Mardi </th>
                    <th class="enthaut"> Mercredi </th>
                    <th class="enthaut"> Jeudi </th>
                    <th class="enthaut"> Vendredi </th>
                    <th class="enthaut"> Samedi </th>
                    <th class="enthaut"> Dimanche </th>
                </tr>
                <tr>
                    <th class="entcote"> Chien isolé </th>
                    <td> 5 </td>
                    <td>
                        <!-- php pour afficher le nombre de places disponibles --> 
                    </td>
                    <td> </td>
                    <td> 2</td>
                    <td> </td>
                    <td> 6 </td>
                    <td> </td>
                </tr>
                <tr>
                    <th class="entcote"> Chien en groupe </th>
                    <td> </td>
                    <td> 21 </td>
                    <td> </td>
                    <td>14 </td>
                    <td> </td>
                    <td> 8 </td>
                    <td> </td>
                </tr>
                <tr>
                    <th class="entcote"> Chat isolé </th>
                    <td> 4 </td>
                    <td> 29 </td>
                    <td> 18 </td>
                    <td> 9 </td>
                    <td> 2 </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <th class="entcote"> Chat en groupe </th>
                    <td> </td>
                    <td> 25 </td>
                    <td> 24 </td>
                    <td> 20 </td>
                    <td> 25 </td>
                    <td> </td>
                    <td> 18 </td>
                </tr>
                <tr>
                    <th class="entcote"> Rongeur isolé </th>
                    <td> </td>
                    <td> 8 </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> 9 </td>
                </tr>
                <tr>
                    <th class="entcote"> Rongeur en groupe </th>
                    <td> 1 </td>
                    <td> </td>
                    <td> </td>
                    <td> 7 </td>
                    <td> </td>
                    <td> 3 </td>
                    <td> 9 </td>
                </tr>
            </table>
        </div>
        <?php include("structure/footer.php") ?>	
    </body>
</html>


