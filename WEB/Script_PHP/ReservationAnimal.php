                <h2> Consultation et réservation </h2>
				<form method="post" action="client.php">

<?php
	function convertBox(&$box){
		if(($box)=='Seul')
			return '1';
		else return '0';
	}

	$_SESSION['action']='reserver';

	if(isset($_GET['idAnimal']))
		$_SESSION['idAnimal']=$_GET['idAnimal'];

?>


                    <fieldset>

                        <label for="date" class="pt"> Date d'entrée de votre animal:  </label></br>
                        <input type="date" name="date" id="date" placeholder="jj/mm/aaaa" size="8" maxlength="10" step="10" pattern="^(0?\d|[12]\d|3[01])-(0?\d|1[012])-((?19|20)\d{2})$" required/></br></br>

                        <label for="duree" class="pt"> Durée du séjour </label></br>
                        <input type="number" name="duree" id="duree" pattern="[1234567]"/></br></br>

                        <label for="box" class="pt"> La condition de traitement de votre animal: </label> <br>
                        <input type="radio" name="box" value="Groupe" id="Groupe"/ checked> <label for="Groupe" class="choixlabel">En groupe</label></br>

                        <input type="radio" name="box" value="Seul" id="Seul"/> <label for="Seul" class="choixlabel">Seul</label></br></br>

                		<input type="submit" value="Réserver"/>

  						<?php 
                			if(isset($_POST['date'])&&isset($_POST['duree'])&&isset($_POST['box'])){
                				include("Script_PHP/BDDAccess.php");
                				$requete=$bdd->exec('CALL P_Reservation('.$_SESSION['idAnimal'].','.$_POST['date'].','
                					.$_POST['duree'].',1,'.convertBox($_POST['box']).',0)');
								// if($donnees = $requete->fetch()) {
        //         					echo($donnees['Erreur']);
        //         				}

        //         				$requete->closeCursor();

								// $requete2=$bdd->exec('CALL P_Reservation('.$_SESSION['idAnimal'].','.$_POST['date'].','
        //         					.$_POST['duree'].',1,'.convertBox($_POST['box']).',0)');


                				echo($_SESSION['idAnimal']);
                				if(!(empty($requete))){
                            				echo($requete);
                				}
                			}
                			//CREATE PROCEDURE P_Reservation(idA int,dateDebut date,duree int,estClient tinyint,estIsole tinyint,promenade tinyint)

	// mettre à jour avant affichage si le carnet de vaccination est toujours valide


                		?>
              
                	</fieldset>
                </form>

